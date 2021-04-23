jQuery(function($) {

    $('.woocommerce').on('change', 'input.qty', function() {
        $("[name='update_cart']").trigger("click");
    });
    $(window).on("load", function() {
        //$('.wp-block-jetpack-slideshow_button-next').css('top', '');
        // $('.wp-block-jetpack-slideshow_button-next').on('change', function(e) {
        //     console.log(e);
        // });
        // var target = document.querySelector('.wp-block-jetpack-slideshow_button-next');

        // // создаем новый экземпляр наблюдателя
        // var observer = new MutationObserver(function(mutations) {
        //     mutations.forEach(function(mutation) {
        //         console.log(mutation.type);
        //     });
        // });

        // // создаем конфигурации для наблюдателя
        // var config = { attributes: true, childList: true, characterData: true };

        // // запускаем механизм наблюдения
        // observer.observe(target, config);

        // // позже, если надо, прекращаем наблюдение
        // //observer.disconnect();

        // var tts = setTimeout(function() {
        //     document.querySelector('.wp-block-jetpack-slideshow_button-next').style.top = '';
        // }, 3000);
        $('#carouselExampleSlidesOnly').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            //arrows: false,
            //adaptiveHeight: true
            //variableWidth: true

        }).on('setPosition', function(event, slick) {
            // var $slideImages = slick.$slideTrack.find('.slick-slide img');
            // console.log($slideImages);
            // if ($slideImages.first()[0].clientHeight >= $slideImages.first()[0].naturalHeight) return;
            // $slideImages.height('auto');
            // $slideImages.width('100%');
            // var imgHeights = $slideImages.map(function() {
            //     return this.clientHeight;
            // }).get();
            // var maxHeight = Math.max.apply(null, imgHeights);
            // $slideImages.height(maxHeight);
            // $slideImages.width('auto');
        });
    });
});