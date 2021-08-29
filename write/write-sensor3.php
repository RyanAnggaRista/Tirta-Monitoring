<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor3'];
    $var2 = $_GET['volumeSensor3'];
    $var3 = $_GET['kecepatanSensor3'];
    
    mysqli_query($conn, "UPDATE sensor3 SET flowrateSensor3='$var1'");
    mysqli_query($conn, "UPDATE sensor3 SET volumeSensor3='$var2'");
    mysqli_query($conn , "UPDATE sensor3 SET kecepatanSensor3='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor3(flowrateSensor3, volumeSensor3, kecepatanSensor3) VALUES ('$var1','$var2','$var3')");
    
?>