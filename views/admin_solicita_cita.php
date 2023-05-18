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
    <title>Solicitar cita</title>   
    
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/jquery-ui.js"></script>   
    
</head>

<body>
    <?php
    include '../admin/control/conexion.php';
    $conexion = DB::conx();
    session_start();
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
        header('location: ./acceder.php');
    }    
    $dia = filter_input(INPUT_GET, "fecha", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hora_cita = filter_input(INPUT_GET, "hora_cita", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $servicio = filter_input(INPUT_GET, "servicio", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }elseif(isset($_GET['idR'])){
        $id = filter_input(INPUT_GET, "idR", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       // $idU = $_GET['id'];
    }else{
        $id = filter_input(INPUT_GET, "idFinal", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }  

    if(isset($_GET['dia'])){
        $fecha = $_GET['dia'];
    }else{
        $fecha = '';
    }    

    $text_er_1 = "No has seleccionado la fecha.";
    $text_er_2 = "No has seleccionado la hora.";
    $text_er_3 = "No has seleccionado el servicio.";
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
        <form id="formulario_cita" name="formulario_cita" class="formulario_cita" method="POST" action="../admin/control_admin/control_cita_admin.php">
                    <fieldset>
                        <legend>
                            <h3>&nbsp;Citas&nbsp;</h3>
                        </legend>
                        <table>
                            <tr><td><input type="hidden" name="idU" id="idU" value="<?php echo $id;?>"></td></tr>
                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="dia">Elige día: </label></td>
                                <td class="td_form"><input class="inp_form" type="text" name="dia" id="dia_admin" value="<?php echo $fecha; ?>" placeholder="Días disponibles" required readonly>
                                    <br>
                                    <span class="error">
                                        <small>
                                            <?php
                                            echo ($dia == 1) ? $text_er_1 : "";
                                            ?>
                                        </small>
                                    </span>
                                </td>
                            </tr>
                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="hora_cita">Elige una hora: </label></td>

                                <td class="td_form">
                                    <select name="hora_cita" id="hora_cita" class="inp_form">
                                    <option value="">Horas disponibles</option>
                                    <?php
                                    $horas = unserialize($_GET['resultado']);
                                    foreach($horas as $valor){      
                                    ?>
                                    <option value="<?php echo $valor; ?>"><?php echo $valor; ?></option>
                                    <?php
                                    };
                                    ?>
                                    </select>
                                    <br>
                                    <span class="error">
                                    <small>
                                        <?php
                                        echo ($hora_cita == 1) ? $text_er_2 : "";
                                        ?>
                                    </small>
                                </span>
                                </td>
                            </tr>                            

                            <tr class="position_input tr_form">
                                <td class="td_form"><label for="servicio">Servicio: </label></td>
                                <td class="td_form">
                                    <select name="servicio" id="servicio" class="inp_form">
                                    <option value="">Elige un servicio</option>
                                    <option value="Corte">Corte</option>
                                    <option value="Moldeador">Moldeador</option>
                                    <option value="Peinado">Peinado</option>
                                    <option value="Tinte">Tinte</option>
                                </select>
                                    <br>
                                    <span class="error">
                                    <small>
                                        <?php
                                        echo ($servicio == 1) ? $text_er_3 : "";
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
                                    if (isset($_GET['err'])) {

                                        print $_GET['err'];
                                    }
                                ?>
                            </span>
                    <br>
                    <div class="botones">
                        <button type="submit" name="cita" class="solicitar_cita" id="boton_log">Solicitar cita</button>                       
                    </div>
                </form>
            </div>
            <div class="contenedor_main" >
                <h2 class="tus_citas">Las citas del usuario seleccionado.</h2>
                <div class="contenedor_main" id="tabla_cita">
                <table class="cont_citas">
                
                        <tr class="borde">
                        <th ></th>
                        <th class="borde"><h3>Día</h3></th>
                        <th class="borde"><h3>Hora</h3></th>
                        <th class="borde"><h3>Servicio</h3></th>                        
                        </tr>
                    <?php                        
                        $sentencia_citas = 'SELECT idCita, fecha_cita, hora_cita, servicio FROM citas WHERE id_user_FK = :id AND(fecha_cita > CURDATE() OR fecha_cita = CURDATE()) ORDER BY fecha_cita, hora_cita;';
                        $consulta_cita = $conexion->prepare($sentencia_citas);
                        $consulta_cita->bindParam(':id', $id);
                        $consulta_cita->execute();                        
                        
                        while($fila = $consulta_cita->fetch(PDO::FETCH_ASSOC)){                            
                            
                            echo '<tr class="borde">
                            <td><input type="hidden" id="id_cita" class="id_cita" value="'.$fila['idCita'].'"></td>
                            <td class="borde"><center>'.$fila['fecha_cita'].'</center></td>
                            <td class="borde"><center>'.$fila['hora_cita'].'</center></td>
                            <td class="borde"><center>'.$fila['servicio'].'</center></td>

                            <td class="td_borrar"><a href="../admin/control/control_modificar_cita.php?fecha='.$fila['fecha_cita'].'&hora='.$fila['hora_cita'].'&servicio='.$fila['servicio'].'&iD='.$fila["idCita"].'&idU='.$id.'"><img class="ico_editar" src="../assets/images/editar_3_c.png" title="Modificar" alt="editar"></a></td>

                            <td class="td_borrar"><a href="../admin/control/baja_cita.php?iD='.$fila['idCita'].'&idU='.$id.'"><img class="ico_borrar" src="../assets/images/borrar_1_c.png" title="Eliminar" alt="eliminar"></a></td>                       
                            </tr>';
                        }
                        $consulta_cita->closeCursor();
                        $conexion=null;
                        ?>
                </table>                    
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
                    <li><a href="#" target="_blank" class="no_estilo">Aviso legal.</a> </li>

                    <li><a href="#" target="_blank" class="no_estilo">Términos y condiciones generales.</a> </li>

                    <li><a href="#" target="_blank" class="no_estilo">Donde estamos.</a> </li>
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