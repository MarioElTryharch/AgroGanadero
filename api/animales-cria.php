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
        // Obtener todos los animales de cría
        $result = $conn->query("SELECT * FROM animales_cria ORDER BY fecha_registro DESC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        // Obtener el total de animales de cría
        $countResult = $conn->query("SELECT COUNT(*) as total FROM animales_cria");
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
        error_log("Datos recibidos en animales-cria.php: " . print_r($_POST, true));

        try {
            // INSERT con los campos corregidos según el formulario HTML
            $stmt = $conn->prepare("
                INSERT INTO animales_cria (
                    codigo_identificacion, nombre, fecha_nacimiento, tipo_categoria,
                    codigo_madre, codigo_padre, raza_principal, color,
                    peso_nacimiento, peso_actual, estado_salud, vacunaciones,
                    lote_origen, corral_grupo, destino_final, estado_desarrollo,
                    observaciones
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

            if (!$stmt) {
                throw new Exception('Error en prepare: ' . $conn->error);
            }

            // Extraer parámetros - USANDO LOS NOMBRES EXACTOS DEL FORMULARIO HTML
            $codigo_identificacion = $_POST['codigo_identificacion'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
            $tipo_categoria = $_POST['tipo_categoria'] ?? '';
            $codigo_madre = $_POST['codigo_madre'] ?? '';
            $codigo_padre = $_POST['codigo_padre'] ?? '';
            $raza_principal = $_POST['raza_principal'] ?? '';
            $color = $_POST['color'] ?? '';
            $peso_nacimiento = !empty($_POST['peso_nacimiento']) ? (float)$_POST['peso_nacimiento'] : null;
            $peso_actual = !empty($_POST['peso_actual']) ? (float)$_POST['peso_actual'] : null;
            $estado_salud = $_POST['estado_salud'] ?? '';
            $vacunaciones = $_POST['vacunaciones'] ?? '';
            $lote_origen = $_POST['lote_origen'] ?? '';
            $corral_grupo = $_POST['corral_grupo'] ?? '';
            $destino_final = $_POST['destino_final'] ?? '';
            $estado_desarrollo = $_POST['estado_desarrollo'] ?? '';
            $observaciones = $_POST['observaciones'] ?? '';

            // Debug: Ver los valores que se van a insertar
            error_log("Valores a insertar:");
            error_log("codigo_identificacion: " . $codigo_identificacion);
            error_log("nombre: " . $nombre);
            error_log("fecha_nacimiento: " . $fecha_nacimiento);
            error_log("tipo_categoria: " . $tipo_categoria);

            // Bind parameters
            $stmt->bind_param(
                "ssssssssddsssssss",
                $codigo_identificacion,
                $nombre,
                $fecha_nacimiento,
                $tipo_categoria,
                $codigo_madre,
                $codigo_padre,
                $raza_principal,
                $color,
                $peso_nacimiento,
                $peso_actual,
                $estado_salud,
                $vacunaciones,
                $lote_origen,
                $corral_grupo,
                $destino_final,
                $estado_desarrollo,
                $observaciones
            );

            if ($stmt->execute()) {
                // Obtener el total actualizado de animales de cría
                $result = $conn->query("SELECT COUNT(*) as total FROM animales_cria");
                $totalData = $result->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true,
                    'message' => 'Animal de cría registrado correctamente',
                    'id' => $conn->insert_id,
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error en execute: ' . $stmt->error);
            }

        } catch (Exception $e) {
            error_log("Error en animales-cria.php: " . $e->getMessage());
            jsonResponse([
                'success' => false, 
                'message' => 'Error al registrar: ' . $e->getMessage()
            ]);
        }
        break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        
        $stmt = $conn->prepare("DELETE FROM animales_cria WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            // Obtener el total actualizado después de eliminar
            $result = $conn->query("SELECT COUNT(*) as total FROM animales_cria");
            $totalData = $result->fetch_assoc();
            $total = $totalData['total'];
            
            jsonResponse([
                'success' => true, 
                'message' => 'Animal de cría eliminado',
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