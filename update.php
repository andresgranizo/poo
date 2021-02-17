<?php
	if (isset($_GET['id_ticket'])){
		$id_ticket=intval($_GET['id_ticket']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Reporte</b></h2></div>
                    <div class="col-sm-4">
						<a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
						<a href="login.php" class="btn btn-info add-new"><i class="fas fa-hand-point-left"></i>  Salir</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
				$registro= new Database();
				
				if(isset($_POST) && !empty($_POST))
				{

					$id_ticket = $registro->sanitize($_POST['id_ticket']);
					$hora_fin = $registro->sanitize($_POST['hora_fin']);
					$tiempo_utilizado = $registro->sanitize($_POST['tiempo_utilizado']);
				    $nombre_actividad = $registro->sanitize($_POST['nombre_actividad']);
					$descripcion = $registro->sanitize($_POST['descripcion']);
					
					$res = $registro->update($id_ticket,$hora_fin,$tiempo_utilizado,$nombre_actividad,$descripcion);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_registro=$registro->single_record($id_ticket);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-2">
					
					<input type="hidden" name="hora_fin" id="hora_fin" class='form-control' maxlength="100" required  value="<?php echo $datos_registro->hora_fin;?>">
					<input type="hidden" name="id_ticket" id="id_ticket" class='form-control' maxlength="100"   value="<?php echo $datos_registro->id_ticket;?>">
				</div>
				<div class="col-md-6">
					
					<input type="hidden" name="tiempo_utilizado" id="tiempo_utilizado" class='form-control' maxlength="100" required value="<?php echo $datos_registro->tiempo_utilizado;?>">
				</div>
				<div class="col-md-12">
					<label>Actividad:</label>
					<textarea  name="nombre_actividad" id="nombre_actividad" class='form-control' maxlength="500" required><?php echo $datos_registro->nombre_actividad;?></textarea>
				</div>
				<div class="col-md-6">
					
					<input type="hidden" name="descripcion" id="descripcion" class='form-control' maxlength="500" required value="<?php echo $datos_registro->descripcion;?>">
				</div>
				
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            