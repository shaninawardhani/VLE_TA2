<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <div class="col-lg-8">
        <?php echo form_open_multipart(site_url('admin/proses_ubah_akun_siswa/') . $akun->id); ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">NISN</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="nisn" value="<?php echo $akun->nuptk_nisn; ?>" minlength="10" maxlength="10" required pattern="[0-9]+">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="name" value="<?php echo $akun->name; ?>" required>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="input-group mb-2 col-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="kelas_id">
                            <?php foreach ($kelas as $kls) : ?>
                                <?php
                                if ($kls['id'] == $akun->kelas_id) {
                                    echo "<option selected value=" . $kls['id'] . ">Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'] . "</option>";
                                } else {
                                    echo "<option value=" . $kls['id'] . ">Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'] . "</option>";
                                };
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat e-mail</label>
                <input type="email" class="form-control col-9" id="judulMateri" placeholder="..." name="email" value="<?php echo $akun->email; ?>" required>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">
                            Ubah
                        </button>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
            <div class="form-group">
                <a class="btn btn-primary" href="<?= base_url(); ?>admin/buka_halaman_akun_siswa" role="button">Kembali</a>
            </div>
            <?php echo form_close() ?>
        </form>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->