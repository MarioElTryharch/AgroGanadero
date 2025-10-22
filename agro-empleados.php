<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agro Ganadero - AgroEmpleados</title>
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
            <li class="active">
              <a href="agro-empleados.php">AgroEmpleados</a>
            </li>

            <li class="login"><a href="login.php">Iniciar Sesión</a></li>
            <li class="register"><a href="register.php">Registrarse</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="empleados-container">
      <!-- Encabezado de la página -->
      <div class="empleados-header">
        <h1><i class="fas fa-users"></i> AgroEmpleados</h1>
        <div class="empleados-actions">
          <button class="btn btn-primary" id="btnNuevoEmpleado">
            <i class="fas fa-user-plus"></i> Nuevo Empleado
          </button>
          <button class="btn btn-secondary" id="btnReporteNomina">
            <i class="fas fa-file-invoice-dollar"></i> Nómina
          </button>
          <button class="btn btn-outline" id="btnAsignarTurno">
            <i class="fas fa-calendar-alt"></i> Asignar Turno
          </button>
        </div>
      </div>

      <!-- Menú de secciones acordeón -->
      <div class="empleados-menu">
        <!-- Sección 1: Lista de Empleados -->
        <div class="menu-section active">
          <h2>
            <i class="fas fa-list"></i> Registro de Empleados
            <i class="fas fa-caret-down"></i>
          </h2>
          <div class="menu-content">
            <!-- Tarjetas de resumen -->
            <div class="data-cards">
              <div class="data-card">
                <h3>Total Empleados</h3>
                <p class="data-value">42</p>
              </div>
              <div class="data-card highlight">
                <h3>Activos</h3>
                <p class="data-value">38</p>
              </div>
              <div class="data-card">
                <h3>Vacaciones</h3>
                <p class="data-value">3</p>
              </div>
              <div class="data-card">
                <h3>Inactivos</h3>
                <p class="data-value">4</p>
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
                      placeholder="Buscar empleado..."
                      id="buscarEmpleado"
                    />
                    <button class="btn btn-primary btn-filter">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                  <select id="filtroCargo" class="form-control">
                    <option value="">Todos los cargos</option>
                    <option value="vaquero">Vaquero</option>
                    <option value="ordeñador">Ordeñador</option>
                    <option value="veterinario">Veterinario</option>
                    <option value="supervisor">Supervisor</option>
                  </select>
                  <select id="filtroEstatus" class="form-control">
                    <option value="">Todos los estatus</option>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="vacaciones">Vacaciones</option>
                  </select>
                  <button class="btn btn-outline">
                    <i class="fas fa-sync-alt"></i> Actualizar
                  </button>
                </div>
              </div>

              <!-- Tabla de empleados -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre Completo</th>
                      <th>Cédula</th>
                      <th>Cargo</th>
                      <th>F. Ingreso</th>
                      <th>Salario</th>
                      <th>Estatus</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>EMP-001</td>
                      <td>Juan Pérez</td>
                      <td>V-12345678</td>
                      <td>Vaquero</td>
                      <td>15/03/2020</td>
                      <td>$350.00</td>
                      <td><span class="status-badge active">Activo</span></td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Historial">
                          <i class="fas fa-history"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>EMP-012</td>
                      <td>María Gómez</td>
                      <td>V-87654321</td>
                      <td>Ordeñadora</td>
                      <td>22/04/2021</td>
                      <td>$320.00</td>
                      <td><span class="status-badge active">Activo</span></td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Historial">
                          <i class="fas fa-history"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>EMP-005</td>
                      <td>Carlos Rojas</td>
                      <td>V-56781234</td>
                      <td>Veterinario</td>
                      <td>10/05/2019</td>
                      <td>$550.00</td>
                      <td>
                        <span class="status-badge maintenance">Vacaciones</span>
                      </td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-icon" title="Historial">
                          <i class="fas fa-history"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-footer">
                  <span>Mostrando 1-3 de 42 empleados</span>
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

        <!-- Sección 2: Asistencia y Turnos -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-calendar-check"></i> Asistencia y Turnos
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-clipboard-list"></i> Control de Asistencia
                </h2>
                <div class="section-actions">
                  <input
                    type="date"
                    id="fechaAsistencia"
                    class="form-control"
                  />
                  <button class="btn btn-primary">
                    <i class="fas fa-check-circle"></i> Registrar Asistencia
                  </button>
                  <button class="btn btn-outline">
                    <i class="fas fa-print"></i> Imprimir Reporte
                  </button>
                </div>
              </div>

              <!-- Tabla de asistencia -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Empleado</th>
                      <th>Cargo</th>
                      <th>Turno</th>
                      <th>Asistencia</th>
                      <th>Hora Entrada</th>
                      <th>Hora Salida</th>
                      <th>Observaciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Juan Pérez</td>
                      <td>Vaquero</td>
                      <td>Mañana (6am-2pm)</td>
                      <td><span class="status-badge active">Presente</span></td>
                      <td>05:58</td>
                      <td>14:05</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>María Gómez</td>
                      <td>Ordeñadora</td>
                      <td>Madrugada (4am-12pm)</td>
                      <td><span class="status-badge active">Presente</span></td>
                      <td>03:55</td>
                      <td>12:10</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>Carlos Rojas</td>
                      <td>Veterinario</td>
                      <td>Administrativo (8am-4pm)</td>
                      <td>
                        <span class="status-badge inactive">Ausente</span>
                      </td>
                      <td>-</td>
                      <td>-</td>
                      <td>Vacaciones</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 3: Nómina y Pagos -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-money-bill-wave"></i> Nómina y Pagos
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="data-cards">
              <div class="data-card">
                <h3>Nómina Mensual</h3>
                <p class="data-value">$15,200.00</p>
              </div>
              <div class="data-card highlight">
                <h3>Pagos Pendientes</h3>
                <p class="data-value">3</p>
              </div>
              <div class="data-card">
                <h3>Próximo Pago</h3>
                <p class="data-value">30/06/2025</p>
              </div>
            </div>

            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-file-invoice-dollar"></i> Historial de Pagos
                </h2>
                <div class="section-actions">
                  <select id="filtroMes" class="form-control">
                    <option value="6">Junio 2025</option>
                    <option value="5">Mayo 2025</option>
                    <option value="4">Abril 2025</option>
                  </select>
                  <button class="btn btn-primary">
                    <i class="fas fa-calculator"></i> Calcular Nómina
                  </button>
                  <button class="btn btn-secondary">
                    <i class="fas fa-file-export"></i> Exportar
                  </button>
                </div>
              </div>

              <!-- Tabla de nómina -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Empleado</th>
                      <th>Cargo</th>
                      <th>Salario Base</th>
                      <th>Días Trabajados</th>
                      <th>Horas Extras</th>
                      <th>Deducciones</th>
                      <th>Total a Pagar</th>
                      <th>Estatus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Juan Pérez</td>
                      <td>Vaquero</td>
                      <td>$350.00</td>
                      <td>30</td>
                      <td>8</td>
                      <td>$12.00</td>
                      <td>$388.00</td>
                      <td><span class="status-badge active">Pagado</span></td>
                    </tr>
                    <tr>
                      <td>María Gómez</td>
                      <td>Ordeñadora</td>
                      <td>$320.00</td>
                      <td>28</td>
                      <td>4</td>
                      <td>$8.50</td>
                      <td>$355.50</td>
                      <td><span class="status-badge active">Pagado</span></td>
                    </tr>
                    <tr>
                      <td>Carlos Rojas</td>
                      <td>Veterinario</td>
                      <td>$550.00</td>
                      <td>22</td>
                      <td>0</td>
                      <td>$15.00</td>
                      <td>$435.00</td>
                      <td>
                        <span class="status-badge maintenance">Pendiente</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Sección 4: Capacitaciones y Evaluaciones -->
        <div class="menu-section">
          <h2>
            <i class="fas fa-graduation-cap"></i> Capacitaciones
            <i class="fas fa-caret-right"></i>
          </h2>
          <div class="menu-content">
            <div class="content-section">
              <div class="section-header">
                <h2>
                  <i class="fas fa-chalkboard-teacher"></i> Programas de
                  Capacitación
                </h2>
                <div class="section-actions">
                  <button class="btn btn-primary" id="btnNuevaCapacitacion">
                    <i class="fas fa-plus"></i> Nueva Capacitación
                  </button>
                </div>
              </div>

              <!-- Tabla de capacitaciones -->
              <div class="table-container">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Tema</th>
                      <th>Fecha</th>
                      <th>Instructor</th>
                      <th>Asistentes</th>
                      <th>Duración</th>
                      <th>Materiales</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Manejo Seguro de Ganado</td>
                      <td>15/05/2025</td>
                      <td>Dr. Luis Martínez</td>
                      <td>12</td>
                      <td>4 horas</td>
                      <td>
                        <button class="btn-icon" title="Descargar">
                          <i class="fas fa-file-download"></i>
                        </button>
                      </td>
                      <td>
                        <button class="btn-icon" title="Editar">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>Técnicas de Ordeño</td>
                      <td>22/04/2025</td>
                      <td>Ing. Ana Rodríguez</td>
                      <td>8</td>
                      <td>3 horas</td>
                      <td>
                        <button class="btn-icon" title="Descargar">
                          <i class="fas fa-file-download"></i>
                        </button>
                      </td>
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
      </div>
    </main>

