
<?php
class conexion{
		function conectar(){
return mysqli_connect("localhost","root","","restaurante");

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
}
}
?>
