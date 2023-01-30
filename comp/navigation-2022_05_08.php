<style>
	.navbar-brand {
		font: normal normal bold 20px Open Sans;
		letter-spacing: 0px;
		text-shadow: 0px 3px 6px #00000029;
	}

	.navbar .btn-primary {
		font: normal normal 600 12px Open Sans;
		box-shadow: 0px 3px 6px #00000029;
		letter-spacing: 0px;
		color: #fff !important;
	}

	.navbar .btn-outline-primary {
		background: transparent;
		box-shadow: 0px 3px 6px #00000029;
		border: 1px solid #003049;
		font: normal normal 600 12px Open Sans;
		letter-spacing: 0px;
		color: #003049 !important;
	}

	.navbar .btn-outline-primary:hover {
		background: #003049 0% 0% no-repeat padding-box;
		box-shadow: 0px 3px 6px #00000029;
		border: 1px solid #003049;
		font: normal normal 600 12px Open Sans;
		letter-spacing: 0px;
		color: #fff !important;
	}

	.navbar-nav .btn {
		margin-top: 6px;
		padding: 4px 24px !important;
	}

	.navbar .nav-link:hover {
		color: #fff !important;
	}

	.btnnavbar {
		font-size: 12px;
	}
</style>

<?php
$stylenavbar = '';
$divpadding = '';
if (isset($arr_urinya[2]) && $arr_urinya[2] != 'login' && $arr_urinya[2] != 'register' && $arr_urinya[2] != 'forgot') {
	$stylenavbar = 'oren';
	$divpadding = '<div style="margin-top:48px;"></div>';
}

//--------------------------------------------------------------------------------------------------- tambahan 28 April 2022
//================================================================================================= Script Mendeteksi HP atau Laptop (Bukan HP)
// Mobile Detect
// @license    http://www.opensource.org/licenses/mit-license.php The MIT License

if(class_exists('Mobile_Detect') != true)
{
//========================
class Mobile_Detect
{
	protected $accept;
	protected $userAgent;
	protected $isMobile = false;
	protected $isAndroid = null;
	protected $isAndroidtablet = null;
	protected $isIphone = null;
	protected $isIpad = null;
	protected $isBlackberry = null;
	protected $isBlackberrytablet = null;
	protected $isOpera = null;
	protected $isPalm = null;
	protected $isWindows = null;
	protected $isWindowsphone = null;
	protected $isGeneric = null;
	protected $devices = array(
		"android" => "android.*mobile",
		"androidtablet" => "android(?!.*mobile)",
		"blackberry" => "blackberry",
		"blackberrytablet" => "rim tablet os",
		"iphone" => "(iphone|ipod)",
		"ipad" => "(ipad)",
		"palm" => "(avantgo|blazer|elaine|hiptop|palm|plucker|xiino)",
		"windows" => "windows ce; (iemobile|ppc|smartphone)",
		"windowsphone" => "windows phone os",
		"generic" => "(kindle|mobile|mmp|midp|pocket|psp|symbian|smartphone|treo|up.browser|up.link|vodafone|wap|opera mini)"
	);

	public function __construct()
	{
		$this->userAgent = $_SERVER['HTTP_USER_AGENT'];
		$this->accept = $_SERVER['HTTP_ACCEPT'];

		if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])) {
			$this->isMobile = true;
		} elseif (strpos($this->accept, 'text/vnd.wap.wml') > 0 || strpos($this->accept, 'application/vnd.wap.xhtml+xml') > 0) {
			$this->isMobile = true;
		} else {
			foreach ($this->devices as $device => $regexp) {
				if ($this->isDevice($device)) {
					$this->isMobile = true;
				}
			}
		}
	}

	public function __call($name, $arguments)
	{
		$device = substr($name, 2);
		if ($name == "is" . ucfirst($device) && array_key_exists(strtolower($device), $this->devices)) {
			return $this->isDevice($device);
		} else {
			trigger_error("Method $name not defined", E_USER_WARNING);
		}
	}

	/**
	 * Returns true if any type of mobile device detected, including special ones
	 * @return bool
	 */
	public function isMobile()
	{
		return $this->isMobile;
	}

	protected function isDevice($device)
	{
		$var = "is" . ucfirst($device);
		$return = $this->$var === null ? (bool) preg_match("/" . $this->devices[strtolower($device)] . "/i", $this->userAgent) : $this->$var;
		if ($device != 'generic' && $return == true) {
			$this->isGeneric = false;
		}
		return $return;
	}
}
//========================
} //if(class_exists('Mobile_Detect') != true)

