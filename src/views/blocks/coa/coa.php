<?php
/**
 * COA Listing Block Template
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
$section_title = get_field('title_content');
$content = get_field('content');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__coa';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="coa <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
    
        <div class="coa__container">

            <div class="coa__title">
                <?= $section_title ?>
            </div>

        
            <div class="coa__row">
                
                    <?php if ( have_rows('image_list') ) : ?>
                    
                        <?php while( have_rows('image_list') ) : the_row(); 
                        
                            $thumbnail = get_sub_field('image');
                            $link = get_sub_field('link')

                        
                        ?>
                    
                        <div class="coa__column">
                            <div class="coa__inner">

                                <div class="coa__thumbnail">
                                    <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
                                        <img src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                    </a>
                                </div>

                            </div>
                        </div>
                    
                        <?php endwhile; ?>
                    
                    <?php endif; ?>
                    
                </div>

                <div class="coa__content">
                <?= $content ?>
            </div>

    </div>

</div>

<?php endif; ?>


