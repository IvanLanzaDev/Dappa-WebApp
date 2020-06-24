<?php include("functions.class.php"); include("session.class.php");?>

<?php

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#003F5D">

    <title>Dappa - Dashboard Consultório</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="body-app">
    <?php include("header-clinic.class.php"); ?>

  <div class="container">

    <?php 

      if($verify_clinic == 0) {
        echo "
          <div class='alert text-center alert-danger mt-3' role='alert'> 
            
            <strong>Você ainda não completou seu cadastro.</strong><br><hr>
            <small>
            Os pacientes só conseguem agendar consultas em seu consultório quando os seus dados estão completos.<br><br>
            <a href='my-clinic.php' class='btn btn-info btn-block btn-lg'>Finalizar Cadastro</a>
            </small>
          </div>
        ";
      }

    ?>
    <div class="card mt-3 mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-9">

            <h6 class="card-subtitle mb-2 text-muted">Olá </h6>
            <h5 class="card-title mb-0"><?php echo $user_login_info['name_users']; ?></h5>

          </div>
          <div class="col-3">

            <img src="imgs/logo-gradient.png" class="img-fluid size-logo-card-top">
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <nav>
      <div class="nav nav-tabs mx-auto" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Consultas Agendadas</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Meus Médicos</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="green-default tab-pane fade show active " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      
        <?php
        while($list_get_schedule_clinic = mysqli_fetch_array($get_schedule_clinic)){
          
          $get_user_schedule = mysqli_query($link, "SELECT * FROM users WHERE id_users = '$list_get_schedule_clinic[paciente_id_schedule]' ");
          $get_doctor_schedule = mysqli_query($link, "SELECT * FROM doctors WHERE id_doctors = '$list_get_schedule_clinic[doctor_schedule]' ");
          $list_user_schedule = mysqli_fetch_array($get_user_schedule);
          $list_doctor_schedule = mysqli_fetch_array($get_doctor_schedule);

          $date_schedule = $list_get_schedule_clinic['date_schedule'];
          $day_date_schedule_br = date('d', strtotime($list_get_schedule_clinic['date_schedule']));

          $months = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

          $weekdays = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
          
          $today = getdate(strtotime($date_schedule));
          
          $day = $today["mday"];
          $month = $today["mon"];
          $nomemes = $months[$month];
          $year = $today["year"];
          $weekday = $today["wday"];
          $nameweekday = $weekdays[$weekday];

          if($list_get_schedule_clinic['confirm_schedule'] == "Não") {
            $nConf_schedule = "<span class='text-danger'>Não confirmado</span>";
            $nConfBTN_schedule2 = "<a href='confirm-schedule.php?schedule=$list_get_schedule_clinic[id_schedule]' class='btn btn-success float-left disabled'>Confirmar Consulta</a> ";
            $nConfBTN_schedule = "<button type='submit' class='btn btn-success' name='confirm-schedule-dashboard-clinic-BTN'>Confirmar Consulta</button>";
          }
          else if($list_get_schedule_clinic['confirm_schedule'] == "Sim"){ 
            $conf_schedule = "<span class='text-success'>Confirmado</span>";
          }

          

          if($list_get_schedule_clinic['id_cancel_schedule'] == 0) {
            echo "
            <div class='card mb-1'>
              
              <div class='card-body border border-bottom'>
                  <h5 class='card-title'>Data: <span class='card-subtitle mb-2 text-muted'> <small>$day de $nomemes de $year </small> </span>  </h5>
                  
                  <h5 class='card-title'>Paciente: <span class='card-subtitle mb-2 text-muted'> <small>$list_user_schedule[name_users] </small> </span></h5>
                  
                  <h5 class='card-title'>Médico: <span class='card-subtitle mb-2 text-muted'> <small>$list_doctor_schedule[name_doctors] </small> </span></h5>
                  ";
                  
                  if(($list_get_schedule_clinic['confirm_schedule'] == "Não")){
                    echo $nConf_schedule;
                  }
                  if(($list_get_schedule_clinic['confirm_schedule'] == "Sim")){
                    echo $conf_schedule;
                  }

                  
                  echo "
                  <a href='#' class='btn btn-success btn-sm float-right' data-toggle='modal' data-target='#modalCenter$list_get_schedule_clinic[id_schedule]'>Detalhes</a> 
              </div>
              
            </div>

            
            <div class='modal fade' id='modalCenter$list_get_schedule_clinic[id_schedule]' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
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
                        <p class='text-muted'>$list_get_schedule_clinic[hour_schedule]</p>
                      </div>
                    </div>

                    <p class='text-success my-0 py-0'><Strong>Paciente</Strong></p>
                    <p class='text-muted'>$list_user_schedule[name_users]</p>

                    <p class='text-success my-0 py-0'><Strong>Médico</Strong></p>
                    <p class='text-muted'>$list_doctor_schedule[name_doctors]</p>

                    <p class='text-success my-0 py-0'><Strong>Especialidade</Strong></p>
                    <p class='text-muted'>$list_get_schedule_clinic[spec_schedule]</p>

                    <p class='text-success my-0 py-0'><Strong>Metodo de pagamento</Strong></p>
                    <p class='text-muted'>$list_get_schedule_clinic[payment_schedule]</p>
                
                    <p class='text-success my-0 py-0'><Strong>Consulta confirmada ?</Strong></p>
                    <p class='text-muted'>$list_get_schedule_clinic[confirm_schedule]</p>
                    

                  </div>
                  <div class='modal-footer'>
                    <form method='post' action='#'>
                      <input type='hidden' name='confirm_schedule' value='Sim'>
                      <input type='hidden' name='id_schedule' value='$list_get_schedule_clinic[id_schedule]'>
                      $nConfBTN_schedule
                    </form>
                    <form method='post' action='#'>
                      <input type='hidden' name='id_cancel_schedule' value='$user_login_info[id_users]'>
                      <input type='hidden' name='id_schedule' value='$list_get_schedule_clinic[id_schedule]'>
                      <button type='submit' class='btn btn-outline-danger' name='cancel-schedule-dashboard-clinic-BTN'>Cancelar Consulta</button>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          ";
          }
          
        }

        if($count_schedule_clinic == 0) {
          echo "
              <div class='alert alert-info text-center mt-3' role='alert'>
                <small>
                  <strong>Você ainda não possui consultas agendadas.</strong><br>
                </small>
              </div>
              ";
        }
        ?>

      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <?php

            if($count_clinic_doctors == 0) {
              echo "
              <div class='alert alert-danger text-center mt-3' role='alert'>
                <small>
                <strong>Você ainda não possui médicos cadastrados.</strong><br>
                
                <a href='my-doctors.php' class='alert-link'>Clique aqui</a> para cadastrar médicos.
                </small>
              </div>
              ";
            } else {
              while($list_doctors_dashboard_tab = mysqli_fetch_array($get_doctor_dashboard)){
                echo "
                  <div class='card mb-3'>
                    <div class='card-body'>
                      <h5 class='card-title'>$list_doctors_dashboard_tab[name_doctors]</h5>
                      <h6 class='card-subtitle mb-2 text-muted'>$list_doctors_dashboard_tab[spec_doctors]</h6>
                      <a href='my-new-doctors.php' class='btn btn-success btn-sm'>Detalhes</a>
                    </div>
                  </div>
                ";
              }
            }
          
        
        ?>
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

