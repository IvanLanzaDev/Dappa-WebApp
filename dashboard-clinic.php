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
        
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <?php
        
          while($list_doctors_dashboard_tab = mysqli_fetch_array($get_doctors)){
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

