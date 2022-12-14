<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['edit_status'])){
    $id_smtr = $_POST['id_ss'];
    $ket_smtr = $_POST['edit_status'];
    $mys = mysqli_query ($conn, "UPDATE `semester` SET `keterangan` = '$ket_smtr' WHERE `semester`.`id_semester` ='$id_smtr'");
    
}
if(isset($_POST['edit_status_R'])){
    $id_r = $_POST['id_r'];
    $ket_r = $_POST['edit_status_R'];
    $mys = mysqli_query ($conn, "UPDATE `reguler` SET `status` = '$ket_r' WHERE `reguler`.`id_r` ='$id_r'");
    
}
$semester_ = mysqli_query($conn, "SELECT * FROM `semester`");
$Reg_ = mysqli_query($conn, "SELECT * FROM `reguler`");
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
                        <h1 class="mt-4">Semester & Reguler</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Semester & Reguler</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4 shadow">
                            <div class="card-header bg-warning">
                                <i class="fas fa-table me-1"></i>
                                DataTable Semester
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                $i = 1;
                                foreach ($semester_ as $row) :
                                ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['semester']; ?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><form action="" method="POST">
                                            <input type="hidden" name="id_ss" value="<?= $row['id_semester']; ?>">
                                            <?php
                                            if($row['keterangan'] == 'Aktif'){ ?>
                                                 <button type="submit" class="btn btn-danger" name="edit_status" value="Tidak Aktif">Tidak Aktif</button>
                                           <?php } else { ?>
                                            <button type="submit" class="btn btn-success" name="edit_status" value="Aktif">Aktif</button>
                                          <?php }
                                            ?>

                                           
                                        </form></td>
                                       
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="card mb-4 shadow">
                            <div class="card-header bg-danger text-light">
                                <i class="fas fa-table me-1"></i>
                                DataTable Minggu Reguler
                            </div>
                            <div class="card-body">
                            <table id="example1" class="table table-striped" >
                            <thead>
                                <tr>
                                    <th>Keterangan Reguler</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                
                                foreach ($Reg_ as $row1) :
                                ?>
                                <tr>
                                    <td><?= $row1['keterangan']?></td>
                                    <td><?= $row1['status']?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id_r" value="<?= $row1['id_r']; ?>">
                                            <?php
                                            if($row1['status'] == 'Aktif'){ ?>
                                                 <button type="submit" class="btn btn-danger" name="edit_status_R" value="Tidak Aktif">Tidak Aktif</button>
                                           <?php } else { ?>
                                            <button type="submit" class="btn btn-success" name="edit_status_R" value="Aktif">Aktif</button>
                                          <?php }
                                            ?>
                                        
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                               
                                        <?php endforeach; ?>
                            </table>
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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
        <script>
                $(document).ready(function () {
                 $('#example1').DataTable();
                 });
        </script>
    </body>
</html>
