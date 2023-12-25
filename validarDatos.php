<?php
// 9 DATOS
// Se capturan los valores recibidos por POST
/*########################PILOTO######################################*/
if (isset($_POST['nom1'])) {
    $nom = $_POST['nom1'];
}
if (isset($_POST['apellido'])) {
    $ape = $_POST['apellido'];
}
if (isset($_POST['dni'])) {
    $dni = $_POST['dni'];
}
if (isset($_POST['horasV'])) {
    $horV = $_POST['horasV'];
}
/*########################VUELO######################################*/
if (isset($_POST['codVuelo'])) {
    $codV = $_POST['codVuelo'];
}
/*########################AEROPUERTO######################################*/
if (isset($_POST['ubicacionS'])) {
    $ubi = $_POST['ubicacionS'];
}
/*########################AVION######################################*/
if (isset($_POST['tipoAvion'])) {
    $tipoA = $_POST['tipoAvion'];
}

if (isset($_POST['modeloAvion'])) {
    $modA = $_POST['modeloAvion'];
}
?>