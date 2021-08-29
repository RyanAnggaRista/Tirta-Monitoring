<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor14'];
    $var2 = $_GET['volumeSensor14'];
    $var3 = $_GET['kecepatanSensor14'];
    
    mysqli_query($conn, "UPDATE sensor14 SET flowrateSensor14='$var1'");
    mysqli_query($conn, "UPDATE sensor14 SET volumeSensor14='$var2'");
    mysqli_query($conn, "UPDATE sensor14 SET kecepatanSensor14='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor14(flowrateSensor14, volumeSensor14, kecepatanSensor14) VALUES ('$var1','$var2','$var3')");
    
?>