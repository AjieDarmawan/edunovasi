<?php $this->load->view('dashboard_sekolah/dashboard/header_dashboard'); ?>
<?php 
$sesi = $this->session->userdata('userdata');
$data = array();
//$data['email'] = "ajie.darmawan106@gmail.com";
$data['id_sekolah'] = $sesi['id_sekolah'];



$getcurl_event = postcurl(api_m_sekolah_dashboard() . 'event_sekolah', $data);





if ($getcurl_event['status'] == '200') {
    $dataevent = $getcurl_event['data'];
} else {
    $dataevent = array();
}

//eduprint($dataevent)
?>
<section>
    <div class="container-fluid ps-0">
        <div class="row position-relative">
            <?php $this->load->view('dashboard_sekolah/dashboard/navbar_dashboard'); ?>
            <div class="col-md-10">
                <div class="row bg-oren px-2 sticky-top" style="height: 48px">
                    <div class="col-md-3 col my-auto fs-6 fw-bold">


                        <a href="https://edunovasi.com" class="text-white" style="text-decoration: none">
                            <img src="https://edunovasi.com/assets/ic/edunovasi-logo-baru.png" class="img-fluid"
                                style="height: 30px; width: 120px" />
                        </a>
                    </div>
                    <div class="col-md-9 col-2 bg-oren my-auto text-end">
                        <a href="<?php echo base_url('logout')?>" class="text-primary" style="text-decoration: none">
                            <i class="fas fa-sign-out ps-3"></i>Logout
                        </a>
                    </div>
                    <div class="col-1 bg-oren my-auto text-end d-block d-md-none">
                        <a onclick="if (!window.__cfRLUnblockHandlers) return false; showhidemenu()"
                            class="text-primary" style="text-decoration: none"
                            data-cf-modified-dc47533cf8d45be8f58340ab-="">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>

                </div>
                <div class="row px-2 py-4">
                    <div class="col-md-12 small text-uppercase">
                        Sekolah <i class="fas fa-chevron-right mx-2"></i> Event
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-md-12">

                        <div class="row px-2">
                            <div class="col-md-12">
                                <div class="card mb-3">
                                    <div class="card-header pb-0 bg-white">

                                    <table class="table table-bordered ">
                                             <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tgl Mulai</th>
                                                <th>Tgl Selesai</th>
                                                <th>Siswa Mengerjakan</th>
                                                <th>Status</th>

                                             </tr>
                                        
                                        <?php
                                            $no = 1;
                                            foreach ($dataevent as $k => $v) {
                                                if($v['publish_sekolah']==1){
                                                    $publish = "Sudah Publish";
                                                    $tgl_mulai = TanggalIndo($v['tgl_mulai_sekolah']);
                                                    $tgl_selesai = TanggalIndo($v['tgl_selesai_sekolah']);
                                                    $total_siswa = $v['total_siswa'];
                                                }else{
                                                    $publish = "Belum Publish";
                                                    $tgl_mulai = "";
                                                    $tgl_selesai = "";
                                                    $total_siswa = "";
                                                    
                                                }
                                            
                                            ?>
                                            <tr>
                                                 <td><?php echo $no;?></td>
                                                <td><?php echo $v['judul']?></td>
                                                <td><?php echo $tgl_mulai?></td>
                                                <td><?php echo $tgl_selesai?></td>
                                                <td><?php echo $total_siswa?></td>
                                                <td><?php echo $publish?></td>
                                            </tr>

                                       

                                        <?php
                                                $no++;
                                            }
                                            ?>


                                        </table>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('dashboard_sekolah/dashboard/footer_dashboard'); ?>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>