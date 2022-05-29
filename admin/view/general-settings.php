<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap wfp-general-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('General Settings', WFP_TXT_DOMAIN); ?></h2>
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