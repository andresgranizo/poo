<?php



include './conn.php';
session_start();

        //$cedula=
        
        $id_tecnico2 = $_SESSION['id_tecnico'];
        
        $area_tec2 = $_SESSION['area_tec'];
        $rol_tec=$_SESSION['rol_tec'];
      
        
		$nombre = $_SESSION['username'];
		if (!isset($nombre)) {
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
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="container">

            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Bitácora
                                <b>
                                    TICS</b>
                                <?php echo "<h5>Bienvenido: <b> $nombre</b></h5><br>"?></h2>
                        </div>
                        <div class="col-sm-8"><?php echo "<h5>Area: <b> $area_tec2 </b></h5><br>"?></h2>
                    </div>

                    <?php

                //perfil administrador
                    
                    if ($rol_tec =='admin')
                   { 
                    ?>

                    <a href="pdf_general.php" class="btn btn-info add-new">
                        <i class="fas fa-hand-point-left"></i>
                        Generar XLS general</a>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="new">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-md-10 col-md-offset-1">

                                        <form action="pdf2.php" method="post">
                                            <section style="text-align: left;">
                                                <div class="col-sm-8">
                                                    <h2>Reporte Genereral
                                                        <b></b>
                                                        <?php echo "<h5><b> Seleccione el subproceso</b></h5><br>"?>
                                                    </h2>
                                                </div>
                                                <select name="select">
                                                    <option selected="selected">
                                                        Seleccionar Subproceso</option>
                                                    <option value="Redes">Gestion de Redes y Comunicaciones</option>
                                                    <option value="Software">Gestion de Mantenimiento y Control de Software y Hardware
                                                    </option>
                                                    <option value="Soporte">Gestion de Servicios Web y Soporte Tecnico
                                                    </option>
                                                </select>

                                                <br>
                                                <br>
                                                <div class="form-group">
                                                    <label for="start">Fecha de inicio:</label>
                                                    <input
                                                        type="date"
                                                        id="start"
                                                        name="fecha_inicio"
                                                        value="2020-01-01"
                                                        min="2020-01-01"
                                                        max="2021-12-31">
                                                </div>
                                                <div class="form-group">
                                                    <label for="end">Fecha Fin :</label>
                                                    <input
                                                        type="date"
                                                        id="end"
                                                        name="fecha_fin"
                                                        value="2025-01-01"
                                                        min="2020-01-01"
                                                        max="2021-12-31">

                                                </div>
                                                <input type='submit' value='Generar Reporte'/>
                                                <br>

                                            </form>
                                            <?php

                                    

error_reporting(0);
$sql ="SELECT nom_tec  FROM tecnico  ";
 $result=mysqli_query($conn, $sql);

 ?>
                                            <form action="pdf.php" method="post">
                                                <link rel="stylesheet" type="text/css" href="select2/select2.min.css">
                                                <script
                                                    src="https://code.jquery.com/jquery-3.3.1.js"
                                                    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                                                    crossorigin="anonymous"></script>
                                                <script src="select2/select2.min.js"></script>
                                            </head>

                                            <body>
                                                <br>
                                                <br>

                                                <section>
                                                    <div class="col-sm-8">
                                                        <h2>Reporte Individual<b></b>
                                                            <?php echo "<h5><b> Seleccione un funcionario</b></h5><br>"?>
                                                        </h2>
                                                    </div>
                                                    <select id="controlBuscador" style="width: 50%" name="result">
                                                        <option disabled="disabled" selected="selected">Seleccione Funcionario</option>
                                                        <?php while ($ver=mysqli_fetch_array($result)) {?>

                                                        <option value="<?php echo $ver[0] ?>">
                                                            <?php echo $ver[0] 
 
                  ?>

                                                        </option>

                                                        <?php  }
         
         
         ?>

                                                    </select>
                                                    <br>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="start">Fecha de inicio:</label>
                                                        <input
                                                            type="date"
                                                            id="start"
                                                            name="fecha_inicio"
                                                            value="2020-01-01"
                                                            min="2016-01-01"
                                                            max="2021-12-31">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end">Fecha Fin :</label>
                                                        <input
                                                            type="date"
                                                            id="end"
                                                            name="fecha_fin"
                                                            value="2025-01-01"
                                                            min="2016-01-01"
                                                            max="2021-12-31">
                                                    </div>

                                                    <input type='submit' value='Generar Reporte'/>

                                                </form>

                                            </select>

                                        </section>

                                    </form>

                                <?php
                  //perfil desarrollo 
		          } else if ($rol_tec =='admin_d')

                  {



                  

	             ?>

                                    <?php

                error_reporting(0);
                $sql ="SELECT nom_tec  FROM tecnico where area_tec like '%software%'  ";
                $result_d=mysqli_query($conn, $sql);



									?>

                                    <form action="pdf_3.php" method="post">
                                        <link rel="stylesheet" type="text/css" href="select2/select2.min.css">
                                        <script
                                            src="https://code.jquery.com/jquery-3.3.1.js"
                                            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                                            crossorigin="anonymous"></script>
                                        <script src="select2/select2.min.js"></script>
                                    </head>

                                    <body>
                                        <section>
                                            <select id="controlBuscador" style="width: 50%" name="result_d">
                                                <option disabled="disabled" selected="selected">Seleccione Funcionario</option>
                                                <?php while ($ver=mysqli_fetch_array($result_d)) {?>

                                                <option value="<?php echo $ver[0] ?>">
                                                    <?php echo $ver[0] 
 
                  ?>

                                                </option>

                                                <?php  
         
        }
         
         
         ?>

                                            </select>
                                            <input type='submit' value='Generar Reporte'/>

                                        </form>

                                    </select>

                                </section>

                            <?php
         //perfil de soporte
		          } else if ($rol_tec =='admin_s')

                  {



                  

	             ?>

                                <?php

                error_reporting(0);
                $sql ="SELECT nom_tec  FROM tecnico where area_tec like '%soporte%'  ";
                $result_s=mysqli_query($conn, $sql);



									?>

                                <form action="pdf4.php" method="post">
                                    <link rel="stylesheet" type="text/css" href="select2/select2.min.css">
                                    <script
                                        src="https://code.jquery.com/jquery-3.3.1.js"
                                        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                                        crossorigin="anonymous"></script>
                                    <script src="select2/select2.min.js"></script>
                                </head>

                                <body>
                                    <section>
                                        <select id="controlBuscador" style="width: 50%" name="result_s">
                                            <option disabled="disabled" selected="selected">Seleccione Funcionario</option>
                                            <?php while ($ver=mysqli_fetch_array($result_s)) {?>

                                            <option value="<?php echo $ver[0] ?>">
                                                <?php echo $ver[0] 
 
                  ?>

                                            </option>

                                            <?php  
         
        }
         
         
         ?>

                                        </select>
                                        <input type='submit' value='Generar Reporte'/>

                                    </form>

                                </select>

                            </section>

                        <?php
         //perfil de redes
		          } else if ($rol_tec =='admin_r')

                  {



                  

	             ?>

                            <?php

                error_reporting(0);
                $sql ="SELECT nom_tec  FROM tecnico where area_tec like '%redes%'  ";
                $result_r=mysqli_query($conn, $sql);



									?>

                            <form action="pdf5.php" method="post">
                                <link rel="stylesheet" type="text/css" href="select2/select2.min.css">
                                <script
                                    src="https://code.jquery.com/jquery-3.3.1.js"
                                    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
                                    crossorigin="anonymous"></script>
                                <script src="select2/select2.min.js"></script>
                            </head>

                            <body>
                                <section>
                                    <select id="controlBuscador" style="width: 50%" name="result_r">
                                        <option disabled="disabled" selected="selected">Seleccione Funcionario</option>
                                        <?php while ($ver=mysqli_fetch_array($result_r)) {?>

                                        <option value="<?php echo $ver[0] ?>">
                                            <?php echo $ver[0] 
 
                  ?>

                                        </option>

                                        <?php  
         
        }
         
         
         ?>

                                    </select>
                                    <input type='submit' value='Generar Reporte'/>

                                </form>

                            </select>

                        </section>

                        <?php
         //perfil de redes
		          } 

                  
                



                  

	             ?>

                        <br>
                        <br>

                        <div>

                            <a href="excel_individual.php" class="btn btn-info add-new">
                                <i class="fas fa-hand-point-left"></i>
                                Generar XLS</a>

                            <a href="create.php" class="btn btn-info add-new">
                                <i class="fa fa-plus"></i>
                                Agregar Actividad</a>

                            <a href="login.php" class="btn btn-info add-new">
                                <i class="fas fa-hand-point-right"></i>
                                Salir</a </div>
                        </div>
                        <br>

                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th>FECHA
                                    </th>
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
                                        <a
                                            href="update.php?id_ticket=<?php echo $id_ticket;?>"
                                            class="edit"
                                            title="Editar"
                                            data-toggle="tooltip">
                                            <i class="material-icons">&#xE254;</i>
                                        </a>
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