<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agro Ganadero - Vacuno</title>
    <link rel="stylesheet" href="styles.css">
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
            <nav class="main-nav" style="background: white;">
                <ul>
                    <li class="active"><a href="agro-vacuno.php">AgroVacuno</a></li>
                    <li><a href="agro-bufalino.php">AgroBufalino</a></li>
                    <li><a href="agro-cultivo.php">AgroAgricultivo</a></li>
                    <li><a href="agro-inventario.php">AgroInventario</a></li>
                    <li><a href="agro-empleados.php">AgroEmpleados</a></li>

                    <li class="login"><a href="login.php">Iniciar Sesión</a></li>
                    <li class="register"><a href="register.php">Registrarse</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="hacienda-container">
        <div class="hacienda-header">
            <h1><i class="fas fa-cow"></i> Gestión Animal - Vacuno</h1>
            <div class="hacienda-actions">
<!-- En la sección donde está el botón, cambiar a: -->
<button class="btn btn-secondary" onclick="exportarDatosPDF()">
    <i class="fas fa-file-export"></i> Exportar Datos
</button>

            </div>
        </div>

        <!-- Aquí empieza el contenido de la sección datos -->
                    <div class="hacienda-menu">
                        <div class="menu-section active" data-section="datos">
                            <h2><i class="fas fa-database"></i> DATOS <i class="fas fa-caret-down"></i></h2>
                            <div class="menu-content ">
                                <div class="data-cards">

                                    <div class="data-card">
                                        <h3>Vientres</h3>
                                        <p id="vientres-count" class="data-value">0</p>
                                        <button
                                            id="btnAbrirVientres"
                                            class="btn btn-outline btn-icon counter"
                                            title="Agregar Vientres"
                                            onclick="openModalVientres()" 
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="data-card">
                                        <h3>Animales para la Cría</h3>
                                        <p id="crias-count" class="data-value">0</p>
                                        <button
                                            id="btnAbrirCrias"
                                            class="btn btn-outline btn-icon counter"
                                            title="Agregar Animales para la Cría"
                                            onclick="openModalCrias()"
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="data-card">
                                        <h3>Animales Eliminados</h3>
                                        <p id="eliminados-count" class="data-value">0</p>
                                        <button
                                            id="btnAbrirEliminados"
                                            class="btn btn-outline btn-icon counter"
                                            title="Agregar Animales Eliminados"
                                            onclick="openModalEliminados()"
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="data-card">
                                        <h3>Toros en Servicio</h3>
                                        <p id="toros-count" class="data-value">0</p>
                                        <button
                                            id="btnAbrirToros"
                                            class="btn btn-outline btn-icon counter"
                                            title="Agregar Toros en Servicio"
                                            onclick="openModalToros()"
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="data-card">
                                        <h3>Inseminadores</h3>
                                        <p id="inseminadores-count" class="data-value">0</p>
                                        <button
                                            id="btnAbrirInseminadores"
                                            class="btn btn-outline btn-icon counter"
                                            title="Agregar Inseminadores"
                                            onclick="openModalInseminadores()"
                                        >
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>

                                    <div class="data-card highlight">
                                        <h3>Índices Globales</h3>
                                        <p class="data-value">9.2%</p>
                                        <button class="btn btn-outline btn-icon" title="Agregar Índices Globales" onclick="abrirModal('modalIndices')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>


                                                                <!-- Tablas de Gestión - Sección Datos -->
                                <div class="tablas-gestion" style="margin-top: 30px;">
                                    <!-- Tabla para Vientres -->
                                    <div class="tabla-container" id="tablaVientres">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-cow"></i> Vientres</h3>

                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Raza</th>
                                                        <th>Edad (meses)</th>
                                                        <th>Peso (kg)</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaVientresBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tabla para Animales para la Cría -->
                                    <div class="tabla-container" id="tablaCria">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-baby"></i> Animales para la Cría</h3>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Categoría</th>
                                                        <th>Raza</th>
                                                        <th>Peso (kg)</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaCriaBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tabla para Animales Eliminados -->
                                    <div class="tabla-container" id="tablaEliminados">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-times-circle"></i> Animales Eliminados</h3>
                                        
                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Motivo</th>
                                                        <th>Fecha</th>
                                                        <th>Destino</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaEliminadosBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tabla para Toros en Servicio -->
                                    <div class="tabla-container" id="tablaToros">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-horse"></i> Toros en Servicio</h3>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Raza</th>
                                                        <th>Edad (meses)</th>
                                                        <th>Vientres Asignados</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaTorosBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tabla para Inseminadores -->
                                    <div class="tabla-container" id="tablaInseminadores">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-user-md"></i> Inseminadores</h3>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Nombre</th>
                                                        <th>Teléfono</th>
                                                        <th>Experiencia (años)</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaInseminadoresBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Tabla para Índices Globales -->
                                    <div class="tabla-container" id="tablaIndices">
                                        <div class="tabla-header">
                                            <h3><i class="fas fa-chart-line"></i> Índices Globales</h3>
                                            
                                        </div>
                                        <div class="table-responsive">
                                            <table class="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Período</th>
                                                        <th>Tasa Preñez (%)</th>
                                                        <th>Tasa Destete (%)</th>
                                                        <th>Producción Leche (L/día)</th>
                                                        <th>Ganancia Peso (g/día)</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tablaIndicesBody">
                                                    <!-- Los datos se cargarán dinámicamente -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Confirmación para Eliminar -->
                                <div id="modalConfirmacion" class="modal">
                                    <div class="modal-content" style="max-width: 500px;">
                                        <div class="modal-header">
                                            <h3><i class="fas fa-exclamation-triangle"></i> Confirmar Eliminación</h3>
                                            <button class="close-modal" onclick="cerrarModal('modalConfirmacion')">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Está seguro de que desea eliminar este registro? Esta acción no se puede deshacer.</p>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalConfirmacion')">Cancelar</button>
                                                <button type="button" class="btn btn-danger" id="btnConfirmarEliminar">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>


                        

                        

                    <div class="menu-section " data-section="eventos">
                            <h2><i class="fas fa-calendar-alt"></i> EVENTOS <i class="fas fa-caret-right"></i></h2>
                        <div class="menu-content">
                            <div class="data-cards">
                                <div class="data-card">
                                    <h3>Reproductivos</h3>
                                    <p class="data-value">11</p>
                                    <button class="btn btn-outline btn-icon" title="Agregar Reproductivos" onclick="abrirModal('modalServicios')"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="data-card">
                                    <h3>Tratamientos</h3>
                                    <p class="data-value">15</p>
                                    <button class="btn btn-outline btn-icon" title="Agregar Tratamientos" onclick="abrirModal('modalPalpitaciones')"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="data-card">
                                    <h3>Producción Lactea</h3>
                                    <p class="data-value">10</p>
                                    <button class="btn btn-outline btn-icon" title="Agregar Producción Lactea" onclick="abrirModal('modalProduccionLactea')"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="data-card highlight">
                                    <h3>Peso Corporal</h3>
                                    <p class="data-value">9</p>
                                    <button class="btn btn-outline btn-icon" title="Agregar Peso Corporal" onclick="abrirModal('modalPesoCorporal')"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="data-card highlight">
                                    <h3>Notas</h3>
                                    <p class="data-value">5</p>
                                    <button class="btn btn-outline btn-icon" title="Agregar Notas" onclick="abrirModal('modalNotas')"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                                                        <!-- Tablas de Gestión - Sección Eventos -->
                            <div class="tablas-gestion" style="margin-top: 30px;">
                                <!-- Tabla para Eventos Reproductivos -->
                                <div class="tabla-container" id="tablaReproductivos">
                                    <div class="tabla-header">
                                        <h3><i class="fas fa-syringe"></i> Eventos Reproductivos</h3>
                                
                                    </div>
                                    <div class="table-responsive">
                                        <table class="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Código Vientre</th>
                                                    <th>Tipo Servicio</th>
                                                    <th>Fecha</th>
                                                    <th>Toro/Semen</th>
                                                    <th>Resultado</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaReproductivosBody">
                                                <!-- Los datos se cargarán dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tabla para Tratamientos -->
                                <div class="tabla-container" id="tablaTratamientos">
                                    <div class="tabla-header">
                                        <h3><i class="fas fa-stethoscope"></i> Tratamientos</h3>
                                    
                                    </div>
                                    <div class="table-responsive">
                                        <table class="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Código Animal</th>
                                                    <th>Tipo Tratamiento</th>
                                                    <th>Fecha</th>
                                                    <th>Diagnóstico</th>
                                                    <th>Medicamento</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaTratamientosBody">
                                                <!-- Los datos se cargarán dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tabla para Producción Láctea -->
                                <div class="tabla-container" id="tablaProduccionLactea">
                                    <div class="tabla-header">
                                        <h3><i class="fas fa-weight"></i> Producción Láctea</h3>
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Código Vaca</th>
                                                    <th>Fecha</th>
                                                    <th>Producción (L)</th>
                                                    <th>Grasa (%)</th>
                                                    <th>Proteína (%)</th>
                                                    <th>Turno</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaProduccionLacteaBody">
                                                <!-- Los datos se cargarán dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tabla para Peso Corporal -->
                                <div class="tabla-container" id="tablaPesoCorporal">
                                    <div class="tabla-header">
                                        <h3><i class="fas fa-weight-scale"></i> Peso Corporal</h3>
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Código Animal</th>
                                                    <th>Fecha</th>
                                                    <th>Peso (kg)</th>
                                                    <th>Condición Corporal</th>
                                                    <th>Variación (kg)</th>
                                                    <th>Responsable</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaPesoCorporalBody">
                                                <!-- Los datos se cargarán dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tabla para Notas -->
                                <div class="tabla-container" id="tablaNotas">
                                    <div class="tabla-header">
                                        <h3><i class="fas fa-sticky-note"></i> Notas</h3>
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Título</th>
                                                    <th>Categoría</th>
                                                    <th>Fecha</th>
                                                    <th>Prioridad</th>
                                                    <th>Estado</th>
                                                    <th>Autor</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaNotasBody">
                                                <!-- Los datos se cargarán dinámicamente -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="menu-section" data-section="configuracion">
                <h2><i class="fas fa-cog"></i> CONFIGURACIÓN <i class="fas fa-caret-right"></i></h2>
                <div class="menu-content ">
                    <div class="data-cards">
                        <div class="data-card">
                            <h3>Razas</h3>
                            <p class="data-value">13</p>
                            <button class="btn btn-outline btn-icon" title="Agregar Razas" onclick="abrirModal('modalRazas')"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="data-card">
                            <h3>Corrales</h3>
                            <p class="data-value">18</p>
                            <button class="btn btn-outline btn-icon" title="Agregar Corrales" onclick="abrirModal('modalCorrales')"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="data-card">
                            <h3>Grupos</h3>
                            <p class="data-value">16</p>
                            <button class="btn btn-outline btn-icon" title="Agregar Grupos" onclick="abrirModal('modalGrupos')"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="data-card highlight">
                            <h3>Cruces</h3>
                            <p class="data-value">0</p>
                            <button class="btn btn-outline btn-icon" title="Agregar Cruces" onclick="abrirModal('modalCruces')"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="data-card highlight">
                            <h3>Diagnosticos Veterinarios</h3>
                            <p class="data-value">0</p>
                            <button class="btn btn-outline btn-icon" title="Agregar Diagnosticos Veterinarios" onclick="abrirModal('modalDiagnosticosVeterinarios')"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    
                        <!-- Tablas de Gestión - Sección Configuración -->
                        <div class="tablas-gestion" style="margin-top: 30px;">
                            <!-- Tabla para Razas -->
                            <div class="tabla-container" id="tablaRazas">
                                <div class="tabla-header">
                                    <h3><i class="fas fa-dna"></i> Razas</h3>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Origen</th>
                                                <th>Propósito</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaRazasBody">
                                            <!-- Los datos se cargarán dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tabla para Corrales -->
                            <div class="tabla-container" id="tablaCorrales">
                                <div class="tabla-header">
                                    <h3><i class="fas fa-vector-square"></i> Corrales</h3>
                                
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Ubicación</th>
                                                <th>Capacidad</th>
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

                            <!-- Tabla para Grupos -->
                            <div class="tabla-container" id="tablaGrupos">
                                <div class="tabla-header">
                                    <h3><i class="fas fa-users"></i> Grupos</h3>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Descripción</th>
                                                <th>Animales</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaGruposBody">
                                            <!-- Los datos se cargarán dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tabla para Cruces -->
                            <div class="tabla-container" id="tablaCruces">
                                <div class="tabla-header">
                                    <h3><i class="fas fa-project-diagram"></i> Cruces</h3>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Raza Padre</th>
                                                <th>Raza Madre</th>
                                                <th>Proporción</th>
                                                <th>Propósito</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaCrucesBody">
                                            <!-- Los datos se cargarán dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Tabla para Diagnósticos Veterinarios -->
                            <div class="tabla-container" id="tablaDiagnosticos">
                                <div class="tabla-header">
                                    <h3><i class="fas fa-file-medical"></i> Diagnósticos Veterinarios</h3>
                                    
                                </div>
                                <div class="table-responsive">
                                    <table class="data-table">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Categoría</th>
                                                <th>Síntomas</th>
                                                <th>Gravedad</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaDiagnosticosBody">
                                            <!-- Los datos se cargarán dinámicamente -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </main>    

<!-- Modal para Vientres con Ficha del Animal -->
<!-- Modal para Vientres con Ficha del Animal - Versión Ampliada -->
<div id="modalVientres" class="modal">
    <div class="modal-content" style="max-width: 900px;">
        <div class="modal-header">
            <h3><i class="fas fa-cow"></i> Datos del Vientre</h3>
            <button class="close-modal" onclick="cerrarModal('modalVientres')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formVientresUnico" onsubmit="guardarVientreUnico(event)">
                
                <!-- Información Básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombreAnimal">Nombre del Animal *</label>
                            <input type="text" id="nombreAnimal" name="nombre_animal" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoAnimal">Tipo *</label>
                            <select id="tipoAnimal" name="tipo_animal" required>
                                <option value="">Seleccionar</option>
                                <option value="vaca">Vaca</option>
                                <option value="novilla">Novilla</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="codigoAnimal">Código ID *</label>
                            <input type="text" id="codigoAnimal" name="codigo_id_animal" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha Nacimiento</label>
                            <input type="date" id="fechaNacimiento" name="fecha_nac">
                        </div>
                        <div class="form-group">
                            <label for="edadMeses">Edad (meses)</label>
                            <input type="number" id="edadMeses" name="edad_meses" min="0">
                        </div>
                        <div class="form-group">
                            <label for="razaAnimal">Raza Principal</label>
                            <select id="razaAnimal" name="raza_princ">
                                <option value="">Seleccionar</option>
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ubicación y Características -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Ubicación y Características</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="corralAnimal">Corral</label>
                            <input type="text" id="corralAnimal" name="corral_animal">
                        </div>
                        <div class="form-group">
                            <label for="loteAnimal">Lote</label>
                            <input type="text" id="loteAnimal" name="lote_animal">
                        </div>
                        <div class="form-group">
                            <label for="grupoAnimal">Grupo</label>
                            <input type="text" id="grupoAnimal" name="grupo_animal">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="colorAnimal">Color</label>
                            <input type="text" id="colorAnimal" name="color_animal">
                        </div>
                        <div class="form-group">
                            <label for="pesoAnimal">Peso Actual (kg)</label>
                            <input type="number" id="pesoAnimal" name="peso_act" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporal">Condición Corporal</label>
                            <select id="condicionCorporal" name="condi_corp">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Información Reproductiva -->
                <div class="form-section">
                    <h4><i class="fas fa-heart"></i> Información Reproductiva</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="condicionAnimal">Condición Reproductiva</label>
                            <select id="condicionAnimal" name="condicion_reprod">
                                <option value="">Seleccionar</option>
                                <option value="vacia">Vacía</option>
                                <option value="servida">Servida</option>
                                <option value="preñada">Preñada</option>
                                <option value="parida">Parida</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ultimoServicio">Último Servicio</label>
                            <input type="date" id="ultimoServicio" name="ultimo_servicio">
                        </div>
                        <div class="form-group">
                            <label for="diasServida">Días Servida</label>
                            <input type="number" id="diasServida" name="dias_servida" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ultimaPalpitacion">Última Palpitación</label>
                            <input type="date" id="ultimaPalpitacion" name="ultima_palpitacion">
                        </div>
                        <div class="form-group">
                            <label for="proximoParto">Próximo Parto</label>
                            <input type="date" id="proximoParto" name="proximo_parto">
                        </div>
                        <div class="form-group">
                            <label for="resultadoAnimal">Resultado Servicio</label>
                            <select id="resultadoAnimal" name="resultado_serv">
                                <option value="">Seleccionar</option>
                                <option value="preñada">Preñada</option>
                                <option value="vacia">Vacía</option>
                                <option value="repetidora">Repetidora</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Información Productiva -->
                <div class="form-section">
                    <h4><i class="fas fa-chart-line"></i> Información Productiva</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoAnimal">Estado Productivo</label>
                            <select id="estadoAnimal" name="estado_prod">
                                <option value="">Seleccionar</option>
                                <option value="lactancia">En Lactancia</option>
                                <option value="seca">Seca</option>
                                <option value="desarrollo">En Desarrollo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ultimoParto">Último Parto</label>
                            <input type="date" id="ultimoParto" name="ultimo_parto">
                        </div>
                        <div class="form-group">
                            <label for="numeroPartos">Número de Partos</label>
                            <input type="number" id="numeroPartos" name="numero_partos" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="promedioProduccion">Producción Promedio (L/día)</label>
                            <input type="number" id="promedioProduccion" name="promedio_produccion" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="diasParida">Días Parida</label>
                            <input type="number" id="diasParida" name="dias_parida" min="0">
                        </div>
                        <div class="form-group">
                            <label for="calidadLeche">Calidad de Leche</label>
                            <select id="calidadLeche" name="calidad_leche">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Origen y Observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Información Adicional</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaIngreso">Fecha de Ingreso</label>
                            <input type="date" id="fechaIngreso" name="fecha_ingr">
                        </div>
                        <div class="form-group">
                            <label for="origenAnimal">Origen</label>
                            <select id="origenAnimal" name="origen_animal">
                                <option value="">Seleccionar</option>
                                <option value="cria-propia">Cría propia</option>
                                <option value="compra">Compra</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cruceAnimal">Cruce</label>
                            <input type="text" id="cruceAnimal" name="cruce_animal">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesGenerales">Observaciones Generales</label>
                            <textarea id="observacionesGenerales" name="obser_gener_foto" rows="3" placeholder="Observaciones adicionales sobre el animal..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="form-actions" style="margin-top: 20px;">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalVientres')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Vientre
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA ANIMALES PARA LA CRIA-->
<!-- Modal para Animales para la Cría - Versión Mejorada -->
<div id="modalCrias" class="modal">
    <div class="modal-content" style="max-width: 700px;">
        <div class="modal-header">
            <h3><i class="fas fa-baby"></i> Registrar Animal para la Cría</h3>
            <button class="close-modal" onclick="cerrarModal('modalCrias')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formCrias" onsubmit="guardarCria(event)">
                
                <!-- Información Básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoIdentificacionCria">Código de Identificación *</label>
                            <input type="text" id="codigoIdentificacionCria" name="codigo_identificacion" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreCria">Nombre *</label>
                            <input type="text" id="nombreCria" name="nombre" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaNacimientoCria">Fecha de Nacimiento *</label>
                            <input type="date" id="fechaNacimientoCria" name="fecha_nacimiento" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoCategoriaCria">Tipo/Categoría *</label>
                            <select id="tipoCategoriaCria" name="tipo_categoria" required>
                                <option value="">Seleccionar</option>
                                <option value="becerra">Becerra</option>
                                <option value="becerro">Becerro</option>
                                <option value="mauta">Mauta</option>
                                <option value="mauto">Mauto</option>
                                <option value="novilla">Novilla</option>
                                <option value="novillo">Novillo</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Información de Origen -->
                <div class="form-section">
                    <h4><i class="fas fa-home"></i> Origen y Genealogía</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoMadreCria">Código Madre *</label>
                            <input type="text" id="codigoMadreCria" name="codigo_madre" required>
                        </div>
                        <div class="form-group">
                            <label for="codigoPadreCria">Código Padre *</label>
                            <input type="text" id="codigoPadreCria" name="codigo_padre" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razaPrincipalCria">Raza Principal *</label>
                            <select id="razaPrincipalCria" name="raza_principal" required>
                                <option value="">Seleccionar raza</option>
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                                <option value="simental">Simental</option>
                                <option value="cruzado">Cruzado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="colorCria">Color *</label>
                            <input type="text" id="colorCria" name="color" required>
                        </div>
                    </div>
                </div>

                <!-- Información de Salud -->
                <div class="form-section">
                    <h4><i class="fas fa-heartbeat"></i> Salud y Desarrollo</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pesoNacimientoCria">Peso al Nacer (kg)</label>
                            <input type="number" id="pesoNacimientoCria" name="peso_nacimiento" step="0.01" min="0">
                        </div>
                        <div class="form-group">
                            <label for="pesoActualCria">Peso Actual (kg)</label>
                            <input type="number" id="pesoActualCria" name="peso_actual" step="0.01" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoSaludCria">Estado de Salud</label>
                            <select id="estadoSaludCria" name="estado_salud">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="enfermo">Enfermo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vacunacionesCria">Vacunaciones</label>
                            <select id="vacunacionesCria" name="vacunaciones">
                                <option value="">Seleccionar</option>
                                <option value="completo">Completo</option>
                                <option value="incompleto">Incompleto</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Ubicación y Manejo -->
                <div class="form-section">
                    <h4><i class="fas fa-map-marker-alt"></i> Ubicación y Manejo</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="loteOrigenCria">Lote de Origen</label>
                            <input type="text" id="loteOrigenCria" name="lote_origen">
                        </div>
                        <div class="form-group">
                            <label for="corralGrupoCria">Corral / Grupo</label>
                            <input type="text" id="corralGrupoCria" name="corral_grupo">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="destinoFinalCria">Destino Final</label>
                            <select id="destinoFinalCria" name="destino_final">
                                <option value="">Seleccionar</option>
                                <option value="reemplazo">Reemplazo</option>
                                <option value="venta">Venta</option>
                                <option value="engorde">Engorde</option>
                                <option value="reproductor">Reproductor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoDesarrolloCria">Estado de Desarrollo</label>
                            <select id="estadoDesarrolloCria" name="estado_desarrollo">
                                <option value="">Seleccionar</option>
                                <option value="optimo">Óptimo</option>
                                <option value="normal">Normal</option>
                                <option value="retrasado">Retrasado</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones</h4>
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesCria">Observaciones Generales</label>
                            <textarea id="observacionesCria" name="observaciones" rows="3" placeholder="Observaciones adicionales sobre el animal..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="form-actions" style="margin-top: 20px;">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalCrias')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Animal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalEliminados" class="modal">
    <div class="modal-content" style="max-width: 800px;">
        <div class="modal-header">
            <h3><i class="fas fa-times-circle"></i> Registrar Animal Eliminado</h3>
            <button class="close-modal" onclick="cerrarModal('modalEliminados')">&times;</button>
        </div>
        <div class="modal-body">
            <form id="formEliminados" onsubmit="guardarEliminado(event)">
                
                <!-- Información Básica -->
                <div class="form-section">
                    <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoEliminado">Código del Animal *</label>
                            <input type="text" id="codigoEliminado" name="codigo_animal" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreEliminado">Nombre del Animal</label>
                            <input type="text" id="nombreEliminado" name="nombre_animal">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaEliminado">Fecha de Eliminación *</label>
                            <input type="date" id="fechaEliminado" name="fecha_eliminacion" required>
                        </div>
                        <div class="form-group">
                            <label for="categoriaEliminado">Categoría del Animal</label>
                            <select id="categoriaEliminado" name="categoria">
                                <option value="">Seleccionar categoría</option>
                                <option value="vaca">Vaca</option>
                                <option value="novilla">Novilla</option>
                                <option value="toro">Toro</option>
                                <option value="novillo">Novillo</option>
                                <option value="becerro">Becerro/a</option>
                                <option value="mauto">Mauto</option>
                                <option value="mauta">Mauta</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razaEliminado">Raza</label>
                            <input type="text" id="razaEliminado" name="raza">
                        </div>
                        <div class="form-group">
                            <label for="loteEliminado">Lote de Procedencia</label>
                            <input type="text" id="loteEliminado" name="lote_procedencia">
                        </div>
                    </div>
                </div>

                <!-- Detalles de Eliminación -->
                <div class="form-section">
                    <h4><i class="fas fa-clipboard-list"></i> Detalles de Eliminación</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="motivoEliminado">Motivo Principal *</label>
                            <select id="motivoEliminado" name="motivo_principal" required>
                                <option value="">Seleccionar motivo</option>
                                <option value="venta">Venta</option>
                                <option value="muerte">Muerte</option>
                                <option value="sacrificio">Sacrificio por enfermedad</option>
                                <option value="baja-productividad">Baja productividad</option>
                                <option value="problemas-reproductivos">Problemas reproductivos</option>
                                <option value="edad-avanzada">Edad avanzada</option>
                                <option value="accidente">Accidente</option>
                                <option value="problemas-conducta">Problemas de conducta</option>
                                <option value="reduccion-inventario">Reducción de inventario</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="causaMuerte">Causa específica (si aplica)</label>
                            <select id="causaMuerte" name="causa_especifica">
                                <option value="">Seleccionar causa</option>
                                <option value="enfermedad-respiratoria">Enfermedad respiratoria</option>
                                <option value="enfermedad-digestiva">Enfermedad digestiva</option>
                                <option value="enfermedad-reproductiva">Enfermedad reproductiva</option>
                                <option value="parasitosis">Parasitosis grave</option>
                                <option value="enfermedad-metabolica">Enfermedad metabólica</option>
                                <option value="accidente-trauma">Accidente/Trauma</option>
                                <option value="complicacion-parto">Complicación de parto</option>
                                <option value="desconocida">Desconocida</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="metodoEliminacion">Método de eliminación</label>
                            <select id="metodoEliminacion" name="metodo_eliminacion">
                                <option value="">Seleccionar método</option>
                                <option value="sacrificio-humano">Sacrificio humanitario</option>
                                <option value="eutanasia">Eutanasia veterinaria</option>
                                <option value="muerte-natural">Muerte natural</option>
                                <option value="venta-directa">Venta directa</option>
                                <option value="subasta">Subasta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="responsableEliminacion">Responsable de la eliminación</label>
                            <input type="text" id="responsableEliminacion" name="responsable">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="diagnosticoVeterinario">Diagnóstico veterinario (si aplica)</label>
                            <input type="text" id="diagnosticoVeterinario" name="diagnostico_veterinario">
                        </div>
                        <div class="form-group">
                            <label for="tratamientosAplicados">Tratamientos aplicados</label>
                            <textarea id="tratamientosAplicados" name="tratamientos_aplicados" rows="2" placeholder="Tratamientos previos a la eliminación..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Características Físicas -->
                <div class="form-section">
                    <h4><i class="fas fa-weight"></i> Características Físicas</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadEliminado">Edad al momento (meses)</label>
                            <input type="number" id="edadEliminado" name="edad_meses" min="0">
                        </div>
                        <div class="form-group">
                            <label for="pesoEliminado">Peso al momento (kg)</label>
                            <input type="number" id="pesoEliminado" name="peso_kg" min="0" step="0.1">
                        </div>
                    </div>
                </div>

                <!-- Aspectos Económicos -->
                <div class="form-section">
                    <h4><i class="fas fa-dollar-sign"></i> Aspectos Económicos</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="valorMercado">Valor estimado en mercado ($)</label>
                            <input type="number" id="valorMercado" name="valor_estimado" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="precioVenta">Precio de venta real ($)</label>
                            <input type="number" id="precioVenta" name="precio_venta_real" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="destinoFinal">Destino final del animal</label>
                            <select id="destinoFinal" name="destino_final">
                                <option value="">Seleccionar destino</option>
                                <option value="carniceria">Carnicería/Matadero</option>
                                <option value="otra-finca">Otra finca/Productor</option>
                                <option value="consumo-interno">Consumo interno</option>
                                <option value="entierro">Entierro</option>
                                <option value="incineracion">Incineración</option>
                                <option value="transformacion">Transformación (cuero, etc.)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="costosEliminacion">Costos asociados ($)</label>
                            <input type="number" id="costosEliminacion" name="costos_asociados" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="perdidaEstimada">Pérdida económica estimada ($)</label>
                            <input type="number" id="perdidaEstimada" name="perdida_estimada" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="seguroCubierto">¿Cubierto por seguro?</label>
                            <select id="seguroCubierto" name="cubierto_seguro">
                                <option value="">Seleccionar</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                                <option value="parcial">Parcialmente</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionCostos">Descripción de costos</label>
                            <textarea id="descripcionCostos" name="descripcion_costos" rows="2" placeholder="Ej: Honorarios veterinarios, transporte, etc."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Observaciones -->
                <div class="form-section">
                    <h4><i class="fas fa-sticky-note"></i> Observaciones</h4>
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesEliminacion">Observaciones adicionales</label>
                            <textarea id="observacionesEliminacion" name="observaciones" rows="3" placeholder="Observaciones adicionales sobre la eliminación..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h4><i class="fas fa-camera"></i> Evidencia Fotográfica (Opcional)</h4>
                    <div class="form-row">
                        <div class="form-group full-width">
                            <input type="file" id="fotosEliminado" name="fotos" accept="image/*" multiple>
                            <small class="text-muted">Puede adjuntar fotos como evidencia (opcional)</small>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="form-actions" style="margin-top: 20px;">
                    <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalEliminados')">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Registro
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL PARA TOROS EN SERVICIO-->
<!-- Modal para Toros en Servicio - Versión Mejorada -->
<div id="modalToros" class="modal">
    <div class="modal-content" style="max-width: 900px;">
        <div class="modal-header">
            <h3><i class="fas fa-horse"></i> Registro de Toros en Servicio</h3>
            <button class="close-modal" onclick="cerrarModal('modalToros')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'toros-datos')">Datos del Toro</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'toros-reproduccion')">Datos Reproductivos</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'toros-salud')">Salud y Seguimiento</button>
            </div>

            <!-- Sección 1: Datos del Toro -->
            <div id="toros-datos" class="tab-content active">
                <form id="formTorosDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoToro">Código de Identificación *</label>
                            <input type="text" id="codigoToro" name="codigo_id_toro" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreToro">Nombre del Toro</label>
                            <input type="text" id="nombreToro" name="nombre_toro">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razaToro">Raza *</label>
                            <select id="razaToro" name="raza_toro" required>
                                <option value="">Seleccionar raza</option>
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                                <option value="simental">Simental</option>
                                <option value="limousin">Limousin</option>
                                <option value="charolais">Charolais</option>
                                <option value="guzerat">Guzerat</option>
                                <option value="gyr">Gyr</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="procedenciaToro">Procedencia</label>
                            <select id="procedenciaToro" name="procedencia_toro">
                                <option value="">Seleccionar procedencia</option>
                                <option value="cria-propia">Cría propia</option>
                                <option value="compra-nacional">Compra nacional</option>
                                <option value="importacion">Importación</option>
                                <option value="subasta">Subasta</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaNacimientoToro">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimientoToro" name="fecha_nac_toro">
                        </div>
                        <div class="form-group">
                            <label for="edadToro">Edad (meses)</label>
                            <input type="number" id="edadToro" name="edad_toro" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pesoToro">Peso Actual (kg)</label>
                            <input type="number" id="pesoToro" name="peso_actual_toro" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporal">Condición Corporal (1-5)</label>
                            <select id="condicionCorporal" name="condi_corp_toro">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="loteAsignado">Lote/Lote asignado</label>
                            <input type="text" id="loteAsignado" name="lote_asig_toro">
                        </div>
                        <div class="form-group">
                            <label for="corralToro">Corral/Potrero</label>
                            <input type="text" id="corralToro" name="corral_toro">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalToros')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'toros-reproduccion')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Datos Reproductivos -->
            <div id="toros-reproduccion" class="tab-content">                     
                <form id="formTorosReproduccion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaInicioServicio">Fecha de Inicio en Servicio *</label>
                            <input type="date" id="fechaInicioServicio" name="fecha_inicio_serv_toro" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoServicio">Tipo de Servicio</label>
                            <select id="tipoServicio" name="tipo_servicio_toro">
                                <option value="">Seleccionar tipo</option>
                                <option value="monta-directa">Monta directa</option>
                                <option value="inseminacion">Inseminación artificial</option>
                                <option value="transferencia">Transferencia de embriones</option>
                                <option value="mixto">Sistema mixto</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="numeroVientres">Número de Vientres Asignados</label>
                            <input type="number" id="numeroVientres" name="numero_vientres_asig_toro" min="0">
                        </div>
                        <div class="form-group">
                            <label for="ratioMonta">Ratio de Monta (vientres/toro)</label>
                            <input type="number" id="ratioMonta" name="ratio_monta_toro" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="serviciosRealizados">Servicios Realizados (este período)</label>
                            <input type="number" id="serviciosRealizados" name="servicios_reali_toro" min="0">
                        </div>
                        <div class="form-group">
                            <label for="preñezConfirmada">Preñez Confirmada</label>
                            <input type="number" id="preñezConfirmada" name="preniez_confir_toro" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tasaPreñez">Tasa de Preñez (%)</label>
                            <input type="number" id="tasaPreñez" name="tasa_preniez_toro" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="eficienciaReproductiva">Eficiencia Reproductiva</label>
                            <select id="eficienciaReproductiva" name="eficiencia_reproduc_toro">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="mala">Mala</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesReproduccion">Observaciones Reproductivas</label>
                            <textarea id="observacionesReproduccion" name="observ_reproduc_toro" rows="3" placeholder="Comportamiento, libido, preferencias, etc."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'toros-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'toros-salud')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Salud y Seguimiento -->
            <div id="toros-salud" class="tab-content">
                <form id="formTorosSaludSeguimiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoSaludToro">Estado de Salud General</label>
                            <select id="estadoSaludToro" name="estado_salud_toro">
                                <option value="">Seleccionar estado</option>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="en-tratamiento">En tratamiento</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ultimaRevisionToro">Última Revisión Veterinaria</label>
                            <input type="date" id="ultimaRevisionToro" name="ultima_revision_veterinaria">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="vacunacionesToro">Vacunaciones al Día</label>
                            <select id="vacunacionesToro" name="vacunaciones_al_dia">
                                <option value="">Seleccionar</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                                <option value="parcialmente">Parcialmente</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fertilidadToro">Evaluación de Fertilidad</label>
                            <select id="fertilidadToro" name="evaluacion_fertilidad">
                                <option value="">Seleccionar</option>
                                <option value="optima">Óptima</option>
                                <option value="normal">Normal</option>
                                <option value="baja">Baja</option>
                                <option value="no-evaluado">No evaluado</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="enfermedadesToro">Enfermedades Detectadas</label>
                            <input type="text" id="enfermedadesToro" name="enfermedades_detectadas" placeholder="Ej: Brucelosis, Tuberculosis, etc.">
                        </div>
                        <div class="form-group">
                            <label for="tratamientosToro">Tratamientos en Curso</label>
                            <input type="text" id="tratamientosToro" name="tratamientos_en_curso">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="proximoControlToro">Próximo Control Programado</label>
                            <input type="date" id="proximoControlToro" name="proximo_control_programado">
                        </div>
                        <div class="form-group">
                            <label for="responsableToro">Responsable del Seguimiento</label>
                            <input type="text" id="responsableToro" name="responsable_seguimiento" placeholder="Ej: Dr. Pérez, encargado sanidad">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="alimentacionEspecialToro">Alimentación Especial</label>
                            <select id="alimentacionEspecialToro" name="alimentacion_especial">
                                <option value="">Seleccionar</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="planRotacionToro">Plan de Rotación / Descanso</label>
                            <input type="text" id="planRotacionToro" name="plan_rotacion_descanso" placeholder="Ej: 3 meses activo, 1 mes descanso">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesToro">Recomendaciones y Observaciones Finales</label>
                            <textarea id="observacionesToro" name="recomendaciones_observaciones" rows="3" placeholder="Notas sobre estado físico, comportamiento o sugerencias del veterinario."></textarea>
                        </div>
                    </div>

                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'toros-datos-basicos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'toros-reproduccion')">Siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA INSEMINADORES -->
