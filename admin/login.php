<?php 

  include "../config/config.php";

   if(isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $sql = mysqli_query($con, "SELECT * FROM tbl_users WHERE username='$user' AND password='$pass'");

    // Ambil Data Lv User
    $data = mysqli_fetch_array($sql);
    
    // Ambil Data True or False
    $cek = mysqli_num_rows($sql);

    // var_dump($cek);

    if($cek > 0) {
      session_start();

      // Passing Data
      $_SESSION['id'] = $data['id_user'];
      $_SESSION['user'] = $data['username'];
      $_SESSION['pengguna'] = $data['nama_pengguna'];
      $_SESSION['lvluser'] = $data['id_lvuser'];
      
      header("location:index.php?page=home");
    } else {
      echo "<script>alert('Maaf Username atau Password Salah')</script>";
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LogIn Dashboard - Desa Susukan 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/css/login/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/css/login/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/login/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>LogIn</b></a>
    </div>
    <div class="card-body">
    <div class="text-center mb-4 mt-4">
    <img src="../assets/img/susukan2.png" width="70" height="64">
    </div>
      <p class="login-box-msg">Desa Susukan II</p>
      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <!-- <span class="fas fa-envelope"></span> -->
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/js/login/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/js/login/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/login/adminlte.min.js"></script>
</body>
</html>