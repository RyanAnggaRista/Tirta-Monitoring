<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor2'];
    $var2 = $_GET['volumeSensor2'];
    $var3 = $_GET['kecepatanSensor2'];
    
    mysqli_query($conn, "UPDATE sensor2 SET flowrateSensor2='$var1'");
    mysqli_query($conn, "UPDATE sensor2 SET volumeSensor2='$var2'");
    mysqli_query($conn, "UPDATE sensor2 SET kecepatanSensor2='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor2(flowrateSensor2, volumeSensor2, kecepatanSensor2) VALUES ('$var1','$var2','$var3')");
    
?>