<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();
$rol=$_SESSION['usuario'];

$id = $_GET['idU'];
echo $id;

if (isset($_GET['idU'])){
    $id = $_GET['idU'];

    $registro_baja ='DELETE FROM user_data WHERE idUser = :id';
    $consulta_baja = $conexion->prepare($registro_baja);
    $consulta_baja->bindParam(':id', $id);
    $consulta_baja->execute();
          
    $eliminado = "<h3 class = 'registro_ok'>Usuario eliminado </h3>";
        
    header("location: ../../views/admin_user.php?ok=$eliminado");

}else{
    $no_eliminado = "<h3 class = 'registro_ok'>No se ha podido eliminar usuario.</h3>";   
        
    header("location: ../../views/admin_user.php?ok=$no_eliminado");
}
$consulta_baja->closeCursor();
$conexion = null;
?>