<?php
/**
 * Two Column Card Image Block Template
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

// Get ACF fields value and set default
$section_title = get_field('section_title');
$column = get_field('listing');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__two-column-image-card';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="two-column-image-card <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    <div class="two-column-image-card__wrapper">
        <div class="two-column-image-card__title">
            <?= $section_title ?>
        </div>
        <div class="two-column-image-card__container">
            <div class="two-column-image-card__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $heading = get_sub_field('heading');
                        $image = get_sub_field('image_hover');
                        $link = get_sub_field('link');
                    
                    ?>
                
                    <div class="two-column-image-card__column">
                        <div class="two-column-image-card__inner">

                            <div class="two-column-image-card__img">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </div>
                            
                            <div class="two-column-image-card__content">
                                <h5>
                                    <?php echo $heading;?>
                                </h5>

                                <div class="two-column-image-card__cta">
                                    <a class="button button--ghost" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>

<?php endif; ?>


