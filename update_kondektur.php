<?php
include('koneksi.php');

$status = '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_kondektur'])) {
        //query untuk mengupdate data
        $id_kondektur_upd = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

        //eksekusi query
        $result = mysqli_query(connection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];

    //query SQL
    $sql = "UPDATE kondektur SET nama='$nama'
    WHERE id_kondektur='$id_kondektur'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: kondektur.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UPDATE KONDEKTUR</title>
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
                    <h2>UPDATE KONDEKTUR</h2>
                    <form action="update_kondektur.php" method="POST">
                        <?php while ($data = mysqli_fetch_array($result)): ?>
                            <div>
                                <label>Id Kondektur</label>
                                <input type="text" class="form-control" placeholder="Id Kondektur" name="id_kondektur"
                                    value="<?php echo $data['id_kondektur']; ?>" required="required" readonly>
                            </div>

                            <div>
                                <label>nama</label>
                                <input type="text" class="form-control" placeholder="nama" name="nama"
                                    value="<?php echo $data['nama']; ?>" required="required">
                            </div>

                        <?php endwhile; ?>

                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
</body>

</html>