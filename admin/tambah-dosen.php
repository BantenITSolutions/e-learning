<?php
$data = new Dosen($database->conn);

if (isset($_POST['submit'])) {
    $data->tambah();
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <form action="" method="POST" accept-charset="utf-8">
        <input type="hidden" name="id">
        <h2>Tambah Dosen</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for="username">Username</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="username" placeholder="Username"</td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"</td>
            </tr>
            <tr>
                <td><label for="jk">Jenis Kelamin</label></td>
                <td></td>
                <td>
                <select name="jk" class="form-control">
                    <option value="L" selectded>Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td></td>
                <td><textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea></td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal Lahir</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal-Bulan-Tahun"></td>
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
                <td><label for="password">Password</label></td>
                <td></td>
                <td><input type="password" class="form-control" name="password" placeholder=" Password "></td>
            </tr>
            <input type="hidden" name="level" value="dosen" />
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>