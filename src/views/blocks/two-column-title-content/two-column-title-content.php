<?php
/**
 * Two Column Title Content Block Template
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
    $content = get_field('content');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__two-column-title-content';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="two-column-title-content <?= $class_name ?>" <?= $anchor ?>>
        <div class="two-column-title-content__container">
            <div class="two-column-title-content__row">
                <div class="two-column-title-content__left">
                    <?php if($title):?>
                        <h2 class="two-column-title-content__title"><?= $title?></h2>
                    <?php endif;?>
                </div>
                <div class="two-column-title-content__right">
                    <?php if($content):?>
                        <div class="two-column-title-content__content"><?= $content?></div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>