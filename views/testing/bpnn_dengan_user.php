<?php

$dsn = 'mysql:host=localhost;dbname=db_tirta';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}

$sql = 'SELECT * FROM bpnn_dengan_user';
$statement = $connection->prepare($sql);
$statement->execute();
$testing = $statement->fetchAll(PDO::FETCH_OBJ);

foreach ($testing as $data) :
    // variable input output dan lainnya
    $x = array_map(function ($x) {
        return $x / 100;
    }, array($data->flowrate, $data->volume, $data->kecepatan));

    # bobot
    $iw1 = array_map(function ($iw1) {
        return $iw1;
    }, array(15.03583011, -32.70385846, -102.3145358, 77.99842303, 34.82700992, -62.8058003, -72.03050485, -49.54094854, 107.9409088, -80.293605, -14.65883484, 64.79775956, -79.62063664));
    $iw2 = array_map(function ($iw2) {
        return $iw2;
    }, array(-188.7922195, -4.662378587, 2.451714912, 0.485482825, -0.458646082, 3.66568245, 0.198762036, -0.160609545, -0.657667883, -0.836025849, 10.22915896, -7.312011319, -12.97961077));
    $iw3 = array_map(function ($iw3) {
        return $iw3;
    }, array(-2279.174347, -2150.2104, -32.58611056, -1480.350245, 1996.131193, -1869.180649, -1334.358471, 949.4657917, 951.9164272, -913.7068098, -2365.58806, -1761.670749, -760.0638908));

    $lw1 = array_map(function ($lw1) {
        return $lw1;
    }, array(130.0774572, -130.1522932, -1.22773105));
    $lw2 = array_map(function ($lw2) {
        return $lw2;
    }, array(11.97352699, -3.837533792, -8.470816325));
    $lw3 = array_map(function ($lw3) {
        return $lw3;
    }, array(-2.185109554, -1.795006506, 0.78618243));
    $lw4 = array_map(function ($lw4) {
        return $lw4;
    }, array(5.340823815, -4.436797517, -1.248356208));
    $lw5 = array_map(function ($lw5) {
        return $lw5;
    }, array(-1.881464759, -25.61579494, 14.50769306));
    $lw6 = array_map(function ($lw6) {
        return $lw6;
    }, array(-4.175841619, -2.945319822, 0.827024164));
    $lw7 = array_map(function ($lw7) {
        return $lw7;
    }, array(-3.244349871, 24.01173006, -14.70670096));
    $lw8 = array_map(function ($lw8) {
        return $lw8;
    }, array(-0.180243626, -2.05031763, 2.631482851));
    $lw9 = array_map(function ($lw9) {
        return $lw9;
    }, array(-40.18272141, 34.54193873, 7.343494599));
    $lw10 = array_map(function ($lw10) {
        return $lw10;
    }, array(-0.704726633, 3.972066618, -9.56752715));
    $lw11 = array_map(function ($lw11) {
        return $lw11;
    }, array(29.27420819, -27.70098456, 0.234300263));
    $lw12 = array_map(function ($lw12) {
        return $lw12;
    }, array(6.614307242, -14.00726723, 4.268064933));
    $lw13 = array_map(function ($lw13) {
        return $lw13;
    }, array(-31.97927638, 34.93668677, -2.597758628));

    # bias sementara
    $b1 = array_map(function ($b1) {
        return $b1;
    }, array(38.7428514, 12.28045595, 10.87182647, -7.690599308, -5.643360944, 13.69008117, 6.103138746, -6.204731514, -0.261630289, 7.025192121, -5.405203616, 16.58500051, 11.25803489));
    $b2 = array_map(function ($b2) {
        return $b2;
    }, array(-4.975285424, -6.547608438, -5.093923888));

    #forward propagation
    $a1 = $iw1[0] * $x[0] + $iw2[0] * $x[1] + $iw3[0] * $x[2] + $b1[0];
    $a2 = $iw1[1] * $x[0] + $iw2[1] * $x[1] + $iw3[1] * $x[2] + $b1[1];
    $a3 = $iw1[2] * $x[0] + $iw2[2] * $x[1] + $iw3[2] * $x[2] + $b1[2];
    $a4 = $iw1[3] * $x[0] + $iw2[3] * $x[1] + $iw3[3] * $x[2] + $b1[3];
    $a5 = $iw1[4] * $x[0] + $iw2[4] * $x[1] + $iw3[4] * $x[2] + $b1[4];
    $a6 = $iw1[5] * $x[0] + $iw2[5] * $x[1] + $iw3[5] * $x[2] + $b1[5];
    $a7 = $iw1[6] * $x[0] + $iw2[6] * $x[1] + $iw3[6] * $x[2] + $b1[6];
    $a8 = $iw1[7] * $x[0] + $iw2[7] * $x[1] + $iw3[7] * $x[2] + $b1[7];
    $a9 = $iw1[8] * $x[0] + $iw2[8] * $x[1] + $iw3[8] * $x[2] + $b1[8];
    $a10 = $iw1[9] * $x[0] + $iw2[9] * $x[1] + $iw3[9] * $x[2] + $b1[9];
    $a11 = $iw1[10] * $x[0] + $iw2[10] * $x[1] + $iw3[10] * $x[2] + $b1[10];
    $a12 = $iw1[11] * $x[0] + $iw2[11] * $x[1] + $iw3[11] * $x[2] + $b1[11];
    $a13 = $iw1[12] * $x[0] + $iw2[12] * $x[1] + $iw3[12] * $x[2] + $b1[12];
    $A1 = 1 / (1 + exp(-1 * $a1));
    $A2 = 1 / (1 + exp(-1 * $a2));
    $A3 = 1 / (1 + exp(-1 * $a3));
    $A4 = 1 / (1 + exp(-1 * $a4));
    $A5 = 1 / (1 + exp(-1 * $a5));
    $A6 = 1 / (1 + exp(-1 * $a6));
    $A7 = 1 / (1 + exp(-1 * $a7));
    $A8 = 1 / (1 + exp(-1 * $a8));
    $A9 = 1 / (1 + exp(-1 * $a9));
    $A10 = 1 / (1 + exp(-1 * $a10));
    $A11 = 1 / (1 + exp(-1 * $a11));
    $A12 = 1 / (1 + exp(-1 * $a12));
    $A13 = 1 / (1 + exp(-1 * $a13));

    $z1 = $lw1[0] * $A1 + $lw2[0] * $A2 + $lw3[0] * $A3 + $lw4[0] * $A4 + $lw5[0] * $A5 + $lw6[0] * $A6 + $lw7[0] * $A7 + $lw8[0] * $A8 + $lw9[0] * $A9 + $lw10[0] * $A10 + $lw11[0] * $A11 + $lw12[0] * $A12 + $lw13[0] * $A13 + $b2[0];
    $z2 = $lw1[1] * $A1 + $lw2[1] * $A2 + $lw3[1] * $A3 + $lw4[1] * $A4 + $lw5[1] * $A5 + $lw6[1] * $A6 + $lw7[1] * $A7 + $lw8[1] * $A8 + $lw9[1] * $A9 + $lw10[1] * $A10 + $lw11[1] * $A11 + $lw12[1] * $A12 + $lw13[1] * $A13 + $b2[1];
    $z3 = $lw1[2] * $A1 + $lw2[2] * $A2 + $lw3[2] * $A3 + $lw4[2] * $A4 + $lw5[2] * $A5 + $lw6[2] * $A6 + $lw7[2] * $A7 + $lw8[2] * $A8 + $lw9[2] * $A9 + $lw10[2] * $A10 + $lw11[2] * $A11 + $lw12[2] * $A12 + $lw13[2] * $A13 + $b2[2];
    $Z1 = 1 / (1 + exp(-1 * $z1));
    $Z2 = 1 / (1 + exp(-1 * $z2));
    $Z3 = 1 / (1 + exp(-1 * $z3));
    $format_Z1 = number_format($Z1, 2, ",", ".");
    $format_Z2 = number_format($Z2, 2, ",", ".");
    $format_Z3 = number_format($Z3, 2, ",", ".");

    $prediksi_bpnn = array_map(function ($prediksi_bpnn) {
        return $prediksi_bpnn;
    }, array(
        "NORMAL" => $format_Z1,
        "SEDANG" => $format_Z2,
        "TINGGI" => $format_Z3,
    ));

    # print_r($prediksi_bpnn);
    # echo "<br>";
