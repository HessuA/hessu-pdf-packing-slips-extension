<?php
/**
 * Add custom section
 *
 */
namespace Hessu_pdf;

/**
 * Add custom section
 */
function add_section( $settings_fields, $page, $option_group, $option_name ) {

  $custom_section = array(
    array(
      'type'		 => 'section',
      'id'		   => 'hessu_section',
      'title'		 => __( 'Add more info to invoice or packing slip', 'hessu-pdf' ),
      'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::section',
    ),
    array(
      'type'     => 'setting',
      'id'       => 'hessu_setting_textarea',
      'title'    => __( 'Enter the text you want to add to the invoice/packing slip', 'hessu-pdf' ),
      'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::textarea',
      'section'  => 'hessu_section',
      'args'		 => array(
        'option_name'  => $option_name,
        'id'			     => 'hessu_setting_textarea',
        'width'		     => '72',
        'height'		   => '4',
        'translatable' => true,
      )
    ),
    array(
      'type'     => 'setting',
      'id'       => 'hessu_setting_checkbox_new',
      'title'    => __( 'Show to new customers', 'hessu-pdf' ),
      'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::checkbox',
      'section'  => 'hessu_section',
      'args'     => array(
        'option_name' => $option_name,
        'id'          => 'hessu_setting_checkbox_new',
      ),
    ),
    array(
      'type'     => 'setting',
      'id'       => 'hessu_setting_checkbox_old',
      'title'    => __( 'Show to customers who have placed an order at least once before', 'hessu-pdf' ),
      'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::checkbox',
      'section'  => 'hessu_section',
      'args'     => array(
        'option_name' => $option_name,
        'id'          => 'hessu_setting_checkbox_old',
      ),
    ),
  );

  $settings_fields = array_merge( $settings_fields, $custom_section );

  return $settings_fields;
}
