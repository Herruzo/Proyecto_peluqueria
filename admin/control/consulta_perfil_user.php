<?php
include 'conexion.php';
$conexion = DB::conx();

session_start();
    if (isset($_SESSION['nombre'])){
        $nombre = $_SESSION['nombre'];
        echo $nombre;

        $consulta_id = 'SELECT id_user_FK FROM user_login WHERE usuario = :user';
        $resultado_id = $conexion->prepare($consulta_id);
        $resultado_id->execute(array(':user'=>$nombre));

        while($reg_id= $resultado_id->fetch(PDO::FETCH_ASSOC)){
            $id= $reg_id['id_user_FK'];
            
        }
        $consulta_user = 'SELECT * FROM user_data WHERE idUser = :idU';
        $resultado_user = $conexion->prepare($consulta_user);
        $resultado_user->execute(array(':idU'=>$id));
        while ($fila = $resultado_user->fetch(PDO::FETCH_ASSOC)){
            $nombre = $fila['nombre'];
            
            $apellidos = $fila['apellidos'];
            
            $direccion =$fila['direccion'];
            $poblacion = $fila['poblacion'];
            $provincia = $fila['provincia'];
            $cp = $fila['cp'];
            $tel = $fila['telefono'];
            $email = $fila['email'];
            $fecha_nac = $fila['fecha_nac'];
            $sexo = $fila['sexo'];            
        }                             
        
        if($conexion){
            echo "<script type='text/javascript'>alert('Conexión finalizada.');</script>";
        }else{
            echo "<script type='text/javascript'>alert('Conexión activa.');</script>";
        }
        
       header("location: ../../views/perfil_use.php?nombre=$nombre&apellidos=$apellidos&direccion=$direccion&poblacion=$poblacion&provincia=$provincia&cp=$cp&tel=$tel&email=$email&fecha=$fecha_nac&sexo=$sexo");
   
    }else {
        $error_login = "<h3 class = 'login_err'>Se ha producido un error.</h3>";
        header("location: ../../views/acceder.php?err=$error_login");
    }
        $resultado_id->closeCursor();
        $resultado_user->closeCursor();
        $conexion = null;
?>