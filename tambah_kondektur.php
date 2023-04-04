<?php
include('koneksi.php');

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_kondektur = $_POST['id_kondektur'];
  $nama = $_POST['nama'];
  //query SQL
  $query = "INSERT INTO kondektur (id_kondektur, nama) VALUES('$id_kondektur' , '$nama')";

  //eksekusi query
  $result = mysqli_query(connection(), $query);
  if ($result) {
    $status = 'ok';
  } else {
    $status = 'err';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>TAMBAH KONDEKTUR</title>
</head>

<body>
  <div class="container">
    <h2 align="center">DATA KONDEKTUR</h2>
    <table style="width:100%" cellspacing="0">
      <tr class="atas">
        <td class="dua">
          <center>
            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>data bus</b></a>
          </center>
        </td>

        <td class="tiga">
          <center>
            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>data driver</b></a>
          </center>
        </td>

        <td class="empat">
          <center>
            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b>data kondektur</b></a>
          </center>
        </td>

        <td class="lima">
          <center>
            <a class="nav-link" href="<?php echo "trans_upn.php"; ?>"><b>data trans_upn</b></a>
          </center>
        </td>

        <td class="enam">
          <center>
            <a class="nav-link" href="<?php echo "gaji_driver.php"; ?>"><b>data gaji driver</b></a>
          </center>
        </td>

        <td class="tujuh">
          <center>
            <a class="nav-link" href="<?php echo "gaji_kondektur.php"; ?>"><b>data gaji kondektur</b></a>
          </center>
        </td>
      </tr>

      <tr class="tengah">
        <td colspan="2">

        </td>
        <td>
          <center>
            <a class="nav-link" href="<?php echo "tambah_kondektur.php"; ?>"><b>Menambah Data</b></a>
          </center>
        </td>
      </tr>

      <tr class="akhir">
        <td colspan="3">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php
            if ($status == 'ok') {
              echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil disimpan</div>';
            } elseif ($status == 'err') {
              echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal disimpan</div>';
            }
            ?>

            <h2 style="margin: 30px 0 30px 0;">Form Kondektur</h2>
            <form action="tambah_kondektur.php" method="POST">
              <div class="form-group">
                <label>id_kondektur</label>
                <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur"
                  required="required">
              </div>
              <div class="form-group">
                <label>nama</label>
                <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </main>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>