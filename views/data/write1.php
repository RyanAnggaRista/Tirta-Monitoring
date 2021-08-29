<?php
    //Variabel database
    include '../../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor1'];
    $var2 = $_GET['volumeSensor1'];
    $var3 = $_GET['kecepatanSensor1'];
    
    mysqli_query($conn, "UPDATE test_sensor1 SET flowrateSensor1='$var1'");
    mysqli_query($conn, "UPDATE test_sensor1 SET volumeSensor1='$var2'");
    mysqli_query($conn, "UPDATE test_sensor1 SET kecepatanSensor1='$var3'");
