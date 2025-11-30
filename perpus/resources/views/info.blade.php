<!DOCTYPE html>
<html>
<head> <title>Info Mahasiswa</title> </head>
<body>
    <h1>Saya adalah mahasiswa Program Studi:
    <?php
    if($progdi=="TI")
        echo "Teknologi Informatika";
    else if($progdi=="SI")
        echo "Sistem Informasi";
    else if($progdi=="IK")
        echo "Ilmu Komunikasi";
    else
        echo "Tidak ada progdi tersebut di fakultas TIK";
    ?>
    </h1>
    </body>
<html>