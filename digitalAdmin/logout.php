<?php
session_start();


$path = "index.php";

unset($_SESSION['log_id']);
session_regenerate_id(true);
session_destroy();
header("Location:$path");
?>