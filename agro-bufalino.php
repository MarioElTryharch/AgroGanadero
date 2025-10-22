<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Ganadero - Bufalino</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="img/Imagen1.ico" type="image/x-icon">
    <link rel="icon" href="img/Imagen1.ico" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="img/Imagen1.ico" sizes="180x180">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
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
            <nav class="main-nav" style="background: white;">
                <ul>
                    <li><a href="agro-vacuno.php">AgroVacuno</a></li>
                    <li class="active"><a href="agro-bufalino.php">AgroBufalino</a></li>
                    <li><a href="agro-cultivo.php">AgroAgricultivo</a></li>
                    <li><a href="agro-inventario.php">AgroInventario</a></li>
                    <li><a href="agro-empleados.php">AgroEmpleados</a></li>

                    <li class="login"><a href="login.php">Iniciar Sesión</a></li>
                    <li class="register"><a href="register.php">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="bufalino-container">
        <div class="bufalino-header">
            <h1><i class="fas fa-buffalo"></i> Gestión Animal - Bufalino</h1>
            <div class="bufalino-actions">
                <button class="btn btn-secondary"><i class="fas fa-file-export"></i> Exportar Datos</button>
            </div>
        </div>

<div class="bufalino-menu">
    <!-- REGISTRO -->
    <div class="menu-section active" data-section="registro">
        <h2><i class="fas fa-clipboard-list"></i> REGISTRO <i class="fas fa-caret-down"></i></h2>
        <div class="menu-content">
            <div class="data-cards">
                <div class="data-card">
                    <h3>Búfalos Activos</h3>
                    <p class="data-value">0</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Búfalo" onclick="abrirModal('modal-bufalos-activos')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Hembras en Producción</h3>
                    <p class="data-value">0</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Hembras en Producción" onclick="abrirModal('modal-hembras-produccion')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Machos Reproductores</h3>
                    <p class="data-value">0</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Machos Reproductores" onclick="abrirModal('modal-machos-reproductores')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Crías este Año</h3>
                    <p class="data-value">0</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Crías este Año" onclick="abrirModal('modal-crias')" ><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card highlight">
                    <h3>Tasa de Preñez</h3>
                    <p class="data-value">0%</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Tasa de Preñez" onclick="abrirModal('modal-prenez')"><i class="fas fa-plus"></i></button>
                </div>
            </div>
            <!-- Tablas de Gestión - Sección Búfalos -->
<div class="tablas-gestion" style="margin-top: 30px;">
    <!-- Tabla para Búfalos Activos -->
    <div class="tabla-container" id="tablaBufalosActivos">
        <div class="tabla-header">
            <h3><i class="fas fa-buffalo"></i> Búfalos Activos</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID/Arete</th>
                        <th>Nombre</th>
                        <th>Sexo</th>
                        <th>Raza</th>
                        <th>Lote</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaBufalosActivosBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Hembras en Producción -->
    <div class="tabla-container" id="tablaHembrasProduccion">
        <div class="tabla-header">
            <h3><i class="fas fa-female"></i> Hembras en Producción</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID/Arete</th>
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Producción Leche (L/día)</th>
                        <th>Estado Reproductivo</th>
                        <th>Lote</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaHembrasProduccionBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Machos Reproductores -->
    <div class="tabla-container" id="tablaMachosReproductores">
        <div class="tabla-header">
            <h3><i class="fas fa-bull"></i> Machos Reproductores</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID/Arete</th>
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Calidad Semen</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaMachosReproductoresBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Crías este Año -->
    <div class="tabla-container" id="tablaCriasAnio">
        <div class="tabla-header">
            <h3><i class="fas fa-baby"></i> Crías este Año</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID/Arete</th>
                        <th>Sexo</th>
                        <th>Raza</th>
                        <th>Fecha Nacimiento</th>
                        <th>Peso Nacimiento</th>
                        <th>Madre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCriasAnioBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Tasa de Preñez -->
    <div class="tabla-container" id="tablaTasaPrenez">
        <div class="tabla-header">
            <h3><i class="fas fa-chart-line"></i> Tasa de Preñez</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID/Arete</th>
                        <th>Nombre</th>
                        <th>Estado Preñez</th>
                        <th>Fecha Diagnóstico</th>
                        <th>Método</th>
                        <th>Meses Gestación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaTasaPrenezBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>

    <!-- CONFIGURACIÓN -->
    <div class="menu-section " data-section="configuracion">
        <h2><i class="fas fa-cog"></i> CONFIGURACIÓN <i class="fas fa-caret-right"></i></h2>
        <div class="menu-content ">
            <div class="data-cards">
                <div class="data-card">
                    <h3>Razas Bufalinas</h3>
                    <p class="data-value">5</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Raza"  onclick="abrirModal('modal-razas')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Corrales</h3>
                    <p class="data-value">3</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Corral"  onclick="abrirModal('modal-corral')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Lotes</h3>
                    <p class="data-value">4</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Lote"  onclick="abrirModal('modal-lotes')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Grupos</h3>
                    <p class="data-value">2</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Grupo"  onclick="abrirModal('modal-grupos')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card">
                    <h3>Colores</h3>
                    <p class="data-value">3</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Color"  onclick="abrirModal('modal-colores')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card highlight">
                    <h3>Cruces</h3>
                    <p class="data-value">1</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Cruce"  onclick="abrirModal('modal-cruce')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card highlight">
                    <h3>Categorías Notas</h3>
                    <p class="data-value">2</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Categoría"  onclick="abrirModal('modal-categorias-notas')"><i class="fas fa-plus"></i></button>
                </div>
                <div class="data-card highlight">
                    <h3>Diagnósticos Veterinarios</h3>
                    <p class="data-value">6</p>
                    <button class="btn btn-outline btn-icon" title="Agregar Diagnóstico"  onclick="abrirModal('modal-diagnostico')"><i class="fas fa-plus"></i></button>
                </div>
            </div>

<!-- Tablas de Gestión - Sección Configuración -->
<div class="tablas-gestion" style="margin-top: 30px;">
    <!-- Tabla para Razas Bufalinas -->
    <div class="tabla-container" id="tablaRazasBufalinas">
        <div class="tabla-header">
            <h3><i class="fas fa-buffalo"></i> Razas Bufalinas</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Origen</th>
                        <th>Peso Promedio (kg)</th>
                        <th>Producción Leche (L/día)</th>
                        <th>Altura (cm)</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaRazasBufalinasBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Corrales -->
    <div class="tabla-container" id="tablaCorrales">
        <div class="tabla-header">
            <h3><i class="fas fa-warehouse"></i> Corrales</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Capacidad</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCorralesBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Lotes -->
    <div class="tabla-container" id="tablaLotes">
        <div class="tabla-header">
            <h3><i class="fas fa-layer-group"></i> Lotes</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Capacidad</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaLotesBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Grupos -->
    <div class="tabla-container" id="tablaGrupos">
        <div class="tabla-header">
            <h3><i class="fas fa-users"></i> Grupos</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Responsable</th>
                        <th>Capacidad</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaGruposBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Colores -->
    <div class="tabla-container" id="tablaColores">
        <div class="tabla-header">
            <h3><i class="fas fa-palette"></i> Colores</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Color</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaColoresBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Cruces -->
    <div class="tabla-container" id="tablaCruces">
        <div class="tabla-header">
            <h3><i class="fas fa-dna"></i> Cruces</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Raza Madre</th>
                        <th>Raza Padre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCrucesBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Categorías Notas -->
    <div class="tabla-container" id="tablaCategoriasNotas">
        <div class="tabla-header">
            <h3><i class="fas fa-tags"></i> Categorías Notas</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaCategoriasNotasBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabla para Diagnósticos Veterinarios -->
    <div class="tabla-container" id="tablaDiagnosticosVeterinarios">
        <div class="tabla-header">
            <h3><i class="fas fa-stethoscope"></i> Diagnósticos Veterinarios</h3>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Gravedad</th>
                        <th>Descripción</th>
                        <th>Tratamiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaDiagnosticosVeterinariosBody">
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>
</div>
        </div>
    </div>

    <!-- LOTES -->
