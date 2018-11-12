<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | ISSILOO Administration</title>
    <meta name="description" content="Dashboard | ISSILOO Administration">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>webresources_admin/assets/scss/style.css">
    <link href="<?php echo base_url(); ?>webresources_admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Include Editor style. -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css' rel='stylesheet' type='text/css' />


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url() . 'admin'; ?>"><img
                        src="<?php echo base_url(); ?>webresources/img/issi/logoWhite.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="<?php echo base_url() . 'admin'; ?>"><img
                        src="<?php echo base_url(); ?>webresources/img/issi/logoWhite.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url() . 'admin'; ?>"> <i
                                class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li>
                    <a href=#"> <i class="menu-icon fa fa-phone"></i>Liên hệ</a>
                </li>
                <h3 class="menu-title">Quản lý nội dung</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon ti-layout-width-default"></i>Bài viết</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li class="active"><i class="fa fa-puzzle-piece"></i><a href="<?php echo base_url() . 'admin/news/create'; ?>">Viết bài mới</a>
                        </li>
                        <li><i class="fa fa-id-badge"></i><a href="<?php echo base_url() . 'admin/news'; ?>">Tìm và cập nhật</a></li>
                        <li><i class="fa fa-bars"></i><a href="<?php echo base_url() . 'admin/news/empty'; ?>">Các bài viết tự do</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon ti-layout-width-default"></i>Danh mục</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li class="active"><i class="fa fa-puzzle-piece"></i><a href="<?php echo base_url() . 'admin/category/sub/'. TUHOCTIENGHAN; ?>">Thêm "Tự học
                                Tiếng Hàn"</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="<?php echo base_url() . 'admin/category/sub/'. DAOTAOHANNGU; ?>">Thêm "Đào tạo Hàn ngữ"</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="<?php echo base_url() . 'admin/category' ?>">Tìm và cập nhật</a></li>
                        <li><i class="fa fa-bars"></i><a href="<?php echo base_url() . 'admin/category/empty' ?>">Các danh mục trống</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon ti-layout-width-default"></i>Hoạt động ngoại khoá</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li class="active"><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Thêm hoạt
                                động</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Tìm và cập nhật</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown show">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon ti-layout-width-default"></i>Các trường đại học</a>
                    <ul class="sub-menu children dropdown-menu show">
                        <li class="active"><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Thêm mới</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Tìm và cập nhật</a></li>
                        <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Các trường chưa có bài viết</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Quản lý thông tin</h3><!-- /.menu-title -->
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Thông tin trên website</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Nhân viên ISSILOO</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Sinh viên</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Gallery</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Câu hỏi thắc mắc</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa fa-forward"></i>Tag tìm kiếm</a>
                </li>


                <h3 class="menu-title">Users</h3><!-- /.menu-title -->
                <li>
                    <a href="<?php echo base_url() . 'logout'; ?>"> <i class="menu-icon fa fa-sign-in"></i>Đăng ký</a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'logout'; ?>"> <i class="menu-icon fa fa-paper-plane"></i>Quên mật
                        khẩu</a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'logout'; ?>"> <i class="menu-icon ti-power-off"></i>Đăng xuất</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->


<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header-->