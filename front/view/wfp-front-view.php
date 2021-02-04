<?php
if ( ! defined('ABSPATH') ) exit;

global $post;

// Getting General Styling Data
$wfpGeneralStyles       = stripslashes_deep( unserialize( get_option('wfp_search_styles') ) );
$wfp_title_font_color   = isset( $wfpGeneralStyles['wfp_title_font_color'] ) ? $wfpGeneralStyles['wfp_title_font_color'] : '#212121';
$wfp_title_font_size        = isset( $wfpGeneralStyles['wfp_title_font_size'] ) ? $wfpGeneralStyles['wfp_title_font_size'] : 12;
$wfp_title_bg_color     = isset( $wfpGeneralStyles['wfp_title_bg_color'] ) ? $wfpGeneralStyles['wfp_title_bg_color'] : '#FFFFFF';
$wfp_title_border_color = isset( $wfpGeneralStyles['wfp_title_border_color'] ) ? $wfpGeneralStyles['wfp_title_border_color'] : '#EAEAEA';
?>
<style type="text/css">
.wfp-collapsible {
  color: <?php esc_html_e( $wfp_title_font_color ); ?> !important;
  font-size: <?php esc_html_e( $wfp_title_font_size ); ?>px !important;
  background-color: <?php esc_html_e( $wfp_title_bg_color ); ?> !important;
  border-color: <?php esc_html_e( $wfp_title_border_color ); ?> !important;
}
.wfp-collapsible:after {
  font-size: <?php esc_html_e( $wfp_title_font_size ); ?>px !important;
}
</style>
<?php
// Shortcoded Options
$wfpCategory = isset( $wfpAttr['category'] ) ? $wfpAttr['category'] : '';
$wfpDisplay  = isset( $wfpAttr['display'] ) ? $wfpAttr['display'] : '';

$wfp_arr = array(
  'post_type'   => 'wfp_faq',
  'post_status' => 'publish',
  'orderby'     => 'menu_order',
  'order'       => 'ASC',
  'meta_query'  => array(
    'relation' => 'and',
    array(
      'key' => 'wfp_status',
      'value' => 'active',
      'compare' => '='
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

// If display params found in shortcode
if ( $wfpDisplay ) {
  $wfp_arr['posts_per_page'] = $wfpDisplay;
}

$WfpData = new WP_Query( $wfp_arr );

if ( $WfpData->have_posts() ) {

  while ( $WfpData->have_posts() ) {
    $WfpData->the_post();
    ?>
    <button class="wfp-collapsible"><?php the_title(); ?></button>
    <div class="wfp-content">
      <p>
        <?php the_content(); ?>
      </p>
    </div>
    <?php
  }

  /* Restore original Post Data */
  wp_reset_postdata();

} else {
  ?><p class="wfp-no-afaqs-found"><?php _e('No FAQs Found.', WFP_TXT_DOMAIN); ?></p><?php
}
?>