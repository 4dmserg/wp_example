<?php

/*
 *  Disable gutenberg
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

/*
 *  Hide admin toolbar
 */
add_filter('show_admin_bar', '__return_false');


/**
* Hide styles & scripts version
*/
function remove_cssjs_querystring( $src ) {
  if( strpos( $src, '?rev=' ) ) // copy/paste this line and the next one to take away what you want from the end of your css/js
    $src = remove_query_arg( 'rev', $src );
  if( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_querystring', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_querystring', 10, 2 );

add_action('wp_enqueue_scripts', 'replace_core_jquery_version');

/**
* Add styles & scripts
*/
add_action( 'wp_enqueue_scripts', 'custom_scripts_method' );
function custom_scripts_method(){
//        wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/styles/bootstrap.min.css');
//        wp_enqueue_style( 'main', get_stylesheet_directory_uri().'/assets/styles/main.css');
//        wp_enqueue_style( 'style', get_stylesheet_uri());
          wp_enqueue_style( 'icomoon-style', get_stylesheet_directory_uri().'/fonts/icomoon/style.css');
          wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css');
          wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri().'/css/magnific-popup.css');
          wp_enqueue_style( 'jquery-ui', get_stylesheet_directory_uri().'/css/jquery-ui.css');
          wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri().'/css/owl.carousel.min.css');
          wp_enqueue_style( 'owl-theme-default', get_stylesheet_directory_uri().'/css/owl.theme.default.min.css');
          wp_enqueue_style( 'lightgallery', get_stylesheet_directory_uri().'/css/lightgallery.min.css');
          wp_enqueue_style( 'bootstrap-datepicker', get_stylesheet_directory_uri().'/css/bootstrap-datepicker.css');
          wp_enqueue_style( 'fonts-flaticon', get_stylesheet_directory_uri().'/fonts/flaticon/font/flaticon.css');
          wp_enqueue_style( 'swiper', get_stylesheet_directory_uri().'/css/swiper.css');
          wp_enqueue_style( 'aos', get_stylesheet_directory_uri().'/css/aos.css');
          wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri().'/css/style.css');
          
          wp_enqueue_style( 'style', get_stylesheet_uri());
        
          wp_enqueue_script( 'jquery-custom', get_template_directory_uri().'/scripts/jquery-3.3.1.min.js', [], false, true);
          wp_enqueue_script( 'jquery-migrate', get_template_directory_uri().'/scripts/jquery-migrate-3.0.1.min.js', [], false, true);
          wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/scripts/jquery-ui.js', [], false, true);
          wp_enqueue_script( 'jquery-popper', get_template_directory_uri().'/scripts/popper.min.js', [], false, true);
          wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/scripts/bootstrap.min.js', [], false, true);
          wp_enqueue_script( 'owl.carousel', get_template_directory_uri().'/scripts/owl.carousel.min.js', [], false, true);
          wp_enqueue_script( 'jquery-stellar', get_template_directory_uri().'/scripts/jquery.stellar.min.js', [], false, true);
          wp_enqueue_script( 'jquery-countdown', get_template_directory_uri().'/scripts/jquery.countdown.min.js', [], false, true);
          wp_enqueue_script( 'jquery-magnific', get_template_directory_uri().'/scripts/jquery.magnific-popup.min.js', [], false, true);
          wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri().'/scripts/bootstrap-datepicker.min.js', [], false, true);
          wp_enqueue_script( 'swiper', get_template_directory_uri().'/scripts/swiper.min.js', [], false, true);
          wp_enqueue_script( 'aos', get_template_directory_uri().'/scripts/aos.js', [], false, true);
          
          wp_enqueue_script( 'picturefill', get_template_directory_uri().'/scripts/picturefill.min.js', [], false, true);
          wp_enqueue_script( 'lightgallery-all', get_template_directory_uri().'/scripts/lightgallery-all.min.js', [], false, true);
          wp_enqueue_script( 'jquery-mousewheel', get_template_directory_uri().'/scripts/jquery.mousewheel.min.js', [], false, true);
          
          wp_enqueue_script( 'main', get_template_directory_uri().'/scripts/main.js', [], false, true);
          
          wp_enqueue_script( 'dev', get_template_directory_uri().'/scripts/dev.js', [], false, true);
	
}

