<h1 class="h3 mb-3">Data Pembayaran</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="?page=pembayaran_tambah" class="btn btn-primary">+ Tambah Data</a>
                <hr>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pembayaran</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM pembayaran");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $data['nama_pembayaran']; ?> </td>
                            <td><?php echo $data['kompetensi_keahlian']; ?> </td>
                            <td>
                                <a href="?page=pembayaran_ubah&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-warning">Ubah</a>
                                <a href="?page=pembayaran_hapus&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- test commit -->