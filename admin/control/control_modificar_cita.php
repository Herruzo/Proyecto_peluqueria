<?php
include 'conexion.php';
$conexion = DB::conx();
session_start();
if(isset($_SESSION['usuario'])){

//$dia =$_GET['fecha'];
$hora =$_GET['hora'];
$servicio =$_GET['servicio'];

$idU = $_GET['idU'];

if(isset($_REQUEST['dia'])){ 
    //Recibimos de js los datos de dia, recibidos de modificar_cita.php del input id="dia"
    $dia = $_REQUEST['dia'];
}elseif(isset($_REQUEST['dia_admin'])){
    $dia = $_REQUEST['dia_admin'];
} else{
    //Recibimos de citas.php los datos de fecha
    $dia = $_GET['fecha'];
} 
if(isset($_REQUEST['iD_2'])){
    //iD_2 viene del js de los datos recibidos de modificar_cita.php concretamente del input hidden id_cita
    $id_cita = $_REQUEST['iD_2'];
}else{
    //Recibimos de citas.php del botón modificar.
    $id_cita = $_GET['iD'];
}
$id = $_SESSION['id'];

$horas_reservas = ['09:30','09:45','10:00','10:15','10:30','10:45','11:00','11:15','11:30','11:45','12:00','12:15','12:30','12:45','13:00','16:30','16:45','17:00','17:15','17:30','17:45','18:00','18:15','18:30','18:45','19:00','19:15','19:30','19:45','20:00'];

$array1=[];
//Creamos un array para guardar el resultado de $resul['hora_cita']

//Hacemos la consulta de cuantas horas están reservadas para el día que pasamos por la variable $dia
$sql= 'SELECT hora_cita FROM citas WHERE fecha_cita = ?';

    $consulta = $conexion->prepare($sql);
    $consulta->execute(array($dia));
  
    while ($resul = $consulta->fetch(PDO::FETCH_ASSOC)){
       array_push($array1,$resul['hora_cita']);
    } 
    //Comparamos las dos array de horas y nos devuelve las horas que no están repetidas.
    $horas = array_diff($horas_reservas, $array1);
    //Transformamos el nuevo array $horas en un string, que luego en su destino los volvemos a pasar a una array.
    $resultado = serialize($horas);
      
    header('location: ../../views/modificar_cita.php?dias='.$dia.'&hora='.$hora.'&servicio='.$servicio.'&id_cita='.$id_cita.'&idU='.$idU.'&resultado='.$resultado);

    $consulta->closeCursor();
        
    if (isset($_POST['actualizar'])) {
        
    //Datos recibidos por el submit del formulario modificar_cita
        
    $fecha_cambiada= $_POST['dia'];    
    $hora_cita_cambiada= $_POST['hora_cita'];    
    $servicio_cambiado= $_POST['servicio'];
    $id_c = $_POST['id'];

    $errores = [false, false, false, false];

    if($fecha_cambiada && $hora_cita_cambiada && $servicio_cambiado && $id_c){

        $actualizar_cita= "UPDATE citas SET fecha_cita = :fecha, hora_cita = :hora, servicio = :servicio WHERE idCita = :id";

        $consul_actualizar = $conexion->prepare($actualizar_cita);
        $consul_actualizar->bindParam(':fecha', $fecha_cambiada);
        $consul_actualizar->bindParam(':hora', $hora_cita_cambiada);
        $consul_actualizar->bindParam(':servicio', $servicio_cambiado);
        $consul_actualizar->bindParam(':id', $id_c);
        $consul_actualizar->execute();
            $actualizado= "<h3 class = 'registro_ok'>Cita actualizada.</h3>";


            

        if($_SESSION['usuario'] == 'user'){
            header("location: ../../views/citas.php?ok= $actualizado");
        }else{
            header("location: ../../views/admin_solicita_cita.php?ok= $actualizado &id= 29");
            //echo "Hola $idU";
        };
    }else{           
            
        $fallo= "<h3 class = 'error'>La cita no se ha modificado, intentalo de nuevo.</h3>";

        if($_SESSION['usuario'] == 'user'){
            header("location: ../../views/citas.php?err=".$fallo);
        }else{
            header("location: ../../views/admin_solicita_cita.php?err= $fallo &id= $idU");
        };
    }; 
    $consul_actualizar->closeCursor();
    $conexion = null;
       
    }
}
?>