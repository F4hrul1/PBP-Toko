<?php
session_start();
include '../login/db_login.php';

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = $_GET['idedit'];

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    //execute the query
    $result = $db->query(" SELECT * FROM barang WHERE id_barang=" .$id. " ");
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $nama = $row->nama_barang;
            $harga = $row->harga_barang;
            $stok = $row->stok_barang;
            $kategori = $row->kategori_barang;
            
        }
    }
}else{
    $valid = TRUE; //flag validasi
    if (isset($_POST["submit"])){
        $nama = test_input($_POST["nama_barang"]);
        if ($nama == ''){
            $error_nama = "Nama barang harus diisi";
            $valid = FALSE;
        }

        $harga = test_input($_POST["harga_barang"]);
        if ($harga == ''){
            $error_harga = "Harga barang harus diisi";
            $valid = FALSE;
        }

        $stok = $_POST["stok_barang"];
        if ($stok == ''){
            $error_stok = "stok barang harus disi";
            $valid = FALSE;
        }

        $kategori = test_input($_POST["kategori_barang"]);
        if ($kategori == ''){
            $error_kategori = "Kategori barang harus diisi";
            $valid = FALSE;
        }

        //update data into database
        if ($valid){
            //escape inputs data
            $harga = $db->real_escape_string($harga); //menghapus tanda petik
            //asign a query
            $query = " UPDATE barang SET nama_barang='".$nama."', harga_barang='".$harga."', stok_barang='".$stok."' , kategori_barang='".$kategori."' WHERE id_barang=".$id." ";
            //execute the query
            $result = $db->query($query);
            if (!$result){
                die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
            } else{
                //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
                $db->close();
                header('Location: barang.php');
            }
        }
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
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="css/edit.css"/>   
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
                        <button class="btn btn-danger" type="submit"><a href="../login/logout.php " class="link-light  text-decoration-none">Logout</a>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="card-header  mt-5">Edit Barang</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?idedit=' .$id;?>">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $nama;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
                        </div>
                        <div class="form-group">
                            <label for="harga_barang">Harga:</label>
                            <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo $harga;?>">
                            <div class="text-danger"><?php if (isset($error_harga)) echo $error_harga;?></div>
                        </div>
                        <div class="form-group">
                            <label for="stok_barang">Stok:</label>
                            <input type="text" class="form-control" id="stok_barang" name="stok_barang" value="<?php echo $stok;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_stok)) echo $error_stok;?></div>
                        </div>
                        <div class="form-group">
                            <label for="kategori_barang">Kategori Barang:</label>
                            <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" value="<?php echo $kategori;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_kategori)) echo $error_kategori;?></div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <a href="index_admin.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>