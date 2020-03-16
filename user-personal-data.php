<?php include("functions.class.php"); include("session.class.php");?>

<?php
  $user_login = mysqli_query($link, "SELECT * FROM users WHERE email_users = '$_SESSION[email_users]' AND password_users = '$_SESSION[password_users]'");
  $user_login_info = mysqli_fetch_array($user_login);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <meta name="theme-color" content="#003F5D">

    <title>Dappa - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/center-content.css" rel="stylesheet">
  </head>

  <body>
    <?php include("header.class.php"); ?>

    <div class="container text-center">
        <p class="lead mt-3 text-success">Dados Pessoais</p>
        <p class="text-secondary">Preencha seus dados abaixo para que sua ficha médica e prontuário sejam gerados corretamente.</p>
        <a href="#" class="text-info">Porque precisamos dos seus dados?</a>

        <form method="post" action="#">
            <div class="row mt-5">
                <div class="form-group col-6">
                    <input type="number" class="form-control form-dappa" placeholder="CPF">
                </div>
                <div class="form-group col-6">
                    <input type="text" id="socialName" class="form-control form-dappa" placeholder="Nome Social">
                    <small id="socialName" class="form-text text-left text-muted">*** Opcional</small>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <select name="sex_users" class="form-control form-dappa">
                        <option selected>Sexo</option>
                        <option>Masculino</option>
                        <option>Feminino</option>
                        <option>Prefiro não dizer</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <input type="text" id="socialName" class="form-control form-dappa" placeholder="Data de Nascimento">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-dappa" placeholder="Telefone">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <input type="text" class="form-control form-dappa" placeholder="Cidade">
                </div>
                <div class="form-group col-6">
                    <input type="text" id="socialName" class="form-control form-dappa" placeholder="Estado">
                </div>
            </div>

            <p class="text-success text-left mt-3"> Contato de emergência </p>
            <div class="form-group">
                <input type="text" class="form-control form-dappa" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-dappa" placeholder="Telefone">
            </div>
            
            
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

