<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
<link href="css/styleControl.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
<div class="row align-items-start">
    <div class="col-sm-12">
<main class="form-signin w-100 m-auto text-center">
   <form class="needs-validation" action="cargaDatos.php" method="POST">
    <img class="mb-4" src="imagenes/logoOV.png" alt="" width="200" height="150">
    <h1 class="h2 mb-2 fw-normal">Complete</h1>

    <div class="form-floating">
      <input type="text" name = "controlador" class="form-control" id="nombre" placeholder="pepito">
      <label for="floatingInput">Nombre del controlador</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="number" name = "tiempo" class="form-control" id="tiempo" placeholder="segundos">
      <label for="floatingPassword">Tiempo en segundos</label>
    </div>
    <br>
        <div class="form-floating">
      <input type="number" name = "tiempoTotal" class="form-control" id="tiempo" placeholder="segundos">
      <label for="floatingPassword">Tiempo limite</label>
    </div>
    <br>
    <button class="w-100 btn btn-lg btn-primary" type="submit">COMENZAR</button>
    

    <p class="mt-5 mb-3 text-center">&copy; 2022–2023 OVDigital</p>
  </form>
   
        </div>
</div>
</div>

    <div class="container">
  <div class="row justify-content-end">
    <div class="col-sm-12">
      <div class="card mb-3 mx-auto card text-white bg-dark" style="max-width: 800px;">
  <div class="row no-gutters">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">FICHA DE INGRESOS MANUAL</h5>
        <div class="table-responsive">
  <table class="table text-white">
      <tr>
       <td><?php 
            // Obtener el valor de la cookie
            $mi_array_serializado = $_COOKIE['datos'];

            // Deserializar el array
            $datos = unserialize($mi_array_serializado);
            
            $nom=$datos[0];
            $ape=$datos[1];
            $dni=$datos[2];
            $horV=$datos[3];
            $codV=$datos[4];
            $ubi=$datos[5];
            $tipoA=$datos[6];
            $modA=$datos[7];
                 echo "Nombre: ".$nom."<br><br>";
                 echo "Apellido: ".$ape."<br><br>"; 
                 echo "DNI: ".$dni."<br><br>"; 
                 echo "Horas de vuelo realizada: ".$horV."<br><br>"; 
                 echo "Codificacion del vuelo: ".$codV."<br><br>";
                 echo "Ubicacion de salida: ".$ubi."<br><br>";  
                 echo "Tipo de aeronave: ".$tipoA."<br><br>";  
                 echo "Modelo de avion ".$modA."<br><br>";?>                                 
       </td>
      </tr>
   </table>
</div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
       
    
       </body>
</html>
