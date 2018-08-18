<?php
require_once("modelo.php");


$id_empresa = $_REQUEST['id_empresa'];
$modelo=new Modelo();

$getChoferes=$modelo->consulta("CALL getChoferes($id_empresa);");

if(count($getChoferes) > 0){
  foreach ($getChoferes as $key => $value) {
    $choferes = array();
    $choferes["id"] = (int)$value['id'];
    $choferes["nombre"] = $value['nombre'];
    array_push($response["choferes"], $choferes);
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}



 ?>
