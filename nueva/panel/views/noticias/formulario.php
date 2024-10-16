<?php
require_once("../../includes/db.php");
//require_once("../../controllers/validar.php");

if(isset($_GET["id"]) ) 
    $id = $_GET["id"];
    //preparo la sentencia conm ->prepare()
    $sentencia = $conx->prepare("SELECT * FROM noticias WHERE id = ?"); //devuelve uno o muchos resultados
    //ahora hago un bind de los parametros establecidos 
    $sentencia->bind_param('i', $id);//paso el parametro entero de id para ejecutar
    //ahora procedo a ejecutar la sentencia con sus parametros establecidos
    $sentencia->execute(); // ->execute sirve para ejecutar todo tipo de sentencia  
    //pasamos al resultado de la sentencia 
    $resultado = $sentencia->get_result(); // -> get_result para obtener resultados de uno o varios registros
    // pasamos a trabajar con objetos
    $usuario = $resultado->fetch_object();  
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="formulario_noticias.css" style="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar nombre</title>
</head>
<body>
<div class="div1">
        <?php if (isset($_GET["id"])){?> 
            <div class="edith1">
                 <h1>Editar noticias</h> <br>
            </div>
        <?php } else { ?>
            <div class="crearh1">
                <h1>Crear noticias</h1> <br>
            </div>
        <?php }?>
        <form action="/nueva/panel/controllers/noticias.php?operaciones=<?php echo (isset($_GET["id"])) ? "EDIT" : "NEW" ?>"  method="POST" class="formu">
            <input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $usuario->id : "" ?>" />
            <div class="titulo">
                <label>titulos</label>
                <input type="text"  name="titulo" value="<?php echo (isset($_GET["id"])) ? $usuario->titulo : "" ?>" />
            </div>
            <div class="descripcion">
                <label>descripcion</label>
                <input type="text"  name="descripcion" value="<?php echo (isset($_GET["id"])) ? $usuario->descripcion : "" ?>" />
            </div>
            <div class="texto">
                <label>textos</label>
                <input type="text"  name="texto" value="<?php echo (isset($_GET["id"])) ? $usuario->texto : "" ?>" />
            </div>
            <div class="id_categoria">
                <label>id categorias</label>
                <input type="text" name="id_categoria" value="<?php echo (isset($_GET["id"])) ? $usuario->id_categoria : "" ?>" />
            </div>
            <div class="id_usuario">
                <label>id usuarios</label>
                <input type="text" name="id_usuario" value="<?php echo (isset($_GET["id"])) ? $usuario->id_usuario : "" ?>" />
            </div>
            <div class="imagen">
                <label>imagenes</label>
                 <input type="text" name="imagen" value="<?php echo (isset($_GET["id"])) ? $usuario->imagen : "" ?>" >
            </div>
            <div class="fechas">
                <label>fechas</label>
                <input type="number" name="fecha" value="<?php echo (isset($_GET["id"])) ? $usuario->fecha : "" ?>" />
            </div>
            <div class="guardar">
                <button>Guardar</button>
            </div>
            <div>
                <a href="listado.php">atras</a>
            </div>
        </form>

</div>
</body>
</html>