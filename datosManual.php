<?php
$nom='';
$ape='';
$dni='';
$horV='';
$codV='';
$ubi='';
$tipoA='';
$modA='';
$tiempoEspera = '';
$paginaDestino = '';        
$mensaje = '';
$tipoDeAlert = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
 include 'validarDatos.php';
    if (empty($nom)) {
        $mensaje = 'LOS DATOS NO FUERON ENVIADOS';
        $tipoDeAlert = 'alert-danger';
    } else {
        // ABRE CONEXION CON LA BASE DE DATOS PARA INSERTAR LOS DATOS ENVIADOS A TRAVES DEL POST Y QUE YA PASARON POR LA VALIDACION
        require 'conexion.php';
        if (!$dbconn) {
            header('Location: ' . NOMBRE_ARCHIVO_ERROR);
            die;
        }
$mensaje = 'LOS DATOS FUERON ENVIADOS';
$tipoDeAlert = 'alert-success';
$datos = array($nom,$ape,$dni,$horV,$codV,$ubi,$tipoA,$modA);
$mi_array_serializado = serialize($datos);
//REDIRECCION A ACONTROL
// Esperar 5 segundos antes de redireccionar
$tiempoEspera = 3;
// Dirección de la página de destino
$paginaDestino = 'cargaDatos.php';
// Configurar cabeceras HTTP para redireccionar
header('refresh: $tiempoEspera; url=$paginaDestino');
setcookie('datos', $mi_array_serializado, time() + 3600, '/');
}
    }
    include 'formulario.php';
    ?>
