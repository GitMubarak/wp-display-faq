<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Trait For General Settings
*/
trait Wfp_Settings 
{
    protected $fields, $settings, $options;
    
    protected function wfp_set_content_settings( $post ) {

        $this->fields = $this->wfp_content_option_fileds();

        $this->options  = $this->wfp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'wfp_content_settings', $this->options, $post );

        return update_option( 'wfp_content_settings', $this->settings );
    }

    protected function wfp_get_content_settings() {

        $this->fields   = $this->wfp_content_option_fileds();
		$this->settings = get_option('wfp_content_settings');

        
        return $this->wfp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function wfp_content_option_fileds() {

        return [
            [
                'name'      => 'wfp_item_font_family',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'wfp_hide_title_icon',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'wfp_expand_collapse_item',
                'type'      => 'string',
                'default'   => 'first',
            ],
            [
                'name'      => 'wfp_title_order_by',
                'type'      => 'string',
                'default'   => 'title',
            ],
            [
                'name'      => 'wfp_title_order',
                'type'      => 'string',
                'default'   => 'DESC',
            ],
            [
                'name'      => 'wfp_op_cl_item_alignment',
                'type'      => 'string',
                'default'   => 'right',
            ],
            [
                'name'      => 'wfp_display_open_close_icon',
                'type'      => 'string',
                'default'   => 'yes',
            ],
            [
                'name'      => 'wfp_item_margin',
                'type'      => 'string',
                'default'   => 'yes',
            ],
        ];

    }
}