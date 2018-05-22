<?php
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 12/5/16
 * Time: 10:37 AM
 */

/**
 * Including all required lib files in the theme
 */
require_once(dirname(__FILE__) . '/lib/cotp-site-options.php');
require_once(dirname(__FILE__) . '/lib/cotp-frontpage-options.php');
require_once(dirname(__FILE__) . '/lib/secondaryPage-functions.php');
require_once( dirname(__FILE__) . '/lib/aq_resizer.php');
require_once( dirname(__FILE__) . '/lib/widgets.php');
require_once( dirname(__FILE__) . '/lib/wp_bootstrap_navwalker.php');

    //<script src="assets/js/jquery.min.js"></script>
    //<script src="assets/js/joinable/nivo-lightbox.min.js"></script>

/**
 * Including all required style files in the theme
 */
function cotp_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '1', 'all' );
    wp_register_style('font-awesome.min', get_template_directory_uri() .'/assets/css/font-awesome.css', array(), null, 'all' );
    wp_register_style('simple-line-icons', get_template_directory_uri() .'/assets/css/simple-line-icons.css', array(), null, 'all' );
    wp_register_style('elegant-icons', get_template_directory_uri() .'/assets/css/elegant-icons.css', array(), null, 'all' );
    wp_register_style('animate',  get_template_directory_uri() .'/assets/css/animate.min.css', array(), null, 'all' );
    wp_register_style('animsition',  get_template_directory_uri() .'/assets/css/animsition.min.css', array(), null, 'all' );
    wp_register_style('nivo', get_template_directory_uri() .'/assets/css/nivo-lightbox.css', array(), null, 'all' );
    wp_register_style('owl', get_template_directory_uri() .'/assets/css/owl.carousel.min.css', array(), null, 'all' );
    wp_register_style('owl', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css', array(), null, 'all' );
    wp_register_style('main', get_template_directory_uri() .'/assets/css/main.css', array(), null, 'all' );
    wp_register_style('styles', get_stylesheet_uri(), array(), '2.7.0','all' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'nivo' );
    wp_enqueue_style( 'animate' );
    wp_enqueue_style( 'font-awesome.min' );
    wp_enqueue_style( 'simple-line-icons' );
    wp_enqueue_style( 'elegant-icons' );
    wp_enqueue_style( 'animsition' );
    wp_enqueue_style( 'owl' );
    wp_enqueue_style( 'main' );
    wp_enqueue_style( 'styles' );
    /*** Google fonts-opensans */
    //wp_enqueue_style('one-opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300,400italic');
    //wp_enqueue_style('one-karla', '//fonts.googleapis.com/css?family=Karla:400,400i,700,700i');
}

add_action('wp_enqueue_scripts', 'cotp_styles');
/**
 * Include all required javascript files in the theme
 */
