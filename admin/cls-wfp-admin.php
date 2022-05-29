<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Master Class: Admin
*/
class WFP_Admin 
{
	use Wfp_Core, Wfp_Settings;

	private $wfp_version;
	private $wfp_assets_prefix;

	function __construct( $version ) {

		$this->wfp_version = $version;
		$this->wfp_assets_prefix = substr( WFP_PRFX, 0, -1 ) . '-';
	}

	/**
	 *	Flush Rewrite on Plugin initialization
	 */
	function wfp_flush_rewrite() {

		if ( get_option('wfp_plugin_settings_have_changed') == true ) {

			flush_rewrite_rules();

			update_option('wfp_plugin_settings_have_changed', false);

		}
	}

	/**
	 *	Loading admin menu
	 */
	function wfp_admin_menu() {

		$wfp_cpt_menu = 'edit.php?post_type=wfp_faq';

		add_submenu_page(

			$wfp_cpt_menu,
			__('Settings', WFP_TXT_DOMAIN),
			__('Settings', WFP_TXT_DOMAIN),
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
			$this->wfp_assets_prefix . 'font-awesome', 
			WFP_ASSETS .'css/fontawesome/css/all.min.css',
		);

		wp_enqueue_style(
			$this->wfp_assets_prefix . 'admin',
			WFP_ASSETS . 'css/' . $this->wfp_assets_prefix . 'admin.css',
			array(),
			$this->wfp_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}
		
		wp_enqueue_script( 'wp-color-picker');
		
		wp_enqueue_script(
			$this->wfp_assets_prefix . 'admin',
			WFP_ASSETS . 'js/' . $this->wfp_assets_prefix . 'admin.js',
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
						'supports'            => array('title', 'editor', 'thumbnail', 'page-attributes'),
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

	function wfp_taxonomy_for_faqs() {

		$labels = array(
			'name' 				=> __('FAQ Categories', WFP_TXT_DOMAIN),
			'singular_name' 	=> __('FAQ Category', WFP_TXT_DOMAIN),
			'search_items' 		=> __('Search FAQ Categories', WFP_TXT_DOMAIN),
			'all_items' 		=> __('All FAQ Categories', WFP_TXT_DOMAIN),
			'parent_item' 		=> __('Parent FAQ Category', WFP_TXT_DOMAIN),
			'parent_item_colon'	=> __('Parent FAQ Category:', WFP_TXT_DOMAIN),
			'edit_item' 		=> __('Edit FAQ Category', WFP_TXT_DOMAIN),
			'update_item' 		=> __('Update FAQ Category', WFP_TXT_DOMAIN),
			'add_new_item' 		=> __('Add New FAQ Category', WFP_TXT_DOMAIN),
			'new_item_name' 	=> __('New FAQ Category Name', WFP_TXT_DOMAIN),
			'menu_name' 		=> __('FAQ Categories', WFP_TXT_DOMAIN),
		);

		register_taxonomy('wfp_faq_category', array('wfp_faq'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array('slug' => 'faq-category'),
		));
	}

	function wfp_metaboxes() {

		add_meta_box(
			'wfp_metaboxes',
			__('FAQs Information:', WFP_TXT_DOMAIN),
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
					<label for="wfp_status"><?php _e('Status:', WFP_TXT_DOMAIN); ?></label>
				</th>
				<td>
					<input type="radio" name="wfp_status" class="wfp_status" id="wfp_status_active" value="active" <?php echo ( 'inactive' !== esc_attr( $wfp_status ) ) ? 'checked' : ''; ?> >
					<label for="wfp_status_active"><span></span><?php _e( 'Active', WFP_TXT_DOMAIN ); ?></label>
					&nbsp;&nbsp;
					<input type="radio" name="wfp_status" class="wfp_status" id="wfp_status_inactive" value="inactive" <?php echo ( 'inactive' === esc_attr( $wfp_status ) ) ? 'checked' : ''; ?> >
					<label for="wfp_status_inactive"><span></span><?php _e( 'Inactive', WFP_TXT_DOMAIN ); ?></label>
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

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$wfpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$wfpGeneralMessage = false;

		if ( isset( $_POST['updateGeneralContent'] ) ) {

			$wfpGeneralMessage = $this->wfp_set_content_settings( $_POST );
		}

		$wfpContentSettings	= $this->wfp_get_content_settings();

		require_once WFP_PATH . 'admin/view/' . $this->wfp_assets_prefix . 'settings.php';
	}

	// Add Columns To Custom Post Types
	function wfp_add_faqs_columns( $columns ) {
		
		unset( $columns['title'] );
		unset( $columns['taxonomy-wfp_faq_category'] );
		unset( $columns['date'] );

		return array_merge ( $columns, array ( 
			'title' => __ ('Title'),
			'taxonomy-wfp_faq_category' => __ ( 'FAQ Category' ),
			'status'   => __ ( 'Status' ),
			'date' => __('Date')
		  ) );

	}

	function wfp_display_notification( $type, $msg ) { 
		?>
		<div class="wfp-alert <?php printf('%s', $type); ?>">
			<span class="wfp-closebtn">&times;</span>
			<strong><?php esc_html_e (ucfirst( $type ), WFP_TXT_DOMAIN); ?>!</strong>
			<?php esc_html_e( $msg, WFP_TXT_DOMAIN ); ?>
		</div>
		<?php 
	}
}
?>