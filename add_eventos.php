<?php

require_once("modelo.php");
$id_ruta = $_REQUEST['id_ruta'];
$coordenadas = $_REQUEST['coordenadas'];
$abrio_tapa = $_REQUEST['abrio_tapa'];
$hora = $_REQUEST['hora'];
$modelo_add=new Modelo();
$add_pedido=$modelo_add->consulta("CALL add_evento('".$id_ruta."','".$coordenadas."','".$abrio_tapa."', '".$hora."');");
$response["success"] = 1;
echo json_encode($response);

 ?>
