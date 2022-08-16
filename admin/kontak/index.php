<?php 

	include "../config/config.php";

	$sql = mysqli_query($con, "SELECT * FROM tbl_kontak WHERE id ='$_SESSION[id]'");
	$data = mysqli_fetch_array($sql);

 ?>

<div class="row">
	<div class="col-lg-4 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="text-center">Informasi Kontak</h5>
			</div>
			<div class="card-body text-center">
				<img src="../assets/img/<?= $data['img'] ?>" class="rounded mx-auto d-block"width = "50%">
			</div>
		</div>
	</div>
	<div class="col-lg-8 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5 class="text-center">Edit Kontak</h5>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
							<label for="judul">Judul Kontak</label>
							<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" value="<?= $data['judul'] ?>">
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
							<label for="text">Masukkan Deskripsi Kontak</label>
							<textarea class="form-control" name="deskripsi" cols="30" rows="10"><?= $data['deskripsi'] ?></textarea>
						</div>
							</div>
						</div>
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
								<label for="file">Unggah Gambar</label>
								<input type="file" name="file" id="file" class="form-control" placeholder="Masukkan File" value="<?= $data['img'] ?>">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="no_tlp">Nomer Telepon</label>
								<input type="text" name="no_tlp"  placeholder="Masukkan Nomer Telepon" class="form-control" value="<?= $data['no_tlp'] ?>">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email"  placeholder="Masukkan Email" class="form-control" value="<?= $data['email'] ?>">
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

<?php 

	if(isset($_POST['submit'])) {
		$id = $_GET['id'];
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];
		$no_tlp = $_POST['no_tlp'];
		$email = $_POST['email'];
		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpg');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		$sql= mysqli_query($con, "SELECT * FROM tbl_kontak WHERE id='$id'");
		$data = mysqli_fetch_array($sql);

			if(!empty($gambar)) {
				if(in_array($ekstensi, $ekstensi_boleh) === true) {
					if($ukuran < 2000000) {
						move_uploaded_file($file_tmp, '../assets/file/post/'. $gambar);
						$sql = mysqli_query($con, "UPDATE tbl_kontak SET img='$gambar', judul='$judul', deskripsi='$deskripsi', no_tlp='$no_tlp' WHERE id='$id'");
						echo "<script>alert('Data Berhasil Di ubah!')</script>";
						echo "<script>window.location.href='index.php?page=kontak'</script>";
					}
				} 
			} else {
				$gambar = $data['img'];
				$sql = mysqli_query($con, "UPDATE tbl_kontak SET img='$gambar', judul='$judul', deskripsi='$deskripsi', no_tlp='$no_tlp' WHERE id_post='$id'");
				echo "<script>alert('Data Berhasil Di ubah!')</script>";
				echo "<script>window.location.href='index.php?page=kontak'</script>";
			}
	}

 ?>

