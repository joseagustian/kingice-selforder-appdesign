<?php
    session_start();
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    include 'connection.php';
    if( isset($_POST["login"])) {
        $userid = $_POST["webuserid"];
        $password = $_POST["webuserpassword"];
        if ($userid == "" and $password ==""){
            $emptyfield = true;
        } else {
        $getDataLogin = "SELECT * FROM tabel_webuser WHERE webuser_id ='$userid' AND webuser_pwd ='$password' ";
        $result = $conn-> query($getDataLogin);
            if ($result->num_rows > 0){
                $_SESSION["login"] = true;
                header("Location: index.php");
                exit;
            } else {
                $failedloginalert = true;
            }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#212529">
    <link rel="icon" href="/kingice/assets/favicon.ico" type="image/ico" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/material-icons/iconfont/material-icons.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/fa-icons/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="/kingice/assets/fa-icons/css/solid.css">
    <script src="/kingice/assets/js/bootstrap.bundle.min.js"></script>
    <title>King Ice - Login</title>
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="d-flex justify-content-center ms-4">
            <div class="d-flex flex-wrap justify-content-center mt-4 ms-3">
                <img src="/kingice/assets/logo.png" alt="King Ice Cafe" style="width: 25%;">
                <div class="col-8 mt-auto ms-3">
                    <p class="logo-font disable-select">King Ice Cafe</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid login-area-background col-sm-3 col-9 position-absolute top-50 start-50 translate-middle">
    
        <form role="form" action="" method="POST" id="loginAreaForm">
            <div class="mt-3 mb-2">
                <label for="webuserid" class="form-label">User ID</label>
                <input type="text" class="form-control form-login-area" name="webuserid" id="webuserid" placeholder="User ID" autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="webuserpassword" class="form-label">Password</label>
                <input type="password" class="form-control form-login-area" name="webuserpassword" id="webuserpassword" placeholder="Password">
            </div>

            <div class="d-flex mb-4 justify-content-end">
                <?php 
                    if (isset($failedloginalert)){
                        echo '<div class="alert alert-danger p-1 me-5 my-auto" role="alert" style="text-align: center; width: 50%">
                        <h6 class="mt-2">Autentikasi Gagal!</h6>
                        </div>';
                    } elseif (isset($emptyfield)){
                        echo '<div class="alert alert-danger p-1 me-5 my-auto" role="alert" style="text-align: center;width: 50%">
                        <h6 class="mt-2">Mohon lengkapi!</h6>
                        </div>';
                    }
                ?>
                <button type="submit" name="login" class="btn btn-success rounded">Masuk<i class="fas fa-sign-in-alt ms-2"></i></button>
            </div>
        </form>

    </div>

    <!--Script-->
    <script src="/kingice/assets/js/jquery-3.5.1.min.js"></script>
</body>
</html>