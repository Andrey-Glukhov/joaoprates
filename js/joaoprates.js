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
        $(".attrib_selection").removeClass('selected');
        $(this).addClass('selected');
        $('select#size').val(tagValue).trigger("change");
    })
    $(".attrib_selection").first().addClass('selected');
    $('select#size').val($(".attrib_selection").first().data('value')).trigger("change");

    var $quantityArrowMinus = $(".add_quantity_wrapper .var_quantity-arrow-minus");
    var $quantityArrowPlus = $(".add_quantity_wrapper .var_quantity-arrow-plus");
    
 
    $quantityArrowMinus.click(quantityMinus);
    $quantityArrowPlus.click(quantityPlus);
 
    function quantityMinus(event) {
     var $quantityNum = $(this).parent().find('.quantity input[type="number"]'); 
      if ($quantityNum.val() > 1) {
        $quantityNum.val(+$quantityNum.val() - 1);
      }
      //event.preventDefault();
      event.stopProragation();
    }
 
    function quantityPlus(event) {
      var $quantityNum = $(this).parent().find('.quantity input[type="number"]');
      $quantityNum.val(+$quantityNum.val() + 1);
      event.preventDefault();
      //event.stopProragation();
    }

    $('.woocommerce.widget_layered_select .select_button_wrapper .accordion-button').on('click', function() {
        
        //if ($(this).hasClass('collapse')) {
            $(this).siblings('.select_dropdown_plus').toggleClass('not_present');
            $(this).siblings('.select_dropdown_minus').toggleClass('not_present');
        //} 
    });
    
});