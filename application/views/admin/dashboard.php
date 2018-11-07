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


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Bài Viết</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span> lần xem
                </h4>
                <p class="text-light"><strong>Tiêu đề:</strong> ISSILOO THÔNG BÁO TUYỂN SINH CHƯƠNG TRÌNH DU HỌC NGHỀ HÀN QUỐC </p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">3</span>
                </h4>
                <p class="text-light">Hoạt động ngoại khoá</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Sinh viên kết nối trong tháng 11</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->
    <div class="breadcrumbs" style="margin-bottom: 20px;">
        <div class="col-12">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><i class="fa fa-user"></i> Số lượng sinh viên tư vấn</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4">
        <div class="social-box twitter">
            <i class="fa fa-calendar"> 11 </i>
            <ul>
                <li>
                    <sctrong>
                        <strong>Online: </strong>
                        <span class="count">30</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
                <li>
                    <sctrong>
                        <strong>Offline: </strong>
                        <span class="count">100</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><div class="col-lg-4 col-md-4">
        <div class="social-box twitter">
            <i class="fa fa-calendar"> 10 </i>
            <ul>
                <li>
                    <sctrong>
                        <strong>Online: </strong>
                        <span class="count">20</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
                <li>
                    <sctrong>
                        <strong>Offline: </strong>
                        <span class="count">120</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
    <div class="col-lg-4 col-md-4">
        <div class="social-box twitter">
            <i class="fa fa-calendar"> 9 </i>
            <ul>
                <li>
                    <sctrong>
                        <strong>Online: </strong>
                        <span class="count">30</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
                <li>
                    <sctrong>
                        <strong>Offline: </strong>
                        <span class="count">100</span>
                        <span>Lượt</span>
                    </sctrong>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div>
</div> <!-- .content -->

<!-- Right Panel -->

<?php $this->load->view('admin/ztemplate_footer'); ?>
