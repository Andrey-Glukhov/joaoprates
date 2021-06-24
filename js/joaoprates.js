jQuery(function($) {

    $('.woocommerce').on('change', 'input.qty', function() {
        $("[name='update_cart']").trigger("click");
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


    $('.woocommerce.widget_layered_select .select_button_wrapper .accordion-button').on('click', function() {
            $(this).siblings('.select_dropdown_plus').toggleClass('not_present');
            $(this).siblings('.select_dropdown_minus').toggleClass('not_present');
            if (sessionStorage.getItem('woo_filter_fold')) {
                var blockStr  = sessionStorage.getItem('woo_filter_fold');
            } else {
                blockStr ='';
            }
            if ($(this).siblings('.select_dropdown_minus').hasClass('not_present')) {
                blockStr = blockStr.replace('#' + $(this).parent().siblings('.select__dropdown.accordion-collapse').attr('id'),'');
            } else {
                blockStr += '#' + $(this).parent().siblings('.select__dropdown.accordion-collapse').attr('id');
            }
            sessionStorage.setItem('woo_filter_fold',blockStr );
    });
   
    if ($('.post-type-archive.post-type-archive-product').length && window.innerWidth > 767) {
        if (sessionStorage.getItem('woo_filter_fold')) {
            var blockIds = sessionStorage.getItem('woo_filter_fold').split('#');
            for (var itm of blockIds ) {
                if (itm ==='') continue;
                $('#'+ itm).addClass('show');
                $('#'+ itm).siblings('.select_button_wrapper').children('.accordion-button').removeClass('collapsed');
                $('#'+ itm).siblings('.select_button_wrapper').children('.select_dropdown_plus').toggleClass('not_present');
                $('#'+ itm).siblings('.select_button_wrapper').children('.select_dropdown_minus').toggleClass('not_present');

            }
        }
    }

    if ($('body.single-project').length) {
        $('.link_wrapper').on('click', function() {
            $('.project_popup').addClass('show_me');
        });
        $('.close_icon').on('click', function() {
            $('.project_popup').removeClass('show_me');
        });
    }
    
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

function quantityMinus(event) {
    var $quantityNum = $(this).parent().find('.quantity input[type="number"]'); 
     if ($quantityNum.val() > 1) {
       $quantityNum.val(+$quantityNum.val() - 1);
     }
     event.preventDefault();
   }

function quantityPlus(event) {
    var $quantityNum = $(this).parent().find('.quantity input[type="number"]');
    $quantityNum.val(+$quantityNum.val() + 1);
    event.preventDefault();
}