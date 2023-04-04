<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>KONDEKTUR</title>
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
                <td colspan="6">
                    <table border="1" align="center">
                        <thead>
                            <tr bgcolor="tan">
                                <th>id_kondektur</th>
                                <th>nama</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM kondektur";
                            $result = mysqli_query(connection(), $query);
                            ?>

                            <?php
                            while ($data = mysqli_fetch_array($result)):
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        echo $data['id_kondektur'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $data['nama'];
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo "update_kondektur.php?id_kondektur=" . $data['id_kondektur']; ?>">
                                            Update</a>
                                        &nbsp;&nbsp;
                                        <a href="<?php echo "hapus_kondektur.php?id_kondektur=" . $data['id_kondektur']; ?>">
                                            Delete</a>
                                    </td>
                                </tr>

                            <?php endwhile ?>
                        </tbody>

                </td>

            </tr>
        </table>
</body>

</html>