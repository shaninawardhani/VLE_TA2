<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tabel Nilai Tugas - Kelas
        <?php foreach ($kelas as $kls) : ?>
            <?php if ($kls['id'] == $user['kelas_id']) {
                echo $kls['tingkat'] . " Rombel " . $kls['rombel'];
            } ?>
        <?php endforeach; ?>
    </h1>
    <div class="row">
        <div class="col-2">
            <a href="<?= base_url(); ?>teacher/penugasan" class="btn btn-info mb-3">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama Siswa</th>
                        <?php
                        $j = 1;
                        foreach ($penugasan as $pngs) :
                        ?>
                            <?php
                            if ($pngs['kelas_id'] == $user['kelas_id']) {
                                echo "<th scope='col'>Tugas-" . $j . "</th>";
                                $j = $j + 1;
                            } ?>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $k = 1; ?>
                    <?php foreach ($akun as $ak) : ?>
                        <tr>
                            <?php if ($ak['kelas_id'] == $user['kelas_id']) : ?>
                                <th scope="row"><?= $k; ?></th>
                                <td><?= $ak['nuptk_nisn']; ?></td>
                                <td><?= $ak['name']; ?></td>
                                <?php foreach ($penugasan as $pngs) : ?>
                                    <?php if ($pngs['kelas_id'] == $user['kelas_id']) : ?>
                                        <?php foreach ($tugas as $tgs) : ?>
                                            <?php if ($tgs['penugasan_id'] == $pngs['id'] && $ak['id'] == $tgs['user_id']) : ?>
                                                <?= "<td>" . $tgs['nilai'] . "</td>"; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php $k++; ?>
                            <?php endif; ?>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->