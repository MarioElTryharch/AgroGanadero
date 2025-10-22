<?php
require_once '../config.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit(0);

$conn = getConnection();
$method = $_SERVER['REQUEST_METHOD'];

function jsonResponse($data) {
    echo json_encode($data);
    exit;
}

switch ($method) {
    case 'GET':
        // Obtener todos los animales eliminados
        $result = $conn->query("SELECT * FROM animales_eliminados ORDER BY fecha_registro DESC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Obtener el total de animales eliminados
        $countResult = $conn->query("SELECT COUNT(*) as total FROM animales_eliminados");
        $totalData = $countResult->fetch_assoc();
        $total = $totalData['total'];
        
        jsonResponse([
            'success' => true, 
            'data' => $data,
            'total' => $total
        ]);
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if ($input) $_POST = $input;

        // Debug: Ver qué datos están llegando
        error_log("Datos recibidos en animales-elim.php: " . print_r($_POST, true));

        try {
            // INSERT con los campos del formulario HTML
            $stmt = $conn->prepare("
                INSERT INTO animales_eliminados (
                    codigo_animal, nombre_animal, fecha_eliminacion, categoria,
                    raza, lote_procedencia, motivo_principal, causa_especifica,
                    metodo_eliminacion, responsable, diagnostico_veterinario,
                    tratamientos_aplicados, edad_meses, peso_kg, valor_estimado,
                    precio_venta_real, destino_final, costos_asociados,
                    perdida_estimada, cubierto_seguro, descripcion_costos,
                    observaciones
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

            if (!$stmt) {
                throw new Exception('Error en prepare: ' . $conn->error);
            }

            // Extraer parámetros - USANDO LOS NOMBRES EXACTOS DEL FORMULARIO HTML
            $codigo_animal = $_POST['codigo_animal'] ?? '';
            $nombre_animal = $_POST['nombre_animal'] ?? '';
            $fecha_eliminacion = $_POST['fecha_eliminacion'] ?? null;
            $categoria = $_POST['categoria'] ?? '';
            $raza = $_POST['raza'] ?? '';
            $lote_procedencia = $_POST['lote_procedencia'] ?? '';
            $motivo_principal = $_POST['motivo_principal'] ?? '';
            $causa_especifica = $_POST['causa_especifica'] ?? '';
            $metodo_eliminacion = $_POST['metodo_eliminacion'] ?? '';
            $responsable = $_POST['responsable'] ?? '';
            $diagnostico_veterinario = $_POST['diagnostico_veterinario'] ?? '';
            $tratamientos_aplicados = $_POST['tratamientos_aplicados'] ?? '';
            $edad_meses = !empty($_POST['edad_meses']) ? (int)$_POST['edad_meses'] : null;
            $peso_kg = !empty($_POST['peso_kg']) ? (float)$_POST['peso_kg'] : null;
            $valor_estimado = !empty($_POST['valor_estimado']) ? (float)$_POST['valor_estimado'] : null;
            $precio_venta_real = !empty($_POST['precio_venta_real']) ? (float)$_POST['precio_venta_real'] : null;
            $destino_final = $_POST['destino_final'] ?? '';
            $costos_asociados = !empty($_POST['costos_asociados']) ? (float)$_POST['costos_asociados'] : null;
            $perdida_estimada = !empty($_POST['perdida_estimada']) ? (float)$_POST['perdida_estimada'] : null;
            $cubierto_seguro = $_POST['cubierto_seguro'] ?? '';
            $descripcion_costos = $_POST['descripcion_costos'] ?? '';
            $observaciones = $_POST['observaciones'] ?? '';

            // Debug: Ver los valores que se van a insertar
            error_log("Valores a insertar:");
            error_log("codigo_animal: " . $codigo_animal);
            error_log("nombre_animal: " . $nombre_animal);
            error_log("fecha_eliminacion: " . $fecha_eliminacion);
            error_log("motivo_principal: " . $motivo_principal);

            // Bind parameters
            $stmt->bind_param(
                "ssssssssssssiidddsddss",
                $codigo_animal,
                $nombre_animal,
                $fecha_eliminacion,
                $categoria,
                $raza,
                $lote_procedencia,
                $motivo_principal,
                $causa_especifica,
                $metodo_eliminacion,
                $responsable,
                $diagnostico_veterinario,
                $tratamientos_aplicados,
                $edad_meses,
                $peso_kg,
                $valor_estimado,
                $precio_venta_real,
                $destino_final,
                $costos_asociados,
                $perdida_estimada,
                $cubierto_seguro,
                $descripcion_costos,
                $observaciones
            );

            if ($stmt->execute()) {
                // Obtener el total actualizado de animales eliminados
                $result = $conn->query("SELECT COUNT(*) as total FROM animales_eliminados");
                $totalData = $result->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true,
                    'message' => 'Animal eliminado registrado correctamente',
                    'id' => $conn->insert_id,
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error en execute: ' . $stmt->error);
            }

        } catch (Exception $e) {
            error_log("Error en animales-elim.php: " . $e->getMessage());
            jsonResponse([
                'success' => false, 
                'message' => 'Error al registrar: ' . $e->getMessage()
            ]);
        }
        break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        
        $stmt = $conn->prepare("DELETE FROM animales_eliminados WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            // Obtener el total actualizado después de eliminar
            $result = $conn->query("SELECT COUNT(*) as total FROM animales_eliminados");
            $totalData = $result->fetch_assoc();
            $total = $totalData['total'];
            
            jsonResponse([
                'success' => true, 
                'message' => 'Animal eliminado borrado',
                'total' => $total
            ]);
        } else {
            jsonResponse(['success' => false, 'message' => 'Error al eliminar: ' . $stmt->error]);
        }
        break;

    default:
        jsonResponse(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>