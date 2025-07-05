<?php
/**
 * Testimonial Slider Block Template
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
$class_name = 'block--custom-layout__testimonial-slider';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="testimonial-slider <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
        <div class="testimonial-slider__title">
            <?= $section_title ?>
        </div>
        
        <div class="testimonial-slider__container">
            <div class="testimonial-slider__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $name = get_sub_field('product_name');
                        $comment = get_sub_field('comment');
                        $client = get_sub_field('client_name');
                    
                    ?>
                
                    <div class="testimonial-slider__column">
                        <div class="testimonial-slider__inner">
                            
                            <div class="testimonial-slider__content">
                                <div class="testimonial-slider__comment">
                                    <?php echo $comment;?>
                                </div>

                                <div class="testimonial-slider__client">
                                    <p><?php echo $client;?></p>
                                </div>
                    
                            </div>
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

            <div class="testimonial-slider__arrow">
                <button class="testimonial-slider__prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 41"><path d="M20.3 40.8 0 20.5 20.3.2l.7.7L1.3 20.5 21 40.1z"></path></svg>
                </button>
                <button class="testimonial-slider__next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 41"><path d="M20.3 40.8 0 20.5 20.3.2l.7.7L1.3 20.5 21 40.1z"></path></svg></button>
            </div>
        </div>
   
</div>

<?php endif; ?>


