<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$descifrado = md5($contraseña);

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$descifrado'";
$rescon = $conexion->query($consulta);
$xd = $rescon->fetch_array(MYSQLI_BOTH);
$dx = $xd['id_usuario'];
$_SESSION ['id']= $dx;
$_SESSION ['cod'] = $xd['codigo'];


if($rescon->num_rows>0){
  
    header("location:Main.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
