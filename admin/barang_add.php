<?php
include '../login/db_login.php';
$nama = $db->real_escape_string($_POST['nama_barang']);
$harga = $db->real_escape_string($_POST['harga_barang']);
$stok = $db->real_escape_string($_POST['stok_barang']);
$kategori = $db->real_escape_string($_POST['kategori_barang']);

$query = "INSERT INTO barang (nama_barang, harga_barang, stok_barang, kategori_barang) VALUES ('".$nama."','".$harga."','".$stok."','".$kategori."')"; 
// Execute the query
$result = $db->query($query);
if (!$result) {
    echo '<div class="alert alert-danger alert-dismissible">
                <strong>Error!</strong> Could not query the database<br>' .
        $db->error . '<br>query = ' . $query .
        '</div>';
} else {
    echo '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been added.<br>
                nama: ' . $_POST['nama_barang'] . '<br>
                harga: ' . $_POST['harga_barang'] . '<br>
                stok: ' . $_POST['stok_barang'] . '<br>
                kategori: ' . $_POST['kategori_barang'] . '<br>
                </div>';
}
//close db connection
$db->close();