<!-- Dentro de la sección de Lotes, reemplaza el contenido actual con este: -->
<div class="menu-section " data-section="lotes">
    <h2><i class="fas fa-map-marked-alt"></i> LOTES <i class="fas fa-caret-right"></i></h2>
    <div class="menu-content">
        <div class="lotes-container">
            <div class="lotes-form-container">
                <div class="lotes-form-card">
                    <h3><i class="fas fa-layer-group"></i> Nuevo Lote</h3>
                    <div class="config-grid">
                        <div class="config-item">
                            <label for="lote-nombre"><i class="fas fa-tag"></i> Nombre del Lote</label>
                            <input type="text" id="lote-nombre" placeholder="Ej: Lote 1">
                        </div>
                        <div class="config-item">
                            <label for="lote-ubicacion"><i class="fas fa-map-pin"></i> Ubicación</label>
                            <input type="text" id="lote-ubicacion" placeholder="Ej: Norte">
                        </div>
                        <div class="config-item">
                            <label for="lote-capacidad"><i class="fas fa-users"></i> Capacidad Máxima</label>
                            <input type="number" id="lote-capacidad" min="1" placeholder="Ej: 50">
                        </div>
                        <div class="config-item">
                            <label for="lote-estado"><i class="fas fa-thermometer-half"></i> Estado</label>
                            <select id="lote-estado">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="en-mantenimiento">En Mantenimiento</option>
                            </select>
                        </div>
                        <div class="config-item full-width">
                            <label for="lote-observaciones"><i class="fas fa-sticky-note"></i> Observaciones</label>
                            <textarea id="lote-observaciones" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" id="agregar-lote"><i class="fas fa-plus"></i> Agregar Lote</button>
                        <button class="btn btn-outline" id="limpiar-lote"><i class="fas fa-eraser"></i> Limpiar</button>
                    </div>
                </div>
            </div>
            
            <div class="lotes-list-container">
                <div class="lotes-list-card">
                    <div class="list-header">
                        <h3><i class="fas fa-list"></i> Lista de Lotes</h3>
                        <div class="list-actions">
                            <input type="text" placeholder="Buscar lote..." class="search-input">
                            <button class="btn btn-outline"><i class="fas fa-filter"></i> Filtros</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="data-table lotes-bufalino">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Ubicación</th>
                                    <th>Capacidad</th>
                                    <th>Estado</th>
                                    <th>Observaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lote 1</td>
                                    <td>Norte</td>
                                    <td>50</td>
                                    <td><span class="status-badge active">Activo</span></td>
                                    <td>-</td>
                                    <td>
                                        <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lote 2</td>
                                    <td>Sur</td>
                                    <td>40</td>
                                    <td><span class="status-badge maintenance">En Mantenimiento</span></td>
                                    <td>Reparación de cercas</td>
                                    <td>
                                        <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                        <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer">
                        <span>Mostrando 2 de 2 registros</span>
                        <div class="pagination">
                            <button class="btn-pagination" disabled><i class="fas fa-chevron-left"></i></button>
                            <button class="btn-pagination active">1</button>
                            <button class="btn-pagination"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para nuevo diagnóstico veterinario -->
<div class="modal" id="modal-diagnostico">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-stethoscope"></i> Agregar Nuevo Diagnóstico Veterinario</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-diagnostico')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-diagnostico">
                <div class="form-group">
                    <label for="diagnostico-nombre"><i class="fas fa-tag"></i> Nombre del Diagnóstico</label>
                    <input type="text" id="diagnostico-nombre" placeholder="Ej: Mastitis, Fiebre Aftosa, etc." required>
                </div>
                
                <div class="form-group">
                    <label for="diagnostico-tipo"><i class="fas fa-list"></i> Tipo de Diagnóstico</label>
                    <select id="diagnostico-tipo" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="enfermedad">Enfermedad</option>
                        <option value="lesion">Lesión</option>
                        <option value="condicion">Condición Especial</option>
                        <option value="prevencion">Prevención</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="diagnostico-gravedad"><i class="fas fa-exclamation-triangle"></i> Nivel de Gravedad</label>
                    <select id="diagnostico-gravedad" required>
                        <option value="">Seleccione nivel</option>
                        <option value="leve">Leve</option>
                        <option value="moderado">Moderado</option>
                        <option value="grave">Grave</option>
                        <option value="critico">Crítico</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="diagnostico-descripcion"><i class="fas fa-file-medical-alt"></i> Descripción y Síntomas</label>
                    <textarea id="diagnostico-descripcion" rows="4" placeholder="Describa los síntomas y características del diagnóstico..." required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="diagnostico-tratamiento"><i class="fas fa-pills"></i> Tratamiento Recomendado</label>
                    <textarea id="diagnostico-tratamiento" rows="3" placeholder="Describa el tratamiento recomendado..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Diagnóstico</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Categorías Notas -->
<div class="modal" id="modal-categorias-notas">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-tags"></i> Gestión de Categorías de Notas</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-categorias-notas')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="form-container">
                <h4><i class="fas fa-plus-circle"></i> Agregar Nueva Categoría</h4>
                <form id="form-categoria-nota">
                    <div class="form-group">
                        <label for="categoria-nombre">Nombre de la Categoría</label>
                        <input type="text" id="categoria-nombre" placeholder="Ej: Salud, Reproducción, Alimentación" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoria-color">Color de Identificación</label>
                        <div class="color-options">
                            <div class="color-option">
                                <input type="radio" id="color-azul" name="categoria-color" value="#3498db" checked>
                                <label for="color-azul" style="background-color: #3498db;"></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color-verde" name="categoria-color" value="#2ecc71">
                                <label for="color-verde" style="background-color: #2ecc71;"></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color-rojo" name="categoria-color" value="#e74c3c">
                                <label for="color-rojo" style="background-color: #e74c3c;"></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color-amarillo" name="categoria-color" value="#f1c40f">
                                <label for="color-amarillo" style="background-color: #f1c40f;"></label>
                            </div>
                            <div class="color-option">
                                <input type="radio" id="color-naranja" name="categoria-color" value="#e67e22">
                                <label for="color-naranja" style="background-color: #e67e22;"></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="categoria-descripcion">Descripción</label>
                        <textarea id="categoria-descripcion" rows="2" placeholder="Breve descripción de la categoría..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                    </div>
                </form>
            </div>
            
            <div class="list-container">
                <h4><i class="fas fa-list"></i> Categorías Existentes</h4>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Color</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="categorias-lista">
                            <!-- Las categorías se cargarán dinámicamente -->
                            <tr>
                                <td>Salud</td>
                                <td><span class="color-badge" style="background-color: #e74c3c;"></span></td>
                                <td>Notas relacionadas con salud y veterinaria</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Reproducción</td>
                                <td><span class="color-badge" style="background-color: #3498db;"></span></td>
                                <td>Notas sobre reproducción y cría</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <span>Mostrando 2 de 2 categorías</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para nuevo cruce (oculto por defecto) -->