<!-- Modal para Inseminadores - Versión Mejorada -->
<div id="modalInseminadores" class="modal">
    <div class="modal-content" style="max-width: 900px;">
        <div class="modal-header">
            <h3><i class="fas fa-user-md"></i> Registro de Inseminadores</h3>
            <button class="close-modal" onclick="cerrarModal('modalInseminadores')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'inseminadores-datos')">Datos Personales</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'inseminadores-profesional')">Información Profesional</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'inseminadores-asignaciones')">Asignaciones y Horarios</button>
            </div>

            <!-- Sección 1: Datos Personales -->
            <div id="inseminadores-datos" class="tab-content active">
                <form id="formInseminadoresDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoInseminador">Código de Identificación *</label>
                            <input type="text" id="codigoInseminador" name="codigo_id_insemi" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreInseminador">Nombre Completo *</label>
                            <input type="text" id="nombreInseminador" name="nombre_insemi" required>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoDocumento">Tipo de Documento</label>
                            <select id="tipoDocumento" name="tipo_docum_insemi">
                                <option value="">Seleccionar</option>
                                <option value="cedula">Cédula</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="dni">DNI</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numeroDocumento">Número de Documento</label>
                            <input type="text" id="numeroDocumento" name="numero_docum_insemi">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento</label>
                            <input type="date" id="fechaNacimiento" name="fecha_nac_insemi">
                        </div>
                        <div class="form-group">
                            <label for="edadInseminador">Edad</label>
                            <input type="number" id="edadInseminador" name="edad_insemi" min="18" max="70">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefonoInseminador">Teléfono/Celular</label>
                            <input type="tel" id="telefonoInseminador" name="telefono_insemi">
                        </div>
                        <div class="form-group">
                            <label for="emailInseminador">Correo Electrónico</label>
                            <input type="email" id="emailInseminador" name="correo_insemi">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="direccionCiudadInseminador">Dirección / Ciudad</label>
                            <input type="text" id="direccionCiudadInseminador" name="direccion_ciudad_insemi">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaIngreso">Fecha de Ingreso *</label>
                            <input type="date" id="fechaIngreso" name="fecha_ingr_insemi" required>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalInseminadores')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'inseminadores-profesional')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Información Profesional -->
            <div id="inseminadores-profesional" class="tab-content">
                <form id="formInseminadoresProfesional">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nivelEstudios">Nivel de Estudios</label>
                            <select id="nivelEstudios" name="nivel_estudios_insemi">
                                <option value="">Seleccionar</option>
                                <option value="primaria">Primaria</option>
                                <option value="secundaria">Secundaria</option>
                                <option value="tecnico">Técnico</option>
                                <option value="universitario">Universitario</option>
                                <option value="posgrado">Posgrado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tituloProfesional">Título o Certificación</label>
                            <input type="text" id="tituloProfesional" name="titu_certi_insemi" placeholder="Ej: Técnico en IA, MVZ, etc.">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="institucionFormacion">Institución de Formación</label>
                            <input type="text" id="institucionFormacion" name="inst_form_insemi">
                        </div>
                        <div class="form-group">
                            <label for="anoGraduacion">Año de Graduación</label>
                            <input type="number" id="anoGraduacion" name="anio_grad_insemi" min="1950" max="2030">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="experienciaInseminacion">Experiencia en Inseminación (años)</label>
                            <input type="number" id="experienciaInseminacion" name="exp_inseminacion_anios" min="0" step="0.5">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="especializaciones">Especializaciones</label>
                            <select id="especializaciones" name="especializa_insemi" multiple style="height: 100px;">
                                <option value="bovinos-carne">Bovinos de Carne</option>
                                <option value="bovinos-leche">Bovinos de Leche</option>
                                <option value="bufalinos">Bufalinos</option>
                                <option value="transferencia-embriones">Transferencia de Embriones</option>
                                <option value="diagnostico-preñez">Diagnóstico de Preñez</option>
                                <option value="manejo-reproductivo">Manejo Reproductivo</option>
                                <option value="genetica-bovina">Genética Bovina</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="habilidadesTecnicas">Habilidades Técnicas</label>
                            <textarea id="habilidadesTecnicas" name="habili_tecnicas_insemi" rows="4" placeholder="Técnicas dominadas, equipos manejados, etc."></textarea>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'inseminadores-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'inseminadores-asignaciones')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 3: Asignaciones y Horarios -->
            <div id="inseminadores-asignaciones" class="tab-content">
                <form id="formInseminadoresAsignaciones">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoLaboral">Estado Laboral *</label>
                            <select id="estadoLaboral" name="estado_laboral_insemi" required>
                                <option value="">Seleccionar</option>
                                <option value="activo">Activo</option>
                                <option value="vacaciones">Vacaciones</option>
                                <option value="licencia">Licencia</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipoContrato">Tipo de Contrato</label>
                            <select id="tipoContrato" name="tipo_contrato_insemi">
                                <option value="">Seleccionar</option>
                                <option value="fijo">Fijo</option>
                                <option value="temporal">Temporal</option>
                                <option value="por-servicio">Por Servicio</option>
                                <option value="externo">Externo/Consultor</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="horarioTrabajo">Horario de Trabajo</label>
                            <input type="text" id="horarioTrabajo" name="horario_trabajo_insemi" placeholder="Ej: Lunes a Viernes 6:00-14:00">
                        </div>
                        <div class="form-group">
                            <label for="diasDescanso">Días de Descanso</label>
                            <input type="text" id="diasDescanso" name="dias_descanso_insemi" placeholder="Ej: Sábado y Domingo">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="lotesAsignados">Lotes/Fincas Asignados</label>
                            <textarea id="lotesAsignados" name="lotes_fincas_asignados" rows="3" placeholder="Lotes específicos bajo su responsabilidad"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="equiposAsignados">Equipos Asignados</label>
                            <textarea id="equiposAsignados" name="equipos_asignados_insemi" rows="3" placeholder="Pistolas, termos, etc. bajo su cuidado"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="salarioBase">Salario Base ($)</label>
                            <input type="number" id="salarioBase" name="salario_base_insemi" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="bonosRendimiento">Bonos por Rendimiento ($)</label>
                            <input type="number" id="bonosRendimiento" name="bonos_rendi_insemi" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="seguroMedico">Seguro Médico</label>
                            <select id="seguroMedico" name="seguro_medico_insemi">
                                <option value="">Seleccionar</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                                <option value="parcial">Parcial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fechaProximaEvaluacion">Próxima Evaluación</label>
                            <input type="date" id="fechaProximaEvaluacion" name="proxima_evaluacion_insemi">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesGenerales">Observaciones Generales</label>
                            <textarea id="observacionesGenerales" name="obser_gener_insemi" rows="3" placeholder="Información adicional relevante"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'inseminadores-rendimiento')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarInseminador()">Guardar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA INDICES GLOBALES -->
<!-- Modal para Índices Globales - Versión Mejorada -->
<div id="modalIndices" class="modal">
    <div class="modal-content" style="max-width: 900px;">
        <div class="modal-header">
            <h3><i class="fas fa-chart-line"></i> Registro de Índices Globales</h3>
            <button class="close-modal" onclick="cerrarModal('modalIndices')">&times;</button>
        </div>
        <div class="modal-body">

            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'indices-reproductivos')">Reproductivos y Sanidad</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'indices-productivos')">Productivos</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'indices-economicos')">Económicos</button>
            </div>

            <!-- Sección 1: Índices Reproductivos -->
            <div id="indices-reproductivos" class="tab-content active">
                <form id="formIndicesReproductivos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tasaPreñez">Tasa de Preñez (%) *</label>
                            <input type="number" id="tasaPreñez" name="tasa_preñez" min="0" max="100" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="tasaParicion">Tasa de Parición (%)</label>
                            <input type="number" id="tasaParicion" name="tasa_paricion" min="0" max="100" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tasaDestete">Tasa de Destete (%)</label>
                            <input type="number" id="tasaDestete" name="tasa_destete" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="intervaloPartos">Intervalo entre Partos (días)</label>
                            <input type="number" id="intervaloPartos" name="intervalo_partos" min="0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tasaAbortos">Tasa de Abortos (%)</label>
                            <input type="number" id="tasaAbortos" name="tasa_abortos" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="mortalidadCria">Mortalidad en Crías (%)</label>
                            <input type="number" id="mortalidadCria" name="mortalidad_cria" min="0" max="100" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mastitis">Incidencia de Mastitis (%)</label>
                            <input type="number" id="mastitis" name="incidencia_mastitis" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="descarteAnual">Tasa de Descarte Anual (%)</label>
                            <input type="number" id="descarteAnual" name="tasa_descarte_anual" min="0" max="100" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalIndices')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'indices-productivos')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Índices Productivos -->
            <div id="indices-productivos" class="tab-content">
                <form id="formIndicesProductivos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionLeche">Producción de Leche (L/vaca/día)</label>
                            <input type="number" id="produccionLeche" name="produccion_leche" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="grasaButirosa">Grasa Butirosa (%)</label>
                            <input type="number" id="grasaButirosa" name="grasa_butirosa" min="0" max="100" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="proteinaLeche">Proteína en Leche (%)</label>
                            <input type="number" id="proteinaLeche" name="proteina_leche" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="gananciaDiaria">Ganancia Diaria de Peso (g/día)</label>
                            <input type="number" id="gananciaDiaria" name="ganancia_diaria" min="0" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionCarne">Producción de Carne (kg/ha/año)</label>
                            <input type="number" id="produccionCarne" name="produccion_carne" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="indiceProductividad">Índice de Productividad Global</label>
                            <input type="number" id="indiceProductividad" name="indice_productividad" min="0" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cargaAnimal">Carga Animal (UA/ha)</label>
                            <input type="number" id="cargaAnimal" name="carga_animal" min="0" step="0.01">
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'indices-reproductivos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'indices-economicos')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Índices Económicos -->
            <div id="indices-economicos" class="tab-content">
                <form id="formIndicesEconomicos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costoAlimentacion">Costo de Alimentación ($/animal/día)</label>
                            <input type="number" id="costoAlimentacion" name="costo_alimentacion" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="costoManoObra">Costo de Mano de Obra ($/animal)</label>
                            <input type="number" id="costoManoObra" name="costo_mano_obra" min="0" step="0.01">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="valorTernero">Valor del Ternero al Destete ($)</label>
                            <input type="number" id="valorTernero" name="valor_ternero" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="precioLeche">Precio de Venta Leche ($/L)</label>
                            <input type="number" id="precioLeche" name="precio_leche" min="0" step="0.01">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="periodoIndices">Período de Evaluación</label>
                            <select id="periodoIndices" name="periodo_evaluacion" required>
                                <option value="">Seleccionar período</option>
                                <option value="mensual">Mensual</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                                <option value="zafra">Por Zafra</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'indices-productivos')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarIndices()">Guardar Índices</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<!-- MODAL PARA SERVICIOS - VERSION MEJORADA -->
<div id="modalServicios" class="modal">
    <div class="modal-content" style="max-width: 950px;">
        <div class="modal-header">
            <h3><i class="fas fa-syringe"></i> Registro de Eventos Reproductivo</h3>
            <button class="close-modal" onclick="cerrarModal('modalServicios')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'servicio-datos')">Datos del Servicio</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'servicio-animal')">Datos de las Palpitaciones</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'servicio-tecnico')">Datos de los Partos</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'servicio-seguimiento')">Datos de Secado</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'servicio-evidencia')">Evidencia y Documentos</button>
