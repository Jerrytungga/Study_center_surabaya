<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['simpan_perubahan'])){
    $edit_nama = $_POST['name'];
    $edit_username = $_POST['username'];
    $edit_sandi = $_POST['sandi'];
    $id = $_POST['id1'];
    $perubahan_data = mysqli_query($conn,"UPDATE `traines` SET `Nama`='$edit_nama',`username`='$edit_username',`password`='$edit_sandi',`id_semester`='$smt' WHERE `id_traines`='$id'");
    if($perubahan_data){
        echo "<script type='text/javascript'>
        alert('Data Berhasil Di Edit !');
        </script>";
    }
}
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
                                            <th>opsi</th>
                                           
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
                                        <td>
                                        <button id="edit" type="button" class="btn btn-warning" data-id_traines="<?= $row['id_traines']; ?>" data-nama_traines="<?= $row['Nama']; ?>" data-username="<?= $row['username']; ?>" data-sandi="<?= $row['password']; ?>" data-bs-toggle="modal" data-bs-target="#edit_traines">
                                        Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit_traines" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Traines</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                            <div class="modal-body" id="modal-edit">
                                                <div>
                                                    <label for="">Nama :</label>
                                                    <input type="text" class="form-control" id="nama_traines" name="name">
                                                    <input type="hidden" class="form-control" id="id_traines" name="id1">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Username :</label>
                                                    <input type="text" class="form-control" id="username" name="username">
                                                </div>
                                                <div>
                                                    <label class="mt-2" for="">Password :</label>
                                                    <input type="text" class="form-control" id="sandi" name="sandi">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="simpan_perubahan" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                        </td>
                                       
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
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script>
              $(document).on("click", "#edit", function() {
            var nama_traines = $(this).data('nama_traines');
            var sandi = $(this).data('sandi');
            var username = $(this).data('username');
            var id_traines = $(this).data('id_traines');
            $("#modal-edit #id_traines").val(id_traines);
            $("#modal-edit #username").val(username);
            $("#modal-edit #nama_traines").val(nama_traines);
            $("#modal-edit #sandi").val(sandi);

            });
        </script>
    </body>
</html>