<div class="modal" id="modal-cruce">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-dna"></i> Registrar Nuevo Cruce</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-cruce')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-cruce">
                <div class="form-row">
                    <div class="form-group">
                        <label for="cruce-nombre">Nombre del Cruce</label>
                        <input type="text" id="cruce-nombre" placeholder="Ej: Murrah x Mediterráneo" required>
                    </div>
                    <div class="form-group">
                        <label for="cruce-tipo">Tipo de Cruce</label>
                        <select id="cruce-tipo" required>
                            <option value="">Seleccione tipo</option>
                            <option value="lineal">Cruce Lineal</option>
                            <option value="rotacional">Cruce Rotacional</option>
                            <option value="terminal">Cruce Terminal</option>
                            <option value="mejoramiento">Cruce de Mejoramiento</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="cruce-raza-madre">Raza de la Madre</label>
                        <select id="cruce-raza-madre" required>
                            <option value="">Seleccione raza</option>
                            <option value="murrah">Murrah</option>
                            <option value="mediterraneo">Mediterráneo</option>
                            <option value="jafarabadi">Jafarabadi</option>
                            <option value="swamp">Swamp</option>
                            <option value="carabao">Carabao</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cruce-raza-padre">Raza del Padre</label>
                        <select id="cruce-raza-padre" required>
                            <option value="">Seleccione raza</option>
                            <option value="murrah">Murrah</option>
                            <option value="mediterraneo">Mediterráneo</option>
                            <option value="jafarabadi">Jafarabadi</option>
                            <option value="swamp">Swamp</option>
                            <option value="carabao">Carabao</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="cruce-descripcion">Descripción</label>
                    <textarea id="cruce-descripcion" rows="3" placeholder="Objetivos y características del cruce..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cruce</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para gestión de colores -->
<div class="modal" id="modal-colores">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-palette"></i> Gestión de Colores</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-colores')">&times;</button>
        </div>
        <div class="modal-body">
            <!-- Formulario para agregar/editar color -->
            <div class="form-container">
                <h4><i class="fas fa-plus-circle"></i> Agregar Nuevo Color</h4>
                <form id="form-color">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="color-nombre">Nombre del Color</label>
                            <input type="text" id="color-nombre" placeholder="Ej: Negro, Marrón, Blanco" required>
                        </div>
                        <div class="form-group">
                            <label for="color-codigo">Código de Color</label>
                            <div class="color-input-container">
                                <input type="color" id="color-codigo" value="#000000" required>
                                <span class="color-preview" id="color-preview"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="color-descripcion">Descripción</label>
                        <textarea id="color-descripcion" rows="2" placeholder="Descripción del color..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="color-estado">Estado</label>
                        <select id="color-estado">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline" id="limpiar-color">Limpiar</button>
                        <button type="submit" class="btn btn-primary">Guardar Color</button>
                    </div>
                </form>
            </div>
            
            <!-- Lista de colores existentes -->
            <div class="list-container">
                <h4><i class="fas fa-list"></i> Colores Registrados</h4>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Color</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-colores">
                            <!-- Los colores se cargarán dinámicamente aquí -->
                            <tr>
                                <td><span class="color-badge" style="background-color: #000000;"></span></td>
                                <td>Negro</td>
                                <td>Color negro sólido</td>
                                <td><span class="status-badge active">Activo</span></td>
                                <td>
                                    <button class="btn-icon editar-color" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon eliminar-color" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="color-badge" style="background-color: #8B4513;"></span></td>
                                <td>Marrón</td>
                                <td>Color marrón característico</td>
                                <td><span class="status-badge active">Activo</span></td>
                                <td>
                                    <button class="btn-icon editar-color" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon eliminar-color" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="color-badge" style="background-color: #F5F5DC;"></span></td>
                                <td>Beige</td>
                                <td>Color beige claro</td>
                                <td><span class="status-badge active">Activo</span></td>
                                <td>
                                    <button class="btn-icon editar-color" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon eliminar-color" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <span>Mostrando 3 de 3 colores</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Grupos -->
<div class="modal" id="modal-grupos">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-users"></i> Gestión de Grupos</h3>
            <button class="close-modal" onclick="cerrarModal('modal-grupos')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="config-grid">
                <div class="config-item">
                    <label for="grupo-nombre"><i class="fas fa-tag"></i> Nombre del Grupo</label>
                    <input type="text" id="grupo-nombre" placeholder="Ej: Grupo de Ordeño">
                </div>
                <div class="config-item">
                    <label for="grupo-tipo"><i class="fas fa-list"></i> Tipo de Grupo</label>
                    <select id="grupo-tipo">
                        <option value="">Seleccione tipo</option>
                        <option value="produccion">Producción</option>
                        <option value="reproduccion">Reproducción</option>
                        <option value="cria">Cría</option>
                        <option value="engorde">Engorde</option>
                        <option value="sanidad">Sanidad</option>
                    </select>
                </div>
                <div class="config-item">
                    <label for="grupo-responsable"><i class="fas fa-user"></i> Responsable</label>
                    <input type="text" id="grupo-responsable" placeholder="Ej: Juan Pérez">
                </div>
                <div class="config-item">
                    <label for="grupo-capacidad"><i class="fas fa-users"></i> Capacidad</label>
                    <input type="number" id="grupo-capacidad" min="1" placeholder="Ej: 30">
                </div>
                <div class="config-item full-width">
                    <label for="grupo-descripcion"><i class="fas fa-sticky-note"></i> Descripción</label>
                    <textarea id="grupo-descripcion" rows="3" placeholder="Descripción del grupo y su función específica..."></textarea>
                </div>
            </div>
            
            <div class="form-actions">
                <button class="btn btn-outline" id="limpiar-grupo"><i class="fas fa-eraser"></i> Limpiar</button>
                <button class="btn btn-primary" id="guardar-grupo"><i class="fas fa-save"></i> Guardar Grupo</button>
            </div>
            
            <div class="table-container" style="margin-top: 20px;">
                <div class="list-header">
                    <h3><i class="fas fa-list"></i> Grupos Registrados</h3>
                    <div class="list-actions">
                        <input type="text" placeholder="Buscar grupo..." class="search-input" id="buscar-grupo">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Responsable</th>
                                <th>Capacidad</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-grupos">
                            <!-- Los grupos se cargarán dinámicamente aquí -->
                            <tr>
                                <td>Ordeño Mañana</td>
                                <td>Producción</td>
                                <td>Carlos Rojas</td>
                                <td>25</td>
                                <td>Grupo de búfalas en producción de leche (turno mañana)</td>
                                <td>
                                    <button class="btn-icon editar-grupo" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon eliminar-grupo" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Reproducción Activa</td>
                                <td>Reproducción</td>
                                <td>María González</td>
                                <td>15</td>
                                <td>Hembras en etapa reproductiva activa</td>
                                <td>
                                    <button class="btn-icon editar-grupo" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon eliminar-grupo" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <span>Mostrando 2 de 2 registros</span>
                    <div class="pagination">
                        <button class="btn-pagination" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="btn-pagination active">1</button>
                        <button class="btn-pagination"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para gestión de lotes -->
