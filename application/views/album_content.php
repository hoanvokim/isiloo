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
                <h5 class="current"><?php echo $album->name; ?></h5>
            </div>
            <div class="row wow zoomIn" data-wow-delay="0.2s">
                <h1><?php echo $album->name; ?></h1>
            </div>
            <div class="row pad-top-30">
                <?php foreach ($imgs as $item) { ?>
                    <div class="col-3 news-thumbnail">
                        <img src="<?php echo base_url() . $item->img; ?>" alt="" style="margin-top: 20px;">
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <article>
                    <?php echo $album->content; ?>
                </article>
            </div>
        </div>
    </section>
<?php $this->load->view('webapp/tpl_footer'); ?>