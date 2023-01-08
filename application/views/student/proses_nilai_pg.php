<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cek proses</title>
</head>


<body>
    <form method="post" action="<?= site_url('student/proses_nilai_kuis/' . $nl_id) ?>" name="yourform" id="yourform">
        <p>
            <?php
            $i = 0;
            $bantujwb = [];
            foreach ($jawaban as $jwb) : ?>
                <?php if ($jwb['user_id_siswa'] == $user['id']) : ?>
                    <?php $bantujwb[$i] = $jwb['jawaban'];
                    $i++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php
            $bantukunci = [];
            $j = 0;
            foreach ($soal as $sl) : ?>
                <?php $bantukunci[$j] = $sl['kunci'];
                $j++; ?>
            <?php endforeach; ?>
            <?php
            $benar = 0;
            for ($k = 0; $k < $j; $k++) {
                if ($bantujwb[$k] == $bantukunci[$k]) {
                    $benar++;
                }
            }
            ?>
            <?php
            $nilai = 0;
            $nilai = $benar / $j;
            $nilai = $nilai * 100;
            ?>
            <input name="nilai" value="<?= $nilai; ?>" type="text" />
        </p>
        <p>
            status
            <input type="text" name="status" value="1">
        </p>
        <p>
            id status
            <input type="text" name="id_status" value="<?php foreach ($status as $st) {
                                                            if ($st['user_id_siswa'] == $user['id'] && $st['kuis_id'] == $kuis->id) {
                                                                echo $st['id'];
                                                            }
                                                        } ?>">
        </p>
        <p>
            <input type="submit" id="send" name="send" value="Send" />
        </p>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.createElement('form').submit.call(document.getElementById('yourform'));
        });
    </script>
</body>

</html>