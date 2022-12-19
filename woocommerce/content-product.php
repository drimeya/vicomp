<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

?>
<div class="col-12 col-sm-6 col-lg-4 col-xl-3">
    <a href="<?php the_permalink(); ?>" class="catalog__item category-page__item">
    <?if (has_post_thumbnail($post->ID)) : ?>
        <div class="img-wrapper">
            <picture>
                <?=get_the_post_thumbnail($post->ID, 'shop_catalog');?>
            </picture>
        </div>
    <?endif; ?>
        <div class="catalog__item__title category-page__item__title"><?php the_title(); ?></div>
        <div class="catalog__item__icon category-page__item__icon button_icon">
            <i class="icon-up"></i>
        </div>
    </a>
</div>