<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
    $get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
        'billing' => __( 'Billing address', 'woocommerce' ),
        'shipping' => __( 'Shipping address', 'woocommerce' )
    ), $customer_id );
} else {
    $get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
        'billing' =>  __( 'Billing address', 'woocommerce' )
    ), $customer_id );
}

$oldcol = 1;
$col    = 1;
?>

<div class="my_address_wrapper">

    <p class="my_address_description">
    <?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'woocommerce' ) ); ?>
    </p>
    
    <div class="shipping_billing_wrapper">
	
<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) echo '<div class="u-columns woocommerce-Addresses col2-set addresses">'; ?>        
        <?php foreach ( $get_addresses as $name => $title ) : ?>
        
            <div class="medium-6 columns">
        <header class="woocommerce-Address-title title">
            <h3><?php echo esc_attr($title); ?></h3>
        </header>
        <address>
            <?php
                $address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
                    'first_name'  => get_user_meta( $customer_id, $name . '_first_name', true ),
                    'last_name'   => get_user_meta( $customer_id, $name . '_last_name', true ),
                    'company'     => get_user_meta( $customer_id, $name . '_company', true ),
                    'address_1'   => get_user_meta( $customer_id, $name . '_address_1', true ),
                    'address_2'   => get_user_meta( $customer_id, $name . '_address_2', true ),
                    'city'        => get_user_meta( $customer_id, $name . '_city', true ),
                    'state'       => get_user_meta( $customer_id, $name . '_state', true ),
                    'postcode'    => get_user_meta( $customer_id, $name . '_postcode', true ),
                    'country'     => get_user_meta( $customer_id, $name . '_country', true )
                ), $customer_id, $name );

                $formatted_address = WC()->countries->get_formatted_address( $address );

                if ( ! $formatted_address )
                    esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
                else
                    echo wp_kses_post($formatted_address);
            ?>
        </address>
                
                <span class="edit-link">
                    <a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="post-edit-link"><i class="fa fa-pencil"></i><?php esc_html_e( 'Edit', 'woocommerce' ); ?></a>
                </span>
                
            </div>
        
        <?php endforeach; ?>
        
        <?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) echo '</div>'; ?>
    
    </div><!--.shipping_billing_wrapper-->

</div><!--.my_address_wrapper-->