</div>
            </div>

            <!-- Sección 1: Datos del Servicio -->
            <div id="servicio-datos" class="tab-content active">
                <form id="formServicioDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoVientre">Código del Vientre *</label>
                            <input type="text" id="codigoVientre" name="codigoVientre" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaServicio">Fecha del Servicio *</label>
                            <input type="datetime-local" id="fechaServicio" name="fechaServicio" required>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoServicio">Tipo de Servicio *</label>
                            <select id="tipoServicio" name="tipoServicio" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="monta-natural">Monta Natural</option>
                                <option value="inseminacion-artificial">Inseminación Artificial Convencional</option>
                                <option value="transferencia-embriones">Transferencia de Embriones</option>
                                <option value="servicio-dirigido">Servicio Dirigido</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metodoDeteccion">Método de Detección de Celos</label>
                            <select id="metodoDeteccion" name="metodoDeteccion">
                                <option value="">Seleccionar método</option>
                                <option value="observacion-visual">Observación Visual</option>
                                <option value="margen-celos">Margen de Celos</option>
                                <option value="toros-marcadores">Toros Marcadores</option>
                                <option value="monitoreo-electronico">Monitoreo Electrónico</option>
                                <option value="protocolo-hormonal">Protocolo Hormonal</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="numeroServicio">Número de Servicio en este Celo</label>
                            <select id="numeroServicio" name="numeroServicio">
                                <option value="1">1er Servicio</option>
                                <option value="2">2do Servicio</option>
                                <option value="3">3er Servicio o más</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporal">Condición Corporal</label>
                            <input type="number" id="condicionCorporal" name="condicionCorporal" min="1" max="5" step="0.1" placeholder="1.0 - 5.0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadMeses">Edad (meses)</label>
                            <input type="number" id="edadMeses" name="edadMeses" min="0" placeholder="Ej: 24">
                        </div>
                        <div class="form-group">
                            <label for="intencionServicio">Intención del Servicio</label>
                            <select id="intencionServicio" name="intencionServicio">
                                <option value="">Seleccionar</option>
                                <option value="preñez">Obtención de Preñez</option>
                                <option value="sincronizacion">Sincronización</option>
                                <option value="prueba-fertilidad">Prueba de Fertilidad</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoToro">Código del Toro/Semen</label>
                            <input type="text" id="codigoToro" name="codigoToro" placeholder="Código o ID del semen">
                        </div>
                        <div class="form-group">
                            <label for="razaToro">Raza del Toro</label>
                            <input type="text" id="razaToro" name="razaToro" placeholder="Ej: Brahman, Holstein...">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="calidadSemen">Calidad del Semen</label>
                            <select id="calidadSemen" name="calidadSemen">
                                <option value="">Seleccionar calidad</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="mala">Mala</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="protocoloHormonal">Protocolo Hormonal Utilizado</label>
                            <select id="protocoloHormonal" name="protocoloHormonal">
                                <option value="">Seleccionar</option>
                                <option value="ninguno">Ninguno</option>
                                <option value="pgf2a">PGF2a</option>
                                <option value="cidr-pgf2a">CIDR + PGF2a</option>
                                <option value="ovsynch">Ovsynch</option>
                                <option value="cosynch">Cosynch</option>
                                <option value="presynch">Presynch</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaPartoEstimado">Fecha de Parto Estimada</label>
                            <input type="date" id="fechaPartoEstimado" name="fechaPartoEstimado">
                        </div>
                        <div class="form-group">
                            <label for="resultadoServicio">Resultado del Servicio</label>
                            <select id="resultadoServicio" name="resultadoServicio">
                                <option value="">Seleccionar resultado</option>
                                <option value="pendiente">Pendiente de Diagnóstico</option>
                                <option value="preñada">Preñada</option>
                                <option value="vacia">Vacía</option>
                                <option value="repetidora">Repetidora</option>
                                <option value="aborto">Aborto</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="metodoDiagnostico">Método de Diagnóstico</label>
                            <select id="metodoDiagnostico" name="metodoDiagnostico">
                                <option value="">Seleccionar método</option>
                                <option value="palpitacion">Palpitación Rectal</option>
                                <option value="ultrasonido">Ultrasonido</option>
                                <option value="test-sangre">Test de Sangre</option>
                                <option value="observacion-celos">Observación de Celos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comentariosFinales">Comentarios y Observaciones Finales</label>
                            <textarea id="comentariosFinales" name="comentariosFinales" rows="3" placeholder="Observaciones adicionales..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalServicios')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'servicio-animal')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Datos de las palpitaciones -->
            <div id="servicio-animal" class="tab-content">
                <form id="formServicioAnimal">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoVientre">Código del Vientre *</label>
                            <input type="text" id="codigoVientre" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaPalpitacion">Fecha de Palpitación *</label>
                            <input type="date" id="fechaPalpitacion" required>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoPalpitacion">Tipo de Palpitación *</label>
                            <select id="tipoPalpitacion" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="rutina">Palpitación de rutina</option>
                                <option value="confirmacion">Confirmación de preñez</option>
                                <option value="seguimiento">Seguimiento de gestación</option>
                                <option value="problema">Por problema detectado</option>
                                <option value="pre-venta">Pre-venta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metodoDiagnostico">Método de Diagnóstico *</label>
                            <select id="metodoDiagnostico" required>
                                <option value="">Seleccionar método</option>
                                <option value="palpitacion-rectal">Palpitación rectal</option>
                                <option value="ultrasonido">Ultrasonido</option>
                                <option value="ultrasonido-doppler">Ultrasonido Doppler</option>
                                <option value="test-sangre">Test de sangre</option>
                                <option value="test-leche">Test de leche</option>
                                <option value="observacion-celos">Observación de celos</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="resultadoPalpitacion">Resultado de la Palpitación *</label>
                            <select id="resultadoPalpitacion" required>
                                <option value="">Seleccionar resultado</option>
                                <option value="preñada">Preñada</option>
                                <option value="vacia">Vacía</option>
                                <option value="dudosa">Dudosa / Repetir</option>
                                <option value="aborto">Aborto reciente</option>
                                <option value="piometra">Piometra</option>
                                <option value="no-diagnosticable">No diagnosticable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edadGestacional">Edad Gestacional Estimada (días)</label>
                            <input type="number" id="edadGestacional" min="0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="numeroFetos">Número de Fetos Detectados</label>
                            <select id="numeroFetos">
                                <option value="">Seleccionar</option>
                                <option value="1">1 feto</option>
                                <option value="2">2 fetos</option>
                                <option value="3">3 fetos o más</option>
                                <option value="no-aplica">No aplica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporal">Condición Corporal (1-5)</label>
                            <select id="condicionCorporal">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="diasGestacion">Días de Gestación Estimados</label>
                            <input type="number" id="diasGestacion" min="0">
                        </div>
                        <div class="form-group">
                            <label for="veterinarioResponsable">Veterinario Responsable</label>
                            <input type="text" id="veterinarioResponsable">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaProximaPalpitacion">Fecha Próxima Palpitación</label>
                            <input type="date" id="fechaProximaPalpitacion">
                        </div>
                        <div class="form-group">
                            <label for="accionesRecomendadas">Acciones Recomendadas</label>
                            <select id="accionesRecomendadas">
                                <option value="">Seleccionar</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="repetir">Repetir palpitación</option>
                                <option value="cambiar-lote">Cambiar de lote</option>
                                <option value="suplementar">Suplementar alimentación</option>
                                <option value="aplicar-tratamiento">Aplicar tratamiento</option>
                                <option value="revision-veterinario">Revisión veterinario</option>
                                <option value="considerar-descarte">Considerar descarte</option>
                                <option value="servicio-inmediato">Servicio inmediato</option>
                                <option value="monitoreo-especial">Monitoreo especial</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesAnimal">Observaciones Generales del Animal</label>
                            <textarea id="observacionesAnimal" rows="3" placeholder="Comportamiento, condición, observaciones..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nivelConfianza">Nivel de Confianza del Diagnóstico</label>
                            <select id="nivelConfianza">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta (>90%)</option>
                                <option value="media">Media (70%-90%)</option>
                                <option value="baja">Baja (<70%)</option>
                                <option value="muy-baja">Muy baja (<50%)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoReproductivo">Estado Reproductivo Actual</label>
                            <select id="estadoReproductivo">
                                <option value="">Seleccionar</option>
                                <option value="gestacion">En gestación</option>
                                <option value="posparto">Posparto</option>
                                <option value="vacia">Vacía</option>
                                <option value="problemas-uterinos">Problemas uterinos</option>
                                <option value="indefinido">Indefinido</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'servicio-datos')">Anterior</button>
                    
                        <!-- 🔹 Botón de guardado -->
                        <button type="submit" class="btn btn-primary" id="btnGuardarPalpitacion">
                            Guardar Cambios
                        </button>
                    
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'servicio-tecnico')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 3: Datos de los Partos -->
            <div id="servicio-tecnico" class="tab-content">
                <form id="formServicioTecnico">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoMadre">Código de la Madre *</label>
                            <input type="text" id="codigoMadre" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaParto">Fecha del Parto *</label>
                            <input type="date" id="fechaParto" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoParto">Tipo de Parto</label>
                            <select id="tipoParto">
                                <option value="">Seleccionar</option>
                                <option value="normal">Normal / Eutócico</option>
                                <option value="distocico">Distócico / Distocia</option>
                                <option value="cesarea">Cesárea</option>
                                <option value="asistido">Asistido</option>
                                <option value="prematuro">Prematuro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asistenciaParto">Asistencia Durante el Parto</label>
                            <select id="asistenciaParto">
                                <option value="">Seleccionar</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="vaquero">Vaquero</option>
                                <option value="veterinario">Veterinario</option>
                                <option value="inseminador">Inseminador</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="complicacionesParto">Complicaciones Durante el Parto</label>
                            <select id="complicacionesParto">
                                <option value="">Seleccionar</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="distocia">Distocia</option>
                                <option value="presentacion-anormal">Presentación Anormal</option>
                                <option value="trabajo-prolongado">Trabajo de Parto Prolongado</option>
                                <option value="hemorragia">Hemorragia</option>
                                <option value="prolapso-uterino">Prolapso Uterino</option>
                                <option value="retencion-placenta">Retención de Placenta</option>
                                <option value="fiebre-vital">Fiebre Vital</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numeroCrias">Número de Crías</label>
                            <select id="numeroCrias">
                                <option value="">Seleccionar</option>
                                <option value="1">1 cría</option>
                                <option value="2">2 crías</option>
                                <option value="3">3 crías</option>
                                <option value="nacimiento-muerto">Nacimiento Muerto</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="criasVivas">Crías Nacidas Vivas</label>
                            <input type="number" id="criasVivas" min="0">
                        </div>
                        <div class="form-group">
                            <label for="codigoCria">Código de la Cría</label>
                            <input type="text" id="codigoCria">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="sexoCria">Sexo de la Cría</label>
                            <select id="sexoCria">
                                <option value="">Seleccionar</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pesoCria">Peso al Nacer (kg)</label>
                            <input type="number" id="pesoCria" min="0" step="0.1">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoCria">Estado al Nacer</label>
                            <input type="text" id="estadoCria" placeholder="Ejemplo: saludable, débil, muerto al nacer">
                        </div>
                        <div class="form-group">
                            <label for="retencionPlacenta">Retención de Placenta</label>
                            <select id="retencionPlacenta">
                                <option value="">Seleccionar</option>
                                <option value="no">No</option>
                                <option value="si-parcial">Sí - Parcial</option>
                                <option value="si-total">Sí - Total</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="veterinarioParto">Veterinario Responsable</label>
                            <input type="text" id="veterinarioParto">
                        </div>
                        <div class="form-group">
                            <label for="identificacionCria">Identificación Aplicada</label>
                            <select id="identificacionCria">
                                <option value="">Seleccionar</option>
                                <option value="arete">Arete</option>
                                <option value="tatuaje">Tatuaje</option>
                                <option value="marca">Marca</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesCrias">Observaciones de las Crías</label>
                            <textarea id="observacionesCrias" rows="3" placeholder="Condición al nacer, comportamiento, cuidados iniciales..."></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'servicio-animal')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'servicio-seguimiento')">Siguiente</button>
                    </div>
                </form>
            </div>


            <!-- Sección 4: Seguimiento -->
            <div id="servicio-seguimiento" class="tab-content">
                <form id="formServicioSeguimiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoVaca">Código de la Vaca *</label>
                            <input type="text" id="codigoVaca" required>
                        </div>
                        <div class="form-group">
                            <label for="fechaSecado">Fecha de Secado</label>
                            <input type="date" id="fechaSecado">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoSecado">Tipo de Secado</label>
                            <select id="tipoSecado">
                                <option value="">Seleccionar</option>
                                <option value="programado">Programado</option>
                                <option value="voluntario">Voluntario / Natural</option>
                                <option value="forzado">Forzado</option>
                                <option value="terapeutico">Terapéutico</option>
                                <option value="pre-parto">Pre-parto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metodoSecado">Método de Secada</label>
                            <select id="metodoSecado">
                                <option value="">Seleccionar</option>
                                <option value="abrupto">Abrupto</option>
                                <option value="gradual">Gradual</option>
                                <option value="intermitente">Intermitente</option>
                                <option value="natural">Natural</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razonSecado">Razón Principal del Secado</label>
                            <select id="razonSecado">
                                <option value="">Seleccionar</option>
                                <option value="programa-reproductivo">Programa Reproductivo</option>
                                <option value="baja-produccion">Baja Producción</option>
                                <option value="problemas-salud">Problemas de Salud</option>
                                <option value="condicion-corporal">Condición Corporal</option>
                                <option value="edad-gestacion">Edad de Gestación</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duracionLactancia">Duración de la Lactancia (días)</label>
                            <input type="number" id="duracionLactancia" min="0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="condicionCorporalSecado">Condición Corporal (1-5)</label>
                            <select id="condicionCorporalSecado">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoSaludSecado">Estado de Salud al Secado</label>
                            <input type="text" id="estadoSaludSecado" placeholder="Ej. saludable, débil, mastitis...">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="problemaMastitis">Problema de Mastitis en Lactancia</label>
                            <select id="problemaMastitis">
                                <option value="">Seleccionar</option>
                                <option value="ninguno">Ninguno</option>
                                <option value="leves">Leves (1-2 casos)</option>
                                <option value="moderados">Moderados (3-5 casos)</option>
                                <option value="grave">Grave (>5 casos)</option>
                                <option value="cronico">Crónico / Recurrente</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produccionPromedio">Producción Promedio de Lactancia (L/día)</label>
                            <input type="number" id="produccionPromedio" min="0" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionTotal">Producción Total de Lactancia (L)</label>
                            <input type="number" id="produccionTotal" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="calidadLeche">Calidad de Leche al Secado</label>
                            <select id="calidadLeche">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="mala">Mala</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tratamientoSecado">Tratamiento de Secado Aplicado</label>
                            <input type="text" id="tratamientoSecado">
                        </div>
                        <div class="form-group">
                            <label for="analisisProduccion">Análisis de Producción</label>
                            <input type="text" id="analisisProduccion">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="recomendacionesSecado">Recomendaciones Específicas</label>
                            <textarea id="recomendacionesSecado" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comparativaLactancia">Comparativa con Lactancia Anterior</label>
                            <select id="comparativaLactancia">
                                <option value="">Seleccionar</option>
                                <option value="mejor">Mejor</option>
                                <option value="similar">Similar</option>
                                <option value="peor">Peor</option>
                                <option value="primera">Primera Lactancia</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'servicio-tecnico')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'servicio-evidencia')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarCambiosServicio()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 5: Evidencia y Documentos -->
            <div id="servicio-evidencia" class="tab-content">
                <form id="formServicioEvidencia">
                    <div class="form-row">
                        <div class="form-group full-width">
                            <h4 style="color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                                <i class="fas fa-camera"></i> Evidencia Fotográfica del Servicio
                            </h4>
                        </div>
                    </div>

                    <!-- Sistema de carga de fotos con descripción -->
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="fotosServicio">Subir Fotos del Servicio</label>
                            <div class="foto-upload-area" id="fotoUploadArea">
                                <div class="foto-upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: #3498db; margin-bottom: 10px;"></i>
                                    <p>Arrastra y suelta las fotos aquí o haz clic para seleccionar</p>
                                    <small>Formatos permitidos: JPG, PNG, GIF (Máx. 5MB por archivo)</small>
                                </div>
                                <input type="file" id="fotosServicio" multiple accept="image/*" style="display: none;" onchange="manejarFotosServicio(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Vista previa de fotos con descripción -->
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label>Fotos Subidas</label>
                            <div class="fotos-preview-container" id="fotosPreviewContainer">
                                <div class="no-fotos-message">
                                    <i class="fas fa-images" style="font-size: 36px; color: #bdc3c7; margin-bottom: 10px;"></i>
                                    <p>No hay fotos subidas aún</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Documentos adjuntos -->
                    <div class="form-row">
                        <div class="form-group full-width">
                            <h4 style="color: #2c3e50; margin: 30px 0 20px 0; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                                <i class="fas fa-file-alt"></i> Documentación del Servicio
                            </h4>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="certificadoSemen">Certificado de Semen</label>
                            <input type="file" id="certificadoSemen" accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Certificado de calidad del semen utilizado</small>
                        </div>
                        <div class="form-group">
                            <label for="registroInseminacion">Registro de Inseminación</label>
                            <input type="file" id="registroInseminacion" accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Formulario oficial de registro</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="facturaProveedor">Factura del Proveedor</label>
                            <input type="file" id="facturaProveedor" accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Factura de compra del semen</small>
                        </div>
                        <div class="form-group">
                            <label for="protocoloAplicacion">Protocolo de Aplicación</label>
                            <input type="file" id="protocoloAplicacion" accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Protocolo técnico seguido</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="otrosDocumentos">Otros Documentos</label>
                            <input type="file" id="otrosDocumentos" multiple accept=".pdf,.jpg,.png,.doc,.docx,.xls,.xlsx">
                            <small class="text-muted">Documentación adicional relevante</small>
                        </div>
                    </div>

                    <!-- Información adicional de documentos -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaDocumentacion">Fecha de Documentación</label>
                            <input type="date" id="fechaDocumentacion">
                        </div>
                        <div class="form-group">
                            <label for="responsableDocumentacion">Responsable de Documentación</label>
                            <input type="text" id="responsableDocumentacion">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesDocumentos">Observaciones de la Documentación</label>
                            <textarea id="observacionesDocumentos" rows="3" placeholder="Observaciones sobre los documentos adjuntos, validaciones, etc."></textarea>
                        </div>
                    </div>

                    <!-- Lista de archivos subidos -->
                    <div class="archivos-subidos">
                        <h4 style="color: #2c3e50; margin: 30px 0 15px 0;">
                            <i class="fas fa-paperclip"></i> Archivos Subidos
                        </h4>
                        <div class="lista-archivos" id="listaArchivosServicio">
                            <div class="archivo-vacio">
                                <i class="fas fa-folder-open" style="font-size: 24px; color: #bdc3c7; margin-bottom: 5px;"></i>
                                <p>No hay archivos subidos</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'servicio-seguimiento')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarServicioCompleto()">Guardar Servicio Completo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA PALPITACIONES - VERSION MEJORADA -->
<div id="modalPalpitaciones" class="modal">
    <div class="modal-content" style="max-width: 950px;">
        <div class="modal-header">
            <h3><i class="fas fa-stethoscope"></i> Registro de Tratamientos</h3>
            <button class="close-modal" onclick="cerrarModal('modalPalpitaciones')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab active" onclick="cambiarPestania(event, 'palpitacion-datos')">Datos del Tratamiento</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'palpitacion-evidencia')">Evidencia y Documentos</button>
            </div>

            <!-- Sección 1: Datos de Tratamientos -->
            <div id="palpitacion-datos" class="tab-content active">
                <form id="formPalpitacionDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoTratamiento">Código de Tratamiento</label>
                            <input type="text" id="codigoTratamiento">
                        </div>
                        <div class="form-group">
                            <label for="fechaTratamiento">Fecha del Tratamiento</label>
                            <input type="datetime-local" id="fechaTratamiento">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoTratamiento">Tipo de Tratamiento</label>
                            <select id="tipoTratamiento">
                                <option value="">Seleccionar tipo</option>
                                <option value="antibiotico">Antibiótico</option>
                                <option value="antiinflamatorio">Antiinflamatorio</option>
                                <option value="antiparasitario">Antiparasitario</option>
                                <option value="hormonal">Hormonal</option>
                                <option value="vitaminico-mineral">Vitamínico/Mineral</option>
                                <option value="reproductivo">Reproductivo</option>
                                <option value="preventivo">Preventivo</option>
                                <option value="terapeutico">Terapéutico</option>
                                <option value="quirurgico">Quirúrgico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaTratamiento">Categoría del Tratamiento</label>
                            <select id="categoriaTratamiento">
                                <option value="">Seleccionar</option>
                                <option value="rutina">Rutina</option>
                                <option value="urgente">Urgente</option>
                                <option value="programado">Programado</option>
                                <option value="emergencia">Emergencia</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsableTratamiento">Responsable del Tratamiento</label>
                            <input type="text" id="responsableTratamiento">
                        </div>
                        <div class="form-group">
                            <label for="veterinarioTratamiento">Veterinario Responsable</label>
                            <input type="text" id="veterinarioTratamiento">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="diagnosticoTratamiento">Diagnóstico</label>
                            <input type="text" id="diagnosticoTratamiento">
                        </div>
                        <div class="form-group">
                            <label for="gravedadCaso">Gravedad del Caso</label>
                            <select id="gravedadCaso">
                                <option value="">Seleccionar</option>
                                <option value="leve">Leve</option>
                                <option value="moderado">Moderado</option>
                                <option value="grave">Grave</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="medicamentoPrincipal">Medicamento Principal</label>
                            <input type="text" id="medicamentoPrincipal">
                        </div>
                        <div class="form-group">
                            <label for="dosisAplicada">Dosis Aplicada</label>
                            <input type="text" id="dosisAplicada">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="frecuenciaAplicacion">Frecuencia de Aplicación</label>
                            <select id="frecuenciaAplicacion">
                                <option value="">Seleccionar</option>
                                <option value="unica">Única</option>
                                <option value="diaria">Diaria</option>
                                <option value="cada12">Cada 12 horas</option>
                                <option value="cada48">Cada 48 horas</option>
                                <option value="semanal">Semanal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="periodoRetiro">Período de Retiro (días)</label>
                            <input type="number" id="periodoRetiro" min="0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoAnimal">Tipo de Animal</label>
                            <select id="tipoAnimal">
                                <option value="">Seleccionar</option>
                                <option value="cria">Cría</option>
                                <option value="vientre">Vientre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="codigoAnimal">Código del Animal</label>
                            <input type="text" id="codigoAnimal">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesTratamiento">Observaciones</label>
                            <textarea id="observacionesTratamiento" rows="2"></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="resultadoTratamiento">Resultados del Tratamiento</label>
                            <select id="resultadoTratamiento">
                                <option value="">Seleccionar</option>
                                <option value="exitoso">Exitoso</option>
                                <option value="en-progreso">En Progreso</option>
                                <option value="sin-mejoria">Sin Mejoría</option>
                                <option value="recaida">Recaída</option>
                                <option value="no-aplica">No Aplica</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalPalpitaciones')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'palpitacion-animal')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarCambiosPalpitacion()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Evidencia y Documentos -->
            <div id="palpitacion-evidencia" class="tab-content">
                        <form id="formPalpitacionEvidencia">
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <h4 style="color: #2c3e50; margin-bottom: 20px; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                                        <i class="fas fa-camera"></i> Evidencia Fotográfica de la Palpitación
                                    </h4>
                                </div>
                            </div>

                            <!-- Sistema de carga de fotos con descripción -->
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="fotosPalpitacion">Subir Fotos de la Palpitación</label>
                                    <div class="foto-upload-area" id="fotoUploadAreaPalpitacion">
                                        <div class="foto-upload-placeholder">
                                            <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: #3498db; margin-bottom: 10px;"></i>
                                            <p>Arrastra y suelta las fotos aquí o haz clic para seleccionar</p>
                                            <small>Formatos permitidos: JPG, PNG, GIF (Máx. 5MB por archivo)</small>
                                        </div>
                                        <input type="file" id="fotosPalpitacion" multiple accept="image/*" style="display: none;" onchange="manejarFotosPalpitacion(event)">
                                    </div>
                                </div>
                            </div>

                            <!-- Vista previa de fotos con descripción -->
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label>Fotos Subidas</label>
                                    <div class="fotos-preview-container" id="fotosPreviewContainerPalpitacion">
                                        <div class="no-fotos-message">
                                            <i class="fas fa-images" style="font-size: 36px; color: #bdc3c7; margin-bottom: 10px;"></i>
                                            <p>No hay fotos subidas aún</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Documentos específicos de palpitación -->
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <h4 style="color: #2c3e50; margin: 30px 0 20px 0; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                                        <i class="fas fa-file-medical"></i> Documentación de la Palpitación
                                    </h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="imagenesUltrasonido">Imágenes de Ultrasonido</label>
                                    <input type="file" id="imagenesUltrasonido" multiple accept="image/*,.pdf">
                                    <small class="text-muted">Fotos o PDF con imágenes de ultrasonido</small>
                                </div>
                                <div class="form-group">
                                    <label for="informePalpitacion">Informe de Palpitación</label>
                                    <input type="file" id="informePalpitacion" accept=".pdf,.doc,.docx,.jpg,.png">
                                    <small class="text-muted">Informe detallado del diagnóstico</small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="resultadosLaboratorio">Resultados de Laboratorio</label>
                                    <input type="file" id="resultadosLaboratorio" accept=".pdf,.jpg,.png,.doc,.docx">
                                    <small class="text-muted">Análisis de sangre u otros tests</small>
                                </div>
                                <div class="form-group">
                                    <label for="facturaVeterinario">Factura del Veterinario</label>
                                    <input type="file" id="facturaVeterinario" accept=".pdf,.jpg,.png,.doc,.docx">
                                    <small class="text-muted">Comprobante de pago del servicio</small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="otrosDocumentosPalpitacion">Otros Documentos Relacionados</label>
                                    <input type="file" id="otrosDocumentosPalpitacion" multiple accept=".pdf,.jpg,.png,.doc,.docx,.xls,.xlsx">
                                    <small class="text-muted">Documentación adicional relevante</small>
                                </div>
                            </div>

                            <!-- Información adicional de documentos -->
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fechaDocumentacionPalpitacion">Fecha de Documentación</label>
                                    <input type="date" id="fechaDocumentacionPalpitacion">
                                </div>
                                <div class="form-group">
                                    <label for="responsableDocumentacionPalpitacion">Responsable de Documentación</label>
                                    <input type="text" id="responsableDocumentacionPalpitacion">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group full-width">
                                    <label for="observacionesDocumentosPalpitacion">Observaciones de la Documentación</label>
                                    <textarea id="observacionesDocumentosPalpitacion" rows="3" placeholder="Observaciones sobre los documentos adjuntos, validaciones, interpretación de resultados..."></textarea>
                                </div>
                            </div>

                            <!-- Información técnica adicional -->
                            <div class="form-row">
                                <div class="form-group full-width">
                                    <h4 style="color: #2c3e50; margin: 30px 0 20px 0; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                                        <i class="fas fa-microscope"></i> Información Técnica Adicional
                                    </h4>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="equipoUtilizado">Equipo Utilizado</label>
                                    <select id="equipoUtilizado">
                                        <option value="">Seleccionar equipo</option>
                                        <option value="ultrasonido-portatil">Ultrasonido Portátil</option>
                                        <option value="ultrasonido-fijo">Ultrasonido de Mesa</option>
                                        <option value="sonda-lineal">Sonda Lineal</option>
                                        <option value="sonda-convex">Sonda Convex</option>
                                        <option value="sonda-sectorial">Sonda Sectorial</option>
                                        <option value="palpacion-manual">Palpación Manual</option>
                                        <option value="doppler-portatil">Doppler Portátil</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marcaEquipo">Marca del Equipo</label>
                                    <input type="text" id="marcaEquipo" placeholder="Marca y modelo del equipo">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="calibracionEquipo">Fecha de Calibración del Equipo</label>
                                    <input type="date" id="calibracionEquipo">
                                </div>
                                <div class="form-group">
                                    <label for="configuracionEquipo">Configuración del Equipo</label>
                                    <input type="text" id="configuracionEquipo" placeholder="Configuraciones técnicas utilizadas">
                                </div>
                            </div>

                            <!-- Lista de archivos subidos -->
                            <div class="archivos-subidos">
                                <h4 style="color: #2c3e50; margin: 30px 0 15px 0;">
                                    <i class="fas fa-paperclip"></i> Archivos Subidos - Palpitación
                                </h4>
                                <div class="lista-archivos" id="listaArchivosPalpitacion">
                                    <div class="archivo-vacio">
                                        <i class="fas fa-folder-open" style="font-size: 24px; color: #bdc3c7; margin-bottom: 5px;"></i>
                                        <p>No hay archivos subidos</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'palpitacion-seguimiento')">Anterior</button>
                                <button type="button" class="btn btn-primary" onclick="guardarPalpitacion()">Guardar Palpitación Completa</button>

                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA PRODUCCION LACTEA - VERSION MEJORADA -->
