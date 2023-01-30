<?php

$active_event = 'collapsed';
$event_history = '';
if ($arr_urinya[3] == 'event' && $arr_urinya[4] == 'history') {
    $active_event = 'show';
    $event_history = 'bg-primary rounded';
}
$event_ranking = '';
if ($arr_urinya[3] == 'event' && $arr_urinya[4] == 'ranking') {
    $active_event = 'show';
    $event_ranking = 'bg-primary rounded';
}


$active_mandiri = 'collapsed';
$mandiri_history = '';
if ($arr_urinya[3] == 'mandiri' && $arr_urinya[4] == 'history') {
    $active_mandiri = 'show';
    $mandiri_history = 'bg-primary rounded';
}
$mandiri_ranking = '';
if ($arr_urinya[3] == 'mandiri' && $arr_urinya[4] == 'ranking') {
    $active_mandiri = 'show';
    $mandiri_ranking = 'bg-primary rounded';
}


$active_skd = 'collapsed';
$skd_history = '';
if ($arr_urinya[3] == 'skd' && $arr_urinya[4] == 'history') {
    $active_skd = 'show';
    $skd_history = 'bg-primary rounded';
}
$skd_ranking = '';
if ($arr_urinya[3] == 'skd' && $arr_urinya[4] == 'ranking') {
    $active_skd = 'show';
    $skd_ranking = 'bg-primary rounded';
}


$active_latihan = 'collapsed';
$latihan_history = '';
if ($arr_urinya[3] == 'latihan' && $arr_urinya[4] == 'history') {
    $active_latihan = 'show';
    $latihan_history = 'bg-primary rounded';
}


$active_akun = 'collapsed';
$akun_profil = '';
if ($arr_urinya[3] == 'akun' && $arr_urinya[4] == 'profil') {
    $active_akun = 'show';
    $akun_profil = 'bg-primary rounded';
}
$akun_password = '';
if ($arr_urinya[3] == 'akun' && $arr_urinya[4] == 'password') {
    $active_akun = 'show';
    $akun_password = 'bg-primary rounded';
}

$connect_to_school = '';
if ($arr_urinya[3] == 'akun' && $arr_urinya[4] == 'connect_to_school') {
    $active_akun = 'show';
    $connect_to_school = 'bg-primary rounded';
}


$active_sekolah = 'collapsed';
$sekolah_history = '';
if ($arr_urinya[3] == 'sekolah' && $arr_urinya[4] == 'history') {
    $active_sekolah = 'show';
    $sekolah_history = 'bg-primary rounded';
}
$sekolah_ranking = '';
if ($arr_urinya[3] == 'sekolah' && $arr_urinya[4] == 'ranking') {
    $active_sekolah = 'show';
    $sekolah_ranking = 'bg-primary rounded';
}










