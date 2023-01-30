<?php
if (isset($_POST['btn_pendaftaran'])) {
    unset($_POST['btn_pendaftaran']);
    $_POST['no_telp'] = $_POST['no_wa'];
    $postcurl_peserta = postcurl($base_api . 'pendaftar', $_POST);
    // eduprint($postcurl_peserta, 1);
    if ($postcurl_peserta['status'] == '200') {
        $linknya = "https://t.me/+IzkjdTQRqhcyNTVl";
        echo '<script>
        swal.fire({ 
            icon: "success",
            title: "Pendaftaran Berhasil",
            text: "Kamu sudah terdaftar sebagai calon peserta Ujian, yuk join di grup #TemanBelajar edunovasi"
        }).then((ok) => {
            window.location.href="' . $linknya . '";
        }); 
        </script>';
    } else if ($postcurl_peserta['status'] == '203') {
        echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Kamu sudah pernah mendaftar pada event ini"
        })
        </script>';
    } else {
        echo '<script>
        swal.fire({
            icon:"info",
            title:"Mohon Maaf",
            text:"Terjadi kesalahan, cek koneksi dalam keadaan stabil dan isian form sudah sesuai"
        })
        </script>';
    }
}

?>
<style>
    .title {
        font: normal normal bold 24px/33px Open Sans;
        letter-spacing: 0px;
        color: #111111;
    }

    .subtitle {
        font: normal normal normal 19px/26px Open Sans;
        letter-spacing: 0px;
        color: #195030;
    }

    #detail-event .card {
        border-radius: 8px;
    }

    #detail-event .card-header {
        background: #FCBF49 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border: 1px solid #003049;
        border-radius: 8px 8px 0px 0px;
        color: #003049;
    }

    #detail-event .btn {
        font: normal normal bold 16px Open Sans;
        letter-spacing: 0px;
        color: #fff;
    }

    .form-label {
        color: #003049;
        font-weight: bold;
        font-size: 14px;
    }

    /* #iklan {
        background: #EAE2B7 0% 0% no-repeat padding-box;
    } */

    #iklan .title {
        font: normal normal bold 28px Open Sans;
        color: #101010;
    }

    #iklan .desc {
        font: normal normal normal 18px Open Sans;
        color: #101010;
    }
</style>

