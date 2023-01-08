<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buka <?= $kuis->judul_kuis ?></h1>
    <?php echo form_open_multipart(site_url('student/proses_jawab_kuis_essay/' . $kuis->id)) ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='nilai_id_sendiri' value="<?php foreach ($nilai as $nl) {
                                                                            if ($nl['user_id_siswa'] == $user['id']) {
                                                                                echo $nl['id'];
                                                                            }
                                                                        } ?>">
        <div class="form-group">
            <a href="<?= base_url(); ?>student/kuis/" class="btn btn-info">Kembali</a>
        </div>
        <!-- looping soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($kuis->id == $sl['kuis_id']) : ?>
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
        
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->