<?php
require_once("modelo.php");


$id_empresa = $_REQUEST['id_empresa'];
$modelo=new Modelo();

$getChoferes=$modelo->consulta("CALL getCamiones($id_empresa);");

if(count($getChoferes) > 0){
  foreach ($getChoferes as $key => $value) {
    $response["id"] = (int)$value['id'];
    $response["nombre"] = $value['nombre'];
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}



 ?>
