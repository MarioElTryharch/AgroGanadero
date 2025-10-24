<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agro Ganadero - AgroInventario</title>
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
            <li class="active">
              <a href="agro-inventario.php">AgroInventario</a>
            </li>
            <li><a href="agro-empleados.php">AgroEmpleados</a></li>

            <li class="login"><a href="login.php">Iniciar Sesión</a></li>
            <li class="register"><a href="register.php">Registrarse</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="inventario-container">
      <!-- Encabezado de la página -->
      <div class="inventario-header">
        <h1><i class="fas fa-boxes"></i> AgroInventario</h1>
        <div class="inventario-actions">
          <button class="btn btn-primary" id="btnNuevoItem">
            <i class="fas fa-plus"></i> Nuevo Ítem
          </button>
          <button class="btn btn-secondary" id="btnReporteInventario">
            <i class="fas fa-file-export"></i> Exportar
          </button>
          <button class="btn btn-outline" id="btnAjusteInventario">
            <i class="fas fa-exchange-alt"></i> Ajuste de Inventario
          </button>
        </div>
      </div>

              <!-- Menú de secciones acordeón -->
        <div class="inventario-menu">
            <!-- Sección 1: Inventario General (MODIFICADA) -->
            <div class="menu-section active">
                <h2>
                    <i class="fas fa-clipboard-list"></i> Inventario General
                    <i class="fas fa-caret-down"></i>
                </h2>
                <div class="menu-content">
                    <!-- Tarjetas de resumen -->
                    <div class="data-cards">
                        <div class="data-card">
                            <h3>Total de Ítems</h3>
                            <p class="data-value">147</p>
                        </div>
                        <div class="data-card highlight">
                            <h3>Valor Total</h3>
                            <p class="data-value">$24,850.00</p>
                        </div>
                        <div class="data-card">
                            <h3>Ítems Bajo Stock</h3>
                            <p class="data-value">18</p>
                        </div>
                        <div class="data-card">
                            <h3>Ítems Agotados</h3>
                            <p class="data-value">5</p>
                        </div>
                    </div>

                    <!-- Filtros y búsqueda -->
                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-filter"></i> Filtros</h2>
                            <div class="section-actions">
                                <div class="search-filter">
                                    <input
                                        type="text"
                                        placeholder="Buscar ítem..."
                                        id="buscarItem"
                                    />
                                    <button class="btn btn-primary btn-filter">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <select id="filtroCategoria" class="form-control">
                                    <option value="">Todas las categorías</option>
                                    <option value="alimentos">Alimentos</option>
                                    <option value="medicamentos">Medicamentos</option>
                                    <option value="equipos">Equipos</option>
                                    <option value="insumos">Insumos Agrícolas</option>
                                </select>
                                <button class="btn btn-outline">
                                    <i class="fas fa-sync-alt"></i> Actualizar
                                </button>
                            </div>
                        </div>

                        <!-- Tabla de inventario -->
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Ítem</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Unidad</th>
                                        <th>Ubicación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Conexión a la base de datos
                                    $servername = "localhost";
                                    $username = "tu_usuario";
                                    $password = "tu_contraseña";
                                    $dbname = "agrobufalino22";
                                    
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }
                                    
                                    // Consulta para obtener los ítems del inventario
                                    $sql = "SELECT * FROM inventario ORDER BY id DESC LIMIT 10";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["codigo"] . "</td>";
                                            echo "<td>" . $row["nombre"] . "</td>";
                                            echo "<td>" . $row["categoria"] . "</td>";
                                            echo "<td>" . $row["cantidad"] . "</td>";
                                            echo "<td>" . $row["unidad"] . "</td>";
                                            echo "<td>" . $row["ubicacion"] . "</td>";
                                            
                                            // Determinar estado según cantidad
                                            if ($row["cantidad"] == 0) {
                                                echo "<td><span class='status-badge inactive'>Agotado</span></td>";
                                            } elseif ($row["cantidad"] <= $row["stock_minimo"]) {
                                                echo "<td><span class='status-badge maintenance'>Bajo stock</span></td>";
                                            } else {
                                                echo "<td><span class='status-badge active'>Disponible</span></td>";
                                            }
                                            
                                            echo "<td>";
                                            echo "<button class='btn-icon' title='Editar' onclick='editarItem(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-edit'></i>";
                                            echo "</button>";
                                            echo "<button class='btn-icon' title='Eliminar' onclick='eliminarItem(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-trash'></i>";
                                            echo "</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No hay ítems en el inventario</td></tr>";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                            <div class="table-footer">
                                <span>Mostrando 1-10 de 147 ítems</span>
                                <div class="pagination">
                                    <button class="btn-pagination" disabled>
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="btn-pagination active">1</button>
                                    <button class="btn-pagination">2</button>
                                    <button class="btn-pagination">3</button>
                                    <button class="btn-pagination">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 2: Movimientos de Inventario (MODIFICADA) -->
            <div class="menu-section">
                <h2>
                    <i class="fas fa-exchange-alt"></i> Movimientos y Reportes Financieros
                    <i class="fas fa-caret-right"></i>
                </h2>
                <div class="menu-content">
                    <div class="data-cards">
                        <div class="data-card">
                            <h3>Entradas (30 días)</h3>
                            <p class="data-value">48</p>
                        </div>
                        <div class="data-card highlight">
                            <h3>Salidas (30 días)</h3>
                            <p class="data-value">56</p>
                        </div>
                        <div class="data-card">
                            <h3>Ganancias Netas</h3>
                            <p class="data-value">$12,450.00</p>
                        </div>
                        <div class="data-card">
                            <h3>Último Movimiento</h3>
                            <p class="data-value">Hoy, 10:45 AM</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-list-alt"></i> Historial de Movimientos</h2>
                            <div class="section-actions">
                                <select id="filtroMovimientos" class="form-control">
                                    <option value="">Todos los movimientos</option>
                                    <option value="entrada">Entradas</option>
                                    <option value="salida">Salidas</option>
                                    <option value="ajuste">Ajustes</option>
                                    <option value="interno">Interno</option>
                                    <option value="externo">Externo</option>
                                </select>
                                <input type="date" id="fechaDesde" class="form-control" />
                                <input type="date" id="fechaHasta" class="form-control" />
                                <button class="btn btn-primary" id="btnFiltrarMovimientos">
                                    <i class="fas fa-filter"></i> Filtrar
                                </button>
                                <button class="btn btn-secondary" id="btnGenerarReporte">
                                    <i class="fas fa-chart-bar"></i> Reporte Financiero
                                </button>
                            </div>
                        </div>

                        <!-- Tabla de movimientos -->
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Movimiento</th>
                                        <th>Ítem</th>
                                        <th>Cantidad</th>
                                        <th>Valor</th>
                                        <th>Comprador/Vendedor</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaMovimientos">
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }
                                    
                                    // Consulta para obtener los movimientos
                                    $sql = "SELECT m.*, i.nombre as item_nombre, cv.nombre as contacto_nombre 
                                            FROM movimientos_inventario m 
                                            LEFT JOIN inventario i ON m.item_id = i.id 
                                            LEFT JOIN compradores_vendedores cv ON m.id_comprador_vendedor = cv.id 
                                            ORDER BY m.fecha DESC LIMIT 10";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["fecha"] . "</td>";
                                            
                                            // Determinar tipo de movimiento
                                            $tipoClase = "";
                                            $tipoTexto = "";
                                            if ($row["tipo"] == "entrada") {
                                                $tipoClase = "active";
                                                $tipoTexto = "Entrada";
                                            } elseif ($row["tipo"] == "salida") {
                                                $tipoClase = "inactive";
                                                $tipoTexto = "Salida";
                                            } else {
                                                $tipoClase = "maintenance";
                                                $tipoTexto = "Ajuste";
                                            }
                                            
                                            echo "<td><span class='status-badge $tipoClase'>$tipoTexto</span></td>";
                                            
                                            // Mostrar si es interno o externo
                                            $movimientoTipo = $row["tipo_movimiento"] ?? "N/A";
                                            echo "<td>" . ucfirst($movimientoTipo) . "</td>";
                                            
                                            echo "<td>" . $row["item_nombre"] . "</td>";
                                            echo "<td>" . $row["cantidad"] . "</td>";
                                            echo "<td>$" . ($row["valor_unitario"] ?? "0.00") . "</td>";
                                            echo "<td>" . ($row["contacto_nombre"] ?? "N/A") . "</td>";
                                            
                                            // Estado del movimiento
                                            $estadoClase = "";
                                            $estadoTexto = $row["estado"] ?? "completado";
                                            if ($estadoTexto == "pendiente") {
                                                $estadoClase = "maintenance";
                                            } elseif ($estadoTexto == "cancelado") {
                                                $estadoClase = "inactive";
                                            } else {
                                                $estadoClase = "active";
                                            }
                                            
                                            echo "<td><span class='status-badge $estadoClase'>" . ucfirst($estadoTexto) . "</span></td>";
                                            echo "<td>";
                                            echo "<button class='btn-icon' title='Editar' onclick='editarMovimiento(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-edit'></i>";
                                            echo "</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No hay movimientos registrados</td></tr>";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Reporte Financiero -->
                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-chart-line"></i> Reporte Financiero</h2>
                            <div class="section-actions">
                                <select id="periodoReporte" class="form-control">
                                    <option value="7">Últimos 7 días</option>
                                    <option value="30" selected>Últimos 30 días</option>
                                    <option value="90">Últimos 3 meses</option>
                                    <option value="365">Último año</option>
                                </select>
                                <button class="btn btn-primary" id="btnActualizarReporte">
                                    <i class="fas fa-sync-alt"></i> Actualizar
                                </button>
                            </div>
                        </div>
                        
                        <div class="reporte-financiero">
                            <div class="reporte-resumen">
                                <div class="reporte-card">
                                    <h3>Ventas Totales</h3>
                                    <p class="reporte-valor">$18,750.00</p>
                                </div>
                                <div class="reporte-card">
                                    <h3>Compras Totales</h3>
                                    <p class="reporte-valor">$6,300.00</p>
                                </div>
                                <div class="reporte-card highlight">
                                    <h3>Ganancias Netas</h3>
                                    <p class="reporte-valor">$12,450.00</p>
                                </div>
                                <div class="reporte-card">
                                    <h3>Pendiente por Vender</h3>
                                    <p class="reporte-valor">$8,200.00</p>
                                </div>
                                <div class="reporte-card">
                                    <h3>Pendiente por Entrar</h3>
                                    <p class="reporte-valor">$3,500.00</p>
                                </div>
                            </div>
                            
                            <div class="grafico-container">
                                <canvas id="graficoFinanciero" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 3: Producción de Leche (NUEVA) -->
            <div class="menu-section">
                <h2>
                    <i class="fas fa-chart-line"></i> Producción de Leche
                    <i class="fas fa-caret-right"></i>
                </h2>
                <div class="menu-content">
                    <div class="data-cards">
                        <div class="data-card">
                            <h3>Producción Hoy</h3>
                            <p class="data-value">245 L</p>
                        </div>
                        <div class="data-card highlight">
                            <h3>Promedio Mensual</h3>
                            <p class="data-value">6,850 L</p>
                        </div>
                        <div class="data-card">
                            <h3>Variación vs Mes Anterior</h3>
                            <p class="data-value">+3.2%</p>
                        </div>
                        <div class="data-card">
                            <h3>Temperatura Promedio</h3>
                            <p class="data-value">24.5°C</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-chart-bar"></i> Registro de Producción</h2>
                            <div class="section-actions">
                                <button class="btn btn-primary" id="btnNuevaProduccion">
                                    <i class="fas fa-plus"></i> Nuevo Registro
                                </button>
                                <button class="btn btn-secondary" id="btnReporteProduccion">
                                    <i class="fas fa-file-export"></i> Reporte
                                </button>
                            </div>
                        </div>

                        <!-- Gráfico de producción -->
                        <div class="grafico-container">
                            <canvas id="graficoProduccionLeche" width="400" height="200"></canvas>
                        </div>

                        <!-- Tabla de producción -->
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Cantidad (L)</th>
                                        <th>Temperatura</th>
                                        <th>Humedad</th>
                                        <th>Condiciones Climáticas</th>
                                        <th>Observaciones</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProduccion">
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }
                                    
                                    // Consulta para obtener la producción de leche
                                    $sql = "SELECT * FROM produccion_leche ORDER BY fecha DESC LIMIT 10";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["fecha"] . "</td>";
                                            echo "<td>" . $row["cantidad_litros"] . "</td>";
                                            echo "<td>" . ($row["temperatura"] ?? "N/A") . "°C</td>";
                                            echo "<td>" . ($row["humedad"] ?? "N/A") . "%</td>";
                                            echo "<td>" . ($row["condiciones_climaticas"] ?? "N/A") . "</td>";
                                            echo "<td>" . ($row["observaciones"] ?? "") . "</td>";
                                            echo "<td>";
                                            echo "<button class='btn-icon' title='Editar' onclick='editarProduccion(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-edit'></i>";
                                            echo "</button>";
                                            echo "<button class='btn-icon' title='Eliminar' onclick='eliminarProduccion(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-trash'></i>";
                                            echo "</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay registros de producción</td></tr>";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Análisis y Recomendaciones -->
                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-lightbulb"></i> Análisis y Recomendaciones</h2>
                        </div>
                        <div class="analisis-container">
                            <div class="analisis-card">
                                <h3><i class="fas fa-chart-line"></i> Tendencia de Producción</h3>
                                <p>La producción ha aumentado un 3.2% respecto al mes anterior. Se observa una correlación positiva con temperaturas entre 22-26°C.</p>
                            </div>
                            <div class="analisis-card">
                                <h3><i class="fas fa-dollar-sign"></i> Proyección Financiera</h3>
                                <p>Basado en la producción actual, se proyectan ganancias de $8,450 para el próximo mes, con posibles pérdidas de $1,200 si la temperatura supera los 30°C.</p>
                            </div>
                            <div class="analisis-card">
                                <h3><i class="fas fa-seedling"></i> Recomendaciones</h3>
                                <ul>
                                    <li>Mantener la temperatura del establo entre 22-26°C</li>
                                    <li>Aumentar la hidratación durante días calurosos</li>
                                    <li>Considerar sombra adicional para los animales</li>
                                    <li>Revisar la dieta durante cambios climáticos bruscos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección 4: Compradores y Vendedores (NUEVA) -->
            <div class="menu-section">
                <h2>
                    <i class="fas fa-users"></i> Compradores y Vendedores
                    <i class="fas fa-caret-right"></i>
                </h2>
                <div class="menu-content">
                    <div class="data-cards">
                        <div class="data-card">
                            <h3>Total de Contactos</h3>
                            <p class="data-value">42</p>
                        </div>
                        <div class="data-card highlight">
                            <h3>Compradores Activos</h3>
                            <p class="data-value">28</p>
                        </div>
                        <div class="data-card">
                            <h3>Vendedores Activos</h3>
                            <p class="data-value">14</p>
                        </div>
                        <div class="data-card">
                            <h3>Transacciones Pendientes</h3>
                            <p class="data-value">7</p>
                        </div>
                    </div>

                    <div class="content-section">
                        <div class="section-header">
                            <h2><i class="fas fa-address-book"></i> Gestión de Contactos</h2>
                            <div class="section-actions">
                                <button class="btn btn-primary" id="btnNuevoContacto">
                                    <i class="fas fa-plus"></i> Nuevo Contacto
                                </button>
                                <div class="search-filter">
                                    <input
                                        type="text"
                                        placeholder="Buscar contacto..."
                                        id="buscarContacto"
                                    />
                                    <button class="btn btn-primary btn-filter">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla de compradores/vendedores -->
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Contacto</th>
                                        <th>Teléfono</th>
                                        <th>Productos de Interés</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaContactos">
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }
                                    
                                    // Consulta para obtener compradores/vendedores
                                    $sql = "SELECT * FROM compradores_vendedores WHERE activo = 1 ORDER BY nombre LIMIT 10";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $row["nombre"] . "</td>";
                                            
                                            // Determinar tipo
                                            $tipoClase = "";
                                            $tipoTexto = $row["tipo"];
                                            if ($tipoTexto == "comprador") {
                                                $tipoClase = "active";
                                            } elseif ($tipoTexto == "vendedor") {
                                                $tipoClase = "inactive";
                                            } else {
                                                $tipoClase = "maintenance";
                                            }
                                            
                                            echo "<td><span class='status-badge $tipoClase'>" . ucfirst($tipoTexto) . "</span></td>";
                                            echo "<td>" . ($row["email"] ?? $row["contacto"]) . "</td>";
                                            echo "<td>" . ($row["telefono"] ?? "N/A") . "</td>";
                                            echo "<td>" . ($row["productos_interes"] ?? "N/A") . "</td>";
                                            echo "<td><span class='status-badge active'>Activo</span></td>";
                                            echo "<td>";
                                            echo "<button class='btn-icon' title='Editar' onclick='editarContacto(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-edit'></i>";
                                            echo "</button>";
                                            echo "<button class='btn-icon' title='Ver Movimientos' onclick='verMovimientosContacto(" . $row["id"] . ")'>";
                                            echo "<i class='fas fa-exchange-alt'></i>";
                                            echo "</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No hay contactos registrados</td></tr>";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resto de las secciones existentes (Categorías, Alertas) -->
            <!-- ... (mantener las secciones existentes de categorías y alertas) ... -->
        </div>
    </main>

    <!-- Modales existentes -->
    <!-- ... (mantener los modales existentes) ... -->

    <!-- Modal para nuevo registro de producción -->
    <div class="modal" id="modalNuevaProduccion">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-chart-line"></i> Nuevo Registro de Producción</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNuevaProduccion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionFecha">Fecha</label>
                            <input type="date" id="produccionFecha" required />
                        </div>
                        <div class="form-group">
                            <label for="produccionCantidad">Cantidad (Litros)</label>
                            <input type="number" id="produccionCantidad" step="0.01" min="0" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionTemperatura">Temperatura (°C)</label>
                            <input type="number" id="produccionTemperatura" step="0.1" />
                        </div>
                        <div class="form-group">
                            <label for="produccionHumedad">Humedad (%)</label>
                            <input type="number" id="produccionHumedad" step="0.1" min="0" max="100" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="produccionClima">Condiciones Climáticas</label>
                        <select id="produccionClima">
                            <option value="">Seleccione...</option>
                            <option value="soleado">Soleado</option>
                            <option value="nublado">Nublado</option>
                            <option value="lluvioso">Lluvioso</option>
                            <option value="ventoso">Ventoso</option>
                            <option value="caluroso">Caluroso</option>
                            <option value="frio">Frío</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="produccionObservaciones">Observaciones</label>
                        <textarea id="produccionObservaciones" rows="3"></textarea>
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

    <!-- Modal para nuevo contacto -->
    <div class="modal" id="modalNuevoContacto">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-user-plus"></i> Nuevo Comprador/Vendedor</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formNuevoContacto">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactoNombre">Nombre/Razón Social</label>
                            <input type="text" id="contactoNombre" required />
                        </div>
                        <div class="form-group">
                            <label for="contactoTipo">Tipo</label>
                            <select id="contactoTipo" required>
                                <option value="">Seleccione...</option>
                                <option value="comprador">Comprador</option>
                                <option value="vendedor">Vendedor</option>
                                <option value="ambos">Ambos</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactoEmail">Email</label>
                            <input type="email" id="contactoEmail" />
                        </div>
                        <div class="form-group">
                            <label for="contactoTelefono">Teléfono</label>
                            <input type="tel" id="contactoTelefono" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contactoDireccion">Dirección</label>
                        <textarea id="contactoDireccion" rows="2"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="contactoProductos">Productos de Interés</label>
                        <textarea id="contactoProductos" rows="3" placeholder="Ej: Ganado vacuno, leche, equipos de ordeño..."></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary close-modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar Contacto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!-- Sección 2: Categorías y Clasificación -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-tags"></i> Categorías y Clasificación
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2><i class="fas fa-sitemap"></i> Gestión de Categorías</h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevaCategoria">
                    <i class="fas fa-plus"></i> Nueva Categoría
                  </button>
                </div>
              </div>

              <!-- Tabla de categorías -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Ítems Asociados</th>
                      <th>Descripción</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ALM</td>
                      <td>Alimentos</td>
                      <td>42</td>
                      <td>Alimentos para el ganado</td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>MED</td>
                      <td>Medicamentos</td>
                      <td>35</td>
                      <td>Medicinas veterinarias</td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>EQP</td>
                      <td>Equipos</td>
                      <td>27</td>
                      <td>Equipos y herramientas</td>
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

        <!-- Sección 3: Movimientos de Inventario -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-exchange-alt"></i> Movimientos
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="data-cards">
              <div class="data-card">
                <h3>Entradas (30 días)</h3>
                <p class="data-value">48</p>
              </div>
              <div class="data-card highlight">
                <h3>Salidas (30 días)</h3>
                <p class="data-value">56</p>
              </div>
              <div class="data-card">
                <h3>Último Movimiento</h3>
                <p class="data-value">Hoy, 10:45 AM</p>
              </div>
            </div>

            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-list-alt"></i> Historial de Movimientos
                </h2>
                <div class="section-actions">
                  <select id="filtroMovimientos" class="form-control">
                    <option value="">Todos los movimientos</option>
                    <option value="entrada">Entradas</option>
                    <option value="salida">Salidas</option>
                    <option value="ajuste">Ajustes</option>
                  </select>
                  <input type="date" id="fechaDesde" class="form-control" />
                  <input type="date" id="fechaHasta" class="form-control" />
                  <button class="btn btn-primary">
                    <i class="fas fa-filter"></i> Filtrar
                  </button>
                </div>
              </div>

              <!-- Tabla de movimientos -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Tipo</th>
                      <th>Ítem</th>
                      <th>Cantidad</th>
                      <th>Responsable</th>
                      <th>Motivo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>15/06/2025</td>
                      <td><span class="status-badge active">Entrada</span></td>
                      <td>Concentrado para vacas</td>
                      <td>+20</td>
                      <td>Juan Pérez</td>
                      <td>Compra</td>
                    </tr>
                    <tr>
                      <td>14/06/2025</td>
                      <td><span class="status-badge inactive">Salida</span></td>
                      <td>Antibiótico Bovino</td>
                      <td>-2</td>
                      <td>María Gómez</td>
                      <td>Uso veterinario</td>
                    </tr>
                    <tr>
                      <td>12/06/2025</td>
                      <td>
                        <span class="status-badge maintenance">Ajuste</span>
                      </td>
                      <td>Ordeñadora manual</td>
                      <td>+1</td>
                      <td>Carlos Rojas</td>
                      <td>Corrección de inventario</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 4: Alertas y Reabastecimiento -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-bell"></i> Alertas
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-exclamation-triangle"></i> Ítems que
                  necesitan atención
                </h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnConfigurarAlertas">
                    <i class="fas fa-cog"></i> Configurar Alertas
                  </button>
                </div>
              </div>

              <!-- Tabla de alertas -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Ítem</th>
                      <th>Stock Actual</th>
                      <th>Stock Mínimo</th>
                      <th>Diferencia</th>
                      <th>Última Compra</th>
                      <th>Proveedor</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="alert-row">
                      <td>Antibiótico Bovino</td>
                      <td>8</td>
                      <td>10</td>
                      <td>-2</td>
                      <td>10/06/2025</td>
                      <td>Farmacia Ganadera</td>
                      <td>
                        <button class="btn btn-outline btn-sm">
                          <i class="fas fa-phone"></i> Contactar
                        </button>
                      </td>
                    </tr>
                    <tr class="alert-row">
                      <td>Vacuna Aftosa</td>
                      <td>3</td>
                      <td>15</td>
                      <td>-12</td>
                      <td>05/05/2025</td>
                      <td>Lab. Veterinario</td>
                      <td>
                        <button class="btn btn-outline btn-sm">
                          <i class="fas fa-shopping-cart"></i> Ordenar
                        </button>
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

    <!-- Modal para nuevo ítem -->
    <div class="modal" id="modalNuevoItem">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-box"></i> Nuevo Ítem de Inventario</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevoItem">
            <div class="form-row">
              <div class="form-group">
                <label for="itemCodigo">Código</label>
                <input type="text" id="itemCodigo" required />
              </div>
              <div class="form-group">
                <label for="itemNombre">Nombre</label>
                <input type="text" id="itemNombre" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="itemCategoria">Categoría</label>
                <select id="itemCategoria" required>
                  <option value="">Seleccione...</option>
                  <option value="alimentos">Alimentos</option>
                  <option value="medicamentos">Medicamentos</option>
                  <option value="equipos">Equipos</option>
                  <option value="insumos">Insumos Agrícolas</option>
                </select>
              </div>
              <div class="form-group">
                <label for="itemSubcategoria">Subcategoría</label>
                <input type="text" id="itemSubcategoria" />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="itemCantidad">Cantidad</label>
                <input type="number" id="itemCantidad" min="0" required />
              </div>
              <div class="form-group">
                <label for="itemUnidad">Unidad de Medida</label>
                <select id="itemUnidad" required>
                  <option value="unidad">Unidad</option>
                  <option value="kg">Kilogramos</option>
                  <option value="l">Litros</option>
                  <option value="saco">Sacos</option>
                  <option value="frasco">Frascos</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="itemMinimo">Stock Mínimo</label>
                <input type="number" id="itemMinimo" min="0" required />
              </div>
              <div class="form-group">
                <label for="itemUbicacion">Ubicación</label>
                <input type="text" id="itemUbicacion" required />
              </div>
            </div>

            <div class="form-group">
              <label for="itemDescripcion">Descripción</label>
              <textarea id="itemDescripcion" rows="3"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Ítem
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nueva categoría -->
    <div class="modal" id="modalNuevaCategoria">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-tag"></i> Nueva Categoría</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevaCategoria">
            <div class="form-row">
              <div class="form-group">
                <label for="categoriaCodigo">Código (3 letras)</label>
                <input
                  type="text"
                  id="categoriaCodigo"
                  maxlength="3"
                  required
                />
              </div>
              <div class="form-group">
                <label for="categoriaNombre">Nombre</label>
                <input type="text" id="categoriaNombre" required />
              </div>
            </div>

            <div class="form-group">
              <label for="categoriaDescripcion">Descripción</label>
              <textarea id="categoriaDescripcion" rows="3" required></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Crear Categoría
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para ajuste de inventario -->
    <div class="modal" id="modalAjusteInventario">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-exchange-alt"></i> Ajuste de Inventario</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formAjusteInventario">
            <div class="form-row">
              <div class="form-group">
                <label for="ajusteTipo">Tipo de Ajuste</label>
                <select id="ajusteTipo" required>
                  <option value="">Seleccione...</option>
                  <option value="entrada">Entrada</option>
                  <option value="salida">Salida</option>
                  <option value="correccion">Corrección</option>
                </select>
              </div>
              <div class="form-group">
                <label for="ajusteFecha">Fecha</label>
                <input type="date" id="ajusteFecha" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="ajusteItem">Ítem</label>
                <select id="ajusteItem" required>
                  <option value="">Seleccione un ítem...</option>
                  <option value="ALM-001">Concentrado para vacas</option>
                  <option value="MED-012">Antibiótico Bovino</option>
                  <option value="EQP-005">Ordeñadora manual</option>
                </select>
              </div>
              <div class="form-group">
                <label for="ajusteCantidad">Cantidad</label>
                <input type="number" id="ajusteCantidad" required />
              </div>
            </div>

            <div class="form-group">
              <label for="ajusteMotivo">Motivo</label>
              <textarea id="ajusteMotivo" rows="3" required></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Registrar Ajuste
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para configurar alertas -->
    <div class="modal" id="modalConfigurarAlertas">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-bell"></i> Configurar Alertas de Inventario</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formConfigurarAlertas">
            <div class="alert-settings-section">
              <h4><i class="fas fa-sliders-h"></i> Configuración General</h4>
              <div class="form-group">
                <label for="alertasActivas">Activar alertas</label>
                <select id="alertasActivas" required>
                  <option value="si">Sí</option>
                  <option value="no">No</option>
                </select>
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="diasAntesAlerta">Días antes para alerta</label>
                  <input
                    type="number"
                    id="diasAntesAlerta"
                    min="1"
                    max="30"
                    value="7"
                  />
                </div>
                <div class="form-group">
                  <label for="notificarPor">Notificar por</label>
                  <select id="notificarPor" multiple>
                    <option value="email" selected>Email</option>
                    <option value="sms">SMS</option>
                    <option value="app">Notificación en App</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="alert-settings-section">
              <h4><i class="fas fa-envelope"></i> Destinatarios de Alertas</h4>
              <div class="form-group">
                <label>Personas a notificar</label>
                <div class="recipients-list">
                  <div class="recipient-item">
                    <input type="checkbox" id="recipient1" checked />
                    <label for="recipient1">admin@agroganadero.com</label>
                  </div>
                  <div class="recipient-item">
                    <input type="checkbox" id="recipient2" checked />
                    <label for="recipient2">inventario@agroganadero.com</label>
                  </div>
                  <div class="recipient-item">
                    <input type="checkbox" id="recipient3" />
                    <label for="recipient3">compras@agroganadero.com</label>
                  </div>
                </div>
                <button type="button" class="btn btn-outline btn-sm">
                  <i class="fas fa-plus"></i> Agregar Email
                </button>
              </div>
            </div>

            <div class="alert-settings-section">
              <h4>
                <i class="fas fa-exclamation-triangle"></i> Tipos de Alertas
              </h4>
              <div class="form-group">
                <div class="alert-type-item">
                  <input type="checkbox" id="alertStockMinimo" checked />
                  <label for="alertStockMinimo"
                    >Stock por debajo del mínimo</label
                  >
                </div>
                <div class="alert-type-item">
                  <input type="checkbox" id="alertStockAgotado" checked />
                  <label for="alertStockAgotado">Stock agotado</label>
                </div>
                <div class="alert-type-item">
                  <input type="checkbox" id="alertVencimiento" />
                  <label for="alertVencimiento"
                    >Productos próximos a vencer</label
                  >
                </div>
                <div class="alert-type-item">
                  <input type="checkbox" id="alertMovimientos" />
                  <label for="alertMovimientos">Movimientos inusuales</label>
                </div>
              </div>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Guardar Configuración
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

    <script src="script.js"></script>
  </body>
</html>
