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
  $wdf_accordion_icon     = $wfp_title_icon;
  $open_close_icon        = $wfp_open_close_icon;
  $wdf_content_animation  = $wfp_content_animation;
}

if ( ! wdf_fs()->is_plan__premium_only('pro') ) {
  $wdf_accordion_icon     = 'fa-solid fa-laptop';
  $open_close_icon        = 'plus';
  $wdf_content_animation  = '';
}