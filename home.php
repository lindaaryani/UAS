<h1 class="h3 mb-3">Dashboard</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Selamat Datang di Aplikasi Pembayaran SPP</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td width="200">Nama User</td>
                        <td width="1">:</td>
                        <?php if(isset($_SESSION['user']['level'])): ?>
                        <td><?php echo $_SESSION['user']['nama_petugas']; ?></td>
                        <?php else : ?>
                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td width="200">Level User</td>
                        <td width="1">:</td>
                        <?php if(isset($_SESSION['user']['level'])) :?>
                        <td><?php echo $_SESSION['user']['level']; ?></td>
                        <?php else : ?>
                        <td>Siswa</td>
                        <?php endif;?>
                    </tr>
                    <tr>
                        <td width="200">Tanggal Login</td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y H:i:s'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>