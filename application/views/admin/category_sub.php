<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 22.08.18
 * Time: 16:44
 */
?>

<?php $this->load->view('admin/ztemplate_header'); ?>

<link rel="stylesheet"
      href="<?php echo base_url(); ?>webresources_admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">

<div class="content mt-3">

    <!--/.col-->
    <div class="breadcrumbs" style="margin-bottom: 20px;">
        <div class="col-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Quản lý Phân nhóm của: <?php echo $parent_category->name; ?> </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                            <a href="<?php echo base_url() . "admin/category/create/". $parent_category->id ?>"
                               class="btn btn-primary btn-sm pull-right"
                            ><i class="fa fa-plus"></i> Thêm phân nhóm</a>
                        </div>
                        <div class="card-body">
                            <table id="all-category-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tiêu đề</th>
                                    <th>Đường link</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $item) { ?>
                                    <tr>
                                        <td><?php echo $item->id; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . "admin/category/update/" . $item->id; ?>"> <?php echo $item->name; ?> </a>
                                        </td>
                                        <td><?php echo $item->slug; ?></td>
                                        <td><?php echo $item->created_date; ?></td>
                                        <td><?php echo $item->updated_date; ?></td>
                                        <td><a href="<?php echo base_url() . "news/" . $item->slug; ?>"
                                               class="btn btn-success btn-sm"><i
                                                    class="fa fa-eye"></i> Xem hiển thị</a>
                                            <a href="<?php echo base_url() . "admin/category/delete/" . $item->id; ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Bạn có muốn xoá không?');"><i
                                                    class="fa fa-close"></i> Xoá</a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div> <!-- .content -->

<!-- Right Panel -->

<?php $this->load->view('admin/ztemplate_footer'); ?>


<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/lib/data-table/datatables-init.js"></script>