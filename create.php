<?php


include './conn.php';
session_start();

        //$cedula=
        
        $id_tecnico2 = $_SESSION['id_tecnico'];
      
        
        $nombre = $_SESSION['username'];
        
		if (!isset($nombre)) {
				header("location:login.php");
		}
		if(isset($_SESSION['tiempo']) ) {

					//Tiempo en segundos para dar vida a la sesión.
					$inactivo = 1200;//20min en este caso.er

					//Calculamos tiempo de vida inactivo.
					$vida_session = time() - $_SESSION['tiempo'];

							//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
							if($vida_session > $inactivo)
							{
									//Removemos sesión.
									session_unset();
									//Destruimos sesión.
									session_destroy();
									//Redirigimos pagina.
									header("Location: login.php");

									exit();
							}

			}
			$_SESSION['tiempo'] = time();
					 include('conn.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bitácora</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
					<div class="col-sm-8"><h2>Agregar <b>Reporte</b></h2></div>
                    <div class="col-sm-4">
					
						<a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
						<a href="login.php" class="btn btn-info add-new"><i class="fas fa-hand-point-left"></i>  Salir</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$registro= new Database();
				if(isset($_POST) && !empty($_POST)){
					$fecha = $registro->sanitize($_POST['fecha']);
					$hora_inicio = $registro->sanitize($_POST['hora_inicio']);
					$hora_fin = $registro->sanitize($_POST['hora_fin']);
					$tiempo_utilizado = $registro->sanitize($_POST['tiempo_utilizado']);
					$id_servicios = $registro->sanitize($_POST['id_servicios']);
					$nombre_actividad = $registro->sanitize($_POST['nombre_actividad']);
					$descripcion = $registro->sanitize($_POST['descripcion']);
				

					//$id_tecnico=$registro->sanitize($_POST['id_tecnico']);
				   prueba($fecha,$hora_inicio,$hora_fin,$tiempo_utilizado,$id_servicios ,$nombre_actividad, $descripcion,$id_tecnico2);

				   //$res = $registro->create($hora_fin, $tiempo_utilizado, $id_servicios,$nombre_actividad,$descripcion,$id_tecnico);
				   //if($res){
					   //$message= "Datos insertados con éxito";
					   //$class="alert alert-success";
				   //}else{
					   //$message="No se pudieron insertar los datos";
					   //$class="alert alert-danger";
				   }
				   function prueba($fecha,$hora_inicio,$hora_fin,$tiempo_utilizado,$id_servicios ,$nombre_actividad, $descripcion,$id_tecnico2)
				   {

					$link = mysqli_connect("10.64.80.94", "root", "root");
					mysqli_select_db($link, "bitacora2");
					$link->set_charset('utf8');
				
					$sql = "INSERT INTO registro (fecha,hora_inicio,hora_fin,tiempo_utilizado, id_servicios,nombre_actividad,descripcion,id_tecnico) 
					VALUES ('$fecha','$hora_inicio','$hora_fin','$tiempo_utilizado','$id_servicios','$nombre_actividad','$descripcion ','$id_tecnico2');";
					if ($link->query($sql) === TRUE) {
						echo '<script language="javascript">alert("Datos insertados con éxito");</script>';   
					}else {
					  echo "No se pudieron insertar los datos";
					}
					mysqli_close($link);
				
				
				


				   }
				   


				  
				   

					
					//$res = $registro->create($hora_fin, $tiempo_utilizado, $id_servicios,$nombre_actividad,$descripcion,$id_tecnico);
					//if($res){
						//$message= "Datos insertados con éxito";
						//$class="alert alert-success";
					//}else{
						//$message="No se pudieron insertar los datos";
						//$class="alert alert-danger";
					
					
					?>
				<div class="<?php echo $class?>">
				 
				</div>	
					<?php
				
	
			?>



			<div class="row">
		
			<br>
			<br>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<form method="post">
				<label>Seleccione la fecha de ingreso de registro:</label>
				<input class="input100" name="fecha" type="date" name="date" id="fecha"  value="<?php echo date("Y-m-d");?>"
			     min = "<?php echo date('Y-m-d',strtotime(date('Y-m-d').'-20 days'));?>"  max = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."0 days"));?>">
					<br>
					<br>
			
				<div class="col-md-6">
					<label>Hora Inicio:</label>
					<input type="text"  name="hora_inicio"  id="hora_inicio"  class='form-control'  value="00:00" required >
			</div>
			<div class="col-md-6">
					<label>Hora Fin:</label>
					<input type="text"  name="hora_fin" id="hora_fin" class='form-control'   value="00:00"  required >
			</div>
			
                <div class="col-md-6">
					<label>Tiempo Utilizado:</label>
					
					<input type="text" name="tiempo_utilizado" id="tiempo_utilizado" class='form-control'  maxlength="100"  >
				</div>

								
								
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

				
  <input type="hidden" id="hora_inicio" value="0:00" />
  <input type="hidden" id="hora_fin" value="0:00" />
  <input type="hidden" id="tiempo_utilizado" />

<script>
  function calculardiferencia(){
  var hora_inicio = $('#hora_inicio').val();
  var hora_final = $('#hora_fin').val();
  
  // Expresión regular para comprobar formato
  var formatohora = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
  
  // Si algún valor no tiene formato correcto sale
  if (!(hora_inicio.match(formatohora)
        && hora_final.match(formatohora))){
    return;
  }
  
  // Calcula los minutos de cada hora
  var minutos_inicio = hora_inicio.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  var minutos_final = hora_final.split(':')
    .reduce((p, c) => parseInt(p) * 60 + parseInt(c));
  
  // Si la hora final es anterior a la hora inicial sale
  if (minutos_final < minutos_inicio) return;
  
  // Diferencia de minutos
  var diferencia = minutos_final - minutos_inicio;
  
  // Cálculo de horas y minutos de la diferencia
  var horas = Math.floor(diferencia / 60);
  var minutos = diferencia % 60;
  
  $('#tiempo_utilizado').val(horas + ':'
    + (minutos < 10 ? '0' : '') + minutos);  
}

$('#hora_inicio').change(calculardiferencia);
$('#hora_fin').change(calculardiferencia);
calculardiferencia();
</script>
								
								
												
				
				<div class="col-md-6">
					<label>Servicios</label>
				 	<select  class="form-control" name="id_servicios" required>
                                              <option value="1">UTIC'S</option>



												  
												  </select>




				</div>
				<div class="col-md-7">
					<label>Actividades:</label>
		            <textarea placeholder="Escribe aquí las actividades ..." name="nombre_actividad" id="nombre_actividad"
                     cols="80" rows="20" required></textarea>
				</div>
				<div class="col-md-12">
					
					<input type="hidden" name="descripcion" id="descripcion" class='form-control' maxlength="50000
					" required >
				

				</div>
				<div class="col-md-6">
					
					<input type="hidden" name="id_tecnico2" id="id_tecnico2" class='form-control' maxlength="2"  >
				</div>
		
				
               
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success" onclick="SumarTiempos()">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
	</div>  
	
	

								
</body>
</html>                            