/*
 * Hide plugin & core updating
 */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );

add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

/*
 * Change 404 page title
 */
function theme_slug_filter_wp_title( $title ) {
    if ( is_404() ) {
        $title = ' | Сторінку не знайдено!';
    }
    return $title;
}
add_filter( 'wp_title', 'theme_slug_filter_wp_title' );

/*
 * Add theme support WC
 */
add_theme_support('woocommerce');
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/*
 * Hide wp version
 */
remove_action('wp_head', 'wp_generator');

/*
 * Register nav menu
 */
add_action('after_setup_theme', function(){
  register_nav_menus( array(
    'main_menu' => __( 'Primary menu' ),
  ) );
});

function show_main_menu($flags){
    
    if(!$flags) $flags = '';
    $topMenu = [
       'theme_location' => 'main_menu',
       'container'      => false,
       'walker'         => new True_Walker_Nav_Menu(),
       'items_wrap'     => '<ul id="%1$s" class="%2$s site-menu js-clone-nav mx-auto d-none d-lg-block">%3$s'.$flags.'</ul>'  
       ];
    wp_nav_menu($topMenu);
}

class True_Walker_Nav_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth) {
	// function start_lvl( &$output, $depth = 0, $args = NULL ) {
		/*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */ 
		$output .= '<ul class="dropdown">';
	}

	function start_el( &$output, $item, $depth, $args ) {
	// function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
 
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
                $class_names = str_replace('menu-item-has-children', 'has-children', $class_names);
		/*
		 * Генерируем ID элемента
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/*
 * Add active class
 */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

/*
 * Add image size
 */
if ( function_exists( 'add_image_size' ) ) {

    add_image_size( 'homepage-category', 900, 874, true );
    add_image_size( 'page-category-small', 900, 750, true );
    add_image_size( 'page-category-big', 1300, 9999 );
}

/**
 * Rename "home" in breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['home'] = 'Головна';
        
        $current_language = apply_filters('wpml_current_language', null); 
        
        if($current_language == 'en'){
            $defaults['home'] = 'Home';
        }
        if($current_language == 'ru'){
            $defaults['home'] = 'Главная';
        }
        
	return $defaults;
}


/*
 * Шорткод корзины
 */

add_action('admin_init', 'mytheme_add_init');
//add_action('admin_menu', 'mytheme_add_admin');
add_shortcode('cartitem','sk_wcmenucart');

function sk_wcmenucart() {
	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
	//return $menu;
	ob_start();
	global $woocommerce;
	$viewing_cart = __('View your shopping cart', 'your-theme-slug');
	$start_shopping = __('Start shopping', 'your-theme-slug');
	$cart_url = $woocommerce->cart->get_cart_url();
	$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
	$cart_contents_count = $woocommerce->cart->cart_contents_count;
	$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
	$cart_total = $woocommerce->cart->get_cart_total();
  

	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// if ( $cart_contents_count > 0 ) {
        
        $cartContent = '';
        $priceAll    = 0;
        
	//if ($cart_contents_count == 0) {
	//$menu_item = '<span><a class="wcmenucart-contents cartitemsh" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
	//} else {
	//$menu_item = '<span><a class="wcmenucart-contents cartitemsh" href="'. $cart_url .'" title="'. $viewing_cart .'"> ';
        

        
            global $woocommerce;
            $items = $woocommerce->cart->get_cart();

            foreach($items as $item => $values) { 
                $priceAll += get_post_meta($values['product_id'] , '_price', true);
            }

        if($cart_contents_count){
            $cartContent = $cart_contents_count.' артикул(-ів) &diams; <font style="color: red;">'.$priceAll.'</font> UAH';
        }
            
        $menu_item = '<a id="cartlink" href = \'/cart\'">
                        <i class="fa-solid fa-cart-shopping awesomecart"></i>Корзина <span class="badge badge-light badge-pill">'.$cartContent.'</span>
                      </a>';
        
	//}
        /*
	$menu_item .= '<i class="fa fa-shopping-cart cartitemsh"></i> ';
	$menu_item .= $cart_contents.' - '. $cart_total;
	$menu_item .= '</a></span>';
         * 
         */
        
	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// }
	//echo $menu_item;
	$social = ob_get_clean();
	return $menu_item . $social;
	//return 'mtt';
}
        
/*
 * Только один продукт
 */
add_filter( 'woocommerce_is_purchasable', 'disable_add_to_cart_if_product_is_in_cart', 10, 2 );
function disable_add_to_cart_if_product_is_in_cart ( $is_purchasable, $product ){
    // Loop through cart items checking if the product is already in cart
    foreach ( WC()->cart->get_cart() as $cart_item ){
        if( $cart_item['data']->get_id() == $product->get_id() ) {
            //echo 'У корзинi';
            return false;
        }
    }
    return $is_purchasable;
}


add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );
function wc_remove_all_quantity_fields( $return, $product ) 
{
    return( true );
}

