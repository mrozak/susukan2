<?php 

	$sql = mysqli_query($con, "SELECT * FROM tbl_posts ORDER BY date DESC");

 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h5>Data Postingan Beranda</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr class="text-center">
						<th>#</th>
						<th>Judul</th>
						<th>Artikel</th>
						<!-- <th>Image</th> -->
						<th>Date</th>
						<th>Kategori</th>
						<th>Author</th>
						<th>Aksi</th>
					</tr>
				<?php $no = 1; foreach($sql as $data): ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['judul'] ?></td>
						<td><?= substr($data['artikel'], 0, 100) ?></td>
						<!-- <td class="text-center">
							<img src="../assets/file/post/<?= $data['img'] ?>" width="80" height="50">
						</td> -->
						<td><?= $data['date'] ?></td>
						<td><?= $data['kategori'] ?></td>
						<td><?= $data['author'] ?></td>
						<td class="text-center">
							<a href="index.php?page=hapus-beranda&id=<?=$data['id_post'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')" class="btn btn-danger">
								<i class="fas fa-trash"></i>
							</a>
							<a href="index.php?page=edit-beranda&id=<?=$data['id_post'] ?>" class="btn btn-warning text-white">
								<i class="fas fa-edit"></i>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>