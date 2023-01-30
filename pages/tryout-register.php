<?php
if (isset($_POST['btn_regist'])) {
    unset($_POST['btn_regist']);

    echo '<script>alert("Dalam pengembangan")</script>';

    // $postcurl_login = postcurl($base_api . 'login', $_POST);
    // if ($postcurl_login['status'] != '200') {
    //     echo '<script>alert("' . $postcurl_login['message'] . '")</script>';
    // } else {
    //     $datalogin = $postcurl_login;
    //     $_SESSION['userdata'] = $datalogin;
    //     echo "<script>
    //         var tryout_goto = '" . $inc_ . "';
    //         if (sessionStorage.getItem('tryout_goto')) {
    //             tryout_goto = tryout_goto + sessionStorage.getItem('tryout_goto');
    //         }
    //         sessionStorage.removeItem('tryout_goto');
    //         window.location.href = tryout_goto;
    //     </script>";
    // }
}
?>
<style>
    #login {

        background: rgb(247, 127, 0);
        background: radial-gradient(circle, rgba(252, 191, 73, 1) 20%, rgba(247, 127, 0, 1) 75%, rgba(247, 127, 0, 1) 100%);
        min-height: 100vh;
    }

    #login button {
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
        font: normal normal bold 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #FFFFFF;
    }

    #login .regist {
        font: normal normal normal 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    #login .regist a {
        font: normal normal bold 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #003049;
        text-decoration: none;
    }

    #login .regist a:hover {
        color: #002038;
    }

    #login .form-label {
        font: normal normal normal 16px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    input::placeholder {
        font: normal normal normal 14px Open Sans;
        letter-spacing: 0px;
        color: #707070;
    }

    select:invalid,
    select option[value=""] {
        color: #707070;
        font: normal normal normal 14px Open Sans;
    }
</style>
<section id="login" class="d-flex pt-md-5 py-4">
    <div class="container my-md-auto my-5 pt-md-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-5 my-auto text-start d-none d-md-block">
                <img class="img-fluid" src="assets/img/tryout-header.png">
            </div>
            <div class="col-md-5 my-auto form-regist" style="display:show">
                <form class="row" method="POST">
                    <div class="col-md-12 mb-3">
                        <label for="formdata_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formdata_email" name="formdata_email" placeholder="Masukan Email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="formdata_nama" class="form-label">Nama Lengkap</label>
                        <input type="nama" class="form-control" id="formdata_nama" name="formdata_nama" placeholder="Masukan Nama" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_notlp" class="form-label">No. Telepon</label>
                        <input type="nama" class="form-control" id="formdata_notlp" name="formdata_notlp" placeholder="Masukan No Telp" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_nowa" class="form-label">No. WhatsApp</label>
                        <input type="nama" class="form-control" id="formdata_nowa" name="formdata_nowa" placeholder="Masukan No WA" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="formdata_pass" name="formdata_pass" placeholder="Masukan Password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_repass" class="form-label">Ulangi Password</label>
                        <input type="password" class="form-control" id="formdata_repass" name="formdata_repass" placeholder="Ulangi Password" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="formdata_smbinformasi" class="form-label">Memperoleh info edunovasi dari mana :</label>
                        <select name="formdata_smbinformasi" id="formdata_smbinformasi" class="form-select" required>
                            <option value="" selected disabled>Pilih Sumber Informasi</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Poster">Poster</option>
                            <option value="Rekomendasi Teman">Rekomendasi Teman</option>
                            <option value="Pihak Sekolah">Pihak Sekolah</option>
                            <option value="Google">Google</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_kelas" class="form-label">Kelas saat ini</label>
                        <select name="formdata_kelas" id="formdata_kelas" class="form-select" required>
                            <option value="" selected disabled>Pilih Kelas</option>
                            <option value="Kelas X">Kelas X</option>
                            <option value="Kelas XI">Kelas XI</option>
                            <option value="Kelas XII">Kelas XII</option>
                            <option value="Gap Year / Lainnya">Gap Year / Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_sekolah" class="form-label">Sekolah saat ini</label>
                        <select name="formdata_sekolah" id="formdata_sekolah" class="form-select" required>
                            <option value="" selected disabled>Pilih Sekolah</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-4 mb-3">
                        <button type="button" name="btn_regist" id="btn_regist" class="btn btn-primary w-100 rounded-3">Registrasi</button>
                    </div>
                    <div class="col-md-12 text-center regist">
                        Sudah punya akun ? <a class="fw-bold" href="<?php echo $inc_ ?>/login">Login</a>
                    </div>

                </form>

            </div>
            <div class="col-md-5 my-auto form-verifikasi" style="display:none">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <h5 class="text-primary fw-bold mb-4" style="text-align: center;">
                            Silakan cek email Kamu<br>
                            Masukkan kode verifikasi yang dikirimkan ke email Kamu
                            <!--<br>activation code<br>-->
                        </h5>
                        <form class="row g-3">
                            <div class="col-md-12 form-group">
                                <label for="formdata_email_verify">Email</label>
                                <input readonly type="text" class="form-control" placeholder="Email" id="formdata_email_verify" name="formdata_email">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="inputKode">Kode Aktivasi</label>
                                <input type="text" id="inputKode" name="formdata_code" class="form-control" placeholder="Kode">
                            </div>
                            <div class="col-md-12 mb-3 text-regular-italic" id="resendbox">
                                Jika belum mendapatkan kode aktivasi dalam 5 menit, silahkan
                                <a id="resendpin" onclick="resend($('#formdata_email_verify').val());" class="text-primary fw-bold" style="cursor:pointer"> RESEND KODE</a>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button title="Aktivasi" type="button" onclick="aktivasi();" class="btn btn-primary w-100">Verifikasi</button>
                            </div>
                            <div class="col-md-12">
                                <a class="text-primary fw-bold" href="<?php echo $inc_ ?>/login" style="float:right;">
                                    <ion-icon src=" <?php echo $inc_ ?>assets/icon/new/edu-home.svg"></ion-icon> LOGIN <span class="sr-only">(current)</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-5 my-auto form-berhasil" style="display:none">
                <h3 class="fw-bold text-primary mb-5" style="text-align: center;">
                    Registrasi Berhasil
                </h3>
                <h5 class="fw-bold text-dark mb-5" style="text-align: center;">
                    Terimakasih telah melakukan verifikasi email.<br>
                    Silakan <a class="fw-bold" href="<?php echo $inc_ ?>/login">Login</a> untuk melanjutkan.
                </h5>
            </div>
        </div>
    </div>
