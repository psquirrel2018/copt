<?php
/**
Template Name: Location-directions Page
 **/
/**
 * @author Scott Taylor
 * @package One Confluence
 * @subpackage Customizations
 */
get_header( 'two' );  //remove for /cotp2/.  this header only applies to /cotp/

global $post;
$imageUrl = wp_get_attachment_url( get_post_thumbnail_id() );
$tagline = get_post_meta($post->ID, '_secondary_page_tagline', true);
$taglineColor = get_post_meta($post->ID, '_secondary_page_tagline_color', true);
$directions = get_post_meta($post->ID, '_secondary_location_directions', true);

?>

    <div class="fullwidthbanner-container">
        <div class="row">
            <div class="col-xs-12" style="background: url('<?= $imageUrl; ?>'); background-size:cover;min-height:600px;">

                <div id="secondary-overlay" class="tagline-copy-no-bg">
                    <h1 style="color:<?= $taglineColor; ?>;text-align: center;"><?= $tagline; ?></h1>
                </div>

            </div>

        </div>
    </div> <!-- /.rev_slider_wrapper-->
<?php while ( have_posts() ) : the_post(); ?>
    <div class="grey-section section-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4" style="font-weight:400;padding:30px 30px;">
                    <p><?= $directions; ?></p>
                </div>
                <div class="col-sm-8" style="font-weight:400;padding:30px 10px 30px 0;">
                    <p><?= the_content(); ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>


<?php get_footer(); ?>