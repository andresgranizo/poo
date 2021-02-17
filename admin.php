

 <?php



include './conn.php';
session_start();

        //$cedula=
        
        $id_tecnico2 = $_SESSION['id_tecnico'];
        
        $area_tec2 = $_SESSION['area_tec'];
      
        
		$nombre = $_SESSION['username'];
		
        $admin = $_SESSION['admin'];
		if (!isset($_SESSION['admin'])) {
			session_destroy();
			session_unset($_SESSION['admin']);
		   	header("location:login.php");
		}

		if(isset($_SESSION['tiempo']) ) {

					//Tiempo en segundos para dar vida a la sesión.
					$inactivo = 1200;//20min en este caso.

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
<title>UTIC's</title>
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
                <a href="pdf2.php" class="btn btn-info add-new"><i class="fas fa-hand-point-left"></i>  Generar XLS general</a>
                    <div class="col-sm-8"><h2>Bitácora  <b> TICS</b> <?php echo "<h5>Bienvenido: <b> $nombre</b></h5><br>"?></h2></div>
                    <div class="col-sm-8"><?php echo "<h5>Area: <b> $area_tec2 </b></h5><br>"?></h2></div>
                   
                    
                       
                        
          
                   
                    
                
                  
                  
                  
                    <div class="col-sm-4">
                        <a href="pdf.php" class="btn btn-info add-new"><i class="fas fa-hand-point-left"></i>  Generar XLS</a>
                  
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Actividad</a>
                        <a href="login.php" class="btn btn-info add-new"><i class="fas fa-hand-point-left"></i>  Salir</a>
                        
                    </div>
                    
                   
                </div>
            </div>
           

            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>FECHA  </th>
                        <th>HORA INICIO</th>
						<th>HORA FIN</th>
                        <th>TIEMPO UTILIZADO</th>
                        
                        <th>ACTIVIDADES</th>
                       
                       
                       

                        


                    </tr>
                </thead>
                <?php 

        
                include ('database.php');
                
				$registro = new Database();
                $listado=$registro->read();
                
				?>
                <tbody>
                <?php 
                
                
                
					while ($row=mysqli_fetch_object($listado)){

                        
						
						$fecha=$row->fecha;
						$hora_inicio=$row->hora_inicio;
						$hora_fin=$row->hora_fin;
                        $tiempo_utilizado=$row->tiempo_utilizado;
                        $id_ticket=$row->id_ticket;

                       
                        $nombre_actividad=$row->nombre_actividad;
                        $descripcion=$row->descripcion;
                        $id_tecnico=$row->id_tecnico;
                      

				?>
					<tr>
                        
                        <td><?php echo $fecha;?></td>
                        <td><?php echo $hora_inicio;?></td>
                        <td><?php echo $hora_fin;?></td>
                        <td><?php echo $tiempo_utilizado;?></td>
                        <td><?php echo $nombre_actividad;?></td>
                       
                        
                        <td>
						    <a href="update.php?id_ticket=<?php echo $id_ticket;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        </td>
                    </tr>

                    
         
        </div>	
				<?php
					}
				?>
                    
                    
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            