<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
// Create a helper function for easy SDK access.

if ( ! function_exists( 'wdf_fs' ) ) {
    // Create a helper function for easy SDK access.
    function wdf_fs() {
        global $wdf_fs;

        if ( ! isset( $wdf_fs ) ) {
            // Include Freemius SDK.
            require_once WFP_PATH . '/freemius/start.php';

            $wdf_fs = fs_dynamic_init( array(
                'id'                  => '12566',
                'slug'                => 'wp-display-faq',
                'type'                => 'plugin',
                'public_key'          => 'pk_b6308b7e9d0a0183ec0acfe8d2886',
                'is_premium'          => true,
                'premium_suffix'      => 'Professional',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=wfp_faq',
                ),
                'secret_key'          => 'sk_9@$%i%1mn6~rAZ5[e(A0lRf[&yGZj',
            ) );
        }

        return $wdf_fs;
    }

    // Init Freemius.
    wdf_fs();
    // Signal that SDK was initiated.
    do_action( 'wdf_fs_loaded' );
    
    function wdf_fs_support_forum_url( $wp_support_url )
    {
        return 'https://wordpress.org/support/plugin/wp-display-faq/';
    }
    
    wdf_fs()->add_filter( 'support_forum_url', 'wdf_fs_support_forum_url' );
    function wdf_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' . __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'wp-display-faq' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    
    wdf_fs()->add_filter(
        'connect_message_on_update',
        'wdf_fs_custom_connect_message_on_update',
        10,
        6
    );
}
