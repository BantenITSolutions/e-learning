<?php
$data = new Kelas($database->conn);
if (isset($_POST['submit'])) {
    $data->tambahkelas();
    header('location:index.php?halaman=tambah-kelas');
}
?>
<section class="container" style="width:50%;margin:10px 25%">
    <form action="" method="POST" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        <h2>Tambah Kelas</h2>
        <table class="table table-responsive">
            <tr>
                <td><label for="id">ID Kelas</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="id" placeholder="Masukkan ID Kelas"></td>
            </tr>
            <tr>
                <td><label for="kelas">Nama Kelas</label></td>
                <td></td>
                <td><input type="text" class="form-control" name="kelas" placeholder="Masukkan Nama Kelas"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" class="btn btn-primary" value="Simpan"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
</section>