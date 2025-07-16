<?php 
/* Template Name: Custom Checkout Page
 *
 */
/**
 * Default page template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
    get_header(); ?>

        <div id="page-content" class="page-blocks" data-tpl="page">

            <?php 
                
                the_content();

            ?>
        
        </div>

    <?php get_footer(); ?>