//==================================================================
$detect = new Mobile_Detect();
if ($detect->isMobile()) {
	$ini_HP	  = 1;		// -- berarti posisinya di HP
	$untuk_HP = "IYA";	// -- berarti posisinya di HP
} else {
	$ini_HP	  = "";		// -- berarti posisinya di Laptop
	$untuk_HP = "";		// -- berarti posisinya di Laptop
}
//================================================================================================= /Script Mendeteksi HP atau Laptop (Bukan HP)
?>

<?php echo $divpadding; ?>
<nav class="navbar navbar-custom <?php echo $stylenavbar; ?> fixed-top navbar-expand-lg">
	<div class="container">
		<div class="row py-1">
			<div class="col-md-10 mb-1"> 

			<?php if ($ini_HP == 1) {?>

				<table>
					<tr>
						<td style="width:300px;">
							<a href="https://edunovasi.com/#">
								<img href='<?php echo $inc_; ?>' src="<?php echo $inc_; ?>/assets/ic/logodotcom.png" class="img-fluid" style="height:48px; cursor:pointer">
							</a>
						</td>
					</tr>
					<tr>
						<td style="padding:5px 0 0 5px;" nowrap>
							<a class="btnnavbar btn btn-sm btn-primary small" style="font-size:12pt; padding: 4px 24px !important;" target="_blank" href="https://edunitas.com/educampus/carikampus/semua-wilayah/semua-kelas/semua-prodi">Cari Kampus / Prodi</a>
						</td>
					<tr>
				</table>

			<?php } else {?>

				<table >
					<tr>
						<td style="width:375px;">
							<a href="https://edunovasi.com/#">
								<img href='<?php echo $inc_; ?>' src="<?php echo $inc_; ?>/assets/ic/logodotcom.png" class="img-fluid" style="height:55px; cursor:pointer">
							</a>
						</td>
						<td style="padding:21px 0 0 5px;" nowrap>
							<a class="btnnavbar btn btn-sm btn-primary small" style="font-size:12pt; padding: 4px 24px !important;" target="_blank" href="https://edunitas.com/educampus/carikampus/semua-wilayah/semua-kelas/semua-prodi">Cari Kampus, Cari Prodi</a>
						</td>
					<tr>
				</table>

			<?php } ?>

			</div>
		</div>
		<button class="navbar-toggler px-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<div class="fas fa-bars"></div>
		</button>
		<div class="collapse navbar-collapse mb-md-4" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="<?php echo $inc_; ?>#">Beranda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="<?php echo $inc_; ?>#tryout">Try Out</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="<?php echo $inc_; ?>/webinar">Webinar</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="<?php echo $inc_; ?>#keunggulan">Keunggulan</a>
				</li>
				<?php
				if (isset($_SESSION['userdata'])) {
					echo '
					
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="' . $sesi['foto'] . '" width="25" height="25" class="rounded-circle" onerror="this.onerror=null;this.src=' . $inc_ . '/assets/img/blank-profile.jpg">
									' . $sesi['nama'] . '
								</a>

								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<li><a class="dropdown-item" href="' . $inc_ . '/dashboard/event/history">Dashboard</a></li>
									<li><a class="dropdown-item" href="' . $inc_ . '/logout">Logout</a></li>
								</ul>
							</li>
						';
				} else {
					echo '
							<li class="nav-item">
								<a class="nav-link btn btn-sm btn-primary px-4 py-3" aria-current="page" href="' . $inc_ . '/register">Registrasi</a>
							</li>
						';
					if (isset($arr_urinya[2]) && $arr_urinya[2] == 'login') {
					} else {
						echo '
						<li class="nav-item">
							<a class="nav-link btn btn-sm btn-outline-primary px-4 py-3" aria-current="page" href="' . $inc_ . '/login">Login</a>
						</li>
						';
					}
				}
				?>
			</ul>
		</div>
	</div>
</nav>