<?php
$data = array();
$data['id_event'] = base64_decode($arr_urinya[4]);
$data['email'] = $sesi['email'];

$getcurl_rank = postcurl($base_api_irt . 'list_hasil_rangking', $data);
if (!$getcurl_rank) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $datarank = $getcurl_rank;
}
eduprint($getcurl_rank);


$url = $base_api . 'detail/' . $arr_urinya[4];
$getcurl_eventd = getcurl($url);
if (!$getcurl_eventd) {
    header('Location: ' . $inc_, true, 301);
    exit;
} else {
    $dataeventd = $getcurl_eventd;
}
// eduprint($dataeventd);

?>
<style>
    #nilai .card {
        border: 1px solid #195030;
        border-radius: 8px;
    }

    #ranking .card {
        background: #FFFFFF 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
        border: 1px solid #003049;
    }

    #ranking .card-header {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .bg-nilai {
        background-color: #FFE6B9;
    }
</style>
<section id="ranking" style="margin-top:96px;margin-bottom:48px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 title fs-4 fw-bold mb-4">
                Ranking Tryout
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning py-3">
                        <div class="row">
                            <div class="col-md-6 text-start fw-bold my-auto"><?php echo $dataeventd['judul'] ?> <?php echo $dataeventd['kategori'] ?></div>
                            <div class="col-md-6 text-md-end text-start my-auto">
                                <i class="fas fa-users me-1 mb-1"></i> Jumlah Peserta: <?php echo count($datarank); ?><br class="d-block d-md-none">
                                <img class="img-fluid mb-1 ms-md-5 me-1" src="<?php echo $inc_ ?>/assets/ic/date_biru.svg"><?php echo $dataeventd['tgl_mulai'] . " - " . $dataeventd['tgl_selesai'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-striped table-hover text-center">
                            <thead class="bg-light p-5">
                                <tr>
                                    <th style="width:10%">Ranking</th>
                                    <!-- <th style="width:20%" class="text-start">Email</th> -->
                                    <th style="width:20%" class="text-start">Nama</th>
                                    <th style="width:20%" class="text-start">Asal Sekolah</th>
                                    <th style="width:7.5%">Skor</th>
                                    <th style="width:15%">Durasi Pengerjaan</th>
                                    <th style="width:17.5%">Waktu Mengerjakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($datarank as $key => $val) {
                                    if ($no < 4) {
                                        $rank = "<img class='me-2' src='" . $inc_ . "/assets/ic/rank" . $no . ".svg'>";
                                    } else {
                                        $rank = "";
                                    }
                                    $bg = "";
                                    if ($val['email'] == $sesi['email']) {
                                        $bg = "bg-oren text-white";
                                    }
                                ?>
                                    <tr class="<?php echo $bg; ?>">
                                        <th><?php echo $rank ?><?php echo $no ?></th>
                                        <td class="text-start"><?php echo $val['nama'] ?></td>
                                        <td class="text-start"><?php echo $val['asal_sekolah'] ?></td>
                                        <td><?php echo $val['skor'] ?></td>
                                        <td><?php echo $val['waktu'] ?> Menit</td>
                                        <td><?php echo $val['waktu_pengerjaan'] ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>