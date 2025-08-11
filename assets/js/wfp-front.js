(function(window, $) {

    // USE STRICT
    "use strict";

    var wfpColl = document.getElementsByClassName("wfp-collapsible");
    var wfpCount;

    for (wfpCount = 0; wfpCount < wfpColl.length; wfpCount++) {

        wfpColl[wfpCount].addEventListener("click", function() {

            var dataAnimType = $(this).next().attr("data-anim-type");
            var dataOpenIcon = $(this).children(".wfp_open_cl_icon:first").attr("data-open-icon");
            var dataCloseIcon = $(this).children(".wfp_open_cl_icon:first").attr("data-close-icon");

            $('.wfp-content').removeClass(dataAnimType);

            $(this).next().removeClass('active-first');
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                $(this).children(".wfp_open_cl_icon:first").removeClass('fa-' + dataCloseIcon).addClass('fa-' + dataOpenIcon);
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                $(this).children(".wfp_open_cl_icon:first").removeClass('fa-' + dataOpenIcon).addClass('fa-' + dataCloseIcon);
                $(this).next().addClass(dataAnimType);
            }
        });
    }

})(window, jQuery);