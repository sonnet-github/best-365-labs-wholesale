<?php
/**
 * Supplement Facts Block Template
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
    $content = get_field('content');
    
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__doctor-banner';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="doctor-banner <?= $class_name ?>" <?= $anchor ?>>
    
        <div class="doctor-banner__container">

           
            <div class="doctor-banner__image">
                
             <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
              
            </div>

            <div class="doctor-banner__content">
                <div class="doctor-banner__text">
                    <?= $content ?>
                </div>
            </div>

            
        </div>
       
       
    </div>

<?php endif; ?>