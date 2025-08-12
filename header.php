<?php
/**
 * Header template
 *
 * @package SDEV
 * @subpackage SDEV WP
 * @since SDEV WP Theme 2.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js theme-html <?= is_user_logged_in() ? 'is-logged-in' : ''?>">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		<?php 
			wp_head();
			get_template_part('src/views/partials/header', 'before-body'); 
		?>
	</head>
    <body <?php body_class(); ?>>
		
		<?php get_template_part('src/views/partials/header', 'body-start'); ?>

		<?php 
			$title = get_the_title();
			$slug = strtolower(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9 ]/', '', $title))) . '-page';
			$header = get_field('jobs_header');
			?>

		<div id="page-main" class="body-unload <?php echo $slug; ?>">
                        
			<?php get_template_part('src/views/partials/header', 'content');  ?>
            