<!-- Footer o Pié de Página -->
<footer class="footer seccion">
  <div class="contenedor contenedor-footer">
    <!-- Barra de Navegacion -->
    <!-- Barra de Navegacion -->
    <nav class="navegacion">
      <a href="nosotros.php">Nosotros</a>
      <a href="anuncios.php">Anuncios</a>
      <a href="blog.php">Blog</a>
      <a href="contacto.php">Contacto</a>
    </nav>
  </div>
  <!-- Año Actual -->
  <?php
  $fecha = date('Y');
  ?>
  <p class="copyright">Todos los derechos Reservados <?php echo $fecha ?> &copy;</p>
</footer>