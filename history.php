<h1 class="h3 mb-3"> Entri Data Pembayaran</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td width="200">Petugas</td>
                        <td width="1">:</td>
                        <td>
                            <select name="id_petugas" class="form-select">
                                <?php
                                    $p = mysqli_query($koneksi, "SELECT*FROM petugas");
                                    while ($petugas = mysqli_fetch_array($p)){
                                        ?>
                                        <option value="<?php echo $petugas['id_petugas']; ?>"><?php echo $petugas['nama_petugas']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Siswa</td>
                        <td width="1">:</td>
                        <td>
                            <select name="nisn" class="form-select">
                                <?php
                                    $p = mysqli_query($koneksi, "SELECT*FROM siswa");
                                    while ($petugas = mysqli_fetch_array($p)){
                                        ?>
                                        <option value="<?php echo $petugas['nisn']; ?>"><?php echo $siswa['nama']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>