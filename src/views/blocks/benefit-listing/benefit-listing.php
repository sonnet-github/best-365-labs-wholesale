<?php
/**
 * Benefit Listing Block Template
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
$layout = get_field('layout');
$bottom_content = get_field('bottom_content');
$theme = get_field('section_layout');


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'block--custom-layout__benefit-listing';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Show preview image in preview mode
if ( get_field('preview_image') ) :

    echo '<img src="' . \SDEV\Utils::getThemeResourcePath('src/views/blocks/') . get_field('preview_image') . '" style="width: 100%;" />';

else :
?>

<div class="benefit-listing <?= esc_attr($class_name) ?> <?= $theme == 'theme1' ? 'theme_one' : ($theme == 'theme2' ? 'theme_two' : '') ?>" <?= $anchor ?>>
    <div class="benefit-listing__container">
        <div class="benefit-listing__title">
            <?= $section_title ?>
        </div>

        <?php if ( $layout == 'icon' ) : ?>
            <div class="benefit-listing__row">
                <?php if ( have_rows('benefit_listing') ) : ?>
                    <?php while ( have_rows('benefit_listing') ) : the_row(); 
                        $icon    = get_sub_field('svg_icon');
                        $content = get_sub_field('content');
                    ?>
                        <div class="benefit-listing__column">
                            <div class="benefit-listing__inner">
                                <div class="benefit-listing__icon">
                                    <?php echo $icon; ?>
                                </div>
                                <div class="benefit-listing__content">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php elseif ( $layout == "number" ) : ?>
            <div class="benefit-listing__row number">
                <?php if ( have_rows('number_listing') ) : ?>
                    <?php while ( have_rows('number_listing') ) : the_row(); 
                        $content = get_sub_field('content');
                    ?>
                        <div class="benefit-listing__column">
                            <div class="benefit-listing__inner">
                                <div class="benefit-listing__icon">
                                    <span><?php echo get_row_index(); ?></span>
                                </div>
                                <div class="benefit-listing__content">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?> <!-- Added missing endif here -->
            </div>
        <?php endif; ?>
        
        <?php if($bottom_content):?>
        <div class="benefit-listing__bottom-content">
            <?php echo $bottom_content;?>
        </div>

        <?php endif;?>
    </div>
</div>

<?php endif; ?>