<div id="modalProduccionLactea" class="modal">
    <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
            <h3><i class="fas fa-weight"></i> Registro de Producción Láctea</h3>
            <button class="close-modal" onclick="cerrarModal('modalProduccionLactea')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'produccion-datos')">Datos de Producción</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'produccion-calidad')">Detalles de Producción</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'produccion-evidencia')">Evidencias y Documentos</button>
            </div>

            <!-- Sección 1: Datos de Producción -->
            <div id="produccion-datos" class="tab-content active">
                <form id="formProduccionDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoVientre">Código del Vientre</label>
                            <input type="text" id="codigoVientre">
                        </div>
                        <div class="form-group">
                            <label for="fechaRegistro">Fecha del Registro *</label>
                            <input type="datetime-local" id="fechaRegistro" required>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoRegistro">Tipo de Registro</label>
                            <select id="tipoRegistro">
                                <option value="">Seleccionar tipo</option>
                                <option value="inicio">Inicio</option>
                                <option value="rutina">Rutina</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="responsableRegistro">Responsable</label>
                            <input type="text" id="responsableRegistro">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="etapaLactancia">Etapa de Lactancia</label>
                            <select id="etapaLactancia">
                                <option value="">Seleccionar etapa</option>
                                <option value="inicio">Inicio</option>
                                <option value="media">Media</option>
                                <option value="final">Final</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="turnoOrdeno">Turno de Ordeño</label>
                            <select id="turnoOrdeno">
                                <option value="">Seleccionar turno</option>
                                <option value="manana">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="noche">Noche</option>
                                <option value="doble">Doble</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionLeche">Producción de Leche (L)</label>
                            <input type="number" id="produccionLeche" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="estadoUbre">Estado de Ubre</label>
                            <select id="estadoUbre">
                                <option value="">Seleccionar</option>
                                <option value="normal">Normal</option>
                                <option value="inflamada">Inflamada</option>
                                <option value="lesiones">Con Lesiones</option>
                                <option value="mastitis">Mastitis</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="alimentacionPrevia">Alimentación Previa</label>
                            <input type="text" id="alimentacionPrevia">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesProduccion">Observaciones</label>
                            <textarea id="observacionesProduccion" rows="3" placeholder="Observaciones adicionales sobre el ordeño, comportamiento, condiciones especiales..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalProduccionLactea')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'produccion-calidad')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarCambiosProduccion()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Detalles de Producción -->
            <div id="produccion-calidad" class="tab-content">
                <form id="formProduccionCalidad">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionInicial">Producción Láctea Inicial (L)</label>
                            <input type="number" id="produccionInicial" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="grasaButirosa">Grasa Butirosa (%)</label>
                            <input type="number" id="grasaButirosa" min="0" max="100" step="0.01">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="proteinaLeche">Proteína (%)</label>
                            <input type="number" id="proteinaLeche" min="0" max="100" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="densidadLeche">Densidad de Leche</label>
                            <input type="number" id="densidadLeche" step="0.001">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="conductividadLeche">Conductividad Eléctrica (mS/cm)</label>
                            <input type="number" id="conductividadLeche" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="tratamientoAplicado">Tratamiento Aplicado</label>
                            <input type="text" id="tratamientoAplicado">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="medicamentoUtilizado">Medicamento Utilizado</label>
                            <input type="text" id="medicamentoUtilizado">
                        </div>
                        <div class="form-group">
                            <label for="dosisAplicada">Dosis Aplicada</label>
                            <input type="text" id="dosisAplicada">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="duracionTratamiento">Duración del Tratamiento (días)</label>
                            <input type="number" id="duracionTratamiento" min="0">
                        </div>
                        <div class="form-group">
                            <label for="periodoRetiro">Periodo de Retiro (días)</label>
                            <input type="number" id="periodoRetiro" min="0">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionFinal">Producción Final (L)</label>
                            <input type="number" id="produccionFinal" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="estadoPostTratamiento">Estado Post Tratamiento</label>
                            <select id="estadoPostTratamiento">
                                <option value="">Seleccionar estado</option>
                                <option value="normal">Normal</option>
                                <option value="inflamada">Inflamada</option>
                                <option value="sin-produccion">Sin Producción</option>
                                <option value="recuperando">Recuperando</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="proximoControl">Próximo Control</label>
                            <input type="date" id="proximoControl">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesCalidad">Observaciones con Detalles</label>
                            <textarea id="observacionesCalidad" rows="3" placeholder="Detalles del proceso, problemas detectados, recomendaciones..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'produccion-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'produccion-animal')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarCambiosCalidad()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 3: Evidencias y Documentos -->
            <div id="produccion-evidencia" class="tab-content">
                <form id="formProduccionEvidencia">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Fotografías de la Producción</label>
                            <div class="foto-container">
                                <div class="foto-preview" id="fotoPreviewProduccion">
                                    <span>Vista previa de las imágenes</span>
                                </div>
                                <input type="file" id="inputFotoProduccion" accept="image/*" multiple style="display: none;" onchange="previsualizarFotosProduccion(event)">
                                <div class="foto-actions">
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('inputFotoProduccion').click()">
                                        <i class="fas fa-camera"></i> Agregar Fotos
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="documentosAnalisis">Documentos de Análisis</label>
                            <input type="file" id="documentosAnalisis" multiple accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Resultados de laboratorio, certificados de calidad, etc.</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsableRegistro">Responsable del Registro</label>
                            <input type="text" id="responsableRegistro">
                        </div>
                        <div class="form-group">
                            <label for="laboratorioAnalisis">Laboratorio de Análisis</label>
                            <input type="text" id="laboratorioAnalisis">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costoAnalisis">Costo de Análisis ($)</label>
                            <input type="number" id="costoAnalisis" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="fechaProximoControl">Fecha Próximo Control</label>
                            <input type="date" id="fechaProximoControl">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesProduccion">Recomendaciones y Observaciones Finales</label>
                            <textarea id="recomendacionesProduccion" rows="3" placeholder="Acciones a tomar, mejoras sugeridas, observaciones importantes..."></textarea>
                        </div>
                    </div>
                    
                    <div class="imagenes-guardadas">
                        <h4>Evidencias Guardadas</h4>
                        <div class="imagenes-lista" id="imagenesGuardadasProduccion">
                            <p>No hay evidencias guardadas aún.</p>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'produccion-animal')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarProduccionLactea()">Guardar Producción</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA PESO CORPORAL - VERSION MEJORADA -->
<div id="modalPesoCorporal" class="modal">
    <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
            <h3><i class="fas fa-weight-scale"></i> Registro de Peso Corporal</h3>
            <button class="close-modal" onclick="cerrarModal('modalPesoCorporal')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'peso-datos')">Datos del Pesaje</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'peso-mediciones')">Detalles del Pesaje</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'peso-evidencia')">Evidencias y Análisis</button>
            </div>

            <!-- Sección 1: Datos del Pesaje -->
            <div id="peso-datos" class="tab-content active">
                <form id="formPesoDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoAnimal">Código del Animal</label>
                            <input type="text" id="codigoAnimal">
                        </div>
                        <div class="form-group">
                            <label for="tipoAnimal">Tipo de Animal</label>
                            <select id="tipoAnimal">
                                <option value="">Seleccionar tipo</option>
                                <option value="vientre">Vientre</option>
                                <option value="cria">Cría</option>
                                <option value="toro">Toro</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaRegistro">Fecha de Registro</label>
                            <input type="datetime-local" id="fechaRegistro">
                        </div>
                        <div class="form-group">
                            <label for="responsableRegistro">Responsable</label>
                            <input type="text" id="responsableRegistro">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="metodoPesaje">Método de Pesaje</label>
                            <select id="metodoPesaje">
                                <option value="">Seleccionar método</option>
                                <option value="balanza">Balanza</option>
                                <option value="cinta">Cinta</option>
                                <option value="estimado">Estimado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pesoAnimal">Peso (kg)</label>
                            <input type="number" id="pesoAnimal" min="0" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="condicionCorporal">Condición Corporal (1-5)</label>
                            <select id="condicionCorporal">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoNutricional">Estado Nutricional</label>
                            <select id="estadoNutricional">
                                <option value="">Seleccionar</option>
                                <option value="bajo">Bajo</option>
                                <option value="normal">Normal</option>
                                <option value="alto">Alto</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesPeso">Observaciones Generales</label>
                            <textarea id="observacionesPeso" rows="3" placeholder="Comentarios adicionales sobre el estado del animal, comportamiento, condiciones especiales..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalPesoCorporal')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'peso-mediciones')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarPeso()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Mediciones Corporales -->
            <div id="peso-mediciones" class="tab-content">
                <form id="formPesoMediciones">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaControl">Fecha de Control</label>
                            <input type="datetime-local" id="fechaControl">
                        </div>
                        <div class="form-group">
                            <label for="pesoControl">Peso de Control (kg)</label>
                            <input type="number" id="pesoControl" min="0" step="0.1">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="variacionPeso">Variación de Peso (kg)</label>
                            <input type="number" id="variacionPeso" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporalControl">Condición Corporal</label>
                            <select id="condicionCorporalControl">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoNutricionalControl">Estado Nutricional</label>
                            <select id="estadoNutricionalControl">
                                <option value="">Seleccionar</option>
                                <option value="bajo">Bajo</option>
                                <option value="normal">Normal</option>
                                <option value="alto">Alto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alimentacionActual">Alimentación Actual</label>
                            <input type="text" id="alimentacionActual" placeholder="Detalles sobre alimentación">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="actividadFisica">Actividad Física</label>
                            <input type="text" id="actividadFisica" placeholder="Tipo y frecuencia de actividad">
                        </div>
                        <div class="form-group">
                            <label for="diagnosticoCambio">Diagnóstico de Cambio</label>
                            <input type="text" id="diagnosticoCambio" placeholder="Interpretación de cambios en peso y condición">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesPeso">Recomendaciones</label>
                            <textarea id="recomendacionesPeso" rows="3" placeholder="Acciones a seguir, ajustes de alimentación, observaciones..."></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="proximoControlPeso">Próximo Control</label>
                            <input type="datetime-local" id="proximoControlPeso">
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'peso-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'peso-animal')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarMedicionPeso()">Guardar Cambios</button>
                    </div>
                </form>
            </div>


            <!-- Sección 3: Evidencias y Análisis -->
            <div id="peso-evidencia" class="tab-content">
                <form id="formPesoEvidencia">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Fotografías del Animal</label>
                            <div class="foto-container">
                                <div class="foto-preview" id="fotoPreviewPeso">
                                    <span>Vista previa de las imágenes del animal</span>
                                </div>
                                <input type="file" id="inputFotoPeso" accept="image/*" multiple style="display: none;" onchange="previsualizarFotosPeso(event)">
                                <div class="foto-actions">
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('inputFotoPeso').click()">
                                        <i class="fas fa-camera"></i> Agregar Fotos del Animal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fotoBascula">Foto de la Báscula/Medición</label>
                            <input type="file" id="fotoBascula" accept="image/*">
                            <small class="text-muted">Foto que muestre el peso en la báscula</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="documentosPesaje">Documentos Adjuntos</label>
                            <input type="file" id="documentosPesaje" multiple accept=".pdf,.jpg,.png,.doc,.docx">
                            <small class="text-muted">Registros anteriores, gráficos de crecimiento, etc.</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="analisisTendencia">Análisis de Tendencia de Peso</label>
                            <select id="analisisTendencia">
                                <option value="">Seleccionar</option>
                                <option value="crecimiento-optimo">Crecimiento Óptimo</option>
                                <option value="crecimiento-normal">Crecimiento Normal</option>
                                <option value="crecimiento-lento">Crecimiento Lento</option>
                                <option value="perdida-peso">Pérdida de Peso</option>
                                <option value="sobrepeso">Sobrepeso</option>
                                <option value="estancamiento">Estancamiento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="objetivoPeso">Objetivo de Peso (kg)</label>
                            <input type="number" id="objetivoPeso" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaProximoPesaje">Fecha Próximo Pesaje Programado</label>
                            <input type="date" id="fechaProximoPesaje">
                        </div>
                        <div class="form-group">
                            <label for="recomendacionesAlimenticias">Recomendaciones Alimenticias</label>
                            <textarea id="recomendacionesAlimenticias" rows="2" placeholder="Ajustes en la dieta, suplementación..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesGenerales">Recomendaciones y Observaciones Finales</label>
                            <textarea id="recomendacionesGenerales" rows="3" placeholder="Acciones a tomar, observaciones importantes, seguimiento requerido..."></textarea>
                        </div>
                    </div>
                    
                    <div class="imagenes-guardadas">
                        <h4>Evidencias Guardadas</h4>
                        <div class="imagenes-lista" id="imagenesGuardadasPeso">
                            <p>No hay evidencias guardadas aún.</p>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'peso-animal')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarPesoCorporal()">Guardar Pesaje</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA NOTAS - VERSION MEJORADA-->
<div id="modalNotas" class="modal">
    <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
            <h3><i class="fas fa-sticky-note"></i> Registro de Nota</h3>
            <button class="close-modal" onclick="cerrarModal('modalNotas')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab active" onclick="cambiarPestania(event, 'nota-datos')">Datos de la Nota</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'nota-evidencia')">Evidencias y Archivos</button>
            </div>

            <!-- Sección 1: Datos de la Nota -->
            <div id="nota-datos" class="tab-content active">
                <form id="formNotaDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoNota">Código de Nota</label>
                            <input type="text" id="codigoNota">
                        </div>
                        <div class="form-group">
                            <label for="fechaNota">Fecha de Nota *</label>
                            <input type="datetime-local" id="fechaNota" required>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tituloNota">Título de la Nota *</label>
                            <input type="text" id="tituloNota" required placeholder="Título descriptivo de la nota">
                        </div>
                        <div class="form-group">
                            <label for="categoriaNota">Categoría *</label>
                            <select id="categoriaNota" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="observacion general">Observación General</option>
                                <option value="comportamiento">Comportamiento</option>
                                <option value="salud">Salud</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="alimentacion">Alimentación</option>
                                <option value="produccion">Producción</option>
                                <option value="manejo">Manejo</option>
                                <option value="instalaciones">Instalaciones</option>
                                <option value="maquinaria">Maquinaria</option>
                                <option value="personal">Personal</option>
                                <option value="clima">Clima</option>
                                <option value="administrativo">Administrativo</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoNota">Tipo de Nota</label>
                            <select id="tipoNota">
                                <option value="">Seleccionar tipo</option>
                                <option value="informacion">Información</option>
                                <option value="recordatorio">Recordatorio</option>
                                <option value="alerta">Alerta</option>
                                <option value="problema">Problema</option>
                                <option value="solucion">Solución</option>
                                <option value="idea de mejora">Idea de Mejora</option>
                                <option value="seguimiento">Seguimiento</option>
                                <option value="incidente">Incidente</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prioridadNota">Prioridad</label>
                            <select id="prioridadNota">
                                <option value="">Seleccionar prioridad</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                                <option value="urgente">Urgente</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoNota">Estado de la Nota</label>
                            <select id="estadoNota">
                                <option value="activa">Activa</option>
                                <option value="completada">Completada</option>
                                <option value="en-proceso">En Proceso</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="cancelada">Cancelada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="autorNota">Autor</label>
                            <input type="text" id="autorNota">
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="departamento">Departamento/Área</label>
                            <select id="departamento">
                                <option value="">Seleccionar área</option>
                                <option value="gerencia">Gerencia</option>
                                <option value="veterinaria">Veterinaria</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="alimentacion">Alimentación</option>
                                <option value="ordeño">Ordeño</option>
                                <option value="mantenimiento">Mantenimiento</option>
                                <option value="administracion">Administración</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionNota">Descripción</label>
                            <textarea id="descripcionNota" rows="3" placeholder="Detalles completos de la nota"></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="accionesTomadas">Acciones Tomadas</label>
                            <textarea id="accionesTomadas" rows="2" placeholder="Acciones ejecutadas para resolver o atender la nota"></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesNota">Recomendaciones</label>
                            <textarea id="recomendacionesNota" rows="2" placeholder="Sugerencias adicionales"></textarea>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="impactoNota">Impacto</label>
                            <select id="impactoNota">
                                <option value="">Seleccionar</option>
                                <option value="bajo">Bajo</option>
                                <option value="media">Media</option>
                                <option value="alto">Alto</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="visibilidadNota">Visibilidad</label>
                            <select id="visibilidadNota">
                                <option value="">Seleccionar</option>
                                <option value="publica">Pública</option>
                                <option value="solo departamento">Solo Departamento</option>
                                <option value="privada">Privada</option>
                                <option value="solo general">Solo General</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group">
                            <label for="requiereSeguimiento">¿Requiere Seguimiento?</label>
                            <select id="requiereSeguimiento">
                                <option value="">Seleccionar</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fechaResolucion">Fecha de Resolución</label>
                            <input type="datetime-local" id="fechaResolucion">
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalNotas')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'nota-contenido')">Siguiente</button>
                        <button type="button" class="btn btn-save" onclick="guardarNota()">Guardar Nota</button>
                    </div>
                </form>
            </div>


            <!-- Sección 2: Evidencias y Archivos -->
            <div id="nota-evidencia" class="tab-content">
                <form id="formNotaEvidencia">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Fotografías de Evidencia</label>
                            <div class="foto-container">
                                <div class="foto-preview" id="fotoPreviewNota">
                                    <span>Vista previa de las imágenes de evidencia</span>
                                </div>
                                <input type="file" id="inputFotoNota" accept="image/*" multiple style="display: none;" onchange="previsualizarFotosNota(event)">
                                <div class="foto-actions">
                                    <button type="button" class="btn btn-primary" onclick="document.getElementById('inputFotoNota').click()">
                                        <i class="fas fa-camera"></i> Agregar Fotos
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="documentosAdjuntos">Documentos Adjuntos</label>
                            <input type="file" id="documentosAdjuntos" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.txt">
                            <small class="text-muted">Informes, reportes, documentos de soporte</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="archivosMultimedia">Archivos Multimedia</label>
                            <input type="file" id="archivosMultimedia" multiple accept=".mp4,.avi,.mov,.wav,.mp3">
                            <small class="text-muted">Videos, grabaciones de audio</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaRecordatorio">Fecha de Recordatorio</label>
                            <input type="datetime-local" id="fechaRecordatorio">
                        </div>
                        <div class="form-group">
                            <label for="fechaRevision">Fecha de Revisión</label>
                            <input type="datetime-local" id="fechaRevision">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsableSeguimiento">Responsable de Seguimiento</label>
                            <input type="text" id="responsableSeguimiento">
                        </div>
                        <div class="form-group">
                            <label for="notificaciones">Enviar Notificación a</label>
                            <textarea id="notificaciones" rows="2" placeholder="Correos electrónicos para notificación"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="comentariosFinales">Comentarios Finales</label>
                            <textarea id="comentariosFinales" rows="3" placeholder="Observaciones finales, conclusiones..."></textarea>
                        </div>
                    </div>
                    
                    <div class="imagenes-guardadas">
                        <h4>Archivos y Evidencias Guardadas</h4>
                        <div class="archivos-lista" id="archivosGuardadosNota">
                            <p>No hay archivos guardados aún.</p>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'nota-asociaciones')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarNota()">Guardar Nota</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA RAZAS - GESTION DE CONFIGURACIÓN -->
<div id="modalRazas" class="modal">
    <div class="modal-content" style="max-width: 950px;">
        <div class="modal-header">
            <h3><i class="fas fa-dna"></i> Gestión de Razas</h3>
            <button class="close-modal" onclick="cerrarModal('modalRazas')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'raza-datos')">Datos de la Raza</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'raza-caracteristicas')">Características</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'raza-productividad')">Productividad</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'raza-manejo')">Manejo y Adaptación</button>
            </div>

            <!-- Sección 1: Datos de la Raza -->
            <div id="raza-datos" class="tab-content active">
                <form id="formRazaDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoRaza">Código de Raza *</label>
                            <input type="text" id="codigoRaza" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreRaza">Nombre de la Raza *</label>
                            <input type="text" id="nombreRaza" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoRaza">Tipo de Raza *</label>
                            <select id="tipoRaza" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="carne">Carne</option>
                                <option value="leche">Leche</option>
                                <option value="doble-proposito">Doble Propósito</option>
                                <option value="trabajo">Trabajo</option>
                                <option value="combinada">Combinada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="origenRaza">Origen/Procedencia *</label>
                            <select id="origenRaza" required>
                                <option value="">Seleccionar origen</option>
                                <option value="europeo">Europeo</option>
                                <option value="indico">Indico (Cebú)</option>
                                <option value="africano">Africano</option>
                                <option value="americano">Americano</option>
                                <option value="asiatico">Asiático</option>
                                <option value="oceania">Oceanía</option>
                                <option value="composite">Composite/Cruzado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="grupoRaza">Grupo Racial</label>
                            <input type="text" id="grupoRaza" placeholder="Ej: Bos taurus, Bos indicus, etc.">
                        </div>
                        <div class="form-group">
                            <label for="estadoRaza">Estado de la Raza</label>
                            <select id="estadoRaza">
                                <option value="activa">Activa</option>
                                <option value="inactiva">Inactiva</option>
                                <option value="en-evaluacion">En Evaluación</option>
                                <option value="descontinuada">Descontinuada</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionRaza">Descripción General</label>
                            <textarea id="descripcionRaza" rows="3" placeholder="Descripción general, historia, características distintivas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaRegistro">Fecha de Registro</label>
                            <input type="date" id="fechaRegistro">
                        </div>
                        <div class="form-group">
                            <label for="usuarioRegistro">Usuario que Registra</label>
                            <input type="text" id="usuarioRegistro">
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalRazas')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'raza-caracteristicas')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Características -->
            <div id="raza-caracteristicas" class="tab-content">
                <form id="formRazaCaracteristicas">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tamanioAdulto">Tamaño Adulto</label>
                            <select id="tamanioAdulto">
                                <option value="">Seleccionar tamaño</option>
                                <option value="pequeno">Pequeño</option>
                                <option value="mediano">Mediano</option>
                                <option value="grande">Grande</option>
                                <option value="muy-grande">Muy Grande</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pesoPromedioMachos">Peso Promedio Machos (kg)</label>
                            <input type="number" id="pesoPromedioMachos" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pesoPromedioHembras">Peso Promedio Hembras (kg)</label>
                            <input type="number" id="pesoPromedioHembras" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="alturaPromedio">Altura Promedio a la Cruz (cm)</label>
                            <input type="number" id="alturaPromedio" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="coloresComunes">Colores Comunes</label>
                            <input type="text" id="coloresComunes" placeholder="Ej: Negro, rojo, blanco, etc.">
                        </div>
                        <div class="form-group">
                            <label for="tipoPelaje">Tipo de Pelaje</label>
                            <select id="tipoPelaje">
                                <option value="">Seleccionar tipo</option>
                                <option value="corto">Corto</option>
                                <option value="largo">Largo</option>
                                <option value="rizado">Rizado</option>
                                <option value="lacio">Lacio</option>
                                <option value="grueso">Grueso</option>
                                <option value="fino">Fino</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cuernos">Presencia de Cuernos</label>
                            <select id="cuernos">
                                <option value="">Seleccionar</option>
                                <option value="con-cuernos">Con Cuernos</option>
                                <option value="sin-cuernos">Sin Cuernos (Mochos)</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="conformacionCorporal">Conformación Corporal</label>
                            <select id="conformacionCorporal">
                                <option value="">Seleccionar</option>
                                <option value="rectangular">Rectangular</option>
                                <option value="compacta">Compacta</option>
                                <option value="angular">Angular</option>
                                <option value="profunda">Profunda</option>
                                <option value="alargada">Alargada</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="temperamento">Temperamento General</label>
                            <select id="temperamento">
                                <option value="">Seleccionar</option>
                                <option value="docil">Dócil</option>
                                <option value="nervioso">Nervioso</option>
                                <option value="agresivo">Agresivo</option>
                                <option value="tranquilo">Tranquilo</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="longevidad">Longevidad Promedio (años)</label>
                            <input type="number" id="longevidad" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="caracteristicasEspeciales">Características Especiales/Distintivas</label>
                            <textarea id="caracteristicasEspeciales" rows="3" placeholder="Características únicas, marcas distintivas, particularidades..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'raza-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'raza-productividad')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Productividad -->
            <div id="raza-productividad" class="tab-content">
                <form id="formRazaProductividad">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionLechePromedio">Producción Leche Promedio (L/día)</label>
                            <input type="number" id="produccionLechePromedio" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="grasaLeche">Grasa en Leche Promedio (%)</label>
                            <input type="number" id="grasaLeche" min="0" max="100" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="proteinaLeche">Proteína en Leche Promedio (%)</label>
                            <input type="number" id="proteinaLeche" min="0" max="100" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="rendimientoCarne">Rendimiento en Canal (%)</label>
                            <input type="number" id="rendimientoCarne" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="calidadCarne">Calidad de Carne</label>
                            <select id="calidadCarne">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="velocidadCrecimiento">Velocidad de Crecimiento</label>
                            <select id="velocidadCrecimiento">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadPrimerParto">Edad al Primer Parto (meses)</label>
                            <input type="number" id="edadPrimerParto" min="0">
                        </div>
                        <div class="form-group">
                            <label for="intervaloPartos">Intervalo entre Partos (días)</label>
                            <input type="number" id="intervaloPartos" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fertilidad">Índice de Fertilidad</label>
                            <select id="fertilidad">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facilidadParto">Facilidad de Parto</label>
                            <select id="facilidadParto">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionAnualLeche">Producción Anual Leche (L)</label>
                            <input type="number" id="produccionAnualLeche" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="gananciaDiariaPeso">Ganancia Diaria de Peso (g/día)</label>
                            <input type="number" id="gananciaDiariaPeso" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesProductividad">Observaciones de Productividad</label>
                            <textarea id="observacionesProductividad" rows="3" placeholder="Rendimientos específicos, características productivas destacadas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'raza-caracteristicas')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'raza-manejo')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Manejo y Adaptación -->
            <div id="raza-manejo" class="tab-content">
                <form id="formRazaManejo">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="adaptabilidadClimatica">Adaptabilidad Climática</label>
                            <select id="adaptabilidadClimatica">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="climaIdeal">Clima Ideal</label>
                            <select id="climaIdeal">
                                <option value="">Seleccionar</option>
                                <option value="frio">Frío</option>
                                <option value="templado">Templado</option>
                                <option value="calido">Cálido</option>
                                <option value="tropical">Tropical</option>
                                <option value="variado">Variado/Adaptable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="resistenciaEnfermedades">Resistencia a Enfermedades</label>
                            <select id="resistenciaEnfermedades">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resistenciaParasitos">Resistencia a Parásitos</label>
                            <select id="resistenciaParasitos">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="toleranciaEstresCalor">Tolerancia al Estrés por Calor</label>
                            <select id="toleranciaEstresCalor">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eficienciaAlimenticia">Eficiencia Alimenticia</label>
                            <select id="eficienciaAlimenticia">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="aptitudPastoreo">Aptitud para Pastoreo</label>
                            <select id="aptitudPastoreo">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="aptitudConfinamiento">Aptitud para Confinamiento</label>
                            <select id="aptitudConfinamiento">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="necesidadesNutricionales">Necesidades Nutricionales</label>
                            <select id="necesidadesNutricionales">
                                <option value="">Seleccionar</option>
                                <option value="altas">Altas</option>
                                <option value="medias">Medias</option>
                                <option value="bajas">Bajas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facilidadManejo">Facilidad de Manejo</label>
                            <select id="facilidadManejo">
                                <option value="">Seleccionar</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesManejo">Recomendaciones de Manejo</label>
                            <textarea id="recomendacionesManejo" rows="3" placeholder="Prácticas de manejo recomendadas, cuidados especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="ventajasDesventajas">Ventajas y Desventajas</label>
                            <textarea id="ventajasDesventajas" rows="3" placeholder="Principales ventajas y limitaciones de la raza..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'raza-productividad')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarRaza()">Guardar Raza</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CORRALES - GESTION DE CONFIGURACIONES -->
