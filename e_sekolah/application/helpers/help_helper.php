<?php 

function getcurl($url, $exit = 0)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	if ($exit == '1') {
		eduprint($result);
		exit;
	}
	curl_close($ch);
	return json_decode($result, true);
}


function postcurl($url, $data, $exit = 0)
{
	// $nyoba = array();
	// $nyoba['email'] = 'daniyal.hafidz@gmail.com';
	// $nyoba['password'] = 'Asdf@2';

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	// curl_setopt(
	// 	$ch,
	// 	CURLOPT_HTTPHEADER,
	// 	array(
	// 		'Content-Length: ' . strlen($data)
	// 	)
	// );

	$result = curl_exec($ch);
	if ($exit == '1') {
		eduprint($result);
		exit;
	}
	curl_close($ch);
	return json_decode($result, true);
}

function eduprint($sesuatu, $exit = 0)
{

	echo '<pre>', print_r($sesuatu, 1), '</pre>';
	if ($exit == '1') {
		exit;
	}
}

// $inc_ = 'http://localhost/edunovasi/tryout';
// $base_api = "https://backend.edunovasi.com/api_mobile/api/";
// $base_api_dashboard = "https://backend.edunovasi.com/api_mobile/api_dashboard/";
// $base_api_dashboard_dinas = "https://backend.edunovasi.com/api_mobile/api_dashboard_dinas/";
// $base_api_user = "https://backend.edunovasi.com/api_mobile/api_user/";
// $base_api_irt = "https://backend.edunovasi.com/api_mobile/api_irt/";
// $base_api_dinas = "https://backend.edunovasi.com/api_mobile/api_dinas/";
// $base_api_master = "https://backend.edunovasi.com/api_mobile/api_master/";
// $edun_api = "https://api.edunitas.com/mod/edun-";
// $base_backend = "backend.edunovasi.com";


function inc_(){
	$data = base_url('tryout');

	return $data;
}

function api_m_sekolah(){
	$base_api_sekolah = "https://backend.edunovasi.com/api_mobile/api_m_sekolah/";
	return $base_api_sekolah;
}


function api_m_sekolah_dashboard(){
	$base_api_sekolah = "https://backend.edunovasi.com/api_mobile/api_m_sekolah_dashboard/";
	return $base_api_sekolah;
}

function base_api_dashboard(){
	$base_api_dashboard = "https://backend.edunovasi.com/api_mobile/api_dashboard/";
	return $base_api_dashboard;
}

function TanggalIndo($date)
{
	if($date == "")
	{
		return null;
	}

	if($date == "0000-00-00")
	{
		return null;
	}
	
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
?>