<?php
    //Variabel database
    include '../../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor1'];
    $var2 = $_GET['volumeSensor1'];
    $var3 = $_GET['countSensor1'];
    
    mysqli_query ($conn,"INSERT INTO count1(flowrateSensor1, volumeSensor1, countSensor1) VALUES ('$var1','$var2','$var3')");

