<?php
include '../control/conexion.php';
$conexion = DB::conx();
session_start();

$dia = $_REQUEST['dia_admin'];
$idR = $_REQUEST['idU'];

//$id = $_SESSION['id'];

$horas_reservas = ['09:30','09:45','10:00','10:15','10:30','10:45','11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','13:00','16:30','16:45','17:00','17:15','17:30','17:45','18:00','18:15','18:30','18:45','19:00','19:15','19:30','19:45','20:00'];

$array1=[]; //Definimos una variable para almacenar lo se $resul['hora_cita]
$sql= 'SELECT hora_cita FROM citas WHERE fecha_cita = ?';

    $consulta = $conexion->prepare($sql);
    $consulta->execute(array($dia));   

    while ($resul = $consulta->fetch(PDO::FETCH_ASSOC)){
       array_push($array1,$resul['hora_cita']);
    } 
    $horas = array_diff($horas_reservas, $array1);
    $resultado = serialize($horas); 

    header('location: ../../views/admin_solicita_cita.php?dia='.$dia.'&resultado='.$resultado.'&idR='.$idR);
    
    $consulta->closeCursor();
        
    if (isset($_POST['cita'])) {       
    
    $id=$_POST['idU'];
    $fecha= $_POST['dia'];    
    $hora_cita= $_POST['hora_cita'];    
    $servicio= $_POST['servicio'];

    $errores = [false, false, false];

        if($fecha && $hora_cita && $servicio){
        
        $insert_cita= 'INSERT INTO citas (fecha_cita, hora_cita, servicio, id_user_FK) VALUES (:fecha, :hora, :servicio, :id)';

        $consul_cita = $conexion->prepare($insert_cita);
        $consul_cita->bindParam(':fecha', $fecha);
        $consul_cita->bindParam(':hora', $hora_cita);
        $consul_cita->bindParam(':servicio', $servicio);
        $consul_cita->bindParam(':id', $id);
        $consul_cita->execute();
        $registrado= "<h3 class = 'registro_ok'>Cita registrada.</h3>";
        header("location: ../../views/admin_solicita_cita.php?ok= $registrado &idFinal= $id");           

        }else{
            if(empty($fecha)){
                $errores[0] = true;
            }else{
                $errores[0] = $fecha;
            }
            if(empty($hora_cita)){
                $errores[1] = true;
            }
            if(empty($servicio)){
                $errores[2] = true;
            }
            $fallo= "<h3 class = 'error'>No se ha registrado la cita, intentalo de nuevo.</h3>";
            header("location: ../../views/admin_solicita_cita.php?fecha=" .$errores[0]."&hora_cita=" .$errores[1]."&servicio=" .$errores[2]."&err=" .$fallo. "&idFinal= $id");            
        }
        $consulta->closeCursor();
        $conexion = null;       
    }

?>
