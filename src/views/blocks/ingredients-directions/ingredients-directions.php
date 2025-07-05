<?php
/**
 * Ingredients & Directions Block Template
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
    $icon = get_field('svg_icon');
    $title = get_field('title');
    $bg = get_field('background_color');
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__ingredient-directions';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="ingredient-directions <?php echo $bg ? 'secondary' : " default";?> <?= $class_name ?>" <?= $anchor ?>>
    
        <div class="ingredient-directions__container">

            <div class="ingredient-directions__title">
                <?php echo $title;?>
            </div>


            <div class="ingredient-directions__wrapper">

                <div class="ingredient-directions__image">
                    <?php if($icon):?>
                        <?php echo $icon;?>
                    <?php else:?>
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endif;?>
                
                </div>

                <div class="ingredient-directions__content">
                    <div class="ingredient-directions__text">
                        <?= $content ?>
                    </div>
                </div>

            </div>
            
        </div>
       
    </div>

<?php endif; ?>