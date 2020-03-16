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
      <h3 class="text-center text-muted">Meus Especialistas</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Especialidade</th>
            <th scope="col"></th>
            
          </tr>
        </thead>
  <tbody>

    <?php
    
        while($list_doctors = mysqli_fetch_array($get_doctors)){
            echo "
            <tr>
                <th scope='row'><small><strong>$list_doctors[name_doctors]</strong></small></th>
                <td><small>$list_doctors[spec_doctors]</small></td>
                
                <td>
                    <button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modalCenter$list_doctors[id_doctors]'>
                        <i class='fas fa-info-circle'></i>
                    </button>
                </td>
            </tr> 

            <div class='modal fade' id='modalCenter$list_doctors[id_doctors]' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='TituloModalCentralizado'>Detalhes do Especialista</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                  <p class='text-success my-0 py-0'><Strong>Nome</Strong></p>
                    <p class='text-muted'>$list_doctors[name_doctors]</p>

                    <p class='text-success my-0 py-0'>CRM</p>
                    <p class='text-muted'>$list_doctors[crm_doctors]</p>

                    <p class='text-success my-0 py-0'><Strong>Especialidade</Strong></p>
                    <p class='text-muted'>$list_doctors[spec_doctors]</p>

                    <p class='text-success my-0 py-0'><Strong>Cidade</Strong></p>
                    <p class='text-muted'>$list_doctors[city_doctors]</p>

                    <p class='text-success my-0 py-0'><Strong>Estado</Strong></p>
                    <p class='text-muted'>$list_doctors[state_doctors]</p>

                    <p class='text-success my-0 py-0'><Strong>Pais</Strong></p>
                    <p class='text-muted'>$list_doctors[country_doctors]</p>

                    <div class='row'>
                      <div class='col-6'>
                        <p class='text-success my-0 py-0'><Strong>Telefone</Strong></p>
                        <p class='text-muted'>$list_doctors[tel_doctors]</p>
                      </div>

                      <div class='col-6'>
                        <p class='text-success my-0 py-0'><Strong>Celular</Strong></p>
                        <p class='text-muted'>$list_doctors[cel_doctors]</p>
                      </div>
                    </div>

                  </div>
                  <div class='modal-footer'>
                    <a href='edit-doctors.php?doctor=$list_doctors[id_doctors]' class='btn btn-warning'>Editar dados</a>
                  </div>
                </div>
              </div>

            ";
        }

    ?>

    
  </tbody>
</table>
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

