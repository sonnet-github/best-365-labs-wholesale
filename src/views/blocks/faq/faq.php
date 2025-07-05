<?php
/**
 * FAQ Accordion Block Template
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
$class_name = 'block--custom-layout__faq';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if(get_field('preview_image')) :

    echo '<img src="'.\SDEV\Utils::getThemeResourcePath('src/views/blocks/').get_field('preview_image').'" style="width: 100%;" />';

else :
?>

<div class="faq <?= esc_attr($class_name) ?>" <?= $anchor ?>>
    
        <div class="faq__container">
            <div class="faq__title">
                <?= $section_title ?>
            </div>

            <div class="faq__row">
            
                <?php if ( have_rows('accordion') ) : ?>
                
                    <?php while( have_rows('accordion') ) : the_row(); 
                    
                        $heading = get_sub_field('heading');
                        $content = get_sub_field('content');

                        $shareUrl   = get_the_permalink();
                        $postTitle  = get_the_title();

                        $facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl);
                        $twitterShareUrl  = 'https://twitter.com/intent/tweet?url=' . urlencode($shareUrl) . '&text=' . urlencode($postTitle);
                        $linkedinShareUrl = 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($shareUrl) . '&title=' . urlencode($postTitle);
                    
                    ?>
                
                    <div class="faq__column">
                        <div class="faq__inner">
                            <div class="faq__heading">
                                <h4><?php echo $heading;?></h4>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="arrowDown" d="M8.14644661,10.1464466 C8.34170876,9.95118446 8.65829124,9.95118446 8.85355339,10.1464466 L12.4989857,13.7981758 L16.1502401,10.1464466 C16.3455022,9.95118446 16.6620847,9.95118446 16.8573469,10.1464466 C17.052609,10.3417088 17.052609,10.6582912 16.8573469,10.8535534 L12.4989857,15.2123894 L8.14644661,10.8535534 C7.95118446,10.6582912 7.95118446,10.3417088 8.14644661,10.1464466 Z"></path></svg>
                            </div>

                            <div class="faq__content">
                                <div class="faq__content-toggle">

                                
                                <div class="faq__content-text">
                                    <?php echo $content;?>
                                </div>

                                <div class="faq__share">

                                    <ul>
                                        <li>
                                        <a class="facebook" href="<?php echo esc_url( $facebookShareUrl ); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-labelledby="svgdf84d30c-3650-4775-afd5-25eed56c2096"><title id="svgdf84d30c-3650-4775-afd5-25eed56c2096">Facebook</title><g><path d="M20.0498 12.0498C20.0498 7.6028 16.444 4 12 4C7.55299 4 3.9502 7.6028 3.9502 12.0498C3.9502 16.0667 6.89291 19.3973 10.7422 20.0005V14.3772H8.69808V12.0503H10.7422V10.2758C10.7422 8.25885 11.9422 7.14496 13.7815 7.14496C14.6625 7.14496 15.5847 7.30193 15.5847 7.30193V9.28269H14.5679C13.5697 9.28269 13.2578 9.90404 13.2578 10.5405V12.0498H15.4901L15.1314 14.3767H13.2578V20C17.1041 19.3968 20.0498 16.0662 20.0498 12.0493V12.0498Z" fill="black"></path></g></svg>
                                            </a>
                                        </li>

                                        <li>
                                        <a class="facebook" href="<?php echo esc_url( $facebookShareUrl ); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-labelledby="svgdf84d30c-3650-4775-afd5-25eed56c2096"><title id="svgdf84d30c-3650-4775-afd5-25eed56c2096">Twitter</title><g><path d="M4.03948 4L10.2162 12.8251L4 20H5.39938L10.8411 13.7185L15.2387 20H20L13.4756 10.6792L19.2619 4.00114H17.8625L12.8506 9.7869L8.80073 4.00114H4.03948V4ZM6.09695 5.10085H8.28451L17.9425 18.898H15.7549L6.09695 5.10085Z" fill="black"></path></g></svg>
                                            </a>
                                        </li>

                                        <li>
                                        <a class="facebook" href="<?php echo esc_url( $facebookShareUrl ); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-labelledby="svgdf84d30c-3650-4775-afd5-25eed56c2096"><title id="svgdf84d30c-3650-4775-afd5-25eed56c2096">Linkedin</title><g><path d="M17.635 17.634h-2.372V13.92c0-.885-.016-2.024-1.234-2.024-1.235 0-1.423.965-1.423 1.96v3.778h-2.372V9.998h2.276v1.044h.033c.316-.6 1.09-1.233 2.245-1.233 2.403 0 2.847 1.58 2.847 3.637v4.188zM7.558 8.955a1.376 1.376 0 11.001-2.751 1.376 1.376 0 01-.001 2.751zm-1.187 8.679h2.374V9.998H6.371v7.636zM18.817 4H5.18C4.53 4 4 4.517 4 5.154v13.692C4 19.483 4.53 20 5.18 20h13.637c.652 0 1.183-.517 1.183-1.154V5.154C20 4.517 19.47 4 18.817 4z" fill-rule="evenodd"></path></g></svg>
                                            </a>
                                        </li>

                                        <li>
                                        <a class="copy-link" href="#" onclick="copyToClipboard('<?php echo get_permalink(); ?>'); return false;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" aria-labelledby="svgdf84d30c-3650-4775-afd5-25eed56c2096"><title id="svgdf84d30c-3650-4775-afd5-25eed56c2096">Copy Question Link</title><g><path id="prefix__b" d="M13.095 10.287l.137.142c1.505 1.63 1.678 4.01.282 5.406l-2.093 2.093-.137.13c-1.472 1.35-3.537 1.325-5.075-.213-1.59-1.59-1.593-3.774-.12-5.248l1.685-1.683.942.942-1.684 1.683-.106.112c-.845.944-.804 2.223.225 3.252 1.06 1.061 2.364 1.047 3.328.083l2.093-2.093.09-.097c.773-.895.595-2.463-.509-3.567l.942-.942zm-.38-4.31c1.473-1.348 3.538-1.324 5.076.214 1.59 1.59 1.593 3.774.12 5.248l-1.685 1.684-.942-.942 1.684-1.684.106-.112c.845-.944.804-2.223-.225-3.252-1.06-1.06-2.364-1.047-3.328-.083l-2.093 2.093-.09.097c-.773.895-.595 2.463.509 3.567l-.942.942-.137-.142c-1.505-1.63-1.678-4.01-.282-5.406l2.093-2.093z"></path></g></svg>
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
                    </div>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </div>

        </div>
   
</div>

<?php endif; ?>


