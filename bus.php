<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BUS</title>

    <style>
        .hijau {
            background-color: green;
        }

        .merah {
            background-color: red;
        }

        .kuning {
            background-color: yellow;
        }
    </style>

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
                <td colspan="6">
                    <table border="1" align="center">
                        <thead>
                            <tr bgcolor="tan">
                                <th>id_Bus</th>
                                <th>plat</th>
                                <th>status</th>
                                <th>jumlah_km</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM bus";
                            $result = mysqli_query(connection(), $query);
                            ?>

                            <?php
                            //proses untuk filter data berdasarkan status bus dan menampilkan jumlah km
                            $status = "";
                            if (isset($_GET['status'])) {
                                $status = $_GET['status'];
                                if ($status == "semua") {
                                    $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus ORDER BY status ASC";
                                } else {
                                    $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus WHERE status = '$status' GROUP BY bus.id_bus";
                                }
                            } else {
                                $query = "SELECT bus.id_bus, bus.plat, bus.status, SUM(trans_upn.jumlah_km) as jumlah_km FROM bus LEFT JOIN trans_upn ON bus.id_bus = trans_upn.id_bus GROUP BY bus.id_bus";
                            }
                            $result = mysqli_query(connection(), $query);
                            ?>

                            <!-- Menambahkan memfilter data berdasarkan status bus -->
                            <form method="get">
                                <div class="form-group">
                                    <label for="status">Filter status bus:</label>
                                    <select class="form-control" id="status" name="status"
                                        onchange="this.form.submit()">
                                        <option value="semua" <?php if ($status == 'semua')
                                            echo 'selected="selected"'; ?>>
                                            Semua</option>
                                        <option value="0" <?php if ($status == '0')
                                            echo 'selected="selected"'; ?>>0
                                        </option>
                                        <option value="1" <?php if ($status == '1')
                                            echo 'selected="selected"'; ?>>1
                                        </option>
                                        <option value="2" <?php if ($status == '2')
                                            echo 'selected="selected"'; ?>>2
                                        </option>
                                    </select>
                                </div>
                            </form>

                            <?php
                            while ($data = mysqli_fetch_array($result)):
                                ?>
                                <tr
                                    class="<?php echo $data['status'] == 1 ? 'hijau' : ($data['status'] == 2 ? 'kuning' : 'merah') ?>">
                                    <td>
                                        <?php
                                        echo $data['id_bus'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $data['plat'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $data['status'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $data['jumlah_km'];
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo "update_bus.php?id_bus=" . $data['id_bus']; ?>"> Update</a>
                                        &nbsp;&nbsp;
                                        <a href="<?php echo "hapus_bus.php?id_bus=" . $data['id_bus']; ?>"> Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>

                </td>

            </tr>
        </table>
</body>

</html>