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

if ( wdf_fs()->is_plan__premium_only('pro') ) {
  $wdf_accordion_icon = $wfp_title_icon;
  $wdf_open_close_icon = $wfp_open_close_icon;
  $wdf_content_animation = $wfp_content_animation;
}

if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
  $wdf_accordion_icon = 'fa-solid fa-laptop';
  $wdf_open_close_icon = 'plus';
  $wdf_content_animation = '';
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
          <span class="wfp_open_cl_icon fa fa-<?php esc_attr_e( $wdf_open_close_icon ); ?>"></span>
          <?php
        }

        echo '<' . esc_attr( $wfp_title_html_tag ) . ' class="wfp_title_class">';
        
          if ( ! $wfp_hide_title_icon ) {
            if ( 'right' !== $wfp_item_alignment ) {
              ?>
              <i class="<?php esc_attr_e( $wdf_accordion_icon ); ?>"></i>&nbsp;
              <?php
            }
          }

          the_title();

          if ( ! $wfp_hide_title_icon ) {
            if ( 'right' === $wfp_item_alignment ) {
              ?>
              &nbsp;<i class="<?php esc_attr_e( $wdf_accordion_icon ); ?>"></i>
              <?php
            }
          }

        echo '</' . esc_attr( $wfp_title_html_tag ) . '>';
        ?>
      </button>
      <div class="wfp-content <?php echo ( ( 1 === $dfC ) && ( 'first' === $wfp_expand_collapse_item ) ) ? 'active-first' : null; ?>" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'style="max-height: max-content!important;"' : null; ?> data-anim-type="<?php esc_attr_e( $wdf_content_animation ); ?>">
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