<div class="modal" id="modal-lotes">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-layer-group"></i> Gestión de Lotes</h3>
            <button class="close-modal" onclick="cerrarModal('modal-lotes')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-lote">
                <div class="form-row">
                    <div class="form-group">
                        <label for="lote-nombre-modal"><i class="fas fa-tag"></i> Nombre del Lote</label>
                        <input type="text" id="lote-nombre-modal" placeholder="Ej: Lote 1" required>
                    </div>
                    <div class="form-group">
                        <label for="lote-ubicacion-modal"><i class="fas fa-map-pin"></i> Ubicación</label>
                        <input type="text" id="lote-ubicacion-modal" placeholder="Ej: Norte" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="lote-capacidad-modal"><i class="fas fa-users"></i> Capacidad Máxima</label>
                        <input type="number" id="lote-capacidad-modal" min="1" placeholder="Ej: 50" required>
                    </div>
                    <div class="form-group">
                        <label for="lote-estado-modal"><i class="fas fa-thermometer-half"></i> Estado</label>
                        <select id="lote-estado-modal" required>
                            <option value="">Seleccione estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="en-mantenimiento">En Mantenimiento</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lote-observaciones-modal"><i class="fas fa-sticky-note"></i> Observaciones</label>
                    <textarea id="lote-observaciones-modal" rows="3" placeholder="Observaciones sobre el lote..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Lote</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para nuevo corral -->
<div class="modal" id="modal-corral">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-warehouse"></i> Gestionar Corral</h3>
            <button class="close-modal" onclick="cerrarModal('modal-corral')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-corral">
                <div class="form-row">
                    <div class="form-group">
                        <label for="corral-nombre">Nombre del Corral</label>
                        <input type="text" id="corral-nombre" placeholder="Ej: Corral Principal" required>
                    </div>
                    <div class="form-group">
                        <label for="corral-capacidad">Capacidad Máxima</label>
                        <input type="number" id="corral-capacidad" min="1" placeholder="Ej: 30" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="corral-tipo">Tipo de Corral</label>
                        <select id="corral-tipo" required>
                            <option value="">Seleccione tipo</option>
                            <option value="engorde">Engorde</option>
                            <option value="maternidad">Maternidad</option>
                            <option value="recria">Recría</option>
                            <option value="aislamiento">Aislamiento</option>
                            <option value="reproduccion">Reproducción</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="corral-estado">Estado</label>
                        <select id="corral-estado" required>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="mantenimiento">En Mantenimiento</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="corral-ubicacion">Ubicación</label>
                    <input type="text" id="corral-ubicacion" placeholder="Ej: Zona Norte" required>
                </div>
                
                <div class="form-group">
                    <label for="corral-observaciones">Observaciones</label>
                    <textarea id="corral-observaciones" rows="3" placeholder="Detalles adicionales sobre el corral..."></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Corral</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Razas Bufalinas -->
<div class="modal" id="modal-razas">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-buffalo"></i> Gestión de Razas Bufalinas</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-razas')">&times;</button>
        </div>
        <div class="modal-body">
            <!-- Formulario para agregar/editar raza -->
            <div class="form-container">
                <h4><i class="fas fa-plus-circle"></i> Agregar Nueva Raza</h4>
                <form id="form-raza">
                    <div class="form-group">
                        <label for="raza-nombre">Nombre de la Raza</label>
                        <input type="text" id="raza-nombre" placeholder="Ej: Murrah" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="raza-origen">Origen/País</label>
                        <input type="text" id="raza-origen" placeholder="Ej: India" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="raza-peso-promedio">Peso Promedio (kg)</label>
                            <input type="number" id="raza-peso-promedio" min="0" step="0.1" placeholder="Ej: 650" required>
                        </div>
                        <div class="form-group">
                            <label for="raza-altura-promedio">Altura Promedio (cm)</label>
                            <input type="number" id="raza-altura-promedio" min="0" step="0.1" placeholder="Ej: 140" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="raza-produccion-leche">Producción Leche Promedio (L/día)</label>
                        <input type="number" id="raza-produccion-leche" min="0" step="0.1" placeholder="Ej: 8.5" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="raza-caracteristicas">Características Principales</label>
                        <textarea id="raza-caracteristicas" rows="3" placeholder="Describa las características principales de esta raza..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline" id="limpiar-form-raza">Limpiar</button>
                        <button type="submit" class="btn btn-primary">Guardar Raza</button>
                    </div>
                </form>
            </div>
            
            <!-- Lista de razas existentes -->
            <div class="list-container">
                <h4><i class="fas fa-list"></i> Razas Registradas</h4>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Origen</th>
                                <th>Peso Promedio (kg)</th>
                                <th>Producción Leche (L/día)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Murrah</td>
                                <td>India</td>
                                <td>650</td>
                                <td>8.5</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Mediterráneo</td>
                                <td>Italia</td>
                                <td>700</td>
                                <td>9.2</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jafarabadi</td>
                                <td>India</td>
                                <td>800</td>
                                <td>7.8</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Swamp</td>
                                <td>China</td>
                                <td>450</td>
                                <td>4.5</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Carabao</td>
                                <td>Filipinas</td>
                                <td>500</td>
                                <td>5.2</td>
                                <td>
                                    <button class="btn-icon" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-footer">
                    <span>Mostrando 5 de 5 registros</span>
                </div>
            </div>
        </div>
    </div>
</div>

   <!-- Modal para Búfalos Activos -->
