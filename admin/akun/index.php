<?php 

	include "../config/config.php";

	$sql = mysqli_query($con, "SELECT * FROM tbl_users WHERE id_user='$_SESSION[id]'");
	$data = mysqli_fetch_array($sql);

 ?>
<div class="row">
	<div class="col-lg-4 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="text-center">Informasi Akun</h5>
			</div>
			<div class="card-body text-center">
				<img src="../assets/img/<?= $data['img'] ?>" class="rounded mx-auto d-block"width = "50%">
				<h5 class="mt-3 text-primary text-uppercase"><?= $data['nama_pengguna'] ?></h5>	
				<?php 
					if($_SESSION['lvluser'] == 1) {
						echo "<h5 class='text-primary'>Level User : Super Admin</h5>";								
					} elseif($_SESSION['lvluser'] == 2) {
						echo "<h5 class='text-primary'>Level User : Admin</h5>";
					} 
				?>
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="text-center">Edit Akun</h5>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" name="user" id="user" class="form-control" placeholder="Masukkan Username" value="<?= $data['username'] ?>">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" name="pass" id="pass" class="form-control" placeholder="Masukkan Password">
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
								<label for="file">Unggah Gambar</label>
								<input type="file" name="file" id="file" class="form-control" placeholder="Masukkan File" value="<?= $data['img'] ?>">
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
								<label for="pengguna">Nama Pengguna</label>
								<input type="pengguna" name="pengguna" id="pengguna" class="form-control" placeholder="Masukkan Nama Pengguna" value="<?= $data['nama_pengguna'] ?>">
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<button class="btn btn-primary btn-block" name="submit">Simpan Perubahan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php if($_SESSION['lvluser'] == 1) { ?>
	<div class="col-lg-12 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="text-center">Form Tambah Akun</h5>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="user">Username</label>
								<input type="text" name="user" id="user" class="form-control" placeholder="Masukkan Username">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="pass">Password</label>
								<input type="password" name="pass" id="pass" class="form-control" placeholder="Masukkan Password">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="file">Unggah Gambar</label>
								<input type="file" name="file" id="file" class="form-control" placeholder="Masukkan File">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="lvluser">Level User</label>
								<select name="lvluser" id="lvluser" class="form-control">
									<option value="1">Super Admin</option>
									<option value="2">Admin</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
								<label for="pengguna">Nama Pengguna</label>
								<input type="text" name="pengguna" id="pengguna" class="form-control" placeholder="Masukkan Nama Pengguna">
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<button class="btn btn-primary btn-block" name="tambah">Tambah Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php } ?>
</div>

<?php 

	if(isset($_POST['submit'])) {
		$id = $_SESSION['id'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$pengguna = $_POST['pengguna'];

		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpg', 'jpeg', 'JPG');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		$sql= mysqli_query($con, "SELECT * FROM tbl_users WHERE id_user='$id'");
		$data = mysqli_fetch_array($sql);

			if(!empty($gambar)) {
				if(in_array($ekstensi, $ekstensi_boleh) === true) {
					if($ukuran < 2000000) {
						move_uploaded_file($file_tmp, '../assets/img/'. $gambar);
						$sql = mysqli_query($con, "UPDATE tbl_users SET username='$user', password='$pass', nama_pengguna='$pengguna', img='$gambar' WHERE id_user='$id'");
						echo "<script>alert('Data Berhasil Di ubah!')</script>";
						echo "<script>window.location.href='index.php?page=user'</script>";
					}
				} 
			} else {
				if(!empty($pass)) {
					$gambar = $data['img'];
					$sql = mysqli_query($con, "UPDATE tbl_users SET username='$user', password='".md5($pass)."', nama_pengguna='$pengguna', img='$gambar' WHERE id_user='$id'");
					echo "<script>alert('Data Berhasil Di ubah!')</script>";
					echo "<script>window.location.href='index.php?page=user'</script>";
				} else {
					echo "<script>alert('Password Wajib Diisi!')</script>";
				}
				// var_dump($pass);
			}
	}
 ?>

 <?php 

 	if(isset($_POST['tambah'])) {
		$user = $_POST['user'];
		$pass = md5($_POST['pass']);
		$pengguna = $_POST['pengguna'];
		$lvluser = $_POST['lvluser'];

		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpeg');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_boleh) === true) {
				if($ukuran < 2000000) {
					move_uploaded_file($file_tmp, '../assets/img/'. $gambar);
					$sql = mysqli_query($con, "INSERT INTO tbl_users VALUES ('', '$user', '$pass', '$pengguna', '$gambar', '$lvluser')");

					// var_dump($sql);
					echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
					echo "<script>window.location.href='index.php?page=user'</script>";
				} else {
					echo "<script>alert('Ukuran tidak boleh > 5MB')</script>";
				}
			} else {
				echo "<script>alert('Ekstensi tidak sesuai')</script>";
			}
	}

  ?>