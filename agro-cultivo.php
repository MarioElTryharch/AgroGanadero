<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrobufalino22";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesar formulario de nuevo cultivo
// Procesar formulario de nuevo cultivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'nuevo_cultivo') {
    
    // Depuración: mostrar datos recibidos
    error_log("Datos recibidos: " . print_r($_POST, true));
    
    $nombre = $_POST['nombre'] ?? '';
    $variedad = $_POST['variedad'] ?? '';
    $area = $_POST['area'] ?? 0;
    $lote = $_POST['lote'] ?? '';
    $fecha_siembra = $_POST['fecha_siembra'] ?? '';
    $fecha_cosecha = $_POST['fecha_cosecha'] ?? null;
    $notas = $_POST['notas'] ?? '';

    // Validar datos requeridos
    if (empty($nombre) || empty($variedad) || empty($area) || empty($lote) || empty($fecha_siembra)) {
        echo json_encode(['success' => false, 'message' => 'Faltan campos requeridos']);
        exit;
    }

    try {
        $stmt = $conn->prepare("INSERT INTO cultivos (nombre, variedad, area, lote, fecha_siembra, fecha_cosecha_estimada, notas) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($fecha_cosecha === '') {
            $fecha_cosecha = null;
        }
        
        $stmt->bind_param("ssdssss", $nombre, $variedad, $area, $lote, $fecha_siembra, $fecha_cosecha, $notas);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Cultivo guardado exitosamente']);
        } else {
            throw new Exception($stmt->error);
        }
    } catch (Exception $e) {
        error_log("Error en la consulta: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Error en la base de datos: ' . $e->getMessage()]);
    }
    exit;
}
// ... el resto de tu código PHP ...


// Obtener estadísticas
function obtenerEstadisticas($conn) {
    $stats = [
        'cultivos_activos' => 0,
        'area_cultivada' => 0,
        'proximas_cosechas' => 0,
        'rendimiento_promedio' => 0
    ];
    
    // Cultivos activos
    $result = $conn->query("SELECT COUNT(*) as total FROM cultivos WHERE estado = 'activo'");
    if ($result) {
        $row = $result->fetch_assoc();
        $stats['cultivos_activos'] = $row['total'];
    }
    
    // Área cultivada
    $result = $conn->query("SELECT SUM(area) as total_area FROM cultivos WHERE estado = 'activo'");
    if ($result) {
        $row = $result->fetch_assoc();
        $stats['area_cultivada'] = $row['total_area'] ?: 0;
    }
    
    // Próximas cosechas (en los próximos 30 días)
    $result = $conn->query("SELECT COUNT(*) as total FROM cultivos WHERE fecha_cosecha_estimada BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND estado = 'activo'");
    if ($result) {
        $row = $result->fetch_assoc();
        $stats['proximas_cosechas'] = $row['total'];
    }
    
    return $stats;
}

// Obtener cultivos para la tabla
// Obtener cultivos para la tabla
function obtenerCultivos($conn, $busqueda = '') {
    $cultivos = [];
    $sql = "SELECT * FROM cultivos WHERE estado = 'activo'"; // Solo mostrar activos
    
    if (!empty($busqueda)) {
        $sql .= " AND (nombre LIKE ? OR variedad LIKE ? OR lote LIKE ?)";
    }
    
    $sql .= " ORDER BY fecha_siembra DESC";
    
    if (!empty($busqueda)) {
        $stmt = $conn->prepare($sql);
        $busqueda_like = "%$busqueda%";
        $stmt->bind_param("sss", $busqueda_like, $busqueda_like, $busqueda_like);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = $conn->query($sql);
    }
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $cultivos[] = $row;
        }
    }
    
    return $cultivos;
}

