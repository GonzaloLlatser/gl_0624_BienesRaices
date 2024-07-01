<!-- Footer o Pié de Página -->
<footer class="footer seccion">
  <div class="contenedor contenedor-footer">
    <!-- Barra de Navegacion -->
    <nav class="navegacion">
      <a href="/nosotros.html">Nosotros</a>
      <a href="/anuncios.html">Anuncios</a>
      <a href="/blog.html">Blog</a>
      <a href="/contacto.html">Contacto</a>
    </nav>
  </div>
  <!-- Año Actual -->
  <?php
  $fecha = date('Y');
  ?>
  <p class="copyright">Todos los derechos Reservados <?php echo $fecha ?> &copy;</p>
</footer>