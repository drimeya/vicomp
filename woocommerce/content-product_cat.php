<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );
$sub_count = 4;
?>
<div class="col-12 col-md-6 col-lg-4 col-xl-3">
	<div class="categories__item">
		<?if ( $image ) :?>
			<div class="categories__item__img">
				<img src="<?=$image;?>" alt="<?=$category->name;?>">
			</div>
		<?endif;?>
		<a class="categories__item__title" href="<?=get_term_link( $category->slug, 'product_cat' ); ?>">
			<?=$category->name;?> (<?=$category->count;?>)
		</a>
		<?php $args = array(
			 'taxonomy' => 'product_cat', 
			 'parent' => $category->term_id,
			); 
			$term_childs = get_categories($args); ?>
		<?if (!empty($term_childs)) :?>
			<?php
			$over = false;
			foreach ( $term_childs as $term ) { ?>
				<?if ($term == $term_childs[$sub_count]):?>
					<?php $over = true?>
					<div class='categories__item__hidden'>
				<?endif?>
				 <a href="<?=get_term_link($term->slug, 'product_cat')?>" class="categories__item__link"><?=$term->name?></a>
			<? } ?>
			<?if ($over): ?>
				</div>
			<?endif?>
			<?if (count($term_childs) > $sub_count) :?>
				<div class="show_more">Еще <?=(count($term_childs) - $sub_count)?></div>
			<?endif?>
		<?else:?>
			<?php
			$products = get_products_from_category_by_ID($category->term_id);
			$over = false;
			foreach ($products as $id) {
				$product = wc_get_product($id); ?>
				<?if ($id == $products[$sub_count]):?>
					<?php $over = true?>
					<div class='categories__item__hidden'>
				<?endif?>
				<a href="<?=get_permalink($product->id); ?>" class="categories__item__link"><?=$product->name?></a>
			<? } ?>
			<?if ($over): ?>
				</div>
			<?endif?>
			<?if (count($products) > $sub_count) :?>
				<div class="show_more">Еще <?=(count($products) - $sub_count)?></div>
			<?endif?>
		<?endif?>
	</div>
</div>