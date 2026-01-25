<?php
include "koneksi.php";
?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">History Pembayaran</h5>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Petugas</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $no = 1;

            $query = mysqli_query($koneksi, "
    SELECT 
        pembayaran.*,
        siswa.nama AS nama_siswa,
        petugas.nama_petugas
    FROM pembayaran
    LEFT JOIN siswa ON pembayaran.nisn = siswa.nisn
    LEFT JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
    ORDER BY pembayaran.tgl_bayar DESC
");


            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_petugas'] ?></td>
                    <td><?= $data['nisn'] ?></td>
                    <td><?= $data['nama_siswa'] ?></td>
                    <td><?= $data['bulan_dibayar'] ?></td>
                    <td><?= $data['tahun_dibayar'] ?></td>
                    <td><?= $data['tgl_bayar'] ?></td>
                    <td>Rp <?= number_format($data['jumlah_bayar'],0,',','.') ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>

    </div>
</div>
