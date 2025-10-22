<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agro Ganadero</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="icon" href="img/Imagen1.ico" type="image/x-icon" />
    <link rel="icon" href="img/Imagen1.ico" type="image/png" sizes="32x32" />
    <link rel="apple-touch-icon" href="img/Imagen1.ico" sizes="180x180" />

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
        <nav class="main-nav" style="background: white">
          <ul>
            <li><a href="agro-vacuno.php">AgroVacuno</a></li>
            <li><a href="agro-bufalino.php">AgroBufalino</a></li>
            <li><a href="agro-cultivo.php">AgroAgricultivo</a></li>
            <li><a href="agro-inventario.php">AgroInventario</a></li>
            <li><a href="agro-empleados.php">AgroEmpleados</a></li>
            
            <?php if(isset($_SESSION['usuario'])): ?>
            <li class="user-info">
              <span class="user-name">
                <i class="fas fa-user"></i>
                <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>
              </span>
              <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
            </li>
            <?php else: ?>
            <li class="login"><a href="login.php">Iniciar Sesión</a></li>
            <li class="register"><a href="register.php">Registrarse</a></li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>

    <section class="carousel-container">
      <div class="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/vacuno.png" alt="Imagen 1 de ganadería" />
            <div class="carousel-caption">
              <h3>Agro Vacuno</h3>
              <p>La mejor calidad en crianza de ganado bovino</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/bufalos.jpg" alt="Imagen 2 de ganadería" />
            <div class="carousel-caption">
              <h3>Agro Bufalino</h3>
              <p>Especialistas en producción bufalina</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/cultivo.jpg" alt="Imagen 3 de ganadería" />
            <div class="carousel-caption">
              <h3>Agro Agricultivo</h3>
              <p>Cultivos de alta productividad</p>
            </div>
          </div>
        </div>
        <button class="carousel-control prev" aria-label="Anterior">
          &#10094;
        </button>
        <button class="carousel-control next" aria-label="Siguiente">
          &#10095;
        </button>
        <div class="carousel-indicators"></div>
      </div>
    </section>

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
              <li><a href="index.php">Inicio</a></li>
              <li><a href="agro-vacuno.php">Agro Vacuno</a></li>
              <li><a href="agro-bufalino.php">Agro Bufalino</a></li>
              <li><a href="agro-cultivo.php">Agro Agricultivo</a></li>
              <li><a href="agro-inventario.php">Agro Inventario</a></li>
              <li><a href="agro-empleados.php">Agro Empleados</a></li>

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
  </body>

  <footer>
    <div class="footer-container">
      <p>© 2025 Agro Ganadero. Todos los derechos reservados.</p>
      <p>Desarrollado por Levi Danieli, Reymond Rendiles y Mario Ramos</p>
    </div>
  </footer>

  <script src="script.js"></script>
</html>
