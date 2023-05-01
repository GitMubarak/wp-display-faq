<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

foreach ( $wfpStylesSettings as $option_name => $option_value ) {
    if ( isset( $wfpStylesSettings[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}
?>
<form name="wfp_general_style_form" role="form" class="form-horizontal" method="post" action="" id="wfp-general-style-form">
    <table class="wfp-general-style-settings-table">
        <!-- Item -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA;">
                <label><?php _e('Accordion Item', WFP_TXT_DOMAIN); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_bg_color"><?php esc_html_e('Background Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_bg_color" id="wfp_title_bg_color" value="<?php esc_attr_e( $wfp_title_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label for="wfp_title_border_color"><?php esc_html_e('Border Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_border_color" id="wfp_title_border_color" value="<?php esc_attr_e( $wfp_title_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_bg_color"><?php esc_html_e('Active Background Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-display-faq') . '</a>'; ?></span>
                    <?php
                }

                if ( wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <input class="wfp-wp-color" type="text" name="wfp_title_bg_color_active" id="wfp_title_bg_color_active" value="<?php esc_attr_e( $wfp_title_bg_color_active ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Item: Hover -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA;">
                <label><?php _e('Accordion Item - Hover', WFP_TXT_DOMAIN); ?></label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Background Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_bg_color_hover" id="wfp_title_bg_color_hover" value="<?php esc_attr_e( $wfp_title_bg_color_hover ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php esc_html_e('Border Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_border_color_hover" id="wfp_title_border_color_hover" value="<?php esc_attr_e( $wfp_title_border_color_hover ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA;">
                <label><?php _e('Accordion Title', WFP_TXT_DOMAIN); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_font_color"><?php esc_html_e('Font Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_font_color" id="wfp_title_font_color" value="<?php esc_attr_e( $wfp_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label for="wfp_title_font_size"><?php esc_html_e('Font Size', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="medium-textr" type="number" min="12" max="100" step="1" name="wfp_title_font_size" id="wfp_title_font_size" value="<?php esc_attr_e( $wfp_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_font_color"><?php esc_html_e('Active Font Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-display-faq') . '</a>'; ?></span>
                    <?php
                }

                if ( wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <input class="wfp-wp-color" type="text" name="wfp_title_font_color_active" id="wfp_title_font_color_active" value="<?php esc_attr_e( $wfp_title_font_color_active ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Open Close Icon -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA;">
                <label><?php _e('Open Close Icon', WFP_TXT_DOMAIN); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Active Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-display-faq') . '</a>'; ?></span>
                    <?php
                }

                if ( wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <input class="wfp-wp-color" type="text" name="wfp_open_close_icon_active_color" id="wfp_open_close_icon_active_color" value="<?php esc_attr_e( $wfp_open_close_icon_active_color ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Description -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA;">
                <label><?php _e('Accordion Content', WFP_TXT_DOMAIN); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Font Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_desc_font_color" id="wfp_desc_font_color" value="<?php esc_attr_e( $wfp_desc_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php esc_html_e('Font Size', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="medium-textr" type="number" min="12" max="46" step="1" name="wfp_desc_font_size" value="<?php esc_attr_e( $wfp_desc_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Background Color', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_desc_bg_color" id="wfp_desc_bg_color" value="<?php esc_attr_e( $wfp_desc_bg_color ); ?>">
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