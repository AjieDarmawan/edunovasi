<?php
eduprint('asa');
$getcurl_soal = getcurl('https://backendtryout.edunitas.com/api_mobile/api/soal/' . $ccid);
if (!$getcurl_soal["listdata"]) {
	/* include "app/error/404.php"; */
	/* exit; */
} else {
	$datasoal = $getcurl_soal["listdata"]["datanya"];
}
eduprint($datasoal);

?>

<style>
	.bg-pattern {
		background: url('<?php echo $inc_ ?>assets/images/bg/bgpattern.png');
	}

	.jawaban {
		border-radius: 50px;
		cursor: pointer;
		border: solid 1px #ffce00;
	}

	.jawaban:hover {
		border: solid 1px #437fc7;
		background-color: #437fc7;
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

	.nav-link:active {
		background-color: #437fc7 !important;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 bg-white order-lg-1" id="soalleft" style="display:none">
			<div class="row position-relative">
				<!-- <i onclick="hidemenu('soalleft')" class="fas fa-times position-absolute text-end pe-4 pt-2 edu-pointer"></i> -->
				<div class="col-12 p-3 border shadow" style="height:82vh;overflow-y:hidden">
					<div class="row">
						<div class="col-md-12">
							<div class="card edu-rounded-10 shadow-sm">
								<div class="card-body p-2">
									<div class="row">
										<div class="col-md-12">
											<div class="d-flex bg-white">
												<img class="border rounded-circle" width="50px" height="50px" src="<?php echo $datanya['pict'] ?>" onerror="this.onerror=null;this.src='<?php echo $inc_ ?>assets/images/illust/user-bg.jpg';" data-holder-rendered="true">
												<p class="pb-0 mb-0 small lh-sm h6 ms-3 my-1  fw-bold">
													<strong class="d-block edu-title h7">Mahasiswa</strong>
													<?php echo $datanya['dosen'] ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 mt-2" style="height:43vh;overflow-y:auto">

							<div class="my-2 small">
								<div class="card edu-rounded-10 small pb-0 mb-0 lh-sm my-1">
									<div class="card-body px-1 text-dark fw-bold">
										<ol>
											<li>Soal yang sudah dijawab bisa diubah kembali jika waktu masih tersisa.</li>
											<li>Jangan klik selesai sebelum menyelesaikan seluruh pertanyaan.</li>
											<li>Jika waktu habis atau Anda keluar dari halaman pengerjaan soal online maka jawaban Anda akan langsung disubmit.</li>
											<li>Teliti dalam pertanyaan sebelum menjawab.</li>
											<li>Perhatikan selalu waktu yang tersisa.</li>
										</ol>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-12">
							<div class="countdown py-4 text-center">

								<div class="col-md-12 edu-text-primary">
									Sisa Waktu Anda
								</div>
								<div class="col-md-12">
									<div class="row g-1" id="countdown">
										<div class="col"><span id="countjam">00</span><br><small>JAM</small></div>
										<div class="col-1 my-auto h2">:</div>
										<div class="col"><span id="countmenit">00</span><br><small>menit</small></div>
										<div class="col-1 my-auto h2">:</div>
										<div class="col"><span id="countdetik">00</span><br><small>detik</small></div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 bg-white order-lg-3" id="soalright" style="display:none">
			<div class="row position-relative">
				<div class="col-12 p-4 border shadow" style="height:77vh;margin-bottom:5vh;overflow-y:scroll;">
					<div class="row">
						<div class="col-md-12 h5 fw-bold mb-3 edu-text-primary">
							List Soal
						</div>
						<div class="col-md-12">
							<ul class="nav nav-pills row row-cols-lg-5 text-center" id="pills-tab" role="tablist">
								<?php for ($i = 0; $i < $getcurl_soal["listdata"]["totaldata"]; $i++) {

									$active = '';
									if ($i == 0) {
										$active = 'active';
									}
								?>
									<li class="nav-item col p-1" role="presentation">
										<button class="nav-link bg-light text-center w-100 <?php echo $active ?>" id="pills-<?php echo $i ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $i ?>" type="button" role="tab" aria-controls="pills-<?php echo $i ?>" aria-selected="true"><?php echo ($i + 1) ?></button>
									</li>
								<?php } ?>
							</ul>
						</div>

					</div>
				</div>
				<div class="col-12 border shadow m-0 position-absolute" style="bottom:0">
					<div class="row justify-content-center">
						<div class="col-12 p-2" style="background-color:#E4E4E4">
							<div class="row justify-content-between">
								<div class="col text-end">
									<button onclick="selesai()" class="btn edu-btn-primary btn-sm w-100">Selesai</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col bg-pattern order-lg-2" id="soal">
			<div class="row position-relative">
				<div class="col-12 p-4 border" style="height:82vh;overflow-y:scroll;">
					<div class="tab-content" id="pills-tabContent" style="display:none">

						<?php
						$arrsoal = array();
						$arrsoal['materi_id'] = $ccid;
						foreach ($datasoal as $k => $v) {

							$arrsoal["ans_" . $v['no']] = array("soal" => $v['no'], "jawaban" => "");

							$active = '';
							if ($k == 0) {
								$active = 'show active';
							}
						?>
							<div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $k ?>" role="tabpanel" aria-labelledby="pills-<?php echo $k ?>-tab">

								<div class="row g-2 mb-2">
									<div class="col-md-6 h5 fw-bold  edu-text-primary">
										Soal No <?php echo $v['no'] ?> / <?php echo $getcurl_soal["listdata"]["totaldata"] ?>
									</div>
									<div class="col-md-6 text-right">
										<div class="row">
											<div class="col text-end">
												<?php if ($v['no'] > 1) { ?>
													<button id="btnprev" class="btn edu-btn-primary btn-sm" onclick="$('#pills-<?php echo ($v['no'] - 2) ?>-tab').click()"><i class="fas fa-arrow-left me-1"></i></button>
												<?php } ?>
												<?php if ($v['no'] < $getcurl_soal["listdata"]["totaldata"]) { ?>
													<button id="btnnext" class="btn edu-btn-primary btn-sm" onclick="$('#pills-<?php echo ($v['no']) ?>-tab').click()"><i class="fas fa-arrow-right ms-1"></i></button>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="col-md-12 mb-2">
										<div class="card edu-rounded-10 shadow-sm">
											<div class="card-body">
												<?php echo $v['pertanyaan'] ?>
											</div>
										</div>
									</div>

									<?php
									foreach ($v['pilihan'] as $kp => $vp) {
										$abcd = '';
										if ($kp == '0') {
											$abcd = 'a';
										} else if ($kp == '1') {
											$abcd = 'b';
										} else if ($kp == '2') {
											$abcd = 'c';
										} else if ($kp == '3') {
											$abcd = 'd';
										} else if ($kp == '4') {
											$abcd = 'e';
										}
										// eduprint($v);
									?>
										<div class="col-12 mb-2">
											<div class="row g-3">
												<div class="col-1 text-center">
													<div class="card jawaban <?php echo 'ans_' . $v['no'] ?>" style="width:35px; height:35px" id="<?php echo 'ans_' . $v['no'] . '_' . $vp['code'] ?>" onclick="jawabsoal('<?php echo 'ans_' . $v['no'] ?>','<?php echo $vp['code'] ?>',<?php echo $k ?>)">
														<div class="card-body p-1">
															<?php echo $abcd ?>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="card">
														<div class="card-body p-2">
															<?php echo $vp['name'] ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>

						<?php }
						$jsonsoal = json_encode($arrsoal);
						?>
					</div>

				</div>
				<!-- <div class="col-12 border shadow m-0 position-absolute" style="bottom:0">
					<div class="row justify-content-center">
						<div class="col-12 p-2" style="background-color:#E4E4E4">
							<div class="row justify-content-between">
								<div class="col text-start">
									<button class="btn edu-btn-primary btn-sm"><i class="fas fa-arrow-left me-1"></i> Sebelumnya</button>
								</div>
								<div class="col text-center">
									<button class="btn edu-btn-primary btn-sm">Skip</button>
								</div>
								<div class="col text-end">
									<button class="btn edu-btn-primary btn-sm">Selanjutnya <i class="fas fa-arrow-right ms-1"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>

	</div>
</div>


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
						<a href="<?php echo $inc_ ?>me-perkuliahan/detail-kelas?ccid=<?php echo $ccid ?>" class="btn edu-btn-primary">Tutup</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_mulai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_mulai_label" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header edu-text-primary d-block text-center">
				<h3 class="modal-title mx-auto fw-bold" id="modal_selesai_label">SOAL ONLINE</h3>
				<h6 class="modal-title text-secondary mx-auto">Uji kemampuan Anda, kerjakan dengan teliti dan jujur !</h6>
			</div>
			<div class="modal-body text-center">

				<div class="row">
					<div class="col-md-12 fw-bold mb-2">
					</div>
					<div class="col-md-12 p-2">
						<div class="row">
							<div class="col">
								<small class="border border-warning px-2 py-1 edu-rounded-10 text-secondary" id="syarat-soal">Jumlah Soal : 15</small>
							</div>
							<div class="col">
								<small class="border border-warning px-2 py-1 edu-rounded-10 text-secondary" id="syarat-tanggal">Tanggal Ujian : 12 Des 2021</small>
							</div>
							<div class="col">
								<small class="border border-warning px-2 py-1 edu-rounded-10 text-secondary" id="syarat waktu-tanggal">Waktu Ujian : 20 Menit</small>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<hr>
					</div>
					<div class="col-md-12 fw-bold text-start mb-2">
						Berikut adalah beberapa ketentuan yang harus Anda ketahui :
					</div>
					<div class="col-md-12 text-start">
						<ol>
							<li>Soal yang sudah dijawab bisa diubah kembali jika waktu masih tersisa.</li>
							<li>Jangan klik selesai sebelum menyelesaikan seluruh pertanyaan.</li>
							<li>Jika waktu habis atau Anda keluar dari halaman pengerjaan soal online maka jawaban Anda akan langsung disubmit.</li>
							<li>Teliti dalam pertanyaan sebelum menjawab.</li>
							<li>Perhatikan selalu waktu yang tersisa.</li>
						</ol>
					</div>
					<div class="col-md-12 d-grid gap-2 px-4 pt-4">
						<button onclick="mulai();" class="btn edu-btn-primary">Mulai</button>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


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

	$(document).ready(function() {

		$("#modal_mulai").modal("show");

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

	function jawabsoal(kodesoal, jawaban, kodebtn) {
		$('.' + kodesoal).removeClass('bg-primary text-white');
		$('#' + kodesoal + "_" + jawaban).addClass('bg-primary text-white');

		if (jsonsoal[kodesoal].jawaban == '') {
			$('#pills-' + kodebtn + "-tab").addClass('bg-secondary text-white');
		}
		jsonsoal[kodesoal].jawaban = jawaban;
	}


	function selesai() {

		clearTimeout(itungjalan);
		let jsondata = JSON.stringify(jsonsoal);
		console.log(jsondata);

		$.ajax({
			url: 'https://backendtryout.edunitas.com/api_mobile/api/jawaban',
			type: 'POST',
			crossDomain: true,
			data: jsondata,
			contentType: 'application/json',
			dataType: 'json',
			success: function(res) {
				if (res.kode == '001') {
					$("#jawaban-tanggal").html(res.listdata.tanggalakses);
					$("#jawaban-benar").html(res.listdata.jbenar);
					$("#jawaban-salah").html(res.listdata.jsalah);
					$("#jawaban-terlewat").html(res.listdata.jnoans);
					$("#jawaban-nilai").html(res.listdata.nilai);
					$("#jawaban-durasi").html(res.listdata.durasiakses);
					$("#modal_selesai").modal("show");
				}
			}
		});

	}
</script>