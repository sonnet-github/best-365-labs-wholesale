<?php
defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

// Check if we're on a single product page
if ( is_product() ) :
?>
	<div class="product-listing-cart__quantity">
		<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>

		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $label ); ?></label>
		<label for="quick-view__quantity" class="quick-view__quantity">Quantity *</label>
		<div class="quantity-wrapper">
			<button type="button" class="qty-btn minus">
				<svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24"><path fill-rule="evenodd" d="M20,12 L20,13 L5,13 L5,12 L20,12 Z"></path></svg>
			</button>

			<input 
				type="number"
				id="<?php echo esc_attr( $input_id ); ?>"
				class="qty-input"
				name="<?php echo esc_attr( $input_name ); ?>"
				value="<?php echo esc_attr( get_query_var( 'selected_quantity', $input_value ) ); ?>"
				min="<?php echo esc_attr( $min_value ); ?>"
				max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
				step="<?php echo esc_attr( $step ); ?>"
				pattern="[0-9]*"
				inputmode="numeric"
				<?php echo $readonly ? 'readonly' : ''; ?>
				autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
			/>

			<button type="button" class="qty-btn plus">
				<svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24"><path fill-rule="evenodd" d="M13,5 L13,12 L20,12 L20,13 L13,13 L13,20 L12,20 L11.999,13 L5,13 L5,12 L12,12 L12,5 L13,5 Z"></path></svg>
			</button>
		</div>

		<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
	</div>

<?php else: ?>

	<!-- Default fallback for other templates like cart, archive, etc -->
	<label for="quick-view__quantity" class="quick-view__quantity">Quantity</label>
	<div class="quantity">
		
		<?php do_action( 'woocommerce_before_quantity_input_field' ); ?>
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $label ); ?></label>
		
		<input
			type="<?php echo esc_attr( $type ); ?>"
			<?php echo $readonly ? 'readonly' : ''; ?>
			id="<?php echo esc_attr( $input_id ); ?>"
			class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			aria-label="<?php esc_attr_e( 'Product quantity', 'woocommerce' ); ?>"
			<?php if ( in_array( $type, array( 'text', 'search', 'tel', 'url', 'email', 'password' ), true ) ) : ?>
				size="4"
			<?php endif; ?>
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			<?php if ( ! $readonly ) : ?>
				step="<?php echo esc_attr( $step ); ?>"
				placeholder="<?php echo esc_attr( $placeholder ); ?>"
				inputmode="<?php echo esc_attr( $inputmode ); ?>"
				autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
			<?php endif; ?>
		/>
		<?php do_action( 'woocommerce_after_quantity_input_field' ); ?>
	</div>

<?php endif; ?>
