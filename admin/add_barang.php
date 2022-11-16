<?php

session_start();
include '../login/db_login.php';
if (isset($_POST["submit"])){
    $valid = TRUE; //flag variabel
    $nama = test_input($_POST["nama_barang"]);
    if (empty($nama)){
        $error_nama = "Nama barang harus diisi";
        $valid = FALSE;
    }

    $harga = test_input($_POST["harga_barang"]);
    if (empty($harga)){
        $error_harga = "Harga barang harus diisi";
        $valid = FALSE;
    }

    $stok = $_POST["stok_barang"];
    if (empty($stok) || $stok == 'none'){
        $error_stok = "stok barang harus disi";
        $valid = FALSE;
    }

    $kategori = test_input($_POST["kategori_barang"]);
    if (empty($kategori)){
        $error_kategori = "Harga barang harus diisi";
        $valid = FALSE;
    }
}
    
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

    <div class="content">
        <div class="container mt-3">
            <div class="card mt-5">
                <div class="card-header mt-3">Tambah Barang</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php if (isset($nama)) echo $nama;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
                        </div>

                        <div class="form-group">
                            <label for="harga_barang">Harga:</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?php if (isset($harga)) echo $harga;?>">
                            <div class="text-danger"><?php if (isset($error_harga)) echo $error_harga;?></div>
                        </div>

                        <div class="form-group">
                            <label for="stok_barang">Stok:</label>
                            <input type="text" class="form-control" id="stok_barang" name="stok_barang" value="<?php if (isset($stok)) echo $stok;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_stok)) echo $error_stok;?></div>
                        </div>
                        <div class="form-group">
                            <label for="kategori_barang">Kategori Barang:</label>
                            <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" value="<?php if (isset($kategori)) echo $kategori;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_kategori)) echo $error_kategori;?></div>
                        </div>
                        <br>
                        <button type="button" onclick="add_barang()" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <a href="barang.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
                <div id="demo"></div>
            </div>
        </div>
    </div>
    
    <script src="./js/ajax.js"></script>
</body>
</html>