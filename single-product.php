<?php
defined('ABSPATH') || exit;
get_header('shop');

$bgDesktop = get_field('background_image_desktop');
$bgMobile  = get_field('background_image_mobile');
$expectContent = get_field('what_to_expect');
$protocolContent = get_field('how_to_takedaily_protocol');
$insights = get_field('key_science_and_insights');
$faqContent = get_field('content_faq');
$videoTitle = get_field('section_title_video');
$otherTitle = get_field('section_title_other');
$relatedProduct = get_field('product_list');
$ctafaq = get_field('cta_faq');


while (have_posts()) : the_post();
    global $product;
    $gallery_ids   = $product->get_gallery_image_ids();
    $product_url   = urlencode(get_permalink());
    $product_title = urlencode(get_the_title());
    $product_image = wp_get_attachment_url(get_post_thumbnail_id());
    ?>

    <div class="custom-single-product">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
            <div class="custom-single-product__container">

                <div class="custom-single-product__header">
                    <div class="image-banner">
                        <div class="image-banner__image">
                            <?php if ($bgDesktop) : ?>
                                <img
                                    class="desktop"
                                    src="<?php echo esc_url($bgDesktop['url']); ?>"
                                    alt="<?php echo esc_attr($bgDesktop['alt']); ?>"
                                >
                            <?php else : ?>
                                <img
                                    class="desktop"
                                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/product-bg-desktop.png'); ?>"
                                    alt="Product Banner"
                                >
                            <?php endif; ?>

                            <?php if ($bgMobile) : ?>
                                <img
                                    class="mobile"
                                    src="<?php echo esc_url($bgMobile['url']); ?>"
                                    alt="<?php echo esc_attr($bgMobile['alt']); ?>"
                                >
                            <?php else : ?>
                                <img
                                    class="mobile"
                                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/product-bg-mobile.jpg'); ?>"
                                    alt="Product Banner"
                                >
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="custom-single-product__main">
                    <div class="custom-single-product__main-left">

                        <div class="custom-single-product__gallery">
                            <div class="custom-single-product__gallery-main">
                                <?php
                                if ($gallery_ids) :
                                    foreach ($gallery_ids as $attachment_id) :
                                        echo '<div class="custom-single-product__gallery-image-main">';
                                        echo wp_get_attachment_image($attachment_id, 'full');
                                        echo '</div>';
                                    endforeach;
                                endif;
                                ?>
                            </div>

                            <div class="custom-single-product__gallery-thumbnail">
                                <?php
                                if ($gallery_ids) :
                                    foreach ($gallery_ids as $attachment_id) :
                                        echo '<div class="custom-single-product__gallery-thumbnail-image">';
                                        echo wp_get_attachment_image($attachment_id, [96, 96]);
                                        echo '</div>';
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>

                        <div class="custom-single-product__summary mobile">
                            <div class="summary entry-summary">
                                <?php do_action('woocommerce_single_product_summary'); ?>
                            </div>
                        </div>

                    </div>

                    <div class="custom-single-product__main-right">
                        <div class="custom-single-product__summary">
                            <div class="summary entry-summary">
                                <?php
                                /**
                                 * DO NOT REMOVE — this ensures WooCommerce and Subscriptions plugin work properly.
                                 */
                                    do_action('woocommerce_single_product_summary');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if($expectContent) : ?>
                <div class="custom-single-product__expect">
                    <div class="custom-single-product__expect-container">
                        <div class="custom-single-product__expect-content">
                            <?php echo $expectContent;?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if($protocolContent) : ?>
                <div class="custom-single-product__protocol">
                    <div class="custom-single-product__protocol-container">
                        <div class="custom-single-product__protocol-content">
                            <?php echo $protocolContent;?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ( have_rows('testimonial_list') ) : ?>
                <div class="custom-single-product__testimonial">
                    <div class="testimonial-slider__title">
                        <h2>Real Results</h2>
                    </div>
        
                    <div class="testimonial-slider__container">
                        <div class="testimonial-slider__row">
                        
                            <?php if ( have_rows('testimonial_list') ) : ?>
                            
                                <?php while( have_rows('testimonial_list') ) : the_row(); 
                                
                                    $comment = get_sub_field('content');
                                    $client = get_sub_field('client_name');
                                
                                ?>
                            
                                <div class="testimonial-slider__column">
                                    <div class="testimonial-slider__inner">
                                        
                                        <div class="testimonial-slider__content">
                                            <div class="testimonial-slider__comment">
                                                <?php echo $comment;?>
                                            </div>

                                            <div class="testimonial-slider__client">
                                                <p><?php echo $client;?></p>
                                            </div>
                                
                                        </div>
                                    </div>
                                </div>
                            
                                <?php endwhile; ?>
                            
                            <?php endif; ?>
                            
                        </div>

                    </div>
                </div>
                <?php endif; ?>
                
                <?php if($insights) : ?>
                <div class="custom-single-product__insights">
                    <div class="custom-single-product__insights-container">
                        <div class="custom-single-product__insights-content">
                            <?php echo $insights;?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ( have_rows('faq_list') ) : ?>
                <div class="custom-single-product__faq">
                    <div class="custom-single-product__faq-container">
                        <div class="custom-single-product__faq-content">
                            <?php echo $faqContent;?>
                        </div>

                        <div class="faq__row">
            
                        <?php if ( have_rows('faq_list') ) : ?>
                        
                            <?php while( have_rows('faq_list') ) : the_row(); 
                            
                                $heading = get_sub_field('question');
                                $content = get_sub_field('answer');

                            ?>
                        
                            <div class="faq__column">
                                <div class="faq__inner">
                                    <div class="faq__heading">
                                        <h4>Q: <?php echo $heading;?></h4>

                                        <div class="faq__heading-icon">
                                        <img
                                            class="plus"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/plus.png'); ?>"
                                            alt="Plus Icon"
                                        >
                                        <img
                                            class="minus"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/minus.png'); ?>"
                                            alt="Minus Icon"
                                        >
                                        </div>
                                    </div>

                                    <div class="faq__content">
                                        <div class="faq__content-toggle">

                                        
                                        <div class="faq__content-text">
                                            <span>A :</span>
                                            <div class="faq__content-text-wrapper">
                                                 <?php echo $content;?>
                                            </div>
                                           
                                        </div>

            
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        
                            <?php endwhile; ?>
                        
                        <?php endif; ?>
                        
                        </div>
                        
                        <?php if($ctafaq) : ?>
                        <div class="faq__cta">
                            <a class="button button--primary" href="<?php echo $ctafaq['url']; ?>">
                                <?php echo $ctafaq['title']; ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ( have_rows('video_list') ) : ?>
                <div class="custom-single-product__videos">
                    <div class="custom-single-product__videos-container">
                        <div class="custom-single-product__videos-title">
                            <h2><?php echo $videoTitle;?></h2>
                        </div>

                        <div class="custom-single-product__videos-listing">
                            <div class="custom-single-product__videos-row">
                                <?php if ( have_rows('video_list') ) : ?>
                                
                                    <?php while( have_rows('video_list') ) : the_row(); 
                                    
                                        $video = get_sub_field('video');
                                        $description = get_sub_field('description');
                                    
                                    ?>
                                
                                    <div class="custom-single-product__videos-column">
                                        <div class="custom-single-product__videos-inner">
                                            <div class="custom-single-product__videos-embed">
                                                <?php echo $video;?>
                                            </div>
                                            <div class="custom-single-product__videos-content">
                                                <p><?php echo $description;?></p>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <?php endwhile; ?>
                                
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endif;?>

                <div class="custom-single-product__related">
                    <div class="product-listing__title">
                       <h2><?php echo $otherTitle;?></h2> 
                    </div>

                    <div class="product-listing__container">
                        <div class="product-listing__row">
                        <?php if ( $relatedProduct ) : 
                        foreach ( $relatedProduct as $post ) :
                            setup_postdata( $post );

                        
                            $wc_product       = wc_get_product( $post->ID );

                        
                            $product_title    = $wc_product->get_name();  
                            $short_desc_raw   = $wc_product->get_short_description();

                            $cta = $wc_product->get_permalink();
                            $short_desc       = apply_filters('woocommerce_short_description', $short_desc_raw);

                            $shortname = get_field('short_name', $post->ID);
                            
                            $featuredImg      = get_the_post_thumbnail( $post->ID, 'full' );
                            
                            ?>
                            
                            
                                <div class="product-listing__column">
                                    <div class="product-listing__inner">
                                        <?php if ( $featuredImg ) : ?>
                                            <a href="<?php echo $cta;?>">
                                            <?php echo $featuredImg; ?>
                                        </a>
                                        <?php endif; ?>
                                        
                                        <div class="product-listing__details">

                                        
                                        <div class="product-listing__name">

                                        
                                            <h5>
                                                <?php if($shortname) : ?>
                                                    <a href="<?php echo $cta;?>">
                                                        <?php echo esc_html( $shortname ); ?>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="<?php echo $cta;?>">
                                                    <?php echo esc_html( $product_title ); ?>
                                                    </a>
                                                </h5>
                                                <?php endif; ?>

                                            </div>
                                        
                    

                                        </div>
                                        
                                        

                
                                        
                                    </div>
                                </div>
                            
                        <?php
                        endforeach;
                        wp_reset_postdata();
                    endif; ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <section class="custom-single-product__popup">
        <div class="custom-single-product__popup-wrapper">

            <div class="custom-single-product__popup-close">
                <svg viewBox="0 0 32 32" fill="currentColor" width="32" height="32"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="16" cy="16" r="16"></circle><path d="M18.7692308,4 L20,5.23076923 L13.23,12 L20,18.7692308 L18.7692308,20 L12,13.23 L5.23076923,20 L4,18.7692308 L10.769,12 L4,5.23076923 L5.23076923,4 L12,10.769 L18.7692308,4 Z" transform="translate(4 4)" fill="currentColor"></path></g></svg>
            </div>

            <div class="custom-single-product__popup-container">

                <div class="custom-single-product__gallery-popup">
                    <?php
                    if ($gallery_ids) :
                        foreach ($gallery_ids as $attachment_id) :
                            echo '<div class="custom-single-product__gallery-image-main">';
                            echo wp_get_attachment_image($attachment_id, 'full');
                            echo '</div>';
                        endforeach;
                    endif;
                    ?>
                </div>

                <div class="custom-single-product__popup-arrow">
                    <div class="custom-single-product__popup-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="28" viewBox="0 0 15 28"><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g fill="#000" transform="translate(-80 -526)"><g transform="translate(64 516)"><path d="M36.0464932 16.6605068L23.1919029 28.8898269 10.4337002 16.6605068 9.33949316 17.6517461 23.1919029 31.0464932 37.0464932 17.6517461z" transform="matrix(0 -1 -1 0 47.046 47.046)"></path></g></g></g></svg>
                    </div>

                    <div class="custom-single-product__popup-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="28" viewBox="0 0 14 28"><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g fill="#000" transform="translate(-1826 -526)"><g transform="translate(1808 516)"><path d="M37.9894251 17L24.9988982 28.9011986 12.1057782 17 11 17.9646436 24.9988982 31 39 17.9646436z" transform="rotate(-90 25 24)"></path></g></g></g></svg>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
endwhile;
get_footer('shop');
