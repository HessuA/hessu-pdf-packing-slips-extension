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
include plugin_dir_path( __FILE__ ) . '/inc/add-info-text.php';
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
