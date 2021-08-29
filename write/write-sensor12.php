<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor12'];
    $var2 = $_GET['volumeSensor12'];
    $var3 = $_GET['kecepatanSensor12'];
    
    mysqli_query($conn, "UPDATE sensor12 SET flowrateSensor12='$var1'");
    mysqli_query($conn, "UPDATE sensor12 SET volumeSensor12='$var2'");
    mysqli_query($conn, "UPDATE sensor12 SET kecepatanSensor12='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor12(flowrateSensor12, volumeSensor12, kecepatanSensor12) VALUES ('$var1','$var2','$var3')");
    
?>