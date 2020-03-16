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
    <?php include("header-doctor.class.php"); ?>

  <div class="container">
    <div class="card mt-3 mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <h6 class="card-subtitle mb-2 text-muted">Olá</h6>
            <h5 class="card-title mb-0">Dr.<?php echo $user_login_info['email_users']; ?></h5>
          </div>
          <div class="col-3">
            <img src="imgs/logo-gradient.png" class="img-fluid size-logo-card-top">
          </div>
        </div>
      </div>
    </div>
    <h4 class="text-muted text-center">Consultas Agendadas</h4>

    <div class="card mt-3 mb-4">
        <div class="card-body">
          <a href="#" data-toggle="modal" data-target="#ExemploModalCentralizado">
            <div class="row mb-4">
              <div class="col-9">
                <small>
                  <p class="text-success mb-0 pb-0 px-0 mx-0">Nome do Paciente</p>
                  <spam class="text-muted">Clinica bom coração</spam>
                </small>
              </div>
              <div class="col-3 px-0 text-center">
                <small>
                  <p class="text-muted mb-0 pb-0">00</p>
                  <spam class="text-muted">Dezembro</spam>
                </small>
              </div>
            </div>
          </a>
          <a href="#" data-toggle="modal" data-target="#ExemploModalCentralizado">
            <div class="row mb-4">
              <div class="col-9">
                <small>
                  <p class="text-success mb-0 pb-0 px-0 mx-0">Nome do Paciente</p>
                  <spam class="text-muted">Clinica bom coração</spam>
                </small>
              </div>
              <div class="col-3 px-0 text-center">
                <small>
                  <p class="text-muted mb-0 pb-0">00</p>
                  <spam class="text-muted">Dezembro</spam>
                </small>
              </div>
            </div>
          </a>
          <a href="#" data-toggle="modal" data-target="#ExemploModalCentralizado">
            <div class="row mb-4">
              <div class="col-9">
                <small>
                  <p class="text-success mb-0 pb-0 px-0 mx-0">Nome do Paciente</p>
                  <spam class="text-muted">Clinica bom coração</spam>
                </small>
              </div>
              <div class="col-3 px-0 text-center">
                <small>
                  <p class="text-muted mb-0 pb-0">00</p>
                  <spam class="text-muted">Dezembro</spam>
                </small>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

  
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

