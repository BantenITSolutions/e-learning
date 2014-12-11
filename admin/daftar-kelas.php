<?php
$data = new Kelas($database->conn);

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

  $kelas = $data->lihatkelas("kelas", $halaman, $nomordari, $dataperhalaman);
  $nomor = $kelas->rowCount();

  echo '<div class="right-button-margin">
    <a href="tambah.php" class="btn btn-primary pull-right" title="Tambah E-book">Tambah E-book</a>
  </div>

  <div class="row spasi7"></div>';

  if ($nomor>1) {
    echo '<table class="table table-responsive table-hover">
      <tbody>
        <tr>
          <td>ID</td>
          <td>Kelas</td>
          <td>Menu</td>
        </tr>';

    $baris = $kelas->fetchAll(PDO::FETCH_ASSOC);
    foreach ($baris as $datakelas) {
        echo "<tr>";
        echo "<td>".$datakelas['id']."</td>";
        echo "<td>".$datakelas['kelas']."</td>";
        echo "<td>Menu</td>";
        echo "</tr>";
    }


    echo '
      </tbody>
    </table>';
  }

?>