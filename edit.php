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
    $query  = "SELECT * FROM tb_perpustakaan WHERE id_perpustakaan='$id_perpustakaan'";
    //hasil
    $hasil  = $con->query($query);

    //uraikan tb_perpust
    $row = $hasil->fetch_assoc();
?>

        <form action="" method="POST" enctype="multipart/form-data">
            <b>Judul Buku:</b>
            <input type="text" name="nama_buku" value="<?php echo $row['nama_buku'] ?>" placeholder=""><br /><br />
            <b>Keterangan:</b>
            <input type="text" name="keterangan" value="<?php echo $row['keterangan'] ?>" placeholder=""><br /><br />
            <b>Upload File :</b>
            <input type="file" name="namaFile" accept="application/pdf">
            <button type="submit" name="proses" value="upload">Upload File</button>
         </form>
  <!--  -->
<script>
  $(document).ready(function () {
    $('#daftarbuku').DataTable();
});
</script>