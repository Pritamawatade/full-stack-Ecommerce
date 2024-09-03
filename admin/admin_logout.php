<?php
session_start();

unset($_SESSION['isadmin']);


header("location: ../index.php");
exit;
?>