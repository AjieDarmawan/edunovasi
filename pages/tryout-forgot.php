<style>
    #forgot {

        background: rgb(247, 127, 0);
        background: radial-gradient(circle, rgba(252, 191, 73, 1) 20%, rgba(247, 127, 0, 1) 75%, rgba(247, 127, 0, 1) 100%);
        min-height: 100vh;
    }

    #forgot button {
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
        font: normal normal bold 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #FFFFFF;
    }

    #forgot .regist {
        font: normal normal normal 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    #forgot .regist a {
        font: normal normal bold 20px/27px Open Sans;
        letter-spacing: 0px;
        color: #003049;
        text-decoration: none;
    }

    #forgot .regist a:hover {
        color: #002038;
    }

    #forgot .form-label {
        font: normal normal normal 16px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    input::placeholder {
        font: normal normal normal 14px Open Sans;
        letter-spacing: 0px;
        color: #707070;
    }
</style>
<section id="forgot" class="d-flex">
    <div class="container my-md-auto my-auto py-md-2">
        <div class="row justify-content-center">
            <div class="col-md-5 my-md-auto mb-4 d-none d-md-block">
                <img class="img-fluid" src="assets/img/tryout-header.png">
            </div>
            <div class="col-md-5 my-auto form-reset" style="display:show">
                <form class="row" method="POST">
                    <div class="col-md-12 mb-3">
                        <label for="formdata_email_cek" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formdata_email_cek" name="formdata_email_cek" placeholder="Masukan Email" required>
                    </div>
                    <div class="col-md-12 mt-4 mb-3">
                        <button type="button" name="btn_reset" id="btn_reset" class="btn btn-primary w-100 rounded-3">Reset Password</button>
                    </div>
                    <div class="col-md-12 text-center regist">
                        Sudah ingat password ? <a class="fw-bold" href="<?php echo $inc_ ?>/login">Login</a>
                    </div>

                </form>

            </div>
            <div class="col-md-5 my-auto form-forgot" style="display:none">
                <form class="row" method="POST">
                    <div class="col-md-12 mb-3">
                        <label for="formdata_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formdata_email" name="formdata_email" placeholder="Masukan Email" readonly required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="formdata_pass" name="formdata_pass" placeholder="Masukan Password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="formdata_repass" class="form-label">Ulangi Password</label>
                        <input type="password" class="form-control" id="formdata_repass" name="formdata_repass" placeholder="Ulangi Password" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="inputKode">Kode Verifikasi</label>
                        <input type="text" id="inputKode" name="formdata_code" class="form-control" placeholder="Kode">
                    </div>
                    <div class="col-md-12 mb-3 mt-1 text-regular-italic small" id="resendbox">
                        Jika belum mendapatkan kode Verifikasi dalam 5 menit, silahkan
                        <a id="resendpin" onclick="resend($('#formdata_email').val());" class="text-primary fw-bold" style="cursor:pointer"> RESEND KODE</a>
                    </div>
                    <div class="col-md-12 mt-4 mb-3">
                        <button type="button" name="btn_forgot" id="btn_forgot" class="btn btn-primary w-100 rounded-3">Update Password</button>
                    </div>
                    <div class="col-md-12 text-start small">
                        Periksa email kamu untuk melihat kode verifikasi reset password dan meyakinkan kamu adalah pemilik akun ini
                    </div>

                </form>

            </div>
            <div class="col-md-5 my-auto form-berhasil" style="display:none">
                <h3 class="fw-bold text-primary mb-5" style="text-align: center;">
                    Reset password berhasil
                </h3>
                <h5 class="text-dark mb-5" style="text-align: center;">
                    Harap ingat dan jaga password baru kamu, jangan diberikan kepada orang lain ya.<br>
                    Silakan <a class="fw-bold" href="<?php echo $inc_ ?>/login">Login</a> untuk melanjutkan.
                </h5>
            </div>
        </div>
    </div>
</section>
<script>
    let forgot_email = '';
    forgot_email = sessionStorage.getItem("forgot_email");
    if (forgot_email) {
        $('#formdata_email').val(forgot_email);
        $('.form-reset').hide();
        $('.form-forgot').show();
        sessionStorage.removeItem("forgot_email");
    }
    let base_api = '<?php echo $edun_api; ?>';


    $('#resendpin').click(function() {
        $('#resendbox').html('Silahkan periksa email Kamu, pastikan <span class="fw-bold fst-italic text-primary">KODE</span> yang dimasukan didapat dari <span class="fw-bold fst-italic  text-primary">email terbaru</span> yang kami kirimkan');
    });

    $("#btn_reset").click(function() {

        let valemail = $('input[name=formdata_email_cek]').val();
        $("#btn_reset").attr("disabled", "disabled");
        $("#btn_reset").html("<span class='spinner-grow spinner-grow-sm'></span>Loading..");

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "reset",
            formdata_email: valemail,
            formdata_alias: 'tryout'
        });

        $.ajax({
            url: base_api + 'forgot-g',
            type: 'POST',
            crossDomain: true,
            data: jsondata,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.response == 'OK') {

                    $('#formdata_email').val(valemail);
                    $('.form-reset').hide();
                    $('.form-forgot').show();

                } else {
                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                        icon: 'error'
                    }).then((ok) => {
                        $("#btn_reset").removeAttr("disabled");
                        $("#btn_reset").html('Update Password');
                        if (res.response == "UNVERIFY") {
                            sessionStorage.setItem("verify_email", $('#formdata_email_cek').val());
                            window.location.href = "<?php echo $inc_ . '/register'; ?>";
                        }
                    });

                }
            },
            error: function(res) {
                swal.fire({
                    title: "Mohon Maaf",
                    html: "<span class='text-left'>Terjadi kesalahan<br>1. Pastikan kembali email sudah benar / terisi.<br>2. Allow Javascript pada perangkat kamu<br>3. Gangguan koneksi ke server</span>",
                })
                $("#btn_reset").removeAttr("disabled");
                $("#btn_reset").html('Update Password');
            }
        });
    });

    $("#btn_forgot").click(function() {
        $("#btn_forgot").attr("disabled", "disabled");
        $("#btn_forgot").html("<span class='spinner-grow spinner-grow-sm'></span>Loading..");

        let valemail = $('input[name=formdata_email]').val();

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "confirm",
            formdata_email: $('input[name=formdata_email]').val(),
            formdata_pass: $('input[name=formdata_pass]').val(),
            formdata_repass: $('input[name=formdata_repass]').val(),
            formdata_code: $('input[name=formdata_code]').val()
        });

        $.ajax({
            url: base_api + 'forgot-g',
            type: 'POST',
            crossDomain: true,
            data: jsondata,
            contentType: 'application/json',
            dataType: 'json',
            success: function(res) {

                if (res.response == 'OK') {

                    $("#btn_forgot").removeAttr("disabled");
                    $("#btn_forgot").html("Update Password");
                    swal.fire({
                            title: "Berhasil",
                            text: res.message,
                        })
                        .then((ok) => {
                            $('.form-forgot').hide();
                            $('.form-berhasil').show();
                        });

                } else {
                    $("#btn_forgot").removeAttr("disabled");
                    $("#btn_forgot").html("Update Password");
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
                $("#btn_forgot").removeAttr("disabled");
                $("#btn_forgot").html('Update Password');
            }
        });
        return false;
    });

    function resend() {

        var jsondata = JSON.stringify({
            format: "json",
            setdata_mod: "resend",
            formdata_email: $('#formdata_email').val()
        });

        $.ajax({
            url: base_api + 'forgot-g',
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
</script>