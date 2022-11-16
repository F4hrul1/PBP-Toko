<?php
    session_start();
    require_once("db_login.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <title>Document</title>
</head>
<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 300px;;  
        box-sizing: border-box;
        border-radius: 30px;
    }
</style>
<body>
    <div class="bg-image" style="background-image: url('../img/imglogin.jpg'); height: 100vh; background-repeat: no-repeat; background-size: 1920px 1080px;"> 
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow" style="background-color:white;">
        <div ><h2 class="text-center" style="text-align-center"> Login </h2></div>
            <form action="cek_login.php" method="post">
                <div>
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div>
                    <button class="btn btn-primary form-control mt-3" type="submit" 
                    name="loginbtn">Login</button>
                </div>
            </form>
        </div>
            ?>
        </div>
    </div>
</body>
</html>
