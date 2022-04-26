<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("components/header.php") ?>

<body id="page-top">

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
							<h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
							<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">
								Tambah Data Transaksi
								<i class="fas fa-plus"></i>
							</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nama barang</th>
											<th>Harga</th>
											<th>Nama pembeli</th>
											<th>Tanggal</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<?php
									foreach ($transaksi as $m) {
										$id_transaksi = $m["p_id_transaksi"];
										$nama_barang = $m["p_nama_barang"];
										$harga = $m["p_harga"];
										$nama_pembeli = $m["p_nama_pembeli"];
										$tanggal = $m["p_tanggal"];
									?>
										<tbody>
											<tr>
												<td><?= $id_transaksi ?></td>
												<td><?= $nama_barang ?></td>
												<td><?= $harga ?></td>
												<td><?= $nama_pembeli ?></td>
												<td><?= $tanggal ?></td>
												<td class="text-center">
													<a type="button" class="btn btn-primary" data-toggle="modal" data-target="#update<?= $id_transaksi ?>">
														<i class="fas fa-edit"></i>
													</a>
													<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_transaksi ?>">
														<i class="fas fa-trash"></i>
													</a>
												</td>
											</tr>
										</tbody>
										<!-- Edit Data Modal -->
										<div class="modal fade" id="update<?= $id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Edit data transaksi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form>
															<div class="form-group">
																<label for="nama_barang">Id transaksi</label>
																<input type="text" class="form-control" id="id_transaksi" name="id_transaksi" aria-describedby="id_transaksi" value="<?= $id_transaksi ?>">
															</div>
															<div class="form-group">
																<label for="harga">Nama barang</label>
																<select class="form-control" name="id_barang" id="id_barang">
																	<?php foreach($barang as $m) { ?>
																			<option value="<?= $m["p_id_barang"] ?>"><?= $m["p_nama_barang"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="stok">Harga</label>
																<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga" value="<?= $harga ?>">
															</div>
															<div class="form-group">
																<label for="stok">Nama pembeli</label>
																<select class="form-control" name="id_pembeli" id="id_pembeli">
																	<?php foreach($pembeli as $m) { ?>
																			<option value="<?= $m["p_id_pembeli"] ?>"><?= $m["p_nama_pembeli"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="stok">Tanggal</label>
																<input type="text" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" value="<?= $tanggal ?>">
															</div>
															<button type="submit" class="btn btn-primary">Edit</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!-- Delete Data Modal -->
										<div class="modal fade" id="delete<?= $id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Hapus data transaksi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form>
															<div class="row">
																<div class="col-md-12">
																	<input type="hidden" class="form-control" id="id_transaksi" name="id_transaksi" aria-describedby="id_transaksi">
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
												<h5 class="modal-title" id="exampleModalLabel">Tambah data transaksi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form>
													<div class="form-group">
														<label for="nama_barang">Id transaksi</label>
														<input type="text" class="form-control" id="id_transaksi" name="id_transaksi" aria-describedby="id_transaksi">
													</div>
													<div class="form-group">
														<label for="harga">Nama barang</label>
														<input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="nama_barang">
													</div>
													<div class="form-group">
														<label for="stok">Harga</label>
														<input type="text" class="form-control" id="harga" name="harga" aria-describedby="harga">
													</div>
													<div class="form-group">
														<label for="stok">Nama pembeli</label>
														<input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" aria-describedby="nama_pembeli">
													</div>
													<div class="form-group">
														<label for="stok">Tanggal</label>
														<input type="text" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal">
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
