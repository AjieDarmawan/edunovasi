<?php
// echo "oy";

$dataevent = '';
$getcurl_event = getcurl($base_api . 'event');
if (isset($getcurl_event['status']) && $getcurl_event['status'] == '200') {
    $dataevent = $getcurl_event['datanya'];
}

$dataevent_nanti = '';
$getcurl_event_nanti = getcurl($base_api . 'event_akan_datang');
if (
    isset($getcurl_event_nanti['status']) &&
    $getcurl_event_nanti['status'] == '200'
) {
    $dataevent_nanti = $getcurl_event_nanti['datanya'];
}

$datalatihan = '';
$getcurl_latihan = getcurl($base_api . 'latihan');
if (isset($getcurl_latihan['status']) && $getcurl_latihan['status'] == '200') {
    $datalatihan = $getcurl_latihan['datanya'];
}

// eduprint($dataevent, 0);
// eduprint($getcurl_event_nanti, 0);
// eduprint($getcurl_latihan, 0);
?>

<style>
.title {
    font: normal normal normal 18px/24px Open Sans;
    letter-spacing: 0px;
    color: #000000;
    font-weight: bold;
}

.desc {
    font: normal normal normal 16px/21px Open Sans;
    letter-spacing: 0px;
    color: #727272;
}

#header {
    /* background: transparent radial-gradient(closest-side at 74% 46%, #32A05F 0%, #195030 100%) 0% 0% no-repeat; */
    /* background: transparent radial-gradient(closest-side at 74% 46%, #32A05F 0%, #195030 100%) 0% 0% no-repeat; */
    padding-top: 48px;
    background: #f77f00;
    /* background: rgb(247, 127, 0); */
    /* background: radial-gradient(circle, rgba(252, 191, 73, 1) 20%, rgba(247, 127, 0, 1) 75%, rgba(247, 127, 0, 1) 100%); */
}

#header .title {
    font: normal normal bold 32px/43px Open Sans;
    letter-spacing: 0px;
    color: #003049;
    /* text-shadow: 0px 3px 6px #00000029; */
}

#header .subtitle {
    font: normal normal 400 22px Open Sans;
    letter-spacing: 0px;
    color: #003049;
    /* text-shadow: 0px 3px 6px #00000029; */
}

#edunitas {
    background: rgb(247, 127, 0);
    background: radial-gradient(circle, rgba(34, 65, 181, 1) 20%, rgba(34, 65, 181, 1) 75%, rgba(34, 65, 181, 1) 100%);
}

#panduan {
    background: #EAE2B7 0% 0% no-repeat padding-box;
}

#panduan .title {
    font: normal normal bold 24px/33px Open Sans;
    letter-spacing: 0px;
    color: #101010;
}

#panduan .desc {
    font: normal normal normal 24px/33px Open Sans;
    letter-spacing: 0px;
    color: #101010;
}


#iklan {
    background: #EAE2B7 0% 0% no-repeat padding-box;
}

#iklan .title {
    font: normal normal bold 28px Open Sans;
    color: #101010;
}

#iklan .desc {
    font: normal normal normal 18px Open Sans;
    color: #101010;
}

#keunggulan .title,
#testimoni .title,
#event .title {
    font: normal normal bold 28px Open Sans;
    letter-spacing: 0px;
    color: #101010;
}

#keunggulan h5,
#testimoni h5 {
    font: normal normal bold 20px Open Sans;
    letter-spacing: 0px;
    color: #101010;
}

#keunggulan .card-text,
#testimoni .card-text {
    font: normal normal normal 18px/24px Open Sans;
    letter-spacing: 0px;
    color: #131313;
}


#edunitas .desc {
    font: normal normal bold 24px/33px Open Sans;
    letter-spacing: 0px;
    color: #003049;
}

.position-all-center {
    position: absolute !important;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}

.pulse {
    border-radius: 50%;
    animation: pulse-animation 2s infinite;
}

@keyframes pulse-animation {
    0% {
        box-shadow: 0 0 0 0px rgba(204, 7, 13, 1);
    }

    100% {
        box-shadow: 0 0 0 20px rgba(204, 7, 13, 0);
    }
}

#news .title {
    font: normal normal bold 24px/33px Open Sans;
    font-weight: bold;
    color: #111111;
}

#news .btn-outline-primary {
    font: normal normal bold 18px/24px Open Sans;
    color: #0C0C0C;
}

.owl-theme .owl-nav button {
    background: #D4D4D4 none repeat scroll 0 0 !important;
    border-radius: 50% !important;
    box-shadow: 0 2px 16px 0 rgba(0, 0, 0, .2);
    color: #000;
    display: inline-block;
    font-size: 21px;
    height: 40px;
    line-height: 40px;
    margin: 0;
    text-align: center;
    text-transform: uppercase;
    width: 40px;
}

