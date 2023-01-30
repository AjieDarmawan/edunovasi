<?php
$data = array();
$data['id_event'] = $arr_urinya[4];
$data['email'] = $sesi['email'];
$data['id_peserta'] = $sesi['id_peserta'];
eduprint($data);
// exit;

$getcurl_hasil = postcurl($base_api . 'cari_nilai', $data);
// eduprint($getcurl_hasil);

if (!$getcurl_hasil) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datahasil = $getcurl_hasil;
}
eduprint($datahasil);


$getcurl_pembahasan = postcurl($base_api . 'pembahasan', $data);
if (!$getcurl_pembahasan) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datapembahasan = $getcurl_pembahasan;
}
eduprint($datapembahasan);
?>

<style>
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
            <strong>Berhasil</strong> menyelesaikan tryout, berikut hasil dari tryout Kamu, klik di sini untuk melihat <a href="<?php echo $inc_; ?>/event/ranking/<?php echo $arr_urinya[4]; ?>">Ranking</a>
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
                </div>
            </div>
        </div>
    </div>
</section>
<section id="pembahasan" style="margin-bottom:96px">
    <div class="container">

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
                            <div class="accordion-body">

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

                                                <div class="col-2 fw-bold">No : </div>
                                                <div class="col-10"><?php echo $nom ?></div>
                                                <div class="col-2 fw-bold">
                                                    Pertanyaan :
                                                </div>
                                                <div class="col-10">
                                                    <?php
                                                    if ($soal['img'] != '') {
                                                        echo "<img src='" . $soal['img'] . "' class='img-fluid'><br><br>";
                                                    }
                                                    ?>
                                                    <?php echo nl2br($soal['pertanyaan']); ?>
                                                    <div class="my-2">
                                                        <?php
                                                        foreach ($soal['pilihan'] as $kp => $vp) {
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
                                                            echo $abcd . ". " . $vp['name'] . "<br>";
                                                        } ?>
                                                    </div>
                                                </div>
                                                <div class="col-2 fw-bold">
                                                    Jawaban Benar :
                                                </div>
                                                <div class="col-10">
                                                    <?php echo $arrabcde[$arrjawaban] . ". " . $soal['pilihan'][$arrjawaban]['name']; ?>
                                                </div>
                                                <div class="col-2 bg-nilai py-2 fw-bold">
                                                    Pembahasan Soal :
                                                </div>
                                                <div class="col-10 bg-nilai py-2">
                                                    <?php echo $soal['pembahasan']; ?>
                                                </div>
                                                <div class="col-2 fw-bold">
                                                    Jawaban Anda :
                                                </div>
                                                <div class="col-9 <?php echo $style ?>">
                                                    <?php echo  $arrjawab >= 0 ? $arrabcde[$arrjawab] . ". " . $soal['pilihan'][$arrjawab]['name'] : 'Tidak terjawab'; ?>
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
    </div>
</section>