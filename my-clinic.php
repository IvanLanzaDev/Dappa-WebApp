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
    <?php include("header-clinic.class.php"); ?>

  <div class="container">
    <div class="card mt-3 mb-4">
      <div class="card-body">
      <h3 class="text-center text-muted">Meu Consultório</h3>
      <?php 

        if($verify_clinic == 0) {
          echo "

          <small><p class='text-secondary text-center'>Preencha os campos abaixo corretamente.</p></small>
<hr>
        <form method='POST' action='' enctype='multipart/form-data'>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Nome do Consultório' name='name_clinics' value='$logged_user[name_users]' disabled>
            </div>
            
            <div class='form-group'>

              <label for='especForm'> 
                Horário de funcionamento 
                <small id='hourHelp' class='form-text text-muted'> Segunda a sexta </small> 
              </label>
            
                <input type='text' class='form-control time' aria-describedby='hourHelp' placeholder='Abertura' name='weekstart_time_clinics'>
                <br>
                
                <input type='text' class='form-control time' aria-describedby='hourHelp' placeholder='Fechamento' name='weekfinal_time_clinics'>
                <br>
               
                <label for='especForm'> 
                  <small id='hourHelp' class='form-text text-muted'> Finais de semana </small> 
                </label>
                
                <input type='text' class='form-control time' aria-describedby='hourHelp' placeholder='Abertura' name='weekendstart_time_clinics'>
                <br>
                
                <input type='text' class='form-control time' aria-describedby='hourHelp' placeholder='Fechamento' name='weekendfinal_time_clinics'>

            </div>
            <div class='form-group'>
              <label for='especForm'>
                Especialidades
                <small id='especHelp' class='form-text text-muted'>Utilize a tecla <i class='text-info'><strong>CTRL</strong></i> para selecionar varias especialidades</small>
              </label>
              
              <select multiple class='form-control' id='especForm' aria-describedby='especHelp' name='espec_clinics[]'>
                ";
                  while($list_select_especs = mysqli_fetch_array($get_specs_select_input)){
                    echo " 
                      <option>$list_select_especs[name_especs]</option>
                    ";
                  }
                
                
                echo "
              </select>
            </div>

            <div class='form-group'>
              <label for='especForm'>
                Exames
                <small id='examHelp' class='form-text text-muted'>Utilize a tecla <i class='text-info'><strong>CTRL</strong></i> para selecionar varios exames</small>
              </label>
              
              <select multiple class='form-control' id='examForm' aria-describedby='examHelp' name='exam_clinics[]'>
              ";
                  while($list_select_exames = mysqli_fetch_array($get_exames_select_input)){
                    echo "
                      <option>$list_select_exames[name_exames]</option>
                    ";
                  }
              echo "
              </select>
            </div>

            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Endereço' name='local_clinics'>
            </div>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Google Maps' name='map_clinics'>
                <small id='hourHelp' class='form-text text-muted'><strong><a href='#'>Precisa de ajuda para inserir o mapa? Clique aqui</a></small>
            </div>
            <div class='form-group'>
                <input type='text' class='form-control phone_with_ddd' placeholder='Telefone do consultório' name='contact_clinics'>
            </div>
            <div class='custom-file'>
              <input type='file' class='custom-file-input' id='customFile' lang='pt-br' name='photo_clinics'>
              <label class='custom-file-label' for='customFile'>Foto do Consultório</label>
            </div>

            <input type='hidden' class='form-control' name='user_clinics' value='$user_login_info[name_users]'>
                  
            
            <button type='submit' class='btn btn-block btn-success mt-4' name='btn_new_clinic'>Cadastrar Consultório</button>
          
        </form>

          ";
        } else {
          echo "
          <table class='table'>
        <thead>
          <tr>
            <th scope='col'>Nome</th>
            <th scope='col'></th>
            <th scope='col'></th>
            
          </tr>
        </thead>
  <tbody> ";

    
    
        while($list_clinic_user = mysqli_fetch_array($alert_clinic)){
            echo "
            <tr>
                <th scope='row'><small><strong>$list_clinic_user[name_clinics]</strong></small></th>
                <td></td>
                
                <td>
                    <button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modalCenter$list_clinic_user[id_clinics]'>
                        <i class='fas fa-info-circle'></i>
                    </button>
                </td>
            </tr> 

            <div class='modal fade' id='modalCenter$list_clinic_user[id_clinics]' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Detalhes do consultório</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                  <p class='text-success my-0 py-0'><Strong>Nome</Strong></p>
                    <p class='text-muted'>$list_clinic_user[name_clinics]</p>

                    <p class='text-success my-0 py-0'>Especialidades</p>
                    <p class='text-muted'>$list_clinic_user[espec_clinics]</p>

                    <p class='text-success my-0 py-0'><Strong>Exames</Strong></p>
                    <p class='text-muted'>$list_clinic_user[exam_clinics]</p>

                    <p class='text-success my-0 py-0'><Strong>Horario de Funcionamento</Strong></p>
                    <p class='text-muted'>
                    <strong> Segunda à sexta: </strong> $list_clinic_user[weekstart_time_clinics] às $list_clinic_user[weekfinal_time_clinics]. <br>
                    <strong> Finais de semana: </strong> $list_clinic_user[weekendstart_time_clinics] às $list_clinic_user[weekendfinal_time_clinics]</p>

                    <p class='text-success my-0 py-0'><Strong>Endereço</Strong></p>
                    <p class='text-muted'>$list_clinic_user[local_clinics]</p>

                    <p class='text-success my-0 py-0'><Strong>Mapa</Strong></p>
                    <div class='map-clinic-detail'> $list_clinic_user[map_clinics] </div>

                    <div class='row'>
                      <div class='col-6'>
                        <p class='text-success my-0 py-0'><Strong>Telefone</Strong></p>
                        <p class='text-muted'>$list_clinic_user[contact_clinics]</p>
                      </div>

                      <div class='col-12'>
                        <p class='text-success my-0 py-0'><Strong>Foto</Strong></p>
                        <img src='$list_clinic_user[photo_clinics]' class='img-fluid'>
                      </div>
                    </div>

                  </div>
                  <div class='modal-footer'>
                    
                  </div>
                </div>
              </div>

            ";
        }

    echo "

    
  </tbody>
</table>
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

    <script src="js/jquery.mask.js"></script>

    <script>
      $(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00');
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

