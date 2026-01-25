<?php
$id = $_GET['id']; 
$query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas=$id");
if($query) {
    echo '<script>alert("Data Berhasil di Hapus."); location.href="index.php?page=kelas";</script>';
}else{
    echo '<script>alert("Data Gagal di Hapus."); location.href="index.php?page=kelas";</script>';
}
?>