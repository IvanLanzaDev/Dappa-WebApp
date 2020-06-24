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

    <title>Dappa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/select2.min.css" />

    <style>
.select2-dropdown {top: 22px !important; left: 8px !important;}
</style>
    

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="body-app">
    <?php include("header-doctor.class.php"); ?>

    <div class="container">

        <div class="text-center mt-5">
        
            <h3 class="text-info">Prontuário</h3>
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#pacientData" aria-expanded="false" aria-controls="collapseExample">
                Dados do paciente &nbsp;&nbsp; <i class="fas fa-chevron-down"></i>
            </button>

            <div class="collapse" id="pacientData">
                <div class="card card-body text-left">
                    <?php

                        $born_date_br = date('d/M/Y', strtotime($list_pacient_data[born_users]));
                        echo "
                            <p class=''> <span class='text-info'>Nome completo:</span>  $list_pacient_data[name_users] </p>
                            <p class=''> <span class='text-info'>Data de nascimento:</span>  $born_date_br </p>
                            <p class=''> <span class='text-info'>CPF:</span> $list_pacient_data[cpf_users] </p>
                            <p class=''> <span class='text-info'>Sexo:</span>  $list_pacient_data[sex_users] </p>
                            <p class=''> <span class='text-info'>Nome social:</span>  $list_pacient_data[social_name_users] </p>
                            <p class=''> <span class='text-info'>Peso:</span>  $list_pacient_data[weight_users] </p>
                            <p class=''> <span class='text-info'>Altura:</span>  $list_pacient_data[height_users] </p>
                            <p class=''> <span class='text-info'>Cidade:</span>  $list_pacient_data[city_users] </p>
                            <p class=''> <span class='text-info'>Estado:</span>  $list_pacient_data[state_users] </p>
                            
                            <strong> <p> Contato de emergência </p> </strong>
                            <p class=''> <span class='text-info'>Nome completo:</span>  $list_pacient_data[emergency_name_users] </p>
                            <p class=''> <span class='text-info'>Nome completo:</span>  $list_pacient_data[emergency_tel_users] </p>
                        ";
                    ?>
                </div>
            </div>

            <form method="post" action="" class="text-left mt-3">
                <div class="form-group">
                    <label for="anamnese" class=" text-info">Anamnese</label>
                    <textarea class="form-control" id="anamnese" rows="10" name="anamnese_medical_record"></textarea>
                </div>

                <div class='form-group'>
                    Hábitos de vida e outras informações: <input id="toggle-habits" type="checkbox">
                </div>
                <div class="form-group">
                Exame Físico: <input id="toggle-fisicExam" type="checkbox">
                </div>
                <div class="accordion" id="accordionExample">
                
                    <div class="card" id="habitsAndOther">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-info collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                            Hábitos de vida e outras informações 
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                            
                                <div class="form-group">
                                    <label for="anamnese" class=" text-info">Atividade Física</label>
                                    <input type="text" class="form-control" name="fisic_medical_record">
                                </div>
                                <div class="form-group">
                                    <label for="anamnese" class=" text-info">Etilismo</label>
                                    <input type="text" class="form-control" name="etilism_medical_record">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info">Fumante</label>
                                        <input type="text" class="form-control" name="smoker_medical_record">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info">Usuário de drogas</label>
                                        <input type="text" class="form-control" name="drug_user_medical_record">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anamnese" class=" text-info">Alergia</label>
                                    <input type="text" class="form-control" name="allergy_medical_record">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card" id="fisicExam">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-info collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Exame Físico
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info">Peso</label>
                                        <input type="text" class="form-control" name="weight_medical_record">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info">Altura</label>
                                        <input type="text" class="form-control" name="height_medical_record">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="anamnese" class=" text-info">IMC</label>
                                    <input type="text" class="form-control" name="imc_medical_record">
                                </div>
                                <div class="form-group">
                                    <label for="anamnese" class=" text-info">Temperatura</label>
                                    <input type="text" class="form-control" name="temperature_medical_record">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info"><small>Pressão arterial sistótica</small></label>
                                        <input type="text" class="form-control" name="pas_medical_record">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info"><small>Pressão arterial diastólica</small></label>
                                        <input type="text" class="form-control" name="pad_medical_record">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info"><small>Frequência respiratória</small></label>
                                        <input type="text" class="form-control" name="resp_frequency_medical_record">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="anamnese" class=" text-info"><small>Frequência cardiaca</small></label>
                                        <input type="text" class="form-control" name="card_frequency_medical_record">
                                    </div>
                                </div>
                                
                                
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="form-group mt-3">
                    <label for="anamnese" class=" text-info">Hipótese Diagnóstica</label>
                    <textarea class="form-control" id="anamnese" rows="10" name="diag_hypothesis_medical_record"></textarea>
                </div>
                <div class="form-group">
                    <?php
                    echo "
                    <div class='form-group'>
                    <label for='especForm'>
                      CID
                      
                    </label>
                    
                    <select multiple class='form-control' id='country' aria-describedby='especHelp' name='cid_medical_record'>
                      ";
                        while($list_cid = mysqli_fetch_array($get_cid)){
                          echo " 
                            <option>$list_cid[idCid]: $list_cid[descricaoCid]</option>
                          ";
                        }
                      
                      
                      echo "
                    </select>
                  </div>
                    ";
                    ?>
                </div>
                <div class="form-group">
                    <label for="anamnese" class=" text-info">Conduta</label>
                    <textarea class="form-control" id="anamnese" rows="10" name="conduct_medical_record"></textarea>
                </div>

                <input type="hidden" name="id_user_medical_record" value="<?php ?>"

                <button type="submit" class="btn btn-success btn-lg btn-block mb-4"> Salvar e sair </button>

            </form>

        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#habitsAndOther').hide()
            $('#fisicExam').hide()
        })

        $('#toggle-habits').click(function() {
            $('#habitsAndOther').toggle(500)
        });
        $('#toggle-fisicExam').click(function() {
            $('#fisicExam').toggle(500)
        });

        $("#country").select2( {
	placeholder: "Escolha o CID",
	allowClear: true
	} );

    </script>


  </body>
</html>

