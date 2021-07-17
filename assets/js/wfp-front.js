(function(window, $) {

    // USE STRICT
    "use strict";

    var wfpColl = document.getElementsByClassName("wfp-collapsible");
    var wfpCount;

    for (wfpCount = 0; wfpCount < wfpColl.length; wfpCount++) {

        wfpColl[wfpCount].addEventListener("click", function() {

            $(this).next().removeClass('active-first');
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                $(this).find(".wfp_open_cl_icon").removeClass('fa-minus').addClass('fa-plus');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                $(this).find(".wfp_open_cl_icon").removeClass('fa-plus').addClass('fa-minus');
            }
        });
    }

})(window, jQuery);