<?php
/**
 * Video Slider Block Template
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
$videolist = get_field('video_slider');

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__video-slider';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="video-slider <?= esc_attr($class_name) ?>" <?= $anchor ?>>

    <div class="video-slider__container">
        
        <div class="video-slider__gallery">
            <div class="video-slider__row">
                <?php 
                if ( $videolist ) : 
                    foreach ( $videolist as $post ) :
                        setup_postdata( $post );
                        $title       = get_the_title( $post->ID);  
                        $featuredImg = get_the_post_thumbnail( $post->ID, 'full' );
                        $video = get_field('video_link', $post->ID )
                ?>
                        <div class="video-slider__column" data-id="<?php echo $post->ID;?>">
                            <div class="video-slider__inner">
                                <div class="video-slider__video">
                                    <?php echo $video;?>
                                </div>
                                <div class="video-slider__thumbnail">
                                    <?php echo $featuredImg; ?>
                                </div>
                                <div class="video-slider__content">
                                    <h3><?php echo mb_strimwidth( $title, 0, 51, '...' );?></h3>
                                    <div class="video-slider__play">
                                        <svg viewBox="0 0 40 40" fill="currentColor" width="40" height="40">
                                            <defs>
                                                <path d="M20,37.8378378 C29.8515658,37.8378378 37.8378378,29.8515658 37.8378378,20 C37.8378378,10.1484342 29.8515658,2.16216216 20,2.16216216 C10.1484342,2.16216216 2.16216216,10.1484342 2.16216216,20 C2.16216216,29.8515658 10.1484342,37.8378378 20,37.8378378 Z M20,40 C8.954305,40 0,31.045695 0,20 C0,8.954305 8.954305,0 20,0 C31.045695,0 40,8.954305 40,20 C40,31.045695 31.045695,40 20,40 Z M26.594595,19.6756755 L15.1351351,12.972973 L15.1351351,26.378378 L26.594595,19.6756755 Z" id="path-play"></path>
                                            </defs>
                                            <g id="play-button" stroke="none" fill="none" stroke-width="1" fill-rule="evenodd">
                                                <g id="Awesome-Icons---slider-+-grid" transform="translate(-768 -876)">
                                                    <g id="Icons/play" transform="translate(768 876)">
                                                        <g id="play">
                                                            <mask id="mask-play" fill="currentColor">
                                                                <use xlink:href="#path-play"></use>
                                                            </mask>
                                                            <use id="Mask" fill="currentColor" fill-rule="nonzero" xlink:href="#path-play"></use>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <p>Play Video</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php 
                    endforeach; 
                    wp_reset_postdata(); // Reset post data after the loop
                endif; 
                ?>
            </div>
        </div>

        <div class="video-slider__arrow">
                <button class="video-slider__prev">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 41"><path d="M20.3 40.8 0 20.5 20.3.2l.7.7L1.3 20.5 21 40.1z"></path></svg>
                </button>
                <button class="video-slider__next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 41"><path d="M20.3 40.8 0 20.5 20.3.2l.7.7L1.3 20.5 21 40.1z"></path></svg></button>
        </div>
    </div>
</div>

<?php 
endif; 
?>
