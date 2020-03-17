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
        
        <p class="lead green-default mt-3"><strong><small>Nome do Consultório</small></strong> <br> 
            <span class="text-secondary"><small> <?php echo $list_clinic_schedule_detail['name_clinics']; ?> </small></span>
        </p>

        <p class="lead green-default"><strong><small>Horário de Funcionamento</small></strong> <br> 
            <span class="text-secondary">
              <small>
                Segunda a Sexta: <?php echo $list_clinic_schedule_detail['weekstart_time_clinics']; ?> às <?php echo $list_clinic_schedule_detail['weekfinal_time_clinics']; ?> <br>

                Sábado: <?php echo $list_clinic_schedule_detail['weekendstart_time_clinics']; ?> às <?php echo $list_clinic_schedule_detail['weekendfinal_time_clinics']; ?> 
              </small>
            </span>
        </p>

        <p class="lead green-default"><strong><small>Especialidades</small></strong> <br> 
            <span class="text-secondary"><small> <?php echo $list_clinic_schedule_detail['espec_clinics']; ?> </small></span>
        </p>

        <p class="lead green-default"><strong><small>Exames</small></strong> <br> 
            <span class="text-secondary"><small> <?php echo $list_clinic_schedule_detail['exam_clinics']; ?>  </small></span>
        </p>

        <p class="lead green-default"><strong><small>Endereço</small></strong> <br> 
            <span class="text-secondary"><small> <?php echo $list_clinic_schedule_detail['local_clinics']; ?>  </small></span>
            <?php echo $list_clinic_schedule_detail['map_clinics']; ?>
        </p>
        

        <div class="fixed-resume fixed-bottom lh-1 bg-dark rounded-top pb-2 border-top border-success">
              <p class="lead green-default ml-2 mt-2">Resumo</p>

              <div class="ml-2">
                <p class="lead lh-1 text-light"><?php echo $list_resume_clinic_schedule_detail['name_doctors']; ?><br>
                <span><small><?php echo $list_resume_clinic_schedule_detail['spec_doctors']; ?></small></span>
                </p>

                <p class="lead green-default">R$ <?php echo $list_specs_time_schedule['price_especs'];?></p>

                <p class="lead text-white"><?php $date = $_GET['date']; ?>
                <form method="get">
                  
                </form>
                  <?php // GET PARAMS
                    echo "
                      <a href='time-schedule.php?date=$date&&local=$list_clinic_schedule_detail[name_clinics]&&spec=$list_resume_clinic_schedule_detail[spec_doctors]&&doctor=$list_resume_clinic_schedule_detail[id_doctors]' class='btn btn-success btn-block'>Prosseguir</a>
                    ";
                  ?>
              </div>
        </div>
        

    </div>
  </body>
</html>