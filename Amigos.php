<?php
include('db.php');
session_start();
$varsesion = $_SESSION['usuario'];
$consulta="SELECT * FROM usuarios where usuario='$varsesion'";
$rescon = $conexion->query($consulta);
$xd = $rescon->fetch_array(MYSQLI_BOTH);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intercambios.mx</title>
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="imagenes.css">
</head>

<body>

  <div class="menu-btn">
    <i class="fas fa-bars fa-2x"></i>
  </div>

  <div class="container">
    <!-- Navigation -->
    <nav class="nav-main">
      <img src="Intercambios.png" alt="Logo" width="20%">
      <!-- Left Nav -->
      <ul class="nav-menu">
        <li>
          <a href="Main.php">Inicio</a>
        </li>
        <li>
          <a href="Amigos.php">Amigos</a>
        </li>
        <li>
          <a href="Intercambios.php">Intercambios</a>
        </li>
        <li>
          <a href="index.html">Cerrar Sesión</a>
        </li>
      </ul>

      <!-- Right Nav -->
      <ul class="nav-menu-right">
        <li>
        </li>
      </ul>
    </nav>
    <hr>

    <div>
      <center>
        <img src="amigos.png" alt="Logo" width="30%">
        <h1>
        <?php
          $resultados = mysqli_query($conexion, "SELECT * FROM amigos where amigo2='$varsesion'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['amigo1'];
            echo "<br>";
          }
          $resultados = mysqli_query($conexion, "SELECT * FROM amigos where amigo1='$varsesion'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['amigo2'];
            echo "<br>";
          }
        ?>
        </h1>
      </center>
    </div>
    <div>
      <center>
        <img src="AgregarAmigos.png" alt="Logo" width="30%">
        <form action="codigo.php" method="post">
        <h1>Código: <input type="text" placeholder="Código de Amigo" name="kodi" required=""></h1>
        <input type="submit" value="Agregar">
        </form> 
      </center>
    </div>

    

    

    <!-- Follow -->
    <section class="social">
      <p>¡Redes Sociales!</p>
      <div class="links">
        <a href="https://www.facebook.com/">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.instagram.com/">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </section>
  </div>

  <!-- Scroll Reveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="main.js"></script>
</body>

</html>