<div class="modal" id="modal-bufalos-activos">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3><i class="fas fa-buffalo"></i> Gestión de Búfalos Activos</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-bufalos-activos')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-bufalos-activos">
                <!-- Sección de información básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-id">ID/Arete *</label>
                            <input type="text" id="bufalo-id" required>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-nombre">Nombre</label>
                            <input type="text" id="bufalo-nombre" placeholder="Opcional">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-sexo">Sexo *</label>
                            <select id="bufalo-sexo" required>
                                <option value="">Seleccione</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-raza">Raza *</label>
                            <select id="bufalo-raza" required>
                                <option value="">Seleccione una raza</option>
                                <option value="murrah">Murrah</option>
                                <option value="mediterraneo">Mediterráneo</option>
                                <option value="jafarabadi">Jafarabadi</option>
                                <option value="swamp">Swamp</option>
                                <option value="carabao">Carabao</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-color">Color</label>
                            <select id="bufalo-color">
                                <option value="">Seleccione color</option>
                                <option value="negro">Negro</option>
                                <option value="gris">Gris</option>
                                <option value="blanco">Blanco</option>
                                <option value="marron">Marrón</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-fecha-nacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="bufalo-fecha-nacimiento">
                        </div>
                    </div>
                </div>
                
                <!-- Sección de ubicación y agrupación -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Ubicación y Agrupación</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-lote">Lote *</label>
                            <select id="bufalo-lote" required>
                                <option value="">Seleccione lote</option>
                                <option value="lote1">Lote 1</option>
                                <option value="lote2">Lote 2</option>
                                <option value="lote3">Lote 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-corral">Corral</label>
                            <select id="bufalo-corral">
                                <option value="">Seleccione corral</option>
                                <option value="corral1">Corral 1</option>
                                <option value="corral2">Corral 2</option>
                                <option value="corral3">Corral 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-grupo">Grupo</label>
                            <select id="bufalo-grupo">
                                <option value="">Seleccione grupo</option>
                                <option value="grupo1">Grupo 1</option>
                                <option value="grupo2">Grupo 2</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de características físicas -->
                <div class="form-section">
                    <h4><i class="fas fa-weight"></i> Características Físicas</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-peso">Peso (kg) *</label>
                            <input type="number" id="bufalo-peso" min="0" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-altura">Altura (cm)</label>
                            <input type="number" id="bufalo-altura" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-condicion-corporal">Condición Corporal</label>
                            <select id="bufalo-condicion-corporal">
                                <option value="">Seleccione condición</option>
                                <option value="1">1 - Muy Delgado</option>
                                <option value="2">2 - Delgado</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Sobrepeso</option>
                                <option value="5">5 - Obeso</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de producción -->
                <div class="form-section">
                    <h4><i class="fas fa-chart-line"></i> Producción</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-produccion-leche">Producción Leche (L/día)</label>
                            <input type="number" id="bufalo-produccion-leche" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-grasa-leche">% Grasa Leche</label>
                            <input type="number" id="bufalo-grasa-leche" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-proteina-leche">% Proteína Leche</label>
                            <input type="number" id="bufalo-proteina-leche" min="0" max="100" step="0.1">
                        </div>
                    </div>
                </div>
                
                <!-- Sección de reproducción -->
                <div class="form-section">
                    <h4><i class="fas fa-heart"></i> Reproducción</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-estado-reproductivo">Estado Reproductivo</label>
                            <select id="bufalo-estado-reproductivo">
                                <option value="">Seleccione estado</option>
                                <option value="vacio">Vacío</option>
                                <option value="preñada">Preñada</option>
                                <option value="lactancia">En Lactancia</option>
                                <option value="secado">En Secado</option>
                                <option value="servicio">En Servicio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-fecha-ultimo-parto">Fecha Último Parto</label>
                            <input type="date" id="bufalo-fecha-ultimo-parto">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-fecha-preñez">Fecha de Preñez</label>
                            <input type="date" id="bufalo-fecha-preñez">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-padre">Padre (ID)</label>
                            <input type="text" id="bufalo-padre">
                        </div>
                        <div class="form-group">
                            <label for="bufalo-madre">Madre (ID)</label>
                            <input type="text" id="bufalo-madre">
                        </div>
                    </div>
                </div>
                
                <!-- Sección de salud -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Salud</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bufalo-estado-salud">Estado de Salud</label>
                            <select id="bufalo-estado-salud">
                                <option value="excelente">Excelente</option>
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="enfermo">Enfermo</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-vacunas">Vacunas al Día</label>
                            <select id="bufalo-vacunas">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bufalo-desparasitacion">Última Desparasitación</label>
                            <input type="date" id="bufalo-desparasitacion">
                        </div>
                    </div>
                    <div class="form-group full-width">
                        <label for="bufalo-tratamientos">Tratamientos/Medicamentos</label>
                        <textarea id="bufalo-tratamientos" rows="2" placeholder="Describa tratamientos actuales o pasados"></textarea>
                    </div>
                </div>
                
                <!-- Sección de fotos -->
                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Fotografías del Animal</h4>
                    <div class="photo-upload-container">
                        <div class="photo-preview-container">
                            <div class="photo-preview" id="photo-preview">
                                <i class="fas fa-camera"></i>
                                <span>Vista previa de la foto</span>
                            </div>
                        </div>
                        <div class="photo-upload-controls">
                            <input type="file" id="bufalo-foto" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-outline" id="btn-seleccionar-foto">
                                <i class="fas fa-folder-open"></i> Seleccionar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-tomar-foto" disabled>
                                <i class="fas fa-camera"></i> Tomar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-eliminar-foto">
                                <i class="fas fa-trash"></i> Eliminar Foto
                            </button>
                        </div>
                        <div class="photo-notes">
                            <small>Formatos aceptados: JPG, PNG. Tamaño máximo: 5MB</small>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones</h4>
                    <div class="form-group full-width">
                        <textarea id="bufalo-observaciones" rows="4" placeholder="Notas adicionales sobre el animal"></textarea>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline close-modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Búfalo</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Modal para Hembras en Producción -->
