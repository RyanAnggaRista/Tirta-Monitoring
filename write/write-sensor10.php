<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor10'];
    $var2 = $_GET['volumeSensor10'];
    $var3 = $_GET['kecepatanSensor10'];
    
    mysqli_query($conn, "UPDATE sensor10 SET flowrateSensor10='$var1'");
    mysqli_query($conn, "UPDATE sensor10 SET volumeSensor10='$var2'");
    mysqli_query($conn, "UPDATE sensor10 SET kecepatanSensor10='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor10(flowrateSensor10, volumeSensor10, kecepatanSensor10) VALUES ('$var1','$var2','$var3')");
    
?>