<h1>FLIGHTGEAR - Capturador de datos.</h1><br>

<p align="center">
 <img src="https://github.com/Ari-A-D/simuladorExtractor/blob/main/DB/simulador.png" alt="simulador" width="50%">
</p>

<h2>Resumen</h2>
Extrae datos del simulador de vuelo que utiliza el software FlightGear, en pruebas de vuelo controladas. El software se utiliza en una cabina montada para el entrenamiento teorico/practico de pilotos, este servicio lo presta la empresa Oro Verde Digital SRL. <br>

<h2>Base de datos</h2>
La base de datos es de tipo relacional, se ve en la siguiente imagen su diseño entidad-relación.<br><br>


![DER-Diseño](https://github.com/Ari-A-D/simuladorExtractor/assets/54744627/31520607-64e7-4019-8d3a-064ef47c78fb)

Realizado en PHP, CSS y HTML5. 
La extraccion en tiempo real se realiza por IP de la función multijugador del sistema FlightGear, por medio de función de captura de PHP, y se inserta en una base de datos
del tipo relacional, diseñada y montada en el motor PostgreSQL.
