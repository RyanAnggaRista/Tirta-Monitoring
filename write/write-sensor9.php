<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor9'];
    $var2 = $_GET['volumeSensor9'];
    $var3 = $_GET['kecepatanSensor9'];
    
    mysqli_query($conn, "UPDATE sensor9 SET flowrateSensor9='$var1'");
    mysqli_query($conn, "UPDATE sensor9 SET volumeSensor9='$var2'");
    mysqli_query($conn, "UPDATE sensor9 SET kecepatanSensor9='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor9(flowrateSensor9, volumeSensor9, kecepatanSensor9) VALUES ('$var1','$var2','$var3')");
    
?>