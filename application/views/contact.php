<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 18.10.18
 * Time: 09:58
 */
?>
<?php $this->load->view('webapp/tpl_header'); ?>
    <section class="contact-area clearfix section_padding_100_70">
        <div class="container">
            <div class="row wow zoomIn breadcrumb-area" data-wow-delay="0.2s">
                <a href="<?php echo base_url(); ?>"><h5>Trang chủ / </h5></a>
                <h5 class="current"> Liên Hệ</h5>
            </div>
            <div class="row">
                <div class="col-12 text-left">
                    <h1 class="page-name">Liên Hệ</h1>
                </div>
            </div>
            <div class="row has-bg">
                <div class="col-md-6 col-12">
                    <!-- Form Start -->
                    <?php echo form_open_multipart('registerForm'); ?>
                    <div class="row" style="width: 100%">
                        <div class="col-12">
                            <h3 class="page-header">Đăng kí</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-12">
                            <input name="name" class="form-control form-component"
                                   placeholder="Họ và tên" required>
                        </div>
                        <div class="col-md-4 col-12">
                            <input name="phone" class="form-control form-component"
                                   placeholder="Điện thoại" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <select name="subjectId" class="form-control form-component">
                                <option value="">Chương trình mong muốn</option>
                                <?php foreach ($subjects as $item) { ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea name="contenteditor" class="form-component">Nguyện vọng</textarea>
                        </div>
                    </div>
                    <div class="row text-left" style="margin-top: -20px;">
                        <div class="col-12">
                            <button class="button-view text-uppercase" type="submit" style="width: 100px;">
                                Đăng kí
                            </button>
                        </div>
                    </div>
                    </form>
                    <!-- Form End -->
                </div>
                <div class="col-md-6 col-12 text-left">
                    <h3 class="page-header">Du Học Hàn Quốc ISSILOO</h3>
                    <h5>Cùng bạn chắp cánh giấc mơ du học Hàn Quốc</h5>

                    <div class="row">
                        <div class="col-12">
                            <div class="contact-icon">
                                <a href="https://www.facebook.com/issiloo.edu.vn/">
                                    <img src="<?php echo base_url(); ?>webresources/img/issi/iconFacebook.png">
                                </a>
                                <a href="https://www.youtube.com/channel/UCxSwrePN-rYK7AUtoKi2gfg?view_as=subscriber">
                                    <img src="<?php echo base_url(); ?>webresources/img/issi/iconYoutube.png"></a>
                                <a href="http://zaloapp.com/qr/p/fwc7rp42pe1x">
                                    <img src="<?php echo base_url(); ?>webresources/img/issi/iconZalo.png"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span style="font-weight: 700;">Hotline: </span> <a href="callto:0901 879 877"><span>0901 879 877</span></a>
                        </div>
                        <div class="col-6">
                            <span style="font-weight: 700;">Web: </span> <a href="www.issiloo.edu.vn"><span>www.issiloo.edu.vn</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <span style="font-weight: 700;">Mail: </span> <a
                                    href="mailto: kr-info@issiloo.edu.vn"><span>kr-info@issiloo.edu.vn</span></a>
                        </div>
                        <div class="col-6">
                            <span style="font-weight: 700;">FB: </span> <a href="www.issiloo.edu.vn"><span>Du học Hàn Quốc ISSILOO</span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <span style="font-weight: 700;">Địa chỉ: </span> <a href="www.issiloo.edu.vn"><span>502 Đỗ Xuân Hợp, P. Phước Bình, Quận 9, Tp. Hồ Chí Minh. <br/>Lầu 5 (Tòa nhà mới) Trường CĐ Kỹ Nghệ II</span></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8660891691675!2d106.76952956544376!3d10.821558392290891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526f88d44537d%3A0x582a5580cd585a9f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEvhu7kgbmdo4buHIElJ!5e0!3m2!1sen!2s!4v1539845265163"
                            width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('webapp/tpl_footer'); ?>