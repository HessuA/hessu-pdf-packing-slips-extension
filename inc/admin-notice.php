<?php
namespace Hessu_pdf;

/**
 * Admin notice if WCPDF is inactive
 */
function admin_notice() {
  ?>
  <div class="notice notice-error is-dismissible">
    <p><?php _e( 'The use of this plugin requires that Pdf Invoices and Packing Slips for Woocommerce is active', 'hessu-pdf' ); ?></p>
  </div>
  <?php
}
