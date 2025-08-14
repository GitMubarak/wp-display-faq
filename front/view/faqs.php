<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'header.php';

include 'query.php';

$WfpData = new WP_Query( $wfp_arr );

if ( $WfpData->have_posts() ) {
  ?>
  <div class="wfp-main-wrapper">
    <?php
    $dfC = 1;
    while ( $WfpData->have_posts() ) {

      $WfpData->the_post();
      ?>
      <button class="wfp-collapsible <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'active' : null; ?>" 
        style="background-color: <?php esc_attr_e( $wfp_title_bg_color ); ?>; color: <?php esc_attr_e( $wfp_title_font_color ); ?>;">
        <?php
        if ( 'yes' === $wfp_display_open_close_icon ) {
          ?>
          <span class="wfp_open_cl_icon fa fa-<?php esc_attr_e( $open_close_icon ); ?>" data-open-icon="<?php esc_attr_e( $open_close_icon ); ?>" data-close-icon="<?php esc_attr_e( $close_icon ); ?>"
            style="color: <?php esc_attr_e( $wfp_title_font_color ); ?>;"></span>
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
      <div class="wfp-content <?php echo ( ( 1 === $dfC ) && ( 'first' === $wfp_expand_collapse_item ) ) ? 'active-first' : null; ?>" <?php echo ( 'all' === $wfp_expand_collapse_item ) ? 'style="max-height: max-content!important;"' : null; ?> data-anim-type="<?php esc_attr_e( $content_animation ); ?>">
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