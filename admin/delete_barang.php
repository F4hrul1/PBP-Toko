<?php

    include '../login/db_login.php';

    if(isset($_GET['iddel'])){
        $delete = mysqli_query($db, "DELETE FROM barang WHERE id_barang = '".$_GET['iddel']."'");
        echo '<script>window.location="barang.php"</script>';
    }