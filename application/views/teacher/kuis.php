<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    foreach ($kuis as $ks) {
        if ($ks['kelas_id'] == $user['kelas_id']) {
            $id = $ks['id'];
            $bantu[$id] = FALSE;
            foreach ($status as $st) {
                if ($ks["id"] == $st["kuis_id"] && $st["status"] == 1) {
                    $bantu[$id] = TRUE;
                    #echo $bantu[$id];
                }
            }
        }
    }
    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <div class="row">
        <div class="col-10">
            <a href="<?= base_url(); ?>teacher/tambah_kuis" class="btn btn-primary mb-3">
                <i class="fas fa-plus text-gray-100"></i> Tambah Kuis</a>
        </div>
        <div class="col-auto">
            <a href="<?= base_url(); ?>teacher/buka_tabel_nilai_kuis" class="btn btn-success mb-3">Tabel Nilai Kuis</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Judul Kuis</th>
                        <th scope="col">Tipe Soal</th>
                        <th scope="col">Tenggat Pengumpulan</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kuis as $ks) : ?>
                        <?php if ($ks['kelas_id'] == $user['kelas_id']) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?php foreach ($tema as $tm) : ?>
                                        <?php
                                        if ($tm['id'] == $ks['tema_id']) {
                                            echo $tm['nama_tema'];
                                        }
                                        ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $ks['judul_kuis']; ?></td>
                                <td><?= $ks['tipe_soal']; ?></td>
                                <td><?= $ks['due_date']; ?></td>
                                <td>
                                    <h5>
                                        <a href="<?= base_url(); ?>teacher/buka_daftar_kuis_siswa/<?= $ks['id']; ?>" class="badge badge-success"> Buka </a>
                                        <?php if (!$bantu[$ks["id"]]) : ?>
                                            <a href="<?= base_url(); ?>teacher/ubah_kuis/<?= $ks['id']; ?>" class="badge badge-info"> Ubah </a>
                                            <?php if ($ks['tipe_soal'] == "Pilihan Ganda") : ?>
                                                <a href="<?= base_url(); ?>teacher/hapus_kuis_pg/<?= $ks['id']; ?>" data-toggle="modal" data-target="#hapus_kuis_pg<?= $ks['id']; ?>" class="badge badge-danger"> Hapus </a>
                                                <!-- MODAL HAPUS KUIS PG-->
                                                <div class="modal fade" id="hapus_kuis_pg<?= $ks['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Kuis : <?= $ks['judul_kuis']; ?></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Apakah Anda yakin mau menghapus kuis ini?</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                <a class="btn btn-danger" href="<?= base_url(); ?>teacher/hapus_kuis_pg/<?= $ks['id']; ?>">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <a href="<?= base_url(); ?>teacher/hapus_kuis_essay/<?= $ks['id']; ?>" data-toggle="modal" data-target="#hapus_kuis_essay<?= $ks['id']; ?>" class="badge badge-danger"> Hapus </a>
                                                <!-- MODAL HAPUS KUIS ESSAY-->
                                                <div class="modal fade" id="hapus_kuis_essay<?= $ks['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Kuis : <?= $ks['judul_kuis']; ?></h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">Apakah Anda yakin mau menghapus kuis ini?</div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                <a class="btn btn-danger" href="<?= base_url(); ?>teacher/hapus_kuis_essay/<?= $ks['id']; ?>">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
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