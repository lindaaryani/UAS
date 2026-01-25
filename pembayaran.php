<?php
include "koneksi.php";
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Data Pembayaran</h5>
        <a href="index.php?page=pembayaran_tambah" class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "
                SELECT 
                    pembayaran.id_pembayaran,
                    pembayaran.nisn,
                    siswa.nama,
                    pembayaran.bulan_dibayar,
                    pembayaran.tahun_dibayar,
                    pembayaran.tgl_bayar,
                    pembayaran.jumlah_bayar
                FROM pembayaran
                JOIN siswa ON pembayaran.nisn = siswa.nisn
                ORDER BY pembayaran.id_pembayaran DESC
            ");

            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nisn'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['bulan_dibayar'] ?></td>
                    <td><?= $data['tahun_dibayar'] ?></td>
                    <td><?= $data['tgl_bayar'] ?></td>
                    <td>Rp <?= number_format($data['jumlah_bayar'],0,',','.') ?></td>
                    <td>
                        <a href="index.php?page=pembayaran_ubah&id=<?= $data['id_pembayaran'] ?>"
                           class="btn btn-warning btn-sm">
                           Ubah
                        </a>

                        <a href="index.php?page=pembayaran_hapus&id=<?= $data['id_pembayaran'] ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')"
                           class="btn btn-danger btn-sm">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>
