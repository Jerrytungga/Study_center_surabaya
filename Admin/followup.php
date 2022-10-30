<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['pilihsemester'])){
    $semtr = $_POST['pilihsemester'];
    $tampilkan_data_follow_up = mysqli_query($conn,"SELECT * FROM `followup_kontakan` where `id_semester`='$semtr'");
} else {
    $tampilkan_data_follow_up = mysqli_query($conn,"SELECT * FROM `followup_kontakan` where `id_semester`='$smt'");
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
                        <h1 class="mt-4">Follow Up Kontakan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Follow Up Kontakan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Follow Up
                            </div>
                            <div class="card-body">
                            <form action="" method="Post" class="form-inline" id="form_id">
                                <Select class="ml-4 bg-primary text-light" name="pilihsemester"  onChange="document.getElementById('form_id').submit();">
                                    <option value="">Silahkan Pilih Semester</option>
                                    <?php
                                    $ambil_semester_ = mysqli_query($conn,"SELECT * FROM `semester`");
                                    while ($option_semester = mysqli_fetch_array($ambil_semester_)){ ?>
                                        <option value="<?= $option_semester['id_semester']?>"><?= $option_semester['semester']?></option>
                                    <?php }; ?>
                                </Select> 
                                </form><p></p>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Sarana</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Akhir</th>
                                            <th>Keterangan</th>
                                            <th>Traines</th>
                                            <th>Tanggal</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      function nama($name_kontakan)
                                      {
                                          global $conn;
                                          $sqly = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM data_kontakan WHERE id_kontakan='$name_kontakan'"));
                                          return $sqly['nama'];
                                      }
                                      function nama_traines($traines)
                                      {
                                          global $conn;
                                          $sqly1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM traines WHERE id_traines='$traines'"));
                                          return $sqly1['Nama'];
                                      }
                                    $i = 1;
                                    foreach ($tampilkan_data_follow_up as $row) :
                                    ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= nama($row['Nama_kontakan']); ?></td>
                                        <td><?= $row['Sarana']; ?></td>
                                        <td><?= $row['jam_mulai']; ?></td>
                                        <td><?= $row['jam_akhir']; ?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><?= nama_traines($row['traines']); ?></td>
                                        <td><?= $row['date']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
