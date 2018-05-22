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

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function cotp_show_if_front_page( $cmb ) {
    // Don't show this metabox if it's not the front page template
    if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
        return false;
    }
    return true;
}

add_action( 'cmb2_admin_init', 'cotp_register_frontpage_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function cotp_register_frontpage_metabox() {
    $prefix = '_cotp_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Front Page Latest Projects', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on' => array( 'key' => 'page-template', 'value' => 'frontpage.php' ), // Make sure to change this based on site your working on cotp vs. cotp2
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Driving Directions', 'cmb2' ),
        'desc'    => __( 'address, phone number...', 'cmb2' ),
        'id'      => $prefix . 'one_front_one_wysiwyg',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );

    /*$cmb_demo->add_field( array(
        'name' => __( 'Post ID for the Team Carousel', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'team_id',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );*/

    /*$cmb_demo->add_field( array(
        'name' => __( 'Block One: Top Title', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'one_top',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );*/

    /*$cmb_demo->add_field( array(
        'name' => __( 'Project One: Image', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
        'id'   => $prefix . 'project_one_image',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project One Title', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_one_title',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project One URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_one_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    //project two cmbs

    $cmb_demo->add_field( array(
        'name' => __( 'Project two Image', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
        'id'   => $prefix . 'project_two_image',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project two Title', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_two_title',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project Two URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_two_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project Three Image', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
        'id'   => $prefix . 'project_three_image',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project three Title', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_three_title',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project three URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'three_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    //project four cmbs

    $cmb_demo->add_field( array(
        'name' => __( 'Project Four: Header Image', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
        'id'   => $prefix . 'project_four_image',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project four: Top Title', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_four_title',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Project four: URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'project_four_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    /*$cmb_demo->add_field( array(
         'name'    => __( 'Footer wysiwyg left', 'cmb2' ),
         'desc'    => __( 'address, phone number...', 'cmb2' ),
         'id'      => $prefix . 'footer_left',
         'type'    => 'wysiwyg',
         'options' => array( 'textarea_rows' => 5, ),
     ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Footer wysiwyg Right', 'cmb2' ),
        'desc'    => __( 'address, phone number...', 'cmb2' ),
        'id'      => $prefix . 'footer_right',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );

     $cmb_demo->add_field( array(
         'name' => __( 'Footer Logo', 'cmb2' ),
         'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
         'id'   => $prefix . 'footer_logo',
         'type' => 'file',
     ) );*/

}