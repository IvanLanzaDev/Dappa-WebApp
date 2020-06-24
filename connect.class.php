

<?php
    // DAPPA HOST $link = mysqli_connect("localhost","u957122484_dev","dappa2019");
    $link = mysqli_connect("localhost","u957122484_dev","dappa@2020"); // FLATPIXEL HOST
    if($link){
        mysqli_select_db($link,"u957122484_dappa");
    }else{
        echo "Erro ao conectar ao banco de dados!!!";
    }
?>