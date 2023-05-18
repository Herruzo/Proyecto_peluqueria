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
    <title>Perfil usuario</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'user') {
        header('location: ./acceder.php');
    }else{        
        $nombre = $_GET['nombre'];        
     
    //$nombre = filter_input(INPUT_GET, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellidos = filter_input(INPUT_GET, 'apellidos', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $poblacion = filter_input(INPUT_GET, 'poblacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $provincia = filter_input(INPUT_GET, 'provincia', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $cp = filter_input(INPUT_GET, 'cp', FILTER_SANITIZE_NUMBER_INT); 
    $tel = filter_input(INPUT_GET, 'tel', FILTER_SANITIZE_NUMBER_INT); 
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL); 
    $fecha_nac = filter_input(INPUT_GET, 'fecha', FILTER_SANITIZE_NUMBER_INT); 
    $sexo = filter_input(INPUT_GET, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$nombre){
        header('location: ../admin/control/consulta_perfil_user.php');
    }
    $text_er_1 = "Campo obligatorio, solo letras.";
    $text_er_2 = "Campo obligatorio, solo números.";
    $text_er_3 = "No es un formato permitido.";
    $text_er_4 = "Ya se ha registrado otro usuario con el mismo email.";
    $text_er_5 = "El usuario ya está registrado.";
    $text_er_6 = "Tienes que poner una fecha.";
    }
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
                    <a class="link-item" href="./citas.php">Citas</a>
                    <a class="link-item" href="#" id="op1"><img class="perfil" src="../assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>            
                    <a class="link-item" href="../admin/control/cierre.php">Cerrar sesión</a>                  
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
        <div class="contenedor_main">            
            <form action="../admin/control/modificar_perfil_use.php" method="POST" id="perfil" name="perfil" class="perfil" >
                <fieldset id= "grupo_datos">
                    <legend id="legend_datos">
                        <h3>&nbsp;Estos son tus datos <?php echo $_SESSION['nombre']?>&nbsp;</h3>
                    </legend>
                    <table>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="nombre">Nombre: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="nombre" id="nombre" value="<?php echo ($nombre == 1) ? '' : $nombre?>"> <br>
                            <small>Error mensaje</small>
                                <span class="error">
                                <small>
                                    <?php
                                        echo ($nombre == 1) ? $text_er_1 : "";
                                    ?>
                                </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="apellidos">Apellidos: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="apellidos" id="apellidos" value="<?php echo ($apellidos == 1) ? '' : $apellidos?>"> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($apellidos == 1) ? $text_er_1 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="direccion">Dirección: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="direccion" id="direccion" value="<?php echo ($direccion == 1) ? '' : $direccion  ?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($direccion == 1) ? $text_er_3 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="poblacion">Población: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="poblacion" id="poblacion" value="<?php echo ($poblacion == 1) ? '' : $poblacion ?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($poblacion == 1) ? $text_er_1 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="provincia">Provincia: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="provincia" id="provincia" value="<?php echo ($provincia == 1) ? '' : $provincia?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($provincia == 1) ? $text_er_1 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="cp">Código postal: </label></td>
                            <td class="td_form"><input class="inp_form" type="number" name="codigo_postal" id="cp" value="<?php echo ($cp == 1)?'' : $cp?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($cp == 1) ? $text_er_2 : "";
                                        ?>
                                    </small>
                                        
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="telefono">Teléfono de contacto: </label></td>
                            <td class="td_form"><input class="inp_form" type="tel" name="telefono" id="telefono" value="<?php echo ($tel == 1)?'' : $tel ?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($tel == 1) ? $text_er_2 : "";
                                        ?>                                      
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="email">Email: </label></td>
                            <td class="td_form"><input class="inp_form" type="email" name="email" id="email" value="<?php echo ($email == 1 || $email == 2) ? '' : $email ?>" > <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                    <?php
                                        if ($email == 1) {
                                            echo $text_er_3;
                                        } elseif ($email == 2) {
                                            echo $text_er_4;
                                        } else {
                                            echo '';
                                        }
                                    ?>                                    
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="fecha_nac">Fecha de nacimiento: </label></td>
                            <td class="td_form"><input class="inp_form" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo ($fecha_nac == 1) ? '' : $fecha_nac  ?>"> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($fecha_nac == 1) ? $text_er_6 : "";
                                        ?>                                       
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="sexo">Sexo: </label></td>
                            <td class="td_form">
                                <select name="sexo" id="sexo" class="inp_form">
                                    <option value="<?php echo $sexo?>"><?php echo $sexo?></option>
                                    <option value="Hombre" <?php if ($sexo == "Hombre") echo "selected" ?>>Hombre</option>
                                    <option value="Mujer" <?php if ($sexo == "Mujer") echo "selected" ?>>Mujer</option>
                                    <option value="N/C" <?php if ($sexo == "N/C") echo "selected" ?>>N/C</option>

                                </select> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                            echo ($sexo == 1) ? $text_er_3 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>

                        </tr>
                    </table>
                </fieldset>
                <span>
                    <?php
                        if (isset($_GET['ok'])) {

                            print $_GET['ok'];
                        }                      
                    ?>
                </span>
                <fieldset>
                    <legend>
                        <h3>&nbsp;Si deseas cambiar la contraseña...&nbsp;</h3>
                    </legend>
                    <table>                        
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="pass">Nueva contraseña: </label></td>
                            <td class="td_form"><input class="inp_form" type="password" name="pass" id="pass" >
                                <!-- Agregar un botón para mostrar la contraseña. -->
                                <span class="ver" id="ver_pass"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver password" title="Ver contraseña"></span> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                        
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="pass_rep">Repetir contraseña: </label></td>
                            <td class="td_form"><input class="inp_form" type="password" name="pass_rep" id="pass_rep" >
                                <span class="ver" id="ver_pass_rep"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver password" title="Ver contraseña"></span> <br>
                                <small>Error mensaje</small>
                            </td>
                        </tr>        
                    </table>
                    <span><?php
                        
                                    if (isset($_GET['ok2'])) {

                                        print $_GET['ok2'];
                                    }
                                ?>
                        </span>
                </fieldset>
                <br>             
                
                <div class="botones">
                    <button type="submit" name="enviar_cambio_perfil" class="loging" id="boton_loging">Enviar cambios</button>
                    <a href="#"><button type="button" name="baja" class="boton_ir_registro loging" id="baja_use">Darse de baja</button></a>
                </div>
            </form>
        </div>
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