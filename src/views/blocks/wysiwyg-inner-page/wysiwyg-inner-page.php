<?php
/**
 * WYSIWYG Inner Page Block Template
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

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__wysiwyg-inner-page';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="wysiwyg-inner-page <?= $class_name ?>" <?= $anchor ?>>
        <div class="wysiwyg-inner-page__container">
            <div class="wysiwyg-inner-page__content">
                <?= $content ?>
            </div>
            
        </div>
    </div>

<?php endif; ?>