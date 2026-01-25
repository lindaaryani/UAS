<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT * FROM pembayaran WHERE id_pembayaran='$id'
"));

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "
        UPDATE pembayaran SET
        bulan_dibayar='$_POST[bulan_dibayar]',
        tahun_dibayar='$_POST[tahun_dibayar]',
        tgl_bayar='$_POST[tgl_bayar]',
        jumlah_bayar='$_POST[jumlah_bayar]'
        WHERE id_pembayaran='$id'
    ");

    echo "<script>
        alert('Data berhasil diubah');
        window.location='index.php?page=pembayaran';
    </script>";
}
?>

<form method="post">
    <div class="mb-3">
        <label>Bulan</label>
        <input type="text" name="bulan_dibayar"
               value="<?= $data['bulan_dibayar'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun</label>
        <input type="number" name="tahun_dibayar"
               value="<?= $data['tahun_dibayar'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tgl_bayar"
               value="<?= $data['tgl_bayar'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah_bayar"
               value="<?= $data['jumlah_bayar'] ?>" class="form-control">
    </div>

    <button name="update" class="btn btn-primary">Update</button>
    <a href="index.php?page=pembayaran" class="btn btn-secondary">Kembali</a>
</form>
