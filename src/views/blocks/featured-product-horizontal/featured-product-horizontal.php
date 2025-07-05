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
   
    $content = get_field('content');
    $lcontent = get_field('left_content');
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__featured-product-horizontal';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="featured-product-horizontal <?= $class_name ?>" <?= $anchor ?>>
    
        <div class="featured-product-horizontal__container">

            <div class="featured-product-horizontal__content">
                <?php echo $content;?>
            </div>

            <div class="featured-product-horizontal__product">
                
                    <?php if ( have_rows('product') ) : ?>
                    
                        <?php while( have_rows('product') ) : the_row(); 
                        
                            $image = get_sub_field('product_image');
                            $heading = get_sub_field('product_heading');
                            $price = get_sub_field('product_price');
                            $type = get_sub_field('add_to_cart');
                            $cta = get_sub_field('cta');
                            $id = get_sub_field('product_id');
                            $add = get_sub_field('product_additonal_text');

                        ?>

                        <div class="featured-product-horizontal__product-image">
                            <?php if($lcontent):?>
                                <p><?php echo $lcontent;?></p>
                            <?php endif;?>
                            <?php if($cta):?>
                            <a href="<?php echo $cta['url'];?>"><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"></a>
                            <?php else:?>
                                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                    
                        </div>

                        <div class="featured-product-horizontal__details">
                            <?php if($add):?>
                            <div class="featured-product-horizontal__product-add">
                                <?php echo $add;?>
                            </div>
                            <?php endif;?>
                            <h4><?php echo $heading;?></h4>
                            <div class="featured-product-horizontal__product-price">
                                <h3><?php echo $price;?></h3>
                                <p>Plus Shipping & Handling</p>
                            </div>
                            <div class="featured-product-horizontal__product-cta">
                                <?php if($type):?>
                                <a class="button button--primary buy" href="<?php echo $cta['url'];?>"><?php echo $cta['title'];?></a>
                                <?php else:?>
                                <a class="button button--primary quick-view-trigger" href="" data-product-id="<?php echo $id;?>">Add to Cart</a>
                                <?php endif;?>
                             </div>
                        </div>
                       
                
                        <?php endwhile; ?>
                    <?php endif; ?>
            </div>
        </div>
       
       
    </div>

<?php endif; ?>