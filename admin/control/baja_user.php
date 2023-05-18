<?php
include 'conexion.php';
$conexion = DB::conx();
session_start();
$rol=$_SESSION['usuario'];

if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    $registro_baja ='DELETE FROM user_data WHERE idUser = :id';
    $consulta_baja = $conexion->prepare($registro_baja);
    $consulta_baja->bindParam(':id', $id);
    $consulta_baja->execute();
   
    $consulta_baja->closeCursor();
    $conexion = null;

    session_destroy();

    $guardado = "<h3 class = 'registro_ok'>Usuario eliminado ¿deseas nuevo registro?</h3>";
        
    header("location: ../../views/registrarse.php?ok=$guardado");

}else{
    $guardado = "<h3 class = 'registro_ok'>No se ha podido eliminar usuario.</h3>";

    if($rol=='user'){
        
    header("location: ../../views/perfil_use.php?ok=$guardado");
    }
    if($rol='admin'){
    header("location: ../../views/perfil_admin.php?ok=$guardado");
    }
}
$consulta_baja->closeCursor();
$conexion = null;