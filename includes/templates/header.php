<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raices</title>
  <!-- Vinculo hoja de estilos -->
  <link rel="stylesheet" href="/bienesraices/build/css/app.css" />
</head>

<body>
  <!-- Header -->
  <header class="header <?php echo $inicio == true ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
      <div class="barra">
        <!-- Logo principal -->
        <a href="index.php">
        <img src="/bienesraices/build/img/logo.svg" alt="Logo de Bienes Raices" />
        </a>
        <!-- Menu responsive  -->
        <div class="mobile-menu">
          <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive" />
        </div>
        <div class="derecha">
          <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="Icono DarkMode" />
          <!-- Barra de Navegacion -->
          <nav class="navegacion">
            <a href="nosotros.php">Nosotros</a>
            <a href="anuncios.php">Anuncios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.php">Contacto</a>
          </nav>
        </div>
      </div>
      <?php if ($inicio == true) { ?>
        <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
      <?php } ?>
    </div>
  </header>