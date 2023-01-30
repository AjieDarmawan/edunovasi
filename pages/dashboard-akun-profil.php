<?php
// eduprint($sesi);
if (isset($_POST['btn_profil'])) {
	unset($_POST['btn_profil']);

	$postcurl_info = postcurl($edun_api . 'medata-g', $_POST);
	// eduprint($_FILES, 1);
	if ($postcurl_info['response'] == 'OK') {
		$_SESSION['userdata']['nama'] = $_POST['formdata_infonamalengkap'];
		$_SESSION['userdata']['no_tlp'] = $_POST['formdata_infonotlp'];
		$_SESSION['userdata']['no_wa'] = $_POST['formdata_infonowa'];
		echo '<script>swal.fire("Profil berhasil diupdate")</script>';

		// if ($_FILES["formdata_imguser"]["error"] == 0) {

		// 	$tmpfile = $_FILES['image']['tmp_name'];
		// 	$typefile = $_FILES['image']['tmp_name'];
		// 	$filename = basename($_FILES['image']['name']);

		// 	$filename = basename($_FILES['image']['name']);
		// 	$cfile = new CURLFile(realpath($filename));


		// 	$gambar = array();
		// 	$gambar['formdata_apikey'] = $_POST['formdata_apikey'];
		// 	// $gambar['formdata_imguser'] = curl_file_create($tmpfile, $typefile, $filename);
		// 	$gambar['formdata_imguser'] = $cfile;
		// 	$gambar['setdata_mod'] = 'update-photo';
		// 	// eduprint($_gambar, 1);
		// 	$postcurl_img = postcurl($edun_api . 'medata-g', $gambar, 1);
		// 	if ($postcurl_img['response'] == 'OK') {
		// 		echo '<script>swal.fire("Profil dan Foto berhasil diupdate, silakan logout untuk refresh")</script>';
		// 	} else {
		// 		echo '<script>swal.fire("Foto gagal diupdate")</script>';
		// 	}
		// } else {
		// 	echo '<script>swal.fire("Profil berhasil diupdate")</script>';
		// }
	} else {
		echo '<script>swal.fire("Profil gagal diupdate")</script>';
	}
}

$jsoninfo = array();
$jsoninfo['formdata_apikey'] = $sesi['key'];
$jsoninfo['formdata_cid'] = '';
$jsoninfo['formdata_getlist'] = 'info';
$jsoninfo['formdata_origin'] = 'list';
$jsoninfo['setdata_mod'] = 'get-data';
// $jsoninfo = json_encode($jsoninfo);

$datainfo = array();
$getinfo = postcurl($edun_api . 'medata-g', $jsoninfo);
// eduprint($getinfo, 1);
if ($getinfo['response'] == "OK") {
	$datainfo = $getinfo['data']['info']['detail'];
}
// eduprint($datainfo);

?>
<style>
	.title {
		font: normal normal bold 24px/33px Open Sans;
		letter-spacing: 0px;
		color: #111111;
	}

	.subtitle {
		font: normal normal normal 19px/26px Open Sans;
		letter-spacing: 0px;
		color: #195030;
	}

	#detail-event .btn {
		font: normal normal bold 16px Open Sans;
		letter-spacing: 0px;
		color: #fff;
	}

	.form-label {
		color: #003049;
		font-weight: bold;
		font-size: 14px;
	}
</style>

<div class="row px-2">
	<div class="col-md-12">
		<div class="card h-100 py-5">
			<div class="card-body p-md-4 py-5">

				<div class="row">
					<div class="col-md-3 px-md-4 my-auto">
						<form id="form-image" method="POST" enctype="multipart/form-data">
							<label for="glr_img0">
								<img src="<?php echo $sesi['foto'] ?>" class="rounded-circle img-fluid w-100 img-thumbnail" id="file_img0" onerror="this.onerror=null;this.src='<?php echo $inc_ ?>/assets/img/blank-profile.jpg'" style="cursor:pointer;width:220px; height:220px;">
							</label>
							<input type="hidden" name="formdata_apikey" value="<?php echo $sesi['key'] ?>">
							<input type="hidden" name="setdata_mod" value="update-photo">
							<input type="file" name="formdata_imguser" id="glr_img0" style="display:none;">
						</form>
					</div>
					<div class="col">
						<form id="form-peserta" method="POST" enctype="multipart/form-data">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?php echo $sesi['email'] ?>" disabled required>
								</div>
								<div class="col-md-6">
									<label for="formdata_infonamalengkap" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control" id="formdata_infonamalengkap" name="formdata_infonamalengkap" value="<?php echo $sesi['nama'] ?>" required>
								</div>
								<div class="col-md-3">
									<label for="formdata_infonotlp" class="form-label">No Telpon</label>
									<input type="text" class="form-control" id="formdata_infonotlp" name="formdata_infonotlp" placeholder="" value="<?php echo $sesi['no_tlp'] ?>" required>
								</div>
								<div class="col-md-3">
									<label for="formdata_infonowa" class="form-label">No Whatsapp</label>
									<input type="text" class="form-control" id="formdata_infonowa" name="formdata_infonowa" placeholder="" value="<?php echo $sesi['no_wa'] ?>" required>
								</div>
								<div class="col-md-3">
									<label for="formdata_infotempatlahir" class="form-label">Tempat Lahir</label>
									<input type="text" class="form-control" id="formdata_infotempatlahir" name="formdata_infotempatlahir" placeholder="" value="<?php echo $datainfo['tempatlahir'] ?>" required>
								</div>
								<div class="col-md-3">
									<label for="formdata_infotgllahir" class="form-label">Tgl Lahir</label>
									<input type="date" class="form-control" id="formdata_infotgllahir" name="formdata_infotgllahir" placeholder="" value="<?php echo $datainfo['tgllahir'] ?>" required>
								</div>
								<div class="col-md-6">
									<label for="formdata_infoalamat" class="form-label">Alamat</label>
									<input type="text" class="form-control" id="formdata_infoalamat" name="formdata_infoalamat" value="<?php echo $datainfo['alamat'] ?>" required>
								</div>
								<div class="col-md-6 text-end mt-auto">
									<input type="hidden" name="formdata_apikey" value="<?php echo $sesi['key'] ?>">
									<input type="hidden" name="formdata_postlist" value="info">
									<input type="hidden" name="setdata_mod" value="post-data">
									<button name="btn_profil" type="submit" class="btn btn-sm btn-primary w-100 p-2">Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#file_img0').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#glr_img0").change(function() {
		readURL(this);
		$("#form-image").submit();
	});


	$("#form-image").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: '<?php echo $edun_api ?>medata-g',
			type: 'POST',
			crossDomain: true,
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(res) {

				if (res.response == 'OK') {

					$.ajax({
						type: "POST",
						url: "<?php echo $inc_ ?>/refresh",
						data: {
							pict: res.data.base64,
						}
					})
					// .done(function(msg) {
					// 	window.location.reload(true);
					// });

				} else {
					swal.fire({
						title: "Gagal",
						text: res.message,
					})
				}
				return false;
			}
		});
		return false;
	});
</script>