<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['simpan'])){
$nm = $_POST['nama_kontakan'];
$gdr = $_POST['gender'];
$alamat = $_POST['alamat'];
$sklh = $_POST['sklh'];
$kelas = $_POST['kelas'];
$tlpn = $_POST['tlpn'];
$agama = $_POST['agama'];
$tanggal = $_POST['tanggal'];
$traines = $_POST['traines'];
$reg = $_POST['reguler'];
$insert_kontakan = mysqli_query($conn,"INSERT INTO `data_kontakan`( `nama`, `gender`, `alamat_rumah`, `nama_sekolah`, `kelas`, `no_hp`, `agama`, `date`, `keterangan`, `traines`, `id_semester`) VALUES ('$nm','$gdr','$alamat','$sklh','$kelas','$tlpn','$agama','$tanggal','$reg','$traines','$smt')");
if($insert_kontakan){
    echo "<script type='text/javascript'>
    alert('Data Berhasil Di Simpan!');
    </script>";
} else {
    echo "<script type='text/javascript'>
    alert('Data Gagal Di Simpan!');
    </script>";
}
}


if(isset($_POST['pilihsemester'])){
    $semtr = $_POST['pilihsemester'];
    $tampilkan_data_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan` where `id_semester`='$semtr' and `traines`='$idtraines'");
} else {
    $tampilkan_data_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan` where `id_semester`='$smt' and `traines`='$idtraines' ORDER BY id_kontakan DESC");
}
error_reporting(E_ALL ^ E_NOTICE);
$Reguler = mysqli_query($conn,"SELECT * FROM `reguler` where `status`='Aktif'");
$id_reguler = mysqli_fetch_array($Reguler);

?>
<!DOCTYPE html>
<html lang="en">
<?php
    include 'head.php';
   ?>
    <body class="sb-nav-fixed">
    <?php
    include 'topbar.php';
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
                                DataTable Kontakan <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Input Data Kontakan
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header bg-success text-light">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Data Kontakan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="modal-body">
                                        <div>
                                            <label for="">Nama Kontakan :</label>
                                            <input type="hidden" name="traines" value="<?= $idtraines; ?>">
                                            <input type="hidden" name="reguler" value="<?= $id_reguler['keterangan']; ?>">
                                            <input type="text" require class="form-control" name="nama_kontakan">
                                        </div>
                                        <p></p>
                                        <div class="mt-1">
                                            <label for="">Jenis Kelamin :</label>
                                            <select name="gender" require class="form-control" id="">
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Alamat :</label>
                                            <textarea require class="form-control" name="alamat" id="" cols="10" rows="4"></textarea>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Sekolah :</label>
                                            <select name="sklh" require class="form-control" id="">
                                                <option value="">Silahkan Pilih</option>
                                                <?php
                                                $data_sekolah = mysqli_query($conn,"SELECT * FROM `sekolah`");
                                                while ($ambil_data = mysqli_fetch_array($data_sekolah)){ ?>
                                                    <option value="<?= $ambil_data['No']?>"><?= $ambil_data['Nama_Sekolah']?></option>
                                               <?php }
                                                ?>
                                            </select>
                                        </div>
                                            <p></p>
                                        <div>
                                            <label for="">Kelas :</label>
                                           <select require class="form-control" name="kelas" id="">
                                            <option value="">Silahkan Pilih</option>
                                            <option value="7 SMP">7 SMP</option>
                                            <option value="8 SMP">8 SMP</option>
                                            <option value="9 SMP">9 SMP</option>
                                            <option value="10 SMA">10 SMA</option>
                                            <option value="11 SMA">11 SMA</option>
                                            <option value="12 SMA">12 SMA</option>
                                            <option value="10 SMK">10 SMK</option>
                                            <option value="11 SMK">11 SMK</option>
                                            <option value="12 SMK">12 SMK</option>
                                           </select>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">No Hp :</label>
                                            <input require class="form-control" type="number" name="tlpn">
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Agama :</label>
                                            <select require class="form-control" name="agama" id="">
                                            <option for="">Silahkan Pilih</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            </select>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Tanggal :</label>
                                            <input require class="form-control" type="date" name="tanggal" id="">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>

                            </div>
                            <div class="card-body">
                            <form action="" method="Post" class="form-inline" id="form_id">
                                <Select class="ml-4 bg-success text-light" name="pilihsemester"  onChange="document.getElementById('form_id').submit();">
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
                                            <!-- <th>Jumlah Perawatan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
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
                                            <!-- <td>
                                                <?php
                                                $tampilkan_count = mysqli_query($conn,"SELECT COUNT(Nama_kontakan) as Total FROM `followup_kontakan` where `id_semester`='$smt' and `traines`='$idtraines' and `Nama_kontakan`='".$row['id_kontakan']."'");
                                                $jumlah = mysqli_fetch_array($tampilkan_count);
                                                $tampilkan_count1 = mysqli_query($conn,"SELECT * FROM `followup_kontakan` where `id_semester`='$smt' and `traines`='$idtraines'");
                                                while ( $ada_kontak = mysqli_fetch_array($tampilkan_count1)) {
                                                    if($row['id_kontakan'] == $ada_kontak['Nama_kontakan']){ ?>
                                                    <button class="btn btn-danger"><?= $jumlah['Total'];?></button>
                                                 <?php } ?>
                                                <?php } ?>
                                            </td> -->
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