.owl-prev {
    left: 0;
    position: absolute;
    top: 42%;
    transition: all .45s cubic-bezier(.165, .84, .44, 1) 0s;
}

.owl-next {
    right: 0;
    position: absolute;
    top: 42%;
    transition: all .45s cubic-bezier(.165, .84, .44, 1) 0s;
}



.primary-header {
    font-style: normal;
    font-weight: 700;
    font-size: 24px;
    color: #131313;
}

.primary-header-sm {
    font-style: normal;
    font-weight: 700;
    font-size: 28px;
    line-height: 39px;
    color: #131313;
}


.section-banner {
    /* background: #f77f00; */
    padding-top: 40px;
    padding-bottom: 40px;
}

.second-header {
    font-weight: 700;
    font-size: 20px;
    line-height: 29px;
    color: #131313;
    margin-top: 8px;
    margin-bottom: 8px;
}

.third-header {
    font-weight: 700;
    font-size: 18px;
    line-height: 22px;
    color: #131313;
    margin-top: 8px;
}

.third-header .title {
    font-size: 20px !important;
    line-height: 24px !important;
    color: #000 !important;
}

.third-header .subtitle {
    font-weight: 400 !important;
    font-size: 16px !important;
    line-height: 19px !important;
    color: #000 !important;
}


.paragraph {
    font-weight: 400;
    font-size: 18px;
    line-height: 22px;
    color: #131313;
}

.bacground-banner {
    position: relative;
    background: #ffaa51;
    border-radius: 16px;
    height: 385px;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, #ffaa51 0%, rgba(255, 170, 81, 0) 87.88%);
    background-size: cover;
    border-radius: 16px;
}

.padding-card {
    padding: 35px;
}

.second-subheader {
    margin-top: 20px;
    font-weight: 400;
    font-size: 20px;
    line-height: 39px;
    color: #131313;
}

.image-tryout {
    width: 386px;
    height: 386px;
}

.image-cari-kampus {
    width: 615px;
    height: 386px;
}

.image-webinar {
    width: 386px;
    height: 386px;
}

.primary-header-text {
    font-weight: 700;
    font-size: 32px;
    color: #ffffff;
}

.secondary-header {
    margin-top: 10px;
    font-weight: 700;
    font-size: 24px;
    color: #ffffff;
}

.card-section-five {
    padding-left: 35px;
    padding-top: 31px;
    /* padding-bottom: 31px; */
}

.primary-paragraph {
    font-weight: 600;
    font-size: 16px;
    color: #ed7900;
    margin-top: 10px;
    margin-bottom: 10px;
}

.secondary-paragraph {
    font-size: 16px;
    line-height: 19px;
    color: #ffffff;
}

.button-secondary {
    background: #ed7900;
    border-radius: 50px;
    color: #ffff;
    width: 298px;
    margin-top: 20px;
}


@media (max-width: 767.98px) {
    .bacground-banner {
        height: 800px;
    }

    .padding-card-second {
        padding-left: 35px;
        display: flex;
        justify-content: center;
    }

    .padding-mobile {
        padding-left: 35px;
        display: flex;
        justify-content: center;
    }

    .image-tryout {
        width: 300px;
        height: 300px;

    }

    .image-cari-kampus {
        width: 100%;
        height: auto;
    }
}
</style>
<!--
<section id="header" class="position-relative d-none">
	<div class="container pt-4">
		<div class="row g-4">
			<div class="col-md-7 my-md-auto mt-4">
				<div class="row">
					<div class="col-md-12 title mb-4">
						Selamat Datang di Edunovasi
					</div>
					<div class="col-md-12 subtitle">
						Platform edukasi yang menyediakan berbagai soal dan latihan try out secara gratis, praktis dan berkualitas dengan berbagai layanan dan program unggulan yang akan menjadi <b>#TemanBelajar</b> kamu dalam meraih kampus impian
					</div>
				</div>
				<div id="tryout"></div>
			</div>
			<div class="col-md-5 my-md-auto mt-5 text-center">
				<img class="img-fluid" src="assets/img/tryout-si-edun.png">
			</div>
		</div>
	</div>
</section>
-->

