<?php
/**
 * Footer Lower Template (Footer Block)
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */ 

 $footerLogo = get_field('footer_logo' , 'option');
 $copy = get_field('copyright_text' , 'option');
 $footerText = get_field('footer_text_content' , 'option');
 $form = get_field('newsletter_form_shortcode' , 'option');
 $address = get_field('address' , 'option');

 $image = get_field('thumbnail_preview', 'option');
 $title = get_field('section_content', 'option');
 $formReport = get_field('form', 'option');

?>
    <div class="report-form">
        <div class="report-form__container">
            <div class="report-form__title">
                <?= $title ?>
            </div>

            <div class="report-form__main">

                <?php if($image):?>
                    <div class="report-form__image">
                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                    </div>
                <?php endif;?>

                <div class="report-form__form <?= $image ? 'has-img' : ''?>">
                    <div class="report-form__form-wrapper">
                        <?= $formReport ?>

                        <div id="download-container"></div>
                    </div>
                </div>

            </div>
        </div>
       
    </div>
<footer class="footer">
    <div class="footer__container">

        <div class="footer__top">
            <div class="footer__logo">
                <?php echo $footerLogo; ?>
                <p>Publicly Trader: NOTR</p>
            </div>

            <div class="footer__socials">
                <p>Follows us on:</p>

                <ul>
                    <?php if ( have_rows('social_media' , 'option') ) : ?>
                    
                        <?php while( have_rows('social_media' , 'option') ) : the_row(); 

                            $icon = get_sub_field('svg_icon');
                            $link = get_sub_field('link');
                            $image = get_sub_field('icon_image');

                        ?>
                    
                            <li>
                                <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">

                                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                </a>
                            </li>
                    
                        <?php endwhile; ?>
                    
                    <?php endif; ?>
                    
                </ul>
            </div>
        </div>

        
            <div class="footer__mid">
                <div class="footer__mid-left">
                    <div class="footer__menu one">
                        <ul>
                            <?php if ( have_rows('footer_menu_one' , 'option') ) : ?>
                            
                                <?php while( have_rows('footer_menu_one' , 'option') ) : the_row(); 

                                    $menu1 = get_sub_field('menu');
                                
                                ?>

                                <li>
                                    <a target="<?php echo $menu1['target'];?>" href="<?php echo $menu1['url'];?>"><?php echo $menu1['title'];?></a>
                                </li>
                            
                                <?php endwhile; ?>
                            
                            <?php endif; ?>
                            
                        </ul>
                    </div>

                    <div class="footer__menu two">
                        <ul>
                            <?php if ( have_rows('footer_menu_two' , 'option') ) : ?>
                            
                                <?php while( have_rows('footer_menu_two' , 'option') ) : the_row(); 

                                    $menu2 = get_sub_field('menu');
                                
                                ?>

                                <li>
                                    <a target="<?php echo $menu2['target'];?>" href="<?php echo $menu2['url'];?>"><?php echo $menu2['title'];?></a>
                                </li>
                            
                                <?php endwhile; ?>
                            
                            <?php endif; ?>
                            
                        </ul>
                    </div>

                    <div class="footer__address">
                        <?php echo $address;?>
                    </div>
                </div>
            </div>
        

        <div class="footer__bottom">
            <div class="footer__bottom-content">
                <?php echo $footerText?>
            </div>

            <div class="footer__copy">
                <p><?php echo $copy;?></p>
            </div>
        </div>
    </div>
</footer>

