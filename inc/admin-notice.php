<?php
/**
 * Admin notice if WCPDF is not active
 */
namespace Hessu_pdf;

function admin_notice() {
  ?>
  <div class="notice notice-error is-dismissible">
    <p><?php _e( 'Lisäosan käyttö vaatii, että Pdf Invoices & Packing Slips for Woocommerce on aktiivinen', 'hessu-pdf' ); ?></p>
  </div>
  <?php
}
