<div class="row">
	<div class="col-lg-10 m-auto">
		<div class="card card-primary">
			<div class="card-header">
				<h5>Form <?= $_GET['page'] ?></h5>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control">
						</div>
						<div class="col-lg-6 mt-3">
							<select name="kategori" class="form-control">
								<option value="" disabled="">-- Kategori --</option>
								<option value="info-umum">Info Umum</option>
								<option value="berita">Berita</option>
								<option value="kontak">Kontak</option>
							</select>
						</div>
						<div class="col-lg-6 mt-3">
							<input type="file" name="file" class="form-control">
							<p class="text-danger mt-1" style="font-size: 12px;">Ekstensi File yang di perbolehkan : jpg, png max. 2MB</p>
							<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
						</div>
						<div class="col-lg-12 mt-3">
							<textarea class="form-control" name="artikel" cols="30" rows="10"></textarea>
						</div>
						<div class="col-lg-12 mt-3">
							<button name="submit" class="btn btn-primary btn-block">Tambah</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['submit'])) {
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$date = $_POST['tanggal'];
		$artikel = $_POST['artikel'];
		$author = $_SESSION['pengguna'];
		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpg', 'jpeg');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

			if(in_array($ekstensi, $ekstensi_boleh) === true) {
				if($ukuran < 2000000) {
					move_uploaded_file($file_tmp, '../assets/file/post/'. $gambar);
					$sql = mysqli_query($con, "INSERT INTO tbl_posts VALUES ('', '$gambar', '$judul', '$artikel', '$date', '$kategori', '$author')");
					echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
					echo "<script>window.location.href='index.php?page=tampil-beranda'</script>";
				} else {
					echo "<script>alert('Ukuran tidak boleh > 2MB')</script>";
				}
			} else {
				echo "<script>alert('Ekstensi tidak sesuai')</script>";
			}
	}

 ?>