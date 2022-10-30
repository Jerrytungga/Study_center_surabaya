<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['pilihsemester'])){
    $semtr = $_POST['pilihsemester'];
    $tampilkan_data_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan` where `id_semester`='$semtr'");
} else {

    $tampilkan_data_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan` where `id_semester`='$smt'");
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
                        <h1 class="mt-4">List Kontakan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Kontakan</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Kontakan
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
                                            <th>JenisKelamin</th>
                                            <th>Alamat</th>
                                            <th>Sekolah</th>
                                            <th>kelas</th>
                                            <th>No Hp</th>
                                            <th>Agama</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Traines</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    function nama_traines($traines)
                                    {
                                        global $conn;
                                        $sqly1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM traines WHERE id_traines='$traines'"));
                                        return $sqly1['Nama'];
                                    }
                                $i = 1;
                                foreach ($tampilkan_data_kontakan as $row) :
                                ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['gender']; ?></td>
                                        <td><?= $row['alamat_rumah']; ?></td>
                                        <td><?= $row['nama_sekolah']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['no_hp']; ?></td>
                                        <td><?= $row['agama']; ?></td>
                                        <td><?= $row['date']; ?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><?= nama_traines($row['traines']); ?></td>
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
