<?php
$ccid = $arr_urinya[4];
if ($sesi['id_peserta'] == '') {
    echo "<script>window.location.href = '" . $inc_ . "/event/detail/" . $ccid . "'</script>";
    exit;
}


$tgl_mulai = date("Y-m-d H:i:s");

$event_id = base64_decode($ccid);

$getcurl_event = getcurl($base_api . 'detail/' . $ccid);
if (!$getcurl_event) {
    exit;
} else {
    $dataevent = $getcurl_event;
}
// eduprint($dataevent);

$getcurl_soal = getcurl($base_api . 'soal_event/' . $ccid);
if (!$getcurl_soal["listdata"]) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datasoal = $getcurl_soal["listdata"]["datanya"];
}
// eduprint($getcurl_soal, 1);


?>
<style>
    body {
        background-color: #fff !important;
    }

    .title {
        font: normal normal bold 24px/33px Open Sans;
        letter-spacing: 0px;
        color: #111111;
    }

    .subtitle {
        font: normal normal normal 19px/26px Open Sans;
        letter-spacing: 0px;
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

    #divsoal {
        font-size: 10px;
    }

    .jawaban {
        border-radius: 50px;
        cursor: pointer;
        border: solid 1px #ffce00;
        font-size: 16px;
        color: #000000 !important;
    }

    .jawaban:hover {
        border: solid 1px #FCBF49;
        background-color: #FCBF49 !important;
        color: #000000 !important;
    }


    .countdown {
        text-transform: uppercase;
        font-weight: bold;
    }


    @media only screen and (min-width: 800px) {
        .tinggivh-soal {
            height: 60vh !important;
        }

        .tinggivh-jawaban {
            height: 60vh !important;
        }

        .countdown span {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 1.8rem;
        }

        .countdown small {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 12px;
        }

        .soalke_label {
            font: normal normal normal 20px Open Sans;
            letter-spacing: 0px;
            color: #111111;
        }

        .soalke {
            font: normal normal bold 20px Open Sans;
            letter-spacing: 0px;
            color: #003049;
        }
    }

    @media only screen and (max-width: 799px) {
        .tinggivh-soal {
            height: 18vh !important;
        }

        .tinggivh-jawaban {
            height: 36vh !important;
        }

        .countdown span {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }

        .countdown small {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 10px;
        }

        .soalke_label {
            font: normal normal normal 18px Open Sans;
            letter-spacing: 0px;
            color: #111111;
        }

        .soalke {
            font: normal normal bold 16px Open Sans;
            letter-spacing: 0px;
            color: #003049;
        }
    }


    .daftarsoal .nav-link {
        display: block;
        padding: 8px !important;
        color: #111111;
        text-decoration: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #707070 !important;
        /* border-radius: 24px; */
    }

    .daftarsoal .nav-pills .nav-link.active,
    .daftarsoal .nav-pills .show>.nav-link {
        color: #000;
        background-color: #F77F00 !important;
    }

    .daftarsoal .nav-link:active {
        background-color: #F77F00 !important;
    }


    .cardsoal {
        border: 1px solid #707070;
        border-radius: 8px;
        font: normal normal normal 16px Open Sans;
        letter-spacing: 0px;
        color: #111111;
    }

    .daftarsoal {
        background: #EEEEEE 0% 0% no-repeat padding-box;
        border: 1px solid #707070;
        border-radius: 8px;
    }

    .btnnext {
        background: #003049 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 24px;
        color: white;
    }

    .btnnext:hover {
        background: #002038 0% 0% no-repeat padding-box;
        color: white;
    }


    .btnnext {
        background: #003049 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 24px;
        color: white;
    }

    .btnnext:hover {
        background: #002038 0% 0% no-repeat padding-box;
        color: white;
    }


    .btnprev {
        background: #003049 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 24px;
        color: white;
    }

    .btnprev:hover {
        background: #002038 0% 0% no-repeat padding-box;
        color: white;
    }

    .btnselesai {
        font: normal normal bold 22px Open Sans;
        letter-spacing: 0px;
        color: #F8F8F8;

    }

    .text-merah {
        color: #F60000;
    }

    @media only screen and (min-width: 800px) {
        .tinggivh-soal {
            height: 60vh !important;
        }

        .tinggivh-jawaban {
            height: 60vh !important;
        }
    }

    @media only screen and (max-width: 799px) {
        .tinggivh-soal {
            height: 20vh !important;
        }

        .tinggivh-jawaban {
            height: 40vh !important;
        }
    }
