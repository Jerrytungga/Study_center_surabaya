<?php
include '../koneksi.php';
include 'session.php';
if(isset($_POST['save'])){
    $kontakan = $_POST['kontakan'];
    $sarana = $_POST['sarana'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_akhir = $_POST['jam_akhir'];
    $des = $_POST['des'];
    $tanggal = $_POST['tanggal'];
    $pengajak = $_POST['traines'];
    $semester_aktif = $_POST['semester_aktif'];
    $insert_data = mysqli_query($conn,"INSERT INTO `followup_kontakan`(`Nama_kontakan`, `Sarana`, `jam_mulai`, `jam_akhir`, `keterangan`, `traines`, `date`, `id_semester`) VALUES ('$kontakan','$sarana','$jam_mulai','$jam_akhir','$des','$pengajak','$tanggal','$semester_aktif')");
    if($insert_data){
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
    $tampilkan_data_follow_up = mysqli_query($conn,"SELECT * FROM `followup_kontakan` where `id_semester`='$semtr' AND `traines`='$idtraines'");
} else {
    $tampilkan_data_follow_up = mysqli_query($conn,"SELECT * FROM `followup_kontakan` where `id_semester`='$smt' AND `traines`='$idtraines'");
}
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
                        <h1 class="mt-4">Follow Up Kontakan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Follow Up Kontakan</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Follow Up
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Input Follow Up
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header bg-success text-light">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Follow Up Kontakan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="modal-body">
                                        <div>
                                            <label for="">Kontakan :</label>
                                            <input type="hidden" name="traines" value="<?=$idtraines?>">
                                            <input type="hidden" name="semester_aktif" value="<?= $smt ?>">
                                            <select name="kontakan" class="form-control" id="">
                                                <option value="">Pilih Kontakan</option>
                                                <?php
                                                    $ambil_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan` where `traines`='$idtraines'");
                                                    while ($tampilkan = mysqli_fetch_array($ambil_kontakan)){ ?>
                                                        <option value="<?= $tampilkan['id_kontakan'];?>"><?= $tampilkan['nama']; ?></option>
                                                  <?php  }
                                                ?>
                                            </select>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Sarana Kontak:</label>
                                            <select name="sarana" class="form-control "id="">
                                                <option value="">Pilih Sarana</option>
                                                <option value="Telepon">Telepon</option>
                                                <option value="Wa Voice Call">Wa Voice Call</option>
                                                <option value="Wa Video Call">Wa Video Call</option>
                                                <option value="Video Conference">Video Conference (zoom/google meet)</option>
                                                <option value="Tatap Muka">Tatap Muka</option>
                                                <option value="Chatting">Chatting</option>
                                            </select>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Jam Mulai - jam akhir :</label>
                                            <input type="time" name="jam_mulai" id=""> - <input type="time" name="jam_akhir" id="">
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Keterangan :</label>
                                            <textarea name="des" class="form-control" id="" cols="4" rows="6"></textarea>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Tanggal :</label>
                                            <input type="date" class="form-control" name="tanggal" id="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
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
                                            <th>Durasi Kontak</th>
                                            <th>Keterangan</th>
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
                                $i = 1;
                                foreach ($tampilkan_data_follow_up as $row) :
                                ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= nama($row['Nama_kontakan']); ?></td>
                                        <td><?= $row['Sarana']; ?></td>
                                        <td><?= $row['jam_mulai']; ?></td>
                                        <td><?= $row['jam_akhir']; ?></td>
                                        <td>
                                            <?php
                                            $awal  = strtotime($row['jam_mulai']); //waktu awal
                                            $akhir = strtotime($row['jam_akhir']); //waktu akhir
                                            $diff  = $akhir - $awal;
                                            $jam   = floor($diff / (60 * 60));
                                            $menit = $diff - $jam * (60 * 60);
                                            echo ' ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';
                                             ?>
                                        </td>
                                        <td><?= $row['keterangan']; ?></td>
                                      
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
