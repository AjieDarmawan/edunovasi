<?php $this->load->view('dashboard_sekolah/dashboard/header_dashboard'); ?>
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
                            <a href="<?php echo base_url('logout')?>" class="text-primary"
                                style="text-decoration: none">
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
                        <!-- <script type="dc47533cf8d45be8f58340ab-text/javascript">
                function showhidemenu() {
                    $("#sec-dashboard").toggleClass("d-none d-md-block");
                    $("#sec-dashboard").toggleClass("position-absolute");
                }
              </script> -->
                    </div>
                    <div class="row px-2 py-4">
                        <div class="col-md-12 small text-uppercase">
                            event <i class="fas fa-chevron-right mx-2"></i> Berjalan
                        </div>
                    </div>
                    <div class="row px-2">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header pb-0">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-SAINTEK-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-SAINTEK" type="button" role="tab"
                                                aria-controls="pills-SAINTEK" aria-selected="true">
                                                SAINTEK
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-SAINTEK" role="tabpanel"
                                            aria-labelledby="pills-SAINTEK-tab">
                                            <div class="row" id="list-SAINTEK">
                                                <div class="col-md-3 divpilihmenu">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <div class="card click cardSAINTEK" id="card-105"
                                                                onclick="if (!window.__cfRLUnblockHandlers) return false; tampilranking('MTA1','SAINTEK','Paket  4- Try Out - UTBK - Event','24 Juni 2022 - 10 Juli 2022','0','1')"
                                                                data-cf-modified-30b481a293135c07ef2ea100-="">
                                                                <div class="card-body py-3">
                                                                    <div class="row">
                                                                        <div class="col-md-12 title">
                                                                            Paket 4- Try Out - UTBK - Event
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div
                                                                                class="d-flex justify-content-start small text-secondary">
                                                                                <div class="me-2">
                                                                                    03 Juli 2022 11:21:49
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-9 divpembahasan">
                                                    <div style="min-height: 50vh" id="pembahasan-SAINTEK">
                                                    

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-header bg-warning py-3">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-md-6 text-start fw-bold my-auto">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-6 text-md-end test-start my-auto small">
                                                                                <img class="img-fluid mb-1 ms-md-5 me-1"
                                                                                    src="https://edunovasi.com/assets/ic/date_biru.svg" />12
                                                                                September 2022
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body p-0 table-responsive">
                                                                        <table
                                                                            class="table table-striped table-hover text-center">
                                                                            <thead class="bg-light p-5">
                                                                                <tr>
                                                                                    <th style="width: 10%">Ranking</th>
                                                                                    <th style="width: 40%"
                                                                                        class="text-start">
                                                                                        Nama
                                                                                    </th>
                                                                                    <th style="width: 7.5%">Skor</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="width: 10%">1</td>
                                                                                    <td style="width: 40%"
                                                                                        class="text-start">
                                                                                        Aprea
                                                                                    </td>
                                                                                    <td style="width: 7.5%">100</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="width: 10%">2</td>
                                                                                    <td style="width: 40%"
                                                                                        class="text-start">
                                                                                        <?php 
             
               
                
              ?>
                                                                                    </td>
                                                                                    <td style="width: 7.5%">90</td>
                                                                                </tr>
                                                                            </tbody>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('dashboard_sekolah/dashboard/footer_dashboard'); ?>