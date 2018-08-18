<?php
require_once("modelo.php");

$id_empresa = $_REQUEST['id_empresa'];
$id_chofer = $_REQUEST['id_chofer'];
$id_camion = $_REQUEST['id_camion'];
$coord_inicio = $_REQUEST['coord_inicio'];
$coord_fin = $_REQUEST['coord_fin'];
$fch_ini = $_REQUEST['fch_ini'];
$fch_fn = $_REQUEST['fch_fn'];
$jsonpoly = $_REQUEST['jsonpoly'];

$id_ruta = "";
$modelo=new Modelo();
$crea_route =$modelo->consulta("CALL ADD_ROUTE('".$id_empresa."', '".$id_chofer.", '".$id_camion.", '".$coord_inicio.",'".$coord_fin.",'".$fch_ini.",'".$fch_fn." );")
if(count($crea_route) > 0){
  foreach ($crea_route as $key => $value) {
    $response["id_ruta"] = (int)$value['id_ruta'];
    $id_ruta = (int)$value['id_ruta'];
  }
  $jsonpoly = json_decode($jsonprod, true);

  foreach ($jsonpoly as $key => $value) {
    $coordenadas = $value['coordenadas'];
    $modelo_add=new Modelo();
    $add_pedido=$modelo_add->consulta("CALL ADD_POLYLINES(".$id_ruta.",'".$coordenadas."');");
  }

  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}

 ?>
