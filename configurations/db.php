<?php

$con = mysqli_connect('localhost','root','','blogdev_2021_6_26');

if(mysqli_connect_errno()) :
    echo "Error occured while connecting with database".mysqli_connect_errno();
endif;
?>