<?php
/**
 * Two Column Image & Content Block Template
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
   
    $image = get_field('thumbnail_preview');
    $title = get_field('section_content');
    $form = get_field('form');
   

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__report-form';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }

   
    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>


    <div class="report-form <?= $class_name ?>" <?= $anchor ?>>
        <div class="report-form__container">
            <div class="report-form__title">
                <?= $title ?>
            </div>

            <div class="report-form__main">
                
                <div class="report-form__image">
                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                </div>

                <div class="report-form__form">
                    <div class="report-form__form-wrapper">
                        <?= $form ?>

                        <div id="download-container"></div>
                    </div>
                </div>

            </div>
        </div>
       
    </div>

<?php endif; ?>