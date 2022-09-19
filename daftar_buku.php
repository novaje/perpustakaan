<?php include 'koneksi/connection.php'; ?>
<?php include 'include/java.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> -->
          <li class="nav-item">
            <a href="daftar_buku.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                DAFTAR BUKU
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="upload_data.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                UPLOAD DATA
              </p>
            </a>
            
          </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb float-sm-right font-weight-light">
                        <ul class="breadcrumb-item">
                            <a href="dashboard">
                                <i class="fas fa-home"></i>
                            </a>
                        </ul>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- <div class="col-12"> -->
                  <div class="card-body" col="10">
                <table id="daftarbuku" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><center>JUDUL</center></th>
                      <th><center>KETERANGAN</center></th>
                      <th><center>FILE</center></th>
                      <th><center>ACTION</center></th>
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
                <td>
                    <?php
                      $query  = "SELECT * FROM tb_perpustakaan";
                      $run    = mysqli_query($con,$query);

                      while($rows = mysqli_fetch_assoc($run)) {
                    ?>
                  <a href="download.php?file=<?php echo $rows['file'] ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                  <a href="detail.php?id_perpustakaan=<?=$rows['id_perpustakaan']?>"> <i class="fa fa-eye" aria-hidden="true" aria-hidden="true"></i></a>
                  <a href="edit.php?id_perpustakaan=<?=$rows['id_perpustakaan']?>"> edit</a>
                  <a href="hapus.php"? onClick="return confirm(\'Apakah anda yakin ingin hapus?\')id_perpustakaan=<?=$rows['id_perpustakaan']?>"> hapus</a>
                  <?php
                      };
                    ?>
                </td>
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
</body>
</html>
