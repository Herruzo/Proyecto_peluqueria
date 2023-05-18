<?php
include 'conexion.php';
$conexion = DB::conx();
session_start();
$id = $_SESSION['id'];
                 
$sentencia_citas = 'SELECT idCita, fecha_cita, hora_cita, servicio FROM citas WHERE id_user_FK = :id AND(fecha_cita > CURDATE() OR fecha_cita = CURDATE()) ORDER BY fecha_cita;';
$consulta_cita = $conexion->prepare($sentencia_citas);
$consulta_cita->bindParam(':id', $id);
$consulta_cita->execute();
$citas_usuario='';
$citas_usuario .= '<table class="cont_citas">';
$citas_usuario .= '<tr class="borde">';
$citas_usuario .= '<th class="borde"><h3>Día de la cita</h3></th>';
$citas_usuario .= '<th class="borde"><h3>Hora de la cita</h3></th>';
$citas_usuario .= '<th class="borde"><h3>Servicio solicitado</h3></th>';
$citas_usuario .= '<th ></th>';
$citas_usuario .= '</tr>';
while($fila = $consulta_cita->fetch(PDO::FETCH_ASSOC)){
    
    $citas_usuario .= '<tr class="borde">';
    $citas_usuario .= '<td class="borde"><center>'.$fila['fecha_cita'].'</center></td>';
    $citas_usuario .= '<td class="borde"><center>'.$fila['hora_cita'].'</center></td>';
    $citas_usuario .= '<td class="borde"><center>'.$fila['servicio'].'</center></td>';
    $citas_usuario .= '<td class="td_borrar borde"><a href="#"><button class="btn_borrar" type="submit" name="borrar_cita" id="borrar_cita" value="Borrar">Borrar</button></a></td>';
    $citas_usuario .= '<td><input type="hidden" id="id_cita" value="'.$fila['idCita'].'"></td>';
    $citas_usuario .= '</tr>';
}
$citas_usuario .= '</table>';

echo $citas_usuario;

$consulta_cita->closeCursor();
$conexion = null;
?>

