<?php
$id = $_GET['id']; 
$query = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp=$id");
if($query) {
    echo '<script>alert("Data Berhasil di Hapus."); location.href="index.php?page=spp";</script>';
}else{
    echo '<script>alert("Data Gagal di Hapus."); location.href="index.php?page=spp";</script>';
}
?>