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
                <h1 style="text-align: center">Profile</h1>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img style="width: 100%;" src="<?= base_url('assets/images/profile/') . $pengguna['pengguna_foto'] ?>" alt="" class="mb-1">
                        <button type="button" style="width: 100%;" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#card">
                            <i class="ft-plus-circle"></i> Ganti Foto
                        </button>
                    </div>
                    <div class="col-md-6">
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    Nama
                                </td>
                                <td width="70%">
                                    : <?= $pengguna['pengguna_nama'] ?>
                                </td>
                            </tr>
                            <?php if ($pengguna['karyawan_id'] != null) : ?>
                                <tr>
                                    <td width="30%">
                                        Tempat Lahir
                                    </td>
                                    <td width="70%">
                                        : <?= $pengguna['karyawan_tempat_lahir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        Tanggal Lahir
                                    </td>
                                    <td width="70%">
                                        : <?= $pengguna['karyawan_tanggal_lahir'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        Alamat
                                    </td>
                                    <td width="70%">
                                        : <?= $pengguna['karyawan_alamat'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        No HP
                                    </td>
                                    <td width="70%">
                                        : <?= $pengguna['karyawan_nomor_hp'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        No Rekening
                                    </td>
                                    <td width="70%">
                                        : <?= $pengguna['karyawan_no_rekening'] ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal card-->
<div class="modal fade" id="card" tabindex="-1" role="dialog" aria-labelledby="cardLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('edit-foto/') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body text-center">
                    <div class="card cetak-card-beneran" id="">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Foto</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger  btn-bg-gradient-x-red-pink" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary btn-bg-gradient-x-purple-blue">Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

</script>