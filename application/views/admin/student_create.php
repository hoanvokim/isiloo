<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 22.08.18
 * Time: 16:44
 */
?>

<?php $this->load->view('admin/ztemplate_header'); ?>

<div class="content mt-3">

    <!--/.col-->
    <div class="breadcrumbs" style="margin-bottom: 20px;">
        <div class="col-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Thêm học viên mới</h1>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_open_multipart('admin-student-create-form'); ?>

    <div class="col-12">
        <div class="card">
            <div class="card-body card-block">
                <div class="card-title">
                    <h3><?php echo $title; ?> </h3>
                </div>
                <hr>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-name" class=" form-control-label">Tên</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-name" name="name" placeholder="Tiêu đề"
                                                        class="form-control"
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-img" class=" form-control-label">Hình ảnh</label></div>
                    <div class="col-12 col-md-9">
                        <input type='file' id="text-img" name='thumbnail' size='20'/>
                        <br/>
                        <i>Lưu ý: Hình ảnh size chuẩn: 800 * 600px</i>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-img" class=" form-control-label">Hình ảnh popup</label></div>
                    <div class="col-12 col-md-9">
                        <input type='file' id="text-img_pop" name='thumbnail_pop' size='20'/>
                        <br/>
                        <i>Lưu ý: Hình ảnh size chuẩn: 800 * 600px</i>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-status" class=" form-control-label">Đang học tại</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-status" name="status" placeholder="Trạng thái"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-star" class=" form-control-label">Điểm đánh giá</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-star" name="star"
                                                        placeholder="Trạng thái"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div><div class="row form-group">
                    <div class="col col-md-3"><label for="text-star" class=" form-control-label">Thành tích</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-star" name="prize"
                                                        placeholder="Trạng thái"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-summary" class=" form-control-label">Tóm tắt</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="text-summary" name="summaryeditor" class="form-control" style="min-height: 150px;"
                                  placeholder="Nhập nội dung rút gọn..."></textarea>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-content" class=" form-control-label">Nội dung</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="text-content" name="contenteditor" class="form-control" style="min-height: 400px;"
                                  placeholder="Nhập nội dung..."></textarea>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" name="save" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> Lưu
                </button>
                <button type="submit" name="reset" class="btn btn-warning btn-sm"
                        onclick="return confirm('Bạn muốn khôi phục phải không?');">
                    <i class="fa fa-refresh"></i> Khôi phục
                </button>
                <button type="submit" name="cancel" class="btn btn-danger btn-sm"
                        onclick="return confirm('Bạn muốn hủy phải không?');">
                    <i class="fa fa-minus"></i> Hủy
                </button>
            </div>
        </div>
    </div>
    </form>
</div> <!-- .content -->

<!-- Right Panel -->

<?php $this->load->view('admin/ztemplate_footer'); ?>