<div id="modalCorrales" class="modal">
    <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
            <h3><i class="fas fa-vector-square"></i> Gestión de Corrales</h3>
            <button class="close-modal" onclick="cerrarModal('modalCorrales')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'corral-datos')">Datos del Corral</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'corral-infraestructura')">Infraestructura</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'corral-capacidad')">Capacidad y Uso</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'corral-manejo')">Manejo y Mantenimiento</button>
            </div>

            <!-- Sección 1: Datos del Corral -->
            <div id="corral-datos" class="tab-content active">
                <form id="formCorralDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoCorral">Código del Corral *</label>
                            <input type="text" id="codigoCorral" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreCorral">Nombre del Corral *</label>
                            <input type="text" id="nombreCorral" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoCorral">Tipo de Corral *</label>
                            <select id="tipoCorral" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="engorde">Engorde</option>
                                <option value="maternidad">Maternidad</option>
                                <option value="recria">Recría</option>
                                <option value="aislamiento">Aislamiento/Enfermería</option>
                                <option value="preparto">Pre-parto</option>
                                <option value="destete">Destete</option>
                                <option value="espera">Espera/Manga</option>
                                <option value="adaptacion">Adaptación</option>
                                <option value="servicio">Servicio/Monta</option>
                                <option value="general">General/Mixto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ubicacionCorral">Ubicación/Zona *</label>
                            <select id="ubicacionCorral" required>
                                <option value="">Seleccionar ubicación</option>
                                <option value="norte">Zona Norte</option>
                                <option value="sur">Zona Sur</option>
                                <option value="este">Zona Este</option>
                                <option value="oeste">Zona Oeste</option>
                                <option value="centro">Zona Centro</option>
                                <option value="cercana">Cercana a Instalaciones</option>
                                <option value="lejana">Zona Lejana</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="loteAsociado">Lote Asociado</label>
                            <input type="text" id="loteAsociado" placeholder="Lote principal asociado">
                        </div>
                        <div class="form-group">
                            <label for="estadoCorral">Estado del Corral *</label>
                            <select id="estadoCorral" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="mantenimiento">En Mantenimiento</option>
                                <option value="construccion">En Construcción</option>
                                <option value="deshabilitado">Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaCreacion">Fecha de Creación</label>
                            <input type="date" id="fechaCreacion">
                        </div>
                        <div class="form-group">
                            <label for="responsableCorral">Responsable del Corral</label>
                            <input type="text" id="responsableCorral">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionCorral">Descripción/Observaciones</label>
                            <textarea id="descripcionCorral" rows="3" placeholder="Descripción general, características especiales, observaciones..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalCorrales')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'corral-infraestructura')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Infraestructura -->
            <div id="corral-infraestructura" class="tab-content">
                <form id="formCorralInfraestructura">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="areaTotal">Área Total (m²) *</label>
                            <input type="number" id="areaTotal" min="0" step="0.1" required>
                        </div>
                        <div class="form-group">
                            <label for="areaCubierta">Área Cubierta (m²)</label>
                            <input type="number" id="areaCubierta" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="formaCorral">Forma del Corral</label>
                            <select id="formaCorral">
                                <option value="">Seleccionar forma</option>
                                <option value="rectangular">Rectangular</option>
                                <option value="cuadrado">Cuadrado</option>
                                <option value="circular">Circular</option>
                                <option value="irregular">Irregular</option>
                                <option value="largo">Largo/Angosto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="materialCerramiento">Material de Cerramiento</label>
                            <select id="materialCerramiento">
                                <option value="">Seleccionar material</option>
                                <option value="madera">Madera</option>
                                <option value="metal">Metal</option>
                                <option value="concreto">Concreto</option>
                                <option value="malla">Malla Ganadera</option>
                                <option value="mixto">Mixto</option>
                                <option value="electrico">Eléctrico</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="alturaCerramiento">Altura de Cerramiento (m)</label>
                            <input type="number" id="alturaCerramiento" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="estadoCerramiento">Estado del Cerramiento</label>
                            <select id="estadoCerramiento">
                                <option value="">Seleccionar estado</option>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="malo">Malo</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoPiso">Tipo de Piso</label>
                            <select id="tipoPiso">
                                <option value="">Seleccionar tipo</option>
                                <option value="tierra">Tierra</option>
                                <option value="concreto">Concreto</option>
                                <option value="empedrado">Empedrado</option>
                                <option value="asfalto">Asfalto</option>
                                <option value="mixto">Mixto</option>
                                <option value="otros">Otros</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="drenaje">Sistema de Drenaje</label>
                            <select id="drenaje">
                                <option value="">Seleccionar</option>
                                <option value="natural">Natural</option>
                                <option value="artificial">Artificial</option>
                                <option value="mixto">Mixto</option>
                                <option value="ninguno">Ninguno</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="bebederos">Número de Bebederos</label>
                            <input type="number" id="bebederos" min="0">
                        </div>
                        <div class="form-group">
                            <label for="comederos">Número de Comederos</label>
                            <input type="number" id="comederos" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sombraNatural">Sombra Natural</label>
                            <select id="sombraNatural">
                                <option value="">Seleccionar</option>
                                <option value="abundante">Abundante</option>
                                <option value="suficiente">Suficiente</option>
                                <option value="escasa">Escasa</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sombraArtificial">Sombra Artificial</label>
                            <select id="sombraArtificial">
                                <option value="">Seleccionar</option>
                                <option value="techos">Techos</option>
                                <option value="mallas">Mallas de Sombra</option>
                                <option value="estructuras">Estructuras Especiales</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="equipamientoEspecial">Equipamiento Especial</label>
                            <textarea id="equipamientoEspecial" rows="3" placeholder="Pesebres, mangas, embarcaderos, sistemas de riego, etc."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'corral-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'corral-capacidad')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Capacidad y Uso -->
            <div id="corral-capacidad" class="tab-content">
                <form id="formCorralCapacidad">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="capacidadMaxima">Capacidad Máxima (cabezas) *</label>
                            <input type="number" id="capacidadMaxima" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="capacidadRecomendada">Capacidad Recomendada (cabezas)</label>
                            <input type="number" id="capacidadRecomendada" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="areaPorAnimal">Área por Animal (m²/cabeza)</label>
                            <input type="number" id="areaPorAnimal" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="categoriaAnimal">Categoría de Animal Destinada</label>
                            <select id="categoriaAnimal">
                                <option value="">Seleccionar categoría</option>
                                <option value="terneros">Terneros</option>
                                <option value="novillos">Novillos</option>
                                <option value="vacas">Vacas</option>
                                <option value="toros">Toros</option>
                                <option value="vientres">Vientres</option>
                                <option value="mixto">Mixto</option>
                                <option value="todas">Todas las Categorías</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ocupacionActual">Ocupación Actual (cabezas)</label>
                            <input type="number" id="ocupacionActual" min="0">
                        </div>
                        <div class="form-group">
                            <label for="porcentajeOcupacion">Porcentaje de Ocupación (%)</label>
                            <input type="number" id="porcentajeOcupacion" min="0" max="100" step="0.1" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="rotacionUso">Rotación de Uso</label>
                            <select id="rotacionUso">
                                <option value="">Seleccionar</option>
                                <option value="continuo">Uso Continuo</option>
                                <option value="rotativo">Rotativo</option>
                                <option value="estacional">Estacional</option>
                                <option value="ocasional">Ocasional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="periodoDescanso">Periodo de Descanso (días)</label>
                            <input type="number" id="periodoDescanso" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="usoPrincipal">Uso Principal</label>
                            <select id="usoPrincipal">
                                <option value="">Seleccionar uso</option>
                                <option value="alojamiento">Alojamiento</option>
                                <option value="engorde">Engorde</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="maternidad">Maternidad</option>
                                <option value="recuperacion">Recuperación</option>
                                <option value="cuarentena">Cuarentena</option>
                                <option value="clasificacion">Clasificación</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usoSecundario">Uso Secundario</label>
                            <select id="usoSecundario">
                                <option value="">Seleccionar uso</option>
                                <option value="ninguno">Ninguno</option>
                                <option value="alojamiento">Alojamiento</option>
                                <option value="engorde">Engorde</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="maternidad">Maternidad</option>
                                <option value="recuperacion">Recuperación</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaUltimaOcupacion">Fecha Última Ocupación</label>
                            <input type="date" id="fechaUltimaOcupacion">
                        </div>
                        <div class="form-group">
                            <label for="fechaProximaOcupacion">Fecha Próxima Ocupación</label>
                            <input type="date" id="fechaProximaOcupacion">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="historialUso">Historial de Uso Reciente</label>
                            <textarea id="historialUso" rows="3" placeholder="Registro de usos anteriores, animales alojados, etc."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'corral-infraestructura')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'corral-manejo')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Manejo y Mantenimiento -->
            <div id="corral-manejo" class="tab-content">
                <form id="formCorralManejo">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="frecuenciaLimpieza">Frecuencia de Limpieza</label>
                            <select id="frecuenciaLimpieza">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Diaria</option>
                                <option value="alterna">Día por Medio</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <option value="ocasional">Ocasional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaDesinfeccion">Frecuencia de Desinfección</label>
                            <select id="frecuenciaDesinfeccion">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                                <option value="ocasional">Ocasional</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ultimaLimpieza">Última Limpieza</label>
                            <input type="date" id="ultimaLimpieza">
                        </div>
                        <div class="form-group">
                            <label for="proximaLimpieza">Próxima Limpieza Programada</label>
                            <input type="date" id="proximaLimpieza">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ultimaDesinfeccion">Última Desinfección</label>
                            <input type="date" id="ultimaDesinfeccion">
                        </div>
                        <div class="form-group">
                            <label for="proximaDesinfeccion">Próxima Desinfección Programada</label>
                            <input type="date" id="proximaDesinfeccion">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoLimpieza">Estado Actual de Limpieza</label>
                            <select id="estadoLimpieza">
                                <option value="">Seleccionar estado</option>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="malo">Malo</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="necesitaMantenimiento">¿Necesita Mantenimiento?</label>
                            <select id="necesitaMantenimiento">
                                <option value="no">No</option>
                                <option value="leve">Leve</option>
                                <option value="moderado">Moderado</option>
                                <option value="urgente">Urgente</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costoMantenimiento">Costo Mensual Mantenimiento ($)</label>
                            <input type="number" id="costoMantenimiento" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="costoLimpieza">Costo Mensual Limpieza ($)</label>
                            <input type="number" id="costoLimpieza" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="productosUtilizados">Productos de Limpieza/Desinfección Utilizados</label>
                            <textarea id="productosUtilizados" rows="2" placeholder="Desinfectantes, jabones, productos específicos..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesMantenimiento">Observaciones de Mantenimiento</label>
                            <textarea id="observacionesMantenimiento" rows="3" placeholder="Problemas detectados, reparaciones necesarias, observaciones importantes..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesUso">Recomendaciones de Uso</label>
                            <textarea id="recomendacionesUso" rows="3" placeholder="Recomendaciones específicas para el uso del corral..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'corral-capacidad')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarCorral()">Guardar Corral</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA LOTES - GESTION DE CONFIGURACIONES -->
<div id="modalLotes" class="modal">
    <div class="modal-content" style="max-width: 1100px;">
        <div class="modal-header">
            <h3><i class="fas fa-layer-group"></i> Gestión de Lotes</h3>
            <button class="close-modal" onclick="cerrarModal('modalLotes')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'lote-datos')">Datos del Lote</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'lote-composicion')">Composición Animal</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'lote-manejo')">Manejo y Alimentación</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'lote-seguimiento')">Seguimiento y Métricas</button>
            </div>

            <!-- Sección 1: Datos del Lote -->
            <div id="lote-datos" class="tab-content active">
                <form id="formLoteDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoLote">Código del Lote *</label>
                            <input type="text" id="codigoLote" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreLote">Nombre del Lote *</label>
                            <input type="text" id="nombreLote" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoLote">Tipo de Lote *</label>
                            <select id="tipoLote" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="cria">Cría</option>
                                <option value="recria">Recría</option>
                                <option value="engorde">Engorde</option>
                                <option value="vientres">Vientres</option>
                                <option value="toros">Toros</option>
                                <option value="destete">Destete</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="servicio">Servicio</option>
                                <option value="preparto">Pre-parto</option>
                                <option value="maternidad">Maternidad</option>
                                <option value="recuperacion">Recuperación</option>
                                <option value="cuarentena">Cuarentena</option>
                                <option value="venta">Pre-venta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaLote">Categoría del Lote *</label>
                            <select id="categoriaLote" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="terneros">Terneros</option>
                                <option value="novillos">Novillos</option>
                                <option value="novillas">Novillas</option>
                                <option value="vacas">Vacas</option>
                                <option value="toros">Toros</option>
                                <option value="vientres">Vientres</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaCreacionLote">Fecha de Creación *</label>
                            <input type="date" id="fechaCreacionLote" required>
                        </div>
                        <div class="form-group">
                            <label for="estadoLote">Estado del Lote *</label>
                            <select id="estadoLote" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="cerrado">Cerrado</option>
                                <option value="suspendido">Suspendido</option>
                                <option value="en-transicion">En Transición</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="corralAsignado">Corral Asignado</label>
                            <select id="corralAsignado">
                                <option value="">Seleccionar corral</option>
                                <!-- Opciones se cargarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="potreroAsignado">Potrero Asignado</label>
                            <input type="text" id="potreroAsignado" placeholder="Nombre del potrero">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsableLote">Responsable del Lote *</label>
                            <input type="text" id="responsableLote" required>
                        </div>
                        <div class="form-group">
                            <label for="supervisorLote">Supervisor</label>
                            <input type="text" id="supervisorLote">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="objetivoLote">Objetivo del Lote</label>
                            <textarea id="objetivoLote" rows="3" placeholder="Objetivo principal, metas productivas, propósito específico..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionLote">Descripción/Observaciones</label>
                            <textarea id="descripcionLote" rows="2" placeholder="Características especiales, observaciones importantes..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalLotes')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'lote-composicion')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Composición Animal -->
            <div id="lote-composicion" class="tab-content">
                <form id="formLoteComposicion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="totalAnimales">Total de Animales *</label>
                            <input type="number" id="totalAnimales" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="capacidadMaximaLote">Capacidad Máxima</label>
                            <input type="number" id="capacidadMaximaLote" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razaPrincipal">Raza Principal *</label>
                            <select id="razaPrincipal" required>
                                <option value="">Seleccionar raza</option>
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                                <option value="simental">Simental</option>
                                <option value="limousin">Limousin</option>
                                <option value="charolais">Charolais</option>
                                <option value="guzerat">Guzerat</option>
                                <option value="gyr">Gyr</option>
                                <option value="cruzado">Cruzado</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="razasSecundarias">Razas Secundarias</label>
                            <input type="text" id="razasSecundarias" placeholder="Otras razas presentes en el lote">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="composicionMachos">Machos (cantidad)</label>
                            <input type="number" id="composicionMachos" min="0">
                        </div>
                        <div class="form-group">
                            <label for="composicionHembras">Hembras (cantidad)</label>
                            <input type="number" id="composicionHembras" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadPromedio">Edad Promedio (meses)</label>
                            <input type="number" id="edadPromedio" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="rangoEdad">Rango de Edad</label>
                            <input type="text" id="rangoEdad" placeholder="Ej: 12-24 meses">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pesoPromedio">Peso Promedio (kg)</label>
                            <input type="number" id="pesoPromedio" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="rangoPeso">Rango de Peso (kg)</label>
                            <input type="text" id="rangoPeso" placeholder="Ej: 300-450 kg">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="condicionCorporalPromedio">Condición Corporal Promedio (1-5)</label>
                            <select id="condicionCorporalPromedio">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoSaludGeneral">Estado de Salud General</label>
                            <select id="estadoSaludGeneral">
                                <option value="">Seleccionar</option>
                                <option value="excelente">Excelente</option>
                                <option value="bueno">Bueno</option>
                                <option value="regular">Regular</option>
                                <option value="problemas">Con Problemas</option>
                                <option value="critico">Crítico</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="origenAnimales">Origen de los Animales</label>
                            <select id="origenAnimales">
                                <option value="">Seleccionar origen</option>
                                <option value="cria-propia">Cría Propia</option>
                                <option value="compra">Compra</option>
                                <option value="transferencia">Transferencia Interna</option>
                                <option value="subasta">Subasta</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesComposicion">Observaciones de Composición</label>
                            <textarea id="observacionesComposicion" rows="3" placeholder="Características especiales de los animales, problemas de salud recurrentes, etc."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'lote-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'lote-manejo')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Manejo y Alimentación -->
            <div id="lote-manejo" class="tab-content">
                <form id="formLoteManejo">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sistemaAlimentacion">Sistema de Alimentación *</label>
                            <select id="sistemaAlimentacion" required>
                                <option value="">Seleccionar sistema</option>
                                <option value="pastoreo">Pastoreo</option>
                                <option value="confinamiento">Confinamiento</option>
                                <option value="semi-confinamiento">Semi-confinamiento</option>
                                <option value="suplementacion">Suplementación en Pastoreo</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipoDieta">Tipo de Dieta</label>
                            <input type="text" id="tipoDieta" placeholder="Ej: Mantenimiento, crecimiento, lactancia">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="alimentoPrincipal">Alimento Principal</label>
                            <input type="text" id="alimentoPrincipal" placeholder="Ej: Pasto, grano, silaje">
                        </div>
                        <div class="form-group">
                            <label for="suplementos">Suplementos Utilizados</label>
                            <textarea id="suplementos" rows="2" placeholder="Minerales, vitaminas, concentrados..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="consumoDiarioPromedio">Consumo Diario Promedio (kg/cabeza)</label>
                            <input type="number" id="consumoDiarioPromedio" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaAlimentacion">Frecuencia de Alimentación</label>
                            <select id="frecuenciaAlimentacion">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="libre">Libre Acceso</option>
                                <option value="una-vez">1 vez al día</option>
                                <option value="dos-veces">2 veces al día</option>
                                <option value="tres-veces">3 veces al día</option>
                                <option value="controlado">Controlado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="manejoSanitario">Manejo Sanitario</label>
                            <select id="manejoSanitario">
                                <option value="">Seleccionar</option>
                                <option value="preventivo">Preventivo</option>
                                <option value="correctivo">Correctivo</option>
                                <option value="intensivo">Intensivo</option>
                                <option value="basico">Básico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaRevision">Frecuencia de Revisión</label>
                            <select id="frecuenciaRevision">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Diaria</option>
                                <option value="alterna">Día por Medio</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="protocoloVacunacion">Protocolo de Vacunación</label>
                            <textarea id="protocoloVacunacion" rows="2" placeholder="Vacunas aplicadas, fechas, próximas aplicaciones..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="protocoloDesparasitacion">Protocolo de Desparasitación</label>
                            <textarea id="protocoloDesparasitacion" rows="2" placeholder="Productos utilizados, fechas, frecuencia..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="manejoReproductivo">Manejo Reproductivo</label>
                            <select id="manejoReproductivo">
                                <option value="">Seleccionar</option>
                                <option value="monta-natural">Monta Natural</option>
                                <option value="inseminacion">Inseminación Artificial</option>
                                <option value="transferencia">Transferencia de Embriones</option>
                                <option value="mixto">Mixto</option>
                                <option value="ninguno">No Aplica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rotacionCorrales">Rotación de Corrales</label>
                            <select id="rotacionCorrales">
                                <option value="">Seleccionar</option>
                                <option value="fija">Fija</option>
                                <option value="rotativa">Rotativa</option>
                                <option value="estacional">Estacional</option>
                                <option value="ninguna">Ninguna</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="instruccionesEspeciales">Instrucciones Especiales de Manejo</label>
                            <textarea id="instruccionesEspeciales" rows="3" placeholder="Instrucciones específicas, precauciones, manejo especial requerido..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'lote-composicion')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'lote-seguimiento')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Seguimiento y Métricas -->
            <div id="lote-seguimiento" class="tab-content">
                <form id="formLoteSeguimiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaInicioSeguimiento">Fecha Inicio Seguimiento</label>
                            <input type="date" id="fechaInicioSeguimiento">
                        </div>
                        <div class="form-group">
                            <label for="fechaEstimadaCierre">Fecha Estimada de Cierre</label>
                            <input type="date" id="fechaEstimadaCierre">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="gananciaDiariaEsperada">Ganancia Diaria Esperada (g/día)</label>
                            <input type="number" id="gananciaDiariaEsperada" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="conversionAlimenticiaEsperada">Conversión Alimenticia Esperada</label>
                            <input type="number" id="conversionAlimenticiaEsperada" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mortalidadPermitida">Mortalidad Permitida (%)</label>
                            <input type="number" id="mortalidadPermitida" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="mortalidadActual">Mortalidad Actual (%)</label>
                            <input type="number" id="mortalidadActual" min="0" max="100" step="0.1" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costosAlimentacionMensual">Costos Alimentación Mensual ($)</label>
                            <input type="number" id="costosAlimentacionMensual" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="costosSanitariosMensual">Costos Sanitarios Mensual ($)</label>
                            <input type="number" id="costosSanitariosMensual" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costosManoObraMensual">Costos Mano de Obra Mensual ($)</label>
                            <input type="number" id="costosManoObraMensual" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="costosTotalesMensual">Costos Totales Mensual ($)</label>
                            <input type="number" id="costosTotalesMensual" min="0" step="0.01" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="frecuenciaPesaje">Frecuencia de Pesaje</label>
                            <select id="frecuenciaPesaje">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="eventual">Eventual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaEvaluacion">Frecuencia de Evaluación</label>
                            <select id="frecuenciaEvaluacion">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Diaria</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="indicadoresSeguimiento">Indicadores de Seguimiento</label>
                            <textarea id="indicadoresSeguimiento" rows="3" placeholder="Indicadores clave a monitorear, metas específicas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="reportesGenerados">Reportes a Generar</label>
                            <select id="reportesGenerados" multiple style="height: 100px;">
                                <option value="pesaje">Reporte de Pesaje</option>
                                <option value="salud">Reporte de Salud</option>
                                <option value="alimentacion">Reporte de Alimentación</option>
                                <option value="reproduccion">Reporte de Reproducción</option>
                                <option value="costos">Reporte de Costos</option>
                                <option value="produccion">Reporte de Producción</option>
                                <option value="mortalidad">Reporte de Mortalidad</option>
                                <option value="rendimiento">Reporte de Rendimiento</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesFinales">Observaciones y Recomendaciones Finales</label>
                            <textarea id="observacionesFinales" rows="3" placeholder="Observaciones importantes, recomendaciones para el manejo, consideraciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'lote-manejo')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarLote()">Guardar Lote</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- MODAL PARA GRUPOS - GESTION DE CONFIGURACIONES -->
