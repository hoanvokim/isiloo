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
                    <h1>Cập nhật: <?php if (!empty($title)) echo $title; ?></h1>
                </div>
            </div>
        </div>
    </div>

    <?php echo form_open_multipart('admin-album-update-form'); ?>

    <input type="hidden" id="hide" name="albumId" value="<?php echo $albumId; ?>">

    <div class="col-12">
        <div class="card">
            <div class="card-body card-block">
                <div class="card-title">
                    <h3>Thông tin bài </h3>
                </div>
                <hr>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-title" class=" form-control-label">Tiêu đề</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-title" name="title" placeholder="Tiêu đề"
                                                        class="form-control" value="<?php echo $title; ?>">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-slug" class=" form-control-label">Link đường dẫn</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-slug" name="slug"
                                                        value="<?php echo $slug; ?>"
                                                        placeholder="Link đường dẫn"
                                                        class="form-control">
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


                <div class="card-title">
                    <h3>Cấu hình SEO</h3>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-title-seo" class=" form-control-label">Tiêu đề trên
                            Header</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-title-seo" name="title_header"
                                                        value="<?php echo $title_header; ?>"
                                                        placeholder="Tiêu đề trên Header"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-description-seo" class=" form-control-label">Đặc tả trên
                            Header</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-description-seo" name="description_header"
                                                        placeholder="Đặc tả trên Header"
                                                        value="<?php echo $description_header; ?>"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-keyword-seo" class=" form-control-label">Từ khóa trên
                            Header</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-keyword-seo" name="keyword_header"
                                                        placeholder="Từ khóa trên Header"
                                                        value="<?php echo $keyword_header; ?>"
                                                        class="form-control">
                        <small class="form-text text-muted">This is a help text</small>
                    </div>
                </div>

                <div class="card-title">
                    <h3>Nội dung</h3>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-img" class=" form-control-label">Hình ảnh trong bài
                            viết</label></div>
                    <div class="col-12 col-md-9">
                        <?php foreach ($images as $item) { ?>
                            <img src="<?php echo base_url() . $item->img; ?> " width="200px;"/>
                            <a href="<?php echo base_url() . 'admin/albums/remove_image/' . $albumId . '/' . $item->id; ?>"
                               class="btn btn-danger btn-xs" name="remove-current"><i
                                        class="fa fa-close"></i> Xoá
                            </a>
                        <?php } ?>
                        <br/>
                        <span>Thêm hình ảnh</span>
                        <input type='file' name='files[]' multiple id="text-img-content" size='20'/>
                        <br/>
                        <i>Lưu ý: Hình ảnh size chuẩn: 800 * 600px </i>
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
