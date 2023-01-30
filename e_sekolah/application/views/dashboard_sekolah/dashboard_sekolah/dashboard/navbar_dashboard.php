<?php 

error_reporting(0);
$uri = $_SERVER['REQUEST_URI'];
$arr_urinya = array_filter(@explode("/", $uri));
array_unshift($arr_urinya, "", "tryout");
unset($arr_urinya[0]);




$active_admin = 'collapsed';
$admin_history = '';
if ($arr_urinya[2] == 'admin' && $arr_urinya[3] == 'history') {
    $active_admin = 'show';
    $admin_history = 'bg-primary rounded';
   
}
$admin_ranking = '';
if ($arr_urinya[2] == 'admin' && $arr_urinya[3] == 'ranking') {
    $active_admin = 'show';
    $admin_ranking = 'bg-primary rounded';
}

$active_event_sekolah = 'collapsed';
$event_sekolah = '';
if ($arr_urinya[2] == 'admin' && $arr_urinya[3] == 'event_sekolah') {
    $active_event_sekolah = 'show';
    $event_sekolah = 'bg-primary rounded';
   
}




$sesi = $this->session->userdata();
// echo "<pre>";
// print_r($sesi['userdata']['nama_sekolah']);
?>

<div class="col-md-2 pe-0 sticky-top d-none d-md-block" id="sec-dashboard">
    <div class="flex-shrink-0 pb-3 pt-1 px-md-0 w-100">
        <a href="/"
            class="d-flex align-items-center ps-4 py-2 mb-3 text-white text-decoration-none border-bottom bg-light">
            <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
                data-cf-settings="dc47533cf8d45be8f58340ab-|49"></script>
            <img src="https://file.edunitas.com/assets/profile/img/md/defuser.png" width="25" height="25"
                class="rounded-circle me-2"
                onerror="this.onerror=null;this.src='https://edunovasi.com/assets/img/blank-profile.jpg'" />
            <span class="fs-6 fw-semibold"><?php echo $sesi['userdata']['nama_sekolah']; ?></span>
        </a>
        <ul class="list-unstyled ps-4">
            <li class="mb-1">
                <a class="btn btn-toggle align-items-end rounded <?php echo $active_admin ?>" data-bs-toggle="collapse"
                    data-bs-target="#event-collapse" aria-expanded="false">
                    Try Out
                </a>
                <div class="collapse <?php echo $active_admin ?>" id="event-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                        <li>
                            <a class="<?php echo $admin_history ?>"
                                href="<?php echo base_url('dashboard/admin/history')?>">History</a>
                        </li>
                        <li>
                            <a class="<?php echo $admin_ranking ?>" href="<?php echo base_url('dashboard/admin/ranking')?>">Ranking</a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="mb-1">
                <a class="btn btn-toggle align-items-end rounded <?php echo $active_event_sekolah ?>" data-bs-toggle="collapse"
                    data-bs-target="#akun-collapse" aria-expanded="false">
                    List Soal
                </a>
                <div class="collapse <?php echo $active_event_sekolah ?>" id="akun-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ps-2 pb-2">
                        <li>
                            <a  class="<?php echo $event_sekolah ?>" href="<?php echo base_url('dashboard/admin/event_sekolah')?>" >Event</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>