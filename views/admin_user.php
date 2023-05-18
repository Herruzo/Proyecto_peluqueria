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
    <title>Admin usuarios</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilo_registrarse.css">
    
</head>

<body>
    <?php
    include '../admin/control/conexion.php';
    $conexion = DB::conx();
    session_start();
    if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != 'admin') {
        header('location: ./acceder.php');
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
                    <a class="link-item" href="#" id="op1">Admin usuarios</a>
                    <a class="link-item" href="./admin_citas.php">Admin citas</a>
                    <a class="link-item" href="./admin_noticias.php">Admin noticias</a>
                    <a class="link-item" href="../admin/control/consulta_perfil_admin.php"><img class="perfil" src="../assets/images/perfil_2.png" alt="imagen_perfil"><?php print $_SESSION['nombre'];?></a>            
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
            <div class="crear_user">
                <a href="./crear_user_admin.php"><button type="submit" name="admin_user" class="solicitar_cita" id="boton_log">Crear un nuevo usuario</button></a>
            </div>
            <br>
            <span><?php
                        if (isset($_GET['ok'])) {
                            print $_GET['ok'];
                        }
                        ?>
                </span>
            <div class="mostrar_user">
            <h2><center>Estos son los usuarios que tenemos</center></h2>
            <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                <?php
                //Guardamos el tamaño de página en la variable
                $tamagno_parinas=10;
                if(isset($_GET['pagina'])){           
                    if($_GET['pagina']==1){
                        header("location: admin_user.php");
                    }else{
                        $pagina=$_GET['pagina'];
                    }
                }else{
                    $pagina=1;
                }                 
                //Creamos una variable para indicar desde que dato empieza la página.
                $empezar = ($pagina-1)*$tamagno_parinas;

                //Le decimos que seleccione todos los registro menos el usuario 27 y nos de el nº de filas que hay menos la que hemos quitado.
                $consulta= "SELECT * FROM user_data WHERE idUser <> 27";
                $ver_user=$conexion->prepare($consulta);
                $ver_user->execute();
                //Cuenta el número de filas
                $num_filas=$ver_user->rowCount();
                //Calculamos el número total de página dividiendo el total de filas por el tamaño de página, redondeando el número resultante.
                $total_paginas = ceil($num_filas/$tamagno_parinas);
                
                $ver_user->closeCursor();
                //En esta consulta le decimos que nos devulva todo menos lo del id 27.
                $consulta_limite= "SELECT * FROM user_data INNER JOIN user_login ON(user_login.id_user_FK = user_data.idUser)WHERE idUser <> 27 LIMIT $empezar,$tamagno_parinas ";
                $ver_user=$conexion->prepare($consulta_limite);
                $ver_user->execute();

                while($fila = $ver_user->fetch(PDO::FETCH_ASSOC)){
                                    
                    echo '<tr class="borde">
                    <td class ="borde"><center>'.$fila['idUser'].'</center></td>
                    <td class ="borde"><center>'.$fila['nombre'].'</center></td>
                    <td class ="borde"><center>'.$fila['apellidos'].'</center></td>
                    <td class ="borde"><center>'.$fila['telefono'].'</center></td>
                    <td class ="borde"><center>'.$fila['rol'].'</center></td>
                    <td><a href="./perfil_user_admin.php?id='.$fila['idUser'].'"><img class="ico_ver" src="../assets/images/ojo.png" alt="ver admin_user" title="Ver usuario"></a></td>
                    </tr>';                    
                    }
                    
                $ver_user->closeCursor();   
                $conexion = null;
                ?>                
                </table>
                <?php
                 $i='';
                 echo"Página: ";
                 for($i=1; $i<=$total_paginas; $i++){                    
                    echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
                 }
                ?>                
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