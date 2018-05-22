<?php
/**
Template Name: Event Detail Template
 **/
/**
 * @author Scott Taylor
 * @package One Confluence
 * @subpackage Customizations
 */
get_header( 'two');  //remove for /cotp2/.  this header only applies to /cotp/

global $post;
$imageUrl = wp_get_attachment_url( get_post_thumbnail_id() );

?>

    <div class="fullwidthbanner-container">
        <div class="row">
            <div class="col-xs-12" style="background: url('<?= $imageUrl; ?>'); background-size:cover;min-height:600px;">

                <div id="secondary-overlay" class="tagline-copy">
                    <h1 style="color:#fff;text-align: center;">Showing Christ's love</h1>
                </div>

            </div>

        </div>
    </div> <!-- /.rev_slider_wrapper-->
<?php while ( have_posts() ) : the_post(); ?>
    <div class="grey-section section-block">
        <div class="limit-width">
            <div class="row">
                <div class="col-lg-12" style="font-weight:400;font-size:1.5em;padding:15px 60px;">
                    <p><?= the_content(); ?></p>
                </div>
                <!--<div class="col-lg-3" style="font-weight:400;font-size:1.25em;">
                    <div class="cta-inner2 clearfix">
                        <div class="cta-content2">
                            <h3>Join our Newsletter</h3>
                            <span>Get the latest news and schedule of events, services, etc. emailed to you every month.</span>
                        </div>
                        <div class="cta-button">
                            <a href="/contact-us/" class="button default">Join Now</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>