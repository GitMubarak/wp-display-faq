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

	private $wfp_version, $wfp_assets_prefix;

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

	function wfp_wc_add_product_tab( $tabs ) {

		$tabs['wfp-faqs'] = array(
			'title' => __( 'FAQs', 'woocommerce' ), // TAB TITLE
			'priority' => 100, // TAB SORTING (DESC 10, ADD INFO 20, REVIEWS 30)
			'callback' => array( $this, 'wfp_wc_faq_product_tab_content'), // TAB CONTENT CALLBACK
		);
		return $tabs;
	}

	function wfp_wc_faq_product_tab_content() {
		
		global $product;
		
		echo do_shortcode('[wp_display_faq product_id="' . $product->get_id() . '"]');
	}

	function wfp_get_open_close_close_icon( $open_icon ) {

		switch ( $open_icon ) {
			case 'check':
				$close_icon = 'times';
				break;
			case 'caret-square-down':
				$close_icon = 'caret-square-up';
				break;
			case 'level-down':
				$close_icon = 'level-up';
				break;
			case 'caret-down':
				$close_icon = 'caret-up';
				break;
			case 'arrow-down':
				$close_icon = 'arrow-up';
				break;
			case 'angle-double-down':
				$close_icon = 'angle-double-up';
				break;
			case 'angle-down':
				$close_icon = 'angle-up';
				break;
			case 'chevron-down':
				$close_icon = 'chevron-up';
				break;
			case 'arrow-circle-down':
				$close_icon = 'arrow-circle-up';
				break;
			default:
				$close_icon = 'minus';
				break;
		}

		return $close_icon;
	}
}
?>