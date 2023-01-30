<?php
$data = array();
$data['id_event'] = $arr_urinya[4];
$data['email'] = $sesi['email'];
$data['id_peserta'] = $sesi['id_peserta'];
// $_SESSION['id_peserta'] = '';

$print_event = base64_encode($data['id_event'] . "~" . $data['id_peserta']);
// eduprint($data);
// exit;

$getcurl_hasil = postcurl($base_api_dinas . 'cari_nilai', $data);
// eduprint($getcurl_hasil);
if (!$getcurl_hasil) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datahasil = $getcurl_hasil;
}

$getcurl_history = postcurl($base_api_dinas . 'history_jawaban', $data);
// eduprint($getcurl_history);
if (!$getcurl_history) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datahistory = $getcurl_history;
}

// eduprint($datahasil);
$tglevent = date('Ymd', strtotime($datahasil['tgl_selesai']));
$tglsekarang = date('Ymd');


$getcurl_pembahasan = postcurl($base_api_dinas . 'pembahasan', $data);
if (!$getcurl_pembahasan) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datapembahasan = $getcurl_pembahasan;
}
// eduprint($datapembahasan);
?>

<style>
    img {
        max-width: 400px !important;
    }

    #nilai .card {
        border: 1px solid #195030;
        border-radius: 8px;
    }

    #pembahasan .card {
        background: #FFFFFF 0% 0% no-repeat padding-box;
        border: 1px solid #003049;
        border-radius: 8px;
    }


    #pembahasan .card .border-bottom {
        border-color: #003049 !important;
    }

    #pembahasan .card-header {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        font: normal normal bold 18px/24px Open Sans;
        letter-spacing: 0px;
        color: #111111;
    }

    .accordion-button:not(.collapsed) {
        color: #003049 !important;
        background-color: #fff !important;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125);
    }

    .bg-nilai {
        background-color: #EAE2B7;
    }
</style>

<div style="padding-top:36px;"></div>

