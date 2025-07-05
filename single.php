<?php 
/* Template Name: Default Single Template
 * Template Post Type: post, page
 */
/**
 * Default single template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */

 $banner = get_field('full_width_banner');
 $subheading = get_field('sub_heading');
 $link = get_field('banner_link');
get_header(); ?>

<div id="page-content" class="page-blocks" data-tpl="single">
    <div class="single-post">
        <div class="single-post__container">

            <?php
                $custom_order = ['in-the-media', 'dr-warren', 'dr-gardner', 'health-wellness'];
                $current_cat_id = get_queried_object_id();
            ?>

            <div class="blog-listing__nav">
                <ul>
                    <li>
                        <a href="/blog" class="<?php if (!is_category()) echo 'active'; ?>">All Posts</a>
                    </li>
                    <?php
                    foreach ($custom_order as $slug) {
                        $cat = get_category_by_slug($slug);
                        if ($cat) {
                            $is_active = ($cat->term_id === $current_cat_id) ? 'active' : '';
                            echo '<li><a href="' . esc_url(get_category_link($cat->term_id)) . '" class="' . $is_active . '">' . esc_html($cat->name) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="single-post__content">

                <div class="single-post__title">
                    <h1><?php the_title(); ?></h1>
                    <?php if($subheading):?>
                        <p><?php echo $subheading;?></p>
                    <?php endif;?>
                </div>
              
                

                <?php if($banner):?>
                <div class="single-post__banner">
                    <?php if($link):?>
                        <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>"><img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>"></a>
                    <?php else:?>
                        <img src="<?php echo $banner['url'];?>" alt="<?php echo $banner['alt'];?>">
                    <?php endif;?>
                    
                </div>
                <?php endif;?>
                
                <div class="single-post__content-wrapper">

                
                <div class="single-post__content-text">
                    <?php the_content(); ?>
                </div>

                <div class="single-post__content-footer">

                    <!-- ✅ Post Categories -->
                    <div class="single-post__content-category">
                        <ul>

                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <!-- ✅ Social Share -->
                    <?php 
                        $share_url = urlencode(get_permalink());
                        $share_title = urlencode(get_the_title());
                    ?>
                    <div class="single-post__content-share">
                        <ul>
                            <li>
                                <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" aria-label="Facebook" class="Eueaet"><path d="M8.08865986,17 L8.08865986,10.2073504 L5.7890625,10.2073504 L5.7890625,7.42194226 L8.08865986,7.42194226 L8.08865986,5.08269399 C8.08865986,3.38142605 9.46779813,2.00228778 11.1690661,2.00228778 L13.5731201,2.00228778 L13.5731201,4.50700008 L11.8528988,4.50700008 C11.3123209,4.50700008 10.874068,4.94525303 10.874068,5.48583089 L10.874068,7.42198102 L13.5299033,7.42198102 L13.1628515,10.2073892 L10.874068,10.2073892 L10.874068,17 L8.08865986,17 Z"></path></svg>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer">
                                <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" class="Eueaet"><path d="M13.303 10.7714L19.1223 4H17.7433L12.6904 9.87954L8.65471 4H4L10.1028 12.8909L4 19.9918H5.37906L10.715 13.7828L14.977 19.9918H19.6317L13.3027 10.7714H13.303ZM11.4142 12.9692L10.7958 12.0839L5.87595 5.03921H7.9941L11.9645 10.7245L12.5829 11.6098L17.7439 18.9998H15.6258L11.4142 12.9696V12.9692Z"></path></svg>
                                </a>
                            </li>
                            <li>
                                <a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" viewBox="0 0 19 19" role="img" aria-label="LinkedIn" class="Eueaet"><path d="M17,17 L13.89343,17 L13.89343,12.1275733 C13.89343,10.9651251 13.87218,9.47069458 12.2781416,9.47069458 C10.660379,9.47069458 10.4126568,10.7365137 10.4126568,12.0434478 L10.4126568,17 L7.30623235,17 L7.30623235,6.98060885 L10.2883591,6.98060885 L10.2883591,8.3495072 L10.3296946,8.3495072 C10.7445056,7.56190587 11.7585364,6.7312941 13.2709225,6.7312941 C16.418828,6.7312941 17,8.80643844 17,11.5041407 L17,17 Z M3.80289931,5.61098151 C2.80647978,5.61098151 2,4.80165627 2,3.80498046 C2,2.80903365 2.80647978,2 3.80289931,2 C4.79669898,2 5.60434314,2.80903365 5.60434314,3.80498046 C5.60434314,4.80165627 4.79669898,5.61098151 3.80289931,5.61098151 Z M2.24786773,17 L2.24786773,6.98060885 L5.35662096,6.98060885 L5.35662096,17 L2.24786773,17 Z"></path></svg>
                                </a>
                            </li>
                            <li>
                                <a class="copy-link" href="#" onclick="copyToClipboard('<?php echo get_permalink(); ?>'); return false;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" aria-hidden="true" class="Eueaet"><path d="M10.6000004,11.7622375 L14.2108923,11.7622375 C15.4561791,11.7622375 16.4656836,10.7527331 16.4656836,9.50744629 L16.4656836,9.50744629 L16.4656836,9.50744629 C16.4656836,8.26215946 15.4561791,7.25265503 14.2108923,7.25265503 L10.6000004,7.25265503 L10.6000004,5.84470702 L10.6000004,5.84470702 C10.6000004,5.73425007 10.6895434,5.64470702 10.8000004,5.64470702 L14.3209766,5.64470702 C16.4501961,5.64470702 18.1762695,7.37078048 18.1762695,9.5 C18.1762695,11.6292195 16.4501961,13.355293 14.3209766,13.355293 L10.8000004,13.355293 L10.8000004,13.355293 C10.6895434,13.355293 10.6000004,13.2657499 10.6000004,13.155293 L10.6000004,11.7622375 Z M8.39999962,7.25265503 L4.82047474,7.25265503 C3.57518792,7.25265503 2.56568348,8.26215946 2.56568348,9.50744629 L2.56568348,9.50744629 L2.56568348,9.50744629 C2.56568348,10.7527331 3.57518792,11.7622375 4.82047474,11.7622375 L8.39999962,11.7622375 L8.39999962,13.1578418 C8.39999962,13.2682987 8.31045657,13.3578418 8.19999962,13.3578418 L4.60784179,13.3578418 C2.4772146,13.3578418 0.75,11.6306272 0.75,9.5 C0.75,7.36937281 2.4772146,5.64215821 4.60784179,5.64215821 L8.19999962,5.64215821 L8.19999962,5.64215821 C8.31045657,5.64215821 8.39999962,5.73170126 8.39999962,5.84215821 L8.39999962,7.25265503 Z M6.66568358,8.69999981 L12.2656836,8.69999981 C12.3761405,8.69999981 12.4656836,8.78954286 12.4656836,8.89999981 L12.4656836,10.1499998 C12.4656836,10.2604567 12.3761405,10.3499998 12.2656836,10.3499998 L6.66568358,10.3499998 C6.55522663,10.3499998 6.46568358,10.2604567 6.46568358,10.1499998 L6.46568358,8.89999981 C6.46568358,8.78954286 6.55522663,8.69999981 6.66568358,8.69999981 Z" transform="rotate(-45 9.463 9.5)"></path></svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <script>
                        function copyToClipboard(text) {
                            navigator.clipboard.writeText(text).then(function () {
                                alert('Link copied to clipboard!');
                            }, function (err) {
                                alert('Failed to copy link: ' + err);
                            });
                        }
                    </script>

                </div>

                </div>
            </div>

            <!-- ✅ Recent Posts -->
            <div class="single-post__recent-post">
                <div class="single-post__recent-post-header">
                    <p>Recent Post</p>
                    <a href="/blog">See All</a>
                </div>

                <?php
                $current_id = get_the_ID();
                $categories = get_the_category();
                $cat_ids = wp_list_pluck($categories, 'term_id');

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => array($current_id),
                    'category__in' => $cat_ids,
                );

                $recent_posts = new WP_Query($args);
                ?>

                <?php if ($recent_posts->have_posts()) : ?>
                    <div class="single-post__recent-listing">
                        <div class="single-post__recent-row">
                            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                <div class="single-post__recent-column">
                                    <div class="single-post__recent-inner">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="single-post__recent-thumb">
                                                <?php the_post_thumbnail('full'); ?>
                                            </div>
                                            
                                        <?php endif; ?>
                                        <div class="single-post__recent-text">
                                         <h3><?php the_title(); ?></h3>
                                        </div>
                                        
                                        <a href="<?php the_permalink(); ?>"></a>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="single-post__comment">
            
                <div class="single-post__comment-text">
                    <p>Comments</p>
                </div>

                <div class="single-post__comment-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" class="snEaQUB" style="fill-rule: evenodd;"><path d="M8.386 13C8.262 13 8.142 13.046 8.05 13.13L4.5 16.347V13.5C4.5 13.224 4.276 13 4 13H2C1.724 13 1.5 12.775 1.5 12.5V3.5C1.5 3.225 1.724 3 2 3H2.293L12.293 13H8.386ZM14 3C14.276 3 14.5 3.225 14.5 3.5V12.5C14.5 12.775 14.276 13 14 13H13.706L3.706 3H14ZM16 15.293L14.587 13.88C15.123 13.651 15.5 13.119 15.5 12.5V3.5C15.5 2.673 14.827 2 14 2H2.706L0.706 0L0 0.707L1.413 2.12C0.877 2.349 0.5 2.881 0.5 3.5V12.5C0.5 13.327 1.173 14 2 14H3.5V16.347C3.5 16.748 3.728 17.099 4.094 17.261C4.227 17.32 4.366 17.349 4.504 17.349C4.745 17.349 4.982 17.26 5.171 17.089C5.171 17.089 5.171 17.088 5.172 17.088L8.579 14H13.293L15.293 16L16 15.293Z"></path></svg>
                    <p>Commenting has been turned off.</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
