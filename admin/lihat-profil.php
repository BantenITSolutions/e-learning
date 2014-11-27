<?php
$data = new Admin($database->conn);
$data->lihat($_SESSION['username']);

if (isset($_POST['submit'])) {
    $data->rubah($_POST['username'], md5($_POST['password']));
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <table class="table table-responsive table-hover">
        <tbody>
            <tr>
                <td>Nama</td>
                <td></td>
                <td><?php echo $data->nama; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td></td>
                <td><?php echo $data->alamat; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td></td>
                <td><?php echo $data->tgl_lahir; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td></td>
                <td><?php
                        if ($data->jenis_kelamin=="L") {
                            echo "Laki-Laki";
                        } else {
                            echo "Perempuan";
                        }
                    ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td></td>
                <td><?php echo $data->agama; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td></td>
                <td><?php echo $data->email; ?></td>
            </tr>
        </tbody>
    </table>

    <form action="" method="POST" accept-charset="utf-8">
        <h2>Rubah Password</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for="username">Username</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="username" placeholder="<?php echo $data->username; ?>"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td></td>
                <td><input type="password" class="form-control" name="password" placeholder="<?php echo $data->password; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>