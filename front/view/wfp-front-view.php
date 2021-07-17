<?php
if ( ! defined('ABSPATH') ) exit;

global $post;
$wfpActiveClass= '';

// Getting General Styling Data
$wfpGeneralStyles       = stripslashes_deep( unserialize( get_option('wfp_styles_settings') ) );
$wfp_title_font_color   = isset( $wfpGeneralStyles['wfp_title_font_color'] ) ? $wfpGeneralStyles['wfp_title_font_color'] : '#212121';
$wfp_title_font_size    = isset( $wfpGeneralStyles['wfp_title_font_size'] ) ? $wfpGeneralStyles['wfp_title_font_size'] : 12;
$wfp_title_bg_color     = isset( $wfpGeneralStyles['wfp_title_bg_color'] ) ? $wfpGeneralStyles['wfp_title_bg_color'] : '#FFFFFF';
$wfp_title_border_color = isset( $wfpGeneralStyles['wfp_title_border_color'] ) ? $wfpGeneralStyles['wfp_title_border_color'] : '#EAEAEA';

// Content Settings
foreach ( $wfpContentSettings as $option_name => $option_value ) {
    
  if ( isset( $wfpContentSettings[$option_name] ) ) {

    ${"" . $option_name}  = $option_value;
  
  }
}
?>
<style type="text/css">
.wfp-collapsible {
  background-color: <?php esc_html_e( $wfp_title_bg_color ); ?> !important;
  border-color: <?php esc_html_e( $wfp_title_border_color ); ?> !important;
}
.wfp-collapsible .wfp_title_class,
.wfp-collapsible .wfp_open_cl_icon {
  color: <?php esc_html_e( $wfp_title_font_color ); ?> !important;
  font-size: <?php esc_html_e( $wfp_title_font_size ); ?>px !important;
}
.wfp-collapsible .wfp_open_cl_icon {
  float: <?php echo ( 'left' === $wfp_op_cl_item_alignment ) ? 'left' : 'right'; ?>!important;
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
  $dfC = 1;
  while ( $WfpData->have_posts() ) {

    $WfpData->the_post();
    ?>
    <button class="wfp-collapsible <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'active' : null; ?>">
      <?php
      if ( 'yes' === $wfp_display_open_close_icon ) {
        ?>
        <span class="wfp_open_cl_icon fa fa-plus"></span>
        <?php
      }
      ?>
      <span class="wfp_title_class"><?php the_title(); ?></span>
    </button>
    <div class="wfp-content <?php echo ( ( 1 === $dfC ) && ( 'first' === $wfp_expand_collapse_item ) ) ? 'active-first' : null; ?>" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'style="max-height: max-content!important;"' : null; ?>>
      <?php the_content(); ?>
    </div>
    <?php
    $dfC++;
  }

  /* Restore original Post Data */
  wp_reset_postdata();

} else {
  ?>
  <p class="wfp-no-afaqs-found"><?php _e('No FAQ Found.', WFP_TXT_DOMAIN); ?></p>
  <?php
}
?>