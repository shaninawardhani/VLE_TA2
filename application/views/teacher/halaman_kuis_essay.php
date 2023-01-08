<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php foreach ($akun as $ak) {
                                            if ($ak['id'] == $nilai->user_id_siswa) {
                                                echo "Nama : " . $ak['name'];
                                            }
                                        } ?></h1>
    <div class="form-group">
        <a href="<?= base_url(); ?>teacher/kuis/" class="btn btn-info">Kembali</a>
    </div>
    <?php echo form_open_multipart(site_url('teacher/proses_nilai_kuis_oleh_guru/' . $nilai->id)) ?>
    <form method="post" enctype="multipart/form-data">
        <!-- looping soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($nilai->kuis_id == $sl['kuis_id']) : ?>
                <div class="card">
                    <div class="card-header">
                        Soal Nomor : <?= $i; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h2 class="form-control col-auto"><?= $sl['soal'] ?></h2>
                        </div>
                        <?php foreach ($jawaban as $jwb) : ?>
                            <?php if ($jwb['soal_id'] == $sl['id']) : ?>
                                <div class="form-group">
                                    <h3 type="text" class="form-control col-auto" id="soal1" placeholder="Masukan jawaban" name="jawaban<?= $i ?>"><?= $jwb['jawaban'] ?></h3>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div> <br>
        <?php
                $i++;
            endif;
        endforeach; ?>
        <!-- batas looping soal -->
        <?php if ($nilai->nilai == 0) : ?>
            <div class="form-group mb-2 mr-sm-2">
                <label class="form-control-label">Nilai :</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control col-1" placeholder="Nilai" name="nilai" value="<?= $nilai->nilai ?>" min="0" max="100">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Simpan Nilai</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->