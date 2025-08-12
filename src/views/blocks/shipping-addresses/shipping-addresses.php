<?php
/**
 * Shipping Addresses Block Template
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

    $short_code = get_field('shortcode');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__shipping-addresses';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="shipping-addresses <?= $class_name ?>" <?= $anchor ?>>
        <div class="shipping-addresses__container">
            <?= do_shortcode($short_code) ?>
        </div>
    </div>

<?php endif; ?>