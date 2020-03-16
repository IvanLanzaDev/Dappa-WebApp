<?php include("functions.class.php"); ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#003F5D">

    <title>Dappa - Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
  

    <form class="form-signin" method="post">
    <img class="square-bg" src="imgs/square-background.png">
      <img class="mb-4 login-size" src="imgs/logo-gradient.png" alt="">
      
      <input type="email" id="inputEmail" class="form-control" placeholder="Digite seu email" required autofocus name="email_users">
      
      <input type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required name="password_users">
      <!--<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="btn btn-lg btn-block btn-dappa" type="submit" name="btn_login">Entrar</button>
      <small>
          <p class="mt-5 mb-3 text-muted">
              Ainda não tem uma conta ? 
              <strong><a href="new-account.php" class="green-default" >Criar conta</a></strong>
            </p>
        </small>
        <img class="square-bg-left" src="imgs/square-background.png">
    </form>
  </body>
</html>

