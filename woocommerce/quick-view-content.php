<?php
/**
 * Quick View Template for a single product
 */

defined( 'ABSPATH' ) || exit;

// Make sure $product is set.
global $product;


// If you need to handle quantity passed from AJAX:
$selected_quantity = get_query_var('selected_quantity', 1);
?>
 <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
<div class="quick-view__modal-content">
  <!-- Left Column: Product Image -->
  <div class="quick-view__image">
  <?php 
      // Get the featured image and gallery image IDs.
    
      $gallery_ids   = $product->get_gallery_image_ids();

      // Display additional gallery images, if available.
      if ( $gallery_ids ) {
          echo '<div class="product-gallery-images">';
          foreach ( $gallery_ids as $attachment_id ) {
              echo '<div class="gallery-image">';
              echo wp_get_attachment_image( $attachment_id, 'full' );
              echo '</div>';
          }
          echo '</div>';
      }
  ?>
  </div>

  <!-- Right Column: Product Details -->
  <div class="quick-view__details">
    <h2 class="quick-view__title"><?php echo esc_html( $product->get_name() ); ?></h2>
    <p class="quick-view__price"><?php echo $product->get_price_html(); ?></p>
    <?php if ( $product->get_sku() ) : ?>
      <p class="quick-view__sku">SKU: <?php echo esc_html( $product->get_sku() ); ?></p>
    <?php endif; ?>

    <div class="summary entry-summary">
        <?php
            /**
             * DO NOT REMOVE — this ensures WooCommerce and Subscriptions plugin work properly.
             */
            do_action( 'woocommerce_single_product_summary' );
        ?>
    </div>

    <a class="quick-view__more-details" href="<?php echo esc_url( $product->get_permalink() ); ?>" style="margin-top: 15px; display: inline-block;">
      View More Details
    </a>
  </div>
</div>
    </div>