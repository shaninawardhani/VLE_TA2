<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->
    <?php foreach ($akun as $ak) : ?>
        <?php $akum = 0 ;?>
            <?php if ($ak['kelas_id'] == $user['kelas_id'] && $ak['name']== $user['name']) : ?>
                                <?php foreach ($kuis as $ks) : ?>
                                    <?php if ($ks['kelas_id'] == $user['kelas_id']) : ?>
                                        <?php foreach ($nilai as $nl) : ?>
                                            <?php if ($nl['kuis_id'] == $ks['id'] && $ak['id'] == $nl['user_id_siswa']) : ?>
                                                <?php $akum = $akum + $nl['nilai'];?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                
                            <?php endif; ?>
                    <?php endforeach; ?>
                    <img class="img-profile rounded-circle" width="200" src="<?php 
                                if ($akum>=0 && $akum<=200){
                                    echo base_url('assets/img/badge/').'bro.png';
                                }elseif ($akum>=201 && $akum<=400){
                                    echo base_url('assets/img/badge/').'sil.png';
                                }else{
                                    echo base_url('assets/img/badge/').'go.png';
                                }
                                ?>">
                  
    <?php echo "Nama : " . $user['name'] ?>
    <?php foreach ($kelas as $kls) {
            if ($kls['id'] == $user['kelas_id']) {
                echo "Kelas : " . $kls['tingkat'] . " Rombel " . $kls['rombel'];
            }
        }
    ?>
    
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelasmu Sekarang
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
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tugas (Belum selesai)
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $i = 0;
                                        
                                                foreach ($statusT as $st) {
                                                    if ($st['user_id_siswa'] == $user['id'] && $st['date_updated'] == null && $st['kelas_id'] == $user['kelas_id']) {
                                                        $i++;
                                                    }
                                                }
                                           
                                        echo $i; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kuis (Belum selesai)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $i = 0;
                                
                                        foreach ($statusK as $st) {
                                            if ($st['user_id_siswa'] == $user['id'] && $st['date_updated'] == null && $st['kelas_id'] == $user['kelas_id']) {
                                                $i++;
                                            }
                                        }
                                    
                                
                                echo $i; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paste fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
        <div class="col-10">
            <button href="<?= base_url(); ?>student/leaderboard" onclick="toggle(this);" class="btn btn-primary mb-3">
                  Tampilkan Leaderboard</button>
                <style>
                    table.tb { border-collapse: collapse; width:300px; }
                    .tb th, .tb td { padding: 5px; border: solid 1px #777; }
                    .tb th { background-color: lightblue;}
                </style>
                <script>
  let toggle = button => {
    let element = document.getElementById("mytable");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Sembunyikan Leaderboard";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Tampilkan Leaderboard";
    }
  }
</script>

<table class="table table-hover" id="mytable" hidden >
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Lencana</th>
                        <th scope="col">Nama Siswa</th>
                        <?php
                        $j = 1;
                        foreach ($kuis as $ks) :
                        ?>
                            <?php
                            if ($ks['kelas_id'] == $user['kelas_id']) {
                                echo "<th style='display:none;' scope='col'>Kuis-" . $j . "</th>";
                                $j = $j + 1;
                            } ?>
                        <?php endforeach; ?>
                        <th scope="col">Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $k = 1; ?>
                    <?php foreach ($akun as $ak) : ?>
                        <?php $akumulasi = 0 ;?>
                        <tr>
                            <?php if ($ak['kelas_id'] == $user['kelas_id']) : ?>
                                <th scope="row"><?= $k; ?></th>
                                <td><img class="img-profile rounded-circle" width="50" src="<?php 
                                if ($akumulasi>=0 && $akumulasi<=200){
                                    echo base_url('assets/img/badge/').'bro.png';
                                }elseif ($akumulasi>=201 && $akumulasi<=400){
                                    echo base_url('assets/img/badge/').'sil.png';
                                }else{
                                    echo base_url('assets/img/badge/').'go.png';
                                }
                                ?>">
                                </td>
                                <td><?= $ak['name']; ?></td>
                                <?php foreach ($kuis as $ks) : ?>
                                    <?php if ($ks['kelas_id'] == $user['kelas_id']) : ?>
                                        <?php foreach ($nilai as $nl) : ?>
                                            <?php if ($nl['kuis_id'] == $ks['id'] && $ak['id'] == $nl['user_id_siswa']) : ?>
                                                <?= "<td style='display:none;'>" . $nl['nilai'] . "</td>"; ?>
                                                <?php $akumulasi = $akumulasi + $nl['nilai'];?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php $k++; ?>
                                <td><?= $akumulasi; ?></td>
                                
                            <?php endif; ?>
                            
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

<br />        
        </div>

    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>