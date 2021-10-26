<div class="row d-print-none">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php
			if ($this->session->flashdata('alert') == 'tambah_gaji') :
			?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Gaji berhasil di proses.
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'update_gaji') :
			?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil diupdate
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'hapus_absen') :
			?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil dihapus
				</div>
			<?php
			endif;
			?>
			<div class="card-header">
				<h1 style="text-align: center">Detail Gaji <?= $karyawan['karyawan_nama'] ?></h1>
			</div>
			<div class="card-body">
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
						<tr>
							<td style="width: 2%">No</td>
							<td>Nama Karyawan</td>
							<td>Jabatan</td>
							<td>Tahun</td>
							<td>Bulan</td>
							<td style="text-align: center"><i class="ft-settings spinner"></i></td>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($gaji) :
							$no = 1;
							foreach ($gaji as $key => $value) :
						?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value['karyawan_nama'] ?></td>
									<td><?= $value['jabatan_nama'] ?></td>
									<td><?= date("Y", strtotime($value['absen_tanggal'])) ?></td>
									<td><?= date("F", strtotime($value['absen_tanggal'])) ?></td>

									<td>
										<?php if ($value['gaji_id'] != null) : ?>
											<button class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-slip" data-toggle="modal" data-target="#slip" data-id="<?= $value['gaji_id'] ?>" data-tgl="<?= $value['absen_bulan'] ?>" data-bulan="<?= date("F", strtotime($value['absen_tanggal'])) ?>" title="Lihat slip gaji"><i class="ft-printer"></i></button>
										<?php else : ?>
											<button class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-bayar" data-toggle="modal" data-target="#bayar" data-id="<?= $value['karyawan_id'] ?>" data-tgl="<?= $value['absen_bulan'] ?>" title="Proses ?"><i class="ft-check-square"></i></button>
										<?php endif; ?>
									</td>
								</tr>

						<?php
								$no++;
							endforeach;
						endif;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Gaji</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_karylihat_nama">Nama Karyawan</label>
					<input type="text" class="form-control" name="nama" id="gaji_lihat_nama" placeholder="Nama Karyawan" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_jabatan">Jabatan</label>
					<input type="text" class="form-control" name="tempat_lahir" id="gaji_lihat_jabatan" value="" placeholder="Tempat Lahir" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="gaji_lihat_tg" name="tanggal_gabung" placeholder="Tanggal Bergabung" autocomplete="off" readonly>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_lembur">Gaji Lembur</label>
					<input type="text" class="form-control" name="jabatan" id="gaji_lihat_lembur" placeholder="Gaji lembur" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_gaji">Gaji Biasa</label>
					<input type="text" class="form-control" id="gaji_lihat_gaji" name="nomor_hp" placeholder="Nomor HP" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_total">Total Gaji</label>
					<input type="text" class="form-control" id="gaji_lihat_total" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_total">Pinjaman Bulan Ini</label>
					<input type="text" class="form-control" id="gaji_lihat_bayar_pinjaman" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_total">Gaji Bersih</label>
					<input type="text" class="form-control" id="gaji_lihat_bersih" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_bulan">Bulan ke</label>
					<input type="number" class="form-control" id="gaji_lihat_bulan" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off" readonly>
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
			</div>
		</div>
	</div>
</div>


<!-- Modal slip -->
<style type="text/css">
	.tengah {
		text-align: center;
	}

	.kotak {
		border: 1px solid rgba(0, 0, 0, 0.1);
		padding: 5px;
	}

	@media print {
		body * {
			visibility: hidden;
		}

		.kotak,
		.kotak * {
			visibility: visible;
		}

		.kotak {
			position: absolute;
			width: 100%;
			margin-top: 300px;
			transform: scale(2);
			left: 0;
			top: 0;
		}
	}
</style>

