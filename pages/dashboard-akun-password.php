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

    .field-icon {
        float: right;
        margin-right: 10px;
        margin-top: -25px;
        position: relative;
        z-index: 999999999999999;
    }
</style>

<div class="row px-2">
    <div class="col-md-12">
        <div class="card h-100">
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <form id="formpass" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="https://edunitas.com/assets/edu-img/ilus/op/edu-ilus-login.png" class="img-fluid">
                                </div>
                                <div class="col-md-7 my-auto p-md-3">
                                    <div class="row g-4">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" value="<?php echo $sesi['email'] ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label" for="form_pass_old">Password Lama:</label>
                                                <input type="password" id="form_pass_old" name="formdata_oldpass" class="form-control" placeholder="Input password lama" required>
                                                <i toggle="#form_pass_old" class="fa fa-fw fa-eye text-primary field-icon mr-3 toggle-passwordold" onclick="lihat('toggle-passwordold')"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label" for="form_pass">Password Baru:</label>
                                                <input type="password" id="form_pass" name="formdata_pass" class="form-control" placeholder="Input password baru" required>
                                                <i toggle="#form_pass" class="fa fa-fw fa-eye text-primary field-icon toggle-password mr-3" onclick="lihat('toggle-password')"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label" for="form_repass">re-Password:</label>
                                                <input type="password" id="form_repass" name="formdata_repass" class="form-control" placeholder="Ulangi password baru" required>
                                                <i toggle="#form_repass" class="fa fa-fw fa-eye text-primary field-icon toggle-repassword mr-3" onclick="lihat('toggle-repassword')"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-5">

                                            <input type="hidden" name="formdata_apikey" id="formdata_apikeyp" value="" />
                                            <input type="hidden" name="setdata_mod" value="update-pass" />
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary w-100" id="bupdatepass">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    $("#formpass").submit(function(e) {
        e.preventDefault();

        $('#formdata_apikeyp').val('<?php echo $sesi['key']; ?>');

        $.ajax({
            url: '<?php echo $edun_api ?>medata-g',
            type: 'POST',
            crossDomain: true,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {

                if (res.response == 'OK') {
                    swal.fire({
                        title: "Berhasil",
                        text: res.message,
                        icon: "success"
                    }).then((ok) => {
                        window.location.reload(true);
                    });
                } else {
                    swal.fire({
                        title: "Gagal",
                        text: "Pastikan password lama benar dan password baru sama dengan ulangi password",
                        icon: "error"
                    })
                }
                return false;
            }
        });
        return false;
    });
</script>