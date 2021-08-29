<?php
require '../control/metode.php';
?>

<!-- page content -->
<span class="font-bold text-title" id="count">
	<?php echo $count; 
	?></span>
<span class="font-bold text-title" id="bpnn">
	<?php echo $area; 
	?></span>

<div class="area" id="area1">
	<h5>BPNN CABANG 1</h5>
	<p>Sensor 1 = <span class="font-bold text-title"><?php echo $flow1; ?></span> L/M</p>
	<p>Sensor 2 = <span class="font-bold text-title"><?php echo $flow2; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_1 font-bold text-title" id="span_bocor_1">
			<?php print_r($bpnn_cabang1); #$hasil_area1;
			?>
		</span>
	</p>
</div>

<div class="area" id="area2">
	<h5>BPNN CABANG 2</h5>
	<p>Sensor 3 = <span class="font-bold text-title"><?php echo $flow3; ?></span> L/M</p>
	<p>Sensor 4 = <span class="font-bold text-title"><?php echo $flow4; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_2 font-bold text-title" id="span_bocor_2">
			<?php print_r($bpnn_cabang2); #$hasil_area2;
			?>
		</span>
	</p>
</div>

<div class="area" id="area3">
	<h5>BPNN CABANG 3</h5>
	<p>Sensor 5 = <span class="font-bold text-title"><?php echo $flow5; ?></span> L/M</p>
	<p>Sensor 6 = <span class="font-bold text-title"><?php echo $flow6; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_3 font-bold text-title" id="span_bocor_3">
			<?php print_r($bpnn_cabang3); #$hasil_area3;
			?>
		</span>
	</p>
</div>

<div class="area" id="area4">
	<h5>BPNN CABANG 4</h5>
	<p>Sensor 7 = <span class="font-bold text-title"><?php echo $flow7; ?></span> L/M</p>
	<p>Sensor 8 = <span class="font-bold text-title"><?php echo $flow8; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_4 font-bold text-title" id="span_bocor_4">
			<?php print_r($bpnn_cabang4); #$hasil_area4;
			?>
		</span>
	</p>
</div>

<div class="area" id="area5">
	<h5>BPNN CABANG 5</h5>
	<p>Sensor 9 = <span class="font-bold text-title"><?php echo $flow9; ?></span> L/M</p>
	<p>Sensor 10 = <span class="font-bold text-title"><?php echo $flow10; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_5 font-bold text-title" id="span_bocor_5">
			<?php print_r($bpnn_cabang5); #$hasil_area5;
			?>
		</span>
	</p>
</div>

<div class="area" id="area6">
	<h5>BPNN CABANG 6</h5>
	<p>Sensor 11 = <span class="font-bold text-title"><?php echo $flow11; ?></span> L/M</p>
	<p>Sensor 12 = <span class="font-bold text-title"><?php echo $flow12; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_6 font-bold text-title" id="span_bocor_6">
			<?php print_r($bpnn_cabang6); #$hasil_area6;
			?>
		</span>
	</p>
</div>

<div class="area" id="area7">
	<h5>BPNN CABANG 7</h5>
	<p>Sensor 13 = <span class="font-bold text-title"><?php echo $flow13; ?></span> L/M</p>
	<p>Sensor 14 = <span class="font-bold text-title"><?php echo $flow14; ?></span> L/M</p>
	<p class="kondisi">Kondisi =
		<span class="span_bocor_7 font-bold text-title" id="span_bocor_7">
			<?php print_r($bpnn_cabang7); #$hasil_area7; 
			?>
		</span>
	</p>
</div>

<!-- Nilai Naive Bayes -->

