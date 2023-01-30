<?php

$url = $base_api . 'webinar_detail/' . $arr_urinya[4];
$getcurl_webinard = getcurl($url);
if ($getcurl_webinard['status'] == '200') {
    $datawebinard = $getcurl_webinard['data'];
} else {
    header('Location: ' . $inc_, true, 301);
    exit;
}
// eduprint($datawebinard);

if (isset($_POST['btn_pendaftaran'])) {
    unset($_POST['btn_pendaftaran']);
    $postcurl_peserta = postcurl($base_api_user . 'pendaftar_webinar', $_POST);
    $_POST['no_tlp'] = $_POST['no_wa'];
    // eduprint($postcurl_peserta, 1);
    if ($postcurl_peserta['status'] == '200') {
        echo '<script>
        swal.fire({
            icon:"success",
            title:"Pendaftaran Berhasil",
            html:"Kamu sudah terdaftar sebagai peserta webinar ini, silakan join grup wa <br><br><a href=\'' . $datawebinard['share_link'] . '\' target=\'_blank\'>' . $datawebinard['share_link'] . '</a><br><br> dan cek email kamu untuk proses selanjutnya"
        })
        </script>';
    } else if ($postcurl_peserta['status'] == '203') {
        echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Kamu sudah pernah mendaftar pada webinar ini"
        })</script>';
    } else {
        echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Terjadi kesalahan, cek koneksi dalam keadaan stabil dan isian form sudah sesuai"
        })</script>';
    }
}


$data = array();
$data['id_event'] = $arr_urinya[4];
$data['email'] = $sesi['email'];

$sudahterdaftar = '';
$sudahrating = '';
$getcurl_pendaftar = postcurl($base_api . 'get_pendaftar', $data);
if (isset($getcurl_pendaftar['status']) && $getcurl_pendaftar['status'] == '200') {
    $sudahterdaftar = $getcurl_pendaftar['datanya']['id_pendaftar'];
    $sudahrating = $getcurl_pendaftar['datanya']['rating'];
}

$tampilzoom = '';
if ($sudahterdaftar != '' && $datawebinard['publish_zoom'] == '1') {
    $tampilzoom = 'Link zoom sudah tersedia silakan catat tanggal dan waktunya<br>Untuk join Webinar silakan klik link di bawah ini :<br><br><a href="' . $datawebinard['link'] . '" target="_blank">' . $datawebinard['link'] . '</a>';
} else if ($sudahterdaftar != '' && $datawebinard['publish_zoom'] == '0') {
    $tampilzoom = 'Link Zoom belum tersedia, Silakan join Group WA untuk kabar terupdate<br><br><a href="' . $datawebinard['share_link'] . '" target="_blank">' . $datawebinard['share_link'] . '</a>';
} else {
    if ($datawebinard['publish_zoom'] == '2') {
        $tampilzoom = 'Webinar telah berakhir, jika kamu sudah mengikuti webinar ini kamu bisa memberi rating dengan cara login menggunakan email peserta webinar kamu</span>.';
    } else {
        // $tampilzoom = 'Link zoom akan ditampilkan di sini atau dikirimkan melalui email jika kamu sudah mendaftar sebagai peserta webinar, <span class="text-danger fw-bold">isi form peserta di bawah ini untuk mengikuti webinar</span>.';
        $tampilzoom = 'Isi form peserta dibawah ini untuk <span class="text-danger fw-bold">masuk ke dalam grup WhatsApp</span>. Link zoom akan disampaikan didalam grup WhatsApp tersebut.';
    }
}

