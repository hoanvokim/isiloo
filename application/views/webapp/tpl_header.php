<?php
/**
 * Created by IntelliJ IDEA.
 * User: hvo
 * Date: 28.08.18
 * Time: 11:02
 */
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons:200,200i,300,300i,400">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Cabin:200,200i,300,300i,400|Montserrat:200,200i,300,300i,400|Raleway:200,200i,300,300i,400">

        <?php
        if ($active_page == 'news_content') { ?>
            <!--    Facebook sharecode-->
            <meta property="og:site_name" content="issiloo.edu.vn"/>
            <meta property="og:type" content="article"/>
            <meta property="og:url"
                  content="<?php echo base_url().'news/news_content/'.$news->slug; ?>"/>
            <meta property="og:title"
                  content="<?php echo $news->title_header; ?>"/>
            <meta property="og:keyword"
                  content="<?php echo $news->keyword_header; ?>"/>
            <meta property="og:description"
                  content="<?php echo $news->description_header; ?>"/>
            <meta property="og:image" content="<?php echo base_url() . $news->img_square; ?>"/>
            <meta property="og:image:width" content="1580"/>
            <meta property="og:image:height" content="927"/>
            <?php
        }
        ?>

        <!-- Title -->
        <title>ISSILOO | Homepage</title>

        <!-- Favicon -->
        <!--    <link rel="icon" href="--><?php //echo base_url(); ?><!--webresources/img/core-img/favicon.ico">-->
        <!-- Core Stylesheet -->
        <link href="<?php echo base_url(); ?>webresources/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>webresources/style.css" rel="stylesheet">
        <!-- Responsive CSS -->
        <link href="<?php echo base_url(); ?>webresources/css/responsive.css" rel="stylesheet">
        <!-- Animate CSS -->
        <link href="<?php echo base_url(); ?>webresources/css/animate.css" rel="stylesheet">
        <!-- Hover CSS -->
        <link href="<?php echo base_url(); ?>webresources/css/hover-min.css" rel="stylesheet">
        <!-- Icomoon Icon Fonts-->
        <link href="<?php echo base_url(); ?>webresources/css/icomoon.css" rel="stylesheet">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>webresources/css/magnific-popup.css">

        <!-- Multi-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>webresources/plugin/multi-level-sidebar/demo/demo.css">

    </head>


<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="725137910904066">
</div>
<!-- Preloader Start -->
<div id="preloader">
    <div class="colorlib-load"></div>
</div>

<div id="callDial" class="btn-goi-dien wow zoomIn" data-wow-delay="1s">
    <img src="<?php echo base_url(); ?>webresources/img/issi/iconGiaoDien.png">
</div>
<div id="callSearch" class="btn-tim-kiem wow zoomIn" data-wow-delay="1s">
    <img src="<?php echo base_url(); ?>webresources/img/issi/iconTimKiem.png">
</div>

<?php $this->load->view('webapp/tpl_navigation'); ?>