<?php
$id = $_GET['id'];

if(isset($_POST['nama_petugas'])){

    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas' , username='$username' , level='$level' WHERE id_petugas=$id");

    if($_POST['password'] != ""){
        $query = mysqli_query($koneksi, "UPDATE petugas SET password='$password'");
    }

    if($query) {
        echo '<script>alert("Ubah data berhasil")</script>';
    }else{
        echo '<script>alert("Ubah data gagal")</script>'; 
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM petugas WHERE id_petugas=$id");
$data = mysqli_fetch_array($query);

?>

<h1 class="h3 mb-3">Ubah Data Petugas</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="?page=petugas" class="btn btn-primary">Kembali</a>
                <hr>

                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">Nama Petugas</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['nama_petugas']; ?>" type="text" name="nama_petugas"></td>
                        </tr>
                        <tr>
                            <td width="200">Username</td>
                            <td width="1">:</td>
                            <td><input class="form-control" value="<?php echo $data['username']; ?>" type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td width="200">Password</td>
                            <td width="1">:</td>
                            <td><input class="form-control" type="password" name="password">
                            Jika password tidak diganti, maka kosongkan saja.
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Level</td>
                            <td width="1">:</td>
                            <td>
                                <select name="level" class= "form-select">
                                    <option <?php if($data['level'] == 'petugas') echo 'selected'; ?> value="petugas">Petugas</option>
                                    <option <?php if($data['level'] == 'admin') echo 'selected'; ?> value="admin">Administrator</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-success" type="submit">Simpan</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>