<div id="modalGrupos" class="modal">
    <div class="modal-content" style="max-width: 1100px;">
        <div class="modal-header">
            <h3><i class="fas fa-users"></i> Gestión de Grupos</h3>
            <button class="close-modal" onclick="cerrarModal('modalGrupos')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'grupo-datos')">Datos del Grupo</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'grupo-composicion')">Composición</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'grupo-asignaciones')">Asignaciones</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'grupo-manejo')">Manejo y Seguimiento</button>
            </div>

            <!-- Sección 1: Datos del Grupo -->
            <div id="grupo-datos" class="tab-content active">
                <form id="formGrupoDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoGrupo">Código del Grupo *</label>
                            <input type="text" id="codigoGrupo" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreGrupo">Nombre del Grupo *</label>
                            <input type="text" id="nombreGrupo" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoGrupo">Tipo de Grupo *</label>
                            <select id="tipoGrupo" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="produccion">Producción</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="sanidad">Sanidad</option>
                                <option value="alimentacion">Alimentación</option>
                                <option value="manejo">Manejo General</option>
                                <option value="seleccion">Selección</option>
                                <option value="venta">Pre-venta</option>
                                <option value="cuarentena">Cuarentena</option>
                                <option value="recuperacion">Recuperación</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="especial">Grupo Especial</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaGrupo">Categoría del Grupo *</label>
                            <select id="categoriaGrupo" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="terneros">Terneros</option>
                                <option value="novillos">Novillos</option>
                                <option value="novillas">Novillas</option>
                                <option value="vacas">Vacas</option>
                                <option value="toros">Toros</option>
                                <option value="vientres">Vientres</option>
                                <option value="mixto">Mixto</option>
                                <option value="todas">Todas las Categorías</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaCreacionGrupo">Fecha de Creación *</label>
                            <input type="date" id="fechaCreacionGrupo" required>
                        </div>
                        <div class="form-group">
                            <label for="estadoGrupo">Estado del Grupo *</label>
                            <select id="estadoGrupo" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="suspendido">Suspendido</option>
                                <option value="finalizado">Finalizado</option>
                                <option value="planificado">Planificado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="loteAsociado">Lote Asociado</label>
                            <select id="loteAsociado">
                                <option value="">Seleccionar lote</option>
                                <!-- Opciones se cargarán dinámicamente -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="corralAsignado">Corral Asignado</label>
                            <select id="corralAsignado">
                                <option value="">Seleccionar corral</option>
                                <!-- Opciones se cargarán dinámicamente -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="responsableGrupo">Responsable del Grupo *</label>
                            <input type="text" id="responsableGrupo" required>
                        </div>
                        <div class="form-group">
                            <label for="supervisorGrupo">Supervisor</label>
                            <input type="text" id="supervisorGrupo">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="objetivoGrupo">Objetivo del Grupo *</label>
                            <textarea id="objetivoGrupo" rows="3" placeholder="Objetivo principal, propósito específico, metas a alcanzar..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="criterioFormacion">Criterio de Formación del Grupo</label>
                            <textarea id="criterioFormacion" rows="2" placeholder="Criterios utilizados para formar este grupo (edad, peso, producción, salud, etc.)"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalGrupos')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'grupo-composicion')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Composición -->
            <div id="grupo-composicion" class="tab-content">
                <form id="formGrupoComposicion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="totalAnimalesGrupo">Total de Animales en el Grupo *</label>
                            <input type="number" id="totalAnimalesGrupo" min="0" required>
                        </div>
                        <div class="form-group">
                            <label for="capacidadMaximaGrupo">Capacidad Máxima del Grupo</label>
                            <input type="number" id="capacidadMaximaGrupo" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razaPredominante">Raza Predominante</label>
                            <select id="razaPredominante">
                                <option value="">Seleccionar raza</option>
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                                <option value="simental">Simental</option>
                                <option value="limousin">Limousin</option>
                                <option value="charolais">Charolais</option>
                                <option value="guzerat">Guzerat</option>
                                <option value="gyr">Gyr</option>
                                <option value="cruzado">Cruzado</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="composicionRazas">Composición de Razas</label>
                            <textarea id="composicionRazas" rows="2" placeholder="Distribución porcentual de razas en el grupo"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="machosGrupo">Machos (cantidad)</label>
                            <input type="number" id="machosGrupo" min="0">
                        </div>
                        <div class="form-group">
                            <label for="hembrasGrupo">Hembras (cantidad)</label>
                            <input type="number" id="hembrasGrupo" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadMinima">Edad Mínima (meses)</label>
                            <input type="number" id="edadMinima" min="0">
                        </div>
                        <div class="form-group">
                            <label for="edadMaxima">Edad Máxima (meses)</label>
                            <input type="number" id="edadMaxima" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pesoMinimo">Peso Mínimo (kg)</label>
                            <input type="number" id="pesoMinimo" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="pesoMaximo">Peso Máximo (kg)</label>
                            <input type="number" id="pesoMaximo" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="condicionCorporalMin">Condición Corporal Mínima (1-5)</label>
                            <select id="condicionCorporalMin">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condicionCorporalMax">Condición Corporal Máxima (1-5)</label>
                            <select id="condicionCorporalMax">
                                <option value="">Seleccionar</option>
                                <option value="1">1 - Muy flaco</option>
                                <option value="2">2 - Flaco</option>
                                <option value="3">3 - Ideal</option>
                                <option value="4">4 - Gordo</option>
                                <option value="5">5 - Muy gordo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoProductivo">Estado Productivo</label>
                            <select id="estadoProductivo">
                                <option value="">Seleccionar</option>
                                <option value="lactancia">Lactancia</option>
                                <option value="seca">Seca</option>
                                <option value="gestacion">Gestación</option>
                                <option value="vacia">Vacía</option>
                                <option value="desarrollo">Desarrollo</option>
                                <option value="engorde">Engorde</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoReproductivo">Estado Reproductivo</label>
                            <select id="estadoReproductivo">
                                <option value="">Seleccionar</option>
                                <option value="servicio">En Servicio</option>
                                <option value="preñada">Preñada</option>
                                <option value="parida">Parida</option>
                                <option value="vacia">Vacía</option>
                                <option value="no-aplica">No Aplica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="criteriosInclusion">Criterios de Inclusión en el Grupo</label>
                            <textarea id="criteriosInclusion" rows="3" placeholder="Criterios específicos para incluir animales en este grupo..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="criteriosExclusion">Criterios de Exclusión del Grupo</label>
                            <textarea id="criteriosExclusion" rows="2" placeholder="Criterios que excluyen animales de este grupo..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'grupo-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'grupo-asignaciones')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Asignaciones -->
            <div id="grupo-asignaciones" class="tab-content">
                <form id="formGrupoAsignaciones">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sistemaAlimentacionGrupo">Sistema de Alimentación</label>
                            <select id="sistemaAlimentacionGrupo">
                                <option value="">Seleccionar sistema</option>
                                <option value="pastoreo">Pastoreo</option>
                                <option value="confinamiento">Confinamiento</option>
                                <option value="semi-confinamiento">Semi-confinamiento</option>
                                <option value="suplementacion">Suplementación</option>
                                <option value="mixto">Mixto</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dietaEspecifica">Dieta Específica</label>
                            <input type="text" id="dietaEspecifica" placeholder="Tipo de dieta asignada al grupo">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="protocoloSanitario">Protocolo Sanitario Asignado</label>
                            <select id="protocoloSanitario">
                                <option value="">Seleccionar protocolo</option>
                                <option value="preventivo">Preventivo</option>
                                <option value="intensivo">Intensivo</option>
                                <option value="basico">Básico</option>
                                <option value="especial">Especial</option>
                                <option value="ninguno">Ninguno</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="protocoloReproductivo">Protocolo Reproductivo</label>
                            <select id="protocoloReproductivo">
                                <option value="">Seleccionar protocolo</option>
                                <option value="monta-natural">Monta Natural</option>
                                <option value="inseminacion">Inseminación Artificial</option>
                                <option value="transferencia">Transferencia de Embriones</option>
                                <option value="sincronizacion">Sincronización</option>
                                <option value="ninguno">No Aplica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="frecuenciaMonitoreo">Frecuencia de Monitoreo</label>
                            <select id="frecuenciaMonitoreo">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Diaria</option>
                                <option value="alterna">Día por Medio</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaEvaluacion">Frecuencia de Evaluación</label>
                            <select id="frecuenciaEvaluacion">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="trimestral">Trimestral</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="personalAsignado">Personal Asignado</label>
                            <textarea id="personalAsignado" rows="2" placeholder="Personal específico asignado a este grupo"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="equiposAsignados">Equipos Asignados</label>
                            <textarea id="equiposAsignados" rows="2" placeholder="Equipos específicos para el manejo del grupo"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="horarioManejo">Horario de Manejo</label>
                            <input type="text" id="horarioManejo" placeholder="Ej: Lunes a Viernes 6:00-14:00">
                        </div>
                        <div class="form-group">
                            <label for="turnoTrabajo">Turno de Trabajo</label>
                            <select id="turnoTrabajo">
                                <option value="">Seleccionar turno</option>
                                <option value="matutino">Matutino</option>
                                <option value="vespertino">Vespertino</option>
                                <option value="nocturno">Nocturno</option>
                                <option value="mixto">Mixto</option>
                                <option value="continuo">Continuo</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="recursosEspeciales">Recursos Especiales Asignados</label>
                            <textarea id="recursosEspeciales" rows="2" placeholder="Recursos especiales, instalaciones, áreas específicas..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="restriccionesManejo">Restricciones de Manejo</label>
                            <textarea id="restriccionesManejo" rows="2" placeholder="Restricciones específicas para el manejo de este grupo"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="instruccionesEspecialesGrupo">Instrucciones Especiales de Manejo</label>
                            <textarea id="instruccionesEspecialesGrupo" rows="3" placeholder="Instrucciones específicas, precauciones, consideraciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'grupo-composicion')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'grupo-manejo')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Manejo y Seguimiento -->
            <div id="grupo-manejo" class="tab-content">
                <form id="formGrupoManejo">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaInicioSeguimientoGrupo">Fecha Inicio Seguimiento</label>
                            <input type="date" id="fechaInicioSeguimientoGrupo">
                        </div>
                        <div class="form-group">
                            <label for="fechaEstimadaFinalizacion">Fecha Estimada de Finalización</label>
                            <input type="date" id="fechaEstimadaFinalizacion">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="duracionEstimada">Duración Estimada (días)</label>
                            <input type="number" id="duracionEstimada" min="0">
                        </div>
                        <div class="form-group">
                            <label for="progresoActual">Progreso Actual (%)</label>
                            <input type="number" id="progresoActual" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="indicadoresSeguimientoGrupo">Indicadores de Seguimiento</label>
                            <select id="indicadoresSeguimientoGrupo" multiple style="height: 120px;">
                                <option value="peso">Peso Corporal</option>
                                <option value="ganancia-peso">Ganancia de Peso</option>
                                <option value="condicion-corporal">Condición Corporal</option>
                                <option value="produccion-leche">Producción de Leche</option>
                                <option value="calidad-leche">Calidad de Leche</option>
                                <option value="fertilidad">Fertilidad</option>
                                <option value="preñez">Tasa de Preñez</option>
                                <option value="mortalidad">Mortalidad</option>
                                <option value="morbilidad">Morbilidad</option>
                                <option value="consumo-alimento">Consumo de Alimento</option>
                                <option value="conversion-alimenticia">Conversión Alimenticia</option>
                                <option value="eficiencia-reproductiva">Eficiencia Reproductiva</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="metasGrupo">Metas del Grupo</label>
                            <textarea id="metasGrupo" rows="4" placeholder="Metas específicas a alcanzar, indicadores de éxito..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="frecuenciaReportes">Frecuencia de Reportes</label>
                            <select id="frecuenciaReportes">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Diaria</option>
                                <option value="semanal">Semanal</option>
                                <option value="quincenal">Quincenal</option>
                                <option value="mensual">Mensual</option>
                                <option value="bimestral">Bimestral</option>
                                <option value="trimestral">Trimestral</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipoReportes">Tipos de Reportes a Generar</label>
                            <select id="tipoReportes" multiple style="height: 100px;">
                                <option value="seguimiento">Reporte de Seguimiento</option>
                                <option value="rendimiento">Reporte de Rendimiento</option>
                                <option value="sanidad">Reporte de Sanidad</option>
                                <option value="alimentacion">Reporte de Alimentación</option>
                                <option value="reproduccion">Reporte de Reproducción</option>
                                <option value="produccion">Reporte de Producción</option>
                                <option value="costos">Reporte de Costos</option>
                                <option value="evaluacion">Reporte de Evaluación</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="costoMensualEstimado">Costo Mensual Estimado ($)</label>
                            <input type="number" id="costoMensualEstimado" min="0" step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="presupuestoAsignado">Presupuesto Asignado ($)</label>
                            <input type="number" id="presupuestoAsignado" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prioridadGrupo">Prioridad del Grupo</label>
                            <select id="prioridadGrupo">
                                <option value="">Seleccionar prioridad</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                                <option value="critica">Crítica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelRiesgo">Nivel de Riesgo</label>
                            <select id="nivelRiesgo">
                                <option value="">Seleccionar nivel</option>
                                <option value="bajo">Bajo</option>
                                <option value="medio">Medio</option>
                                <option value="alto">Alto</option>
                                <option value="muy-alto">Muy Alto</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="planContingencia">Plan de Contingencia</label>
                            <textarea id="planContingencia" rows="3" placeholder="Acciones a tomar en caso de problemas, planes de respaldo..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesFinalesGrupo">Observaciones y Recomendaciones Finales</label>
                            <textarea id="observacionesFinalesGrupo" rows="3" placeholder="Observaciones importantes, recomendaciones para el manejo, consideraciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'grupo-asignaciones')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarGrupo()">Guardar Grupo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA COLORES - GESTION DE CONFIGURACIONES -->
<div id="modalColores" class="modal">
    <div class="modal-content" style="max-width: 950px;">
        <div class="modal-header">
            <h3><i class="fas fa-palette"></i> Gestión de Colores</h3>
            <button class="close-modal" onclick="cerrarModal('modalColores')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'color-datos')">Datos del Color</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'color-caracteristicas')">Características</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'color-asociaciones')">Asociaciones</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'color-seguimiento')">Seguimiento</button>
            </div>

            <!-- Sección 1: Datos del Color -->
            <div id="color-datos" class="tab-content active">
                <form id="formColorDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoColor">Código del Color *</label>
                            <input type="text" id="codigoColor" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreColor">Nombre del Color *</label>
                            <input type="text" id="nombreColor" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoColor">Tipo de Color *</label>
                            <select id="tipoColor" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="basico">Básico/Principal</option>
                                <option value="combinado">Combinado</option>
                                <option value="degradado">Degradado</option>
                                <option value="manchado">Manchado/Moteado</option>
                                <option value="rayado">Rayado/Listado</option>
                                <option value="especial">Especial/Característico</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaColor">Categoría del Color *</label>
                            <select id="categoriaColor" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="sólido">Sólido</option>
                                <option value="bicolor">Bicolor</option>
                                <option value="tricolor">Tricolor</option>
                                <option value="multicolor">Multicolor</option>
                                <option value="patron">Con Patrón</option>
                                <option value="degradado">Degradado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoColor">Estado del Color *</label>
                            <select id="estadoColor" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="en-evaluacion">En Evaluación</option>
                                <option value="descontinuado">Descontinuado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fechaRegistroColor">Fecha de Registro</label>
                            <input type="date" id="fechaRegistroColor">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="usuarioRegistroColor">Usuario que Registra</label>
                            <input type="text" id="usuarioRegistroColor">
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaUso">Frecuencia de Uso Estimada</label>
                            <select id="frecuenciaUso">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                                <option value="rara">Rara/Ocasional</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionColor">Descripción del Color *</label>
                            <textarea id="descripcionColor" rows="3" placeholder="Descripción detallada del color, características visuales, particularidades..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="sinonimosColor">Sinónimos/Nombres Alternativos</label>
                            <textarea id="sinonimosColor" rows="2" placeholder="Otros nombres con los que se conoce este color, variantes regionales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalColores')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'color-caracteristicas')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Características -->
            <div id="color-caracteristicas" class="tab-content">
                <form id="formColorCaracteristicas">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoHexadecimal">Código Hexadecimal</label>
                            <div class="color-input-group">
                                <input type="text" id="codigoHexadecimal" placeholder="#FFFFFF" maxlength="7">
                                <div class="color-preview" id="colorPreview"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="familiaColor">Familia de Color</label>
                            <select id="familiaColor">
                                <option value="">Seleccionar familia</option>
                                <option value="rojos">Rojos</option>
                                <option value="negros">Negros</option>
                                <option value="blancos">Blancos</option>
                                <option value="marrones">Marrones/Cafés</option>
                                <option value="grises">Grises</option>
                                <option value="amarillos">Amarillos/Dorados</option>
                                <option value="cremas">Cremas/Beige</option>
                                <option value="mezclas">Mezclas</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="intensidadColor">Intensidad del Color</label>
                            <select id="intensidadColor">
                                <option value="">Seleccionar intensidad</option>
                                <option value="muy-claro">Muy Claro</option>
                                <option value="claro">Claro</option>
                                <option value="medio">Medio</option>
                                <option value="oscuro">Oscuro</option>
                                <option value="muy-oscuro">Muy Oscuro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brilloColor">Brillo/Reflejo</label>
                            <select id="brilloColor">
                                <option value="">Seleccionar brillo</option>
                                <option value="mate">Mate</option>
                                <option value="semi-brillante">Semi-brillante</option>
                                <option value="brillante">Brillante</option>
                                <option value="muy-brillante">Muy Brillante</option>
                                <option value="iridiscente">Iridiscente</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="patronColor">Patrón de Color</label>
                            <select id="patronColor">
                                <option value="">Seleccionar patrón</option>
                                <option value="uniforme">Uniforme</option>
                                <option value="manchado">Manchado</option>
                                <option value="moteado">Moteado</option>
                                <option value="rayado">Rayado</option>
                                <option value="jaspeado">Jaspeado</option>
                                <option value="atigrado">Atigrado</option>
                                <option value="salpicado">Salpicado</option>
                                <option value="bordeado">Bordeado</option>
                                <option value="no-aplica">No Aplica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="distribucionColor">Distribución del Color</label>
                            <select id="distribucionColor">
                                <option value="">Seleccionar distribución</option>
                                <option value="uniforme">Uniforme en todo el cuerpo</option>
                                <option value="parcial">Parcial/Zonas específicas</option>
                                <option value="puntos">En puntos/manchas</option>
                                <option value="lineas">En líneas/rayas</option>
                                <option value="gradiente">En gradiente/degradado</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="zonasEspecificas">Zonas Específicas del Cuerpo</label>
                            <select id="zonasEspecificas" multiple style="height: 120px;">
                                <option value="cabeza">Cabeza</option>
                                <option value="cara">Cara</option>
                                <option value="orejas">Orejas</option>
                                <option value="cuello">Cuello</option>
                                <option value="cruz">Cruz</option>
                                <option value="lomo">Lomo</option>
                                <option value="grupa">Grupa</option>
                                <option value="cola">Cola</option>
                                <option value="patas">Patas</option>
                                <option value="pezuñas">Pezuñas</option>
                                <option value="vientre">Vientre</option>
                                <option value="costados">Costados</option>
                                <option value="dorso">Dorso</option>
                                <option value="todo-cuerpo">Todo el Cuerpo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="variacionesEstacionales">Variaciones Estacionales</label>
                            <select id="variacionesEstacionales">
                                <option value="">Seleccionar</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="leve">Leve</option>
                                <option value="moderada">Moderada</option>
                                <option value="marcada">Marcada</option>
                                <option value="extrema">Extrema</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="caracteristicasEspeciales">Características Especiales</label>
                            <textarea id="caracteristicasEspeciales" rows="3" placeholder="Características únicas, cambios con la edad, particularidades genéticas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'color-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'color-asociaciones')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Asociaciones -->
            <div id="color-asociaciones" class="tab-content">
                <form id="formColorAsociaciones">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="razasAsociadas">Razas Asociadas</label>
                            <select id="razasAsociadas" multiple style="height: 150px;">
                                <option value="brahman">Brahman</option>
                                <option value="nelore">Nelore</option>
                                <option value="angus">Angus</option>
                                <option value="hereford">Hereford</option>
                                <option value="holstein">Holstein</option>
                                <option value="simental">Simental</option>
                                <option value="limousin">Limousin</option>
                                <option value="charolais">Charolais</option>
                                <option value="guzerat">Guzerat</option>
                                <option value="gyr">Gyr</option>
                                <option value="brangus">Brangus</option>
                                <option value="braford">Braford</option>
                                <option value="santa-gertrudis">Santa Gertrudis</option>
                                <option value="todas">Todas las Razas</option>
                                <option value="ninguna">Ninguna Específica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prevalenciaRaza">Prevalencia por Raza</label>
                            <textarea id="prevalenciaRaza" rows="4" placeholder="Distribución del color en diferentes razas, frecuencia de aparición..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="herenciaColor">Tipo de Herencia</label>
                            <select id="herenciaColor">
                                <option value="">Seleccionar tipo</option>
                                <option value="dominante">Dominante</option>
                                <option value="recesivo">Recesivo</option>
                                <option value="codominante">Codominante</option>
                                <option value="poli genico">Poligénico</option>
                                <option value="ligado-sexo">Ligado al Sexo</option>
                                <option value="mitocondrial">Mitocondrial</option>
                                <option value="complejo">Complejo/Múltiple</option>
                                <option value="desconocido">Desconocido</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="genesAsociados">Genes Asociados</label>
                            <input type="text" id="genesAsociados" placeholder="Ej: MC1R, ASIP, KIT, etc.">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="combinacionesPosibles">Combinaciones Posibles</label>
                            <textarea id="combinacionesPosibles" rows="3" placeholder="Colores con los que puede combinarse, resultados de cruces..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="coloresIncompatibles">Colores Incompatibles</label>
                            <textarea id="coloresIncompatibles" rows="2" placeholder="Colores que no pueden presentarse junto con este..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="preferenciaMercado">Preferencia en el Mercado</label>
                            <select id="preferenciaMercado">
                                <option value="">Seleccionar preferencia</option>
                                <option value="alta">Alta Demanda</option>
                                <option value="media">Demanda Media</option>
                                <option value="baja">Baja Demanda</option>
                                <option value="variable">Variable</option>
                                <option value="regional">Depende de la Región</option>
                                <option value="especializado">Mercado Especializado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="valorComercial">Valor Comercial Relativo</label>
                            <select id="valorComercial">
                                <option value="">Seleccionar valor</option>
                                <option value="premium">Premium (+20%)</option>
                                <option value="superior">Superior (+10%)</option>
                                <option value="estandar">Estándar (0%)</option>
                                <option value="inferior">Inferior (-10%)</option>
                                <option value="descuento">Con Descuento (-20%)</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="usoEnIdentificacion">Uso en Identificación</label>
                            <select id="usoEnIdentificacion">
                                <option value="">Seleccionar uso</option>
                                <option value="primario">Primario/Principal</option>
                                <option value="secundario">Secundario</option>
                                <option value="complementario">Complementario</option>
                                <option value="no-recomendado">No Recomendado</option>
                                <option value="confuso">Puede ser Confuso</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facilidadIdentificacion">Facilidad de Identificación</label>
                            <select id="facilidadIdentificacion">
                                <option value="">Seleccionar</option>
                                <option value="muy-facil">Muy Fácil</option>
                                <option value="facil">Fácil</option>
                                <option value="regular">Regular</option>
                                <option value="dificil">Difícil</option>
                                <option value="muy-dificil">Muy Difícil</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesAsociaciones">Observaciones de Asociaciones</label>
                            <textarea id="observacionesAsociaciones" rows="3" placeholder="Relaciones con características productivas, consideraciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'color-caracteristicas')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'color-seguimiento')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Seguimiento -->
            <div id="color-seguimiento" class="tab-content">
                <form id="formColorSeguimiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="totalAnimalesColor">Total de Animales con este Color</label>
                            <input type="number" id="totalAnimalesColor" min="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="porcentajePoblacion">Porcentaje en la Población (%)</label>
                            <input type="number" id="porcentajePoblacion" min="0" max="100" step="0.1" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tendenciaUso">Tendencia de Uso</label>
                            <select id="tendenciaUso">
                                <option value="">Seleccionar tendencia</option>
                                <option value="creciente">En Aumento</option>
                                <option value="estable">Estable</option>
                                <option value="decreciente">En Disminución</option>
                                <option value="variable">Variable</option>
                                <option value="nueva">Nueva Tendencia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="popularidad">Nivel de Popularidad</label>
                            <select id="popularidad">
                                <option value="">Seleccionar nivel</option>
                                <option value="muy-popular">Muy Popular</option>
                                <option value="popular">Popular</option>
                                <option value="regular">Regular</option>
                                <option value="poco-popular">Poco Popular</option>
                                <option value="raro">Raro/Exótico</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaUltimaActualizacion">Fecha Última Actualización</label>
                            <input type="date" id="fechaUltimaActualizacion">
                        </div>
                        <div class="form-group">
                            <label for="usuarioUltimaActualizacion">Usuario Última Actualización</label>
                            <input type="text" id="usuarioUltimaActualizacion">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadisticasUso">Estadísticas de Uso</label>
                            <textarea id="estadisticasUso" rows="3" placeholder="Datos estadísticos, distribución por categorías, tendencias históricas..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reportesRelacionados">Reportes Relacionados</label>
                            <textarea id="reportesRelacionados" rows="2" placeholder="Reportes que incluyen este color, análisis específicos..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesUso">Recomendaciones de Uso</label>
                            <textarea id="recomendacionesUso" rows="3" placeholder="Recomendaciones para el uso de este color en registros, consideraciones prácticas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesFinalesColor">Observaciones y Comentarios Finales</label>
                            <textarea id="observacionesFinalesColor" rows="3" placeholder="Observaciones importantes, comentarios adicionales, información relevante..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'color-asociaciones')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarColor()">Guardar Color</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CRUCES - GESTION DE CONFIGURACIONES-->
