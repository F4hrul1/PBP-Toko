<?php

session_start();
include '../login/db_login.php';
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
        <link href="css/styles.css" rel="stylesheet" />
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
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
            <p><a type="button" class="btn btn-success button-add" href="add_barang.php">(+) Tambah Barang</a></p>
            <table class="table table-bordered mb-auto text-center">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Barang</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent"></div>
                            <tbody>
                        <?php
                            $no = 1;
                            $barang = mysqli_query($db, "SELECT * FROM barang ORDER BY id_barang DESC");
                            while($row = mysqli_fetch_array($barang)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama_barang']?></td>
                            <td><img src="../img/<?php echo $row['gambar_barang']?>" width="100px"></td>
                            <td><?php echo $row['harga_barang']?></td>
                            <td><?php echo $row['stok_barang']?></td>
                            <td><?php echo $row['kategori_barang']?></td>
                            <td>
                                <a type="button" class="btn btn-warning button-edit" href="edit_barang.php?idedit=<?php echo $row['id_barang']?>">Edit</a> 
                                <a type="button" class="btn btn-danger button-delete" href="delete_barang.php?iddel=<?php echo $row['id_barang']?>" onclick="return confirm('Apakah data yang ingin di hapus sudah benar?')">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </div>
        </section>