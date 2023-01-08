<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <form method="post" action="<?= base_url('admin/proses_ubah_password_akun/') . $akun->id ?>">
        <div class="form-group">
            <label for="exampleInputEmail1">Password Baru</label>
            <input type="password" class="form-control col-5" id="judulMateri" placeholder="..." name="password" maxlength="32" minlength="8">
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ulangi Password Baru</label>
            <input type="password" class="form-control col-5" id="judulMateri" placeholder="..." name="password2" maxlength="32" minlength="8">
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-4">
                    <a class="btn btn-info" href="<?= base_url(); ?>admin/buka_halaman_akun_guru" role="button">Kembali</a>
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </div>
        </div>

    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->