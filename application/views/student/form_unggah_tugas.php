<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $penugasan->judul_penugasan ?></h1>

    <?php echo form_open_multipart(site_url('student/proses_unggah_tugas/') . $penugasan->id); ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='user_id' value="<?= $user['id']; ?>">
        <input type="hidden" class="" name='kelas_id' value="<?= $user['kelas_id']; ?>">
        <input type="hidden" class="" name='tema_id' value="<?= $penugasan->tema_id; ?>">
        <input type="hidden" class="" name='penugasan_id' value="<?= $penugasan->id; ?>">
        <input type="hidden" class="" name='nilai' value="0">
        <input type="hidden" class="" name='penugasan_id_sendiri' value="<?php foreach ($status as $st) {
                                                                                if ($st['user_id_siswa'] == $user['id']) {
                                                                                    echo $st['id'];
                                                                                }
                                                                            } ?>">
        <div class="form-group">
            <h7 class="h7 mb-4 text-gray-800"><?= $penugasan->deskripsi_tugas ?></h7>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-auto">
                    <div class="custom-file col-auto">
                        <input type="file" class="custom-file-input" id="customFile" name="url" required>
                        <label class="custom-file-label" for="customFile">Pilih file tugas</label>
                    </div>
                    <small id="contohJudul" class="form-text text-muted">Format file pdf, docx, doc, png, jpg, jpeg, ppt, pptx, mp4, mp3, aac, zip, rar</small>
                </div>
                <div class="col-auto">
                    <button type='submit' class='btn btn-success'>Unggah</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-info" href="<?= base_url(); ?>student/tugas" role="button">Kembali</a>
            </div>
        </div>
        <?php echo form_close() ?>
    </form>
    <div>
        <br><br>
        <?php
        foreach ($tugas as $tgs) :
            if ($tgs['user_id'] == $user['id']) {
                if ($tgs['penugasan_id'] == $id) {
                    echo "<iframe src=";
                    echo $tgs['url'];
                    echo " style='width: 100%;height: 500px;'></iframe>";
                }
            }
        endforeach; ?> <br>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->