<?php
ob_start();
session_start();
include '../function.php';

$ayarsor = $db->prepare("SELECT * FROM ayar_tbl WHERE ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor = $db->prepare("SELECT * FROM admin WHERE id=:user_id");
$kullanicisor->execute(array(
    'user_id' => $_SESSION['id']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['id'])) {

    header('location:login.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>QR-Menu Admin</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/bundles/flag-icon-css/css/flag-icon.min.css">
    <!-- dropzone css -->
    <link rel="stylesheet" href="assets/dropzone/dist/dropzone.css">
    <link rel="stylesheet" href="assets/dropzone/dist/basic.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Custom style CSS -->
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>


    <script src="assets/js/qrcode.min.js"></script>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                                class="fas fa-bars"></i></a></li>
                    <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
