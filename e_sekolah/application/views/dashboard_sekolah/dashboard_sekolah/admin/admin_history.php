<?php $this->load->view('dashboard_sekolah/dashboard/header_dashboard'); ?>
<?php 
$sesi = $this->session->userdata('userdata');
$data = array();
//$data['email'] = "ajie.darmawan106@gmail.com";
$data['id_sekolah'] = $sesi['id_sekolah'];



$getcurl_event = postcurl(api_m_sekolah_dashboard() . 'event_ranking_sekolah', $data);





if ($getcurl_event['status'] == '200') {
    $dataevent = $getcurl_event['data'];
} else {
    $dataevent = array();
}
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
                        Sekolah <i class="fas fa-chevron-right mx-2"></i> History
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-md-12">

                        <?php
        if (empty($dataevent)) {
        ?>
                        <div class="card">
                            <div class="card-body" style="min-height:50vh">
                                <div class="row g-2">
                                    <div class="col-md-12 mb-4 text-center">
                                        <img class="img-fluid"
                                            src="<?php echo base_url('')?>assets/img/empty-state.png">
                                    </div>
                                    <div class="col-md-12 text-primary fs-6 text-center">
                                        <span class="fw-bold fs-5">Kamu belum mengikuti Event</span><br>
                                        Silakan ikuti event dan uji kesiapan Kamu dalam menghadapi ujian
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
                                        <button class="nav-link <?php echo $active ?>" id="pills-<?php echo $key ?>-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-<?php echo $key ?>"
                                            type="button" role="tab" aria-controls="pills-<?php echo $key ?>"
                                            aria-selected="true"><?php echo $key ?></button>
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

                                    <div class="tab-pane fade <?php echo $active ?>" id="pills-<?php echo $key ?>"
                                        role="tabpanel" aria-labelledby="pills-<?php echo $key ?>-tab">

                                        <div class="row g-3" id="list-<?php echo $key ?>">
                                            <div class="col-md-3 divpilihmenu">
                                                <div class="row g-3">

                                                    <?php
                                            $no = 0;
                                            foreach ($dataevent[$key] as $k => $v) {
                                                $tglevent = $v['tgl_selesai2'];
                                                $tglsekarang = date('Ymd');
                                                $show = '1';
                                                if ($tglsekarang > $tglevent) {
                                                    $show = '1';
                                                }
                                                // eduprint($v);
                                            ?>
                                                            <div class="col-md-12">
                                                                <div class="card click card<?php echo $key ?>"
                                                                    id="card-<?php echo base64_decode($v['id_event']) ?>"
                                                                    onclick="tampilranking('<?php echo $v['id_event'] ?>','<?php echo $key ?>','<?php echo $v['judul'] ?>','<?php echo $v['tgl_mulai'] . ' - ' . $v['tgl_selesai'] ?>','<?php echo $no ?>','<?php echo $show ?>')">
                                                                    <div class="card-body py-3">
                                                                        <div class="row">
                                                                            <div class="col-md-12 title">
                                                                                <?php echo $v['judul'] ?></div>
                                                                            <div class="col-md-12">
                                                                                <div
                                                                                    class="d-flex justify-content-start small text-secondary">
                                                                                    <div class="me-2">
                                                                                        <?php echo $v['waktu_mengerjakan'] ?>
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
                                            <div class="col-md-9 divpembahasan">
                                                <div class="card">
                                                    <div class="card-body px-2" style="min-height:50vh"
                                                        id="pembahasan-<?php echo $key ?>">

                                                        <div class="row g-2 py-3">
                                                            <div class="col-md-12 mb-4 text-center">
                                                                <img class="img-fluid"
                                                                    src="<?php echo base_url('')?>assets/img/empty-state.png">
                                                            </div>
                                                            <div class="col-md-12 text-primary fs-6 text-center">
                                                                <span class="fw-bold fs-5">Tidak ada data
                                                                    ditampilkan</span><br>
                                                                Klik List di samping untuk menampilkan data
                                                            </div>
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

            </div>
        </div>
    </div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


<?php $this->load->view('dashboard_sekolah/dashboard/footer_dashboard'); ?>


<script>
function tampilnilai(id_eventnya, id_pesertanya, div_id, no) {

    //alert(div_id);

    $("#pembahasan-" + div_id).empty();
    let loading = `    
            <div class="row g-2 py-3">
                <div class="col-md-12 text-center">
                    <img class="img-fluid" src="<?php echo base_url('')?>assets/img/empty-success.png">
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
                    Memuat data nilai dan pembahasan ...
                </div>                
            </div>
        `;
    $("#pembahasan-" + div_id).html(loading);

    $(".card" + div_id).removeClass("bg-primary");
    $("#card-" + id_pesertanya).addClass("bg-primary");

    var kiriman = JSON.stringify({
        email: "<?php echo $data['email'] ?>",
        id_peserta: id_pesertanya,
        id_event: id_eventnya,
    });

    $.ajax({
        url: '<?php echo api_m_sekolah_dashboard(); ?>cari_nilai/',
        type: 'POST',
        crossDomain: true,
        data: {
            "data": kiriman
        },
        // contentType: 'application/json',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            let tglevent = res.tgl_selesai2;
            let tglsekarang = "<?php echo date('Ymd'); ?>";
            let skor_jumlah = 0;
            let skor_average = 0;
            let skor_average_hasil = 0;
            let nilai_irt = '';

            $("#pembahasan-" + div_id).empty();

            $.ajax({
                url: '<?php echo api_m_sekolah_dashboard(); ?>hasil_skor_irt/',
                type: 'POST',
                crossDomain: true,
                data: {
                    "data": kiriman
                },
                dataType: 'json',
                success: function(respon) {
                    $.each(respon.data, function(key, val) {
                        console.log(val);

                        let no = 0;
                        let list_nilai_materi = '';
                        $.each(val, function(k, irt) {
                            let light = "bg-light";
                            if (no % 2 == 0) {
                                light = "";
                            } else {
                                light = "bg-light";
                            }

                            list_nilai_materi += `
                                        <div class="row border-bottom py-1 ${light}">
                                            <div class="col-md-4 col-8 text-start my-auto fw-bold">
                                                ${ irt['materi_nama'] }
                                            </div>
                                            <div class="col-md-2 col-4 text-center my-auto fw-bold">
                                                ${ irt['skor'] }
                                            </div>
                                            <div class="col-md-2 col-4 text-center my-md-auto my-3">
                                                <div class="d-block d-md-none">Benar : </div>${ irt.data_skor.skor_benar?irt.data_skor.skor_benar:'-' }
                                            </div>
                                            <div class="col-md-2 col-4 text-center my-md-auto my-3">
                                                <div class="d-block d-md-none">Salah : </div>${ irt.data_skor.skor_salah?irt.data_skor.skor_salah:'-' }
                                            </div>
                                            <div class="col-md-2 col-4 text-center my-md-auto my-3">
                                                <div class="d-block d-md-none">Kosong : </div>${ irt.data_skor.skor_kosong?irt.data_skor.skor_kosong:'-' }
                                            </div>
                                        </div>`;

                            no++;
                            skor_average = skor_average + parseFloat(irt[
                                'skor']);
                            skor_jumlah++;
                        });
                        nilai_irt += `
                                <div class="row mb-3 g-3">
                                    <div class="col-md-12 fw-bold bg-secondary p-2 px-3">${ val[0]['jenis_label'] }</div>
                                    <div class="col-md-12 px-3" id="tps">
                                        ${list_nilai_materi}
                                    </div>
                                </div> 
                                `;
                    });
                    skor_average_hasil = skor_average / skor_jumlah;
                    console.log(skor_average);
                    console.log(skor_average_hasil);
                    console.log(skor_jumlah);

                    dom_irt = '';

                    dom_skor = `                            
                            <div class="col-md-6 bg-warning rounded shadow-sm d-flex">
                                <div class="my-auto mx-auto d-flex">
                                    <div class="fs-5 my-auto me-2">Skor dalam proses perhitungan</div>
                                </div>
                            </div>
                            `;

                    if (skor_average_hasil > 0) {

                        dom_skor = `                            
                                    <div class="col-md-6 bg-warning rounded shadow-sm d-flex my-3 my-md-1">
                                        <div class="my-auto mx-auto d-flex">
                                            <div class="fs-4 my-auto me-2">Skor :</div>
                                            <div class="fw-bold text-primary display-4 my-auto py-3">${skor_average_hasil.toFixed(2)}</div>
                                        </div>
                                    </div>
                                `;

                        dom_irt += `                                
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <div class="card h-100">
                                                <div class="card-header fw-bold bg-white py-3">
                                                    <div class="row">
                                                        <div class="col-md-4 col-8 text-start">Daftar Materi</div>
                                                        <div class="col-md-2 col-4 text-center">Skor</div>
                                                        <div class="col-md-2 d-none d-md-block text-center">Benar</div>
                                                        <div class="col-md-2 d-none d-md-block text-center">Salah</div>
                                                        <div class="col-md-2 d-none d-md-block text-center">Tdk Jawab</div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 px-2 card-border">
                                                    ${nilai_irt}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

                    }

                    let dom_nilai = `
                                <div class="row p-md-3 mb-3">
                                    <div class="col-md-6 fs-5">
                                        <div class="row">
                                            <div class="col-6">Benar</div>
                                            <div class="col-1">:</div>
                                            <div class="col-4"><span class="fw-bold text-success fs-4">${res.benar}</span></div>
                                            <div class="col-6">Salah</div>
                                            <div class="col-1">:</div>
                                            <div class="col-4"><span class="fw-bold text-danger fs-4">${res.salah}</span></div>
                                            <div class="col-6">Tidak Dijawab</div>
                                            <div class="col-1">:</div>
                                            <div class="col-4"><span class="fw-bold text-secondary fs-4">${res.kosong}</span></div>
                                        </div>
                                    </div> 
                                    ${dom_skor}
                                    <div class="col-md-12"><hr></div>
                                    <div class="col-md-12 small alert alert-danger">
                                        Note :<br>
                                        Selama event berlangsung, skor IRT dapat berubah berdasarkan jumlah peserta yang mengikuti ujian dan akan diupdate setiap 3 jam sekali.
                                    </div>
                                </div>
                                ${dom_irt}
                            `;

                    $("#pembahasan-" + div_id).html(dom_nilai);

                    tampilpembahasan(id_eventnya, id_pesertanya, div_id);
                }
            });

            if (tglsekarang > tglevent) {

            } else {
                // $("#pembahasan-" + div_id).append(`
                // <div class="row g-2 py-3">
                //     <div class="col-md-12 mb-4 text-center">
                //         <img class="img-fluid" src="<?php echo base_url('')?>assets/img/empty-success.png">
                //     </div>
                //     <div class="col-md-12 text-primary fs-6 text-center">
                //         <span class="fw-bold fs-5">Pembahasan dan Nilai belum dapat dilihat</span><br>
                //         Pembahasan dari setiap soal beserta jawaban dapat dilihat dan di unduh setelah event berakhir.<br>
                //     </div>
                // </div>
                // `);
            }

        }
    });
}


function tampilpembahasan(id_eventnya, id_pesertanya, div_id) {

    var print_event = btoa(id_eventnya + "~" + id_pesertanya);

    var kiriman = JSON.stringify({
        email: "<?php echo $data['email'] ?>",
        id_peserta: id_pesertanya,
        id_event: id_eventnya,
    });

    $.ajax({
        url: '<?php echo api_m_sekolah(); ?>pembahasan/',
        type: 'POST',
        crossDomain: true,
        data: {
            "data": kiriman
        },
        dataType: 'json',
        success: function(res) {


            let pembahasan = '';
            let no = 1;
            $.each(res, function(index, data) {
                $.each(data, function(k, v) {

                    let nom = 1;
                    let arrabcde = ["A", "B", "C", "D", "E", ""];
                    let isinya = '';
                    $.each(v, function(id, soal) {
                        let style = "";
                        let arrjawaban = (parseInt(soal.jawaban) - 1);
                        let arrjawab = (parseInt(soal.jawaban_anda) - 1);
                        if (arrjawaban !== arrjawab) {
                            style = "text-danger";
                        }

                        let pilihan = '';
                        // console.log('soal', soal.pilihan);
                        $.each(soal.pilihan, function(kp, vp) {
                            let abcd = '';
                            if (kp == '0') {
                                abcd = 'A';
                            } else if (kp == '1') {
                                abcd = 'B';
                            } else if (kp == '2') {
                                abcd = 'C';
                            } else if (kp == '3') {
                                abcd = 'D';
                            } else if (kp == '4') {
                                abcd = 'E';
                            }
                            namapilihan = vp.name;
                            if (vp.type == 'gambar') {
                                namapilihan = "<img src='" + vp.name +
                                    "' class='img-fluid'>";
                            }
                            pilihan += abcd + ". " + namapilihan + "<br>";
                        });

                        let jawabannya = soal.pilihan[arrjawaban].name;
                        if (soal.pilihan[arrjawaban].type == 'gambar') {
                            jawabannya = "<img src='" + soal.pilihan[arrjawaban]
                                .name + "' class='img-fluid'>";
                        }
                        jawabannya = arrabcde[arrjawaban] + ". " + jawabannya;

                        let jawab = "Tidak terjawab"
                        if (arrjawab >= 0) {
                            jawab = soal.pilihan[arrjawab].name;
                            if (soal.pilihan[arrjawab].type == 'gambar') {
                                jawab = "<img src='" + soal.pilihan[arrjawab].name +
                                    "' class='img-fluid'>";
                            }
                            jawab = arrabcde[arrjawab] + ". " + jawab;
                        }


                        isinya += `                        
                            <div class="row g-3 py-4 border-bottom">

                                <div class="col-md-2 fw-bold">No : </div>
                                <div class="col-md-10">${nom}</div>
                                <div class="col-md-2 fw-bold">
                                    Pertanyaan :
                                </div>
                                <div class="col-md-10">
                                    ${soal.img!='' ? "<img src='"+soal.img+"' class='img-fluid'><br><br>" : ''}
                                    ${tag_replace(nl2br(soal.pertanyaan))}
                                    <div class="my-2">
                                    ${tag_replace(pilihan)}
                                    </div>
                                </div>
                                <div class="col-md-2 fw-bold">
                                    Jawaban Benar :
                                </div>
                                <div class="col-md-10">
                                    ${ tag_replace(jawabannya) }
                                </div>
                                <div class="col-md-2 bg-nilai py-2 fw-bold">
                                    Pembahasan Soal :
                                </div>
                                <div class="col-md-10 bg-nilai py-2">
                                    ${tag_replace(nl2br(soal['pembahasan']))}
                                    ${soal.pembahasan_img!='' ? "<br><br><img src='"+soal.pembahasan_img+"' class='img-fluid'>" : ''}
                                </div>
                                <div class="col-md-2 fw-bold">
                                    Jawaban Anda :
                                </div>
                                <div class="col-md-9 ${style}">
                                    ${ tag_replace(jawab) } 
                                </div>
                            </div>
                        `;
                        nom++;

                    });

                    pembahasan += `

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading${k}">
                                <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${k}" aria-expanded="true" onclick="window.location.href='#accordion${id_pesertanya}'">
                                    Pembahasan ${no +' - ' +v[0].materi_nama} :
                                </button>
                            </h2>
                            <div id="collapse${k}" class="accordion-collapse collapse" aria-labelledby="heading${k}" data-bs-parent="#accordion${id_pesertanya}">
                                <div class="accordion-body p-2">

                                    <div class="card">
                                        <div class="card-body py-0">
                                            ${isinya}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        `;

                });
                no++;
            });

            if (pembahasan !== '') {

                $("#pembahasan-" + div_id).prepend(`
                        <div class="mb-3">
                            <div class="col-md-12 text-end">
                                Download soal event dan pembahasan&nbsp;
                                <b>
                                    <a target="_blank" href="<?php echo base_url('')?>print/event_irt/${print_event}">
                                        di sini
                                        <img class="img-fluid mb-1" src="<?php echo base_url('')?>assets/icon/filedownload.svg">
                                    </a>
                                </b>
                            </div>   
                        </div>         
                    `);
                $("#pembahasan-" + div_id).append(`
                        <div class="accordion accordion-flush mt-5" id="accordion${id_pesertanya}">

                        </div>
                    `);
                $("#accordion" + id_pesertanya).append(pembahasan);
            }


        }
    });

}

function nl2br(str, is_xhtml) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
</script>


<script>
function tampilranking(id_eventnya, div_id, judul, tgl, no, show) {


    // alert(show);


    $("#pembahasan-" + div_id).empty();
    let loading = `    
            <div class="row g-2 py-3">
                <div class="col-md-12 text-center">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/empty-success.png') ?>">
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
                    Memuat data ranking 30 besar ujian ...
                </div>                
            </div> 
        `;
    $("#pembahasan-" + div_id).html(loading);
    $(".card" + div_id).removeClass("bg-primary");
    $("#card-" + atob(id_eventnya)).addClass("bg-primary");

    if (show == '1') {
        var kiriman = JSON.stringify({
            email: "<?php echo $sesi['email'] ?>",
            id_event: atob(id_eventnya),
            id_sekolah: "<?php echo $sesi['id_sekolah'] ?>",
        });


        $.ajax({
            url: '<?php echo api_m_sekolah_dashboard(); ?>list_hasil_rangking/',
            type: 'POST',
            crossDomain: true,
            data: {
                "data": kiriman
            },
            // contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.status == '400') {

                    let proses = `    
                    <div class="row g-2 py-3">
                        <div class="col-md-12 text-center">
                            <img class="img-fluid" src="<?php echo base_url() ?>/assets/img/empty-success.png">
                        </div>
                        <div class="col-md-12 mt-3 text-primary fs-6 text-center">
                            Ranking sedang dalam proses perhitungan IRT
                        </div>                
                    </div>
                `;
                    $("#pembahasan-" + div_id).html(proses);

                } else {


                    let posisi = '';
                    let peserta = '<i class="fas fa-users me-1 mb-1"></i> Data Yang Mengerjakan';

                    let no = 1;
                    let listrank = '';
                    $.each(res, function(key, val) {
                        if (no < 4) {
                            rank =
                                "";
                        } else {
                            rank = "";
                        }
                        let bg = "";
                        if (val.email == "<?php echo $sesi['email'] ?>") {
                            bg = "bg-oren text-white";
                        }

                        listrank +=
                            `<tr class="">
                        <th>${rank+no}</th>
                        <td class="text-start">${val['nama']}</td>
                        <td class="text-start">${val['waktu_pengerjaan']}</td>
                        <td><a href='<?php echo base_url('dashboard/admin/sekolah_detail/')?>${btoa(val['id_peserta'])}/${btoa(val['email'])}'>Detail</a></td>
                    </tr>`;
                        no++;
                    });
                    // <td>${val['waktu']} Menit</td>
                    // <td>${val['waktu_pengerjaan']}</td>

                    $("#pembahasan-" + div_id).empty();

                    $("#pembahasan-" + div_id).html(`
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-warning py-3">
                                    <div class="row">
                                        <div class="col-md-6 text-start fw-bold my-auto">
                                            <span class="posisikamu_bakcup"></span><br>
                                            <span class="totalpeserta">${peserta}</span>
                                        </div>
                                        <div class="col-md-6 text-md-end test-start my-auto small">
                                            <img class="img-fluid mb-1 ms-md-5 me-1" src="<?php echo base_url() ?>/assets/ic/date_biru.svg">${tgl}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table table-striped table-hover text-center">
                                        <thead class="bg-light p-5">
                                            <tr>
                                                <th style="width:10%">No</th>
                                                <th style="width:20%" class="text-start">Nama</th>
                                                <th style="width:20%" class="text-start">Waktu Pengerjaan</th>
                                                <th style="width:7.5%">Detail</th>
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
                    // <th style="width:15%">Durasi Pengerjaan</th>
                    // <th style="width:17.5%">Waktu Mengerjakan</th>


                    var kirimanposisi = JSON.stringify({
                        email: "<?php echo $sesi['email'] ?>",
                        id_sekolah: "<?php echo $sesi['id_sekolah'] ?>",
                        id_event: id_eventnya,
                    });

                    $.ajax({
                        url: '<?php echo api_m_sekolah_dashboard(); ?>check_posisi_rangking/',
                        type: 'POST',
                        crossDomain: true,
                        data: {
                            "data": kirimanposisi
                        },
                        // contentType: 'application/json',
                        dataType: 'json',
                        success: function(res) {
                            if (res.status != '400') {
                                $(".posisikamu").html(
                                    `<i class="fas fa-trophy me-2 mb-1"></i> Ranking : ${res.posisi}, Skor :  ${res.skor}`
                                );
                                $(".totalpeserta").html(
                                    `<i class="fas fa-users me-1 mb-1"></i> Total Peserta : ${res.totalpeserta}`
                                );
                            } else {
                                $(".posisikamu").html(
                                    `<i class="fas fa-trophy me-2 mb-1"></i> Skor Kamu : Proses Perhitungan`
                                );
                            }
                        }
                    });

                }

            },
            error: function(res) {

                let loading = `    
                    <div class="row g-2 py-3">
                        <div class="col-md-12 mb-4 text-center">
                            <img class="img-fluid" src="<?php echo base_url() ?>/assets/img/empty-success.png">
                        </div>
                        <div class="col-md-12 text-primary fs-6 text-center">
                            <span class="fw-bold fs-5">Ranking sedang dalam proses perhitungan IRT</span><br>
                            Ranking akan terbuka setelah event berakhir dan proses perhitungan selesai.<br>
                        </div>
                    </div>
                    `;
                $("#pembahasan-" + div_id).html(loading);
            }
        });
    } else {
        let loading = `    
            <div class="row g-2 py-3">
                <div class="col-md-12 mb-4 text-center">
                    <img class="img-fluid" src="<?php echo base_url() ?>/assets/img/empty-success.png">
                </div>
                <div class="col-md-12 text-primary fs-6 text-center">
                    <span class="fw-bold fs-5">Ranking sedang dalam proses perhitungan IRT</span><br>
                    Ranking akan terbuka setelah event berakhir dan proses perhitungan selesai.<br>
                </div>
            </div>
            `;
        $("#pembahasan-" + div_id).html(loading);
    }

}
</script>