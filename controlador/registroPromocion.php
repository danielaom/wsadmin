<?php
  $ITEMS = $_POST['productos'];
  $CANTIDAD = $_POST['cantidad'];

  foreach ($ITEMS as $key => $value) {
    # code...
    echo "<br>valores: ".$value;
  }

  echo "<br>cantidad: ".$CANTIDAD;



?>
