<?php
require '../configurations/config.php';
session_start();

unset($_SESSION['ADMIN_ID']);
unset($_SESSION['USER_NAME']);
redirect('../index.php');


?>
