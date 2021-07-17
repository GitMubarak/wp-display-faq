<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Trait For General Settings
*/
trait Wfp_Settings 
{
    protected $fields;
    
    protected function set_content_settings( $post ) {

        $wfp_content_settings_params = [];

        $this->fields = $this->content_option_fileds();

        $i=0;
        foreach ( $this->fields as $field => $value ) {

            if ( 'string' === $this->fields[$i]['type'] ) {

                $wfp_content_settings_params[$this->fields[$i]['name']] = isset( $post[$this->fields[$i]['name']] ) && filter_var( $post[$this->fields[$i]['name']], FILTER_SANITIZE_STRING ) ? $post[$this->fields[$i]['name']] : null;

            }
            $i++;
        }

        $wfpContentSettings = apply_filters( 'wfp_content_settings', $wfp_content_settings_params, $post );

        return update_option( 'wfp_content_settings', serialize( $wfpContentSettings ) );
    }

    protected function get_content_settings() {

        $this->fields           = $this->content_option_fileds();
		$wfpContentSettings     = stripslashes_deep( unserialize( get_option('wfp_content_settings') ) );
        $wfpContentSettingsData = [];
        $i=0;

        foreach ( $this->fields as $option_name => $option_value ) {
            $wfpContentSettingsData[$this->fields[$i]['name']]  = isset( $wfpContentSettings[$this->fields[$i]['name']] ) ? $wfpContentSettings[$this->fields[$i]['name']] : $this->fields[$i]['default'];
            $i++;
        }
        
        return $wfpContentSettingsData;
	}

    protected function content_option_fileds() {

        return [
            [
                'name'      => 'wfp_expand_collapse_item',
                'type'      => 'string',
                'default'   => null,
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