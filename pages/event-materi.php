<?php

$ccid = "OA==";

$tgl_mulai = date("Y-m-d h:i:s");
$event_id = base64_decode($ccid);

$getcurl_event = getcurl($base_api . 'detail/' . $ccid);
if (!$getcurl_event) {
	header('Location: ' . $inc_, true, 301);
	exit;
} else {
	$dataevent = $getcurl_event;
}

$getcurl_soal = getcurl($base_api . 'soal_event/' . $ccid);
if (!$getcurl_soal["listdata"]) {
	header('Location: ' . $inc_, true, 301);
	exit;
} else {
	$datasoal = $getcurl_soal["listdata"]["datanya"];
}
// eduprint($datasoal);

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

	#detail .card {
		background: #FFFFFF 0% 0% no-repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border-radius: 8px;
	}

	#detail .card-header {
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
	}

	.jawaban {
		border-radius: 50px;
		cursor: pointer;
		border: solid 1px #ffce00;
		font-size: 16px;
	}

	.jawaban:hover {
		border: solid 1px #195030;
		background-color: #195030;
		color: #fff;
	}


	.countdown {
		text-transform: uppercase;
		font-weight: bold;
	}

	.countdown span {
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
		font-size: 2rem;
	}

	.countdown small {
		text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
		font-size: 12px;
	}

	.daftarsoal .nav-link {
		display: block;
		padding: .5rem 1rem;
		color: #111111;
		text-decoration: none;
		transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
		background: #FFFFFF 0% 0% no-repeat padding-box;
		border: 1px solid #707070;
		border-radius: 24px;
	}

	.daftarsoal .nav-pills .nav-link.active,
	.daftarsoal .nav-pills .show>.nav-link {
		color: #fff;
		background-color: #195030 !important;
	}

	.daftarsoal .nav-link:active {
		background-color: #195030 !important;
	}


	.cardsoal {
		border: 1px solid #707070;
		border-radius: 8px;
		font: normal normal normal 16px Open Sans;
		letter-spacing: 0px;
		color: #111111;
	}

	.soalke_label {
		font: normal normal normal 20px Open Sans;
		letter-spacing: 0px;
		color: #111111;
	}

	.soalke {
		font: normal normal bold 20px Open Sans;
		letter-spacing: 0px;
		color: #195030;
	}

	.daftarsoal {
		background: #EEEEEE 0% 0% no-repeat padding-box;
		border: 1px solid #707070;
		border-radius: 8px;
	}

	.btnnext {
		background: #195030 0% 0% no-repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border-radius: 24px;
		color: white;
	}

	.btnnext:hover {
		background: #084020 0% 0% no-repeat padding-box;
		color: white;
	}

	.btnprev {
		background: #195030 0% 0% no-repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border-radius: 24px;
		color: white;
	}

	.btnprev:hover {
		background: #084020 0% 0% no-repeat padding-box;
		color: white;
	}
