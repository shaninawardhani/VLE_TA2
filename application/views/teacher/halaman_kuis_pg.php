<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php foreach ($akun as $ak){
        if($ak['id'] == $nilai->user_id_siswa){
            echo "Nama : ". $ak['name'];
        }
    }?></h1>
    <div class="form-group">
            <a class="btn btn-info" href="<?= base_url(); ?>teacher/kuis/" role="button">Kembali</a>
        </div>
    <?php echo form_open_multipart(site_url('student/proses_jawab_kuis_pg/')) ?>
    <form method="post" enctype="multipart/form-data">

        <!-- looping sebanyak jumlah soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($nilai->kuis_id == $sl['kuis_id']) : ?>
                <div class="card">
                    <div class="card-header">
                        <!-- looping nomor soal -->
                        Soal Nomor : <?= $i; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="text" class="form-control col-auto" id="soal1" placeholder="..." name="soal[]" value="<?= $sl['soal'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <?php foreach ($jawaban as $jwb) : ?>
                                    <?php if ($jwb['soal_id'] == $sl['id']) : ?>
                                        <div class="form-group row">
                                            <p>A. </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="a" <?php if ($jwb['jawaban'] == "a") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "disabled";
                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="flexRadioDefault[]">
                                                    <?= $sl['a'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p>B. </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="b" <?php if ($jwb['jawaban'] == "b") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "disabled";
                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="flexRadioDefault[]">
                                                    <?= $sl['b'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p>C. </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="c" <?php if ($jwb['jawaban'] == "c") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "disabled";
                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="flexRadioDefault[]">
                                                    <?= $sl['c'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p>D. </p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jawaban<?= $i ?>" id="flexRadioDefault[]" value="d" <?php if ($jwb['jawaban'] == "d") {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "disabled";
                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="flexRadioDefault[]">
                                                    <?= $sl['d'] ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-inline row">
                                            <?php if ($jwb['jawaban'] == $sl['kunci']) : ?>
                                                <div class="col-3">
                                                    <button type="button" class="btn btn-success" disabled>Jawaban Benar</button>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-3">
                                                    <button type="button" class="btn btn-danger" disabled>Jawaban Salah</button>
                                                </div>
                                                <div class="col-6">
                                                    <h7> Jawaban yang benar adalah <?= $sl['kunci'] ?></h7>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div> <br>
        <?php
                $i++;
            endif;
        endforeach; ?>
        <!-- batas looping soal -->
        <br>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->