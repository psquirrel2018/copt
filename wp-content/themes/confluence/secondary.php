<?php
/**
Template Name: Secondary Page
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
//$taglineSize = get_post_meta($post->ID, '_secondary_page_tagline_size', true);

?>

    <div class="fullwidthbanner-container">
        <div class="row">
            <div class="col-xs-12 secondary2" style="background: url('<?php //echo $imageUrl; ?>');">
                <img src="<?= $imageUrl; ?>" class="img-responsive" style="width:100%;" />
                <div id="secondary-overlay" class="tagline-copy-no-bg">
                    <h2 style="color:<?= $taglineColor; ?>;" class="secondary2"><?= $tagline; ?></h2>
                </div>

            </div>

        </div>
    </div> <!-- /.rev_slider_wrapper-->
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="grey-section section-block">
        <div class="limit-width">
            <div class="row">
                <div class="col-lg-12" style="font-weight:400;padding:30px 60px;">
                        <p><?= the_content(); ?></p>
                </div>

            </div>
        </div>
    </div>
    <?php endwhile; ?>

<?php get_footer(); ?>