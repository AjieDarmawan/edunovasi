<?php
$listwebinar = '';
$getcurl_webinar = getcurl($base_api . 'webinar');
if (isset($getcurl_webinar['status']) && $getcurl_webinar['status'] == '200') {
    $listwebinar = $getcurl_webinar['data'];
}
// eduprint($getcurl_webinar);

?>

<style>
    #list .card .title {
        font-size: 18px;
        color: #000000;
        font-weight: bold;
    }

    #list .card .desc {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    #list .card .tanggal {
        font-size: 14px;
        color: #152955;
        font-weight: bold;
    }
</style>
<section id="list" class="py-5 mb-5">
    <div class="container">
        <div class="row">
            <?php

            if ($listwebinar != '') {
            ?>
                <div class="col-md-12 mb-4">
                    <h4 class="fw-bold">Webinar Edunovasi</h4>
                </div>
                <div class="col-md-12">
                    <div class="row g-4">
                        <?php
                        foreach ($listwebinar as $key => $val) {
                        ?>
                            <!-- <div class="col-md-4">
                                <div class="card shadow-sm">
                                    <img src="<?php echo $val['foto'] ?>" class="card-img-top" alt="<?php echo $val['foto'] ?>">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 title"><?php echo $val['topik'] ?></div>
                                            <div class="col-md-12 desc mt-2 mb-3"><?php echo $val['desc'] ?></div>
                                            <div class="col-md-6 my-auto tanggal"><?php echo $val['tanggal'] ?></div>
                                            <div class="col-md-6 my-auto text-end"><a href="<?php echo $inc . "/webinar/detail/" . $val['id_webinar'] ?>" class="btn btn-sm btn-primary px-3">DETAIL</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body p-1">
                                        <div class="row">
                                            <div class="col-md-3 my-auto">
                                                <img src="<?php echo $val['foto'] ?>" class="card-img-top" alt="<?php echo $val['foto'] ?>">
                                            </div>
                                            <div class="col-md-9 p-4 p-md-1 pe-md-4 my-auto">
                                                <div class="row">
                                                    <div class="col-md-12 title"><?php echo $val['topik'] ?></div>
                                                    <div class="col-md-12 desc mt-2 mb-3"><?php echo $val['desc'] ?></div>
                                                    <div class="col-md-6 my-auto tanggal"><?php echo $val['tanggal'] ?></div>
                                                    <div class="col-md-6 my-auto text-end"><a href="<?php echo $inc . "/webinar/detail/" . $val['id_webinar'] ?>" class="btn btn-sm btn-primary px-3">DETAIL</a></div>
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
                <!-- <div class="col-md-3 mt-5 mx-auto">
                    <a href="detail" class="btn btn-outline-primary w-100 fw-bold p-2">Paging di sini</a>
                </div> -->
            <?php
            } else {
            ?>
                <div class="col-md-12 my-5 text-center">
                    <img class="img-fluid" src="<?php echo $inc ?>/assets/img/empty-state.png">
                </div>
                <div class="col-md-12 text-primary fs-6 text-center">
                    <span class="fw-bold fs-5">Belum ada webinar ditampilkan untuk saat ini</span><br>
                </div>
            <?php } ?>
        </div>
    </div>
</section>