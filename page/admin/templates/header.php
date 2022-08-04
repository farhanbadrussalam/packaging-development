<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../../../style/style-idsup11.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <style>
        img:hover {
            transform: scale(1.1);
            /* 110% zoom hover, sesuaikan dgn kebutuhan... */
        }
    </style>


    <!-- Bootstrap CSS -->
    <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <title>PACKAGING DEVELOPMENT - <?php echo strtoupper($_SESSION['level']); ?></title>
</head>

<body>
    <?php
    include "navbar.php";
    include("../../../system/koneksi.php");
    ?>