<div class="modal" id="modal-hembras-produccion">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3><i class="fas fa-female"></i> Gestión de Hembras en Producción</h3>
            <button class="close-modal" onclick="cerrarModal('modal-hembras-produccion')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-hembras-produccion">
                <!-- Sección de Identificación Básica -->
                <div class="form-section">
                    <h4><i class="fas fa-id-card"></i> Identificación Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-id">ID/Arete <span class="required">*</span></label>
                            <input type="text" id="hembra-id" required>
                        </div>
                        <div class="form-group">
                            <label for="hembra-nombre">Nombre</label>
                            <input type="text" id="hembra-nombre" placeholder="Opcional">
                        </div>
                        <div class="form-group">
                            <label for="hembra-raza">Raza <span class="required">*</span></label>
                            <select id="hembra-raza" required>
                                <option value="">Seleccione una raza</option>
                                <option value="murrah">Murrah</option>
                                <option value="mediterraneo">Mediterráneo</option>
                                <option value="jafarabadi">Jafarabadi</option>
                                <option value="swamp">Swamp</option>
                                <option value="carabao">Carabao</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de Datos Físicos -->
                <div class="form-section">
                    <h4><i class="fas fa-weight"></i> Datos Físicos</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-edad">Edad (años) <span class="required">*</span></label>
                            <input type="number" id="hembra-edad" min="0" max="30" required>
                        </div>
                        <div class="form-group">
                            <label for="hembra-peso">Peso (kg) <span class="required">*</span></label>
                            <input type="number" id="hembra-peso" min="0" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="hembra-estado-corporal">Estado Corporal</label>
                            <select id="hembra-estado-corporal">
                                <option value="">Seleccione</option>
                                <option value="1">1 - Muy Delgado</option>
                                <option value="2">2 - Delgado</option>
                                <option value="3" selected>3 - Ideal</option>
                                <option value="4">4 - Sobrepeso</option>
                                <option value="5">5 - Obeso</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de Ubicación y Manejo -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Ubicación y Manejo</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-lote">Lote/Ubicación <span class="required">*</span></label>
                            <select id="hembra-lote" required>
                                <option value="">Seleccione un lote</option>
                                <option value="lote1">Lote 1</option>
                                <option value="lote2">Lote 2</option>
                                <option value="lote3">Lote 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hembra-corral">Corral</label>
                            <select id="hembra-corral">
                                <option value="">Seleccione un corral</option>
                                <option value="corral1">Corral 1</option>
                                <option value="corral2">Corral 2</option>
                                <option value="corral3">Corral 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hembra-grupo">Grupo</label>
                            <select id="hembra-grupo">
                                <option value="">Seleccione un grupo</option>
                                <option value="grupo1">Grupo 1</option>
                                <option value="grupo2">Grupo 2</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de Producción Lechera -->
                <div class="form-section">
                    <h4><i class="fas fa-wine-bottle"></i> Producción Lechera</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-produccion-leche">Producción Leche (L/día)</label>
                            <input type="number" id="hembra-produccion-leche" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="hembra-grasa">% Grasa</label>
                            <input type="number" id="hembra-grasa" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="hembra-proteina">% Proteína</label>
                            <input type="number" id="hembra-proteina" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-lactancia">Número de Lactancia</label>
                            <input type="number" id="hembra-lactancia" min="1">
                        </div>
                        <div class="form-group">
                            <label for="hembra-dias-lactancia">Días en Lactancia</label>
                            <input type="number" id="hembra-dias-lactancia" min="0">
                        </div>
                    </div>
                </div>

                <!-- Sección de Reproducción -->
                <div class="form-section">
                    <h4><i class="fas fa-heart"></i> Reproducción</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-estado-reproductivo">Estado Reproductivo</label>
                            <select id="hembra-estado-reproductivo">
                                <option value="">Seleccione</option>
                                <option value="vacia">Vacía</option>
                                <option value="preñada">Preñada</option>
                                <option value="lactante">Lactante</option>
                                <option value="secado">En Secado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hembra-fecha-preniez">Fecha de Preñez</label>
                            <input type="date" id="hembra-fecha-preniez">
                        </div>
                        <div class="form-group">
                            <label for="hembra-fecha-parto">Fecha Probable de Parto</label>
                            <input type="date" id="hembra-fecha-parto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-padre">Padre (Semental)</label>
                            <input type="text" id="hembra-padre">
                        </div>
                        <div class="form-group">
                            <label for="hembra-madre">Madre</label>
                            <input type="text" id="hembra-madre">
                        </div>
                    </div>
                </div>

                <!-- Sección de Salud -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Salud</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="hembra-estado-salud">Estado de Salud</label>
                            <select id="hembra-estado-salud">
                                <option value="excelente">Excelente</option>
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="enfermo">Enfermo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hembra-vacunas">Vacunas al Día</label>
                            <select id="hembra-vacunas">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hembra-tratamientos">Tratamientos/Medicamentos</label>
                        <textarea id="hembra-tratamientos" rows="3" placeholder="Describa tratamientos actuales o recientes"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hembra-enfermedades">Enfermedades/Problemas de Salud</label>
                        <textarea id="hembra-enfermedades" rows="3" placeholder="Describa enfermedades o problemas de salud conocidos"></textarea>
                    </div>
                </div>

 <!-- Sección de fotos -->
                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Fotografías</h4>
                    <div class="photo-upload-container">
                        <div class="photo-preview-container">
                            <div id="photo-preview" class="photo-preview">
                                <i class="fas fa-camera"></i>
                                <p>Vista previa de la foto</p>
                            </div>
                        </div>
                        <div class="photo-upload-controls">
                            <input type="file" id="cria-foto" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-outline" id="btn-select-photo">
                                <i class="fas fa-folder-open"></i> Seleccionar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-take-photo" disabled>
                                <i class="fas fa-camera"></i> Tomar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-remove-photo">
                                <i class="fas fa-trash"></i> Eliminar Foto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sección de Observaciones Generales -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones Generales</h4>
                    <div class="form-group">
                        <textarea id="hembra-observaciones" rows="4" placeholder="Observaciones adicionales sobre la hembra en producción"></textarea>
                    </div>
                </div>

                <!-- Acciones del Formulario -->
                <div class="form-actions">
                    <button type="button" class="btn btn-outline close-modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Hembra en Producción</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para Machos Reproductores -->
