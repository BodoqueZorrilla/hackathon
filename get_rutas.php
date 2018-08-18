<?php


require_once("modelo.php");


$id_empresa = $_REQUEST['id_empresa'];
$modelo=new Modelo();

$getCamiones=$modelo->consulta("CALL get_rutas($id_empresa);");

if(count($getCamiones) > 0){
  $response["rutas"] = array();
  foreach ($getCamiones as $key => $value) {
    $rutas = array();
    $rutas["id"] = (int)$value['id'];
    $rutas["placas"] = $value['placas'];
    array_push($response["rutas"], $rutas);
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}



 ?>
