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
			elseif ($this->session->flashdata('alert') == 'hapus_pengguna') :
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
			<?= $this->session->flashdata('message'); ?>

			<div class="card-header">
				<h1 style="text-align: center">Data Pengguna</h1>
				<?php if ($this->session->userdata('session_hak_akses') == 'admin' || 'manajer') : ?>
					<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#bootstrap">
						<i class="ft-plus-circle"></i> Tambah data pengguna
					</button>
				<?php endif; ?>
			</div>
			<hr>
			<div class="card-body">
				<table class="table table-bordered zero-configuration">
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Hak Akses</th>
							<td style="text-align: center"><i class="ft-settings spinner"></i></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($pengguna as $pg => $value) :
						?>
							<tr>
								<td><?= $no ?></td>
								<td>
									<img src="<?= base_url('assets/images/profile/') . $value['pengguna_foto']; ?>" alt="avatar" width="30px" height="30px">
								</td>
								<td><?= $value['pengguna_username'] ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td><?= $value['hak_akses'] ?></td>
								<td>
									<?php if ($this->session->userdata('session_hak_akses') == 'admin' || 'manajer') : ?>
										<button class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 pengguna-edit" data-toggle="modal" data-target="#ubah" title="Update data pengguna" value="<?= $value['pengguna_id']; ?>"><i class="ft-edit"></i></button>
										<button class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 pengguna-hapus" data-toggle="modal" data-target="#hapus" value="<?= $value['pengguna_id'] ?>" title="Hapus data pengguna"><i class="ft-trash"></i>
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
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Pengguna</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('pengguna/tambah') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Password</label>
					<input type="password" class="form-control" name="password1" id="password1" placeholder="Password" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="nama">Ulangi Password</label>
					<input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Password" autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="pengguna_hak_akses">Hak Akses</label>
					<select name="pengguna_hak_akses" id="basicSelect" class="form-control" required>
						<option value="">-- pilih hak akses --</option>
						<?php foreach ($hakakses as $key => $value) : ?>
							<?php if ($value['hak_akses_id'] != 3) : ?>
								<option value="<?= $value['hak_akses_id'] ?>"><?= $value['hak_akses'] ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
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




<!-- Modal update -->
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="<?= base_url('pengguna/update'); ?>" method="post">
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel35"> Update Data Pengguna</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<fieldset class="form-group floating-label-form-group">
						<label for="edit_username">Username</label>
						<input type="hidden" id="edit_id" name="pengguna_id">
						<input type="text" class="form-control" name="pengguna_username" id="edit_username" placeholder="Username" autocomplete="off" required>
					</fieldset>
					<fieldset class="form-group floating-label-form-group">
						<label for="edit_tempat">Nama Lengkap</label>
						<input type="text" class="form-control" name="pengguna_nama" id="edit_nama" placeholder="Nama Lengkap" autocomplete="off" required>
					</fieldset>
					<fieldset class="form-group floating-label-form-group">
						<label for="edit_tempat">Password</label>
						<input type="password" class="form-control" name="pengguna_password" id="edit_password" placeholder=" Password" autocomplete="off">
					</fieldset>

					<fieldset class="form-group floating-label-form-group">
						<label for="pengguna_hak_akses">Hak Akses</label>
						<select name="pengguna_hak_akses" id="edit_hak_akses" class="form-control" required>
							<option value="">-- pilih hak akses --</option>
							<?php foreach ($hakakses as $key => $value) : ?>
								<option value="<?= $value['hak_akses_id'] ?>"><?= $value['hak_akses'] ?></option>
							<?php endforeach; ?>
						</select>
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
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Pengguna ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="hapuspengguna">

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	let root = '<?= base_url() ?>';
	//------------------------------------------------------------------------------------------
	// Pengguna
	//------------------------------------------------------------------------------------------
	$('.pengguna-edit').click(function(e) {
		e.preventDefault();
		var id = $(this).val();
		var getUrl = root + 'pengguna/lihat/' + id;
		$.ajax({
			url: getUrl,
			type: 'ajax',
			dataType: 'json',
			success: function(response) {
				console.log(response);

				if (response != null) {
					$('#edit_username').val(response.pengguna_username);
					$('#edit_id').val(response.pengguna_id);
					$('#edit_nama').val(response.pengguna_nama);
					$('#edit_hak_akses').val(response.hak_akses_id);
					console.log(response);
				}
			},
			error: function(response) {
				console.log(response.status + 'error');
			}
		});
	});

	$('.pengguna-hapus').click(function() {
		var id = $(this).val();
		var html = '' +
			'<a href="' + root + 'pengguna/hapus/' + id + '" class="btn btn-danger btn-bg-gradient-x-red-pink">Hapus</a>';
		$('#hapuspengguna').html(html);
	});
</script>