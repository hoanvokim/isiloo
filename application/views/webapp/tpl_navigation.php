<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 28.08.18
 * Time: 11:02
 */
?>
<!-- ***** Header Area Start ***** -->
<header class="header_area animated sticky slideInDown">
    <div class="container">
        <div class="row align-items-center">
            <!-- Menu Area Start -->
            <div class="col-lg-11 col-md-11 col-sm-10 col-10">
                <div class="menu_area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- Logo -->
                        <a class="navbar-brand" href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>webresources/img/issi/logoWhite.png" alt="">
                        </a>
                        <!-- Menu Area -->
                        <div class="collapse navbar-collapse" id="ca-navbar">
                            <ul class="navbar-nav ml-auto" id="nav">
                                <li class="nav-item active"><a class="nav-link" href="#home">Trang chủ</a></li>
                                <li class="nav-item"><a class="nav-link" href="#chuongtrinh">Chương trình</a></li>
                                <li class="nav-item"><a class="nav-link" href="#truongdaihoc">Trường đại học</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#hocbong">Học bổng</a></li>
                                <li class="nav-item"><a class="nav-link" href="#thongtinduhoc">Thông tin du học</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#issiloo">ISSILOO</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="wrapper cf">
                    <nav id="main-nav">
                        <ul class="first-nav">
                            <li><a href="<?php echo base_url() . 'news/du-hoc-han-quoc'; ?>">Du học Hàn Quốc</a></li>
                            <li><a href="<?php echo base_url() . 'news/du-hoc-nghe-han-quoc'; ?>">Du học Nghề Hàn
                                    Quốc</a></li>
                            <li><a href="<?php echo base_url() . 'news/truong-dai-hoc'; ?>">Trường đại học</a></li>
                            <li><a href="<?php echo base_url() . 'news/chi-phi'; ?>">Chi phí</a></li>
                            <li><a href="<?php echo base_url() . 'news/hoc-bong'; ?>">Học bổng</a></li>
                            <li><a href="<?php echo base_url() . 'news/kinh-nghiem-du-hoc'; ?>">Kinh nghiệm du học</a>
                            </li>
                            <li><a href="<?php echo base_url() . 'news/thong-tin-du-hoc'; ?>">Thông tin du học</a></li>
                            <li><a href="<?php echo base_url() . 'programs/dao-tao-han-ngu'; ?>">Đào tạo Hàn ngữ</a>
                            </li>
                            <li><a href="<?php echo base_url() . 'news/luyen-thi-xkld'; ?>">Luyện thi XKLĐ</a></li>
                            <li><a href="<?php echo base_url() . 'center/thanh-tich-hoc-vien'; ?>">Thành tích học
                                    viên</a></li>
                            <li><a href="<?php echo base_url() . 'programs/hoat-dong-ngoai-khoa'; ?>">Hoạt động ngoại
                                    khóa</a></li>
                            <li><a href="<?php echo base_url() . 'programs/tu-hoc-tieng-han'; ?>">Tự học tiếng Hàn</a>
                            </li>
                            <li><a href="<?php echo base_url() . 'news/tin-tuc'; ?>">Tin Tức</a></li>
                            <li><a href="<?php echo base_url() . 'center/issiloo'; ?>">ISSILOO</a></li>
                            <li><a href="<?php echo base_url() . 'center/lien-he'; ?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                <div class="sing-up-button">
                    <a class="toggle hc-nav-trigger hc-nav-1 hc-nav-2 hc-nav-3 hc-nav-4">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<section class="button-bottom navbar fixed-bottom">
    <div id="popUpSearch" class="showSearch">
        <?php echo form_open_multipart('searchForm'); ?>
        <input type="text" name="search" class="form-control search"
               placeholder="Tìm kiếm"/>
        </form>
    </div>
    <div id="popUpDial" class="showDial">
        <?php echo form_open_multipart('dialForm'); ?>
        <input type="text" name="dialName" class="form-control name"
               placeholder="Tên"/>
        <input type="text" name="dialPhone" class="form-control phone"
               placeholder="Số điện thoại"/>
        <input type="submit" class="submit"
               value="Gửi">
        </form>
    </div>
</section>

<main class="main container-fluid">