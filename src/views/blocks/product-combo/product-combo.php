<?php
/**
 * Product Combo Block Template
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

    $title = get_field('title');
    $product_list = get_field('product_list');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__product-combo';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="product-combo <?= $class_name ?>" <?= $anchor ?>>
        <div class="product-combo__container">
            <?php if($title):?>
                <div class="product-combo__title"><?= $title?></div>
            <?php endif;?>
            <?php if($product_list):?>
                <div class="product-combo__list">

                    <?php foreach($product_list as $product):
                        setup_postdata( $product ); 

                        $wc_product       = wc_get_product( $product->ID );
                        $product_title    = $wc_product->get_name();  
                        $short_desc_raw   = $wc_product->get_short_description();
                        $cta              = $wc_product->get_permalink();
                        $shortname        = get_field('short_name', $product->ID);
                        $featuredImg      = get_the_post_thumbnail( $product->ID, 'full' );   
                        $shortdesc         = get_field('product_short_description_home_page', $product->ID);
                    ?>
                        
                    
                        <div class="product-combo__item">
                            <div class="site-product product-combo__product">
                                <div class="site-product__inner">
                                    <div class="site-product__img">
                                        <canvas width="400" height="400"></canvas>
                                        <?= $featuredImg?>
                                    </div>
                                    <div class="site-product__details">
                                        <h3 class="site-product__title"><?= $product_title?></h3>
                                        <div class="site-product__description">
                                            <?= $shortdesc?>
                                        </div>
                                    </div>
                                    <div class="site-product__cta">
                                        <a href="<?php echo esc_url($cta); ?>" class="button button--primary site-product__button">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; wp_reset_postdata();?>
                    
                </div>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>