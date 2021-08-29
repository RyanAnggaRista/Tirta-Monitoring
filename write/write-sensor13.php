<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor13'];
    $var2 = $_GET['volumeSensor13'];
    $var3 = $_GET['kecepatanSensor13'];
    
    mysqli_query($conn, "UPDATE sensor13 SET flowrateSensor13='$var1'");
    mysqli_query($conn, "UPDATE sensor13 SET volumeSensor13='$var2'");
    mysqli_query($conn, "UPDATE sensor13 SET kecepatanSensor13='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor13(flowrateSensor13, volumeSensor13, kecepatanSensor13) VALUES ('$var1','$var2','$var3')");
    
?>