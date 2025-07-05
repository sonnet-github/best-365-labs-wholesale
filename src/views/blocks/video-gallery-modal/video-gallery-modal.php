<?php
/**
 * Video Gallery Modal Block Template
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



// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__video-gallery-modal';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="video-gallery-modal <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    <div class="video-gallery-modal__title">
        <?= $section_title ?>
    </div>

    <div class="video-gallery-modal__container">
        <?php if ( have_rows('video_list') ) : ?>
        
            <?php while( have_rows('video_list') ) : the_row(); 
                $heading = get_sub_field('heading');
                $videolist = get_sub_field('videos');
                $slider = get_sub_field('slider');
            
            ?>

                <div class="video-gallery-modal__gallery">
                    <h3><?php echo $heading;?></h3>
                    <div class="video-gallery-modal__row" data-ids="<?php echo implode(',', array_column($videolist, 'ID'));?>">
                    <?php if ( $videolist ) : 
                        foreach ( $videolist as $post ) :
                            setup_postdata( $post );

                        
                            $title    = get_the_title( $post->ID);  
                            $featuredImg      = get_the_post_thumbnail( $post->ID, 'full' );
                            ?>
                            
                            
                                <div class="video-gallery-modal__column" data-id="<?php echo $post->ID;?>">
                                    <div class="video-gallery-modal__inner">
                                        <?php if ( $featuredImg ) : ?>
                                            <div class="video-gallery-modal__thumbnail">
                                                <h6><?php echo $title;?></h6>
                                            <?php echo $featuredImg; ?>
                                            <svg viewBox="0 0 40 40" fill="currentColor" width="40" height="40"><defs><path d="M20,37.8378378 C29.8515658,37.8378378 37.8378378,29.8515658 37.8378378,20 C37.8378378,10.1484342 29.8515658,2.16216216 20,2.16216216 C10.1484342,2.16216216 2.16216216,10.1484342 2.16216216,20 C2.16216216,29.8515658 10.1484342,37.8378378 20,37.8378378 Z M20,40 C8.954305,40 0,31.045695 0,20 C0,8.954305 8.954305,0 20,0 C31.045695,0 40,8.954305 40,20 C40,31.045695 31.045695,40 20,40 Z M26.594595,19.6756755 L15.1351351,12.972973 L15.1351351,26.378378 L26.594595,19.6756755 Z" id="path-play"></path></defs><g id="play-button" stroke="none" fill="none" stroke-width="1" fill-rule="evenodd"><g id="Awesome-Icons---slider-+-grid" transform="translate(-768 -876)"><g id="Icons/play" transform="translate(768 876)"><g id="play"><mask id="mask-play" fill="currentColor"><use xlink:href="#path-play"></use></mask><use id="Mask" fill="currentColor" fill-rule="nonzero" xlink:href="#path-play"></use></g></g></g></g></svg>
                                            </div>
                                            
                                        <?php endif; ?>
                                        
                                        <div class="video-gallery-modal__name">
                                            <h5><?php echo mb_strimwidth( $title, 0, 51, '...' );?>
                                        </div>
                                    
                                    </div>
                                </div>
                            
                        <?php
                        endforeach;
                        wp_reset_postdata();
                    endif; ?>
                     </div>
            
                </div>

                
        
            
            <?php endwhile; ?>
        
        <?php endif; ?>
    
    </div>
</div>


<?php endif; ?>


