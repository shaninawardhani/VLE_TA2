<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_tambah_soal_pg')) ?>
    <form method="post" enctype="multipart/form-data">

        <!--<?= "jumlah soal : " . $jml_soal . " ID Kuis : " . $id_kuis  ?>-->
        <!-- looping sebanyak jumlah soal -->
        <?php for ($i = 1; $i <= $jml_soal; $i++) : ?>
            <input type="hidden" class="" name='user_id[]' value="<?= $user['id']; ?>">
            <input type="hidden" class="" name='kelas_id[]' value="<?= $user['kelas_id']; ?>">
            <input type="hidden" class="" name='kuis_id[]' value="<?= $id_kuis ?>">
            <div class="card">
                <div class="card-header">
                    <!-- looping nomor soal -->
                    Soal Nomor : <?= $i; ?>

                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <input type="text" class="form-control col-auto" id="soal1" placeholder="..." name="soal[]" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group row">
                                <label for="opsiA" class="col-sm-2 col-form-label">Opsi A :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="opsiA" name="opsiA[]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="opsiB" class="col-sm-2 col-form-label">Opsi B :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="opsiB" name="opsiB[]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="opsiC" class="col-sm-2 col-form-label">Opsi C :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="opsiC" name="opsiC[]" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="opsiD" class="col-sm-2 col-form-label">Opsi D :</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="opsiD" name="opsiD[]" required>
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
                                    <option selected value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
        <?php endfor; ?>
        <!-- batas looping soal -->

        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->