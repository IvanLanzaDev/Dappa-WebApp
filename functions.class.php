<?php
    include("connect.class.php");
    session_start();

    echo $_SESSION["logged_user"];
    //include("session.class.php");
    //include("connectDev.class.php");
  

// NEW ACCOUNT
    $name_users = $_POST['name_users'];
    $type_users = $_POST['type_users'];
    $email_users = $_POST['email_users'];
    $password_users = $_POST['password_users'];
    $btn_new_account = $_POST['btn_new_account'];

    if(isset($btn_new_account)) {
        $new_account = mysqli_query($link, "INSERT INTO users(name_users, type_users, email_users, password_users)VALUES('$name_users','$type_users','$email_users','$password_users')");

        if($new_account){
            session_start();
            $_SESSION['email_users'] = $_POST['email_users'];
            $_SESSION['password_users'] = $_POST['password_users'];
            $nome_session = $_SESSION['email_users'];
            $password_session = $_SESSION['password_users'];

            header("location: test.php");
        }
    }

    // LOGIN
    $email_login = $_POST['email_users'];
    $password_login = $_POST['password_users'];
    $btn_login = $_POST['btn_login'];

    if(isset($btn_login)){
        $execute_login = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$email_login' AND password_users = '$password_login'");
        $count_execute_login = mysqli_num_rows($execute_login);

        if($count_execute_login == 1){
            session_start();
            $_SESSION['email_users'] = $_POST['email_users'];
            $_SESSION['password_users'] = $_POST['password_users'];
            $email_session = $_SESSION['email_users'];
            $password_session = $_SESSION['password_users'];

            header("location: test.php");
        }else{
            echo "Erro Login";
        }
    }

    $logeed_info = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$_SESSION[email_users]' AND password_users = '$_SESSION[password_users]'");

    $logged_user = mysqli_fetch_array($logeed_info);

    // GET ESPECS for SELECT INPUT
    $get_specs_select_input = mysqli_query($link, "SELECT * FROM especs ORDER By name_especs ASC");

    // GET EXAM for SELECT INPUT
    $get_exames_select_input = mysqli_query($link, "SELECT * FROM exames ORDER By name_exames ASC");

    // CREATE NEW CLINIC
    $name_clinics = $_POST['name_clinics'];
    $weekstart_time_clinics = $_POST['weekstart_time_clinics'];
    $weekfinal_time_clinics = $_POST['weekfinal_time_clinics'];
    $weekendstart_time_clinics = $_POST['weekendstart_time_clinics'];
    $weekendfinal_time_clinics = $_POST['weekendfinal_time_clinics'];
    $espec_clinics = $_POST['espec_clinics'];
    $exam_clinics = $_POST['exam_clinics'];
    $local_clinics = $_POST['local_clinics'];
    $map_clinics = $_POST['map_clinics'];
    $contact_clinics = $_POST['contact_clinics'];
    // PHOTO POST ON THE UPLOAD 
    $btn_new_clinic = $_POST['btn_new_clinic'];
    $user_clinics = $_POST['user_clinics'];

    // Get the select multiple form value and insert on array
    $array_especs = $espec_clinics;
    $implode_array_especs = "";
    foreach ($array_especs as $item) $implode_array_especs .= $item . ", ";
    $implode_array_especs;

    // Get the select multiple form value and insert on array
    $array_exam = $exam_clinics;
    $implode_array_exam = "";
    foreach ($array_exam as $item) $implode_array_exam .= $item . ", ";
    $implode_array_exam;

    // UPLOAD DE IMG
    $nome = $_FILES['photo_clinics']['name'];
    $temporario = $_FILES['photo_clinics']['tmp_name'];
    $diretorio = "imgs/clinics/".$nome;
    move_uploaded_file($temporario, $diretorio); 
    
    if(isset($btn_new_clinic)){
      $insert_new_clinic = mysqli_query($link, "INSERT INTO clinics (name_clinics, weekstart_time_clinics, weekfinal_time_clinics, weekendstart_time_clinics, weekendfinal_time_clinics, espec_clinics, exam_clinics, local_clinics, map_clinics, contact_clinics, photo_clinics, user_clinics) VALUES('$name_clinics','$weekstart_time_clinics','$weekfinal_time_clinics','$weekendstart_time_clinics','$weekendfinal_time_clinics','$implode_array_especs','$implode_array_exam','$local_clinics','$map_clinics','$contact_clinics','$diretorio','$user_clinics')");
      if($insert_new_clinic) { header("location: ok-new-clinic.php"); }
    }

    // CREATE NEW DOCTOR ON CLINIC
    $name_doctors = $_POST['name_doctors'];
    $crm_doctors = $_POST['crm_doctors'];
    $sex_doctors = $_POST['sex_doctors'];
    $spec_doctors = $_POST['spec_doctors'];
    $local_doctors = $_POST['local_doctors'];
    $rg_doctors = $_POST['rg_doctors'];
    $cpf_doctors = $_POST['cpf_doctors'];
    $address_doctors = $_POST['address_doctors'];
    $city_doctors = $_POST['city_doctors'];
    $state_doctors = $_POST['state_doctors'];
    $country_doctors = $_POST['country_doctors'];
    $tel_doctors = $_POST['tel_doctors'];
    $cel_doctors = $_POST['cel_doctors'];
    $id_clinic_doctors = $_POST['id_clinic_doctors'];

    $btn_new_doctor = $_POST['btn_new_doctor'];
    $btn_new_doctor_profile = $_POST['btn_new_doctor_profile'];

    if(isset($btn_new_doctor)){
         $insert_new_doctor = mysqli_query($link, "INSERT INTO doctors(name_doctors, crm_doctors, sex_doctors, spec_doctors, local_doctors, rg_doctors, cpf_doctors, address_doctors, city_doctors, state_doctors, country_doctors, tel_doctors, cel_doctors, id_clinic_doctors) VALUES ('$name_doctors', '$crm_doctors', '$sex_doctors', '$spec_doctors', '$local_doctors', '$rg_doctors', '$cpf_doctors', '$address_doctors', '$city_doctors', '$state_doctors', '$country_doctors', '$tel_doctors', '$cel_doctors', '$id_clinic_doctors')");
         
         if($insert_new_doctor){
             $last_doctor_id = mysqli_insert_id($link);
             header("location: ok-new-doctor.php?doctor=$last_doctor_id");
         }
    }
    if(isset($btn_new_doctor_profile)){
        $insert_new_doctor = mysqli_query($link, "INSERT INTO doctors(name_doctors, crm_doctors, sex_doctors, spec_doctors, local_doctors, rg_doctors, cpf_doctors, address_doctors, city_doctors, state_doctors, country_doctors, tel_doctors, cel_doctors, id_clinic_doctors) VALUES ('$name_doctors', '$crm_doctors', '$sex_doctors', '$spec_doctors', '$local_doctors', '$rg_doctors', '$cpf_doctors', '$address_doctors', '$city_doctors', '$state_doctors', '$country_doctors', '$tel_doctors', '$cel_doctors', '$id_clinic_doctors')");
        
        if($insert_new_doctor){
            $last_doctor_id = mysqli_insert_id($link);
            header("location: ok-new-doctor-profile.php?doctor=$last_doctor_id");
        }
   }

    //GET DOCTOR URL ID ON NEW DOCTOR
    $id_doctor_url = $_GET['doctor'];
    $get_doctor_url = mysqli_query($link, "SELECT * FROM doctors WHERE id_doctors = '$id_doctor_url'");
    $get_doctor_url_info = mysqli_fetch_array($get_doctor_url);

    // GET DOCTOR FOR DASHBOARD
    $get_doctor_dashboard = mysqli_query($link, "SELECT * FROM doctors WHERE local_doctors = '$logged_user[name_users]' ");

    
    //GET CLINICS FOR SELECT
    $get_clinics = mysqli_query($link, "SELECT * FROM clinics ORDER BY name_clinics ASC");

    //GET DOCTORS
    
        $get_doctors = mysqli_query($link, "SELECT * FROM doctors WHERE local_doctors = '$logged_user[name_users]' ");
        $get_doctors_info = mysqli_query($link, "SELECT * FROM doctors WHERE local_doctors = '$logged_user[name_users]' ");
        $list_doctor_info = mysqli_fetch_array($get_doctors_info); 
        $count_clinic_doctors = mysqli_num_rows($get_doctors);
    

    //EDIT DOCTORS INFO
    $btn_edit_doctor = $_POST['btn_edit_doctor'];

    if(isset($btn_edit_doctor)){
        $edit_doctors = mysqli_query($link, "UPDATE doctors SET name_doctors='$name_doctors', crm_doctors='$crm_doctors', spec_doctors='$spec_doctors', local_doctors='$local_doctors', rg_doctors='$rg_doctors', cpf_doctors='$cpf_doctors', address_doctors='$address_doctors', city_doctors='$city_doctors', state_doctors='$state_doctors', country_doctors='$country_doctors', tel_doctors='$tel_doctors', cel_doctors='$cel_doctors' WHERE id_doctors='$id_doctor_url'");

        if($edit_doctors){
            header("location: ok-edit-doctor.php?doctor=$id_doctor_url");
        }
    }

    // SEARCH DOCTORS
    $spec_search = $_POST['spec_search'];
    $city_search = $_POST['city_search'];
    $sex_search = $_POST['sex_search'];
    $date_search = $_POST['date_search'];
    $btn_search = $_POST['btn_search']; 

    if(isset($btn_search)){
        $months = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
        $weekdays = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
        
        $today = getdate(strtotime($date_search));
        
        $day = $today["mday"];
        $month = $today["mon"];
        $nomemes = $months[$month];
        $year = $today["year"];
        $weekday = $today["wday"];
        $nameweekday = $weekdays[$weekday];

        
        if($sex_search == "Indiferente") {
            $search_doctor = mysqli_query($link, "SELECT * FROM `doctors` WHERE `spec_doctors` LIKE '$spec_search' AND `city_doctors` LIKE '$city_search'");
        }else{
            $search_doctor = mysqli_query($link, "SELECT * FROM `doctors` WHERE `spec_doctors` LIKE '$spec_search' AND `city_doctors` LIKE '$city_search' AND `sex_doctors` LIKE '$sex_search'");
        }

        // COUNT RESULTS
        if($search_doctor){
            $count_search_doctor_results = mysqli_num_rows($search_doctor);
            $list_search_doctor = mysqli_fetch_array($search_doctor);
        }
    }

    //GET SCHEDULE DETAILS
    $local = $_GET['local'];
    $spec = $_GET['spec'];
    $doctor = $_GET['doctor'];

    $get_clinic_schedule_detail = mysqli_query($link, "SELECT * FROM clinics WHERE name_clinics = '$local'");    
        $list_clinic_schedule_detail = mysqli_fetch_array($get_clinic_schedule_detail);

    $resume_clinic_schedule_detail = mysqli_query($link, "SELECT * FROM doctors WHERE id_doctors = '$doctor'");
        $list_resume_clinic_schedule_detail = mysqli_fetch_array($resume_clinic_schedule_detail);
    
    // TIME SCHEDULE
    $get_specs_time_schedule = mysqli_query($link, "SELECT * FROM especs WHERE name_especs = '$spec'");
        $list_specs_time_schedule = mysqli_fetch_array($get_specs_time_schedule);

    
    // CONFIRM PAYMENT
        $date_payment = $_POST['date_schedule'];
        $time_payment = $_POST['hour_schedule'];
        $clinic_payment = $_POST['local_schedule'];
        $doctor_payment = $_POST['doctor_schedule'];
        $spec_payment = $_POST['spec_schedule'];
        $confirm_payment = $_POST['confirm_schedule'];
        $pag_payment = 'PagSeguro';
        $con_payment = 'Consultório';
        $pacient_id_payment = $_POST['paciente_id_schedule'];

        $confirm_btn = $_POST['confirm_payment_btn'];
        $consult_btn = $_POST['consult_payment_btn'];

        if(isset($confirm_btn)) {
            $confirm_payment = mysqli_query($link, "INSERT INTO schedule
            (date_schedule, hour_schedule, local_schedule, doctor_schedule, spec_schedule, payment_schedule, confirm_schedule, paciente_id_schedule)
            VALUES('$date_payment','$time_payment','$clinic_payment','$doctor_payment','$spec_payment','$pag_payment','$confirm_payment','$pacient_id_payment')");
            
            if($confirm_payment) {
                header("Location: schedule.php?type=1");
            }
            
        }
        if(isset($consult_btn)) {
            $consult_payment = mysqli_query($link, "INSERT INTO schedule
            (date_schedule, hour_schedule, local_schedule, doctor_schedule, spec_schedule, payment_schedule, confirm_schedule, paciente_id_schedule)
            VALUES('$date_payment','$time_payment','$clinic_payment','$doctor_payment','$spec_payment','$con_payment','$confirm_payment','$pacient_id_payment')");

            if($consult_payment) {
                header("Location: schedule.php?type=2");
            }
        }

        // PACIENT SCHEDULE DETAILS
        $pacient_schedule_details = $_GET['pacient_schedule'];
        $get_pacient_schedule_details = mysqli_query($link, "SELECT * FROM schedule where id_schedule = '$pacient_schedule_details' ");
        $list_pacient_schedule_details = mysqli_fetch_array($get_pacient_schedule_details);

        $get_clinic_pacient_schedule_detail = mysqli_query($link, "SELECT * FROM clinics WHERE name_clinics = '$list_pacient_schedule_details[local_schedule]'");
        $list_clinic_pacient_schedule_detail = mysqli_fetch_array($get_clinic_pacient_schedule_detail);

        //ALERT NEW CLINIC
        
        $alert_clinic = mysqli_query($link, "SELECT * FROM clinics WHERE user_clinics = '$logged_user[name_users]' ");
        $alert_clinic1 = mysqli_query($link, "SELECT * FROM clinics WHERE user_clinics = '$logged_user[name_users]' ");
        $verify_clinic = mysqli_num_rows($alert_clinic);
        
        $get_user_clinic1 = mysqli_fetch_array($alert_clinic1);

        // GET SCHEDULE CLINIC
        $get_schedule_clinic = mysqli_query($link, "SELECT * FROM `schedule` WHERE `local_schedule` = '$get_user_clinic1[user_clinics]'");
        $get_schedule_clinic1 = mysqli_query($link, "SELECT * FROM `schedule` WHERE `local_schedule` = '$get_user_clinic1[user_clinics]' AND id_cancel_schedule = 0");
        $count_schedule_clinic = mysqli_num_rows($get_schedule_clinic1);

        // CONFIRM SCHEDULE
        $confirm_schedule_field = $_POST['confirm_schedule'];
        $id_confirm_schedule = $_POST['id_schedule'];
        $btn_confirm_schedule = $_POST['confirm-schedule-dashboard-clinic-BTN'];
        

        if(isset($btn_confirm_schedule)) {
            $confirm_schedule = mysqli_query($link, "UPDATE schedule SET confirm_schedule='$confirm_schedule_field' WHERE id_schedule = '$id_confirm_schedule' ");
            if($confirm_schedule) { header("Refresh: 0"); }
        }

        // CANCEL SCHEDULE
        $id_schedule_to_be_canceled = $_POST['id_schedule'];
        $id_user_cancel_schedule = $_POST['id_cancel_schedule'];
        $btn_cancel_schedule = $_POST['cancel-schedule-dashboard-clinic-BTN'];

        if(isset($btn_cancel_schedule)) {
            $cancel_schedule = mysqli_query($link, "UPDATE schedule SET id_cancel_schedule='$id_user_cancel_schedule' WHERE id_schedule = '$id_schedule_to_be_canceled' ");
            if($cancel_schedule) { header("Refresh: 0"); }
        }

        // VERIFY DOCTOR
        $verify_doctor = mysqli_query($link, "SELECT * FROM doctors WHERE name_doctors = '$logged_user[name_users]'");
        $count_verify_doctor = mysqli_num_rows($verify_doctor);
        
        // GET SCHEDULE FOR DOCTOR
        $get_doctor_for_schedule = mysqli_query($link, "SELECT * FROM doctors WHERE name_doctors = '$logged_user[name_users]'");
        $get_info_doctor_for_schedule = mysqli_fetch_array($get_doctor_for_schedule);

        $get_schedule_doctor = mysqli_query($link, "SELECT * FROM schedule WHERE doctor_schedule = '$get_info_doctor_for_schedule[id_doctors]' ");
        $get_schedule_doctor1 = mysqli_query($link, "SELECT * FROM schedule WHERE doctor_schedule = '$get_info_doctor_for_schedule[id_doctors]' AND id_cancel_schedule = 0 ");
        $count_schedule_doctors = mysqli_num_rows($get_schedule_doctor1);


        //MEDICAL RECORD FOR DOCTOR
        $schedule_id_doctor_URL = $_GET['schedule'];
        $get_schedule_data = mysqli_query($link, "SELECT * FROM schedule WHERE id_schedule = '$schedule_id_doctor_URL' ");
        $list_schedule_data = mysqli_fetch_array($get_schedule_data);

        $get_pacient_data = mysqli_query($link, "SELECT * FROM users WHERE id_users = '$list_schedule_data[paciente_id_schedule]' ");
        $list_pacient_data = mysqli_fetch_array($get_pacient_data);

        // VERIFY USER
        //$verify_users = mysqli_query($link, "SELECT * FROM users WHERE id_users = '$logged_user[id_users]'");
        $verify_users = mysqli_query($link, "SELECT * FROM users WHERE coalesce(cpf_users, sex_users, phone_users, address_users, city_users, state_users, emergency_name_users, emergency_tel_users, born_users, weight_users, height_users) = '' AND id_users = '$logged_user[id_users]' AND type_users = 'Paciente' ");
        $count_verify_users = mysqli_num_rows($verify_users);

        // COMPLETE ACCOUNT USERS
        $cpf_users = $_POST['cpf_users'];
        $social_name_users = $_POST['social_name_users'];
        $sex_users = $_POST['sex_users'];
        $phone_users = $_POST['phone_users'];
        $address_users = $_POST['address_users'];
        $city_users = $_POST['city_users'];
        $state_users = $_POST['state_users'];
        $emergency_name_users = $_POST['emergency_name_users'];
        $emergency_tel_users = $_POST['emergency_tel_users'];
        $born_users = $_POST['born_users'];
        $weight_users = $_POST['weight_users'];
        $height_users = $_POST['height_users'];
        $btn_complete_account_user = $_POST['btn_complete_account_user'];

        if(isset($btn_complete_account_user)) {
            $complete_account_user = mysqli_query($link, "UPDATE users SET cpf_users='$cpf_users', social_name_users='$social_name_users', sex_users='$sex_users', phone_users='$phone_users', address_users='$address_users', city_users='$city_users', state_users='$state_users', emergency_name_users='$emergency_name_users', emergency_tel_users='$emergency_tel_users', born_users='$born_users', weight_users='$weight_users', height_users='$height_users' WHERE id_users = '$logged_user[id_users]' ");

            if($complete_account_user) {
                header("location: ok-complete-account.php");
            }
        }

        // GET CID
        $get_cid = mysqli_query($link, "SELECT * FROM cid ORDER BY idCid ASC")


        
        
        //SELECT * FROM `users` WHERE `cpf_users` OR `social_name_users` OR `sex_users` OR `phone_users` OR `address_users` OR `city_users` OR `state_users` OR `emergency_name_users` OR `emergency_tel_users` OR `born_users` OR `weight_users` OR `height_users` = ""

    ?>