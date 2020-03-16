<?php
    include("connect.class.php");
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

    // GET ESPECS for SELECT INPUT
    $get_specs_select_input = mysqli_query($link, "SELECT * FROM especs ORDER By name_especs ASC");

    // GET EXAM for SELECT INPUT
    $get_exames_select_input = mysqli_query($link, "SELECT * FROM exames ORDER By name_exames ASC");

    // CREATE NEW CLINIC
    $name_clinics = $_POST['name_clinics'];
    $time_clinics = $_POST['time_clinics'];
    $espec_clinics = $_POST['espec_clinics'];
    $exam_clinics = $_POST['exam_clinics'];
    $local_clinics = $_POST['local_clinics'];
    $map_clinics = $_POST['map_clinics'];
    $contact_clinics = $_POST['contact_clinics'];
    // PHOTO POST ON THE UPLOAD 
    $btn_new_clinic = $_POST['btn_new_clinic'];

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
      $insert_new_clinic = mysqli_query($link, "INSERT INTO clinics (name_clinics, time_clinics, espec_clinics, exam_clinics, local_clinics, map_clinics, contact_clinics, photo_clinics) VALUES('$name_clinics','$time_clinics','$implode_array_especs','$implode_array_exam','$local_clinics','$map_clinics','$contact_clinics','$diretorio')");
      if($insert_new_clinic) { echo "foi"; }
    }

    // CREATE NEW DOCTOR ON CLINIC
    $name_doctors = $_POST['name_doctors'];
    $crm_doctors = $_POST['crm_doctors'];
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

    if(isset($btn_new_doctor)){
         $insert_new_doctor = mysqli_query($link, "INSERT INTO doctors(name_doctors, crm_doctors, spec_doctors, local_doctors, rg_doctors, cpf_doctors, address_doctors, city_doctors, state_doctors, country_doctors, tel_doctors, cel_doctors, id_clinic_doctors) VALUES ('$name_doctors', '$crm_doctors', '$spec_doctors', '$local_doctors', '$rg_doctors', '$cpf_doctors', '$address_doctors', '$city_doctors', '$state_doctors', '$country_doctors', '$tel_doctors', '$cel_doctors', '$id_clinic_doctors')");
         
         if($insert_new_doctor){
             $last_doctor_id = mysqli_insert_id($link);
             header("location: ok-new-doctor.php?doctor=$last_doctor_id");
         }
    }

    //GET DOCTOR URL ID ON NEW DOCTOR
    $id_doctor_url = $_GET['doctor'];
    $get_doctor_url = mysqli_query($link, "SELECT * FROM doctors WHERE id_doctors = '$id_doctor_url'");
    $get_doctor_url_info = mysqli_fetch_array($get_doctor_url);

    
    //GET CLINICS FOR SELECT
    $get_clinics = mysqli_query($link, "SELECT * FROM clinics ORDER BY name_clinics ASC");

    //GET DOCTORS
    $get_doctors = mysqli_query($link, "SELECT * FROM doctors ORDER BY name_doctors ASC");
    $get_doctors_info = mysqli_query($link, "SELECT * FROM doctors ORDER BY name_doctors ASC");
    $list_doctor_info = mysqli_fetch_array($get_doctors_info);

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

    
        
    ?>