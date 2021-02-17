<?php 
if (isset($_GET['id_ticket'])){
	include('database.php');
	$registro = new Database();
	$id_ticket=intval($_GET['id_ticket']);
	$res = $registro->delete($id_ticket);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>