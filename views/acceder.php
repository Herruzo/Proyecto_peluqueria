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
    <title>Acceder</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">

</head>

<body>
    <header class="cabecera">
        <h1 class="logo">
            <a href="../index.php"><img src="../assets/images/logo1.png" alt="logo lorem & ipsum" width="467" title="La mejor peluqueria" height="321"></a>
        </h1>

        <nav id="nav_menu" class="nav_menu">
            <div id="nav_links_registro" class="nav_links_registro">
                <div class="nav-links comun">
                    <a class="link-item" href="../index.php">Inicio</a>
                    <a class="link-item" href="./noticias.php">Noticias</a>
                    <a class="link-item" href="./registrarse.php">Registrarse</a>
                    <a class="link-item" href="#" id="op1">Acceder</a>
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
            <form id="formulario_acce" name="formulario_acce" class="formulario_acce" method="POST" action="../admin/control/login.php">
                <fieldset>
                    <legend>
                        <h3>&nbsp;Usuario y contraseña&nbsp;</h3>
                    </legend>
                    <table>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="usuario">*Usuario: </label></td>
                            <td class="td_form"><input class="inp_form" type="text" name="usuario" id="usuario" placeholder="Pon tu usuario" required> <br>
                                <small>Error mensaje</small>
                            </td>
                            </td>
                        </tr>
                        <tr class="position_input tr_form">
                            <td class="td_form"><label for="pass">*Contraseña: </label></td>
                            <td class="td_form"><input class="inp_form" type="password" name="pass" id="pass" placeholder="Pon tu contraseña" required>
                                <span class="ver" id="ver_pass"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver password" title="Ver contraseña"></span><br>
                                <small>Error mensaje</small>
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> (*) Los campos marcados con asterisco son obligatorios.</td>
                        </tr>
                    </table>
                </fieldset>
                <span>
                    <?php
                    if (isset($_GET['err'])) {
                        print $_GET['err'];
                    }
                    ?>
                </span>
                <br>
                <div class="botones">
                    <button type="submit" name="enviar_loging" class="loging" id="boton_loging">Acceder</button>
                    <a href="./registrarse.php"></href><button type="button" name="ir_registro" class="boton_ir_registro loging" id="boton_ir_registro">Ir a registrarse</button></a>
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