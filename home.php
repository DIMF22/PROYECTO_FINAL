<?php
session_start();
require 'conexion.php';
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container">

  <?php
        if(isset($_SESSION['mensaje'])){
            if(!$_SESSION['error']){
                ?>
            <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['mensaje']; ?>
            </div>
        <?php
            }else{
                ?>
            <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['mensaje']; ?>
            </div>
        <?php
            }
            unset($_SESSION['mensaje']);
            unset($_SESSION['error']);
        }

    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Lista de estudiantes
                        <a href="crear-estudiantes.php" class="btn btn-success float-end">Agregar nuevo</a> 
                        <a href="index.php" class="btn btn-primary float-">
                                        Cerrar sesion
                        </a>
                    </h4>
                </div>

                <div class="card-body">
                
                <table class="table table-bordered" table-striped>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>EDAD</th>
                            <th>PAIS</th>
                            <th>ACCIONES</th>
                        </tr>

                        <?php
                                $res = $conexion->query("SELECT E.*,P.nombre as pais FROM `estudiantes` E INNER JOIN paises P ON P.id=E.id_pais");
                            
                                while($fila = $res-> fetch_object()){
                                    ?>
                        <tr>
                            <td><?php echo $fila->id; ?></td>
                            <td><?php echo $fila->nombre; ?></td>
                            <td><?php echo $fila->apellido; ?></td>
                            <td><?php echo $fila->edad; ?></td>
                            <td><?php echo $fila->pais; ?></td>
                            <td>
                                <a href="editar-estudiantes.php?id=<?php echo md5($fila->id); ?>" class="btn btn-primary">
                                    Editar
                                </a>

                                <a href="detalle-estudiantes.php?id=<?php echo md5($fila->id); ?>" class="btn btn-success">
                                    Ver
                                </a>

                                <form action="guardar.php" method="POST" class="d-inline">
                                    <button class="btn btn-danger" type="submit" name="btnEliminar" value="<?php echo md5($fila->id); ?>">
                                        Eliminar
                                    </button>

                                    <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" name="archivo" id="archivo" class="btn btn-warning">
                                    </form>
                                    <div class="resultado">
                                    <?php
                                        if(isset($_POST['boton'])){
                                            // Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 20 KB
                                            if ((($_FILES["archivo"]["type"] == "image/gif") ||
                                            ($_FILES["archivo"]["type"] == "image/jpeg") ||
                                            ($_FILES["archivo"]["type"] == "image/jpg") ||
                                            ($_FILES["archivo"]["type"] == "image/pjpeg")) &&
                                            ($_FILES["archivo"]["size"] < 2000000)) {

                                            //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
                                            if ($_FILES["archivo"]["error"] > 0) {
                                                echo $_FILES["archivo"]["error"] . "";
                                            } else {
                                                // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido
                                                if (file_exists("archivos/" . $_FILES["archivo"]["name"])) {
                                                echo $_FILES["archivo"]["name"] . " ya existe. ";
                                                } else {
                                                // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
                                                move_uploaded_file($_FILES["archivo"]["tmp_name"],
                                                "archivos/" . $_FILES["archivo"]["name"]);
                                                echo "Archivo Subido ";
                                                echo '<img src="archivos/".$_FILES["archivo"]["name"]>';
                                                }
                                            }
                                            } else {
                                                // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
                                                echo "Archivo no permitido";
                                            }
                                        }
                                    ?>

                                    
                                </form>

                            </td>
                        </tr> 
                                <?php
                            }
                            ?>
                       
                    </thead>
                </table>
                
                </div>

            </div>
        </div>
    </div>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>