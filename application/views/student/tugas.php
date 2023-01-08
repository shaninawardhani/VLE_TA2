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
                        <th scope="col">Judul Penugasan</th>
                        <th scope="col">Tenggat Pengumpulan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>


                    <?php foreach ($penugasan as $pngs) : ?>
                        <tr>
                            <?php if ($pngs['kelas_id'] == $user['kelas_id']) : ?>
                                <th scope="row"> <?= $i; ?></th>
                                <td><?php foreach ($tema as $tm) :
                                        if ($tm['id'] == $pngs['tema_id']) {
                                            echo $tm['nama_tema'];
                                        };
                                    endforeach; ?></td>
                                <td><?= $pngs['judul_penugasan']; ?></td>
                                <td><?= $pngs['due_date']; ?></td>
                                <td><?php foreach ($status as $st) : ?>
                                        <?php if ($st['user_id_siswa'] == $user['id'] && $st['penugasan_id'] == $pngs['id']) : ?>
                                            <?php if ($st['date_updated'] == null) : ?>
                                                <a class="badge badge-warning">Belum Mengerjakan</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] <= $pngs['due_date']) : ?>
                                                <a class="badge badge-primary">Tepat Waktu</a>
                                            <?php elseif ($st['date_updated'] != null and $st['date_updated'] > $pngs['due_date']) : ?>
                                                <a class="badge badge-danger">Terlambat</a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?php foreach ($tugas as $tgs) : ?>
                                        <?php if ($tgs['penugasan_id'] == $pngs['id'] && $tgs['user_id'] == $user['id']) : ?>
                                            <?= $tgs['nilai'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?></td>
                                <td>
                                    <h5>
                                        <?php foreach ($status as $st) : ?>
                                            <?php if ($st['user_id_siswa'] == $user['id'] && $st['penugasan_id'] == $pngs['id']) : ?>
                                                <?php if ($st['date_updated'] == null) : ?>
                                                    <a href="<?= base_url(); ?>student/form_unggah_tugas/<?= $pngs['id']; ?>" class="badge badge-info"> Unggah </a>
                                                <?php elseif ($st['date_updated'] != null && $pngs['due_date'] > $jam) : ?>
                                                    <a href="<?= base_url(); ?>student/detail_tugas/<?= $pngs['id']; ?>" class="badge badge-success"> Buka </a>
                                                    <a href="<?= base_url(); ?>student/ubah_tugas/<?= $pngs['id']; ?>" class="badge badge-info"> Ubah </a>
                                                <?php elseif ($st['date_updated'] != null && $pngs['due_date'] <= $jam) : ?>
                                                    <a href="<?= base_url(); ?>student/detail_tugas/<?= $pngs['id']; ?>" class="badge badge-success"> Buka </a>
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