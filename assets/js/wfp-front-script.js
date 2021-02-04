(function(window, $) {

    // USE STRICT
    "use strict";

    var wfpColl = document.getElementsByClassName("wfp-collapsible");
    var wfpCount;

    for (wfpCount = 0; wfpCount < wfpColl.length; wfpCount++) {

        wfpColl[wfpCount].addEventListener("click", function() {

            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    }

})(window, jQuery);