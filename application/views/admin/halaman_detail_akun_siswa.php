<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <div class="row">
        <div class="col-2">
            <a href="<?= base_url(); ?>admin/ubah_akun_siswa/<?= $akun->id; ?>" class="btn btn-primary mb-3">Ubah Info Akun</a>
        </div>
        <div class="col-2">
            <a href="<?= base_url(); ?>admin/ubah_password_akun/<?= $akun->id; ?>" class="btn btn-primary mb-3">Ubah Password</a>
        </div>
    </div>


    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">NISN</label>
            <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="nuptk" value="<?php echo $akun->nuptk_nisn; ?> " readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="name" value="<?php echo $akun->name; ?>" readonly>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="input-group mb-2 col-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="kelas_id" readonly>
                        <?php foreach ($kelas as $kls) : ?>
                            <?php
                            if ($kls['id'] == $akun->kelas_id) {
                                echo "<option selected readonly>" . "Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'] . "</option>";
                                break;
                            }
                            ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat e-mail</label>
            <input type="text" class="form-control col-9" id="judulMateri" placeholder="..." name="email" value="<?php echo $akun->email; ?>" readonly>
        </div>
        <div class="form-group">
            <a class="btn btn-info" href="<?= base_url(); ?>admin/buka_halaman_akun_siswa" role="button">Kembali</a>
        </div>

    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->