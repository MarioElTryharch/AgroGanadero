// script-pdf.js

// Inicializar jsPDF
const { jsPDF } = window.jspdf;

// Función principal para exportar datos a PDF
function exportarDatosPDF() {
    // Crear nuevo documento PDF
    const doc = new jsPDF();
    
    // Título principal
    doc.setFontSize(20);
    doc.setTextColor(40, 40, 40);
    doc.text('REPORTE AGRO BUFALINO', 105, 20, { align: 'center' });
    
    // Fecha de generación
    const fecha = new Date().toLocaleDateString('es-ES');
    doc.setFontSize(10);
    doc.setTextColor(100, 100, 100);
    doc.text(`Generado el: ${fecha}`, 105, 30, { align: 'center' });
    
    let yPosition = 45; // Posición vertical inicial
    
    // 1. SECCIÓN DE REGISTRO
    yPosition = agregarSeccionRegistro(doc, yPosition);
    
    // 2. SECCIÓN DE CONFIGURACIÓN
    yPosition = agregarSeccionConfiguracion(doc, yPosition);
    
    // 3. SECCIÓN DE LOTES
    yPosition = agregarSeccionLotes(doc, yPosition);
    
    // 4. SECCIÓN DE BÚFALOS ACTIVOS
    yPosition = agregarSeccionBufalosActivos(doc, yPosition);
    
    // 5. SECCIÓN DE HEMBRAS EN PRODUCCIÓN
    yPosition = agregarSeccionHembrasProduccion(doc, yPosition);
    
    // 6. SECCIÓN DE MACHOS REPRODUCTORES
    yPosition = agregarSeccionMachosReproductores(doc, yPosition);
    
    // 7. SECCIÓN DE CRÍAS
    yPosition = agregarSeccionCrias(doc, yPosition);
    
    // 8. SECCIÓN DE TASA DE PREÑEZ
    yPosition = agregarSeccionPrenez(doc, yPosition);
    
    // Guardar el PDF
    doc.save(`reporte_agro_bufalino_${fecha.replace(/\//g, '-')}.pdf`);
}

