<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wfpGeneralMessage = false;

if ( isset( $_POST['updateGeneralStyles'] ) ) {
    
    $wfpGeneralStylesInfo = array(
        'wfp_title_font_color'      => isset( $_POST['wfp_title_font_color'] ) ? sanitize_text_field( $_POST['wfp_title_font_color'] ) : '#212121',
        'wfp_title_font_size'       => isset( $_POST['wfp_title_font_size'] ) ? sanitize_text_field( $_POST['wfp_title_font_size'] ) : 12,
        'wfp_title_bg_color'        => isset( $_POST['wfp_title_bg_color'] ) ? sanitize_text_field( $_POST['wfp_title_bg_color'] ) : '#FFFFFF',
        'wfp_title_border_color'    => isset( $_POST['wfp_title_border_color'] ) ? sanitize_text_field( $_POST['wfp_title_border_color'] ) : '#EAEAEA',
    );
    
    $wfpGeneralMessage = update_option( 'wfp_styles_settings', serialize( $wfpGeneralStylesInfo ) );
}

$wfpGeneralStyles           = stripslashes_deep( unserialize( get_option('wfp_styles_settings') ) );
$wfp_title_font_color       = isset( $wfpGeneralStyles['wfp_title_font_color'] ) ? $wfpGeneralStyles['wfp_title_font_color'] : '#212121';
$wfp_title_font_size        = isset( $wfpGeneralStyles['wfp_title_font_size'] ) ? $wfpGeneralStyles['wfp_title_font_size'] : 12;
$wfp_title_bg_color         = isset( $wfpGeneralStyles['wfp_title_bg_color'] ) ? $wfpGeneralStyles['wfp_title_bg_color'] : '#FFFFFF';
$wfp_title_border_color     = isset( $wfpGeneralStyles['wfp_title_border_color'] ) ? $wfpGeneralStyles['wfp_title_border_color'] : '#EAEAEA';
?>
<div id="wph-wrap-all" class="wrap wfp-general-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('Settings', WFP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $wfpGeneralMessage ) {
            $this->wfp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="wfp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=wfp_faq&page=wfp-general-settings&tab=settings" class="nav-tab wfp-tab <?php if ( $wfpTab !== 'styles' ) { ?>wfp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', WFP_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=wfp_faq&page=wfp-general-settings&tab=styles" class="nav-tab wfp-tab <?php if ( $wfpTab === 'styles' ) { ?>wfp-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp;<?php _e('Styles', WFP_TXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="wfp_personal_wrap wfp_personal_help" style="width: 75%; float: left;">
            
            <div class="tab-content">
                <?php 
                switch ( $wfpTab ) {
                    case 'styles':
                        include WFP_PATH . 'admin/view/partial/settings-styles.php';
                        break;
                    default:
                        include WFP_PATH . 'admin/view/partial/settings-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>
        
        <?php include_once('partial/admin-sidebar.php'); ?>

    </div>

</div>