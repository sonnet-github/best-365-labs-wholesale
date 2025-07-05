<?php
/**
 * Advisor Listing Block Template
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
$class_name = 'block--custom-layout__advisor-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="advisor-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
    
        <div class="advisor-listing__container">

        <div class="advisor-listing__title">
            <?= $section_title ?>
        </div>

        
        <div class="advisor-listing__row">
            
                <?php if ( have_rows('advisors_list') ) : ?>
                
                    <?php while( have_rows('advisors_list') ) : the_row(); 
                    
                        $thumbnail = get_sub_field('featured_image');
                        $featuredPost = get_sub_field('featured_post');
                        $content = get_sub_field('content')

                    
                    ?>
                
                    <div class="advisor-listing__column">
                        <div class="advisor-listing__inner">

                            <div class="advisor-listing__thumbnail">
                                
                                <img src="<?php echo $thumbnail['url'];?>" alt="<?php echo $thumbnail['alt'];?>">
                                
                            </div>

                            <div class="advisor-listing__content">
                                <div class="advisor-listing__content-text">
                                    <?php echo $content;?>
                                </div>

                                <div class="advisor-listing__post">

                                    <div class="advisor-listing__post-row">
                                <?php 
                                    if ( $featuredPost ) : 
                                        foreach ( $featuredPost as $post ) :
                                            setup_postdata( $post );
                                            $title       = get_the_title( $post->ID);  
                                            $featuredImg = get_the_post_thumbnail( $post->ID, 'medium' );
                                            $link        = get_the_permalink( $post->ID );

                                              // Get author info
                                            $author_id   = get_post_field( 'post_author', $post->ID );
                                            $author_name = get_the_author_meta( 'display_name', $author_id );
                                            $author_link = get_author_posts_url( $author_id );
                                ?>

                                <div class="advisor-listing__post-column">

                                    <div class="advisor-listing__post-inner">

                                        <div class="advisor-listing__image">
                                            <?php echo $featuredImg; ?>
                                        </div>

                                        <div class="advisor-listing__post-content">
                                            <a href="<?php echo esc_url( $author_link ); ?>">
                                                <?php echo esc_html( $author_name ); ?>
                                            </a>

                                            <a class="title" href="<?php echo $link;?>">
                                                <?php echo $title;?>
                                            </a>
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
                            </div>
                               
                        
                        </div>
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>

</div>

<?php endif; ?>


