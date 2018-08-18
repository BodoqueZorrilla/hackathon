<?php

require_once("modelo.php");
$id_ruta = $_REQUEST['id_ruta'];
$coordenadas = $_REQUEST['coordenadas'];
$modelo_add=new Modelo();
$add_pedido=$modelo_add->consulta("CALL ADD_POLYLINES(".$id_ruta.",'".$coordenadas."');");

$response["success"] = 1;
echo json_encode($response);
/*$parametros = $_REQUEST['parametros'];

$json_par = json_decode($parametros, true);
foreach ($json_par as $key => $value1) {
  $id_empresa = $value1['id_empresa'];
  $id_chofer = $value1['id_chofer'];
  $id_camion = $value1['id_camion'];
  $coord_inicio = $value1['coord_inicio'];
  $coord_fin = $value1['coord_fin'];
  $fch_ini = $value1['fch_ini'];
  $fch_fn = $value1['fch_fn'];
  $jsonpoly = $value1['jsonpoly'];

  $id_ruta = "";
  $modelo=new Modelo();
  $crea_route=$modelo->consulta("CALL ADD_ROUTE('".$id_empresa."', '".$id_chofer.", '".$id_camion.", '".$coord_inicio.",'".$coord_fin.",'".$fch_ini.",'".$fch_fn.");");
  if(count($crea_route) > 0){
    foreach ($crea_route as $key => $value) {
      $response["id_ruta"] = (int)$value['id_ruta'];
      $id_ruta = (int)$value['id_ruta'];
    }
    $jsonpoly_p = json_decode($jsonpoly, true);

    foreach ($jsonpoly_p as $key => $value) {
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
}*/

 ?>
