<?php
$data = new Admin($database->conn);
$data->lihat($_SESSION['username']);

if (isset($_POST['submit'])) {
    $data->rubah($_POST['username'], md5($_POST['password']));
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <form action="" method="POST" accept-charset="utf-8">
        <h2>Halaman Akun</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="nama" placeholder="<?php echo $data->nama; ?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="alamat" placeholder="<?php echo $data->alamat; ?>"></td>
            </tr>
            <tr>
                <td><label for="jk">Jenis Kelamin</label></td>
                <td></td>
                <td>
                <select name="jk" class="form-control">
                <?php
                        if ($data->jenis_kelamin=="L") {
                            echo '
                    <option value="L" selectded>Laki-Laki</option>
                    <option value="P">Perempuan</option>';
                        } else {
                            echo '
                    <option value="P" selectded>Perempuan</option>
                    <option value="L">Laki-Laki</option>';
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td></td>
                <td><textarea class="form-control" name="alamat"><?php echo $data->alamat; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="agama">Agama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="agama" placeholder="<?php echo $data->agama; ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="email" placeholder="<?php echo $data->email; ?>"></td>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="username" placeholder="<?php echo $data->username; ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td></td>
                <td><input type="password" class="form-control" name="password" placeholder="Isikan Password Anda !"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>