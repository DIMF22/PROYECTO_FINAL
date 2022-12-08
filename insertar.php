<?php
include("./conexionregistro.php");
$conexion=conectar();


$nombres=$_POST['nombre'];
$fecha=$_POST['date'];
$contrasenas=$_POST['password'];



$consulta="INSERT INTO users VALUES(default,'$nombres','$fecha','$contrasenas')";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    Header("Location: ./login.php");
    
}else {
    Header("Location: ./registro.php");
}


mysqli_close($conexion);
?>