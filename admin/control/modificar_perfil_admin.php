<?php
include 'conexion.php';
$conexion = DB::conx();
session_start();

if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];

    $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);   
    $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_SPECIAL_CHARS);    
    $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
    $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING); 
    $codigo_postal = filter_input(INPUT_POST, 'codigo_postal', FILTER_SANITIZE_NUMBER_INT); 
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_NUMBER_INT); 
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);    
    $fecha_nac = filter_input(INPUT_POST, 'fecha_nac', FILTER_SANITIZE_FULL_SPECIAL_CHARS);     
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
    
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = password_hash($pass, PASSWORD_DEFAULT, array('cost'=>12));

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

    $errores = [false, false, false, false, false, false, false, false, false, false];
    
    if ($nombre && $apellidos && $direccion && $poblacion && $provincia && $codigo_postal && $telefono && ($email && !$resul_email) && $fecha_nac && $sexo ) {
                
        $sentencia = 'UPDATE user_data SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, poblacion = :poblacion, provincia=:provincia, cp = :cp, email = :email, telefono = :telefono, fecha_nac = :fecha, sexo = :sexo WHERE idUser = :id';
          
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
        $insertar->bindParam(":id", $id); 
                
        $insertar->execute();

        if($pass!=''){
            $sentencia_contr = 'UPDATE user_login SET password = :pass WHERE id_user_FK  = :id';

            $inser_contr=$conexion->prepare($sentencia_contr);
            $inser_contr->bindParam(":pass", $pass);
            $inser_contr->bindParam(":id", $id);
            $inser_contr->execute();
        }
            $inser_contr->closeCursor();    

        $guardado = "<h3 class = 'registro_ok'>Se han guardado los datos correctamente.</h3>";
        
        header("location: ../../views/perfil_admin.php?ok=$guardado&nombre=$nombre&apellidos=$apellidos&direccion=$direccion&poblacion=$poblacion&provincia=$provincia&cp=$codigo_postal&tel=$telefono&email=$email&fecha=$fecha_nac&sexo=$sexo");
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
        header('Refresh:0; ../../views/perfil_admin.php?nombre=' . $errores[0] . '&apellidos=' . $errores[1] . '&direccion=' . $errores[2] . '&poblacion=' . $errores[3] . '&provincia=' . $errores[4] . '&cp=' . $errores[5] . '&tel=' . $errores[6] . '&email=' . $errores[7] . '&fecha_nac=' . $errores[8] . '&sexo=' . $errores[9] );
    }
    $insertar->closeCursor();
    $conexion = null;
}
?>