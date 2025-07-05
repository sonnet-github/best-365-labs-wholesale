<?php
/**
 * Product Listing Post Type Block Template
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
$products = get_field('product_list');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__product-listing-post';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="product-listing-post <?= esc_attr($class_name) ?>" <?= $anchor ?>>


    <div class="product-listing-post__container">
        <div class="product-listing-post__row">
            <?php if ( have_rows('product_list') ) : ?>
            
                <?php while( have_rows('product_list') ) : the_row(); 
                
                    $image = get_sub_field('featured_image');
                    $name = get_sub_field('name');
                    $cta = get_sub_field('cta');
                
                ?>

                <div class="product-listing-post__column">

                    <div class="product-listing-post__inner">

                        <div class="product-listing-post__thumbnail" style="background-image: url(<?php echo $image['url'];?>)">
                            <?php if($cta):?>
                            <a class="" href="<?php echo $cta['url'];?>" target="<?php echo $cta['target'];?>"></a>
                            <?php endif;?>
                        </div>

                        <div class="product-listing-post__details">
                            <?php if($cta):?>
                                <a class="" href="<?php echo $cta['url'];?>" target="<?php echo $cta['target'];?>"><h4><?php echo $name;?></h4></a>
                             <?php endif;?>
                            <?php if($cta):?>
                            <a class="cta" href="<?php echo $cta['url'];?>" target="<?php echo $cta['target'];?>">Buy Now</a>
                            <?php endif;?>
                        </div>

                    </div>
                    
                </div>
            
                
                <?php endwhile; ?>
            
            <?php endif; ?>
            
 
        </div>
    </div>

    
</div>

<?php endif; ?>


