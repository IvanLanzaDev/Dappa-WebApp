<?php
    $link = mysqli_connect("localhost","u970163064_nwspa","spajardim@2018");
    if($link){
        mysqli_select_db($link, "u970163064_nwspa");
    }else{
        echo "Erro ao conectar ao banco de dados!!!";
    }
?>