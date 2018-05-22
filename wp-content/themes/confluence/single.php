<?php
/**
Template Name: single blog template
 **/
/**
 * @author Scott Taylor
 * @package One Confluence
 * @subpackage Customizations
 */
get_header();  //remove for /cotp2/.  this header only applies to /cotp/

global $post;
$postTitle = get_the_title();

?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="page-title-3">
        <?php $imageUrl = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
        <div class="container-fluid">
            <div class="row" style="background-image: url(<?= $imageUrl; ?>);background-size: cover;background-position: center;">
                <div class="col-sm-12" style="height:400px;">
                </div>
            </div>
        </div>
    </div>

<section class="page-content single-project no-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8">
                <h1 class="title"><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
            </div>
            <div class="col-sm-4 col-md-3 col-md-push-1">
                <div class="right-sidebar">
                    <?php if ( is_active_sidebar( 'sidebar1' )  ) : ?>
                        <aside id="primary" class="sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar1' ); ?>
                        </aside><!-- .sidebar .widget-area -->
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'sidebar2' )  ) : ?>
                        <aside id="secondary" class="sidebar widget-area secondary" role="complementary">
                            <?php dynamic_sidebar( 'sidebar2' ); ?>
                        </aside><!-- .sidebar .widget-area -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <div class="section-space"></div>
    <!--<div class="white-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="single-project-nav clearfix">
                        <div class="prev">
                            <a href="#">
                                <span class="fa fa-angle-left"></span>
                            </a>
                        </div>
                        <div class="back-to">
                            <a href="#">
                                <span class="fa fa-th"></span>
                            </a>
                        </div>
                        <div class="next">
                            <a href="#">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
</section> <!-- /.page-content -->

<?php get_footer(); ?>
