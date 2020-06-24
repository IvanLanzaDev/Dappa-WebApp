<?php include("functions.class.php"); include("session.class.php");?>
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
    <?php include("header-doctor.class.php"); ?>

  <div class="container">
    <div class="card mt-3 mb-4">
      <div class="card-body">
      <h3 class="text-center text-muted">Meu Cadastro</h3>


      
      <small><p class="text-secondary text-center mt-3">Preencha os campos abaixo corretamente para cadastrar novo especialista.</p></small>
<hr>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome do especialista" name="" value="<?php echo $logged_user["name_users"]; ?>" disabled>
                <input type="hidden" class="form-control" placeholder="Nome do especialista" name="name_doctors" value="<?php echo $logged_user["name_users"]; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control crm" placeholder="CRM" name="crm_doctors">
            </div>
            <div class="form-group">
                <select class="custom-select" name="sex_doctors">
                    <option selected>Sexo</option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                    <option>Prefiro não dizer</option>
                </select>
            </div>
            <div class="form-group">
            <select class="custom-select" name="spec_doctors">
              <option selected>Especialidade</option>
              <?php
              
                while($list_spec_doctors = mysqli_fetch_array($get_specs_select_input)){
                  echo "
                    <option>$list_spec_doctors[name_especs]</option>
                  ";
                }
              
              ?>
            </select>
            </div>
            <div class="form-group">
            <select class="custom-select" name="local_doctors">
              <option selected>Local de atendimento</option>
              <?php
              
                while($list_local_doctors = mysqli_fetch_array($get_clinics)){
                  echo "
                    <option>$list_local_doctors[name_clinics]</option>
                  ";
                }
              
              ?>
            </select>
            </div>
            

            <hr>


            <div class="form-group">
                <input type="text" class="form-control rg" placeholder="RG" name="rg_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control cpf" placeholder="CPF" name="cpf_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Endereço" name="address_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Cidade" name="city_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Estado" name="state_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Pais" name="country_doctors">
            </div>

            <hr>

            <div class="form-group">
                <input type="text" class="form-control phone_with_ddd" placeholder="Telefone" name="tel_doctors">
            </div>
            <div class="form-group">
                <input type="text" class="form-control celphone" placeholder="Celular" name="cel_doctors">
            </div>

            <input type="hidden" value="<?php echo $user_login_info['id_users']; ?>" name="id_clinic_doctors">

            <button type="submit" class="btn btn-success btn-block" name="btn_new_doctor_profile">Cadastrar</button>
        </form>

      </div>
    </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.js"></script>

    <script>
      $(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.celphone').mask('(00) 0 0000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.rg').mask('00.000.000-00', {reverse: true});
  $('.crm').mask('00000000-00/AA', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
    </script>
  </body>
</html>