<div class="modal" id="modal-machos-reproductores">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3><i class="fas fa-bull"></i> Gestión de Machos Reproductores</h3>
            <button class="close-modal" onclick="cerrarModal('modal-machos-reproductores')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-macho-reproductor">
                <!-- Sección de Información Básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-id">ID/Arete *</label>
                            <input type="text" id="macho-id" required>
                        </div>
                        <div class="form-group">
                            <label for="macho-nombre">Nombre</label>
                            <input type="text" id="macho-nombre" placeholder="Ej: Titán">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-raza">Raza *</label>
                            <select id="macho-raza" required>
                                <option value="">Seleccione una raza</option>
                                <option value="murrah">Murrah</option>
                                <option value="mediterraneo">Mediterráneo</option>
                                <option value="jafarabadi">Jafarabadi</option>
                                <option value="swamp">Swamp</option>
                                <option value="carabao">Carabao</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="macho-pedigree">Número de Pedigree</label>
                            <input type="text" id="macho-pedigree">
                        </div>
                    </div>
                </div>
                
                <!-- Sección de Datos Físicos -->
                <div class="form-section">
                    <h4><i class="fas fa-weight"></i> Datos Físicos</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-edad">Edad (años) *</label>
                            <input type="number" id="macho-edad" min="0" max="30" required>
                        </div>
                        <div class="form-group">
                            <label for="macho-peso">Peso (kg) *</label>
                            <input type="number" id="macho-peso" min="0" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="macho-altura">Altura (cm)</label>
                            <input type="number" id="macho-altura" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-circunferencia">Circunferencia Torácica (cm)</label>
                            <input type="number" id="macho-circunferencia" min="0">
                        </div>
                        <div class="form-group">
                            <label for="macho-condicion-corporal">Condición Corporal</label>
                            <select id="macho-condicion-corporal">
                                <option value="">Seleccione</option>
                                <option value="1">1 - Muy delgado</option>
                                <option value="2">2 - Delgado</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Sobrepeso</option>
                                <option value="5">5 - Obeso</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Sección de Datos Reproductivos -->
                <div class="form-section">
                    <h4><i class="fas fa-dna"></i> Datos Reproductivos</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-fecha-pubertad">Fecha de Pubertad</label>
                            <input type="date" id="macho-fecha-pubertad">
                        </div>
                        <div class="form-group">
                            <label for="macho-fecha-primer-servicio">Primer Servicio</label>
                            <input type="date" id="macho-fecha-primer-servicio">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-calidad-semen">Calidad de Semen</label>
                            <select id="macho-calidad-semen">
                                <option value="">Seleccione</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="mala">Mala</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="macho-concentracion-semen">Concentración Semen (millones/ml)</label>
                            <input type="number" id="macho-concentracion-semen" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-hembras-cubiertas">Hembras Cubiertas (total)</label>
                            <input type="number" id="macho-hembras-cubiertas" min="0">
                        </div>
                        <div class="form-group">
                            <label for="macho-tasa-preñez">Tasa de Preñez (%)</label>
                            <input type="number" id="macho-tasa-preñez" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="macho-metodo-reproduccion">Método de Reproducción</label>
                        <select id="macho-metodo-reproduccion">
                            <option value="">Seleccione</option>
                            <option value="monta-natural">Monta Natural</option>
                            <option value="inseminacion-artificial">Inseminación Artificial</option>
                            <option value="transferencia-embriones">Transferencia de Embriones</option>
                        </select>
                    </div>
                </div>
                
                <!-- Sección de Salud -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Salud</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-estado-salud">Estado de Salud</label>
                            <select id="macho-estado-salud">
                                <option value="excelente">Excelente</option>
                                <option value="bueno" selected>Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="enfermo">Enfermo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="macho-vacunacion">Última Vacunación</label>
                            <input type="date" id="macho-vacunacion">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="macho-enfermedades">Enfermedades/Tratamientos</label>
                        <textarea id="macho-enfermedades" rows="3" placeholder="Registre enfermedades, tratamientos o condiciones especiales"></textarea>
                    </div>
                </div>
                
                <!-- Sección de Gestión -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Gestión</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="macho-lote">Lote/Ubicación *</label>
                            <select id="macho-lote" required>
                                <option value="">Seleccione un lote</option>
                                <option value="lote-1">Lote 1</option>
                                <option value="lote-2">Lote 2</option>
                                <option value="lote-3">Lote 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="macho-estado">Estado del Animal</label>
                            <select id="macho-estado">
                                <option value="activo" selected>Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="en-tratamiento">En Tratamiento</option>
                                <option value="baja">Dado de Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="macho-observaciones">Observaciones</label>
                        <textarea id="macho-observaciones" rows="3" placeholder="Observaciones adicionales"></textarea>
                    </div>
                </div>
                
                 <!-- Sección de fotos -->
                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Fotografías</h4>
                    <div class="photo-upload-container">
                        <div class="photo-preview-container">
                            <div id="photo-preview" class="photo-preview">
                                <i class="fas fa-camera"></i>
                                <p>Vista previa de la foto</p>
                            </div>
                        </div>
                        <div class="photo-upload-controls">
                            <input type="file" id="cria-foto" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-outline" id="btn-select-photo">
                                <i class="fas fa-folder-open"></i> Seleccionar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-take-photo" disabled>
                                <i class="fas fa-camera"></i> Tomar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-remove-photo">
                                <i class="fas fa-trash"></i> Eliminar Foto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sección de observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones</h4>
                    <div class="form-group">
                        <textarea id="cria-observaciones" rows="4" placeholder="Observaciones adicionales sobre el macho reproductor..."></textarea>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-outline close-modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Macho Reproductor</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Modal para Crías este Año -->
<div class="modal" id="modal-crias">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fas fa-baby"></i> Registrar Nueva Cría</h3>
            <button class="close-modal" onclick="cerrarModal('modal-crias')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-cria">
                <!-- Sección de información básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-id">ID/Arete de la Cría</label>
                            <input type="text" id="cria-id" required>
                        </div>
                        <div class="form-group">
                            <label for="cria-nombre">Nombre (opcional)</label>
                            <input type="text" id="cria-nombre">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-sexo">Sexo</label>
                            <select id="cria-sexo" required>
                                <option value="">Seleccione</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-raza">Raza</label>
                            <select id="cria-raza" required>
                                <option value="">Seleccione una raza</option>
                                <option value="murrah">Murrah</option>
                                <option value="mediterraneo">Mediterráneo</option>
                                <option value="jafarabadi">Jafarabadi</option>
                                <option value="swamp">Swamp</option>
                                <option value="carabao">Carabao</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de información del nacimiento -->
                <div class="form-section">
                    <h4><i class="fas fa-calendar-alt"></i> Información del Nacimiento</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-fecha-nacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="cria-fecha-nacimiento" required>
                        </div>
                        <div class="form-group">
                            <label for="cria-peso-nacimiento">Peso al Nacer (kg)</label>
                            <input type="number" id="cria-peso-nacimiento" min="0" step="0.1" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-tipo-parto">Tipo de Parto</label>
                            <select id="cria-tipo-parto" required>
                                <option value="">Seleccione</option>
                                <option value="normal">Normal</option>
                                <option value="dificil">Difícil</option>
                                <option value="cesarea">Cesárea</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-estado-nacimiento">Estado al Nacer</label>
                            <select id="cria-estado-nacimiento" required>
                                <option value="">Seleccione</option>
                                <option value="vivo">Vivo</option>
                                <option value="muerto">Muerto</option>
                                <option value="debil">Débil</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de información de los padres -->
                <div class="form-section">
                    <h4><i class="fas fa-users"></i> Información de los Padres</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-madre">Madre (ID/Arete)</label>
                            <input type="text" id="cria-madre" required>
                        </div>
                        <div class="form-group">
                            <label for="cria-padre">Padre (ID/Arete)</label>
                            <input type="text" id="cria-padre" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-metodo-reproduccion">Método de Reproducción</label>
                            <select id="cria-metodo-reproduccion" required>
                                <option value="">Seleccione</option>
                                <option value="monta-natural">Monta Natural</option>
                                <option value="inseminacion">Inseminación Artificial</option>
                                <option value="transferencia">Transferencia de Embriones</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-fecha-inseminacion">Fecha de Inseminación/Monta</label>
                            <input type="date" id="cria-fecha-inseminacion">
                        </div>
                    </div>
                </div>

                <!-- Sección de ubicación y manejo -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Ubicación y Manejo</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-lote">Lote/Ubicación</label>
                            <select id="cria-lote" required>
                                <option value="">Seleccione un lote</option>
                                <option value="lote1">Lote 1</option>
                                <option value="lote2">Lote 2</option>
                                <option value="lote3">Lote 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-corral">Corral</label>
                            <select id="cria-corral" required>
                                <option value="">Seleccione un corral</option>
                                <option value="corral1">Corral 1</option>
                                <option value="corral2">Corral 2</option>
                                <option value="corral3">Corral 3</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-responsable">Responsable</label>
                            <select id="cria-responsable" required>
                                <option value="">Seleccione responsable</option>
                                <option value="empleado1">Juan Pérez</option>
                                <option value="empleado2">María González</option>
                                <option value="empleado3">Carlos Rodríguez</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-estado-actual">Estado Actual</label>
                            <select id="cria-estado-actual" required>
                                <option value="">Seleccione</option>
                                <option value="saludable">Saludable</option>
                                <option value="en-tratamiento">En Tratamiento</option>
                                <option value="en-observacion">En Observación</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Sección de salud -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Información de Salud</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-vacunas">Vacunas Aplicadas</label>
                            <select id="cria-vacunas" multiple>
                                <option value="vacuna1">Vacuna 1</option>
                                <option value="vacuna2">Vacuna 2</option>
                                <option value="vacuna3">Vacuna 3</option>
                            </select>
                            <small>Mantén presionada la tecla Ctrl para seleccionar múltiples opciones</small>
                        </div>
                        <div class="form-group">
                            <label for="cria-desparasitacion">Fecha de Desparasitación</label>
                            <input type="date" id="cria-desparasitacion">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cria-diagnostico">Diagnóstico Veterinario</label>
                            <select id="cria-diagnostico">
                                <option value="">Seleccione diagnóstico</option>
                                <option value="sano">Sano</option>
                                <option value="respiratorio">Problema Respiratorio</option>
                                <option value="digestivo">Problema Digestivo</option>
                                <option value="parasitos">Parásitos Internos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cria-tratamiento">Tratamiento Aplicado</label>
                            <textarea id="cria-tratamiento" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Sección de fotos -->
                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Fotografías</h4>
                    <div class="photo-upload-container">
                        <div class="photo-preview-container">
                            <div id="photo-preview" class="photo-preview">
                                <i class="fas fa-camera"></i>
                                <p>Vista previa de la foto</p>
                            </div>
                        </div>
                        <div class="photo-upload-controls">
                            <input type="file" id="cria-foto" accept="image/*" style="display: none;">
                            <button type="button" class="btn btn-outline" id="btn-select-photo">
                                <i class="fas fa-folder-open"></i> Seleccionar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-take-photo" disabled>
                                <i class="fas fa-camera"></i> Tomar Foto
                            </button>
                            <button type="button" class="btn btn-outline" id="btn-remove-photo">
                                <i class="fas fa-trash"></i> Eliminar Foto
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sección de observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones</h4>
                    <div class="form-group">
                        <textarea id="cria-observaciones" rows="4" placeholder="Observaciones adicionales sobre la cría..."></textarea>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="form-actions">
                    <button type="button" class="btn btn-outline close-modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Registro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Modal para Tasa de Preñez (agregar después del modal existente) -->
