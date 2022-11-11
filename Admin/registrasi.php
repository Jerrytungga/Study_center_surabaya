<?php
include '../koneksi.php';
include 'session.php';


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
                        <h1 class="mt-4">Form Registrasi Study Center</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Registrasi Study Center</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header bg-danger">
                                Form Registrasi
                            </div>
                            <div class="card-body">
                            <div class="container">
  <div class="row">
    <div class="col">
      <div class="p-3 border bg-light">
             <div>
            <label for="">Nama :</label>
            <select name=""  id="">
            <option value="">Silahkan Pilih</option>
            <?php 
            $ambil_kontakan = mysqli_query($conn,"SELECT * FROM `data_kontakan`");
            while ($dapat_kontakan = mysqli_fetch_array($ambil_kontakan)) { ?>
            <option value="<?=$dapat_kontakan['id_kontakan'] ?>"><?=$dapat_kontakan['nama'] ?></option>
            <?php }
            ?>
            </select>
            </div>
         </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Gender :</label>
        <select name="gender" id="">
        <option value="">Silahkan Pilih</option>
        <option value="L">L</option>
        <option value="P">P</option>
        </select>
        </div>
         </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Jenis Pendaftaran :</label>
        <select name="dftr" id="">
        <option value="">Silahkan Pilih</option>
        <option value="Daftar Baru">Daftar Baru</option>
        <option value="Daftar Ulang">Daftar Ulang</option>
        </select>
        </div>
         </div>
         <div class="p-3 mt-2 border bg-light">
             <div>
                 <label for="">Nama Sekolah :</label>
                 <select name="dftr" id="">
                     <option value="">Silahkan Pilih</option>
                     <?php
            $nama_sekolah = mysqli_query($conn,"SELECT * FROM `sekolah`");
            while($tampilkan_sekolah = mysqli_fetch_array($nama_sekolah) ){ ?>
                <option value="<?= $tampilkan_sekolah['No'] ?>"><?= $tampilkan_sekolah['Nama_Sekolah'] ?></option>
                <?php }
        ?>
        </select>
    </div>
</div>
<div class="p-3 mt-2 border bg-light">
<div>
  <label for="">Agama :</label>
  <select name="dftr" id="">
  <option value="">Silahkan Pilih</option>
  <option value="Protestan">Protestan</option>
  <option value="Pantekosta">Pantekosta</option>
  <option value="Katolik">Katolik</option>
  <option value="Hindu">Hindu</option>
  <option value="Budha">Budha</option>
  </select>
  </div>
   </div>
<div class="p-3 mt-2 border bg-light">
<div>
  <label for="">Apakah Sudah dibaptis ? </label>
  <select name="dftr" id="">
  <option value="">Silahkan Pilih</option>
  <option value="Ya">Ya</option>
  <option value="Tidak">Tidak</option>
  </select>
  </div>
   </div>
   <div class="p-3 mt-2 border bg-light">
       <div>
           <label for="">Beribadah dimana ? </label>
           <input type="text">
        </div>
    </div>
    
    <div class="p-3 mt-2 border bg-light">
    <div>
      <label for="">Apakah beribadah bersama orang tua ? </label>
      <select name="dftr" id="">
      <option value="">Silahkan Pilih</option>
      <option value="Ya">Ya</option>
      <option value="Tidak">Tidak</option>
      </select>
      </div>
       </div>
</div>



<div class="col">
    <div class="p-3 border bg-light">
      <div>
        <label for="">Tempat Lahir :</label>
        <input type="text">
        </div>
      </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Tanggal Lahir :</label>
        <input type="date">
        </div>
      </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Nomor HP :</label>
        <input type="number">
        </div>
      </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Kelas :</label>
       <select name="" id="">
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
      </div>
      <div class="p-3 mt-2 border bg-light">
      <div>
        <label for="">Jurusan :</label>
       <select name="" id="">
        <option value="IPA">IPA</option>
        <option value="IPS">IPS</option>
        <option value="TKJ">TKJ</option>
        <option value="TSM">TSM</option>
        <option value="TKR">TKR</option>

       </select>
        </div>
      </div>



    </div>
   
    
  
  </div>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
