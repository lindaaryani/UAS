<?php
include "koneksi.php";

/* =========================
   PROSES SIMPAN DATA
========================= */
if (isset($_POST['simpan'])) {

    $nisn          = $_POST['nisn'];
    $bulan_dibayar = $_POST['bulan_dibayar'];
    $tahun_dibayar = $_POST['tahun_dibayar'];
    $tgl_bayar     = $_POST['tgl_bayar'];
    $jumlah_bayar  = $_POST['jumlah_bayar'];

    // Validasi sederhana
    if ($nisn == "") {
        echo "<script>alert('Siswa belum dipilih');</script>";
    } else {
        mysqli_query($koneksi, "
            INSERT INTO pembayaran 
            (nisn, bulan_dibayar, tahun_dibayar, tgl_bayar, jumlah_bayar)
            VALUES
            ('$nisn','$bulan_dibayar','$tahun_dibayar','$tgl_bayar','$jumlah_bayar')
        ");

        // WAJIB redirect agar tidak double insert
        echo "<script>
            alert('Pembayaran berhasil disimpan');
            window.location='index.php?page=pembayaran';
        </script>";
        exit;
    }
}
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Transaksi Pembayaran</h5>
    </div>

    <div class="card-body">
        <form method="post">

            <!-- NAMA SISWA -->
            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select name="nisn" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    <?php
                    $siswa = mysqli_query($koneksi, "SELECT nisn, nama FROM siswa");
                    while ($s = mysqli_fetch_assoc($siswa)) {
                        echo "<option value='$s[nisn]'>$s[nisn] - $s[nama]</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- BULAN -->
            <div class="mb-3">
                <label class="form-label">Bulan Dibayar</label>
                <select name="bulan_dibayar" class="form-control" required>
                    <option value="">-- Pilih Bulan --</option>
                    <?php
                    $bulan = [
                        "Januari","Februari","Maret","April","Mei","Juni",
                        "Juli","Agustus","September","Oktober","November","Desember"
                    ];
                    foreach ($bulan as $b) {
                        echo "<option value='$b'>$b</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- TAHUN -->
            <div class="mb-3">
                <label class="form-label">Tahun Dibayar</label>
                <input type="number" name="tahun_dibayar" class="form-control"
                       value="<?= date('Y') ?>" required>
            </div>

            <!-- TANGGAL -->
            <div class="mb-3">
                <label class="form-label">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control"
                       value="<?= date('Y-m-d') ?>" required>
            </div>

            <!-- JUMLAH -->
            <div class="mb-3">
                <label class="form-label">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" class="form-control"
                       placeholder="Masukkan nominal" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">
                Simpan Pembayaran
            </button>

            <a href="index.php?page=pembayaran" class="btn btn-secondary">
                Kembali
            </a>

        </form>
    </div>
</div>
