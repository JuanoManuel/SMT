<?php
/*
file: verificar_login.php
author: Alberto Paredes Rivas
*/
session_start();
if(!isset($_SESSION["idEmpleado"])){
  echo "false";
}else{
  echo "true";
}
 ?>
