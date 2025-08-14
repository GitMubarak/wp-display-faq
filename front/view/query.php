<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Shortcoded Options
$wfpCategory = isset( $wfpAttr['category'] ) ? $wfpAttr['category'] : '';
$wfpDisplay  = isset( $wfpAttr['display'] ) ? $wfpAttr['display'] : '';
$product_id  = isset( $wfpAttr['product_id'] ) ? $wfpAttr['product_id'] : '';

if ( wdf_fs()->is_plan__premium_only('pro') ) {

    $content_animation  = isset( $wfpAttr['content_animation'] ) ? $wfpAttr['content_animation'] : $wdf_content_animation;
    $open_close_icon    = isset( $wfpAttr['open_close_icon'] ) ? $wfpAttr['open_close_icon'] : $open_close_icon;
    $wdf_accordion_icon = isset( $wfpAttr['title_icon'] ) ? $wfpAttr['title_icon'] : $wdf_accordion_icon;
    $wfp_title_bg_color = isset( $wfpAttr['title_bg_color'] ) ? $wfpAttr['title_bg_color'] : $wfp_title_bg_color;
    $wfp_title_font_color = isset( $wfpAttr['title_color'] ) ? $wfpAttr['title_color'] : $wfp_title_font_color;
}

$close_icon = $this->wfp_get_open_close_close_icon( $open_close_icon );

// Main Query
$wfp_arr = array(
    'post_type'   => 'wfp_faq',
    'post_status' => 'publish',
    'orderby'     => $wfp_title_order_by,
    'order'       => $wfp_title_order,
    'meta_query'  => array(
        'relation' => 'and',
        array(
            'key'       => 'wfp_status',
            'value'     => 'active',
            'compare'   => '='
        ),
    ),
);

// If Categor params found in shortcode
if ( $wfpCategory ) {

    $wfp_arr['tax_query'] = array(
        array(
            'taxonomy'  => 'wfp_faq_category',
            'field'     => 'name',
            'terms'     => $wfpCategory
        )
    );
}

// If Porduct ID params found in shortcode
if ( $product_id ) {

    if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
        $wfpDisplay = 5;
    }

    $wfp_arr['meta_query'][] = [
        'key'     => 'wfp_wc_product_id',
        'value'   => $product_id,
        'compare' => '='
    ];
}

// If display params found in shortcode
if ( $wfpDisplay ) {
    $wfp_arr['posts_per_page'] = $wfpDisplay;
}

// Loading Styles
include WFP_PATH . 'assets/css/styles.php';