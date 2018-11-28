<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 22.08.18
 * Time: 16:44
 */
?>
<?php $this->load->view('webapp/tpl_header'); ?>
    <section class="all-news-content-area clearfix section_padding_100_70">
        <div class="container">
            <div class="row wow zoomIn breadcrumb-area" data-wow-delay="0.2s">
                <a href="<?php echo base_url(); ?>"><h5>Trang chủ /</h5></a>
                <a href="<?php echo base_url() . '/news' . $category->slug; ?>"><h5><?php echo $category->name; ?></h5></a>
            </div>
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="wow fadeInLeft slow header" data-wow-delay="0.4s" style=" background-image: url(<?php echo base_url() . $news->img_horizontal; ?>); background-position: bottom; ">
                    </div>
                    <div class="date">
                        <span><?php echo date_format(new DateTime($news->created_date), "d.m.Y"); ?></span>
                    </div>
                    <h4 class="wow fadeIn slow title-header" data-nwow-delay="0.7s"><?php echo $news->title; ?></h4>
                    <article class="wow fadeIn slow" data-wow-delay="1s">
                        <?php echo $news->content; ?>
                    </article>

                    <div id="fb-root"></div>
                    <script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s);
                            js.id = id;
                            js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1463519310579697';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="fb-comments wow fadeIn slow header" data-wow-delay="1s" data-href="<?php echo current_url(); ?>" data-mobile="auto-detect"
                         data-numposts="100"></div>

                    <div class="row news-content-area">
                        <div class="col-12">
                            <h4>Bài viết liên quan</h4>
                        </div>
                        <?php foreach ($related_news as $item) { ?>
                            <div class="col-md-4 col-12">
                                <div class="related-news">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="<?php echo base_url() . 'news/news_content/' . $item->news_slug; ?>">
                                                <img src="<?php echo base_url() . $item->img_square; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="col-12" style="padding-top: 10px;">
                                            <a href="<?php echo base_url() . 'news/news_content/' . $item->news_slug; ?>"><?php echo $this->utilities->limit_text($item->title, 13); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="row">
                        <div class="advertising">
                            <img src="<?php echo base_url() . $adv; ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="category">
                            <div class="main-category">
                                <span>Bài xem nhiều nhất</span>
                            </div>
                            <div class="sub-category">

                                <?php foreach ($most_view_news as $item) { ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <img src="<?php echo base_url() . $item->img_square; ?>" alt="">
                                        </div>
                                        <div class="col-md-6 col-12 sub-category-label">
                                            <span><?php echo $this->utilities->limit_text($item->title, 10); ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tags section_padding_20_30 wow zoomInRight slow" data-wow-delay="0.5s">
                            <h3>TAGS</h3>
                            <?php foreach ($tags as $item) { ?>
                                <a href="<?php echo base_url() . 'tag/' . $item->name; ?>"><?php echo $item->name; ?></a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="category section_padding_0_30">
                            <div class="main-category">
                                <span>Nội dung chính</span>
                            </div>
                            <div class="sub-category">
                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <a href="<?php echo base_url() . 'news/du-hoc-han-quoc'; ?>">
                                            <span>Du học Hàn Quốc</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <a href="<?php echo base_url() . 'programs/dao-tao-han-ngu'; ?>">
                                            <span>Đào tạo Hàn ngữ</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <a href="<?php echo base_url() . 'news/kinh-nghiem-du-hoc'; ?>">
                                            <span>Kinh nghiệm du học</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <span>Góc học viên</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <span>Thông tin học bổng</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 sub-category-label-no-image">
                                        <a href="<?php echo base_url() . 'center/issiloo'; ?>">
                                            <span>ISSILOO</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
<?php $this->load->view('webapp/tpl_footer'); ?>