<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

<?php if ( !is_shop() ) : ?>
    <?php
    /**
    * woocommerce_before_shop_loop hook
    *
    * @hooked woocommerce_result_count - 20
    * @hooked woocommerce_catalog_ordering - 30
    */
    do_action( 'woocommerce_before_shop_loop' );
    ?>

    <?php woocommerce_product_loop_start(); ?>
        <?php woocommerce_product_subcategories(); ?>
            <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'product' ); ?>
        <?php endwhile; // end of the loop. ?>
    <?php woocommerce_product_loop_end(); ?>

    <?php
    /**
    * woocommerce_after_shop_loop hook
    *
    * @hooked woocommerce_pagination - 10
    */
    do_action( 'woocommerce_after_shop_loop' );
    ?>
<?php endif; ?>

<?php get_footer( 'shop' ); ?>
