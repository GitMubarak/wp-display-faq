<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Styles Settings
foreach ( $wfpStylesSettings as $ss_name => $ss_value ) {
    if ( isset( $wfpStylesSettings[$ss_name] ) ) {
      ${"" . $ss_name}  = $ss_value;
    }
}
?>
<style type="text/css">
.wfp-main-wrapper .wfp-collapsible {
  background-color: <?php esc_html_e( $wfp_title_bg_color ); ?>;
  border-color: <?php esc_html_e( $wfp_title_border_color ); ?>;
  margin-top: <?php echo ( 'yes' === $wfp_item_margin ) ? 5 : 0; ?>px;
  border-bottom: <?php echo ( 'yes' === $wfp_item_margin ) ? 1 : 0; ?>px solid <?php esc_html_e( $wfp_title_border_color ); ?>;
  transition: all 0.5s linear;
  text-align: <?php esc_html_e( $wfp_item_alignment ); ?>;
}
.wfp-main-wrapper .wfp-collapsible:hover {
  background-color: <?php esc_html_e( $wfp_title_bg_color_hover ); ?>;
  border-color: <?php esc_html_e( $wfp_title_border_color_hover ); ?>;
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
.wfp-main-wrapper .wfp-content,
.wfp-main-wrapper .wfp-content p {
  color: <?php esc_html_e( $wfp_desc_font_color ); ?>;
  font-size: <?php esc_html_e( $wfp_desc_font_size ); ?>px;
  line-height: <?php esc_html_e( $wfp_desc_font_size + 10 ); ?>px;
  background-color: <?php esc_html_e( $wfp_desc_bg_color ); ?>;
  text-align: <?php esc_html_e( $wfp_item_alignment ); ?>;
}
</style>