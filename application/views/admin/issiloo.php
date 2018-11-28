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
    <?php if (!empty($showmessages)) { ?>
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Cập nhật thành công</span>
            <?php echo $showmessages; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php } ?>
    <!--/.col-->
    <div class="breadcrumbs" style="margin-bottom: 20px;">
        <div class="col-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Cập nhật Trang Giới thiệu về ISSILOO</h1>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_open_multipart('admin-issiloo-update-form'); ?>

    <div class="col-12">
        <div class="card">
            <div class="card-body card-block">
                <div class="card-title">
                    <h3>Nội dung</h3>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-content" class=" form-control-label">Nội dung</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="text-content" name="contenteditor" class="form-control" style="min-height: 400px;"
                                  placeholder="Nhập nội dung..."><?php echo $items->value; ?></textarea>
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
