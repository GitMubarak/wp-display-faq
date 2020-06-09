<?php
/**
*	Front Parent Class
*/
class WFP_Front 
{	
	private $wfp_version;

	function __construct( $version ){
		$this->wfp_version = $version;
		$this->wfp_assets_prefix = substr(WFP_PRFX, 0, -1) . '-';
	}
	
	function wfp_front_assets(){
		
		wp_enqueue_style(	'wfp-front-style',
							WFP_ASSETS . 'css/' . $this->wfp_assets_prefix . 'front-style.css',
							array(),
							$this->wfp_version,
							FALSE );
		
							if( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(  'wfp-front-script',
							WFP_ASSETS . 'js/' . $this->wfp_assets_prefix . 'front-script.js',
							array('jquery'),
							$this->wfp_version,
							TRUE );
	}

	function wfp_load_shortcode() {
		add_shortcode( 'wp_faq_plugin', array( $this, 'wfp_load_shortcode_view' ) );
	}

	function wfp_load_shortcode_view() {

		$output = '';
		ob_start();
		include WFP_PATH . 'front/view/' . $this->wfp_assets_prefix . 'front-view.php';
		$output .= ob_get_clean();
		return $output;
	}
}
?>