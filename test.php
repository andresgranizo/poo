<?php 
    include "database.php";
    

    $link = mysqli_connect("10.64.80.94", "root", "root");
    mysqli_select_db($link, "bitacora2");


    $sql = "INSERT INTO registro (fecha,hora_inicio,hora_fin,tiempo_utilizado, id_servicios,nombre_actividad,descripcion,id_tecnico) 
    VALUES (CURDATE(),CURTIME(),CURTIME(),CURTIME(),5,'PRUEBA INSERT',' HOLA PRUEBA ',12);";
    if ($link->query($sql) === TRUE) {
      echo "OK";      
    }else {
      echo "ERROR";
    }
    mysqli_close($link);
    
        ?>


