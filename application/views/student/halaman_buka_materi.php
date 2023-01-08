<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Materi <?php echo $materi['nama_file']; ?></h1>

    <a class="btn btn-info" href="<?= base_url(); ?>student/materi/" role="button">Kembali</a>
    <br><br>
    <iframe src="<?= $materi['file_materi']; ?>" style="width: 100%;height: 500px;"></iframe>
    <br>



</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->