<div class="modal" id="modal-prenez">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h3><i class="fas fa-chart-line"></i> Gestión de Tasa de Preñez</h3>
            <button class="close-modal"  onclick="cerrarModal('modal-prenez')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="form-prenez">
                <!-- Información del Animal -->
                <div class="form-section">
                    <h4><i class="fas fa-buffalo"></i> Información del Animal</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenez-id">ID/Arete del Búfalo *</label>
                            <div class="input-with-search">
                                <input type="text" id="prenez-id" required>
                                <button type="button" class="btn-icon" id="buscar-bufalo-prenez" title="Buscar búfalo">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prenez-nombre">Nombre</label>
                            <input type="text" id="prenez-nombre" readonly>
                        </div>
                        <div class="form-group">
                            <label for="prenez-raza">Raza</label>
                            <input type="text" id="prenez-raza" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenez-lote">Lote/Ubicación</label>
                            <input type="text" id="prenez-lote" readonly>
                        </div>
                        <div class="form-group">
                            <label for="prenez-edad">Edad</label>
                            <input type="text" id="prenez-edad" readonly>
                        </div>
                        <div class="form-group">
                            <label for="prenez-peso">Peso (kg)</label>
                            <input type="text" id="prenez-peso" readonly>
                        </div>
                    </div>
                </div>
                
                <!-- Información de Preñez -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Información de Preñez</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenez-estado">Estado de Preñez *</label>
                            <select id="prenez-estado" required>
                                <option value="">Seleccione estado</option>
                                <option value="preñada">Preñada</option>
                                <option value="no-preñada">No Preñada</option>
                                <option value="dudosa">Dudosa</option>
                                <option value="aborto">Aborto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prenez-fecha-diagnostico">Fecha de Diagnóstico *</label>
                            <input type="date" id="prenez-fecha-diagnostico" required>
                        </div>
                        <div class="form-group">
                            <label for="prenez-metodo">Método de Diagnóstico *</label>
                            <select id="prenez-metodo" required>
                                <option value="">Seleccione método</option>
                                <option value="palpacion">Palpación Rectal</option>
                                <option value="ultrasonido">Ultrasonido</option>
                                <option value="sangre">Análisis de Sangre</option>
                                <option value="observacion">Observación Conductual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenez-meses">Meses de Gestación</label>
                            <input type="number" id="prenez-meses" min="1" max="11" placeholder="Ej: 3">
                        </div>
                        <div class="form-group">
                            <label for="prenez-fecha-prevista">Fecha Prevista de Parto</label>
                            <input type="date" id="prenez-fecha-prevista">
                        </div>
                        <div class="form-group">
                            <label for="prenez-veterinario">Veterinario Responsable</label>
                            <input type="text" id="prenez-veterinario" placeholder="Nombre del veterinario">
                        </div>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="prenez-observaciones">Observaciones del Diagnóstico</label>
                        <textarea id="prenez-observaciones" rows="3" placeholder="Detalles adicionales sobre el diagnóstico..."></textarea>
                    </div>
                </div>
                
                <!-- Información del Empadre -->
                <div class="form-section">
                    <h4><i class="fas fa-venus-mars"></i> Información del Empadre</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenez-tipo-empadre">Tipo de Empadre</label>
                            <select id="prenez-tipo-empadre">
                                <option value="">Seleccione tipo</option>
                                <option value="monta-natural">Monta Natural</option>
                                <option value="inseminacion">Inseminación Artificial</option>
                                <option value="transferencia">Transferencia de Embriones</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prenez-padre-id">ID del Padre (si aplica)</label>
                            <input type="text" id="prenez-padre-id" placeholder="ID del macho reproductor">
                        </div>
                        <div class="form-group">
                            <label for="prenez-fecha-empadre">Fecha del Empadre</label>
                            <input type="date" id="prenez-fecha-empadre">
                        </div>
                    </div>
                </div>
                
                <!-- Gestión de Fotos -->
                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Gestión de Fotos</h4>
                    <div class="photo-management">
                        <div class="photo-upload-area">
                            <div class="upload-container" id="upload-container">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Arrastra y suelta fotos aquí o</p>
                                <button type="button" class="btn btn-outline" id="btn-select-photos">
                                    <i class="fas fa-folder-open"></i> Seleccionar Archivos
                                </button>
                                <input type="file" id="prenez-fotos" accept="image/*" multiple style="display: none;">
                                <p class="upload-info">Formatos permitidos: JPG, PNG, GIF (Máx. 5MB por imagen)</p>
                            </div>
                        </div>
                        
                        <div class="photo-preview-container" id="photo-preview-container">
                            <h5>Fotos seleccionadas:</h5>
                            <div class="photo-previews" id="photo-previews">
                                <!-- Las previsualizaciones de fotos se agregarán aquí dinámicamente -->
                                <div class="no-photos-message">
                                    <i class="fas fa-images"></i>
                                    <p>No hay fotos seleccionadas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Acciones -->
                <div class="form-actions">
                    <button type="button" class="btn btn-outline close-modal">Cancelar</button>
                    <button type="button" class="btn btn-secondary" id="btn-guardar-borrador">
                        <i class="fas fa-save"></i> Guardar Borrador
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i> Confirmar Diagnóstico
                    </button>
                </div>
            </form>
        </div>
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
    <script src="script-pdf.js"></script>
</body>
</html>