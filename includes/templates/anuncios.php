<!-- PHP -->
<?php
// Importar conexion BBDD
require 'includes/config/database.php';
// - Llamo a la funcion conectarBD()
$db = conectarBD();
// Consultar la BBDD
$query = "SELECT * FROM propiedades LIMIT $limite";
// Obtener resultados
$resultado = mysqli_query($db, $query);
?>

<!-- Estructura html del anuncio -->
<div class="contenedor-anuncios">
  <!-- Leer resultados de la query ($resultados) -->
  <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>

    <!-- Anuncio -->
    <div class="anuncio">
      <!-- Propiedad- Imagen -->
      <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio-imagen">
      <div class="contenido-anuncio">
        <h3><?php echo $propiedad['titulo']; ?></h3>
        <p>
          <?php echo $propiedad['descripcion']; ?>
        </p>
        <p class="precio">€ <?php echo $propiedad['precio']; ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p><?php echo $propiedad['wc']; ?></p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p><?php echo $propiedad['estacionamiento']; ?></p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p><?php echo $propiedad['habitaciones']; ?></p>
          </li>
        </ul>
        <a href="./anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">VER PROPIEDAD</a>
      </div>
    </div>
  <?php endwhile; ?>
  <!-- Cierre de BBDD -->
  <?php mysqli_close($db);
 ?>
</div>