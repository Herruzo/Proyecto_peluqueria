<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();

if (isset($_SESSION['id'])){   

    $id = $_POST['idU']; 

    $nombre_in = $_POST['nombre'];
    $nombre_V = preg_match('/^[a-zA-ZÀ-ÿ\s]{1,20}$/', $nombre_in);  
    if($nombre_V){
        $nombre = $nombre_in;
    } 
    $apellidos_in = $_POST['apellidos'];
    $apellidos_V = preg_match('/^[a-zA-ZÀ-ÿ\s]{1,50}$/', $apellidos_in); 
    if($apellidos_V){
        $apellidos = $apellidos_in;
    } 
    $direccion_in = $_POST['direccion'];
    $direccion_V = preg_match('/^[a-zA-ZÁ-ÿ0-9\/\º\ª\,\.\s]+$/', $direccion_in); 
    // /^[a-zA-ZÀ-ÿ0-9/,.ºª\s]{3,80}$/ 
    //  [a-zA-ZÁ-ÿ0-9/ºª,.\s]
    // /^[a-zA-ZÁ-ÿ0-9/ºª,.\s]+$/
    if($direccion_V){
        $direccion = $direccion_in;
    } 
    $poblacion_in = $_POST['poblacion'];
    $poblacion_V = preg_match('/^[a-zA-ZÀ-ÿ\s]{1,50}$/', $poblacion_in);   
    if($poblacion_V){
        $poblacion = $poblacion_in;
    } 
    $provincia_in = $_POST['provincia'];
    $provincia_V = preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $provincia_in);  
    if($provincia_V){
        $provincia = $provincia_in;
    } 
    $codigo_postal_in = $_POST['codigo_postal'];
    $codigo_postal_V = preg_match('/^[0-9]{5}$/', $codigo_postal_in);  
    if($codigo_postal_V){
        $codigo_postal = $codigo_postal_in;
    } 
    $telefono_in = $_POST['telefono'];
    $telefono_V = preg_match('/^(6|7|8|9)[0-9]{8,9}$/', $telefono_in);  
    if($telefono_V){
        $telefono = $telefono_in;
    }   
    $email_in = $_POST['email'];
    $email_V = preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email_in); 
    // /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
    // /^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/
    // /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    if($email_V){
        $email = $email_in;
    } 
    $fecha_nac = $_POST['fecha_nac'];
   
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);  

    $rol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $observaciones = filter_input(INPUT_POST, 'observaciones', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $observaciones_in = $_POST['observaciones'];
    $observaciones_V = preg_match('/^[a-zA-ZÁ-ÿ0-9\/\º\ª\,\.\s]+$/', $observaciones_in); 
    if($observaciones_V){
        $observaciones = $observaciones_in;
    }        
    $passo_in = $_POST['pass'];
    $passo_V = preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $passo_in);  
    //$passo_V = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;  
    if($passo_V){
        $passo = $passo_in;               
            $pass = password_hash($passo, PASSWORD_DEFAULT, array('cost'=>12));                    
    }     
    $resul_email = [];   

    $buscar_email='SELECT email FROM user_data WHERE idUser = :id';
    $consulta_email= $conexion->prepare($buscar_email);
        $consulta_email->execute(array(':id'=>$id));

        while($reg_email= $consulta_email->fetch(PDO::FETCH_ASSOC)){
            $ori_email= $reg_email['email'];
            if($ori_email != $email){

                //Buscamos si existe el email introducido
                $buscar_email = 'SELECT * FROM user_data WHERE email = :email';
                $consulta = $conexion->prepare($buscar_email);
                $consulta->execute(array(":email" => $email));

                $resul_email = $consulta->fetch();
            }
        }
    $errores = [false, false, false, false, false, false, false, false, false, false, false, false];    

    if ($nombre && $apellidos && $direccion && $poblacion && $provincia && $codigo_postal && $telefono && ($email && !$resul_email) && $fecha_nac && $sexo && $rol&& ($passo_V || $passo_in=='')) {
               
        $sentencia = 'UPDATE user_data, user_login SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, poblacion = :poblacion, provincia=:provincia, cp = :cp, email = :email, telefono = :telefono, fecha_nac = :fecha, sexo = :sexo, observaciones = :observaciones,rol = :rol WHERE idUser = :id AND id_user_FK =:id';
         
        $insertar = $conexion->prepare($sentencia);

        $insertar->bindParam(":nombre", $nombre);
        $insertar->bindParam(":apellidos", $apellidos);
        $insertar->bindParam(":direccion", $direccion);
        $insertar->bindParam(":poblacion", $poblacion);
        $insertar->bindParam(":provincia", $provincia);
        $insertar->bindParam(":cp", $codigo_postal); 
        $insertar->bindParam(":email", $email); 
        $insertar->bindParam(":telefono", $telefono); 
        $insertar->bindParam(":fecha", $fecha_nac);
        $insertar->bindParam(":sexo", $sexo);
        $insertar->bindParam(":observaciones", $observaciones);
        $insertar->bindParam(":rol", $rol);
        $insertar->bindParam(":id", $id); 
              
        $insertar->execute();

        if($pass!=''){
            $id = $_POST['idU'];
            $sentencia_contr = 'UPDATE user_login SET password = :pass WHERE id_user_FK  = :id';

            $inser_contr=$conexion->prepare($sentencia_contr);
            $inser_contr->bindParam(":pass", $pass);
            $inser_contr->bindParam(":id", $id);
            $inser_contr->execute();        
        }   
        if ($passo_in!==''){
            $guardado_pass = "<h3 class = 'registro_ok'>Nueva contraseña guardada.</h3>";
        }      
        $guardado = "<h3 class = 'registro_ok'>Se han guardado los datos correctamente.</h3>";        
        
        header("location: ../../views/perfil_user_admin.php?ok=$guardado&nombre=$nombre&apellidos=$apellidos&direccion=$direccion&poblacion=$poblacion&provincia=$provincia&cp=$codigo_postal&tel=$telefono&email=$email&fecha=$fecha_nac&sexo=$sexo&rol=$rol&observaciones=$observaciones&ok2=$guardado_pass&id_modi=$id");
    } else {
        if (empty($nombre)) {
            $errores[0] = true;
        } else {
            $errores[0] = $nombre;
        } 
        //****************** */
        if (empty($apellidos)) {
            $errores[1] = true;
        } else {
            $errores[1] = $apellidos;
        }
        //****************** */
        if (empty($direccion)) {
            $errores[2] = true;
        } else {
            $errores[2] = $direccion;
        }
        //****************** */
        if (empty($poblacion)) {
            $errores[3] = true;
        } else {
            $errores[3] = $poblacion;
        }
        //****************** */
        if (empty($provincia)) {
            $errores[4] = true;
        } else {
            $errores[4] = $provincia;
        }
        //****************** */
        if (empty($codigo_postal)) {
            $errores[5] = true;
        } else {
            $errores[5] = $codigo_postal;
        }
        //****************** */
        if (empty($telefono)) {
            $errores[6] = true;
        } else {
            $errores[6] = $telefono;
        }
        //****************** */
        if (empty($email)) {
            $errores[7] = true;
        } elseif ($resul_email) {
            $errores[7] = 2;
        } else {
            $errores[7] = $email;
        }
        //****************** */
        if (empty($fecha_nac)) {
            $errores[8] = true;
        } else {
            $errores[8] = $fecha_nac;
        }
        //****************** */
        if (empty($sexo)) {
            $errores[9] = true;
        } else {
            $errores[9] = $sexo;
        }
        if (empty($rol)) {
            $errores[10] = true;
        } else {
            $errores[10] = $rol;
        }   
        
        $fallo = "<h3 class = 'registro_ok error'>No se han guardados los cambios correctamente.</h3>";
       
        header('location: ../../views/perfil_user_admin.php?nombre=' .$errores[0].'&apellidos=' . $errores[1] . '&direccion=' . $errores[2] . '&poblacion=' . $errores[3] . '&provincia=' . $errores[4] . '&cp=' . $errores[5] . '&tel=' . $errores[6] . '&email=' . $errores[7] . '&fecha=' . $errores[8] . '&sexo=' . $errores[9]. '&rol=' . $errores[10].'&ok='.$fallo);       
    }
    $insertar->closeCursor();
    $conexion = null;
}
?>