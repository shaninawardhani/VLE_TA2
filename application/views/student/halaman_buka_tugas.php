<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="h3 mb-4 text-gray-800"><?= $penugasan->judul_penugasan ?></h3>
    <h6 class="h6 mb-4 text-gray-800"><?= $penugasan->deskripsi_tugas ?></h6>

    <a class="btn btn-info" href="<?= base_url(); ?>student/tugas/" role="button">Kembali</a>
    <br><br>
    <iframe src="<?php foreach ($tugas as $tgs) {
                        if ($penugasan->id == $tgs['penugasan_id'] && $tgs['user_id'] == $user['id']) {
                            echo $tgs['url'];
                        }
                    }; ?>" style="width: 100%;height: 500px;"></iframe>
    <br>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->