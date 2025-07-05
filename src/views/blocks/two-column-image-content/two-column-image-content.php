<?php
/**
 * Two Column Image & Content Block Template
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
   
    $image = get_field('image');
    $title = get_field('section_title');
    $content = get_field('content');
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__two-column-image-content';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="two-column-image-content <?= $class_name ?>" <?= $anchor ?>>
        <div class="two-column-image-content__title">
            <?= $title ?>
        </div>
        <div class="two-column-image-content__container">
            <div class="two-column-image-content__image">
                <img class="desktop" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div>

            <div class="two-column-image-content__content">
                <div class="two-column-image-content__text">
                    <?= $content ?>
                </div>
            </div>
        </div>
       
       
    </div>

<?php endif; ?>