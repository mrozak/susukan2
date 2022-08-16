<?php 

  include "../config/config.php";

  $sql_post = mysqli_query($con, "SELECT * FROM tbl_posts WHERE author='$_SESSION[pengguna]'");
  $data_post = mysqli_num_rows($sql_post);

  $sql_user = mysqli_query($con, "SELECT * FROM tbl_users");
  $data_user = mysqli_num_rows($sql_user);

  $sql_galeri = mysqli_query($con, "SELECT * FROM tbl_gallery");
  $data_galeri = mysqli_num_rows($sql_galeri);
 ?>
<?php if($_SESSION['lvluser'] == 1) { ?>
<div class="row">
    <div class="col-lg-4">
      <div class="card card-primary">
        <div class="card-header text-center">
          <p><i class="fas fa-user"></i>&nbsp;&nbsp;Jumlah Semua Postingan</p>
        </div>
        <div class="card-body text-center">
          <h3><?= $data_post; ?></h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-primary">
        <div class="card-header text-center">
          <p><i class="fas fa-user"></i>&nbsp;&nbsp;Jumlah User</p>
        </div>
        <div class="card-body text-center">
          <h3><?= $data_user; ?></h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-primary">
        <div class="card-header text-center">
          <p><i class="fas fa-user"></i>&nbsp;&nbsp;Jumlah Foto Galeri</p>
        </div>
        <div class="card-body text-center">
          <h3><?= $data_galeri; ?></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header text-center">
        <h5>Selamat Datang <?= $_SESSION['user']; ?>!</h5>
      </div>
      <!-- <div class="card-body">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus eos quia voluptates, provident nemo dicta facilis quae doloremque fuga voluptatum.
        </p>
      </div> -->
    </div>
<?php } else { ?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header text-center">
        <h5>Selamat Datang <?= $_SESSION['user']; ?>!</h5>
      </div>
      <div class="card-body">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus eos quia voluptates, provident nemo dicta facilis quae doloremque fuga voluptatum.
        </p>
      </div>
    </div>
  <div class="row">
     <div class="col-lg-3">
      <div class="card card-primary">
        <div class="card-header text-center">
          <p><i class="fas fa-user"></i>&nbsp;&nbsp;Jumlah Postingan Kamu</p>
        </div>
        <div class="card-body text-center">
          <h3><?= $data_post; ?></h3>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
  <!-- /.row -->
</div>

<!-- New Row -->

  </div>