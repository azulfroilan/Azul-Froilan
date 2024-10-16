<?php
require_once("../../includes/db.php");
//require_once("../../controllers/validar.php");

$stmt = $conx->prepare("SELECT * FROM usuarios");
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR USUARIOS</title>
</head>
<body>
    <H1>LISTAR USUARIOS</H1>

    <a href="formulario.php">registrar usuarios</a>

    <form action="/nueva/panel/index.php" method="POST"> 
        <button name="logout" type="submit">atras</button>
    </form>

    <TAble>
        <thead>
            <tr>
                <th>id</th>
                <th>email</th>
                <th>password</th>
            </tr>
        </thead>
        <?php while ($fila = $resultado->fetch_object()){ ?>
            <tr>
                <td><?php echo $fila->id ?></td>
                <td><?php echo $fila->email ?></td>
                <td><?php echo $fila->password ?></td>
                <td><a href="/nueva/controllers/usuarios.php?operacion=DELETE&id=<?php echo $fila->id ?>">eliminar</a></td>
                <td><a href="/nueva/views/usuarios/formulario.php?id=<?php echo $fila->id ?>"> editar </a></td>
            </tr>
     <?php } ?>
    </TAble>
    </body>
</html>