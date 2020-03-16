<?php
    include("connect.class.php");
    include("session.class.php");

    $user_login = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$_SESSION[email_users]' AND password_users = '$_SESSION[password_users]'");
    $user_login_info = mysqli_fetch_array($user_login);

    // Verify if user data is complete
    $cpf_users = $user_login_info['cpf_users'];
    $social_name_users = $user_login_info['social_name_users'];
    $sex_users = $user_login_info['sex_users'];
    $phone_users = $user_login_info['phone_users'];
    $address_users = $user_login_info['address_users'];
    $city_users = $user_login_info['city_users'];
    $state_users = $user_login_info['state_users'];
    $emergency_name_users = $user_login_info['emergency_name_users'];
    $emergency_tel_users = $user_login_info['emergency_tel_users'];

    if($cpf_users || $social_name_users || $sex_users || $phone_users || $address_users || $city_users || $state_users || $emergency_name_users || $emergency_tel_users == "") {
        header('location: user-personal-data.php');
    }else{
        echo "completo";
    }
    
?>