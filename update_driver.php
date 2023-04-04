<?php
include('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        //query untuk mengupdate data
        $id_driver_upd = $_GET['id_driver'];
        $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];

    //query SQL
    $sql = "UPDATE driver SET nama='$nama', no_sim ='$no_sim', alamat='$alamat'
    WHERE id_driver='$id_driver'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: driver.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>update driver</title>
</head>

<body>
    <div class="container">
        <h2 align="center">DATA DRIVER</h2>
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
                <td colspan="1">

                </td>
                <td>
                    <center>
                        <a class="nav-link" href="<?php echo "tambah_driver.php"; ?>"><b>Menambah Data</b></a>
                    </center>
                </td>
            </tr>

            <tr class="akhir">
                <td colspan="3">
                    <h2>UPDATE PRODUCTS</h2>
                    <form action="update_driver.php" method="POST">
                        <?php while ($data = mysqli_fetch_array($result)): ?>
                            <div>
                                <label>Id Driver</label>
                                <input type="text" class="form-control" placeholder="Id Driver" name="id_driver"
                                    value="<?php echo $data['id_driver']; ?>" required="required" readonly>
                            </div>

                            <div>
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama"
                                    value="<?php echo $data['nama']; ?>" required="required">
                            </div>

                            <div>
                                <label>No SIM</label>
                                <input type="text" class="form-control" placeholder="No SIM" name="no_sim"
                                    value="<?php echo $data['no_sim']; ?>" required="required">
                            </div>

                            <div>
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat"
                                    value="<?php echo $data['alamat']; ?>" required="required">
                            </div>

                        <?php endwhile; ?>

                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
</body>

</html>