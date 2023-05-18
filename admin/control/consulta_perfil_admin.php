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
            //echo "<br> $id";
        }
        $consulta_user = 'SELECT * FROM user_data WHERE idUser = :idU';
        $resultado_user = $conexion->prepare($consulta_user);
        $resultado_user->execute(array(':idU'=>$id));
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
            
        }
        
        header("location: ../../views/perfil_admin.php?nombre=$nombre&apellidos=$apellidos&direccion=$direccion&poblacion=$poblacion&provincia=$provincia&cp=$cp&tel=$tel&email=$email&fecha=$fecha_nac&sexo=$sexo");

        $resultado_id->closeCursor();
        $resultado_user->closeCursor();
        $conexion = null;

    }else {
        $error_login = "<h3 class = 'login_err'>Se ha producido un error.</h3>";
        header("location: ../../views/acceder.php?err=$error_login");
    }