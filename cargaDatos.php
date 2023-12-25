<?php
include 'formularioControl.php';
//############################DATOS DEL CONTROLADOR########################
$nombre = '';
$tiempo = '';
$tiempoLimite = '';
$contador = 0;

//IP SIMULADOR
         $ip = "http://192.168.0.21:5030/";
         //$ip ="http://192.168.1.37:8080";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $nombre = $_POST['controlador'];
    $tiempo = intval($_POST['tiempo']);
    $tiempoLimite = intval($_POST['tiempoTotal']);
    echo gettype($tiempo);
    echo"<br>";
    echo gettype($contador);
if ($tiempo>0 && $tiempoLimite>0){
    do{
        $contador = $tiempo;
//#################RECIBE DATOS EN JSON DESDE URL######################
//METAR
 /*1*/ $metar = "$ip/json/environment?i=y";//LISTO
//HORA
/*2*/ $tiempo = "$ip/json/instrumentation/clock/indicated-string?i=y";//LISTO
//FRENO
/*3*/ $freno_izq = "$ip/json/controls/gear/brake-left?i=y";//LISTO
/*4*/ $freno_der = "$ip/json/controls/gear/brake-right?i=y";//LISTO
//TIMON
/*5*/ $timon = "$ip/json/controls/flight/rudder?i=y"; //LISTO
//INSTRUMENTOS    
   /*6*/ $airspeed = "$ip/json/instrumentation/airspeed-indicator/true-speed-kt?i=y";//LISTO
   /*7*/ $alttitud = "$ip/json/position/altitude-agl-m?i=y";//LISTO
   /*8*/ $turn_rate = "$ip/json/instrumentation/turn-indicator/indicated-turn-rate?i=y";//LISTO
   /*9*/ $heading = "$ip/json/instrumentation/heading-indicator/heading-bug-error-deg?i=y";//LISTO
   /*10*/ $vertical_speed = "$ip/json/instrumentation/vertical-speed-indicator/indicated-speed-fpm?i=y";//LISTO
   /*11*/ $gps = "$ip/json/instrumentation/gps?i=y";//LISTO
   /*12*/ $latitude = "$ip/json/position/latitude-deg?i=y";//LISTO
   /*13*/ $longitude = "$ip/json/position/longitude-deg?i=y";//LISTO
//########################DECODIFICA############################
   /*1*/ $jmetar = json_decode(file_get_contents($metar), true);
   /*2*/ $jtiempo = json_decode(file_get_contents($tiempo), true);
   /*3*/ $jfreno_izq = json_decode(file_get_contents($freno_izq), true);
   /*4*/ $jfreno_der = json_decode(file_get_contents($freno_der), true);
   /*5*/ $jtimon = json_decode(file_get_contents($timon), true);
   /*6*/ $jairspeed = json_decode(file_get_contents($airspeed), true);
   /*7*/ $jalttitud = json_decode(file_get_contents($alttitud), true);
   /*8*/ $jturn_rate = json_decode(file_get_contents($turn_rate), true);
   /*9*/ $jheading = json_decode(file_get_contents($heading), true);
   /*10*/ $jvertical_speed = json_decode(file_get_contents($vertical_speed), true);
   /*11*/ $jgps = json_decode(file_get_contents($gps), true);
   /*12*/ $jlatitude = json_decode(file_get_contents($latitude), true);
   /*13*/ $jlongitude = json_decode(file_get_contents($longitude), true);
//######################CAPTURA DATO VALUE###########################  
    $vmetar = json_encode($jmetar);//EL JSON ENTERO
    $vtiempo = $jtiempo['value'];
    $vfreno_izq = $jfreno_izq['value'];
    $vfreno_der = $jfreno_der['value'];
    $vtimon = $jtimon['value'];
    $vairspeed = $jairspeed['value'];
    $valttitud = $jalttitud['value'];
    $vturn_rate = $jturn_rate['value'];
    $vheading = $jheading['value'];
    $vvertical_speed = $jvertical_speed['value'];
    $vgps = json_encode($jgps);//CAMBIAR BASE DE DATOS POR JSONB
    $vlatitude = $jlatitude['value'];
    $vlongitude = $jlongitude['value'];   

//########################INSERTAR EN BASE DE DATOS################### 
    include 'conexion.php';
    $sqlmaniobra = "INSERT INTO vuelo (identificacion,hora,metar) VALUES ('$codV','$vtiempo','$vmetar')";
    pg_query($dbconn, $sqlmaniobra);
    
    $sqltimon = "INSERT INTO timon (rudder) VALUES ($vtimon)";
    pg_query($dbconn, $sqltimon);

    $sqlpiloto = "INSERT INTO piloto (nombre,apellido,dni,tiempo_realizado) VALUES ('$nom','$ape',$dni,'$horV')";
    pg_query($dbconn, $sqlpiloto);
 
    $sqlinstrumentos = "INSERT INTO instrumentos (airspeed,attitude,latitude,turn_rate,heading,vertical_speed,longitude,gps) "
            . "VALUES ($vairspeed,$valttitud,$vlatitude,$vturn_rate,$vheading,$vvertical_speed,$vlongitude,'$vgps')";
    pg_query($dbconn, $sqlinstrumentos);   

    $sqlfreno = "INSERT INTO freno (f_pedal_derecho,f_pedal_izquierdo) VALUES ($vfreno_der,$vfreno_izq)";
    pg_query($dbconn, $sqlfreno);  

    $sqlavion = "INSERT INTO avion (tipo_aeronave,modelo) VALUES ('$tipoA', '$modA')";
    pg_query($dbconn, $sqlavion);   

    $sqlaeropuerto = "INSERT INTO aeropuerto (ubicacion) VALUES ('$ubi')";
    pg_query($dbconn, $sqlaeropuerto);
    
   $contador+=$contador;
    usleep(intval($tiempo));
     
    }while($contador<=$tiempoLimite);
        
} else {
    echo 'Es obligatorio que ingrese los tiempos';
}
//Se resetean las variables con valores vacíos para seguir dando de alta otros productos
$gps='';
$vmetar = '';
$vtiempo = '';
$vtimon = '';
$vairspeed = '';
$valttitud = '';
$vlatitude = '';
$vturn_rate = '';
$vheading = '';
$vfreno_der='';
$freno_izq = '';
$vvertical_speed = '';
$vlongitude = '';
$nom='';
$ape='';
$dni='';
$horV='';
$codV='';
$ubi='';
$tipoA='';
$modA='';
header("Location: transicion.php");
    }

?>







