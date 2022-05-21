<?php
require 'connect.php';
session_start();

//memproses tombol login
if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM login where user='$user' and pass='$pass'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows ($result);

    if($num==1){
        $_SESSION['log'] = 'True';
        header('location:http://localhost/Petshop/index.php');
    }else{
        header('location:http://localhost/Petshop/login.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <p class="fs-1 mt-5 text-center" style="color:#FFFFFF">SELAMAT DATANG DI CHI'S INVENTORY</p>
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="user" id="inputUser" type="user" placeholder="Username" />
                                                <label for="inputUser">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="pass" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-md-end mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
