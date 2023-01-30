<?php
$base_api_dashboard = "https://backendtryout.edunitas.com/api_mobile/api_dashboard/";
$data = array();
$data['email'] = $sesi['email'];
// eduprint($base_api_dashboard);
// exit;

$getcurl_event = postcurl($base_api_dashboard . 'event', $data);
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
                    $no = 0;
                    foreach ($dataevent as $key => $val) {
                        $active = '';
                        if ($no == 0) {
                            $active = 'show active';
                        }
                    ?>

                        <div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $key ?>" role="tabpanel" aria-labelledby="pills-<?php echo $key ?>-tab">

                            <div class="row g-3" id="list-latihan">
                                <div class="col-md-3">
                                    <div class="row g-3">

                                        <?php
                                        $no = 0;
                                        foreach ($dataevent[$key] as $k => $v) {
                                            // eduprint($v);
                                        ?>
                                            <div class="col-md-12">
                                                <div class="card">
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
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body" style="min-height:50vh">
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