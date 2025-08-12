<?php
/**
 * Page Header Template Block (Header Block)
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */  
   
$icon_check = get_template_directory_uri() . '/assets/images/icon-check.png';
$icon_bag = get_template_directory_uri() . '/assets/images/icon-bag.png';
$icon_customer = get_template_directory_uri() . '/assets/images/icon-customer.png';
$mega_menu_list = get_field('mega_menu_list', 'option');
$header_cta = get_field('header_cta_link', 'option');

?>
<section class="header-sticky">
    <header class="header">
        <div class="header__panel">
            <ul>
                <?php if($header_cta):?>
                    <li>
                        <a href="<?= $header_cta['url']?>" target="<?= $header_cta['target']?>">
                            <img src="<?= $icon_check?>" alt="Register Icon" width="33" height="33">
                            <?= $header_cta['title']?>
                        </a>
                    </li>
                <?php endif;?>
                <li>
                    <a class="" href="/my-account/">
                            <img src="<?= $icon_customer?>" alt="Login" width="32" height="32">
                            <?php if ( !is_user_logged_in() ) : ?>
                                Account Log In
                            <?php else :?>
                                Account
                            <?php endif; ?>
                    </a>
                </li>
                <li class="header__cart">
                    <span class="header__cart-wrapper">
                        <img src="<?= $icon_bag?>" alt="Shoping Bag" width="37" height="47">
                        <span class="header__cart-items"><?= do_shortcode('[xoo_wsc_cart]')?></span>
                    </span>
                </li>
            </ul>
        </div>
        <div class="header__top">
            <div class="header__mobile">
                <div class="header__burger-menu">
                    <button id="burgerMain" class="hamburger hamburger--collapse" type="button" aria-label="Toggle mobile menu" aria-expanded="false">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            
            <div class="header__logo">
                <?php the_custom_logo(); ?>
            </div>

            <div class="header__menu">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'main-menu',
                            'aria-label'     => 'Main Menu',
                        )
                    );
                ?>
            </div>

            <!-- <div class="header__user">
                <?php if ( !is_user_logged_in() ) : ?>
                    <a class="login" href="">
                <?php else :?>
                    <a class="" href="/dashboard">
                <?php endif; ?>
                        <svg data-bbox="0 0 50 50" data-type="shape" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><g><path d="M25 48.077c-5.924 0-11.31-2.252-15.396-5.921 2.254-5.362 7.492-8.267 15.373-8.267 7.889 0 13.139 3.044 15.408 8.418-4.084 3.659-9.471 5.77-15.385 5.77m.278-35.3c4.927 0 8.611 3.812 8.611 8.878 0 5.21-3.875 9.456-8.611 9.456s-8.611-4.246-8.611-9.456c0-5.066 3.684-8.878 8.611-8.878M25 0C11.193 0 0 11.193 0 25c0 .915.056 1.816.152 2.705.032.295.091.581.133.873.085.589.173 1.176.298 1.751.073.338.169.665.256.997.135.515.273 1.027.439 1.529.114.342.243.675.37 1.01.18.476.369.945.577 1.406.149.331.308.657.472.98.225.446.463.883.714 1.313.182.312.365.619.56.922.272.423.56.832.856 1.237.207.284.41.568.629.841.325.408.671.796 1.02 1.182.22.244.432.494.662.728.405.415.833.801 1.265 1.186.173.154.329.325.507.475l.004-.011A24.886 24.886 0 0 0 25 50a24.881 24.881 0 0 0 16.069-5.861.126.126 0 0 1 .003.01c.172-.144.324-.309.49-.458.442-.392.88-.787 1.293-1.209.228-.232.437-.479.655-.72.352-.389.701-.78 1.028-1.191.218-.272.421-.556.627-.838.297-.405.587-.816.859-1.24a26.104 26.104 0 0 0 1.748-3.216c.208-.461.398-.93.579-1.406.127-.336.256-.669.369-1.012.167-.502.305-1.014.44-1.53.087-.332.183-.659.256-.996.126-.576.214-1.164.299-1.754.042-.292.101-.577.133-.872.095-.89.152-1.791.152-2.707C50 11.193 38.807 0 25 0"></path></g></svg>
                        <?php if ( !is_user_logged_in() ) : ?>
                            <span>Consumer Account Log In</span>
                        <?php else :?>
                            <span>Consumer Account</span>
                        <?php endif; ?>
                </a>

                <div class="header__cart">
                     
                    <div class="header__cart-wrapper">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="37.76" height="47.58" viewBox="0 0 37.76 47.58">
                        <g id="shopping-bag" transform="translate(-4.99 -6.76)">
                            <path id="Path_44" data-name="Path 44" d="M23.87,8.73a7.219,7.219,0,0,0-7.21,7.21v1.05H31.08V15.94a7.219,7.219,0,0,0-7.21-7.21Z" fill="none"/>
                            <path id="Path_45" data-name="Path 45" d="M38.8,17H33.06v3.95a.99.99,0,0,1-1.98,0V17H16.66v3.95a.99.99,0,1,1-1.98,0V17H8.94L4.99,54.34H42.75L38.8,17Z" fill="#46abd3"/>
                            <path id="Path_46" data-name="Path 46" d="M16.65,15.95a7.21,7.21,0,1,1,14.42,0V17h1.98V15.95a9.19,9.19,0,1,0-18.38,0V17h1.98V15.95Z" fill="#46abd3"/>
                        </g>
                    </svg>

                    <span class="header__cart-items">
                        <?php echo do_shortcode('[xoo_wsc_cart]');?>
                    </span>

                    </div>
                    

                    
                </div>
            </div> -->
        </div>

        
    </header>

    <?php if($mega_menu_list):?>
        <?php foreach($mega_menu_list as $mega_menu):
            $id = $mega_menu['mega_menu_id'];
            $columns = $mega_menu['column'];
        ?>
            <div class="header__mega-menu" data-id="<?= $id?>">
                <div class="header__mega-menu-container">

                    <div class="header__mega-menu-row">

                        <?php if($columns):?>
                            <?php foreach($columns as $column_item):?>
                                <?php if($column_item):
                                    $title = $column_item['title'];
                                    $links = $column_item['links'];    
                                ?>


                                    <div class="header__mega-menu-col">
                                        <div class="header__mega-menu-inner">
                                        
                                            <?php if($title):?>
                                                <h4><?php echo $title;?></h4>
                                            <?php endif;?>

                                            <?php if($links):?>
                                                <ul>
                                                    <?php foreach($links as $link_item):?>
                                                        
                                                        <?php if($link_item['link']):?>
                                                            <li>
                                                                <a href="<?php echo $link_item['link']['url'];?>" target="<?php echo $link_item['link']['target'];?>">
                                                                    <?php echo $link_item['link']['title'];?>
                                                                </a>
                                                            </li>
                                                        <?php endif;?>
                                                        
                                                    <?php endforeach;?>
                                                </ul>
                                            <?php endif;?>
                                           
                                        </div>
                                    </div>

                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endif;?>
                            
                    </div>

                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    <div class="announcement">
        <div class="announcement__container">
            <ul class="announcement__list">
                <?php if ( have_rows('announcement' , 'option') ) : ?>
                
                    <?php while( have_rows('announcement' , 'option') ) : the_row(); ?>
                
                    <li><?php the_sub_field('text'); ?></li>
                
                    <?php endwhile; ?>
                
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</section>

