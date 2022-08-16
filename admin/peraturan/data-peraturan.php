<?php 

	$author = $_SESSION['pengguna'];

	$sql = mysqli_query($con, "SELECT * FROM tbl_peraturan");

 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h5>Data Peraturan</h5></div>
                    <div class="col-md-6 text-right">
                    <a href="index.php?page=tambah-peraturan"class="btn btn-primary"> Tambah
                </a>
                    </div>
                </div>
				
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr class="text-center">
						<th>#</th>
                        <th>Judul</th>
						<th>File</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				
				<?php $no = 1; foreach($sql as $data): ?>
					<tr>
						<td><?= $no++; ?></td>
                        <td><?= $data['judul'] ?></td>
						<td><?= $data['pdf'] ?></td>
						<td><?= $data['status'] ?></td>
						<td class="text-center">
							<a href="index.php?page=hapus-peraturan&id=<?=$data['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ?')" class="btn btn-danger">

								<i class="fas fa-trash"></i>
							</a>
							<a href="index.php?page=edit-peraturan&id=<?=$data['id'] ?>" class="btn btn-warning text-white">
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