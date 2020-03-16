<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Criar uma conta no Dappa</title>
  </head>
  <body>

    <div class="col-10 mx-auto mt-5">
    <small><p class="text-secondary text-center">
    Pronto! Estamos bem perto de conseguir ajudar você a cuidar da sua saúde de um jeito fácil e rápido.
<br>Preencha seu cadastro e comece ja.
</p></small>
    </div>

    <div class="col-12 mt-5">

    <form method="post" action="">
        <div class="form-group">
            <input type="text" class="form-control dappa-input pt-4 pb-4" name="name_users" placeholder="Digite seu nome" required>
        </div>
        <div class="form-group">
          <select class="form-control dappa-input" name="type_users" required>
            <option disabled selected> Você é um ?</option>
            <option> Paciente</option>
            <option> Consultório</option>
            <option> Médico</option>
          </select>
        </div>
        <div class="form-group">
            <input type="email" class="form-control dappa-input pt-4 pb-4" name="email_users" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control dappa-input pt-4 pb-4" name="password_users" placeholder="Senha" required>
        </div>

        <button class="btn btn-lg btn-block btn-dappa" type="submit" name="btn_new_account">Criar Conta</button>
    </form>

</div>
   
  </body>
</html>