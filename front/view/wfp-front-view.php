<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
.wfp-main-wrapper .wfp-collapsible {
  background-color: <?php esc_html_e( $wfp_title_bg_color ); ?>;
  border-color: <?php esc_html_e( $wfp_title_border_color ); ?>;
  margin-bottom: <?php echo ( 'yes' === $wfp_item_margin ) ? 5 : 0; ?>px;
  border-bottom: <?php echo ( 'yes' === $wfp_item_margin ) ? 1 : 0; ?>px solid <?php esc_html_e( $wfp_title_border_color ); ?>;
}
.wfp-main-wrapper .wfp-collapsible .wfp_title_class,
.wfp-main-wrapper .wfp-collapsible .wfp_open_cl_icon {
  color: <?php esc_html_e( $wfp_title_font_color ); ?>;
  font-size: <?php esc_html_e( $wfp_title_font_size ); ?>px;
  line-height: <?php esc_html_e( $wfp_title_font_size + 10 ); ?>px;
  <?php echo ( '' !== $wfp_item_font_family ) ? 'font-family:' . esc_attr( $wfp_item_font_family ) : ''; ?>;
}
.wfp-main-wrapper .wfp-collapsible .wfp_open_cl_icon {
  float: <?php echo ( 'left' === $wfp_op_cl_item_alignment ) ? 'left' : 'right'; ?>;
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
  ?>
  <div class="wfp-main-wrapper">
    <?php
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
        <span class="wfp_title_class">
          <?php
          if ( ! $wfp_hide_title_icon ) {
            ?><i class="fa-solid fa-laptop"></i>&nbsp;<?php
          }
          the_title(); 
          ?>
        </span>
      </button>
      <div class="wfp-content <?php echo ( ( 1 === $dfC ) && ( 'first' === $wfp_expand_collapse_item ) ) ? 'active-first' : null; ?>" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'style="max-height: max-content!important;"' : null; ?>>
        <?php the_content(); ?>
      </div>
      <?php
      $dfC++;
    }
    wp_reset_postdata();
    ?>
  </div>
  <?php
} else {
  ?>
  <p class="wfp-no-afaqs-found"><?php _e('No FAQ Found.', WFP_TXT_DOMAIN); ?></p>
  <?php
}
?>