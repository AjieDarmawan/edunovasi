<?php
// echo "oy";



$dataevent = '';
$getcurl_event = getcurl($base_api . 'event');
if (isset($getcurl_event['status']) && $getcurl_event['status'] == '200') {
    $dataevent = $getcurl_event['datanya'];
}


$dataeventman = '';
$getcurl_eventman = getcurl($base_api . 'event_mandiri');
if (isset($getcurl_eventman['status']) && $getcurl_eventman['status'] == '200') {
    $dataeventman = $getcurl_eventman['datanya'];
}

$dataeventskd = '';
$getcurl_eventskd = getcurl($base_api_dinas . 'event');
if (isset($getcurl_eventskd['status']) && $getcurl_eventskd['status'] == '200') {
    $dataeventskd = $getcurl_eventskd['datanya'];
}

$dataevent_nanti = '';
$getcurl_event_nanti = getcurl($base_api . 'event_akan_datang');
if (isset($getcurl_event_nanti['status']) && $getcurl_event_nanti['status'] == '200') {
    $dataevent_nanti = $getcurl_event_nanti['datanya'];
}

$datalatihan = '';
$getcurl_latihan = getcurl($base_api . 'latihan');
if (isset($getcurl_latihan['status']) && $getcurl_latihan['status'] == '200') {
    $datalatihan = $getcurl_latihan['datanya'];
}

$dataeventsekolah = '';
if ($sesi['id_sekolah'] > 0) {

    $getcurl_event_sekolah = getcurl($base_api_sekolah . 'event/' . $sesi['id_sekolah']);
    if (isset($getcurl_event_sekolah['status']) && $getcurl_event_sekolah['status'] == '200') {
        $dataeventsekolah = $getcurl_event_sekolah['datanya'];
    }

    // eduprint($dataevent);
    // eduprint($dataeventsekolah);
    // eduprint($dataeventman);
    // eduprint($dataeventskd);
    // eduprint($getcurl_event_nanti);
    // eduprint($getcurl_latihan);
}

$dataratingtesti = '';
$getcurl_rating = getcurl('https://backend.edunovasi.com/api_mobile/api_testimoni/tampil');
if (isset($getcurl_rating['status']) && $getcurl_rating['status'] == '200') {
    $dataratingtesti = $getcurl_rating['data'];
    // echo $datarating;
}

?>

<?php






if (isset($_POST['btn_testimoni'])) {
    unset($_POST['btn_testimoni']);

    $postcurl_peserta = postcurl('https://backend.edunovasi.com/api_mobile/api_testimoni/simpan', $_POST);
    // eduprint($postcurl_peserta, 1);
    if ($postcurl_peserta['status'] == '200') {
        echo '<script>
        swal.fire({
            title: "Sukses",
            width: 600,
            text:"Data testimoni sudah berhasil terkirim !",
            icon: "success",
        })
        </script>';
    } else {
        echo '<script>
        swal.fire({
            title:"Mohon Maaf",
            icon:"info",
            width: 600,
            text:"Pastikan email belum terdaftar sebelumnya dan kondisi jaringan stabil ! "
        })</script>';
    }
}
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
        /* background: #f77f00; */
        background: #ffaa50;
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
        font-size: 18px;
        /* line-height: 39px; */
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
        background: #f77f00;
        /* background: #ffaa51; */
        border-radius: 16px;
        /* height: 385px; */
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
        padding-left: 48px;
    }

    .second-subheader {
        margin-top: 20px;
        font-weight: 400;
        font-size: 16px;
        line-height: 32px;
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
        background: #951a1f;
        border-radius: 50px;
        color: #fff;
        width: 298px;
        margin-top: 20px;
    }

    .button-secondary:hover {
        background: #840b0e;
        color: #fff;
    }


    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(92deg, #f77f00 8%, rgba(255, 170, 81, 0) 25%);
        background-size: cover;
    }

    .konten-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(-92deg, #fcbf4a 5%, rgba(252, 191, 74, 0) 42%);
        background-size: cover;
    }


    @media (max-width: 767.98px) {

        .section-banner {
            /* background: #f77f00; */
            padding-top: 90px;
            padding-bottom: 40px;
        }

        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, #f77f00 5%, rgba(255, 170, 81, 0) 42%);
            background-size: cover;
        }

        .konten-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(360deg, #fcbf4a 5%, rgba(252, 191, 74, 0) 42%);
            background-size: cover;
        }

        /* .bacground-banner {
			height: 800px;
		} */

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


    /* TESTIMONI STYLE */
    .testi-testinya {
        font: italic normal normal 12px/17px Open Sans;
        letter-spacing: 0px;
        color: #000000;
    }

    .div-image {
        margin-top: 20px;
        margin-bottom: -30px;
        z-index: 100
    }

    .testi-image {
        opacity: 1;
        width: 138px;
        height: 138px;
        border-radius: 10px;
    }

    .testi-sekolah {
        font: normal normal normal 14px/19px Open Sans;
        letter-spacing: 0px;
        color: #FFFFFF;
    }

    .testi-juara {
        font: normal normal bold 14px/19px Open Sans;
        letter-spacing: 0px;
        color: #FFFFFF;
    }

    .div-juara1 {
        background: #F77F00 0% 0% no-repeat padding-box;
        border-radius: 16px;
        font: normal normal bold 18px/24px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    .div-juara {
        background: #003049 0% 0% no-repeat padding-box;
        border-radius: 16px;
        font: normal normal bold 18px/24px Open Sans;
        letter-spacing: 0px;
        color: #fff;
    }

    .rounded-10 {
        border-radius: 16px;
    }

    #tetimoni .card {
        box-shadow: 0px 3px 6px #00000029;
    }

    .bgkedinasan {
        background: url('assets/img/tryout-kedinasan.png');
        background-size: cover;
        background-position: center center;
        min-height: 200px;
    }


    .bgmandiri {
        background: url('assets/img/tryout-ujian-mandiri.jpg');
        background-size: cover;
        background-position: center center;
        min-height: 200px;
    }


    .rating:not(:checked)>input {
        position: absolute;
        /* top: -9999px; */
        clip: rect(0, 0, 0, 0);
    }

    .rating:not(:checked)>label {
        float: right;
        width: 1em;
        padding: 0 .1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 200%;
        line-height: 1.2;
        color: #ddd;
        text-shadow: 1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating:not(:checked)>label:before {
        content: '★ ';
    }

    .rating>input:checked~label {
        color: #f70;
        text-shadow: 1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: gold;
        text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
    }

    .rating>input:checked+label:hover,
    .rating>input:checked+label:hover~label,
    .rating>input:checked~label:hover,
    .rating>input:checked~label:hover~label,
    .rating>label:hover~input:checked~label {
        color: #ea0;
        text-shadow: 1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0, 0, 0, .5);
    }



    /* TESTIMONI STYLE */
