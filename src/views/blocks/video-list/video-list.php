<?php
/**
 * Video List Block Template
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

    $title = get_field('title');
    $content = get_field('content');
    $videos = get_field('videos');

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'block--custom-layout__video-list';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }


    // Show preview image in preview mode
    if(get_field('preview_image')) :

        echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

    else :
?>

    <div class="video-list <?= $class_name ?>" <?= $anchor ?>>
        <div class="video-list__container">
            <div class="video-list__heading">
                <?php if($title):?>
                    <h2 class="video-list__title"><?= $title?></h2>
                <?php endif;?>
                <?php if($content):?>
                    <div class="video-list__content">
                        <?= $content?>
                    </div>
                <?php endif;?>
            </div>
            <?php if($videos):?>
                <div class="video-list__list">
                    <?php foreach($videos as $item):?>
                        <?php if($item):
                            $media_type = $item['media_type'];    
                        ?>
                            <div class="video-list__item">
                                <div class="video-list__item-inner">

                                    <?php if($media_type === 'embed'):
                                        $video_embed = $item['video_embed'];    
                                    ?>
                                        <div class="video-list__embed">
                                            <canvas width="550" height="330"></canvas>
                                            <?php if($video_embed):?>
                                                <?= $video_embed ?>
                                            <?php endif;?>
                                        </div>

                                    <?php endif;?>

                                    <?php if($media_type === 'video_file'):?>

                                        <div class="video-list__video">
                                            <canvas width="550" height="330"></canvas>
                                            <?php if($item['video']):?>
                                                <video src="<?= $item['video']['url']?>" controls>Your browser does not support video tag.</video>
                                            <?php endif;?>
                                        </div>

                                    <?php endif;?>

                                    <?php if($item['title']):?>
                                       <h3><?= $item['title']?></h3>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>