<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_tambah_materi')) ?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" class="" name='user_id' value="<?= $user['id']; ?>">
        <div class="form-group row">
            <div class="col-3">
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
            <label for="judulMateri">Judul Materi</label>
            <input type="text" class="form-control col-6" id="judulMateri" placeholder="..." name="nama_file" required>
            <small id="contohJudul" class="form-text text-muted">Contoh: Subtema 1 : Pembelajaran 1.1</small>
        </div>
        <div class="form-group">
            <label for="fileMateri">Pilih File Materi</label>
            <div class="custom-file">
                <div class="col-6">
                    <input type="file" class="custom-file-input" id="fileMateri" name="file_materi" required>
                    <label class="custom-file-label" for="fileMateri"></label>
                </div>
            </div>
            <small id="ekstensiFile" class="form-text text-danger">Format file pdf, docx, doc, png, jpg, jpeg, ppt, pptx, mp4, mp3, aac, zip, rar</small>
        </div>
        <div class="form-group row">
            <div class="col-5">
                <a class="btn btn-primary" href="<?= base_url(); ?>teacher/materi" role="button">Kembali</a>
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