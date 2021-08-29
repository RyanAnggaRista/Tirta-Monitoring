<?php
include 'koneksi.php';

function metode_nb($data1, $data2, $data3, $data4, $data5, $data6)
{
	$input_flow = abs($data1 - $data2);
	$input_volume = abs($data3 - $data4);
	$input_kecepatan = abs($data5 - $data6);

	if ($data1 == 0 || $data2 >= 0.5) {
		#mean normal
		$N_flow_mean = 0.4349642857;
		$N_vol_mean = 7.2493678571;
		$N_kec_mean = 0.0190696429;
		#mean sedang
		$S_flow_mean = 2.9466607143;
		$S_vol_mean = 49.1110232143;
		$S_kec_mean = 0.1292642857;
		#mean tinggi
		$T_flow_mean = 8.9122500000;
		$T_vol_mean = 148.5375000000;
		$T_kec_mean = 0.3909392857;

		#simpangan baku normal
		$N_flow_std = 0.3753381302;
		$N_vol_std = 6.2550967703;
		$N_kec_std = 0.0164700085;
		#simpangan baku sedang
		$S_flow_std = 0.9699127637;
		$S_vol_std = 16.1651154347;
		$S_kec_std = 0.0425804511;
		#simpangan baku tinggi
		$T_flow_std = 1.9243532938;
		$T_vol_std = 32.0725266279;
		$T_kec_std = 0.0844176939;

		#perhitungan probabilitas
		$pf_normal = (1 / (sqrt(2 * 3.14 * $N_flow_std))) * exp(- ((pow(($input_flow - $N_flow_mean), 2))) / (2 * (pow(($N_flow_std), 2))));
		$pv_normal = (1 / (sqrt(2 * 3.14 * $N_vol_std))) * exp(- ((pow(($input_volume - $N_vol_mean), 2))) / (2 * (pow(($N_vol_std), 2))));
		$pk_normal = (1 / (sqrt(2 * 3.14 * $N_kec_std))) * exp(- ((pow(($input_kecepatan - $N_kec_mean), 2))) / (2 * (pow(($N_kec_std), 2))));
		$prob_normal = $pf_normal +  $pv_normal + $pk_normal;
		$format_prob_normal = number_format($prob_normal, 3, ",", ".");

		$pf_sedang = (1 / (sqrt(2 * 3.14 * $S_flow_std))) * exp(- ((pow(($input_flow - $S_flow_mean), 2))) / (2 * (pow(($S_flow_std), 2))));
		$pv_sedang = (1 / (sqrt(2 * 3.14 * $S_vol_std))) * exp(- ((pow(($input_volume - $S_vol_mean), 2))) / (2 * (pow(($S_vol_std), 2))));
		$pk_sedang = (1 / (sqrt(2 * 3.14 * $S_kec_std))) * exp(- ((pow(($input_kecepatan - $S_kec_mean), 2))) / (2 * (pow(($S_kec_std), 2))));
		$prob_sedang = $pf_sedang +  $pv_sedang + $pk_sedang;
		$format_prob_sedang = number_format($prob_sedang, 3, ",", ".");

		$pf_tinggi = (1 / (sqrt(2 * 3.14 * $T_flow_std))) * exp(- ((pow(($input_flow - $T_flow_mean), 2))) / (2 * (pow(($T_flow_std), 2))));
		$pv_tinggi = (1 / (sqrt(2 * 3.14 * $T_vol_std))) * exp(- ((pow(($input_volume - $T_vol_mean), 2))) / (2 * (pow(($T_vol_std), 2))));
		$pk_tinggi = (1 / (sqrt(2 * 3.14 * $T_kec_std))) * exp(- ((pow(($input_kecepatan - $T_kec_mean), 2))) / (2 * (pow(($T_kec_std), 2))));
		$prob_tinggi = $pf_tinggi +  $pv_tinggi + $pk_tinggi;
		$format_prob_tinggi = number_format($prob_tinggi, 3, ",", ".");

		if ($prob_normal > $prob_sedang && $prob_normal > $prob_tinggi) {
			$value_nb = "NORMAL";
		}
		if ($prob_sedang > $prob_normal && $prob_sedang > $prob_tinggi) {
			$value_nb = "BOCOR SEDANG";
		}
		if ($prob_tinggi > $prob_sedang && $prob_tinggi > $prob_normal) {
			$value_nb = "BOCOR TINGGI";
		}

		$prediksi_nb  = array_map(function ($prediksi_nb) {
			return $prediksi_nb;
		}, array(
			"NORMAL" => $format_prob_normal,
			"SEDANG" => $format_prob_sedang,
			"TINGGI" => $format_prob_tinggi,
		));
	} else {
		#mean sedang
		$S_flow_mean = 3.7294107143;
		$S_vol_mean = 62.1568875000;
		$S_kec_mean = 0.1636000000;
		#mean tinggi
		$T_flow_mean = 10.8262500000;
		$T_vol_mean = 180.4374678571;
		$T_kec_mean = 0.4748553571;
		#simpangan baku sedang
		$S_flow_std = 2.1983506991;
		$S_vol_std = 36.6391728252;
		$S_kec_std = 0.0965353106;
		#simpangan baku tinggi
		$T_flow_std = 2.8404345330;
		$T_vol_std = 47.3405188762;
		$T_kec_std = 0.1247288508;

		#perhitungan probabilitas
		$pf_sedang = (1 / (sqrt(2 * 3.14 * $S_flow_std))) * exp(- ((pow(($input_flow - $S_flow_mean), 2))) / (2 * (pow(($S_flow_std), 2))));
		$pv_sedang = (1 / (sqrt(2 * 3.14 * $S_vol_std))) * exp(- ((pow(($input_volume - $S_vol_mean), 2))) / (2 * (pow(($S_vol_std), 2))));
		$pk_sedang = (1 / (sqrt(2 * 3.14 * $S_kec_std))) * exp(- ((pow(($input_kecepatan - $S_kec_mean), 2))) / (2 * (pow(($S_kec_std), 2))));
		$prob_sedang = $pf_sedang +  $pv_sedang + $pk_sedang;
		$format_prob_sedang = number_format($prob_sedang, 3, ",", ".");

		$pf_tinggi = (1 / (sqrt(2 * 3.14 * $T_flow_std))) * exp(- ((pow(($input_flow - $T_flow_mean), 2))) / (2 * (pow(($T_flow_std), 2))));
		$pv_tinggi = (1 / (sqrt(2 * 3.14 * $T_vol_std))) * exp(- ((pow(($input_volume - $T_vol_mean), 2))) / (2 * (pow(($T_vol_std), 2))));
		$pk_tinggi = (1 / (sqrt(2 * 3.14 * $T_kec_std))) * exp(- ((pow(($input_kecepatan - $T_kec_mean), 2))) / (2 * (pow(($T_kec_std), 2))));
		$prob_tinggi = $pf_tinggi +  $pv_tinggi + $pk_tinggi;
		$format_prob_tinggi = number_format($prob_tinggi, 3, ",", ".");

		if ($prob_sedang > $prob_tinggi) {
			$value_nb = "BOCOR SEDANG";
		}
		if ($prob_tinggi > $prob_sedang) {
			$value_nb = "BOCOR TINGGI";
		}

		$prediksi_nb  = array_map(function ($prediksi_nb) {
			return $prediksi_nb;
		}, array(
			"SEDANG" => $format_prob_sedang,
			"TINGGI" => $format_prob_tinggi,
		));
	}
	arsort($prediksi_nb);
	return $prediksi_nb;
}
function metode_bpnn($data1, $data2, $data3, $data4, $data5, $data6)
{
	# Bagian Flow
	$input_flow = abs(($data1 - $data2) / 1000);
	$input_volume = abs(($data3 - $data4) / 1000);
	$input_kecepatan = abs(($data5 - $data6) / 1000);

	if ($data1 == 0 || $data2 >= 0.5) {
		// variable input output dan lainnya
		$x = array_map(function ($x) {
			return $x;
		}, array($input_flow, $input_volume, $input_kecepatan));

		# bobot
		$iw1 = array_map(function ($iw1) {
			return $iw1;
		}, array(154.5427281, 34.31580382, 7443.878742));
		$iw2 = array_map(function ($iw2) {
			return $iw2;
		}, array(368.6457919, 134.8731622, -2102.518075));
		$iw3 = array_map(function ($iw3) {
			return $iw3;
		}, array(-234.9798928, -671.5720866, 11275.8071));
		$iw4 = array_map(function ($iw4) {
			return $iw4;
		}, array(-109.4426694, 35.94142524, -6877.454129));

		$lw1 = array_map(function ($lw1) {
			return $lw1;
		}, array(0.479154515, -16.55164765, 421.2846524, -4.848047785));
		$lw2 = array_map(function ($lw2) {
			return $lw2;
		}, array(-4.602062542, -215.059275, -418.3408575, 1.123544965));
		$lw3 = array_map(function ($lw3) {
			return $lw3;
		}, array(2.089630838, 85.03377716, -10.55698959, -3.453979128));

		# bias sementara
		$b1 = array_map(function ($b1) {
			return $b1;
		}, array(-13.63805087, -11.76631725, 12.91034943, -7.614978503));
		$b2  = array_map(function ($b2) {
			return $b2;
		}, array(-177.9165218, 176.7185541, -62.43181573));

		#forward propagation
		$a1 = $iw1[0] * $x[0] + $iw1[1] * $x[1] + $iw1[2] * $x[2] + $b1[0];
		$a2 = $iw2[0] * $x[0] + $iw2[1] * $x[1] + $iw2[2] * $x[2] + $b1[1];
		$a3 = $iw3[0] * $x[0] + $iw3[1] * $x[1] + $iw3[2] * $x[2] + $b1[2];
		$a4 = $iw4[0] * $x[0] + $iw4[1] * $x[1] + $iw4[2] * $x[2] + $b1[3];
		$A1 = 1 / (1 + exp(-1 * $a1));
		$A2 = 1 / (1 + exp(-1 * $a2));
		$A3 = 1 / (1 + exp(-1 * $a3));
		$A4 = 1 / (1 + exp(-1 * $a4));

		$z1 = $lw1[0] * $A1 + $lw1[1] * $A2 + $lw1[2] * $A3 + $lw1[3] * $A4 + $b2[0];
		$z2 = $lw2[0] * $A1 + $lw2[1] * $A2 + $lw2[2] * $A3 + $lw2[3] * $A4 + $b2[1];
		$z3 = $lw3[0] * $A1 + $lw3[1] * $A2 + $lw3[2] * $A3 + $lw3[3] * $A4 + $b2[2];
		$Z1 = 1 / (1 + exp(-1 * $z1));
		$Z2 = 1 / (1 + exp(-1 * $z2));
		$Z3 = 1 / (1 + exp(-1 * $z3));
		$format_Z1 = number_format($Z1, 2, ",", ".");
		$format_Z2 = number_format($Z2, 2, ",", ".");
		$format_Z3 = number_format($Z3, 2, ",", ".");

		$prediksi_bpnn  = array_map(function ($prediksi_bpnn) {
			return $prediksi_bpnn;
		}, array(
			"NORMAL" => $format_Z1,
			"SEDANG" => $format_Z2,
			"TINGGI" => $format_Z3,
		));
	} else {
		// variable input output dan lainnya
		$x = array_map(function ($x) {
			return $x;
		}, array($input_flow, $input_volume, $input_kecepatan));

		# bobot
		$iw1 = array_map(function ($iw1) {
			return $iw1;
		}, array(41.1228805921, 25.5770796431, 2038.5955528057));
		$iw2 = array_map(function ($iw2) {
			return $iw2;
		}, array(317.3566094143, -15.6912879013, -3258.1600831118));
		$iw3 = array_map(function ($iw3) {
			return $iw3;
		}, array(175.5632389408, -74.6129623863, -8711.9974691570));

		$lw1 = array_map(function ($lw1) {
			return $lw1;
		}, array(3.5742337588, -12.6869426501, 57.8203459889));
		$lw2 = array_map(function ($lw2) {
			return $lw2;
		}, array(-0.2423698134, 16.6237961952, -58.0505073869));

		# bias sementara
		$b1 = array_map(function ($b1) {
			return $b1;
		}, array(-13.7322757639, 7.6746455645, 9.9822447983));
		$b2  = array_map(function ($b2) {
			return $b2;
		}, array(-17.8274456423, 14.0182888941));

		#forward propagation
		$a1 = $iw1[0] * $x[0] + $iw1[1] * $x[1] + $iw1[2] * $x[2] + $b1[0];
		$a2 = $iw2[0] * $x[0] + $iw2[1] * $x[1] + $iw2[2] * $x[2] + $b1[1];
		$a3 = $iw3[0] * $x[0] + $iw3[1] * $x[1] + $iw3[2] * $x[2] + $b1[2];
		$A1 = 1 / (1 + exp(-1 * $a1));
		$A2 = 1 / (1 + exp(-1 * $a2));
		$A3 = 1 / (1 + exp(-1 * $a3));

		$z1 = $lw1[0] * $A1 + $lw1[1] * $A2 + $lw1[2] * $A3 + $b2[0];
		$z2 = $lw2[0] * $A1 + $lw2[1] * $A2 + $lw2[2] * $A3 + $b2[1];
		$Y1 = 1 / (1 + exp(-1 * $z1));
		$Y2 = 1 / (1 + exp(-1 * $z2));
		$format_Z1 = number_format($Y1, 2, ",", ".");
		$format_Z2 = number_format($Y2, 2, ",", ".");

		$prediksi_bpnn  = array_map(function ($prediksi_bpnn) {
			return $prediksi_bpnn;
		}, array(
			"SEDANG" => $format_Z1,
			"TINGGI" => $format_Z2,
		));
	}
	arsort($prediksi_bpnn);
	return $prediksi_bpnn;
}

