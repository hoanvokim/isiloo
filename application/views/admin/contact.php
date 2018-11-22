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
                    <h1>Quản lý: Danh sách các học sinh đã đăng ký</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="all-album-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên</th>
                                    <th>SĐT</th>
                                    <th>Câu hỏi</th>
                                    <th>Nội dung</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($contacts as $item) { ?>
                                <tr>
                                    <td><?php echo $item->id; ?></td>
                                    <td><?php echo $item->name; ?></td>
                                    <td><a href="callto:<?php echo $item->phone; ?>"> <?php echo $item->phone; ?> </a>
                                    </td>
                                    <td><?php echo $item->subject_question; ?></td>
                                    <td><?php echo $item->content; ?></td>
                                    <td><?php if ($item->status == 0) echo 'Chưa liên lạc'; else echo 'Đã liên lạc'; ?></td>
                                    <td><?php echo $item->created_date; ?></td>
                                    <td><?php echo $item->updated_date; ?></td>
                                    <td><?php if ($item->status == 0) {?>
                                        <a href="<?php echo base_url() . "admin/contact/update/" . $item->id; ?>"
                                           class="btn btn-danger btn-sm"><i
                                                    class="fa fa-close"></i> Đã Liên Lạc</a></td>
                                    <?php }  else {?>
                                        <a  class="btn btn-success btn-sm"><i
                                                    class="fa fa-check"></i></a></td>
                                    <?php }  ?>
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