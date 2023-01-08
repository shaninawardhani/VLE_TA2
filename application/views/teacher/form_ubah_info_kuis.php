<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_ubah_kuis/' . $kuis->id)) ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='user_id' value="<?= $user['id']; ?>">
        <input type="hidden" class="" name='kelas_id' value="<?= $user['kelas_id']; ?>">
        <div class="form-group row">
            <div class="col-5">
                <a class="btn btn-primary" href="
                <?php if ($kuis->tipe_soal == 'Isian') {
                    echo  base_url() . 'teacher/ubah_soal_isian/' . $kuis->id;
                } else {
                    echo base_url() . 'teacher/ubah_soal_pg/' . $kuis->id;
                } ?>" role="button">Ubah Soal</a>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="" readonly>
                        <?php foreach ($kelas as $kls) : ?>
                            <?php
                            if ($kls['id'] == $user['kelas_id']) {
                                echo "<option selected readonly value='" . $kls['id'] . "'>" . "Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'] . "</option>";
                                break;
                            }
                            ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tema</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tema_id">
                        <?php foreach ($tema as $tm) : ?>
                            <?php
                            if ($tm['id'] == $kuis->tema_id) {
                                echo "<option selected value=" . $tm['id'] . "> " . $tm['nama_tema'] . "</option>";
                            } else {
                                echo "<option value=" . $tm['id'] . "> " . $tm['nama_tema'] . "</option>";
                            }
                            ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="judulKuis">Judul Kuis</label>
            <input type="text" class="form-control col-6" id="judulKuis" placeholder="..." name="judul_kuis" value="<?= $kuis->judul_kuis; ?>" required>
            <small id="contohJudulKuis" class="form-text text-muted">Contoh: Kuis Subtema 1 : Pembelajaran 1.1</small>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tipe Soal</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tipe_soal">
                        <option selected value="<?= $kuis->tipe_soal ?>">
                            <?php
                            if ($kuis->tipe_soal == "Isian") {
                                echo "Soal Isian";
                            } else {
                                echo "Soal Pilihan Ganda";
                            }
                            ?> </option>

                    </select>
                </div>
            </div>
            <!-- Page count soal -->
            <?php
            $i = 0;
            if ($kuis->tipe_soal == "Isian") {
                foreach ($soal_isian as $sl) {
                    if ($kuis->id == $sl['kuis_id']) {
                        $i++;
                    }
                }
            } else {
                foreach ($soal_pg as $sl) {
                    if ($kuis->id == $sl['kuis_id']) {
                        $i++;
                    }
                }
            }
            ?>
            <!-- Page count soal -->
            <div class="col-2">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            Jumlah Soal
                        </div>
                        <input type="number" class="form-control" id="inlineFormInputGroup" placeholder="" name="jumlah_soal" value="<?= $i; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="meeting-time">Tenggat Pengumpulan Kuis</label>
            <input type="datetime-local" class="form-control col-3" id="meeting-time" name="due_date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($kuis->due_date)) ?>" required>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <a class="btn btn-info" href="<?= base_url(); ?>teacher/kuis" role="button">Kembali</a>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->