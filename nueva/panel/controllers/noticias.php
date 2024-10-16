<?php
require_once("../includes/db.php");
//require_once("validar.php");

$operacion = $_GET["operaciones"];

if ( $operacion == "NEW" ) { 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $titulos = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $textos = $_POST["texto"];
    $id_categorias = $_POST["id_categoria"];
    $id_usuarios = $_POST["id_usuario"];
    $imanege = $_POST["imagen"];
    $fecha = $_POST["fecha"];
    $sentencia = $conx->prepare("INSERT INTO noticias (titulos, descripcion, textos, id_categorias, id_usuarios, imagenes, fechas) VALUES (?, ?, ?, ?, ?, ?, ?) ");
    $sentencia->bind_param("sssiiss", $titulo,$descripcion, $texto, $id_categoria, $id_usuario, $imagen, $fecha);
    $sentencia->execute();
      
} else if( $operacion == "EDIT" ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $id = $_POST['id'];
    $titulos = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $textos = $_POST["texto"];
    $id_categorias = $_POST["id_categoria"];
    $id_usuarios = $_POST["id_usuario"];
    $imagenes = $_POST["imagen"];
    $fecha = $_POST["fecha"];
    $sentencia = $conx->prepare("UPDATE noticias SET titulos = ?, descripcion = ?, textos = ?, id_categorias = ?, id_usuarios = ?, imagenes = ?, fechas = ? WHERE id = ? ");
    $sentencia->bind_param("sssiissi", $titulos,$descripcion, $textos, $id_categorias, $id_usuarios, $imagenes, $fecha);
    $sentencia->execute();

} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM noticias WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}


header("Location: ../views/noticias/listado.php");


