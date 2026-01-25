<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");

echo "<script>
    alert('Data pembayaran berhasil dihapus');
    window.location='index.php?page=pembayaran';
</script>";
