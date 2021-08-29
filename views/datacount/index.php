<?php
include '../../control/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Count 1</title>
    <meta http-equiv="refresh" content="100">

    <style>
        .cards {
            position: absolute;
            width: 600px;
            height: 600px;
            left: 35px;
            overflow: scroll;
        }

        .cards2 {
            position: absolute;
            width: 600px;
            height: 600px;
            right: 35px;
            overflow: scroll;
        }

        #wntable {
            border-collapse: collapse;
            width: 100%;
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
        <h1>Database Area 1</h1>
        <table id="wntable">
            <tr>
                <th>No</th>
                <th>Flowrate</th>
                <th>Volume</>
                <th>Count</th>
                <th>Waktu</th>
            </tr>

            <?php
            $sql = mysqli_query($conn, "SELECT * FROM count1 order by idSensor1 desc");
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
                <td>' . $row['flowrateSensor1'] . '</td>
                <td>' . $row['volumeSensor1'] . '</td>
                <td>' . $row['countSensor1'] . '</td>
                <td>' . $row['waktuSensor1'] . '</td>
            </tr>
            ';
                    $no++; // mewakili data kedua dan seterusnya
                }
            }
            ?>
        </table>
    </div>

    <div id="cards2" class="cards2" align="center">
        <h1>Database Area 2</h1>
        <table id="wntable">
            <tr>
                <th>No</th>
                <th>Flowrate</th>
                <th>Volume</>
                <th>Count</th>
                <th>Waktu</th>
            </tr>

            <?php

            $sql = mysqli_query($conn, "SELECT * FROM count2 order by idSensor2 desc");
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
                <td>' . $row['flowrateSensor2'] . '</td>
                <td>' . $row['volumeSensor2'] . '</td>
                <td>' . $row['countSensor2'] . '</td>
                <td>' . $row['waktuSensor2'] . '</td>
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