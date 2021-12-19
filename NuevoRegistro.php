<?php
include('db.php');
$temas=$_POST['temas'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$comentarios = $_POST['comentarios'];
session_start();
$varsesion = $_SESSION['usuario'];
$varcod = $_SESSION['cod'];
$varid = $_SESSION['id'];

$numeror = rand(5000,8000);
$query="INSERT INTO intercambio VALUES ('$numeror', '$varcod', '$temas', '$monto', '$fecha', '$comentarios', '$varid')";
$resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
header("location:Intercambios.php");

mysqli_close($conexion);
