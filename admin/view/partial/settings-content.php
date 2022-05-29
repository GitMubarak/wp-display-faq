<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

print_r( $wfpContentSettings );
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
            <td>
                <input type="text" name="wfp_item_font_family" class="regular-text" value="<?php esc_attr_e( $wfp_item_font_family ); ?>">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wfp_hide_title_icon"><?php _e('Hide Title Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="checkbox" name="wfp_hide_title_icon" id="wfp_hide_title_icon" value="1" <?php echo $wfp_hide_title_icon ? 'checked' : null; ?>>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Expand - Collapse Items', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
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
                <label><?php _e('Display Open/Close Icon', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="wfp_display_open_close_icon" id="wfp_display_open_close_icon_y" value="yes" <?php echo ( 'yes' === $wfp_display_open_close_icon ) ? 'checked' : ''; ?> >
                <label for="wfp_display_open_close_icon_y"><span></span><?php _e( 'Yes', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_display_open_close_icon" id="wfp_display_open_close_icon_n" value="no" <?php echo ( 'no' === $wfp_display_open_close_icon ) ? 'checked' : ''; ?> >
                <label for="wfp_display_open_close_icon_n"><span></span><?php _e( 'No', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Open/Close Icon Alignment', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_left" value="left" <?php echo ( 'left' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_left"><span></span><?php _e( 'Left', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_right" value="right" <?php echo ( 'right' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_right"><span></span><?php _e( 'Right', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Display Item Space', WFP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="radio" name="wfp_item_margin" id="wfp_item_margin_y" value="yes" <?php echo ( 'yes' === $wfp_item_margin ) ? 'checked' : ''; ?> >
                <label for="wfp_item_margin_y"><span></span><?php _e( 'Yes', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_item_margin" id="wfp_item_margin_n" value="no" <?php echo ( 'no' === $wfp_item_margin ) ? 'checked' : ''; ?> >
                <label for="wfp_item_margin_n"><span></span><?php _e( 'No', WFP_TXT_DOMAIN ); ?></label>
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