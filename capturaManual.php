<?php
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  date_default_timezone_set(date_default_timezone_get()); // Establecer la zona horaria en la zona horaria del sistema
  $hora_actual = date("H:i:s");
?>      
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Formulario OV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
        <link href="css/styleCapturaManual.css" rel="stylesheet">
    </head>
     
<body class="bg-light">  
<div class="container">
  <main>
    <div class="py-5 text-center">
    <img class="mb-4" src="imagenes/logoOV.png" alt="" width="200" height="150">
      <h2>Captura de datos manual - Simulador Guaraní</h2>
      <p class="lead">Ingreso manual de los datos del vuelo del simulador. Estos datos son todos aquellos que no pueden ser capturados en tiempo real.</p>
    </div>
      
<?php if ($mensaje !== '')
    {
        ?>
        <div class="alert <?= $tipoDeAlert ?>" role="alert">
            <?= $mensaje ?>
        </div>
        <?php
}?>
      
      
 <?php if ($tiempoEspera && $paginaDestino)
 {
     ?>  
<meta http-equiv="refresh" content="<?php echo $tiempoEspera;?>;url=<?php echo $paginaDestino;?>">         
        <div class="alert-success" role="alert">
            <p>Redireccionando <?php echo $tiempoEspera;?> segundos... </p>
            <p>Si su navegador no redirecciona automáticamente, haga clic <a href="<?php echo $paginaDestino;?>">Aquí</a></p>
        </div>
  
 <?php
 }
 ?>
      

<div class="row justify-content-md-center"> <!--CENTRADO EN PANTALLA-->
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" action="datosManual.php" method="POST">
            
        <h5 class="mb-3" id="titulos">Datos del piloto</h5>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nombre</label>
              <input type="text" name = "nom1" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Apellido</label>
              <input type="text" name = "apellido" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">DNI</label>
              <input type="text" name = "dni" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Horas de vuelo realizado</label>
              <input type="number" name ="horasV" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div> 
             
          <h5 class="mb-3" id="titulos">Aeropuerto</h5>    
            <div class="col-sm-12" id="boxU">
              <label for="firstName" class="form-label">Ubicacion de salida</label>
              <input type="text" name = "ubicacionS" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

          <h5 class="mb-3" id="titulos">Vuelo</h5>   
            <div class="col-sm-12">
              <label for="lastName" class="form-label">Identificación</label>
              <input type="text" name = "codVuelo" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>    
          
          
          <h5 class="mb-3" id="titulos">Avion</h5>    
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Tipo de aeronave</label>
              <input type="text" name = "tipoAvion" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Modelo</label>
              <input type="text" name = "modeloAvion" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
          


<!--###############################################################################################-->
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
        </form>
      </div>
    </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022–2023 OVDigital</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="checkout.js"></script>
  </body>
</html>