<?php
$id = $_GET['id']; 
$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn=$id");
if($query) {
    echo '<script>alert("Data Berhasil di Hapus."); location.href="index.php?page=siswa";</script>';
}else{
    echo '<script>alert("Data Gagal di Hapus."); location.href="index.php?page=siswa";</script>';
}
?>