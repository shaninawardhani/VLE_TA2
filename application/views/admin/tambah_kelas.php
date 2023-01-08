<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date('Y');
    $jam = $jam - 1; ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $subtitle ?></h1>

    <form class="user" method="post" action="<?= base_url('admin/proses_tambah_kelas') ?>">
        <div class="form-group">
            <div class="form-row">
                <div class="input-group mb-3 col-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tingkat">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="input-group mb-3 col-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Tahun</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="tahun">
                        <option value="<?= $jam . "/" . $jam + 1 ?>"><?= $jam . "/" . $jam + 1 ?></option>
                        <option selected value="<?= $jam + 1 . "/" . $jam + 2 ?>"><?= $jam + 1 . "/" . $jam + 2 ?></option>
                        <option value="<?= $jam + 2 . "/" . $jam + 3 ?>"><?= $jam + 2 . "/" . $jam + 3 ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Rombongan Belajar</label>
            <input type="text" class="form-control col-3" id="judulMateri" name="rombel" placeholder="..." required>
            <small id="contohJudul" class="form-text text-muted">Contoh Rombel : A</small>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-2">
                    <a class="btn btn-info" href="<?= base_url(); ?>admin/kelas" role="button">Kembali</a>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
        <div class="form-group">

        </div>

    </form>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->