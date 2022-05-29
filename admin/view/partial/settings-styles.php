<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
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
    <hr>
    <p class="submit">
        <button id="updateGeneralStyles" name="updateGeneralStyles" class="button button-primary wfp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php esc_html_e('Save Settings', WFP_TXT_DOMAIN); ?>
        </button>
    </p>
</form>