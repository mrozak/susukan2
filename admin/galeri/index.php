<?php 

	include "../config/config.php";

	$sql = mysqli_query($con, "SELECT * FROM tbl_gallery");

 ?>
<div class="row">
	<div class="col-lg-6 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5>Galeri Diunggah</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th width="30">#</th>
						<th class="text-center">Gambar</th>
						<th class="text-center">Aksi</th>
					</tr>
				<?php 
					$no = 1;
					foreach($sql as $data):
				 ?>
					<tr>
						<th><?= $no++; ?></th>
						<th class="text-center"><img src="../assets/img/<?= $data['nama'] ?>" width="180" height="50"></th>
						<th class="text-center">
							<a href="index.php?page=hapus-galeri&id=<?= $data['id_img'] ?>"onclick="return confirm('Apakah Anda yakin ingin menghapus Gambar ini ?')" class="btn btn-danger">
								<i class="fas fa-trash"></i>
							</a>
						</th>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="card card-primary">
			<div class="card-header">
				<h5>Form Galeri</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="file">Masukkan File</label>
								<input type="file" name="file" class="form-control">
								<p class="text-danger mt-1" style="font-size: 12px;">Ekstensi File yang di perbolehkan : jpg, png max. 2MB</p>
							</div>
							<div class="form-group">
								<button name="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 

	include "../config/config.php";

	if(isset($_POST['submit'])) {
		// Set Upload Gambar
		$ekstensi_boleh = array('png', 'jpg', 'jpeg');
		$gambar = $_FILES['file']['name'];
		$ex = explode('.', $gambar);
		$ekstensi = strtolower(end($ex));
		$ukuran = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];

		if(!empty($gambar)) {
			if(in_array($ekstensi, $ekstensi_boleh) === true) {
				if($ukuran < 2000000) {
					move_uploaded_file($file_tmp, '../assets/img/'. $gambar);
					$sql = mysqli_query($con, "INSERT INTO tbl_gallery VALUES ('', '$gambar')");
					echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
					echo "<script>window.location.href='index.php?page=galeri'</script>";
				} else {
					echo "<script>alert('Ukuran tidak boleh > 2MB')</script>";
				}
			} else {
				echo "<script>alert('Ekstensi tidak sesuai')</script>";
			}
		} else {
			echo "<script>alert('Mohon memilih file yang akan di upload')</script>";
		}
	}
	
 ?>