<section id="iklan" class="py-5 mt-5">
    <div class="container">
        <div class="row">

            <div class="col-md-5 my-auto text-center position-relative">
                <img class="img-fluid rounded shadow" src="<?php echo $inc_ ?>/assets/img/edunovasi-tryout-nasional.jpeg">
            </div>
            <div class="col-md-7 my-auto">
                <div class="row">
                    <div class="col-md-12 title mt-md-0 mt-3">
                        Try Out Online UTBK 2022 Gratis
                    </div>
                    <div class="col-md-12 desc fw-bold text-primary fs-5 mb-4">
                        Terbuka untuk kelas X, XI, XII dan Alumni
                    </div>
                    <div class="col-md-12 desc">
                        <ol>
                            <li>Soal Standar UTBK</li>
                            <li>Penilaian menggunakan IRT</li>
                            <li>Download soal dan pembahasan</li>
                            <li>Ranking Nasional</li>
                        </ol>
                    </div>
                    <div class="col-md-10 mt-2">
                        <div class="card rounded shaadow-sm">
                            <div class="card-body">
                                Pelaksanaan : <b>9-10 Mei 2022</b><br>
                                Batas Pendaftaran : <b>8 Mei 2022</b><br><br>
                                <b class="text-danger">Terbatas Hanya untuk 1000 Peserta !</b><br>
                                Buruan daftar sebelum terlambat
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 desc mt-4">
                        <a href="#form-daftar" class="btn btn-primary w-100">Daftar Sekarang</a>
                    </div>
                    <div id="form-daftar"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="detail-event" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 my-auto fw-bold fs-5">
                                <?php
                                echo "Form Pendaftaran Peserta Ujian Try Out Nasional " . date("Y");
                                ?>
                            </div>
                            <div class="col-md-4 my-auto">
                                <div class="row">
                                    <div class="col-md-12 text-end my-3">
                                        <img class="img-fluid mb-1 me-2" src="<?php echo $inc_ ?>/assets/ic/date_biru.svg">Periode : <b>9 - 10 Mei 2022</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body card-border pt-4">
                        <div class="row g-3">

                            <div class="col-md-12">
                                <div class="row g-3">

                                    <?php if ($arr_urinya['3'] == 'pendaftaran') { ?>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <form id="form-peserta" class="row g-4" method="POST">
                                            <div class="col-md-4">
                                                <label for="id_event" class="form-label">Event Try Out</label>
                                                <select id="id_event" name="id_event" class="form-select" required>
                                                    <option selected value="">Pilih Event</option>
                                                    <option value="OTk4">TO Nasional SAINTEK</option>
                                                    <option value="OTk5">TO Nasional SOSHUM</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $sesi['nama'] ?>" required>
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
                                            <div class="col-md-4">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $sesi['email'] ?>" required>
                                            </div>
                                            <!--
                                                <div class="col-md-4">
                                                    <label for="no_tlp" class="form-label">No Telepon</label>
                                                    <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="" value="<?php echo $sesi['no_tlp'] ?>" required>
                                                </div>
                                            -->
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
                                                <label for="sekolah" class="form-label">Asal Sekolah</label>
                                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tingkatan" class="form-label">TIngkatan</label>
                                                <select id="tingkatan" name="tingkatan" class="form-select" required>
                                                    <option selected value="">Pilih Tingkatan</option>
                                                    <option value="Kelas X">Kelas X</option>
                                                    <option value="Kelas XI">Kelas XI</option>
                                                    <option value="Kelas XII">Kelas XII</option>
                                                    <option value="Alumni">Alumni</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="kampus" class="form-label">Kampus <br class="d-block d-md-none">impian</label>
                                                <input type="text" class="form-control" id="kampus_impian" name="kampus_impian" placeholder="" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="kampus_favorit" class="form-label">Kampus Favorit</label>
                                                <select id="kampus_favorit" name="kampus_favorit" class="form-select" required>
                                                    <option selected>Pilih Kampus Favorit</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="jurusan" class="form-label">Jurusan yang diinginkan</label>
                                                <input type="text" class="form-control" id="jurusan_diinginkan" name="jurusan_diinginkan" placeholder="" required>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="sumber_informasi" class="form-label">Informasi TO Nasional Edunovasi</label>
                                                <select id="sumber_informasi" name="sumber_informasi" class="form-select" required>
                                                    <option selected value="">Pilih Sumber Informasi</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Google">Google</option>
                                                    <option value="Pihak Sekolah">Pihak Sekolah</option>
                                                    <option value="Rekomendasi Teman">Rekomendasi Teman</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-8">
                                                    Untuk melihat daftar materi ujian beserta durasi pengerjaan bisa kamu cek <a href="<?php echo $inc_ ?>/event/materi/<?php echo $arr_urinya[4] ?>" class="w-100 p-2 text-primary fw-bold">Di Sini</a>
                                                </div> -->
                                            <div class="col-md-4 mx-auto mt-md-auto mt-4 text-center">
                                                <button type="button" name="btn_pendaftar" id="btn_pendaftar" class="btn btn-sm btn-primary w-100 p-2">Daftar Sekarang</button>
                                                <button type="submit" name="btn_pendaftaran" id="btn_pendaftaran" style="display:none">Untuk Submit</button>
                                            </div>
                                        </form>

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
<script>
    getprovinsi();
    tampilkampus();

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
        var jsonfilter = JSON.stringify({
            format: "json",
            formdata_origin: "pt",
            formdata_type: "1",
            setdata_mod: "list-wilayah",
            formdata_kode: $("#provinsi option:selected").attr('kode') ? $("#provinsi option:selected").attr('kode') : '',
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

                    swal.fire({
                        title: "Periksa Email Kamu",
                        html: "Kami telah mengirimkan akun tryout edunovasi ke email kamu untuk ujian nanti, ayo login dan akses latihan soal persiapan sebelum ujian",
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

    function tampilkampus() {

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "get-data",
            formdata_getlist: "listcampus",
            formdata_origin: "list",
            formdata_filterwilayah: 'semua-wilayah',
            formdata_filterkelas: 'Program-Perkuliahan-Reguler',
            formdata_filterprodi: 'semua-prodi',
            formdata_page: "1",
            formdata_length: "300"
        });

        $.ajax({
            url: 'https://api.edunitas.com/mod/edun-kampus-g',
            type: 'POST',
            crossDomain: true,
            data: jsondata,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                console.log(res);
                if (res.response == 'OK') {

                    var listdata = typeof(res.data.listcampus.listdata) == 'undefined' ? '' : res.data.listcampus.listdata;

                    if (Object.keys(listdata).length > 0) {

                        $('#kampus_favorit').empty();

                        var objHtml = "<option value='' selected readonly>Pilih Kampus Favorit</option>";

                        $.each(listdata, function(i, item) {

                            objHtml += '<option value="' + item.singkatan.replace(/ /g, '-') + '">' + item.singkatan + ' ( ' + item.label_nama + ' ) </option>';
                        });
                        $('#kampus_favorit').append(objHtml);

                        $('#kampus_favorit').select2({
                            theme: 'bootstrap-5'
                        });

                        if ($('#kampus_favorit').val() == null || $('#kampus_favorit').val() == '') {
                            $('#kampus_favorit').val('');
                        }


                    } else {
                        var objHtml = '<option value="" selected>Terjadi kesalahan silakan refresh ulang</option>';
                        $('#kampus_favorit').html(objHtml);
                    }

                }
            }
        });
    }
</script>