<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("components/header.php") ?>

<body id="page-top">
	<?php if($this->session->flashdata('success_input')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Data Berhasil Ditambahkan!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('error_input')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Data Gagal Ditambahkan!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('success_edit')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Data Berhasil Diubah!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('error_edit')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Data Gagal Diubah!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('success_delete')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Data Berhasil Dihapus!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('error_delete')) { ?>
		<script>
			swal({
				title: "Error",
				text: "Data Gagal Dihapus!",
				icon: "error"
			});
		</script>
	<?php } ?>
	<!-- Page Wrapper -->
	<div id="wrapper">

		<?php $this->load->view("components/sidebar.php") ?>

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<?php $this->load->view("components/navbar.php") ?>


				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Database Penjualan</h1>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
								Tambah Data Barang
								<i class="fas fa-plus"></i>
							</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nama Barang</th>
											<th>Harga</th>
											<th>Stok</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php
									foreach ($barang as $m) {
										$id_barang = $m["p_id_barang"];
										$nama_barang = $m["p_nama_barang"];
										$harga = $m["p_harga"];
										$stok = $m["p_stok"];
									?>
										<tbody>
											<tr>
												<td><?= $id_barang ?></td>
												<td><?= $nama_barang ?></td>
												<td><?= $harga ?></td>
												<td><?= $stok ?></td>
												<td class="text-center">
													<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_barang ?>">
														<i class="fas fa-edit"></i>
													</a>
													<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_barang ?>">
														<i class="fas fa-trash"></i>
													</a>
												</td>
											</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data barang</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Barang/edit_barang/<?=$id_barang?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="nama_barang">Nama barang</label>
																<input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="nama_barang" value="<?= $nama_barang ?>">
															</div>
															<div class="form-group">
																<label for="harga">Harga barang</label>
																<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" value="<?= $harga ?>">
															</div>
															<div class="form-group">
																<label for="stok">Stok barang</label>
																<input type="text" class="form-control" id="stok" name="stok" aria-describedby="stok" value="<?= $stok ?>">
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data barang</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Barang/delete_barang/<?=$id_barang?>" method="POST" enctype="multipart/form-data">
															<div class="row">
																<div class="col-md-12">
																	<input type="hidden" class="form-control" id="id_barang" name="id_barang" aria-describedby="id_barang">
																	<p>Apakah Anda yakin untuk menghapus data ini?</p>
																</div>
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary ripple save-category">Ya</button>
																<button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</table>

								<!-- Create Data Modal -->
								<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tambah data barang</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url() ?>Barang/insert_barang" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label for="id_barang">Id barang</label>
														<input type="text" class="form-control" id="id_barang" name="id_barang" aria-describedby="id_barang" required>
													</div>
													<div class="form-group">
														<label for="nama_barang">Nama barang</label>
														<input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="nama_barang" required>
													</div>
													<div class="form-group">
														<label for="harga">Harga barang</label>
														<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" required>
													</div>
													<div class="form-group">
														<label for="stok">Stok barang</label>
														<input type="text" class="form-control" id="stok" name="stok" aria-describedby="stok" required>
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Your Website 2021</span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("components/js.php") ?>

</body>

</html>
