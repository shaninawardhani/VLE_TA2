<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $jam = date('Y-m-d\TH:i'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_tambah_penugasan')) ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='user_id' value="<?= $user['id']; ?>">
        <input type="hidden" class="" name='kelas_id' value="<?= $user['kelas_id']; ?>">
        <?php foreach ($akun as $ak) : ?>
            <?php if ($ak['kelas_id'] == $user['kelas_id']) : ?>
                <input type="hidden" class="" name='user_id_siswa[]' value="<?= $ak['id']; ?>">
                <input type="hidden" class="" name='kelas_id_siswa[]' value="<?= $user['kelas_id']; ?>">
        <?php
            endif;
        endforeach; ?>
        <div class="form-group row">
            <div class="col-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="kelas_id" readonly>
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
                            <option value="<?= $tm['id']; ?>"><?= $tm['nama_tema']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="judulPgs">Judul Penugasan</label>
            <input type="text" class="form-control col-7" id="judulPenugasan" placeholder="..." name="judul_penugasan" required>
            <small id="contohJudulPgs" class="form-text text-muted">Contoh: Tugas Subtema 1 : Pembelajaran 1.1</small>
        </div>
        <div class="form-group">
            <label for="deskPenugasan">Deskripsi Penugasan</label>
            <textarea class="form-control col-7" id="deskripsiPenugasan" rows="3" name="deskripsi" required></textarea>
        </div>
        <div class="form-group">
            <label for="meeting-time">Tenggat Pengumpulan Tugas</label>
            <input type="datetime-local" class="form-control col-3" id="meeting-time" name="due_date" required min="<?= $jam ?>">
        </div>
        <div class="form-group row">
            <div class="col-6">
                <a class="btn btn-primary" href="<?= base_url(); ?>teacher/penugasan" role="button">Kembali</a>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->