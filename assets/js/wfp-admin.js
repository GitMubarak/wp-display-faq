(function($) {

    // USE STRICT
    "use strict";

    var wfpColorPicker = [
        '#wfp_title_bg_color',
        '#wfp_title_bg_color_hover',
        '#wfp_title_font_color',
        '#wfp_title_border_color',
        '#wfp_title_border_color_hover',
        '#wfp_button_text_color',
        '#wfp_desc_font_color',
        '#wfp_desc_bg_color'
    ];

    $.each(wfpColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $('.icp').iconpicker();

    $("span.wfp-admin-icon")
        .mouseover(function() {
            $(this).next().css('display', 'block');
        })
        .mouseout(function() {
            $(this).next().css('display', 'none');
        });

    $('.wfp-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

})(jQuery);