<?php
/**
 * Wishlist pages template; load template parts basing on the url
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 3.0.0
 */

global $wpdb, $woocommerce;
$tdl_options = eva_global_var();
?>

<div class="row">
	<div class="large-10 columns large-centered <?php if ( (isset($tdl_options['tdl_catalog_mode'])) && ($tdl_options['tdl_catalog_mode'] == 1) ) : ?>catalog_mode<?php endif;?>">
		<?php
		/**
		 * Hook: yith_wcwl_wishlist_before_wishlist_content.
		 *
		 * @hooked \YITH_WCWL_Frontend::wishlist_header - 10
		 */
		do_action( 'yith_wcwl_wishlist_before_wishlist_content', $var )
		?>

		<?php
		/**
		 * Hook: yith_wcwl_wishlist_main_wishlist_content.
		 *
		 * @hooked \YITH_WCWL_Frontend::main_wishlist_content - 10
		 */
		do_action( 'yith_wcwl_wishlist_main_wishlist_content', $var )
		?>

		<?php
		/**
		 * Hook: yith_wcwl_wishlist_after_wishlist_content.
		 *
		 * @hooked \YITH_WCWL_Frontend::wishlist_footer - 10
		 */
		do_action( 'yith_wcwl_wishlist_after_wishlist_content', $var )
		?>
	</div>
</div>