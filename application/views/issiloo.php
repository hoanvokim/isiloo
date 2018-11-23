<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 09:58
 */
?>




<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 22.08.18
 * Time: 16:44
 */
?>
<?php $this->load->view('webapp/tpl_header'); ?>
<section class="all-news-area clearfix section_padding_100_70">
    <div class="container">
        <div class="row wow zoomIn breadcrumb-area" data-wow-delay="0.2s">
            <a href="<?php echo base_url(); ?>"><h5>Trang chủ /&nbsp;</h5></a>
            <h5 class="current"><?php echo $title; ?></h5>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="aboutUs-headline">
                        <h2>Giới thiệu về ISSILOO</h2>
                    </div>
                    <p>
                        <?php echo $issiloo_intro; ?>
                    </p>
                </div>
            </div>
        </div>

        <!--        Nhân sự-->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="aboutUs-headline">
                        <h2>Nhân sự ISSILOO</h2>
                    </div>
                    <p>
                        <?php echo $issiloo_hr; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row pad-top-30">
            <?php foreach ($employee as $item) { ?>
                <div class="col-md-4 news-thumbnail">
                    <div class="news-border wow fadeInBig" data-wow-delay="0.2s">
                        <div class="text-center" style="width: 100%">
                            <img src="<?php echo base_url() . $item->img; ?>" alt="" style="width: 200px;" >
                        </div>
                        <h5><?php echo $item->name; ?></h5>
                        <div class="content">
                            <span class="padding-left-right"><?php echo $item->position; ?></span>
                            <span class="padding-left-right"><?php echo $item->education; ?></span>
                            <p>
                                <i class="fa fa-quote-left" aria-hidden="true"></i> <br/>
                                <?php echo $item->intro; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php $this->load->view('webapp/tpl_footer'); ?>
