<?php
session_start();

// Si ya está logueado, redirigir al index
if(isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

// Procesar registro si se envió el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $userType = $_POST['userType'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    
    // Validaciones básicas
    $errors = [];
    
    if(empty($firstName) || empty($lastName) || empty($email) || empty($userType) || empty($password)) {
        $errors[] = "Todos los campos son obligatorios";
    }
    
    if($password !== $confirmPassword) {
        $errors[] = "Las contraseñas no coinciden";
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El email no es válido";
    }
    
    // Verificar si el email ya existe
    $usuarios = json_decode(file_get_contents('data/usuarios.json'), true) ?? [];
    foreach($usuarios as $usuario) {
        if($usuario['email'] === $email) {
            $errors[] = "El email ya está registrado";
            break;
        }
    }
    
    if(empty($errors)) {
        // Crear directorio data si no existe
        if(!is_dir('data')) {
            mkdir('data', 0755, true);
        }
        
        // Crear nuevo usuario
        $nuevoUsuario = [
            'id' => uniqid(),
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'userType' => $userType,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'fechaRegistro' => date('Y-m-d H:i:s')
        ];
        
        $usuarios[] = $nuevoUsuario;
        file_put_contents('data/usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));
        
        // Redirigir a login
        header('Location: login.php?registro=exitoso');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Ganadero - Registro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="img/Imagen1.ico" type="image/x-icon">
    <link rel="icon" href="img/Imagen1.ico" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="img/Imagen1.ico" sizes="180x180">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="index.php" class="logo-link">
                <img src="img/logo.png" alt="Agro Ganadero Logo" class="logo-img">
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

    <main class="register-main">
        <div class="register-container">
            <div class="register-card">
                <div class="register-header">
                    <h2>Crear Cuenta</h2>
                    <p>Únete a Agro Ganadero y accede a todos nuestros servicios</p>
                </div>
                
                <form id="registerForm" class="register-form" action="api/register.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">Nombres</label>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="firstName" name="firstName" required placeholder="Ej: Juan Carlos">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="lastName">Apellidos</label>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                                <input type="text" id="lastName" name="lastName" required placeholder="Ej: Lopez Garcia ">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" required placeholder="tu@email.com">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="userType">Tipo de Usuario</label>
                        <div class="input-icon">
                            <select id="userType" name="userType" required>
                                <option value="" disabled selected>Selecciona tu rol</option>
                                <option value="encargado">Encargado</option>
                                <option value="administrador">Administrador</option>
                                <option value="veterinario">Veterinario</option>
                                <option value="ordeñador">Ordeñador</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" required placeholder="••••••••">
                            
                        </div>
                        <div class="password-strength">
                            <div class="strength-meter">
                                <div class="strength-bar"></div>
                            </div>
                            <span class="strength-text">Seguridad: <span id="strengthLevel">Débil</span></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">Confirmar Contraseña</label>
                        <div class="input-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="••••••••">
                            <button type="button" class="toggle-password" aria-label="Mostrar contraseña">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" class="password-feedback"></div>
                    </div>
                    
                    <div class="form-group terms">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Acepto los <a href="#">Términos de Servicio</a> y <a href="#">Política de Privacidad</a></label>
                    </div>
                    
                    <button type="submit" class="register-button">Registrarse</button>
                    
                    <div class="login-link">
                        ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>
                    </div>
                </form>
            </div>
            
            <div class="register-benefits">
                <h3>Beneficios de Registrarte</h3>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Acceso completo al sistema de gestión</li>
                    <li><i class="fas fa-check-circle"></i> Dashboard personalizado según tu rol</li>
                    <li><i class="fas fa-check-circle"></i> Reportes y estadísticas en tiempo real</li>
                    <li><i class="fas fa-check-circle"></i> Soporte técnico prioritario</li>
                    <li><i class="fas fa-check-circle"></i> Notificaciones importantes</li>
                </ul>
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