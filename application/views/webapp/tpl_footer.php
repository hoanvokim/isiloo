<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 28.08.18
 * Time: 11:02
 */
?>
</main>
<!-- ***** Footer Area Start ***** -->
<footer class="footer-social-icon section_padding_0_30 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12 footer-text">
                <a href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>webresources/img/issi/logo-issiloo.png" alt=""/>
                </a>
                <a href="tel:<?php echo $this->config->item('hotline'); ?>"><img class="footer-hotline"
                                                                                 src="<?php echo base_url(); ?>webresources/img/issi/hotline.png"></a>
                <div class="contact-icon">
                    <a href="<?php echo $this->config->item('facebook_channel'); ?>">
                        <img src="<?php echo base_url(); ?>webresources/img/issi/iconFacebookWhite.png">
                    </a>
                    <a href="<?php echo $this->config->item('youtube_channel'); ?>">
                        <img src="<?php echo base_url(); ?>webresources/img/issi/iconYoutubeWhite.png"></a>
                    <a href="<?php echo $this->config->item('zalo_channel'); ?>">
                        <img src="<?php echo base_url(); ?>webresources/img/issi/iconZaloWhite.png"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 footer-text">
                <h3>Trung tâm du học Hàn Quốc ISSIOO</h3>
                <div class="row pad-top-10">
                    <div class="col-6 footer-text-no-padding-right">
                        <span style="font-weight: 500;">Mail: </span> <a
                                href="mailto:<?php echo $this->config->item('contact_email'); ?>"><span><?php echo $this->config->item('contact_email'); ?></span></a>
                    </div>
                    <div class="col-6 footer-text-no-padding-left">
                        <span style="font-weight: 500;">Fb: </span> <a
                                href="<?php echo $this->config->item('facebook_channel'); ?>"><span>Du học Hàn Quốc ISSILOO</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 footer-text" style="text-align: left; letter-spacing: 1px;">
                <span><?php echo $this->config->item('address'); ?></span>
            </div>
        </div>

    </div>
</footer>
<!-- ***** Footer Area Start ***** -->

<!-- Jquery-2.2.4 JS -->
<script src="<?php echo base_url(); ?>webresources/js/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="<?php echo base_url(); ?>webresources/js/popper.min.js"></script>
<!-- Bootstrap-4 Beta JS -->
<script src="<?php echo base_url(); ?>webresources/plugin/bootstrap/js/bootstrap.min.js"></script>
<!-- Multilevel-Menu JS -->
<script src="<?php echo base_url(); ?>webresources/plugin/multi-level-sidebar/src/js/hc-offcanvas-nav.js"></script>
<!-- All Plugins JS -->
<script src="<?php echo base_url(); ?>webresources/js/plugins.js"></script>
<!-- Slick Slider Js-->
<script src="<?php echo base_url(); ?>webresources/js/slick.min.js"></script>
<!-- Footer Reveal JS -->
<script src="<?php echo base_url(); ?>webresources/js/footer-reveal.min.js"></script>

<!-- jQuery Easing -->
<script src="<?php echo base_url(); ?>webresources/js/jquery.easing.1.3.js"></script>
<!-- Waypoints -->
<script src="<?php echo base_url(); ?>webresources/js/jquery.waypoints.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>webresources/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/js/magnific-popup-options.js"></script>

<!-- Active JS -->
<script src="<?php echo base_url(); ?>webresources/js/active.js"></script>
<!-- Custom JS -->
<script src="<?php echo base_url(); ?>webresources/js/custom.js"></script>


<script>
    $(".single-shot.student").click(function () {
        var img_src = $(this).data('id');
        $(".student-pop-image").attr("src", img_src);
    });

</script>
</body>
</html>