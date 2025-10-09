<?php
/**
 * Image Banner Block Template
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
    $content = get_field('content');
    $contentMobile = get_field('content_mobile');
    $primary_button = get_field('primary_button');
    $secondary_button = get_field('secondary_button');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__image-banner';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="image-banner <?= $class_name ?>" <?= $anchor ?>>
        <div class="image-banner__image">
            <img class="desktop" src="<?php echo $background['url'];?>" alt="<?php echo $background['alt'];?>">
            <img class="mobile"  src="<?php echo $backgroundMobile['url'];?>" alt="<?php echo $backgroundMobile['alt'];?>">
        </div>
        <div class="image-banner__container">
            <div class="image-banner__content">
                <?= $content ?>
            </div>
            <?php if($primary_button || $secondary_button):?>
                <div class="image-banner__cta-group">
                    <?php if($primary_button):?>
                        <a class="button button--primary" href="<?= $primary_button['url'] ?>" target="<?= $primary_button['target'] ?>"><?= $primary_button['title'] ?></a>
                    <?php endif;?>
                    <?php if($secondary_button):?>
                        <a class="button button--primary" href="<?= $secondary_button['url'] ?>" target="<?= $secondary_button['target'] ?>"><?= $secondary_button['title'] ?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>

    <div class="image-banner__mobile-content">
        <?php echo $contentMobile; ?>
    </div>

<?php endif; ?>