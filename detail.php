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

                <!-- <div class="col-12"> -->
                  <div class="card-body" col="10">
                <table border = "1" id="daftarbuku" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><center>JUDUL</center></th>
                      <th><center>KETERANGAN</center></th>
                      <th><center>FILE</center></th>
                    </tr>
              </thead>
              <tbody>
              <?php
                $ambildata  = (mysqli_query($con,"SELECT * FROM tb_perpustakaan"));
                while($data=mysqli_fetch_array($ambildata)){
                ?>
            <tr>
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