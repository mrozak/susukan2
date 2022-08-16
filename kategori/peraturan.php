<?php 

	include "config/config.php";

	$sql = mysqli_query($con, "SELECT * FROM tbl_peraturan order by id DESC");
	

 ?>
 <nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php?page=beranda">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $_GET['page'] ?></li>
				</ol>
			</nav>

 <div class="container">
        <div class="text-center mb-4 mt-4">
			<h2>Peraturan Daerah</h2>

			<ul class="nav nav-tabs" id="myTab" role="tablist">	
			<?php foreach($sql as $data){?>
			<li class="nav-item <?= $data['status']?>" role="presentation">
				<button class="nav-link  <?= $data['status']?>" id="<?= $data['id']?>-tab" data-toggle="tab" data-target="#data<?= $data['id']?>" type="button" role="tab" aria-controls="home" aria-selected="true"><?= $data['judul']?></button>
			</li>
			<?php }?>
			</ul>
			<div class="tab-content" id="myTabContent">
				<?php foreach($sql as $dokumen) {?>
			<div class="tab-pane fade show <?= $dokumen['status']?>" id="data<?= $dokumen['id']?>" role="tabpanel" aria-labelledby="<?= $dokumen['id']?>-tab">
			<br>
			<embed type="application/pdf" src="assets/file/pdf/peraturan/<?= $dokumen['pdf'] ?>" style="width: 100%; height: 100vh;"></embed>
			</div>
			<?php }?>
			</div>
		</div>
</div>

