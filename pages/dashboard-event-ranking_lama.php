<?php
$data = array();
$data['email'] = $sesi['email'];
// eduprint($base_api_dashboard);
// exit;

$getcurl_event = postcurl($base_api_dashboard . 'event_ranking', $data);
// eduprint($getcurl_event);

if ($getcurl_event['status'] == '200') {
    $dataevent = $getcurl_event['data'];
} else {
    $dataevent = array();
}
// eduprint($dataevent);


?>

<div class="row px-2">
    <div class="col-md-12">

        <?php
        if (empty($dataevent)) {
        ?>
            <div class="card">
                <div class="card-body" style="min-height:50vh">
                    <div class="row g-2">
                        <div class="col-md-12 mb-4 text-center">
                            <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-state.png">
                        </div>
                        <div class="col-md-12 text-primary fs-6 text-center">
                            <span class="fw-bold fs-5">Kamu belum mengikuti Event</span><br>
                            Silakan ikuti event dan raih skor tertinggi
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="card mb-3">
                <div class="card-header pb-0 bg-white">

                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php
                        $no = 0;
                        foreach ($dataevent as $key => $val) {
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
                        $no_tab = 0;
                        foreach ($dataevent as $key => $val) {
                            $active = '';
                            if ($no_tab == 0) {
                                $active = 'show active';
                            }
                        ?>

                            <div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $key ?>" role="tabpanel" aria-labelledby="pills-<?php echo $key ?>-tab">

                                <div class="row g-3" id="list-<?php echo $key ?>">
                                    <div class="col-md-3 divpilihmenu">
                                        <div class="row g-3">

                                            <?php
                                            $no = 0;
                                            foreach ($dataevent[$key] as $k => $v) {
                                                // eduprint($v);
                                            ?>
                                                <div class="col-md-12">
                                                    <div class="card click card<?php echo $key ?>" id="card-<?php echo base64_decode($v['id_event']) ?>" onclick="tampilranking('<?php echo $v['id_event'] ?>','<?php echo $key ?>','<?php echo $v['judul'] ?>','<?php echo $v['tgl_mulai'] . ' - ' . $v['tgl_selesai'] ?>','<?php echo $no ?>')">
                                                        <div class="card-body py-3">
                                                            <div class="row">
                                                                <div class="col-md-12 title"><?php echo $v['judul'] ?></div>
                                                                <div class="col-md-12">
                                                                    <div class="d-flex justify-content-start small text-secondary">
                                                                        <div class="me-2"><?php echo $v['waktu_mengerjakan'] ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                                $no++;
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-md-9 divpembahasan">
                                        <div style="min-height:50vh" id="pembahasan-<?php echo $key ?>">

                                            <div class="row g-2">
                                                <div class="col-md-12 mb-4 text-center">
                                                    <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-state.png">
                                                </div>
                                                <div class="col-md-12 text-primary fs-6 text-center">
                                                    <span class="fw-bold fs-5">Tidak ada data ditampilkan</span><br>
                                                    Klik List di samping untuk menampilkan data
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                            $no_tab++;
                        }
                        ?>

                    </div>

                </div>
            </div>
        <?php } ?>

    </div>
</div>

<script>
    function tampilranking(id_eventnya, div_id, judul, tgl, no) {

        $("#pembahasan-" + div_id).empty();
        let loading = `    
            <div class="row g-2 py-3">
                <div class="col-md-12 text-center">
                    <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-success.png">
                </div>
                <div class="col-md-12 text-primary fs-6 text-center">
                    <div class="spinner-grow text-primary mx-2" role="status" style="animation-duration: 1.2s;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-oren mx-2" role="status" style="animation-duration: 1.25s;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-primary mx-2" role="status" style="animation-duration: 1.3s;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="col-md-12 mt-3 text-primary fs-6 text-center">
                    Memuat data ranking 30 besar ...
                </div>                
            </div>
        `;
        $("#pembahasan-" + div_id).html(loading);

        $(".card" + div_id).removeClass("bg-primary");
        $("#card-" + atob(id_eventnya)).addClass("bg-primary");

        if ((id_eventnya != 'NDg=' && id_eventnya != 'NDk=') && id_eventnya == 'semuaevent') {

            var kiriman = JSON.stringify({
                email: "<?php echo $sesi['email'] ?>",
                id_event: id_eventnya,
            });

            $.ajax({
                url: '<?php echo $base_api_dashboard; ?>list_skor/',
                type: 'POST',
                crossDomain: true,
                data: {
                    "data": kiriman
                },
                // contentType: 'application/json',
                dataType: 'json',
                success: function(res) {

                    let no = 1;
                    let listrank = '';
                    $.each(res, function(key, val) {
                        if (no < 4) {
                            rank = "<img class='me-2' src='<?php echo $inc_ ?>/assets/ic/rank" + no + ".svg'>";
                        } else {
                            rank = "";
                        }
                        let bg = "";
                        if (val.email == "<?php echo $sesi['email'] ?>") {
                            bg = "bg-oren text-white";
                        }

                        listrank +=
                            `<tr class="${bg}">
                            <th>${rank+no}</th>
                            <td class="text-start">${val['nama']}</td>
                            <td class="text-start">${val['asal_sekolah']}</td>
                            <td>${val['skor']}</td>
                            <td>${val['waktu']} Menit</td>
                            <td>${val['waktu_pengerjaan']}</td>
                        </tr>`;
                        no++;
                    });

                    $("#pembahasan-" + div_id).empty();
                    $("#pembahasan-" + div_id).html(`
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-warning py-3">
                                    <div class="row">
                                        <div class="col-md-6 text-start fw-bold my-auto">
                                            <i class="fas fa-users me-1 mb-1"></i> Ranking 30 Besar
                                        </div>
                                        <div class="col-md-6 text-md-end test-start my-auto">
                                            <img class="img-fluid mb-1 ms-md-5 me-1" src="<?php echo $inc_ ?>/assets/ic/date_biru.svg">${tgl}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table table-striped table-hover text-center">
                                        <thead class="bg-light p-5">
                                            <tr>
                                                <th style="width:10%">Ranking</th>
                                                <th style="width:20%" class="text-start">Nama</th>
                                                <th style="width:20%" class="text-start">Asal Sekolah</th>
                                                <th style="width:7.5%">Skor</th>
                                                <th style="width:15%">Durasi Pengerjaan</th>
                                                <th style="width:17.5%">Waktu Mengerjakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${listrank}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                `);
                }
            });

        } else {
            let proses = `    
                <div class="row g-2 py-3">
                    <div class="col-md-12 text-center">
                        <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-success.png">
                    </div>
                    <div class="col-md-12 mt-3 text-primary fs-6 text-center">
                        Ranking sedang dalam proses perhitungan IRT
                    </div>                
                </div>
            `;
            $("#pembahasan-" + div_id).html(proses);
        }

    }

    function nl2br(str, is_xhtml) {
        if (typeof str === 'undefined' || str === null) {
            return '';
        }
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }
</script>