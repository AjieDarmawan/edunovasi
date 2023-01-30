<?php
if (isset($_POST['btn_peserta'])) {
	unset($_POST['btn_peserta']);

	$postcurl_peserta = postcurl($base_api_dinas . 'datadiri', $_POST);
	if ($postcurl_peserta['status'] != '200') {
		echo '<script>alert("' . $postcurl_peserta['message'] . '")</script>';
	} else {
		$_SESSION['userdata']['id_peserta'] = $postcurl_peserta['id_peserta'];
		echo "<script>window.location.href='" . $inc_ . "/skd/ujian/" . $arr_urinya[4] . "'</script>";
	}
}


$data['id_event'] = $arr_urinya[4];
if ($arr_urinya[4] == "NDg=") {
	$data['id_event'] = "OTk4";
}
if ($arr_urinya[4] == "NDk=") {
	$data['id_event'] = "OTk5";
}
$data['email'] = $sesi['email'];

$bypasspendaftar = 1;
$datapendaftar = array();
$getcurl_pendaftar = postcurl($base_api . 'get_pendaftar', $data);
if ($getcurl_pendaftar['status'] == '200') {
	$datapendaftar = $getcurl_pendaftar['datanya'];
	$bypasspendaftar = 1;
}

$url = $base_api_master . 'kampus_impian_kedinasan';
$getcurl_kampus = getcurl($url);
if (!$getcurl_kampus) {
	header('Location: ' . $inc_, true, 301);
	exit;
} else {
	$datakampus = $getcurl_kampus;
}
// eduprint($dataeventd);

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

	#detail-event .card {
		border-radius: 8px;
	}

	#detail-event .card-header {
		background: #FCBF49 0% 0% no-repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border: 1px solid #003049;
		border-radius: 8px 8px 0px 0px;
		color: #003049;
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

