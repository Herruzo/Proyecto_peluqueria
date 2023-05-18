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
    <title>Modificar Citas</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
</head>

<body>
    <?php
    include('../admin/control/conexion.php');
    $conexion = DB::conx();
    session_start();

    if (!isset($_SESSION['usuario'])) {
    //if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'user') {
        header('location: ./acceder.php');
    }
    $fecha = filter_input(INPUT_GET, "dias", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hora_cita = filter_input(INPUT_GET, "hora", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $servicio = filter_input(INPUT_GET, "servicio", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id_cita = filter_input(INPUT_GET, "id_cita", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idU = filter_input(INPUT_GET, "idU", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $fecha_E = filter_input(INPUT_GET, "fecha_E", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $hora_cita_E = filter_input(INPUT_GET, "hora_E", FILTER_SANITIZE_FULL_SPECIAL_CHARS);  
    $servicio_E = filter_input(INPUT_GET, "servicio_E", FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
 
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
                <form id="modificar_cita" name="modificar_cita" class="modificar_cita" method="POST" action="../admin/control/control_modificar_cita.php">
                    <fieldset>
                        <legend>
                            <h3>&nbsp;Modificar cita&nbsp;</h3>
                        </legend>
                        <table>
                            <tr>
                                <td><input type="hidden" name="id" id="id_usuario" value="<?php echo $idU; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="id" id="id_cita" value="<?php echo $id_cita; ?>"></td>
                            </tr>
                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="dia">Elige día: </label></td>
                                <td class="td_form"><input class="inp_form" type="text" name="dia" id="dia" value="<?php echo $fecha; ?>" placeholder="Días disponibles" required readonly></td>                           
                                
                            </tr>
                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="hora_cita">Elige una hora: </label></td>

                                <td class="td_form">
                                    <select name="hora_cita" id="hora_cita" class="inp_form">
                                <option value="<?php echo $hora_cita; ?>"><?php echo $hora_cita; ?></option>
                                <?php
                                $horas = unserialize($_GET['resultado']);
                                foreach($horas as $valor){      
                                ?>
                                <option value="<?php echo $valor; ?>"><?php echo $valor; ?></option>
                                <?php
                                };
                                ?>
                                </select>
                                  
                                </td>
                            </tr>

                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="servicio">Servicio: </label></td>
                                <td class="td_form">
                                    <select name="servicio" id="servicio" class="inp_form">
                                <option value="<?php echo $servicio; ?>"><?php echo $servicio; ?></option>
                                <option value="Corte">Corte</option>
                                <option value="Moldeador">Moldeador</option>
                                <option value="Peinado">Peinado</option>
                                <option value="Tinte">Tinte</option>
                            </select>                                    
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <span>
                            <?php
                                if (isset($_GET['ok'])) {

                                    print $_GET['ok'];
                                }
                                if (isset($_GET['err'])) {

                                    print $_GET['err'];
                                }
                            ?>
                        </span>
                    <br>
                    <div class="botones">
                        <button type="submit" name="actualizar" class="solicitar_cita" id="boton_log">Modificar cita</button>                        
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