<section id="header" class="position-relative">
    <div id="carouselExampleIndicators" class="carousel slide section-banner" data-bs-ride="carousel" style="">
        <div class="container">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>


            </div>
            <div class="carousel-inner" style="border-radius: 16px">
                <div class="carousel-item active bacground-banner">
                    <div class="overlay">
                        <div class="row">
                            <div class="col-md-7 col-12 padding-card">
                                <div class="primary-header">
                                    Try Out Online UTBK 2022 Gratis
                                </div>
                                <div class="second-header">
                                    Terbuka untuk kelas X, XI, XII dan Alumni
                                </div>
                                <div class="paragraph d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Soal Standar UTBK</div>
                                </div>
                                <div class="paragraph d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Penilaian menggunakan IRT</div>
                                </div>
                                <div class="paragraph d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Download soal dan pembahasan</div>
                                </div>
                                <div class="paragraph d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Ranking Nasional</div>
                                </div>
                                <div class="second-header">
                                    Pelaksanaan : 9-10 Mei 2022 | Batas Pendaftaran : 8 Mei 2022
                                </div>
                                <div class="second-header">
                                    Terbatas Hanya untuk 1000 Peserta !
                                </div>
                                <div class="col-md-6 desc mt-4">
                                    <a href="<?php echo $inc; ?>/pendaftaran-tryout-nasional-2022#form-daftar"
                                        class="btn btn-primary w-100">Daftar Sekarang</a>
                                </div>
                            </div>
                            <div class="col-md-5 col-12">
                                <div class="d-md-flex justify-content-end text-center">
                                    <img src="<?php echo $inc_; ?>/assets/img/edunovasi-tryout-nasional.jpg" alt=""
                                        class="img-fluid image-tryout" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item bacground-banner">
                    <div class="row">
                        <div class="col-md-7 padding-card">
                            <div class="primary-header">Selamat Datang di Edunovasi</div>

                            <div class="second-subheader">
                                Platform edukasi yang menyediakan berbagai soal dan latihan
                                try out secara gratis, praktis dan berkualitas dengan berbagai
                                layanan dan program unggulan yang akan menjadi
                                <b>#TemanBelajar</b>
                                kamu dalam meraih impian.
                            </div>
                        </div>
                        <div class="col-md-5 padding-card padding-mobile">
                            <div class="d-flex justify-content-end mt-md-5 mt-1">
                                <img src="assets/img/tryout-si-edun.png" alt="" class="img-fluid image-robot" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item bacground-banner" style="background: #2241b5 !important ;">
                    <div class="row">
                        <div class="col-md-6 padding-card">
                            <div class="secondary-header">Ingin Karir Anda Meningkat ? Ingin Punya Pekerjaan & Gaji
                                Lebih Baik dari Saat ini ? </div>
                            <div class="primary-paragraph">
                                Dapatkan Rekomendasi Kampus (PTS) Terbaik di Seluruh Indonesia
                            </div>
                            <div class="secondary-paragraph d-flex">
                                <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                <div class="ms-2">Kampus Kualitas A-B+</div>
                            </div>

                            <div class="secondary-paragraph d-flex">
                                <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                <div class="ms-2">Biaya Terjangkau & Dapat Diangsur Perbulan</div>
                            </div>

                            <div class="secondary-paragraph d-flex">
                                <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                <div class="ms-2">Waktu Kuliah Fleksibel ( Ada Kelas Online / Kuliah dari Rumah )</div>
                            </div>

                            <div class="secondary-paragraph d-flex">
                                <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                <div class="ms-2">
                                    Tersedia Banyak Pilihan Program Studi/Jurusan Favorit D3, S1, S2
                                </div>
                            </div>

                            <div class="col-md-12 text-center text-md-start">
                                <a href="https://edunitas.com/#lokasikampus" target="_blank"
                                    class="btn button-secondary btn-lg">Klik di Sini</a>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <img src="<?php echo $inc_; ?>/assets/img/edunitas-cari-kampus-banner.png" alt=""
                                    class="img-fluid image-cari-kampus" />
                            </div>
                        </div>
                    </div>
                </div>


                <div class="carousel-item bacground-banner">
                    <div class="overlay">
                        <div class="row">
                            <div class="col-md-7 col-12 padding-card">
                                <div class="primary-header">
                                    Tidak Apa-Apa Terlihat Tidak Pintar
                                </div>
                                <div class="third-header my-4">
                                    <div class="row g-2">
                                        <div class="col-md-12 fw-bold title">Tanggal & Waktu</div>
                                        <div class="col-md-12 subtitle">Sabtu, 23 April 2022 15:30 WIB -17:00 WIB</div>
                                        <div class="col-md-12 my-2"></div>
                                        <div class="col-md-12 fw-bold title">Peserta</div>
                                        <div class="col-md-12 subtitle">Kelas 10, 11, 12 dan Alumni</div>
                                    </div>
                                </div>
                                <div class="second-header">
                                    PESERTA TERBATAS !
                                </div>
                                <div class="col-md-6 desc mt-4">
                                    <a href="<?php echo $inc; ?>/webinar/detail/MTI="
                                        class="btn btn-primary w-100">Pendaftaran Gratis</a>
                                </div>
                            </div>
                            <div class="col-md-5 col-12 text-center padding-card-second">
                                <div class="d-flex justify-content-end">
                                    <img src="<?php echo $inc_; ?>/assets/img/Webinar Edunovasi Zahid Azmi.jpg" alt=""
                                        class="image-webinar" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-item bacground-banner">
                    <div class="overlay">
                        <div class="row">
                            <div class="col-md-7 col-12 padding-card">
                                <div class="primary-header-sm">
                                    Belajar Santuy Dan Anti Blank Saat UTBK
                                </div>
                                <div class="third-header my-4">
                                    <div class="row g-2">
                                        <div class="col-md-12 fw-bold title">Tanggal & Waktu</div>
                                        <div class="col-md-12 subtitle">Selasa, 26 April 2022 15:30 WIB -17:30 WIB</div>
                                        <div class="col-md-12 my-2"></div>
                                        <div class="col-md-12 fw-bold title">Peserta</div>
                                        <div class="col-md-12 subtitle">Kelas 10, 11, 12 dan Alumni</div>
                                    </div>
                                </div>
                                <div class="second-header">
                                    PESERTA TERBATAS !
                                </div>
                                <div class="col-md-6 desc mt-4">
                                    <a href="<?php echo $inc; ?>/webinar/detail/MTE="
                                        class="btn btn-primary w-100">Pendaftaran Gratis</a>
                                </div>
                            </div>
                            <div class="col-md-5 col-12 padding-card-second">
                                <div class="d-md-flex justify-content-end">
                                    <img src="<?php echo $inc_; ?>/assets/img/Webinar Edunovasi Zahwa Islami.jpg" alt=""
                                        class="image-webinar" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-left fs-1 text-dark"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-right fs-1 text-dark"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div id="tryout"></div>
    </div>


    <!-- <div class="container pt-4 px-4 px-md-2">

		<div class="owl-carousel owl-theme owl-header">

			<div class="item">

				<div class="row">
					<div class="col-md-7 my-md-auto mt-4">
						<div class="row">
							<div class="col-md-12 title mb-4">
								Selamat Datang di Edunovasi
							</div>
							<div class="col-md-12 subtitle">
								Platform edukasi yang menyediakan berbagai soal dan latihan try out secara gratis, praktis dan berkualitas dengan berbagai layanan dan program unggulan yang akan menjadi <b>#TemanBelajar</b> kamu dalam meraih kampus impian
							</div>
						</div>
						<div id="tryout"></div>
					</div>
					<div class="col-md-5 my-md-auto mt-5 text-center">
						<img class="img-fluid" src="assets/img/tryout-si-edun.png">
					</div>
				</div>

			</div>
			<div class="item">

				<div class="row">

					<div class="col-md-8 my-auto">
						<div class="row">
							<div class="col-md-12 title mt-md-0 mt-3">
								Try Out Online UTBK 2022 Gratis
							</div>
							<div class="col-md-12 desc fw-bold text-primary fs-5 mb-4">
								Terbuka untuk kelas X, XI, XII dan Alumni
							</div>
							<div class="col-md-6 mt-2">
								Pelaksanaan : <b>9-10 Mei 2022</b><br>
								Batas Pendaftaran : <b>8 Mei 2022</b><br><br>
								<h5 class="fw-bold text-dark">Terbatas untuk 1000 Peserta !</h5>
								Buruan daftar sebelum terlambat
							</div>
							<div class="col-md-6 text-dark d-none d-md-block">
								<ol>
									<li>Soal Standar UTBK</li>
									<li>Penilaian menggunakan IRT</li>
									<li>Download soal dan pembahasan</li>
									<li>Ranking Nasional</li>
								</ol>
							</div>
							<div class="col-md-6 desc mt-4">
								<a href="<?php echo $inc; ?>/pendaftaran-tryout-nasional-2022#form-daftar" class="btn btn-primary w-100">Daftar Sekarang</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 px-4 my-md-auto mt-4 text-center position-relative">
						<img class="img-fluid rounded shadow" src="<?php echo $inc_; ?>/assets/img/edunovasi-tryout-nasional.jpg">
					</div>
				</div>

			</div>

		</div>

	</div> -->

