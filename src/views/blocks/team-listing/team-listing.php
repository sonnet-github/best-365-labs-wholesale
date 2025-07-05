<?php
/**
 * Team Listing Block Template
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
$section_title = get_field('content');


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__team-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="team-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
    
        <div class="team-listing__container">

        <div class="team-listing__title">
            <?= $section_title ?>
        </div>

        
        <div class="team-listing__row">
            
                <?php if ( have_rows('team_listing') ) : ?>
                
                    <?php while( have_rows('team_listing') ) : the_row(); 
                    
                        $thumbnail = get_sub_field('thumbnail');
                        $content = get_sub_field('content')

                    
                    ?>
                
                    <div class="team-listing__column">
                        <div class="team-listing__inner">

                            <div class="team-listing__thumbnail">
                                
                                <img src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                
                            </div>

                            <div class="team-listing__content">
                                <div class="team-listing__content-text">
                                    <?php echo $content;?>
                                </div>

                            </div>
                         
                        
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>

</div>

<?php endif; ?>


