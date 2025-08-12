//modules
import { CommonHelper } from './utils/common.helper';
import './lazyload/contentlazyload.ux';
import 'slick-carousel';

// components
import './components/header.ux';
import './components/slider.ux';

class WebApp {

    constructor($window, $document, _data) {

        this.$window = $window;
        this.$document = $document;
        this.data = (_data) ? _data : {};

    }

    init() {

        this.$document.ready( () => { this.afterDocumentreadyHook(); } );
        this.$window.on( 'load', () => { this.afterWindowloadHook(); } );

    }

    clearData() {

        this.data = {};
        return true;

    }

    afterDocumentreadyHook(){

        this.bindScrollToAnchor();
        $('#page-content').css({
            'min-height' : this.$window.height() - $('#page-footer').height()
        });
        // $("html, body").animate({scrollTop: 1});

        let anchor = CommonHelper.getUrlParameter('goto');
        // if(!anchor){
        //     setTimeout(function(){ 
        //         $("html, body").animate({scrollTop: 1});
        //     }, 200);
        // }

        $('.service-item').bind('click', function(){
            $(this).toggleClass('active-item');
        });

        this.customScripts();

    }

    afterWindowloadHook(){

        let anchor = CommonHelper.getUrlParameter('goto');
        if(anchor){
            this.scrollToAnchor(anchor);
        }

        let smoothanchor = CommonHelper.getUrlParameter('gt');
        if(smoothanchor){
            this.scrollToAnchorById('#'+smoothanchor);
        }

    }

    bindScrollToAnchor() {

        let wa = this;
        $('*[data-ux="scroll-to-anchor"]').bind('click', function(){
            let target = $(this).attr('data-target');
            if(target){
                wa.scrollToAnchor(target);
            } else {
                $('html, body').animate({
                    scrollTop: ($(window).height() - ($('#page-header').height()))
                }, 1200);
            }
        });

        
        $('.ux-scroll-to-anchor').bind('click', function(ev){
            ev.preventDefault();
            let target = $(this).attr('href');
            if(target){
                if($(this).hasClass('home-only')){
                    if($('body').hasClass('home')){
                        wa.scrollToAnchorById(target);
                    } else {
                        window.location = $(this).attr('data-home');
                    }
                } else {
                    wa.scrollToAnchorById(target);
                }
            } else {
                $('html, body').animate({
                    scrollTop: ($(window).height() - ($('#page-header').height()))
                }, 1200);
            }
        });

    }

    scrollToAnchor(target) {
        if($('*[data-anchor="'+target+'"]').length){
            $('html, body').animate({
                scrollTop: $('*[data-anchor="'+target+'"]').offset().top - ($(window).height() / 5)
            }, 1200);
        }
    }

    scrollToAnchorById(target){
        if($(target).length){
            $('html, body').animate({
                scrollTop: $(target).offset().top - 30
            }, 1200);
        }
    }

    customScripts() {

        if(jQuery('body.single-product').length) {

            // single product page
            jQuery('.summary .wcsatt-options-prompt-radio .wcsatt-options-prompt-label-subscription').parent('.wcsatt-options-prompt-radio').remove();
            jQuery('.wcsatt-options-prompt-radios .wcsatt-options-prompt-action-input').prop('checked', false);
            jQuery('.summary .wcsatt-options-prompt-radio').removeClass('active');
            jQuery('.custom-single-product__main-right .summary.entry-summary > .price').detach().insertBefore('.summary.entry-summary form .product-listing-cart__quantity');

            jQuery('.wcsatt-options-prompt-action').each(function() { 

                var text = jQuery(this).text(); 

                if(text === 'Purchase one time') {
                    
                    const priceText = jQuery('.custom-single-product__summary span.woocommerce-Price-amount.amount').text();
                    const price = priceText.match(/\$\d+/)[0];
                    const subscribeInput = jQuery('.custom-single-product__summary input[value="no"] + span');

                    subscribeInput.prepend(`${price} `);
                }

            });

        }

    }

}

const _WebApp = new WebApp( 
    $(window), 
    $(document), 
    { 
        started : Date.now() 
    }
).init();