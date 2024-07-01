<?php
$inicio = true;
include './includes/templates/header.php'
?>
<!-- Main -->
<main class="contenedor seccion">
  <h1>Más sobre Nosotros</h1>
  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono A Tiempo" loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Lorem Ipsum is simply dummy text of the printing and typesetting
        industry. Lorem Ipsum has been the industry's standard dummy text
        ever since the 1500s, when an unknown printer took a galley of type
        and scrambled it to make a type specimen book.
      </p>
    </div>
  </div>
</main>
<!-- Seccion Anuncios -->
<section class="seccion contenedor">
  <h2>Casas y Pisos en Venta</h2>
  <div class="contenedor-anuncios">
    <!-- Anuncio -->
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio1.webp" type="image/webp" />
        <source srcset="build/img/anuncio1.jpg" type="image/jpeg" />
        <img loading="lazy" alt="build/img/anuncio1.jpg" alt="anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa de Lujo en el Lago</h3>
        <p>
          Casa en el lago con excelente vista, acabados de lujo a un
          excelente precio
        </p>
        <p class="precio">€ 480.000</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p>3</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p>4</p>
          </li>
        </ul>
        <a href="anuncios.html" class="boton-amarillo-block">VER PROPIEDAD</a>
      </div>
    </div>
    <!-- Anuncio -->
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio2.webp" type="image/webp" />
        <source srcset="build/img/anuncio2.jpg" type="image/jpeg" />
        <img loading="lazy" alt="build/img/anuncio2.jpg" alt="anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa estilo Modernista</h3>
        <p>
          Casa en el lago con excelente vista, acabados de lujo a un
          excelente precio
        </p>
        <p class="precio">€ 720.500</p>
        <ul class="iconos-caracteristicas">
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc" />
            <p>4</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p>5</p>
          </li>
          <li>
            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" />
            <p>4</p>
          </li>
        </ul>
        <a href="anuncios.html" class="boton-amarillo-block">VER PROPIEDAD</a>
      </div>
    </div>
    <!-- Anuncio -->
    <div class="anuncio">
      <picture>
        <source srcset="build/img/anuncio3.webp" type="image/webp" />
        <source srcset="build/img/anuncio3.jpg" type="image/jpeg" />
        <img loading="lazy" alt="build/img/anuncio3.jpg" alt="anuncio" />
      </picture>
      <div class="contenido-anuncio">
        <h3>Casa con piscina</h3>
        <p>
          Casa en el lago con excelente vista, acabados de lujo a un
          excelente precio
        </p>
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
        <a href="anuncios.html" class="boton-amarillo-block">VER PROPIEDAD</a>
      </div>
    </div>
  </div>
  <div class="alinear-derecha">
    <a href="anuncios.html" class="boton-verde">Ver todas</a>
  </div>
</section>

<!-- Seccion Contactar -->
<section class="imagen-contacto">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Completa el formulario de contacto y un asesor se pondrá en contacto
    contigo a la brevedad
  </p>
  <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
</section>

<!-- Seccion Blog & Testimonios -->
<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>
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
          <p class="informacion-meta">
            Escrito el: <span>20/10/2023</span> por: <span>Admin.</span>
          </p>
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
          <h4>Guía para la decoración de tu vivienda</h4>
          <p class="informacion-meta">
            Escrito el: <span>20/10/2023</span> por: <span>Admin.</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guia, aprende a
            combinar muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
  </section>
  <!-- Testimonio -->
  <section class="testimoniales">
    <h3>Testimonios</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comportó de una excelente forma, muy buena atención y
        la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>
      <p>- Marta Suarez</p>
    </div>
  </section>
</div>

<!-- Footer -->
<?php
include './includes/templates/footer.php';
?>

<!-- Vinculo Js -->
<script src="./build/js/bundle.min.js"></script>
</body>

</html>