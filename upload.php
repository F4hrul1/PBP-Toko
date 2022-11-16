<?php
require_once("db_login.php");
?>
<form action="" method="POST" enctype=" multipart/form-data">
<b>file upload</b> <input type="file" name="NamaFile">
<input type="submit" name="proses" value="Upload">
</form>
<?php
if(isset($_POST['proses'])){
    $direktori="berkas/";
    $file_name= $_FILES['NamaFile']['name'];
    move_uploaded_file($_FILES['NamaFile']['tmp_name'],$direktori.$file_name);
    mysqli_query($db, "insert into dokumen set file='$file_name'");
    echo '<b>berhasil</b>';
    }
    ?>