<?php 

	$id = $_GET['id'];

	$sql = mysqli_query($con, "SELECT * FROM tbl_posts WHERE id_post='$id'");
	$data = mysqli_fetch_array($sql);

 ?>

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
							<label for="judul">Judul Artikel</label>
							<input type="text" name="judul" placeholder="Masukkan Judul" class="form-control" value="<?= $data['judul'] ?>">
						</div>
						<div class="col-lg-6 mt-3">
							<label for="kategori">Pilih Kategori</label>
							<select name="kategori" class="form-control">
								<option value="" disabled="">-- Kategori --</option>
								<option value="<?= $data['kategori'] ?>"><?= $data['kategori'] ?></option>
								<option value="Berita">Berita</option>
							</select>
						</div>
						<div class="col-lg-6 mt-3">
							<label for="file">Masukkan File Gambar</label>
							<input type="file" name="file" class="form-control" value="<?= $data['img'] ?>">
							<input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
						</div>
						<div class="col-lg-12 mt-3">
							<label for="text">Masukkan Deskripsi Artikel</label>
							<textarea class="form-control" name="artikel" cols="30" rows="10"><?= $data['artikel'] ?></textarea>
						</div>
						<div class="col-lg-12 mt-3">
							<button name="submit" class="btn btn-primary btn-block">Edit Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['submit'])) {
		$id = $_GET['id'];
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$date = $_POST['tanggal'];
		$artikel = $_POST['artikel'];
		$author = $_SESSION['pengguna'];
		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpg');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		$sql= mysqli_query($con, "SELECT * FROM tbl_posts WHERE id_post='$id'");
		$data = mysqli_fetch_array($sql);

			if(!empty($gambar)) {
				if(in_array($ekstensi, $ekstensi_boleh) === true) {
					if($ukuran < 2000000) {
						move_uploaded_file($file_tmp, '../assets/file/post/'. $gambar);
						$sql = mysqli_query($con, "UPDATE tbl_posts SET img='$gambar', judul='$judul', artikel='$artikel', kategori='$kategori' WHERE id_post='$id'");
						echo "<script>alert('Data Berhasil Di ubah!')</script>";
						echo "<script>window.location.href='index.php?page=tampil-berita'</script>";
						// header("location: index.php?page=tampil-berita");
					}
				} 
			} else {
				$gambar = $data['img'];
				$sql = mysqli_query($con, "UPDATE tbl_posts SET img='$gambar', judul='$judul', artikel='$artikel', kategori='$kategori' WHERE id_post='$id'");
				echo "<script>alert('Data Berhasil Di ubah!')</script>";
				echo "<script>window.location.href='index.php?page=tampil-berita'</script>";
			}
	}

 ?>