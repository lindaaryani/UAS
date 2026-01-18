<?php
$id = $_GET['id']; 
$query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas=$id");
if($query) {
    echo '<script>alert("Data Berhasil di Hapus."); location.href="index.php?page=petugas";</script>';
}else{
    echo '<script>alert("Data Gagal di Hapus."); location.href="index.php?page=petugas";</script>';
}
?>