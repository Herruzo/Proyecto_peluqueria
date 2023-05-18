<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();
if(isset($_SESSION['usuario'])){
   
    $id_admin = $_SESSION['id'];    

    $id_autor = $_POST['id_autor'];
    $id_noticia = $_POST['id_noticia'];

    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    
    $fecha_p = $_POST['fecha_p'];

    $texto = filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    
    $nombre_imagen = $_FILES['imagen']['name'];
    $tipo_imagen = $_FILES['imagen']['type'];
    $tamagno_imagen = $_FILES['imagen']['size'];
    $temp_imagen = $_FILES['imagen']['tmp_name'];
    $error_imagen = $_FILES['imagen']['error'];

    $titulo_orig = $_POST['titulo_orig'];

    if(!$nombre_imagen){
        //$foto = $_POST['foto'];
        $foto = $_POST['foto'];

        if($titulo != $titulo_orig){
            //Buscamos si el título está repetido.
            $buscar_titulo = 'SELECT * FROM noticias WHERE titulo = :titul';
            $consulta = $conexion->prepare($buscar_titulo);
            $consulta->execute(array(":titul" => $titulo));
    
            $resul_titulo = $consulta->fetch(); 
        }     
        $errores = [false, false, false];

        if (($titulo && !$resul_titulo) && $texto && $fecha_p){

            $consulta_noticia= "UPDATE noticias SET fecha_noticia = :fecha, titulo = :titulo, texto = :texto, foto = :foto, id_user_FK = :id_autor WHERE idNoticia = :id_noticia";

            $actualizar_noticia = $conexion->prepare($consulta_noticia);
            $actualizar_noticia->bindParam(':fecha', $fecha_p);
            $actualizar_noticia->bindParam(':titulo',$titulo);
            $actualizar_noticia->bindParam(':texto', $texto);
            $actualizar_noticia->bindParam(':foto', $foto);
            $actualizar_noticia->bindParam(':id_autor', $id_autor);
            $actualizar_noticia->bindParam(':id_noticia', $id_noticia);
            $actualizar_noticia->execute();
            
            $guardado = "<h3 class = 'registro_ok'>Se han modificado la noticia correctamente.</h3>";
            header("location: ../../views/admin_noticias.php?ok=$guardado");
        }else{
            if (empty($titulo)) {
                $errores[0] = true;
            } elseif ($resul_titulo) {
                $errores[0] = 2;
            } else {
                $errores[0] = $titulo;
            }
            //****************** */
            if (empty($texto)) {
                $errores[1] = true;
            } else {
                $errores[1] = $texto;
            }
             //****************** */
             if (empty($fecha_p)) {
                $errores[2] = true;
            } else {
                $errores[2] = $fecha_p;
            }
            header('location: ../../views/modificar_noticia.php?titul=' . $errores[0] . '&descri=' . $errores[1] . '&fecha_p=' . $errores[2] .'&idAut='.$id_autor.'&id_noticia='.$id_noticia.'&imagen='.$foto.'&titulo='.$titulo_orig );
        }
    }else{

        if($tamagno_imagen <= 1000){
            if($tipo_imagen=='image/jpg'||$tipo_imagen=='image/jpeg'||$tipo_imagen=='image/npg'||$tipo_imagen=='image/gif'){
                $foto = $nombre_imagen;

                //Ruta de la carpeta de destino.
                $destino = '../../assets/images/img_carga/';

                //Movemos la imagen del direstorio temporal al directorio de destino.
                move_uploaded_file($temp_imagen, $destino.$foto);

                if($titulo != $titulo_orig){
                    //Buscamos si el título está repetido.
                    $buscar_titulo = 'SELECT * FROM noticias WHERE titulo = :titul';
                    $consulta = $conexion->prepare($buscar_titulo);
                    $consulta->execute(array(":titul" => $titulo));
            
                    $resul_titulo = $consulta->fetch();
                }                
                $errores = [false, false, false];
                if (($titulo && !$resul_titulo) && $texto && $fecha_p){

                $consulta_noticia= "UPDATE noticias SET fecha_noticia = :fecha, titulo = :titulo, texto = :texto, foto = :foto, id_user_FK = :id_autor WHERE idNoticia = :id_noticia";

                $actualizar_noticia = $conexion->prepare($consulta_noticia);
                $actualizar_noticia->bindParam(':fecha', $fecha_p);
                $actualizar_noticia->bindParam(':titulo',$titulo);
                $actualizar_noticia->bindParam(':texto', $texto);
                $actualizar_noticia->bindParam(':foto', $foto);
                $actualizar_noticia->bindParam(':id_autor', $id_autor);
                $actualizar_noticia->bindParam(':id_noticia', $id_noticia);
                $actualizar_noticia->execute();
                
                $guardado = "<h3 class = 'registro_ok'>Se han modificado la noticia correctamente.</h3>";
                header("location: ../../views/admin_noticias.php?ok=$guardado");
                }else{
                    if (empty($titulo)) {
                        $errores[0] = true;
                    } elseif ($resul_titulo) {
                        $errores[0] = 2;
                    } else {
                        $errores[0] = $titulo;
                    }
                    //****************** */
                    if (empty($descripcion)) {
                        $errores[1] = true;
                    } else {
                        $errores[1] = $texto;
                    }
                      //****************** */
                    if (empty($fecha_p)) {
                        $errores[2] = true;
                    } else {
                        $errores[2] = $fecha_p;
                    }
                    header('location: ../../views/modificar_noticia.php?titul=' . $errores[0] . '&descri=' . $errores[1] . '&fecha_p=' . $errores[2] .'&idAut='.$id_autor.'&id_noticia='.$id_noticia.'&imagen='.$foto.'&titulo='.$titulo_orig);
                }
            }else{                
                $fallo = "<p class = 'error'>Solo se puede subir ficheros jpg/jpeg/png/gif</p>";
                header("location: ../../views/modificar_noticia.php?fallo=$fallo&titul=$titulo&descri=$texto&fecha_p=$fecha_p&titulo=$titulo_orig&idAut=$id_autor&id_noticia=$id_noticia");                
                }
        }else{            
                $fallos = "<p class = 'error'>El tamaño es demasiado grande, la imagen debe de ser menor a 1Mb.</p>";
                header("location: ../../views/modificar_noticia.php?fallo=$fallos&titul=$titulo&descri=$texto&fecha_p=$fecha_p&titulo=$titulo_orig&idAut=$id_autor&id_noticia=$id_noticia");                
            }            
        }
        //$consulta->closeCursor();
        $actualizar_noticia->closeCursor();
        $conexion = null;    
}
?>