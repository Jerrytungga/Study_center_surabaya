<?php
include '../koneksi.php';
include 'session.php';
if (isset($_POST['save'])){
    $nama_sekolah = $_POST['nama_sekolah'];
    $alamat_sekolah = $_POST['alamat_sekolah'];
    $maps_sekolah = $_POST['maps_sekolah'];
    $nama_kecamatan = $_POST['nama_kecamatan'];
    $insert_datasekolah = mysqli_query($conn,"INSERT INTO `sekolah`(`Nama_Sekolah`, `Alamat`, `titik_Koordinat`, `id_kecamatan`) VALUES ('$nama_sekolah','$alamat_sekolah','$maps_sekolah','$nama_kecamatan')");
}

if(isset($_POST['hapus'])){
    $hapus = $_POST['hapus'];
    $insert_datahapus = mysqli_query($conn,"DELETE FROM `sekolah` WHERE `No`='$hapus'") or die("gagal". mysqli_error());
    if($insert_datahapus){
        echo "<script type='text/javascript'>
        alert('Data Berhasil Di Hapus!');
        </script>";
    }
}

if(isset($_POST['Kec'])){
    $kc = $_POST['Kec'];
    
    $tampilkan_data_sekolah = mysqli_query($conn,"SELECT * FROM `sekolah` where `id_kecamatan`='$kc'");
} else {

    $tampilkan_data_sekolah = mysqli_query($conn,"SELECT * FROM `sekolah`");
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
                        <h1 class="mt-4">Data Sekolah</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Sekolah</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-12">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Sekolah
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Input Data Sekolah
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header bg-dark text-light">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Data Sekolah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST">
                                    <div class="modal-body">
                                        <div>
                                            <label for="">Nama Sekolah :</label>
                                            <input type="text" name="nama_sekolah" class="form-control">
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Alamat Sekolah :</label>
                                            <textarea name="alamat_sekolah" class="form-control" id="" cols="10" rows="5"></textarea>
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Maps Sekolah :</label>
                                            <input type="text" name="maps_sekolah" class="form-control">
                                        </div>
                                        <p></p>
                                        <div>
                                            <label for="">Nama Daerah :</label>

                                            <select name="nama_kecamatan" id="">
                                                <option value="">Pilih Kecamatan</option>
                                                <?php
                                                $kecamatan = mysqli_query($conn,"SELECT * FROM `kecamatan`");
                                                while ($Kecamatan_ = mysqli_fetch_array($kecamatan)){ ?>
                                                    <option value="<?= $Kecamatan_['id_kec']?>"><?= $Kecamatan_['Nama_kecamatan']?></option>
                                                <?php }; ?>
                                            </select>
                                        </div>
                                        <p></p>
                                        
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
                                <Select class="ml-4 " name="wilaya"  onChange="document.getElementById('form_id').submit();">
                                    <option value="">Silahkan Pilih Wilaya</option>
                                    <?php
                                    $ambil_wilaya = mysqli_query($conn,"SELECT * FROM `wilaya`");
                                    while ($option_wilaya = mysqli_fetch_array($ambil_wilaya)){ ?>
                                        <option value="<?= $option_wilaya['id_w']?>"><?= $option_wilaya['Nama_wilaya']?></option>
                                    <?php }; ?>
                                </Select> 
                                <?php
                                if(isset($_POST['wilaya'])){ ?>
                                <Select class="ml-4 " name="Kec"  onChange="document.getElementById('form_id').submit();">
                                    <option value="">Pilih Kecamatan</option>
                                <?php
                                $ambil_kecamatan = mysqli_query($conn,"SELECT * FROM `kecamatan` where `id_w`='".$_POST['wilaya']."'");
                                while ($kecamatan = mysqli_fetch_assoc($ambil_kecamatan)){ ?>
                                <option value="<?= $kecamatan['id_kec']?>"><?= $kecamatan['Nama_kecamatan']?></option>
                                <?php } ?>
                                </select>
                                <?php } ?>
                                </form><p></p>
                             
                                <table id="example" class="display nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sekolah</th>
                                            <th>Alamat</th>
                                            <th>Maps Lokasi</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($tampilkan_data_sekolah as $row) :
                                        ?>
                                        <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $row['Nama_Sekolah']; ?></td>
                                        <td><?= $row['Alamat']; ?></td>
                                        <td>
                                        <a href="<?= $row['titik_Koordinat']; ?>"><?= $row['titik_Koordinat']; ?></a>
                                        </td>
                                       <td>
                                        <form action="" method="POST">
                                            <button type="submit" name="hapus" value="<?= $row['No']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus?')">Hapus</button>
                                        </form>
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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
      $(document).ready(function() {
        $('#example').DataTable( {
          dom: 'Bfrtip',
          buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
          ]
        } );
      } );
      </script>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    
    </body>
</html>
