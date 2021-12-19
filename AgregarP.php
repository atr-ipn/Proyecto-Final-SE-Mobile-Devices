<?php
include('db.php');
$clave=$_POST['clave'];
$codi=$_POST['cod'];
session_start();
$varsesion = $_SESSION['usuario'];
$varcod = $_SESSION['cod'];

$consulta="SELECT*FROM intercambio where clave='$clave'";
$rescon = $conexion->query($consulta);

if($rescon->num_rows>0){

    $resultados = mysqli_query($conexion, "SELECT * FROM intercambio where clave='$clave'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            $numeror = $consulta['clave'];
            $temas = $consulta['temas'];
            $monto = $consulta['monto'];
            $fecha = $consulta['fecha'];
            $comentarios = $consulta['comentarios'];
            $varid = $consulta['id_prop'];
          }
  
    $query="INSERT INTO intercambio VALUES ('$numeror', '$codi', '$temas', '$monto', '$fecha', '$comentarios', '$varid')";
    $resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
    header("location:Intercambios.php");

}else{
    ?>
    <?php
    include("Intercambios.php");

  ?>
  <h1 class="bad">ERROR</h1>
  <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);