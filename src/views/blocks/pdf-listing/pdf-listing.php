<?php
/**
 * PDF Listing Block Template
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
$class_name = 'block--custom-layout__pdf-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="pdf-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
        <div class="pdf-listing__title">
            <?= $section_title ?>
        </div>
        
        <div class="pdf-listing__container">
            <div class="pdf-listing__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $thumbnail = get_sub_field('thumbnail');
                        $link = get_sub_field('link');
                        $name = get_sub_field('pdf_title')

                    
                    ?>
                
                    <div class="pdf-listing__column">
                        <div class="pdf-listing__inner">
                            <div class="pdf-listing__thumbnail">
                                <a href="<?php echo $link; ?>">
                                    <img src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                </a>
                            </div>
                                <h3><?php echo $name;?></h3>
                                <a target="_blank" class="button button--primary" href="<?php echo $link; ?>">Download</a>
                            
                    
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>
   
</div>

<?php endif; ?>


