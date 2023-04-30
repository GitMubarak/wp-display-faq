<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $wfpContentSettings );
foreach ( $wfpContentSettings as $option_name => $option_value ) {
    if ( isset( $wfpContentSettings[$option_name] ) ) {
        ${"" . $option_name}  = $option_value;
    }
}
?>
<form name="wfp_general_content_form" role="form" class="form-horizontal" method="post" action="" id="wfp-general-content-form">
    <table class="wfp-general-content-settings-table">
        <tr>
            <th scope="row">
                <label><?php _e('Title Font Family', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="wfp_item_font_family" class="regular-text" value="<?php esc_attr_e( $wfp_item_font_family ); ?>">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Content Alignment', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_item_alignment" id="wfp_item_alignment_l" value="left" <?php echo ( 'left' === $wfp_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_item_alignment_l"><span></span><?php _e( 'Left', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_item_alignment" id="wfp_item_alignment_c" value="center" <?php echo ( 'center' === $wfp_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_item_alignment_c"><span></span><?php _e( 'Center', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_item_alignment" id="wfp_item_alignment_r" value="right" <?php echo ( 'right' === $wfp_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_item_alignment_r"><span></span><?php _e( 'Right', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_hide_title_icon"><?php _e('Hide Accordion Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="checkbox" name="wfp_hide_title_icon" id="wfp_hide_title_icon" value="1" <?php echo $wfp_hide_title_icon ? 'checked' : null; ?>>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Accordion Title Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="wfp_title_icon" data-placement="bottomRight" class="regular-text icp icp-auto" value="<?php esc_attr_e( $wfp_title_icon ); ?>">
                &nbsp;&nbsp;
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-top-news') . '</a>'; ?></span>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Title Order By', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <select name="wfp_title_order_by" class="medium-text">
                    <option value="">--<?php _e('Select One', WFP_TXT_DOMAIN); ?>--</option>
                    <option value="title" <?php echo ( 'title' === $wfp_title_order_by ) ? 'selected' : ''; ?> ><?php _e('Title', WFP_TXT_DOMAIN); ?></option>
                    <option value="date" <?php echo ( 'date' === $wfp_title_order_by ) ? 'selected' : ''; ?> ><?php _e('Date', WFP_TXT_DOMAIN); ?></option>
                    <option value="menu_order" <?php echo ( 'menu_order' === $wfp_title_order_by ) ? 'selected' : ''; ?> ><?php _e('Menu Order', WFP_TXT_DOMAIN); ?></option>
                </select>
            </td>
            <th scope="row">
                <label><?php _e('Order', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="wfp_title_order" id="wfp_title_order_a" value="ASC" <?php echo ( 'DESC' !== $wfp_title_order ) ? 'checked' : ''; ?> >
                <label for="wfp_title_order_a"><span></span><?php _e( 'Ascending', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_title_order" id="wfp_title_order_d" value="DESC" <?php echo ( 'DESC' === $wfp_title_order ) ? 'checked' : ''; ?> >
                <label for="wfp_title_order_d"><span></span><?php _e( 'Descending', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Expand - Collapse Items', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_first" value="first" <?php echo ( 'first' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_first"><span></span><?php _e( 'Open First', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_all" value="all" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_all"><span></span><?php _e( 'Open All', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_none" value="none" <?php echo ( 'none' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_none"><span></span><?php _e( 'Close All', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Display Open Close Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_display_open_close_icon" id="wfp_display_open_close_icon_y" value="yes" <?php echo ( 'yes' === $wfp_display_open_close_icon ) ? 'checked' : ''; ?> >
                <label for="wfp_display_open_close_icon_y"><span></span><?php _e( 'Yes', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_display_open_close_icon" id="wfp_display_open_close_icon_n" value="no" <?php echo ( 'no' === $wfp_display_open_close_icon ) ? 'checked' : ''; ?> >
                <label for="wfp_display_open_close_icon_n"><span></span><?php _e( 'No', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Open Close Icon Alignment', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_left" value="left" <?php echo ( 'left' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_left"><span></span><?php _e( 'Left', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_right" value="right" <?php echo ( 'right' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_right"><span></span><?php _e( 'Right', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Open Close Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_one" value="plus" <?php echo ( 'plus' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_one" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-plus"></i></span>
                    <span><i class="fa fa-minus"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_two" value="check" <?php echo ( 'check' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_two" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-check"></i></span>
                    <span><i class="fa fa-times"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_three" value="caret-square-down" <?php echo ( 'caret-square-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_three" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-caret-square-down"></i></span>
                    <span><i class="fa fa-caret-square-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_four" value="level-down" <?php echo ( 'level-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_four" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-level-down"></i></span>
                    <span><i class="fa fa-level-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_five" value="caret-down" <?php echo ( 'caret-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_five" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-caret-down"></i></span>
                    <span><i class="fa fa-caret-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_six" value="arrow-down" <?php echo ( 'arrow-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_six" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-arrow-down"></i></span>
                    <span><i class="fa fa-arrow-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_seven" value="angle-double-down" <?php echo ( 'angle-double-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_seven" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-angle-double-down"></i></span>
                    <span><i class="fa fa-angle-double-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_eight" value="angle-down" <?php echo ( 'angle-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_eight" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-angle-down"></i></span>
                    <span><i class="fa fa-angle-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_nine" value="chevron-down" <?php echo ( 'chevron-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_nine" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-chevron-down"></i></span>
                    <span><i class="fa fa-chevron-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_open_close_icon" id="wfp_open_close_icon_ten" value="arrow-circle-down" <?php echo ( 'arrow-circle-down' === $wfp_open_close_icon ) ? 'checked' : ''; ?>>
                <label for="wfp_open_close_icon_ten" class="wdf-open-close-icon-select-item">
                    <span><i class="fa fa-arrow-circle-down"></i></span>
                    <span><i class="fa fa-arrow-circle-up"></i></span>
                </label>
                &nbsp;&nbsp;
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-top-news') . '</a>'; ?></span>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Display Item Space', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="radio" name="wfp_item_margin" id="wfp_item_margin_y" value="yes" <?php echo ( 'yes' === $wfp_item_margin ) ? 'checked' : ''; ?> >
                <label for="wfp_item_margin_y"><span></span><?php _e( 'Yes', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_item_margin" id="wfp_item_margin_n" value="no" <?php echo ( 'no' === $wfp_item_margin ) ? 'checked' : ''; ?> >
                <label for="wfp_item_margin_n"><span></span><?php _e( 'No', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Content Animation', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <select name="wfp_content_animation" class="medium-text">
                    <option value=""><?php _e('Select One', WFP_TXT_DOMAIN); ?></option>
                    <option value="FadeIn" <?php echo ( 'FadeIn' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('FadeIn', WFP_TXT_DOMAIN); ?></option>
                    <option value="LineUp" <?php echo ( 'LineUp' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('LineUp', WFP_TXT_DOMAIN); ?></option>
                    <option value="FlipX" <?php echo ( 'FlipX' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('FlipX', WFP_TXT_DOMAIN); ?></option>
                    <option value="FlipY" <?php echo ( 'FlipY' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('FlipY', WFP_TXT_DOMAIN); ?></option>
                    <option value="PopOutIn" <?php echo ( 'PopOutIn' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('PopOutIn', WFP_TXT_DOMAIN); ?></option>
                    <option value="FromTop" <?php echo ( 'FromTop' === $wfp_content_animation ) ? 'selected' : ''; ?> ><?php _e('FromTop', WFP_TXT_DOMAIN); ?></option>
                </select>
                &nbsp;&nbsp;
                <?php
                if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
                    ?>
                    <span><?php echo '<a href="' . wdf_fs()->get_upgrade_url() . '">' . __('Available In Premium Version', 'wp-top-news') . '</a>'; ?></span>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Shortcode', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="wfp_shortcode" id="wfp_shortcode" class="medium-text" value="[wp_display_faq]" readonly />
                <code><?php _e('Copy this shortcode and apply it to any page to display FAQs.', WFP_TXT_DOMAIN); ?></code>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateGeneralContent" name="updateGeneralContent" class="button button-primary wfp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', WFP_TXT_DOMAIN); ?>
        </button>
    </p>
</form>