<?php

$ccid = $arr_urinya[4];

date_default_timezone_set("Asia/Jakarta");
$tgl_mulai = date("Y-m-d H:i:s");

$materi_id = base64_decode($ccid);


$getcurl_soal = getcurl($base_api . 'soal_preview/' . $ccid);
if (!$getcurl_soal) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datasoal = $getcurl_soal["listdata"];
}
// eduprint($datasoal, 1);

$data = array('materi_id' => $materi_id);
$getcurl_pembahasan = postcurl($base_api . 'preview_pembahasan', $data);
if (!$getcurl_pembahasan) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datapembahasan = $getcurl_pembahasan[0][$materi_id];
}
// eduprint($datapembahasan);


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

    .countdown span {
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        font-size: 1.8rem;
    }

    .countdown small {
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        font-size: 12px;
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

    #modal_selesai .title {
        font: normal normal bold 28px Open Sans;
        color: #003049;
    }

    #modal_selesai .subtitle {
        font: normal normal normal 20px Open Sans;
        color: #111111;
    }

    #modal_selesai label {
        font: normal normal bold 14px Open Sans;
        color: #111111;
    }

    .select2-container {
        z-index: 100000;
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
    <div class="container-fluid px-4">
        <div class="row g-3">
            <div class="col-md-9 my-auto pt-4">
                <div class="row">
                    <div class="col-md-12 text-md-start text-center fs-5 text-primary fw-bold">
                        Cek SOAL
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-auto pt-4">
                <div class="row countdown text-center fw-bold">
                    <div class="col-md-12">
                        <div class="row g-1 justify-content-center justify-content-md-end" id="countdown">
                            <!-- <div class="col"><span id="countjam">0</span><br><small>JAM</small></div>
                            <div class="col-1 my-auto h2">:</div> -->
                            <div class="col-2"><span id="countmenit">0</span><br><small>menit</small></div>
                            <div class="col-1 my-auto h2">:</div>
                            <div class="col-2"><span id="countdetik">0</span><br><small>detik</small></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 my-1">

                <?php
                $jsonsoal = array();
                $jsonurutan = array();
                $no = 0;

                $mid = $materi_id;
                ?>
                <div class="divsoal" id="soal-<?php echo $mid ?>" style="display:<?php echo $no > 0 ? 'none' : ''; ?>">
                    <!-- <h4 class="card-title fw-bold mb-3"></h4> -->
                    <div class="row">
                        <div class="col-md-3 small bg-white order-md-2 py-5" id="soalright">
                            <div class="row sticky-top" style="top:10px">
                                <div class="col-12 p-4 daftarsoal tinggivh-soal" style="overflow-y:scroll;">
                                    <div class="row">
                                        <div class="col-md-12 h5 fw-bold mb-3 edu-text-primary">
                                            Daftar Soal
                                        </div>
                                        <div class="col-md-12">
                                            <ul class="nav nav-pills row row-cols-5 g-2 text-center" id="pills-tab" role="tablist">
                                                <?php for ($i = 0; $i < $datasoal["totaldata"]; $i++) {

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
                                    <!-- <button type="button" onclick="tanyalanjut('<?php echo $no; ?>')" class="btn btn-sm btn-primary w-100 btnselesai">Selesai</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="col order-lg-1" id="soal">
                            <div class="row position-relative">
                                <div class="col-12">
                                    <div class="tab-content" id="pills-tabContent">

                                        <?php
                                        $arrsoal = array();
                                        $arrsoal['materi_id'] = $mid;
                                        foreach ($datasoal['datanya'] as $k => $v) {

                                            $arrsoal["ans_" . $v['no']] = array("soal" => $v['no'], "jawaban" => "0");

                                            $active = '';
                                            if ($k == 0) {
                                                $active = 'show active';
                                            }
                                        ?>
                                            <div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $k . $mid ?>" role="tabpanel" aria-labelledby="pills-<?php echo $k . $mid ?>-tab">
                                                <div class="row my-2">
                                                    <div class="col-md-8 my-auto fw-bold fs-4 text-md-start text-center"><?php echo $datasoal['materi_nama'] ?></div>
                                                    <div class="col-md-4 my-auto text-md-end text-center">
                                                        <span class="soalke_label">Soal Ke :</span> <span class="soalke"><?php echo $k + 1 ?> / <?php echo  $datasoal["totaldata"] ?></span>
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
                                                            <div class="col-md-6 my-auto">
                                                                <div class="row g-2 ms-2">
                                                                    <div class="col-md-4">Tandai Jawaban : </div>
                                                                    <div class="col-2 my-auto text-center ms-2">
                                                                        <button class="btn btn-primary w-100" onclick="tandainx('<?php echo $k; ?>','<?php echo $mid ?>')">Oke</button>
                                                                    </div>
                                                                    <div class="col-2 my-auto text-center ms-2">
                                                                        <button class="btn btn-danger w-100" onclick="tandain('<?php echo $k; ?>','<?php echo $mid ?>')">Revisi</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 text-end my-auto">
                                                                <?php if (($k + 1) > 1) { ?>
                                                                    <button class="btn btnprev" onclick="$('#pills-<?php echo ($k - 1) . $mid ?>-tab').click()"><i class="fas fa-chevron-left"></i></button>
                                                                <?php } ?>
                                                                <?php if (($k + 1) < $datasoal["totaldata"]) { ?>
                                                                    <button class="btn btnnext" onclick="$('#pills-<?php echo ($k + 1) . $mid ?>-tab').click()"><i class="fas fa-chevron-right"></i></button>
                                                                <?php } ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                $arrabcde = array("0" => "A", "1" => "B", "2" => "C", "3" => "D", "4" => "E", "5" => "");
                                                $arrjawaban = ($datapembahasan[$k]['jawaban'] - 1);
                                                $jwbbenar = $datapembahasan[$k]['pilihan'][$arrjawaban]['name'];
                                                if ($datapembahasan[$k]['pilihan'][$arrjawaban]['type'] == 'gambar') {
                                                    $jwbbenar = '<img class="img-fluid" src="' . $jwbbenar . '">';
                                                }
                                                ?>
                                                <div class="row mt-5">
                                                    <div class="col-md-12 my-auto fw-bold fs-4 text-md-start text-center">Pembahasan Soal</div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row g-2 mb-2">
                                                            <div class="col-md-12 mb-3">
                                                                <span class="soalke_label">Jawaban : </span> <span class="soalke"> <?php echo $arrabcde[$arrjawaban] . ". " . ubahkotak($jwbbenar) ?> </span>
                                                                <br>
                                                                <br>
                                                                <?php
                                                                if ($datapembahasan[$k]['pembahasan_img'] != '') {
                                                                    echo '<img class="img-fluid mb-4" src="' . $datapembahasan[$k]['pembahasan_img'] . '"><br>';
                                                                }
                                                                ?>
                                                                <?php echo ubahkotak(nl2br($datapembahasan[$k]['pembahasan'])); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php
                                        }
                                        // $jsonsoal["datanya"]["mat_" . $mid] = $arrsoal;
                                        $jsonsoal["datanya"] = $arrsoal;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <?php
                $jsonurutan[$no]["materi"] = $mid;
                $jsonurutan[$no]["waktu"] = $datasoal['waktu'];
                $jsonurutan[$no]["next"] = ($no + 1);
                // $no++;

                $jsonurutan["totaldata"] = $no + 1;
                $jsonsoal["materi"] = $materi_id;
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
            <div class="modal-body text-start ">

                <div class="row justify-content-center">
                    <div class="col-md-12 text-center title">
                        Kamu telah menyelesaikan latihan
                    </div>
                    <div class="col-md-12  text-center subtitle">
                        Silakan lengkapi data diri kamu pada form di bawah ini
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header bg-white text-center fw-bold text-primary">
                                Data diri peserta
                            </div>
                            <div class="card-body">

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
                                    <!-- <div class="col-6">
                                        <label for="kampus" class="form-label">Kampus impian</label>
                                        <input type="text" class="form-control" id="kampus_impian" name="kampus_impian" placeholder="" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="jurusan" class="form-label">Jurusan yang diinginkan</label>
                                        <input type="text" class="form-control" id="jurusan_diinginkan" name="jurusan_diinginkan" placeholder="" required>
                                    </div> -->
                                    <div class="col-12">
                                        <label for="sekolah" class="form-label">Asal Sekolah</label>
                                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="" required>
                                    </div>
                                    <div class="col-12 mt-4 text-center">
                                        <input type="hidden" name="id_materi" value="<?php echo $arr_urinya[4]; ?>">
                                        <button onclick="lanjutmaterilain(0)" type="button" class="btn btn-sm btn-primary w-100 p-2">Kirim</button>
                                        <!-- <button type="submit" name="btn_peserta" id="btn_peserta" class="d-none"></button> -->
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    function tandainx(kodebtn, materi) {
        $('#pills-' + kodebtn + materi + "-tab").removeClass('bg-danger text-white');
        // $('#pills-' + kodebtn + materi + "-tab").addClass('bg-primary');
        $('#pills-' + (parseInt(kodebtn) + 1) + materi + "-tab").click();
    }

    function tandain(kodebtn, materi) {
        $('#pills-' + kodebtn + materi + "-tab").removeClass('bg-primary');
        $('#pills-' + kodebtn + materi + "-tab").addClass('bg-danger text-white');
        $('#pills-' + (parseInt(kodebtn) + 1) + materi + "-tab").click();
    }
</script>

<!-- BUAT NODE -->

<script>
    let sesiemail = "<?php echo $sesi['email'] ?>";
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

        $("#soal-loading").attr('style', 'display:none');
        $("#soal-mulai").attr('style', '');

        // mulai(Object.keys(jsonurutan)[0]);
        /**
         * Membuat function hitung() sebagai Penghitungan Waktu
         */
        /** Menjalankan Function Hitung Waktu Mundur */
    });

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
            $('#countdown').addClass("text-merah");
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
                    clearTimeout(itungjalan);
                    lanjutmaterilain(indexterpilih);
                }
            }
        }
    }

    function tanyalanjut(indexnext) {
        Swal.fire({
            title: 'Konfirmasi',
            width: 600,
            html: "Apakah kamu yakin ingin menyelesaikan latihan ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Selesai',
            cancelButtonText: 'Kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                clearTimeout(itungjalan);
                if (sesiemail == '') {
                    $("#modal_selesai").modal('show');
                } else {
                    lanjutmaterilain(indexnext);

                }
            }
        })
    }

    function lanjutmaterilain(indexnext) {
        let materi_now = jsonurutan[indexnext].materi;
        let materi_next = jsonurutan[indexnext].next;

        if (materi_next == jsonurutan.totaldata) {

            let timerInterval
            Swal.fire({
                title: 'Latihan telah selesai',
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
                }
            })

        }
    }

    function selesai() {

        clearTimeout(itungjalan);
        let jsondata = JSON.stringify(jsonsoal.datanya);
        // console.log(jsondata);
        // exit;

        $.ajax({
            url: 'https://backendtryout.edunitas.com/api_mobile/api/jawaban',
            type: 'POST',
            crossDomain: true,
            data: {
                "res": jsondata,
                "email": $("#email").val() != '' ? $("#email").val() : 'email.testlatihan@edunitas.com',
                "tgl_mulai": "<?php echo $tgl_mulai ?>"
            },
            dataType: 'json',
            success: function(res) {
                let id_jawaban = btoa(res.id_jawaban);
                if (sesiemail == '') {
                    Swal.fire({
                        title: 'Latihan telah selesai',
                        width: 600,
                        html: "Kami telah mengirimkan akun try out edunitas ke email kamu, silakan login untuk melihat hasil latihan TO",
                        allowOutsideClick: false,
                        // icon: 'question',
                        // showCancelButton: true,
                        // confirmButtonText: 'Ya, Selesai',
                        // cancelButtonText: 'Kembali',
                        // reverseButtons: true
                    }).then((result) => {

                        window.location.href = "<?php echo $inc_ ?>/latihan";
                    })

                } else {
                    window.location.href = "<?php echo $inc_ ?>/latihan/hasil/" + id_jawaban;

                }
            }
        });

    }

    function jawabsoal(kodesoal, jawaban, kodebtn, materi) {
        // $('#modal-' + materi + ' > .' + kodesoal).removeClass('bg-primary text-white');
        // $('#modal-' + materi + ' > #' + kodesoal + "_" + jawaban).addClass('bg-primary text-white');
        $('.' + kodesoal + "_" + materi).removeClass('bg-primary text-white');
        $('#' + kodesoal + "_" + jawaban + "_" + materi).addClass('bg-primary text-white');
        $('#pills-' + kodebtn + materi + "-tab").addClass('bg-warning text-white');

        // if (jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban == '') {

        //     let progress = parseInt($('#progress-' + materi).attr("aria-valuenow"));
        //     let progressmax = parseInt($('#progress-' + materi).attr("aria-valuemax"));
        //     let progressnew = progress + 1;
        //     let progresspersen = (progressnew / progressmax) * 100;
        //     $('#progress-' + materi).attr("aria-valuenow", progressnew);
        //     $('#progress-' + materi).html(progressnew + "/" + progressmax);
        //     $('#progress-' + materi).attr("style", "width:" + progresspersen + "%");
        // }
        // jsonsoal["datanya"]["mat_" + materi][kodesoal].jawaban = jawaban;
        jsonsoal["datanya"][kodesoal].jawaban = jawaban;
    }


    getwilayah();

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
</script>

<!-- Penutup tanpa footer -->
</div>
</body>

</html>
<!-- Penutup tanpa footer -->