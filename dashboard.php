<?php include("functions.class.php"); include("session.class.php");?>



<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <meta name="theme-color" content="#003F5D">

    <title>Dappa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <?php include("header.class.php"); ?>

    <div class="container">

    <?php
    
    if($count_verify_users != 0) {
      echo "
        <div class='alert text-center alert-danger mt-3' role='alert'> 
          
          <strong>Você ainda não completou seu cadastro.</strong><br><hr>
          <small>
          Você só consegue agendar consultas com o seu cadastro completo.<br><br>
          <a href='complete-account.php' class='btn btn-info btn-block btn-lg'>Finalizar Cadastro</a>
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
              <h5 class="card-title mb-0"><?php echo $user_login_info['name_users']; ?></h5>
            </div>
            <div class="col-3">
              <img src="imgs/logo-gradient.png" class="img-fluid size-logo-card-top">
            </div>
          </div>
        </div>
      </div>

      

      <?php
        // GET SCHEDULE FOR PACIENT
        $get_schedule = mysqli_query($link, "SELECT * FROM schedule WHERE paciente_id_schedule = $user_login_info[id_users] ORDER BY date_schedule ASC");

        $count_get_schedule = mysqli_num_rows($get_schedule);

        if($count_get_schedule == 0 && $count_verify_users == 0) {
          echo "
            <div class='container text-center'>
              <p class='lead text-secondary'> Você ainda não tem consultas agendadas </p>
              <a href='search.php' class='btn text-center btn-dappa'> Clique aqui para agendar </a>
            </div>
            ";
        }else{
          echo "<p class='lead text-center green-default'>Consultas Agendadas</p>";
        }

        while ( $list_schedule = mysqli_fetch_array($get_schedule) ) {

          $date_schedule = $list_schedule['date_schedule'];
          $day_date_schedule_br = date('d', strtotime($list_schedule['date_schedule']));

          $months = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");

          $weekdays = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
          
          $today = getdate(strtotime($date_schedule));
          
          $day = $today["mday"];
          $month = $today["mon"];
          $nomemes = $months[$month];
          $year = $today["year"];
          $weekday = $today["wday"];
          $nameweekday = $weekdays[$weekday];
         
          echo "

            <div class='card mt-3 mb-4'>
              <div class='card-body'>
              
                <p class='lead green-default mb-0 pb-0'>$day <small><span> de </span></small> $nomemes <small><span> de </span></small> $year </p>
                <p class='lead green-default'> <small><span> $nameweekday </span></small> </p>

                <p class='blue-default mb-0'> Especialidade: <span class='green-default'> $list_schedule[spec_schedule] </span> </p> 
                <p class='blue-default'> Horário: <span class='green-default'> $list_schedule[hour_schedule] </span> </p> 
                ";
                if($list_schedule['id_cancel_schedule'] != 0) {
                  echo "<span class='badge badge-pill badge-danger p-2 float-left'>Consulta cancelada</span>";
                }
                echo "
                <a href='details-pacient-scheduling.php?pacient_schedule=$list_schedule[id_schedule]' class='green-default float-right'>Mais detalhes</a>
              </div>
            </div>

          ";
        }
      ?>

      

    </div>  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

