<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tokel</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Tokel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index_admin.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="barang.php">Barang</a></li>
                    </ul>
                    <form class="d-flex">
                        <a href="../login/logout.php " class="link-light  text-decoration-none btn btn-danger form-control mt-1">Logout</a>
                    </form>
                </div>
            </div>
        </nav>
        <header class="bg-dark py-5 bg-image" style="background-image: url('../img/bgtk.jpg') ; background-size: 665px 280px;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tentang Tokel</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Toko Elektronik</p>
                </div>
            </div>
        </header>
        <div class="mt-2">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-justify text-black">
                    <p class="lead fw-normal text-black-50 mb-0">Tokel adalah toko yang menyediakan berbagai elektronik</p>
                    <p class="lead fw-normal text-black-50 mb-0"> udah itu aja</p>
                </div>
            </div>
        </div>