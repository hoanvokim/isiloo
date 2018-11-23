<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 22.08.18
 * Time: 16:44
 */
?>

<?php $this->load->view('webapp/tpl_header'); ?>

    <!-- ***** Banner Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-6 col-12">
                    <div class="wellcome-heading wow fadeInLeftBig" data-wow-delay="0.7s">
                        <img src="<?php echo base_url(); ?>webresources/img/issi/duhochanquoc.png">
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->
                        <?php echo form_open_multipart('dialForm'); ?>
                        <input type="text" name="dialPhone" class="form-control phone wow flipInY" data-wow-delay="1s"
                               placeholder="Số điện thoại">
                        <input type="submit" class="submit wow flipInY" data-wow-delay="1.2s"
                               value="Tư vấn">
                        </form>
                        <!-- Form End -->
                    </div>
                    <!-- social icon-->
                    <div class="wellcome-heading-icon">
                        <a href="https://www.facebook.com/issiloo.edu.vn/">
                            <img src="<?php echo base_url(); ?>webresources/img/issi/iconFacebook.png"
                                 class="wow flipInY" data-wow-delay="1.2s">
                        </a>
                        <a href="http://zaloapp.com/qr/p/fwc7rp42pe1x">
                            <img src="<?php echo base_url(); ?>webresources/img/issi/iconZalo.png" class="wow flipInY"
                                 data-wow-delay="1.6s">
                        </a>
                        <a href="https://www.youtube.com/channel/UCxSwrePN-rYK7AUtoKi2gfg?view_as=subscriber">
                            <img src="<?php echo base_url(); ?>webresources/img/issi/iconYoutube.png"
                                 class="wow flipInY" data-wow-delay="1.4s">
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <!-- Welcome thumb -->
                    <div class="welcome-thumb wow fadeInDownBig" data-wow-delay="0.4s">
                        <img src="<?php echo base_url(); ?>webresources/img/issi/hocvien.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Banner Area End ***** -->

    <!-- ***** Gia tri Area Start ***** -->
    <section class="popular_news_area clearfix section_padding_20_30">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-md-7 col-sm-12 col-12 wow zoomInLeft" data-wow-delay="0.2s">
                    <div class="popular_news_area-header">
                        <h1>Bài mới</h1>
                        <hr/>
                    </div>
                    <div class="popular_news_area-content">
                        <a href="<?php echo base_url() . 'news/news_content/' . $latest_news->slug; ?>">
                            <img src="<?php echo $latest_news->img_square; ?>"/>
                        </a>
                        <a href="<?php echo base_url(); ?>">Trang chủ / </a><a
                                href="<?php echo base_url() . 'news/' . $latest_news_cat->id; ?>"><?php echo $latest_news_cat->name; ?> </a>

                        <a href="<?php echo base_url() . 'news/news_content/' . $latest_news->slug; ?>">
                            <h3><?php echo $this->utilities->limit_text($latest_news->title, 26); ?></h3>
                        </a>
                        <span>
                            <?php echo $this->utilities->limit_text($latest_news->summary, 26); ?>
                        </span>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-md-5 col-sm-12 col-12 wow zoomInRight" data-wow-delay="0.2s">
                    <div class="popular_news_area-header">
                        <h3>Bài được xem nhiều nhất</h3>
                        <hr/>
                    </div>
                    <?php foreach ($most_view_news as $news) { ?>
                        <div class="row popular_news_area-single">
                            <div class="no-padding col-6">
                                <a href="<?php echo base_url() . 'news/news_content/' . $news->news_slug; ?>">
                                    <img src="<?php echo base_url() . $news->img_square; ?>"/>
                                </a>
                            </div>
                            <div class="no-padding col-6 popular_news_area-text-content">
                                <a href="<?php echo base_url() . 'news/news_content/' . $news->news_slug; ?>">
                                    <h4 class="testetset"><?php echo $this->utilities->limit_text($news->title, 26); ?></h4>
                                </a>
                                <a href="<?php echo base_url(); ?>">Trang chủ /</a>
                                <a href="<?php echo base_url() . 'news/' . $news->cat_slug; ?>"><?php echo $news->cat_name; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    <a class="button-view wow flipInY" data-wow-delay="1s"
                       href="<?php echo base_url() . 'most_view'; ?>">
                        Xem thêm →
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Gia tri Area End ***** -->

    <!-- ***** Gia tri Area Start ***** -->
    <section class="cool_facts_area clearfix section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="cool_facts_area-heading">
                        <h1>Những giá trị ISSILOO mang lại</h1>
                    </div>
                </div>
            </div>
            <div class="row cool_facts_area-content">
                <!-- Single Cool Fact-->
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="single-cool-fact d-flex justify-content-center wow zoomInUp" data-wow-delay="1.3s">
                        <a href="<?php echo base_url(); ?>" target="_blank">
                            <div class="cool-facts-content hvr-grow">
                                <h2>100%</h2>
                                <p>đậu visa</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="single-cool-fact d-flex justify-content-center wow zoomInUp" data-wow-delay="1.5s">
                        <a href="<?php echo base_url(); ?>" target="_blank">
                            <div class="cool-facts-content hvr-grow">
                                <h2>Chi phí</h2>
                                <p>thấp nhất</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-md-4 col-sm-4 col-4">
                    <div class="single-cool-fact d-flex justify-content-center wow zoomInUp" data-wow-delay="1.7s">
                        <a href="<?php echo base_url(); ?>" target="_blank">
                            <div class="cool-facts-content hvr-grow">
                                <h2>Dịch vụ</h2>
                                <p>tốt nhất</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Gia tri Area End ***** -->

    <!-- ***** chuong trinh Area Start ***** -->
    <section class="our-Team-area bg-white section_padding_50_0 clearfix mt-80" id="chuongtrinh">
        <!--        <div>-->
        <!--            <img class="injectRightDiv-chuongtrinh"-->
        <!--                 src="--><?php //echo base_url(); ?><!--webresources/img/issi/hoa-issiloo.png">-->
        <!--        </div>-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="our-Team-area-heading wow zoomInDown" data-wow-delay="0.4s">
                        <h1>Chương trình tại <img src="<?php echo base_url(); ?>webresources/img/issi/issi.png"></a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="chuongtrinhissiloo_slides owl-carousel">

                    <?php foreach ($programs as $news) { ?>
                        <div class="single-shot show-shadow">
                            <a href="<?php echo base_url() . 'news/news_content/' . $news->slug; ?>">
                                <img src="<?php echo base_url() . $news->img; ?>" alt="">
                                <h5><?php echo $news->name; ?></h5>
                            </a>
                            <div class="content">
                                <span><?php echo $this->utilities->limit_text($news->summary, 26); ?></span>
                                <br/>
                                <br/>
                                <a href="<?php echo base_url() . 'news/news_content/' . $news->slug; ?>"> <span>Xem chi tiết >>></span></a>
                            </div>

                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- ***** chuong trinh End ***** -->

    <!-- ***** Truong dai hoc Area Start ***** -->
    <section class="app-screenshots-area bg-white section_padding_70_50 clearfix wow bounceInUp" data-wow-delay="0.2s"
             id="truongdaihoc">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Các trường đại học</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="app_screenshot_slides owl-carousel">
                        <?php foreach ($universities as $item) { ?>
                            <div class="single-shot show-shadow">
                                <a href="<?php echo base_url() . 'news/news_content/' . $item->news_slug; ?>">
                                    <img src="<?php echo base_url() . $item->img; ?>" alt="">
                                    <h5><?php echo $item->name; ?></h5>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Truong dai hoc Area End *****====== -->

    <!-- ***** Hoc Bong Area Start ***** -->
    <section class="scholar_ship_area clearfix section_padding_100_50" id="hocbong">
        <!--        <div>-->
        <!--            <img class="injectLeftDiv" src="-->
        <?php //echo base_url(); ?><!--webresources/img/issi/hoa-issiloo.png">-->
        <!--        </div>-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-5 text-center">
                    <!-- Heading Text  -->
                    <div class="scholar_ship_area-heading with-text-padding">
                        <h1 class="wow bounceInLeft" data-wow-delay="0.4s">Học bổng</h1>
                        <span class="wow bounceInLeft" data-wow-delay="0.6s">
                            Tổng hợp và cập nhật những thông tin học bổng <br/> trong và ngoài nước dành cho các bạn du học sinh
                        </span>
                        <br/>
                        <a class="button-view wow flipInY" data-wow-delay="1s"
                           href="<?php echo base_url() . 'news/hoc-bong'; ?>">
                            Xem thêm →
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-7 scholar_ship_area-heading text-center wow bounceInRight"
                     data-wow-delay="0.4s">
                    <!-- Heading Text  -->
                    <img src="<?php echo base_url(); ?>webresources/img/issi/hocbong.png">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Hoc Bong Area End ***** -->

    <!-- ***** Hocvien Area Start ***** -->
    <section class="hocvien-area bg-white section_padding_50 clearfix wow bounceInUp" data-wow-delay="0.2s"
             id="hocvienissiloo">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Học viên tại ISSILOO</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="hocvien_slides owl-carousel">
                        <?php foreach ($students as $item) { ?>
                            <div class="single-shot student" data-id="<?php echo base_url() . $item->img_pop; ?>"
                                 data-toggle="modal"
                                 data-target="#smallmodal">
                                <img class="hocvien_slides_img" src="<?php echo base_url() . $item->img; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Thông tin học viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="student-pop-image" src="" style="width: 100%"/>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hocvien Area End *****====== -->

    <!-- ***** Thong tin du hoc Area Start ***** -->
    <section class="study_abroad_area clearfix section_padding_50_20" id="thongtinduhoc">
        <!--        <div>-->
        <!--            <img class="injectRightDiv2" src="-->
        <?php //echo base_url(); ?><!--webresources/img/issi/hoa-issiloo.png">-->
        <!--        </div>-->
        <div class="container">
            <div class="row">
                <div class=" col-6 scholar_ship_area-heading text-center wow bounceInRight" data-wow-delay="0.4s">
                    <!-- Heading Text  -->
                    <img src="<?php echo base_url(); ?>webresources/img/issi/duhoc.png">
                </div>
                <div class=" col-6 text-center">
                    <!-- Heading Text  -->
                    <div class="study_abroad_area-heading with-text-padding">
                        <h1 class="wow bounceInLeft" data-wow-delay="0.4s">Thông tin du học</h1>
                        <span class="wow bounceInLeft blue-text" data-wow-delay="0.6s">
                            Tổng hợp, cập nhật tất cả những thông tin liên quan đến chương trình <br/>
                            du học Hàn Quốc và kinh nghiệm du học Hàn Quốc
                        </span>
                        <br/>
                        <a class="button-view wow flipInY" data-wow-delay="1s"
                           href="<?php echo base_url() . 'news/thong-tin-du-hoc'; ?>">
                            Xem thêm →
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Thong tin du hoc Area End ***** -->


    <!-- ***** Tu hoc tieng han Area Start ***** -->
    <section class="self_learning_area bg-white section_padding_20_30 clearfix wow bounceInUp" data-wow-delay="0.6s"
             id="tuhoc">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Tự học Tiếng Hàn</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="self_learning_slides owl-carousel">
                        <?php foreach ($self_lessons as $item) { ?>
                            <div class="single-shot show-shadow">
                                <a href="<?php echo base_url() . 'news/' . $item->slug; ?>">
                                    <img src="<?php echo base_url() . $item->img; ?>" alt="">
                                    <h5 class="text-bold"><?php echo $item->name; ?></h5>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Tu hoc tieng han Area End *****====== -->


    <!-- ***** hoc vien Feedback Area Start ***** -->
    <section class="clients-feedback-area bg-white section_padding_30_20 clearfix" id="sinhvien">
        <div class="container">
            <div class="row justify-content-center wow fadeIn" data-wow-delay="0.4s">
                <div class="col-12 col-md-10">
                    <div class="slider slider-for">
                        <?php foreach ($studentsWithReview as $item) { ?>
                            <!-- Client Feedback Text  -->
                            <div class="client-feedback-text text-center">
                                <div class="client">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                                </div>
                                <div class="client-description text-center">
                                    <p>“<?php echo $item->review; ?>”</p>
                                </div>
                                <div class="star-icon text-center">
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <?php
                                    if ($item->star == 4.5) {
                                        echo '<i class="ion-ios-star-half"></i>';
                                    } else if ($item->star == 5) {
                                        echo '<i class="ion-ios-star"></i>';
                                    }
                                    ?>
                                </div>
                                <div class="client-name text-center">
                                    <h5><?php echo $item->name; ?></h5>
                                    <p><?php echo $item->status; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Client Thumbnail Area -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slider slider-nav">
                        <?php foreach ($studentsWithReview as $item) { ?>
                            <div class="client-thumbnail">
                                <img src="<?php echo $item->img; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** hoc vien Feedback Area End ***** -->


    <!-- ***** ISSILOO Start ***** -->
    <section class="news_area clearfix " id="issiloo">
        <!--        <div>-->
        <!--            <img class="injectLeftDiv" src="-->
        <?php //echo base_url(); ?><!--webresources/img/issi/hoa-issiloo.png">-->
        <!--        </div>-->
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="news_area-heading wow fadeInLeft slow" data-wow-delay="0.4s">
                        <h2>ISSILOO</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="padding-top: 30px;">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="issiloo_images_slides owl-carousel wow fadeInRight slow" data-wow-delay="0.4s">
                        <?php foreach ($galleries as $item) { ?>
                            <div class="single-shot">
                                <img src="<?php echo base_url() . $item->img; ?>"
                                     alt="<?php echo base_url() . $item->title; ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** ISSILOO End ***** -->

    <!-- ***** Video Area Start ***** -->
    <section class="video-section section_padding_50_0">
        <div class="container-fluid work-item">
            <div class="row">
                <div class="col-12">
                    <!-- Video Area Start -->
                    <div class="video-area"
                         style="background-image: url(<?php echo base_url() . $youtube_background; ?>);
                                 background-repeat: no-repeat;
                                 ">
                        <div class="video-play-btn">
                            <a href="<?php echo base_url() . $youtube_link; ?>" class="video_btn"><i
                                        class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Video Area End ***** -->

<?php $this->load->view('webapp/tpl_footer'); ?>