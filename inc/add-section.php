<?php
namespace Hessu_pdf;

/**
 * Add custom section
 */
function add_section( $settings_fields, $page, $option_group, $option_name ) {

  if ( class_exists( '\WPO\WC\PDF_Invoices\Settings_Callbacks' ) ) {

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
        'title'    => __( 'Enter the text you want to add to the invoice/packing slip. The first text area', 'hessu-pdf' ),
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
				'type'		 => 'setting',
				'id'			 => 'hessu_setting_multiple_checkbox',
				'title'		 => __( 'Who can see the text', 'hessu-pdf' ),
				'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::multiple_checkboxes',
				'section'	 => 'hessu_section',
				'args'		 => array(
					'option_name'	   => $option_name,
					'id'			       => 'hessu_setting_multiple_checkbox',
					'fields_callback' => __NAMESPACE__ . '\multiple_checkboxes_callback', // Check helpers
				)
			),
      array(
        'type'		 => 'section',
        'id'		   => 'hessu_section',
        'title'		 => __( 'Add more info to invoice or packing slip', 'hessu-pdf' ),
        'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::section',
      ),
      array(
        'type'     => 'setting',
        'id'       => 'hessu_setting_second_textarea',
        'title'    => __( 'Enter the text you want to add to the invoice/packing slip. The second text area', 'hessu-pdf' ),
        'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::textarea',
        'section'  => 'hessu_section',
        'args'		 => array(
          'option_name'  => $option_name,
          'id'			     => 'hessu_setting_second_textarea',
          'width'		     => '72',
          'height'		   => '4',
          'translatable' => true,
        )
      ),
      array(
				'type'		 => 'setting',
				'id'			 => 'hessu_setting_multiple_checkbox_second',
				'title'		 => __( 'Who can see the text', 'hessu-pdf' ),
				'callback' => '\WPO\WC\PDF_Invoices\Settings_Callbacks::multiple_checkboxes',
				'section'	 => 'hessu_section',
				'args'		 => array(
					'option_name'	   => $option_name,
					'id'			       => 'hessu_setting_multiple_checkbox_second',
					'fields_callback' => __NAMESPACE__ . '\multiple_checkboxes_callback', // Check helpers
				)
			),
    );
  
    $settings_fields = array_merge( $settings_fields, $custom_section );

  }

  return $settings_fields;
}
