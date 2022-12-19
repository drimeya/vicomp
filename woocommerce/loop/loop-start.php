<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
 
global $woocommerce_loop;
?>
	<?php if ( function_exists( 'yoast_breadcrumb' ) ) :
   			yoast_breadcrumb( '<div class="breadcrumbs">', '</div>' );
	endif;?>
	<?if (is_shop()): ?>
		<h1><?the_title();?></h1>
		<div class="categories">
	<?elseif(is_product_category()):?>
		<h1><?php single_term_title();?></h1>
		<div class="category-page">
	<?endif?>
		<div class="row">
			