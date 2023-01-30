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
				<?php echo str_replace("-", " ", $arr_urinya[4]) ?>
			</div>
			<div class="col-md-12">
				<div class="card mb-3">
					<div class="card-header pb-0 bg-white">

						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							<?php
							$no = 0;
							foreach ($datalatihand as $key => $val) {
								$active = '';
								if ($no == 0) {
									$active = 'active';
								}
							?>
								<li class="nav-item" role="presentation">
									<button class="nav-link <?php echo $active ?>" id="pills-<?php echo $key ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $key ?>" type="button" role="tab" aria-controls="pills-<?php echo $key ?>" aria-selected="true"><?php echo $key ?></button>
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
							foreach ($datalatihand as $key => $val) {
								$active = '';
								if ($no == 0) {
									$active = 'show active';
								}
							?>


								<div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $key ?>" role="tabpanel" aria-labelledby="pills-<?php echo $key ?>-tab">

									<div class="row g-3" id="list-latihan">
										<?php
										$no = 0;
										foreach ($datalatihand[$key] as $k => $v) {
										?>

											<div class="col-md-6">
												<div class="card">
													<div class="card-header py-3">
														<div class="row">
															<div class="col-md-12 title"><?php echo $v['materi_nama'] ?></div>
															<div class="col-md-12">
																<div class="d-md-flex justify-content-start small text-secondary">
																	<div class="me-2"><?php echo $v['jenis_label'] ?></div>
																	<div class="me-2"><?php echo $v['jurusan'] ?></div>
																</div>
															</div>
														</div>
													</div>
													<div class="card-body">
														<div class="row">
															<div class="col-md-8 my-md-auto">
																<div class="d-flex justify-content-start">
																	<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/ic/timer_oren.svg"><?php echo $v['waktu'] ?> menit</div>
																	<div class="me-2"><img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/ic/task_oren.svg"><?php echo $v['soal'] ?> soal</div>
																</div>
															</div>
															<div class="col-md-4 small my-md-auto mt-3 text-end">

																<a href="javascript:void(0)" onclick="mulailatihan('<?php echo base64_encode($v['materi_id']) ?>','<?php echo $v['waktu'] ?>')" class="btn btn-sm btn-outline-primary px-3">Mulai Latihan</a>
															</div>
														</div>
													</div>
												</div>
											</div>

										<?php
										}
										?>

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
	function mulailatihan(materi_id, waktu) {
		Swal.fire({
			title: 'Apakah kamu sudah siap ?',
			width: 600,
			html: "Latihan soal ini akan berlangsung selama <b>" + waktu + " Menit</b>.<br>Manfaatkan waktu semaksimal mungkin.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Mulai',
			cancelButtonText: 'Belum',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?php echo $inc_ ?>/latihan/soal/" + materi_id;
			}
		})
	}
</script>