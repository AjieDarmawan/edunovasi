<?php
session_destroy();
$inc_ = 'http://localhost/e_sekolah';
echo "<script>window.location.href='" . $inc_ . "/login'</script>";
?>
<script>
    sessionStorage.removeItem('savetime');
    sessionStorage.removeItem('savemulai');
    sessionStorage.removeItem('savemateri');
    sessionStorage.removeItem('tryoutujian');
</script>