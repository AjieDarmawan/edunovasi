<?php
if (isset($_POST['btn_pendaftar'])) {
	unset($_POST['btn_pendaftar']);

	$postcurl_peserta = postcurl($base_api . 'pendaftar', $_POST);
	// eduprint($postcurl_peserta, 1);
	if ($postcurl_peserta['status'] == '200') {
		echo '<script>
        swal.fire({ 
            icon:"success",
            title:"Pendaftaran Berhasil",
            text:"Kamu sudah terdaftar sebagai calon peserta Ujian"
        })
        </script>';
	} else if ($postcurl_peserta['status'] == '203') {
		echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Kamu sudah pernah mendaftar pada event ini"
        })</script>';
	} else {
		echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Terjadi kesalahan, cek koneksi dalam keadaan stabil dan isian form sudah sesuai"
        })</script>';
	}
}

$data = array();
$data['id_event'] = $arr_urinya[4];
if ($arr_urinya[4] == "NDg=") {
	$data['id_event'] = "OTk4";
}
if ($arr_urinya[4] == "NDk=") {
	$data['id_event'] = "OTk5";
}
$data['email'] = $sesi['email'];

$getcurl_pendaftar = postcurl($base_api . 'get_pendaftar', $data);
if (!$getcurl_pendaftar) {
	header('Location: ' . $inc_, true, 301);
	exit;
} else {
	$datapendaftar = $getcurl_pendaftar;
}
eduprint($datapendaftar);

$tglevent = date('Ymd', strtotime($datahasil['tgl_selesai']));
$tglsekarang = date('Ymd');

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

						<?php
						if ($arr_urinya['3'] == 'pendaftaran') {
							echo "Form Pendaftaran Peserta Ujian Try Out";
						} else {
							echo "Daftar Materi dan Durasi Ujian Try Out";
						}
						?>
					</div>
					<div class="card-body card-border pt-4">
						<div class="row g-3">
							<div class="col-md-7 ms-md-3 fw-bold fs-5">
								<?php echo $dataeventd['judul'] . "<br>" . $dataeventd['kategori'] ?>
							</div>
							<div class="col-md-4 my-auto small">
								<div class="row">
									<div class="col-md-12 text-start my-3">
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
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="row g-3">

									<?php if ($arr_urinya['3'] == 'materi') { ?>
										<div class="col-md-12">
											<div class="row g-3">
												<div class="col-md-12">
													<div class="card h-100">
														<div class="card-header fw-bold bg-white py-3">
															<div class="row">
																<div class="col-6 text-start">Daftar Materi</div>
																<div class="col-3 text-center">Durasi</div>
																<div class="col-3 text-center">Jumlah Soal</div>
															</div>
														</div>
														<div class="card-body p-0 px-2 card-border">
															<?php
															foreach ($listmateri as $key => $val) {
															?>
																<div class="row mb-3 g-3">
																	<div class="col-md-12 fw-bold bg-secondary p-2 px-3"><?php echo $key ?></div>
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
																				<div class="col-6 text-start my-auto">
																					<?php echo $v['materi_nama'] ?>
																				</div>
																				<div class="col-3 text-center my-auto">
																					<?php echo $v['waktu'] ?> menit
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
												<div class="col-md-6 mx-auto mt-4 text-center">
													<a href="<?php echo $inc_ ?>/event/pendaftaran/<?php echo $arr_urinya[4] ?>" class="btn btn-sm btn-primary w-100 p-2">Form Pendaftaran</a>
												</div>
											</div>
										</div>
									<?php } ?>

									<?php if ($arr_urinya['3'] == 'pendaftaran') { ?>
										<div class="col-md-12">
											<div class="card h-100">
												<div class="card-header fw-bold text-center bg-white py-3">
													Verifikasi data diri peserta
												</div>
												<div class="card-body card-border">

													<form id="form-peserta" class="row g-4" method="POST">
														<div class="col-md-6">
															<label for="email" class="form-label">Email</label>
															<input type="email" class="form-control" id="email" name="email" value="<?php echo $sesi['email'] ?>" required>
														</div>
														<div class="col-md-6">
															<label for="nama" class="form-label">Nama</label>
															<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $sesi['nama'] ?>" required>
														</div>
														<div class="col-md-6">
															<label for="wilayah" class="form-label">Wilayah</label>
															<select id="wilayah" name="wilayah" class="form-select" required>
																<option selected>Pilih Wilayah</option>
															</select>
														</div>
														<div class="col-md-6">
															<label for="nowa" class="form-label">No Whatsapp</label>
															<input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="" value="<?php echo $sesi['no_wa'] ?>" required>
														</div>
														<div class="col-6">
															<label for="kampus" class="form-label">Kampus <br class="d-block d-md-none">impian</label>
															<input type="text" class="form-control" id="kampus_impian" name="kampus_impian" placeholder="" required>
														</div>
														<div class="col-6">
															<label for="kampus_favorit" class="form-label">Kampus Favorit</label>
															<select id="kampus_favorit" name="kampus_favorit" class="form-select" required>
																<option selected>Pilih Kampus Favorit</option>
															</select>
														</div>
														<div class="col-6">
															<label for="jurusan" class="form-label">Jurusan yang diinginkan</label>
															<input type="text" class="form-control" id="jurusan_diinginkan" name="jurusan_diinginkan" placeholder="" required>
														</div>
														<div class="col-12">
															<label for="sekolah" class="form-label">Asal Sekolah</label>
															<input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="" required>
														</div>
														<div class="col-md-8">
															Untuk melihat daftar materi ujian beserta durasi pengerjaan bisa kamu cek <a href="<?php echo $inc_ ?>/event/materi/<?php echo $arr_urinya[4] ?>" class="w-100 p-2 text-primary fw-bold">Di Sini</a>
														</div>
														<div class="col-md-4 mx-auto mt-4 text-center">
															<input type="hidden" name="id_event" value="<?php echo $arr_urinya[4]; ?>">
															<button type="submit" name="btn_pendaftar" id="btn_pendaftar" class="btn btn-sm btn-primary w-100 p-2">Daftar Sekarang</button>
														</div>
													</form>

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
	function gotologin() {
		sessionStorage.setItem("tryout_goto", "/event/detail/<?php echo $arr_urinya[4] ?>");
		window.location.href = "<?php echo $inc_ ?>/login";
	}

	getwilayah();
	tampilkampus();

	function getwilayah(key, origin) {
		id = "wilayah";
		var jsonfilter = JSON.stringify({
			format: "json",
			formdata_listmod: "Kabupaten-Kota",
			formdata_origin: "pt",
			formdata_type: "1",
			setdata_mod: "list-wilayah",
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