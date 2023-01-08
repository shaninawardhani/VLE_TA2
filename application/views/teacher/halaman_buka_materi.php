<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Materi <?php echo $materi['nama_file']; ?></h1>

    <div class="col">
        <a class="btn btn-info" href="<?= base_url(); ?>teacher/materi/" role="button">Kembali</a>
    </div>
    <br>
    <div class="col">
        <iframe src="<?= $materi['file_materi']; ?>" style="width: 100%;height: 500px;"></iframe>
    </div>
    

</div>

<!-- /.container-fluid -->