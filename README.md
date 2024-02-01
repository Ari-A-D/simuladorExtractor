<h1>FLIGHTGEAR - Capturador de datos.</h1><br>

![simulador](https://github.com/Ari-A-D/simuladorExtractor/assets/54744627/fd41bb23-62d1-49d5-a51f-415747daa1d8)

<h2>Resumen</h2>
Extrae datos del simulador de vuelo que utiliza el software FlightGear, en pruebas de vuelo controladas. El software se utiliza en una cabina montada para el entrenamiento teorico/practico de pilotos, este servicio lo presta la empresa Oro Verde Digital SRL. <br>

<h2>Base de datos</h2>
La base de datos es de tipo relacional, se ve en la siguiente imagen su diseño entidad-relación.<br>

![DER-Diseño](https://github.com/Ari-A-D/simuladorExtractor/assets/54744627/31520607-64e7-4019-8d3a-064ef47c78fb)

Realizado en PHP, CSS y HTML5. 
La extraccion en tiempo real se realiza por IP de la función multijugador del sistema FlightGear, por medio de función de captura de PHP, y se inserta en una base de datos
del tipo relacional, diseñada y montada en el motor PostgreSQL.
