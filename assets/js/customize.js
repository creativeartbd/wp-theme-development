(function ($) {
    wp.customize("shibbir_service_heading", function (value) {
        value.bind(function (newValue) {
            $(".front-page-h1").html(newValue);
        });
    });

    wp.customize("shibbir_html_color_settings", function (value) {
        value.bind(function (newValue) {
            $(".front-page-h1").css("color", newValue);
        });
    });
})(jQuery);