// Obtener datos
$stats = obtenerEstadisticas($conn);
$busqueda = $_GET['busqueda'] ?? '';
$cultivos = obtenerCultivos($conn, $busqueda);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agro Ganadero - AgroAgricultivo</title>
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
            <li class="active">
              <a href="agro-cultivo.php">AgroAgricultivo</a>
            </li>
            <li><a href="agro-inventario.php">AgroInventario</a></li>
            <li><a href="agro-empleados.php">AgroEmpleados</a></li>

            <li class="login"><a href="login.php">Iniciar Sesión</a></li>
            <li class="register"><a href="register.php">Registrarse</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="agricultivo-container">
      <!-- Encabezado de la página -->
      <div class="agricultivo-header">
        <h1><i class="fas fa-leaf"></i> AgroAgricultivo</h1>
        <div class="agricultivo-actions">
          <button class="btn btn-primary" id="btnNuevoCultivo">
            <i class="fas fa-plus"></i> Nuevo Cultivo
          </button>
          <button class="btn btn-secondary" id="btnReportes">
            <i class="fas fa-file-alt"></i> Generar Reporte
          </button>
        </div>
      </div>

      <!-- Menú de secciones acordeón -->
      <div class="agricultivo-menu">
        <!-- Sección 1: Gestión de Cultivos -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-seedling"></i> Gestión de Cultivos
            <i class="fas fa-caret-down"></i>
          </h2>
          <div class="menu-content">
            <!-- Tarjetas de resumen -->
            <div class="data-cards">
              <div class="data-card">
                <h3>Cultivos Activos</h3>
                <p class="data-value"><?php echo $stats['cultivos_activos']; ?></p>
              </div>
              <div class="data-card highlight">
                <h3>Área Cultivada (Ha)</h3>
                <p class="data-value"><?php echo number_format($stats['area_cultivada'], 1); ?></p>
              </div>
              <div class="data-card">
                <h3>Próximas Cosechas</h3>
                <p class="data-value"><?php echo $stats['proximas_cosechas']; ?></p>
              </div>
              <div class="data-card">
                <h3>Rendimiento Promedio</h3>
                <p class="data-value"><?php echo number_format($stats['rendimiento_promedio'], 1); ?> t/Ha</p>
              </div>
            </div>

            <!-- Filtros y búsqueda -->
            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-filter"></i> Filtros</h2>
                <div class="section-actions">
                    <div class="search-filter">
                      <form method="GET" action="" id="formBusqueda">
                          <input type="text" name="busqueda" placeholder="Buscar cultivo..." value="<?php echo htmlspecialchars($busqueda); ?>" />
                          <button type="submit" class="btn btn-primary btn-filter">
                              <i class="fas fa-search"></i>
                          </button>
                      </form>
                  </div>
                  <button class="btn btn-outline">
                    <i class="fas fa-sync-alt"></i> Actualizar
                  </button>
                </div>
              </div>

