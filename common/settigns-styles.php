<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Trait For General Settings
*/
trait Wfp_Settings_Styles
{
    protected $fields, $settings, $options;
    
    protected function wfp_set_styles_settings( $post ) {

        $this->fields = $this->wfp_styles_option_fileds();

        $this->options  = $this->wfp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'wfp_styles_settings', $this->options, $post );

        return update_option( 'wfp_styles_settings', $this->settings );
    }

    protected function wfp_get_styles_settings() {

        $this->fields   = $this->wfp_styles_option_fileds();
		$this->settings = get_option('wfp_styles_settings');

        
        return $this->wfp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function wfp_styles_option_fileds() {

        return [
            [
                'name'      => 'wfp_title_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'wfp_title_border_color',
                'type'      => 'text',
                'default'   => '#EAEAEA',
            ],
            [
                'name'      => 'wfp_title_bg_color_hover',
                'type'      => 'text',
                'default'   => '#F2F2F2',
            ],
            [
                'name'      => 'wfp_title_border_color_hover',
                'type'      => 'text',
                'default'   => '#EAEAEA',
            ],
            [
                'name'      => 'wfp_title_font_color',
                'type'      => 'text',
                'default'   => '#212121',
            ],
            [
                'name'      => 'wfp_title_font_size',
                'type'      => 'text',
                'default'   => 22,
            ],
            [
                'name'      => 'wfp_desc_font_color',
                'type'      => 'text',
                'default'   => '#212121',
            ],
            [
                'name'      => 'wfp_desc_font_size',
                'type'      => 'text',
                'default'   => 14,
            ],
            [
                'name'      => 'wfp_desc_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'wfp_title_bg_color_active',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
        ];

    }
}