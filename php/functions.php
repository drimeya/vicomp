<?php
add_theme_support( 'post-thumbnails' );
wp_enqueue_script('jquery');

register_nav_menus(array(
	'top'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
	'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
));
 
function set_styles() {
	wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/css/main.css');
	wp_enqueue_style('seo-img', get_stylesheet_directory_uri() . '/css/seo-text-images.css');
}
 
add_action('wp_enqueue_scripts', 'set_styles');

function set_scripts(){
     wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/main.js');
}
 
add_action('wp_enqueue_scripts', 'set_scripts');

add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function remove_jquery_migrate( $scripts ) {

	if ( empty( $scripts->registered['jquery'] ) || is_admin() ) {
		return;
	}

	$deps = & $scripts->registered['jquery']->deps;

	$deps = array_diff( $deps, [ 'jquery-migrate' ] );
}
class woocommerce_menu_with_thumbnails_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=1, $args) {
		$thumbnail_id = get_woocommerce_term_meta( $item->object_id, 'thumbnail_id', true );
		$thumbnail_url = wp_get_attachment_url( $thumbnail_id );

		$output .= '<li';
		if ($args->walker->has_children) {
			$output .= ' class="menu-item-has-children"';
		}
		$output .= '>';
		if(!empty($thumbnail_url)) {
		   $output .= '<img src="'.$thumbnail_url.'" alt="" />';
		}
		$output .= '<a href="'.$item->url.'">'.$item->title.'</a>';
	}
	function end_el( &$output, $data_object, $depth=1, $args = null ) {
		$output .= '</li>';
	}
}
function get_products_from_category_by_ID( $category ) {

    $products = new WP_Query( array(
        'post_type'   => 'product',
        'post_status' => 'publish',
        'fields'      => 'ids',
        'tax_query'   => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category,
            )
        ),

    ) );
    return $products->posts;
}
// удаляем описание категории на странице категорий
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_taxonomy_archive_description', 100 );

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
 return '
 <nav class="%1$s" role="navigation">
  <div class="nav-links">%3$s</div>
 </nav>    
 ';
}