</section>

<?php

// if (isset($_SESSION['userdata'])) {
// 	echo '
	
// 			<li class="nav-item dropdown">
// 				<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
// 					<img src="' . $sesi['foto'] . '" width="25" height="25" class="rounded-circle" onerror="this.onerror=null;this.src=' . $inc_ . '/assets/img/blank-profile.jpg">
// 					' . $sesi['nama'] . '
// 				</a>

// 				<ul clliass="dropdown-menu" aria-labelledby="dropdownMenuLink">
// 					<li><a class="dropdown-item" href="' . $inc_ . '/dashboard/event/history">Dashboard</a></li>
// 					<li><a class="dropdown-item" href="' . $inc_ . '/logout">Logout</a></li>
// 				</ul>
// 			</li>
// 		';
// }

// ?>

<section>
    <h2>test</h2>
</section>


<?php if ($dataevent != '') { ?>

<section id="event" class="my-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-4 text-center ">
                <h5 class="fw-bold title">Ujian Try Out yang Sedang Berlangsung</h5>
            </div>
            <div class="col-md-12 my-2">
                <div class="row g-3" id="list-event">
                    <?php foreach ($dataevent as $key => $val) {
          $id = base64_decode($val['id_event']); ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary py-3">
                                <div class="d-flex justify-content-center text-primary">
                                    <div class="mx-2">
                                        <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"> <b><span
                                                class="d-none d-md-inline-flex">Periode :</span> <?php echo $val[
                'tgl_mulai'
            ]; ?> - <?php echo $val['tgl_selesai']; ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-white">
                                <div class="row">
                                    <div class="col-md-12 title my-auto"><?php echo $val['judul'] .
               ' ' .
               $val['kategori']; ?></div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-start text-primary">
                                            <div class="me-2"><img class="img-fluid mb-1"
                                                    src="assets/ic/timer_biru.svg"><?php echo $val[
                 'waktu'
             ]; ?> menit</div>
                                            <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val[
                 'jumlah_soal'
             ]; ?> soal</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-md-auto mt-3 text-end"><a href="<?php echo $inc_; ?>/event/detail/<?php echo $val[
    'id_event'
]; ?>" class="btn btn-primary px-5">Lihat Detail</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
      } ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php } ?>

