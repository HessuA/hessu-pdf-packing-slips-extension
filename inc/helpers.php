<?php
/**
 * Helpers
 */
namespace Hessu_pdf;

/**
 * Check customer orders
 * 
 * @param object $order Woocommerce order object
 */
function check_customer_orders( $order ) {

  if ( empty( $order ) ) {
    return;
  }

  $orders = 0; 

  $args = array(
    'billing_email' => $order->get_billing_email(),
    'status'        => array( 'wc-completed', 'wc-refunded' ),
    'numberposts'   => 1,
  );

  if ( ! empty( $args ) ) {
    $orders = count(wc_get_orders( $args ));
  }
  return $orders;
}
