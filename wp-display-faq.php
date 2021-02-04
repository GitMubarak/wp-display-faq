<?php
/**
 * Plugin Name: 	Display FAQs
 * Plugin URI:		http://wordpress.org/plugins/wp-display-faq/
 * Description: 	This Plugin will display FAQs in your page by using the shortcode: [wp_display_faq]
 * Version: 		1.1
 * Author:		    HM Plugin
 * Author URI:	    https://hmplugin.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined('ABSPATH') ) exit;

define('WFP_PATH', plugin_dir_path(__FILE__));
define('WFP_ASSETS', plugins_url('/assets/', __FILE__));
define('WFP_SLUG', plugin_basename(__FILE__));
define('WFP_PRFX', 'wfp_');
define('WFP_CLS_PRFX', 'cls-wfp-');
define('WFP_TXT_DOMAIN', 'wp-display-faq');
define('WFP_VERSION', '1.1');

require_once WFP_PATH . 'inc/' . WFP_CLS_PRFX . 'master.php';
$wfp = new WFP_Master();
$wfp->wfp_run();

/* Sort team members like page order i.e. the number assigned */
function team_custom_post_order_sort( $query ){
    if ( $query->is_main_query() && is_post_type_archive( 'team' )){
      $query->set( 'orderby', 'menu_order' );
      $query->set( 'order' , 'DESC' );
    }
  }
  add_action( 'pre_get_posts' , 'team_custom_post_order_sort' );

register_deactivation_hook( __FILE__, array( $wfp, WFP_PRFX . 'unregister_settings' ) );