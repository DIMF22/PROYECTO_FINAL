<?php
include('./conexionregistro.php');
$conexion=conectar();

$user=$_POST['usuario'];
$pass=$_POST['password'];


$consulta = "SELECT * FROM users where nombre ='$user' and password = '$pass'";
$resultado = mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location: ./home.php");

}else{
    include("./login.php");
    ?>
    <br>
    <br>
    
    <center>
        <h1 class="text-center">ERROR DE AUTENTICACIÓN</h1>
    </center>
    <?php
    
}
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>