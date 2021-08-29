<?php

$dsn = 'mysql:host=localhost;dbname=db_tirta';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}

$sql = 'SELECT * FROM bpnn_tanpa_user';
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
    }, array(25.12145889, -66.80539451, -14.67735256, -64.05979729, -44.12302999, -72.11156306, 67.40221533, 46.06808963, -15.80656041, 41.22257985, 46.78369118, 34.36668219));
    $iw2 = array_map(function ($iw2) {
        return $iw2;
    }, array(-1.618284505, -1.930525191, -2.471244548, -4.569501124, 3.343261551, -3.705664641, 4.855097779, -3.245164222, 1.88737017, -2.731495494, -0.359731642, 1.568162821));
    $iw3 = array_map(function ($iw3) {
        return $iw3;
    }, array(-1459.428962, 387.7706748, -1185.698661, 330.0852719, 1284.957197, -1.020058898, -232.1949412, -1260.704311, -1334.635282, 725.2365571, 1242.557151, -1325.500829));

    $lw1 = array_map(function ($lw1) {
        return $lw1;
    }, array(-2.745375277, -0.911863838, 1.843882021, 2.147991628, 1.433946335, 2.330576543));
    $lw2 = array_map(function ($lw2) {
        return $lw2;
    }, array(3.365716223, -3.458478799, 0.312686334, -0.687790816, -1.868261561, 1.33812415));
    $lw3 = array_map(function ($lw3) {
        return $lw3;
    }, array(0.166228569, 1.019424702, -3.138622853, -2.099619011, 2.653488679, -3.047379945));
    $lw4 = array_map(function ($lw4) {
        return $lw4;
    }, array(1.185517383, -3.686221057, 0.99799872, 0.475319, 0.570976473, -2.862685722));
    $lw5 = array_map(function ($lw5) {
        return $lw5;
    }, array(-1.123080732, 4.523709209, -0.540963209, -0.455695692, 0.545562897, 7.550382003));
    $lw6 = array_map(function ($lw6) {
        return $lw6;
    }, array(-1.827031348, -0.259062441, -3.390775346, -1.683770862, 3.502561643, -8.481054026));
    $lw7 = array_map(function ($lw7) {
        return $lw7;
    }, array(0.833873616, 2.285169009, -2.838720781, 0.872126974, 0.875462487, 8.203840867));
    $lw8 = array_map(function ($lw8) {
        return $lw8;
    }, array(-0.963157375, -2.188788763, 0.668168219, 1.9968927, -2.103083941, -8.022778431));
    $lw9 = array_map(function ($lw9) {
        return $lw9;
    }, array(1.132917103, 1.600553149, 2.618682399, -2.82234085, -0.530007663, -0.580363047));
    $lw10 = array_map(function ($lw10) {
        return $lw10;
    }, array(-0.730878252, 2.031396531, -1.727864928, -2.9483967, 2.699861715, -2.320003766));
    $lw11 = array_map(function ($lw11) {
        return $lw11;
    }, array(2.671705361, 1.58871308, -0.59313422, -3.128420388, -2.14228115, 0.060186806));
    $lw12 = array_map(function ($lw12) {
        return $lw12;
    }, array(2.84750469, 0.126878827, -1.60553147, -2.01070206, 0.970815974, 1.374336257));

    $LW1 = array_map(function ($LW1) {
        return $LW1;
    }, array(6.2254335, -4.015034441));
    $LW2 = array_map(function ($LW2) {
        return $LW2;
    }, array(-6.012511519, 6.05361339));
    $LW3 = array_map(function ($LW3) {
        return $LW3;
    }, array(-3.143190582, 0.52683379));
    $LW4 = array_map(function ($LW4) {
        return $LW4;
    }, array(-2.766916244, -1.11503731));
    $LW5 = array_map(function ($LW5) {
        return $LW5;
    }, array(4.236847865, -7.677827371));
    $LW6 = array_map(function ($LW6) {
        return $LW6;
    }, array(-20.95008669, 21.00775925));

    # bias sementara
    $b1 = array_map(function ($b1) {
        return $b1;
    }, array(-1.790525905, 11.36570258, 14.62311269, 8.602512155, -4.357994659, 8.649507713, -8.911788306, 4.171161474, -0.565082241, 2.735544057, -3.077356624, 6.354825525));
    $b2  = array_map(function ($b2) {
        return $b2;
    }, array(1.694680554, -3.468221759, 0.225607947, 3.222025275, 6.269792562, 1.222798893));
    $b3  = array_map(function ($b3) {
        return $b3;
    }, array(3.106213059, -1.734760941));

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

    $a_1 = $lw1[0] * $A1 + $lw2[0] * $A2 + $lw3[0] * $A3 + $lw4[0] * $A4 + $lw5[0] * $A5 + $lw6[0] * $A6 + $lw7[0] * $A7 + $lw8[0] * $A8 + $lw9[0] * $A9 + $lw10[0] * $A10 + $lw11[0] * $A11 + $lw12[0] * $A12 + $b2[0];
    $a_2 = $lw1[1] * $A1 + $lw2[1] * $A2 + $lw3[1] * $A3 + $lw4[1] * $A4 + $lw5[1] * $A5 + $lw6[1] * $A6 + $lw7[1] * $A7 + $lw8[1] * $A8 + $lw9[1] * $A9 + $lw10[1] * $A10 + $lw11[1] * $A11 + $lw12[1] * $A12 + $b2[1];
    $a_3 = $lw1[2] * $A1 + $lw2[2] * $A2 + $lw3[2] * $A3 + $lw4[2] * $A4 + $lw5[2] * $A5 + $lw6[2] * $A6 + $lw7[2] * $A7 + $lw8[2] * $A8 + $lw9[2] * $A9 + $lw10[2] * $A10 + $lw11[2] * $A11 + $lw12[2] * $A12 + $b2[2];
    $a_4 = $lw1[3] * $A1 + $lw2[3] * $A2 + $lw3[3] * $A3 + $lw4[3] * $A4 + $lw5[3] * $A5 + $lw6[3] * $A6 + $lw7[3] * $A7 + $lw8[3] * $A8 + $lw9[3] * $A9 + $lw10[3] * $A10 + $lw11[3] * $A11 + $lw12[3] * $A12 + $b2[3];
    $a_5 = $lw1[4] * $A1 + $lw2[4] * $A2 + $lw3[4] * $A3 + $lw4[4] * $A4 + $lw5[4] * $A5 + $lw6[4] * $A6 + $lw7[4] * $A7 + $lw8[4] * $A8 + $lw9[4] * $A9 + $lw10[4] * $A10 + $lw11[4] * $A11 + $lw12[4] * $A12 + $b2[4];
    $a_6 = $lw1[5] * $A1 + $lw2[5] * $A2 + $lw3[5] * $A3 + $lw4[5] * $A4 + $lw5[5] * $A5 + $lw6[5] * $A6 + $lw7[5] * $A7 + $lw8[5] * $A8 + $lw9[5] * $A9 + $lw10[5] * $A10 + $lw11[5] * $A11 + $lw12[5] * $A12 + $b2[5];
    $A_1 = 1 / (1 + exp(-1 * $a_1));
    $A_2 = 1 / (1 + exp(-1 * $a_2));
    $A_3 = 1 / (1 + exp(-1 * $a_3));
    $A_4 = 1 / (1 + exp(-1 * $a_4));
    $A_5 = 1 / (1 + exp(-1 * $a_5));
    $A_6 = 1 / (1 + exp(-1 * $a_6));

    $z1 = $LW1[0] * $A_1 + $LW2[0] * $A_2 + $LW3[0] * $A_3 + $LW4[0] * $A_4 + $LW5[0] * $A_5 + $LW6[0] * $A_6 + $b3[0];
    $z2 = $LW1[1] * $A_1 + $LW2[1] * $A_2 + $LW3[1] * $A_3 + $LW4[1] * $A_4 + $LW5[1] * $A_5 + $LW6[1] * $A_6 + $b3[1];
    $Y1 = 1 / (1 + exp(-1 * $z1));
    $Y2 = 1 / (1 + exp(-1 * $z2));
    $format_Z1 = number_format($Y1, 2, ",", ".");
    $format_Z2 = number_format($Y2, 2, ",", ".");

    $prediksi_bpnn  = array_map(function ($prediksi_bpnn) {
        return $prediksi_bpnn;
    }, array(
        "SEDANG" => $format_Z1,
        "TINGGI" => $format_Z2,
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
            <p class="title text-center fs-4">TESTING BACKPROPAGATION NEURAL NETWORK TANPA USER</p>
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
                                <th>X1'</th>
                                <th>X2'</th>
                            </tr>
                            <?php foreach ($testing as $data) : ?>
                                <tr>
                                    <td><?= $data->id; ?></td>
                                    <td><?= $data->flowrate; ?></td>
                                    <td><?= $data->volume; ?></td>
                                    <td><?= $data->kecepatan; ?></td>
                                    <td><?= $data->x1; ?></td>
                                    <td><?= $data->x2; ?></td>
                                    <td><?= $data->y1; ?></td>
                                    <td><?= $data->y2; ?></td>
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