<div id="modalCruces" class="modal">
    <div class="modal-content" style="max-width: 1200px;">
        <div class="modal-header">
            <h3><i class="fas fa-project-diagram"></i> Gestión de Cruces</h3>
            <button class="close-modal" onclick="cerrarModal('modalCruces')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'cruce-datos')">Datos del Cruce</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'cruce-parentales')">Parentales</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'cruce-genetica')">Genética y Heredabilidad</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'cruce-resultados')">Resultados Esperados</button>
            </div>

            <!-- Sección 1: Datos del Cruce -->
            <div id="cruce-datos" class="tab-content active">
                <form id="formCruceDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoCruce">Código del Cruce *</label>
                            <input type="text" id="codigoCruce" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreCruce">Nombre del Cruce *</label>
                            <input type="text" id="nombreCruce" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoCruce">Tipo de Cruce *</label>
                            <select id="tipoCruce" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="simple">Cruce Simple (F1)</option>
                                <option value="retroceso">Retroceso (Backcross)</option>
                                <option value="tres-vias">Cruce de Tres Vías</option>
                                <option value="cuatro-vias">Cruce de Cuatro Vías</option>
                                <option value="rotacional">Sistema Rotacional</option>
                                <option value="terminal">Cruce Terminal</option>
                                <option value="absorbente">Cruce Absorbente</option>
                                <option value="mejoramiento">Cruce de Mejoramiento</option>
                                <option value="composite">Formación de Composite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaCruce">Categoría del Cruce *</label>
                            <select id="categoriaCruce" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="carne">Producción de Carne</option>
                                <option value="leche">Producción de Leche</option>
                                <option value="doble-proposito">Doble Propósito</option>
                                <option value="adaptacion">Adaptación Ambiental</option>
                                <option value="mejoramiento">Mejoramiento Genético</option>
                                <option value="comercial">Comercial</option>
                                <option value="experimental">Experimental</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoCruce">Estado del Cruce *</label>
                            <select id="estadoCruce" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="desarrollo">En Desarrollo</option>
                                <option value="evaluacion">En Evaluación</option>
                                <option value="validado">Validado</option>
                                <option value="descontinuado">Descontinuado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fechaRegistroCruce">Fecha de Registro</label>
                            <input type="date" id="fechaRegistroCruce">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="objetivoPrincipal">Objetivo Principal *</label>
                            <select id="objetivoPrincipal" required>
                                <option value="">Seleccionar objetivo</option>
                                <option value="vigor-hibrido">Vigor Híbrido</option>
                                <option value="mejora-carne">Mejora de Carne</option>
                                <option value="mejora-leche">Mejora de Leche</option>
                                <option value="adaptacion-clima">Adaptación Climática</option>
                                <option value="resistencia-enfermedades">Resistencia a Enfermedades</option>
                                <option value="mejora-fertilidad">Mejora de Fertilidad</option>
                                <option value="mejora-crecimiento">Mejora de Crecimiento</option>
                                <option value="mejora-conversion">Mejora Conversión Alimenticia</option>
                                <option value="multiple">Múltiples Objetivos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prioridadCruce">Prioridad del Cruce</label>
                            <select id="prioridadCruce">
                                <option value="">Seleccionar prioridad</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                                <option value="estrategica">Estratégica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionCruce">Descripción del Cruce *</label>
                            <textarea id="descripcionCruce" rows="3" placeholder="Descripción detallada del cruce, justificación, características principales..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesCruce">Observaciones Generales</label>
                            <textarea id="observacionesCruce" rows="2" placeholder="Observaciones adicionales, consideraciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalCruces')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'cruce-parentales')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Parentales -->
            <div id="cruce-parentales" class="tab-content">
                <form id="formCruceParentales">
                    <div class="parental-section">
                        <h4>Parental Macho (Padre)</h4>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="razaPadre">Raza del Padre *</label>
                                <select id="razaPadre" required>
                                    <option value="">Seleccionar raza</option>
                                    <option value="brahman">Brahman</option>
                                    <option value="nelore">Nelore</option>
                                    <option value="angus">Angus</option>
                                    <option value="hereford">Hereford</option>
                                    <option value="simental">Simental</option>
                                    <option value="limousin">Limousin</option>
                                    <option value="charolais">Charolais</option>
                                    <option value="guzerat">Guzerat</option>
                                    <option value="gyr">Gyr</option>
                                    <option value="brangus">Brangus</option>
                                    <option value="braford">Braford</option>
                                    <option value="otro">Otra Raza</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="porcentajePadre">Porcentaje Genético (%) *</label>
                                <input type="number" id="porcentajePadre" min="0" max="100" step="0.1" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="caracteristicasPadre">Características del Padre</label>
                                <textarea id="caracteristicasPadre" rows="2" placeholder="Características destacadas, EPDs, méritos genéticos..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ventajasPadre">Ventajas que Aporta</label>
                                <textarea id="ventajasPadre" rows="2" placeholder="Ventajas específicas que aporta este parental..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="parental-section">
                        <h4>Parental Hembra (Madre)</h4>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="razaMadre">Raza de la Madre *</label>
                                <select id="razaMadre" required>
                                    <option value="">Seleccionar raza</option>
                                    <option value="brahman">Brahman</option>
                                    <option value="nelore">Nelore</option>
                                    <option value="angus">Angus</option>
                                    <option value="hereford">Hereford</option>
                                    <option value="simental">Simental</option>
                                    <option value="limousin">Limousin</option>
                                    <option value="charolais">Charolais</option>
                                    <option value="guzerat">Guzerat</option>
                                    <option value="gyr">Gyr</option>
                                    <option value="brangus">Brangus</option>
                                    <option value="braford">Braford</option>
                                    <option value="otro">Otra Raza</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="porcentajeMadre">Porcentaje Genético (%) *</label>
                                <input type="number" id="porcentajeMadre" min="0" max="100" step="0.1" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="caracteristicasMadre">Características de la Madre</label>
                                <textarea id="caracteristicasMadre" rows="2" placeholder="Características destacadas, EPDs, méritos genéticos..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ventajasMadre">Ventajas que Aporta</label>
                                <textarea id="ventajasMadre" rows="2" placeholder="Ventajas específicas que aporta este parental..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Parentales adicionales para cruces complejos -->
                    <div class="parental-section" id="parental-tercero" style="display: none;">
                        <h4>Tercer Parental</h4>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="razaTercero">Raza del Tercer Parental</label>
                                <select id="razaTercero">
                                    <option value="">Seleccionar raza</option>
                                    <!-- Mismas opciones que padres -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="porcentajeTercero">Porcentaje Genético (%)</label>
                                <input type="number" id="porcentajeTercero" min="0" max="100" step="0.1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="parental-section" id="parental-cuarto" style="display: none;">
                        <h4>Cuarto Parental</h4>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="razaCuarto">Raza del Cuarto Parental</label>
                                <select id="razaCuarto">
                                    <option value="">Seleccionar raza</option>
                                    <!-- Mismas opciones que padres -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="porcentajeCuarto">Porcentaje Genético (%)</label>
                                <input type="number" id="porcentajeCuarto" min="0" max="100" step="0.1">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="compatibilidadParentales">Compatibilidad entre Parentales</label>
                            <select id="compatibilidadParentales">
                                <option value="">Seleccionar compatibilidad</option>
                                <option value="alta">Alta Compatibilidad</option>
                                <option value="media">Compatibilidad Media</option>
                                <option value="baja">Baja Compatibilidad</option>
                                <option value="complementaria">Complementaria</option>
                                <option value="riesgo">Con Riesgo de Incompatibilidad</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'cruce-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'cruce-genetica')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Genética y Heredabilidad -->
            <div id="cruce-genetica" class="tab-content">
                <form id="formCruceGenetica">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nivelVigorHibrido">Nivel de Vigor Híbrido Esperado</label>
                            <select id="nivelVigorHibrido">
                                <option value="">Seleccionar nivel</option>
                                <option value="muy-alto">Muy Alto (15-20%)</option>
                                <option value="alto">Alto (10-15%)</option>
                                <option value="medio">Medio (5-10%)</option>
                                <option value="bajo">Bajo (0-5%)</option>
                                <option value="ninguno">Sin Vigor Híbrido</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipoHerencia">Tipo de Herencia Predominante</label>
                            <select id="tipoHerencia">
                                <option value="">Seleccionar tipo</option>
                                <option value="aditiva">Aditiva</option>
                                <option value="dominante">Dominante</option>
                                <option value="recesiva">Recesiva</option>
                                <option value="sobredominante">Sobredominante</option>
                                <option value="epistatica">Epistática</option>
                                <option value="mixta">Mixta/Compleja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="heredabilidadCarne">Heredabilidad para Carne (%)</label>
                            <input type="number" id="heredabilidadCarne" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="heredabilidadLeche">Heredabilidad para Leche (%)</label>
                            <input type="number" id="heredabilidadLeche" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="heredabilidadFertilidad">Heredabilidad para Fertilidad (%)</label>
                            <input type="number" id="heredabilidadFertilidad" min="0" max="100" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="heredabilidadCrecimiento">Heredabilidad para Crecimiento (%)</label>
                            <input type="number" id="heredabilidadCrecimiento" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="genesDestacados">Genes Destacados Involucrados</label>
                            <textarea id="genesDestacados" rows="2" placeholder="Genes específicos, marcadores genéticos importantes..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="marcadoresGeneticos">Marcadores Genéticos Utilizados</label>
                            <textarea id="marcadoresGeneticos" rows="2" placeholder="Marcadores DNA, SNPs utilizados en la selección..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="correlacionesGeneticas">Correlaciones Genéticas</label>
                            <select id="correlacionesGeneticas" multiple style="height: 120px;">
                                <option value="crecimiento-fertilidad">Crecimiento - Fertilidad</option>
                                <option value="carne-leche">Carne - Leche</option>
                                <option value="adaptacion-produccion">Adaptación - Producción</option>
                                <option value="tamaño-conversion">Tamaño - Conversión Alimenticia</option>
                                <option value="resistencia-crecimiento">Resistencia - Crecimiento</option>
                                <option value="calidad-rendimiento">Calidad - Rendimiento</option>
                                <option value="temperamento-produccion">Temperamento - Producción</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="interaccionesGenotipo">Interacciones Genotipo-Ambiente</label>
                            <select id="interaccionesGenotipo">
                                <option value="">Seleccionar interacción</option>
                                <option value="alta">Alta Interacción</option>
                                <option value="media">Interacción Media</option>
                                <option value="baja">Baja Interacción</option>
                                <option value="especifica">Específica por Ambiente</option>
                                <option value="minima">Mínima Interacción</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="analisisGenetico">Análisis Genético Detallado</label>
                            <textarea id="analisisGenetico" rows="4" placeholder="Análisis de heredabilidades, varianzas genéticas, valores de cría esperados..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'cruce-parentales')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'cruce-resultados')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Resultados Esperados -->
            <div id="cruce-resultados" class="tab-content">
                <form id="formCruceResultados">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="gananciaDiariaEsperada">Ganancia Diaria Esperada (g/día)</label>
                            <input type="number" id="gananciaDiariaEsperada" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="pesoAdultoEsperado">Peso Adulto Esperado (kg)</label>
                            <input type="number" id="pesoAdultoEsperado" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="produccionLecheEsperada">Producción de Leche Esperada (L/día)</label>
                            <input type="number" id="produccionLecheEsperada" min="0" step="0.1">
                        </div>
                        <div class="form-group">
                            <label for="rendimientoCanalEsperado">Rendimiento en Canal Esperado (%)</label>
                            <input type="number" id="rendimientoCanalEsperado" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="edadPrimerPartoEsperada">Edad al Primer Parto Esperada (meses)</label>
                            <input type="number" id="edadPrimerPartoEsperada" min="0">
                        </div>
                        <div class="form-group">
                            <label for="intervaloPartosEsperado">Intervalo entre Partos Esperado (días)</label>
                            <input type="number" id="intervaloPartosEsperado" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="adaptabilidadClimaticaEsperada">Adaptabilidad Climática Esperada</label>
                            <select id="adaptabilidadClimaticaEsperada">
                                <option value="">Seleccionar adaptabilidad</option>
                                <option value="excelente">Excelente</option>
                                <option value="buena">Buena</option>
                                <option value="regular">Regular</option>
                                <option value="limitada">Limitada</option>
                                <option value="especifica">Específica</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resistenciaEnfermedadesEsperada">Resistencia a Enfermedades Esperada</label>
                            <select id="resistenciaEnfermedadesEsperada">
                                <option value="">Seleccionar resistencia</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                                <option value="variable">Variable</option>
                                <option value="especifica">Específica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="eficienciaAlimenticiaEsperada">Eficiencia Alimenticia Esperada</label>
                            <input type="number" id="eficienciaAlimenticiaEsperada" min="0" step="0.01" placeholder="Kg alimento/Kg ganancia">
                        </div>
                        <div class="form-group">
                            <label for="longevidadEsperada">Longevidad Esperada (años)</label>
                            <input type="number" id="longevidadEsperada" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="colorEsperado">Color Esperado del Progenie</label>
                            <input type="text" id="colorEsperado" placeholder="Color predominante esperado en la descendencia">
                        </div>
                        <div class="form-group">
                            <label for="temperamentoEsperado">Temperamento Esperado</label>
                            <select id="temperamentoEsperado">
                                <option value="">Seleccionar temperamento</option>
                                <option value="docil">Dócil</option>
                                <option value="tranquilo">Tranquilo</option>
                                <option value="activo">Activo</option>
                                <option value="nervioso">Nervioso</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="ventajasEsperadas">Ventajas y Beneficios Esperados</label>
                            <textarea id="ventajasEsperadas" rows="3" placeholder="Principales ventajas, beneficios productivos, mejoras esperadas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="limitacionesEsperadas">Limitaciones y Consideraciones</label>
                            <textarea id="limitacionesEsperadas" rows="3" placeholder="Posibles limitaciones, consideraciones de manejo, precauciones..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="recomendacionesManejo">Recomendaciones de Manejo</label>
                            <textarea id="recomendacionesManejo" rows="2" placeholder="Recomendaciones específicas para el manejo del cruce..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="aplicacionesRecomendadas">Aplicaciones Recomendadas</label>
                            <textarea id="aplicacionesRecomendadas" rows="2" placeholder="Sistemas de producción recomendados, ambientes ideales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'cruce-genetica')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarCruce()">Guardar Cruce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CATEGORIAS NOTAS - GESTION DE CONFIGURACIONES NOTAS -->
<div id="modalCategoriasNotas" class="modal">
    <div class="modal-content" style="max-width: 1000px;">
        <div class="modal-header">
            <h3><i class="fas fa-tags"></i> Gestión de Categorías de Notas</h3>
            <button class="close-modal" onclick="cerrarModal('modalCategoriasNotas')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'categoria-datos')">Datos de la Categoría</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'categoria-configuracion')">Configuración</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'categoria-flujos')">Flujos de Trabajo</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'categoria-seguimiento')">Seguimiento</button>
            </div>

            <!-- Sección 1: Datos de la Categoría -->
            <div id="categoria-datos" class="tab-content active">
                <form id="formCategoriaDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoCategoria">Código de Categoría *</label>
                            <input type="text" id="codigoCategoria" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreCategoria">Nombre de la Categoría *</label>
                            <input type="text" id="nombreCategoria" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoCategoria">Tipo de Categoría *</label>
                            <select id="tipoCategoria" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="sanidad">Sanidad y Salud</option>
                                <option value="reproduccion">Reproducción</option>
                                <option value="alimentacion">Alimentación</option>
                                <option value="produccion">Producción</option>
                                <option value="manejo">Manejo General</option>
                                <option value="genetica">Genética y Cría</option>
                                <option value="instalaciones">Instalaciones</option>
                                <option value="comercial">Comercial</option>
                                <option value="administrativo">Administrativo</option>
                                <option value="seguimiento">Seguimiento y Control</option>
                                <option value="eventualidades">Eventualidades</option>
                                <option value="observaciones">Observaciones Generales</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelCategoria">Nivel de la Categoría *</label>
                            <select id="nivelCategoria" required>
                                <option value="">Seleccionar nivel</option>
                                <option value="animal">Por Animal</option>
                                <option value="lote">Por Lote</option>
                                <option value="corral">Por Corral</option>
                                <option value="grupo">Por Grupo</option>
                                <option value="general">General/Sistema</option>
                                <option value="multiple">Múltiples Niveles</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="estadoCategoria">Estado de la Categoría *</label>
                            <select id="estadoCategoria" required>
                                <option value="activa">Activa</option>
                                <option value="inactiva">Inactiva</option>
                                <option value="archivada">Archivada</option>
                                <option value="en-revision">En Revisión</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fechaCreacionCategoria">Fecha de Creación</label>
                            <input type="date" id="fechaCreacionCategoria">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="usuarioCreacionCategoria">Usuario que Crea</label>
                            <input type="text" id="usuarioCreacionCategoria">
                        </div>
                        <div class="form-group">
                            <label for="prioridadCategoria">Prioridad de la Categoría</label>
                            <select id="prioridadCategoria">
                                <option value="">Seleccionar prioridad</option>
                                <option value="alta">Alta</option>
                                <option value="media">Media</option>
                                <option value="baja">Baja</option>
                                <option value="critica">Crítica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionCategoria">Descripción de la Categoría *</label>
                            <textarea id="descripcionCategoria" rows="3" placeholder="Descripción detallada del propósito y uso de esta categoría de notas..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="objetivoCategoria">Objetivo de la Categoría</label>
                            <textarea id="objetivoCategoria" rows="2" placeholder="Objetivo específico, qué tipo de información se captura en esta categoría..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalCategoriasNotas')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'categoria-configuracion')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Configuración -->
            <div id="categoria-configuracion" class="tab-content">
                <form id="formCategoriaConfiguracion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="colorCategoria">Color de la Categoría</label>
                            <div class="color-input-group">
                                <input type="color" id="colorCategoria" value="#3498db">
                                <div class="color-preview" id="colorPreviewCategoria" style="background-color: #3498db;"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="iconoCategoria">Ícono de la Categoría</label>
                            <select id="iconoCategoria">
                                <option value="fas fa-stethoscope">🩺 Stethoscope</option>
                                <option value="fas fa-syringe">💉 Syringe</option>
                                <option value="fas fa-heart">❤️ Heart</option>
                                <option value="fas fa-baby">👶 Baby</option>
                                <option value="fas fa-weight-scale">⚖️ Weight</option>
                                <option value="fas fa-cow">🐄 Cow</option>
                                <option value="fas fa-horse">🐎 Horse</option>
                                <option value="fas fa-seedling">🌱 Seedling</option>
                                <option value="fas fa-tint">💧 Drop</option>
                                <option value="fas fa-thermometer">🌡️ Thermometer</option>
                                <option value="fas fa-exclamation-triangle">⚠️ Warning</option>
                                <option value="fas fa-info-circle">ℹ️ Info</option>
                                <option value="fas fa-clipboard-list">📋 Clipboard</option>
                                <option value="fas fa-calendar-alt">📅 Calendar</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="formatoNota">Formato de Nota Permitido</label>
                            <select id="formatoNota">
                                <option value="">Seleccionar formato</option>
                                <option value="texto">Solo Texto</option>
                                <option value="numerico">Numérico</option>
                                <option value="fecha">Fecha/Hora</option>
                                <option value="seleccion">Selección Multiple</option>
                                <option value="si-no">Sí/No</option>
                                <option value="escala">Escala Numérica</option>
                                <option value="mixto">Mixto</option>
                                <option value="libre">Formato Libre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="longitudMaxima">Longitud Máxima de Nota</label>
                            <input type="number" id="longitudMaxima" min="0" max="5000" value="1000">
                            <small class="text-muted">Caracteres máximos permitidos</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="camposAdicionales">Campos Adicionales Requeridos</label>
                            <select id="camposAdicionales" multiple style="height: 120px;">
                                <option value="fecha">Fecha del Evento</option>
                                <option value="hora">Hora del Evento</option>
                                <option value="ubicacion">Ubicación/Lugar</option>
                                <option value="responsable">Responsable</option>
                                <option value="animal">Animal Específico</option>
                                <option value="lote">Lote Asociado</option>
                                <option value="corral">Corral Asociado</option>
                                <option value="severidad">Nivel de Severidad</option>
                                <option value="urgencia">Nivel de Urgencia</option>
                                <option value="evidencia">Evidencia Fotográfica</option>
                                <option value="documentos">Documentos Adjuntos</option>
                                <option value="costo">Costo Asociado</option>
                                <option value="duracion">Duración/Periodo</option>
                                <option value="seguimiento">Requiere Seguimiento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="plantillasDisponibles">Plantillas Disponibles</label>
                            <textarea id="plantillasDisponibles" rows="4" placeholder="Plantillas predefinidas, formatos sugeridos, ejemplos de uso..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="notificacionesActivas">Notificaciones Activas</label>
                            <select id="notificacionesActivas">
                                <option value="">Seleccionar</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="inmediata">Notificación Inmediata</option>
                                <option value="diaria">Resumen Diario</option>
                                <option value="semanal">Resumen Semanal</option>
                                <option value="solo-alertas">Solo Alertas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rolesPermitidos">Roles que Pueden Crear Notas</label>
                            <select id="rolesPermitidos" multiple style="height: 100px;">
                                <option value="administrador">Administrador</option>
                                <option value="veterinario">Veterinario</option>
                                <option value="inseminador">Inseminador</option>
                                <option value="capataz">Capataz</option>
                                <option value="vaquero">Vaquero</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="consultor">Consultor</option>
                                <option value="todos">Todos los Usuarios</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="restriccionesUso">Restricciones y Validaciones</label>
                            <textarea id="restriccionesUso" rows="3" placeholder="Restricciones de uso, validaciones específicas, reglas de negocio..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'categoria-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'categoria-flujos')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Flujos de Trabajo -->
            <div id="categoria-flujos" class="tab-content">
                <form id="formCategoriaFlujos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="flujoAprobacion">Flujo de Aprobación</label>
                            <select id="flujoAprobacion">
                                <option value="">Seleccionar flujo</option>
                                <option value="ninguno">Sin Aprobación</option>
                                <option value="automatica">Aprobación Automática</option>
                                <option value="supervisor">Aprobación por Supervisor</option>
                                <option value="veterinario">Aprobación por Veterinario</option>
                                <option value="administrador">Aprobación por Administrador</option>
                                <option value="multiple">Aprobación Múltiple</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tiempoRetencion">Tiempo de Retención (días)</label>
                            <input type="number" id="tiempoRetencion" min="0" value="365">
                            <small class="text-muted">Días que se conservan las notas</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="accionesAutomaticas">Acciones Automáticas</label>
                            <select id="accionesAutomaticas" multiple style="height: 120px;">
                                <option value="crear-alerta">Crear Alerta</option>
                                <option value="generar-reporte">Generar Reporte</option>
                                <option value="notificar-responsable">Notificar al Responsable</option>
                                <option value="programar-seguimiento">Programar Seguimiento</option>
                                <option value="actualizar-estado">Actualizar Estado del Animal</option>
                                <option value="registrar-evento">Registrar Evento Asociado</option>
                                <option value="calcular-metricas">Calcular Métricas</option>
                                <option value="sincronizar-sistema">Sincronizar con Otros Sistemas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="integracionesSistema">Integraciones con Sistema</label>
                            <select id="integracionesSistema" multiple style="height: 120px;">
                                <option value="sanidad">Módulo de Sanidad</option>
                                <option value="reproduccion">Módulo de Reproducción</option>
                                <option value="alimentacion">Módulo de Alimentación</option>
                                <option value="produccion">Módulo de Producción</option>
                                <option value="inventario">Módulo de Inventario</option>
                                <option value="empleados">Módulo de Empleados</option>
                                <option value="administracion">Módulo de Administración</option>
                                <option value="reportes">Sistema de Reportes</option>
                                <option value="alertas">Sistema de Alertas</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="etapasTrabajo">Etapas del Flujo de Trabajo</label>
                            <textarea id="etapasTrabajo" rows="4" placeholder="Etapas específicas del proceso, pasos a seguir, responsables..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="criteriosCierre">Criterios de Cierre</label>
                            <textarea id="criteriosCierre" rows="3" placeholder="Criterios para considerar una nota como completada/cerrada..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="escalamientoAlertas">Escalamiento de Alertas</label>
                            <select id="escalamientoAlertas">
                                <option value="">Seleccionar escalamiento</option>
                                <option value="ninguno">Sin Escalamiento</option>
                                <option value="nivel1">Nivel 1 (24 horas)</option>
                                <option value="nivel2">Nivel 2 (12 horas)</option>
                                <option value="nivel3">Nivel 3 (6 horas)</option>
                                <option value="nivel4">Nivel 4 (2 horas)</option>
                                <option value="inmediato">Escalamiento Inmediato</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="frecuenciaRevision">Frecuencia de Revisión</label>
                            <select id="frecuenciaRevision">
                                <option value="">Seleccionar frecuencia</option>
                                <option value="diaria">Revisión Diaria</option>
                                <option value="semanal">Revisión Semanal</option>
                                <option value="quincenal">Revisión Quincenal</option>
                                <option value="mensual">Revisión Mensual</option>
                                <option value="por-evento">Por Evento/Caso</option>
                                <option value="ninguna">Sin Revisión Programada</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="procedimientosEspeciales">Procedimientos Especiales</label>
                            <textarea id="procedimientosEspeciales" rows="3" placeholder="Procedimientos especiales, protocolos específicos, consideraciones..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'categoria-configuracion')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'categoria-seguimiento')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Seguimiento -->
            <div id="categoria-seguimiento" class="tab-content">
                <form id="formCategoriaSeguimiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="totalNotasCategoria">Total de Notas en esta Categoría</label>
                            <input type="number" id="totalNotasCategoria" min="0" readonly>
                        </div>
                        <div class="form-group">
                            <label for="promedioNotasMes">Promedio de Notas por Mes</label>
                            <input type="number" id="promedioNotasMes" min="0" step="0.1" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaUltimaNota">Fecha de la Última Nota</label>
                            <input type="date" id="fechaUltimaNota" readonly>
                        </div>
                        <div class="form-group">
                            <label for="usuarioUltimaNota">Usuario de la Última Nota</label>
                            <input type="text" id="usuarioUltimaNota" readonly>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tendenciaUso">Tendencia de Uso</label>
                            <select id="tendenciaUso">
                                <option value="">Seleccionar tendencia</option>
                                <option value="creciente">En Aumento</option>
                                <option value="estable">Estable</option>
                                <option value="decreciente">En Disminución</option>
                                <option value="variable">Variable</option>
                                <option value="nueva">Nueva Categoría</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="eficienciaCategoria">Eficiencia de la Categoría</label>
                            <select id="eficienciaCategoria">
                                <option value="">Seleccionar eficiencia</option>
                                <option value="alta">Alta Eficiencia</option>
                                <option value="media">Eficiencia Media</option>
                                <option value="baja">Baja Eficiencia</option>
                                <option value="por-mejorar">Requiere Mejora</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fechaUltimaActualizacionCategoria">Fecha Última Actualización</label>
                            <input type="date" id="fechaUltimaActualizacionCategoria">
                        </div>
                        <div class="form-group">
                            <label for="usuarioUltimaActualizacionCategoria">Usuario Última Actualización</label>
                            <input type="text" id="usuarioUltimaActualizacionCategoria">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="metricasUso">Métricas de Uso</label>
                            <textarea id="metricasUso" rows="3" placeholder="Estadísticas de uso, patrones de comportamiento, análisis..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reportesGenerados">Reportes Generados</label>
                            <textarea id="reportesGenerados" rows="2" placeholder="Reportes que utilizan esta categoría, análisis específicos..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="recomendacionesMejora">Recomendaciones de Mejora</label>
                            <textarea id="recomendacionesMejora" rows="3" placeholder="Sugerencias para mejorar el uso de la categoría, optimizaciones..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesFinalesCategoria">Observaciones y Comentarios Finales</label>
                            <textarea id="observacionesFinalesCategoria" rows="3" placeholder="Observaciones importantes, comentarios adicionales, información relevante..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'categoria-flujos')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarCategoriaNota()">Guardar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA DIAGNOSTICOS - GESTION DE CONFIGURACIONES -->
