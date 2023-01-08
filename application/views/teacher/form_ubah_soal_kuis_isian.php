<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>
    <?php echo form_open_multipart(site_url('teacher/proses_ubah_soal_isian/' . $kuis->id)) ?>
    <form method="post" enctype="multipart/form-data">


        <!-- looping soal -->
        <?php
        $i = 1;
        foreach ($soal as $sl) :
            if ($kuis->id == $sl['kuis_id']) : ?>
                <input type="hidden" class="" name='id[]' value="<?= $sl['id'] ?>">
                <input type="hidden" class="" name='user_id[]' value="<?= $user['id']; ?>">
                <input type="hidden" class="" name='kelas_id[]' value="<?= $user['kelas_id']; ?>">
                <input type="hidden" class="" name='kuis_id[]' value="<?= $kuis->id ?>">
                <div class="card">
                    <div class="card-header">
                        Soal Nomor : <?= $i; ?>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control col-auto" id="soal1" placeholder="Masukan soal" name="soal[]" value="<?= $sl['soal'] ?>">
                        </div>
                    </div>
                </div> <br>
        <?php
                $i++;
            endif;
        endforeach; ?>
        <!-- batas looping soal -->

        <div class="form-group row">
            <div class="col-11">
                <a class="btn btn-info" href="<?= base_url(); ?>teacher/ubah_kuis/<?= $kuis->id ?>" role="button">Kembali</a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
        </div>

        <?php echo form_close() ?>
    </form>
    <!-- debug -->
    <!--<?= "jumlah soal : " . $i - 1 . "  ID Kuis : " . $kuis->id  ?>-->

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->