<?php 
        $this->load->view('layout/header');
    ?>
<title>Landing Eduschool</title>
</head>

<body>
    <style>
    .navbar .nav-link {
        font-weight: bold;
    }

    .navbar .nav-link:hover {
        color: #fff !important;
    }

    .btnnavbar {
        font-size: 12px;
    }

    .shape {
        position: relative;
        overflow: hidden;
        height: 64px;
    }

    .shape::before {
        background: #fcbf49;
        border-radius: 100%;
        position: absolute;
        right: -200px;
        left: -200px;
        top: -200px;
        content: "";
        bottom: 0;
    }

    .card.card-fitur {
        border-radius: 16px;
    }

    .img-offset {
        position: absolute;
        height: 80px;
        width: 80px;
        border-radius: 24px;
        padding: 8px;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #ffd685;
    }
    </style>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-oren">
        <div class="container">
            <a href="https://edunovasi.com/#">
                <img href="https://edunovasi.com" src="https://edunovasi.com/assets/ic/logodotcom.png" class="img-fluid"
                    style="height: 32px; cursor: pointer" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-lg-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fitur</a>
                    </li>
                </ul>
                <a class="btn btn-sm btn-outline-primary d-flex" href="<?php echo base_url('login')?>">
                    <span class="material-icons"> account_circle </span>&nbsp;Login&nbsp;
                </a>
            </div>
        </div>
    </nav>

    <!-- header eduschool -->
    <section class="pt-4 bg-primary">
        <div class="container">
            <div class="row mx-2 mx-lg-0">
                <div class="col-12 col-md-6 text-primary my-auto">
                    <h1>Apa itu Eduschool?</h1>
                    <p style="font-size: 18px; font-weight: 600">
                        Fitur edunovasi yang diperuntukkan bagi sekolah atau komunitas
                        belajar untuk melaksanakan Try Out secara terstruktur dan Gratis.
                    </p>
                    <a href="#" class="btn btn-primary mb-4 mb-lg-0">Daftarkan Sekolah / Komunitas</a>
                </div>
                <div class="col-12 col-md-6">
                    <img style="width: 100%" src="<?php echo base_url('assets/assets/1x/Asset 1.png')?>" alt="" />
                </div>
            </div>
        </div>
    </section>
    <div class="shape"></div>

    <!-- keunggulan -->

    <section>
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4 col-12 mt-5 pt-4">
                    <div style="position: relative" class="card card-fitur h-100 pt-4 mx-lg-2 mx-4">
                        <img class="img-offset" src="https://edunovasi.com/assets/ic/tryout_gratis.svg" alt="" />
                        <div class="card-body text-center">
                            <h4 class="text-primary py-2">Gratis</h4>
                            <h6>Tidak dipungut biaya sepeserpun</h6>
                            <h6>Terbuka untuk komunitas manapun</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-5 pt-4">
                    <div style="position: relative" class="card card-fitur h-100 pt-4 mx-lg-2 mx-4">
                        <img class="img-offset" src="https://edunovasi.com/assets/ic/tryout_mudah.svg" alt="" />
                        <div class="card-body text-center">
                            <h4 class="text-primary py-2">Mudah dan Luas</h4>
                            <h6>Terjangkau seluruh Indonesia</h6>
                            <h6>Try Out gampang di akses</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-5 pt-4">
                    <div style="position: relative" class="card card-fitur h-100 pt-4 mx-lg-2 mx-4">
                        <img class="img-offset" src="https://edunovasi.com/assets/ic/tryout_uptodate.svg" alt="" />
                        <div class="card-body text-center">
                            <h4 class="text-primary py-2">Terstruktur</h4>
                            <h6>Pilihan ujian teratur</h6>
                            <h6>Sekolah dapat melihat hasil</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- form pendaftaran -->
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="card card-fitur py-4 mx-2 bg-primary">
                        <div class="card-body px-4">
                            <h4 class="card-title text-primary mb-5 text-center">
                                Daftarkan Sekolah atau Komunitas disini
                            </h4>
                            <form id="simpan">
                                <div class="row text-primary">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="" name="email"
                                                placeholder="Masukan Email" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Sekolah</label>
                                            <input type="text" class="form-control" id="" name="nama_sekolah"
                                                placeholder="Nama Sekolah" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Pendaftar</label>
                                            <input type="text" class="form-control" id="" name="nama_pendaftar"
                                                placeholder="Nama Lengkap" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Alamat Lengkap Sekolah</label>
                                            <input type="text" class="form-control" id="" name="alamat_sekolah"
                                                placeholder="Alamat Lengkap" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Jumlah Siswa</label>
                                            <input type="text" class="form-control" id="" name="jumlah_siswa"
                                                placeholder="Jumlah Siswa" required />
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <select id="provinsi" name="provinsi" class="form-select" required>
                                                <option selected value="">Pilih Provinsi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="wilayah" class="form-label">Kota / Kabupaten</label>
                                            <select id="wilayah" name="kota" class="form-select" required>
                                                <option selected value="">Pilih Provinsi Dahulu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">No Whatsapp yang bisa dihubungi</label>
                                            <input type="text" class="form-control" id="" name="no_wa"
                                                placeholder="No Whatsapp yang bisa dihubungi" required />
                                        </div>
                                    </div>

                                    <div class="d-grid mt-5">
                                        <button type="submit" class="btn btn-primary">
                                            Submit Pendaftar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<?php 
        $this->load->view('layout/footer');
    ?>


<script>
$("#simpan").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: 'https://backend.edunovasi.com/api_mobile/Api_m_sekolah/simpan',
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
            } else if (res.status == '402') {
                swal.fire({
                    title: "Gagal",
                    text: res.message,
                    icon: "error"
                })
            } else {
                swal.fire({
                    title: "Gagal",
                    text: "Gagal",
                    icon: "error"
                })
            }
            return false;
        }
    });
    return false;
});
</script>


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
        setdata_mod: "list-wilayah"
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
                        var objHtml = '<option value="' + item.nama.replace(/ /g, '-') +
                            '" kode="' + item.kode + '">' + item.nama.substr(0, 1).toUpperCase() +
                            item.nama.substr(1); + '</option>';
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
        formdata_kode: $("#provinsi option:selected").attr('kode') ? $("#provinsi option:selected").attr(
            'kode') : '',
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
                    var objHtml = '<option value="' + item.nama.replace(/ /g, '-') + '">' + item
                        .nama.substr(0, 1).toUpperCase() + item.nama.substr(1); + '</option>';
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
</script>