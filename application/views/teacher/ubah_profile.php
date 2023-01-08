<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <div class="col">
        <form method="post" action="<?= base_url('teacher/proses_ubah_akun/') . $akun->id; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">NUPTK</label>
                <input type="text" class="form-control col-5" id="judulMateri" placeholder="..." name="nuptk" value="<?php echo $akun->nuptk_nisn; ?>" required maxlength="16" minlength="16" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control col-5" id="judulMateri" placeholder="..." name="name" value="<?php echo $akun->name; ?>" required>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="input-group mb-2 col-5">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="kelas_id">
                            <?php foreach ($kelas as $kls) : ?>
                                <?php
                                if ($kls['id'] == $akun->kelas_id) {
                                    echo "<option selected value=" . $kls['id'] . ">Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'] . "</option>";
                                };
                                ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jabatan</label>
                <input type="text" class="form-control col-5" id="judulMateri" placeholder="..." name="jabatan" value="<?php echo $akun->jabatan; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat e-mail</label>
                <input type="text" class="form-control col-5" id="judulMateri" placeholder="..." name="email" value="<?php echo $akun->email; ?>" readonly>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-4">
                        <a class="btn btn-info" href="<?= base_url(); ?>teacher/index" role="button">Kembali</a>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success">
                            Ubah
                        </button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->