<section id="detail-event" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header title text-center">
						<?php echo $dataeventd['judul'] . " " . $dataeventd['kategori'] ?>
					</div>
					<div class="card-body card-border">
						<div class="row g-3">
							<div class="col-md-7 ms-md-3">
								<div class="fw-bold">
									Arahan dan Petunjuk Pengerjaan :
								</div>
								<div class="small">
									<ul class="ps-3">
										<li>Berdoa sebelum mengerjakan Try Out</li>
										<li>Mengerjakan soal latihan dan Try Out dengan jujur</li>
										<li>Memastikan akses internet stabil dan daya baterai cukup</li>
										<li>Memastikan durasi waktu pengerjaan masing - masing materi</li>
										<li>Jika durasi waktu telah habis, secara otomatis akan berpindah ke materi soal selanjutnya</li>
										<li>Teliti dalam menjawab pertanyaan</li>
									</ul>
								</div>
							</div>
							<div class="col-md-4 my-auto small">
								<div class="row">
									<div class="col-md-12 text-start mb-4">
										<div class="d-grid justify-content-start">
											<div class="me-2">
												<img class="img-fluid mb-1 me-2" src="<?php echo $inc_ ?>/assets/ic/timer_biru.svg">Total Durasi : <b><?php echo $dataeventd['jumlah_waktu'] ?> menit</b>
											</div>
											<div class="me-2">
												<img class="img-fluid mb-1 me-2" src="<?php echo $inc_ ?>/assets/ic/task_biru.svg">Total Soal : <b><?php echo $dataeventd['jumlah_soal'] ?></b>
											</div>
											<div class="me-2">
												<img class="img-fluid mb-1 me-2" src="<?php echo $inc_ ?>/assets/ic/date_biru.svg">Periode : <b><?php echo $dataeventd['tgl_mulai'] . " - " . $dataeventd['tgl_selesai'] ?></b>
											</div>
											<!-- <div class="me-2">
												<img class="img-fluid mb-1 me-2" src="<?php echo $inc_ ?>/assets/ic/task_biru.svg">Pendaftaran : <b>Tutup</b>
											</div> -->
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="row g-3">
									<div class="col-md-6">
										<div class="row g-3 sticky-top" style="top:65px">
											<div class="col-md-12">
												<div class="card h-100">
													<div class="card-header fw-bold bg-white py-3">
														<div class="row">
															<div class="col-9 text-start">Daftar Materi</div>
															<div class="col-3 text-center">Jumlah Soal</div>
														</div>
													</div>
													<div class="card-body p-0 px-2 card-border pt-3">
														<?php
														foreach ($listmateri as $key => $val) {
														?>
															<div class="row mb-3 g-3">
																<!-- <div class="col-md-12 fw-bold bg-secondary p-2 px-3"><?php echo $key ?></div> -->
																<div class="col-md-12 px-3" id="tps">
																	<?php
																	$no = 0;
																	foreach ($val as $k => $v) {
																		$light = "bg-light";
																		if ($no % 2 == 0) {
																			$light = "";
																		} else {
																			$light = "bg-light";
																		}
																	?>
																		<div class="row border-bottom py-1 <?php echo $light ?>">
																			<div class="col-9 text-start my-auto">
																				<?php echo $v['materi_nama'] ?>
																			</div>
																			<div class="col-3 text-center my-auto">
																				<?php echo $v['jumlah_soal'] ?> soal
																			</div>
																		</div>
																	<?php
																		$no++;
																	}
																	?>

																</div>
															</div>
														<?php
														}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php if ($sesi['email'] != '' && $bypasspendaftar == 1 && $dataeventd['data_lewat'] == 'buka') { ?>
										<div class="col-md-6">
											<div class="card h-100">
												<div class="card-header fw-bold text-center bg-white py-3">
													Verifikasi data diri peserta
												</div>
												<div class="card-body card-border">

													<form id="form-peserta" class="row g-4" method="POST">
														<div class="col-md-6">
															<label for="email" class="form-label">Email</label>
															<input type="email" class="form-control" id="email" name="email" value="<?php echo $sesi['email'] ?>" readonly required>
														</div>
														<div class="col-md-6">
															<label for="nama" class="form-label">Nama</label>
															<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $sesi['nama'] ?>" readonly required>
														</div>
														<div class="col-md-6">
															<label for="provinsi" class="form-label">Asal Provinsi</label>
															<select id="provinsi" name="provinsi" class="form-select" required>
																<option selected value="">Pilih Provinsi</option>
															</select>
														</div>
														<div class="col-md-6">
															<label for="wilayah" class="form-label">Asal Wilayah</label>
															<select id="wilayah" name="wilayah" class="form-select" required>
																<option selected>Pilih Wilayah</option>
															</select>
														</div>
														<div class="col-md-6">
															<label for="nowa" class="form-label">No Whatsapp</label>
															<input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="" value="<?php echo $sesi['no_wa'] ?>" required>
														</div>
														<div class="col-md-6">
															<label for="sekolah" class="form-label">Asal Sekolah</label>
															<input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="" value="<?php echo $datapendaftar['asal_sekolah'] ?>" required>
														</div>
														<div class="col-md-6">
															<label for="kampus" class="form-label">Kampus <br class="d-block d-md-none">impian</label>
															<select id="kampus_impian" name="kampus_impian" class="form-select" required>
																<option selected>Pilih Kampus Impian</option>
																<?php
																foreach ($datakampus as $key => $val) {
																?>
																	<option value="<?php echo $val['name'] ?>"><?php echo $val['label'] ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-6">
															<label for="kampus_favorit" class="form-label">Kampus Favorit di Edunitas</label>
															<select id="kampus_favorit" name="kampus_favorit" class="form-select" required>
																<option selected>Pilih Kampus Favorit</option>
															</select>
														</div>
														<div class="col-md-6 d-none">
															<label for="jurusan" class="form-label">Jurusan yang diinginkan</label>
															<input type="hidden" class="form-control" id="jurusan_diinginkan" name="jurusan_diinginkan" placeholder="" value="<?php echo $datapendaftar['jurusan_diinginkan'] ?>">
														</div>
														<div class="col-md-12 mt-4 text-center">
															<input type="hidden" name="id_event" value="<?php echo $arr_urinya[4]; ?>">
															<button onclick="mulaiujian()" type="button" class="btn btn-sm btn-primary w-100 p-2">Mulai Ujian</button>
															<button type="submit" name="btn_peserta" id="btn_peserta" class="d-none"></button>
														</div>
													</form>

												</div>
											</div>
										</div>
									<?php } else if ($dataeventd['data_lewat'] == 'buka') { ?>

										<div class="col-md-6">
											<div class="card h-100">
												<div class="card-body card-border-empty py-5">

													<div class="row g-3">
														<div class="col-md-12 text-center">
															<img src="<?php echo $inc_ ?>/assets/img/tryout-login.png">
														</div>
														<div class="col-md-12 mb-3 text-center">
															Silakan Registrasi atau Login untuk mengikuti ujian
														</div>
														<div class="col-md-6">
															<a href="<?php echo $inc_ ?>/register" class="btn btn-sm btn-primary w-100 p-2">Registrasi</a>
														</div>
														<div class="col-md-6">
															<a href="javascript:void(0)" onclick="gotologin()" class="btn btn-sm btn-outline-primary text-primary w-100 p-2">Login</a>
														</div>
													</div>

												</div>
											</div>
										</div>

									<?php } else { ?>

										<div class="col-md-6">
											<div class="card h-100">
												<div class="card-body card-border-empty py-5">

													<div class="row g-3">
														<div class="col-md-12 text-center">
															<img src="<?php echo $inc_ ?>/assets/img/empty-state.png">
														</div>
														<div class="col-md-12 mb-3 text-center fw-bold fs-5">
															<?php
															if (($dataeventd['data_lewat'] == 'belum')) {
																echo "Event Belum Dibuka";
															} else if (($dataeventd['data_lewat'] == 'lewat')) {
																echo "Event Sudah Berakhir";
															}
															?>
														</div>
													</div>

												</div>
											</div>
										</div>

									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	getprovinsi();
	tampilkampus();


	$("#provinsi").change(function() {
		getwilayah();
	})

	function mulaiujian() {
		Swal.fire({
			title: 'Apakah kamu sudah siap ?',
			width: 600,
			html: "Try Out ini akan berlangsung selama <b><?php echo $dataeventd['jumlah_waktu'] ?> Menit</b>.<br>Pastikan kamu sudah membaca arahan dan petunjuk pengerjaan, manfaatkan waktu semaksimal mungkin.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Mulai',
			cancelButtonText: 'Belum',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				// console.log("klik");
				$("#btn_peserta").click();
			}
		})
	}

	function gotologin() {
		sessionStorage.setItem("tryout_goto", "/skd/detail/<?php echo $arr_urinya[4] ?>");
		window.location.href = "<?php echo $inc_ ?>/login";
	}


	// function getwilayah(key, origin) {
	// 	id = "wilayah";
	// 	var jsonfilter = JSON.stringify({
	// 		format: "json",
	// 		formdata_listmod: "Kabupaten-Kota",
	// 		formdata_origin: "pt",
	// 		formdata_replace: "0",
	// 		formdata_type: "1",
	// 		setdata_mod: "list-wilayah",
	// 		formdata_groupjkt: 1
	// 	});

	// 	$.ajax({
	// 		url: 'https://api.edunitas.com/mod/edun-load-g',
	// 		type: 'POST',
	// 		crossDomain: true,
	// 		data: jsonfilter,
	// 		contentType: 'application/json',
	// 		dataType: 'json',
	// 		success: function(res) {
	// 			if (res.response == 'OK') {

	// 				$('#' + id).empty();
	// 				var objHtml = '<option value="" readonly>Pilih Wilayah</option>';
	// 				$('#' + id).append(objHtml);

	// 				var keterangan = '';
	// 				var label = '';
	// 				$.each(res.data, function(i, item) {
	// 					var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '">' + item.nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
	// 					$('#' + id).append(objHtml);
	// 				});

	// 				let wilayah = "<?php echo $datapendaftar['wilayah'] ?>";
	// 				$('#wilayah').val(wilayah);

	// 				if (key) {
	// 					$('#' + origin).val(key.replace(/ /g, '-'));
	// 				}
	// 				$('#' + id).select2({
	// 					theme: 'bootstrap-5'
	// 				});
	// 			} else {
	// 				console.log("Wilayah :", res.message);
	// 			}
	// 		}
	// 	});

	// }

	function getprovinsi(key, origin) {
		let id = "provinsi";
		var jsonfilter = JSON.stringify({
			format: "json",
			formdata_listmod: "Provinsi",
			formdata_origin: "pt",
			formdata_type: "1",
			setdata_mod: "list-wilayah",
			// formdata_groupjkt: 1
		});

		$.ajax({
			url: 'https://api.edunitas.com/mod/edun-load-g',
			type: 'POST',
			crossDomain: true,
			data: jsonfilter,
			contentType: 'application/json',
			dataType: 'json',
			success: function(res) {

				if (res.response == 'OK') {

					$('#' + id).empty();
					var objHtml = '<option value="" readonly>Pilih Provinsi</option>';
					$('#' + id).append(objHtml);

					var keterangan = '';
					var label = '';
					$.each(res.data, function(i, item) {
						if (item.nama != '' && item.nama != 'Luar Negeri') {
							var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '" kode="' + item.kode + '">' + item.nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
							$('#' + id).append(objHtml);
						}
					});
					if (key) {
						$('#' + origin).val(key.replace(/ /g, '-'));
					}
					$('#' + id).select2({
						theme: 'bootstrap-5'
					});
				} else {
					console.log("Wilayah :", res.message);
				}
			}
		});

	}

	function getwilayah(key, origin) {
		let id = "wilayah";
		var jsonfilter = JSON.stringify({
			format: "json",
			formdata_origin: "pt",
			formdata_type: "1",
			setdata_mod: "list-wilayah",
			formdata_kode: $("#provinsi option:selected").attr('kode') ? $("#provinsi option:selected").attr('kode') : '',
			formdata_groupjkt: 1
		});

		$.ajax({
			url: 'https://api.edunitas.com/mod/edun-load-g',
			type: 'POST',
			crossDomain: true,
			data: jsonfilter,
			contentType: 'application/json',
			dataType: 'json',
			success: function(res) {
				if (res.response == 'OK') {

					$('#' + id).empty();
					var objHtml = '<option value="" readonly>Pilih Wilayah</option>';
					$('#' + id).append(objHtml);

					var keterangan = '';
					var label = '';
					$.each(res.data, function(i, item) {
						var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '">' + item.nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
						$('#' + id).append(objHtml);
					});
					if (key) {
						$('#' + origin).val(key.replace(/ /g, '-'));
					}
					$('#' + id).select2({
						theme: 'bootstrap-5'
					});
				} else {
					console.log("Wilayah :", res.message);
				}
			}
		});

	}

	function tampilkampus() {

		var jsondata = JSON.stringify({
			format: "json",
			setdata_mod: "get-data",
			formdata_getlist: "listcampus",
			formdata_origin: "list",
			formdata_filterwilayah: 'semua-wilayah',
			formdata_filterkelas: 'Program-Perkuliahan-Reguler',
			formdata_filterprodi: 'semua-prodi',
			formdata_page: "1",
			formdata_length: "300"
		});

		$.ajax({
			url: 'https://api.edunitas.com/mod/edun-kampus-g',
			type: 'POST',
			crossDomain: true,
			data: jsondata,
			contentType: 'application/json',
			dataType: 'json',
			success: function(res) {

				console.log(res);
				if (res.response == 'OK') {

					var listdata = typeof(res.data.listcampus.listdata) == 'undefined' ? '' : res.data.listcampus.listdata;

					if (Object.keys(listdata).length > 0) {

						$('#kampus_favorit').empty();

						var objHtml = "<option value='' selected readonly>Pilih Kampus Favorit</option>";

						$.each(listdata, function(i, item) {

							objHtml += '<option value="' + item.singkatan.replace(/ /g, '-') + '">' + item.singkatan + ' ( ' + item.label_nama + ' ) </option>';
						});
						$('#kampus_favorit').append(objHtml);

						let kampus_terpilih = "<?php echo $datapendaftar['kampus_favorit'] ?>";
						$('#kampus_favorit').val(kampus_terpilih);


						$('#kampus_favorit').select2({
							theme: 'bootstrap-5'
						});

						if ($('#kampus_favorit').val() == null || $('#kampus_favorit').val() == '') {
							$('#kampus_favorit').val('');
						}


					} else {
						var objHtml = '<option value="" selected>Terjadi kesalahan silakan refresh ulang</option>';
						$('#kampus_favorit').html(objHtml);
					}

				}
			}
		});
	}
</script>