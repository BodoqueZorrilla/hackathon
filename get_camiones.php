<?php


require_once("modelo.php");


$id_empresa = $_REQUEST['id_empresa'];
$modelo=new Modelo();

$getChoferes=$modelo->consulta("CALL getCamiones($id_empresa);");

if(count($getCamiones) > 0){
  foreach ($getCamiones as $key => $value) {
    $camiones = array();
    $camiones["id"] = (int)$value['id'];
    $camiones["nombre"] = $value['nombre'];
    array_push($response["camiones"], $camiones);
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}



 ?>
