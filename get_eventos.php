<?php


require_once("modelo.php");


$id_ruta = $_REQUEST['id_ruta'];
$modelo=new Modelo();

$getCamiones=$modelo->consulta("CALL get_eventos($id_ruta);");

if(count($getCamiones) > 0){
  $response["eventos"] = array();
  foreach ($getCamiones as $key => $value) {
    $rutas = array();
    $rutas["id"] = (int)$value['id'];
    $rutas["coordenadas"] = $value['coordenadas'];
    $rutas["abrio_tapa"] = $value['abrio_tapa'];
    $rutas["fecha"] = $value['hora'];
    array_push($response["eventos"], $rutas);
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}



 ?>
