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
											<th>Keterangan</th>
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
										$keterangan = $m["p_keterangan"];
									?>
										<tbody>
											<tr>
												<td><?= $id_transaksi ?></td>
												<td><?= $nama_barang ?></td>
												<td><?= $harga ?></td>
												<td><?= $nama_pembeli ?></td>
												<td><?= $tanggal ?></td>
												<td><?= $keterangan ?></td>
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
														<form form action="<?= base_url() ?>Transaksi/edit_transaksi/<?=$id_transaksi?>" method="POST" enctype="multipart/form-data">
															<div class="form-group">
																<label for="id_barang">Nama barang</label>
																<select class="form-control" name="id_barang" id="id_barang">
																	<?php foreach ($barang as $b) { ?>
																		<?php if($nama_barang==$b["p_nama_barang"]) { ?>
																			<option value="<?= $b["p_id_barang"] ?>" selected><?= $b["p_nama_barang"] ?></option>
																			<?php continue;?>
																		<?php } ?>
																		<option value="<?= $b["p_id_barang"] ?>"><?= $b["p_nama_barang"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="id_pembeli">Nama pembeli</label>
																<select class="form-control" name="id_pembeli" id="id_pembeli">
																	<?php foreach ($pembeli as $p) { ?>
																		<?php if($nama_pembeli==$p["p_nama_pembeli"]) { ?>
																			<option value="<?= $p["p_id_pembeli"] ?>" selected><?= $p["p_nama_pembeli"] ?></option>
																			<?php continue;?>
																		<?php } ?>
																		<option value="<?= $p["p_id_pembeli"] ?>"><?= $p["p_nama_pembeli"] ?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="form-group">
																<label for="tanggal">Tanggal</label>
																<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal" value="<?= $tanggal ?>">
															</div>
															<div class="form-group">
																<label for="keterangan">Keterangan</label>
																<input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan" value="<?= $keterangan ?>">
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
														<form form action="<?= base_url() ?>Transaksi/delete_transaksi/<?=$id_transaksi?>" method="POST" enctype="multipart/form-data">
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
												<form form action="<?= base_url() ?>Transaksi/insert_transaksi" method="POST" enctype="multipart/form-data">
													<div class="form-group">
														<label for="id_transaksi">Id transaksi</label>
														<input type="text" class="form-control" id="id_transaksi" name="id_transaksi" aria-describedby="id_transaksi">
													</div>
													<div class="form-group">
														<label for="id_barang">Nama barang</label>
														<select class="form-control" name="id_barang" id="id_barang">
															<?php foreach ($barang as $m) { ?>
																<option value="<?= $m["p_id_barang"] ?>"><?= $m["p_nama_barang"] ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="id_pembeli">Nama pembeli</label>
														<select class="form-control" name="id_pembeli" id="id_pembeli">
															<?php foreach ($pembeli as $m) { ?>
																<option value="<?= $m["p_id_pembeli"] ?>"><?= $m["p_nama_pembeli"] ?></option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="tanggal">Tanggal</label>
														<input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="tanggal">
													</div>
													<div class="form-group">
														<label for="keterangan">Keterangan</label>
														<input type="text" class="form-control" id="keterangan" name="keterangan" aria-describedby="keterangan">
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

			<?php $this->load->view("components/footer.php") ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->


	<?php $this->load->view("components/js.php") ?>

</body>

</html>
