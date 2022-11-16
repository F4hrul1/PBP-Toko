<?php

session_start();
include 'db_login.php';

// $email = $_POST['email'];
// $password = $_POST['password'];
// $query = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND password='$password'"); 
// $countdata = mysqli_num_rows($query);
//$data = mysqli_fetch_array($query);
?>

<?php
if(isset($_POST['loginbtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND password='$password'"); 
    $countdata = mysqli_num_rows($query);
    if($countdata > 0){ 
        $data = mysqli_fetch_assoc($query);
        //$_SESSION['email'] = $email;
        // $_SESSION['login'] = true;
        //echo '<script>window.location="../Mahasiswa/dash_mhs.php"</script>';      
        if($data['level']=="admin"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard operator
            header("location:../admin/index_admin.php");
    
        // cek jika user login sebagai pegawai
        }else if($data['level']=="pembeli"){
            // buat session login dan email
            $_SESSION['email'] = $email;
            $_SESSION['level'] = "pembeli";
            // alihkan ke halaman dashboard pegawai
            header("location:../pembeli/index_pembeli.php");
        }
    }else{
        header("location:login.php?pesan=gagal");
        exit();
    }
}else{
    header("location:login.php");
}
?>