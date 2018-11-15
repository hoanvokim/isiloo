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
                    <h1>Thêm bài viết mới</h1>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_open_multipart('admin-category-update-form'); ?>
    <input type="hidden" id="hide" name="student_id" value="<?php echo $student_id; ?>">

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
                                                        class="form-control" value="<?php echo $name; ?>">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-img" class=" form-control-label">Hình ảnh</label></div>
                    <div class="col-12 col-md-9">
                        <?php if (!empty($img_src)) { ?>
                            <input type="hidden" id="hide" name="img_src" value="<?php echo $img_src; ?>">
                            <img src="<?php echo base_url() . $img_src; ?> " width="600px;"/>
                            <br/>
                            <br/>
                            <button type="submit" class="btn btn-danger btn-xs" name="remove-current"><i
                                    class="fa fa-close"></i> Xoá
                            </button>
                        <?php } else { ?>
                            <input type='file' id="text-img" name='thumbnail' size='20'/>
                            <br/>
                            <i>Lưu ý: Hình ảnh size chuẩn: 800 * 600px</i>
                        <?php } ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-img" class=" form-control-label">Hình ảnh popup</label></div>
                    <div class="col-12 col-md-9">
                        <?php if (!empty($img_src_pop)) { ?>
                            <input type="hidden" id="hide" name="img_src_pop" value="<?php echo $img_src_pop; ?>">
                            <img src="<?php echo base_url() . $img_src_pop; ?> " width="600px;"/>
                            <br/>
                            <br/>
                            <button type="submit" class="btn btn-danger btn-xs" name="remove-current-pop"><i
                                    class="fa fa-close"></i> Xoá
                            </button>
                        <?php } else { ?>
                            <input type='file' id="text-img_pop" name='thumbnail_pop' size='20'/>
                            <br/>
                            <i>Lưu ý: Hình ảnh size chuẩn: 800 * 600px</i>
                        <?php } ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-status" class=" form-control-label">Trạng thái</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-status" name="status" placeholder="Trạng thái"
                                                        class="form-control" value="<?php echo $status; ?>">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-star" class=" form-control-label">Điểm đánh giá</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-star" name="star"
                                                        placeholder="Trạng thái"
                                                        class="form-control" value="<?php echo $star; ?>">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div><div class="row form-group">
                    <div class="col col-md-3"><label for="text-star" class=" form-control-label">Thành tích</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-star" name="star"
                                                        placeholder="Trạng thái"
                                                        class="form-control" value="<?php echo $star; ?>">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-summary" class=" form-control-label">Tóm tắt</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="text-summary" name="summaryeditor" class="form-control" style="min-height: 150px;"
                                  placeholder="Nhập nội dung rút gọn..."><?php echo $summary; ?></textarea>
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-content" class=" form-control-label">Nội dung</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="text-content" name="contenteditor" class="form-control" style="min-height: 400px;"
                                  placeholder="Nhập nội dung..."><?php echo $content; ?></textarea>
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
