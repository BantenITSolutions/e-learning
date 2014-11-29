<?php
$data = new Dosen($database->conn);

if (isset($_POST['submit'])) {
    $data->tambah();
    header('location:index.php?halaman=tambah-dosen');
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <form action="" method="POST" accept-charset="utf-8">
        <input type="hidden" name="id">
        <h2>Tambah Dosen</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="nama" placeholder="Nama Dosen"</td>
            </tr>
            <tr>
                <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="tgl_lahir" placeholder ="Tanggal Lahir"></td>
            </tr>
            <tr>
                <td><label for="jk">Jenis Kelamin</label></td>
                <td></td>
                <td>
                <select name="jk" class="form-control">
                <?php
                        if ($data->jenis_kelamin=="L") {
                            echo '
                    <option  selectded>Laki-Laki</option>
                    <optionx>Perempuan</option>';
                        } else {
                            echo '
                    <option  selectded>Perempuan</option>
                    <option>Laki-Laki</option>';
                        }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td></td>
                <td><textarea class="form-control" name="alamat" placeholder="Alamat"></textarea></td>
            </tr>
            <tr>
                <td><label for="agama">Agama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="agama" placeholder="Agama"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td><label for="username">Username</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td></td>
                <td><input type="password" class="form-control" name="password" placeholder=" Password "></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>