<?php
session_start();
if (!isset($_SESSION['id'])) {
  echo "<script type='text/javascript'>
  alert('Anda harus login terlebih dahulu!');
  window.location = '../index.php'
</script>";
} else {
  $id = $_SESSION['id'];
  $get_data = mysqli_query($conn, "SELECT * FROM traines WHERE id_traines='$id'");
  $data = mysqli_fetch_array($get_data);
  $idtraines =$data['id_traines'];
  $namaTraines = $data['Nama'];
  $ambil_semester = mysqli_query($conn,"SELECT * FROM `semester` WHERE keterangan='Aktif'");
  $semester_aktif = mysqli_fetch_array($ambil_semester);
  $smt =$semester_aktif['id_semester'];
  $ambil_reguler = mysqli_query($conn,"SELECT * FROM `reguler` WHERE status='Aktif'");
  $reguler_aktif = mysqli_fetch_array($ambil_reguler);
  $r =$reguler_aktif['id_r'];
}

?>
