<?php
if (isset($_POST['bsinkron'])) {
    unset($_POST['bsinkron']);

    $postcurl_sinkron = postcurl($base_api_sekolah . 'sinkron', $_POST);
    // eduprint($_FILES, 1);
    if ($postcurl_sinkron['message'] == 'Sukses') {
        $_SESSION['userdata']['id_sekolah'] = $postcurl_sinkron['id_sekolah'];
        echo '<script>
        swal.fire({
            title: "Sukses",
            text: "Berhasil sinkron dengan sekolah",
            icon: "success"
        }).then((ok) => {
            window.location.href="https://edunovasi.com";
        });
        </script>';
    } else {
        echo '<script> 
        swal.fire({
            title: "Gagal",
            text: "' . $postcurl_sinkron['message'] . '",
            icon: "error"
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
                        <form id="formsyn2" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="https://edunitas.com/assets/edu-img/ilus/op/edu-ilus-login.png" class="img-fluid">
                                </div>
                                <div class="col-md-7 my-auto p-md-3">
                                    <div class="row g-4">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $sesi['email'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="form-label" for="kode_sek0lah">Kode Sekolah</label>
                                                <input type="number" id="kode_sek0lah" name="kode_sekolah" class="form-control" placeholder="Masukan Kode Sekolah" required>
                                                <i toggle="#kode_sek0lah" class="fa fa-fw fa-eye text-primary field-icon mr-3 toggle-passwordold" onclick="lihat('toggle-passwordold')"></i>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-5">


                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary w-100" id="bsinkron" name="bsinkron">Connect To School</button>
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
    $("#formsyn").submit(function(e) {
        e.preventDefault();

        $('#formdata_apikeyp').val('<?php echo $sesi['key']; ?>');

        $.ajax({
            url: 'https://backend.edunovasi.com/api_mobile/Api_m_sekolah/sinkron',
            type: 'POST',
            crossDomain: true,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {

                if (res.status == '200') {
                    swal.fire({
                        title: "Berhasil",
                        text: res.message,
                        icon: "success"
                    }).then((ok) => {

                        window.location.reload(true);
                    });
                } else if (res.status == '404') {
                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                        icon: "error"
                    })
                } else if (res.status == '400') {
                    swal.fire({
                        title: "Gagal",
                        text: res.message,
                        icon: "error"
                    })
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