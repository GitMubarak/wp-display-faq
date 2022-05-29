<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once WFP_PATH . 'common/core.php';
include_once WFP_PATH . 'common/settigns.php';

/**
 * Master Class: Plugin
*/
class WFP_Master 
{

	protected $wfp_loader;
	protected $wfp_version;

	/**
	 * Class Constructor
	 */
	function __construct() {

		$this->wfp_version = WFP_VERSION;
		$this->wfp_load_dependencies();
		$this->wfp_trigger_admin_hooks();
		$this->wfp_trigger_front_hooks();
	}

	private function wfp_load_dependencies() {

		require_once WFP_PATH . 'admin/' . WFP_CLS_PRFX . 'admin.php';
		require_once WFP_PATH . 'front/' . WFP_CLS_PRFX . 'front.php';
		require_once WFP_PATH . 'inc/' . WFP_CLS_PRFX . 'loader.php';
		$this->wfp_loader = new WFP_Loader();
	}

	private function wfp_trigger_admin_hooks() {

		$wfp_admin = new WFP_Admin( $this->wfp_version() );
		$this->wfp_loader->add_action( 'admin_enqueue_scripts', $wfp_admin, WFP_PRFX . 'enqueue_assets' );
		$this->wfp_loader->add_action( 'admin_menu', $wfp_admin, WFP_PRFX . 'admin_menu', 0 );
		$this->wfp_loader->add_action( 'init', $wfp_admin, WFP_PRFX . 'custom_post_type', 0 );
		$this->wfp_loader->add_action( 'init', $wfp_admin, WFP_PRFX . 'taxonomy_for_faqs', 0 );
		$this->wfp_loader->add_action( 'add_meta_boxes', $wfp_admin, WFP_PRFX . 'metaboxes' );
		$this->wfp_loader->add_action( 'save_post', $wfp_admin, WFP_PRFX . 'save_meta_value', 1, 1 );
		$this->wfp_loader->add_action( 'admin_init', $wfp_admin, WFP_PRFX . 'flush_rewrite' );
		$this->wfp_loader->add_filter( 'manage_wfp_faq_posts_columns', $wfp_admin, WFP_PRFX . 'add_faqs_columns' );
		
	}

	function wfp_trigger_front_hooks() {

		$wfp_front = new WFP_Front( $this->wfp_version() );
		$this->wfp_loader->add_action('wp_enqueue_scripts', $wfp_front, WFP_PRFX . 'front_assets');
		//$this->wfp_loader->add_action( 'wp_footer', $wfp_front, WFP_PRFX . 'display_content' );
		$wfp_front->wfp_load_shortcode();
	}

	function wfp_run() {
		$this->wfp_loader->wfp_run();
	}

	function wfp_version() {
		return $this->wfp_version;
	}

	function wfp_unregister_settings() {
		global $wpdb;

		$tbl = $wpdb->prefix . 'options';
		$search_string = WFP_PRFX . '%';

		$sql = $wpdb->prepare("SELECT option_name FROM $tbl WHERE option_name LIKE %s", $search_string);
		$options = $wpdb->get_results($sql, OBJECT);

		if ( is_array( $options ) && count( $options ) ) {
			
			foreach ( $options as $option ) {

				delete_option( $option->option_name );
				delete_site_option( $option->option_name );

			}

		}

	}
}