function analisis_flow($data1, $data2)
{
	# Bagian Flow
	$hasil_flow = $data1 - $data2;
	return $hasil_flow;
}

function analisis_volume($data1, $data2)
{
	# Bagian Volume
	$hasil_volume = $data1 - $data2;
	return $hasil_volume;
}

function analisis_kecepatan($data1, $data2)
{
	# Bagian Kecepatan
	$hasil_kecepatan = $data1 - $data2;
	return $hasil_kecepatan;
}

//area 1
$nb_cabang1 = metode_nb($flow1, $flow2, $volume1, $volume2, $kecepatan1, $kecepatan2);
$bpnn_cabang1 = metode_bpnn($flow1, $flow2, $volume1, $volume2, $kecepatan1, $kecepatan2);
if ($flow1 == 0 || $flow2 >= 0.5) {
	if ($nb_cabang1['NORMAL'] > $nb_cabang1['SEDANG'] && $nb_cabang1['NORMAL'] > $nb_cabang1['TINGGI']) {
		$value_1 = 0;
	} elseif ($nb_cabang1['SEDANG'] > $nb_cabang1['NORMAL'] && $nb_cabang1['SEDANG'] > $nb_cabang1['TINGGI']) {
		$value_1 = 1;
	} else {
		$value_1 = 1;
	}
} else {
	if ($nb_cabang1['SEDANG'] > $nb_cabang1['TINGGI']) {
		$value_1 = 1;
	} else {
		$value_1 = 1;
	}
}
$kondisi_flow1 = analisis_flow($flow1, $flow2);
$kondisi_volume1 = analisis_volume($volume1, $volume2);
$kondisi_kecepatan1 = analisis_kecepatan($kecepatan1, $kecepatan2);

