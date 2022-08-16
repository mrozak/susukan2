<?php 

	include "config/config.php";

	$sql = mysqli_query($con, "SELECT * FROM tbl_gallery");

 ?>
 <nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php?page=beranda">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $_GET['page'] ?></li>
				</ol>
			</nav>
<h2 style="text-align:center">Galeri</h2>
	<div class="row text-center">
	<?php foreach($sql as $data): ?>
		<div class="col-md-4 col-xs-12 mt-3">
			<img src="assets/img/<?= $data['nama'] ?>" alt="" class="img-thumbnail">
		</div>
	<?php endforeach; ?>
	</div>