<?php
/**
 * Plugin Name: 	WP Display FAQ
 * Plugin URI:		http://wordpress.org/plugins/wp-display-faq/
 * Description: 	This Plugin will display FAQs in your page by using the shortcode: [wp_display_faq]
 * Version: 		1.0
 * Author: 			Hossni Mubarak
 * Author URI: 		http://www.hossnimubarak.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
*/

if (!defined('ABSPATH')) exit;

define('WFP_PATH', plugin_dir_path(__FILE__));
define('WFP_ASSETS', plugins_url('/assets/', __FILE__));
define('WFP_SLUG', plugin_basename(__FILE__));
define('WFP_PRFX', 'wfp_');
define('WFP_CLS_PRFX', 'cls-wfp-');
define('WFP_TXT_DOMAIN', 'wp-display-faq');
define('WFP_VERSION', '1.0');

require_once WFP_PATH . 'inc/' . WFP_CLS_PRFX . 'master.php';
$wfp = new WFP_Master();
$wfp->wfp_run();

register_deactivation_hook( __FILE__, array( $wfp, WFP_PRFX . 'unregister_settings' ) );