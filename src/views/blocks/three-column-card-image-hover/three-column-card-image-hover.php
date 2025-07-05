<?php
/**
 * Three Column Card Image Hover Block Template
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
$class_name = 'block--custom-layout__three-column-card-image-hover';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="three-column-card-image-hover <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    <div class="three-column-card-image-hover__wrapper">
        <div class="three-column-card-image-hover__title">
            <?= $section_title ?>
        </div>
        <div class="three-column-card-image-hover__container">
            <div class="three-column-card-image-hover__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $heading = get_sub_field('heading');
                        $image = get_sub_field('image_hover');
                        $link = get_sub_field('link');
                    
                    ?>
                
                    <div class="three-column-card-image-hover__column">
                        <div class="three-column-card-image-hover__inner">
                            
                            <div class="three-column-card-image-hover__content">
                                <h5>
                                    <?php echo $heading;?>
                                </h5>

                                <div class="three-column-card-image-hover__cta">
                                    <a class="" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                                </div>
                            </div>
                            
                        
                        
                        

                            <div class="three-column-card-image-hover__img">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
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


