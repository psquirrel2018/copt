<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'cotp_register_secondary_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cotp_register_secondary_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_secondary_page_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Secondary Page Custom Fields', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on'      => array( 'key' => 'page-template', 'value' => array('secondary.php','blog-page.php','page.php', 'location.php') ),
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Secondary Page Hero Tagline', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'tagline',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Tagline Color Picker', 'cmb2' ),
        'desc'    => esc_html__( 'This sets the color of the taglines on the secondary page hero images', 'cmb2' ),
        'id'      => $prefix . 'tagline_color',
        'type'    => 'colorpicker',
        'default' => '#ffffff',
        // 'attributes' => array(
        // 	'data-colorpicker' => json_encode( array(
        // 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
        // 	) ),
        // ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => esc_html__( 'Tagline Font Size', 'cmb2' ),
        'desc'    => esc_html__( 'This sets the size of the tagline', 'cmb2' ),
        'id'      => $prefix . 'tagline_size',
        'type'    => 'text',
        // 'attributes' => array(
        // 	'data-colorpicker' => json_encode( array(
        // 		'palettes' => array( '#3dd0cc', '#ff834c', '#4fa2c0', '#0bc991', ),
        // 	) ),
        // ),
    ) );


}

add_action( 'cmb2_admin_init', 'cotp_register_location_page_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function cotp_register_location_page_metabox() {
    $prefix = '_secondary_location_';

    /**
     * Metabox to be displayed on a single page ID
     */
    $cmb_location_page = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => esc_html__( 'Directions Metabox', 'cmb2' ),
        'object_types' => array( 'page', ), // Post type
        'context'      => 'normal',
        'priority'     => 'high',
        'show_names'   => true, // Show field names on the left
        'show_on'      => array( 'key' => 'page-template', 'value' => 'location.php' ),
    ) );

    $cmb_location_page->add_field( array(
        'name'    => esc_html__( 'Put the Written Direction Here', 'cmb2' ),
        'desc'    => esc_html__( 'Map gets added to the main content field - NOT HERE', 'cmb2' ),
        'id'      => $prefix . 'directions',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );

}


