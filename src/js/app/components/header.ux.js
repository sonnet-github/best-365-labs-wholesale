import { gsap } from 'gsap';


class HeaderUX {
    
    constructor() {

        this.$triggers = {
            mobile_menu_toggle : $('.mobile-menu-trigger'),
            search_toggle :  $('#nav-search > i')
        }

        this.$mobile_menu = $('#mobile-menu');
        this.is_mobile_menu_active = false;

        this.$mobile_menu_items = $('#mobile-menu nav > a, #mobile-menu nav > div');
        this.$search_bar = $('#nav-search > input');
        this.$search_input = $('input[name="search"]');

        this.sticky_class = 'sticky-mode';

    }

    init() {

        this.adjustNav();
        this.bindEventTriggers();
        this.bindSearch();
        this.bindScroll();
        this.bindMobileSubNavToggle();
        this.menu();
        this.formDownload();
        this.accordion();
        this.videoSlider();
        this.productGallery();
        // this.quantity();
        this.postShare();
        this.sidemenu();
        this.loginPopup();
        this.loginShuffle();

        $(window).resize(() => {
            this.adjustNav();
        });

    }

    loginShuffle(){
        const $singleLoginForm = $('#singleLogin');
        const $loginEmail = $("#loginEmail");
        const $singleSign = $("#singleSign");
        const $signupEmail = $("#signupEmail");

        $('#toLogIn').on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#singleSign').hide(); // Use closest for clarity
            $singleLoginForm.fadeIn();
        });

        $("#toLogIn2").on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#signupEmail').hide(); // Use closest for clarity
            $singleLoginForm.fadeIn();
        });

        $('#loginwEmail').on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#singleLogin').hide(); // Use closest for clarity
            $loginEmail.fadeIn();
        });

        $('#backtoSignup').on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#loginEmail').hide(); // Use closest for clarity
            $singleSign.fadeIn();
        });

        $('#toSignup').on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#singleLogin').hide(); // Use closest for clarity
            $singleSign.fadeIn();
        });

        $("#signupemailForm").on('click', function(e) {
            e.preventDefault();
    
            $(this).parents('#singleSign').hide(); // Use closest for clarity
            $signupEmail.fadeIn();
        });
        
    }

    sidemenu(){
        $('.header-sidemenu__menu li.menu-item-has-children').each(function() {
            // Append a caret button
            $(this).children('a').after('<button class="submenu-toggle" aria-label="Toggle Submenu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="arrowDown" d="M8.14644661,10.1464466 C8.34170876,9.95118446 8.65829124,9.95118446 8.85355339,10.1464466 L12.4989857,13.7981758 L16.1502401,10.1464466 C16.3455022,9.95118446 16.6620847,9.95118446 16.8573469,10.1464466 C17.052609,10.3417088 17.052609,10.6582912 16.8573469,10.8535534 L12.4989857,15.2123894 L8.14644661,10.8535534 C7.95118446,10.6582912 7.95118446,10.3417088 8.14644661,10.1464466 Z"></path></svg></button>');
        });
    
        // Toggle sub-menu on button click
        $('.submenu-toggle').on('click', function(e) {
            e.preventDefault();
            $(this).siblings('.sub-menu').slideToggle(); // toggle submenu visibility
            $(this).toggleClass('active'); // optional: add active class for styling
        });
    }

    postShare(){
        const sharePopup = $('.blog-listing__share-popup');

        $('.blog-listing__details-share button').on('click' , function(e){
            e.preventDefault();

            $(this).siblings().toggle();

            const post = $(this).closest('.blog-listing__post');
            const postUrl = post.find('.blog-listing__thumbnail a').attr('href');
            const postTitle = post.find('h2').text();

            // Generate share links
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;
            const twitterUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(postTitle)}&url=${encodeURIComponent(postUrl)}`;
            const linkedinUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(postUrl)}`;

            // Set hrefs in the modal
          
            sharePopup.find('a.facebook').attr('href', facebookUrl).attr('target', '_blank');
            sharePopup.find('a.twitter').attr('href', twitterUrl).attr('target', '_blank');
            sharePopup.find('a.linkedin').attr('href', linkedinUrl).attr('target', '_blank');
            sharePopup.find('a.copy-link').attr('data-url', postUrl);

            // Open the modal
           

        });

        $('.blog-listing__details-share-button').on('click' , function(e){
            $(this).fadeOut();
            sharePopup.fadeIn();
        });

        $('.blog-listing__share-close button').on('click', function() {
           
            $('.blog-listing__share-popup').fadeOut();
        });

        $('.blog-listing__share-popup a.copy-link').on('click', function(e) {
            e.preventDefault();
            const link = $(this).attr('data-url');
    
            navigator.clipboard.writeText(link).then(() => {
                alert('Link copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        });

    }

    productGallery() {
        $('.custom-single-product__gallery-image-main img').on('click', function () {
            $('.custom-single-product__popup').fadeIn();
            $('body').addClass('no-scroll');
    
            const $popupSlider = $('.custom-single-product__gallery-popup');
    
            // Destroy Slick if already initialized
            if ($popupSlider.hasClass('slick-initialized')) {
                $popupSlider.slick('unslick');
            }
    
            // Reinitialize Slick
            $popupSlider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                dots: true,
                arrows: true,
                prevArrow: $(".custom-single-product__popup-prev"),
                nextArrow: $(".custom-single-product__popup-next"),
                asNavFor: '.custom-single-product__gallery-main, .custom-single-product__gallery-thumbnail'
            });
        });
    
        $('.custom-single-product__popup-close').on('click', function () {
            $('.custom-single-product__popup').fadeOut();
            $('body').removeClass('no-scroll');
        });
    }

    videoSlider(){
        $('.video-slider__inner').on('click', function() {
            $(this).find('.video-slider__thumbnail , .video-slider__content').hide();
          });
    }

    quantity(){
        $('.qty-btn.minus').click(function() {
            var $input = $(this).siblings('.qty-input');
            var currentValue = parseInt($input.val(), 10) || 0;
            var minValue = parseInt($input.attr('min'), 10) || 1;
            if (currentValue > minValue) {
                $input.val(currentValue - 1);
            }
        });
    
        // Increase the quantity when plus button is clicked
        $('.qty-btn.plus').click(function() {
            var $input = $(this).siblings('.qty-input');
            var currentValue = parseInt($input.val(), 10) || 0;
            $input.val(currentValue + 1);
        });
    }

    loginPopup(){
        $('.header__user .login').on('click' , function(e){
            e.preventDefault();

            $('.user-login').fadeIn();

        })

        $('.user-login__close button').on('click' , function(e){
            e.preventDefault();

            $('.user-login').fadeOut();

        })
    }
    

    formDownload(){

        jQuery(document).ready(function($) {
            // Grab your Forminator form by ID
            var $myForm = $("#forminator-module-317");
        
            // Bind to the 'ajax:complete' event on this form
            $myForm.bind('ajax:complete', function(event, xhr, settings) {
             
              

              $("#download-container").html(
                "<a href='/wp-content/uploads/2025/03/blank.pdf' download>Download Your File</a>"
              );
            });
          })

 
        
        
    }

    menu(){
        $('#burgerMain').on('click', function(){
            $(this).toggleClass('is-active');
            $('.header-sidemenu').toggleClass('active');
            $('body').toggleClass('no-scroll');
        });
    }

    adjustNav() {

        $('#main-navigation .has-sub-menu .sub-nav').each(function(){
            let parent = $(this).parent();
            TweenMax.set($(this), {
                x: 0 - (($(this).width() - parent.width()) / 2)
            });
        });

    }

    bindEventTriggers() {

        this.$triggers.mobile_menu_toggle.unbind('click');
        this.$triggers.mobile_menu_toggle.bind('click', () => {
            this.toggleMobileMenu();
        });

        this.$triggers.search_toggle.unbind('click');
        this.$triggers.search_toggle.bind('click', () => {
            this.toggleSearchBar();
        });

        $('.ux-scroll-to-anchor').bind('click', () => {
            this.closeMobileMenu();
        });

    }

    bindScroll() {
        $(window).scroll(() => {    
            let scroll = $(window).scrollTop();
            let hh = $('#page-header').height() + 200;
            let offset = 0;
            if (scroll >= (hh - offset)) {
                $('#page-header').addClass(this.sticky_class);
            } else {
                $('#page-header').removeClass(this.sticky_class);
            }
        });
    }

    toggleMobileMenu() {

        if(!this.is_mobile_menu_active){
            this.openMobileMenu();
        } else {
            this.closeMobileMenu();
        }

    }

    toggleSearchBar() {
        this.$search_bar.toggleClass('active-search');
    }

    bindSearch() {

        this.$search_input.on('change', function(){

            let s = $(this).val();

            if(s.length){
                s = encodeURI(s);
                let base = $(this).attr('data-sctrl');
                window.location = base + '?qs=' + s;
            }

        });

    }

    bindMobileSubNavToggle(){
        this.$mobile_menu.find('.has-sub-menu > a').bind('click', function(){
            $(this).nextAll('.sub-nav').slideToggle();
            $(this).toggleClass('sub-nav-active');
        });
    }

    openMobileMenu() {

        TweenMax.set(this.$mobile_menu, {
            opacity: 0,
            x: '100vw',
            display: 'block',
            ease: Expo.easeOut
        });

        TweenMax.set(this.$mobile_menu_items, {
            opacity: 0,
            x: '30vw'
        });

        this.$triggers.mobile_menu_toggle.addClass('active-menu');
        $('#page-header').addClass('mobile-menu-active');

        TweenMax.to(this.$mobile_menu, 0.5, {
            opacity: 1,
            x: 0,
            onComplete: () => {
                this.is_mobile_menu_active = true;
                TweenMax.staggerTo(this.$mobile_menu_items, 0.45,{
                    x: 0,
                    opacity: 1
                }, 0.15);
            }
        });

    }

    closeMobileMenu() {

        this.$triggers.mobile_menu_toggle.removeClass('active-menu');
        $('#page-header').removeClass('mobile-menu-active');

        TweenMax.to(this.$mobile_menu, 0.5, {
            opacity: 0,
            x: '100vw',
            ease: Expo.easeIn,
            onComplete: () => {
                this.is_mobile_menu_active = false;
                TweenMax.set(this.$mobile_menu, {
                    display: 'none'
                });
            }
        });

    }

    accordion(){
        var $firstColumn = $('.custom-single-product__accordion .faq__column:first-child');
        $firstColumn.find('.faq__heading').addClass('active');
        $firstColumn.find('.faq__content-toggle').toggle();
    
        $('.faq__heading').on('click', function(){
            var $currentHeading = $(this);
            var $currentContent = $currentHeading.siblings('.faq__content').find('.faq__content-toggle');
            
            // If this heading is not active, close any other open accordions.
            if (!$currentHeading.hasClass('active')) {
              $('.faq__heading.active').each(function(){
                $(this).removeClass('active');
                $(this).siblings('.faq__content').find('.faq__content-toggle').slideUp();
              });
            }
            
            // Toggle the clicked accordion.
            $currentHeading.toggleClass('active');
            $currentContent.slideToggle();
          });
    }

}

$(function(){
    let _module = new HeaderUX();
    _module.init();
})