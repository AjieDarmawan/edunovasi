<?php
	unset($_SESSION['utoken']);
	unset($_SESSION['utokenx']);
	unset($_SESSION['utokenxy']);
?>

<script>
	localStorage.removeItem("utoken"); 
	window.location.href = "<?php echo $inc_; ?>/survey";
</script>