?>
<style>
    #detail .card {
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
    }

    #detail .card .title {
        font: normal normal bold 24px/32px Open Sans;
        color: #000000;
    }

    #detail .card .subtitle {
        font: normal normal normal 18px Open Sans;
        color: #152955;
    }

    #detail .card .grupdesc .label {
        font: normal normal bold 16px/21px Open Sans;
        letter-spacing: 0px;
        color: #000000;
    }

    #detail .card .grupdesc .nama {
        font: normal normal bold 18px/19px Open Sans;
        letter-spacing: 0px;
        color: #152955;
    }

    #detail .card .grupdesc .desc {
        font: normal normal normal 14px/19px Open Sans;
        letter-spacing: 0px;
        color: #000000;
    }

    #detail .card .grupdesc .waktu {
        font: normal normal bold 14px/19px Open Sans;
        letter-spacing: 0px;
        color: #000000;
    }

    #detail .card .keterangan {
        border: 1px solid #A2A2A2;
        border-radius: 4px;
        font: normal normal normal 14px Open Sans;
        color: #000000;
    }

    .form-label {
        font-weight: bold;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 50px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>

<section id="detail" class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $datawebinard['foto'] ?>" class="img-fluid rounded-start" alt="<?php echo $datawebinard['topik'] ?>">
                        </div>
                        <div class="col-md-8 p-2">
                            <div class="card-body">
                                <div class="title mb-2"><?php echo $datawebinard['topik'] ?></div>
                                <div class="subtitle mb-4"><?php echo $datawebinard['desc'] ?></div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="grupdesc mb-4">
                                            <div class="label mb-3">Pembicara</div>
                                            <div class="nama mb-2"><?php echo $datawebinard['pembicara'] ?></div>
                                            <div class="desc mb-2"><?php echo $datawebinard['jabatan_pembicara'] ?></div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <?php if ($datawebinard['moderator'] != '' && $datawebinard['moderator'] != '-') { ?>
                                            <div class="grupdesc mb-4">
                                                <div class="label mb-3">Moderator/MC</div>
                                                <div class="nama mb-2"><?php echo $datawebinard['moderator'] ?></div>
                                                <div class="desc mb-2"><?php echo $datawebinard['jabatan_moderator'] ?></div>
                                            </div>
                                        <?php } ?>
                                    </div> -->
                                </div>
                                <div class="grupdesc mb-5">
                                    <div class="label mb-3">Tanggal & Waktu</div>
                                    <div class="row waktu mb-2">
                                        <div class="col-md-3">
                                            <i class="far fa-calendar me-2"></i><?php echo $datawebinard['tanggal'] ?>
                                        </div>
                                        <div class="col-md-3">
                                            <i class="far fa-clock me-2"></i><?php echo $datawebinard['waktu'] ?> WIB
                                        </div>
                                    </div>
                                </div>

                                <?php

                                if ($sudahterdaftar != '' && $datawebinard['publish_zoom'] == '2') {
                                ?>

                                    <?php

                                    if ($sudahrating != '' && $datawebinard['publish_zoom'] == '2') {
                                    ?>

                                        <div class="grupdesc">
                                            <div class="label mb-3">Rating kamu :</div>
                                            <div class="row">
                                                <div class="col-1 my-md-auto">
                                                    <i class="fas fa-star fs-1 text-warning"></i>
                                                </div>
                                                <div class="col my-md-auto">
                                                    <span class="display-5 fw-bold"><?php echo $sudahrating ?></span>
                                                    <span class="fs-4 text-secondary">/6</span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="keterangan p-3 pb-4">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    Beri rating untuk webinar ini :
                                                    <?php echo $sudahrating; ?>
                                                </div>
                                                <div class="col-md-12">

                                                    <div class="rate">
                                                        <input type="radio" id="star10" name="rate" value="10" onclick="sendrating('10')" />
                                                        <label for="star10" title="Amat Sangat Baik">10 stars</label>
                                                        <input type="radio" id="star9" name="rate" value="9" onclick="sendrating('9')" />
                                                        <label for="star9" title="Sangat Baik">9 stars</label>
                                                        <input type="radio" id="star8" name="rate" value="8" onclick="sendrating('8')" />
                                                        <label for="star8" title="Baik">8 stars</label>
                                                        <input type="radio" id="star7" name="rate" value="7" onclick="sendrating('7')" />
                                                        <label for="star7" title="Cukup Baik">7 stars</label>
                                                        <input type="radio" id="star6" name="rate" value="6" onclick="sendrating('6')" />
                                                        <label for="star6" title="Lumayan">6 stars</label>
                                                        <input type="radio" id="star5" name="rate" value="5" onclick="sendrating('5')" />
                                                        <label for="star5" title="Cukup">5 stars</label>
                                                        <input type="radio" id="star4" name="rate" value="4" onclick="sendrating('4')" />
                                                        <label for="star4" title="Agak Kurang">4 stars</label>
                                                        <input type="radio" id="star3" name="rate" value="3" onclick="sendrating('3')" />
                                                        <label for="star3" title="Kurang">3 stars</label>
                                                        <input type="radio" id="star2" name="rate" value="2" onclick="sendrating('2')" />
                                                        <label for="star2" title="Sangat Kurang">2 stars</label>
                                                        <input type="radio" id="star1" name="rate" value="1" onclick="sendrating('1')" />
                                                        <label for="star1" title="Amat Sangat Kurang">1 star</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }
                                } else { ?>

                                    <div class="keterangan p-3">
                                        <?php echo $tampilzoom ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php if ($sudahterdaftar == '' && $datawebinard['publish_zoom'] != '2') { ?>
    <section id="gabung" class="py-4 bg-oren">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-md-start text-center my-auto fw-bold fs-4 text-white">Form Pendaftaran <?php echo $datawebinard['topik'] ?></div>
                <!-- <div class="col-md-2 text-md-end text-center my-auto">
                <button class="btn btn-primary btn-sm fw-bold px-4">Bergabung</button>
            </div> -->

                <div class="col-md-12 my-4">
                    <form id="form-peserta" method="POST">
                        <div class="card shadow-sm" style="border-radius:16px">
                            <div class="card-body p-md-4 pb-md-5">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $sesi['nama'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $sesi['email'] ?>" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                            <option selected value="">Pilih Jenis</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="usia" class="form-label">Usia</label>
                                        <input type="number" class="form-control" id="usia" name="usia" value="" required min="1" max="99">
                                    </div>
                                    <!-- <div class="col-md-4">
                                    <label for="no_tlp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="" value="<?php echo $sesi['no_tlp'] ?>" required>
                                </div> -->
                                    <div class="col-md-4">
                                        <label for="no_wa" class="form-label">No Whatsapp</label>
                                        <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="" value="<?php echo $sesi['no_wa'] ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="provinsi" class="form-label">Provinsi</label>
                                        <select id="provinsi" name="provinsi" class="form-select" required>
                                            <option selected value="">Pilih Provinsi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="wilayah" class="form-label">Kota / Kabupaten</label>
                                        <select id="wilayah" name="wilayah" class="form-select" required>
                                            <option selected value="">Pilih Provinsi Dahulu</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tingkatan" class="form-label">Status</label>
                                        <select id="tingkatan" name="tingkatan" class="form-select" required>
                                            <option selected value="">Pilih Status</option>
                                            <option value="Siswa">Siswa</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Pekerja">Pekerja</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sumber_informasi" class="form-label">Informasi Webinar</label>
                                        <select id="sumber_informasi" name="sumber_informasi" class="form-select" required>
                                            <option selected value="">Pilih Sumber Informasi</option>
                                            <option value="Instagram @edunovasi">Instagram @edunovasi</option>
                                            <option value="Instagram @edunitas">Instagram @edunitas</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Google">Google</option>
                                            <option value="Rekomendasi Teman">Rekomendasi Teman</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-md-8">
                                                    Untuk melihat daftar materi ujian beserta durasi pengerjaan bisa kamu cek <a href="<?php echo $inc_ ?>/event/materi/<?php echo $arr_urinya[4] ?>" class="w-100 p-2 text-primary fw-bold">Di Sini</a>
                                                </div> -->
                                    <div class="col-md-4 mx-auto mt-md-auto mt-5 text-end">
                                        <input type="hidden" class="form-control" id="id_event" name="id_event" value="<?php echo base64_encode($datawebinard['id_webinar']) ?>" required>
                                        <button type="button" name="btn_pendaftar" id="btn_pendaftar" class="btn btn-sm btn-primary w-100 p-2">Daftar Sekarang</button>
                                        <button type="submit" name="btn_pendaftaran" id="btn_pendaftaran" style="display:none">Untuk Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script>
    getprovinsi();

    $("#provinsi").change(function() {
        getwilayah();
    })

    function getprovinsi(key, origin) {
        let id = "provinsi";
        var jsonfilter = JSON.stringify({
            format: "json",
            formdata_listmod: "Provinsi",
            formdata_origin: "pt",
            formdata_type: "1",
            setdata_mod: "list-wilayah",
            // formdata_groupjkt: 1
        });

        $.ajax({
            url: 'https://api.edunitas.com/mod/edun-load-g',
            type: 'POST',
            crossDomain: true,
            data: jsonfilter,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.response == 'OK') {

                    $('#' + id).empty();
                    var objHtml = '<option value="" readonly>Pilih Provinsi</option>';
                    $('#' + id).append(objHtml);

                    var keterangan = '';
                    var label = '';
                    $.each(res.data, function(i, item) {
                        if (item.nama != '' && item.nama != 'Luar Negeri') {
                            var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '" kode="' + item.kode + '">' + item.nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
                            $('#' + id).append(objHtml);
                        }
                    });
                    if (key) {
                        $('#' + origin).val(key.replace(/ /g, '-'));
                    }
                    $('#' + id).select2({
                        theme: 'bootstrap-5'
                    });
                } else {
                    console.log("Wilayah :", res.message);
                }
            }
        });

    }

    function getwilayah(key, origin) {
        let id = "wilayah";
        let kodenya = $("#provinsi option:selected").attr('kode') ? $("#provinsi option:selected").attr('kode') : '';
        var jsonfilter = JSON.stringify({
            format: "json",
            formdata_origin: "pt",
            formdata_type: "1",
            setdata_mod: "list-wilayah",
            formdata_kode: kodenya,
            formdata_groupjkt: 1
        });

        $.ajax({
            url: 'https://api.edunitas.com/mod/edun-load-g',
            type: 'POST',
            crossDomain: true,
            data: jsonfilter,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {
                if (res.response == 'OK') {

                    $('#' + id).empty();
                    var objHtml = '<option value="" readonly>Pilih Wilayah</option>';
                    $('#' + id).append(objHtml);

                    var keterangan = '';
                    var label = '';
                    $.each(res.data, function(i, item) {
                        var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '">' + item.nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
                        $('#' + id).append(objHtml);
                    });
                    if (key) {
                        $('#' + origin).val(key.replace(/ /g, '-'));
                    }
                    $('#' + id).select2({
                        theme: 'bootstrap-5'
                    });
                } else {
                    console.log("Wilayah :", res.message);
                }
            }
        });

    }


    let base_api = 'https://api.edunitas.com/mod/edun-';

    $("#btn_pendaftar").click(function() {

        let valemail = $('input[name=email]').val();
        $("#btn_pendaftar").attr("disabled", "disabled");
        $("#btn_pendaftar").html("<span class='spinner-grow spinner-grow-sm'></span>Loading..");

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "chekmail",
            formdata_email: valemail
        });

        $.ajax({
            url: base_api + 'regist-g',
            type: 'POST',
            crossDomain: true,
            data: jsondata,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.response == 'OK') {

                    submitregist();

                } else {
                    $("#btn_pendaftar").removeAttr("disabled");
                    $("#btn_pendaftar").html("Daftar Sekarang");
                    $("#btn_pendaftaran").click();
                    // swal.fire({
                    //     title: "Email sudah terdaftar",
                    //     text: "Data latihan ini akan masuk ke history latihan kamu, silakan login dan masuk ke menu dashboard untuk melihat history latihan"
                    // }).then((ok) => {
                    //     lanjutmaterilain(0);
                    // });
                }
            },
            error: function(res) {
                swal.fire({
                    title: "Mohon Maaf",
                    html: "<span class='text-left'>Terjadi kesalahan<br>1. Pastikan kembali email sudah benar / terisi.<br>2. Allow Javascript pada perangkat kamu<br>3. Gangguan koneksi ke server</span>",
                })
                $("#btn_pendaftar").removeAttr("disabled");
                $("#btn_pendaftar").html('Daftar Sekarang');
            }
        });
    });

    function submitregist() {

        let valemail = $('input[name=email]').val();

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "regist",
            formdata_email: $('input[name=email]').val(),
            formdata_nama: $('input[name=nama]').val(),
            formdata_notlp: $('input[name=no_wa]').val(),
            formdata_nowa: $('input[name=no_wa]').val(),
            formdata_lulusan: "SMA",
            formdata_alias: "tryout-p"
        });

        $.ajax({
            url: base_api + 'regist-g',
            type: 'POST',
            crossDomain: true,
            data: jsondata,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.response == 'OK') {

                    $("#btn_pendaftar").removeAttr("disabled");
                    $("#btn_pendaftar").html("Daftar Sekarang");
                    let share_link = "<?php echo $datawebinard['share_link'] ?>";

                    swal.fire({
                        title: "Periksa Email Kamu",
                        html: 'Kami telah mengirimkan akun tryout edunovasi ke email kamu untuk melihat link zoom pada hari penyelenggaraan, selain itu kamu bisa login dan akses ujian tryout atau latihan soal juga loh, silakan join group WA berikut ini <br><br><b><a href="' + share_link + '" target="_blank">' + share_link + '</a></b>',
                    }).then((ok) => {
                        $("#btn_pendaftaran").click();
                    });

                } else {
                    $("#btn_pendaftar").removeAttr("disabled");
                    $("#btn_pendaftar").html("Daftar Sekarang");
                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                    })
                }
                return false;
            },
            error: function(res) {
                swal.fire({
                    title: "Mohon Maaf",
                    html: "<span class='text-left'>Terjadi kesalahan<br>1. Pastikan kembali email sudah benar / terisi/ belum pernah terdaftar sebelumnya.<br>2. Allow Javascript pada perangkat kamu<br>3. Gangguan koneksi ke server</span>",
                })
                $("#btn_pendaftar").removeAttr("disabled");
                $("#btn_pendaftar").html('Daftar Sekarang');
            }
        });
        return false;
    }

    function sendrating(rate) {

        $.ajax({
            url: '<?php echo $base_api_user ?>rating',
            type: 'POST',
            crossDomain: true,
            data: {
                "rating": rate,
                "id_pendaftar": "<?php echo $sudahterdaftar ?>"
            },
            dataType: 'json',
            success: function(res) {
                console.log(res);
            }
        });
    }
</script>