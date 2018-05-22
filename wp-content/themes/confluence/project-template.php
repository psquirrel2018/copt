<?php
/**
 *
 * Template Name: Project Template
 * Template Post Type: post, page, project
 * @author Scott Taylor
 * @package One Confluence
 * @subpackage Customizations
 */
get_header();  //remove for /cotp2/.  this header only applies to /cotp/

global $post; ?>

<?php while ( have_posts() ) : the_post(); ?>
    <!--<div class="page-title-2 section-block">
        <div class="limit-width">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="title"><?php //the_title(); ?></h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>-->

<?php
    $postThumbID = get_post_thumbnail_id( get_the_ID() );
    $image_attributes = wp_get_attachment_image_src( $postThumbID, 'full' );

/*$thumb = get_post_thumbnail_id( $Post->ID );
$img_url = wp_get_attachment_url( $thumb,'full');
$width = 800;
$height = 260090;
$crop = true;
$new_image = aq_resize($img_url, $width, $height, $crop);
*/
?>

<section class="page-content single-project no-padding-bottom section-block">
    <div class="limit-width">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="image-holder">
                            <a href="<?php echo $image_attributes[0]; ?>" class="lightbox"  data-lightbox-gallery="gallery1">
                                <?php
                                if ( $image_attributes ) : ?>
                                    <img class="img-responsive" src="<?php echo $image_attributes[0]; ?>" width="100%" />
                                <?php endif; ?>
                                <div class="project-overlay">
													<span class="link-holder">
														<i class="icon-eye"></i>
													</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-holder">
                            <a href="http://knssandbox.com/cotp2/wp-content/uploads/2017/01/Regis-University-Chapel-001.jpg" class="lightbox"  data-lightbox-gallery="gallery1">
                                <img src="http://knssandbox.com/cotp2/wp-content/uploads/2017/01/Regis-University-Chapel-001.jpg" alt="">
                                <div class="project-overlay">
													<span class="link-holder">
														<i class="icon-eye"></i>
													</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="image-holder">
                            <a href="http://placehold.it/800x600/ddd/ddd" class="lightbox"  data-lightbox-gallery="gallery1">
                                <img src="http://placehold.it/300x420/ddd/ddd" alt="">
                                <div class="project-overlay">
													<span class="link-holder">
														<i class="icon-eye"></i>
													</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-info">
                    <h4 class="accent">Denver, Colorado</h4>
                    <h2 class="project-title"><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                    <table>
                        <tbody>
                        <tr>
                            <td>Location</td>
                            <td>Denver, Colorado</td>
                        </tr>
                        <tr>
                            <td>Completion Date</td>
                            <td>24 July, 2013</td>
                        </tr>
                        <tr>
                            <td>Something</td>
                            <td>Something</td>
                        </tr>
                        </tbody>
                    </table>
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
