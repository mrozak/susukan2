<?php

include "config/config.php";

$query = mysqli_query($con, "SELECT * FROM tbl_posts WHERE kategori='berita' ORDER BY date DESC");

?>

<?php foreach ($query as $data) : ?>
	<!-- <div class="card" style="width: 23rem;">
  		<div class="card-body"> -->
	<div class="col-md-4 col-xs-12 mt-3">
		<p class="font-weight-bold" style="height: 55px;"><?= $data['judul'] ?></p>
		<img src="assets/file/post/<?= $data['img'] ?>" alt="" class="img-thumbnail">
		<div>
			<b><i class="ion-calendar">&nbsp; <?= $data['date'] ?> &nbsp; / &nbsp;</i></b>
			<b><i class="ion-person">&nbsp; <?= $data['author'] ?></i></b>
		</div>
		<p class="article-text">
			<?= substr($data['artikel'], 0, 100) ?>
		</p>
		<a href="index.php?page=detail&id=<?= $data['id_post'] ?>" class="btn btn-primary">Baca Selengkapnya</a>
	</div>
<?php endforeach; ?>

<!-- Pagination -->
<!-- <div class="d-flex justify-content-center">
			<nav aria-label="..." class="mt-5">
			  <ul class="pagination">
			    <li class="page-item">
			      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
			    </li>
			    <li class="page-item active"><a class="page-link" href="#">1</a></li>
			    <li class="page-item" aria-current="page">
			      <a class="page-link" href="#">2</a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#">Next</a>
			    </li>
			  </ul>
			</nav>
		</div> -->
</div>
</div>