<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$correo = $_POST['correo'];
$confirmar = $_POST['confirmar'];

session_start();
$_SESSION['usuario']=$usuario;

if ($contraseña == $confirmar)
{
  $cifrado = md5($contraseña);

  $validar = "SELECT * FROM usuarios WHERE correo = '$correo' || usuario = '$usuario'";
  $validando = $conexion->query($validar);
  if($validando->num_rows>0){
    ?>
    <?php
    include("Registro.html");

  ?>
  <h1 class="bad">USUARIO O CORREO YA REGISTRADOS.</h1>
  <?php
    
  } else {
    $numeror = rand(5000,8000);
    $validar2 = "SELECT * FROM usuarios WHERE codigo = '$numeror'";
    $validando2 = $conexion->query($validar);
    if($validando->num_rows>0){

    } else {
      $query="INSERT INTO usuarios (id_usuario, usuario, contraseña, correo, token, codigo) VALUES (NULL, '$usuario', '$cifrado', '$correo', NULL, '$numeror')";
      $resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
      header("location:index.html");
    }
  }
} else {
  ?>
    <?php
    include("Registro.html");

  ?>
  <h1 class="bad">LAS CONTRASEÑAS NO COINCIDEN.</h1>
  <?php
}

mysqli_close($conexion);
