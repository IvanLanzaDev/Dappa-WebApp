

<?php
    // DAPPA HOST $link = mysqli_connect("localhost","u957122484_dev","dappa2019");
    $link = mysqli_connect("localhost","u640958987_dappa","dappa2019"); // FLATPIXEL HOST
    if($link){
        mysqli_select_db($link,"u640958987_dappa");
    }else{
        echo "Erro ao conectar ao banco de dados!!!";
    }
?>