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
    
        <h4 class="text-center green-default mt-4">Detalhes do Agendamento</h4>
        <hr>
        
        <?php
          if($list_pacient_schedule_details['id_cancel_schedule'] != 0) {
            echo "
            <div class='alert alert-danger text-center' role='alert'>
              <strong> Atencão </strong> <br>
              Sua consulta foi <strong> cancelada</strong>. <br>Entre em contato com o consultório para maiores informações.
<hr>
              <small> Mesmo que a consulta ela esteja confirmada.<br> Se você está vendo esta mensagem ela foi realmeante <strong> cancelada !!!!</strong> </small>
            </div>
            "; 
          }
         ?>

        <?php $date_schedule_br = date('d/m/Y', strtotime($list_pacient_schedule_details['date_schedule'])); ?>

        

        <div class="row col-12 p-0">

            <div class="col-4 ">
                <p class="lead blue-default mt-3">
                    <strong><small>Data</small></strong><br>
                    <span class="green-default"><small> <?php echo $date_schedule_br; ?> </small></span>
                </p>
            </div>

            <div class="col-4 ">
                <p class="lead blue-default mt-3">
                    <strong><small>Horário</small></strong><br>
                    <span class="green-default"><small> <?php echo $list_pacient_schedule_details['hour_schedule']; ?> </small></span>
                </p>
            </div>

            <div class="col-4 ">
                <p class="lead blue-default mt-3">
                    <strong><small>Confirmado</small></strong><br>
                    <span class="green-default"><small> <?php echo $list_pacient_schedule_details['confirm_schedule']; ?> </small></span>
                </p>
            </div>

        </div>

        <p class="lead blue-default"><strong><small>Local</small></strong> <br> 
            <span class="green-default">
              <small>
                <strong><?php echo $list_pacient_schedule_details['local_schedule']; ?><br></strong>
              </small>
            </span>
            <span class="text-muted">
              <small>
                <?php echo $list_clinic_pacient_schedule_detail['local_clinics']; ?><br>
                
              </small>
            </span>
        </p>

                <!-- Botão para acionar modal -->
                <button type="button" class="btn btn-dappa" data-toggle="modal" data-target="#ExemploModalCentralizado">
                Ver mapa
                </button>

        <!-- modal -->
            <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title green-default" id="exampleModalLabel"> Mapa <?php echo $list_pacient_schedule_details['local_schedule']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $list_clinic_pacient_schedule_detail['map_clinics']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
            </div>

        <!-- End modal -->

    </div>
  </body>
</html>