</style>
<section id="detail" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-8 my-auto">
				<div class="col-md-12 text-start title mb-2">
					Aji Darmaji
				</div>
				<div class="col-md-12 mb-2 subtitle">
					Ujian Tertulis Berbasis Komputer UTBK 2022
				</div>
				<div class="col-md-12 text-start">
					<div class="d-flex justify-content-start">
						<div class="me-2">Tanggal : 03 Maret 2022</div>
						<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/img/timer_black_24dp.svg">Total Durasi : 30 menit</div>
						<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/img/task_black_24dp.svg">Jumlah Soal : 50 soal</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 my-auto">
				<div class="countdown text-center fw-bold">
					<div class="col-md-12 edu-text-primary">
						Sisa Waktu Kamu
					</div>
					<div class="col-md-12">
						<div class="row g-1 text-danger" id="countdown">
							<div class="col"><span id="countjam">0</span><br><small>JAM</small></div>
							<div class="col-1 my-auto h2">:</div>
							<div class="col"><span id="countmenit">0</span><br><small>menit</small></div>
							<div class="col-1 my-auto h2">:</div>
							<div class="col"><span id="countdetik">39</span><br><small>detik</small></div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12 my-4">
				<div class="card mb-3">
					<div class="card-header py-2 bg-primary">
						<div class="row">
							<div class="col-md-12">
								Silakan pilih materi yang akan dikerjakan dan perhatikan selalu waktu yang tersisa.
							</div>
						</div>
					</div>
					<div class="card-body">

						<div class="row g-3" id="list-latihan">
							<?php
							foreach ($dataevent['data'] as $key => $val) {
								$mid = base64_decode($val['materi_id']);
							?>

								<div class="col-md-6">
									<div class="card">
										<div class="card-header py-3">
											<div class="row">
												<div class="row">
													<div class="col-md-8 fs-5 fw-bold"><?php echo $val['materi_nama'] ?></div>
													<div class="col-md-2 fs-4 fw-bold text-center">
														<?php echo $val['waktu'] ?>
													</div>
													<div class="col-md-2 fs-4 fw-bold text-center">
														<?php echo $val['jumlah_soal'] ?>
													</div>
												</div>
												<div class="row small text-secondary">
													<div class="col-md-8 d-flex">
														<div class="me-2"><?php echo $val['jurusan'] ?></div>
														<div class="me-2"><?php echo $val['jenis'] ?></div>
													</div>
													<div class="col-md-2 text-center">Menit</div>
													<div class="col-md-2 text-center">Soal</div>
												</div>
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-8 my-auto">
													<div class="progress">
														<div id="progress-<?php echo $mid ?>" class="progress-bar progress-bar bg-primary text-dark" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="<?php echo $val['jumlah_soal'] ?>">0/<?php echo $val['jumlah_soal'] ?></div>
													</div>
												</div>
												<div class="col-md-4 small my-auto text-center">
													<a href="javascript:void(0)" onclick="showmateri('<?php echo base64_decode($val['materi_id']) ?>')" class="btnkerjakan">Kerjakan Soal</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="col-md-6 d-none">
								<div class="card">
									<div class="card-header py-3">
										<div class="row">
											<div class="col-md-12">
												<div class="d-flex justify-content-start title">
													<div class="me-2">Contoh lain</div>
													<div class="me-2">Jrs</div>
													<div class="me-2">Nama materi</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="progress mt-2">
													<div id="progress-<?php echo $val['materi_id'] ?>" class="progress-bar progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="">0/8</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row small">
											<div class="col-md-8 my-auto">
												<div class="d-flex justify-content-start">
													<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/img/timer_black_24dp.svg">20 menit</div>
													<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/img/task_black_24dp.svg">20 soal</div>
												</div>
											</div>
											<div class="col-md-4 my-auto text-end">
												<a href="javascript:void(0)" onclick="showmateri('contoh')" class="btnbelum">Kerjakan Soal</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
			<div class="col-md-6 mx-auto">
				<div class="row">
					<div class="col-md-6">
						<button type="button" onclick="selesai()" class="btn btn-lg btn-sm btn-success w-100 btnbelum">Selesai</button>
					</div>
					<div class="col-md-6">
						<button type="button" onclick="window.location.href = 'ranking'" class="btn btn-lg btn-sm btn-warning w-100 btnselesai" disabled>Lihat Hasil</button>
					</div>
					<!-- <div class="col-md-4">
						<button type="button" onclick="window.location.href = ''" class="btn btn-lg btn-sm btn-danger w-100 btnselesai" disabled>Ulangi</button>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="modal_selesai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_selesai_label" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header edu-text-primary">
				<h3 class="modal-title mx-auto fw-bold" id="modal_selesai_label">HASIL</h3>
			</div>
			<div class="modal-body text-center">

				<div class="row">
					<div class="col-md-12 fw-bold">
						Berikut adalah hasil ujian anda
					</div>
					<div class="col-md-12 p-2">
						<small class="border border-warning px-2 py-1 edu-rounded-10 text-secondary" id="jawaban-tanggal">Tanggal 0000-00-00 00:00:00</small>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12 px-5">
						<div class="row">
							<div class="col-6 text-start">Benar :</div>
							<div class="col-6 mb-2"><span class="text-success fw-bold h5" id="jawaban-benar">0</span></div>
							<div class="col-6 text-start">Salah :</div>
							<div class="col-6 mb-2"><span class="text-danger fw-bold h5" id="jawaban-salah">0</span></div>
							<div class="col-6 text-start">Tidak Terjawab :</div>
							<div class="col-6 mb-2"><span class="text-warning fw-bold h5" id="jawaban-terlewat">0</span></div>
							<div class="col-6 text-start">Durasi :</div>
							<div class="col-6 small mb-2"><span class="text-secondary" id="jawaban-durasi">0</span></div>
							<div class="col-12">
								<hr>
							</div>
							<div class="col-6 text-start my-auto">Nilai :</div>
							<div class="col-6"><span class="edu-text-primary fw-bold h1" id="jawaban-nilai">0</span></div>
						</div>
					</div>
					<div class="col-md-12 d-grid gap-2 px-4 pt-4">
						<a href="ranking" class="btn edu-btn-primary">Lihat Ranking</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
$jsonsoal = array();
foreach ($datasoal as $key => $val) {
	$mid = base64_decode($val['materi_id']);
?>
	<div class="modal fade" id="modal-<?php echo $mid ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title fw-bold"><?php echo $val['materi_nama'] ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4 bg-white order-md-2" id="soalright">
								<div class="row position-relative">
									<div class="col-12 p-4 daftarsoal" style="height:65vh;overflow-y:scroll;">
										<div class="row">
											<div class="col-md-12 h5 fw-bold mb-3 edu-text-primary">
												Daftar Soal
											</div>
											<div class="col-md-12">
												<ul class="nav nav-pills row row-cols-lg-5 text-center" id="pills-tab" role="tablist">
													<?php for ($i = 0; $i < $val["totaldata"]; $i++) {

														$active = '';
														if ($i == 0) {
															$active = 'active';
														}
													?>
														<li class="nav-item col p-1" role="presentation">
															<button class="nav-link text-center w-100 <?php echo $active ?>" id="pills-<?php echo $i . $mid ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $i . $mid ?>" type="button" role="tab" aria-controls="pills-<?php echo $i . $mid ?>" aria-selected="true"><?php echo ($i + 1) ?></button>
														</li>
													<?php } ?>
												</ul>
											</div>

										</div>
									</div>
									<div class="col-md-12 mt-3">
										<button type="button" class="btn btn-sm btn-success w-100" data-bs-dismiss="modal">Pilih Materi Lain</button>
									</div>
								</div>
							</div>
							<div class="col order-lg-1" id="soal">
								<div class="row position-relative">
									<div class="col-12">
										<div class="tab-content" id="pills-tabContent">

											<?php
											$arrsoal = array();
											$arrsoal['materi_id'] = $val['materi_id'];
											foreach ($datasoal[$key]['datanya'] as $k => $v) {

												$arrsoal["ans_" . $v['no']] = array("soal" => $v['no'], "jawaban" => "");

												$active = '';
												if ($k == 0) {
													$active = 'show active';
												}
											?>
												<div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $k . $mid ?>" role="tabpanel" aria-labelledby="pills-<?php echo $k . $mid ?>-tab">

													<div class="card" style="height:65vh;overflow-y:scroll;">
														<div class="card-body">
															<div class="row g-2 mb-2">
																<div class="col-md-12 mb-3">
																	<?php echo $v['pertanyaan'] ?>
																</div>

																<?php
																foreach ($v['pilihan'] as $kp => $vp) {
																	$abcd = '';
																	if ($kp == '0') {
																		$abcd = 'A';
																	} else if ($kp == '1') {
																		$abcd = 'B';
																	} else if ($kp == '2') {
																		$abcd = 'C';
																	} else if ($kp == '3') {
																		$abcd = 'D';
																	} else if ($kp == '4') {
																		$abcd = 'E';
																	}
																	// eduprint($v);
																?>
																	<div class="col-12 mt-4">
																		<div class="row g-2">
																			<div class="col-1 my-auto text-center">
																				<div class="card jawaban <?php echo 'ans_' . $v['no'] . '_' . $mid ?>" style="width:35px; height:35px" id="<?php echo 'ans_' . $v['no'] . '_' . $vp['code'] . '_' . $mid ?>" onclick="jawabsoal('<?php echo 'ans_' . $v['no'] ?>','<?php echo $vp['code'] ?>','<?php echo $k ?>','<?php echo $mid ?>')">
																					<div class="card-body p-1">
																						<?php echo $abcd ?>
																					</div>
																				</div>
																			</div>
																			<div class="col my-auto">
																				<?php echo $vp['name'] ?>
																			</div>
																		</div>
																	</div>

																<?php } ?>
															</div>
														</div>
													</div>
													<div class="row mt-3">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-6">
																	<span class="soalke_label">Soal Ke :</span> <span class="soalke"><?php echo $k + 1 ?> / <?php echo  $val["totaldata"] ?></span>
																</div>
																<div class="col-md-6 text-right">
																	<div class="row">
																		<div class="col text-end">
																			<?php if (($k + 1) > 1) { ?>
																				<button class="btn edu-btn-primary btn-sm btnprev" onclick="$('#pills-<?php echo ($k - 1) . $mid ?>-tab').click()"><i class="fas fa-arrow-left me-1"></i></button>
																			<?php } ?>
																			<?php if (($k + 1) < $val["totaldata"]) { ?>
																				<button class="btn edu-btn-primary btn-sm btnnext" onclick="$('#pills-<?php echo ($k + 1) . $mid ?>-tab').click()"><i class="fas fa-arrow-right ms-1"></i></button>
																			<?php } ?>
																		</div>
																	</div>
																</div>

															</div>
														</div>
													</div>
												</div>
											<?php
											}
											$jsonsoal["datanya"]["mat_" . $mid] = $arrsoal;
											?>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php
}
$jsonsoal["event"] = $event_id;
$jsonsoal = json_encode($jsonsoal);
?>

<script>
	function showmateri(kodenya) {
		$("#modal-" + kodenya).modal('show');
	}
</script>


<script>
	function hidemenu(menu) {
		$("#" + menu).toggleClass("d-none").toggleClass("d-md-block").toggleClass("d-block").toggleClass("d-md-none");
		$("#mini" + menu).toggleClass("d-block").toggleClass("d-md-none").toggleClass("d-none").toggleClass("d-md-block");
		$("#soal").show();
	}

	function showmenu(menu) {
		$("#" + menu).toggleClass("d-block").toggleClass("d-md-none").toggleClass("d-none").toggleClass("d-md-block");
		$("#mini" + menu).toggleClass("d-none").toggleClass("d-md-block").toggleClass("d-block").toggleClass("d-md-none");
		$("#soal").hide();

	}
</script>



<!-- BUAT NODE -->

<script>
	var is_mulai = 0;
	var detik = 0;
	var menit = 1;
	var jam = 0;
	var itungjalan;

	var jsonsoal = '<?php echo $jsonsoal; ?>';
	jsonsoal = JSON.parse(jsonsoal);
	console.log(jsonsoal);

	$(document).ready(function() {

		$("#modal_mulai").modal("show");

		mulai();
		/**
		 * Membuat function hitung() sebagai Penghitungan Waktu
		 */
		/** Menjalankan Function Hitung Waktu Mundur */
	});

	function mulai() {

		if (is_mulai == 0) {
			is_mulai = 1;
			hitung();
		}
		$("#modal_mulai").modal("hide");
		$("#soalleft").fadeIn();
		$("#soalright").fadeIn();
		$("#pills-tabContent").fadeIn();
	}

	function hitung() {
		/** setTimout(hitung, 1000) digunakan untuk 
		 * mengulang atau merefresh halaman selama 1000 (1 detik) 
		 */
		itungjalan = setTimeout(hitung, 1000);

		/** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
		if (menit < 10 && jam == 0) {
			$('#countdown').addClass("text-danger");
		};

		/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
		$('#countjam').html(jam);
		$('#countmenit').html(menit);
		$('#countdetik').html(detik);


		/** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
		detik--;

		/** Jika var detik < 0
		 * var detik akan dikembalikan ke 59
		 * Menit akan Berkurang 1
		 */
		if (detik < 0) {
			detik = 59;
			menit--;

			/** Jika menit < 0
			 * Maka menit akan dikembali ke 59
			 * Jam akan Berkurang 1
			 */
			if (menit < 0) {
				menit = 59;
				jam--;

				/** Jika var jam < 0
				 * clearInterval() Memberhentikan Interval dan submit secara otomatis
				 */
				if (jam < 0) {
					selesai();
				}
			}
		}
	}

	function jawabsoal(kodesoal, jawaban, kodebtn, materi) {
		// $('#modal-' + materi + ' > .' + kodesoal).removeClass('bg-primary text-white');
		// $('#modal-' + materi + ' > #' + kodesoal + "_" + jawaban).addClass('bg-primary text-white');
		$('.' + kodesoal + "_" + materi).removeClass('bg-primary text-white');
		$('#' + kodesoal + "_" + jawaban + "_" + materi).addClass('bg-primary text-white');

		if (jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban == '') {
			$('#pills-' + kodebtn + materi + "-tab").addClass('bg-warning text-white');

			let progress = parseInt($('#progress-' + materi).attr("aria-valuenow"));
			let progressmax = parseInt($('#progress-' + materi).attr("aria-valuemax"));
			let progressnew = progress + 1;
			let progresspersen = (progressnew / progressmax) * 100;
			$('#progress-' + materi).attr("aria-valuenow", progressnew);
			$('#progress-' + materi).html(progressnew + "/" + progressmax);
			$('#progress-' + materi).attr("style", "width:" + progresspersen + "%");
		}
		jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban = jawaban;
	}

	function selesai() {

		clearTimeout(itungjalan);
		let jsondata = JSON.stringify(jsonsoal);
		console.log(jsondata);

		$.ajax({
			url: 'https://backendtryout.edunitas.com/api_mobile/api/jawaban_event',
			type: 'POST',
			crossDomain: true,
			data: {
				"res": jsondata,
				"email": "daniyal.hafidz@gmail.com",
				"tgl_mulai": "<?php echo $tgl_mulai ?>"
			},
			dataType: 'json',
			success: function(res) {
				$(".btnbelum").attr("disabled", true);
				$(".btnselesai").attr("disabled", false);
				$(".btnkerjakan").attr("style", "opacity:0.2");
				$(".btnkerjakan").attr("onclick", "");
				// if (res.kode == '001') {
				// $("#jawaban-tanggal").html(res.listdata.tanggalakses);
				// $("#jawaban-benar").html(res.listdata.jbenar);
				// $("#jawaban-salah").html(res.listdata.jsalah);
				// $("#jawaban-terlewat").html(res.listdata.jnoans);
				// $("#jawaban-nilai").html(res.listdata.nilai);
				// $("#jawaban-durasi").html(res.listdata.durasiakses);
				// $("#modal_selesai").modal("show");
				// }
			}
		});

	}
</script>