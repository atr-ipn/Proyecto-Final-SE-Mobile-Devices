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

     <!-- NEWS CARDS -->
     <div class="news-cards">
      <div>
        <img src="regaloperfil.jpg" alt="" width="80%" />
        <h1>¡Bienvenid@ <?php echo $_SESSION['usuario'] ?>!</h1>
        <h1>
          CÓDIGO DE USUARIO: <?php 
          
          echo $xd['codigo'];

          ?>
        </h1>
      </div>
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