<?php include 'koneksi/connection.php'; ?>
<?php include 'include/java.php'; ?>

<?php
if(isset($_POST["submit"])){
    
    var_dump($_POST); die;
}

?>
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
                            <img
                                src="dist/img/AdminLTELogo.png"
                                alt="AdminLTE Logo"
                                class="brand-image img-circle elevation-3"
                                style="opacity: .8">
                            <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
                        </a>

                        <!-- Sidebar -->
                        <div class="sidebar">
                            <!-- Sidebar user panel (optional) -->
                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                                    alt="User Image"> -->
                                </div>
                                <div class="info">
                                    <a href="#" class="d-block"></a>
                                </div>
                            </div>

                            <!-- Sidebar Menu -->
                            <nav class="mt-2">
                                <ul
                                    class="nav nav-pills nav-sidebar flex-column"
                                    data-widget="treeview"
                                    role="menu"
                                    data-accordion="false">
                                    <!-- Add icons to the links using the .nav-icon class with font-awesome or any
                                    other icon font library -->
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
                                <div class="col-12"></div>
                            </div>
                        </div>
                        <?php
                            $q          = "SELECT max(kode_buku) AS maxKode FROM tb_perpustakaan";
                            $hasil      = mysqli_query($con, $q);
                            $data       = mysqli_fetch_array($hasil);
                            $kodeBuku   = $data['maxKode'];

                            // ambil angka/bilangan
                            $noUrut     = (int) substr($kodeBuku, 2, 3);

                            // bilangan ini di tambah satu
                            $noUrut++;

                            // membentuk kode baru
                            $char       = "B-";
                            $kode       = $char . sprintf("%03s", $noUrut);
                            // echo $kode;
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <b>Kode Buku:</b>
                            <input type="text" name="kode_buku" value="<?php echo $kode ?>" class="form-control" readonly><br /><br />
                            <b>Judul Buku:</b>
                            <input type="text" name="nama_buku" value="" class="form-control" require><br /><br />
                            <b>Keterangan:</b>
                            <input type="text" name="keterangan" value="" class="form-control"><br /><br />
                            <b>Upload File :</b>
                            <input type="file" name="namaFile" accept="application/pdf">
                            <button type="submit" name="proses" value="upload">Upload File</button>
                        </form>
                        <?php
                            $con = mysqli_connect("localhost","root","","db_perpustakaan");

                            if(isset($_POST['proses'])) {

                                $kode_buku   = $_POST['kode_buku'];
                                $nama_buku   = $_POST['nama_buku'];
                                $keterangan  = $_POST['keterangan'];
                                $directory   = "berkas/";
                                $file_name   = $_FILES['namaFile']['name'];
                                move_uploaded_file($_FILES['namaFile']['tmp_name'], $directory.$file_name);

                                mysqli_query($con, "INSERT INTO tb_perpustakaan SET file='$file_name', nama_buku='$nama_buku', keterangan='$keterangan', kode_buku='$kode_buku'");

                                echo "<b> File Berhasil Upload";
                            }
                        ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </section>
                    </div>
                    <!-- -->
                </body>
            </html>