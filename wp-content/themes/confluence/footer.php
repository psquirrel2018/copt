        <footer class="site-footer">
            <div class="widgetized-area">
                <div class="limit-width wow fadeIn" data-wow-duration="0.7s" data-wow-delay="0.4s">
                    <div class="row">
                        <div class="col-sm-2 col-lg-2">
                            <div class="widget">
                                <h3 class="widget-title">Follow Us</h3>
                                <div class="social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <!--<a href="#"><i class="fa fa-instagram"></i></a>-->
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <!--<a href="#"><i class="fa fa-youtube"></i></a>-->
                                </div>
                                <div style="padding:15px 0;">
                                    <a href="http://thelivingwaterfeature.wordpress.org" target="_blank" class="blog">Visit our Blog</a>
                                </div>

                            </div>
                        </div> <!-- /.col-md-3 -->
                        <div class="col-sm-10 col-lg-7">
                            <div class="widget" style="padding:0 30px;">
                                <?php if ( ! dynamic_sidebar('footer2')) : ?>
                                <?php endif; ?>
                            </div>
                        </div> <!-- /.col-md-3 -->


                        <div class="col-lg-3">
                            <div class="widget">
                                <h3 class="widget-title">Contact Info</h3>
                                <div class="contact-info">
                                    <div class="widget" style="padding:0 30px;">
                                        <?php if ( ! dynamic_sidebar('footer3')) : ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-md-3 -->
                    </div> <!-- /.row -->
                </div> <!-- /.limit-width -->
            </div> <!-- /.widgetized-area -->
            <div class="copyright">
                <div class="limit-width">
                    <div class="row">
                        <div class="col-sm-12">
                           Designed and developed by Confluence Web Solutions & KTC Consulting
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.limit-width -->
            </div> <!-- /.copyright -->
        </footer>

    </div> <!-- /.main-wrapper -->

</div> <!-- /.site-wrapper -->

<?php wp_footer(); ?>
        <!--<script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-92304044-1', 'auto');
            ga('send', 'pageview');

        </script>-->
</body>
</html>