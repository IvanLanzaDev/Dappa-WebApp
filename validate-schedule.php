<?php
     include("functions.class.php"); include("session.class.php");

     // GET PARAMS
     $time_validade = $_GET['time'];
     $date_validade = $_GET['date'];
     $local_validade = $_GET['local'];
     $spec_validade = $_GET['spec'];
     $doctor_validade = $_GET['doctor'];

     echo $time_validade;
     echo $date_validade;
     echo $local_validade;
     echo $spec_validade;
     echo $doctor_validade;

     $validade_schedule = mysqli_query($link, "SELECT * FROM schedule WHERE date_schedule = '$date_validade' AND hour_schedule = '$time_validade' AND local_schedule = '$local_validade' AND doctor_schedule = '$doctor_validade' AND spec_schedule = '$spec_validade'");

     $count_schedule = mysqli_num_rows($validade_schedule);

     if($count_schedule == 0) {
        $args = array(
            'time' => $_GET['time'],
            'date' => $_GET['date'],
            'local' => $_GET['local'],
            'spec' => $_GET['spec'],
            'doctor' => $_GET['doctor'],
            );

         //$params = "time=$time_validade&&date=$date_validate&&local=$clinic_validate&&spec=$spec_validate&&doctor=$doctor_validate";
         
         header("Location: resume-schedule.php?time=".$time_validade."&&date=".$date_validade."&&local=".$local_validade."&&spec=".$spec_validade."&&doctor=".$doctor_validade." ");
     }else{
        header("Location: error-schedule.php?time=".$time_validade."&&date=".$date_validade."&&local=".$local_validade."&&spec=".$spec_validade."&&doctor=".$doctor_validade." ");
     }



?>