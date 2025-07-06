<?php
    /**
     * Functions.php
     *
     *
     * @package SDEV
     * @subpackage SDEV WP
     * @since SDEV WP Theme 2.0
     */
    if(!isset($_SESSION)){
        session_start();
    }
    define('DEV_ENV', 0);

    /* Show errors if DEV_ENV is set to 1 */
    if(DEV_ENV === 0){
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(E_ALL);
    }
    
    /* remove "Private: " from titles */
    function remove_private_prefix($title) {
        $title = str_replace('Private: ', '', $title);
        return $title;
    }
    add_filter('the_title', 'remove_private_prefix');

    /* remove p tag wrap in images */
    function filter_ptags_on_images($content) {
        $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
        return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
    }
    add_filter('acf_the_content', 'filter_ptags_on_images');
    add_filter('the_content', 'filter_ptags_on_images');

    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('yoast-seo-breadcrumbs');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-logo', array('flex-width' => true, 'flex-height' => true));

    // Register navigation menus
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'best365labs'),
    ));
    /* SDEV Bootstrap */
    require_once('lib/sdev/sdev.php');

    /* Register ACF Blocks */
    require_once('src/views/blocks/register.php');

    /* Register theme assets */
   

    /* Enqueue FE assets */
    function front_assets(){
        wp_register_style( 'google-fonts', 'https://use.typekit.net/mni3ffg.css' );
        wp_register_style( 'google-font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
        wp_register_style( 'reset-css', \SDEV\Utils::getThemeResourcePath( 'assets/css/reset.css' ) );
        wp_register_style( 'sdev-theme-style', \SDEV\Utils::getThemeResourcePath( 'dist/style.css' ), array(), rand(111,9999), 'all' );
        wp_register_script( 'sdev-theme-script', \SDEV\Utils::getThemeResourcePath( 'dist/bundle.js' ), array('jquery'), rand(111,9999), true );
        wp_register_script( 'slick-js', SDEV\Utils::getThemeResourcePath( 'dist/slick.js' ), array('jquery'), rand(111,9999), true );
        
        wp_enqueue_style( 'reset-css' );
        wp_enqueue_style( 'sdev-theme-style' );
        wp_enqueue_script( 'sdev-theme-script' );
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'fontawesome');
        wp_enqueue_script( 'slick-js');

        wp_enqueue_script('video_popup', get_template_directory_uri() . '/dist/video.js', array('jquery'));
        wp_localize_script('video_popup', 'myAjax', array('ajax_url' => admin_url('admin-ajax.php')));

        wp_enqueue_script('product_cart', get_template_directory_uri() . '/dist/product-cart.js', array('jquery'));
        wp_localize_script('product_cart', 'product_cart_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('load_product_nonce')
        ));

        wp_enqueue_script('wc-add-to-cart');
    }
    add_action( 'wp_enqueue_scripts', 'front_assets' );

    /* Enqueue admin assets */
    function custom_admin_assets(){
        /* So our FE fonts and styles will reflect in admin acf block editor and there's no need to add stylesheet in each block. */
        wp_enqueue_style( 'google-fonts');
        wp_enqueue_style( 'sdev-theme-style' );
    }
    add_action( 'admin_enqueue_scripts', 'custom_admin_assets' );

    function enqueue_product_cart_script() {
        // Enqueue your product‑cart.js
        wp_enqueue_script(
            'product_cart',
            get_template_directory_uri() . '/dist/product-cart.js',
            array( 'jquery' ),
            '1.0.0',
            true
        );
    
        // Figure out the plugin’s main file path
        $plugin_main = WP_PLUGIN_DIR
                     . '/all-products-for-woocommerce-subscriptions/all-products-for-woocommerce-subscriptions.php';
    
        // Build the URL to single-add-to-cart.js
        $subscription_js = plugins_url(
            'assets/js/frontend/single-add-to-cart.js',
            $plugin_main
        );
    
        // Localize everything into `product_cart_object`
        wp_localize_script(
            'product_cart',
            'product_cart_object',
            array(
                'ajax_url'        => admin_url( 'admin-ajax.php' ),
                'nonce'           => wp_create_nonce( 'load_product_nonce' ),
                'subscription_js' => $subscription_js,
            )
        );
    }
    add_action( 'wp_enqueue_scripts', 'enqueue_product_cart_script' );

    
    function sdev_add_woocommerce_support() {
        add_theme_support('woocommerce');
    }
    add_action('after_setup_theme', 'sdev_add_woocommerce_support');

    

    function load_video() {

        $post_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
       
        $args = array(
            'post_type'      => 'video',
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'p'              => $post_id, // filter by post ID
        );
    
        $the_query = new WP_Query($args);
       
        $resoucePostItem = [];
    
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $resourceArray = array(
                    'title' => get_the_title(),
                    'video' => get_field('video_link' , get_the_ID()),
                    'duration' => get_field('video_duration' , get_the_ID()),
                    'shashtag' => get_field('short_hashtag' , get_the_ID()),
                    'hashtag' => get_field('hashtags' , get_the_ID()),
                    'description' => get_field('video_description' , get_the_ID()),
                    'image'    => get_the_post_thumbnail_url(get_the_ID(), 'full'), // Featured image.
                
                );
                $resoucePostItem[] = $resourceArray;
            }
        }
    
        $response = (object) [
            'items' => $resoucePostItem,
        ];
    
        wp_reset_postdata();
        echo json_encode($response);
        wp_die();
    }
    
    add_action('wp_ajax_load_video', 'load_video');
    add_action('wp_ajax_nopriv_load_video', 'load_video');


    function list_video() {
        // Get the ids from the POST data; ensure it's an array
        $ids = isset($_POST['ids']) ? $_POST['ids'] : array();
        if ( ! is_array($ids) ) {
            $ids = array($ids);
        }
    
        $args = array(
            'post_type'      => 'video',
            'posts_per_page' => -1,          // retrieve all matching posts
            'post_status'    => 'publish',
            'post__in'       => $ids,        // query using multiple post IDs
            'orderby'        => 'post__in',  // maintain the order of IDs if needed
        );
        
        $the_query = new WP_Query($args);
        
        $resourcePostItems = array();
        
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $resourceArray = array(
                    'title' => mb_strimwidth(get_the_title(), 0, 51, '...'),
                    'duration' => get_field('video_duration', get_the_ID()),
                    'image'    => get_the_post_thumbnail_url(get_the_ID(), 'full'), // Featured image.
                    'id'       => get_the_ID(),
                );
                $resourcePostItems[] = $resourceArray;
            }
        }
        
        $response = (object) [
            'items' => $resourcePostItems,
        ];
        
        wp_reset_postdata();
        echo json_encode($response);
        wp_die();
    }
    
    add_action('wp_ajax_list_video', 'list_video');
    add_action('wp_ajax_nopriv_list_video', 'list_video');


    function add_ytvideo_query_var( $vars ) {
        $vars[] = 'ytvideo';
        return $vars;
    }
    add_filter( 'query_vars', 'add_ytvideo_query_var' );
    

    function disable_redirect_on_ytvideo_query( $redirect_url ) {
        if ( get_query_var('ytvideo') ) {
            return false;
        }
        return $redirect_url;
    }
    add_filter( 'redirect_canonical', 'disable_redirect_on_ytvideo_query' );
    
    function remove_ytvideo_from_request( $query_vars ) {
        if ( isset( $query_vars['ytvideo'] ) ) {
            unset( $query_vars['ytvideo'] );
        }
        return $query_vars;
    }
    add_filter( 'request', 'remove_ytvideo_from_request' );


    function sdev_woocommerce_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'woocommerce' ); ?>">
            <?php 
                // Display cart item count and total
                echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'woocommerce' ), WC()->cart->get_cart_contents_count() );
                echo ' - ' . WC()->cart->get_cart_total();
            ?>
        </a>
        <?php
        $fragments['a.cart-contents'] = ob_get_clean();
        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'sdev_woocommerce_header_add_to_cart_fragment' );


    function load_product_modal() {
        // Verify nonce (ensure your AJAX call sends the nonce value with the key 'nonce')
        check_ajax_referer( 'load_product_nonce', 'nonce' );
    
        // Get and validate the product ID from the AJAX request.
        $product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;
        if ( ! $product_id ) {
            wp_send_json_error( 'No product ID provided.' );
        }
    
        // Get quantity, defaulting to 1 if not provided.
        $quantity = isset( $_POST['quantity'] ) ? intval( $_POST['quantity'] ) : 1;
    
        // Load the product and verify it's valid.
        $product = wc_get_product( $product_id );
        if ( ! $product ) {
            wp_send_json_error( 'Invalid product ID.' );
        }
    
        // Setup post data so that global functions work correctly within the template.
        global $post;
        $post = get_post( $product_id );
        setup_postdata( $post );
    
        // Instead of using set_query_var, pass the quantity directly to the template.
        ob_start();
        wc_get_template(
            'quick-view-content.php', // Template file location (ensure this path is valid)
            array(
                'product'            => $product,
                'selected_quantity'  => $quantity,
            )
        );
        $modal_content = ob_get_clean();
    
        wp_reset_postdata();
    
        wp_send_json_success( $modal_content );
    }
    add_action( 'wp_ajax_load_product_modal', 'load_product_modal' );
    add_action( 'wp_ajax_nopriv_load_product_modal', 'load_product_modal' );

    function reload_product_summary() {
        check_ajax_referer( 'load_product_nonce', 'nonce' );
    
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $quantity   = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
        if ( ! $product_id ) {
            wp_send_json_error( 'No product ID provided.' );
        }
    
        $product = wc_get_product( $product_id );
        if ( ! $product ) {
            wp_send_json_error( 'Invalid product ID.' );
        }
    
        global $post;
        $post = get_post( $product_id );
        setup_postdata( $post );
    
        ob_start();
        ?>
        <div class="summary entry-summary">
            <?php
            /**
             * This outputs the product summary, add-to-cart form, variations, subscriptions, etc.
             */
            do_action( 'woocommerce_single_product_summary' );
            ?>
        </div>
        <!-- Inline JavaScript to reinitialize variation forms -->
        <script type="text/javascript">
          (function($){
              // Reinitialize the variation form if it exists.
              var $variationForm = $('.variations_form');
              if ($variationForm.length && $.fn.wc_variation_form) {
                  $variationForm.wc_variation_form();
                  $variationForm.find('.variations select').trigger('change');
              }
              // Reinitialize subscription functionality if available.
              if (typeof $.fn.wcsatt_init === 'function') {
                  $('.summary.entry-summary').wcsatt_init();
              }
          })(jQuery);
        </script>
        <?php
        $summary_html = ob_get_clean();
    
        wp_reset_postdata();
        wp_send_json_success( $summary_html );
    }
    add_action( 'wp_ajax_reload_product_summary', 'reload_product_summary' );
    add_action( 'wp_ajax_nopriv_reload_product_summary', 'reload_product_summary' );
    

    add_filter('woocommerce_breadcrumb_defaults', function($defaults) {
        $defaults['delimiter'] = ' / ';
        return $defaults;
    });

    add_filter( 'woocommerce_get_breadcrumb', 'custom_override_woocommerce_breadcrumb', 20, 2 );

    function custom_override_woocommerce_breadcrumb( $crumbs, $breadcrumb ) {
    foreach ( $crumbs as $key => $crumb ) {
        if ( isset( $crumb[0] ) && $crumb[0] === 'Health Issues' ) {
            $crumbs[$key] = [ 'SHOP NOW', get_permalink( wc_get_page_id( 'shop' ) ) ];
        }
    }
    return $crumbs;

    // Disable WooCommerce gallery features
    add_filter( 'woocommerce_single_product_image_gallery_classes', function( $classes ) {
        return array(); // remove slider, zoom, and lightbox classes
    });

    add_filter('woocommerce_add_to_cart_fragments', 'update_cart_count_fragment');

function update_cart_count_fragment($fragments) {
    ob_start();
    ?>
    <span class="header__cart-items count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['span.header__cart-items.count'] = ob_get_clean();
    return $fragments;
}
    

    

}

    

    
    

 
    register_sidebar();
?>