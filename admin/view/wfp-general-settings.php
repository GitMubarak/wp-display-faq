<?php
if ( ! defined('ABSPATH') ) exit;

$wfpGeneralMessage = false;

if ( isset( $_POST['updateGeneralStyles'] ) ) {
    
    $wfpGeneralStylesInfo = array(
        'wfp_title_font_color'      => isset( $_POST['wfp_title_font_color'] ) ? sanitize_text_field( $_POST['wfp_title_font_color'] ) : '#212121',
        'wfp_title_font_size'       => isset( $_POST['wfp_title_font_size'] ) ? sanitize_text_field( $_POST['wfp_title_font_size'] ) : 12,
        'wfp_title_bg_color'        => isset( $_POST['wfp_title_bg_color'] ) ? sanitize_text_field( $_POST['wfp_title_bg_color'] ) : '#FFFFFF',
        'wfp_title_border_color'    => isset( $_POST['wfp_title_border_color'] ) ? sanitize_text_field( $_POST['wfp_title_border_color'] ) : '#EAEAEA',
    );
    
    $wfpGeneralMessage = update_option( 'wfp_search_styles', serialize( $wfpGeneralStylesInfo ) );
}

$wfpGeneralStyles           = stripslashes_deep( unserialize( get_option('wfp_search_styles') ) );
$wfp_title_font_color       = isset( $wfpGeneralStyles['wfp_title_font_color'] ) ? $wfpGeneralStyles['wfp_title_font_color'] : '#212121';
$wfp_title_font_size        = isset( $wfpGeneralStyles['wfp_title_font_size'] ) ? $wfpGeneralStyles['wfp_title_font_size'] : 12;
$wfp_title_bg_color         = isset( $wfpGeneralStyles['wfp_title_bg_color'] ) ? $wfpGeneralStyles['wfp_title_bg_color'] : '#FFFFFF';
$wfp_title_border_color     = isset( $wfpGeneralStyles['wfp_title_border_color'] ) ? $wfpGeneralStyles['wfp_title_border_color'] : '#EAEAEA';
?>
<div id="wph-wrap-all" class="wrap wfp-general-settings-page">

    <div class="settings-banner">
        <h2><?php _e('General Settings', WFP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $wfpGeneralMessage ) {
            $this->wfp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="hmacs-wrap">

    <nav class="nav-tab-wrapper">
        <a href="?post_type=wfp_faq&page=wfp-general-settings&tab=settings" class="nav-tab <?php if ( $wfpTab !== 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Content Settings', WFP_TXT_DOMAIN); ?></a>
        <a href="?post_type=wfp_faq&page=wfp-general-settings&tab=styles" class="nav-tab <?php if ( $wfpTab === 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Styles Settings', WFP_TXT_DOMAIN); ?></a>
    </nav>

    <div class="hmacs_personal_wrap hmacs_personal_help" style="width: 895px; float: left; margin-top: 5px;">
        
        <div class="tab-content">
            <?php 
            switch ( $wfpTab ) {
                case 'styles':
                    ?>
                    <h3><?php _e('Styles Settings::', WFP_TXT_DOMAIN); ?></h3>

                    <form name="wfp_general_style_form" role="form" class="form-horizontal" method="post" action="" id="wfp-general-style-form">
                        <table class="wfp-general-style-settings-table">
                            <tr class="wfp_btn_color">
                                <th scope="row" colspan="2">
                                    <label><?php _e('FAQ Title', WFP_TXT_DOMAIN); ?></label>
                                    <hr>
                                </th>
                            </tr>
                            <tr class="wfp_title_font_color">
                                <th scope="row">
                                    <label for="wfp_title_font_color"><?php esc_html_e('Font Color:', WFP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="wfp-wp-color" type="text" name="wfp_title_font_color" id="wfp_title_font_color" value="<?php esc_attr_e( $wfp_title_font_color ); ?>">
                                    <div id="colorpicker"></div>
                                </td>
                            </tr>
                            <tr class="wfp_title_font_size">
                                <th scope="row">
                                    <label for="wfp_title_font_size"><?php esc_html_e('Font Size:', WFP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="medium-textr" type="number" min="12" max="46" step="1" name="wfp_title_font_size" id="wfp_title_font_size" value="<?php esc_attr_e( $wfp_title_font_size ); ?>">
                                    <code>px</code>
                                </td>
                            </tr>
                            <tr class="wfp_title_bg_color">
                                <th scope="row">
                                    <label for="wfp_title_bg_color"><?php esc_html_e('Background Color:', WFP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="wfp-wp-color" type="text" name="wfp_title_bg_color" id="wfp_title_bg_color" value="<?php esc_attr_e( $wfp_title_bg_color ); ?>">
                                    <div id="colorpicker"></div>
                                </td>
                            </tr>
                            <tr class="wfp_title_border_color">
                                <th scope="row">
                                    <label for="wfp_title_border_color"><?php esc_html_e('Border Color:', WFP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="wfp-wp-color" type="text" name="wfp_title_border_color" id="wfp_title_border_color" value="<?php esc_attr_e( $wfp_title_border_color ); ?>">
                                    <div id="colorpicker"></div>
                                </td>
                            </tr>
                        </table>
                        <p class="submit"><button id="updateGeneralStyles" name="updateGeneralStyles" class="button button-primary"><?php esc_attr_e('Save Settings', WFP_TXT_DOMAIN); ?></button></p>
                    </form>
                    <?php
                    break;
                default:
                    ?>
                    <h3><?php _e('Content Settings:', WFP_TXT_DOMAIN); ?></h3>
                    <?php _e('Please go to Styles Settings', WFP_TXT_DOMAIN); ?>
                    <?php
                    break;
            } 
            ?>
        </div>
    
    </div>

</div>