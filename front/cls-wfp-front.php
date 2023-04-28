<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Master Class: Front
*/
class WFP_Front 
{
	use Wfp_Core, Wfp_Settings_Content, Wfp_Settings_Styles;

	private $wfp_version;

	function __construct( $version ) {

		$this->wfp_version = $version;
		$this->wfp_assets_prefix = substr(WFP_PRFX, 0, -1) . '-';
		
	}
	
	function wfp_front_assets() {
		
		wp_enqueue_style(
			$this->wfp_assets_prefix . 'font-awesome',
			WFP_ASSETS .'css/fontawesome/css/all.min.css',
			array(),
			$this->wfp_version,
			FALSE
		);

		wp_enqueue_style(
			'wfp-front-style',
			WFP_ASSETS . 'css/' . $this->wfp_assets_prefix . 'front.css',
			array(),
			$this->wfp_version,
			FALSE
		);
		
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(
			'wfp-front-script',
			WFP_ASSETS . 'js/' . $this->wfp_assets_prefix . 'front.js',
			array('jquery'),
			$this->wfp_version,
			TRUE
		);
	}

	function wfp_load_shortcode() {
		add_shortcode( 'wp_display_faq', array( $this, 'wfp_load_shortcode_view' ) );
	}

	function wfp_load_shortcode_view( $wfpAttr ) {

		$wfpContentSettings	= $this->wfp_get_content_settings();
		$wfpStylesSettings	= $this->wfp_get_styles_settings();

		$output = '';
		ob_start();
		include WFP_PATH . 'front/view/faqs.php';
		$output .= ob_get_clean();
		return $output;
	}
}
?>