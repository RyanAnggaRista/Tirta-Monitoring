<?php
include '../../control/koneksi.php';

//variabel
$sensor1 = mysqli_query($conn, "select * from test_sensor1");
$sensor2 = mysqli_query($conn, "select * from test_sensor2");

$data1 = mysqli_fetch_array($sensor1);
$data2 = mysqli_fetch_array($sensor2);

$flow1 = $data1["flowrateSensor1"];
$flow2 = $data2["flowrateSensor2"];
$volume1 = $data1["volumeSensor1"];
$volume2 = $data2["volumeSensor2"];
$kecepatan1 = $data1["kecepatanSensor1"];
$kecepatan2 = $data2["kecepatanSensor2"];

# Bagian Flow
$hasil_flow = abs($flow1 - $flow2);
$hasil_volume = $volume1 - $volume2;
$hasil_kecepatan = $kecepatan1 - $kecepatan2;

if ($flow1 > 0 or $flow2 > 0) {
    mysqli_query($conn, "INSERT INTO hasil(flowrate, volume, kecepatan) VALUES ('$hasil_flow','$hasil_volume','$hasil_kecepatan')");
}

echo "hasil flow = ", $hasil_flow, " ";
echo "hasil volume = ", $hasil_volume, " ";
echo "hasil kecepatan = ", $hasil_kecepatan, " ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perbandingan Data</title>
    <meta http-equiv="refresh" content="1000">

    <style>
        #wntable {
            border-collapse: collapse;
            width: 70%;
        }

        #wntable td,
        #wntable th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #wntable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00A8A9;
            color: white;
        }
    </style>

</head>

<body>
    <div id="cards" class="cards" align="center">
        <h1>Database Perbandingan Flow</h1>
        <table id="wntable">
            <tr>
                <th>No</th>
                <th>Flowrate</th>
                <th>Volume</>
                <th>Kecepatan</th>
                <th>Waktu</th>
            </tr>

            <?php

            $sql = mysqli_query($conn, "SELECT * FROM hasil order by id desc");
            if ($sql === FALSE) {
                die(mysqli_error($conn));
            }

            if (mysqli_num_rows($sql) == 0) {
                echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
            } else { // jika terdapat entri maka tampilkan datanya
                $no = 1; // mewakili data dari nomor 1
                while ($row = mysqli_fetch_assoc($sql)) { // fetch query yang sesuai ke dalam array
                    echo '
            <tr>
                <td>' . $no . '</td>
                <td>' . $row['flowrate'] . '</td>
                <td>' . $row['volume'] . '</td>
                <td>' . $row['kecepatan'] . '</td>
                <td>' . $row['waktu'] . '</td>
            </tr>
            ';
                    $no++; // mewakili data kedua dan seterusnya
                }
            }
            ?>
        </table>
    </div>
</body>

</html>