<?php
	 $urlpost = $base_api . 'auth/login';
	if(isset($datax['setcookie'])) {
		$_SESSION['utoken'] = $datax['utoken'];
		echo json_encode(array("kode"=>"001","arr"=>"xxx"));
		exit;
	}
?>

<section class="">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="<?php echo $inc_;?>/assets/ic/chat.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form id="login">
          <!-- Email input -->
		  <h5>Email </h5>
          <div class="form-outline mb-4">
            <input type="email" id="username" class="form-control form-control-lg" placeholder="Masukan alamat email dengan benar" />
          </div>

          <!-- Password input -->
		  <h5>Password</h5>
          <div class="form-outline mb-3">
            <input type="password" id="password" class="form-control form-control-lg" placeholder="Masukan password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg fw-bold" style="padding-left: 2.5rem; padding-right: 2.5rem;">Masuk</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun ? <a href="#" style="text-decoration: none;" class="link-danger">Daftar</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>


<script>
	var curdata = null;
	$(document).ready(function() {
		$("#login").submit(function(e) {
			e.preventDefault();
			var jsonfilter = JSON.stringify({
				format: "json",
				username: $('#username').val(),
				password: $('#password').val()
			});
			requestdata("POST", '<?php echo $urlpost; ?>', jsonfilter, set_session);
			return false;
		});
	});
	
	function set_session(data) {
		var jsonfilter = JSON.stringify({
			format: "json",
			utoken: data.token,
			setcookie: 1,
			inc:0
		});
		curdata = data;
		requestdata("POST", '<?php echo $inc_."/auth/login"; ?>', jsonfilter, processdata);
	}
	
	function processdata(data) {
		localStorage.setItem("utoken", curdata.token);
		// document.cookie = "utoken="+curdata.token+"; expires=Thu, 28 Feb 2022 12:00:00 UTC;SameSite=Lax"; 
		window.location.href = "<?php echo $inc_;?>/survey";
		return false;
	}
	
	// function logincallback(data) {
		
	// }
</script>
