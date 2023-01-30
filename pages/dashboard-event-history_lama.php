<?php
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
                                                    <div class="card click card<?php echo $key ?>" id="card-<?php echo $v['id_peserta'] ?>" onclick="tampilnilai('<?php echo $v['id_event'] ?>','<?php echo $v['id_peserta'] ?>','<?php echo $key ?>','<?php echo $no ?>')">
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
                                        <div class="card">
                                            <div class="card-body px-2" style="min-height:50vh" id="pembahasan-<?php echo $key ?>">

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
    function tampilnilai(id_eventnya, id_pesertanya, div_id, no) {

        $(".card" + div_id).removeClass("bg-primary");
        $("#card-" + id_pesertanya).addClass("bg-primary");

        var kiriman = JSON.stringify({
            email: "<?php echo $sesi['email'] ?>",
            id_peserta: id_pesertanya,
            id_event: id_eventnya,
        });

        $.ajax({
            url: '<?php echo $base_api_dashboard; ?>cari_nilai/',
            type: 'POST',
            crossDomain: true,
            data: {
                "data": kiriman
            },
            // contentType: 'application/json',
            dataType: 'json',
            success: function(res) {
                console.log(res);
                let tglevent = res.tgl_selesai2;
                let tglsekarang = "<?php echo date('Ymd'); ?>";

                if (tglsekarang > tglevent) {
                    $("#pembahasan-" + div_id).html(`
                
                    <div class="row p-md-3 mb-4">
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
                        <div class="col-md-6 bg-warning rounded shadow-sm d-flex">
                            <div class="my-auto mx-auto d-flex">
                                <div class="fs-4 my-auto me-2">Skor :</div>
                                <div class="fw-bold text-primary display-4 my-auto">${res.skor}</div>
                            </div>
                        </div>
                    </div>
                    `);
                }
                $("#pembahasan-" + div_id).empty();

                // if (tglsekarang > tglevent) {
                //     tampilpembahasan(id_eventnya, id_pesertanya, div_id);
                // } else {
                $("#pembahasan-" + div_id).append(`                
                    <div class="card py-3">
                        <div class="card-body" style="min-height:50vh">
                            <div class="row g-2">
                                <div class="col-md-12 mb-4 text-center">
                                    <img class="img-fluid" src="<?php echo $inc_ ?>/assets/img/empty-success.png">
                                </div>
                                <div class="col-md-12 text-primary fs-6 text-center">
                                    <span class="fw-bold fs-5">Pembahasan dan Nilai dalam proses penghitungan IRT</span><br>
                                    Pembahasan dari setiap soal beserta jawaban dapat dilihat dan di unduh setelah penghitungan selesai.<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    `);
                // }
            }
        });
    }


    function tampilpembahasan(id_eventnya, id_pesertanya, div_id) {

        var print_event = btoa(id_eventnya + "~" + id_pesertanya);

        var kiriman = JSON.stringify({
            email: "<?php echo $sesi['email'] ?>",
            id_peserta: id_pesertanya,
            id_event: id_eventnya,
        });

        $.ajax({
            url: '<?php echo $base_api_dashboard; ?>pembahasan/',
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
                                    namapilihan = "<img src='" + vp.name + "' class='img-fluid'>";
                                }
                                pilihan += abcd + ". " + namapilihan + "<br>";
                            });

                            let jawabannya = soal.pilihan[arrjawaban].name;
                            if (soal.pilihan[arrjawaban].type == 'gambar') {
                                jawabannya = "<img src='" + soal.pilihan[arrjawaban].name + "' class='img-fluid'>";
                            }
                            jawabannya = arrabcde[arrjawaban] + ". " + jawabannya;

                            let jawab = "Tidak terjawab"
                            if (arrjawab >= 0) {
                                jawab = soal.pilihan[arrjawab].name;
                                if (soal.pilihan[arrjawab].type == 'gambar') {
                                    jawab = "<img src='" + soal.pilihan[arrjawab].name + "' class='img-fluid'>";
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

                    $("#pembahasan-" + div_id).append(`
                        <row class="my-3">
                            <div class="col-md-12 text-end">
                                Download soal event dan pembahasan&nbsp;
                                <b>
                                    <a target="_blank" href="<?php echo $inc_ ?>/print/event/${print_event}">
                                        di sini
                                        <img class="img-fluid mb-1" src="<?php echo $inc_ ?>/assets/icon/filedownload.svg">
                                    </a>
                                </b>
                            </div>   
                        </row>                 
                        <div class="accordion accordion-flush" id="accordion${id_pesertanya}">

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