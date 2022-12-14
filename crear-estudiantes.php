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
        }

    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Registro estudiantes
                        <a href="home.php" class="btn btn-danger float-end">Regresar</a> 
                    </h4>
                </div>

                <div class="card-body">
                    <form action="guardar.php" method="POST">
                        <div class="mb-3">
                            <label for="">Nombre estudiante</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Apellido estudiante</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Edad estudiante</label>
                            <input type="number" name="edad" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Pais</label>
                            <select name="pais" id="" class="form-select">
                            <option value="">Selecione un pais</option>

                            <?php
                                $res = $conexion->query("SELECT * FROM `paises` order by nombre");
                            
                                while($fila = $res-> fetch_object()){
                                    ?>
                                <option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?></option>
                            <?php
                            }

                            ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="btnGuardar" class="btn btn-primary">Guardar estudiante</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>