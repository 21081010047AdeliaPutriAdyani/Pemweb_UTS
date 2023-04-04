<?php
include('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_bus'])) {
        //query untuk mengupdate data
        $id_bus_upd = $_GET['id_bus'];
        $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];

    //query SQL
    $sql = "UPDATE bus SET plat='$plat', status ='$status'
    WHERE id_bus='$id_bus'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: bus.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UPDATE BUS</title>
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
                <td colspan="1">

                </td>
                <td>
                    <center>
                        <a class="nav-link" href="<?php echo "tambah_bus.php"; ?>"><b>Menambah Data</b></a>
                    </center>
                </td>
            </tr>

            <tr class="akhir">
                <td colspan="3">
                    <h2>UPDATE PRODUCTS</h2>
                    <form action="update_bus.php" method="POST">
                        <?php while ($data = mysqli_fetch_array($result)): ?>
                            <div>
                                <label>Id Bus</label>
                                <input type="text" class="form-control" placeholder="Id Bus" name="id_bus"
                                    value="<?php echo $data['id_bus']; ?>" required="required" readonly>
                            </div>

                            <div>
                                <label>Plat</label>
                                <input type="text" class="form-control" placeholder="Plat" name="plat"
                                    value="<?php echo $data['plat']; ?>" required="required">
                            </div>

                            <div>
                                <label>Status</label>
                                <input type="text" class="form-control" placeholder="Status" name="status"
                                    value="<?php echo $data['status']; ?>" required="required">
                            </div>

                        <?php endwhile; ?>

                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
</body>

</html>