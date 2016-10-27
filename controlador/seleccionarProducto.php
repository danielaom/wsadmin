<?php
include_once("../BD/conexion.php");
$cnn= new conexion();
$con =$cnn->conectar();
mysqli_select_db($con,"restaurante");

  if($_POST['id']){
    $id=$_POST['id'];
    $query = "SELECT * FROM producto WHERE categoriaIdCategoria = '$id'";

    $sql=mysqli_query($con, $query);
    $tam=mysqli_num_rows($sql);
    while($row=mysqli_fetch_array($sql)):

      echo "tam: ".$tam;
?>
    <div class="container">
       <?php
            $x = 0;
            $y = 0;
            while($y <= 10) {
                if ($x % 1 == 0) {
                   echo "<br />";
                   $x = 0;
                }
                echo "<img width='120px' height='120px' src=".$row['imagen'].">";
                $x++;
                $y++;
            }
            ?>
    </div>






<?php
endwhile;
     }

  ?>