<section class="video-modal">
    <div class="video-modal__main-wrapper">

        <div class="video-modal__nav">
           
            <div class="video-modal__heading">
                <div class="video-modal__back">
                    <button id="modalBack">
                    <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10.7672 7.5431C11.0672 7.25744 11.0788 6.78271 10.7931 6.48276C10.5074 6.18281 10.0327 6.17123 9.73276 6.4569L10.7672 7.5431ZM4.48276 11.4569C4.18281 11.7426 4.17123 12.2173 4.4569 12.5172C4.74256 12.8172 5.21729 12.8288 5.51724 12.5431L4.48276 11.4569ZM5.51724 11.4569C5.21729 11.1712 4.74256 11.1828 4.4569 11.4828C4.17123 11.7827 4.18281 12.2574 4.48276 12.5431L5.51724 11.4569ZM9.73276 17.5431C10.0327 17.8288 10.5074 17.8172 10.7931 17.5172C11.0788 17.2173 11.0672 16.7426 10.7672 16.4569L9.73276 17.5431ZM5 11.25C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75V11.25ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM9.73276 6.4569L4.48276 11.4569L5.51724 12.5431L10.7672 7.5431L9.73276 6.4569ZM4.48276 12.5431L9.73276 17.5431L10.7672 16.4569L5.51724 11.4569L4.48276 12.5431ZM5 12.75H19V11.25H5V12.75Z" fill="#000000"></path> </g></svg>
                    </button>
                </div>
                <p id="galleryHeading">NeuroPro Plus</p> <span>|</span> 
                <button id="shareButton"><svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24"><path d="M15.221 5.361l4.453 4.722-4.453 4.723v-1.7l-.758-.19a9.37 9.37 0 0 0-2.274-.283c-2.936 0-5.684 1.228-7.673 3.211 2.179-8.31 8.905-8.783 9.758-8.783h.947v-1.7zm-.947.756C12.189 6.21 3.664 7.627 3 20c1.516-3.778 5.116-6.328 9.19-6.328.663 0 1.326.095 2.084.19v3.305L21 10.083 14.274 3v3.117z"></path></svg> Share</sbutton>
            </div>

            <div class="video-modal__close">
                <button>
                    <svg viewBox="0 0 22 22" fill="currentColor" width="1em" height="1em"><path stroke="currentColor" fill="currentColor" d="M9.996 9.29L.707 0 0 .707l9.29 9.29L0 19.285l.707.707 9.29-9.29 9.289 9.29.707-.707-9.29-9.29 9.29-9.289L19.286 0l-9.29 9.29z" transform="translate(1 1)" stroke-linecap="round" fill-rule="evenodd"></path></svg>
                </button>
            </div>

            <div class="video-modal__share-mobile">
                <button id="shareMobile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14"><path fill="#FFF" fill-rule="evenodd" d="M4.125 6.216a1.98 1.98 0 0 1 .077 1.355l4.495 2.64a2.2 2.2 0 0 1 1.16-.329c1.183 0 2.143.922 2.143 2.06C12 13.077 11.04 14 9.856 14c-1.183 0-2.143-.922-2.143-2.059 0-.42.132-.81.356-1.135L3.803 8.3a2.17 2.17 0 0 1-1.661.759C.959 9.059 0 8.137 0 7s.96-2.059 2.142-2.059c.586 0 1.117.227 1.504.592l4.271-2.596a1.983 1.983 0 0 1-.204-.878C7.713.922 8.673 0 9.856 0 11.04 0 12 .922 12 2.059s-.96 2.059-2.144 2.059a2.19 2.19 0 0 1-1.424-.52L4.125 6.215z"></path></svg>
                </button>
            </div>
            
        </div>
        <div class="video-modal__container">

        <div class="video-modal__arrow">
            <button class="video-modal__prev">
                <svg viewBox="0 0 53 100" fill="currentColor" width="1em" height="1em"><path fill="currentColor" d="M5.16 99.14L2.15 96.13 48.6 50.11 2.15 4.3 5.16 1.29 54.62 50.11"></path></svg>
            </button>

            <button class="video-modal__next">
                <svg viewBox="0 0 53 100" fill="currentColor" width="1em" height="1em"><path fill="currentColor" d="M5.16 99.14L2.15 96.13 48.6 50.11 2.15 4.3 5.16 1.29 54.62 50.11"></path></svg>
            </button>
        </div>

            <div class="video-modal__video-wrapper">
                <div class="video-modal__video">
                    <div id="videoEmbed"class="video-modal__video-iframe">

                    </div>
                    <div class="video-modal__video-placeholder">
                        <div id="placeholder" class="video-modal__video-thumbnail">

                        </div>
                        

                        <div class="video-modal__video-title">
                            <h6>Powering your cellular batteries -- Mitochondria</h6>
                            <h2 class="videoTitle"></h2>
                            <button>
                            <svg width="56" height="56" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg" class="GWNNH0"><g fill="#FFF" fill-rule="evenodd"><path d="M28 53c13.807 0 25-11.193 25-25S41.807 3 28 3 3 14.193 3 28s11.193 25 25 25Zm0 3C12.536 56 0 43.464 0 28S12.536 0 28 0s28 12.536 28 28-12.536 28-28 28Z"></path><path d="M37.232 27.91 22 36.82V19z"></path></g></svg>
                            </button>
                        </div>
                    </div>

                    <div class="video-modal__share">
                        <div class="video-modal__share-close">

                            <button id="shareClose">
                                <svg viewBox="0 0 22 22" fill="currentColor" width="1em" height="1em"><path stroke="currentColor" fill="currentColor" d="M9.996 9.29L.707 0 0 .707l9.29 9.29L0 19.285l.707.707 9.29-9.29 9.289 9.29.707-.707-9.29-9.29 9.29-9.289L19.286 0l-9.29 9.29z" transform="translate(1 1)" stroke-linecap="round" fill-rule="evenodd"></path></svg>
                            </button>

                        </div>

                        <div class="video-modal__share-content">

                        
                        <h3>Share this video</h3>

                        <ul>
                            <li>
                                <a class="facebook" target="_blank" href="">
                                    <svg viewBox="0 0 21 21" fill="currentColor" width="1em" height="1em"><path id="a_1_" fill="currentColor" d="M1.6,0h17.8C20.3,0,21,0.7,21,1.6c0,0,0,0,0,0v17.8c0,0.9-0.7,1.6-1.6,1.6l0,0H1.6 C0.7,21,0,20.3,0,19.4c0,0,0,0,0,0V1.6C0,0.7,0.7,0,1.6,0z M12,21h3v-9h3V9h-3c-0.1-0.3-0.1-0.9,0-2c-0.1-0.5,0.3-0.9,1-1h2V3 c-1,0-2,0-3,0c-2.7,0.3-3.7,2.3-3,6H9v3h3V21z"></path><defs><filter id="Adobe_OpacityMaskFilter" filterUnits="userSpaceOnUse" x="0" y="0" width="68" height="65"><feColorMatrix values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 1 0"></feColorMatrix></filter></defs><mask maskUnits="userSpaceOnUse" x="0" y="0" width="68" height="65" id="vod_FacebookIcon_b"><g filter="url(#Adobe_OpacityMaskFilter)"><path id="a" fill="currentColor" d="M1.6,0h17.8C20.3,0,21,0.7,21,1.6c0,0,0,0,0,0v17.8c0,0.9-0.7,1.6-1.6,1.6l0,0H1.6 C0.7,21,0,20.3,0,19.4c0,0,0,0,0,0V1.6C0,0.7,0.7,0,1.6,0z M12,21h3v-9h3V9h-3c-0.1-0.3-0.1-0.9,0-2c-0.1-0.5,0.3-0.9,1-1h2V3 c-1,0-2,0-3,0c-2.7,0.3-3.7,2.3-3,6H9v3h3V21z"></path></g></mask><g mask="url(#vod_FacebookIcon_b)"><path fill="currentColor" d="M0,0h68v65H0V0z"></path></g></svg>
                                </a>
                            </li>

                            <li>
                                <a class="twitter" target="_blank" href="">
                                    <svg viewBox="0 0 24 21" fill="currentColor" width="1em" height="1em"><g transform="translate(0 1)"><path id="a" fill="currentColor" d="M2.4,12.9c1-0.2,1.7-0.2,2.4,0v-0.8c-1.3,0.1-2.4-0.7-3.2-1.6c-0.4-1-0.7-1.9-0.8-3.2 C1.6,8,2.4,8.2,3.2,8.1C2.1,7.5,1.4,6.5,0.8,5.7c0-1.6,0.2-2.8,0.8-4C4.3,4.9,7.7,6.6,12,6.5c-0.4-1.3-0.2-2.4,0.8-3.2 c0.4-1.3,1.6-2.1,3.2-2.4c1.5-0.2,2.9,0.3,4,1.6c1.4-0.3,2.3-0.7,3.2-0.8V0.9c-0.2,1.5-1,2.4-1.6,3.2c0.6-0.3,1.5-0.5,2.4-0.8 c-0.2,0.2-0.4,0.4-0.8,0.8c-0.3,0.5-0.9,1-1.6,1.6c0,0.8,0,1.5,0,2.4c-0.3,1.3-0.8,2.8-1.6,4c-0.5,1.6-1.4,2.8-2.4,4 c-1.9,1.9-4.2,3.1-7.2,4c-0.6-0.1-1.5,0-2.4,0c-2.8,0.1-5.5-0.6-8-2.4c1.7,0.4,3.4,0.2,4.8-0.8c1,0,1.7-0.4,2.4-0.8 C4.7,15.8,3.1,14,2.4,12.9z"></path></g></svg>
                                </a>
                            </li>

                            <li>
                                <a class="pinterest" target="_blank" href="">
                                <svg viewBox="0 0 19 23" fill="currentColor" width="1em" height="1em"><path id="a" fill="currentColor" d="M7.9,15.2c-0.9,3.3-1,4-1.9,5.6c-0.4,0.7-0.9,1.4-1.5,2.1L4.2,23l-0.2-0.2c-0.2-1-0.2-2-0.2-3 c0-1.3,0.2-1.8,2-8.9l0-0.3C5.4,9.4,5.4,8.3,5.7,7.1C6.6,4.7,9.5,4.5,10,6.5c0.3,1.2-0.5,2.9-1.2,5.3c-0.5,2,2,3.4,4.1,2 c2-1.3,2.7-4.6,2.6-6.8c-0.3-4.5-5.6-5.5-9-4.1c-3.9,1.7-4.7,6.2-3,8.2c0.2,0.3,0.4,0.4,0.3,0.7c-0.1,0.4-0.2,0.8-0.3,1.2 c-0.1,0.3-0.4,0.4-0.7,0.3c-0.6-0.2-1.2-0.6-1.6-1.1c-1.5-1.7-1.9-5.1,0.1-8C3.5,1,7.5-0.3,11.2,0.1c4.4,0.5,7.2,3.3,7.7,6.5 c0.2,1.5,0.1,5.1-2.1,7.6c-2.5,2.9-6.6,3.1-8.5,1.3c-0.1-0.1-0.3-0.3-0.4-0.5L7.9,15.2z"></path></svg>
                                </a>
                            </li>

                            <li>
                                <a class="tumblr" target="_blank" href="">
                                <svg viewBox="0 0 12 18" fill="currentColor" width="1em" height="1em"><path id="a" fill="currentColor" d="M6.5,10.7l0.1-3h4.2V4.6H6.6c0.1-2.5,0.1-3.8,0-3.8H4.2c-0.4,2.3-1.8,4.1-4,4.6L0.1,7.7h2.8v4.7 c0.2,2.2,0.7,3.6,1.5,4.3c1.1,0.7,1.8,1,3.8,1c0.5,0,1,0,1.6,0l1.5-0.9v-2.7c-2,0.6-3.4,0.6-4.3,0C6.6,13.8,6.4,12.6,6.5,10.7 L6.5,10.7z"></path></svg>
                                </a>
                            </li>

                            <li>
                                <a class="copylink" target="_blank" href="">
                                <svg viewBox="0 0 22 21" fill="currentColor" width="1em" height="1em"><path id="a" fill="currentColor" d="M3.7,8l2.6,2.3c0.4,0.4,0.4,1,0.1,1.4c0,0,0,0-0.1,0.1l-0.6,0.6c-0.4,0.4-1,0.4-1.4,0L1.8,9.9 C0.6,8.8,0,7.3,0,5.8c0-1.5,0.6-3,1.8-4.1C2.9,0.6,4.4,0,6,0c1.6,0,3.1,0.6,4.2,1.7l2.6,2.4l0,0c0.4,0.4,0.4,1,0,1.4l-0.6,0.6 c-0.4,0.4-1,0.4-1.4,0L8.2,3.7C7.6,3.1,6.8,2.8,6,2.8c-0.9,0-1.6,0.3-2.2,0.9C3.1,4.3,2.8,5,2.8,5.8S3.1,7.4,3.7,8L3.7,8z M18.3,13 l-2.6-2.3c-0.4-0.4-0.4-1-0.1-1.4c0,0,0,0,0.1-0.1l0.6-0.6c0.4-0.4,1-0.4,1.4,0l2.7,2.5c1.1,1.1,1.8,2.5,1.8,4.1 c0,1.5-0.6,3-1.8,4.1C19.1,20.4,17.6,21,16,21c-1.6,0-3.1-0.6-4.2-1.7l-2.6-2.4c-0.4-0.4-0.4-1-0.1-1.4c0,0,0,0,0,0l0.6-0.6 c0.4-0.4,1-0.4,1.4,0l2.7,2.5c0.6,0.6,1.4,0.9,2.2,0.9c0.9,0,1.6-0.3,2.2-0.9c0.6-0.6,0.9-1.3,0.9-2.2S18.9,13.6,18.3,13L18.3,13z M6.9,7.1l0.7-0.7C8,6,8.6,6,9,6.4c0,0,0,0,0,0l6,6c0.4,0.4,0.4,1,0,1.4l-0.7,0.7c-0.4,0.4-1,0.4-1.4,0l-6-6 C6.5,8.1,6.5,7.5,6.9,7.1z"></path></svg>
                                </a>
                            </li>
                        </ul>

                        </div>
                    </div>

                </div>

                <div class="video-modal__content">
                    <div class="video-modal__content-title">
                        <h2 class="videoTitle"></h2>
                        <h6>Powering your cellular batteries -- Mitochondria <span class="videoDuration"></span></h6>
                    </div>

                    <div class="video-modal__main">
                        <div class="video-modal__content-shorthashtag">
                            <p id="videoShort"></p>
                        </div>

                        <div id="videoDescription" class="video-modal__content-description">
                            
                        </div>

                        <div id="videoHash" class="video-modal__content-hashtag">
                            
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="video-modal__listing">
            <div class="video-modal__listing-row">
            </div>
        </div>

    </div>
</section>

<?php 
    global $product;
    
    if ( isset($product) && is_object($product) ) {
        $product_id   = $product->get_id();
        $product_name = $product->get_name();
        $price        = $product->get_price();
    } else {
        // Handle the case where $product is null or not an object.
        $product_id   = 0;
        $product_name = 'No product available';
        $price        = 0;
    }
?>

<section id="product-modal" class="product-modal">
  <div class="product-modal__overlay"></div>
  <div class="product-modal__content">
    <span class="product-modal__close"><svg viewBox="0 0 32 32" fill="currentColor" width="32" height="32"><g fill="none" fill-rule="evenodd"><circle fill="currentColor" cx="16" cy="16" r="16"></circle><path d="M18.7692308,4 L20,5.23076923 L13.23,12 L20,18.7692308 L18.7692308,20 L12,13.23 L5.23076923,20 L4,18.7692308 L10.769,12 L4,5.23076923 L5.23076923,4 L12,10.769 L18.7692308,4 Z" transform="translate(4 4)" fill="currentColor"></path></g></svg></span>
    <div class="product-modal__body">
      <!-- AJAX-loaded content will go here -->
    </div>
  </div>
</section>