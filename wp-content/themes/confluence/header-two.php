<?php
/**
header two
 **/
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head();
    global $post;
    $site_logo='';
    if (function_exists('cotp_get_option')) {
    $site_logo = cotp_get_option( 'logo' );
    }
    ?>
</head>
<body class="fixed-header">

<a href="#" class="back-to-top" title="Back to top">
    <i class="icon-arrow-up"></i>
</a>

<div class="site-wrapper">
    <header class="header-type-1 hidden-sm2 hidden-xs2" style="padding:30px 0 15px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-navigation">

                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?= $site_logo; ?>" alt="logo">
                            </a>
                        </div>
                        <div class="main-menu">
                        <nav class="main-nav hidden-sm hidden-xs">
                            <div class="collapse navbar-collapse" id="navbar">
                                <?php echo cotp_nav(); ?>
                            </div>
                        </nav> <!-- End Menu -->

                        </div>

                        <div class="header-right">
                            <p style="font-size:1.0em;">Sunday Service 10:00 am & 7:00 pm<br />
                                Tuesday Bible Study 6:00 p.m.<br />
                            17 Pond Rd.,
                             North Truro, MA</p>

                        </div>

                    </div>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

    </header> <!-- /.header-type-1 -->

    <!-- /Header Content -->
    <div class="main-wrapper"> <!-- closing div is in the footer.php -->