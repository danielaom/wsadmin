<?php
class conexion{
	function conectar(){ //funcion para conectar a la base de datos
		return mysqli_connect("localhost","root","");
	}
}
?>