<div class="modal fade text-left" id="slip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header d-print-none">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Slip Gaji</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body ">
				<div class="kotak d-print-block">
					<div class="row">
						<div class="col-12">
							<div class="tengah">
								<h3><b>PT PUJA TEKNIK SERVINDO</b></h3>
							</div>
							<div class="tengah">Jalan Oscar 3, Kecamatan Pamulang, Tangerang Selatan, Banten</div>
							<hr>
							<div class="tengah"><b><u>SLIP GAJI KARYAWAN</u></b></div>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<table>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><span id="slip-nama"></span></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>:</td>
									<td><span id="slip-jabatan"></span></td>
								</tr>
								<tr>
									<td>Nomor HP</td>
									<td>:</td>
									<td><span id="slip-nohp"></span></td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table>
								<tr>
									<td>Bulan</td>
									<td>:</td>
									<td><span id="slip-bulan"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<p><b><u>Penghasilan</u></b></p>
							<table style="width: 100%">
								<tr>
									<td>Gaji Harian</td>
									<td>:</td>
									<td>Rp. <span id="slip-gaji"></span></td>
								</tr>
								<tr>
									<td>Jumlah Hari Masuk</td>
									<td>:</td>
									<td><span id="slip-hari"></span></td>
								</tr>
								<tr>
									<td><b>Total</b></td>
									<td><b>:</b></td>
									<td><b>Rp. <span id="slip-total"></span></b></td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<p class="tengah"><b>PENERIMAAN BERSIH = Rp. <span id="slip-bersih"></span></b></p>
						</div>
					</div>
					<div class="row">
						<div class="col-6 text-center">
							<p><br><br></p>
							<p>Penerima</p>
							<br>
							<br>
							<br>
							<p><b><u><span class="slip-nama"></span></u></b></p>
						</div>
						<div class="col-6 text-center">
							<p>Tangerang Selatan, <?= date_indo(date('Y-m-d')) ?></p>
							<p>Manajer</p>
							<br>
							<br>
							<br>
							<p><b><u><?= $manajer["pengguna_nama"] ?></u></b></p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer d-print-none">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<button onclick="window.print()" class="btn btn-primary btn-bg-gradient-x-purple-blue"><i class="fa fa-print"></i> Cetak
				</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal hapus -->
<div class="modal fade text-left" id="bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Proses gaji <?= $karyawan['karyawan_nama'] ?>?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<div id="tombol-konfirmasi">
					<form action="<?= base_url() ?>gaji/bayar" method="POST" enctype="multipart/form-data">
						<input type="text" id="gaji_karyawan_id" name="gaji_karyawan_id" value="<?= $karyawan['karyawan_id'] ?>">
						<input type="text" id="gaji_jabatan_id" name="gaji_jabatan_id" value="<?= $karyawan['karyawan_jabatan_id'] ?>">
						<input type="text" id="gaji_tgl" name="gaji_tgl">
						<button type="submit" class="btn btn-danger btn-bg-gradient-x-blue-cyan">Konfirmasi</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	// ------------------------------------------------------------------------------------------
	// gaji
	// ------------------------------------------------------------------------------------------

	let root = '<?= base_url() ?>';

	$('.gaji-lihat').click(function(e) {
		e.preventDefault();
		var id = $(this).val();
		var getUrl = root + 'gaji/lihat/' + id;
		var total = 0;
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function(response) {
				if (response != null) {
					$('#gaji_lihat_nama').val(response.karyawan_nama);
					$('#gaji_lihat_jabatan').val(response.jabatan_nama);
					$('#gaji_lihat_tg').val(response.karyawan_tanggal_gabung);
					$('#gaji_lihat_lembur').val(formatRupiah(response.gaji_lembur, 'Rp. '));
					$('#gaji_lihat_gaji').val(formatRupiah(response.gaji_total, 'Rp. '));
					total = parseInt(response.gaji_lembur) + parseInt(response.gaji_total);
					$('#gaji_lihat_total').val(formatRupiah(total.toString(), 'Rp. '));
					$('#gaji_lihat_bayar_pinjaman').val(formatRupiah(response.gaji_bayar_pinjaman, 'Rp. '));
					bersih = total - parseInt(response.gaji_bayar_pinjaman);
					$('#gaji_lihat_bersih').val(formatRupiah(bersih.toString(), 'Rp. '));
					$('#gaji_lihat_bulan').val(response.gaji_bulan_ke);
					console.log(response);
				}
			},
			error: function(response) {
				console.log(response.status + 'error');
			}
		});
	});

	$('.gaji-slip').click(function() {
		var id = $(this).data('id');
		var bulan = $(this).data('bulan');
		var getUrl = root + 'gaji/lihat/' + id;


		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function(response) {
				var total = parseFloat(response.jabatan_gaji) * parseFloat(response.gaji_total_absen);
				$('#slip-nama').html(response.karyawan_nama);
				$('#slip-jabatan').html(response.jabatan_nama);
				$('#slip-nohp').html(response.karyawan_nomor_hp);
				$('#slip-bulan').html(bulan);
				$('#slip-gaji').html(response.jabatan_gaji);
				$('#slip-hari').html(response.gaji_total_absen);
				$('#slip-total').html(total);
				$('#slip-bersih').html(total);
				$('#slip-nama').html(response.karyawan_nama);
				console.log(response, total, bulan);
			},
			error: function(response) {
				console.log(response.status + 'error');
			}
		});
	});

	// ------------------------------------------------------------------------------------------



	$('.gaji-bayar').click(function() {
		var tgl = $(this).data('tgl');
		$('#gaji_tgl').val(tgl);
	});
</script>