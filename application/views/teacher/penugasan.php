<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    foreach ($penugasan as $pngs) {
        if ($pngs['kelas_id'] == $user['kelas_id']) {
            $id = $pngs['id'];
            $bantu[$id] = FALSE;
            foreach ($tugas as $tgs) {
                if ($pngs["id"] == $tgs["penugasan_id"]) {
                    $bantu[$id] = TRUE;
                }
            }
        }
    }
    ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <div class="row">
        <div class="col-10">
            <a href="<?= base_url(); ?>teacher/tambah_penugasan" class="btn btn-primary mb-3">
                <i class="fas fa-plus text-gray-100"></i> Tambah Penugasan</a>
        </div>
        <div class="col-auto">
            <a href="<?= base_url(); ?>teacher/buka_tabel_nilai_tugas" class="btn btn-success mb-3">Tabel Nilai Tugas</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Judul Penugasan</th>
                        <th scope="col">Tenggat Pengumpulan</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penugasan as $pngs) : ?>
                        <?php if ($pngs['kelas_id'] == $user['kelas_id']) : ?>
                            <?php
                            $tenggat = $pngs['due_date'];
                            date_default_timezone_set('Asia/Jakarta');
                            $jam = date('Y-m-d H:i:s'); ?>
                            <tr>
                                <?php foreach ($kelas as $kls) : ?>
                                    <?php if ($kls['id'] == $user['kelas_id']) : ?>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?php foreach ($tema as $tm) : ?>
                                                <?php
                                                if ($tm['id'] == $pngs['tema_id']) {
                                                    echo $tm['nama_tema'];
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $pngs['judul_penugasan']; ?></td>
                                        <td><?= $pngs['due_date']; ?></td>
                                        <td>
                                            <h5>
                                                <a href="<?= base_url(); ?>teacher/buka_daftar_tugas/<?= $pngs['id']; ?>" class="badge badge-success"> Buka </a>
                                                <?php if ($jam < $tenggat) : ?>
                                                    <a href="<?= base_url(); ?>teacher/ubah_penugasan/<?= $pngs['id']; ?>" class="badge badge-info"> Ubah </a>
                                                <?php endif; ?>
                                                <?php if (!$bantu[$pngs['id']]) : ?>
                                                    <a href="<?= base_url(); ?>teacher/hapus_penugasan/<?= $pngs['id']; ?>" data-toggle="modal" data-target="#hapus_penugasan<?= $pngs['id']; ?>" class="badge badge-danger"> Hapus </a>
                                                <?php endif; ?>
                                                <!-- MODAL HAPUS PENUGASAN-->
                                                <div class="modal fade" id="hapus_penugasan<?= $pngs['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus penugasan : <?= $pngs['judul_penugasan']; ?></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Apakah Anda yakin mau menghapus penugasan ini?</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                <a class="btn btn-danger" href="<?= base_url(); ?>teacher/hapus_penugasan/<?= $pngs['id']; ?>">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </h5>
                                        </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
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