</style>

<section id="header" class="position-relative">
    <div id="carouselExampleIndicators" class="carousel slide section-banner" data-bs-ride="carousel">
        <div class="container">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <?php if (date('Ymd') < '20220924') { ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
                <?php } ?>



            </div>
            <div class="carousel-inner" style="border-radius: 16px">

                <div class="carousel-item active bacground-banner" data-bs-interval="10000">
                    <div class="row">
                        <div class="col-md-5 padding-card">
                            <div class="primary-header">Telah Hadir !!!</div>

                            <div class="second-subheader">
                                Untuk kemudahan pengguna smartphone kini Edunovasi telah hadir di <b>Play Store</b> dan <b>App Store</b>
                                sebagai <b>#TemanBelajar</b>. Mengerjakan latihan Try Out lebih mudah dalam genggaman
                                tanganmu !
                            </div>
                            <div class="mt-4">
                                <a href="https://apps.apple.com/id/app/edunovasi-mobile/id1632579053" target="_blank">
                                    <img class="me-2" src="<?php echo $inc_ ?>/assets/ic/app-store.png" style="height:32px">
                                </a>
                                <a href="https://play.google.com/store/apps/details?id=com.edunovasi" target="_blank">
                                    <img class="me-2" src="<?php echo $inc_ ?>/assets/ic/play-store.png" style="height:32px">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 position-relative">
                            <div class="banner-overlay"></div>
                            <img src="<?php echo $inc_ ?>/assets/img/edunovasi-tryout-app.jpg" alt="" class="img-fluid w-100 h-100" />
                        </div>
                    </div>
                </div>

                <div class="carousel-item bacground-banner" data-bs-interval="10000">
                    <div class="row">
                        <div class="col-md-5 padding-card">
                            <div class="primary-header">Selamat Datang di Edunovasi</div>

                            <div class="second-subheader">
                                Platform edukasi yang menyediakan berbagai soal dan latihan
                                try out secara gratis, praktis dan berkualitas dengan berbagai
                                layanan dan program unggulan yang akan menjadi
                                <b>#TemanBelajar</b>
                                kamu dalam meraih impian.
                            </div>
                        </div>
                        <div class="col-md-7 position-relative">
                            <div class="banner-overlay"></div>
                            <img src="<?php echo $inc_ ?>/assets/img/edunovasi-edunitas-tryout.jpg" alt="" class="img-fluid w-100 h-100" />
                        </div>
                    </div>
                </div>

                <div class="carousel-item bacground-banner" data-bs-interval="10000">
                    <div class="row">
                        <div class="col-md-5 padding-card">
                            <div class="primary-header-sm">TRY OUT GRATIS UTBK 2023 EDUNOVASI</div>
                            <div class="second-subheader small">
                                Yuk, curi start <b>#MulaiDariSekarang</b> untuk persiapan UTBK-SBMPTN 2023 bersama
                                Edunovasi! Dapatkan program intens dan menarik seperti Try Out Gratis, Live Talkshow,
                                Webinar, dan berbagai program unggulan lainnya. Edunovasi siap menjadi
                                <b>#TemanBelajar</b> dan menjadi saksi sejarahmu dalam menggapai perguruan tinggi
                                impian.
                            </div>
                        </div>
                        <div class="col-md-7 position-relative">
                            <div class="banner-overlay"></div>
                            <img src="<?php echo $inc_ ?>/assets/img/edunovasi-tryout-utbk-2023.jpg" alt="" class="img-fluid w-100 h-100" />
                        </div>
                    </div>
                </div>

                <div class="carousel-item bacground-banner" data-bs-interval="10000">
                    <div class="row">
                        <div class="col-md-5 padding-card">
                            <div class="primary-header-sm">Ingin Karir Anda Meningkat ? Ingin Punya Pekerjaan & Gaji
                                Lebih Baik dari Saat ini ? </div>
                            <div style="color:#840b0e" class="my-2 small fw-bold">
                                Dapatkan Rekomendasi Kampus (PTS) Terbaik di Seluruh Indonesia
                            </div>
                            <div class="small">
                                <div class="d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Kampus Kualitas A-B+</div>
                                </div>

                                <div class="d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Biaya Terjangkau & Dapat Diangsur Perbulan</div>
                                </div>

                                <div class="d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">Waktu Kuliah Fleksibel ( Ada Kelas Online / Kuliah dari Rumah )
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                                    <div class="ms-2">
                                        Tersedia Banyak Pilihan Program Studi/Jurusan Favorit D3, S1, S2
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center text-md-start">
                                <a href="https://edunitas.com/educampus" target="_blank" class="btn button-secondary btn-sm py-1">Klik di Sini</a>
                            </div>
                        </div>
                        <div class="col-md-7 position-relative">
                            <div class="banner-overlay"></div>
                            <img src="<?php echo $inc_ ?>/assets/img/edunovasi-edunitas-kuliah-kelas-karyawan.jpg" alt="" class="img-fluid w-100 h-100" />
                        </div>
                    </div>
                </div>

                <?php if (date('Ymd') < '20220924') { ?>
                    <div class="carousel-item bacground-banner" data-bs-interval="10000">
                        <div class="row">
                            <div class="col-md-5 padding-card">
                                <div class="primary-header-sm">Try Out Nasional UTBK 2023 Tes Skolastik</div>
                                <div style="color:#840b0e" class="my-2 small fw-bold">
                                    Pelaksanaan : 24-30 September 2022
                                </div>
                                <ol class="small">
                                    <li>GRATIS</li>
                                    <li>Beragam hadiah menarik</li>
                                    <li>Soal Standar UTBK berdasarkan keputusan Kemendikbud terbaru</li>
                                    <li>Penilaian menggunakan IRT</li>
                                    <li>Download soal dan pembahasan</li>
                                    <li>Ranking Nasional</li>
                                </ol>
                                <div class="col-md-12 text-center text-md-start">
                                    <a href="<?php echo $inc_ ?>/pendaftaran-tryout-nasional-2023-tes-skolastik" target="_blank" class="btn button-secondary btn-sm py-1">Daftar di Sini</a>
                                </div>
                            </div>
                            <div class="col-md-7 position-relative">
                                <div class="banner-overlay"></div>
                                <img src="<?php echo $inc_ ?>/assets/img/edunovasi-tryout-utbk2023-banner.jpg" alt="" class="img-fluid w-100 h-100" />
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- <div class="carousel-item bacground-banner" style="background: #2241b5 !important ;">
					<div class="row">
						<div class="col-md-6 padding-card">
							<div class="secondary-header">Ingin Karir Anda Meningkat ? Ingin Punya Pekerjaan & Gaji Lebih Baik dari Saat ini ? </div>
							<div class="primary-paragraph">
								Dapatkan Rekomendasi Kampus (PTS) Terbaik di Seluruh Indonesia
							</div>
							<div class="secondary-paragraph mb-1 d-flex">
								<img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
								<div class="ms-2">Kampus Kualitas A-B+</div>
							</div>

							<div class="secondary-paragraph mb-1 d-flex">
								<img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
								<div class="ms-2">Biaya Terjangkau & Dapat Diangsur Perbulan</div>
							</div>

							<div class="secondary-paragraph mb-1 d-flex">
								<img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
								<div class="ms-2">Waktu Kuliah Fleksibel ( Ada Kelas Online / Kuliah dari Rumah )</div>
							</div>

							<div class="secondary-paragraph mb-1 d-flex">
								<img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
								<div class="ms-2">
									Tersedia Banyak Pilihan Program Studi/Jurusan Favorit D3, S1, S2
								</div>
							</div>

							<div class="col-md-12 text-center text-md-start">
								<a href="https://edunitas.com/educampus" target="_blank" class="btn button-secondary btn-lg">Klik di Sini</a>
							</div>
						</div>

						<div class="col-md-6">
							<div class="d-flex justify-content-end">
								<img src="<?php echo $inc_; ?>/assets/img/edunitas-cari-kampus-banner.png" alt="" class="img-fluid image-cari-kampus mx-md-4 mt-md-2" />
							</div>
						</div>
					</div>
				</div> -->

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-left fs-1 text-dark"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-right fs-1 text-dark"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div id="tryout"></div>
    </div>

</section>


<?php

if ($sesi['email'] == 'rfahrezi659@gmail.com') {
    // eduprint($dataevent);
    // eduprint($dataeventman);
    // eduprint($dataeventskd);
    // eduprint($getcurl_event_nanti);
    // eduprint($getcurl_latihan);
}



$dataformtesti = 0;
$tampilformrating = getcurl('https://backend.edunovasi.com/api_mobile/api_testimoni/cek_email?email=' . $sesi['email'] . '');
if (isset($tampilformrating['status']) && $tampilformrating['status'] == '200') {
    $dataformtesti = 1;
    // echo $dataformtesti;
}




if (isset($_SESSION['userdata'])  && $dataformtesti == 1) {
?>

    <div class="container py-5">
        <div class="container ">
            <div class="row px-4 py-5 rounded bg-white shadow-sm">
                <div class="col-md-5 ">
                    <div class="">
                        <h4 class="fw-bold">Beri Penilaian Kamu Tentang Kami ?</h4>
                        <div>Penilaian anda sangat bermanfaat bagi kami untuk selalu membangun edunovasi menjadi lebih baik
                            lagi</div>
                        <img class="mt-4" src="assets/img/img-reviews.svg" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-7 mt-md-0 mt-4">
                    <form method="POST" id="form-testimoni">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="txtEmail" name="email" aria-describedby="emailHelp" value="<?php echo $sesi['email'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Saran/Masukan</label>
                            <textarea name="saran" class="form-control" id="text_saran" rows="5" style="resize:none;" required minlength="10" maxlength="225"></textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="bintang" value="10" /><label for="star5" title="Amat Sangat Bagus">5stars</label>
                                <input type="radio" id="star4" name="bintang" value="9" /><label for="star4" title="Sangat Baik">4
                                    stars</label>
                                <input type="radio" id="star3" name="bintang" value="8" /><label for="star3" title="Cukup Baik">3stars</label>
                                <input type="radio" id="star2" name="bintang" value="7" /><label for="star2" title="Baik">2
                                    stars</label>
                                <input type="radio" id="star1" name="bintang" value="6" /><label for="star1" title="Cukup Baik">1 star</label>
                                <input type="radio" id="star5" name="bintang" value="5" /><label for="star5" title="Lumayan Baik">5stars</label>
                                <input type="radio" id="star4" name="bintang" value="4" /><label for="star4" title="Agak Kurang">4
                                    stars</label>
                                <input type="radio" id="star3" name="bintang" value="3" /><label for="star3" title="Kurang">3stars</label>
                                <input type="radio" id="star2" name="bintang" value="2" /><label for="star2" title="Sangat Kurang">2 stars</label>
                                <input type="radio" id="star1" name="bintang" value="1" /><label for="star1" title="Amat Sangat Kurang">1 star</label>
                            </fieldset>
                            <div class="">Bintang</div>
                        </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <button type="submit" id="btn_testimoni" name="btn_testimoni" class="btn btn-primary w-100">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>


<?php
if ($dataeventsekolah != '') {
    // eduprint($getcurl_event_sekolah);
?>

    <style>
        .bgsekolah {
            background: url('<?php echo $getcurl_event_sekolah['photo'] ?>');
            background-size: cover;
            background-position: center center;
            min-height: 200px;
        }
    </style>

    <section id="event" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4 text-center ">
                    <h5 class="fw-bold title">Try Out <?php echo $getcurl_event_sekolah['nama_sekolah'] ?></h5>
                </div>
                <div class="col-md-12 my-2">
                    <div class="card p-0 bg-primary rounded-3 shadow">
                        <div class="row g-0" id="list-event">
                            <div class="col-md-6 position-relative bgsekolah">
                                <div class="konten-overlay"></div>
                            </div>
                            <div class="col-md-6 p-md-4 p-2">
                                <div class="row g-3">
                                    <?php
                                    foreach ($dataeventsekolah as $key => $val) {
                                        $id = base64_decode($val['id_event']);
                                    ?>

                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header bg-biru py-3">
                                                    <div class="d-flex justify-content-center text-white">
                                                        <div class="mx-2">
                                                            <img class="img-fluid mb-1" src="assets/ic/date_putih.svg"> <b><span class="d-none d-md-inline-flex">Periode :</span>
                                                                <?php echo $val['tgl_mulai'] ?> -
                                                                <?php echo $val['tgl_selesai'] ?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body bg-white">
                                                    <div class="row">
                                                        <div class="col-md-12 title my-auto"><?php echo $val['judul'] ?></div>
                                                        <div class="col-md-12 text-dark">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex justify-content-start text-primary">
                                                                <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_biru.svg"><?php echo $val['waktu'] ?>
                                                                    menit</div>
                                                                <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val['jumlah_soal'] ?>
                                                                    soal</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 my-md-auto mt-3 text-end"><a href="<?php echo $inc_ ?>/sekolah/detail/<?php echo $val['id_event'] ?>" class="btn btn-primary px-5">Lihat Detail</a></div>
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
    </section>

<?php
}
?>


<?php
if ($dataeventman != '') {
?>

    <section id="event" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4 text-center ">
                    <h5 class="fw-bold title">Try Out Ujian Mandiri</h5>
                </div>
                <div class="col-md-12 my-2">
                    <div class="card p-0 bg-primary rounded-3 shadow">
                        <div class="row g-0" id="list-event">
                            <div class="col-md-6 position-relative bgmandiri">
                                <div class="konten-overlay"></div>
                            </div>
                            <div class="col-md-6 p-md-4 p-2">
                                <div class="row g-3">
                                    <?php
                                    foreach ($dataeventman as $key => $val) {
                                        $id = base64_decode($val['id_event']);
                                    ?>
                                        <div class="col-md-12">

                                            <div class="card">
                                                <div class="card-header bg-biru py-3">
                                                    <div class="d-flex justify-content-center text-white">
                                                        <div class="mx-2">
                                                            <img class="img-fluid mb-1" src="assets/ic/date_putih.svg"> <b><span class="d-none d-md-inline-flex">Periode :</span>
                                                                <?php echo $val['tgl_mulai'] ?> -
                                                                <?php echo $val['tgl_selesai'] ?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body bg-white">
                                                    <div class="row">
                                                        <div class="col-md-12 title my-auto  text-center">
                                                            <?php echo $val['judul'] ?></div>
                                                        <!-- <div class="col-md-12 title my-auto">Ujian Mandiri - SIMAK UI</div> -->
                                                        <div class="col-md-12 text-dark">
                                                            <hr>
                                                        </div>
                                                        <?php
                                                        foreach ($val['data'] as $k => $v) {
                                                        ?>
                                                            <div class="col-md-6 my-md-auto mt-3 text-end"><a href="<?php echo $inc_ ?>/mandiri/detail/<?php echo $v['id_event2'] ?>" class="btn btn-primary px-5 w-100"><?php echo str_replace("Mandiri ", "", str_replace("MANDIRI ", "", $v['kategori_nama'])) ?></a>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
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
    </section>

<?php
}
?>

<?php
if ($dataevent != '') {
?>

    <section id="event" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4 text-center ">
                    <h5 class="fw-bold title">Try Out UTBK</h5>
                </div>
                <div class="col-md-12 my-2">
                    <div class="row g-3 justify-content-center" id="list-event">
                        <?php
                        foreach ($dataevent as $key => $val) {
                            $id = base64_decode($val['id_event']);
                        ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-primary py-3">
                                        <div class="d-flex justify-content-center text-primary">
                                            <div class="mx-2">
                                                <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"> <b><span class="d-none d-md-inline-flex">Periode :</span>
                                                    <?php echo $val['tgl_mulai'] ?> - <?php echo $val['tgl_selesai'] ?></b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body bg-white">
                                        <div class="row">
                                            <div class="col-md-12 title my-auto">
                                                <?php echo $val['judul'] . " " . $val['kategori'] ?></div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-start text-primary">
                                                    <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_biru.svg"><?php echo $val['waktu'] ?> menit
                                                    </div>
                                                    <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val['jumlah_soal'] ?> soal
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-md-auto mt-3 text-end"><a href="<?php echo $inc_ ?>/event/detail/<?php echo $val['id_event'] ?>" class="btn btn-primary px-5">Lihat Detail</a></div>
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

<?php
}
?>


<?php
if ($dataeventskd != '') {
?>

    <section id="event" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4 text-center ">
                    <h5 class="fw-bold title">Try Out SKD Kedinasan</h5>
                </div>
                <div class="col-md-12 my-2">
                    <div class="card p-0 bg-primary rounded-3 shadow">
                        <div class="row g-0" id="list-event">
                            <div class="col-md-6 position-relative bgkedinasan">
                                <div class="konten-overlay"></div>
                            </div>
                            <div class="col-md-6 p-md-4 p-2">
                                <div class="row g-3">
                                    <?php
                                    foreach ($dataeventskd as $key => $val) {
                                        $id = base64_decode($val['id_event']);
                                    ?>
                                        <div class="col-md-12">

                                            <div class="card">
                                                <div class="card-header bg-biru py-3">
                                                    <div class="d-flex justify-content-center text-white">
                                                        <div class="mx-2">
                                                            <img class="img-fluid mb-1" src="assets/ic/date_putih.svg"> <b><span class="d-none d-md-inline-flex">Periode :</span>
                                                                <?php echo $val['tgl_mulai'] ?> -
                                                                <?php echo $val['tgl_selesai'] ?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body bg-white">
                                                    <div class="row">
                                                        <div class="col-md-12 title my-auto"><?php echo $val['judul'] ?></div>
                                                        <div class="col-md-12 text-dark">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex justify-content-start text-primary">
                                                                <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_biru.svg"><?php echo $val['waktu'] ?>
                                                                    menit</div>
                                                                <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val['jumlah_soal'] ?>
                                                                    soal</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 my-md-auto mt-3 text-end"><a href="<?php echo $inc_ ?>/skd/detail/<?php echo $val['id_event'] ?>" class="btn btn-primary px-5">Lihat Detail</a></div>
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
    </section>

<?php
}
?>

<?php
if ($datalatihan != '') {
?>
    <section id="latihan" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="row">
                        <div class="col-6 text-start">
                            <h5 class="fw-bold title">Soal Latihan UTBK 2023</h5>
                        </div>
                        <div class="col-6 text-end">
                            <a href="<?php echo $inc_ ?>/latihan" class="btn btn-sm btn-outline-primary px-3">Lihat
                                Semua</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row g-3" id="list-latihan">
                        <?php
                        foreach ($datalatihan as $key => $val) {
                        ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <div class="row">
                                            <div class="col-md-12 title fs-5"><?php echo $val['judul'] ?></div>
                                            <div class="col-md-12">
                                                <!-- <div class="d-flex justify-content-start text-secondary">
													<div class="me-2"><?php echo $val['tgl_mulai'] ?></div>
													<div class="me-2">-</div>
													<div class="me-2"><?php echo $val['tgl_selesai'] ?></div>
												</div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8 my-auto">

                                                <div class="d-flex justify-content-start text-secondary" style="font-size:14px">
                                                    <div class="mx-2">
                                                        <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"><b>Periode :
                                                            <?php echo $val['tgl_mulai'] ?> -
                                                            <?php echo $val['tgl_selesai'] ?></b>
                                                    </div>
                                                </div>
                                                <!-- <div class="d-flex justify-content-start text-oren">
													<div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_oren.svg"><?php echo $val['waktu'] ?> menit</div>
													<div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_oren.svg"><?php echo $val['jumlah_soal'] ?> soal</div>
												</div> -->
                                            </div>
                                            <div class="col-md-4 small my-md-auto mt-3 text-end ">
                                                <a href="<?php echo $inc_ ?>/latihan/detail/<?php echo str_replace(" ", "-", $val['judul']) ?>" class="btn btn-sm btn-outline-primary px-3">Lihat Detail</a>
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
            </div>

        </div>
    </section>
<?php
}
?>


<?php
if ($dataevent_nanti != '') {
?>
    <section id="event" class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 my-4 text-center ">
                    <h5 class="fw-bold title">Ujian Try Out yang Akan Datang</h5>
                </div>
                <div class="col-md-12 my-2">
                    <div class="row g-3" id="list-event">
                        <?php
                        foreach ($dataevent_nanti as $key => $val) {
                            $id = base64_decode($val['id_event']);
                        ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light py-3">
                                        <div class="d-flex justify-content-center text-primary">
                                            <div class="mx-2">
                                                <img class="img-fluid mb-1" src="assets/ic/date_biru.svg"> <b><span class="d-none d-md-inline-flex">Periode :</span>
                                                    <?php echo $val['tgl_mulai'] ?> - <?php echo $val['tgl_selesai'] ?></b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body bg-white">
                                        <div class="row">
                                            <div class="col-md-12 title my-auto">
                                                <?php echo $val['judul'] . " " . str_replace("Mandiri ", "", $val['kategori']) ?>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-start text-primary">
                                                    <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/timer_biru.svg"><?php echo $val['waktu'] ?> menit
                                                    </div>
                                                    <div class="me-2"><img class="img-fluid mb-1" src="assets/ic/task_biru.svg"><?php echo $val['jumlah_soal'] ?> soal
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 my-md-auto mt-3 text-end">
                                                <a href="javascript:void(0)" onclick="direct_latihan()" class="btn btn-primary px-5">Lihat Detail</a>
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
<?php
}
?>

<?php if (date('Ymd') < '20220924') { ?>
    <div class="alert alert-warning text-center" role="alert">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="primary-header">Try Out Nasional UTBK 2023 Tes Skolastik</div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-2 small">
                            <b>GRATIS !</b> pelaksanaan 24 - 30 Septembar 2022
                        </div>
                        <div class="my-2 small">
                            Yuk gabung dengan ratusan siswa lainnya ! <b>KUOTA TERBATAS</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <a href="<?php echo $inc_ ?>/pendaftaran-tryout-nasional-2023-tes-skolastik" target="_blank" class="btn btn-primary btn-sm py-1 px-4">Daftar di Sini</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- 
<section id="iklan" class="py-5 my-5">
	<div class="container">
		<div class="row">

			<div class="col-md-5 my-auto text-center position-relative">
				<img class="img-fluid rounded shadow" src="<?php echo $inc_ ?>/assets/img/edunovasi-tryout-nasional.jpg">
			</div>
			<div class="col-md-7 my-auto">
				<div class="row">
					<div class="col-md-12 title mt-md-0 mt-3">
						Try Out Online UTBK 2023 Gratis
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
						<a href="<?php echo $inc; ?>/pendaftaran-tryout-nasional-2022#form-daftar" class="btn btn-primary w-100">Daftar Sekarang</a>
					</div>
				</div>
			</div>
		</div>
		<div id="keunggulan"></div>

	</div>
</section>

<section id="panduan" class="py-5 my-5">
	<div class="container">
		<div class="row">

			<div class="col-md-5 my-auto text-center position-relative">
				<img class="img-fluid" src="assets/img/tryout-yt.png">
				<a class="btn-animation mb-2 position-all-center text-center" style="cursor:pointer">
					<img class="pulse" src="<?php echo $inc_ ?>/assets/ic/play-button.png">
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

<section id="keunggulan" class="my-5 pt-3">
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
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto" src="<?php echo $inc_; ?>/assets/ic/tryout_mudah.svg" alt="">
                            </div>
                            <div class="card-body">
                                <h5>Praktis</h5>
                                <p class="card-text pt-3">
                                    Kamu bisa mengerjakan soal latihan dan try out kapan pun dan dimana saja
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-testimoni text-center h-100">
                            <div class="mx-3 px-5 pt-3">
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto" src="<?php echo $inc_; ?>/assets/ic/tryout_terpercaya.svg" alt="">
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
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto" src="<?php echo $inc_; ?>/assets/ic/tryout_gratis.svg" alt="">
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
                                <img style="width:64px;height:64px;" class="img-fluid mx-auto" src="<?php echo $inc_; ?>/assets/ic/tryout_uptodate.svg" alt="">
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

<?php if ($sesi['email']) { ?>
<?php } ?>

<section id="testimoni" class="position-relative">
    <div id="carouselTestimoni" class="carousel slide section-banner" data-bs-ride="carousel" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center title fw-bold">
                    Testimoni
                </div>
            </div>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselTestimoni" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselTestimoni" data-bs-slide-to="1" aria-label="Slide 2"></button>

            </div>
            <div class="carousel-inner" style="border-radius: 16px">

                <div class="carousel-item active p-4">
                    <div class="row ">
                        <div class="col-md-12 mb-4 text-center ">
                            <h6 class="fw-bold">Juara TO SAINTEK NASIONAL Edunovasi.com</h6>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 order-md-2">
                            <div class="card rounded-10 text-center">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya">
                                            Di edunovasi banyak banget fitur yang bisa diakses, seperti try out
                                            mingguan, latihan soal per subtes yang dilengkapi dengan pembahasan dan
                                            ranking nasional yang penilaiannya menggunakan IRT sesuai dengan standar
                                            LTMPT yang tersedia di website resmi edunovasi.com.
                                            <!-- edunovasi juga punya event lain yang membantu aku untuk lebih menyiapkan diri dalam menghadapi UTBK-SBMPTN 2022. -->
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 1 Saintek - Alfin Hoirul Alif.jpg" class="img-fluid img-thumbnail testi-image">
                                        </div>
                                        <div class="col-md-12 div-juara1 pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Alfin Hoirul Alif</div>
                                                <div class="col-md-12 testi-sekolah">SMAN 1 Probolinggo</div>
                                                <div class="col-md-12 testi-juara">Juara 1 TO SAINTEK Nasional Edunovasi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 text-center order-md-1">
                            <div class="card rounded-10 text-center" style="transform: scale(0.90);">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya">
                                            Soal soalnya sangat menantang dan mekanisme pengerjaan dan penilainannya
                                            sangat mirip dengan utbk yang sebenarnya. Setelah batas pengerjaan juga
                                            diberikan pembahasan soal untuk mereview kembali kesalahan dan kelemahan
                                            kita. Di akhir juga diberikan skor dan peringkat kita untuk membandingkan
                                            sudah seberapa jauh progres belajar kita.
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 2 Saintek - Galen Chandrawira.jpg" class="img-fluid img-thumbnail testi-image rounded-10">
                                        </div>
                                        <div class="col-md-12 div-juara pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Galen Chandrawira</div>
                                                <div class="col-md-12 testi-sekolah">SMA Zaverius Jambi</div>
                                                <div class="col-md-12 testi-juara">Juara 2 TO SAINTEK Nasional Edunovasi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 order-md-3">
                            <div class="card rounded-10 text-center" style="transform: scale(0.90);">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya pb-md-5 mb-md-4">
                                            Try Out edunovasi bagus banget soalnya hots, ada blocking time juga
                                            menyesuaikan UTBK
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 3 Saintek - Cleodylon R.jpg" class="img-fluid img-thumbnail testi-image">
                                        </div>
                                        <div class="col-md-12 div-juara pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Cleodylon R</div>
                                                <div class="col-md-12 testi-sekolah">SMAN 2 Surabaya</div>
                                                <div class="col-md-12 testi-juara">Juara 3 TO SAINTEK Nasional Edunovasi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item p-4">
                    <div class="row ">
                        <div class="col-md-12 mb-4 text-center ">
                            <h6 class="fw-bold">Juara TO SOSHUM NASIONAL Edunovasi.com</h6>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 order-md-2">
                            <div class="card rounded-10 text-center">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya">
                                            Tryout UTBK Edunovasi memberikan saya gambaran mengenai UTBK yg
                                            sesungguhnya, ketika saya mengerjakan UTBK pun tipe soalnya tidak jauh
                                            berbeda dengan Tryout yg saya kerjakan sehingga pembahasannya kewren dan
                                            membantu belajar, #ggwpEdunovasi
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 1 Soshum - Faiz Attaqi.jpg" class="img-fluid img-thumbnail testi-image">
                                        </div>
                                        <div class="col-md-12 div-juara1 pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Faiz Attaqi</div>
                                                <div class="col-md-12 testi-sekolah">MAN Insan Cendekia Pekalongan</div>
                                                <div class="col-md-12 testi-juara">Juara 1 TO SOSHUM Nasional Edunovasi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 text-center order-md-1">
                            <div class="card rounded-10 text-center" style="transform: scale(0.90);">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya">
                                            aku seneng deh ikut TO di edunovasi, aku bisa latihan dari soal2nya yang
                                            HOTS trus ada pembahasannya juga, dan aku pas ikut niatnya ga ada pengen
                                            menang cuma buat latihan aja eh ternyata dpt juara hehe, dan aku liat byk
                                            doorprize juga pokoknya klo TO di edunovasi bisa latsol sekalian dpt hadiah
                                            😆
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 2 Soshum - Syifa Azzahrah.jpg" class="img-fluid img-thumbnail testi-image rounded-10">
                                        </div>
                                        <div class="col-md-12 div-juara pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Syifa Azzahra Harahap</div>
                                                <div class="col-md-12 testi-sekolah">SMAI Nurul Fikri Serang</div>
                                                <div class="col-md-12 testi-juara">Juara 2 TO SOSHUM Nasional Edunovasi
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 my-md-auto my-2 order-md-3">
                            <div class="card rounded-10 text-center" style="transform: scale(0.90);">
                                <div class="card-body px-2 pt-3 pb-0">
                                    <div class="row">
                                        <div class="col-md-12 text-start mb-2">
                                            <i class="fa-solid fa-quote-left"></i>
                                        </div>
                                        <div class="col-md-12 testi-testinya py-md-4">
                                            TO Edunovasi ini bisa dibilang mirip sama soal UTBK, terutama bagian
                                            Penalaran Umum, membantu bangeeett!!
                                        </div>
                                        <div class="col-md-12 div-image">
                                            <img src="<?php echo $inc_; ?>/assets/img/testimoni/Juara 3 Soshum - Aleeja Sausanja.jpg" class="img-fluid img-thumbnail testi-image">
                                        </div>
                                        <div class="col-md-12 div-juara pt-5 pb-4">
                                            <div class="row g-1">
                                                <div class="col-md-12">Aleeja Sausanja Setiawan</div>
                                                <div class="col-md-12 testi-sekolah">SMAN 1 Cikarang Pusat</div>
                                                <div class="col-md-12 testi-juara">Juara 3 TO SOSHUM Nasional Edunovasi
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
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimoni" data-bs-slide="prev">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-left fs-1 text-dark"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimoni" data-bs-slide="next">
            <span class="" aria-hidden="true"><i class="fa-solid fa-angle-right fs-1 text-dark"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div id="tryout"></div>
    </div>

</section>


<section id="edunitas" style="margin-top:96px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-md-auto mt-2 mb-5">

                <div class="secondary-header">Ingin Karir Anda Meningkat ? Ingin Punya Pekerjaan & Gaji Lebih Baik dari
                    Saat ini ? </div>
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
                    <div class="ms-2">
                        Waktu Kuliah Fleksibel ( Ada Kelas Online / Kuliah dari Rumah )
                    </div>
                </div>

                <div class="secondary-paragraph d-flex">
                    <img src="<?php echo $inc_; ?>/assets/img/ceklis-edunitas.svg" alt="">
                    <div class="ms-2">
                        Tersedia Banyak Pilihan Program Studi/Jurusan Favorit D3, S1, S2
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center text-md-start my-3 mb-md-1">
                        <a href="https://edunitas.com/educampus" target="_blank" class="btn bg-oren w-100">Klik di
                            Sini</a>
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
                <div class="row g-3 mb-4" id="divnews">

                </div>
            </div>
        </div>

    </div>
</section>


<?php
// if ($sesi['email'] == 'rfahrezi659@gmail.com') {
?>
<?php

if ($dataratingtesti != '') {
?>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5" style="font:normal normal bold 24px/33px Open Sans ;">Review dan Rating</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme px-5">
                        <?php
                        foreach ($dataratingtesti as $value) {
                        ?>
                            <div class="item shadow-sm">
                                <div class="card border-0 w-100" style="height:300px;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <img src="https://file.edunitas.com/assets/profile/img/md/defuser.png" alt="" class="rounded-circle img-fluid me-3" style="width: 30px;height:30px;">
                                            <div><?php echo $value['nama']; ?></div>
                                        </div>
                                        <?php
                                        $var = $value['bintang'];
                                        if ($var == '10') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '9') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '8') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '7') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '6') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '5') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '4') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '3') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '2') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        } elseif ($var == '1') {
                                        ?>
                                            <div class="my-3">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                                <i class="fa-regular fa-star text-warning"></i>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="fst-italic" style="text-align: justify;"><?php echo $value['saran']; ?></div>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>


<?php
// }
?>




<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script> -->

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

    $('.owl-carousel').owlCarousel({
        margin: 10,
        nav: true,
        loop: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });

    $(".owl-prev ").html('<i class="fa fa-chevron-left"></i>');
    $(".owl-next ").html('<i class="fa fa-chevron-right"></i>');

    loadedunews();
    // form_reviews()

    function loadedunews() {

        var jsondata = JSON.stringify({
            format: "json",
            formdata_getlist: "listnews",
            formdata_origin: "list",
            formdata_length: "4",
            formdata_filterkategori: 'edunovasi',
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
											<img src="` + cover + `" class="img-fluid" style="width:100%;height:164px; object-fit:cover" alt="${decodeHtml(news.title_long)}">
									</div>
									<div class="p-3 position-relative">
										<div class="list-card-body">
											<h6 class="mb-1 fw-bold" style="min-height:40px">
												<a target="_blank" href="https://edunitas.com/edunews/detail/` + linknews.replace(/=/g, "") + `" class="text-decoration-none fw-bold">
												` + decodeHtml(news.title_long) + `
												</a>
											</h6>
											
										</div>
									</div>
								</div>
							</div>
							`;
                        // <hr>
                        // 	<p class="text-gray time d-flex">
                        // 		<span class="rounded-sm p-2">
                        // 			<span class="text-secondary small"><img class="img-fluid mb-1 me-2" src="assets/ic/date_biru.svg">${ news.dibuat }</span>
                        // 			</span> 
                        // 		<span class="card-text ms-auto p-1"></span>
                        // 	</p>
                    });
                    $('#divnews').append(isi);
                    $('#divnews').append(`
                    
                    <div class="col-md-4">
                        <div class="list-card bg-white h-100 rounded-3 overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <img src="./assets/img/lowongan-kerja-edunitas.jpg" class="img-fluid" style="width:100%;height:164px; object-fit:cover" alt="Lowongan Kerja Edunitas">
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1 fw-bold" style="min-height:40px">
                                        <a target="_blank" href="https://edunitas.com/lowongan-kerja" class="text-decoration-none fw-bold">Lowongan Kerja Terbaru 2022</a>
                                    </h6>
                                    <!-- <hr>
									<p class="text-gray time d-flex">
										<span class="rounded-sm p-2">
											<span class="text-secondary small"><img class="img-fluid mb-1 me-2" src="assets/ic/date_biru.svg">10 Jun 2022</span>
										</span>
										<span class="card-text ms-auto p-1"></span>
									</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="list-card bg-white h-100 rounded-3 overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <img src="./assets/img/kuliah-edunitas.jpg" class="img-fluid" style="width:100%;height:164px; object-fit:cover" alt="Kuliah Edunitas">
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1 fw-bold" style="min-height:40px">
                                        <a target="_blank" href="https://edunitas.com/kuliah" class="text-decoration-none fw-bold">Cara Investasi Kuliah</a>
                                    </h6>

                                    <!-- <hr>
									<p class="text-gray time d-flex">
										<span class="rounded-sm p-2">
											<span class="text-secondary small"><img class="img-fluid mb-1 me-2" src="assets/ic/date_biru.svg">10 Jun 2022</span>
										</span>
										<span class="card-text ms-auto p-1"></span>
									</p> -->
                                </div>
                            </div>
                        </div>
                    </div>`);

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
                window.location.href = "<?php echo $inc_ ?>/latihan";
            }
        })
    }

    // function form_reviews() {
    //     $("#form-testimoni").validate({
    //         rules: {
    //             email: {
    //                 required: true,
    //             },
    //             saran: {
    //                 required: true,
    //             },
    //             bintang: {
    //                 required: true,
    //             }
    //         },
    //         messages: {
    //             email: 'isi email dengan benar !',
    //             saran: 'mohon isi saran dan masukan anda !',
    //             bintang: 'jangan lupa bintangnya'
    //         },
    //     });

    //     $('#form-testimoni').submit(function(e) {
    //         // alert('oke');
    //         e.preventDefault();
    //         // e.stopImmediatePropagation();
    //         var json = {
    //             email: $("#txtEmail").val(),
    //             saran: $("#text_saran").val(),
    //             bintang: $('input[name="bintang"]').val()
    //             // phone: $("#id-phone").val()
    //         }
    //         console.log(json);


    //         if ($('#form-testimoni').valid()) {

    //             $.ajax({
    //                 url: 'https://backend.edunovasi.com/api_mobile/api_testimoni/simpan',
    //                 type: 'POST',
    //                 crossDomain: true,
    //                 dataType: 'json',
    //                 contentType: 'application/json',
    //                 cache: false,
    //                 processData: false,
    //                 success: function(res) {
    //                     console.log(res);
    //                     if (res.status == '200') {
    //                         // if (res.message == 'sukses') {
    //                         Swal.fire({
    //                             title: 'Sukses',
    //                             width: 600,
    //                             html: "Data testimoni sudah berhasil terkirim !",
    //                             icon: 'success',
    //                         }).then((result) => {
    //                             window.location.reload();
    //                         })

    //                         $("#btn_testimoni").html("Kirim Testimoni");
    //                     } else {
    //                         Swal.fire({
    //                             title: 'Gagal',
    //                             width: 600,
    //                             html: "Data testimoni gagal terkirim pastikan kondisi jaringan stabil !",
    //                             icon: 'success',

    //                         }).then((result) => {
    //                             window.location.reload();
    //                         })
    //                     }

    //                 },
    //                 data: JSON.stringify(json),

    //                 error: function(res) {
    //                     Swal.fire({
    //                         title: 'Gagal',
    //                         width: 600,
    //                         html: "Pastikan email belum terdaftar sebelumnya dan kondisi jaringan stabil !",
    //                         icon: 'success',

    //                     }).then((result) => {
    //                         window.location.reload();
    //                     })
    //                 }

    //             })
    //         }

    //     })
    // }
</script>