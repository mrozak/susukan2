<?php 

	$sql = mysqli_query($con, "SELECT * FROM tbl_peraturan");
	$data = mysqli_fetch_array($sql);

 ?>
	<div class="col-lg col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5>Form <?= $_GET['page'] ?></h5>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
					<div class="col-lg-12 mt-3">
							<label for="text">Masukkan Judul</label>
							<input type="text" name="judul" class="form-control" value="" placeholder="Masukkan Judul">
						</div>
						<div class="col-lg-12 mt-3">
							<label for="file">Masukkan File PDF</label>
							<input type="file" name="file" class="form-control" value="<?= $data['pdf'] ?>">
							<p class="text-danger mt-2" style="font-size: 12px;">File harus format : pdf. Ukuran max 5MB</p>
						</div>
						<div class="col-lg-6 mt-3">
							<label for="file">Status</label>
							<select class="form-control" name="status" id="">
								<option value="nonactive">Tidak Aktif</option>
								<option value="active">Aktif</option>
							</select>
						</div>
						<br>
						<div class="col-lg-12 mt-1">
							<button name="submit" name="submit" class="btn btn-primary btn-block">Edit Data</button>
							<a href="index.php?page=peraturan" class="btn btn-danger btn-block">Batal</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
include "../config/config.php";	

	if(isset($_POST['submit'])) {
		$id = $_GET['id'];
		$judul = $_POST['judul'];
		$status = $_POST['status'];
		// Set Upload Gambar
		$ekstensi_boleh = array('pdf');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		if(!empty($gambar)) {
			if(in_array($ekstensi, $ekstensi_boleh) === true) {
				if($ukuran < 5000000) {
					move_uploaded_file($file_tmp, '../assets/file/pdf/peraturan/'. $gambar);
					$sql = mysqli_query($con, "UPDATE tbl_peraturan SET pdf='$gambar', judul='$judul', status='$status' WHERE id='$id'");
					echo "<script>alert('Data Berhasil Di ubah!')</script>";
					echo "<script>window.location.href='index.php?page=peraturan'</script>";
				}
			} 
		} else {
			$gambar = $data['pdf'];
			$sql = mysqli_query($con, "UPDATE tbl_peraturan SET pdf='$gambar', judul='$judul', status='$status' WHERE id='$id'");
			echo "<script>alert('Data Berhasil Di ubah!')</script>";
			echo "<script>window.location.href='index.php?page=peraturan'</script>";
		}
	}
 ?>

