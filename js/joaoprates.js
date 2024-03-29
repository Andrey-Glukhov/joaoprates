jQuery(function ($) {
 
  $(".attrib_selection").on("click", function () {
    var tagValue = $(this).data("value");
    $(".attrib_selection").removeClass("selected");
    $(this).addClass("selected");
    $("select#size").val(tagValue).trigger("change");
  });
  $(".attrib_selection").first().addClass("selected");
  $("select#size")
    .val($(".attrib_selection").first().data("value"))
    .trigger("change");

  var $quantityArrowMinus = $(
    ".add_quantity_wrapper .var_quantity-arrow-minus"
  );
  var $quantityArrowPlus = $(".add_quantity_wrapper .var_quantity-arrow-plus");

  $quantityArrowMinus.click(quantityMinus);
  $quantityArrowPlus.click(quantityPlus);

  $(
    ".woocommerce.widget_layered_select .select_button_wrapper .accordion-button"
  ).on("click", function () {
    $(this).siblings(".select_dropdown_plus").toggleClass("not_present");
    $(this).siblings(".select_dropdown_minus").toggleClass("not_present");
    if (sessionStorage.getItem("woo_filter_fold")) {
      var blockStr = sessionStorage.getItem("woo_filter_fold");
    } else {
      blockStr = "";
    }
    if ($(this).siblings(".select_dropdown_minus").hasClass("not_present")) {
      blockStr = blockStr.replace(
        "#" +
          $(this)
            .parent()
            .siblings(".select__dropdown.accordion-collapse")
            .attr("id"),
        ""
      );
    } else {
      blockStr +=
        "#" +
        $(this)
          .parent()
          .siblings(".select__dropdown.accordion-collapse")
          .attr("id");
    }
    sessionStorage.setItem("woo_filter_fold", blockStr);
  });

  if (
    $(".post-type-archive.post-type-archive-product").length &&
    window.innerWidth > 767
  ) {
    if (sessionStorage.getItem("woo_filter_fold")) {
      var blockIds = sessionStorage.getItem("woo_filter_fold").split("#");
      for (var itm of blockIds) {
        if (itm === "") continue;
        $("#" + itm).addClass("show");
        $("#" + itm)
          .siblings(".select_button_wrapper")
          .children(".accordion-button")
          .removeClass("collapsed");
        $("#" + itm)
          .siblings(".select_button_wrapper")
          .children(".select_dropdown_plus")
          .toggleClass("not_present");
        $("#" + itm)
          .siblings(".select_button_wrapper")
          .children(".select_dropdown_minus")
          .toggleClass("not_present");
      }
    }
  }

  if ($(".single-product").length && window.innerWidth < 768) {
    $(".woocommerce-product-gallery__image").css("display", "flex");
    jQuery("body").bind("wc_fragments_refreshed", addMenu);
    $(window).resize(addMenu);
    addMenu();
    $("#navbarTogglerDemo03").on("hidden.bs.collapse", function () {
      $(".single-product>.container-fluid >.cart-contents-block").css(
        "display",
        "block"
      );
    });
    $("#navbarTogglerDemo03").on("shown.bs.collapse", function () {
      $(".single-product>.container-fluid >.cart-contents-block").css(
        "display",
        "none"
      );
    });
  }

  $(".attr_form_button").on("click", function () {
    if ($(".attr_col").hasClass("hide")) {
      $(".attr_col").slideUp(0, function () {
        $(".attr_col").removeClass("hide").slideDown(800);
      });
    } else {
      $(".attr_col").slideUp(800, function () {
        $(".attr_col").addClass("hide").slideDown(0);
      });
    }
  });

  if ($("body.single-project").length) {
    $(".link_wrapper").on("click", function () {
      $(".project_popup").addClass("show_me");
    });
    $(".close_icon").on("click", function () {
      $(".project_popup").removeClass("show_me");
    });
  }

if ($('.woocommerce-checkout').length) {
    $(document).on('change', 'input.input-radio[name="payment_method"]', function(e) {
        var element = e.currentTarget;
        if ($(element).is(':checked')) {
            $('li.wc_payment_method').removeClass('input_checked');
            $(element).parent().addClass('input_checked');
        }
    });
}

});
$(window).on("load", function () {
  $("#carouselExampleSlidesOnly")
    .slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
    })
    .on("setPosition", function (event, slick) {});
    if ($('.woocommerce-checkout').length) {
       $('input.input-radio[name="payment_method"]').first().trigger('change'); 
    }    
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

function addMenu() {
  var menuCartItem = $(".menu-item:has(>.cart-contents)");
  $(".single-product>.container-fluid >.cart-contents-block").remove();
  if ($(".single-product").length && window.innerWidth < 768) {
    if (menuCartItem.find(".count").length) {
      var newElem = (div = $("<div>"));
      var newLink = $(
        '<div class="card-content-link col-lg-7 col-md-6 col-sm-10 col-11">'
      );
      var newLinkCopy = $(".menu-item .cart-contents").clone();
      newElem.addClass("row cart-contents-block  justify-content-center");
      newLinkCopy.addClass("mobile_copy");
      newLink.append(newLinkCopy);
      newElem.append(newLink);
      newElem.prependTo(".single-product>.container-fluid ");
    }
  }
}