<div class="area" id="nilai_nb1">
	<h5>NB CABANG 1</h5>
	<p>Sensor 1 = <span class="font-bold text-title"><?php echo $flow1; ?></span> L/M</p>
	<p>Sensor 2 = <span class="font-bold text-title"><?php echo $flow2; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_1 font-bold text-title" id="span_bocor_1">
			<?php print_r($nb_cabang1); #print_r($result1);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb2">
	<h5>NB CABANG 2</h5>
	<p>Sensor 3 = <span class="font-bold text-title"><?php echo $flow3; ?></span> L/M</p>
	<p>Sensor 4 = <span class="font-bold text-title"><?php echo $flow4; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_2 font-bold text-title" id="span_bocor_2">
			<?php print_r($nb_cabang2); #print_r($result2);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb3">
	<h5>NB CABANG 3</h5>
	<p>Sensor 5 = <span class="font-bold text-title"><?php echo $flow5; ?></span> L/M</p>
	<p>Sensor 6 = <span class="font-bold text-title"><?php echo $flow6; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_3 font-bold text-title" id="span_bocor_3">
			<?php print_r($nb_cabang3); #print_r($result3);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb4">
	<h5>NB CABANG 4</h5>
	<p>Sensor 7 = <span class="font-bold text-title"><?php echo $flow7; ?></span> L/M</p>
	<p>Sensor 8 = <span class="font-bold text-title"><?php echo $flow8; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_4 font-bold text-title" id="span_bocor_4">
			<?php print_r($nb_cabang4); #print_r($result4);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb5">
	<h5>NB CABANG 5</h5>
	<p>Sensor 9 = <span class="font-bold text-title"><?php echo $flow9; ?></span> L/M</p>
	<p>Sensor 10 = <span class="font-bold text-title"><?php echo $flow10; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_5 font-bold text-title" id="span_bocor_5">
			<?php print_r($nb_cabang5); #print_r($result5);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb6">
	<h5>NB CABANG 6</h5>
	<p>Sensor 11 = <span class="font-bold text-title"><?php echo $flow11; ?></span> L/M</p>
	<p>Sensor 12 = <span class="font-bold text-title"><?php echo $flow12; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_6 font-bold text-title" id="span_bocor_6">
			<?php print_r($nb_cabang6); #print_r($result6);
			?>
		</span>
	</p>
</div>

<div class="area" id="nilai_nb7">
	<h5>NB CABANG 7</h5>
	<p>Sensor 13 = <span class="font-bold text-title"><?php echo $flow13; ?></span> L/M</p>
	<p>Sensor 14 = <span class="font-bold text-title"><?php echo $flow14; ?></span> L/M</p>
	<p class="kondisi">Nilai =
		<span class="span_bocor_7 font-bold text-title" id="span_bocor_7">
			<?php echo print_r($nb_cabang7); #print_r($result7);
			?>
		</span>
	</p>
</div>

<!-- page database -->

<div class="card_inner" id="sensor1">
	<h5>Sensor 1</h5>
	<br>
	<p>Q = <span><?php echo $flow1; ?></span> L/min</p>
	<p>V = <span><?php echo $volume1; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan1; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor2">
	<h5>Sensor 2</h5>
	<br>
	<p>Q = <span><?php echo $flow2; ?></span> L/min</p>
	<p>V = <span><?php echo $volume2; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan2; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor3">
	<h5>Sensor 3</h5>
	<br>
	<p>Q = <span><?php echo $flow3; ?></span> L/min</p>
	<p>V = <span><?php echo $volume3; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan3; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor4">
	<h5>Sensor 4</h5>
	<br>
	<p>Q = <span><?php echo $flow4; ?></span> L/min</p>
	<p>V = <span><?php echo $volume4; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan4; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor5">
	<h5>Sensor 5</h5>
	<br>
	<p>Q = <span><?php echo $flow5; ?></span> L/min</p>
	<p>V = <span><?php echo $volume5; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan5; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor6">
	<h5>Sensor 6</h5>
	<br>
	<p>Q = <span><?php echo $flow6; ?></span> L/min</p>
	<p>V = <span><?php echo $volume6; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan6; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor7">
	<h5>Sensor 7</h5>
	<br>
	<p>Q = <span><?php echo $flow7; ?></span> L/min</p>
	<p>V = <span><?php echo $volume7; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan7; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor8">
	<h5>Sensor 8</h5>
	<br>
	<p>Q = <span><?php echo $flow8; ?></span> L/min</p>
	<p>V = <span><?php echo $volume8; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan8; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor9">
	<h5>Sensor 9</h5>
	<br>
	<p>Q = <span><?php echo $flow9; ?></span> L/min</p>
	<p>V = <span><?php echo $volume9; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan9; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor10">
	<h5>Sensor 10</h5>
	<br>
	<p>Q = <span><?php echo $flow10; ?></span> L/min</p>
	<p>V = <span><?php echo $volume10; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan10; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor11">
	<h5>Sensor 11</h5>
	<br>
	<p>Q = <span><?php echo $flow11; ?></span> L/min</p>
	<p>V = <span><?php echo $volume11; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan11; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor12">
	<h5>Sensor 12</h5>
	<br>
	<p>Q = <span><?php echo $flow12; ?></span> L/min</p>
	<p>V = <span><?php echo $volume12; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan12; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor13">
	<h5>Sensor 13</h5>
	<br>
	<p>Q = <span><?php echo $flow13; ?></span> L/min</p>
	<p>V = <span><?php echo $volume13; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan13; ?></span> m/s</p>
</div>

<div class="card_inner" id="sensor14">
	<h5>Sensor 14</h5>
	<br>
	<p>Q = <span><?php echo $flow14; ?></span> L/min</p>
	<p>V = <span><?php echo $volume14; ?></span> L</p>
	<p>v = <span><?php echo $kecepatan14; ?></span> m/s</p>
</div>