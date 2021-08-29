<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor5'];
    $var2 = $_GET['volumeSensor5'];
    $var3 = $_GET['kecepatanSensor5'];
    
    mysqli_query($conn, "UPDATE sensor5 SET flowrateSensor5='$var1'");
    mysqli_query($conn, "UPDATE sensor5 SET volumeSensor5='$var2'");
    mysqli_query($conn, "UPDATE sensor5 SET kecepatanSensor5='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor5(flowrateSensor5, volumeSensor5, kecepatanSensor5) VALUES ('$var1','$var2','$var3')");
    
?>