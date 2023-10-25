<?php 
session_start();//al iniciar sesion...

$link = 'mysql:host-localhost;Dbname-ecommerceu2';//link de la base de datos en mysql
//datos de la base de datos de mysql
$usuario = "root";
$contraseña = "";
$servidor= "localhost";
$basededatos = "ecommerceu2";//nombre de mi base de datos en mysql

//Se define la conexion
$conexion = mysqli_connect($servidor, $usuario, "") or die ("no se ha podido conectar");//si no se cumple por default el mensaje
//se define $db que incluira $conexion y $basededatos
$db = mysqli_select_db($conexion, $basededatos) or die ("No se ha podido conectar a la base de datos");//si no se cumple por default el mensaje
?>