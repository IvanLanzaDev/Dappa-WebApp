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
      <small><p class="text-secondary text-center">Preencha os campos abaixo corretamente.</p></small>
<hr>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome do Consultório" name="name_clinics">
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" aria-describedby="hourHelp" placeholder="Horário de funcionamento" name="time_clinics">
                <small id="hourHelp" class="form-text text-muted"><strong>Exemplo: <br></strong>Segunda à sexta das 7h às 19h30 e aos sábados das 7h às 13h30.</small>
            </div>
            <div class="form-group">
              <label for="especForm">
                Especialidades
                <small id="especHelp" class="form-text text-muted">Utilize a tecla <i class="text-info"><strong>CTRL</strong></i> para selecionar varias especialidades</small>
              </label>
              
              <select multiple class="form-control" id="especForm" aria-describedby="especHelp" name="espec_clinics[]">
                <?php
                  while($list_select_especs = mysqli_fetch_array($get_specs_select_input)){
                    echo "
                      <option>$list_select_especs[name_especs]</option>
                    ";
                  }
                ?>
                
                
              </select>
            </div>

            <div class="form-group">
              <label for="especForm">
                Exames
                <small id="examHelp" class="form-text text-muted">Utilize a tecla <i class="text-info"><strong>CTRL</strong></i> para selecionar varios exames</small>
              </label>
              
              <select multiple class="form-control" id="examForm" aria-describedby="examHelp" name="exam_clinics[]">
              <?php
                  while($list_select_exames = mysqli_fetch_array($get_exames_select_input)){
                    echo "
                      <option>$list_select_exames[name_exames]</option>
                    ";
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Endereço" name="local_clinics">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Google Maps" name="map_clinics">
                <small id="hourHelp" class="form-text text-muted"><strong><a href="#">Precisa de ajuda para inserir o mapa? Clique aqui</a></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Telefone do consultório" name="contact_clinics">
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" lang="pt-br" name="photo_clinics">
              <label class="custom-file-label" for="customFile">Foto do Consultório</label>
            </div>

            <button type="submit" class="btn btn-block btn-success mt-4" name="btn_new_clinic">Cadastrar Consultório</button>
          
        </form>

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

