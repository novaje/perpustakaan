<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan</title>
  <link rel="shortcut icon" href="logo_rs.png" />
  <a href="daftar_buku.php"> <input type="button" class="btn btn-primary btn-sm" value='Kembali'></a>
  </head>
</html>

<?php
    //ambil id
    $kode_buku = $_GET['kode_buku'];

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
    $query  = "SELECT * FROM tb_perpustakaan WHERE kode_buku='$kode_buku'";
    //hasil
    $hasil  = $con->query($query);

    //uraikan tb_perpust
    $row = $hasil->fetch_assoc();
?>

                <!-- <div class="col-12"> -->
                  <!-- <div class="card-body" col="10">
                <table border = "1" id="daftarbuku" class="table table-bordered table-hover">
                  <thead>
                    <tr> -->
                      <h2><u>DETAIL BUKU</u></h2>
                      <table border="0" cellpadding="4">
                    <tr>
                      <th><center>KODE BUKU</center></th>
                      <th><center>JUDUL</center></th>
                      <th><center>KETERANGAN</center></th>
                      <th><center>FILE</center></th>
                    </tr>
              </thead>
              <tbody>
              <?php
                $ambildata  = (mysqli_query($con,"SELECT * FROM tb_perpustakaan WHERE kode_buku='$kode_buku'"));
                while($data=mysqli_fetch_array($ambildata)){
                ?>
            <tr>
                <td><center><?=$data['kode_buku']?></center></td>
                <td><center><?=$data['nama_buku']?></center></td>
                <td><center><?=$data['keterangan']?></center></td>
                <td><center><?=$data['file']?></center></td>
            </tr>
            <?php
        };
          ?>
        </tbody>
                  </table>
              </div>
          </div>
      </div>
  </section>
</div>
  <!--  -->
<script>
  $(document).ready(function () {
    $('#daftarbuku').DataTable();
});
</script>