//area 2
$nb_cabang2 = metode_nb($flow3, $flow4, $volume3, $volume4, $kecepatan3, $kecepatan4);
$bpnn_cabang2 = metode_bpnn($flow3, $flow4, $volume3, $volume4, $kecepatan3, $kecepatan4);
if ($flow3 == 0 || $flow4 >= 0.5) {
	if ($nb_cabang2['NORMAL'] > $nb_cabang2['SEDANG'] && $nb_cabang2['NORMAL'] > $nb_cabang2['TINGGI']) {
		$value_2 = 0;
	} elseif ($nb_cabang2['SEDANG'] > $nb_cabang2['NORMAL'] && $nb_cabang2['SEDANG'] > $nb_cabang2['TINGGI']) {
		$value_2 = 1;
	} else {
		$value_2 = 1;
	}
} else {
	if ($nb_cabang2['SEDANG'] > $nb_cabang2['TINGGI']) {
		$value_2 = 1;
	} else {
		$value_2 = 1;
	}
}
$kondisi_flow2 = analisis_flow($flow3, $flow4);
$kondisi_volume2 = analisis_volume($volume3, $volume4);
$kondisi_kecepatan2 = analisis_kecepatan($kecepatan3, $kecepatan4);

//area 3
$nb_cabang3 = metode_nb($flow5, $flow6, $volume5, $volume6, $kecepatan5, $kecepatan6);
$bpnn_cabang3 = metode_bpnn($flow5, $flow6, $volume5, $volume6, $kecepatan5, $kecepatan6);
if ($flow5 == 0 || $flow6 >= 0.5) {
	if ($nb_cabang3['NORMAL'] > $nb_cabang3['SEDANG'] && $nb_cabang3['NORMAL'] > $nb_cabang3['TINGGI']) {
		$value_3 = 0;
	} elseif ($nb_cabang3['SEDANG'] > $nb_cabang3['NORMAL'] && $nb_cabang3['SEDANG'] > $nb_cabang3['TINGGI']) {
		$value_3 = 1;
	} else {
		$value_3 = 1;
	}
} else {
	if ($nb_cabang3['SEDANG'] > $nb_cabang3['TINGGI']) {
		$value_3 = 1;
	} else {
		$value_3 = 1;
	}
}
$kondisi_flow3 = analisis_flow($flow5, $flow6);
$kondisi_volume3 = analisis_volume($volume5, $volume6);
$kondisi_kecepatan3 = analisis_kecepatan($kecepatan5, $kecepatan6);

