<?php
/**
Template Name: Blog Aggregate Page
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
?>

    <div class="fullwidthbanner-container">
        <div class="row">
            <div class="col-xs-12" style="background: url('<?= $imageUrl; ?>'); background-size:cover;min-height:600px;">

                <div id="secondary-overlay" class="tagline-copy">
                    <h1 style="color:<?= $taglineColor; ?>;text-align: center;"><?= $tagline; ?></h1>
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
            </div>
        </div>
        <div class="container">
            <div class="white-section section-block">
                <div class="mid-space"></div>
                <?php
                /* Query the post */
                $args = array( 'post_type' => 'post', 'posts_per_page' => -1, 'order'   => 'DESC', );//this will return ALL of the posts. You can also change this to a specific number such as 'posts_per_page' => 10...
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                ?>

                <div class="row">
                    <div class="col-md-2 text-center">
                        <?php
                        $postThumbID = get_post_thumbnail_id( get_the_ID() );
                        $image_attributes = wp_get_attachment_image_src( $postThumbID, 'full' );
                        if ( $image_attributes ) : ?>
                            <!--<img class="img-responsive" src="<?php //echo $image_attributes[0]; ?>" width="100%" />-->
                        <?php endif; ?>
                        <a class="story-title" href="<?php print get_permalink($post->ID) ?>"><img alt="" src="<?php echo $image_attributes[0]; ?>" style="width:100px;height:100px" class="img-circle"></a>
                    </div>
                    <div class="col-md-6">
                        <h3><a href="<?php print get_permalink($post->ID) ?>"><?php print get_the_title(); ?></a></h3>
                        <?php print get_the_excerpt(); ?><br />
                        <div class="row">
                            <div class="col-xs-9">
                                    <small style="font-family:courier,'new courier';" class="text-muted"> <a href="<?php print get_permalink($post->ID) ?>" class="text-muted">Read More</a></small>
                                </h4></div>
                            <div class="col-xs-3"></div>
                        </div>
                        <br><br>
                    </div>
                </div>
                <hr>
                <div class="mid-space"></div>
                <?php endwhile; ?><!-- End of the while loop -->
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php if( !is_page (array(2, 106)) ):?>
    <!--<div class="call-to-action light section-block">
        <div class="limit-width">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cta-inner clearfix">
                        <div class="cta-content">
                            <h3>Let's talk about your next project</h3>
                            <span>If you are interested in learning more about cotp Masonry, we'd love to tell you more.</span>
                        </div>
                        <div class="cta-button">
                            <a href="/contact-us/" class="button default">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="shadow-gradient"></div>-->
    <!--</div>-->
<?php endif;?>



<?php get_footer(); ?>