</section>
<script>
    let verify_email = '';
    verify_email = sessionStorage.getItem("verify_email");
    if (verify_email) {
        $('#formdata_email_verify').val(verify_email);
        $('.form-regist').hide();
        $('.form-verifikasi').show();
        sessionStorage.removeItem("verify_email");
    }
    let base_api = 'https://api.edunitas.com/mod/edun-';


    $('#resendpin').click(function() {
        $('#resendbox').html('Silahkan periksa email Kamu, pastikan <span class="fw-bold fst-italic text-primary">KODE</span> yang dimasukan didapat dari <span class="fw-bold fst-italic  text-primary">email terbaru</span> yang kami kirimkan');
    });

    $("#btn_regist").click(function() {
        if ($("#formdata_smbinformasi option:selected").val() == '') {
            swal.fire({
                title: "Pilih sumber informasi",
                text: "Dari mana kamu memperoleh info edunovasi ?"
            })
        } else if ($("#formdata_kelas option:selected").val() == '') {
            swal.fire({
                title: "Pilih Kelas",
                text: "Kelas berapa kamu saat ini ?"
            })
        } else if ($("#formdata_sekolah option:selected").val() == '') {
            swal.fire({
                title: "Pilih Sekolah",
                text: "Sekolah di mana kamu saat ini ?"
            })
        } else {
            let valemail = $('input[name=formdata_email]').val();
            $("#btn_regist").attr("disabled", "disabled");
            $("#btn_regist").html("<span class='spinner-grow spinner-grow-sm'></span>Loading..");

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
                        swal.fire({
                            title: "Gagal",
                            text: res.message
                        }).then((ok) => {
                            $("#btn_regist").removeAttr("disabled");
                            $("#btn_regist").html('Registrasi');
                            if (res.response == "UNVERIFY") {
                                $('#formdata_email_verify').val(valemail);
                                $('.form-regist').hide();
                                $('.form-verifikasi').show();
                            }
                        });

                    }
                },
                error: function(res) {
                    swal.fire({
                        title: "Mohon Maaf",
                        html: "<span class='text-left'>Terjadi kesalahan<br>1. Pastikan kembali email sudah benar / terisi.<br>2. Allow Javascript pada perangkat kamu<br>3. Gangguan koneksi ke server</span>",
                    })
                    $("#btn_regist").removeAttr("disabled");
                    $("#btn_regist").html('Registrasi');
                }
            });
        }
    });

    function submitregist() {

        let valemail = $('input[name=formdata_email]').val();

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "regist",
            formdata_email: $('input[name=formdata_email]').val(),
            formdata_nama: $('input[name=formdata_nama]').val(),
            formdata_notlp: $('input[name=formdata_notlp]').val(),
            formdata_nowa: $('input[name=formdata_nowa]').val(),
            formdata_pass: $('input[name=formdata_pass]').val(),
            formdata_repass: $('input[name=formdata_repass]').val(),
            formdata_lulusan: "SMA",
            formdata_alias: "tryout"
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

                    $("#btn_regist").removeAttr("disabled");
                    $("#btn_regist").html("Registrasi");
                    swal.fire({
                            title: "Berhasil",
                            // text: "Data kamu berhasil di daftarkan",
                            text: res.message,
                        })
                        .then((ok) => {
                            $('#formdata_email_verify').val(valemail);
                            $('.form-regist').hide();
                            // $('.form-berhasil').show();
                            $('.form-verifikasi').show();
                        });


                    var kiriman_tambahan = JSON.stringify({
                        email: $('input[name=formdata_email]').val(),
                        sumber_informasi: $('#formdata_smbinformasi option:selected').val(),
                        kelas: $('#formdata_kelas option:selected').val(),
                        sekolah: $('#formdata_sekolah option:selected').val(),
                    });

                    $.ajax({
                        url: '<?php echo $base_api_master; ?>infotambahan/',
                        type: 'POST',
                        crossDomain: true,
                        data: {
                            "data": kiriman_tambahan
                        },
                        // contentType: 'application/json',
                        dataType: 'json',
                        success: function(res) {
                            console.log('daftar info tambahan sukses');
                        }
                    });

                } else {
                    $("#btn_regist").removeAttr("disabled");
                    $("#btn_regist").html("Registrasi");
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
                $("#btn_regist").removeAttr("disabled");
                $("#btn_regist").html('Registrasi');
            }
        });
        return false;
    }

    function resend() {

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "resend-verify",
            formdata_email: $('#formdata_email_verify').val()
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

                    swal.fire({
                        title: "Berhasil",
                        text: res.message,
                    })

                } else {

                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                    })
                }
            }
        });
    }

    function aktivasi() {
        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "aktivasi",
            formdata_email: $('#formdata_email_verify').val(),
            formdata_code: $('input[name=formdata_code]').val()
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
                    $('.form-verifikasi').hide();
                    $('.form-berhasil').show();
                } else {
                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                    })
                }
                return false;
            }
        });
        return false;
    }
</script>