function cotp_scripts() {
    //wp_enqueue_script('jQuery', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('tether', get_template_directory_uri() . '/assets/js/joinable/tether.min.js', array(), '1.0.0', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('animsition', get_template_directory_uri() . '/assets/js/joinable/animsition.min.js', array(), '1.0.0', true );
    wp_enqueue_script('auto-grow', get_template_directory_uri() . '/assets/js/joinable/autogrow.min.js', array(), '1.0.0', true );
    wp_enqueue_script('hover-intent', get_template_directory_uri() . '/assets/js/joinable/hoverIntent.js', array(), '1.0.0', true );
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/joinable/isotope.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script('nice-scroll', get_template_directory_uri() . '/assets/js/joinable/jquery.nicescroll.min.js', array(), '1.0.0', true );
    //wp_enqueue_script('superfish', get_template_directory_uri() . '/assets/js/joinable/superfish.js', array('jquery'));
    //wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/joinable/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/joinable/parallax.js', array(), '1.0.0', true );
    wp_enqueue_script('nivo', get_template_directory_uri() . '/assets/js/joinable/nivo-lightbox.min.js', array(), '1.0.0', true );
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/joinable/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script('settings', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
    /*** Easing javascript file */
    wp_enqueue_script('onepage-easing', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'cotp_scripts');

/**
 * cotp Theme setup
 */
function cotp_setup() {
    add_theme_support('post-thumbnails'); // adds thumbnail support for the pages, posts and Projects CPT
    add_image_size('work_cat_thumb', 800, 500, true);
    add_image_size('post_thumbnail', 400, 250, true);
    add_image_size('post_thumbnail_1', 70, 70, true);


// Register menus

    register_nav_menus(array(
            'frontpage-menu' => __('Front Page Menu', 'cotp-masonry'),
            'subpage-menu' => __('Sub Page Menu', 'cotp-masonry')
        )
    );
    cotp_default_menu();
}

add_action('after_setup_theme', 'cotp_setup');

/**
 * function to setup default theme menu
 */
function cotp_default_menu() {

    $menuname = 'One Front Page Menu';
    $menulocation = 'frontpage-menu';
}

// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function one_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'one_add_menuclass');

function cotp_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu',
            'menu_class' => 'nav navbar-nav navbar-left sf-menu sf-js-enabled sf-shadow',
            'menu_id' => 'one_menu',
            'container' => '',
            'container_class' => '',
            'sub_menu'       => true,
            'depth' => 0,
            'walker' => new wp_bootstrap_navwalker()));
    else
        cotp_nav_fallback();
}


//Creating Custom Post types for Team
/*function setup_team_cpt(){
    $labels = array(
        'name' => _x('team', 'post type general name'),
        'singular_name' => _x('team', 'post type singular name'),
        'add_new' => _x('Add New', 'Team'),
        'add_new_item' => __('Add New Team'),
        'edit_item' => __('Edit Team'),
        'new_item' => __('New Team'),
        'all_items' => __('All Team'),
        'view_item' => __('View Team'),
        'search_items' => __('Search Team'),
        'not_found' => __('No Team Found'),
        'not_found_in_trash' => __('No Team found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Team'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The BMI Team',
        'rewrite' => array('slug' => 'team'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type('team', $args);
}
add_action('init', 'setup_team_cpt');*/


//Trm excerpt


add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_length($length) {

    return 40;
}



function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

function disable_wp_emojicons() {

    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

/**
 * Media - set default image link location to 'None'
 */

update_option('image_default_link_type','none');

/**
 * Always Show Kitchen Sink in WYSIWYG Editor
 */

function unhide_kitchensink( $args ) {
    $args['wordpress_adv_hidden'] = false;
    return $args;
}

add_filter( 'tiny_mce_before_init', 'unhide_kitchensink' );

function remove_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    //unregister_widget('WP_Widget_Search');
    // unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    //unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    //unregister_widget('WP_Nav_Menu_Widget');
}
add_action('widgets_init', 'remove_default_widgets', 11);


// Remove meta generator (WP version) from site and feed
if ( ! function_exists( 'mywp_remove_version' ) ) {

    function mywp_remove_version() {
        return '';
    }
    add_filter('the_generator', 'mywp_remove_version');
}

// Clean header from unneeded links
if ( ! function_exists( 'mywp_head_cleanup' ) ) {

    function mywp_head_cleanup() {
        remove_action('wp_head', 'feed_links', 2);  // Remove Post and Comment Feeds
        remove_action('wp_head', 'feed_links_extra', 3);  // Remove category feeds
        remove_action('wp_head', 'rsd_link'); // Disable link to Really Simple Discovery service
        remove_action('wp_head', 'wlwmanifest_link'); // Remove link to the Windows Live Writer manifest file.
        /*remove_action( 'wp_head', 'index_rel_link' ); */ // canonic link
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  // Remove relation links for the posts adjacent to the current post.
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);



        add_action('init', 'mywp_head_cleanup');
    } }


