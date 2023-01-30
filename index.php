<?php session_start();
date_default_timezone_set("Asia/Jakarta");
$datax = json_decode(file_get_contents('php://input'), true);
$uri = $_SERVER['REQUEST_URI'];
// echo print_r($uri);
// if(isset($_SERVER['QUERY_STRING']) > 0) {
// $uri .= '?' . $_SERVER['QUERY_STRING'];
// }
$inc_ = 'https://edunovasi.com';/* BUAT LIVE  */

$base_api = "https://backend.edunovasi.com/api_mobile/api/";
$base_api_dashboard = "https://backend.edunovasi.com/api_mobile/api_dashboard/";
$base_api_dashboard_dinas = "https://backend.edunovasi.com/api_mobile/api_dashboard_dinas/";
$base_api_user = "https://backend.edunovasi.com/api_mobile/api_user/";
$base_api_irt = "https://backend.edunovasi.com/api_mobile/api_irt/";
$base_api_dinas = "https://backend.edunovasi.com/api_mobile/api_dinas/";
$base_api_master = "https://backend.edunovasi.com/api_mobile/api_master/";

$base_api_sekolah = "https://backend.edunovasi.com/api_mobile/api_m_sekolah/";

$edun_api = "https://api.edunitas.com/mod/edun-";
$base_backend = "backend.edunovasi.com";

// $base_api = "https://backendtryout.edunitas.com/api_mobile/api/";

if ($uri == '/pendaftaran-tryout-nasional-2023-tes-skolastik') {
	$uri = '/event/pendaftaran/nasional';
}
$arr_urinya = array_filter(@explode("/", $uri));

// Ngakalin
array_unshift($arr_urinya, "", "tryout");
unset($arr_urinya[0]);
// Ngakalin


// eduprint($arr_urinya);

$sesi = array();
if (isset($_SESSION['userdata'])) {
	$sesi = $_SESSION['userdata'];
} else {
	$sesi['email'] = '';
}


