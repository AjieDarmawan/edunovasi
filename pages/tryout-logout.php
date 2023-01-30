<?php
session_destroy();
echo "<script>window.location.href='" . $inc_ . "/login'</script>";
?>
<script>
    sessionStorage.removeItem('savetime');
    sessionStorage.removeItem('savemulai');
    sessionStorage.removeItem('savemateri');
    sessionStorage.removeItem('tryoutujian');
</script>