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

  <body class="">
    <?php include("header.class.php"); ?>

    
    <div class="container text-center mt-5 ">

        <?php 
            $message_type = $_GET['type'];
        if($message_type == 1) {
            echo "
                <i class='fas fa-heart green-default fa-7x mb-3 mt-5'></i>
                <h2 class='text-secondary'>Prontinho</h2>
                <p class='lead text-secondary'>Seu agendamento está pré agendado. <br><br>Efetue o pagamento clicando no botão abaixo para confirmar seu agendamento.</p>
        
                <form action='https://pagseguro.uol.com.br/checkout/v2/payment.html' method='post'>
                    <input type='hidden' name='code' value='00F477979D9D531004D33F9300EA3E89' />
                    <input type='hidden' name='iot' value='button' />
                    <input type='image' src='https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/209x48-pagar-assina.gif' name='submit' alt='Pague com PagSeguro - é rápido, grátis e seguro!' />
                </form>
            ";

        }elseif ($message_type == 2) {
            echo "
                <i class='fas fa-heart green-default fa-7x mb-3 mt-5'></i>
                <h2 class='text-secondary'>Prontinho</h2>
                <p class='lead text-secondary'>Seu agendamento está pré agendado. <br><br> Em brenve</p>
        
                
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

