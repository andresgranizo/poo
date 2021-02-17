<?php



        //$cedula=
        
       

	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	class Database{
		

		private $con;
		private $dbhost="10.64.80.94";
		private $dbuser="root";
		private $dbpass="root";
		private $dbname="bitacora2";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
			$this->con->set_charset('utf8');

		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}


		public function create($fecha,$hora_fin,$tiempo_utilizado,$id_servicios,$nombre_actividad,$descripcion,$id_tecnico,$hola){
			$hola = "registro(fecha,hora_inicio,hora_fin,tiempo_utilizado, id_servicios,nombre_actividad,descripcion,id_tecnico)";
			echo $hola;
			//$sql = "INSERT INTO registro(fecha,hora_inicio,hora_fin,tiempo_utilizado, id_servicios,nombre_actividad,descripcion,id_tecnico) 
			//VALUES (CURDATE(),CURTIME(),'$hora_fin', '$tiempo_utilizado','$id_servicios','$nombre_actividad','$descripcion','$id_tecnico')";

			$res = mysqli_query($this->con, $hola);
			if($res){
				return true;
			}else{
				return false;
			}
		}


		public function read(){
			include './conn.php';

			$id_tecnico2 = $_SESSION['id_tecnico'];
		
			$sql = "SELECT * FROM registro WHERE id_tecnico = '$id_tecnico2' AND fecha = (CURDATE())";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		
		
		public function single_record($id_ticket){
			$sql = "SELECT * FROM registro where id_ticket='$id_ticket'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}


		public function update($id_ticket,$hora_fin,$tiempo_utilizado,$nombre_actividad,$descripcion){
			$sql = "UPDATE registro SET hora_fin='$hora_fin', tiempo_utilizado='$tiempo_utilizado', tiempo_utilizado='$tiempo_utilizado', nombre_actividad='$nombre_actividad',
			 nombre_actividad='$nombre_actividad', descripcion='$descripcion'
			WHERE id_ticket=$id_ticket";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_ticket){
			$sql = "DELETE FROM registro WHERE id_ticket=$id_ticket";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

