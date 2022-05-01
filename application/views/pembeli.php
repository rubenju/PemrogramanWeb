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
							<h6 class="m-0 font-weight-bold text-primary">Tabel Pembeli</h6>
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
								Tambah Data Pembeli
								<i class="fas fa-plus"></i>
							</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nama Pembeli</th>
											<th>Jenis Kelamin</th>
											<th>No telpon</th>
											<th>Alamat</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php
									foreach ($pembeli as $m) {
										$id_pembeli = $m["p_id_pembeli"];
										$nama_pembeli = $m["p_nama_pembeli"];
										$jk = $m["p_jk"];
										$no_telp = $m["p_no_telp"];
										$alamat = $m["p_alamat"];
									?>
										<tbody>
											<tr>
												<td><?= $id_pembeli ?></td>
												<td><?= $nama_pembeli ?></td>
												<td><?= $jk ?></td>
												<td><?= $no_telp ?></td>
												<td><?= $alamat ?></td>
												<td class="text-center">
													<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_pembeli ?>">
														<i class="fas fa-edit"></i>
													</a>
													<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_pembeli ?>">
														<i class="fas fa-trash"></i>
													</a>
												</td>
											</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_pembeli ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data pembeli</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Pembeli/edit_pembeli/<?=$id_pembeli?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="nama_pembeli">Nama pembeli</label>
																<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" aria-describedby="nama_pembeli" value="<?= $nama_pembeli ?>">
															</div>
															<div class="form-group">
																<label for="jk">Jenis kelamin</label>
																<input type="text" class="form-control" id="jk" name="jk" aria-describedby="jk" value="<?= $jk ?>">
															</div>
															<div class="form-group">
																<label for="no_telp">No telpon</label>
																<input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?= $no_telp ?>">
															</div>
															<div class="form-group">
																<label for="alamat">Alamat</label>
																<input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat" value="<?= $alamat ?>">
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_pembeli ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data pembeli</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="<?= base_url() ?>Pembeli/delete_pembeli/<?=$id_pembeli?>" method="POST" enctype="multipart/form-data">
															<div class="row">
																<div class="col-md-12">
																	<input type="hidden" class="form-control" id="id_pembeli" name="id_pembeli" aria-describedby="id_pembeli">
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
												<h5 class="modal-title" id="exampleModalLabel">Tambah data pembeli</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url() ?>Pembeli/insert_pembeli" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label for="id_pembeli">Id pembeli</label>
														<input type="text" class="form-control" id="id_pembeli" name="id_pembeli" aria-describedby="id_pembeli">
													</div>
													<div class="form-group">
														<label for="nama_pembeli">Nama pembeli</label>
														<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" aria-describedby="nama_pembeli">
													</div>
													<div class="form-group">
														<label for="jk">Jenis kelamin</label>
														<input type="text" class="form-control" id="jk" name="jk" aria-describedby="jk">
													</div>
													<div class="form-group">
														<label for="no_telp">No telpon</label>
														<input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp">
													</div>
													<div class="form-group">
														<label for="alamat">Alamat</label>
														<input type="text" class="form-control" id="alamat" name="alamat" aria-describedby="alamat">
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
v
