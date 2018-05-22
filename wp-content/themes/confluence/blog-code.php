<?php
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 5/24/17
 * Time: 10:39 AM
 * This is the code that I would use to add a full width blog posts carousel using owl carousel and pulling from the 'posts' post_type
 * Note, this also uses Aqua_resizer for the images.
 */
?>


<div id="blog" class="dark-version dark-section section-block">
        <div class="container">
            <div class="row">
                <div class="mid-space"></div>
                <div class="col-sm-5 col-lg-8 col-lg-push-2 section-title-wrapper" style="padding:15px 60px; text-align: center;">
                    <h2 class="section-title-wrapper">Latest From the Blog</h2>
                </div>
                <div class="mid-space"></div>
            </div>
            <div class="row">

                <!-- Latest Post 1 -->
                <div class="owl-carousel">
                <?php $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <div class="grid post-entry" style="width:95%;">
        <?php
        $postTitle = get_the_title();
        $post_image = the_post_thumbnail();

        $source_image = $post_image; // let's assume this image has the size 100x100px
        $width = 500; // note, how this exceeds the original image size
        $height = 400; // some pixel less than the original
        $crop = true; // if this would be false, You would get a 90x90px image. For users of prior
        // Aqua Resizer users, You would have get a 100x90 image here with $crop = true
        $resized_image = aq_resize($source_image, $width, $height, $crop);
        ?>
        <div class="post-image"><a title="<?= $postTitle; ?>" href="<?php print  get_permalink($post->ID) ?>">
                <?= $resized_image; ?></a>
        </div>
        <div class="post-content"><h4><?= $postTitle; ?></h4>
            <?php print the_excerpt(); ?>
            <p><a class="" href="<?php print  get_permalink($post->ID) ?>">Continue Reading</a></p>
        </div>

    </div>
<?php endwhile; ?>
</div>

</div>
<div class="row">
    <div class="col-sm-12 text-center" style="padding:30px 0;">
        <a href="/blog/" class="btn btn-primary">Read All Posts</a>
    </div>
</div>
</div>
</div>