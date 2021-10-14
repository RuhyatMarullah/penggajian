<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Sistem Informasi Penggajian Selkom Group">
	<meta name="keywords" content="Sistem Informasi Penggajian Selkom Group">
	<meta name="author" content="Jihad">
	<title><?= $title ?> - PT PUJA TEKNIK SERVINDO</title>
	<link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/logo/63-512.png">
	<link href="<?= base_url() ?>assets/css/fonts/css93c2.css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/vendors.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/forms/toggle/switchery.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/forms/switch.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/colors/palette-switch.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/charts/chartist.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/charts/chartist-plugin-tooltip.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/tables/datatable/datatables.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/pickers/daterange/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/pickers/pickadate/default.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/pickers/pickadate/default.date.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/pickers/pickadate/default.time.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/css/forms/selects/select2.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/easy-autocomplete/easy-autocomplete.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins/easy-autocomplete/easy-autocomplete.themes.min.css">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/components.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/line-awesome/1.1/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/feather/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/simple-line-icons/style.min.css">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/menu/menu-types/vertical-menu.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/core/colors/palette-gradient.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/pages/chat-application.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/pages/dashboard-analytics.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/pickers/daterange/daterange.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/plugins/animate/animate.min.css">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
	<!-- END: Custom CSS-->

	<style>
		video {
			-webkit-transform: scaleX(-1);
			transform: scaleX(-1);
		}
	</style>


	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url() ?>assets/vendors/js/vendors.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/scripts/forms/switch.min.js" type="text/javascript"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<!--<script src="--><? //= base_url()
						?>
	<!--assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>-->
	<!--<script src="--><? //= base_url()
						?>
	<!--assets/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>-->
	<script src="<?= base_url() ?>assets/vendors/js/pickers/pickadate/picker.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/pickers/pickadate/picker.date.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/pickers/pickadate/picker.time.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/pickers/pickadate/legacy.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/pickers/daterange/daterangepicker.js" type="text/javascript"></script>

	<script src="<?= base_url() ?>assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url() ?>assets/js/core/app-menu.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/core/app.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/scripts/customizer.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/vendors/js/jquery.sharrre.js" type="text/javascript"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<!--<script src="--><? //= base_url()
						?>
	<!--assets/js/scripts/pages/dashboard-analytics.min.js" type="text/javascript"></script>-->
	<script src="<?= base_url() ?>assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/scripts/tables/datatables/datatable-basic.min.js" type="text/javascript"></script>

	<script src="<?= base_url() ?>assets/js/scripts/forms/select/form-select2.min.js" type="text/javascript"></script>

	<script src="<?= base_url() ?>assets/js/scripts/popover/popover.min.js" type="text/javascript"></script>

	<script src="<?= base_url() ?>assets/js/scripts/easy-autocomplete/jquery.easy-autocomplete.min.js"></script>

	<script src="<?= base_url() ?>assets/js/qr_code/scan_qr.js"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

	<!-- BEGIN: Header-->
	<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light d-print-none">
		<div class="navbar-wrapper">
			<div class="navbar-container content">
				<div class="collapse navbar-collapse show" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item mobile-menu d-md-none mr-auto">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
								<i class="ft-menu font-large-1"></i>
							</a>
						</li>
						<li class="nav-item d-none d-md-block">
							<a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
								<i class="ft-menu"></i>
							</a>
						</li>
						<li class="nav-item d-none d-md-block">
							<a class="nav-link nav-link-expand" href="#">
								<i class="ficon ft-maximize"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-user nav-item">

							<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
								<span class="avatar avatar-online">
									<img src="<?= base_url('assets/images/profile/') . $this->session->userdata('session_foto'); ?>" alt="avatar">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="arrow_box_right">
									<a class="dropdown-item" href="#">
										<span class="avatar avatar-online">
											<strong>
												<?= $this->session->userdata('session_nama'); ?>
											</strong>
										</span><br><br>
										<?= $this->session->userdata('session_hak_akses'); ?>
										</span></a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url('logout') ?>">
										<i class="ft-power"></i>
										Logout
									</a>
								</div>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- END: Header-->


	<!-- BEGIN: Main Menu-->
	<div class="main-menu menu-fixed menu-light menu-accordion d-print-none menu-shadow " data-scroll-to-active="true" data-img="<?= base_url() ?>assets/images/backgrounds/02.jpg">
		<div class="navbar-header">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item mr-auto">
					<a class="navbar-brand" href="#">
						<h3 style="font-size: 1.0rem;" class="brand-text">PT PUJA TEKNIK SERVINDO</h3>
					</a>
				</li>
				<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
			</ul>
		</div>
		<div class="navigation-background"></div>
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<?php if ($this->session->userdata('session_hak_akses') == 'manajer' || $this->session->userdata('session_hak_akses') == 'admin') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'dashboard') echo 'active' ?>">
						<a href="<?= base_url('dashboard') ?>"><i class="ft-home"></i>
							<span class="menu-title" data-i18n="">Dashboard</span>
						</a>
					</li>
					<li class=" nav-item"><a href="#"><i class="ft-layers"></i>
							<span class="menu-title" data-i18n="">Data Master</span></a>
						<ul class="menu-content">
							<li class="<?php if ($this->uri->segment(1) == 'karyawan') echo 'active' ?>">
								<a class="menu-item" href="<?= base_url('karyawan') ?>">
									<i class="ft-users"> </i> Data Karyawan
								</a>
							</li>
							<?php if ($this->session->userdata('session_hak_akses') == 'admin') : ?>
								<li class="<?php if ($this->uri->segment(1) == 'jabatan') echo 'active' ?>">
									<a class="menu-item" href="<?= base_url('jabatan') ?>">
										<i class="ft-award"></i> Data Jabatan
									</a>
								</li>
								<li class="<?php if ($this->uri->segment(1) == 'pengguna') echo 'active' ?>">
									<a href="<?= base_url('pengguna') ?>">
										<i class="ft-user-check"></i> Data Pengguna
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('session_hak_akses') == 'admin qr') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'scan-qr-code') echo 'active' ?>">
						<a href="<?= base_url('scan-qr-code') ?>"><i class="ft-user-check"></i>
							<span class="menu-title" data-i18n="">Scan Qr-Code</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('session_hak_akses') != 'admin qr') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'absen') echo 'active' ?>">
						<a href="<?= base_url('absen') ?>"><i class="ft-user-check"></i>
							<span class="menu-title" data-i18n="">Absen</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('session_hak_akses') == 'admin') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'gaji') echo 'active' ?>">
						<a href="<?= base_url('gaji') ?>"><i class="icon-wallet"></i>
							<span class="menu-title" data-i18n="">Gaji</span>
						</a>
					</li>
				<?php endif; ?>
				<!-- <li class=" nav-item <?php if ($this->uri->segment(1) == 'pinjam') echo 'active' ?>">
					<a href="<?= base_url('pinjam') ?>"><i class="ft-calendar"></i>
						<span class="menu-title" data-i18n="">Pinjaman</span>
					</a>
				</li> -->
				<?php if ($this->session->userdata('session_hak_akses') == 'manajer' || $this->session->userdata('session_hak_akses') == 'admin') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'laporan') echo 'active' ?>">
						<a href="<?= base_url('laporan') ?>"><i class="ft-file"></i>
							<span class="menu-title" data-i18n="">Laporan</span>
						</a>
					</li>
				<?php endif; ?>
				<?php if ($this->session->userdata('session_hak_akses') != 'admin qr' && $this->session->userdata('session_hak_akses') != 'admin') : ?>
					<li class=" nav-item <?php if ($this->uri->segment(1) == 'profile') echo 'active' ?>">
						<a href="<?= base_url('profile/' . $this->session->userdata('session_id')) ?>"><i class="ft-user"></i>
							<span class="menu-title" data-i18n="">Profile</span>
						</a>
					</li>
				<?php endif; ?>
				<li class=" nav-item">
					<a href="<?= base_url('logout') ?>"><i class="ft-power"></i>
						<span class="menu-title" data-i18n="">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END: Main Menu-->

	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-wrapper-before"></div>
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- Revenue, Hit Rate & Deals -->