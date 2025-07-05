<?php
/**
 * Featured Product Horizontal Block Template
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

    // Get acf fields value and set default
    $image = get_field('product_image');
    $heading = get_field('product_heading');
    $price = get_field('product_price');
    $type = get_field('add_to_cart');
    $cta = get_field('cta');
    $id = get_field('product_id');
    $details = get_field('additional_info');
    $bg = get_field('background_image');
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__featured-product-bg';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="featured-product-bg <?= $class_name ?>" <?= $anchor ?>>

        <div class="featured-product-bg__bg">
            <img src="<?php echo $bg['url'];?>" alt="<?php echo $bg['alt'];?>">
        </div>
    
        <div class="featured-product-bg__container">

            <div class="featured-product-bg__product">

                <div class="featured-product-bg__product-wrapper"> 

                    <div class="featured-product-bg__product-image">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                    </div>

                    <div class="featured-product-bg__product-details">
                        <div class="featured-product-bg__product-add">
                            <?php echo $details;?>
                        </div>

                            <h4><?php echo $heading;?></h4>
                            <div class="featured-product-bg__product-price">
                                <h3><?php echo $price;?></h3>
                                <p>Plus Shipping<br>& Handling</p>
                            </div>
                            <div class="featured-product-bg__product-cta">
                            <?php if($type):?>
                            <a class="button button--primary" href="<?php echo $cta['url'];?>"><?php echo $cta['title'];?></a>
                            <?php else:?>
                            <a class="button button--primary quick-view-trigger" href="" data-product-id="<?php echo $id;?>">Add to Cart</a>
                            <?php endif;?>
                        </div>
                    </div>
 
                    </div>

                </div>
            
            
            </div>

        </div>
    </div>

<?php endif; ?>