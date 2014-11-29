<?php
include 'header.php';
spl_autoload_register(function($class){
	include 'inc/'.$class.'.php';
});

$database = new Database();

  $db = $database->conn();

  $id = isset($_GET['id'])? $_GET['id']: die('Gagal : Tidak ada ID !');

  $produk = new Dosen($db);

  $produk->id = $id;

  $produk->tambah("dosen");


echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-primary pull-right'>Lihat Semua Produk</a>";
echo "</div><div style='clear:both;padding:5px' />";


  echo '
      <table class="table table-hover table-responsive">
        <tbody>
          <tr>
            <td><h3>'.$dosen->nama.'</h3></td>
          </tr>
          <tr>
            <td><p>'.$dosen->alamat.'</p></td>
          </tr>
          <tr>
            <td><p>'.$dosen->email.'</p></td>
          </tr>
        </tbody>
      </table>
    </form>

  ';

include 'footer.php';
?>