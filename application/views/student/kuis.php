<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('Y-m-d H:i:s'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Judul Kuis</th>
                        <th scope="col">Tenggat Pengumpulan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kuis as $ks) : ?>
                        <tr>
                            <?php if ($ks['kelas_id'] == $user['kelas_id']) : ?>
                                <th scope="row"> <?= $i; ?></th>
                                <td><?php foreach ($tema as $tm) :
                                        if ($tm['id'] == $ks['tema_id']) {
                                            echo $tm['nama_tema'];
                                        };
                                    endforeach; ?></td>
                                <td><?= $ks['judul_kuis']; ?></td>
                                <td><?= $ks['due_date']; ?></td>
                                <td><?php foreach ($status as $st) : ?>
                                        <?php if ($st['user_id_siswa'] == $user['id'] && $st['kuis_id'] == $ks['id']) : ?>
                                            <?php if ($st['date_updated'] == null) : ?>
                                                <a class="badge badge-warning">Belum Mengerjakan</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] <= $ks['due_date']) : ?>
                                                <a class="badge badge-primary">Tepat Waktu</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] > $ks['due_date']) : ?>
                                                <a class="badge badge-danger">Terlambat</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($nilai as $nl) : ?>
                                        <?php if ($nl['kuis_id'] == $ks['id'] && $nl['user_id_siswa'] == $user['id'] && $jam > $ks['due_date']) : ?>
                                            <?= $nl['nilai'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <h5>
                                        <?php foreach ($status as $st) : ?>
                                            <?php if ($st['user_id_siswa'] == $user['id'] && $st['kuis_id'] == $ks['id']) : ?>
                                                <?php if ($st['date_updated'] == null) : ?>
                                                    <?php if ($ks['tipe_soal'] == "Pilihan Ganda") : ?>
                                                        <a href="<?= base_url(); ?>student/jawab_detail_kuis_pg/<?= $ks['id']; ?>" class="badge badge-info"> Mulai </a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url(); ?>student/jawab_detail_kuis_essay/<?= $ks['id']; ?>" class="badge badge-info"> Mulai </a>
                                                    <?php endif; ?>
                                                <?php elseif ($st['date_updated'] != null and $st['date_updated'] > $jam && $jam > $ks['due_date']) : ?>
                                                    <?php if ($ks['tipe_soal'] == "Pilihan Ganda") : ?>
                                                        <a href="<?= base_url(); ?>student/buka_detail_kuis_pg/<?= $ks['id']; ?>" class="badge badge-success"> Buka </a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url(); ?>student/buka_detail_kuis_essay/<?= $ks['id']; ?>" class="badge badge-success"> Buka </a>
                                                    <?php endif; ?>
                                                <?php elseif ($st['date_updated'] != null and $st['date_updated'] <= $jam && $jam > $ks['due_date']) : ?>
                                                    <?php if ($ks['tipe_soal'] == "Pilihan Ganda") : ?>
                                                        <a href="<?= base_url(); ?>student/buka_detail_kuis_pg/<?= $ks['id']; ?>" class="badge badge-success"> Buka </a>
                                                    <?php else : ?>
                                                        <a href="<?= base_url(); ?>student/buka_detail_kuis_essay/<?= $ks['id']; ?>" class="badge badge-success"> Buka </a>
                                                    <?php endif; ?>
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