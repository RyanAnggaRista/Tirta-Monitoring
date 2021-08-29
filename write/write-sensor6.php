<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor6'];
    $var2 = $_GET['volumeSensor6'];
    $var3 = $_GET['kecepatanSensor6'];
    
    mysqli_query($conn, "UPDATE sensor6 SET flowrateSensor6='$var1'");
    mysqli_query($conn, "UPDATE sensor6 SET volumeSensor6='$var2'");
    mysqli_query($conn, "UPDATE sensor6 SET kecepatanSensor6='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor6(flowrateSensor6, volumeSensor6, kecepatanSensor6) VALUES ('$var1','$var2','$var3')");
    
?>