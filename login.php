<?php 
session_start();

// Si ya está logueado, redirigir al index
if(isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

// Procesar login si se envió el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Aquí deberías validar contra una base de datos
    // Por ahora usaremos una validación simple de ejemplo
    $usuarios = json_decode(file_get_contents('data/usuarios.json'), true) ?? [];
    
    foreach($usuarios as $usuario) {
        if($usuario['email'] === $email && password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['firstName'] . ' ' . $usuario['lastName'],
                'email' => $usuario['email'],
                'tipo' => $usuario['userType']
            ];
            
            header('Location: index.php');
            exit();
        }
    }
    
    $error = "Credenciales incorrectas";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agro Ganadero - Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="icon" href="img/Imagen1.ico" type="image/x-icon" />
</head>
<body>
    <header>
        <div class="header-container">
            <a href="index.php" class="logo-link">
                <img src="img/logo.png" alt="Agro Ganadero Logo" class="logo-img" />
            </a>
            <button class="mobile-menu-toggle" aria-label="Menú">
                <i class="fas fa-bars"></i>
            </button>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li class="login"><a href="login.php">Iniciar Sesión</a></li>
                    <li class="register"><a href="register.php">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="login-main">
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h2>Iniciar Sesión</h2>
                    <p>Accede a tu cuenta de Agro Ganadero</p>
                </div>

                <?php if(isset($error)): ?>
                    <div class="alert alert-error"><?php echo $error; ?></div>
                <?php endif; ?>

               <form id="loginForm" class="login-form" action="api/login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                placeholder="tu@email.com"
                                value="<?php echo $_POST['email'] ?? ''; ?>"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                placeholder=""
                            />
                            <button
                                type="button"
                                id="togglePassword"
                                class="toggle-password"
                                aria-label="Mostrar contraseña"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember" /> Recordar sesión
                        </label>
                        <a href="forgot-password.php" class="forgot-password"
                            >¿Olvidaste tu contraseña?</a
                        >
                    </div>

                    <button type="submit" class="login-button">Iniciar Sesión</button>

                    <div class="register-link">
                        ¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a>
                    </div>
                </form>
            </div>

            <div class="login-info">
                <h3>Beneficios de tu cuenta</h3>
                <ul>
                    <li>
                        <i class="fas fa-check-circle"></i> Acceso al sistema de gestión
                        agropecuaria
                    </li>
                    <li>
                        <i class="fas fa-check-circle"></i> Historial de tus actividades
                    </li>
                    <li><i class="fas fa-check-circle"></i> Reportes personalizados</li>
                    <li><i class="fas fa-check-circle"></i> Soporte prioritario</li>
                    <li>
                        <i class="fas fa-check-circle"></i> Notificaciones importantes
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <main>
      <div class="content-container">
        <div class="footer-sections">
          <section class="contact-info">
            <h3>Información de Contacto</h3>
            <p><strong>Agro Ganadero</strong></p>
            <p>localidad: Municipio Rosario de Perijá del Estado Zulia</p>
            <p>Teléfono: +58 412-6834089</p>
            <p>Email: contacto@agroganadero.com</p>
            <p>Horario: Lunes a Viernes 8:00 AM - 5:00 PM</p>
          </section>

          <section class="quick-links">
            <h3>Enlaces Rápidos</h3>
            <ul>
              <li><a href="index.html">Inicio</a></li>

              <li><a href="#">Contactanos</a></li>
              <li><a href="#">Políticas de Privacidad</a></li>
            </ul>
          </section>

          <section class="account-access">
            <h3>Acceso a Cuenta</h3>
            <ul>
              <li><a href="login.php">Iniciar Sesión</a></li>
              <li><a href="register.php">Registrarse</a></li>
              <li><a href="#">Recuperar Contraseña</a></li>
            </ul>
          </section>

          <section class="social-media">
            <h3>Redes Sociales</h3>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </section>
        </div>
      </div>
    </main>

    <footer>
      <div class="footer-container">
        <p>© 2025 Agro Ganadero. Todos los derechos reservados.</p>
        <p>Desarrollado por Levi Danieli, Reymond Rendiles y Mario Ramos</p>
      </div>
    </footer>

    <script src="script.js"></script>
  </body>
</html>
