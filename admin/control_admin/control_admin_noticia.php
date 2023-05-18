<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();
$id = $_SESSION['id'];

if (isset($_POST['subir_noticia'])) {

        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    
//$descripcion = $_POST['descripcion'];

        $descripcion = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
   
//echo "Hola $titulo";

$nombre_imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamagno_imagen = $_FILES['imagen']['size'];
$temp_imagen = $_FILES['imagen']['tmp_name'];
$error_imagen = $_FILES['imagen']['error'];

//Condicionamos el tamaño del archivo.
if($tamagno_imagen <= 1000000){

    if($tipo_imagen=='image/jpg'||$tipo_imagen=='image/jpeg'||$tipo_imagen=='image/npg'||$tipo_imagen=='image/gif'){

        //Ruta de la carpeta de destino.
        $destino = '../../assets/images/img_carga/';

        //Movemos la imagen del direstorio temporal al directorio de destino.
        move_uploaded_file($temp_imagen, $destino.$nombre_imagen);
        
        //Buscamos si el título está repetido.
        $buscar_titulo = 'SELECT * FROM noticias WHERE titulo = :titul';
        $consulta = $conexion->prepare($buscar_titulo);
        $consulta->execute(array(":titul" => $titulo));

        $resul_titulo = $consulta->fetch();

        $errores = [false, false];

        if (($titulo && !$resul_titulo) && $descripcion){

            $consulta = 'INSERT INTO noticias (fecha_noticia, foto, titulo, texto, id_user_FK) VALUES (CURDATE(), :foto, :titulo, :texto, :id)';
            $insertar = $conexion->prepare($consulta);
            $insertar->bindParam(":titulo", $titulo);
            $insertar->bindParam(":texto", $descripcion);
            $insertar->bindParam(":id", $id);
            $insertar->bindParam(":foto", $nombre_imagen);
            $insertar->execute();

            $guardado = "<h3 class = 'registro_ok'>Se han guardado la noticia correctamente.</h3>";
                
                header("location: ../../views/crear_noticia.php?ok=$guardado");
        }else{
            if (empty($titulo)) {
                $errores[0] = true;
            } elseif ($resul_titulo) {
                $errores[0] = 2;
            } else {
                $errores[0] = $titulo;
            }
            //*******************************/
            if (empty($descripcion)) {
                $errores[1] = true;
            } else {
                $errores[1] = $descripcion;
            }
            header('location: ../../views/crear_noticia.php?titulo=' . $errores[0] . '&descri=' . $errores[1] );
        }
            $insertar->closeCursor();
            $conexion = null;

    }else{
        $fallo = "<p class = 'error'>Solo se puede subir ficheros jpg/jpeg/png/gif</p>";
        header("location: ../../views/crear_noticia.php?fallo=$fallo&titulo=$titulo&descri=$descripcion");
        
    }
}else{

    $fallo = "<p class = 'error'>El tamaño es demasiado grande, la imagen debe de ser menor a 1Mb.</p>";
    header("location: ../../views/crear_noticia.php?fallo=$fallo&titulo=$titulo&descri=$descripcion");
   // echo "El tamaño es demasiado grande, la imgen debe de ser menor a 1Mb.";
}
}
?>