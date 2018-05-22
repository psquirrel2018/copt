<?php
/**
Template Name: Front Page
 **/
/**
 * @author Scott Taylor
 * @package One Confluence
 * @subpackage Customizations
 */
get_header( 'two' );

global $post;
//$topTitleOne = get_post_meta($post->ID, '_one_front_one_top', true);
//project one vars
$projectOneImg = get_post_meta($post->ID, '_cotp_project_one_image', true);
$drivingDirections = get_post_meta($post->ID, '_cotp_one_front_one_wysiwyg', true);
$projectOneTitle = get_post_meta($post->ID, '_cotp_project_one_title', true);
$projectOneUrl = get_post_meta($post->ID, '_cotp_project_one_url', true);

//project Two variables
$projectTwoImg = get_post_meta($post->ID, '_cotp_project_two_image', true);
//$descriptionOne = get_post_meta($post->ID, '_one_front_one_wysiwyg', true);
$projectTwoTitle = get_post_meta($post->ID, '_cotp_project_two_title', true);
$projectTwoUrl = get_post_meta($post->ID, '_cotp_project_two_url', true);

//project Three variables
$projectThreeImg = get_post_meta($post->ID, '_cotp_project_three_image', true);
//$descriptionOne = get_post_meta($post->ID, '_one_front_one_wysiwyg', true);
$projectThreeTitle = get_post_meta($post->ID, '_cotp_project_three_title', true);
$projectThreeUrl = get_post_meta($post->ID, '_cotp_project_three_url', true);

//project Four variables
$projectFourImg = get_post_meta($post->ID, '_cotp_project_four_image', true);
//$descriptionOne = get_post_meta($post->ID, '_one_front_one_wysiwyg', true);
$projectFourTitle = get_post_meta($post->ID, '_cotp_project_four_title', true);
$projectFourUrl = get_post_meta($post->ID, '_cotp_project_four_url', true);

$team_id = get_post_meta($post->ID, '_one_front_team_id', true);
//$mainContent = the_content();
//end block variables
?>

    <div class="fullwidthbanner-container main-carousel2">
        <?php
        putRevSlider("home-right")
        ?>
    </div> <!-- /.rev_slider_wrapper-->

    <div class="light-section section-block">
        <div class="container">
            <!-- Service Title Only -->
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-12 section-title-wrapper">

                        <p><?= get_the_content(); ?></p>

                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>



    <div class="grey-section section-block">
        <div class="container">
            <div class="row">
                <div class="mid-space"></div>
                <div class="col-sm-5 col-lg-8 col-lg-push-2" style="padding:15px 60px; text-align: center;"><h2>Schedule</h2>
                </div>
                <div class="mid-space"></div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?php echo do_shortcode('[calendarizeit defaultview="month"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="light-section section-block">
        <div class="section-bg"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 col-lg-8 col-lg-push-2" style="padding:15px 60px;">
                    <h2 class="section-title style-1"></h2>
                    <p></p>
                </div>
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-sm-6 col-lg-6" style="padding:15px 30px 15px 60px;">
                    <h2 class="section-title style-1">Address & Driving Instructions</h2>
                    <p><?= $drivingDirections; ?></p>
                </div>
                <div class="col-sm-6 col-lg-6" style="padding:15px 60px; text-align: center;">
                    <h2 class="section-title style-1"></h2>
                    <p><?php echo do_shortcode('[mappress mapid="1" width="100%" height="500"]'); ?></p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.dark-section -->

    <!--<div class="call-to-action grey-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="cta-inner clearfix">
                        <div class="cta-content">
                            <h3>Sign up to Receive our Monthly Newsletter</h3>
                            <span></span>
                        </div>
                        <div class="cta-button">
                            <a data-toggle="modal" href="#modal-signup" class="button default">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-gradient"></div>
    </div>-->

    <div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog style-one" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn btn-default" style="float: right;z-index:999;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="width:75%;">Newsletter Sign Up</h4>
                    <p><?php echo do_shortcode('[gravityform id="2" title="true" description="true"]'); ?></p>
                </div>

            </div>
        </div>
    </div>

<?php get_footer(); ?>