<!DOCTYPE html>
<?php 
  if (session()->get('lang') == "" || session()->get('lang') == "en") {
    $position = "ltr";
    $language = "en";
  }else{
    $language= 'ar';
    $position = "rtl";
  }
?>
<html dir="<?= $position; ?>" lang="<?= $language; ?>">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="TopwinnerKw" />
<meta name="keywords" content="chiropractor, counseling, healthcare, psychiatrist, psychologist, psychology" />
<meta name="author" content="TopwinnerKw" />



<!-- Favicon and Touch Icons -->
<link href="<?= base_url('public/front_assets/images/fevi1.png'); ?>" rel="shortcut icon" type="image/png">
<link href="<?= base_url('public/front_assets/images/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
<link href="<?= base_url('public/front_assets/images/apple-touch-icon-72x72.png'); ?>" rel="apple-touch-icon" sizes="72x72">
<link href="<?= base_url('public/front_assets/images/apple-touch-icon-114x114.png'); ?>" rel="apple-touch-icon" sizes="114x114">
<link href="<?= base_url('public/front_assets/images/apple-touch-icon-144x144.png'); ?>" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?= base_url('public/front_assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('public/front_assets/css/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('public/front_assets/css/animate.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('public/front_assets/css/css-plugin-collections.css'); ?>" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?= base_url('public/front_assets/css/menuzord-skins/menuzord-rounded-boxed.css'); ?>" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?= base_url('public/front_assets/css/style-main.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?= base_url('public/front_assets/css/preloader.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?= base_url('public/front_assets/css/custom-bootstrap-margin-padding.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?= base_url('public/front_assets/css/responsive.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="<?= base_url('public/front_assets/css/colors/theme-skin-green.css'); ?>" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?= base_url('public/front_assets/js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?= base_url('public/front_assets/js/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('public/front_assets/js/bootstrap.min.js'); ?>"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?= base_url('public/front_assets/js/jquery-plugin-collection.js'); ?>"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>









