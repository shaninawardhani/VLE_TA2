<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_ubah_soal_pg/' . $kuis->id)) ?>
    <form method="post" enctype="multipart/form-data">

        <!-- looping sebanyak jumlah soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($kuis->id == $sl['kuis_id']) : ?>
                <input type="hidden" class="" name='id[]' value="<?= $sl['id'] ?>">
                <input type="hidden" class="" name='user_id[]' value="<?= $user['id']; ?>">
                <input type="hidden" class="" name='kelas_id[]' value="<?= $user['kelas_id']; ?>">
                <input type="hidden" class="" name='kuis_id[]' value="<?= $kuis->id ?>">
                <div class="card">
                    <div class="card-header">
                        <!-- looping nomor soal -->
                        Soal Nomor : <?= $i; ?>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="text" class="form-control col-auto" id="soal1" placeholder="..." name="soal[]" value="<?= $sl['soal'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group row">
                                    <label for="opsiA" class="col-sm-2 col-form-label">Opsi A :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="opsiA" name="opsiA[]" value="<?= $sl['a'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opsiB" class="col-sm-2 col-form-label">Opsi B :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="opsiB" name="opsiB[]" value="<?= $sl['b'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opsiC" class="col-sm-2 col-form-label">Opsi C :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="opsiC" name="opsiC[]" value="<?= $sl['c'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="opsiD" class="col-sm-2 col-form-label">Opsi D :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="opsiD" name="opsiD[]" value="<?= $sl['d'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Kunci</label>
                                    </div>
                                    <!-- dropdown kunci jawaban, ada 4 value -->
                                    <select class="custom-select" id="inputGroupSelect01" name="kunci[]">
                                        <?php if ($sl['kunci'] == "a") : ?>
                                            <option selected value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        <?php elseif ($sl['kunci'] == "b") : ?>
                                            <option value="a">A</option>
                                            <option selected value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        <?php elseif ($sl['kunci'] == "c") : ?>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option selected value="c">C</option>
                                            <option value="d">D</option>
                                        <?php elseif ($sl['kunci'] == "d") : ?>
                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option selected value="d">D</option>
                                        <?php endif; ?>
                                    </select>
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

        <div class="form-group row">
            <div class="col-11">
                <a class="btn btn-info" href="<?= base_url(); ?>teacher/ubah_kuis/<?= $kuis->id ?>" role="button">Kembali</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
        </div>

        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->