<?php
/**
 * Quick Links Block Template
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
    $link_list = get_field('link_list');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__quick-links';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="quick-links <?= $class_name ?>" <?= $anchor ?>>
        <div class="quick-links__container">
            <div class="quick-links__inner">
                <?php if($title):?>
                    <h2 class="quick-links__title"><?= $title?></h2>
                <?php endif;?>

                <?php if($link_list):?>
                    <div class="quick-links__list">
                        <?php foreach($link_list as $item):?>
                            <?php if($item['link']):?>
                                <div class="quick-links__item">
                                    <a href="<?= $item['link']['url']?>" target="<?= $item['link']['target']?>">
                                        <?php if($item['title']):?>
                                            <h3 class="quick-links__item__title"><?= $item['title']?></h3>
                                        <?php endif;?>
                                        <?php if($item['content']):?>
                                            <div class="quick-links__item__content"><?= $item['content']?></div>
                                        <?php endif;?>
                                    </a>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>

<?php endif; ?>