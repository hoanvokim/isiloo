<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 10:35
 */
?>

<?php $this->load->view('webapp/tpl_header'); ?>
<section class="all-news-area clearfix section_padding_100_70">
    <div class="container">
        <div class="row wow zoomIn breadcrumb-area" data-wow-delay="0.2s">
            <a href="<?php echo base_url(); ?>"><h5>Trang chủ /&nbsp;</h5></a>
            <h5 class="current">Kết quả tìm kiếm: <?php echo $keyword; ?></h5>
        </div>
        <div class="row wow zoomIn" data-wow-delay="0.2s">
            <h1>Tìm thấy: <?php echo count($news); ?> kết quả. </h1>
        </div>
        <div class="row pad-top-30">
            <?php foreach ($news as $item) { ?>
                <div class="col-md-4 news-thumbnail">
                    <div class="news-border wow fadeInBig" data-wow-delay="0.2s">
                        <a href="<?php echo base_url() . 'news/news_content/' . $item->slug; ?>">
                            <img src="<?php echo base_url() . $item->img_square; ?>" alt="">
                            <h5><?php echo $item->title; ?></h5>
                        </a>
                        <div class="content">
                            <span><?php echo date_format(new DateTime($item->created_date), "d.m.Y"); ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php $this->load->view('webapp/tpl_footer'); ?>
