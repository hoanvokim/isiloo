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
        <div class="container ">
            <div class="row wow zoomIn breadcrumb-area" data-wow-delay="0.2s">
                <a href="<?php echo base_url(); ?>"><h5>Trang chủ /&nbsp;</h5></a>
                <?php if ($mid_category != null) { ?>
                    <a href="<?php echo base_url() . 'programs/' . $mid_category->slug; ?>">
                        <h5><?php echo $mid_category->name; ?> /&nbsp;</h5></a>
                <?php } ?>
                <h5 class="current"><?php echo $category->name; ?></h5>
            </div>
            <div class="row wow zoomIn" data-wow-delay="0.2s">
                <h1><?php echo $category->name; ?></h1>
            </div>

            <?php $displayRow = 0; ?>
            <?php foreach ($news as $item) { ?>
                <?php if ($displayRow == 0) { ?>
                    <div class="row pad-top-30 row-eq-height">
                <?php } ?>
                <div class="col-md-4 news-thumbnail">
                    <div class="news-border wow fadeInBig" data-wow-delay="0.2s">
                        <a href="<?php echo base_url() . 'news/news_content/' . $item->slug; ?>">
                            <img src="<?php echo base_url() . $item->img_square; ?>" alt="">
                            <h5><?php echo $item->title; ?></h5>
                        </a>
                        <div class="content">
                            <span class="content-date"><?php echo date_format(new DateTime($item->created_date), "d.m.Y"); ?></span>
                        </div>
                    </div>
                </div>

                <?php if ($displayRow == 2) {
                    $displayRow = 0; ?>
                    </div>
                <?php } else if ($displayRow < 3) {
                    $displayRow++;
                }
            } ?>

        </div>
        <?php if (count($news) == 0) { ?>
            <div style="empty-panel">
                <span>Chưa có bài viết</span>
            </div>
        <?php } ?>
        </div>
    </section>
<?php $this->load->view('webapp/tpl_footer'); ?>