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
$class_name = 'block--custom-layout__three-col-media-content-cta';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="three-col-media-content-cta <?= esc_attr($class_name) ?>" <?= $anchor ?>>

        <?php if($section_title):?>
        <div class="three-col-media-content-cta__title">
            <?= $section_title ?>
        </div>
        <?php endif;?>
        
        <div class="three-col-media-content-cta__container">
            <div class="three-col-media-content-cta__row">
            
                <?php if ( have_rows('listing') ) : ?>
                
                    <?php while( have_rows('listing') ) : the_row(); 
                    
                        $thumbnail = get_sub_field('thumbnail');
                        $type = get_sub_field('media_type');
                        $video = get_sub_field('video');
                        $cta = get_sub_field('cta');
                        $description = get_sub_field('description');

                    
                    ?>
                
                    <div class="three-col-media-content-cta__column <?php echo $type ? 'video' : '' ?>">
                        <div class="three-col-media-content-cta__inner">

                            <?php if($type):?>
                            <div class="three-col-media-content-cta__video">
                               <?php echo $video;?>
                            </div>
                            <?php else :?>
                            <div class="three-col-media-content-cta__thumbnail">
                            <a target="<?php echo $cta['target']; ?>" href="<?php echo $cta['url']; ?>">
                                    <img src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                </a>
                            </div>
                            <?php endif;?>
                            <div class="three-col-media-content-cta__text">
                                <p><?php echo $description;?></p>
                            </div>
                            
                            <?php if(!$type):?>
                                <div class="three-col-media-content-cta__cta">
                                <a target="<?php echo $cta['target']; ?>" class="button button--ghost" href="<?php echo $cta['url']; ?>"><?php echo $cta['title']; ?></a>
                                </div>
                            
                            <?php endif;?>
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>
</div>

<?php endif; ?>