<?php if ($datalatihan != '') { ?>
<section id="latihan" class="my-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    <div class="col-6 text-start">
                        <h5 class="fw-bold title">Soal Latihan</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?php echo $inc_; ?>/latihan" class="btn btn-sm btn-outline-primary px-3">Lihat
                            Semua</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row g-3" id="list-latihan">
                    <?php foreach ($datalatihan as $key => $val) { ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-md-12 title fs-5"><?php echo $val['judul']; ?></div>
                                    <div class="col-md-12">
                                        <!-- <div class="d-flex justify-content-start text-secondary">
													<div class="me-2"><?php echo $val['tgl_mulai']; ?></div>
													<div class="me-2">-</div>
													<div class="me-2"><?php echo $val['tgl_selesai']; ?></div>
												</div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 my-auto">

                                        <div class="d-flex justify-content-start text-secondary" style="font-size:14px">
                                            <div class="mx-2">
                                                <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"><b>Periode : <?php echo $val[
                  'tgl_mulai'
              ]; ?> - <?php echo $val['tgl_selesai']; ?></b>
                                            </div>
                                        </div>
                                        <!-- <div class="d-flex justify-content-start text-oren">
													<div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_oren.svg"><?php echo $val[
                 'waktu'
             ]; ?> menit</div>
													<div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_oren.svg"><?php echo $val[
                 'jumlah_soal'
             ]; ?> soal</div>
												</div> -->
                                    </div>
                                    <div class="col-md-4 small my-md-auto mt-3 text-end ">
                                        <a href="<?php echo $inc_; ?>/latihan/detail/<?php echo str_replace(
    ' ',
    '-',
    $val['judul']
); ?>" class="btn btn-sm btn-outline-primary px-3">Lihat Detail</a>
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
</section>
<?php } ?>


<?php if ($dataevent_nanti != '') { ?>
<section id="event" class="my-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12 my-4 text-center ">
                <h5 class="fw-bold title">Ujian Try Out yang Akan Datang</h5>
            </div>
            <div class="col-md-12 my-2">
                <div class="row g-3" id="list-event">
                    <?php foreach ($dataevent_nanti as $key => $val) {
          $id = base64_decode($val['id_event']); ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-light py-3">
                                <div class="d-flex justify-content-center text-primary">
                                    <div class="mx-2">
                                        <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"> <b><span
                                                class="d-none d-md-inline-flex">Periode :</span> <?php echo $val[
                'tgl_mulai'
            ]; ?> - <?php echo $val['tgl_selesai']; ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-white">
                                <div class="row">
                                    <div class="col-md-12 title my-auto"><?php echo $val['judul'] .
               ' ' .
               $val['kategori']; ?></div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-start text-primary">
                                            <div class="me-2"><img class="img-fluid mb-1"
                                                    src="assets/ic/timer_biru.svg"><?php echo $val[
                 'waktu'
             ]; ?> menit</div>
                                            <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val[
                 'jumlah_soal'
             ]; ?> soal</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 my-md-auto mt-3 text-end">
                                        <a href="javascript:void(0)" onclick="direct_latihan()"
                                            class="btn btn-primary px-5">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
      } ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php } ?>


