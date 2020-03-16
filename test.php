<?php include("functions.class.php"); ?>

<?php
     session_start();
     echo $_SESSION['email_users'];
     echo $_SESSION['password_users'];
     

     $email_session_login = $_SESSION['email_users'];

     $get_user_session_details = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$email_session_login'");
     $user_session_details = mysqli_fetch_array($get_user_session_details);

     $type_user = $user_session_details['type_users'];

     

     switch($type_user){
         case "Paciente":
            header("location: dashboard.php");
         break;
         case "Médico":
            header("location: dashboard-doctor.php");
         break;
         case "Consultório":
            header("location: dashboard-clinic.php");
         break;
     }


     
     
?>