if (count($arr_urinya) > 10) {
	require_once('pages/404.php');
	exit;
} else {

	$title = 'Try Out Online Terbaik - Berisi Ribuan Soal Try Out';
	$author = 'Try Out';
	$keyword = 'Try Out, event, cari event, Latihan online';
	$description = 'Latihan soal Try Out lengkap dengan pembahasan yang mudah dipahami, metode paling efektif untuk meningkatkan kemampuan siswa dalam menghadapi ujian.';
	$news_keywords = 'Try Out, Tryo Out, Try Out Online, Try Out Terbaik, Try Out Gratis, Soal Try Out';

	$urlget = '#';
	$urlpost = '#';
	$urlput = '#';
	$urldel = '#';

	$fcontent = 'rr xy zz';

	if (count($arr_urinya) > 0) {
		$filenya =  preg_replace('/\s+/', '-', @implode("-", $arr_urinya));
		// echo $filenya;
		// $filenya = str_replace("tryout-", "", $filenya); /* BUAT DI LOCALHOST */
		// $filenya = str_replace("me-tryout-", "me-tryout/", $filenya); /* BUAT DI LOCALHOST */
		if ($arr_urinya[2] != '') {
			$title = ucwords($arr_urinya[2]) . ' Edunovasi - Try Out Online Gratis Lengap Terbaik';
			$description = ucwords($arr_urinya[2]) . ' Edunovasi untuk Latihan soal Try Out lengkap dengan pembahasan.';
			$author = 'Try Out Edunovasi';
			$keyword = ucwords($arr_urinya[2]) . ', Try Out, Try Out, Try Out Online, Try Out Terbaik, Try Out Gratis, Soal Try Out';
			$news_keywords = ucwords($arr_urinya[2]) . ', Try Out, Try Out, Try Out Online, Try Out Terbaik, Try Out Gratis, Soal Try Out';
		}

		if (file_exists('pages/' . $filenya . '.php')) {

			if (isset($datax['inc']) && $datax['inc'] == "0") {
				require_once('pages/' . $filenya . '.php');
			} else if (isset($arr_urinya[2]) && ($arr_urinya[2] == 'login' || $arr_urinya[2] == 'register' || $arr_urinya[2] == 'forgot')) {
				require_once('comp/header.php');
				require_once('comp/navigation.php');
				require_once('pages/' . $filenya . '.php');
				echo "</div></body>";
				exit;
			} else if (isset($arr_urinya[2]) && ($arr_urinya[2] == 'dashboard')) {
				require_once('comp/header.php');
				// require_once('comp/navigation.php');
				require_once('pages/' . $filenya . '.php');
				exit;
			} else {
				if ($arr_urinya[2] == 'latihan') {

					$title = "Kumpulan Soal Try Out UTBK - Ribuan Soal Saintek dan Soshum " . date("Y");
					$description = "Persiapkan diri dengan latihan ribuan soal UTBK Saintek, Soshum lengkap beserta TPS dan TKA yang dibuat sesuai dengan soal UTBK terkini";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, UTBK, Edunovasi, Latihan Soal, persiapan ujian";
					$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, Latihan Soal, persiapan ujian";
				}

				if ($arr_urinya[2] == 'webinar') {

					$title = "Daftar Webinar - Edunovasi";
					$description = "Ikutilah webinar gratis dengan pembicara terbaik dan ahli dalam bidangnya, tema webinar juga menarik dan sudah pasti akan menambah ilmu pengetahuan kalian.";
					$author = 'Webinar Edunovasi';
					$keyword = "Webinar, webinar gratis, zoom webinar";
					$news_keywords = "Webinar, webinar gratis, zoom webinar";
				}

				require_once('comp/header.php');
				require_once('comp/navigation.php');
				require_once('pages/' . $filenya . '.php');
				require_once('comp/footer.php');
				exit;
			}
		} else {
			// eduprint($arr_urinya);
			// if (isset($arr_urinya[2]) && isset($arr_urinya[3])) {
			if (isset($arr_urinya[2]) && isset($arr_urinya[3]) && isset($arr_urinya[4])) {
				$path_1_2 = $arr_urinya[2] . '-' . $arr_urinya[3];

				// METASEO dan CURL 

				$title = ucwords($arr_urinya[2]) . ' Tryout Edunovasi - ' . ucwords($arr_urinya[3]);
				$description = ucwords($arr_urinya[2]) . ' Tryout Online Edunovasi halaman ' . ucwords($arr_urinya[3]);
				$author = 'Try Out Edunovasi';
				$keyword = ucwords($arr_urinya[2]) . ', Try Out, ' . ucwords($arr_urinya[3]);
				$news_keywords = ucwords($arr_urinya[2]) . ', Try Out, ' . ucwords($arr_urinya[3]);

				if ($arr_urinya[2] == 'event' && $arr_urinya[3] == 'detail') {

					$url = $base_api . 'detail/' . $arr_urinya[4];
					$getcurl_eventd = getcurl($url);
					if (!$getcurl_eventd) {
						header('Location: ' . $inc_, true, 301);
						exit;
					} else {
						$dataeventd = $getcurl_eventd;
					}
					// eduprint($dataeventd);


					if ($sesi['email'] == 'daniyal.hafidz@gmail.com') {
					}
					// eduprint($dataeventd);
					if (isset($dataeventd['kedinasan']) && ($dataeventd['kedinasan'] != '0')) {
						header('Location: ' . $inc_, true, 301);
						exit;
					}


					$listmateri = array();
					foreach ($dataeventd["data"] as $key => $val) {
						$listmateri[$val['jenis_label']][] = $val;
					}

					$title = "Soal UTBK " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " - Pembahasan Lengkap " . date("Y");
					$description = "Soal UTBK " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " lengkap dengan pembahasan yang mudah dipahami, soal dibuat oleh tim ahli dan menyesuaikan dengan soal UTBK terkini";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
					$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
				}


				if ($arr_urinya[2] == 'sekolah' && $arr_urinya[3] == 'detail') {

					$id_sekolah = base64_encode($sesi['id_sekolah']);
					$email = base64_encode($sesi['email']);


					$url = $base_api_sekolah . 'detail/' . $arr_urinya[4] . "/" . $id_sekolah . "/" . $email;
					$getcurl_eventd = getcurl($url);
					if (!$getcurl_eventd) {
						header('Location: ' . $inc_, true, 301);
						exit;
					} else {
						$dataeventd = $getcurl_eventd;
					}


					if ($sesi['email'] == 'daniyal.hafidz@gmail.com') {
						// eduprint($dataeventd);
					}
					// eduprint($dataeventd);
					if (isset($dataeventd['kedinasan']) && ($dataeventd['kedinasan'] != '3')) {
						header('Location: ' . $inc_, true, 301);
						exit;
					}


					$listmateri = array();
					foreach ($dataeventd["data"] as $key => $val) {
						$listmateri[$val['jenis_label']][] = $val;
					}

					$title = "Soal Sekolah UTBK " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " - Pembahasan Lengkap " . date("Y");
					$description = "Soal Sekolah UTBK " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " lengkap dengan pembahasan yang mudah dipahami, soal dibuat oleh tim ahli dan menyesuaikan dengan soal UTBK terkini";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
					$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
				}

				if ($arr_urinya[2] == 'skd' && $arr_urinya[3] == 'detail') {

					$url = $base_api_dinas . 'detail/' . $arr_urinya[4];
					$getcurl_eventd = getcurl($url);
					if (!$getcurl_eventd) {
						header('Location: ' . $inc_, true, 301);
						exit;
					} else {
						$dataeventd = $getcurl_eventd;
					}
					if ($sesi['email'] == 'daniyal.hafidz@gmail.com') {
					}

					// eduprint($dataeventd);
					if (isset($dataeventd['kedinasan']) && $dataeventd['kedinasan'] != '1') {
						header('Location: ' . $inc_, true, 301);
						exit;
					}

					$listmateri = array();
					foreach ($dataeventd["data"] as $key => $val) {
						$listmateri[$val['jenis_label']][] = $val;
					}

					$title = "Try Out SKD Gratis - " . $dataeventd['judul'] . " Soal TO SKD Kedinasan Terbaru " . date("Y");
					$description = $dataeventd['judul'] . " SKD Kedinasan Gratis Edunovasi hadir sebagai #temanbelajar dalam meraih impianmu menjadi bagian dari IPDN, STAN, CPNS, dan berbagai kedinasan lainnya";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, SKD, IPDN, STAN, CPNS, UTBK, Edunovasi";
					$news_keywords = "Try Out, Soal Try out, SKD, IPDN, STAN, CPNS, UTBK, Edunovasi";
				}

				if ($arr_urinya[2] == 'mandiri' && $arr_urinya[3] == 'detail') {

					$url = $base_api . 'detail/' . $arr_urinya[4];
					$getcurl_eventd = getcurl($url);
					if (!$getcurl_eventd) {
						header('Location: ' . $inc_, true, 301);
						exit;
					} else {
						$dataeventd = $getcurl_eventd;
					}
					// eduprint($dataeventd);


					if ($sesi['email'] == 'daniyal.hafidz@gmail.com') {
					}
					// eduprint($dataeventd);
					if (isset($dataeventd['kedinasan']) && $dataeventd['kedinasan'] != '2') {
						header('Location: ' . $inc_, true, 301);
						exit;
					}


					$listmateri = array();
					foreach ($dataeventd["data"] as $key => $val) {
						$listmateri[$val['jenis_label']][] = $val;
					}

					$title = "Try Out " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " - Ujian Mandiri " . date("Y");
					$description = "Try Out Mandiri " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " lengkap dengan kisi-kisi soal dan pembahasan dari para ahli untuk mewujdkan impian kalian berkuliah di universitas negeri.";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, Mandiri, Edunovasi, " . $dataeventd['kategori'];
					$news_keywords = "Try Out, Soal Try out, Mandiri, Edunovasi, " . $dataeventd['kategori'];
				}

				if ($arr_urinya[2] == 'event' && $arr_urinya[3] == 'pendaftaran' || $arr_urinya[3] == 'materi') {

					$intro = "Pendaftaran";
					if ($arr_urinya[3] == 'materi') {
						$intro = "Daftar Materi";
					}

					if ($arr_urinya[4] == 'nasional') {

						$path_1_2 = $arr_urinya[2] . '-' . $arr_urinya[3] . '-' . $arr_urinya[4];

						$title = $intro . " Ujian Try Out Nasional Saintek dan Soshum " . (date("Y") + 1) . " Tes Skolastik";
						$description = $intro . " Ujian Try Out Nasional Saintek dan Soshum, ayo ikuti dan asah kemampuan kamu dalam Ujian Nasional " . (date("Y") + 1) . "  Tes Skolastik";
						$author = 'Try Out Edunovasi';
						$keyword = "Try Out, Soal Try out, UTBK, Try Out Nasional, Edunovasi, Saintek dan Soshum, Tes Skolastik";
						$news_keywords = "Try Out, Soal Try out, UTBK, Try Out Nasional, Edunovasi, Saintek dan Soshum, Tes Skolastik";
					} else {
						$path_1_2 = $arr_urinya[2] . '-pendaftaran';

						$url = $base_api . 'detail/' . $arr_urinya[4];
						$getcurl_eventd = getcurl($url);
						if (!$getcurl_eventd) {
							header('Location: ' . $inc_, true, 301);
							exit;
						} else {
							$dataeventd = $getcurl_eventd;
						}
						// eduprint($dataeventd);

						$listmateri = array();
						foreach ($dataeventd["data"] as $key => $val) {
							$listmateri[$val['jenis_label']][] = $val;
						}

						$title = $intro . " Ujian " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . " " . date("Y");
						$description = $intro . " Ujian " . $dataeventd['judul'] . " " . $dataeventd['kategori'] . ", ayo ikuti dan asah kemampuan kamu dalam menghadapi Ujian sebenarnya";
						$author = 'Try Out Edunovasi';
						$keyword = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
						$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, " . $dataeventd['kategori'];
					}
				}

				if ($arr_urinya[2] == 'latihan' && $arr_urinya[3] == 'detail') {

					$url = $base_api . 'detail_latihan/' . $arr_urinya[4];
					$getcurl_latihand = getcurl($url);
					if ($getcurl_latihand['status'] == '200') {
						$datalatihand = $getcurl_latihand['datanya'];
					} else {
						header('Location: ' . $inc_, true, 301);
						exit;
					}

					$title = $getcurl_latihand['event'] . " Saintek dan Soshum - Try Out UTBK " . date("Y");
					$description = "Uji kemampuanmu menghadapi UTBK dengan mengerjakan " . $getcurl_latihand['event'] . " saintek dan soshum, dilengkapi dengan waktu agar terbiasa saat UTBK";
					$author = 'Try Out Edunovasi';
					$keyword = "Try Out, Soal Try out, UTBK, Edunovasi, Latihan Soal, persiapan ujian";
					$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, Latihan Soal, persiapan ujian";
				}

				if ($arr_urinya[2] == 'webinar' && $arr_urinya[3] == 'detail') {

					$url = $base_api . 'webinar_detail/' . $arr_urinya[4];
					$getcurl_webinard = getcurl($url);
					if ($getcurl_webinard['status'] == '200') {
						$datawebinard = $getcurl_webinard['data'];
					} else {
						header('Location: ' . $inc_, true, 301);
						exit;
					}

					$title = "Daftar Webinar " . $datawebinard['topik'];
					$description = "Webinar gratis oleh " . $datawebinard['pembicara'] . " " . $datawebinard['jabatan_pembicara'] . " dengan topik " . $datawebinard['topik'];
					$author = 'Try Out Webinar Edunovasi';
					$keyword = "Try Out, Wbinar, Soal Try out, UTBK, Edunovasi, Latihan Soal, " . $datawebinard['pembicara'] . " " . $datawebinard['jabatan_pembicara'];
					$news_keywords = "Try Out, Soal Try out, UTBK, Edunovasi, Latihan Soal, " . $datawebinard['pembicara'] . " " . $datawebinard['jabatan_pembicara'];
				}
				// METASEO dan CURL

				if ($arr_urinya[2] == 'dashboard') {

					if ($sesi['email'] == '') {
						header('Location: ' . $inc_ . '/login', true, 301);
						exit;
					}

					$path_1_2 = $arr_urinya[2] . '-' . $arr_urinya[3] . '-' . $arr_urinya[4];

					$title = ucwords($arr_urinya[2]) . ' Edunovasi - Lihat ' . ucwords($arr_urinya[3]) . ' ' . ucwords($arr_urinya[4]);
					$description = ucwords($arr_urinya[2]) . ' Edunovasi untuk melihat hasil ' . ucwords($arr_urinya[3]) . ' ' . ucwords($arr_urinya[4]);
					$author = 'Try Out Edunovasi';
					$keyword = ucwords($arr_urinya[2]) . ', Try Out ' . ucwords($arr_urinya[3]) . ' ' . ucwords($arr_urinya[4]);
					$news_keywords = ucwords($arr_urinya[2]) . ', Try Out ' . ucwords($arr_urinya[3]) . ' ' . ucwords($arr_urinya[4]);
				}

				if (file_exists('pages/' . $path_1_2 . '.php')) {
					if (isset($datax['inc']) && $datax['inc'] == "0") {
						require_once('pages/' . $path_1_2 . '.php');
					} else if ($arr_urinya[2] == 'dashboard') {
						require_once('comp/header.php');
						require_once('comp/dashboard-navbar.php');
						require_once('pages/' . $path_1_2 . '.php');
						require_once('comp/dashboard-footer.php');
						exit;
					} else if ($arr_urinya[2] == 'print' && ($arr_urinya[3] == 'latihan_mobile' || $arr_urinya[3] == 'event_mobile' || $arr_urinya[3] == 'event_mobileskd')) {
						// echo "apeng jelek";
						// exit; 
						require_once('pages/' . $path_1_2 . '.php');
						exit;
					} else if ($arr_urinya[3] == 'ujian' || $arr_urinya[3] == 'ujiantest' || $arr_urinya[3] == 'soal' || $arr_urinya[2] == 'print') {
						require_once('comp/header.php');
						require_once('pages/' . $path_1_2 . '.php');
						exit;
					} else {
						require_once('comp/header.php');
						require_once('comp/navigation.php');
						require_once('pages/' . $path_1_2 . '.php');
						require_once('comp/footer.php');
						exit;
					}
				}
			}
			echo "<script>window.location.href='https://edunovasi.com'</script>";
			exit;
			// require_once('pages/404.php');
		}
	} else {

		$title = 'Try Out Online Terbaik - Berisi Ribuan Soal Try Out';
		$author = 'Try Out';
		$keyword = 'Try Out, event, cari event, Latihan online';
		$description = 'Latihan soal Try Out lengkap dengan pembahasan yang mudah dipahami, metode paling efektif untuk meningkatkan kemampuan siswa dalam menghadapi ujian.';
		$news_keywords = 'Try Out, Tryo Out, Try Out Online, Try Out Terbaik, Try Out Gratis, Soal Try Out';

		require_once('comp/header.php');
		require_once('comp/navigation.php');
		require_once('pages/tryout.php');
		require_once('comp/footer.php');
		exit;
	}
}


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


