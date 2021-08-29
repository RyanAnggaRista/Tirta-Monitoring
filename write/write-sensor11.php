<?php
    //Variabel database
    include '../control/koneksi.php';

    // Prepare the SQL statement
    $var1 = $_GET['flowrateSensor11'];
    $var2 = $_GET['volumeSensor11'];
    $var3 = $_GET['kecepatanSensor11'];
    
    mysqli_query($conn, "UPDATE sensor11 SET flowrateSensor11='$var1'");
    mysqli_query($conn, "UPDATE sensor11 SET volumeSensor11='$var2'");
    mysqli_query($conn, "UPDATE sensor11 SET kecepatanSensor11='$var3'");
    
    mysqli_query ($conn,"INSERT INTO tbl_sensor11(flowrateSensor11, volumeSensor11, kecepatanSensor11) VALUES ('$var1','$var2','$var3')");
    
?>