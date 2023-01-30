<?php
$_POST['email'] = $sesi['email'];
$postcurl_sinkron = postcurl($base_api_sekolah . 'logout_connect_to_school', $_POST);
// eduprint($_FILES, 1);
if ($postcurl_sinkron['status'] == '200') {
    $_SESSION['userdata']['id_sekolah'] = 0;
    echo '<script>
        swal.fire({
            title: "Sukses",
            text: "Berhasil logout dari sekolah",
            icon: "success"
        }).then((ok) => {
            window.location.href="https://edunovasi.com/dashboard/akun/connect_to_school";
        });
        </script>';
} else {
    echo '<script> 
        swal.fire({
            title: "Gagal",
            text: "' . $postcurl_sinkron['message'] . '",
            icon: "error"
        }).then((ok) => {
            window.location.href="https://edunovasi.com";
        });
        </script>';
}
