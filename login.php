<?php


require_once("modelo.php");


$usuario_p = $_REQUEST['usuario_p'];
$password_p = $_REQUEST['password_p'];
$modelo=new Modelo();

$login_p=$modelo->consulta("CALL loginApp('".$usuario_p."', '".$password_p."');");

if(count($login_p) > 0){
  foreach ($login_p as $key => $value) {
    $response["id"] = (int)$value['id'];
    $response["nombre"] = $value['nombre'];
    $response["id_empresa"] = $value['id_empresa'];
    $response["empresa"] = $value['empresa'];
  }
  $response["success"] = 1;
  echo json_encode($response);
}else{
  $response["success"] = 0;
  echo json_encode($response);
}




 ?>
