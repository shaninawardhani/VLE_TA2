<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <div class="col-8">
        <form method="post" action="<?= base_url('admin/proses_ubah_akun/') . $akun->id; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">NUPTK</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="nuptk" value="<?php echo $akun->nuptk_nisn; ?>" required maxlength="16" minlength="16">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="name" value="<?php echo $akun->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jabatan</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="jabatan" value="<?php echo $akun->jabatan; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat e-mail</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="email" value="<?php echo $akun->email; ?>" required>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <a class="btn btn-info" href="<?= base_url(); ?>admin" role="button">Kembali</a>
                    <button type="submit" class="btn btn-success">
                        Ubah
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->