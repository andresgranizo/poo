<?php
 

  // Datos para conectar a la base de datos.
  $nombreServidor = "10.64.80.94";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "root";
  $nombreBaseDeDatos = "bitacora2";
 
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
  $conn->set_charset('utf8');
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
  
  // Consulta segura para evitar inyecciones SQL.
  
?>