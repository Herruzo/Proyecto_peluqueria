<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ego Antonius">
    <meta name="keywords" content="peluqueria, estilista, corte de pelo, afeitado">
    <meta name="description" content="Noticias sobre eventos de peliquería, los mejores estilistas">
    <meta name="revisit-after" content="2 days" />
    <meta name="category" content="peluqueria" />
    <link rel="icon" href="favicon.ico" type="image/ico" />
    <title>Modificar noticia</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css"> 

</head>

<body>
    <?php
    include('../admin/control/conexion.php');
    $conexion = DB::conx();
    session_start();

    //if (!isset($_SESSION['usuario'])) {
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
        header('location: ./acceder.php');
    }
    $id_admin = $_SESSION['id'];    

    $id_Autor = filter_input(INPUT_GET, "idAut", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['idAut'];
    $id_noticia = filter_input(INPUT_GET, "id_noticia", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['id_noticia'];
    $titulo = filter_input(INPUT_GET, "titulo", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['titulo'];
    $fecha_p = filter_input(INPUT_GET, "fecha", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['fecha'];
    $texto = filter_input(INPUT_GET, "texto", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['texto'];
    $foto = filter_input(INPUT_GET, "imagen", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['imagen'];

    $titulo_retorno = filter_input(INPUT_GET, 'titul', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descrip_retorno = filter_input(INPUT_GET, 'descri', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $fecha_p_retorno = filter_input(INPUT_GET, 'fecha_p', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $text_er_1 = "Campo fecha es obligatorio.";
    $text_er_2 = "Campo título es obligatorio.";
    $text_er_3 = "Campo descripción es obligatorio.";
    $text_er_4 = "El título está repetido.";   
     
    ?>
        <header class="cabecera">
            <h1 class="logo">
                <a href="../index.php"><img src="../assets/images/logo1.png" alt="logo lorem & ipsum" width="467" title="La mejor peluqueria" height="321"></a>
            </h1>
            <nav id="nav_menu" class="nav_menu">
                <div id="nav_links_registro" class="nav_links_registro">
                    <div class="nav-links comun">
                        <a class="link-item" href="../index.php">Inicio</a>
                        <a class="link-item" href="./noticias.php">Noticias</a>
                    <?php
                    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {
                    ?>
                        <a class="link-item" href="./admin_user.php">Admin usuarios</a>
                        <a class="link-item" href="./admin_citas.php">Admin citas</a>
                        <a class="link-item" href="./admin_noticias.php">Admin noticias</a>
                        <a class="link-item" href="../admin/control/consulta_perfil_admin.php"><img class="perfil" src="../assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>
                    <?php
                    }                   
                    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'user') {
                    ?>
                        <a class="link-item" href="./citas.php">Citas</a>
                        <a class="link-item" href="../admin/control/consulta_perfil_user.php"><img class="perfil" src="../assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>
                    <?php
                    }                    
                    if (!isset($_SESSION['usuario'])) {
                    ?>
                        <a class="link-item" href="./registrarse.php">Registrarse</a>
                        <a class="link-item" href="./acceder.php">Acceder</a>
                    <?php
                    }                    
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <a class="link-item" href="../admin/control/cierre.php">Cerrar sesión</a>
                    <?php
                    }
                    ?>                   
                       
                    </div>
                </div>
                <div>
                    <button id="button-menu" class="button-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
                </div>
            </nav>
        </header>
        <main>
        <div class="contenedor_main">
        <form id="modificar_noti" name="modificar_noti" class="formulario_notu" method="POST" action="../admin/control_admin/control_modificar_noticia.php" enctype="multipart/form-data">
                <fieldset id="grupo_datos">
                    <legend id="legend_datos">
                        <h3>&nbsp;Modificar la noticia&nbsp;</h3>
                    </legend>
                    <table class="conte_table">
                        <tr class="conte_tr">
                            <td ><input type="hidden" name="id_autor" id="id_autor" value="<?php echo $id_Autor;?>"></td>
                            <td ><input type="hidden" name="id_noticia" id="id_noticia" value="<?php echo $id_noticia;?>"></td>
                            <td ><input type="hidden" name="foto" id="foto" value="<?php echo $foto;?>"></td>
                            <td ><input type="hidden" name="titulo_orig" id="titulo_orig" value="<?php echo $titulo;?>"></td>
                        </tr>
                        <tr class="conte_tr">                            
                            <td class="conte_td"><label class="conte_input"for="fecha_p">Fecha de la publicación</label></td>
                            <td class="conte_td"><input class="conte_input"type="date" name="fecha_p" id="fecha_p" value="<?php if($fecha_p){echo $fecha_p;}elseif($fecha_p_retorno==1){echo'';}else{echo $fecha_p_retorno;}?>">
                            <br>                    
                            <span class="error">
                                <small>
                                    <?php
                                     echo ($fecha_p_retorno == 1) ? $text_er_1 : "";
                                    ?>
                                </small>
                                </span>
                           </td>                            
                        </tr>
                        <tr class="conte_tr">
                            <td class="conte_td"><label class="conte_input" for="titulo">Modificar el titulo de la noticia</label></td>
                            <td class="conte_td"><input class="conte_input"type="text" id="titulo" name="titulo" value="<?php if($titulo){echo $titulo;}elseif($titulo_retorno==1 || $titulo_retorno==2){echo'';}else{echo $titulo_retorno;}?>">
                            <br>                    
                            <span class="error">
                                <small>
                                    <?php
                                      if ($titulo_retorno == 1) {
                                        echo $text_er_2;
                                        } elseif ($titulo_retorno == 2) {
                                            echo $text_er_4;
                                        } else {
                                            echo '';
                                        }
                                    ?>
                                </small>
                                </span>
                        </td>
                        </tr>
                        <tr class="conte_tr ">
                            <td class="conte_td"><label class="conte_input" for="imagen">Deseas cambiar la imagen</label></td>
                            <td class="conte_td"><input class="conte_input borde" type="file" size="20" name="imagen" id="imagen" value="<?php echo $foto;?>">                  
                                <?php
                                if (isset($_GET['fallo'])) 
                                    {   
                                    print $_GET['fallo'];
                                    }                        
                                ?>                          
                                                     
                        </td>                           
                        </tr>
                        <tr class="conte_tr">
                            <td class="conte_td"><label class="conte_input" for="descripcion"></label>Cambiar la descripción
                            <br>                     
                                
                        </td>
                            <td class="conte_td">
                                <textarea class="conte_input" name="descripcion" id="descripcion" cols="40" rows="10" ><?php if($texto){echo $texto;}elseif($descrip_retorno==1){echo'';}else{echo $descrip_retorno;}?></textarea>
                                <br>
                                <span class="error">
                                <small>
                                    <?php
                                     echo ($descrip_retorno == 1) ? $text_er_3 : "";
                                    ?>
                                </small>
                                </span>                                
                            </td>                            
                        </tr>
                    </table>
                </fieldset>
                <br>
                <span><?php
                        if (isset($_GET['ok'])) {

                            print $_GET['ok'];
                        }                      
                        ?>
                </span>
                <br>
                <div class="subir_noticias">
                    <button type="submit" name="modificar_noticia" class="solicitar_cita" id="boton_log">Modificar noticia</button>
                </div>
            </form>        
                          
        </div>
        </main>
        <footer>
            <div class="footer_principal">
                <section class="contenedor_contacto centrar">
                    <h2 class="padding_h2_footer">Información de contacto:</h2>
                    <div class="contacto_direccion">
                        <div class="logo_direc">
                            <img src="../assets/images/home_14773.png" alt="direccion">
                        </div>
                        <div class="direccion">
                            <p>Lorem&ipsum, S.A.</p>
                            <p>C/ Duque de Lerma, 9</p>
                            <p>45500-Toledo-Toledo</p>
                        </div>
                    </div>
                    <div class="contacto_direccion">
                        <div class="logo_direc">
                            <img src="../assets/images/phone_14743.png" alt="direccion">
                        </div>
                        <div class="tele_email">
                            <p>+34 925 22 XX XX</p>
                        </div>
                    </div>
                    <div class="contacto_direccion">
                        <div class="logo_direc">
                            <img src="../assets/images/Email-Icon_33999.png" alt="direccion">
                        </div>
                        <div class="tele_email">
                            <p><a href="mailto:info@lorem&ipsum.com" target="_blank" class="no_estilo">info@lorem&ipsum.com</a> </p>
                        </div>
                    </div>
                </section>
                <section class="aviso centrar">
                    <h2 class="padding_h2_footer">Información:</h2>
                    <ul>
                        <li><a href="#" target="_blank" class="no_estilo">Aviso legal</a> </li>

                        <li><a href="#" target="_blank" class="no_estilo">Términos y condiciones generales</a> </li>

                        <li><a href="./contacto.php" target="_blank" class="no_estilo">Donde estamos.</a> </li>
                    </ul>
                </section>
                <section class="siguenos centrar">
                    <h2 class="padding_h2_footer">Síguenos:</h2>
                    <a href="https://www.facebook.com/" title="Facebok" target="_blank"><img src="../assets/images/Facebook-Icon_34072.png" alt="facebook" width="32" height="32" id="facebook"></a>

                    <a href="https://www.instagram.com/" title="Instagram" target="_blank"><img src="../assets/images/Instagram-Icon_34077.png" alt="instagram" width="32" height="32" id="instagram"></a>

                    <a href="https://twitter.com/" title="Twitter" target="_blank"><img src="../assets/images/Twitter-Icon_34073.png" alt="twitter" width="32" height="32" id="twitter"></a>

                    <div class="logo_footer">
                        <img src="../assets/images/logo1.png" alt="logo lorem & ipsum" width="467" title="La mejor peluqueria" height="321">
                    </div>
                </section>
            </div>
            <div class="copyright">
                <p>Copyright &copy; Ego Antonius</p>
            </div>
        </footer>

        <script src="../js/script.js"></script>

</body>
</html>