<div class="header-sidemenu">

    <button class="header-sidemenu__close" aria-label="Close">
        <svg class="lucide lucide-x-icon lucide-x" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" fill="none" viewBox="0 0 24 24" height="32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
    </button>

    <div class="header-sidemenu__container">
    
    <div class="header-sidemenu__medical-login">
        <a href="" class="medical-login">Medical Professional Login 
            <svg data-bbox="22.5 22.5 155 155" viewBox="0 0 200 200" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="shape">
                <g>
                    <path d="M129.8 100l-25.1 25.1-3.1-3.1 19.7-19.7h-48v-4.4h48l-19.7-19.7 3.1-3.1 25.1 24.9zm47.7 0c0-42.8-34.7-77.5-77.5-77.5S22.5 57.2 22.5 100s34.7 77.5 77.5 77.5 77.5-34.7 77.5-77.5zm-4.4 0c0 40.4-32.7 73.1-73.1 73.1S26.9 140.4 26.9 100c0-40.4 32.7-73.1 73.1-73.1 40.3.1 73 32.8 73.1 73.1z"></path>
                </g>
            </svg>
        </a>
    </div>

    <a class="manage-subs-mobile" href="/">Manage Subscription</a>
   

    <div class="header-sidemenu__user">
        <a href="">Account Log In <svg data-bbox="0 0 50 50" data-type="shape" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><g><path d="M25 48.077c-5.924 0-11.31-2.252-15.396-5.921 2.254-5.362 7.492-8.267 15.373-8.267 7.889 0 13.139 3.044 15.408 8.418-4.084 3.659-9.471 5.77-15.385 5.77m.278-35.3c4.927 0 8.611 3.812 8.611 8.878 0 5.21-3.875 9.456-8.611 9.456s-8.611-4.246-8.611-9.456c0-5.066 3.684-8.878 8.611-8.878M25 0C11.193 0 0 11.193 0 25c0 .915.056 1.816.152 2.705.032.295.091.581.133.873.085.589.173 1.176.298 1.751.073.338.169.665.256.997.135.515.273 1.027.439 1.529.114.342.243.675.37 1.01.18.476.369.945.577 1.406.149.331.308.657.472.98.225.446.463.883.714 1.313.182.312.365.619.56.922.272.423.56.832.856 1.237.207.284.41.568.629.841.325.408.671.796 1.02 1.182.22.244.432.494.662.728.405.415.833.801 1.265 1.186.173.154.329.325.507.475l.004-.011A24.886 24.886 0 0 0 25 50a24.881 24.881 0 0 0 16.069-5.861.126.126 0 0 1 .003.01c.172-.144.324-.309.49-.458.442-.392.88-.787 1.293-1.209.228-.232.437-.479.655-.72.352-.389.701-.78 1.028-1.191.218-.272.421-.556.627-.838.297-.405.587-.816.859-1.24a26.104 26.104 0 0 0 1.748-3.216c.208-.461.398-.93.579-1.406.127-.336.256-.669.369-1.012.167-.502.305-1.014.44-1.53.087-.332.183-.659.256-.996.126-.576.214-1.164.299-1.754.042-.292.101-.577.133-.872.095-.89.152-1.791.152-2.707C50 11.193 38.807 0 25 0"></path></g></svg></a>
    </div>

    <div class="header-sidemenu__menu">
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'menu-1',
                        'aria-label'     => 'Main Menu',
                        
                    )
                );
            ?>
    </div>

    </div>
</div>
