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
        <!-- Sección 1: Inventario General -->
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
                    <tr>
                      <td>ALM-001</td>
                      <td>Concentrado para vacas</td>
                      <td>Alimentos</td>
                      <td>25</td>
                      <td>Sacos</td>
                      <td>Bodega 1</td>
                      <td>
                        <span class="status-badge active">Disponible</span>
                      </td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Eliminar">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>MED-012</td>
                      <td>Antibiótico Bovino</td>
                      <td>Medicamentos</td>
                      <td>8</td>
                      <td>Frascos</td>
                      <td>Botiquín</td>
                      <td>
                        <span class="status-badge maintenance">Bajo stock</span>
                      </td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Eliminar">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>EQP-005</td>
                      <td>Ordeñadora manual</td>
                      <td>Equipos</td>
                      <td>3</td>
                      <td>Unidades</td>
                      <td>Taller</td>
                      <td>
                        <span class="status-badge active">Disponible</span>
                      </td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Eliminar">
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-footer">
                  <span>Mostrando 1-3 de 147 ítems</span>
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
