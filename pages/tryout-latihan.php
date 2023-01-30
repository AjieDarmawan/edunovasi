<?php
$datalatihan = '';
$getcurl_latihan = getcurl($base_api . 'latihan_get_all');
if (!$getcurl_latihan) {
} else {
	$datalatihan = $getcurl_latihan;
}
// eduprint($datalatihan);
// exit;

?>
<style>
	#detail .nav-pills .nav-link.active,
	#detail .nav-pills .show>.nav-link {
		background-color: #fff !important;
		border-bottom: 4px solid #195030;
		font: normal normal bold 18px/24px Open Sans !important;
		letter-spacing: 0px;
		color: #0D0D0D !important;
	}

	#detail .nav-link {
		font: normal normal bold 18px/24px Open Sans;
		letter-spacing: 0px;
		color: #1D1D1D;
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
</style>
<section id="detail" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 title fs-4 fw-bold mb-4">
				Latihan Soal
			</div>
			<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header pb-0 bg-white">

						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							<?php
							$no = 0;
							foreach ($datalatihan as $key => $val) {
								$active = '';
								if ($no == 0) {
									$active = 'active';
								}
							?>
								<li class="nav-item" role="presentation">
									<button class="nav-link <?php echo $active ?> text-uppercase" id="pills-<?php echo $key ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $key ?>" type="button" role="tab" aria-controls="pills-<?php echo $key ?>" aria-selected="true"><?php echo str_replace("_"," ",$key); ?></button>
								</li>
							<?php
								$no++;
							}
							?>
						</ul>

					</div>
					<div class="card-body">

						<div class="tab-content" id="pills-tabContent">

							<?php


							$no = 0;
							foreach ($datalatihan as $key => $val) {
								$active = '';
								if ($no == 0) {
									$active = 'show active';
								}
							?>

								<div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $key; ?>" 
									role="tabpanel" aria-labelledby="pills-<?php echo $key; ?>-tab">

									<div class="row g-3" id="list-latihan">
										<?php
										$no = 0;
										foreach ($val as $k => $v) {
										?>
											<div class="col-md-6">
												<div class="card">
													<div class="card-header py-3">
														<div class="row">
															<div class="col-md-12 title fs-5"><?php echo $v['judul'] ?></div>
														</div>
													</div>
													<div class="card-body">
														<div class="row">
															<div class="col-md-8 my-auto small">
																<div class="d-flex justify-content-start text-secondary small">
																	<img class="img-fluid mb-1 me-2" src="assets/ic/date_biru.svg">Periode : <?php echo $v['tgl_mulai'] ?> - <?php echo $v['tgl_selesai'] ?>
																</div>
															</div>
															<div class="col-md-4 small my-auto text-end text-primary"><a href="<?php echo $inc_ ?>/latihan/detail/<?php echo str_replace(" ", "-", $v['judul']) ?>">Lihat Detail</a></div>
														</div>
													</div>
												</div>
											</div>
										<?php
										}
										?>
									</div>


								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="row g-2">
										<div class="col-md-12 mb-4 text-center">
											<img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-state.png">
										</div>
										<div class="col-md-12 text-primary fs-6 text-center">
											<span class="fw-bold fs-5">Tidak ada data ditampilkan</span>
										</div>
									</div>
								</div>


							<?php
								$no++;
							}
							?>
						</div>


					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<script>
	function mulailatihan(materi_id) {
		Swal.fire({
			title: 'Apakah kamu sudah siap ?',
			width: 600,
			html: "Layihan akan dimulai..<br>Pastikan kamu sudah bersiap mengisi latihan<br>manfaatkan waktu semaksimal mungkin",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Mulai Latihan',
			cancelButtonText: 'Kembali',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?php echo $inc_ ?>/latihan/soal/" + materi_id;
			}
		})
	}
</script>