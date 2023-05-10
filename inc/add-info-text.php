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

    $option_checkbox_new        = isset( $option['hessu_setting_multiple_checkbox']['checkbox_new'] ) ? $option['hessu_setting_multiple_checkbox']['checkbox_new'] : '';
    $option_checkbox_old        = isset( $option['hessu_setting_multiple_checkbox']['checkbox_old'] ) ? $option['hessu_setting_multiple_checkbox']['checkbox_old'] : '';
    $option_textarea            = isset( $option['hessu_setting_textarea']['default'] ) ? $option['hessu_setting_textarea']['default'] : '';
    $option_second_checkbox_new = isset( $option['hessu_setting_multiple_checkbox_second']['checkbox_new'] ) ? $option['hessu_setting_multiple_checkbox_second']['checkbox_new'] : '';
    $option_second_checkbox_old = isset( $option['hessu_setting_multiple_checkbox_second']['checkbox_old'] ) ? $option['hessu_setting_multiple_checkbox_second']['checkbox_old'] : '';
    $option_second_textarea     = isset( $option['hessu_setting_second_textarea']['default'] ) ? $option['hessu_setting_second_textarea']['default'] : '';

    $count_orders = check_customer_orders( $order ); // Check helpers

    if ( ( $option_checkbox_new && $count_orders === 1 ) || ( $option_checkbox_old && $count_orders > 1 ) && ! empty( $option_textarea ) ) {
      ?>
      <div class="hessu-pdf-container-first" style="text-align: center; margin: 1rem;">
        <p class="hessu-pdf-p-first" style="font-size: 1rem;"><?php esc_html_e( $option_textarea ); ?></p>
      </div>
      <?php
    } 
    if ( ( $option_second_checkbox_new && $count_orders === 1 ) || ( $option_second_checkbox_old && $count_orders > 1 ) && ! empty( $option_second_textarea ) ) {
      ?>
      <div class="hessu-pdf-container-second" style="text-align: center; margin: 1rem;">
        <p class="hessu-pdf-p-second" style="font-size: 1rem;"><?php esc_html_e( $option_second_textarea ); ?></p>
      </div>
      <?php
    }
  }
}
