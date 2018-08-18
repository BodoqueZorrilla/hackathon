<?php
require_once("modelo.php");

$id_empresa = $_REQUEST['id_empresa'];
$id_chofer = $_REQUEST['id_chofer'];
$id_camion = $_REQUEST['id_camion'];
$coord_inicio = $_REQUEST['coord_inicio'];
$coord_fin = $_REQUEST['coord_fin'];
$fch_ini = $_REQUEST['fch_ini'];
$fch_fn = $_REQUEST['fch_fn'];
echo "CALL ADD_ROUTE('".$id_empresa."', '".$id_chofer."', '".$id_camion."', '".$coord_inicio."','".$coord_fin."','".$fch_ini."','".$fch_fn."');";
$modelo=new Modelo();
$crea_route=$modelo->consulta("CALL ADD_ROUTE('".$id_empresa."', '".$id_chofer."', '".$id_camion."', '".$coord_inicio."','".$coord_fin."','".$fch_ini."','".$fch_fn."');");

if(count($crea_route) > 0){
  $response["success"] = 1;
  foreach ($crea_route as $key => $value) {
    $response["id_ruta"] = (int)$value['id_ruta'];
  }
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}
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
