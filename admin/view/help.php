<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap wfp-general-settings-page">

    <div class="settings-banner">
        <h2><i class="fa-solid fa-headset"></i>&nbsp;<?php _e('How it works', WFP_TXT_DOMAIN); ?></h2>
    </div>

    <div class="wfp-wrap">

        <div class="wfp_personal_wrap wfp_personal_help" style="width: 75%; float: left;">
            
            <div class="tab-content">
                
                <table class="wfp-general-content-settings-table">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label>How Can I Display FAQs?</label>
                            </th>
                            <td colspan="3">
                                After activating the plugin, you will see "WP FAQs” in Admin Dashboard Menu.
                                <br>
                                Go to “Add New” and add your FAQs as many as you want.
                                <br>
                                Now you need to insert the shortcode <b>[wp_display_faq]</b> at any page through TinyMCE editor.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>How Can I Display FAQs From a Category?</label>
                            </th>
                            <td colspan="3">
                                Go to “FAQ Categories” and add your Category first.
                                <br>
                                Now create a FAQ item and assign that item to a FAQ Categories available at right side panel.
                                <br>
                                Now you need to insert the shortcode <b>[wp_display_faq category="Category Name"]</b> at any page through TinyMCE editor.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>How Can I Display FAQs With Certain Numbers?</label>
                            </th>
                            <td colspan="3">
                                You need to apply that shortcode <b>[wp_display_faq display=5]</b> to display only 5 FAQs.
                            </td>
                        </tr>
                    </tbody>
                </table>
            
            </div>
        
        </div>
        
        <?php include_once('partial/admin-sidebar.php'); ?>

    </div>

</div>