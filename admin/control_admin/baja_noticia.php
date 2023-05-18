<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();

$id_noticia=$_GET['id_noticia'];

if(isset($_SESSION['usuario'])&&$_SESSION['usuario'] = 'admin'){

    $consulta_baja ='DELETE FROM noticias WHERE idNoticia = :id';
    $baja_noticia = $conexion->prepare($consulta_baja);
    $baja_noticia->bindParam(':id', $id_noticia);
    //$baja_noticia->execute();
    if ($baja_noticia->execute()){
        $eliminado = "<h3 class = 'registro_ok'>Noticia eliminada</h3>";
            
        header("location: ../../views/admin_noticias.php?ok=$eliminado");        

    }else{
        $fallo = "<h3 class = 'error'>No se ha podido eliminar la noticia.</h3>";
            
        header("location: ../../views/admin_noticias.php?ok=$fallo");
    }
}
$baja_noticia->closeCursor();
$conexion = null;    

?>