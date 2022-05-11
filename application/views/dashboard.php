<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("components/header.php") ?>

<body id="page-top">
	<?php if($this->session->flashdata('staff_access')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Selamat datang, Staff!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('supervisor_access')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Selamat datang, Supervisor!",
				icon: "success"
			});
		</script>
	<?php } ?>
	<?php if($this->session->flashdata('manager_access')) { ?>
		<script>
			swal({
				title: "Success",
				text: "Selamat datang, Manager!",
				icon: "success"
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang['total_barang'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pembeli</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembeli['total_pembeli'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaksi</div>
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $transaksi['total_transaksi'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

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
