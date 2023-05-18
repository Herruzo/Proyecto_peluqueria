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
    <title>Lorem & Ipsum</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    session_start();    
    ?>
    <header class="cabecera">
        <h1 class="logo">
            <a href="#"><img src="./assets/images/logo1.png" alt="logo lorem & ipsum" width="467" title="La mejor peluqueria" height="321"></a>
        </h1>
        <nav id="nav_menu" class="nav_menu">
            <div id="nav_links_registro" class="nav_links_registro">
                <div class="nav-links comun">
                    <a class="link-item" href="#" id="op1">Inicio</a>
                    <a class="link-item" href="./views/noticias.php">Noticias</a>
                    <?php
                    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {                      
                    ?>
                        <a class="link-item" href="./views/admin_user.php">Admin usuarios</a>
                        <a class="link-item" href="./views/admin_citas.php">Admin citas</a>
                        <a class="link-item" href="./views/admin_noticias.php">Admin noticias</a>
                        <a class="link-item" href="./admin/control/consulta_perfil_admin.php"><img class="perfil" src="./assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>
                    <?php
                    }                    
                    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'user') {
                    ?>
                        <a class="link-item" href="./views/citas.php">Citas</a>
                        <a class="link-item" href="./admin/control/consulta_perfil_user.php"><img class="perfil" src="./assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>
                    <?php
                    }                    
                    if (!isset($_SESSION['usuario'])) {
                    ?>
                        <a class="link-item" href="./views/registrarse.php">Registrarse</a>
                        <a class="link-item" href="./views/acceder.php">Acceder</a>
                    <?php
                    }                   
                    if (isset($_SESSION['usuario'])) {
                    ?>
                        <a class="link-item" href="./admin/control/cierre.php">Cerrar sesión</a>
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
    <!-- ************************************************************************ -->
    <!-- ****************************** PORTADA ********************************* -->
    <!-- ************************************************************************ -->
    <main>
        <div class="contenedor_portada" id="contenedor_portada">
            <div class="capa_degradada">
                <div class="contenedor_detalles">
                    <div class="detalle">
                        <h2>Peluquería Lorem & Ipsum</h2>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dignissimos aliquam, placeat, sint natus quaerat repellat recusandae saepe illum ea aperiam voluptates tenetur, esse eos facere in commodi quo dolore earum qui asperiores
                            aut dolores? Numquam optio consectetur iure deleniti?</p>

                        <p class="textHide_port" id="textHide_port">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam dicta in fuga? Facilis facere molestiae, blanditiis dolore unde quisquam nobis.</p>

                        <button id="textHide_port_btn">Leer más</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_main">
            <h2 class="servicios">Nuestros servicios estrella</h2>
            <hr>
            <article class="contenedor_servicios">
                <h2 hidden>article</h2>
                <section class="servicio" id="corte">
                    <div class="text_servicio">
                        <h3>Cortes de pelo</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore aliquam aut ipsum eum animi velit dolorum nesciunt iste amet. Consequuntur.</p>
                        <p class="textHide_servicios" id="textHide_corte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ipsa veritatis porro ea, vero quaerat, similique, cumque beatae excepturi earum autem eos dolorem incidunt a! Possimus enim saepe, repellat aperiam pariatur facilis vero quis nihil soluta eum laboriosam labore quasi.</p>                        
                        <button id="textHide_corte_btn">Leer más</button>
                    </div>
                    <div class="imagen">
                        <img src="./assets/images/corte_pelo.jpg" alt="corte_de_pelo" title="imagen de un corte de pelo" width="640" height="426">
                    </div>
                </section>
                <section class="servicio" id="tinte">
                    <div class="text_servicio">
                        <h3>Tintes de pelo</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore aliquam aut ipsum eum animi velit dolorum nesciunt iste amet. Consequuntur.</p>
                        <p class="textHide_servicios" id="textHide_tinte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ipsa veritatis porro ea, vero quaerat, similique, cumque beatae excepturi earum autem eos dolorem incidunt a! Possimus enim saepe, repellat aperiam pariatur facilis vero quis nihil soluta eum laboriosam labore quasi.</p>                      

                        <button id="textHide_tinte_btn">Leer más</button>

                    </div>
                    <div class="imagen">
                        <img src="./assets/images/mechas.jpg" alt="tinte_de_pelo" title="imagen de un tinte de pelo" width="640" height="404">
                    </div>
                </section>
                <section class="servicio" id="peinado">
                    <div class="text_servicio">
                        <h3>Peinados</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore aliquam aut ipsum eum animi velit dolorum nesciunt iste amet. Consequuntur.</p>
                        <p class="textHide_servicios" id="textHide_peinado">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ipsa veritatis porro ea, vero quaerat, similique, cumque beatae excepturi earum autem eos dolorem incidunt a! Possimus enim saepe, repellat aperiam pariatur facilis vero quis nihil soluta eum laboriosam labore quasi.</p>                 

                        <button id="textHide_peinado_btn">Leer más</button>

                    </div>
                    <div class="imagen">
                        <img src="./assets/images/peinados.jpg" alt="peinado" title="imagen de un peinado" width="640" height="426">
                    </div>

                </section>
                <section class="servicio " id="moldeado">
                    <div class="text_servicio">
                        <h3>Moldeado de pelo</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore aliquam aut ipsum eum animi velit dolorum nesciunt iste amet. Consequuntur.</p>
                        <p class="textHide_servicios" id="textHide_moldeado">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam ipsa veritatis porro ea, vero quaerat, similique, cumque beatae excepturi earum autem eos dolorem incidunt a! Possimus enim saepe, repellat aperiam pariatur facilis vero quis nihil soluta eum laboriosam labore quasi.</p>               

                        <button id="textHide_moldeado_btn">Leer más</button>
                    </div>
                    <div class="imagen">
                        <img src="./assets/images/moldeado.jpg" alt="peinado_moldeado" title="imagen de un peinado moldeado" width="640" height="426">
                    </div>
                </section>
            </article>
        </div>
    </main>
    <footer>
        <div class="footer_principal">
            <section class="contenedor_contacto centrar">
                <h2 class="padding_h2_footer">Información de contacto:</h2>
                <div class="contacto_direccion">
                    <div class="logo_direc">
                        <img src="./assets/images/home_14773.png" alt="direccion">
                    </div>
                    <div class="direccion">
                        <p>Lorem&ipsum, S.A.</p>
                        <p>C/ Duque de Lerma, 9</p>
                        <p>45500-Toledo-Toledo</p>
                    </div>
                </div>
                <div class="contacto_direccion">
                    <div class="logo_direc">
                        <img src="./assets/images/phone_14743.png" alt="direccion">
                    </div>
                    <div class="tele_email">
                        <p>+34 925 22 XX XX</p>
                    </div>
                </div>
                <div class="contacto_direccion">
                    <div class="logo_direc">
                        <img src="./assets/images/Email-Icon_33999.png" alt="direccion">
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

                    <li><a href="./views/contacto.php" target="_blank" class="no_estilo">Donde estamos.</a> </li>
                </ul>
            </section>
            <section class="siguenos centrar">
                <h2 class="padding_h2_footer">Síguenos:</h2>
                <a href="https://www.facebook.com/" title="Facebok" target="_blank"><img src="./assets/images/Facebook-Icon_34072.png" alt="facebook" width="32" height="32" id="facebook"></a>

                <a href="https://www.instagram.com/" title="Instagram" target="_blank"><img src="./assets/images/Instagram-Icon_34077.png" alt="instagram" width="32" height="32" id="instagram"></a>

                <a href="https://twitter.com/" title="Twitter" target="_blank"><img src="./assets/images/Twitter-Icon_34073.png" alt="twitter" width="32" height="32" id="twitter"></a>
                <div class="logo_footer">
                    <img src="./assets/images/logo1.png" alt="logo lorem & ipsum" width="467" title="La mejor peluqueria" height="321">
                </div>
            </section>
        </div>
        <div class="copyright">
            <p>Copyright &copy; Ego Antonius</p>
        </div>
    </footer>
    <script src="./js/script.js"></script>
</body>
</html>