<?php
$data = new Dosen($database->conn);
$data->lihatsatu($_GET['username']);
if (isset($_POST['submit'])) {
    $data->rubahDosen();
    header('location:index.php?halaman=rubah-dosen&username=andi');
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <form action="" method="POST" accept-charset="utf-8">
        <input type="hidden" name="username" value="<?php echo $data->username; ?>">
        <input type="hidden" name="level" value="<?php echo $data->level; ?>">
        <h2>Rubah Profil Dosen</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for ="nama">Nama Dosen</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="nama" value="<?php echo $data->nama; ?>"></td>
            </tr>
            <tr>
                <td><label for="tgl_lahir">Tanggal Lahir</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="tgl_lahir" value="<?php $tgl= date("d-m-Y", strtotime($data->tgl_lahir));
                echo $tgl; ?>"></td>
            </tr>
            <tr>
                <td><label for="jk">Jenis Kelamin</label>
                </td>
                <td></td>
                <td>
                <select name="jk" class="from-control">
                <?php 
                        if ($data->jenis_kelamin=="L"){
                            echo '
                    <option value="L" selected>Laki-Laki</option>
                    <option value="P">Perempuan</option>';
                            } else {
                                echo '
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-Laki</option>';
                }
                                ?>
                        </select></td>
            </tr>
            <tr>
                <td><lebel for="alamat">Alamat</lebel></td>
                <td></td>
                <td><textarea class="form-control" name="alamat" ><?php echo $data->alamat; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="agama">Agama</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="agama" value="<?php echo $data->agama; ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="email" value="<?php echo $data->email; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>