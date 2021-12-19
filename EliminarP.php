<?php
include('db.php');
$clav=$_POST['clave'];
$codi=$_POST['cod'];

$consulta = "DELETE FROM intercambio where clave='$clav' and participante='$codi'";

if(mysqli_query($conexion, $consulta)){
    header("location:Intercambios.php");
} else{
    ?>
    <?php
    include("Intercambios.php");

  ?>
  <h1 class="bad">ERROR</h1>
  <?php
}

mysqli_close($conexion);