<section id="nilai" class="my-4">
    <div class="container">
        <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Berhasil</strong> menyelesaikan Try Out, berikut hasil dari Try Out Kamu
            <!-- klik di sini untuk melihat <a href="<?php echo $inc_; ?>/event/ranking/<?php echo $data['id_event']; ?>">Ranking</a> -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card p-2">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 small">Nama :</div>
                            <div class="col-md-12 fw-bold"><?php echo $sesi['nama'] ?></div>
                            <div class="col-md-12 small">Email</div>
                            <div class="col-md-12 fw-bold"><?php echo $sesi['email'] ?></div>
                        </div>
                    </div>
                    <div class="col-md-4 fs-5">
                        <div class="row">
                            <div class="col-6">Benar</div>
                            <div class="col-1">:</div>
                            <div class="col-5"><span class="fw-bold text-success"><?php echo $datahasil['benar'] ?></span></div>
                            <div class="col-6">Salah</div>
                            <div class="col-1">:</div>
                            <div class="col-5"><span class="fw-bold text-success"><?php echo $datahasil['salah'] ?></span></div>
                            <div class="col-6">Tidak Dijawab</div>
                            <div class="col-1">:</div>
                            <div class="col-5"><span class="fw-bold text-success"><?php echo $datahasil['kosong'] ?></span></div>
                        </div>
                    </div>
                    <div class="col-md-4 bg-nilai rounded shadow-sm d-flex">
                        <div class="my-auto mx-auto d-flex">
                            <div class="fs-4 my-auto me-2">Skor :</div>
                            <div class="fw-bold text-black fs-1 my-auto"><?php echo $datahasil['skor'] ?></div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 text-md-end text-center">
                        Download soal event dan pembahasan&nbsp;
                        <b>
                            <a target="_blank" href="<?php echo $inc_ ?>/print/event_skd/<?php echo $print_event; ?>">
                                di sini
                                <img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/icon/filedownload.svg">
                            </a>
                        </b>
                    </div>
                </div>
                <div class="row d-none d-md-block mt-4">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-start">Sesi</th>
                                    <th scope="col">benar</th>
                                    <th scope="col">Salah</th>
                                    <th scope="col">Tdk Jawab</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Ambang Batas</th>
                                    <th scope="col">Tercapai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($datahistory as $key => $val) {
                                ?>
                                    <tr>
                                        <td class="text-start fw-bold"><?php echo $val['materi_nama'] ?></td>
                                        <td><?php echo $val['benar'] ?></td>
                                        <td><?php echo $val['salah'] ?></td>
                                        <td><?php echo $val['kosong'] ?></td>
                                        <td class="fw-bold"><?php echo $val['skor'] ?></td>
                                        <td class="fw-bold"><?php echo $val['kkm'] ?></td>
                                        <td class="fw-bold small"><?php echo $val['hasil_status'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                foreach ($datahistory as $key => $val) {
                ?>
                    <div class="row g-3 my-3 text-center d-inline-flex d-md-none">
                        <div class="col-12 fw-bold fs-6 bg-light p-2 rounded"><?php echo $val['materi_nama'] ?></div>
                        <div class="col-4 small">Benar <br><?php echo $val['benar'] ?></div>
                        <div class="col-4 small">Salah <br><?php echo $val['salah'] ?></div>
                        <div class="col-4 small">Tdk Jawab <br><?php echo $val['kosong'] ?></div>
                        <div class="col-4 small">Skor <br><span class="fs-5 fw-bold"><?php echo $val['skor'] ?></span></div>
                        <div class="col-4 small">KKM <br><span class="fs-5 fw-bold"><?php echo $val['kkm'] ?></span></div>
                        <div class="col-4 fw-bold"><?php echo $val['hasil_status'] ?></div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<section id="pembahasan" style="margin-top:48px;margin-bottom:96px">
    <div class="container">
        <?php if ($tglsekarang > $tgleventa) { ?>

            <div class="accordion accordion-flush" id="accordionhasil">
                <?php
                $no = 1;
                foreach ($datapembahasan as $key => $val) {
                    foreach ($val as $k => $v) {
                ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $k; ?>">
                                <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $k; ?>" aria-expanded="true" onclick="window.location.href='#accordionhasil'">
                                    Pembahasan <?php echo $no . ' - ' . $v[0]['materi_nama']; ?> :
                                </button>
                            </h2>
                            <div id="collapse<?php echo $k; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $k; ?>" data-bs-parent="#accordionhasil">
                                <div class="accordion-body px-2">

                                    <div class="card">
                                        <!-- <div class="card-header bg-warning py-3 sticky-top">
                                        <div class="row">
                                            <div class="col-2">Judul</div>
                                            <div class="col-10">Deskripsi</div>
                                        </div>
                                    </div> -->
                                        <div class="card-body py-0">

                                            <?php
                                            $nom = 1;
                                            $arrabcde = array("0" => "A", "1" => "B", "2" => "C", "3" => "D", "4" => "E", "5" => "");
                                            // eduprint($arrabcde);
                                            foreach ($v as $id => $soal) {
                                                $style = "";
                                                $arrjawaban = ($soal['jawaban'] - 1);
                                                $arrjawab = ($soal['jawaban_anda'] - 1);
                                                if ($arrjawaban !== $arrjawab) {
                                                    $style = "text-danger";
                                                }
                                            ?>
                                                <div class="row g-3 py-4 border-bottom">

                                                    <div class="col-md-2 fw-bold">No : </div>
                                                    <div class="col-md-10"><?php echo $nom ?></div>
                                                    <div class="col-md-2 fw-bold">
                                                        Pertanyaan :
                                                    </div>
                                                    <div class="col-md-10">
                                                        <?php
                                                        if ($soal['img'] != '') {
                                                            echo '<img class="img-fluid mb-4" src="' . $soal['img'] . '"><br>';
                                                        }
                                                        ?>
                                                        <?php echo ubahkotak(nl2br($soal['pertanyaan'])); ?>
                                                        <div class="my-2">
                                                            <?php
                                                            foreach ($soal['pilihan'] as $kp => $vp) {

                                                                $pilihannya = $vp['name'];
                                                                if ($vp['type'] == 'gambar') {
                                                                    $pilihannya = '<img class="img-fluid" src="' . $pilihannya . '">';
                                                                }

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
                                                                echo $abcd . ". " . ubahkotak($pilihannya) . "<br>";
                                                            } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 fw-bold">
                                                        Jawaban Benar :
                                                    </div>
                                                    <div class="col-md-10">
                                                        <?php
                                                        $jwbbenar = $soal['pilihan'][$arrjawaban]['name'];
                                                        if ($soal['pilihan'][$arrjawaban]['type'] == 'gambar') {
                                                            $jwbbenar = '<img class="img-fluid" src="' . $jwbbenar . '">';
                                                        }
                                                        echo $arrabcde[$arrjawaban] . ". " . ubahkotak($jwbbenar);
                                                        ?>
                                                    </div>
                                                    <div class="col-md-2 bg-nilai py-2 fw-bold">
                                                        Pembahasan Soal :
                                                    </div>
                                                    <div class="col-md-10 bg-nilai py-2">
                                                        <?php echo ubahkotak(nl2br($soal['pembahasan'])); ?>
                                                        <?php
                                                        if ($soal['pembahasan_img'] != '') {
                                                            echo "<br><br><img src='" . $soal['pembahasan_img'] . "' class='img-fluid'>";
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-2 fw-bold">
                                                        Jawaban Anda :
                                                    </div>
                                                    <div class="col-md-9 <?php echo $style ?>">
                                                        <?php
                                                        $jwbanda = $soal['pilihan'][$arrjawab]['name'];
                                                        if ($soal['pilihan'][$arrjawab]['type'] == 'gambar') {
                                                            $jwbanda = '<img class="img-fluid" src="' . $jwbanda . '">';
                                                        }
                                                        echo  $arrjawab >= 0 ? $arrabcde[$arrjawab] . ". " . ubahkotak($jwbanda) : 'Tidak terjawab';
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                                $nom++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    $no++;
                }
                ?>
            </div>

        <?php } else { ?>

            <div class="card py-5">
                <div class="card-body" style="min-height:50vh">
                    <div class="row g-2">
                        <div class="col-md-12 mb-4 text-center">
                            <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-success.png">
                        </div>
                        <div class="col-md-12 text-primary fs-6 text-center">
                            <span class="fw-bold fs-4">Terima Kasih, Kamu Sudah Selesai Mengerjakan Try Out</span><br>
                            Pembahasan dapat diakses pada menu Dashboard setelah Event Try Out berakhir<br>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>