<section id="iklan" class="py-5 my-5">
    <div class="container">
        <div class="row">

            <div class="col-md-5 my-auto text-center position-relative">
                <img class="img-fluid rounded shadow"
                    src="<?php echo $inc_; ?>/assets/img/edunovasi-tryout-nasional.jpg">
            </div>
            <div class="col-md-7 my-auto">
                <div class="row">
                    <div class="col-md-12 title mt-md-0 mt-3">
                        Try Out Online UTBK 2022 Gratis
                    </div>
                    <div class="col-md-12 desc fw-bold text-primary fs-5 mb-4">
                        Terbuka untuk kelas X, XI, XII dan Alumni
                    </div>
                    <div class="col-md-12 desc">
                        <ol>
                            <li>Soal Standar UTBK</li>
                            <li>Penilaian menggunakan IRT</li>
                            <li>Download soal dan pembahasan</li>
                            <li>Ranking Nasional</li>
                        </ol>
                    </div>
                    <div class="col-md-10 mt-2">
                        <div class="card rounded shaadow-sm">
                            <div class="card-body">
                                Pelaksanaan : <b>9-10 Mei 2022</b><br>
                                Batas Pendaftaran : <b>8 Mei 2022</b><br><br>
                                <h5 class="text-danger">Terbatas Hanya untuk 1000 Peserta !</h5><br>
                                Buruan daftar sebelum terlambat
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 desc mt-4">
                        <a href="<?php echo $inc; ?>/pendaftaran-tryout-nasional-2022#form-daftar"
                            class="btn btn-primary w-100">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="keunggulan"></div>

    </div>
</section>

<!-- 
<section id="panduan" class="py-5 my-5">
	<div class="container">
		<div class="row">

			<div class="col-md-5 my-auto text-center position-relative">
				<img class="img-fluid" src="assets/img/tryout-yt.png">
				<a class="btn-animation mb-2 position-all-center text-center" style="cursor:pointer">
					<img class="pulse" src="<?php echo $inc_; ?>/assets/ic/play-button.png">
				</a>
			</div>
			<div class="col-md-7 my-auto">
				<div class="row">
					<div class="col-md-12 title mb-3 mt-md-0 mt-3">
						Lengkap dengan Panduan !
					</div>
					<div class="col-md-12 desc">
						Ayo ikuti panduan lengkap yang telah Kami sediakan untuk memudahkan Kamu mengerjakan try out
					</div>
				</div>
			</div>
		</div>
		<div id="keunggulan"></div>

	</div>
</section>
-->

