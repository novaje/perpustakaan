<?php
    //ambil id
    $id_perpustakaan = $_GET['id_perpustakaan'];

    // echo $id_perpustakaan;

    //variabel koneksi
    $host = 'localhost';
    $user = 'root';
    $pass = '';
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

?>