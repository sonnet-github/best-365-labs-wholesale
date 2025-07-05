<?php
/**
 * icon-listing Accordion Block Template
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
$section_title = get_field('content');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__icon-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="icon-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
        <div class="icon-listing__container">
            <div class="icon-listing__title">
                <?= $section_title ?>
            </div>

            <div class="icon-listing__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $svg = get_sub_field('svg_code');
                        $heading = get_sub_field('heading');
                    ?>
                
                    <div class="icon-listing__column">
                        <div class="icon-listing__inner">
                            <div class="icon-listing__icon">
                                <?php echo $svg;?>
                            </div>
                            
                            <div class="icon-listing__heading">
                                <h4><?php echo $heading;?></h4>
                            </div>

                            
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>
   
</div>

<?php endif; ?>


