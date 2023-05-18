<?php
include '../control/conexion.php';
$conexion = DB::conx();

session_start();
    
    if (isset($_GET['id'])){
        $idUse = $_GET['id'];
        echo $idUse;
              
        $consulta_user = 'SELECT * FROM user_data INNER JOIN user_login ON(user_login.id_user_FK = user_data.idUser) WHERE idUser = :idU';
        $resultado_user = $conexion->prepare($consulta_user);
        $resultado_user->execute(array(':idU'=>$idUse));
        while ($fila = $resultado_user->fetch(PDO::FETCH_ASSOC)){
            $nombre = $fila['nombre'];
            //echo "<br> $nombre";
            $apellidos = $fila['apellidos'];
            //echo "<br> $apellidos";
            $direccion =$fila['direccion'];
            $poblacion = $fila['poblacion'];
            $provincia = $fila['provincia'];
            $cp = $fila['cp'];
            $tel = $fila['telefono'];
            $email = $fila['email'];
            $fecha_nac = $fila['fecha_nac'];
            $sexo = $fila['sexo'];
            $rol = $fila['rol'];
            //$idUsuario = $fila['idUser'];
            $observaciones = $fila['observaciones'];            
        }
        
       header("location: ../../views/perfil_user_admin.php?nombre=$nombre&apellidos=$apellidos&direccion=$direccion&poblacion=$poblacion&provincia=$provincia&cp=$cp&tel=$tel&email=$email&fecha=$fecha_nac&sexo=$sexo&rol=$rol&idUse=$idUse&observaciones=$observaciones");         
        
    }else {
        $error_login = "<h3 class = 'login_err'>Se ha producido un error.</h3>";
        header("location: ../../views/acceder.php?err=$error_login");
    }
    $resultado_user->closeCursor();
    $conexion = null;

?>