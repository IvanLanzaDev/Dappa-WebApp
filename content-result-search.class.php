<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Criar uma conta no Dappa</title>
  </head>
  <body>

    <div class="container">

      <?php 
      if($nameweekday == "Domingo"){
          echo "
            <h3 class='lead text-info text-center mt-5'>Desculpe, não temos clínicas com atendimento aos domingos.</h3>
            <div class='row'>
              <a href='search.php' class='btn btn-outline-success mx-auto'>Tente Novamente</a>
            </div>
          ";
       }elseif($count_search_doctor_results == 0) {
        echo "
          <h3 class='lead text-info text-center mt-5'>Desculpe, não encontramos consultas conforme a sua busca.</h3>
          <div class='row'>
            <a href='search.php' class='btn btn-outline-success mx-auto'>Tente Novamente</a>
          </div>
        ";
      }else {
        echo "
          
          <p class='lead text-secondary text-center mt-3'> Foram encontrados $count_search_doctor_results resultados </p>

          <div class='container-result rounded dappa-border px-1 mt-3'>
            <div class='row'>
              
              <div class='col-8 lh-1 mt-3 ml-3'>
                <p class='lead green-default'> $list_search_doctor[name_doctors] </p>
                <small>
                <h6 class='text-black-50'> $list_search_doctor[spec_doctors]</h6>

                <h6 class='text-black-50'> $list_search_doctor[local_doctors]</h6><br><br>
                </small>
              </div>
              <div class='d-flex justify-content-end align-items-end'>
                <p class='lead green-default mr-3'> R$ 000,00 </p>
              </div>
              <div class='col-12 ml-4 mb-3'>
                <div class='row d-flex justify-content-between'>
                  <a href='details-scheduling.php?local=$list_search_doctor[local_doctors]&&spec=$list_search_doctor[spec_doctors]&&doctor=$list_search_doctor[id_doctors]' class='btn btn-outline-success confirm-doctor'>
                   Mais Detalhes
                  </a>
                  <a href='#' class='btn btn-success confirm-doctor mr-5'>
                   Agendar Consulta
                  </a>
                </div>
              </div>
              </div>
            </div> 
          </div>
            ";
        }
            ?>
  </body>
</html>