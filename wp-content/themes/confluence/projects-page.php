<?php

/* Template Name: Projects Portfolio */

get_header();
global $post;
$imageUrl = wp_get_attachment_url( get_post_thumbnail_id() );
?>

<div class="parallax-container" data-parallax="scroll" data-position="left" data-bleed="10" data-image-src="<?= $imageUrl; ?>">
    <div class="row">
        <div class="col-xs-12">
            <div id="secondary-overlay" class="tagline-copy">
                <h1 style="color:#fff;text-align: center;">TRADITION: ours is masonry and it’s been a part of who we are since the turn of the Century.</h1>
            </div>

        </div>

    </div>
</div> <!-- /.rev_slider_wrapper-->

<section class="page-content single-project no-padding-bottom section-block">
    <div class="limit-width">
        <div class="row">
            <div class="col-xs-12"> <h1 class="title"><?php the_title(); ?></h1></div>
        </div>
        <div class="row">

            <?php
            //use wp_query to get cpts and order by post order attributes

            $workResults = new WP_Query(array(
                'post_type' => 'work',
                'order_by' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
            ));
            $workPosts = $workResults->get_posts();
            //echo '<pre>' . print_r($workPosts, true) . '</pre>';

            //loop through results set
            foreach ($workPosts as $workPost) {
                $workThumbId = str_replace(' ', '', $workPost->post_title);
                $workThumbId = htmlentities($workThumbId);
                $workThumbsrc = wp_get_attachment_image_src(get_post_thumbnail_id($workPost->ID));
                $workCategory = get_the_title($workPost);
                if (count($workThumbsrc) > 0) {
                    $workThumbsrc = $workThumbsrc[0];
                    // @todo    add full post thumbnail to use in the href  Get rid of &
                }
                //echo '<pre>' . print_r($workThumbsrc, true) . '</pre>';

                // echo '<img src="' .$new_image. '">'
                ?>
                <div class="col-sm-3">
                    <h4><?= $workCategory; ?></h4>
                    <a href="<?= get_the_post_thumbnail_url($workPost->ID, 'full'); ?>" class="lightbox" data-lightbox-gallery="gallery-<?= $workThumbId; ?>"><img src="<?= get_the_post_thumbnail_url($workPost->ID, 'work_cat_thumb') ?>" class="img-responsive"></a>
                </div>
                <?php
                //get post meta
                $workPostMetas = get_post_meta( $workPost->ID, 'bmi_work_group', true );
                //echo '<pre>' . print_r($workPostMetas, true) . '</pre>';
                if (is_array($workPostMetas) || is_object($workPostMetas))
                {
                    foreach ($workPostMetas as $workPostMeta) {
                        $img = '';
                        $imgUrl = '';
                        if ( isset( $workPostMeta['image_id'] ) ) {
                            $img = wp_get_attachment_image($workPostMeta['image_id'], 'share-pick', null, array(
                                'class' => 'thumb  img-responsive',
                            ));
                        }
                        if ( isset( $workPostMeta['image_id'] ) ) {
                            $imgUrl = wp_get_attachment_url($workPostMeta['image_id']);
                        }?>
                        <?php //add another anchor tag and do the same thing for the above ?>
                        <a href="<?= $imgUrl; ?>" class="lightbox"  data-lightbox-gallery="gallery-<?= $workThumbId; ?>"></a>
                        <?php
                    } //end nested foreach
                } // end if array ?>

            <?php } // END foreach ?>
        </div>

    </div>

    <div class="section-space"></div>

</section> <!-- /.page-content -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
