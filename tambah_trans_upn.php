<?php
include('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_trans_upn = $_POST['id_trans_upn'];
  $id_kondektur = $_POST['id_kondektur'];
  $id_bus = $_POST['id_bus'];
  $id_driver = $_POST['id_driver'];
  $jumlah_km = $_POST['jumlah_km'];
  $tanggal = $_POST['tanggal'];

  //query SQL
  $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
        VALUES('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')";

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
  <title>TAMBAH TRANS UPN</title>
</head>

<body>
  <div class="container">
    <h2 align="center">DATA TRANS UPN</h2>
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
        <td colspan="3">

        </td>
        <td>
          <center>
            <a class="nav-link" href="<?php echo "tambah_trans_upn.php"; ?>"><b>Menambah Data</b></a>
          </center>
        </td>
      </tr>

      <tr class="akhir">
        <td colspan="3">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php
            if ($status == 'ok') {
              echo '<br><br><div class="alert alert-success" role="alert">Data Trans UPN berhasil disimpan</div>';
            } elseif ($status == 'err') {
              echo '<br><br><div class="alert alert-danger" role="alert">Data Trans UPN gagal disimpan</div>';
            }
            ?>

            <h2 style="margin: 30px 0 30px 0;">Form Trans UPN</h2>
            <form action="tambah_trans_upn.php" method="POST">
              <div class="form-group">
                <label>id_trans_upn</label>
                <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn"
                  required="required">
              </div>
              <div class="form-group">
                <label>id_kondektur</label>
                <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur"
                  required="required">
              </div>
              <div class="form-group">
                <label>id_bus</label>
                <input type="text" class="form-control" placeholder="id_bus" name="id_bus" required="required">
              </div>
              <div class="form-group">
                <label>id_driver</label>
                <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
              </div>
              <div class="form-group">
                <label>jumlah_km</label>
                <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" required="required">
              </div>
              <div class="form-group">
                <label>tanggal</label>
                <input type="text" class="form-control" placeholder="tanggal" name="tanggal" required="required">
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