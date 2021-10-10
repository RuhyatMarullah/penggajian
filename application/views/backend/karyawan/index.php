<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php
			if ($this->session->flashdata('alert') == 'tambah_karyawan') :
			?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil ditambahkan
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'update_karyawan') :
			?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil diupdate
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'hapus_karyawan') :
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
				<h1 style="text-align: center">Data Karyawan</h1>
				<?php if ($this->session->userdata('session_hak_akses') == 'admin' || $this->session->userdata('session_hak_akses') == 'manajer') : ?>
					<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#bootstrap">
						<i class="ft-plus-circle"></i> Tambah data karyawan
					</button>
				<?php endif; ?>
			</div>
			<hr>
			<div class="card-body">
				<table class="table table-bordered zero-configuration">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Tanggal Bergabung</th>
							<th>Nomor HP</th>
							<td style="text-align: center"><i class="ft-settings spinner"></i></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($karyawan as $key => $value) :
						?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['karyawan_nama'] ?></td>
								<td><?= $value['jabatan_nama'] ?></td>
								<td><?= date_indo($value['karyawan_tanggal_gabung']) ?></td>
								<td><?= $value['karyawan_nomor_hp'] ?></td>
								<td>
									<button class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 karyawan-lihat" data-toggle="modal" data-target="#lihat" value="<?= $value['karyawan_id'] ?>" title="Lihat selengkapnya"><i class="ft-eye"></i></button>
									<?php if ($this->session->userdata('session_hak_akses') == 'admin' || $this->session->userdata('session_hak_akses') == 'manajer') : ?>
										<button class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 karyawan-edit" data-toggle="modal" data-target="#ubah" value="<?= $value['karyawan_id'] ?>" title="Update data karyawan"><i class="ft-edit"></i></button>

										<button class="btn btn-danger btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 cetak-card" data-toggle="modal" data-target="#card" title="Lihat Card" data-poto="<?= $value['pengguna_foto'] ?>" data-nama="<?= $value['karyawan_nama'] ?>" data-qr="<?= $value['karyawan_qrcode'] ?>">
											<i class="ft-info"></i>
										</button>

										<button class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 karyawan-hapus" data-toggle="modal" data-target="#hapus" value="<?= $value['karyawan_id'] ?>" title="Hapus data karyawan">
											<i class="ft-trash"></i>
										</button>
									<?php endif; ?>
								</td>
							</tr>
						<?php
							$no++;
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('karyawan/tambah') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Karyawan" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="tempat" placeholder="Tempat Lahir" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="tl" placeholder="Tanggal Lahir" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="alamat">Alamat</label>
					<textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Alamat" autocomplete="off" required></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="tg" name="tanggal_gabung" placeholder="Tanggal Bergabung" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="basicSelect" class="form-control">
						<?php
						foreach ($jabatan as $key => $value) :
						?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nohp">Nomor HP</label>
					<input type="number" class="form-control" id="nohp" name="nomor_hp" placeholder="Nomor HP" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="norek">Nomor Rekening</label>
					<input type="number" class="form-control" id="norek" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off">
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan" value="Simpan">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<table style="width: 100%;">
							<tr style="height: 30px;">
								<td style="width: 40%;">
									nama
								</td>
								<td>
									: <span id="lihat_nama"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									E-mail
								</td>
								<td>
									: <span id="lihat_email"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Tempat Lahir
								</td>
								<td>
									: <span id="lihat_tempat"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Tanggal Lahir
								</td>
								<td>
									: <span id="lihat_tl"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Alamat
								</td>
								<td>
									: <span id="lihat_alamat"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Tanggal Bergabung
								</td>
								<td>
									: <span id="lihat_tg"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Jabatan
								</td>
								<td>
									: <span id="lihat_jabatan_karyawan"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Gaji Perhari
								</td>
								<td>
									: <span id="lihat_gaji_pokok"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Nomor HP
								</td>
								<td>
									: <span id="lihat_nohp"></span>
								</td>
							</tr>
							<tr style="height: 30px;">
								<td>
									Nomor Rekening
								</td>
								<td>
									: <span id="lihat_norek"></span>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col">
						<img src="" alt="" id="qr_code">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
			</div>
		</div>
	</div>
</div>


