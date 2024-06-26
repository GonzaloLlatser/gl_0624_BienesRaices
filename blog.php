<?php
// Vinculacion archivo de funciones
require './includes/funciones.php';
// Definicion de Variables
$inicio = true;
// Llama a la funcion incluirTemplate()
incluirTemplate("header");
?>
<!-- Main -->
<main class="contenedor seccion contenido-centrado">
  <h1>Nuestro Blog</h1>

  <!-- Articulo -->
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.webp" type="image/webp" />
        <source srcset="build/img/blog1.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu vivienda</h4>
        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin.</span></p>
        <p>
          Consejos para construir una terraza en el techo de tu hogar con
          los mejores meteriales y ahorrando dinero.
        </p>
      </a>
    </div>
  </article>
  <!-- Articulo -->
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog2.webp" type="image/webp" />
        <source srcset="build/img/blog2.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu vivienda</h4>
        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin.</span></p>
        <p>
          Consejos para construir una terraza en el techo de tu hogar con
          los mejores meteriales y ahorrando dinero.
        </p>
      </a>
    </div>
  </article>
  <!-- Articulo -->
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog3.webp" type="image/webp" />
        <source srcset="build/img/blog3.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog3.jpg" alt="Texto Entrada Blog" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu vivienda</h4>
        <p>Escrito el: <span>20/10/2023</span> por: <span>Admin.</span></p>
        <p>
          Consejos para construir una terraza en el techo de tu hogar con
          los mejores meteriales y ahorrando dinero.
        </p>
      </a>
    </div>
  </article>
  <!-- Articulo -->
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog4.webp" type="image/webp" />
        <source srcset="build/img/blog4.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/blog4.jpg" alt="Texto Entrada Blog" />
      </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu vivienda</h4>
        <p>Escrito el: <span>12/08/2023</span> por: <span>Admin.</span></p>
        <p>
          Consejos para construir una terraza en el techo de tu hogar con
          los mejores meteriales y ahorrando dinero.
        </p>
      </a>
    </div>
  </article>
</main>

<!-- Footer -->
<?php
include './includes/templates/footer.php';
?>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>