<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php if ($this->session->flashdata('tambah_akun_siswa')) {
        echo $this->session->flashdata('tambah_akun_siswa');
    } ?>
    <?php echo form_open_multipart(site_url('admin/proses_tambah_akun_siswa')); ?>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">NISN</label>
            <input type="text" class="form-control col-9" id="nisn" placeholder="..." name="nisn" maxlength="10" minlenght="10" required pattern="[0-9]+">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control col-9" id="name" placeholder="..." name="name" required>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="input-group mb-2 col-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="kelas_id">
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id']; ?>">Kelas <?= $kls['tingkat']; ?> Rombel <?= $kls['rombel']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat e-mail</label>
            <input type="email" class="form-control col-9" id="email" placeholder="..." name="email" required>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control col-9" id="password" placeholder="password123" readonly name="password" value="password123">
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">
                            Simpan
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

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->