<?php
require_once("../../includes/db.php");
//require_once("../../controllers/validar.php");

//echo 'esto anda  ';
$stmt = $conx->prepare("SELECT * FROM noticias");
$stmt->execute();
$resultado = $stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="listado_noticias.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
</head>
<body>
<div class="listado">
    <div class="list">
        <div class="h1">
            <h1>lista noticias </h1>
        </div>
        <div class="hr">
             <a href="formulario.php">Registrar noticias</a>
        </div>
        <div class="form">
            <form action="/index/panel/index.php" method="POST">
                <button name="logout" type="submit">atras</button>
            </form> 
        </div>
    </div>    
        <div class="tabla">
            <table class="table">
                <thead>
                    <tr div="th">
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Texto</th>
                        <th>Id Categoria</th>
                        <th>Id Usuario</th>
                        <th>imagen</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <?php while ($fila = $resultado->fetch_object()) {?> 
                    <tr>
                        <div class="td">
                            <td><?php echo $fila->id ?></td>
                            <td><?php echo $fila->titulo ?></td>
                            <td><?php echo $fila->descripcion ?></td>
                            <td><?php echo $fila->texto ?></td>
                            <td><?php echo $fila->id_categoria ?></td>
                            <td><?php echo $fila->id_usuario ?></td>
                            <td><img width="100" src="/nueva/panel/views/noticias/upload/messi.jpg"<?php echo $fila->imagen ?>"></td>
                            <td><?php echo $fila->fecha ?></td>
                            <td class="actions">
                            <a href="/nueva/panel/views/noticias/upload/messi.jpg?id=<?php echo $fila->id ?>">imagen</a>
                            <a href="/nueva/panel/views/noticias/formulario.php?id=<?php echo $fila->id ?>">Editar</a>
                            <a href="/nuena/panel/controllers/noticias.php?operaciones=DELETE&id=<?php echo $fila->id ?>">Eliminar</a>
</td>

                        </div>
                    </tr>
                <?php } ?>
            </table>
    	</form>
        </div>
</div>
</body>
</html>