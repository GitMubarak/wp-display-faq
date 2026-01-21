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
            <th scope="row" colspan="4" style="background-color: #EAEAEA; text-align:left;">
                <label><?php _e('Accordion Item', 'wp-display-faq'); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_bg_color"><?php esc_html_e('Background Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_bg_color" id="wfp_title_bg_color" value="<?php esc_attr_e( $wfp_title_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label for="wfp_title_border_color"><?php esc_html_e('Border Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_border_color" id="wfp_title_border_color" value="<?php esc_attr_e( $wfp_title_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_bg_color"><?php esc_html_e('Active Background Color', 'wp-display-faq'); ?></label>
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
            <th scope="row" colspan="4" style="background-color: #EAEAEA; text-align:left;">
                <label><?php _e('Accordion Item - Hover', 'wp-display-faq'); ?></label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Background Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_bg_color_hover" id="wfp_title_bg_color_hover" value="<?php esc_attr_e( $wfp_title_bg_color_hover ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php esc_html_e('Border Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_border_color_hover" id="wfp_title_border_color_hover" value="<?php esc_attr_e( $wfp_title_border_color_hover ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA; text-align:left;">
                <label><?php _e('Accordion Title', 'wp-display-faq'); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_title_font_color"><?php esc_html_e('Font Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_title_font_color" id="wfp_title_font_color" value="<?php esc_attr_e( $wfp_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label for="wfp_title_font_size"><?php esc_html_e('Font Size', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="medium-textr" type="number" min="12" max="100" step="1" name="wfp_title_font_size" id="wfp_title_font_size" value="<?php esc_attr_e( $wfp_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Active Font Color', 'wp-display-faq'); ?></label>
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
            <th scope="row">
                <label><?php esc_html_e('Weight', 'wp-display-faq'); ?></label>
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
                    <select name="wfp_title_font_weight" class="normal-text">
                        <option value=""><?php _e('Normal', 'wp-display-faq'); ?></option>
                        <option value="100" <?php echo ( '100' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('100 (Thin)', 'wp-display-faq'); ?></option>
                        <option value="200" <?php echo ( '200' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('200 (Extra Light)', 'wp-display-faq'); ?></option>
                        <option value="300" <?php echo ( '300' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('300 (Light)', 'wp-display-faq'); ?></option>
                        <option value="400" <?php echo ( '400' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('400 (Normal)', 'wp-display-faq'); ?></option>
                        <option value="500" <?php echo ( '500' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('500 (Medium)', 'wp-display-faq'); ?></option>
                        <option value="600" <?php echo ( '600' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('600 (Semi Bold)', 'wp-display-faq'); ?></option>
                        <option value="700" <?php echo ( '700' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('700 (Bold)', 'wp-display-faq'); ?></option>
                        <option value="800" <?php echo ( '800' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('800 (Extra Bold)', 'wp-display-faq'); ?></option>
                        <option value="900" <?php echo ( '900' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('900 (Black)', 'wp-display-faq'); ?></option>
                        <option value="bold" <?php echo ( 'bold' === $wfp_title_font_weight ) ? 'selected' : ''; ?>><?php _e('Bold', 'wp-display-faq'); ?></option>
                    </select>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Transform', 'wp-display-faq'); ?></label>
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
                    <select name="wfp_title_font_transform" class="normal-text">
                        <option value=""><?php _e('Normal', 'wp-display-faq'); ?></option>
                        <option value="uppercase" <?php echo ( 'uppercase' === $wfp_title_font_transform ) ? 'selected' : ''; ?>><?php _e('Uppercase', 'wp-display-faq'); ?></option>
                        <option value="lowercase" <?php echo ( 'lowercase' === $wfp_title_font_transform ) ? 'selected' : ''; ?>><?php _e('Lowercase', 'wp-display-faq'); ?></option>
                        <option value="capitalize" <?php echo ( 'capitalize' === $wfp_title_font_transform ) ? 'selected' : ''; ?>><?php _e('Capitalize', 'wp-display-faq'); ?></option>
                    </select>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php esc_html_e('Style', 'wp-display-faq'); ?></label>
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
                    <select name="wfp_title_font_style" class="normal-text">
                        <option value="normal"><?php _e('Normal', 'wp-display-faq'); ?></option>
                        <option value="italic" <?php echo ( 'italic' === $wfp_title_font_style ) ? 'selected' : ''; ?>><?php _e('Italic', 'wp-display-faq'); ?></option>
                    </select>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Open Close Icon -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA; text-align:left;">
                <label><?php _e('Open Close Icon', 'wp-display-faq'); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Active Color', 'wp-display-faq'); ?></label>
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
            <th scope="row">
                <label for="wfp_title_font_size"><?php esc_html_e('Spacing', 'wp-display-faq'); ?></label>
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
                    <input class="medium-textr" type="number" min="0" max="100" step="1" name="wfp_open_close_icon_spacing" id="wfp_open_close_icon_spacing" value="<?php esc_attr_e( $wfp_open_close_icon_spacing ); ?>">
                    <code>px</code>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Description -->
        <tr>
            <th scope="row" colspan="4" style="background-color: #EAEAEA; text-align:left;">
                <label><?php _e('Accordion Content', 'wp-display-faq'); ?> ::</label>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Font Color', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="wfp-wp-color" type="text" name="wfp_desc_font_color" id="wfp_desc_font_color" value="<?php esc_attr_e( $wfp_desc_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php esc_html_e('Font Size', 'wp-display-faq'); ?></label>
            </th>
            <td>
                <input class="medium-textr" type="number" min="12" max="46" step="1" name="wfp_desc_font_size" value="<?php esc_attr_e( $wfp_desc_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php esc_html_e('Background Color', 'wp-display-faq'); ?></label>
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
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php esc_html_e('Save Settings', 'wp-display-faq'); ?>
        </button>
    </p>
</form>