endforeach;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>index</title>
</head>

<body>
    <style>
        .lokasi {
            height: 100vh;
            width: 100%;
            color: #004d40;
        }

        #sidebar {
            grid-area: sidebar;
        }

        #content1 {
            padding: 15px;
            grid-area: content1;
        }

        .title {
            color: black;
        }
    </style>

    <div class="lokasi">
        <div id="content1">
            <p class="title text-center fs-4">TESTING BACKPROPAGATION NEURAL NETWORK DENGAN USER</p>
            <hr>
            <div class="container">
                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Flowrate</th>
                                <th>Volume</th>
                                <th>Kecepatan</th>
                                <th>X1</th>
                                <th>X2</th>
                                <th>X3</th>
                                <th>X1'</th>
                                <th>X2'</th>
                                <th>X3'</th>
                            </tr>
                            <?php foreach ($testing as $data) : ?>
                                <tr>
                                    <td><?= $data->id; ?></td>
                                    <td><?= $data->flowrate; ?></td>
                                    <td><?= $data->volume; ?></td>
                                    <td><?= $data->kecepatan; ?></td>
                                    <td><?= $data->x1; ?></td>
                                    <td><?= $data->x2; ?></td>
                                    <td><?= $data->x3; ?></td>
                                    <td><?= $data->y1; ?></td>
                                    <td><?= $data->y2; ?></td>
                                    <td><?= $data->y3; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </div>
</body>

</html>