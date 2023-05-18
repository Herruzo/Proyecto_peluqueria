<?php
include 'env.php';

class DB {

    public static function conx()
    {
        try {
            $conx = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . BD, USUARIO, PASSWORD);
            //$conx = new PDO("mysql:host=localhost;dbname=registro_usuarios", "root", "");
            $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Ok conexión";
            $conx->exec("SET CHARACTER SET utf8");
            //mysqli_set_charset($conexion, "utf8");
            
            return $conx;
        } catch (PDOException $e) {
            // echo "HA FALLADO LA CONEXIÓN: " . $e->getMessage();
            die("HA FALLADO LA CONEXIÓN: " . $e->getMessage());
            $conx = null;
        }       
    } 

};
