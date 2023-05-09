<?php
/**
 * Plugin Name: More info to Pdf Invoices & Packing Slips for Woocommerce
 * Description: Add more info to Pdf Invoices & Packing Slips for Woocommerce plugin.
 * Author: Heikki
 * Version: 1.0.0
 * Text Domain: hessu-pdf
 */

namespace Hessu_pdf;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Required files
include plugin_dir_path( __FILE__ ) . '/inc/add-section.php';
include plugin_dir_path( __FILE__ ) . '/inc/helpers.php';
include plugin_dir_path( __FILE__ ) . '/inc/admin-notice.php';
 
/**
 * Hooks
 */
add_filter( 'wpo_wcpdf_settings_fields_general', __NAMESPACE__ . '\add_section', 10, 4 );
add_action( 'wpo_wcpdf_after_order_details', __NAMESPACE__ . '\add_info_text', 10, 2 );

add_action( 'plugins_loaded', function() {
  if ( ! class_exists( 'WPO_WCPDF' ) ) {
    add_action( 'admin_notices', __NAMESPACE__ . '\admin_notice' );
  }
  $plugin_path = dirname( plugin_basename( __FILE__ ) ) . '/languages';
  load_plugin_textdomain( 'hessu-pdf' , false, $plugin_path);
} );

/**
 * Add information text to the document
 *
 * @param string $document_type WCPDF document type
 * @param object $order Woocommerce order object
 */
function add_info_text( $document_type, $order ) {
  $option = get_option( 'wpo_wcpdf_settings_general' );

  if ( ! empty( $option ) ) {

    $option_checkbox_new = $option['hessu_setting_checkbox_new'];
    $option_checkbox_old = $option['hessu_setting_checkbox_old'];

    $count_orders = check_customer_orders( $order );

    if ( ( $option_checkbox_new && $count_orders === 0 ) || ( $option_checkbox_old && $count_orders > 0 ) ) {
      ?>
      <div style="text-align: center;">
        <p style="font-size: 1rem;"><?php esc_html_e( $option['hessu_setting_textarea']['default'] ) ?></p>
      </div>
      <?php
    }
  }
}
