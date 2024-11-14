<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

$wfp_status	        = get_post_meta( $post->ID, 'wfp_status', true );
$wfp_faq_for	    = get_post_meta( $post->ID, 'wfp_faq_for', true );
$wfp_wc_product_id	= get_post_meta( $post->ID, 'wfp_wc_product_id', true );
?>
<table class="form-table">
<tr class="wfp_faq_for">
    <th scope="row">
        <label for="wfp_faq_for"><?php _e('FAQ For', WFP_TXT_DOMAIN); ?>:</label>
    </th>
    <td>
        <input type="radio" name="wfp_faq_for" class="wfp_faq_for" id="wfp_faq_for_general" value="active" <?php echo ( 'inactive' !== esc_attr( $wfp_faq_for ) ) ? 'checked' : ''; ?> >
        <label for="wfp_faq_for_general"><span></span><?php _e( 'General', WFP_TXT_DOMAIN ); ?></label>
        &nbsp;&nbsp;
        <input type="radio" name="wfp_faq_for" class="wfp_faq_for" id="wfp_faq_for_wc" value="inactive" <?php echo ( 'inactive' === esc_attr( $wfp_faq_for ) ) ? 'checked' : ''; ?> >
        <label for="wfp_faq_for_wc"><span></span><?php _e( 'WooCommerce', WFP_TXT_DOMAIN ); ?></label>
    </td>
</tr>
<tr class="wfp_wc_product_id">
    <th scope="row">
        <label id="wfp_wc_product_id"><?php _e('Select WC Product', WFP_TXT_DOMAIN); ?></label>
    </th>
    <td>
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
            // WooCommerce Product List
            $wfp_wc_args = array(
                'status'            => array('publish'),
                'type'              => array_merge( array_keys( wc_get_product_types() ) ),
                'parent'            => null,
                'sku'               => '',
                'category'          => array(),
                'tag'               => array(),
                'limit'             => -1,
                'offset'            => null,
                'page'              => 1,
                'include'           => array(),
                'exclude'           => array(),
                'orderby'           => 'title',
                'order'             => 'ASC',
                'return'            => 'objects',
                'paginate'          => false,
                'shipping_class'    => array(),
            );

            $wfp_wc_products = wc_get_products( $wfp_wc_args );
            ?>
            <select name="wfp_wc_product_id" id="wbg-wc-product-list">
                <option value=""><?php _e('Select a Product', WFP_TXT_DOMAIN); ?></option>
                <?php
                foreach( $wfp_wc_products as $product ) {

                    $product_id   = $product->get_id();
                    $product_name = $product->get_name();
                    ?>
                    <option value="<?php esc_attr_e( $product_id ); ?>" <?php echo ( $wfp_wc_product_id == $product_id ) ? 'selected' : ''; ?>><?php esc_html_e( $product_name ); ?></option>
                    <?php
                }
                ?>
            </select>
            <?php
        }
        ?>
    </td>
</tr>
<tr class="wfp_status">
    <th scope="row">
        <label for="wfp_status"><?php _e('Status', WFP_TXT_DOMAIN); ?>:</label>
    </th>
    <td>
        <input type="radio" name="wfp_status" class="wfp_status" id="wfp_status_active" value="active" <?php echo ( 'inactive' !== esc_attr( $wfp_status ) ) ? 'checked' : ''; ?> >
        <label for="wfp_status_active"><span></span><?php _e( 'Active', WFP_TXT_DOMAIN ); ?></label>
        &nbsp;&nbsp;
        <input type="radio" name="wfp_status" class="wfp_status" id="wfp_status_inactive" value="inactive" <?php echo ( 'inactive' === esc_attr( $wfp_status ) ) ? 'checked' : ''; ?> >
        <label for="wfp_status_inactive"><span></span><?php _e( 'Inactive', WFP_TXT_DOMAIN ); ?></label>
    </td>
</tr>
</table>
<?php
?>