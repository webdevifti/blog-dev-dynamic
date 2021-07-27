<?php

require '../configurations/config.php';

$type = secureValue($_POST['type']);

if($type == 'login'):
    $email_or_username = secureValue($_POST['email']);
    $password = secureValue($_POST['password']);
    //$password = md5($password);
    $user_existance = mysqli_query($con, "SELECT * FROM `admins` WHERE `email`='$email_or_username' OR `username`= '$email_or_username'");
    if(mysqli_num_rows($user_existance) > 0):
        $row = mysqli_fetch_assoc($user_existance);
        $pass = $row['password'];
        //$verify_pass = password_verify($password,$pass);
        if($password != $pass):
            $arr = array(
                'status' => 'error',
                'msg' => 'Password is incorrect',
            );
        else:
            session_start();
            $_SESSION['ADMIN_ID'] = $row['id'];
            $_SESSION['USER_NAME'] = $row['username'];
            $arr = array(
                'status' => 'success',
                'msg' => '',
            );
        endif;

    else:
        $arr = array(
            'status' => 'error',
            'msg' => 'Incorrect Email or Username',
        );
    endif;
    

    echo json_encode($arr);

endif;