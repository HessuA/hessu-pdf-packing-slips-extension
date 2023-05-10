<?php
/**
 * Helpers
 */
namespace Hessu_pdf;

/**
 * Check customer orders
 * 
 * @param object $order Woocommerce order object
 * @return int
 */
function check_customer_orders( $order ) {

  if ( empty( $order ) ) {
    return;
  }

  $orders = 0; 

  $args = apply_filters( 'hessu-pdf-order-args', array( 
    'billing_email' => $order->get_billing_email(),
    'status'        => array( 'wc-completed', 'wc-refunded' ),
    'numberposts'   => 2,
  ) );

  if ( ! empty( $args ) ) {
    $orders = count(wc_get_orders( $args ));
  }
  return $orders;
}


/**
 * Multiple checkbox callback
 */
function multiple_checkboxes_callback() {
  return array(
    'checkbox_new' => __( 'Show to new customers', 'hessu-pdf' ),
    'checkbox_old' => __( 'Show to customers who have placed an order at least once before', 'hessu-pdf' ),
  );
}

/**
 * Multiple checkbox "Where to display"
 */
function multiple_checkboxes_callback_where_to_display() {
  return array(
    'packing-slip' => __( 'Packing slips', 'hessu-pdf' ),
    'invoice'      => __( 'Invoices', 'hessu-pdf' ),
  );
}
