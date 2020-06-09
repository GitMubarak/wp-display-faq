(function($) {

    // USE STRICT
    "use strict";

    var wfpColorPicker = ['#wfp_background_color', '#wfp_message_color', '#wfp_button_color', '#wfp_button_text_color'];

    $.each(wfpColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $('.wfp-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

})(jQuery);