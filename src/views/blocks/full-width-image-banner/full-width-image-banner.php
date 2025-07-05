<?php
/**
 * Full Width Image Banner Block Template
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
   
    $background = get_field('background_image');
    $backgroundMobile = get_field('background_image_mobile');


    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__full-width-image-banner';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="full-width-image-banner <?= $class_name ?>" <?= $anchor ?>>
        <div class="full-width-image-banner__image">
            <img class="desktop" src="<?php echo $background['url'];?>" alt="<?php echo $background['alt'];?>">
            <img class="mobile"  src="<?php echo $backgroundMobile['url'];?>" alt="<?php echo $backgroundMobile['alt'];?>">
        </div>
    </div>

<?php endif; ?>