//area 4
$nb_cabang4 = metode_nb($flow7, $flow8, $volume7, $volume8, $kecepatan7, $kecepatan8);
$bpnn_cabang4 = metode_bpnn($flow7, $flow8, $volume7, $volume8, $kecepatan7, $kecepatan8);
if ($flow7 == 0 || $flow8 >= 0.5) {
	if ($nb_cabang4['NORMAL'] > $nb_cabang4['SEDANG'] && $nb_cabang4['NORMAL'] > $nb_cabang4['TINGGI']) {
		$value_4 = 0;
	} elseif ($nb_cabang4['SEDANG'] > $nb_cabang4['NORMAL'] && $nb_cabang4['SEDANG'] > $nb_cabang4['TINGGI']) {
		$value_4 = 1;
	} else {
		$value_4 = 1;
	}
} else {
	if ($nb_cabang4['SEDANG'] > $nb_cabang4['TINGGI']) {
		$value_4 = 1;
	} else {
		$value_4 = 1;
	}
}
$kondisi_flow4 = analisis_flow($flow7, $flow8);
$kondisi_volume4 = analisis_volume($volume7, $volume8);
$kondisi_kecepatan4 = analisis_kecepatan($kecepatan7, $kecepatan8);

//area 5
$nb_cabang5 = metode_nb($flow9, $flow10, $volume9, $volume10, $kecepatan9, $kecepatan10);
$bpnn_cabang5 = metode_bpnn($flow9, $flow10, $volume9, $volume10, $kecepatan9, $kecepatan10);
if ($flow9 == 0 || $flow10 >= 0.5) {
	if ($nb_cabang5['NORMAL'] > $nb_cabang5['SEDANG'] && $nb_cabang5['NORMAL'] > $nb_cabang5['TINGGI']) {
		$value_5 = 0;
	} elseif ($nb_cabang5['SEDANG'] > $nb_cabang5['NORMAL'] && $nb_cabang5['SEDANG'] > $nb_cabang5['TINGGI']) {
		$value_5 = 1;
	} else {
		$value_5 = 1;
	}
} else {
	if ($nb_cabang5['SEDANG'] > $nb_cabang5['TINGGI']) {
		$value_5 = 1;
	} else {
		$value_5 = 1;
	}
}
$kondisi_flow5 = analisis_flow($flow9, $flow10);
$kondisi_volume5 = analisis_volume($volume9, $volume10);
$kondisi_kecepatan5 = analisis_kecepatan($kecepatan9, $kecepatan10);

