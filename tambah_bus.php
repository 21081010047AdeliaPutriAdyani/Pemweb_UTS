<?php
include('koneksi.php');

$status = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_bus = $_POST['id_bus'];
  $plat = $_POST['plat'];
  $status = $_POST['status'];
  //query SQL
  $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus' , '$plat' , '$status')";

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
  <title>BUS</title>
</head>

<body>
  <div class="container">
    <h2 align="center">DATA BUS</h2>
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
        <td>
          <center>
            <a class="nav-link" href="<?php echo "tambah_bus.php"; ?>"><b>Menambah Data</b></a>
          </center>
        </td>
      </tr>

      <tr class="akhir">
        <td colspan="3">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php
            if ($status == 'ok') {
              echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil disimpan</div>';
            } elseif ($status == 'err') {
              echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal disimpan</div>';
            }
            ?>

            <h2 style="margin: 30px 0 30px 0;">Form Bus</h2>
            <form action="tambah_bus.php" method="POST">
              <div class="form-group">
                <label>id_bus</label>
                <input type="text" class="form-control" placeholder="id_bus" name="id_bus" required="required">
              </div>
              <div class="form-group">
                <label>plat</label>
                <input type="text" class="form-control" placeholder="plat" name="plat" required="required">
              </div>
              <div class="form-group">
                <label>status</label>
                <input type="text" class="form-control" placeholder="status" name="status" required="required">
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