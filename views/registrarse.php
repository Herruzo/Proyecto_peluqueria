<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ego Antonius">
    <meta name="keywords" content="peluqueria, estilista, corte de pelo, afeitado">
    <meta name="description" content="Tu peluqueria más cercana, con los cortes más modernos y atractivos, al mejor precio">
    <meta name="revisit-after" content="2 days" />
    <meta name="category" content="peluqueria" />
    <link rel="icon" href="favicon.ico" type="image/ico" />
    <title>Registrarse</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">
</head>

<body>
    <?php
    //Utilizo los filtros porque me da un warning al no estar definidas las variables. Puedo definirlas previamente.
    $nombre = filter_input(INPUT_GET, "nombre", FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['nombre'];
    $apellidos = filter_input(INPUT_GET, 'apellidos', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['apellidos'];
    $direccion = filter_input(INPUT_GET, 'direccion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['direccion'];
    $poblacion = filter_input(INPUT_GET, 'poblacion', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['poblacion'];
    $provincia = filter_input(INPUT_GET, 'provincia', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['provincia'];
    $codigo_postal = filter_input(INPUT_GET, 'codigo_postal', FILTER_SANITIZE_NUMBER_INT); //$_GET['codigo_postal'];
    $telefono = filter_input(INPUT_GET, 'telefono', FILTER_SANITIZE_NUMBER_INT); //$_GET['telefono'];
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL); //$_GET['email'];
    $fecha_nac = filter_input(INPUT_GET, 'fecha_nac', FILTER_SANITIZE_NUMBER_INT); //$_GET['fecha_nac'];
    $sexo = filter_input(INPUT_GET, 'sexo', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['sexp'];
    $usuario = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['usuario'];
    $pass = filter_input(INPUT_GET, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS); //$_GET['pass'];

    $text_er_1 = "Campo obligatorio, solo letras.";
    $text_er_2 = "Campo obligatorio, solo números.";
    $text_er_3 = "Campo obligatorio.";
    $text_er_4 = "Ya se ha registrado otro usuario con el mismo email.";
    $text_er_5 = "El usuario ya está registrado.";
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
                    <a class="link-item" href="#" id="op1">Registrarse</a>
                    <a class="link-item" href="./acceder.php">Acceder</a>                  
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
            <form id="formulario_reg" name="formulario_reg" class="formulario_reg" method="POST" action="../admin/control/insert.php">
                <fieldset id="grupo_datos">
                    <legend id="legend_datos">
                        <h3>&nbsp;Datos Personales&nbsp;</h3>
                    </legend>
                    <table>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="nombre">*Nombre: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="nombre" id="nombre" value="<?php echo ($nombre == 1) ? "" : $nombre ?>" placeholder="Solo se admiten letras"> <br>
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
                            <td class="td_form"><label for="apellidos">*Apellidos: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="apellidos" id="apellidos" value="<?php echo ($apellidos == 1) ? "" : $apellidos ?>" placeholder="Tus apellidos"> <br>
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
                            <td class="td_form"><label for="direccion">*Dirección: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="direccion" id="direccion" value="<?php echo ($direccion == 1) ? "" : $direccion ?>" placeholder="calle, nº"> <br>
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
                            <td class="td_form"><label for="poblacion">*Población: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="poblacion" id="poblacion" value="<?php echo ($poblacion == 1) ? "" : $poblacion ?>" placeholder="Tu población"> <br>
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
                            <td class="td_form"><label for="provincia">*Provincia: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="provincia" id="provincia" value="<?php echo ($provincia == 1) ? "" : $provincia ?>" placeholder="Tu provincia"> <br>
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
                            <td class="td_form"><label for="cp">*Código postal: </label></td>
                            <td class="td_form"><input class="inp_form" type="number" name="codigo_postal" id="cp" value="<?php echo ($codigo_postal == 1) ? "" : $codigo_postal ?>" placeholder="XXXXX"> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                        echo ($codigo_postal == 1) ? $text_er_2 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="telefono">*Teléfono de contacto: </label></td>
                            <td class="td_form"><input class="inp_form" type="tel" name="telefono" id="telefono" value="<?php echo ($telefono == 1) ? "" : $telefono ?>" placeholder="Escribe tu teléfono"> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                        echo ($telefono == 1) ? $text_er_2 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="email">*Email: </label></td>
                            <td class="td_form"><input class="inp_form" type="email" name="email" id="email" value="<?php echo ($email == 1 || $email == 2) ? "" : $email ?>" placeholder="Escribe tu correo"> <br>
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
                            <td class="td_form"><label for="fecha_nac">*Fecha de nacimiento: </label></td>
                            <td class="td_form"><input class="inp_form" type="date" name="fecha_nac" id="fecha_nac" value="<?php echo ($fecha_nac == 1) ? "" : $fecha_nac ?>"> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                        echo ($fecha_nac == 1) ? $text_er_3 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="sexo">*Sexo: </label></td>
                            <td class="td_form">
                                <select name="sexo" id="sexo" class="inp_form">
                                    <option value="">Selecciona una opción</option>
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
                        <tr>
                            <td colspan="2"> (*) Los campos marcados con asterisco son obligatorios.</td>
                        </tr>
                    </table>
                </fieldset>
                <span><?php
                        if (isset($_GET['ok'])) {
                            print $_GET['ok'];
                        }
                        ?>
                </span>
                <fieldset>
                    <legend>
                        <h3>&nbsp;Usuario y contraseña&nbsp;</h3>
                    </legend>
                    <table>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="usuario">*Usuario: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="usuario" id="usuario" value="<?php echo ($usuario == 1 || $usuario == 2) ? "" : $usuario ?>" placeholder="Usuario"> <br>
                                <small>Error mensaje</small>
                                <span>
                                    <small>
                                        <?php
                                        if ($usuario == 1) {
                                            echo $text_er_3;
                                        } elseif ($usuario == 2) {
                                            echo $text_er_5;
                                        } else {
                                            echo '';
                                        }                                
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="pass">*Contraseña: </label></td>
                            <td class="td_form"><input class="inp_form" type="password" name="pass" id="pass" placeholder="Contraseña">
                                <!-- Agregar un botón para mostrar la contraseña. -->
                                <span class="ver" id="ver_pass"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver password"></span> <br>
                                <small>Error mensaje</small>
                                <span class="error">
                                    <small>
                                        <?php
                                        echo ($pass == 1) ? $text_er_3 : "";
                                        ?>
                                    </small>
                                </span>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="pass_rep">*Rep. contraseña: </label></td>
                            <td class="td_form"><input class="inp_form" type="password" name="pass_rep" id="pass_rep" placeholder="Repite tu contraseña" required>
                                <span class="ver" id="ver_pass_rep"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver password" title="Ver contraseña"></span> <br>
                                <small>Error mensaje</small>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> (*) Los campos marcados con asterisco son obligatorios.</td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <div class="politica">
                    <label for="privacidad"> * He leido la política de privacidad: </label>
                    <input type="checkbox" class="checke" id="privacidad" required>
                </div>
                <br>
                <button type="submit" name="enviar_registro" class="boton_enviar_registro" id="boton_enviar">Enviar registro</button>
                <br>
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