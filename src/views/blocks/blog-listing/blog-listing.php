<?php
/**
 * Blog listing Block Template
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
$class_name = 'block--custom-layout__blog-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="blog-listing <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
        <div class="blog-listing__container">
            <div class="blog-listing__title">
                <?= $section_title ?>
            </div>

            <div class="blog-listing__nav">
            
                <?php if ( have_rows('nav') ) : ?>
                    <ul>

                    
                    <?php while( have_rows('nav') ) : the_row(); 
                    
                        $link = get_sub_field('link');
                    ?>
                
                        <li>
                            <a href="<?php echo $link['url'];?>">
                                <?php echo $link['title'];?>
                            </a>
                        </li>
                
                    <?php endwhile; ?>
                

                    </ul>
                <?php endif; ?>
                
            </div>

            <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1,
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $author_id = get_the_author_meta('ID');
                        ?>
                        <div class="blog-listing__post">
                            <div class="blog-listing__row">
                                <div class="blog-listing__column">
                                    <div class="blog-listing__inner">
                                        <div class="blog-listing__thumbnail">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php echo get_the_permalink();?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"></a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="blog-listing__details">
                                            <div class="blog-listing__details-meta">
                                                <?php echo get_avatar($author_id, 32); ?>
                                                <span>
                                                    <?php the_author(); ?><br>
                                                    <?php echo get_the_date('M j, Y'); ?>
                                                </span>
                                            </div>
                                            <div class="blog-listing__details-content">
                                                <h2><?php the_title(); ?></h2>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                                <a href="<?php echo get_the_permalink();?>"></a>
                                            </div>
                                        
                                            <div class="blog-listing__details-share">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" aria-hidden="true" class="blog-post-category-description-fill blog-post-homepage-link-hashtag-hover-fill"><path d="M2.44398805,5.99973295 C1.62345525,5.9690612 0.980075653,5.28418875 1.00047182,4.46312144 C1.02086799,3.64205413 1.69745853,2.98998831 2.51850166,3.0001164 C3.33954478,3.01024449 3.99985313,3.67880182 4,4.50012255 C3.98424812,5.34399206 3.28763905,6.0153508 2.44398805,5.99973295 L2.44398805,5.99973295 Z M2.44398805,10.9997329 C1.62345525,10.9690612 0.980075653,10.2841888 1.00047182,9.46312144 C1.02086799,8.64205413 1.69745853,7.98998831 2.51850166,8.0001164 C3.33954478,8.01024449 3.99985313,8.67880182 4,9.50012255 C3.98424812,10.3439921 3.28763905,11.0153508 2.44398805,10.9997329 L2.44398805,10.9997329 Z M2.44398805,15.9997329 C1.62345525,15.9690612 0.980075653,15.2841888 1.00047182,14.4631214 C1.02086799,13.6420541 1.69745853,12.9899883 2.51850166,13.0001164 C3.33954478,13.0102445 3.99985313,13.6788018 4,14.5001225 C3.98424812,15.3439921 3.28763905,16.0153508 2.44398805,15.9997329 L2.44398805,15.9997329 Z"></path></svg>
                                                </button>

                                                <div class="blog-listing__details-share-button">
                                                    <div class="blog-listing__details-share-button-container">
                                                        <p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" class="blog-icon-fill"><path d="M16.9410444,8.39109677 C17.0195644,8.46818967 17.0195644,8.59371274 16.9410444,8.67080564 L11.9026789,13.6176004 C11.7063789,13.8103326 11.3872657,13.8103326 11.1909657,13.6176004 C11.096339,13.5246935 11.0429857,13.3991705 11.0429857,13.2677172 L11.0429857,11.0013834 C7.27402658,11.0013834 4.38690723,12.7339971 2.38263435,16.1972475 C2.27794104,16.3781194 1.99204777,16.3049799 2.0001011,16.0964337 C2.24975438,10.0357454 5.2637137,6.69011101 11.0429857,6.05953059 L11.0429857,3.79418524 C11.0429857,3.52040659 11.268479,3.29999995 11.5463189,3.29999995 C11.6802056,3.29999995 11.8080522,3.35139522 11.9026789,3.44430206 L16.9410444,8.39109677 Z M3.43409745,13.1243046 C5.43837033,11.0576217 7.98624309,10.0139024 11.0434891,10.0139024 L12.0501555,10.0139024 L12.0501555,12.0746551 L15.6600614,8.53035818 L12.0501555,4.98704968 L12.0501555,6.94501178 L11.1542224,7.0418721 C6.94635665,7.50146442 4.39949056,9.49994971 3.43409745,13.1243046 Z"></path></svg>
                                                            <span>Share Post</span>
                                                        </p>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No posts found.</p>';
                endif;
                ?>
        </div>
</div>

<div class="blog-listing__share-popup">
    <div class="blog-listing__share-bg">
        
    <div class="blog-listing__share-close">
        <button>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" style="fill: rgb(255, 255, 255); fill-rule: evenodd;"><path d="M10976.4,1024.73l-14.3,14.28,13.9,13.92-0.7.74-14-13.92-14.2,14.25-0.8-.74,14.3-14.25-14.6-14.61,0.7-.74,14.6,14.61,14.3-14.28Z" transform="translate(-10946.15 -1023.83)"></path></svg>
        </button>
        
    </div>
        <div class="blog-listing__share-container">

        <p>Share Post</p>

        <ul>
            <li>
                <a class="facebook" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" aria-label="Facebook" class="LopxWC"><path d="M8.08865986,17 L8.08865986,10.2073504 L5.7890625,10.2073504 L5.7890625,7.42194226 L8.08865986,7.42194226 L8.08865986,5.08269399 C8.08865986,3.38142605 9.46779813,2.00228778 11.1690661,2.00228778 L13.5731201,2.00228778 L13.5731201,4.50700008 L11.8528988,4.50700008 C11.3123209,4.50700008 10.874068,4.94525303 10.874068,5.48583089 L10.874068,7.42198102 L13.5299033,7.42198102 L13.1628515,10.2073892 L10.874068,10.2073892 L10.874068,17 L8.08865986,17 Z"></path></svg>
                </a>
            </li>
            <li>
                <a class="twitter" href="">
                <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" class="LopxWC"><path d="M13.303 10.7714L19.1223 4H17.7433L12.6904 9.87954L8.65471 4H4L10.1028 12.8909L4 19.9918H5.37906L10.715 13.7828L14.977 19.9918H19.6317L13.3027 10.7714H13.303ZM11.4142 12.9692L10.7958 12.0839L5.87595 5.03921H7.9941L11.9645 10.7245L12.5829 11.6098L17.7439 18.9998H15.6258L11.4142 12.9696V12.9692Z"></path></svg>
                </a>
            </li>
            <li>
                <a class="linkedin" href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" aria-label="LinkedIn" class="LopxWC"><path d="M17,17 L13.89343,17 L13.89343,12.1275733 C13.89343,10.9651251 13.87218,9.47069458 12.2781416,9.47069458 C10.660379,9.47069458 10.4126568,10.7365137 10.4126568,12.0434478 L10.4126568,17 L7.30623235,17 L7.30623235,6.98060885 L10.2883591,6.98060885 L10.2883591,8.3495072 L10.3296946,8.3495072 C10.7445056,7.56190587 11.7585364,6.7312941 13.2709225,6.7312941 C16.418828,6.7312941 17,8.80643844 17,11.5041407 L17,17 Z M3.80289931,5.61098151 C2.80647978,5.61098151 2,4.80165627 2,3.80498046 C2,2.80903365 2.80647978,2 3.80289931,2 C4.79669898,2 5.60434314,2.80903365 5.60434314,3.80498046 C5.60434314,4.80165627 4.79669898,5.61098151 3.80289931,5.61098151 Z M2.24786773,17 L2.24786773,6.98060885 L5.35662096,6.98060885 L5.35662096,17 L2.24786773,17 Z"></path></svg>
                </a>
            </li>
            <li>
                <a class="copy-link" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" aria-hidden="true" class="LopxWC"><path d="M10.6000004,11.7622375 L14.2108923,11.7622375 C15.4561791,11.7622375 16.4656836,10.7527331 16.4656836,9.50744629 L16.4656836,9.50744629 L16.4656836,9.50744629 C16.4656836,8.26215946 15.4561791,7.25265503 14.2108923,7.25265503 L10.6000004,7.25265503 L10.6000004,5.84470702 L10.6000004,5.84470702 C10.6000004,5.73425007 10.6895434,5.64470702 10.8000004,5.64470702 L14.3209766,5.64470702 C16.4501961,5.64470702 18.1762695,7.37078048 18.1762695,9.5 C18.1762695,11.6292195 16.4501961,13.355293 14.3209766,13.355293 L10.8000004,13.355293 L10.8000004,13.355293 C10.6895434,13.355293 10.6000004,13.2657499 10.6000004,13.155293 L10.6000004,11.7622375 Z M8.39999962,7.25265503 L4.82047474,7.25265503 C3.57518792,7.25265503 2.56568348,8.26215946 2.56568348,9.50744629 L2.56568348,9.50744629 L2.56568348,9.50744629 C2.56568348,10.7527331 3.57518792,11.7622375 4.82047474,11.7622375 L8.39999962,11.7622375 L8.39999962,13.1578418 C8.39999962,13.2682987 8.31045657,13.3578418 8.19999962,13.3578418 L4.60784179,13.3578418 C2.4772146,13.3578418 0.75,11.6306272 0.75,9.5 C0.75,7.36937281 2.4772146,5.64215821 4.60784179,5.64215821 L8.19999962,5.64215821 L8.19999962,5.64215821 C8.31045657,5.64215821 8.39999962,5.73170126 8.39999962,5.84215821 L8.39999962,7.25265503 Z M6.66568358,8.69999981 L12.2656836,8.69999981 C12.3761405,8.69999981 12.4656836,8.78954286 12.4656836,8.89999981 L12.4656836,10.1499998 C12.4656836,10.2604567 12.3761405,10.3499998 12.2656836,10.3499998 L6.66568358,10.3499998 C6.55522663,10.3499998 6.46568358,10.2604567 6.46568358,10.1499998 L6.46568358,8.89999981 C6.46568358,8.78954286 6.55522663,8.69999981 6.66568358,8.69999981 Z" transform="rotate(-45 9.463 9.5)"></path></svg>
                </a>
            </li>
        </ul>
        </div>
    </div>
</div>
<?php endif; ?>


