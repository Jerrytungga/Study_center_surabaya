<?php
include '../koneksi.php';
include 'session.php';

if(isset($_POST['edit_status_R'])){
    $ket_r = $_POST['edit_status_R'];
    $mys = mysqli_query ($conn, "UPDATE `hak_akses` SET `akses_hapus` = '$ket_r' WHERE `hak_akses`.`id` = 1");
    
}

?>

<!DOCTYPE html>
<html lang="en">
   <?php
    include 'head.php';
   ?>
    <body class="sb-nav-fixed">
    <?php
    include 'navbar.php';
   ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php
                    include 'sidebar.php';
                ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Fitur Akses</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-light shadow mb-4">
                                    <div class="card-body">Aktifkan Fitur Hapus Data Kontakan
                                        <form action="" method="POST">
                            
                                                <?php
                                                $data_akses = mysqli_fetch_array(mysqli_query($conn,"SELECT `akses_hapus` FROM `hak_akses`"));
                                                if($data_akses['akses_hapus'] == '1'){ ?>
                                                     <button type="submit" class="btn btn-danger" name="edit_status_R" value="0">Tidak Aktif</button>
                                               <?php } else { ?>
                                                <button type="submit" class="btn btn-success" name="edit_status_R" value="1">Aktif</button>
                                              <?php }
                                                ?>
                                            
                                            </form>
                                   
                                </div>
                                </div>
                            </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
