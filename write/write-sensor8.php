<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor8'];
    $var2 = $_GET['volumeSensor8'];
    $var3 = $_GET['kecepatanSensor8'];
    
    mysqli_query($conn, "UPDATE sensor8 SET flowrateSensor8='$var1'");
    mysqli_query($conn, "UPDATE sensor8 SET volumeSensor8='$var2'");
    mysqli_query($conn, "UPDATE sensor8 SET kecepatanSensor8='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor8(flowrateSensor8, volumeSensor8, kecepatanSensor8) VALUES ('$var1','$var2','$var3')");
    
?>