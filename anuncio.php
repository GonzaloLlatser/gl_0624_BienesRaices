<?php
include './includes/templates/header.php'
?>
<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Casa en Venta frente al Parque</h1>
  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la propiedad" />
  </picture>
  <div class="resumen-propiedad">
    <p class="precio">€ 367.200</p>
    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
        <p>4</p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p>2</p>
      </li>
      <li>
        <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
        <p>3</p>
      </li>
    </ul>

    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever
      since the 1500s, when an unknown printer took a galley of type and
      scrambled it to make a type specimen book.
    </p>
    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting
      industry. Lorem Ipsum has been the industry's standard dummy text ever
      since the 1500s, when an unknown printer took a galley of type and
      scrambled it to make a type specimen book.
    </p>
  </div>
</main>

<!-- Pié de Página -->
<footer class="footer seccion">
  <div class="contenedor contenedor-footer">
    <!-- Barra de Navegacion -->
    <nav class="navegacion">
      <a href="nosotros.html">Nosotros</a>
      <a href="anuncios.html">Anuncios</a>
      <a href="blog.html">Blog</a>
      <a href="contacto.html">Contacto</a>
    </nav>
  </div>
  <p class="copyright">Todos los derechos Reservados 2024 &copy;</p>
</footer>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>