jQuery(function($) {

    $('.woocommerce').on('change', 'input.qty', function() {
        $("[name='update_cart']").trigger("click");
    });
    $(window).on("load", function() {
      
        $('#carouselExampleSlidesOnly').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
        }).on('setPosition', function(event, slick) {
        
        });
    });
    $(".attrib_selection").on('click', function () {
        var tagValue = $(this).data('value');
        $('select#size').val(tagValue).trigger("change");
    })
});