<?php
/**
 * Product Listing Block Template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Get ACF fields value and set default
$section_title = get_field('section_title');
$content = get_field('content');
$products = get_field('product_list');
$button = get_field('button');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__product-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="product-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    <div class="product-listing__title">
        <?= $section_title ?>
    </div>
    <div class="product-listing__container">
        <div class="product-listing__row">
        <?php if ( $products ) : 
            foreach ( $products as $post ) :
                setup_postdata( $post );

            
                $wc_product       = wc_get_product( $post->ID );

            
                $product_title    = $wc_product->get_name();  
                $short_desc_raw   = $wc_product->get_short_description();

                $cta = $wc_product->get_permalink();
                $short_desc       = apply_filters('woocommerce_short_description', $short_desc_raw);

                $shortname = get_field('short_name', $post->ID);
                $shortdesc = get_field('product_short_description_home_page', $post->ID);
                
                $featuredImg      = get_the_post_thumbnail( $post->ID, 'full' );
                
                ?>
                
                    <div class="product-listing__column">
                        <div class="product-listing__inner">
                            <div class="product-listing__column-left">
                                <?php if ( $featuredImg ) : ?>
                                    <?php echo $featuredImg; ?>
                                <?php endif; ?>
                            </div>
                            <div class="product-listing__column-right">
                                <div class="product-listing__details">

                                    
                                    <div class="product-listing__name">

                                    
                                        <h5>
                                            <?php if($shortname) : ?>
                                                <?php echo esc_html( $shortname ); ?>
                                            <?php else : ?>
                                                <?php echo esc_html( $product_title ); ?>
                                            </h5>
                                            <?php endif; ?>

                                    </div>
                                    
                                    <div class="product-listing__desc">
                                        <?php echo $shortdesc; ?>
                                    </div>

                                </div>
                                <div class="product-listing__cta">
                                    <a class="button button--primary" href="<?php echo esc_url($cta); ?>">Learn More</a>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                
            <?php
            endforeach;
            wp_reset_postdata();
        endif; ?>
        </div>
        <?php if($button):?>
            <div class="product-listing__button">
                <a class="button button--primary" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?></a>
            </div>
        <?php endif;?>
    </div>
</div>

<?php endif; ?>