?>
<style>
    body {
        min-height: 100 vh;
        /* min-height: -webkit-fill-available; */
        /* min-height: -moz-available; */
        min-height: fill-available;

    }

    html {
        /* height: -webkit-fill-available; */
        /* height: -moz-available; */
        height: fill-available;

    }

    #sec-dashboard {
        display: flex;
        flex-wrap: nowrap;
        height: 100vh;
        /* height: -webkit-fill-available; */
        /* height: -moz-available; */
        height: fill-available;
        max-height: 100vh;
        overflow-x: auto;
        overflow-y: hidden;
        background-color: #003049;
    }

    #sec-dashboard a {
        color: #003049 !important;
    }

    .list-unstyled li {
        background: #EAEAEA 0% 0% no-repeat padding-box;
        border-radius: 24px 0px 0px 24px;
    }


    .btn-toggle {
        display: inline-flex;
        align-items: center;
        padding: .7rem;
        /* color: rgba(0, 0, 0, .65); */
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 0.65px;
        color: #2C2731;
        background-color: transparent;
        border: 0;
    }

    .btn-toggle:hover,
    .btn-toggle:focus {
        /* color: rgba(0, 0, 0, .85);
        background-color: #d2f4ea; */
    }

    .btn-toggle::before {
        width: 1.55em;
        /* line-height: 1.1; */
        content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
        transition: transform .35s ease;
        transform-origin: .5em 50%;
    }

    .btn-toggle[aria-expanded="true"] {
        color: rgba(0, 0, 0, .85);
    }

    .btn-toggle[aria-expanded="true"]::before {
        transform: rotate(90deg);
    }

    .btn-toggle-nav a {
        display: inline-flex;
        padding: .1875rem .5rem;
        margin-top: .125rem;
        margin-left: 1.25rem;
        text-decoration: none;
    }

    .btn-toggle-nav a:hover,
    .btn-toggle-nav a:focus {
        background-color: #d2f4ea;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #fff !important;
        border-bottom: 4px solid #003049;
        font: normal normal bold 18px/24px Open Sans !important;
        letter-spacing: 0px;
        color: #0D0D0D !important;
    }

    .nav-link {
        font: normal normal bold 18px/24px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    .card {
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
    }

    .card-header {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .click {
        cursor: pointer;
    }

    @media only screen and (min-width: 800px) {
        .divpilihmenu {
            max-height: 65vh;
            overflow-y: scroll;
        }

        .divpembahasan {
            max-height: 65vh;
            overflow-y: scroll;
        }
    }

    @media only screen and (max-width: 799px) {
        .divpilihmenu {
            max-height: 18vh;
            overflow-y: scroll;
            border: 1px solid #eee;
            border-radius: 12px;
        }

        .divpembahasan {
            max-height: 55vh;
            overflow-y: scroll;
            border: 1px solid #eee;
            border-radius: 12px;
        }

        #sec-dashboard {
            left: 0px;
            top: 50px;

        }

    }

    .bg-nilai {
        background-color: #EAE2B7 !important;
    }
</style>
<section>
    <div class="container-fluid ps-0">
        <div class="row position-relative">
            <div class="col-md-2 pe-0 sticky-top d-none d-md-block" id="sec-dashboard">

                <div class="flex-shrink-0 pb-3 pt-1 px-md-0 w-100">
                    <a href="/" class="d-flex align-items-center ps-4 py-2 mb-3 text-white text-decoration-none border-bottom bg-light">
                        <img src="<?php echo $sesi['foto'] ?>" width="25" height="25" class="rounded-circle me-2" onerror="this.onerror=null;this.src='<?php echo $inc_ ?>/assets/img/blank-profile.jpg'">
                        <span class="fs-6 fw-semibold"><?php echo $sesi['nama'] ?></span>
                    </a>
                    <ul class="list-unstyled ps-4">
                        <!-- <li class="mb-1">
                            <a class="btn align-items-end rounded fw-bold ps-md-3">
                                Home
                            </a>
                        </li> -->
                        <li class="mb-1">
                            <a class="btn btn-toggle align-items-end rounded <?php echo $active_event ?>" data-bs-toggle="collapse" data-bs-target="#event-collapse" aria-expanded="false">
                                UTBK
                            </a>
                            <div class="collapse <?php echo $active_event ?>" id="event-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                    <li><a class="<?php echo $event_history ?>" href="<?php echo $inc_ ?>/dashboard/event/history">HISTORY</a></li>
                                    <li><a class="<?php echo $event_ranking ?>" href="<?php echo $inc_ ?>/dashboard/event/ranking">RANKING</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <a class="btn btn-toggle align-items-end rounded <?php echo $active_latihan ?>" data-bs-toggle="collapse" data-bs-target="#latihan-collapse" aria-expanded="false">
                                LATIHAN
                            </a>
                            <div class="collapse <?php echo $active_latihan ?>" id="latihan-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                    <li><a class="<?php echo $latihan_history ?>" href="<?php echo $inc_ ?>/dashboard/latihan/history">HISTORY</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <a class="btn btn-toggle align-items-end rounded <?php echo $active_skd ?>" data-bs-toggle="collapse" data-bs-target="#skd-collapse" aria-expanded="false">
                                SKD KEDINASAN
                            </a>
                            <div class="collapse <?php echo $active_skd ?>" id="skd-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                    <li><a class="<?php echo $skd_history ?>" href="<?php echo $inc_ ?>/dashboard/skd/history">HISTORY</a></li>
                                    <li><a class="<?php echo $skd_ranking ?>" href="<?php echo $inc_ ?>/dashboard/skd/ranking">RANKING</a></li>
                                </ul>
                            </div>
                        </li>
                        <? php // if ($sesi['email'] == 'daniyal.hafidz@gmail.com') { 
                        ?>
                        <li class="mb-1">
                            <a class="btn btn-toggle align-items-end rounded <?php echo $active_mandiri ?>" data-bs-toggle="collapse" data-bs-target="#mandiri-collapse" aria-expanded="false">
                                UJIAN MANDIRI
                            </a>
                            <div class="collapse <?php echo $active_mandiri ?>" id="mandiri-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                    <li><a class="<?php echo $mandiri_history ?>" href="<?php echo $inc_ ?>/dashboard/mandiri/history">HISTORY</a></li>
                                    <li><a class="<?php echo $mandiri_ranking ?>" href="<?php echo $inc_ ?>/dashboard/mandiri/ranking">RANKING</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php //} 
                        ?>

                        <?php if ($sesi['id_sekolah'] > 0) { ?>

                            <li class="mb-1">
                                <a class="btn btn-toggle align-items-end rounded <?php echo $active_sekolah ?>" data-bs-toggle="collapse" data-bs-target="#sekolah-collapse" aria-expanded="false">
                                    SEKOLAH
                                </a>
                                <div class="collapse <?php echo $active_mandiri ?>" id="sekolah-collapse" style="">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                        <li><a class="<?php echo $sekolah_history ?>" href="<?php echo $inc_ ?>/dashboard/sekolah/history">HISTORY</a></li>
                                        <li><a class="<?php echo $sekolah_ranking ?>" href="<?php echo $inc_ ?>/dashboard/sekolah/ranking">RANKING</a></li>
                                    </ul>
                                </div>
                            </li>

                        <?php } ?>


                        <li class="mb-1">
                            <a class="btn btn-toggle align-items-end rounded <?php echo $active_akun ?>" data-bs-toggle="collapse" data-bs-target="#akun-collapse" aria-expanded="false">
                                AKUN
                            </a>
                            <div class="collapse <?php echo $active_akun ?>" id="akun-collapse" style="">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                                    <li><a class="<?php echo $akun_profil ?>" href="<?php echo $inc_ ?>/dashboard/akun/profil">PROFIL</a></li>
                                    <li><a class="<?php echo $akun_password ?>" href="<?php echo $inc_ ?>/dashboard/akun/password">PASSWORD</a></li>

                                    <?php if ($sesi['id_sekolah'] == 0) { ?>
                                        <li><a class="<?php echo $connect_to_school ?>" href="<?php echo $inc_ ?>/dashboard/akun/connect_to_school">CONNECT TO SCHOOL</a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-10">
                <div class="row bg-oren px-2 sticky-top" style="height:48px">
                    <div class="col-md-3 col my-auto fs-6 fw-bold">
                        <a href="<?php echo $inc_ ?>" class="text-white" style="text-decoration:none">
                            <img src="<?php echo $inc_; ?>/assets/ic/edunovasi-logo-baru.png" class="img-fluid" style="height:30px; width:120px;">
                        </a>
                    </div>
                    <div class="col-md-9 col-2 bg-oren my-auto text-end">
                        <a href="<?php echo $inc_ ?>/logout" class="text-primary" style="text-decoration:none">
                            <i class="fas fa-sign-out ps-3"></i>
                        </a>
                    </div>
                    <div class="col-1 bg-oren my-auto text-end d-block d-md-none">
                        <a onclick="showhidemenu()" class="text-primary" style="text-decoration:none">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    <script>
                        function showhidemenu() {
                            $("#sec-dashboard").toggleClass("d-none d-md-block");
                            $("#sec-dashboard").toggleClass("position-absolute");
                        }
                    </script>
                </div>
                <div class="row px-2 py-4">
                    <div class="col-md-12 small text-uppercase">
                        <?php echo $arr_urinya['3'] ?> <i class="fas fa-chevron-right mx-2"></i> <?php echo $arr_urinya['4'] ?>
                    </div>
                </div>