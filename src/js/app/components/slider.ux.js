class sliderUX {
    
    constructor() {

    }

    init() {
        this.slider();
    }

    slider() {

        let $testimonialSlider = $('.testimonial-slider__row');
        let $announceSlider = $('.announcement__list');
        let $videoSlider = $('.video-slider__row');
        let $bannerTextSlider = $('.text-banner-slider__slider');

        const thumbCount = $('.slider-thumbs .slick-slide, .slider-thumbs > div').length;
        const thumbsToShow = Math.min(thumbCount, 4); // Max 4 thumbnails

        $('.custom-single-product__gallery-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            swipe: false,             
            touchMove: false,          
            draggable: false,   
            asNavFor: '.custom-single-product__gallery-thumbnail',
            responsive: [
                {
                    breakpoint: 769, 
                    settings: {
                        dots: true,
                    }
                }
            ]
        });
    
        $('.custom-single-product__gallery-thumbnail').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            asNavFor: '.custom-single-product__gallery-main',
            focusOnSelect: true,
            arrows: false,
            dots: false,
            variableWidth : true,
            swipe: false,             
            touchMove: false,          
            draggable: false,   
        });
    
      

        $videoSlider.slick({
            infinite: false,
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            variableWidth: false,
            prevArrow: $(".video-slider__prev"),
            nextArrow: $(".video-slider__next"),
            speed: 500,
            cssEase: 'ease',
            fade: true,
            dots: false,   
        });
       
        
        $testimonialSlider.slick({
            infinite: true,
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            variableWidth: false,
            prevArrow: $(".testimonial-slider__prev"),
            nextArrow: $(".testimonial-slider__next"),
            speed: 500,
            cssEase: 'ease',
            fade: true,
            dots: true,   
        });

        $announceSlider.slick({
            infinite: true,
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            variableWidth: false,
            speed: 300,
            cssEase: 'ease',
            fade: true,
            dots: false,   
        });

        $bannerTextSlider.slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:  true,
            dots: true,
            autoplaySpeed: 1000,
            speed: 1000,
            prevArrow: '<button class="site-prev-btn text-banner-slider__prev"><span class="hidden">Prev</span></button>',
            nextArrow: '<button class="site-next-btn text-banner-slider__next"><span class="hidden">Next</span></button>'
        });


        mobileOnlySlider(".single-post__recent-row", true, false, 768, 1, false, false);





        function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint, $slide, $width, $customArrow) {
            var slider = $($slidername);
            var initialized = false;
            var originalContent = slider.clone(true, true);
    
            var settings = {
                infinite: true,
                mobileFirst: true,
                dots: $dots,
                arrows: $arrows,
                draggable: true,
                variableWidth: $width,
                slidesToShow: $slide,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: $breakpoint,
                        settings: 'unslick'
                    }
                ]
            };
    
            if ($customArrow && $slidername === '.members-listing__row') {
                settings.prevArrow = $('.members-listing__nav-prev');
                settings.nextArrow = $('.members-listing__nav-next');
            }

            if ($slidername === '.video-timeline-history__row') {
              settings.adaptiveHeight = true;
          }
    
            function initSlider() {
                if ($(window).width() <= $breakpoint) {
                    if (!initialized) {
                        slider.slick(settings);
                        initialized = true;
                    }
                } else {
                    if (initialized) {
                        slider.slick('unslick');
                        initialized = false;
                        slider.replaceWith(originalContent.clone(true, true));
                        slider = $($slidername);
                    }
                }
            }
    
            initSlider();
    
            $(window).on('resize', function() {
                initSlider();
            });
        }

        
        
    }

}

$(function(){
    let _module = new sliderUX();
    _module.init();
});