<section id="keunggulan" class="my-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-5 text-center">
                <h5 class="fw-bold title">Keunggulan Kami</h5>
            </div>
            <div class="col-md-12">
                <div class="row g-4" id="list-keunggulan">
                    <div class="col-md-3">
                        <div class="card card-testimoni text-center h-100">
                            <div class="mx-3 px-5 pt-3">
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto"
                                    src="<?php echo $inc_; ?>/assets/ic/tryout_mudah.svg" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Praktis</h5>
                                <p class="card-text pt-3">
                                    Kamu bisa mengerjakan soal latihan dan try out tanpa prasyarat
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-testimoni text-center h-100">
                            <div class="mx-3 px-5 pt-3">
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto"
                                    src="<?php echo $inc_; ?>/assets/ic/tryout_terpercaya.svg" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Terpercaya</h5>
                                <p class="card-text pt-3">
                                    Soal yang disajikan dibuat oleh tim ahli dan menyesuaikan dengan soal UTBK terkini
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-testimoni text-center h-100">
                            <div class="mx-3 px-5 pt-3">
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto"
                                    src="<?php echo $inc_; ?>/assets/ic/tryout_gratis.svg" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Gratis</h5>
                                <p class="card-text pt-3">
                                    Soal latihan dan try out tersedia secara bebas dan gratis
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-testimoni text-center h-100">
                            <div class="mx-3 px-5 pt-3">
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto"
                                    src="<?php echo $inc_; ?>/assets/ic/tryout_uptodate.svg" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Up to Date</h5>
                                <p class="card-text pt-3">
                                    Tersedia soal latihan dan try out terbaru setiap pekan
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="edunitas" style="margin-top:96px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12 my-md-auto mt-2 mb-5">

                <div class="secondary-header">Ingin Karir Anda Meningkat ? Ingin Punya Pekerjaan & Gaji Lebih Baik dari
                    Saat ini ? </div>
                <div class="primary-paragraph">
                    Dapatkan Rekomendasi Kampus (PTS) Terbaik di Seluruh Indonesia
                </div>

                <div class="secondary-paragraph d-flex">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5355 17.8286C13.2495 17.8286 17.071 14.0071 17.071 9.29307C17.071 4.57904 13.2495 0.757568 8.5355 0.757568C3.82148 0.757568 0 4.57904 0 9.29307C0 14.0071 3.82148 17.8286 8.5355 17.8286Z"
                            fill="#62B020" />
                        <path
                            d="M3.56367 8.45244C4.81382 9.3218 5.46764 9.47268 6.54535 11.2904C7.62307 13.1082 7.80987 14.3439 8.09726 14.5667C8.37747 14.7966 9.80005 14.5092 10.5401 14.114C11.2801 13.7189 11.3017 13.4961 11.9914 11.8868C12.947 9.6523 14.4989 6.9149 15.6844 5.32707C16.8771 3.73924 19.3845 1.64847 19.4995 1.25331C19.6144 0.858145 18.4218 0.671341 17.2866 1.00903C16.1514 1.34671 13.7589 3.97633 12.3219 6.04555C10.7197 8.34467 10.1521 10.2846 9.86472 10.2271C9.58451 10.1696 9.0241 9.01285 8.23377 8.16505C7.43626 7.31725 6.60283 6.73528 5.64007 6.90772C4.67013 7.08015 2.98889 8.0501 3.56367 8.45244Z"
                            fill="white" />
                    </svg>
                    <div class="ms-1">Kampus Kualitas A-B+</div>
                </div>

                <div class="secondary-paragraph d-flex">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5355 17.8286C13.2495 17.8286 17.071 14.0071 17.071 9.29307C17.071 4.57904 13.2495 0.757568 8.5355 0.757568C3.82148 0.757568 0 4.57904 0 9.29307C0 14.0071 3.82148 17.8286 8.5355 17.8286Z"
                            fill="#62B020" />
                        <path
                            d="M3.56367 8.45244C4.81382 9.3218 5.46764 9.47268 6.54535 11.2904C7.62307 13.1082 7.80987 14.3439 8.09726 14.5667C8.37747 14.7966 9.80005 14.5092 10.5401 14.114C11.2801 13.7189 11.3017 13.4961 11.9914 11.8868C12.947 9.6523 14.4989 6.9149 15.6844 5.32707C16.8771 3.73924 19.3845 1.64847 19.4995 1.25331C19.6144 0.858145 18.4218 0.671341 17.2866 1.00903C16.1514 1.34671 13.7589 3.97633 12.3219 6.04555C10.7197 8.34467 10.1521 10.2846 9.86472 10.2271C9.58451 10.1696 9.0241 9.01285 8.23377 8.16505C7.43626 7.31725 6.60283 6.73528 5.64007 6.90772C4.67013 7.08015 2.98889 8.0501 3.56367 8.45244Z"
                            fill="white" />
                    </svg>
                    <div class="ms-1">Biaya Terjangkau & Dapat Diangsur Perbulan</div>
                </div>

                <div class="secondary-paragraph d-flex">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5355 17.8286C13.2495 17.8286 17.071 14.0071 17.071 9.29307C17.071 4.57904 13.2495 0.757568 8.5355 0.757568C3.82148 0.757568 0 4.57904 0 9.29307C0 14.0071 3.82148 17.8286 8.5355 17.8286Z"
                            fill="#62B020" />
                        <path
                            d="M3.56367 8.45244C4.81382 9.3218 5.46764 9.47268 6.54535 11.2904C7.62307 13.1082 7.80987 14.3439 8.09726 14.5667C8.37747 14.7966 9.80005 14.5092 10.5401 14.114C11.2801 13.7189 11.3017 13.4961 11.9914 11.8868C12.947 9.6523 14.4989 6.9149 15.6844 5.32707C16.8771 3.73924 19.3845 1.64847 19.4995 1.25331C19.6144 0.858145 18.4218 0.671341 17.2866 1.00903C16.1514 1.34671 13.7589 3.97633 12.3219 6.04555C10.7197 8.34467 10.1521 10.2846 9.86472 10.2271C9.58451 10.1696 9.0241 9.01285 8.23377 8.16505C7.43626 7.31725 6.60283 6.73528 5.64007 6.90772C4.67013 7.08015 2.98889 8.0501 3.56367 8.45244Z"
                            fill="white" />
                    </svg>
                    <div class="ms-1">
                        Waktu Kuliah Fleksibel ( Ada Kelas Online / Kuliah dari Rumah )
                    </div>
                </div>

                <div class="secondary-paragraph d-flex">
                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.5355 17.8286C13.2495 17.8286 17.071 14.0071 17.071 9.29307C17.071 4.57904 13.2495 0.757568 8.5355 0.757568C3.82148 0.757568 0 4.57904 0 9.29307C0 14.0071 3.82148 17.8286 8.5355 17.8286Z"
                            fill="#62B020" />
                        <path
                            d="M3.56367 8.45244C4.81382 9.3218 5.46764 9.47268 6.54535 11.2904C7.62307 13.1082 7.80987 14.3439 8.09726 14.5667C8.37747 14.7966 9.80005 14.5092 10.5401 14.114C11.2801 13.7189 11.3017 13.4961 11.9914 11.8868C12.947 9.6523 14.4989 6.9149 15.6844 5.32707C16.8771 3.73924 19.3845 1.64847 19.4995 1.25331C19.6144 0.858145 18.4218 0.671341 17.2866 1.00903C16.1514 1.34671 13.7589 3.97633 12.3219 6.04555C10.7197 8.34467 10.1521 10.2846 9.86472 10.2271C9.58451 10.1696 9.0241 9.01285 8.23377 8.16505C7.43626 7.31725 6.60283 6.73528 5.64007 6.90772C4.67013 7.08015 2.98889 8.0501 3.56367 8.45244Z"
                            fill="white" />
                    </svg>
                    <div class="ms-1">
                        Tersedia Banyak Pilihan Program Studi/Jurusan Favorit D3, S1, S2
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-md-start mb-3 mb-md-1">
                        <a href="https://edunitas.com/#lokasikampus" target="_blank"
                            class="btn button-secondary btn-lg">Klik di Sini</a>
                    </div>
                </div>

            </div>
            <div class="col-md-6 text-center" style="margin-top:-50px;margin-bottom:0px">
                <img class="img-fluid" src="<?php echo $inc_; ?>/assets/img/edunitas-cari-kampus.png">
            </div>
        </div>

    </div>
