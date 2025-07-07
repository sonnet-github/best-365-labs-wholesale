<?php
/**
 * Card Content List Block Template
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

    $background_color = get_field('background-color') ? get_field('background-color') : '#46ABD3';
    $title = get_field('title');
    $card_list = get_field('card_list');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__card-content-list';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="card-content-list <?= $class_name ?>" <?= $anchor ?> style="background-color: <?= $background_color?>;">
        <div class="card-content-list__container">
            <?php if($title):?>
                <h2 class="card-content-list__title"><?= $title?></h2>
            <?php endif;?>
            <?php if($card_list):?>
                <div class="card-content-list__list">
                    <?php foreach($card_list as $item):?>
                        <?php if($item):?>
                            <div class="card-content-list__item">
                                <div class="card-content-list__item__inner">
                                    <?php if($item['title']):?>
                                        <h3 class="card-content-list__item__title"><?= $item['title']?></h3>
                                    <?php endif;?>
                                    <?php if($item['content']):?>
                                        <div class="card-content-list__item__content"><?= $item['content']?></div>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>