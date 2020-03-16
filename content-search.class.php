


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
    <h3 class="text-center green-default">Vamos lá </h3>
    <small><p class="text-secondary text-center">
    Vamos te ajudar a encontrar o <br>
exame / consulta que você precisa.
</p></small>
    </div>

    <div class="col-12 mt-5">

    <form method="post" action="result-search.php">
    <div class="form-group">
      <select class="form-control dappa-input" name="spec_search" required>
      <option disabled selected>Escolha a especialidade</option>
      <?php
      
        while($list_specs_pacient = mysqli_fetch_array($get_specs_select_input)){
          echo "
            <option> $list_specs_pacient[name_especs] </option>
          ";
        }
      
      ?>
        
      </select>
    </div>
    <div class="form-group">
    <input type="text" class="form-control dappa-input" name="city_search" placeholder="Cidade" required>
    </div>

    <div class="form-group text-center">
      <p class="green-default text-left"><strong>Sexo do Médico</strong></p>
      <div class="row mx-auto">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex_search" id="inlineRadio1" value="Masculino">
        <label class="form-check-label" for="inlineRadio1">Masculino</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex_search" id="inlineRadio2" value="Feminino">
        <label class="form-check-label" for="inlineRadio2">Feminino</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="sex_search" id="inlineRadio3" value="Indiferente">
        <label class="form-check-label" for="inlineRadio3">Indiferente</label>
      </div>
      </div>
  
    </div>

    <div class="form-group">
      <input type="date" class="form-control dappa-input" placeholder="Dia" name="date_search">
    </div>  

        <button class="btn btn-lg btn-block btn-dappa" type="submit" name="btn_search">Buscar</button>
    </form>

</div>
   
  </body>
</html>