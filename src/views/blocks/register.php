<?php 
/**
 * ACF Blocks Registry
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    function register_acf_blocks() {

        // Add your ACF Blocks here
        $acf_blocks = [
            'full-width-banner',
            'wysiwyg',
            'image-banner',
            'image-banner-inner',
            'two-column-image-content',
            'product-listing',
            'product-listing-cart',
            'two-column-image-card',
            'testimonial-slider',
            'pdf-listing',
            'three-col-media-content-cta',
            'report-form',
            'video-gallery-modal',
            'featured-product-intro',
            'benefit-listing',
            'wysiwyg-inner-page',
            'faq',
            'supplement-facts',
            'featured-product-horizontal',
            'doctor-banner',
            'ingredients-directions',
            'featured-product-bg',
            'wysiwyg-inner-page-v2',
            'icon-listing',
            'video-slider',
            'advisor-listing',
            'full-width-image-banner',
            'blog-listing',
            'form',
            'form-four-column',
            'post-full-width-image',
            'team-listing',
            'coa',
            'product-listing-post',
            'quick-links'
        ];

        foreach($acf_blocks as $block){
            register_block_type( __DIR__ . '/' . $block );
        }
        
    }

    function register_layout_category( $categories ) {
        
        array_unshift($categories, [
            'slug'  => 'custom-layout',
            'title' => 'Custom Layout'
        ]);

        return $categories;
    }

    
    if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
        add_filter( 'block_categories_all', 'register_layout_category' );
    } else {
        add_filter( 'block_categories', 'register_layout_category' );
    }

    add_action( 'init', 'register_acf_blocks' );