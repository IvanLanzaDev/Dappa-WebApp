<?php include("functions.class.php"); include("session.class.php");?>

<?php
  /*$user_login = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$_SESSION[email_users]' AND password_users = '$_SESSION[password_users]'");
  $user_login_info = mysqli_fetch_array($user_login);*/
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#003F5D">

    <title>Dappa - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="body-app">
    <?php include("header.class.php"); ?>

    <?php 

        // GET NAME OF THE DAY FOR SCHEDULE HOUR
        $date_schedule = $_GET['date'];
        $date_schedule_br = date("d/m/Y", strtotime($date_schedule));

        // GET DATA FOR HOURS
        $clinic_schedule = $_GET['local'];
        $spec_schedule = $_GET['spec'];
        $doctor_schedule = $_GET['doctor'];
        $time_schedule = $_GET['time'];

        $months = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
        $weekdays = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
        
        $today = getdate(strtotime($date_schedule));
        
        $day = $today["mday"];
        $month = $today["mon"];
        $nomemes = $months[$month];
        $year = $today["year"];
        $weekday = $today["wday"];
        $nameweekday = $weekdays[$weekday];

        $get_clinic_hours = mysqli_query($link, "SELECT * FROM clinics WHERE name_clinics = '$clinic_schedule'");
        $list_clinic_hours = mysqli_fetch_array($get_clinic_hours);

        $get_doctor_resume_schedule = mysqli_query($link, "SELECT * FROM doctors WHERE id_doctors = '$doctor_schedule'");
        $list_doctor_resume_schedule = mysqli_fetch_array($get_doctor_resume_schedule);

        echo "
          <div class='container'>
            <h4 class='mt-4 text-secondary text-center'>Agendamento</h4><hr>

            <div class='row'>
              <div class='col-4'>
                <p class='text-info'>Data</p>
                <p class=''>$date_schedule_br</p>
             </div>

              <div class='col-4'>
                <p class='text-info'>Horário</p>
                <p class=''>$time_schedule</p>
              </div>
            </div>
            
            <div class='row mt-4'>
              <div class='col-12'>
                <p class='text-info'>Local</p>
                <p class=''>$clinic_schedule</p>
             </div>
            </div> 

            <div class='row mt-4'>
              <div class='col-6'>
                <p class='text-info'>Especialista</p>
                <p class=''>$list_doctor_resume_schedule[name_doctors]</p>
             </div>
             <div class='col-6'>
                <p class='text-info'>Especialidade</p>
                <p class=''>$spec_schedule</p>
             </div>
            </div> 

            <div class='row mt-4'>
              <div class='col-12 text-center'>
                <h3 class=''>R$ $list_specs_time_schedule[price_especs]</h3>
             </div>
            </div> 

            <div class='row mt-4'>
              <div class='col-12 text-center'>
                
              
              <form action='https://pagseguro.uol.com.br/checkout/v2/payment.html' method='post' onsubmit='PagSeguroLightbox(this); return false;'>
              
              <input type='hidden' name='code' value='3DA4854803038D844474CFA42E64BFA2' />
              <input type='hidden' name='iot' value='button' />
              <input type='image' src='https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif' name='submit' alt='Pague com PagSeguro - é rápido, grátis e seguro!' />
              </form>
              <script type='text/javascript' src='https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js'></script>
              
                
              </div>
            </div>

            <div class='row mt-4'>
              <div class='col-12 text-center'>
                <a href='#' class='btn btn-outline-success'>Pagar no consultório</a>
              </div>
            </div>
            
           
            
        ";
        
        echo "</div>"
        
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

