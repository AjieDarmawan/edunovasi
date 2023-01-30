<?php
if ($sesi['email']) {
    echo "<script>
    window.location.href = '" . $inc_ . "';
    </script>";
    die();
    // ob_start();
    // header("Location: https://edunovasi.id");
    // exit();
    // ob_end_flush();
}
if (isset($_POST['btn_login'])) {
    unset($_POST['btn_login']);

    $postcurl_login = postcurl($base_api . 'login', $_POST);


    // eduprint($postcurl_login);
    if ($postcurl_login['status'] == '200') {
        $datalogin = $postcurl_login;
        $_SESSION['userdata'] = $datalogin;
        echo "<script>
            var tryout_goto = '" . $inc_ . "';
            if (sessionStorage.getItem('tryout_goto')) {
                tryout_goto = tryout_goto + sessionStorage.getItem('tryout_goto');
            }
            sessionStorage.removeItem('tryout_goto');
            sessionStorage.removeItem('verify_email');
            window.location.href = tryout_goto;
        </script>";
    } else if ($postcurl_login['status'] == '205') {
        echo "<script>
            sessionStorage.setItem('verify_email','" . $postcurl_login['email'] . "');
            window.location.href = '" . $inc_ . "/register';
        </script>";
    } else if ($postcurl_login['status'] == '300') {
        echo "<script> 
            swal.fire({icon:'error',text:'Kamu belum reset password'}).then((ok) => {
            sessionStorage.setItem('forgot_email','" . $postcurl_login['email'] . "');
            window.location.href = '" . $inc_ . "/forgot';
            });
        </script>";
    } else {
        echo '<script>swal.fire("' . $postcurl_login['message'] . '")</script>';
    }
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
        font: normal normal bold 18px Open Sans;
        letter-spacing: 0px;
        color: #00415a;
        text-decoration: none;
    }

    #login .regist a:hover {
        color: #002038;
    }


    #login .forgot a {
        font: normal normal bold 14px Open Sans;
        letter-spacing: 0px;
        color: #00415a;
        text-decoration: none;
    }

    #login .forgot a:hover {
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

    .field-icon {
        float: right;
        margin-right: 10px;
        margin-top: -25px;
        position: relative;
        z-index: 999999999999999;
    }
</style>
<section id="login" class="d-flex">
    <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-md-5 col-8 my-md-auto mb-4 text-start">
                <img class="img-fluid" src="assets/img/tryout-header.png">
            </div>
            <div class="col-md-5 my-auto">
                <form id="formlogin" class="row" method="POST">
                    <div class="col-md-12 mb-2">
                        <label for="email" class="form-label">Email / Username</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email / Username" required>
                    </div>
                    <div class="col-md-12 mb-2">

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
                            <i toggle="#password" class="fa fa-fw fa-eye text-primary field-icon toggle-password mr-3" onclick="lihat('toggle-password')"></i>
                        </div>
                    </div>
                    <div class="col-md-6 text-start">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label fw-bold text-primary small" for="rememberMe">Ingat Saya</label>
                    </div>
                    <div class="col-md-6 text-end forgot">
                        <a href="<?php echo $inc_ ?>/forgot">Lupa kata sandi?</a>
                    </div>
                    <div class="col-md-12 my-3">
                        <button onclick="login()" type="button" class="btn btn-primary w-100 rounded-3">Login</button>
                        <button id="btn_login" name="btn_login" type="submit" class="d-none"></button>
                    </div>
                    <div class="col-md-12 text-center regist">
                        Belum punya akun ? <a class="fw-bold" href="<?php echo $inc_ ?>/register">Daftar disini</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
<script>
    function goto() {
        tryout_goto = "<?php echo $inc_ ?>";
        if (sessionStorage.getItem('tryout_goto')) {
            tryout_goto = tryout_goto + sessionStorage.getItem('tryout_goto');
        }
        window.location.href = tryout_goto;
    }

    let rememberCheck = document.getElementById("rememberMe"),
        emailInput = document.getElementById("email"),
        passInput = document.getElementById("password");

    if (localStorage.checkbox && localStorage.checkbox != "") {
        rememberCheck.setAttribute("checked", "checked");
        emailInput.value = localStorage.username;
        passInput.value = localStorage.pass;
    } else {
        rememberCheck.removeAttribute("checked");
        emailInput.value = "";
        passInput.value = "";
    }

    function lsRememberMe() {
        if (rememberCheck.checked && emailInput.value != "") {
            localStorage.username = emailInput.value;
            localStorage.pass = passInput.value;
            localStorage.checkbox = rememberCheck.value;
        } else {
            localStorage.username = "";
            localStorage.pass = "";
            localStorage.checkbox = "";
        }
    }

    function login(e) {
        // e.preventDefault();
        lsRememberMe();
        $("#btn_login").click();
    }
</script>