</style>

<section class="section pt-5 pb-5" id="soal-loading">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <div class="my-4 fs-4 edu-text-primary">Mohon tunggu ...<br>Sedang memuat soal</div>
                <img class="img-fluid" src="<?php echo $inc_ ?>/assets/ic/tryout-edunitas.jpg" style="max-height: 400px">
                <div class="my-4">
                    <span class="spinner-grow text-warning spinner-grow-md mx-1"></span><span class="spinner-grow text-primary spinner-grow-md mx-1"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-2" id="soal-mulai" style="display:none">
    <div class="container-fluid px-md-4">
        <div class="row g-3">
            <div class="col-md-9 col-8 my-auto pt-4">
                <div class="row">
                    <div class="col-md-12 text-md-start fs-5 text-primary fw-bold">
                        <?php echo $_SESSION['userdata']['nama'] ?>
                    </div>
                    <div class="col-md-12 text-md-start fs-6">
                        <?php echo $dataevent['judul'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-4 my-auto pt-4">
                <div class="row countdown text-center fw-bold">

                    <div class="col-md-12">
                        <div class="row g-1 justify-content-end" id="countdown">
                            <!-- <div class="col"><span id="countjam">0</span><br><small>JAM</small></div>
                            <div class="col-1 my-auto h2">:</div> -->
                            <div class="col-md-2 col-4"><span id="countmenit">0</span><br><small>menit</small></div>
                            <div class="col-1 my-auto h2">:</div>
                            <div class="col-mds-2 col-4"><span id="countdetik">0</span><br><small>detik</small></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 my-1">

                <?php
                $jsonsoal = array();
                $jsonurutan = array();
                $no = 0;
                foreach ($datasoal as $key => $val) {
                    $mid = base64_decode($val['materi_id']);
                ?>
                    <div class="divsoal" id="soal-<?php echo $mid ?>" style="display:<?php echo $no > 0 ? 'none' : ''; ?>">
                        <!-- <h4 class="card-title fw-bold mb-3"></h4> -->
                        <div class="row">
                            <div class="col order-md-1" id="soal">
                                <div class="row position-relative">
                                    <div class="col-12">
                                        <div class="tab-content" id="pills-tabContent">

                                            <?php
                                            $arrsoal = array();
                                            $arrsoal['materi_id'] = $val['materi_id'];
                                            foreach ($datasoal[$key]['datanya'] as $k => $v) {

                                                $arrsoal["ans_" . $v['no']] = array("soal" => $v['no'], "jawaban" => "0");

                                                $active = '';
                                                if ($k == 0) {
                                                    $active = 'show active';
                                                }
                                            ?>
                                                <div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $k . $mid ?>" role="tabpanel" aria-labelledby="pills-<?php echo $k . $mid ?>-tab">
                                                    <div class="row my-2">
                                                        <div class="col-md-7 col-9 my-auto fw-bold fs-md-4 fs-5 text-start"><?php echo $val['materi_nama'] ?></div>
                                                        <div class="col-md-5 col-3 my-auto text-end">
                                                            <span class="soalke_label d-none d-md-inline-flex">Soal Ke :</span> <span class="soalke"><?php echo $k + 1 ?> / <?php echo  $val["totaldata"] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="card tinggivh-jawaban" style="overflow-y:scroll;">
                                                        <div class="card-body">
                                                            <div class="row g-2 mb-2">
                                                                <div class="col-md-12 mb-3">
                                                                    <?php
                                                                    if ($v['img'] != '') {
                                                                        echo '<img class="img-fluid mb-4" src="' . $v['img'] . '"><br>';
                                                                    }
                                                                    ?>
                                                                    <?php echo ubahkotak(nl2br($v['pertanyaan'])); ?>
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
                                                                                <?php echo $abcd ?>
                                                                            </div>
                                                                            <div class="col my-auto">
                                                                                <?php
                                                                                if ($vp['type'] == 'gambar') {
                                                                                    echo '<img src="' . $vp['name'] . '">';
                                                                                } else {
                                                                                    echo ubahkotak(ubahtag($vp['name']));
                                                                                }
                                                                                ?>
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
                                                                <div class="col-md-7 my-auto">
                                                                    <div class="row g-2 ms-2">
                                                                        <div class="col-md-3">Pilih Jawaban : </div>
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
                                                                            <div class="col-1 my-auto text-center mx-1">
                                                                                <div class="card jawaban <?php echo 'ans_' . $v['no'] . '_' . $mid ?>" style="width:35px; height:35px" id="<?php echo 'ans_' . $v['no'] . '_' . $vp['code'] . '_' . $mid ?>" onclick="jawabsoal('<?php echo 'ans_' . $v['no'] ?>','<?php echo $vp['code'] ?>','<?php echo $k ?>','<?php echo $mid ?>','<?php echo $no ?>')">
                                                                                    <div class="card-body p-1">
                                                                                        <?php echo $abcd ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <div class="col-2 my-auto text-center ms-2">
                                                                            <button class="btn btn-danger px-4" onclick="raguragu('<?php echo $k; ?>','<?php echo $mid ?>')">Tandai</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5 text-end my-md-auto mt-2">
                                                                    <?php if (($k + 1) > 1) { ?>
                                                                        <button class="btn btnprev" onclick="$('#pills-<?php echo ($k - 1) . $mid ?>-tab').click()"><i class="fas fa-chevron-left"></i></button>
                                                                    <?php } ?>
                                                                    <?php if (($k + 1) < $val["totaldata"]) { ?>
                                                                        <button class="btn btnnext" onclick="$('#pills-<?php echo ($k + 1) . $mid ?>-tab').click()"><i class="fas fa-chevron-right"></i></button>
                                                                    <?php } ?>
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
                            <div class="col-md-3 small bg-white order-md-2 py-md-5 py-3 px-4 px-md-2 mt-md-0 mt-3" id="soalright">
                                <div class="row position-relative">
                                    <div class="col-12 p-3 daftarsoal tinggivh-soal position-relative" style="overflow-y:scroll;">
                                        <div class="row">
                                            <div class="col-md-5 col-5 fs-6 fw-bold mb-3 edu-text-primary">
                                                Daftar Soal
                                            </div>
                                            <div class="col-md-7 col-7 text-end pt-2" style="font-size:x-small">
                                                <span class="bg-warning mx-2 rounded px-2">&nbsp;</span>Terjawab
                                                <span class="bg-danger mx-2 rounded px-2">&nbsp;</span>Ditandai
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="nav nav-pills row row-cols-5 g-2 text-center" id="pills-tab" role="tablist">
                                                    <?php for ($i = 0; $i < $val["totaldata"]; $i++) {

                                                        $active = '';
                                                        if ($i == 0) {
                                                            $active = 'active';
                                                        }
                                                    ?>
                                                        <li class="nav-item col p-1" role="presentation">
                                                            <button class="nav-link text-center mx-auto w-100 <?php echo $active ?>" id="pills-<?php echo $i . $mid ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $i . $mid ?>" type="button" role="tab" aria-controls="pills-<?php echo $i . $mid ?>" aria-selected="true"><?php echo ($i + 1) ?></button>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="button" onclick="tanyalanjut('<?php echo $no; ?>')" class="btn btn-sm btn-primary w-100 btnselesai">
                                            Lanjut Sesi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $jsonurutan[$no]["materi"] = $mid;
                    $jsonurutan[$no]["waktu"] = $val['waktu'];
                    $jsonurutan[$no]["totaldata"] = $val['totaldata'];
                    $jsonurutan[$no]["terjawab"] = array("total" => 0);
                    $jsonurutan[$no]["next"] = ($no + 1);
                    $no++;
                }
                $jsonurutan["totaldata"] = $no;
                $jsonsoal["event"] = $event_id;
                $jsonsoal = json_encode($jsonsoal);
                $jsonurutan = json_encode($jsonurutan);
                ?>

            </div>
            <!-- <div class="col-md-6 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" onclick="selesai()" class="btn btn-lg btn-sm btn-success w-100 btnbelum">Selesai</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="window.location.href = 'ranking'" class="btn btn-lg btn-sm btn-warning w-100 btnselesai" disabled>Lihat Hasil</button>
                    </div>
                </div>
            </div> -->
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


<!-- BUAT NODE -->

<script>
    $(window).bind('beforeunload', function(e) {

        e.preventDefault();
        Swal.fire({
            title: 'Konfirmasi',
            width: 600,
            html: "aw",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Selesai',
            cancelButtonText: 'Kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('#countdown').removeClass("text-danger");
            }
        })
    });
    // window.addEventListener('beforeunload', function(e) {
    //     e.preventDefault();
    //     e.returnValue = '';
    //     removeEventListener(window, "beforeunload");

    //     // window.alert = function(text) {
    //     //     console.log('tried to alert: ' + text);
    //     //     return true;
    //     // };
    //     // $("#dialog").dialog('close');
    //     Swal.fire({
    //         title: 'Konfirmasi',
    //         width: 600,
    //         html: "aw",
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Ya, Selesai',
    //         cancelButtonText: 'Kembali',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $('#countdown').removeClass("text-danger");
    //         }
    //     })

    //     return false;
    // });

    // function removeListenersFromElement(element, listenerType) {
    //     const listeners = getEventListeners(element)[listenerType];
    //     let l = listeners.length;
    //     for (let i = l - 1; i >= 0; i--) {
    //         removeEventListener(listenerType, listeners[i].listener);
    //     }
    // }
    // window.addEventListener("beforeunload", function(e) {
    //     var confirmationMessage = "\o/";

    //     (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    //     return confirmationMessage; //Webkit, Safari, Chrome
    // });

    var is_mulai = 0;
    var detik = 0;
    var menit = 0;
    var jam = 0;
    var itungjalan;
    var indexterpilih = 0;

    var jsonsoal = '<?php echo $jsonsoal; ?>';
    jsonsoal = JSON.parse(jsonsoal);
    console.log(jsonsoal);


    var jsonurutan = '<?php echo $jsonurutan; ?>';
    jsonurutan = JSON.parse(jsonurutan);
    console.log(jsonurutan);

    $(document).ready(function() {

        // Buat larang back sama refresh tombol
        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
        /* jQuery < 1.7 */
        $(document).bind("keydown", disableF5);
        /* OR jQuery >= 1.7 */
        $(document).on("keydown", disableF5);
        // Buat larang back sama refresh tombol


        $("#soal-loading").attr('style', 'display:none');
        $("#soal-mulai").attr('style', '');
        mulai(Object.keys(jsonurutan)[0]);
        /**
         * Membuat function hitung() sebagai Penghitungan Waktu
         */
        /** Menjalankan Function Hitung Waktu Mundur */
    });

    function disableF5(e) {
        if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault();
    };


    function showmateri(kodenya) {
        $("#modal-" + kodenya).modal('show');
    }

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

    function mulai(indexnya) {
        indexterpilih = indexnya;

        var totalMinutes = (jsonurutan[indexterpilih].waktu);
        // var totalMinutes = (90);
        var hours = 0;
        var minutes = totalMinutes;
        // console.log(totalMinutes);
        // var hours = Math.floor(totalMinutes / 60);
        // var minutes = totalMinutes % 60;

        is_mulai = 0;
        detik = 0;
        menit = minutes;
        jam = hours;


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

        /** Jika waktu kurang dari 5 menit maka Timer akan berubah menjadi warna merah */
        if (menit < 5 && jam == 0) {
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
                    lanjutmaterilain(indexterpilih);
                }
            }
        }
    }

    function tanyalanjut(indexnext) {
        console.log(parseInt(indexnext) + 1, jsonurutan['totaldata']);
        let pertanyaanbuka = 'Waktu masih tersisa untuk cek ulang jawaban<br>';
        if (jsonurutan[indexnext].terjawab.total < jsonurutan[indexnext].totaldata) {
            pertanyaanbuka = 'Beberapa soal masih belum terjawab, dan waktu masih tersisa.<br>';
        }

        let pertanyaantutup = 'Apakah kamu yakin ingin menyelesaikan soal di sesi ini ?';
        if (parseInt(indexnext) + 1 == jsonurutan['totaldata']) {
            pertanyaantutup = 'Apakah kamu yakin ingin menyelesaikan try out ini';
        }

        Swal.fire({
            title: 'Konfirmasi',
            width: 600,
            html: pertanyaanbuka + pertanyaantutup,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Selesai',
            cancelButtonText: 'Kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $('#countdown').removeClass("text-danger");
                lanjutmaterilain(indexnext);
            }
        })
    }

    function lanjutmaterilain(indexnext) {
        clearTimeout(itungjalan);
        let materi_now = jsonurutan[indexnext].materi;
        let materi_next = jsonurutan[indexnext].next;

        if (materi_next == jsonurutan.totaldata) {

            let timerInterval
            Swal.fire({
                title: 'Ujian telah selesai',
                html: 'Memproses jawaban kamu, tunggu beberapa saat ...',
                timer: 5000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                selesai();
            })

        } else {

            let timerInterval
            Swal.fire({
                title: 'Pergantian Materi',
                html: 'Materi akan berganti dalam beberapa saat ...',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    $("#soal-" + materi_now).hide();
                    mulai(Object.keys(jsonurutan)[materi_next]);
                    $("#soal-" + jsonurutan[materi_next].materi).fadeIn();
                    if (parseInt(materi_next) + 1 == jsonurutan['totaldata']) {
                        $(".btnselesai").html("Tutup Sesi");
                    }
                }
            })

        }
    }

    function selesai() {

        clearTimeout(itungjalan);
        let jsondata = JSON.stringify(jsonsoal);
        console.log(jsondata);

        $.ajax({
            url: '<?php echo $base_api ?>jawaban_event',
            type: 'POST',
            crossDomain: true,
            data: {
                "res": jsondata,
                "email": "<?php echo $sesi['email'] ?>",
                "id_peserta": "<?php echo $sesi['id_peserta'] ?>",
                "tgl_mulai": "<?php echo $tgl_mulai ?>"
            },
            dataType: 'json',
            success: function(res) {
                window.location.href = "<?php echo $inc_ ?>/event/hasil/<?php echo $arr_urinya[4]; ?>";
                // $(".btnbelum").attr("disabled", true);
                // $(".btnselesai").attr("disabled", false);
                // $(".btnkerjakan").attr("style", "opacity:0.2");
                // $(".btnkerjakan").attr("onclick", "");
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

    function raguragu(kodebtn, materi) {
        $('#pills-' + kodebtn + materi + "-tab").removeClass('bg-primary');
        $('#pills-' + kodebtn + materi + "-tab").addClass('bg-danger text-white');
        $('#pills-' + (parseInt(kodebtn) + 1) + materi + "-tab").click();
    }

    function jawabsoal(kodesoal, jawaban, kodebtn, materi, indexnya) {
        // $('#modal-' + materi + ' > .' + kodesoal).removeClass('bg-primary text-white');
        // $('#modal-' + materi + ' > #' + kodesoal + "_" + jawaban).addClass('bg-primary text-white');
        $('.' + kodesoal + "_" + materi).removeClass('bg-primary text-white');
        $('#' + kodesoal + "_" + jawaban + "_" + materi).addClass('bg-primary text-white');
        $('#pills-' + kodebtn + materi + "-tab").removeClass('bg-biru');
        $('#pills-' + kodebtn + materi + "-tab").addClass('bg-primary text-white');

        jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban = jawaban;
        jsonurutan[indexnya].terjawab[kodesoal] = 1;
        jsonurutan[indexnya].terjawab.total = parseInt(Object.keys(jsonurutan[indexnya].terjawab).length) - 1;
        // $('#pills-' + (parseInt(kodebtn) + 1) + materi + "-tab").click();

        // if (jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban == '') {

        //     let progress = parseInt($('#progress-' + materi).attr("aria-valuenow"));
        //     let progressmax = parseInt($('#progress-' + materi).attr("aria-valuemax"));
        //     let progressnew = progress + 1;
        //     let progresspersen = (progressnew / progressmax) * 100;
        //     $('#progress-' + materi).attr("aria-valuenow", progressnew);
        //     $('#progress-' + materi).html(progressnew + "/" + progressmax);
        //     $('#progress-' + materi).attr("style", "width:" + progresspersen + "%");
        // }
    }
</script>

<!-- Penutup tanpa footer -->
</div>
</body>

</html>
<!-- Penutup tanpa footer -->