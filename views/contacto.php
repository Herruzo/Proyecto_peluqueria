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
    <title>Contacto</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" /> 
    
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">   
    
</head>

<body>
    <?php
    session_start();
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
    <div class="margen_header"></div>    
        <div class="contenedor_mapa" id="mimapa">     
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

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script src="../js/script.js"></script>

</body>
</html>