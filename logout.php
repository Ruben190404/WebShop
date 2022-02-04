<?php
session_start();
unset($_SESSION["status"]);
unset($_SESSION["adminstatus"]);
header("Location:index.php");
?>