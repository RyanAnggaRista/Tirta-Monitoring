<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor7'];
    $var2 = $_GET['volumeSensor7'];
    $var3 = $_GET['kecepatanSensor7'];
    
    mysqli_query($conn, "UPDATE sensor7 SET flowrateSensor7='$var1'");
    mysqli_query($conn, "UPDATE sensor7 SET volumeSensor7='$var2'");
    mysqli_query($conn, "UPDATE sensor7 SET kecepatanSensor7='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor7(flowrateSensor7, volumeSensor7, kecepatanSensor7) VALUES ('$var1','$var2','$var3')");
    
?>