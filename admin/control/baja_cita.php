<?php
include 'conexion.php';
$conexion = DB::conx();
session_start();

if(isset($_SESSION['usuario'])){
    $id_cita= $_GET['iD'];
    $idU = $_GET['idU'];
    
    $conexion->query("DELETE FROM citas WHERE idCita = '$id_cita'");

    //También se puede utilizar el siguiente código.

    /* $registro_baja ="DELETE FROM citas WHERE idCita = '$id'";
    $consulta_baja = $conexion->prepare($registro_baja);
    $consulta_baja->execute();   */

    if($_SESSION['usuario'] == 'user'){
    header('location: ../../views/citas.php');
    }else{
    header("location: ../../views/admin_solicita_cita.php?id=$idU");
    }
    $consulta_baja->closeCursor();
    $conexion = null;
}

?>