<?php
/**
 * Form Block Template
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
   
  
    $content = get_field('content');
    $form = get_field('form');

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


    <div class="form-block <?= $class_name ?>" <?= $anchor ?>>
        <div class="form-block__container">
            <div class="form-block__content">
                <?= $content ?>
            </div>

            <div class="form-block__listing">
                <div class="form-block__listing-row">

                    <?php if ( have_rows('listing') ) : ?>
                    
                        <?php while( have_rows('listing') ) : the_row(); ?>
                    
                            <div class="form-block__listing-col">
                                <div class="form-block__listing-inner">
                                    <?php echo get_sub_field('content');?>
                                </div>
                            </div>
                    
                        <?php endwhile; ?>
                    
                    <?php endif; ?>
                    
                </div>
            </div>

            <div class="form-block__form">
                <?= $form ?>
            </div>
        </div>
    </div>

   

<?php endif; ?>