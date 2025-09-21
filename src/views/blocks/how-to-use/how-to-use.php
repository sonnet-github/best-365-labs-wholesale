<?php
/**
 * How To Use Block Template
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
    $products = get_field('products');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__how-to-use';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="how-to-use <?= $class_name ?>" <?= $anchor ?>>
        <div class="how-to-use__container custom-container">
            <?php if($title):?>
                <h2 class="how-to-use__title"><?= $title?></h2>
            <?php endif;?>
            <?php if($products):?>
                <div class="how-to-use__list">
                    <?php foreach($products as $item): 
                        $item_img = $item['image'];
                        $item_title = $item['title'];    
                        $item_description = $item['description'];    
                        $item_button = $item['button'];    
                    ?>
                       <div class="how-to-use__list-item">
                            <div class="how-to-use__list-img">
                                <canvas width="248" height="248"></canvas>
                                <?php if($item_img):?>
                                    <img src="<?= $item_img['url']?>" alt="<?= $item_img['alt']?>">
                                <?php endif;?>
                            </div>
                            <div class="how-to-use__list-content">
                                <?php if($item_title):?>
                                    <h3 class="how-to-use__list-title"><?= $item_title ?></h3>
                                <?php endif;?>
                                <?php if($item_description):?>
                                    <div class="how-to-use__list-description"><?= $item_description ?></div>
                                <?php endif;?>
                                <?php if($item_button):?>
                                    <div class="how-to-use__list-cta">
                                        <a href="<?= $item_button['url'] ?>" target="<?= $item_button['target'] ?>" class="button button--primary"><?= $item_button['title'] ?></a>
                                    </div>
                                <?php endif;?>
                            </div>
                       </div>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>