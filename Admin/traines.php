<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['insert'])){
    $insert_nama = $_POST['nama_traines'];
    $insert_username = $_POST['Username_traines'];
    $insert_sandi = $_POST['Password_traines'];
    $masukan_data = mysqli_query($conn,"INSERT INTO `traines`(`Nama`, `username`, `password`,`id_semester`) VALUES ('$insert_nama','$insert_username','$insert_sandi','$smt')");
    if($masukan_data){
        echo "<script type='text/javascript'>
        alert('Data Berhasil Di Tambahkan!');
        </script>";
    }
}
if(isset($_POST['pilihsemester'])){
    $semtr = $_POST['pilihsemester'];
    $tampilkan_data_traines = mysqli_query($conn,"SELECT * FROM `traines`where `id_semester`='$semtr'  ORDER BY `traines`.`date` DESC");
} else {

    $tampilkan_data_traines = mysqli_query($conn,"SELECT * FROM `traines` where `id_semester`='$smt'  ORDER BY `traines`.`date` DESC");
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
                        <h1 class="mt-4">List Traines</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">List Traines</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Traines 
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#traines">
                                Tambah Traines
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="traines" tabindex="-1" aria-labelledby="trainesLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="trainesLabel">Input Data Traines</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                    <div class="modal-body">
                                        <div>
                                            <label for="nama">Nama :</label>
                                            <input type="text" name="nama_traines" class="form-control">
                                        </div>
                                        <div>
                                            <label for="nama" class="mt-2">Username :</label>
                                            <input type="text" name="Username_traines" class="form-control">
                                        </div>
                                        <div>
                                            <label for="nama" class="mt-2">Password :</label>
                                            <input type="text" name="Password_traines" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" name="insert" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="" method="Post" class="form-inline" id="form_id">
                                <Select class="ml-4 " name="pilihsemester"  onChange="document.getElementById('form_id').submit();">
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
                                            <th>username</th>
                                            <th>password</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                $i = 1;
                                foreach ($tampilkan_data_traines as $row) :
                                ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['Nama']; ?></td>
                                        <td><?= $row['username']; ?></td>
                                        <td><?= $row['password']; ?></td>
                                       
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
