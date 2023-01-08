<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Inisialisasi -->
    <?php
    $tenggat = $kuis->due_date;
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('Y-m-d H:i:s');
    ?>
    <!-- Page Heading -->
    <h3 class="h3 mb-4 text-gray-800"><?= $kuis->judul_kuis ?></h3>
    <h6 class="h6 mb-1 text-gray-800">Tipe Soal : <?= $kuis->tipe_soal ?></h6>
    <h6 class="h6 mb-4 text-gray-800">Batas Penyelesaian : <?= $tenggat ?></h6>
    <div class="row">
        <div class="col-auto">
            <a href="<?= base_url(); ?>teacher/kuis" class="btn btn-info mb-3">Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu Penyelesaian</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $sw) : ?>
                        <?php if ($sw['kelas_id'] == $user['kelas_id']) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sw['nuptk_nisn']; ?></td>
                                <td><?= $sw['name']; ?></td>
                                <td><?php foreach ($status as $st) : ?>
                                        <?php if ($st['user_id_siswa'] == $sw['id']) : ?>
                                            <?php if ($st['date_updated'] == null) : ?>
                                                <a class="badge badge-warning">Belum Mengerjakan</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] <= $tenggat) : ?>
                                                <a class="badge badge-success">Tepat Waktu</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] > $tenggat) : ?>
                                                <a class="badge badge-danger">Terlambat</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?php foreach ($status as $st) : ?>
                                        <?php if ($st['user_id_siswa'] == $sw['id'] && $kuis->id == $st['kuis_id']) : ?>
                                            <?= $st['date_updated'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($nilai as $st) : ?>
                                        <?php if ($st['user_id_siswa'] == $sw['id'] && $kuis->id == $st['kuis_id']) : ?>
                                            <?= $st['nilai'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <h5>
                                        <?php foreach ($nilai as $st) : ?>
                                            <?php if ($st['user_id_siswa'] == $sw['id']) : ?>
                                                <?php if ($kuis->tipe_soal == "Isian") : ?>
                                                    <a href="<?= base_url(); ?>teacher/daftar_kuis_siswa_detail_essay/<?php if ($st['kuis_id'] == $kuis->id) {
                                                                                                                            echo $st['id'];
                                                                                                                        }; ?>" class="badge badge-success"> Buka </a>
                                                <?php elseif ($st['nilai'] != null && $kuis->tipe_soal == "Pilihan Ganda") : ?>
                                                    <a href="<?= base_url(); ?>teacher/daftar_kuis_siswa_detail_pg/<?php if ($st['kuis_id'] == $kuis->id) {
                                                                                                                        echo $st['id'];
                                                                                                                    }; ?>" class="badge badge-success"> Buka </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </h5>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->