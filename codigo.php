<?php
include('db.php');
$codi=$_POST['kodi'];
session_start();
$varsesion = $_SESSION['usuario'];
$consulta="SELECT usuario FROM usuarios where codigo='$codi'";
$rescon = $conexion->query($consulta);
$xd = $rescon->fetch_array(MYSQLI_BOTH);
$dx = $xd['usuario'];
if($rescon->num_rows>0){
  $query="INSERT INTO amigos (id_amigos, amigo1, amigo2) VALUES (NULL, '$dx', '$varsesion')";
  $resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
  header("location:Amigos.php");  
} else {

  ?>
  <?php
  include("Amigos.php");

?>
<h1 class="bad">USUARIO NO EXISTE.</h1>
<?php
  
}

mysqli_free_result($resultado);
mysqli_close($conexion);