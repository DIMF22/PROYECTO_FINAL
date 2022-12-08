<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registro</title>
</head>
<body>

<br>
        <h1>
        <center>
            Registro
        </center>
        </h1>

       <br><br><br>
       
    <div class="registro">
    <form action="./insertar.php" method="POST">
       
    <br>
    <br>

            <label>Nombre: </label>
            <input type="text" name="nombre" placeholder="Ingrese un nombre" class="registro1" required="required"> 
            
            <br>
            <br>

            <label>Fecha de nacimiento: </label>
            <input type="date" name="date" class="registro1" required="required">
    
            <br>
            <br>

            <label>Contraseña: </label>
            <input type="password" name="password" placeholder="Ingrese su contraseña" class="registro1" required="required"> <br>

            <br>
            <br>
            <br>

            <input type="submit" value="Registrarse" class="button">

    </form>
    </div>
</body>
</html>