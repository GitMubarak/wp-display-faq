<?php 
if ( ! defined('ABSPATH') ) exit;
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
            <th scope="row" colspan="2">
                <hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Expand/Collapse Items', WFP_TXT_DOMAIN); ?> :</label>
            </th>
            <td>
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_first" value="first" <?php echo ( 'first' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_first"><span></span><?php _e( 'Open First Item', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_all" value="all" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_all"><span></span><?php _e( 'Open All Items', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_expand_collapse_item" id="wfp_expand_collapse_item_none" value="none" <?php echo ( 'none' === $wfp_expand_collapse_item ) ? 'checked' : ''; ?> >
                <label for="wfp_expand_collapse_item_none"><span></span><?php _e( 'Close All Items', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Open/Close Icon Alignment', WFP_TXT_DOMAIN); ?> :</label>
            </th>
            <td>
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_left" value="left" <?php echo ( 'left' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_left"><span></span><?php _e( 'Left', WFP_TXT_DOMAIN ); ?></label>
                &nbsp;&nbsp;
                <input type="radio" name="wfp_op_cl_item_alignment" id="wfp_op_cl_item_alignment_right" value="right" <?php echo ( 'right' === $wfp_op_cl_item_alignment ) ? 'checked' : ''; ?> >
                <label for="wfp_op_cl_item_alignment_right"><span></span><?php _e( 'Right', WFP_TXT_DOMAIN ); ?></label>
            </td>
        </tr>
    </table>
    <p class="submit"><button id="updateGeneralContent" name="updateGeneralContent" class="button button-primary"><?php _e('Save Settings', WFP_TXT_DOMAIN); ?></button></p>
</form>