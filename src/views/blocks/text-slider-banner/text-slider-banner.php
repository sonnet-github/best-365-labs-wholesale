<?php
/**
 * Text Slider Banner Block Template
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
    $slides = get_field('slides');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__text-slider-banner';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="text-banner-slider <?= $class_name ?>" <?= $anchor ?> style="background-color: <?= $background_color?>;">
        <div class="text-banner-slider__container">
            <?php if($title):?>
                <h1 class="text-banner-slider__title"><?= $title?></h1>
            <?php endif;?>
            <?php if($slides):?>
                <div class="text-banner-slider__slide-wrapper">
                    <div class="text-banner-slider__slider">
                        <?php foreach($slides as $item):?>
                            <?php if($item):?>
                                <div class="text-banner-slider__slide">
                                    <?php if($item['title']):?>
                                        <h3 class="text-banner-slider__slide-title"><?= $item['title']?></h3>
                                    <?php endif;?>
                                    <?php if($item['content']):?>
                                        <div class="text-banner-slider__content">
                                            <?= $item['content']?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>