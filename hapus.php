<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan</title>
  <link rel="shortcut icon" href="logo_rs.png" />
  </head>
</html>

<?php
    //ambil id
    $id_perpustakaan = $_GET['id_perpustakaan'];

    // echo $id_perpustakaan;

    //variabel koneksi
    $host   = 'localhost';
    $user   = 'root';
    $pass   = '';
    $dbname = 'db_perpustakaan';

    //koneksi
    $con = mysqli_connect($host,$user,$pass,$dbname);

    //cek db
    if ($con->connect_error) {
        die("Connection Failed: " . $con->connect_error);
    }

    //query
    $query  = "DELETE FROM tb_perpustakaan WHERE id_perpustakaan='$id_perpustakaan'";
    //hasil
    $hasil  = $con->query($query);

    echo    "<p><b> Data Berhasil dihapus</b> </p>";
    echo    "<meta http-equiv=refresh content=2;URL='daftar_buku.php'>";
?>