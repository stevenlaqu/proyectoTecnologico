<?php
require_once realpath(__DIR__ . '/../app/ReglasNegocio/brgeneric.php');

$obr = new brGeneric();
$data = $obr->leer("tr_sensorhumedad");
$dataT = $obr->leer("tr_sensortemperatura");?>
<!DOCTYPE html>
<html>
<head>
<title>Test tiempo real Registro Humedad</title>
<script type="text/javascript">
    var id;
    window.onload = function(){
        id = setInterval( miFuncion,10000);
    }
    function miFuncion() {
        location.reload();
     }
</script>
<style>
    *{
        font-family: Calibri, sans-serif;
        font-weight: 300;
        font-size: 14px;
        padding:0px;
        margin: 0px;
    }
    table{
        margin-left: 10px;
        margin-top: 10px;
        border-radius: 20px;
        overflow:hidden;
        
    }
    th{
        padding:10px 10px;
        background-color: #93a9d6;
        color:#fbfbfb;
        font-size: 18px;
    }
    td{
        padding:5px 10px;
    }
</style>
</head>
<body>
    <table>
        <tr>
            <th>Sensor</th>
            <th>Lectura</th>
            <th>Fecha Actualización</th>
        </tr>
        <tr style="background-color: #e8e8e8">
            <td><?php echo " Sensor de Humedad " .$data[0]["id_sensorhumedad"] ?></td>            
            <td><?php echo $data[0]["lectura"] ?></td>
            <td><?php echo $data[0]["fecha"] ?></td>
        </tr>
        <tr>
            <td><?php echo " Sensor de Humedad " .$data[1]["id_sensorhumedad"] ?></td>            
            <td><?php echo $data[1]["lectura"] ?></td>
            <td><?php echo $data[1]["fecha"] ?></td>
        </tr>
        <tr style="background-color: #e8e8e8">
            <td><?php echo " Sensor de Humedad " .$data[2]["id_sensorhumedad"] ?></td>            
            <td><?php echo $data[2]["lectura"] ?></td>
            <td><?php echo $data[2]["fecha"] ?></td>
        </tr>
        <tr>
            <td><?php echo " Sensor de Humedad " .$data[3]["id_sensorhumedad"] ?></td>            
            <td><?php echo $data[3]["lectura"] ?></td>
            <td><?php echo $data[3]["fecha"] ?></td>
        </tr>
         <tr style="background-color: #e8e8e8">
            <td><?php echo " Sensor de Temperatura " .$dataT[0]["id_sensortemperatura"] ?></td>            
            <td><?php echo $dataT[0]["lectura"]." °C" ?></td>
            <td><?php echo $dataT[0]["fecha"] ?></td>
        </tr>

    </table>
</body>
</html>