</section>
<!--
<section id="edunitas" style="margin-top:96px;">
	<div class="container">
		<div class="row">
			<div class="col-md-6 my-md-auto mt-2 mb-5">
				<div class="row">
					<div class="col-md-12 h4 fw-bold desc">
						Temukan kampus dan jurusan kuliah dengan sistem belajar lengkap di seluruh Indonesia, semua dalam satu platform
					</div>
					<div class="col-md-12 mt-4 mb-2 text-center text-md-start">
						<a href="https://edunitas.com/#lokasikampus" target="_blank" class="btn fw-bold btn-primary px-5 p-2">Cari Kampus</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 text-center" style="margin-top:-50px;margin-bottom:0px">
				<img class="img-fluid" src="<?php echo $inc_; ?>/assets/img/tryout-edunitas.png">
			</div>
		</div>

	</div>
</section>
-->
<section id="news" class="my-5" style="display:none">
    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    <div class="col-6 text-start">
                        <h5 class="fw-bold title">Info Untuk Kamu</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="https://edunitas.com/edunews/tag/all/tryout" class="btn btn-outline-primary px-3">Lihat
                            Semua</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row g-3" id="divnews">

                </div>
            </div>
        </div>

    </div>
</section>


<script>
$('.owl-header').owlCarousel({
    loop: true,
    rewind: true,
    margin: 20,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        }
    },
    dots: true,
    smartSpeed: 400,
    autoplay: true,
    autoplayTimeout: 8000,
    autoplaySpeed: 2000,
    autoplayHoverPause: true,
    responsiveRefreshRate: 1000
})
loadedunews();

function loadedunews() {

    var jsondata = JSON.stringify({
        format: "json",
        formdata_getlist: "listnews",
        formdata_origin: "list",
        formdata_length: "3",
        formdata_filterkategori: 'tryout',
        setdata_mod: "get-data"
    });

    $.ajax({
        url: 'https://api.edunitas.com/mod/edun-news-g',
        type: 'POST',
        crossDomain: true,
        data: jsondata,
        contentType: 'application/json',
        dataType: 'json',
        success: function(res) {
            console.log(res);

            if (res.response == 'OK') {
                $('#news').show();
                $('#divnews').empty();
                var isi = '';
                $.each(res.data.listnews.listdata, function(i, news) {
                    var linknews = news.linksearch.replace(/ /g, '-');
                    var like = news.like == null ? 0 : news.like;
                    let cover = "https://edunitas.com/assets/edu-img/edu-pattern-news.jpg";
                    if (news.cover) {
                        cover = news.cover;
                    }
                    isi += `
							<div class="col-md-4">
								<div class="list-card bg-white h-100 rounded-3 overflow-hidden position-relative shadow-sm">
									<div class="list-card-image">
											<img src="` + cover + `" class="img-fluid" style="width:100%;height:154px; object-fit:cover" alt="${decodeHtml(news.title_long)}">
									</div>
									<div class="p-3 position-relative">
										<div class="list-card-body">
											<h6 class="mb-1 fw-bold" style="min-height:40px">` + decodeHtml(news.title_long) + `</h6>
											<hr>
											<p class="text-gray time d-flex">
												<span class="rounded-sm p-2">
													<span class="text-secondary small"><img class="img-fluid mb-1 me-2" src="assets/ic/date_biru.svg">${ news.dibuat }</span>
												</span> 
												<span class="card-text ms-auto p-1"><a target="_blank" href="https://edunitas.com/edunews/detail/` +
                        linknews.replace(/=/g, "") + `" class="btn btn-sm round btn-primary px-4 fw-bold">Selengkapnya</a></span>
											</p>
										</div>
									</div>
								</div>
							</div>
							`;
                });
                $('#divnews').append(isi);

            } else {
                console.log(res.message);
            }
        }
    });
}

function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    var txt1 = document.createElement("textarea");
    txt1.innerHTML = txt.value;
    var txt2 = document.createElement("textarea");
    txt2.innerHTML = txt1.value;
    return txt2.value;
}

function direct_latihan() {
    Swal.fire({
        title: 'Mohon Maaf',
        width: 600,
        html: "Event Try Out belum dibuka nih, ayo persiapan mengerjakan latihan soal dulu !",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Latihan Soal',
        cancelButtonText: 'Kembali',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo $inc_; ?>/latihan";
        }
    })
}
</script>