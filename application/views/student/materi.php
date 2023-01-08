<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tema</th>
                        <th scope="col">Judul Materi</th>
                        <th scope="col">Waktu Unggah</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($materi as $mtr) : ?>
                        <?php if ($user['kelas_id'] == $mtr['kelas_id']) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <?php foreach ($tema as $tm) :
                                    if ($tm['id'] == $mtr['tema_id']) {
                                        echo "<td>" . $tm['nama_tema'] . "</td>";
                                    }
                                endforeach; ?>
                                <td><?= $mtr['nama_file']; ?></td>
                                <td><?= $mtr['date_created']; ?></td>
                                <td>
                                    <h5>
                                        <a href="<?= base_url(); ?>student/buka_materi/<?= $mtr['id']; ?>" class="badge badge-success"> Buka </a>
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