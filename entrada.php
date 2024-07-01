<?php
include './includes/templates/header.php'
?>
<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Guía para la decoración de tu hogar</h1>
  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad" />
  </picture>
  <p class="informacion-meta">
    Escrito el: <span>20/10/2023</span> por: <span>Admin.</span>
  </p>

  <div class="resumen-propiedad">
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