<!-- Modal update -->
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('karyawan/update') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nama">Nama</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama Karyawan" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="email">E-mail</label>
					<input type="text" class="form-control" name="email" id="edit_email" placeholder="E-mail" autocomplete="off" required readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="edit_tempat" placeholder="Tempat Lahir" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="edit_tl" placeholder="Tanggal Lahir" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_alamat">Alamat</label>
					<textarea class="form-control" id="edit_alamat" rows="3" name="alamat" placeholder="Alamat" autocomplete="off" required></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="edit_tg" name="tanggal_gabung" placeholder="Tanggal Bergabung" autocomplete="off" required>
						<div class="input-group-append">
							<span class="input-group-text">
								<span class="ft-calendar"></span>
							</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="jabatan" class="select2 form-control" style="width: 100%">
						<?php
						foreach ($jabatan as $key => $value) :
						?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nohp">Nomor HP</label>
					<input type="number" class="form-control" id="edit_nohp" name="nomor_hp" placeholder="Nomor HP" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_norek">Nomor Rekening</label>
					<input type="number" class="form-control" id="edit_norek" name="nomor_rekening" placeholder="Nomor rekening boleh kosong" autocomplete="off">
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="update" value="Update">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Karyawan ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="hapuskaryawan">

				</div>
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

		.cetak-card-beneran,
		.cetak-card-beneran * {
			visibility: visible;
		}

		.cetak-card-beneran {
			position: absolute;
			width: 100%;
			margin-top: 300px;
			transform: scale(2);
			left: 0;
			top: 0;
		}

		.poto-warna {
			background-color: #1fdff3 !important;
			-webkit-print-color-adjust: exact;
		}
	}
</style>

<!-- Modal card-->
<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="cardLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="cardLabel">Card Karyawan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<div class="card cetak-card-beneran" id="">

					<div class="card-body">
						<div class="row">
							<div class="col-md-12 poto-warna" style="background-color: #1fdff3;  font-family: 'Times New Roman', Times, serif !important;">
								<h3 style="color: #1fdff3;">asdas</h3>
								<img class="rounded-circle mx-3" style="width: 250px;" src="..." alt="Card image cap" id="card_poto">
								<h3 style="color: #1fdff3;">asdas</h3>
							</div>
							<div class="col-md-12">
								<h1 id="card_nama" class="mt-3">Card title</h1>
								<img src="..." alt="Card image cap" id="card_qr">
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button onclick="window.print()" class="btn btn-primary btn-bg-gradient-x-purple-blue"><i class="fa fa-print"></i> Cetak
				</button>
			</div>
		</div>
	</div>
</div>

<script>
	// ------------------------------------------------------------------------------------------
	// karyawan
	// ------------------------------------------------------------------------------------------

	let root = '<?= base_url() ?>';

	$('.karyawan-lihat').click(function(e) {
		e.preventDefault();
		var id = $(this).val();
		var getUrl = root + 'karyawan/lihat/' + id;
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function(response) {
				console.log(response);
				if (response != null) {
					$('#lihat_nama').html(response.karyawan_nama);
					$('#lihat_tempat').html(response.karyawan_tempat_lahir);
					$('#lihat_tl').html(response.karyawan_tanggal_lahir);
					$('#lihat_alamat').html(response.karyawan_alamat);
					$('#lihat_nohp').html(response.karyawan_nomor_hp);
					$('#lihat_norek').html(response.karyawan_no_rekening);
					$('#lihat_tg').html(response.karyawan_tanggal_gabung);
					$('#lihat_jabatan_karyawan').html(response.jabatan_nama);
					$('#lihat_gaji_pokok').html(formatRupiah(response.jabatan_gaji, 'Rp. '));
					$('#lihat_email').html(response.pengguna_username);
					$('#qr_code').attr('src', '<?= base_url() ?>assets/images/qr_code/' + response.karyawan_qrcode);
				}
			},
			error: function(response) {
				console.log(response.status + 'error');
			}
		});
	});



	// ------------------------------------------------------------------------------------------

	$('.karyawan-edit').click(function(e) {
		e.preventDefault();
		var id = $(this).val();
		var getUrl = root + 'karyawan/lihat/' + id;
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function(response) {
				if (response != null) {
					$('#karyawan_id').val(response.karyawan_id);
					$('#edit_nama').val(response.karyawan_nama);
					$('#edit_tempat').val(response.karyawan_tempat_lahir);
					$('#edit_tl').val(response.karyawan_tanggal_lahir);
					$('#edit_alamat').val(response.karyawan_alamat);
					$('#edit_nohp').val(response.karyawan_nomor_hp);
					$('#edit_norek').val(response.karyawan_no_rekening);
					$('#edit_tg').val(response.karyawan_tanggal_gabung);
					$('#edit_jabatan_karyawan').val(response.gaji_jabatan);
					// $('#edit_gaji_pokok').val(formatRupiah(response.gaji_jumlah, 'Rp. '));
					$('#edit_email').val(response.pengguna_username);
				}
			},
			error: function(response) {
				console.log(response.status + 'error');
			}
		});
	});

	// ------------------------------------------------------------------------------------------

	$('.karyawan-hapus').click(function() {
		var id = $(this).val();
		console.log(id);
		var html = '' +
			'<a href="' + root + 'karyawan/hapus/' + id + '" class="btn btn-danger btn-bg-gradient-x-red-pink">Hapus</a>';
		$('#hapuskaryawan').html(html);
	});

	$('.cetak-card').on('click', function() {
		let nama = $(this).data('nama');
		let poto = $(this).data('poto');
		let qr = $(this).data('qr');

		$('#card_qr').attr('src', '<?= base_url() ?>assets/images/qr_code/' + qr);
		$('#card_nama').html(nama);
		$('#card_poto').attr('src', '<?= base_url() ?>assets/images/profile/' + poto);
	})
</script>