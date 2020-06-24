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

    <title>Dappa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="body-app">
    <?php include("header-doctor.class.php"); ?>

  <div class="container">


    <?php

      if($count_verify_doctor == 0) {
        echo "
          <div class='alert text-center alert-danger mt-3' role='alert'> 
            
            <strong>Você ainda não completou seu cadastro.</strong><br><hr>
            <small>
            Os pacientes só conseguem agendar consultas com você quando os seus dados estão completos.<br><br>
            <a href='create-doctors.php' class='btn btn-info btn-block btn-lg'>Finalizar Cadastro</a>
            </small>
          </div>
        ";
      }
    
    ?>


    <div class="card mt-3 mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="card-subtitle mb-2 text-muted">Olá</h6>
            <h5 class="card-title mb-0">Dr. <?php echo $user_login_info['name_users']; ?></h5>
          </div>
          <div class="col-3">
            <img src="imgs/logo-gradient.png" class="img-fluid size-logo-card-top">
          </div>
        </div>
      </div>
    </div>
    <h4 class="text-muted text-center">Consultas Agendadas</h4>

    <?php

      while($list_schedule_doctors = mysqli_fetch_array($get_schedule_doctor)){

        $get_user_schedule = mysqli_query($link, "SELECT * FROM users WHERE id_users = '$list_schedule_doctors[paciente_id_schedule]' ");
        $list_user_schedule = mysqli_fetch_array($get_user_schedule);

        $date_schedule = $list_schedule_doctors['date_schedule'];
        $day_date_schedule_br = date('d', strtotime($list_schedule_doctors['date_schedule']));

        $months = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

        $weekdays = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
        
        $today = getdate(strtotime($date_schedule));
        
        $day = $today["mday"];
        $month = $today["mon"];
        $nomemes = $months[$month];
        $year = $today["year"];
        $weekday = $today["wday"];
        $nameweekday = $weekdays[$weekday];

        if($list_schedule_doctors['confirm_schedule'] == "Não") {
          $nConf_schedule = "<span class='text-danger'>Não confirmado</span>";
          $nConfBTN_schedule2 = "<a href='confirm-schedule.php?schedule=$list_schedule_doctors[id_schedule]' class='btn btn-success float-left disabled'>Confirmar Consulta</a> ";
          $nConfBTN_schedule = "<button type='submit' class='btn btn-success' name='confirm-schedule-dashboard-clinic-BTN'>Confirmar Consulta</button>";
        }
        else if($list_schedule_doctors['confirm_schedule'] == "Sim"){ 
          $conf_schedule = "<span class='text-success'>Confirmado</span>";
          $start_schedule = "<a href='medical-record.php?schedule=$list_schedule_doctors[id_schedule]' class='btn btn-outline-info'> Iniciar Consulta </a>";
        }



        if($list_schedule_doctors['id_cancel_schedule'] == 0) {
        echo "
            <div class='card mb-1'>
              
              <div class='card-body border border-bottom'>
              <h5 class='card-title'>Data: <span class='card-subtitle mb-2 text-muted'> <small>$day de $nomemes de $year </small> </span>  </h5>
                  
                  <h5 class='card-title'>Paciente: <span class='card-subtitle mb-2 text-muted'> <small> $list_user_schedule[name_users] </small> </span></h5>
                  
                  ";
                  
                  if(($list_schedule_doctors['confirm_schedule'] == "Não")){
                    echo $nConf_schedule;
                  }
                  if(($list_schedule_doctors['confirm_schedule'] == "Sim")){
                    echo $conf_schedule;
                  }

                  
                  echo "
                  <a href='#' class='btn btn-success btn-sm float-right' data-toggle='modal' data-target='#modalCenter$list_schedule_doctors[id_schedule]'>Detalhes</a> 
              </div>
              
            </div>";

            echo "
            <div class='modal fade' id='modalCenter$list_schedule_doctors[id_schedule]' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    
                    <h5 class='modal-title' id='TituloModalCentralizado'>Detalhes do agendamento</h5>

                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    
                    <div class='row'>
                      <div class='col-6'>
                        <p class='text-success my-0 py-0'><Strong>Data</Strong></p>
                        <p class='text-muted'>$day de $nomemes de $year</p>
                      </div>

                      <div class='col-6'>
                        <p class='text-success my-0 py-0'><Strong>Horário</Strong></p>
                        <p class='text-muted'>$list_schedule_doctors[hour_schedule]</p>
                      </div>
                    </div>

                    <p class='text-success my-0 py-0'><Strong>Paciente</Strong></p>
                    <p class='text-muted'>$list_user_schedule[name_users]</p>

                    <p class='text-success my-0 py-0'><Strong>Especialidade</Strong></p>
                    <p class='text-muted'>$list_schedule_doctors[spec_schedule]</p>

                    <p class='text-success my-0 py-0'><Strong>Metodo de pagamento</Strong></p>
                    <p class='text-muted'>$list_schedule_doctors[payment_schedule]</p>
                
                    <p class='text-success my-0 py-0'><Strong>Consulta confirmada ?</Strong></p>
                    <p class='text-muted'>$list_schedule_doctors[confirm_schedule]</p>
                    

                  </div>

                  <div class='modal-footer'>
                    $start_schedule
                  </div>
                  
                </div>
              </div>
            </div>";
        }
      }
      if($count_schedule_doctors == 0) {
        echo "
            <div class='alert alert-info text-center mt-3' role='alert'>
              <small>
                <strong>Você ainda não possui consultas agendadas.</strong><br>
              </small>
            </div>
            ";
      }
          
        
        ?>

  
  <!-- Modal -->
<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Detalhes do agendamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-success my-0 py-0"><Strong>Paciente</Strong></p>
        <p class="text-muted">Nome completo do paciente</p>

        <p class="text-success my-0 py-0"><Strong>Data &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Horário</Strong></p>
        <p class="text-muted">00/00/0000 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 00:00</p>

        <p class="text-success my-0 py-0"><Strong>Especialidade</Strong></p>
        <p class="text-muted">Nome da especialidade</p>

        <p class="text-success my-0 py-0"><Strong>Especialista</Strong></p>
        <p class="text-muted">Nome completo do especialista</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
     
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

