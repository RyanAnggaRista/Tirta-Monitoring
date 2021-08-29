<?php
  require("../../control/koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIRTA Monitoring</title>
    <meta http-equiv="refresh" content="100">

    <style>
        * {
            background-color: #282f36;
        }

        body,
        button {
            font-family: "Poppins",
                sans-serif;
        }

        .cards>h1 {
            color: yellow;
        }

        #wntable {
            border-collapse: collapse;
            width: 70%;
        }

        #wntable td,
        #wntable th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #wntable tr:nth-child(odd) {
            background-color: #485461;
            color: white;
        }

        #wntable tr:nth-child(even) {
            background-color: #f2f2f2;
            color: white;
        }

        #wntable tr:hover {
            background-color: #ddd;
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
        <h1>Database Area 7</h1>
        <table id="wntable">
            <tr>
                <th>No</th>
                <th>Flowrate 1</th>
                <th>Flowrate 2</th>
                <th>Volume 1</th>
                <th>Volume 2</th>
                <th>Kecepatan 1</th>
                <th>Kecepatan 2</th>
                <th>Waktu</th>
            </tr>

            <?php

          $sql=mysqli_query($conn, "SELECT * FROM tbl_sensor13, tbl_sensor14 where tbl_sensor13.waktuSensor13=tbl_sensor14.waktuSensor14 order by waktuSensor13 desc");

        if($sql === FALSE){
            die(mysqli_error($conn));
        }

        if(mysqli_num_rows($sql) == 0){ 
            echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
        }else{ // jika terdapat entri maka tampilkan datanya
            $no = 1; // mewakili data dari nomor 1
            while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
            echo '
            <tr>
                <td>'.$no.'</td>
                <td>'.$row['flowrateSensor13'].'</td>
                <td>'.$row['volumeSensor13'].'</td>
                <td>'.$row['kecepatanSensor13'].'</td>
                <td>'.$row['flowrateSensor14'].'</td>
                <td>'.$row['volumeSensor14'].'</td>
                <td>'.$row['kecepatanSensor14'].'</td>
                <td>'.$row['waktuSensor13'].'</td>
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