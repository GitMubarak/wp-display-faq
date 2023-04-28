<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;
$wfpActiveClass= '';

// Content Settings
foreach ( $wfpContentSettings as $option_name => $option_value ) {
  if ( isset( $wfpContentSettings[$option_name] ) ) {
    ${"" . $option_name}  = $option_value;
  }
}

// Loading Styles
include WFP_PATH . 'assets/css/styles.php';

// Shortcoded Options
$wfpCategory = isset( $wfpAttr['category'] ) ? $wfpAttr['category'] : '';
$wfpDisplay  = isset( $wfpAttr['display'] ) ? $wfpAttr['display'] : '';

$wfp_arr = array(
  'post_type'   => 'wfp_faq',
  'post_status' => 'publish',
  'orderby'     => $wfp_title_order_by,
  'order'       => $wfp_title_order,
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
            if ( 'right' !== $wfp_item_alignment ) {
              ?>
              <i class="fa-solid fa-laptop"></i>&nbsp;
              <?php
            }
          }

          the_title();

          if ( ! $wfp_hide_title_icon ) {
            if ( 'right' === $wfp_item_alignment ) {
              ?>
              &nbsp;<i class="fa-solid fa-laptop"></i>
              <?php
            }
          }
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