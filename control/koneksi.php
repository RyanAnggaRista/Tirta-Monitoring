<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "db_tirta";

$conn = mysqli_connect($servername, $username, $password, $db); // menggunakan mysqli_connect

if(mysqli_connect_errno()){ // mengecek apakah koneksi database error
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error(); // pesan ketika koneksi database error
}

//variabel monitoring
$monitoring_sensor1 = mysqli_query($conn, "select * from sensor1");
$monitoring_sensor2 = mysqli_query($conn, "select * from sensor2");
$monitoring_sensor3 = mysqli_query($conn, "select * from sensor3");
$monitoring_sensor4 = mysqli_query($conn, "select * from sensor4");
$monitoring_sensor5 = mysqli_query($conn, "select * from sensor5");
$monitoring_sensor6 = mysqli_query($conn, "select * from sensor6");
$monitoring_sensor7 = mysqli_query($conn, "select * from sensor7");
$monitoring_sensor8 = mysqli_query($conn, "select * from sensor8");
$monitoring_sensor9 = mysqli_query($conn, "select * from sensor9");
$monitoring_sensor10 = mysqli_query($conn, "select * from sensor10");
$monitoring_sensor11 = mysqli_query($conn, "select * from sensor11");
$monitoring_sensor12 = mysqli_query($conn, "select * from sensor12");
$monitoring_sensor13 = mysqli_query($conn, "select * from sensor13");
$monitoring_sensor14 = mysqli_query($conn, "select * from sensor14");

$monitoring_data1 = mysqli_fetch_array($monitoring_sensor1);
$monitoring_data2 = mysqli_fetch_array($monitoring_sensor2);
$monitoring_data3 = mysqli_fetch_array($monitoring_sensor3);
$monitoring_data4 = mysqli_fetch_array($monitoring_sensor4);
$monitoring_data5 = mysqli_fetch_array($monitoring_sensor5);
$monitoring_data6 = mysqli_fetch_array($monitoring_sensor6);
$monitoring_data7 = mysqli_fetch_array($monitoring_sensor7);
$monitoring_data8 = mysqli_fetch_array($monitoring_sensor8);
$monitoring_data9 = mysqli_fetch_array($monitoring_sensor9);
$monitoring_data10 = mysqli_fetch_array($monitoring_sensor10);
$monitoring_data11 = mysqli_fetch_array($monitoring_sensor11);
$monitoring_data12 = mysqli_fetch_array($monitoring_sensor12);
$monitoring_data13 = mysqli_fetch_array($monitoring_sensor13);
$monitoring_data14 = mysqli_fetch_array($monitoring_sensor14);

$flow1 = $monitoring_data1["flowrateSensor1"];
$flow2 = $monitoring_data2["flowrateSensor2"];
$flow3 = $monitoring_data3["flowrateSensor3"];
$flow4 = $monitoring_data4["flowrateSensor4"];
$flow5 = $monitoring_data5["flowrateSensor5"];
$flow6 = $monitoring_data6["flowrateSensor6"];
$flow7 = $monitoring_data7["flowrateSensor7"];
$flow8 = $monitoring_data8["flowrateSensor8"];
$flow9 = $monitoring_data9["flowrateSensor9"];
$flow10 = $monitoring_data10["flowrateSensor10"];
$flow11 = $monitoring_data11["flowrateSensor11"];
$flow12 = $monitoring_data12["flowrateSensor12"];
$flow13 = $monitoring_data13["flowrateSensor13"];
$flow14 = $monitoring_data14["flowrateSensor14"];

$volume1 = $monitoring_data1["volumeSensor1"];
$volume2 = $monitoring_data2["volumeSensor2"];
$volume3 = $monitoring_data3["volumeSensor3"];
$volume4 = $monitoring_data4["volumeSensor4"];
$volume5 = $monitoring_data5["volumeSensor5"];
$volume6 = $monitoring_data6["volumeSensor6"];
$volume7 = $monitoring_data7["volumeSensor7"];
$volume8 = $monitoring_data8["volumeSensor8"];
$volume9 = $monitoring_data9["volumeSensor9"];
$volume10 = $monitoring_data10["volumeSensor10"];
$volume11 = $monitoring_data11["volumeSensor11"];
$volume12 = $monitoring_data12["volumeSensor12"];
$volume13 = $monitoring_data13["volumeSensor13"];
$volume14 = $monitoring_data14["volumeSensor14"];

$kecepatan1 = $monitoring_data1["kecepatanSensor1"];
$kecepatan2 = $monitoring_data2["kecepatanSensor2"];
$kecepatan3 = $monitoring_data3["kecepatanSensor3"];
$kecepatan4 = $monitoring_data4["kecepatanSensor4"];
$kecepatan5 = $monitoring_data5["kecepatanSensor5"];
$kecepatan6 = $monitoring_data6["kecepatanSensor6"];
$kecepatan7 = $monitoring_data7["kecepatanSensor7"];
$kecepatan8 = $monitoring_data8["kecepatanSensor8"];
$kecepatan9 = $monitoring_data9["kecepatanSensor9"];
$kecepatan10 = $monitoring_data10["kecepatanSensor10"];
$kecepatan11 = $monitoring_data11["kecepatanSensor11"];
$kecepatan12 = $monitoring_data12["kecepatanSensor12"];
$kecepatan13 = $monitoring_data13["kecepatanSensor13"];
$kecepatan14 = $monitoring_data14["kecepatanSensor14"];