<div id="modalDiagnosticosVeterinarios" class="modal">
    <div class="modal-content" style="max-width: 1200px;">
        <div class="modal-header">
            <h3><i class="fas fa-stethoscope"></i> Gestión de Diagnósticos Veterinarios</h3>
            <button class="close-modal" onclick="cerrarModal('modalDiagnosticosVeterinarios')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="ficha-tabs">
                <button class="ficha-tab" onclick="cambiarPestania(event, 'diagnostico-datos')">Datos del Diagnóstico</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'diagnostico-sintomas')">Síntomas y Signos</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'diagnostico-tratamiento')">Tratamiento y Control</button>
                <button class="ficha-tab" onclick="cambiarPestania(event, 'diagnostico-prevencion')">Prevención y Seguimiento</button>
            </div>

            <!-- Sección 1: Datos del Diagnóstico -->
            <div id="diagnostico-datos" class="tab-content active">
                <form id="formDiagnosticoDatos">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoDiagnostico">Código del Diagnóstico *</label>
                            <input type="text" id="codigoDiagnostico" required>
                        </div>
                        <div class="form-group">
                            <label for="nombreDiagnostico">Nombre del Diagnóstico *</label>
                            <input type="text" id="nombreDiagnostico" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tipoEnfermedad">Tipo de Enfermedad *</label>
                            <select id="tipoEnfermedad" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="infecciosa">Infecciosa</option>
                                <option value="parasitaria">Parasitaria</option>
                                <option value="metabolica">Metabólica</option>
                                <option value="nutricional">Nutricional</option>
                                <option value="reproductiva">Reproductiva</option>
                                <option value="respiratoria">Respiratoria</option>
                                <option value="digestiva">Digestiva</option>
                                <option value="nerviosa">Nerviosa</option>
                                <option value="musculoesqueletica">Musculoesquelética</option>
                                <option value="dermatologica">Dermatológica</option>
                                <option value="toxica">Tóxica</option>
                                <option value="neoplasica">Neoplásica</option>
                                <option value="otras">Otras</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaGravedad">Categoría de Gravedad *</label>
                            <select id="categoriaGravedad" required>
                                <option value="">Seleccionar gravedad</option>
                                <option value="leve">Leve</option>
                                <option value="moderada">Moderada</option>
                                <option value="grave">Grave</option>
                                <option value="muy-grave">Muy Grave</option>
                                <option value="critica">Crítica</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="agenteCausal">Agente Causal Principal</label>
                            <input type="text" id="agenteCausal" placeholder="Ej: Bacteria, virus, hongo, parásito...">
                        </div>
                        <div class="form-group">
                            <label for="estadoDiagnostico">Estado del Diagnóstico *</label>
                            <select id="estadoDiagnostico" required>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="en-revision">En Revisión</option>
                                <option value="obsoleto">Obsoleto</option>
                                <option value="cuarentena">En Cuarentena</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="especieAfectada">Especie Afectada *</label>
                            <select id="especieAfectada" required>
                                <option value="">Seleccionar especie</option>
                                <option value="bovino">Bovino</option>
                                <option value="bufalino">Bufalino</option>
                                <option value="equino">Equino</option>
                                <option value="ovino">Ovino</option>
                                <option value="caprino">Caprino</option>
                                <option value="porcino">Porcino</option>
                                <option value="aves">Aves</option>
                                <option value="todas">Todas las Especies</option>
                                <option value="multiple">Múltiples Especies</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categoriaAnimal">Categoría de Animal Afectado</label>
                            <select id="categoriaAnimal" multiple style="height: 120px;">
                                <option value="terneros">Terneros</option>
                                <option value="novillos">Novillos</option>
                                <option value="novillas">Novillas</option>
                                <option value="vacas">Vacas</option>
                                <option value="toros">Toros</option>
                                <option value="vientres">Vientres</option>
                                <option value="adultos">Adultos</option>
                                <option value="jovenes">Jóvenes</option>
                                <option value="crias">Crías</option>
                                <option value="todas">Todas las Categorías</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="codigoCIE">Código CIE-10 (Opcional)</label>
                            <input type="text" id="codigoCIE" placeholder="Código de Clasificación Internacional">
                        </div>
                        <div class="form-group">
                            <label for="fechaRegistroDiagnostico">Fecha de Registro</label>
                            <input type="date" id="fechaRegistroDiagnostico">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="descripcionDiagnostico">Descripción del Diagnóstico *</label>
                            <textarea id="descripcionDiagnostico" rows="3" placeholder="Descripción detallada de la enfermedad, características principales, etiología..." required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="etiopatogenia">Etiopatogenia</label>
                            <textarea id="etiopatogenia" rows="2" placeholder="Mecanismo de producción de la enfermedad, patogénesis..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cerrarModal('modalDiagnosticosVeterinarios')">Cancelar</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'diagnostico-sintomas')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 2: Síntomas y Signos -->
            <div id="diagnostico-sintomas" class="tab-content">
                <form id="formDiagnosticoSintomas">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sintomasPrincipales">Síntomas Principales *</label>
                            <select id="sintomasPrincipales" multiple style="height: 150px;" required>
                                <option value="fiebre">Fiebre</option>
                                <option value="anorexia">Anorexia (Falta de apetito)</option>
                                <option value="depresion">Depresión/Letargo</option>
                                <option value="deshidratacion">Deshidratación</option>
                                <option value="diarrea">Diarrea</option>
                                <option value="estrenimiento">Estreñimiento</option>
                                <option value="vomitos">Vómitos</option>
                                <option value="tos">Tos</option>
                                <option value="disnea">Disnea (Dificultad respiratoria)</option>
                                <option value="secrecion-nasal">Secreción Nasal</option>
                                <option value="secrecion-ocular">Secreción Ocular</option>
                                <option value="cojera">Cojera</option>
                                <option value="temblores">Temblores</option>
                                <option value="convulsiones">Convulsiones</option>
                                <option value="paralisis">Parálisis</option>
                                <option value="ictericia">Ictericia (Coloración amarilla)</option>
                                <option value="edemas">Edemas (Hinchazón)</option>
                                <option value="ascitis">Ascitis (Líquido abdominal)</option>
                                <option value="perdida-peso">Pérdida de Peso</option>
                                <option value="disminucion-produccion">Disminución de Producción</option>
                                <option value="aborto">Aborto</option>
                                <option value="infertilidad">Infertilidad</option>
                                <option value="mastitis">Mastitis</option>
                                <option value="dermatitis">Dermatitis</option>
                                <option value="prurito">Prurito (Picazón)</option>
                                <option value="caida-pelo">Caída del Pelo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sintomasSecundarios">Síntomas Secundarios</label>
                            <select id="sintomasSecundarios" multiple style="height: 150px;">
                                <!-- Mismas opciones que síntomas principales -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="signosClinicos">Signos Clínicos Observables</label>
                            <textarea id="signosClinicos" rows="3" placeholder="Signos clínicos característicos, hallazgos físicos..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sistemaAfectado">Sistema/Sistema Afectado *</label>
                            <select id="sistemaAfectado" required>
                                <option value="">Seleccionar sistema</option>
                                <option value="digestivo">Digestivo</option>
                                <option value="respiratorio">Respiratorio</option>
                                <option value="nervioso">Nervioso</option>
                                <option value="reproductivo">Reproductivo</option>
                                <option value="musculoesqueletico">Musculoesquelético</option>
                                <option value="urinario">Urinario</option>
                                <option value="cardiovascular">Cardiovascular</option>
                                <option value="piel">Piel y Tegumentos</option>
                                <option value="hematopoyetico">Hematopoyético</option>
                                <option value="endocrino">Endocrino</option>
                                <option value="multiple">Múltiples Sistemas</option>
                                <option value="general">Sistémico/General</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="periodoIncubacion">Periodo de Incubación (días)</label>
                            <input type="text" id="periodoIncubacion" placeholder="Ej: 3-7 días, 10-14 días">
                        </div>
                        <div class="form-group">
                            <label for="duracionEnfermedad">Duración de la Enfermedad</label>
                            <select id="duracionEnfermedad">
                                <option value="">Seleccionar duración</option>
                                <option value="aguda">Aguda (1-7 días)</option>
                                <option value="subaguda">Subaguda (1-3 semanas)</option>
                                <option value="cronica">Crónica (>3 semanas)</option>
                                <option value="recurrente">Recurrente</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mortalidadEsperada">Mortalidad Esperada (%)</label>
                            <input type="number" id="mortalidadEsperada" min="0" max="100" step="0.1">
                        </div>
                        <option value="morbilidadEsperada">Morbilidad Esperada (%)</option>
                            <input type="number" id="morbilidadEsperada" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pruebasDiagnosticas">Pruebas de Diagnóstico Recomendadas</label>
                            <select id="pruebasDiagnosticas" multiple style="height: 120px;">
                                <option value="hematologia">Hematología Completa</option>
                                <option value="bioquimica">Bioquímica Sanguínea</option>
                                <option value="coprologico">Examen Coprológico</option>
                                <option value="urianalisis">Urianálisis</option>
                                <option value="cultivo">Cultivo Bacteriológico</option>
                                <option value="antibiograma">Antibiograma</option>
                                <option value="pcr">PCR</option>
                                <option value="elisa">ELISA</option>
                                <option value="serologia">Serología</option>
                                <option value="radiografia">Radiografía</option>
                                <option value="ecografia">Ecografía</option>
                                <option value="necropsia">Necropsia</option>
                                <option value="histopatologia">Histopatología</option>
                                <option value="citologia">Citología</option>
                                <option value="pruebas-especificas">Pruebas Específicas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="diagnosticoDiferencial">Diagnóstico Diferencial</label>
                            <textarea id="diagnosticoDiferencial" rows="4" placeholder="Enfermedades con síntomas similares, diagnósticos que deben descartarse..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'diagnostico-datos')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'diagnostico-tratamiento')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 3: Tratamiento y Control -->
            <div id="diagnostico-tratamiento" class="tab-content">
                <form id="formDiagnosticoTratamiento">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="tratamientoEstandar">Tratamiento Estándar *</label>
                            <textarea id="tratamientoEstandar" rows="4" placeholder="Protocolo de tratamiento estándar, medicamentos, dosis, frecuencia..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tratamientoAlternativo">Tratamientos Alternativos</label>
                            <textarea id="tratamientoAlternativo" rows="3" placeholder="Tratamientos alternativos, opciones secundarias..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="medicamentosPrincipales">Medicamentos Principales</label>
                            <textarea id="medicamentosPrincipales" rows="3" placeholder="Lista de medicamentos principales, principios activos..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="viaAdministracion">Vía de Administración Principal</label>
                            <select id="viaAdministracion">
                                <option value="">Seleccionar vía</option>
                                <option value="intramuscular">Intramuscular (IM)</option>
                                <option value="subcutanea">Subcutánea (SC)</option>
                                <option value="intravenosa">Intravenosa (IV)</option>
                                <option value="oral">Oral</option>
                                <option value="topica">Tópica</option>
                                <option value="intraruminal">Intraruminal</option>
                                <option value="multiple">Múltiples Vías</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="duracionTratamiento">Duración del Tratamiento (días)</label>
                            <input type="number" id="duracionTratamiento" min="0">
                        </div>
                        <div class="form-group">
                            <label for="periodoRetiro">Periodo de Retiro (días)</label>
                            <input type="number" id="periodoRetiro" min="0">
                            <small class="text-muted">Para leche y carne</small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cuidadosEspeciales">Cuidados Especiales Requeridos</label>
                            <textarea id="cuidadosEspeciales" rows="3" placeholder="Cuidados de enfermería, manejo especial, observaciones..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="controlesRequeridos">Controles y Seguimiento</label>
                            <textarea id="controlesRequeridos" rows="2" placeholder="Controles necesarios durante el tratamiento..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="medidasAislamiento">Medidas de Aislamiento</label>
                            <select id="medidasAislamiento">
                                <option value="">Seleccionar medidas</option>
                                <option value="ninguna">Ninguna</option>
                                <option value="cuarentena">Cuarentena Estricta</option>
                                <option value="aislamiento-relativo">Aislamiento Relativo</option>
                                <option value="separacion-grupo">Separación del Grupo</option>
                                <option value="area-especial">Área Especial de Enfermería</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bioseguridad">Medidas de Bioseguridad</label>
                            <textarea id="bioseguridad" rows="2" placeholder="Medidas de bioseguridad específicas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="complicacionesPosibles">Complicaciones Posibles</label>
                            <textarea id="complicacionesPosibles" rows="3" placeholder="Posibles complicaciones, efectos secundarios, riesgos..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="contraindicaciones">Contraindicaciones y Precauciones</label>
                            <textarea id="contraindicaciones" rows="2" placeholder="Contraindicaciones, precauciones especiales..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'diagnostico-sintomas')">Anterior</button>
                        <button type="button" class="btn btn-next" onclick="cambiarPestania(event, 'diagnostico-prevencion')">Siguiente</button>
                    </div>
                </form>
            </div>

            <!-- Sección 4: Prevención y Seguimiento -->
            <div id="diagnostico-prevencion" class="tab-content">
                <form id="formDiagnosticoPrevencion">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="medidasPrevencion">Medidas de Prevención *</label>
                            <textarea id="medidasPrevencion" rows="4" placeholder="Medidas preventivas, protocolos de bioseguridad, vacunación..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vacunasDisponibles">Vacunas Disponibles</label>
                            <textarea id="vacunasDisponibles" rows="3" placeholder="Vacunas específicas, protocolos de vacunación..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="programaVigilancia">Programa de Vigilancia Epidemiológica</label>
                            <textarea id="programaVigilancia" rows="3" placeholder="Programa de vigilancia, monitoreo, detección temprana..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="notificacionObligatoria">¿Notificación Obligatoria?</label>
                            <select id="notificacionObligatoria">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                                <option value="condicional">Condicional</option>
                                <option value="desconocido">Desconocido</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="zoonosis">¿Es Zoonosis?</label>
                            <select id="zoonosis">
                                <option value="no">No</option>
                                <option value="si">Sí</option>
                                <option value="potencial">Potencial</option>
                                <option value="desconocido">Desconocido</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="riesgoTransmision">Riesgo de Transmisión</label>
                            <select id="riesgoTransmision">
                                <option value="">Seleccionar riesgo</option>
                                <option value="alto">Alto</option>
                                <option value="medio">Medio</option>
                                <option value="bajo">Bajo</option>
                                <option value="muy-bajo">Muy Bajo</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pronostico">Pronóstico</label>
                            <select id="pronostico">
                                <option value="">Seleccionar pronóstico</option>
                                <option value="favorable">Favorable</option>
                                <option value="reservado">Reservado</option>
                                <option value="desfavorable">Desfavorable</option>
                                <option value="grave">Grave</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tiempoRecuperacion">Tiempo de Recuperación Esperado</label>
                            <input type="text" id="tiempoRecuperacion" placeholder="Ej: 7-10 días, 2-3 semanas">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="impactoProduccion">Impacto en la Producción</label>
                            <select id="impactoProduccion">
                                <option value="">Seleccionar impacto</option>
                                <option value="alto">Alto Impacto</option>
                                <option value="medio">Impacto Medio</option>
                                <option value="bajo">Bajo Impacto</option>
                                <option value="minimo">Impacto Mínimo</option>
                                <option value="variable">Variable</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="costoTratamientoPromedio">Costo de Tratamiento Promedio ($)</label>
                            <input type="number" id="costoTratamientoPromedio" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="referenciasBibliograficas">Referencias Bibliográficas</label>
                            <textarea id="referenciasBibliograficas" rows="3" placeholder="Fuentes de información, estudios, referencias científicas..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="observacionesFinalesDiagnostico">Observaciones y Comentarios Finales</label>
                            <textarea id="observacionesFinalesDiagnostico" rows="3" placeholder="Observaciones importantes, consideraciones especiales, información adicional..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="cambiarPestania(event, 'diagnostico-tratamiento')">Anterior</button>
                        <button type="button" class="btn btn-primary" onclick="guardarDiagnosticoVeterinario()">Guardar Diagnóstico</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="script.js"></script>
    <footer>
        <div class="footer-container">
            <p>© 2025 Agro Ganadero. Todos los derechos reservados.</p>
            <p>Desarrollado por Levi Danieli, Reymond Rendiles y Mario Ramos</p>
        </div>
    </footer>


<!-- Agregar jsPDF al final del body, antes del cierre -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
<script src="js/cargar_tablas.js"></script>
<script>
// Función para exportar todos los datos a PDF
function exportarDatosPDF() {
    // Crear instancia de jsPDF
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    // Título del documento
    doc.setFontSize(20);
    doc.text('Reporte Completo - Agro Ganadero Vacuno', 20, 20);
    doc.setFontSize(12);
    doc.text(`Fecha de generación: ${new Date().toLocaleDateString()}`, 20, 30);
    
    let yPosition = 40; // Posición vertical inicial
    
    // Función para agregar una nueva página si es necesario
    function checkPageBreak(heightNeeded) {
        if (yPosition + heightNeeded > 280) {
            doc.addPage();
            yPosition = 20;
            return true;
        }
        return false;
    }
    
    // Función para agregar sección
    function addSection(title, data) {
        checkPageBreak(20);
        doc.setFontSize(16);
        doc.setTextColor(40, 40, 150);
        doc.text(title, 20, yPosition);
        yPosition += 10;
        
        doc.setFontSize(10);
        doc.setTextColor(0, 0, 0);
        
        // Si es un array, usar tabla
        if (Array.isArray(data)) {
            if (data.length > 0) {
                const headers = Object.keys(data[0]);
                const tableData = data.map(item => Object.values(item));
                
                doc.autoTable({
                    startY: yPosition,
                    head: [headers],
                    body: tableData,
                    theme: 'grid',
                    styles: { fontSize: 8 },
                    headStyles: { fillColor: [70, 130, 180] }
                });
                
                yPosition = doc.lastAutoTable.finalY + 10;
            } else {
                doc.text('No hay datos registrados', 20, yPosition);
                yPosition += 10;
            }
        } else {
            // Si es un objeto, mostrar como lista
            Object.keys(data).forEach(key => {
                if (yPosition > 270) {
                    doc.addPage();
                    yPosition = 20;
                }
                doc.text(`${key}: ${data[key]}`, 20, yPosition);
                yPosition += 7;
            });
            yPosition += 5;
        }
    }
    
    // Recopilar datos de cada sección
    
    // 1. DATOS - Vientres
    const vientresData = obtenerDatosVientres();
    addSection('VIENTRES', vientresData);
    
    // 2. DATOS - Animales para la Cría
    const criaData = obtenerDatosCria();
    addSection('ANIMALES PARA LA CRÍA', criaData);
    
    // 3. DATOS - Animales Eliminados
    const eliminadosData = obtenerDatosEliminados();
    addSection('ANIMALES ELIMINADOS', eliminadosData);
    
    // 4. DATOS - Toros en Servicio
    const torosData = obtenerDatosToros();
    addSection('TOROS EN SERVICIO', torosData);
    
    // 5. DATOS - Inseminadores
    const inseminadoresData = obtenerDatosInseminadores();
    addSection('INSEMINADORES', inseminadoresData);
    
    // 6. DATOS - Índices Globales
    const indicesData = obtenerDatosIndices();
    addSection('ÍNDICES GLOBALES', indicesData);
    
    // 7. EVENTOS - Reproductivos
    const serviciosData = obtenerDatosServicios();
    addSection('EVENTOS REPRODUCTIVOS', serviciosData);
    
    // 8. EVENTOS - Tratamientos
    const tratamientosData = obtenerDatosTratamientos();
    addSection('TRATAMIENTOS', tratamientosData);
    
    // 9. EVENTOS - Producción Láctea
    const produccionData = obtenerDatosProduccion();
    addSection('PRODUCCIÓN LÁCTEA', produccionData);
    
    // 10. EVENTOS - Peso Corporal
    const pesoData = obtenerDatosPeso();
    addSection('PESO CORPORAL', pesoData);
    
    // 11. EVENTOS - Notas
    const notasData = obtenerDatosNotas();
    addSection('NOTAS', notasData);
    
    // 12. CONFIGURACIÓN - Razas
    const razasData = obtenerDatosRazas();
    addSection('RAZAS', razasData);
    
    // 13. CONFIGURACIÓN - Corrales
    const corralesData = obtenerDatosCorrales();
    addSection('CORRALES', corralesData);
    
    // 14. CONFIGURACIÓN - Grupos
    const gruposData = obtenerDatosGrupos();
    addSection('GRUPOS', gruposData);
    
    // 15. CONFIGURACIÓN - Cruces
    const crucesData = obtenerDatosCruces();
    addSection('CRUCES', crucesData);
    
    // 16. CONFIGURACIÓN - Diagnósticos Veterinarios
    const diagnosticosData = obtenerDatosDiagnosticos();
    addSection('DIAGNÓSTICOS VETERINARIOS', diagnosticosData);
    
    // Guardar el PDF
    doc.save(`reporte_agro_vacuno_${new Date().toISOString().slice(0, 10)}.pdf`);

    
}