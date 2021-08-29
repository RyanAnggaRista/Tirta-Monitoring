<?php
    //Variabel database
    include '../../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor2'];
    $var2 = $_GET['volumeSensor2'];
    $var3 = $_GET['countSensor2'];
    
    mysqli_query ($conn,"INSERT INTO count2(flowrateSensor2, volumeSensor2, countSensor2) VALUES ('$var1','$var2','$var3')");

