<?php
include 'conexion.php';

$conexion = DB::conx();
if (isset($_POST['usuario'])) {
    $usuario_in = $usuario_in = $_POST['usuario'];
    $usuario_V = preg_match('/^[a-zA-ZÀ-ÿ0-9_.]{1,15}$/', $usuario_in);  
    if($usuario_V){
        $usuario = $usuario_in;
    }     
    $passo_in = $_POST['pass'];
    $passo_V = preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/', $passo_in);  

    if($passo_V){
        $password = $passo_in;
    }
    //$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //$usuario_1=htmlentities(addslashes($usuario)); Está obsoleto.
    //$password_1=htmlentities(addslashes($password)); Está obsoleto.

    /********************************************************* Para contraseñas no encriptada ***************************/
    /* $consulta = 'SELECT * FROM user_login WHERE usuario = :usuario AND password = :pass';
    $resultado_login = $conexion->prepare($consulta);

    $resultado_login->bindValue(':usuario', $usuario);
    $resultado_login->bindValue(':pass', $password);
    $resultado_login->execute();
    //Comprobamos que con rowCount() si está repetida la consulta en al BD sino devulve un 0.
    $comprobar = $resultado_login->rowCount(); */

    /******************************************************** Para contraseñas encriptada con password_hash ****************/
    $contador = 0;
    $consulta = 'SELECT * FROM user_login WHERE usuario = :usuario'; //La consulta la realizamos con un solo marcador
    $resultado_login = $conexion->prepare($consulta);
    $resultado_login->execute(array(':usuario' => $usuario));
    while ($registro = $resultado_login->fetch(PDO::FETCH_ASSOC)) { //En registro todos los resultados de la consulta que coincida son usuario.
        if (password_verify($password, $registro['password'])) { 
            //En password_verify(), introducimos dos parámetros, el password introducido y el password que aparece en la base de datos.
            $contador++;
        }
    }   
    if ($contador > 0) {

        //$consulta_rol = 'SELECT rol FROM user_login WHERE usuario = ?'; //Utilizando parámetros (?)
        $consulta_rol = 'SELECT * FROM user_login WHERE usuario = :user'; //Utilizando marcadores

        $resultado_rol = $conexion->prepare($consulta_rol);

        //$resultado_rol->execute(array($usuario)); //Utilizando parámetros (?)
        //Aquí le decimos que busque y ejecute en el array el marcador :user que corresponde al valor de $usuario.
        $resultado_rol->execute(array(':user' => $usuario)); //Utilizando marcadores

        while ($reg_rol = $resultado_rol->fetch(PDO::FETCH_ASSOC)) {
            $rol = $reg_rol['rol'];
            $id_FK = $reg_rol['id_user_FK'];

            session_start();

            $_SESSION['nombre'] = $usuario;

            $_SESSION['usuario'] = $rol;

            $_SESSION['id'] = $id_FK;

            header("location: ../../index.php");
        }
    } else {
        $error_login = "<h3 class = 'login_err'>No estás registrado, puedes registrarte ahora.</h3>";
        header("location: ../../views/acceder.php?err=$error_login");
    }
    $resultado_login->closeCursor();
    $conexion = null;
}
?>