<?php
// --- INCLUIR LA LIBRERÍA DE PDF ---
// Ajuste la ruta si su archivo fpdf.php está en otro lugar
require('lib/fpdf/fpdf.php'); 

// --- 1. CONFIGURACIÓN DE CONEXIÓN A LA BASE DE DATOS ---
// **IMPORTANTE:** Reemplace estos valores con sus credenciales reales.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');
define('DB_NAME', 'agrobufalino22'); // Nombre de la BD

// Conexión
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    // En un entorno de producción, es mejor solo mostrar un error genérico
    http_response_code(500);
    die("Fallo en la conexión a la base de datos.");
}

// Función auxiliar para obtener datos de una tabla
function obtenerDatos($conn, $tabla, $campos) {
    // Escapar nombres de campos
    $campos_sql = implode(", ", array_map(function($c) { return "`$c`"; }, $campos));
    
    // Consulta SQL: asumimos los nombres de tablas en minúscula.
    $sql = "SELECT $campos_sql FROM `$tabla`";
    
    $resultado = $conn->query($sql);
    
    $datos = [];
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
    }
    return $datos;
}


// --- 2. CLASE PDF PERSONALIZADA ---
class PDF extends FPDF {
    // Cabecera de página
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('Reporte General - Gestión Animal Vacuno'), 0, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, 'Fecha de Generación: ' . date('d/m/Y'), 0, 1, 'C');
        $this->Ln(5);
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Función para añadir una tabla de datos
    function FancyTable($header, $data, $tituloSeccion) {
        // Título de la sección
        $this->SetTextColor(0);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 8, utf8_decode($tituloSeccion), 0, 1, 'L');
        
        if (empty($data)) {
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 6, utf8_decode('No se encontraron registros para esta sección.'), 0, 1, 'C');
            $this->Ln(5);
            return;
        }

        // Configuración de la tabla
        $this->SetFillColor(44, 62, 80); // Color de fondo del encabezado
        $this->SetTextColor(255);
        $this->SetDrawColor(44, 62, 80);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);
        
        // Calcular anchos de columna dinámicamente
        $numCols = count($header);
        $anchoTotal = 190; // Ancho total de la página en mm (aprox)
        $w = array();
        $baseWidth = $anchoTotal / $numCols;
        for ($i = 0; $i < $numCols; $i++) {
            $w[] = $baseWidth;
        }
        
        // Imprimir encabezados
        for($i=0; $i<$numCols; $i++) {
            $this->Cell($w[$i], 7, utf8_decode($header[$i]), 1, 0, 'C', true);
        }
        $this->Ln();

        // Restaurar colores y fuente para el cuerpo
        $this->SetFillColor(230, 230, 230);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 9);

        // Datos de la tabla
        $fill = false;
        foreach($data as $row) {
            // Asegurar que la tabla no se imprima sobre el pie de página
            if ($this->GetY() + 6 > 250) { // Si queda menos de 6mm para el final
                $this->AddPage();
                $this->FancyTable($header, $data, $tituloSeccion); // Re-imprime el encabezado en la nueva página
                return; // Sale de la función para evitar bucle
            }
            
            $i = 0;
            foreach($row as $value) {
                // Si el texto es demasiado largo, se trunca para el PDF
                $displayValue = utf8_decode(substr($value, 0, 30));
                if (strlen($value) > 30) {
                    $displayValue .= '...';
                }
                $this->Cell($w[$i], 6, $displayValue, 'LR', 0, 'L', $fill);
                $i++;
            }
            $this->Ln();
            $fill = !$fill;
        }
        // Línea de cierre de la tabla
        $this->Cell($anchoTotal, 0, '', 'T');
        $this->Ln(10);
    }
}


// --- 3. GENERACIÓN DEL PDF Y CONSULTA DE DATOS ---

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();

// ----------------------------------------------------------------------
// SECCIÓN A: DATOS
// ----------------------------------------------------------------------

// 1. VIENTRES (Tabla: vientres)
$tabla_vientres = 'vientres_basicos'; 
$campos_vientres = [
    'id_vientre', 'nombre_animal', 'tipo_animal', 'codigo_id_animal', 'fecha_nac', 'peso_act'
];
$header_vientres = [
    'Código', 'Nombre', 'Raza', 'Cond. Reprod.', 'F. Nac.', 'Peso (kg)'
];
$datos_vientres = obtenerDatos($conn, $tabla_vientres, $campos_vientres);
$pdf->FancyTable($header_vientres, $datos_vientres, utf8_decode('A.1. DATOS - Vientres'));


// 2. ANIMALES PARA LA CRÍA (Tabla: cria)
$tabla_cria = 'cria'; 
$campos_cria = [
    'codigo_identificacion_cria', 'nombre_cria', 'codigo_madre_cria', 'fecha_nacimiento_cria', 'tipo_categoria_cria'
];
$header_cria = [
    'Código Cría', 'Nombre', 'Cód. Madre', 'F. Nac.', 'Categoría'
];
$datos_cria = obtenerDatos($conn, $tabla_cria, $campos_cria);
$pdf->FancyTable($header_cria, $datos_cria, utf8_decode('A.2. DATOS - Animales para la Cría'));


// 3. TOROS EN SERVICIO (Tabla: toros)
$tabla_toros = 'toros'; 
$campos_toros = [
    'codigo_id_toro', 'nombre_toro', 'raza_toro', 'fecha_ingreso', 'estado_reproductivo'
];
$header_toros = [
    'Código', 'Nombre', 'Raza', 'F. Ingreso', 'Estado Reprod.'
];
$datos_toros = obtenerDatos($conn, $tabla_toros, $campos_toros);
$pdf->FancyTable($header_toros, $datos_toros, utf8_decode('A.3. DATOS - Toros en Servicio'));


// ----------------------------------------------------------------------
// SECCIÓN B: EVENTOS
// ----------------------------------------------------------------------
$pdf->AddPage(); // Página nueva para la siguiente sección principal

// 4. REPRODUCTIVOS / SERVICIOS (Tabla: servicios_reproductivos)
$tabla_servicios = 'servicios_reproductivos'; 
$campos_servicios = [
    'codigo_animal', 'fecha_servicio', 'tipo_servicio', 'codigo_toro', 'resultado'
];
$header_servicios = [
    'Cód. Animal', 'Fecha Servicio', 'Tipo Servicio', 'Cód. Toro/Semen', 'Resultado'
];
$datos_servicios = obtenerDatos($conn, $tabla_servicios, $campos_servicios);
$pdf->FancyTable($header_servicios, $datos_servicios, utf8_decode('B.1. EVENTOS - Servicios Reproductivos'));


// 5. PRODUCCIÓN LÁCTEA (Tabla: produccion_lactea)
$tabla_produccion = 'produccion_lactea'; 
$campos_produccion = [
    'codigo_animal', 'fecha_medicion', 'litros_dia', 'dias_lactancia', 'calidad_leche'
];
$header_produccion = [
    'Cód. Animal', 'F. Medición', 'Litros/Día', 'Días Lact.', 'Calidad'
];
$datos_produccion = obtenerDatos($conn, $tabla_produccion, $campos_produccion);
$pdf->FancyTable($header_produccion, $datos_produccion, utf8_decode('B.2. EVENTOS - Producción Láctea'));


// ----------------------------------------------------------------------
// Cierre de conexión y Salida del PDF
// ----------------------------------------------------------------------
$conn->close();

// 'I' Envía el archivo al navegador. El JS se encarga de la descarga.
$pdf->Output('I', 'Reporte_AgroVacuno_'.date('Ymd').'.pdf'); 

exit;
?>