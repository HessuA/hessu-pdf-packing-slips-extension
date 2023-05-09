<?php
namespace Hessu_pdf;

/**
 * Add information text to the document
 *
 * @param string $document_type WCPDF document type
 * @param object $order Woocommerce order object
 */
function add_info_text( $document_type, $order ) {
  $option = get_option( 'wpo_wcpdf_settings_general' );

  if ( ! empty( $option ) ) {

    $option_checkbox_new = $option['hessu_setting_checkbox_new'] ? $option['hessu_setting_checkbox_new'] : '';
    $option_checkbox_old = $option['hessu_setting_checkbox_old'] ? $option['hessu_setting_checkbox_old'] : '';
    $option_textarea = $option['hessu_setting_textarea']['default'] ? $option['hessu_setting_textarea']['default'] : '';

    $count_orders = check_customer_orders( $order );

    if ( ( $option_checkbox_new && $count_orders === 1 ) || ( $option_checkbox_old && $count_orders > 1 ) && ! empty( $option_textarea ) ) {
      ?>
      <div class="hessu-pdf-container" style="text-align: center;">
        <p class="hessu-pdf-p" style="font-size: 1rem;"><?php esc_html_e( $option_textarea ); ?></p>
      </div>
      <?php
    }
  }
}
