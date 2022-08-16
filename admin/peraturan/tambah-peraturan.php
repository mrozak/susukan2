<div class="row">
	<div class="col-lg-12 m-auto">
		<div class="card card-primary">
			<div class="card-header">
				<h5>Tambah <?= $_GET['page'] ?></h5>
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
							<button name="submit" name="submit" class="btn btn-primary btn-block">Tambah</button>
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
		$judul = $_POST['judul'];
		$status = $_POST['status'];
		// Set Upload Gambar
		$ekstensi_boleh = array('pdf');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_boleh) === true) {
				if($ukuran < 2000000) {
					move_uploaded_file($file_tmp, '../assets/file/pdf/peraturan'. $gambar);
					$sql = mysqli_query($con, "INSERT INTO tbl_peraturan VALUES ('', '$judul', '$gambar','$status')");
					echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
					echo "<script>window.location.href='index.php?page=peraturan'</script>";
				} else {
					echo "<script>alert('Ukuran tidak boleh > 2MB')</script>";
				}
			} else {
				echo "<script>alert('Ekstensi tidak sesuai')</script>";
			}
	}



 ?>