// untuk merubah tag lebih kecil dan besar jadi fontawesome antisipasi error di pilihan
function ubahtag($str)
{
	$str = str_replace("<", "<i class='fas fa-chevron-left mx-2'></i>", $str);
	$str = str_replace(">", "<i class='fas fa-chevron-right mx-2'></i>", $str);
	return $str;
}


// untuk merubah tag lebih kecil dan besar jadi kode html, terutama untuk pdf, gunakan sblm ubahkotak
function ubahkecilgede($str)
{
	$str = str_replace("<br>", "ngenter", $str);
	$str = str_replace("<", "&lt;", $str);
	$str = str_replace(">", "&gt;", $str);
	$str = str_replace("ngenter", "<br>", $str);
	return $str;
}


// untuk merubah tag kotak cutom jadi tag html, gunakan setelah ubahkecilgede
function ubahkotak($str)
{

	$str = str_replace("[b]", "<b>", $str);
	$str = str_replace("[/b]", "</b>", $str);
	$str = str_replace("[i]", "<i>", $str);
	$str = str_replace("[/i]", "</i>", $str);
	$str = str_replace("[u]", "<u>", $str);
	$str = str_replace("[/u]", "</u>", $str);
	$str = str_replace("[sup]", "<sup>", $str);
	$str = str_replace("[/sup]", "</sup>", $str);
	$str = str_replace("[sub]", "<sub>", $str);
	$str = str_replace("[/sub]", "</sub>", $str);

	return $str;
}
// echo "<pre>". print_r($uri, 1) ."</pre>";
// exit;
exit;