<div class="table-container">
    <table class="data-table">
        <thead>
            <tr>
                <th>Cultivo</th>
                <th>Variedad</th>
                <th>Área (Ha)</th>
                <th>Fecha Siembra</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($cultivos)): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No hay cultivos registrados</td>
                </tr>
            <?php else: ?>
                <?php foreach ($cultivos as $cultivo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cultivo['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($cultivo['variedad']); ?></td>
                    <td><?php echo number_format($cultivo['area'], 1); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($cultivo['fecha_siembra'])); ?></td>
                    <td>
                        <span class="status-badge <?php echo $cultivo['estado']; ?>">
                            <?php echo ucfirst($cultivo['estado']); ?>
                        </span>
                    </td>
                    <td>
                        <button class="btn-icon" title="Editar" onclick="editarCultivo(<?php echo $cultivo['id']; ?>)">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Eliminar" onclick="eliminarCultivo(<?php echo $cultivo['id']; ?>)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="table-footer">
        <span>Mostrando <?php echo count($cultivos); ?> cultivos</span>
    </div>
</div>
            </div>
          </div>
        <!-- Sección 2: Planificación Agrícola -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-calendar-alt"></i> Planificación Agrícola
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-tasks"></i> Calendario de Actividades</h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevaActividad">
                    <i class="fas fa-plus"></i> Nueva Actividad
                  </button>
                </div>
              </div>

              <!-- Calendario y actividades -->
              <div class="planning-grid">
                <div class="calendar-container">
                  <!-- Aquí iría un calendario interactivo -->
                  <div class="calendar-placeholder">
                    <i class="far fa-calendar-alt fa-4x"></i>
                    <p>Calendario de actividades agrícolas</p>
                  </div>
                </div>
                <div class="activities-list">
                  <h3><i class="fas fa-list"></i> Próximas Actividades</h3>
                  <ul class="activity-items">
                    <li>
                      <div class="activity-date">20/06/2025</div>
                      <div class="activity-desc">
                        Fertilización maíz - Lote 3
                      </div>
                      <div class="activity-actions">
                        <button class="btn-icon">
                          <i class="fas fa-check"></i>
                        </button>
                      </div>
                    </li>
                    <li>
                      <div class="activity-date">25/06/2025</div>
                      <div class="activity-desc">Control de plagas - Sorgo</div>
                      <div class="activity-actions">
                        <button class="btn-icon">
                          <i class="fas fa-check"></i>
                        </button>
                      </div>
                    </li>
                    <li>
                      <div class="activity-date">05/07/2025</div>
                      <div class="activity-desc">
                        Preparación terreno nuevo cultivo
                      </div>
                      <div class="activity-actions">
                        <button class="btn-icon">
                          <i class="fas fa-check"></i>
                        </button>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 3: Manejo de Suelos -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-mountain"></i> Manejo de Suelos
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="data-cards">
              <div class="data-card">
                <h3>Análisis de Suelos</h3>
                <p class="data-value">15</p>
              </div>
              <div class="data-card">
                <h3>Áreas con Deficiencias</h3>
                <p class="data-value">3</p>
              </div>
              <div class="data-card highlight">
                <h3>Último Análisis</h3>
                <p class="data-value">12/04/2025</p>
              </div>
            </div>

            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-flask"></i> Resultados de Análisis</h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevoAnalisis">
                    <i class="fas fa-plus"></i> Nuevo Análisis
                  </button>
                </div>
              </div>

              <!-- Gráficos o tablas de resultados -->
              <div class="soil-results">
                <div class="soil-chart-placeholder">
                  <i class="fas fa-chart-bar fa-4x"></i>
                  <p>Gráficos de análisis de suelos</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 4: Riego y Agua -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-tint"></i> Riego y Agua
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-water"></i> Programación de Riego</h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevoPrograma">
                    <i class="fas fa-plus"></i> Nuevo Programa
                  </button>
                </div>
              </div>

              <!-- Tabla de programas de riego -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Cultivo</th>
                      <th>Frecuencia</th>
                      <th>Duración</th>
                      <th>Método</th>
                      <th>Último Riego</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Maíz - Lote 1</td>
                      <td>Cada 3 días</td>
                      <td>2 horas</td>
                      <td>Aspersión</td>
                      <td>15/06/2025</td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>Pasto - Lote 3</td>
                      <td>Diario</td>
                      <td>1 hora</td>
                      <td>Goteo</td>
                      <td>16/06/2025</td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 5: Control de Plagas y Enfermedades -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-bug"></i> Control de Plagas
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="data-cards">
              <div class="data-card">
                <h3>Plagas Registradas</h3>
                <p class="data-value">7</p>
              </div>
              <div class="data-card highlight">
                <h3>Tratamientos Aplicados</h3>
                <p class="data-value">15</p>
              </div>
              <div class="data-card">
                <h3>Áreas Afectadas</h3>
                <p class="data-value">3</p>
              </div>
            </div>

            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-spray-can"></i> Registro de Aplicaciones
                </h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevoRegistro">
                    <i class="fas fa-plus"></i> Nuevo Registro
                  </button>
                </div>
              </div>

              <!-- Tabla de aplicaciones -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Cultivo</th>
                      <th>Plaga/Enfermedad</th>
                      <th>Producto</th>
                      <th>Dosis</th>
                      <th>Responsable</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>10/06/2025</td>
                      <td>Maíz</td>
                      <td>Gusano cogollero</td>
                      <td>Insecticida X</td>
                      <td>1.5 L/Ha</td>
                      <td>Juan Pérez</td>
                    </tr>
                    <tr>
                      <td>05/06/2025</td>
                      <td>Sorgo</td>
                      <td>Pulgón</td>
                      <td>Insecticida Y</td>
                      <td>0.8 L/Ha</td>
                      <td>María Gómez</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 6: Cosecha y Rendimientos -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-tractor"></i> Cosecha y Rendimientos
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-chart-line"></i> Historial de Cosechas</h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnRegistrarCosecha">
                    <i class="fas fa-plus"></i> Registrar Cosecha
                  </button>
                </div>
              </div>

              <!-- Gráficos y tablas de rendimiento -->
              <div class="harvest-stats">
                <div class="harvest-chart-placeholder">
                  <i class="fas fa-chart-pie fa-4x"></i>
                  <p>Estadísticas de rendimiento por cultivo</p>
                </div>

                <div class="table-container">
                  <table class="data-table">
                    <thead>
                      <tr>
                        <th>Cultivo</th>
                        <th>Fecha Cosecha</th>
                        <th>Área (Ha)</th>
                        <th>Producción (t)</th>
                        <th>Rendimiento (t/Ha)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Maíz</td>
                        <td>15/05/2025</td>
                        <td>10.0</td>
                        <td>38.5</td>
                        <td>3.85</td>
                      </tr>
                      <tr>
                        <td>Sorgo</td>
                        <td>20/04/2025</td>
                        <td>8.0</td>
                        <td>24.0</td>
                        <td>3.00</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 7: Inventario Agrícola -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-boxes"></i> Inventario Agrícola
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="data-cards">
              <div class="data-card">
                <h3>Insumos</h3>
                <p class="data-value">23</p>
              </div>
              <div class="data-card highlight">
                <h3>Bajo Stock</h3>
                <p class="data-value">5</p>
              </div>
              <div class="data-card">
                <h3>Agotados</h3>
                <p class="data-value">2</p>
              </div>
            </div>

            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-clipboard-list"></i> Control de Insumos
                </h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevoInsumo">
                    <i class="fas fa-plus"></i> Nuevo Insumo
                  </button>
                  <button class="btn btn-secondary">
                    <i class="fas fa-file-export"></i> Exportar
                  </button>
                </div>
              </div>

              <!-- Tabla de inventario -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Insumo</th>
                      <th>Tipo</th>
                      <th>Cantidad</th>
                      <th>Unidad</th>
                      <th>Último Movimiento</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Fertilizante NPK</td>
                      <td>Fertilizante</td>
                      <td>120</td>
                      <td>kg</td>
                      <td>10/06/2025</td>
                      <td>
                        <span class="status-badge active">Disponible</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Herbicida X</td>
                      <td>Agroquímico</td>
                      <td>5</td>
                      <td>L</td>
                      <td>05/06/2025</td>
                      <td>
                        <span class="status-badge maintenance">Bajo stock</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Semilla Maíz</td>
                      <td>Semilla</td>
                      <td>0</td>
                      <td>kg</td>
                      <td>20/05/2025</td>
                      <td>
                        <span class="status-badge inactive">Agotado</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

  <!-- Modal para nuevo cultivo -->
<div class="modal" id="modalNuevoCultivo">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-seedling"></i> Nuevo Cultivo</h3>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formNuevoCultivo">
                <input type="hidden" name="action" value="nuevo_cultivo">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="cultivoNombre">Nombre del Cultivo</label>
                        <input type="text" id="cultivoNombre" name="nombre" required />
                    </div>
                    <div class="form-group">
                        <label for="cultivoVariedad">Variedad</label>
                        <input type="text" id="cultivoVariedad" name="variedad" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="cultivoArea">Área (Ha)</label>
                        <input type="number" id="cultivoArea" name="area" step="0.1" required />
                    </div>
                    <div class="form-group">
                        <label for="cultivoLote">Lote/Ubicación</label>
                        <input type="text" id="cultivoLote" name="lote" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="cultivoFechaSiembra">Fecha de Siembra</label>
                        <input type="date" id="cultivoFechaSiembra" name="fecha_siembra" required />
                    </div>
                    <div class="form-group">
                        <label for="cultivoFechaCosecha">Fecha Estimada Cosecha</label>
                        <input type="date" id="cultivoFechaCosecha" name="fecha_cosecha" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="cultivoNotas">Notas/Observaciones</label>
                    <textarea id="cultivoNotas" name="notas" rows="3"></textarea>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary close-modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar Cultivo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Modales para AgroAgricultivo -->
    <!-- Modal para nuevo cultivo (ya existente) -->
    <div class="modal" id="modalNuevoCultivo">
      <!-- Contenido existente... -->
    </div>

    <!-- Modal para nueva actividad -->
    <div class="modal" id="modalNuevaActividad">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-calendar-plus"></i> Nueva Actividad Agrícola</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevaActividad">
            <div class="form-row">
              <div class="form-group">
                <label for="actividadTipo">Tipo de Actividad</label>
                <select id="actividadTipo" required>
                  <option value="">Seleccione...</option>
                  <option value="siembra">Siembra</option>
                  <option value="fertilizacion">Fertilización</option>
                  <option value="riego">Riego</option>
                  <option value="control_plagas">Control de Plagas</option>
                  <option value="cosecha">Cosecha</option>
                </select>
              </div>
              <div class="form-group">
                <label for="actividadFecha">Fecha</label>
                <input type="date" id="actividadFecha" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="actividadCultivo">Cultivo/Lote</label>
                <select id="actividadCultivo" required>
                  <option value="">Seleccione...</option>
                  <option value="maiz1">Maíz - Lote 1</option>
                  <option value="sorgo2">Sorgo - Lote 2</option>
                  <option value="pasto3">Pasto - Lote 3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="actividadResponsable">Responsable</label>
                <input type="text" id="actividadResponsable" required />
              </div>
            </div>

            <div class="form-group">
              <label for="actividadDescripcion">Descripción</label>
              <textarea id="actividadDescripcion" rows="3"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Actividad
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nuevo análisis de suelo -->
    <div class="modal" id="modalNuevoAnalisis">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-flask"></i> Nuevo Análisis de Suelo</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevoAnalisis">
            <div class="form-row">
              <div class="form-group">
                <label for="analisisLote">Lote/Ubicación</label>
                <input type="text" id="analisisLote" required />
              </div>
              <div class="form-group">
                <label for="analisisFecha">Fecha de Muestra</label>
                <input type="date" id="analisisFecha" required />
              </div>
            </div>

            <div class="form-group">
              <h4>Parámetros del Suelo</h4>
              <div class="form-row">
                <div class="form-group">
                  <label for="analisisPH">pH</label>
                  <input
                    type="number"
                    id="analisisPH"
                    step="0.1"
                    min="0"
                    max="14"
                  />
                </div>
                <div class="form-group">
                  <label for="analisisNitrogeno">Nitrógeno (ppm)</label>
                  <input type="number" id="analisisNitrogeno" step="0.1" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="analisisFosforo">Fósforo (ppm)</label>
                  <input type="number" id="analisisFosforo" step="0.1" />
                </div>
                <div class="form-group">
                  <label for="analisisPotasio">Potasio (ppm)</label>
                  <input type="number" id="analisisPotasio" step="0.1" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="analisisObservaciones">Observaciones</label>
              <textarea id="analisisObservaciones" rows="3"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Análisis
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nuevo programa de riego -->
    <div class="modal" id="modalNuevoRiego">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-tint"></i> Nuevo Programa de Riego</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevoRiego">
            <div class="form-row">
              <div class="form-group">
                <label for="riegoCultivo">Cultivo</label>
                <select id="riegoCultivo" required>
                  <option value="">Seleccione...</option>
                  <option value="maiz">Maíz</option>
                  <option value="sorgo">Sorgo</option>
                  <option value="pasto">Pasto</option>
                </select>
              </div>
              <div class="form-group">
                <label for="riegoLote">Lote</label>
                <input type="text" id="riegoLote" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="riegoMetodo">Método de Riego</label>
                <select id="riegoMetodo" required>
                  <option value="aspersion">Aspersión</option>
                  <option value="goteo">Goteo</option>
                  <option value="inundacion">Inundación</option>
                </select>
              </div>
              <div class="form-group">
                <label for="riegoFrecuencia">Frecuencia (días)</label>
                <input type="number" id="riegoFrecuencia" min="1" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="riegoDuracion">Duración (horas)</label>
                <input
                  type="number"
                  id="riegoDuracion"
                  step="0.5"
                  min="0.5"
                  required
                />
              </div>
              <div class="form-group">
                <label for="riegoInicio">Fecha de Inicio</label>
                <input type="date" id="riegoInicio" required />
              </div>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Programa
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nuevo registro de plagas -->
    <div class="modal" id="modalNuevoRegistroPlaga">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-bug"></i> Nuevo Registro de Plaga/Enfermedad</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevoRegistroPlaga">
            <div class="form-row">
              <div class="form-group">
                <label for="plagaFecha">Fecha de Detección</label>
                <input type="date" id="plagaFecha" required />
              </div>
              <div class="form-group">
                <label for="plagaCultivo">Cultivo Afectado</label>
                <select id="plagaCultivo" required>
                  <option value="">Seleccione...</option>
                  <option value="maiz">Maíz</option>
                  <option value="sorgo">Sorgo</option>
                  <option value="pasto">Pasto</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="plagaTipo">Tipo de Plaga/Enfermedad</label>
                <input type="text" id="plagaTipo" required />
              </div>
              <div class="form-group">
                <label for="plagaSeveridad">Severidad</label>
                <select id="plagaSeveridad" required>
                  <option value="leve">Leve</option>
                  <option value="moderada">Moderada</option>
                  <option value="grave">Grave</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="plagaProducto">Producto Aplicado</label>
                <input type="text" id="plagaProducto" />
              </div>
              <div class="form-group">
                <label for="plagaDosis">Dosis</label>
                <input type="text" id="plagaDosis" />
              </div>
            </div>

            <div class="form-group">
              <label for="plagaObservaciones">Observaciones</label>
              <textarea id="plagaObservaciones" rows="3"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Registro
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para registrar cosecha -->
    <div class="modal" id="modalRegistrarCosecha">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-tractor"></i> Registrar Cosecha</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formRegistrarCosecha">
            <div class="form-row">
              <div class="form-group">
                <label for="cosechaCultivo">Cultivo</label>
                <select id="cosechaCultivo" required>
                  <option value="">Seleccione...</option>
                  <option value="maiz">Maíz</option>
                  <option value="sorgo">Sorgo</option>
                  <option value="pasto">Pasto</option>
                </select>
              </div>
              <div class="form-group">
                <label for="cosechaFecha">Fecha de Cosecha</label>
                <input type="date" id="cosechaFecha" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="cosechaArea">Área Cosechada (Ha)</label>
                <input
                  type="number"
                  id="cosechaArea"
                  step="0.1"
                  min="0.1"
                  required
                />
              </div>
              <div class="form-group">
                <label for="cosechaProduccion">Producción (toneladas)</label>
                <input
                  type="number"
                  id="cosechaProduccion"
                  step="0.1"
                  min="0.1"
                  required
                />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="cosechaCalidad">Calidad del Producto</label>
                <select id="cosechaCalidad" required>
                  <option value="excelente">Excelente</option>
                  <option value="buena">Buena</option>
                  <option value="regular">Regular</option>
                  <option value="mala">Mala</option>
                </select>
              </div>
              <div class="form-group">
                <label for="cosechaDestino">Destino</label>
                <select id="cosechaDestino" required>
                  <option value="venta">Venta</option>
                  <option value="consumo">Consumo Interno</option>
                  <option value="almacenamiento">Almacenamiento</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="cosechaObservaciones">Observaciones</label>
              <textarea id="cosechaObservaciones" rows="3"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Registrar Cosecha
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nuevo insumo -->
    <div class="modal" id="modalNuevoInsumo">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-box-open"></i> Nuevo Insumo Agrícola</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevoInsumo">
            <div class="form-row">
              <div class="form-group">
                <label for="insumoTipo">Tipo de Insumo</label>
                <select id="insumoTipo" required>
                  <option value="">Seleccione...</option>
                  <option value="semilla">Semilla</option>
                  <option value="fertilizante">Fertilizante</option>
                  <option value="herbicida">Herbicida</option>
                  <option value="insecticida">Insecticida</option>
                  <option value="equipo">Equipo</option>
                </select>
              </div>
              <div class="form-group">
                <label for="insumoNombre">Nombre del Producto</label>
                <input type="text" id="insumoNombre" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="insumoCantidad">Cantidad</label>
                <input type="number" id="insumoCantidad" min="1" required />
              </div>
              <div class="form-group">
                <label for="insumoUnidad">Unidad de Medida</label>
                <select id="insumoUnidad" required>
                  <option value="kg">Kilogramos (kg)</option>
                  <option value="l">Litros (L)</option>
                  <option value="unidad">Unidades</option>
                  <option value="saco">Sacos</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="insumoProveedor">Proveedor</label>
                <input type="text" id="insumoProveedor" />
              </div>
              <div class="form-group">
                <label for="insumoFecha">Fecha de Ingreso</label>
                <input type="date" id="insumoFecha" required />
              </div>
            </div>

            <div class="form-group">
              <label for="insumoObservaciones">Observaciones</label>
              <textarea id="insumoObservaciones" rows="2"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Registrar Insumo
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer>
      <div class="footer-container">
        <p>© 2025 Agro Ganadero. Todos los derechos reservados.</p>
        <p>Desarrollado por Levi Danieli, Reymond Rendiles y Mario Ramos</p>
      </div>
    </footer>
<script>
// Manejar el envío del formulario de nuevo cultivo
document.addEventListener('DOMContentLoaded', function() {
    const formNuevoCultivo = document.getElementById('formNuevoCultivo');
    
    if (formNuevoCultivo) {
        formNuevoCultivo.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    // Cerrar modal
                    document.getElementById('modalNuevoCultivo').style.display = 'none';
                    // Recargar la página sin el parámetro de búsqueda
                    window.location.href = 'agro-cultivo.php';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al guardar el cultivo');
            });
        });
    }
    
    // Función para abrir el modal de nuevo cultivo
    const btnNuevoCultivo = document.getElementById('btnNuevoCultivo');
    const modalNuevoCultivo = document.getElementById('modalNuevoCultivo');
    
    if (btnNuevoCultivo && modalNuevoCultivo) {
        btnNuevoCultivo.addEventListener('click', function() {
            modalNuevoCultivo.style.display = 'block';
        });
    }
    
    // Botón de actualizar
    const btnActualizar = document.querySelector('.btn-outline');
    if (btnActualizar) {
        btnActualizar.addEventListener('click', function() {
            window.location.href = 'agro-cultivo.php';
        });
    }
    
    // Cerrar modales
    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.modal').style.display = 'none';
        });
    });
    
    // Cerrar modal al hacer clic fuera
    window.addEventListener('click', function(e) {
        document.querySelectorAll('.modal').forEach(modal => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
});

// Funciones placeholder para editar y eliminar
function editarCultivo(id) {
    alert('Editar cultivo ID: ' + id);
    // Aquí implementarías la lógica para editar
}

function eliminarCultivo(id) {
    if (confirm('¿Estás seguro de que quieres eliminar este cultivo?')) {
        // Enviar solicitud para eliminar
        fetch('', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=eliminar_cultivo&id=' + id
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar el cultivo');
        });
    }
}
</script>


    <script src="script.js"></script>
  </body>
