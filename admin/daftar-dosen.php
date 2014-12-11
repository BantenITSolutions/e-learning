<?php
$data = new Dosen($database->conn);

$halaman = isset($_GET['page']) ? $_GET['page'] : 1;
$dataperhalaman = 7;
$nomordari = ($dataperhalaman * $halaman) - $dataperhalaman;
$urlhalaman = 'index.php?halaman=lihat-kelas';


  // Pagination 
  echo '<ul class="pagination">';
  if ($halaman>1) {
    echo '<li class="active"><a href="'.$urlhalaman.'" title="Kembali Ke Halaman Pertama">Kembali Ke Halaman Pertama</a></li>';
  }

  $total_baris = $data->hitungSemua("kelas");
  $total_halaman = ceil($total_baris / $dataperhalaman);
  $batas = 2;
  $inisialisasi_nomor = $halaman - $batas;
  $kondisi_batas_nomor = ($halaman + $batas) + 1;

  for ($i=$inisialisasi_nomor; $i < $kondisi_batas_nomor; $i++) { 
    if (($i>0) && ($i<=$total_halaman)) {
      if ($i==$halaman) {
        echo '<li class="active"><a href="#" title="Halaman Sekarang">'.$i.'<span class="sr-only">Halaman Sekarang</span></a></li>';
      } else {
        echo '<li class="active"><a href="'.$urlhalaman.'&page='.$i.'" title="Halaman - '.$i.'">'.$i.'</a></li>';
      }
    }
  }
  echo "</ul>";

  $dosen = $data->lihatdosen("dosen", $halaman, $nomordari, $dataperhalaman);
  $nomor = $dosen->rowCount();

  echo '<div class="right-button-margin">
    <a href="?halaman=tambah-dosen" style="margin: 10px;" class="btn btn-primary pull-right" title="Tambah Dosen">Tambah Dosen</a>
  </div>

  <div class="row spasi7"></div>';

  if ($nomor>1) {
    echo '<table class="table table-responsive table-hover">
      <tbody>
        <tr>
          <td>No</td>
          <td>Username</td>
          <td>Nama Dosen</td>
          <td>Menu</td>
        </tr>';
    $no = 1;
    $baris = $dosen->fetchAll(PDO::FETCH_ASSOC);

    foreach ($baris as $daftardosen) { ?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $daftardosen["username"]; ?></td>
    <td><?php echo $daftardosen["nama"]; ?></td>
    <td><a href="index.php?halaman=rubah-dosen&amp;username=<?php echo $daftardosen["username"]; ?>" title="Rubah" class="btn btn-info">Rubah</a> <a href="index.php?halaman=hapus-dosen&amp;username=<?php echo $daftardosen["username"]; ?>" title="Rubah" class="btn btn-danger">Hapus</a></td>
    <?php $no++; ?>
    <?php } ?>

<?php
    echo '
      </tbody>
    </table>';
  }
?>