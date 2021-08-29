<?php

$dsn = 'mysql:host=localhost;dbname=db_tirta';
$username = 'root';
$password = '';
$options = [];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
}

$sql = 'SELECT * FROM nb_tanpa_user';
$statement = $connection->prepare($sql);
$statement->execute();
$testing = $statement->fetchAll(PDO::FETCH_OBJ);

foreach ($testing as $data) :
    #mean sedang
    $S_flow_mean = 3.724232143;
    $S_vol_mean = 62.06632143;
    $S_kec_mean = 0.163785714;
    #mean tinggi
    $T_flow_mean = 10.861;
    $T_vol_mean = 181.01225;
    $T_kec_mean = 0.476642857;
    #simpangan baku sedang
    $S_flow_std = 2.236919001;
    $S_vol_std = 37.27780197;
    $S_kec_std = 0.098243974;
    #simpangan baku tinggi
    $T_flow_std = 2.834727652;
    $T_vol_std = 47.24514616;
    $T_kec_std = 0.124237927;

    #perhitungan probabilitas
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

    if ($prob_sedang > $prob_tinggi) {
        $value_nb = "BOCOR SEDANG";
    }
    if ($prob_tinggi > $prob_sedang) {
        $value_nb = "BOCOR TINGGI";
    }

    $prediksi_nb  = array_map(function ($prediksi_nb) {
        return $prediksi_nb;
    }, array(
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
            <p class="title text-center fs-4">TESTING NAIVE BAYES TANPA USER</p>
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