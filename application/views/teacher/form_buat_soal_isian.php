<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_tambah_soal_isian')) ?>
    <form method="post" enctype="multipart/form-data">

        <!--<?= "Jumlah soal : " . $jml_soal  ?>-->

        <!-- looping soal -->
        <?php for ($i = 1; $i <= $jml_soal; $i++) : ?>
            <input type="hidden" class="" name='user_id[]' value="<?= $user['id']; ?>">
            <input type="hidden" class="" name='kelas_id[]' value="<?= $user['kelas_id']; ?>">
            <input type="hidden" class="" name='kuis_id[]' value="<?= $id_kuis ?>">
            <div class="card mt-3">
                <div class="card-header">
                    Soal Nomor : <?= $i; ?>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control col-auto" id="soal1" placeholder="Masukan soal" name="soal[]" required>
                    </div>
                </div>
            </div><br>
        <?php endfor; ?>
        <!-- batas looping soal -->
        <br>
        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->