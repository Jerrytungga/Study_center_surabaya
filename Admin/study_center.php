<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['pilihsemester'])){
    $semtr = $_POST['pilihsemester'];
    $tampilkan_data_sc = mysqli_query($conn,"SELECT * FROM `sc` where `Beribadah_di`='$semtr'");
} else {
    $tampilkan_data_sc = mysqli_query($conn,"SELECT * FROM `sc`");
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
                        <h1 class="mt-4">Study Center</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Study Center</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable SC <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Form Registrasi SC
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header bg-dark text-light">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Registrasi SC</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <label for="">Nama Lengkap : </label>
                                            <input type="text" class="form-control" id="txtNama">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="" method="Post" class="form-inline" id="form_id">
                                <Select class="ml-4 bg-primary text-light" name="pilihsemester"  onChange="document.getElementById('form_id').submit();">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="GSJK">GSJK</option>
                                   
                                </Select> 
                                </form><p></p>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>JenisKelamin</th>
                                            <th>Pendaftaran</th>
                                            <th>No WA</th>
                                            <th>Nama Sekolah</th>
                                            <th>Kelas</th>
                                            <th>Jurusan</th>
                                            <th>baptis</th>
                                            <th>tempat ibadah</th>
                                            <th>Pengajak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                $i = 1;
                                foreach ($tampilkan_data_sc as $row) :
                                ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['Nama_Lengkap']; ?></td>
                                        <td><?= $row['Jenis_Kelamin']; ?></td>
                                        <td><?= $row['Pendaftaran']; ?></td>
                                        <td><?= $row['No_HP_WA']; ?></td>
                                        <td><?= $row['Nama_Sekolah']; ?></td>
                                        <td><?= $row['Kelas']; ?></td>
                                        <td><?= $row['Jurusan_SMA_k']; ?></td>
                                        <td><?= $row['Apakah_sudah_di_baptis']; ?></td>
                                        <td><?= $row['Beribadah_di']; ?></td>
                                        <td><?= $row['Siapa_yang_mengajak_kamu_untuk_ikut_Study_Center']; ?></td>
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
