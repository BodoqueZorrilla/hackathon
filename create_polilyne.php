<?php

require_once("modelo.php");
$id_ruta = $_REQUEST['id_ruta'];
$coordenadas = $_REQUEST['coordenadas'];
$modelo_add=new Modelo();
$add_pedido=$modelo_add->consulta("CALL ADD_POLYLINES('".$id_ruta."','".$coordenadas."');");
$response["success"] = 1;
echo json_encode($response);


 ?>
