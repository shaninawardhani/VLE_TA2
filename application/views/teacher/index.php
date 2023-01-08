<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas Anda sekarang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                foreach ($kelas as $kls) {
                                    if ($kls['id'] == $user['kelas_id']) {
                                        echo "Kelas " . $kls['tingkat'] . " Rombel " . $kls['rombel'];
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-pin fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                $i = 0;
                                                                                foreach ($siswa as $sw) {
                                                                                    if ($sw['kelas_id'] == $user['kelas_id']) {
                                                                                        $i++;
                                                                                    }
                                                                                }
                                                                                echo $i;
                                                                                ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>