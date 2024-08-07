<!-- PHP -->
<?php
// Importo clases
use App\Propiedad;


// Codiciona, evalua quien hace la llamada
if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
  // Enseño todas las Propiedades
  $propiedades = Propiedad::all();
} else {
  // Enseño u numero finito de Propiedad
  $propiedades = Propiedad::get(3);
}
?>

<!-- Estructura html del anuncio -->
<div class="contenedor-anuncios">
  <!-- Leer resultados de la query ($resultados) -->
  <?php foreach ($propiedades as $propiedad) { ?>
    <!-- Anuncio -->
    <div class="anuncio">
      <!-- Propiedad- Imagen -->
      <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio-imagen">

      <div class="contenido-anuncio">
        <h3><?php echo $propiedad->titulo; ?></h3>
        <p><?php echo $propiedad->descripcion; ?></p>
        <p class="precio">€ <?php echo $propiedad->precio; ?></p>
        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p><?php echo $propiedad->wc; ?></p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p><?php echo $propiedad->estacionamiento; ?></p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p><?php echo $propiedad->habitaciones; ?></p>
          </li>
        </ul>
        <a href="./anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">VER PROPIEDAD</a>
      </div>
    </div>
  <?php }; ?>
</div>