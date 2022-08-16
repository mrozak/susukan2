<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Desa Susukan II</title>

	<link rel="stylesheet" href="assets/css/bootstrap-grid.css">
	<link rel="stylesheet" href="assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="assets/css/bootstrap-utilities.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- script -->
	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="assets/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">
		<img src="assets/img/susukan2.png" width="50" height="44">
				&nbsp; <span> <b>Desa Susukan II</b></span>
		</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
		<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php?page=beranda">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=berita">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=kebijakan">Kebijakan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=peraturan">Peraturan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=galeri">Galeri</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=kontak">Kontak</a>
					</li>
			</li>
		 </ul>
		 &emsp;
		 
		 <form class="form-inline">
			<input class="form-control mr-sm-2" type="search" placeholder="Cari" aria-label="Search">
			<button class="btn btn-success my-2 my-sm-0" type="submit">Cari</button>
		</form>
		&emsp;
    </div>
</nav>
</div>




	<section id="sec-article" class="mt-3">


		<div class="container">
		<!-- <nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?= $_GET['page'] ?></li>
				</ol>
			</nav> -->
			

			<div class="row mt-3">
				<?php

				if (isset($_GET['page'])) {
					$page = $_GET['page'];

					switch ($page) {
						case 'beranda':
							include "kategori/beranda.php";
							break;

						case 'berita':
							include "kategori/berita.php";
							break;

						case 'detail':
							include "kategori/detail-post.php";
							break;

						case 'kebijakan':
							include "kategori/kebijakan.php";
							break;

						case 'peraturan':
							include "kategori/peraturan.php";
							break;

						case 'galeri':
							include "kategori/galeri.php";
							break;
						case 'kontak':
							include "kategori/kontak.php";
							break;

						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				} else {
					header("location: index.php?page=beranda");
					include "kategori/beranda.php";
				}

				?>

	</section>

	<footer id="footer" class="mt-5 p-3 bg-light">
		<div class="container text-center">
			<p class="text-dark">&copy;&nbsp; Copyright Desa Susukan II</p>
		</div>
	</footer>



	

</body>
</html>