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

		$wfp_content_settings  = get_option('wfp_content_settings');
		$wdf_open_close_icon_first	= isset( $wfp_content_settings['wfp_open_close_icon'] ) ? $wfp_content_settings['wfp_open_close_icon'] : 'plus';

		switch ( $wdf_open_close_icon_first ) {
			case 'check':
				$wdf_open_close_icon_second = 'times';
				break;
			case 'caret-square-down':
				$wdf_open_close_icon_second = 'caret-square-up';
				break;
			case 'level-down':
				$wdf_open_close_icon_second = 'level-up';
				break;
			case 'caret-down':
				$wdf_open_close_icon_second = 'caret-up';
				break;
			case 'arrow-down':
				$wdf_open_close_icon_second = 'arrow-up';
				break;
			case 'angle-double-down':
				$wdf_open_close_icon_second = 'angle-double-up';
				break;
				case 'angle-down':
					$wdf_open_close_icon_second = 'angle-up';
					break;
					case 'chevron-down':
						$wdf_open_close_icon_second = 'chevron-up';
						break;
						case 'arrow-circle-down':
							$wdf_open_close_icon_second = 'arrow-circle-up';
							break;
			default:
				$wdf_open_close_icon_second = 'minus';
				break;
		}

		if ( wdf_fs()->is_plan__premium_only('pro') ) {
			$wdf_first = $wdf_open_close_icon_first;
			$wdf_second = $wdf_open_close_icon_second;
		}
		  
		if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
			$wdf_first = 'plus';
			$wdf_second = 'minus';
		}

		$wdfScriptArr = array(
			'first'		=> $wdf_first,
			'second'	=> $wdf_second,
		);

		wp_localize_script( 'wfp-front-script', 'wdfAdminScriptObj', $wdfScriptArr );
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
}
?>