<!-- Modal para nuevo empleado - VERSIÓN MODIFICADA -->
<div class="modal" id="modalNuevoEmpleado">
  <div class="modal-content">
    <div class="modal-header">
      <h3><i class="fas fa-user-plus"></i> Nuevo Empleado</h3>
      <button class="close-modal">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formNuevoEmpleado">
        <!-- Sección de información personal -->
        <div class="form-section">
          <h4><i class="fas fa-user"></i> Información Personal</h4>
          <div class="form-row">
            <div class="form-group">
              <label for="empleadoNombre">Nombres *</label>
              <input type="text" id="empleadoNombre" required />
            </div>
            <div class="form-group">
              <label for="empleadoApellido">Apellidos *</label>
              <input type="text" id="empleadoApellido" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="empleadoCedula">Cédula *</label>
              <input type="text" id="empleadoCedula" required />
            </div>
            <div class="form-group">
              <label for="empleadoFnacimiento">Fecha Nacimiento *</label>
              <input type="date" id="empleadoFnacimiento" required />
            </div>
            <div class="form-group">
              <label for="empleadoTelefono">Teléfono *</label>
              <input type="tel" id="empleadoTelefono" required />
            </div>
          </div>
        </div>

        <!-- Sección de información laboral -->
        <div class="form-section">
          <h4><i class="fas fa-briefcase"></i> Información Laboral</h4>
          <div class="form-row">
            <div class="form-group">
              <label for="empleadoPuesto">Puesto/Posición *</label>
              <input 
                type="text" 
                id="empleadoPuesto" 
                placeholder="Ej: Ayudante de ordeño, Cuidador de terneros, Supervisor de corrales..." 
                required 
              />
              <small class="form-help">Describa el puesto específico del empleado</small>
            </div>
            <div class="form-group">
              <label for="empleadoSalario">Salario Base *</label>
              <input
                type="number"
                id="empleadoSalario"
                min="0"
                step="0.01"
                required
              />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="empleadoFingreso">Fecha de Ingreso *</label>
              <input type="date" id="empleadoFingreso" required />
            </div>
            <div class="form-group">
              <label for="empleadoTurno">Turno *</label>
              <select id="empleadoTurno" required>
                <option value="mañana">Mañana (6am-2pm)</option>
                <option value="tarde">Tarde (2pm-10pm)</option>
                <option value="noche">Noche (10pm-6am)</option>
                <option value="administrativo">Administrativo (8am-4pm)</option>
                <option value="mixto">Mixto</option>
                <option value="personalizado">Personalizado</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Sección de información adicional -->
        <div class="form-section">
          <h4><i class="fas fa-info-circle"></i> Información Adicional</h4>
          <div class="form-row">
            <div class="form-group">
              <label for="empleadoProcedencia">Procedencia *</label>
              <select id="empleadoProcedencia" required>
                <option value="">Seleccione...</option>
                <option value="familiar">Familiar</option>
                <option value="hacienda">Hacienda</option>
                <option value="externo">Externo</option>
                <option value="recomendado">Recomendado</option>
              </select>
            </div>
            <div class="form-group">
              <label for="empleadoEstado">Estado *</label>
              <select id="empleadoEstado" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="prueba">Periodo de Prueba</option>
                <option value="vacaciones">Vacaciones</option>
                <option value="licencia">Licencia</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="empleadoDireccion">Dirección Completa *</label>
            <textarea id="empleadoDireccion" rows="2" required></textarea>
          </div>

          <div class="form-group">
            <label for="empleadoReferencia">Referencia o Observaciones</label>
            <textarea id="empleadoReferencia" rows="2" placeholder="Cómo llegó a la hacienda, recomendaciones, etc."></textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="button" class="btn btn-secondary close-modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Registrar Empleado
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para ficha de ingreso/egreso -->
<div class="modal" id="modalIngresoEgreso">
  <div class="modal-content">
    <div class="modal-header">
      <h3><i class="fas fa-exchange-alt"></i> Ficha de Movimiento</h3>
      <button class="close-modal">&times;</button>
    </div>
    <div class="modal-body">
      <form id="formIngresoEgreso">
        <div class="form-row">
          <div class="form-group">
            <label for="movimientoEmpleado">Empleado *</label>
            <select id="movimientoEmpleado" required>
              <option value="">Seleccione...</option>
              <!-- Se llenará dinámicamente -->
            </select>
          </div>
          <div class="form-group">
            <label for="movimientoTipo">Tipo de Movimiento *</label>
            <select id="movimientoTipo" required>
              <option value="ingreso">Ingreso</option>
              <option value="egreso">Egreso</option>
              <option value="cambio">Cambio de Puesto</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="movimientoFecha">Fecha *</label>
            <input type="date" id="movimientoFecha" required />
          </div>
          <div class="form-group">
            <label for="movimientoEstado">Estado *</label>
            <select id="movimientoEstado" required>
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
              <option value="botado">Botado</option>
              <option value="renuncia">Renuncia Voluntaria</option>
              <option value="despido">Despido</option>
              <option value="jubilacion">Jubilación</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="movimientoMotivo">Motivo *</label>
          <select id="movimientoMotivo" required>
            <option value="">Seleccione...</option>
            <option value="contratacion">Contratación Nueva</option>
            <option value="recontratacion">Recontratación</option>
            <option value="ascenso">Ascenso</option>
            <option value="traslado">Traslado</option>
            <option value="finalizacion_contrato">Finalización de Contrato</option>
            <option value="desempeno">Bajo Desempeño</option>
            <option value="conducta">Mala Conducta</option>
            <option value="recorte">Recorte de Personal</option>
            <option value="personal">Motivos Personales</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label for="movimientoDescripcion">Descripción Detallada *</label>
          <textarea id="movimientoDescripcion" rows="3" required placeholder="Describa los detalles del movimiento..."></textarea>
        </div>

        <div class="form-group">
          <label for="movimientoDocumentos">Documentos Relacionados</label>
          <input type="file" id="movimientoDocumentos" multiple />
          <small class="form-help">Puede subir cartas de renuncia, contratos, etc.</small>
        </div>

        <div class="form-actions">
          <button type="button" class="btn btn-secondary close-modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-exchange-alt"></i> Registrar Movimiento
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Modal para asignar turno -->
    <div class="modal" id="modalAsignarTurno">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-calendar-alt"></i> Asignar Turno</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formAsignarTurno">
            <div class="form-row">
              <div class="form-group">
                <label for="turnoEmpleado">Empleado</label>
                <select id="turnoEmpleado" required>
                  <option value="">Seleccione...</option>
                  <option value="EMP-001">Juan Pérez</option>
                  <option value="EMP-012">María Gómez</option>
                  <option value="EMP-005">Carlos Rojas</option>
                </select>
              </div>
              <div class="form-group">
                <label for="turnoFecha">Fecha</label>
                <input type="date" id="turnoFecha" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="turnoTipo">Tipo de Turno</label>
                <select id="turnoTipo" required>
                  <option value="normal">Normal</option>
                  <option value="extra">Extra</option>
                  <option value="festivo">Festivo</option>
                </select>
              </div>
              <div class="form-group">
                <label for="turnoHorario">Horario</label>
                <select id="turnoHorario" required>
                  <option value="mañana">Mañana (6am-2pm)</option>
                  <option value="tarde">Tarde (2pm-10pm)</option>
                  <option value="noche">Noche (10pm-6am)</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="turnoObservaciones">Observaciones</label>
              <textarea id="turnoObservaciones" rows="2"></textarea>
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Asignar Turno
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal para nueva capacitación -->
    <div class="modal" id="modalNuevaCapacitacion">
      <div class="modal-content">
        <div class="modal-header">
          <h3><i class="fas fa-chalkboard-teacher"></i> Nueva Capacitación</h3>
          <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="formNuevaCapacitacion">
            <div class="form-row">
              <div class="form-group">
                <label for="capacitacionTema">Tema</label>
                <input type="text" id="capacitacionTema" required />
              </div>
              <div class="form-group">
                <label for="capacitacionFecha">Fecha</label>
                <input type="date" id="capacitacionFecha" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label for="capacitacionInstructor">Instructor</label>
                <input type="text" id="capacitacionInstructor" required />
              </div>
              <div class="form-group">
                <label for="capacitacionDuracion">Duración (horas)</label>
                <input
                  type="number"
                  id="capacitacionDuracion"
                  min="1"
                  required
                />
              </div>
            </div>

            <div class="form-group">
              <label for="capacitacionEmpleados">Empleados Participantes</label>
              <select id="capacitacionEmpleados" multiple>
                <option value="EMP-001">Juan Pérez</option>
                <option value="EMP-012">María Gómez</option>
                <option value="EMP-005">Carlos Rojas</option>
              </select>
            </div>

            <div class="form-group">
              <label for="capacitacionDescripcion">Descripción</label>
              <textarea
                id="capacitacionDescripcion"
                rows="3"
                required
              ></textarea>
            </div>

            <div class="form-group">
              <label for="capacitacionMaterial">Subir Materiales</label>
              <input type="file" id="capacitacionMaterial" />
            </div>

            <div class="form-actions">
              <button type="button" class="btn btn-secondary close-modal">
                Cancelar
              </button>
              <button type="submit" class="btn btn-primary">
                Programar Capacitación
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
