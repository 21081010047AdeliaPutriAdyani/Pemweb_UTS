<?php
include('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query untuk mengupdate data
        $id_trans_upn_upd = $_GET['id_trans_upn'];
        $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    //query SQL
    $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus ='$id_bus', id_driver='$id_driver', jumlah_km ='$jumlah_km', tanggal='$tanggal'
    WHERE id_trans_upn='$id_trans_upn'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: trans_upn.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UPDATE TRANS UPN</title>
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
                        <a class="nav-link" href="<?php echo "gaji.php"; ?>"><b>data gaji</b></a>
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
                    <h2>UPDATE TRANS UPN</h2>
                    <form action="update_trans_upn.php" method="POST">
                        <?php while ($data = mysqli_fetch_array($result)): ?>
                            <div>
                                <label>Id Trans UPN</label>
                                <input type="text" class="form-control" placeholder="Id Trans UPN" name="id_trans_upn"
                                    value="<?php echo $data['id_trans_upn']; ?>" required="required" readonly>
                            </div>

                            <div>
                                <label>Id Kondektur</label>
                                <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur"
                                    value="<?php echo $data['id_kondektur']; ?>" required="required">
                            </div>

                            <div>
                                <label>Id Bus</label>
                                <input type="text" class="form-control" placeholder="Id Bus" name="id_bus"
                                    value="<?php echo $data['id_bus']; ?>" required="required">
                            </div>

                            <div>
                                <label>Id Driver</label>
                                <input type="text" class="form-control" placeholder="Id Driver" name="id_driver"
                                    value="<?php echo $data['id_driver']; ?>" required="required">
                            </div>

                            <div>
                                <label>Jumlah KM</label>
                                <input type="text" class="form-control" placeholder="Jumlah KM" name="jumlah_km"
                                    value="<?php echo $data['jumlah_km']; ?>" required="required">
                            </div>

                            <div>
                                <label>Tanggal</label>
                                <input type="text" class="form-control" placeholder="Tanggal" name="tanggal"
                                    value="<?php echo $data['tanggal']; ?>" required="required">
                            </div>

                        <?php endwhile; ?>

                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
</body>

</html>