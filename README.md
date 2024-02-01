<h1>FLIGHTGEAR - Capturador de datos.</h1><br>

<p align="center">
 <img src="https://github.com/Ari-A-D/simuladorExtractor/blob/main/DB/simulador.png" alt="simulador" width="50%">
</p>

<h2>Resumen</h2>
Extrae datos del simulador de vuelo que utiliza el software FlightGear, en pruebas de vuelo controladas. El software se utiliza en una cabina montada para el entrenamiento teorico/practico de pilotos, este servicio lo presta la empresa Oro Verde Digital SRL. <br>

<h2>Base de datos</h2>
La base de datos es de tipo relacional, se ve en la siguiente imagen su diseño entidad-relación.<br><br>

<p align="center">
 <img src="https://github.com/Ari-A-D/simuladorExtractor/assets/54744627/31520607-64e7-4019-8d3a-064ef47c78fb" alt="diagrama entidad realación" width="70%">
</p>

La base de datos fue realizada en PostgreSQL y montada en el mismo.<br><br>

<p align="center">
 <img src="https://github.com/Ari-A-D/simuladorExtractor/assets/54744627/7b943dfa-3579-441a-9b1c-b418ff323bf4" alt = "base de datos postgres" width ="80%">
</p>

<h2>Programa capturador</h2>
Realizado en PHP, CSS y HTML5. 
La extraccion en tiempo real se realiza por IP de la función multijugador del sistema FlightGear, por medio de la función integrada de captura de datos codificados en json por IP de PHP, los mismos se inserta en la base de datos, en cada vuelo simulado realizado, donde las variables que guarda, son las que se muestran como atributos en los diagramas.
