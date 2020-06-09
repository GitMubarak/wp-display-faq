<?php

/**
 *	Admin Parent Class
 */
class WFP_Admin
{
	private $wfp_version;
	private $wfp_assets_prefix;

	function __construct($version) {
		$this->wfp_version = $version;
		$this->wfp_assets_prefix = substr( WFP_PRFX, 0, -1 ) . '-';
	}

	/**
	 *	Flush Rewrite on Plugin initialization
	 */
	function wfp_flush_rewrite() {
		if( get_option('wfp_plugin_settings_have_changed') == true ) {
			flush_rewrite_rules();
			update_option('wfp_plugin_settings_have_changed', false);
		}
	}

	/**
	 *	Loading admin menu
	 */
	function wfp_admin_menu()
	{
		$wfp_cpt_menu = 'edit.php?post_type=wfp_faq';
		add_submenu_page(
			$wfp_cpt_menu,
			esc_html__('General Settings', WFP_TXT_DOMAIN),
			esc_html__('General Settings', WFP_TXT_DOMAIN),
			'manage_options',
			'wfp-general-settings',
			array($this, WFP_PRFX . 'general_settings')
		);
	}

	/**
	 *	Loading admin panel assets
	 */
	function wfp_enqueue_assets() {

		wp_enqueue_style( 'wp-color-picker');

		wp_enqueue_style(
			$this->wfp_assets_prefix . 'admin-style',
			WFP_ASSETS . 'css/' . $this->wfp_assets_prefix . 'admin-style.css',
			array(),
			$this->wfp_version,
			FALSE
		);

		if( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}
		
		wp_enqueue_script( 'wp-color-picker');
		
		wp_enqueue_script(
			$this->wfp_assets_prefix . 'admin-script',
			WFP_ASSETS . 'js/' . $this->wfp_assets_prefix . 'admin-script.js',
			array('jquery'),
			$this->wfp_version,
			TRUE
		);
	}

	function wfp_custom_post_type() {
		$labels = array(
							'name'                => __('WP FAQs'),
							'singular_name'       => __('WP FAQs'),
							'menu_name'           => __('WP FAQs'),
							'parent_item_colon'   => __('Parent FAQ'),
							'all_items'           => __('All FAQs'),
							'view_item'           => __('View FAQ'),
							'add_new_item'        => __('Add New FAQ'),
							'add_new'             => __('Add New'),
							'edit_item'           => __('Edit FAQ'),
							'update_item'         => __('Update FAQ'),
							'search_items'        => __('Search FAQ'),
							'not_found'           => __('Not Found'),
							'not_found_in_trash'  => __('Not found in Trash')
						);
		$args = array(
						'label'               => __('wfp_faq'),
						'description'         => __('Description For FAQ'),
						'labels'              => $labels,
						'supports'            => array('title', 'editor', 'thumbnail'),
						'public'              => true,
						'hierarchical'        => false,
						'show_ui'             => true,
						'show_in_menu'        => true,
						'show_in_nav_menus'   => true,
						'show_in_admin_bar'   => true,
						'has_archive'         => false,
						'can_export'          => true,
						'exclude_from_search' => false,
						'yarpp_support'       => true,
						//'taxonomies' 	      => array('post_tag'),
						'publicly_queryable'  => true,
						'capability_type'     => 'page',
						'menu_icon'           => 'dashicons-feedback'
					);
		register_post_type('wfp_faq', $args);
	}

	function wfp_metaboxes() {
		add_meta_box(
			'wfp_metaboxes',
			'WP FAQ Details',
			array( $this, WFP_PRFX . 'metabox_content' ),
			'wfp_faq',
			'normal',
			'high'
		);
	}

	function wfp_metabox_content() {
		
		global $post;
		wp_nonce_field( basename(__FILE__), 'wfp_fields' );
		$wfp_status	= get_post_meta( $post->ID, 'wfp_status', true );
		?>
		<table class="form-table">
			<tr class="wfp_status">
				<th scope="row">
					<label for="wfp_status"><?php esc_html_e('Status:', WFP_TXT_DOMAIN); ?></label>
				</th>
				<td>
					<select name="wfp_status" class="small-text">
						<option value="active" <?php if ( 'inactive' != esc_attr( $wfp_status ) ) echo 'selected'; ?> ><?php esc_html_e('Active', WFP_TXT_DOMAIN); ?></option>
						<option value="inactive" <?php if ( 'inactive' == esc_attr( $wfp_status ) ) echo 'selected'; ?> ><?php esc_html_e('Inactive', WFP_TXT_DOMAIN); ?></option>
					</select>
				</td>
			</tr>
		</table>
		<?php
	}

	/**
	 * Save the metabox data
	 */
	function wfp_save_meta_value( $post_id ) {
		
		global $post;

		if( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if( ! isset( $_POST['wfp_status'] ) || ! wp_verify_nonce( $_POST['wfp_fields'], basename(__FILE__) ) ) {
			return $post_id;
		}

		$wfp_meta['wfp_status']	= ( sanitize_text_field( $_POST['wfp_status'] ) != '' ) ? sanitize_text_field( $_POST['wfp_status'] ) : '';

		foreach( $wfp_meta as $key => $value ) {
			if ('revision' === $post->post_type) {
				return;
			}
			if (get_post_meta($post_id, $key, false)) {
				update_post_meta($post_id, $key, $value);
			} else {
				add_post_meta($post_id, $key, $value);
			}
			if (!$value) {
				delete_post_meta($post_id, $key);
			}
		}
	}

	function wfp_general_settings() {
		require_once WFP_PATH . 'admin/view/' . $this->wfp_assets_prefix . 'general-settings.php';
	}

	function wfp_display_notification($type, $msg) { 
		?>
		<div class="wfp-alert <?php printf('%s', $type); ?>">
			<span class="wfp-closebtn">&times;</span>
			<strong><?php esc_html_e(ucfirst($type), WFP_TXT_DOMAIN); ?>!</strong>
			<?php esc_html_e($msg, WFP_TXT_DOMAIN); ?>
		</div>
		<?php 
	}
}
?>