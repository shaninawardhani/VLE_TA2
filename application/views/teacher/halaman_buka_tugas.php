<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tugas <?php foreach ($penugasan as $pngs) {
                                                if ($pngs['id'] == $tugas['penugasan_id']) {
                                                    echo $pngs['judul_penugasan'];
                                                }
                                            } ?></h1>
    <h5 class="h5 mb-4 text-gray-800">
        <?php foreach ($akun as $ak) : ?>
            <?php
            if ($ak['id'] == $tugas['user_id']) {
                echo "Nama Siswa : " . $ak['name'];
            } ?>
        <?php endforeach; ?></h5>
    <div class="row mb-2">
        <div class="col-auto">
            <a class="btn btn-info" href="<?= base_url(); ?>teacher/buka_daftar_tugas/<?php
                                                                                        foreach ($penugasan as $pngs) :
                                                                                            if ($tugas['penugasan_id'] == $pngs['id']) {
                                                                                                echo $pngs['id'];
                                                                                            }
                                                                                        endforeach; ?>" role="button">Kembali</a>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <iframe src="<?= $tugas['url']; ?>" style="width: 100%;height: 500px;"></iframe>
        </div>
    </div>
    <br>



    <?php echo form_open_multipart(site_url('teacher/proses_nilai_tugas/') . $tugas['id']); ?>
    <form class="form-inline" method="post" enctype="multipart/form-data">
        <?php if ($tugas['nilai'] == 0) : ?>
            <div class="form-group mb-2 mr-sm-2">
                <label class="form-control-label">Nilai :</label>
                <div class="input-group mb-3">

                    <input type="number" class="form-control col-1" placeholder="Nilai" name="nilai" value="<?= $tugas['nilai'] ?>" min="0" max="100">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Simpan Nilai</button>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php echo form_close() ?>
    </form>

</div>
</div>