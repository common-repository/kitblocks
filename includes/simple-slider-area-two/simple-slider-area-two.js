
(function ($) {
    "use strict"; // Start of use strict

    if ($(".kb-slider").length) {
        $(".kb-slider").each(function (index) {
          var $owlAttr = {},
              $extraAttr = $(this).data("options");
          $.extend($owlAttr, $extraAttr);
          $(this).owlCarousel($owlAttr);
        });
    }

})(jQuery); // End of use strict