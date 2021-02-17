<?php
include './conn.php';
  session_start();
  
  // Obtengo los datos cargados en el formulario de login.
  $usuario = $_POST['usuario'];
  $clave = $_POST['clave'];
  
  // Datos para conectar a la base de datos.
  
  
  // Consulta segura para evitar inyecciones SQL.
  $sql = "SELECT ced_tec , clav_tec ,nom_tec, id_tecnico, area_tec , rol_tec FROM tecnico  where clav_tec='$clave'  AND ced_tec='$usuario' ";
 
  
  $result = mysqli_query($conn, $sql);


$usuario2 = "";
$clave2 = "";
$nombre ="";
$roltec="";


while ($row = mysqli_fetch_array($result)) {

    $usuario2 = $row['ced_tec']; //para validar q exista algun regsitro
    $clave2 = $row['clav_tec'];
    $nombre= $row ['nom_tec'];
    $id_tecnico2=$row['id_tecnico'];
    $area_tec2=$row['area_tec'];
    $rol_tec=$row['rol_tec'];
}


if ($usuario2 == "" && $clave2 == "" && $nombre=="") {

//    header("location:index.php");
    header("location:login.php?fallo=true");
} else {
    $_SESSION['username'] = $nombre;
    $_SESSION['cedula'] =$usuario2;
    $_SESSION['id_tecnico'] =$id_tecnico2;
    $_SESSION['area_tec'] =$area_tec2;
    $_SESSION['rol_tec'] =$rol_tec;



    header("location:index.php");




}

mysqli_close($conn);
?>