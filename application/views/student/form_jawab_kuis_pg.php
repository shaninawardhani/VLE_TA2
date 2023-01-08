<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <h1 class="h6 mb-4 text-danger">Jawabanmu tidak tersimpan secara otomatis. Harap mengklik tombol "Selesai" jika kamu sudah selesai mengerjakan kuis.</h1>
    <?php echo form_open_multipart(site_url('student/proses_jawab_kuis_pg/' . $kuis->id)) ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='nilai_id_sendiri' value="<?php foreach ($nilai as $nl) {
                                                                            if ($nl['user_id_siswa'] == $user['id']) {
                                                                                echo $nl['id'];
                                                                            }
                                                                        } ?>">
        <!-- looping sebanyak jumlah soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($kuis->id == $sl['kuis_id']) : ?>
                <input type="hidden" class="" name='soal_id[]' value="<?= $sl['id'] ?>">
                <input type="hidden" class="" name='user_id_siswa[]' value="<?= $user['id']; ?>">
                <input type="hidden" class="" name='kelas_id[]' value="<?= $user['kelas_id']; ?>">
                <input type="hidden" class="" name='kuis_id[]' value="<?= $kuis->id ?>">
                <input type="hidden" class="" name='nilai_id[]' value="<?php foreach ($nilai as $nl) {
                                                                            if ($nl['user_id_siswa'] == $user['id']) {
                                                                                echo $nl['id'];
                                                                            }
                                                                        } ?>">
                <div class="card">
                    <div class="card-header">
                        <!-- looping nomor soal -->
                        Soal Nomor : <?= $i; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <h3 class="form-control col-auto"><?= $sl['soal'] ?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="a">
                                        <label class="form-check-label" for="flexRadioDefault[]">
                                            <?= $sl['a'] ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="b">
                                        <label class="form-check-label" for="flexRadioDefault[]">
                                            <?= $sl['b'] ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="c">
                                        <label class="form-check-label" for="flexRadioDefault[]">
                                            <?= $sl['c'] ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="d">
                                        <label class="form-check-label" for="flexRadioDefault[]">
                                            <?= $sl['d'] ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
        <?php
                $i++;
            endif;
        endforeach; ?>
        <!-- batas looping soal -->

        <div class="form-group">
            <button type="submit" class="btn btn-success">Selesai</button>
        </div>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->