//area 6
$nb_cabang6 = metode_nb($flow11, $flow12, $volume11, $volume12, $kecepatan11, $kecepatan12);
$bpnn_cabang6 = metode_bpnn($flow11, $flow12, $volume11, $volume12, $kecepatan11, $kecepatan12);
if ($flow11 == 0 || $flow12 >= 0.5) {
	if ($nb_cabang6['NORMAL'] > $nb_cabang6['SEDANG'] && $nb_cabang6['NORMAL'] > $nb_cabang6['TINGGI']) {
		$value_6 = 0;
	} elseif ($nb_cabang6['SEDANG'] > $nb_cabang6['NORMAL'] && $nb_cabang6['SEDANG'] > $nb_cabang6['TINGGI']) {
		$value_6 = 1;
	} else {
		$value_6 = 1;
	}
} else {
	if ($nb_cabang6['SEDANG'] > $nb_cabang6['TINGGI']) {
		$value_6 = 1;
	} else {
		$value_6 = 1;
	}
}
$kondisi_flow6 = analisis_flow($flow11, $flow12);
$kondisi_volume6 = analisis_volume($volume11, $volume12);
$kondisi_kecepatan6 = analisis_kecepatan($kecepatan11, $kecepatan12);

//area 7
$nb_cabang7 = metode_nb($flow13, $flow14, $volume13, $volume14, $kecepatan13, $kecepatan14);
$bpnn_cabang7 = metode_bpnn($flow13, $flow14, $volume13, $volume14, $kecepatan13, $kecepatan14);
if ($flow13 == 0 || $flow14 >= 0.5) {
	if ($nb_cabang7['NORMAL'] > $nb_cabang7['SEDANG'] && $nb_cabang7['NORMAL'] > $nb_cabang7['TINGGI']) {
		$value_7 = 0;
	} elseif ($nb_cabang7['SEDANG'] > $nb_cabang7['NORMAL'] && $nb_cabang7['SEDANG'] > $nb_cabang7['TINGGI']) {
		$value_7 = 1;
	} else {
		$value_7 = 1;
	}
} else {
	if ($nb_cabang7['SEDANG'] > $nb_cabang7['TINGGI']) {
		$value_7 = 1;
	} else {
		$value_7 = 1;
	}
}
$kondisi_flow7 = analisis_flow($flow13, $flow14);
$kondisi_volume7 = analisis_volume($volume13, $volume14);
$kondisi_kecepatan7 = analisis_kecepatan($kecepatan13, $kecepatan14);

$a = array($value_1, $value_2, $value_3, $value_4, $value_5, $value_6, $value_7);
$count = array_sum($a); // hasil 112
if ($count > 0) {
	$area = "Tidak Aman";
} else {
	$area = "Aman";
}
