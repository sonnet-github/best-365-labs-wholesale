<?php
/**
 * Mods Block Template
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
    $logo = get_field('logo');
    $title = get_field('title');
    $content = get_field('content');
    $image = get_field('image');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__mods';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="mods <?= $class_name ?>" <?= $anchor ?>>
        <div class="mods__container">
            <div class="mods__wrapper">
                <?php if($logo):?>
                    <div class="mods__logo">
                        <img src="<?= $logo['url']?>" alt="<?= $logo['alt']?>" width="430" height="100">
                    </div>
                <?php endif;?>
                <?php if($title):?>
                   <h2 class="mods__title"><?= $title?></h2>
                <?php endif;?>
                <?php if($content):?>
                    <div class="mods__content">
                        <?= $content ?>
                    </div>
                <?php endif;?>
                <?php if($image):?>
                    <div class="mods__image">
                        <img src="<?= $image['url']?>" alt="<?= $image['alt']?>">
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>

<?php endif; ?>