<?php
//NEW SESSION

session_start();
$name_session = $_SESSION["name_users"];
$type_session = $_SESSION["type_users"];
$email_session = $_SESSION["email_users"];
$password_session = $_SESSION["password_users"];
if(!isset($email_session) || !isset($password_session)){
    header("Location: index.php");
    exit;
    session_destroy();
}

$user_login = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$_SESSION[email_users]' AND password_users = '$_SESSION[password_users]'");
$user_login_info = mysqli_fetch_array($user_login);
?>