<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor1'];
    $var2 = $_GET['volumeSensor1'];
    $var3 = $_GET['kecepatanSensor1'];
    
    mysqli_query($conn, "UPDATE sensor1 SET flowrateSensor1='$var1'");
    mysqli_query($conn, "UPDATE sensor1 SET volumeSensor1='$var2'");
    mysqli_query($conn, "UPDATE sensor1 SET kecepatanSensor1='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor1(flowrateSensor1, volumeSensor1, kecepatanSensor1) VALUES ('$var1','$var2','$var3')");
?>