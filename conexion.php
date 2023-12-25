<?php
// Conectando y seleccionado la base de datos  
$conexion = "host=localhost dbname=pruebaSimuladorOV user=postgres password=8970AAd25";
$dbconn = pg_connect($conexion)
    or die('No se ha podido conectar: ' . pg_last_error());
?>