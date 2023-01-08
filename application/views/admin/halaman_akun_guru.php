<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <div class="row">
        <div class="col-9">
            <a href="<?= base_url(); ?>admin/tambah_akun_guru" class="btn btn-primary mb-3">
            <i class="fas fa-plus text-gray-100"></i> Tambah Akun Guru</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NUPTK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $gr) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $gr['nuptk_nisn']; ?></td>
                            <td><?= $gr['name']; ?></td>
                            <td><?php foreach ($kelas as $kls) : ?>
                                    <?php if ($gr['kelas_id'] == $kls['id']) {
                                        echo "Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'];
                                    } ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <h5>
                                    <a href="<?= base_url(); ?>admin/buka_akun_guru/<?= $gr['id']; ?>" class="badge badge-success"> Buka </a>
                                    <a href="<?= base_url(); ?>admin/hapus_akun/<?= $gr['id']; ?>" data-toggle="modal" data-target="#hapus_akun_guru<?= $gr['id']; ?>" class="badge badge-danger"> Hapus </a>
                                    <!-- Hapus Akun Guru Modal-->
                                    <div class="modal fade" id="hapus_akun_guru<?= $gr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus akun <?= $gr['name']; ?></h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda yakin mau menghapus akun ini?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    <a class="btn btn-danger" href="<?= base_url(); ?>admin/hapus_akun/<?= $gr['id']; ?>">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </h5>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-info" href="<?= base_url(); ?>admin/akun" role="button">Kembali</a>

</div>

<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->