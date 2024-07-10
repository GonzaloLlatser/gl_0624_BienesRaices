<?php
//  Vinculacion a la BBDD
require('includes/config/database.php');
// Llama a la función conectarDB()
$db = conectarBD();

// Array para Errores
$errores = [];

// Autentifica el Usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verifica datos introducidos
  // Definicion de variables
  $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
  $password = mysqli_real_escape_string($db, $_POST['password']);
  // Validacion de datos introducidos
  if (!$email) {
    $errores[] = "El email es obligatorio o no es válido";
  }
  if (!$password) {
    $errores[] = "El password es obligatorio o no es válido";
  }
  // Condicional de Datos
  if (empty($errores)) {
    // Verifica existencia del Usuario
    $query = "SELECT * FROM usuarios WHERE email= '$email';";
    // Almacena resultado
    $resultado = mysqli_query($db, $query);
    // Condicional de si existe el Usuario
    if ($resultado->num_rows) {
      // Verifica si el Password es correcto
      $usuario = mysqli_fetch_assoc($resultado);
      // - Crea Varaibale, utiliza password_verify() => devuelve true o false
      $auth = password_verify($password, $usuario['password']);
      if ($auth) {
        // El usuario esta autentificado
        // - Abrir sesion
        session_start();
        // - Completar el arreglo de la sesion
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = "true";
        //Redirecciono a la pag admin
        header('Location: admin/index.php');
        exit;
      } else {
        $errores[] = "El Password es incorrecto";
      }
    } else {
      $errores[] = "El Usuario no existe";
    }
  }
}

// Importa Header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<!-- Cuerpo de la vista  -->
<main class="contenedor seccion contenido-centrado">
  <h1>Iniciar Sesión</h1>
  <!-- Errores de datos introducidos -->
  <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>

  <!-- Formulario  -->
  <form method="POST" class="formulario">
    <fieldset>
      <legend>Email y Password</legend>
      <label for="email">E-mail</label>
      <input type="email" name="email" placeholder="Tu Email" id="email" required />
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Tu Password" id="password" required />
    </fieldset>
    <input type="submit" value="Iniciar Sesión " class="boton boton-verde">
  </form>
</main>

<?php
// Importa Footer
incluirTemplate('footer');
?>