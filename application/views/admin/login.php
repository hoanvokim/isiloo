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
    <title>Login | ISSILOO Administration</title>
    <meta name="description" content="Login | ISSILOO Administration">
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>">
                    <img class="align-content" src="<?php echo base_url(); ?>webresources/img/issi/logoWhite.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <?php echo form_open_multipart('loginForm'); ?>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>webresources_admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>webresources_admin/assets/js/main.js"></script>
</body>
</html>
