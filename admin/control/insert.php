<?php
include 'conexion.php';
$conexion = DB::conx();

if (isset($_POST['nombre'])) {
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
  
    if($email_V){
        $email = $email_in;
    } 
    $fecha_nac = $_POST['fecha_nac'];

    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $usuario_in = $_POST['usuario'];
    $usuario_V = preg_match('/^[a-zA-ZÀ-ÿ0-9_.]{1,15}$/', $usuario_in);  
    if($usuario_V){
        $usuario = $usuario_in;
    }   
    $passo_in = $_POST['pass'];
    $passo_V = preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $passo_in);  
     
    if($passo_V){
        $passo = $passo_in;      
          
            $pass = password_hash($passo, PASSWORD_DEFAULT, array('cost'=>12));
                     
    } 
    
    //Con el array('cost'=>12) modificamos el coste del cifrado.

    //Buscamos si existe el email introducido
    $buscar_email = 'SELECT * FROM user_data WHERE email = :email';
    $consulta = $conexion->prepare($buscar_email);
    $consulta->execute(array(":email" => $email));

    $resul_email = $consulta->fetch();

    //Buscamos si existe el usuario introducido
    $buscar_user = 'SELECT * FROM user_login WHERE usuario = :usuario';
    $consulta = $conexion->prepare($buscar_user);
    $consulta->execute(array(":usuario" => $usuario));

    $resul_user = $consulta->fetch();

    $errores = [false, false, false, false, false, false, false, false, false, false, false, false];

    if ($nombre && $apellidos && $direccion && $poblacion && $provincia && $codigo_postal && $telefono && ($email && !$resul_email) && $fecha_nac && $sexo && ($usuario && !$resul_user) && $pass) {

        $sentencia = 'INSERT INTO user_data (nombre, apellidos, email, telefono, fecha_nac, direccion, poblacion, provincia, cp, sexo) VALUES (:nombre, :apellidos, :email, :telefono, :fecha_nac, :direccion, :poblacion, :provincia, :cp, :sexo)';

        $insertar = $conexion->prepare($sentencia);
        $insertar->bindParam(":nombre", $nombre);
        $insertar->bindParam(":apellidos", $apellidos);
        $insertar->bindParam(":email", $email);
        $insertar->bindParam(":telefono", $telefono);
        $insertar->bindParam(":fecha_nac", $fecha_nac);
        $insertar->bindParam(":direccion", $direccion);
        $insertar->bindParam(":poblacion", $poblacion);
        $insertar->bindParam(":provincia", $provincia);
        $insertar->bindParam(":cp", $codigo_postal);
        $insertar->bindParam(":sexo", $sexo);

        if ($insertar->execute()) {

            $idUser = $conexion->lastInsertId();
            $sentencia = 'INSERT INTO user_login (usuario, password, id_user_FK) VALUES (:usuario, :pass, :idUser)';
            $insertar = $conexion->prepare($sentencia);
            $insertar->bindParam(":usuario", $usuario);
            $insertar->bindParam(":pass", $pass);
            $insertar->bindParam(":idUser", $idUser);
            $insertar->execute();
        }
        
        $guardado = "<h3 class = 'registro_ok'>Se han guardado los datos correctamente.</h3>";
        
        header("location: ../../views/registrarse.php?ok=$guardado");
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
        //****************** */
        if (empty($usuario)) {
            $errores[10] = true;
        } elseif ($resul_user) {
            $errores[10] = 2;
        } else {
            $errores[10] = $usuario;
        }
        //****************** */
        if (empty($pass)) {
            $errores[11] = true;
        } else {
            $errores[11] = $pass;
        }
        header('location: ../../views/registrarse.php?nombre=' . $errores[0] . '&apellidos=' . $errores[1] . '&direccion=' . $errores[2] . '&poblacion=' . $errores[3] . '&provincia=' . $errores[4] . '&codigo_postal=' . $errores[5] . '&telefono=' . $errores[6] . '&email=' . $errores[7] . '&fecha_nac=' . $errores[8] . '&sexo=' . $errores[9] . '&usuario=' . $errores[10] . '&pass=' . $errores[11]);
    }
    $insertar->closeCursor();
    $conexion = null;
}
?>