// Función para agregar sección de Registro
function agregarSeccionRegistro(doc, yPosition) {
    // Verificar si necesitamos una nueva página
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('SECCIÓN REGISTRO', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de las tarjetas de registro
    const datosRegistro = obtenerDatosRegistro();
    
    // Crear tabla para datos de registro
    const tablaRegistro = [
        ['Búfalos Activos', datosRegistro.bufalosActivos],
        ['Hembras en Producción', datosRegistro.hembrasProduccion],
        ['Machos Reproductores', datosRegistro.machosReproductores],
        ['Crías este Año', datosRegistro.criasAnio],
        ['Tasa de Preñez', datosRegistro.tasaPrenez]
    ];
    
    doc.autoTable({
        startY: yPosition,
        head: [['Concepto', 'Cantidad']],
        body: tablaRegistro,
        theme: 'grid',
        styles: { fontSize: 10 },
        headStyles: { fillColor: [70, 130, 180] }
    });
    
    return doc.autoTable.previous.finalY + 15;
}

// Función para agregar sección de Configuración
function agregarSeccionConfiguracion(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('SECCIÓN CONFIGURACIÓN', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de configuración
    const datosConfiguracion = obtenerDatosConfiguracion();
    
    // Crear tabla para datos de configuración
    const tablaConfiguracion = [
        ['Razas Bufalinas', datosConfiguracion.razas],
        ['Corrales', datosConfiguracion.corrales],
        ['Lotes', datosConfiguracion.lotes],
        ['Grupos', datosConfiguracion.grupos],
        ['Colores', datosConfiguracion.colores],
        ['Cruces', datosConfiguracion.cruces],
        ['Categorías Notas', datosConfiguracion.categoriasNotas],
        ['Diagnósticos Veterinarios', datosConfiguracion.diagnosticos]
    ];
    
    doc.autoTable({
        startY: yPosition,
        head: [['Configuración', 'Cantidad']],
        body: tablaConfiguracion,
        theme: 'grid',
        styles: { fontSize: 10 },
        headStyles: { fillColor: [70, 130, 180] }
    });
    
    return doc.autoTable.previous.finalY + 15;
}

// Función para agregar sección de Lotes
function agregarSeccionLotes(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('SECCIÓN LOTES', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de lotes
    const lotes = obtenerDatosLotes();
    
    if (lotes.length > 0) {
        const tablaLotes = lotes.map(lote => [
            lote.nombre,
            lote.ubicacion,
            lote.capacidad,
            lote.estado,
            lote.observaciones || '-'
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['Nombre', 'Ubicación', 'Capacidad', 'Estado', 'Observaciones']],
            body: tablaLotes,
            theme: 'grid',
            styles: { fontSize: 9 },
            headStyles: { fillColor: [70, 130, 180] },
            columnStyles: {
                0: { cellWidth: 30 },
                1: { cellWidth: 30 },
                2: { cellWidth: 25 },
                3: { cellWidth: 25 },
                4: { cellWidth: 60 }
            }
        });
        
        return doc.autoTable.previous.finalY + 15;
    } else {
        doc.setFontSize(10);
        doc.text('No hay lotes registrados', 14, yPosition);
        return yPosition + 10;
    }
}

// Función para agregar sección de Búfalos Activos
function agregarSeccionBufalosActivos(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('BÚFALOS ACTIVOS', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de búfalos activos
    const bufalos = obtenerDatosBufalosActivos();
    
    if (bufalos.length > 0) {
        // Solo mostrar los primeros 5 para no saturar el PDF
        const bufalosMostrar = bufalos.slice(0, 5);
        
        const tablaBufalos = bufalosMostrar.map(bufalo => [
            bufalo.id,
            bufalo.nombre || '-',
            bufalo.sexo,
            bufalo.raza,
            bufalo.peso + ' kg',
            bufalo.estadoSalud
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['ID', 'Nombre', 'Sexo', 'Raza', 'Peso', 'Estado Salud']],
            body: tablaBufalos,
            theme: 'grid',
            styles: { fontSize: 8 },
            headStyles: { fillColor: [70, 130, 180] }
        });
        
        // Si hay más búfalos, agregar nota
        if (bufalos.length > 5) {
            const finalY = doc.autoTable.previous.finalY;
            doc.setFontSize(8);
            doc.setTextColor(100, 100, 100);
            doc.text(`... y ${bufalos.length - 5} búfalos más`, 14, finalY + 5);
            return finalY + 10;
        }
        
        return doc.autoTable.previous.finalY + 15;
    } else {
        doc.setFontSize(10);
        doc.text('No hay búfalos activos registrados', 14, yPosition);
        return yPosition + 10;
    }
}

// Función para agregar sección de Hembras en Producción
function agregarSeccionHembrasProduccion(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('HEMBRAS EN PRODUCCIÓN', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de hembras en producción
    const hembras = obtenerDatosHembrasProduccion();
    
    if (hembras.length > 0) {
        const tablaHembras = hembras.map(hembra => [
            hembra.id,
            hembra.nombre || '-',
            hembra.raza,
            hembra.produccionLeche ? hembra.produccionLeche + ' L/día' : '-',
            hembra.estadoReproductivo || '-'
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['ID', 'Nombre', 'Raza', 'Producción Leche', 'Estado Reproductivo']],
            body: tablaHembras,
            theme: 'grid',
            styles: { fontSize: 8 },
            headStyles: { fillColor: [70, 130, 180] }
        });
        
        return doc.autoTable.previous.finalY + 15;
    } else {
        doc.setFontSize(10);
        doc.text('No hay hembras en producción registradas', 14, yPosition);
        return yPosition + 10;
    }
}

// Función para agregar sección de Machos Reproductores
function agregarSeccionMachosReproductores(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('MACHOS REPRODUCTORES', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de machos reproductores
    const machos = obtenerDatosMachosReproductores();
    
    if (machos.length > 0) {
        const tablaMachos = machos.map(macho => [
            macho.id,
            macho.nombre || '-',
            macho.raza,
            macho.peso + ' kg',
            macho.tasaPrenez ? macho.tasaPrenez + '%' : '-'
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['ID', 'Nombre', 'Raza', 'Peso', 'Tasa Preñez']],
            body: tablaMachos,
            theme: 'grid',
            styles: { fontSize: 8 },
            headStyles: { fillColor: [70, 130, 180] }
        });
        
        return doc.autoTable.previous.finalY + 15;
    } else {
        doc.setFontSize(10);
        doc.text('No hay machos reproductores registrados', 14, yPosition);
        return yPosition + 10;
    }
}

// Función para agregar sección de Crías
function agregarSeccionCrias(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('CRÍAS ESTE AÑO', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de crías
    const crias = obtenerDatosCrias();
    
    if (crias.length > 0) {
        const tablaCrias = crias.map(cria => [
            cria.id,
            cria.nombre || '-',
            cria.sexo,
            cria.raza,
            cria.pesoNacimiento + ' kg',
            cria.fechaNacimiento
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['ID', 'Nombre', 'Sexo', 'Raza', 'Peso Nacimiento', 'Fecha Nacimiento']],
            body: tablaCrias,
            theme: 'grid',
            styles: { fontSize: 8 },
            headStyles: { fillColor: [70, 130, 180] }
        });
        
        return doc.autoTable.previous.finalY + 15;
    } else {
        doc.setFontSize(10);
        doc.text('No hay crías registradas este año', 14, yPosition);
        return yPosition + 10;
    }
}

// Función para agregar sección de Tasa de Preñez
function agregarSeccionPrenez(doc, yPosition) {
    if (yPosition > 250) {
        doc.addPage();
        yPosition = 20;
    }
    
    doc.setFontSize(16);
    doc.setTextColor(30, 30, 30);
    doc.text('TASA DE PREÑEZ', 14, yPosition);
    yPosition += 10;
    
    // Obtener datos de preñez
    const prenez = obtenerDatosPrenez();
    
    if (prenez.length > 0) {
        const tablaPrenez = prenez.map(p => [
            p.idBufalo,
            p.estado,
            p.fechaDiagnostico,
            p.metodo,
            p.mesesGestacion || '-'
        ]);
        
        doc.autoTable({
            startY: yPosition,
            head: [['ID Búfalo', 'Estado', 'Fecha Diagnóstico', 'Método', 'Meses Gestación']],
            body: tablaPrenez,
            theme: 'grid',
            styles: { fontSize: 8 },
            headStyles: { fillColor: [70, 130, 180] }
        });
        
        // Calcular estadísticas
        const totalDiagnosticos = prenez.length;
        const preñadas = prenez.filter(p => p.estado === 'preñada').length;
        const tasaPreñez = totalDiagnosticos > 0 ? (preñadas / totalDiagnosticos * 100).toFixed(2) : 0;
        
        const finalY = doc.autoTable.previous.finalY;
        doc.setFontSize(10);
        doc.setTextColor(40, 40, 40);
        doc.text(`Estadísticas:`, 14, finalY + 10);
        doc.text(`- Total diagnósticos: ${totalDiagnosticos}`, 20, finalY + 17);
        doc.text(`- Búfalas preñadas: ${preñadas}`, 20, finalY + 24);
        doc.text(`- Tasa de preñez: ${tasaPreñez}%`, 20, finalY + 31);
        
        return finalY + 40;
    } else {
        doc.setFontSize(10);
        doc.text('No hay registros de preñez', 14, yPosition);
        return yPosition + 10;
    }
}

// =============================================
// FUNCIONES PARA OBTENER DATOS (SIMULACIÓN)
// =============================================

// En una implementación real, estas funciones obtendrían datos de una base de datos
// Por ahora, simulamos la obtención de datos

function obtenerDatosRegistro() {
    // En una implementación real, esto vendría de la base de datos
    return {
        bufalosActivos: document.querySelector('.data-cards .data-card:nth-child(1) .data-value').textContent,
        hembrasProduccion: document.querySelector('.data-cards .data-card:nth-child(2) .data-value').textContent,
        machosReproductores: document.querySelector('.data-cards .data-card:nth-child(3) .data-value').textContent,
        criasAnio: document.querySelector('.data-cards .data-card:nth-child(4) .data-value').textContent,
        tasaPrenez: document.querySelector('.data-cards .data-card:nth-child(5) .data-value').textContent
    };
}

function obtenerDatosConfiguracion() {
    // En una implementación real, esto vendría de la base de datos
    const configCards = document.querySelectorAll('.menu-section[data-section="configuracion"] .data-card');
    return {
        razas: configCards[0]?.querySelector('.data-value')?.textContent || '0',
        corrales: configCards[1]?.querySelector('.data-value')?.textContent || '0',
        lotes: configCards[2]?.querySelector('.data-value')?.textContent || '0',
        grupos: configCards[3]?.querySelector('.data-value')?.textContent || '0',
        colores: configCards[4]?.querySelector('.data-value')?.textContent || '0',
        cruces: configCards[5]?.querySelector('.data-value')?.textContent || '0',
        categoriasNotas: configCards[6]?.querySelector('.data-value')?.textContent || '0',
        diagnosticos: configCards[7]?.querySelector('.data-value')?.textContent || '0'
    };
}

function obtenerDatosLotes() {
    // En una implementación real, esto vendría de la base de datos
    const filasLotes = document.querySelectorAll('.lotes-bufalino tbody tr');
    const lotes = [];
    
    filasLotes.forEach(fila => {
        const celdas = fila.querySelectorAll('td');
        lotes.push({
            nombre: celdas[0].textContent,
            ubicacion: celdas[1].textContent,
            capacidad: celdas[2].textContent,
            estado: celdas[3].textContent,
            observaciones: celdas[4].textContent
        });
    });
    
    return lotes;
}

function obtenerDatosBufalosActivos() {
    // En una implementación real, esto vendría de la base de datos
    // Por ahora, devolvemos un array vacío
    return [];
}

function obtenerDatosHembrasProduccion() {
    // En una implementación real, esto vendría de la base de datos
    // Por ahora, devolvemos un array vacío
    return [];
}

function obtenerDatosMachosReproductores() {
    // En una implementación real, esto vendría de la base de datos
    // Por ahora, devolvemos un array vacío
    return [];
}

function obtenerDatosCrias() {
    // En una implementación real, esto vendría de la base de datos
    // Por ahora, devolvemos un array vacío
    return [];
}

function obtenerDatosPrenez() {
    // En una implementación real, esto vendría de la base de datos
    // Por ahora, devolvemos un array vacío
    return [];
}

// =============================================
// INICIALIZACIÓN
// =============================================

// Agregar evento al botón de exportar
document.addEventListener('DOMContentLoaded', function() {
    const btnExportar = document.querySelector('.bufalino-actions .btn-secondary');
    if (btnExportar) {
        btnExportar.addEventListener('click', exportarDatosPDF);
    }
});