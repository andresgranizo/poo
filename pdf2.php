<?php
 session_start();
include './conn.php';

    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Actividades_Generales.xls');


	$link = mysqli_connect("10.64.80.94", "root", "root");
	
	mysqli_select_db($link, "bitacora2");


	$id_tecnico2 = $_SESSION['id_tecnico'];
	$nombre = $_POST['select'];
	$fechainicio = $_POST['fecha_inicio'];
	$fecha_fin = $_POST['fecha_fin'];
	echo $nombre;
	
	$sql = "SELECT fecha,hora_inicio,hora_fin,tiempo_utilizado,nombre_actividad,ser.nombre_serv, tec.nom_tec, tec.area_tec
	FROM registro re          
	JOIN tecnico tec ON re.id_tecnico = tec.id_tecnico
	JOIN servicios ser ON re.id_servicios = ser.id_servicios 
	where tec.area_tec like '%$nombre%'
	AND CAST(fecha AS DATE)>= '".$fechainicio."'
     AND CAST(fecha AS DATE)<= '".$fecha_fin."'

	ORDER BY fecha,tec.nom_tec


	

";


$total ="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tiempo_utilizado))) AS Sumatoria 
FROM registro re
JOIN tecnico tec ON re.id_tecnico = tec.id_tecnico
JOIN servicios ser ON re.id_servicios = ser.id_servicios
where tec.area_tec like '%$nombre%'
AND CAST(fecha AS DATE)>= '".$fechainicio."'
 AND CAST(fecha AS DATE)<= '".$fecha_fin."'";

$total_horas=mysqli_query($link,$total);
	$result=mysqli_query($link, $sql);
?>



<table border="1">
<caption>Reporte de Actividades  </caption>
	<tr>
		<th>Fecha</th>
		<th>Hora Inicio</th>
		<th>Hora Fin</th>
		<th>Tiempo Utilizado</th>
		<th>Actividad</th>
		<th>Area</th>
		<th>Tecnico</th>
		<th>Subproceso</th>


	</tr>
	<?php
      
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['fecha']; ?></td>
					<td><?php echo $row['hora_inicio']; ?></td>
					<td><?php echo $row['hora_fin']; ?></td>
					<td><?php echo $row['tiempo_utilizado']; ?></td>
					<td><?php echo $row['nombre_actividad']; ?></td>
					<td><?php echo $row['nombre_serv']; ?></td>
					<td><?php echo $row['nom_tec']; ?></td>
					<td><?php echo $row['area_tec']; ?></td>
					

					


				</tr>	

			<?php
		}

	?>
	
	<td>
		<th></th>
	  <th> Total Horas Registradas </th>	
	</td>

	<?php
		while ($row=mysqli_fetch_assoc($total_horas)) {
			?>
			
		    <th><?php echo $row['Sumatoria']; ?></th>
				

			<?php
		}


	?>
</table>