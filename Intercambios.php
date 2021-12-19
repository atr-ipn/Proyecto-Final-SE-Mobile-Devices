<?php
include('db.php');
session_start();
$varsesion = $_SESSION['usuario'];
$varcod = $_SESSION['cod'];
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

    <div>
      <center>
        <img src="CrearIntercambio.png" alt="Logo" width="30%">
        <h1>
        <?php
          $resultados = mysqli_query($conexion, "SELECT * FROM intercambio where participante='$varcod'");
          while($consulta = mysqli_fetch_array($resultados))
          {
            echo "Clave de Intercambio: ";
            echo $consulta['clave'];
            $clave = $consulta['clave'];
            echo "<br>";
            echo "Temas: ";
            echo $consulta['temas'];
            echo "<br>";
            echo "Monto Máximo: ";
            echo $consulta['monto'];
            echo "<br>";
            echo "Fecha: ";
            echo $consulta['fecha'];
            echo "<br>";
            echo "Comentarios: ";
            echo $consulta['comentarios'];
            echo "<br>";
            echo "Participantes: ";
            echo "<br>";
            $resultados2 = mysqli_query($conexion, "SELECT * FROM intercambio where clave='$clave'");
            while($consulta2 = mysqli_fetch_array($resultados2))
            {
              echo $consulta2['participante'];
              $kodi = $consulta2['participante'];
              echo " - ";
              $resultados3 = mysqli_query($conexion, "SELECT * FROM usuarios where codigo='$kodi'");
              while($consulta3 = mysqli_fetch_array($resultados3))
              {
               echo $consulta3['usuario'];
               echo "<br>";
              }
            }
            echo "<br>";
          }
          echo "<br>";
        ?>
        </h1>
      </center>
    </div>
    
    <div>
      <center>
        <img src="MisIntercambios.png" alt="Logo" width="30%">
      </center>
    </div>

    
      <center>
        <form action="NuevoRegistro.php" method="post">
          <h1>Temas: <input type="text" placeholder="ingrese temas" name="temas" required=""></h1>
          <h1>Monto: <input type="text" placeholder="ingrese monto máximo" name="monto" required=""></h1>
          <h1>Fecha: <input type="date" placeholder="ingrese fecha" name="fecha" required=""></h1>
          <h1>Comentarios: <input type="text" placeholder="comentarios adicionales" name="comentarios" required=""></h1>
          <input type="submit" value="Crear">
         </form>
      </center>
      <br>
      <br>
      <div>
      <center>
        <img src="Agregar.png" alt="Logo" width="30%">
        <form action="AgregarP.php" method="post">
          <h1>Clave de Intercambio: <input type="text" placeholder="ingrese clave" name="clave" required=""></h1>
          <h1>Código Participante: <input type="text" placeholder="ingrese código" name="cod" required=""></h1>
          <input type="submit" value="Agregar">
         </form>
      </center>
    </div>
    <br>
    <br>

    <div>
      <center>
        <img src="Eliminar.png" alt="Logo" width="30%">
        <form action="EliminarP.php" method="post">
          <h1>Clave de Intercambio: <input type="text" placeholder="ingrese clave" name="clave" required=""></h1>
          <h1>Código Participante: <input type="text" placeholder="ingrese código" name="cod" required=""></h1>
          <input type="submit" value="Eliminar">
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