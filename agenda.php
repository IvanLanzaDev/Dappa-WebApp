<?php
   /* include("functions.class.php");

    echo $list_specs_time_schedule['duration_especs'];

$intervalo  = 45;
echo "<pre>\r\n";
    $inicio = '08:00';
    $final  = '19:30';
    do
    {
        list($hora, $minuto) = explode(':', $inicio);
        //echo "INSERT INTO agenda (hora) VALUES('$inicio')\r\n";
        echo "INSERT INTO calendar (hora_calendar) VALUES('$inicio')\r\n";
        //echo "'$inicio'\r\n";
        $inicio = date("H:i", mktime($hora, $minuto + $intervalo) );
    }
    while( $inicio <= $final );
    
    echo "\r\n</pre>";
*/
?>