</html>


<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrobufalino22";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si la tabla cultivos existe
$table_check = $conn->query("SHOW TABLES LIKE 'cultivos'");
if ($table_check->num_rows == 0) {
    // Crear la tabla si no existe
    $create_table = "CREATE TABLE cultivos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        variedad VARCHAR(100) NOT NULL,
        area DECIMAL(10,2) NOT NULL,
        lote VARCHAR(50) NOT NULL,
        fecha_siembra DATE NOT NULL,
        fecha_cosecha_estimada DATE NULL,
        notas TEXT,
        estado ENUM('activo', 'inactivo', 'eliminado') DEFAULT 'activo',
        fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($create_table)) {
        die("Error creating table: " . $conn->error);
    }
}

// Al inicio del procesamiento POST, después de la conexión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST recibido: " . print_r($_POST, true));
    
    // Verificar si los datos están llegando
    file_put_contents('debug.log', print_r($_POST, true), FILE_APPEND);
}

// Procesar eliminación de cultivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'eliminar_cultivo') {
    $id = $_POST['id'] ?? 0;
    
    if ($id > 0) {
        try {
            $stmt = $conn->prepare("UPDATE cultivos SET estado = 'eliminado' WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Cultivo eliminado exitosamente']);
            } else {
                throw new Exception($stmt->error);
            }
        } catch (Exception $e) {
            error_log("Error al eliminar cultivo: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error al eliminar el cultivo: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ID de cultivo inválido']);
    }
    exit;
}

