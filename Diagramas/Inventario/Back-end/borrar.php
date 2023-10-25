<?php
include("conection.php");//va a requerir de db.php

if(isset($_GET['id'])){ //se comprueba el valor que se da por la variable $id como resultado y envía la información codificada del usuario
  //en el header.
    $id = $_GET['id'];//se obtienen los datos de $id
    $query = "DELETE FROM producto_db WHERE id = $id";//se define la variable para que al ejecutar haga la accion de borrar en tareas 
    $result = mysqli_query($conexion, $query);//el resultado se vera reflejado en las variables $conexion y $query
    if(!$result){//su NO se cumple la validacion de resultado....

        die("Accion fallida");//por defecto (die, ahi muere) sera accion fallida.
    }
    $_SESSION ['message'] = 'Tarea eliminada correctamente';//Al eliminar, los datos se guardaran en la sesion de base de datos.
    $_SESSION ['message_type']='danger'; 

    header('location: ../Front-end/index.php');
}