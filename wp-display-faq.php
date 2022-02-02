<?php
/**
 * Plugin Name: DisplayFaq - Accordion FAQs Plugin for WordPress
 * Plugin URI:  http://wordpress.org/plugins/wp-display-faq/
 * Description: This will display FAQs with Category in your website by using the shortcode: [wp_display_faq]
 * Version: 	1.4
 * Author:      HM Plugin
 * Author URI:  https://hmplugin.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined('ABSPATH') ) exit;

define('WFP_PATH', plugin_dir_path(__FILE__));
define('WFP_ASSETS', plugins_url('/assets/', __FILE__));
define('WFP_SLUG', plugin_basename(__FILE__));
define('WFP_PRFX', 'wfp_');
define('WFP_CLS_PRFX', 'cls-wfp-');
define('WFP_TXT_DOMAIN', 'wp-display-faq');
define('WFP_VERSION', '1.4');

require_once WFP_PATH . 'inc/' . WFP_CLS_PRFX . 'master.php';
$wfp = new WFP_Master();
$wfp->wfp_run();

// Donate link to plugin description
function wfp_donation_link_to_plugin_active( $links, $file ) {

    if ( WFP_SLUG === $file ) {
        
    $row_meta = array(
        'wfp_donation_link'  => '<a href="' . esc_url( 'https://www.paypal.me/mhmrajib/' ) . '" target="_blank" aria-label="' . __( 'Donate us', WFP_TXT_DOMAIN ) . '" style="color:green; font-weight: bold;">' . __( 'Donate us', WFP_TXT_DOMAIN ) . '</a>'
    );

    return array_merge( $links, $row_meta );
    }
    return (array) $links;
}
add_filter( 'plugin_row_meta', WFP_PRFX . 'donation_link_to_plugin_active', 10, 2 );

// Add Data To Custom Post Type Columns
function wfp_faq_column_data( $column, $post_id ) {

    switch ( $column ) {

        case 'status':
            echo ( 'active' !== get_post_meta( $post_id , 'wfp_status' , true ) ) ? '<b style="color:red;">' . __('Inactive', WFP_TXT_DOMAIN) . '</b>' : '<b style="color:green;">' . __('Active', WFP_TXT_DOMAIN) . '</b>';
            break;

    }
    
}
add_action( 'manage_wfp_faq_posts_custom_column' , 'wfp_faq_column_data', 10, 2 );

// Sorting Column
function wfp_list_table_sorting( $columns ) {

    $columns['status'] = 'Status';
    return $columns;

}
add_filter( 'manage_edit-wfp_faq_sortable_columns', 'wfp_list_table_sorting' );

register_deactivation_hook( __FILE__, array( $wfp, WFP_PRFX . 'unregister_settings' ) );