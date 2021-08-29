<?php

$dsn = 'mysql:host=localhost;dbname=db_tirta';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}

$sql = 'SELECT * FROM nb_dengan_user';
$statement = $connection->prepare($sql);
$statement->execute();
$testing = $statement->fetchAll(PDO::FETCH_OBJ);

foreach ($testing as $data) :
    // variable input output dan lainnya
    $N_flow_mean = 0.541857143;
    $N_vol_mean = 126.1025536;
    $N_kec_mean = 0.023642857;
    #mean sedang
    $S_flow_mean = 2.969125;
    $S_vol_mean = 281.0534107;
    $S_kec_mean = 0.1305;
    #mean tinggi
    $T_flow_mean = 9.041732143;
    $T_vol_mean = 150.6954643;
    $T_kec_mean = 0.396642857;

    #simpangan baku normal
    $N_flow_std = 0.385005634;
    $N_vol_std = 209.3562909;
    $N_kec_std = 0.017520752;
    #simpangan baku sedang
    $S_flow_std = 0.900866707;
    $S_vol_std = 253.3800487;
    $S_kec_std = 0.039681198;
    #simpangan baku tinggi
    $T_flow_std = 1.811863953;
    $T_vol_std = 30.19768806;
    $T_kec_std = 0.07974916;

    #perhitungan probabilitas
    $pf_normal = (1 / (sqrt(2 * 3.14 * $N_flow_std))) * exp(- ((pow(($data->flowrate - $N_flow_mean), 2))) / (2 * (pow(($N_flow_std), 2))));
    $pv_normal = (1 / (sqrt(2 * 3.14 * $N_vol_std))) * exp(- ((pow(($data->volume - $N_vol_mean), 2))) / (2 * (pow(($N_vol_std), 2))));
    $pk_normal = (1 / (sqrt(2 * 3.14 * $N_kec_std))) * exp(- ((pow(($data->kecepatan - $N_kec_mean), 2))) / (2 * (pow(($N_kec_std), 2))));
    $prob_normal = $pf_normal +  $pv_normal + $pk_normal;
    $format_prob_normal = number_format($prob_normal, 3, ",", ".");

    $pf_sedang = (1 / (sqrt(2 * 3.14 * $S_flow_std))) * exp(- ((pow(($data->flowrate - $S_flow_mean), 2))) / (2 * (pow(($S_flow_std), 2))));
    $pv_sedang = (1 / (sqrt(2 * 3.14 * $S_vol_std))) * exp(- ((pow(($data->volume - $S_vol_mean), 2))) / (2 * (pow(($S_vol_std), 2))));
    $pk_sedang = (1 / (sqrt(2 * 3.14 * $S_kec_std))) * exp(- ((pow(($data->kecepatan - $S_kec_mean), 2))) / (2 * (pow(($S_kec_std), 2))));
    $prob_sedang = $pf_sedang +  $pv_sedang + $pk_sedang;
    $format_prob_sedang = number_format($prob_sedang, 3, ",", ".");

    $pf_tinggi = (1 / (sqrt(2 * 3.14 * $T_flow_std))) * exp(- ((pow(($data->flowrate - $T_flow_mean), 2))) / (2 * (pow(($T_flow_std), 2))));
    $pv_tinggi = (1 / (sqrt(2 * 3.14 * $T_vol_std))) * exp(- ((pow(($data->volume - $T_vol_mean), 2))) / (2 * (pow(($T_vol_std), 2))));
    $pk_tinggi = (1 / (sqrt(2 * 3.14 * $T_kec_std))) * exp(- ((pow(($data->kecepatan - $T_kec_mean), 2))) / (2 * (pow(($T_kec_std), 2))));
    $prob_tinggi = $pf_tinggi +  $pv_tinggi + $pk_tinggi;
    $format_prob_tinggi = number_format($prob_tinggi, 3, ",", ".");

    if ($prob_normal > $prob_sedang && $prob_normal > $prob_tinggi) {
        $value_nb = "NORMAL";
    }
    if ($prob_sedang > $prob_normal && $prob_sedang > $prob_tinggi) {
        $value_nb = "BOCOR SEDANG";
    }
    if ($prob_tinggi > $prob_sedang && $prob_tinggi > $prob_normal) {
        $value_nb = "BOCOR TINGGI";
    }

    $prediksi_nb  = array_map(function ($prediksi_nb) {
        return $prediksi_nb;
    }, array(
        "NORMAL" => $format_prob_normal,
        "SEDANG" => $format_prob_sedang,
        "TINGGI" => $format_prob_tinggi,
    ));

    # print_r($prediksi_nb);
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
            <p class="title text-center fs-4">TESTING NAIVE BAYES DENGAN USER</p>
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