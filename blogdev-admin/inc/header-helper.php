<?php

require '../configurations/config.php';
session_start();

if(!isset($_SESSION['ADMIN_ID'])){
    redirect('login.php');
}

?>