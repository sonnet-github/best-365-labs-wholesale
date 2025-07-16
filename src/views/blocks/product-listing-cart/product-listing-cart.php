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
$layout = get_field('layout') ? get_field('layout') : '4';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__product-listing-cart';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="product-listing-cart <?= esc_attr($class_name) ?> product-listing-cart--column-layout-<?= $layout ?>" <?= $anchor ?>>
    <div class="product-listing-cart__title">
        <?= $section_title ?>
    </div>
    <div class="product-listing-cart__container">
        <div class="product-listing-cart__row">
        <?php if ( $products ) : 
        foreach ( $products as $post ) :
            setup_postdata( $post );

        
            $wc_product       = wc_get_product( $post->ID );
            $product_title    = $wc_product->get_name();  
            $price = $wc_product->get_price();
            $short_description = $wc_product->get_short_description();
            $short_description = get_field('product_short_description_home_page', $post->ID);
            $cta = $wc_product->get_permalink();
            $shortname = get_field('short_name', $post->ID);
            $badge = get_field('ribbon_status' , $post->ID);
            $featureImgv2 = get_field('product_featured_image_v2' , $post->ID);
            $hoverImg = get_field('product_image_hover' , $post->ID);
            

            ?>
            
            
                <div class="product-listing-cart__column">
                    <div class="product-listing-cart__inner">
                        <div class="product-listing-cart__thumbnail-wrapper">
                            <a class="click" href="<?php echo $cta;?>"></a>
                            <div class="product-listing-cart__featured">
                                <?php if($featureImgv2):?>
                                    <img src="<?php echo $featureImgv2['url'];?>" alt="<?php echo $featureImgv2['alt'];?>">
                                <?php endif;?>
                            </div>

                            <div class="product-listing-cart__hover-image">
                                <?php if($hoverImg):?>
                                    <img src="<?php echo $hoverImg['url'];?>" alt="<?php echo $hoverImg['alt'];?>">
                                <?php endif;?>
                            </div>

                            <div class="product-listing-cart__hover-button">
                                <a class="quick-view-trigger" data-product-id="<?php echo esc_attr( $post->ID ); ?>">Quick View</a>
                            </div>

                            <?php if($badge):?>
                            <div class="product-listing-cart__badge">
                                <p><?php echo $badge;?></p>
                            </div>
                            <?php endif;?>
                        </div>
                    
                        <div class="product-listing-cart__details">

                        
                        <div class="product-listing-cart__details-text">

                        
                        <div class="product-listing-cart__name">
                            <h5>
                                <?php if($shortname) : ?>
                                    <?php echo esc_html( $shortname ); ?>
                                <?php else : ?>
                                    <?php echo esc_html( $product_title ); ?>
                                <?php endif; ?>
                            </h5>
                        </div>
                        
                            <div class="product-listing-cart__desc">
                                <p><?= $short_description?></p>
                            </div>

                            <?php if($layout === '4'):?>
                                <h3 class="product-listing-cart__price">$<?php echo $price; ?></h3>
                            <?php endif;?>
                        </div>

                        <?php if($layout === '2'):?>
                            <h3 class="product-listing-cart__price">$<?php echo $price; ?></h3>
                        <?php endif;?>

                        <div class="product-listing-cart__quantity">
                            <div class="quantity-wrapper">
                                <button type="button" class="qty-btn minus">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" class="sXlnfCq"><path fill-rule="evenodd" d="M20,12 L20,13 L5,13 L5,12 L20,12 Z"></path></svg>
                                </button>
                                <input 
                                type="number" 
                                class="qty-input" 
                                value="1" 
                                min="1" 
                                pattern="[0-9]*" 
                                inputmode="numeric"
                                />
                                <button type="button" class="qty-btn plus">
                                <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24" class="sXlnfCq"><path fill-rule="evenodd" d="M13,5 L13,12 L20,12 L20,13 L13,13 L13,20 L12,20 L11.999,13 L5,13 L5,12 L12,12 L12,5 L13,5 Z"></path></svg>
                                </button>
                            </div>
                            <div class="quantity-label">Quantity</div>
                        </div>
                        
                        <div class="product-listing-cart__cta">
                            <a href="#" class="button button--primary quick-view-trigger desktop" data-product-id="<?php echo esc_attr( $post->ID ); ?>">Add to Cart</a>
                            <a href="<?php echo $cta;?>" class="button button--primary mobile">Add to Cart</a>
                            <a class="click text-link" href="<?php echo $cta;?>">Learn More</a>
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

<?php endif; ?>


