
	<header>
	<div class="container">
        <div class="text-center mb-4 mt-4">
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/slider-2.jpg" alt="First slide">
                     
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider-1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider-3.jpeg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <div class="nav-icon">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </div>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <div class="nav-icon">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </div>
            </a>
        </div>
    </div>
	</header>

<?php 

	include "config/config.php";

	$query = mysqli_query($con, "SELECT * FROM tbl_posts ORDER BY date desc");
	
 ?>


<?php foreach($query as $data): ?>
	<div class="col-md-4 col-xs-12 mt-3">
	<!--  -->
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