add_filter( 'woocommerce_return_to_shop_redirect', 'change_shop_url_with_redirect' );

function change_shop_url_with_redirect(){

    return site_url() . '/';

}



// Option page
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => __('ФОТОБАНКА'),
        'menu_title' => __('<b style="color: #96e099;">ФОТОБАНКА</b>'),
        'menu_slug' => 'options',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-images-alt2',
        'redirect' => false
    ));

}

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    
    $current_language = apply_filters('wpml_current_language', null); 
    
    if ( $args->theme_location == 'main_menu' AND is_user_logged_in() AND $current_language == 'uk') {
        $items .= '<li><a href="/wp-admin/" title="">Мій аккаунт</a></li>';
    }
    if ( $args->theme_location == 'main_menu' AND is_user_logged_in() AND $current_language == 'en') {
        $items .= '<li><a href="/wp-admin/" title="">My account</a></li>';
    }
    if ( $args->theme_location == 'main_menu' AND is_user_logged_in() AND $current_language == 'ru') {
        $items .= '<li><a href="/wp-admin/" title="">Мой аккаунт</a></li>';
    }
    return $items;
}

// Redirect WooCommerce Shop URL
function wpc_shop_url_redirect() {
    if( is_shop() ){
        wp_redirect( home_url( '/' ) ); // Assign custom internal page here
        exit();
    }
}
add_action( 'template_redirect', 'wpc_shop_url_redirect' );

if ( ! function_exists( 'wpexperts_remove_update_link_by_css' ) ) :
function wpexperts_remove_update_link_by_css()
{
  echo '<style>.update-plugins,.plugin-update-tr,.subsubsub .upgrade,.theme .update-message,#dashboard_right_now #wp-version-message .button,#footer-upgrade{display:none !important;}</style>'; 
} 
endif;
add_action( 'admin_footer', 'wpexperts_remove_update_link_by_css' );



/**
 * Function for `login_form_register` action-hook.
 * 
 * @return void
 */
add_action( 'register_form', 'dev_login_form_register_action' );

function dev_login_form_register_action(){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('#agree_link').on('click', function(e){
                e.preventDefault();
                
                jQuery('#wrapper-agree').slideToggle()
            })
        })
    </script>
        
    <style>
        #wrapper-agree{
            display: none;
        }
        .terms_conditions{
            display: inline-block;
            padding: 2px 4px 8px 4px;
            background: #f3e3cf;
            border: 1px solid #554736;
            width: 100%;
            margin-bottom: 1em;
        }
        .terms_conditions h2{
            text-align: center;
        }
        #agree_link{
            text-decoration: none;
            font-weight: bold;
        }
        .oneall_social_login{
            margin-top: 1em;
        }
    </style>
    
    <?php
    
    $agreeTitle = get_field('terms_conditions_title','option');
    $agreeText  = get_field('terms_conditions_text','option');
    
    echo "<div id='wrapper-agree'><span class='terms_conditions'>"
    . "<h2>$agreeTitle</h2>"
            . "$agreeText"
            . "</span></div>";
}