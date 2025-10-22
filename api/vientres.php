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
    // Obtener todos los vientres
    $result = $conn->query("SELECT * FROM vientres ORDER BY fecha_registro DESC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    // Obtener el total de vientres
    $countResult = $conn->query("SELECT COUNT(*) as total FROM vientres");
    $totalData = $countResult->fetch_assoc();
    $total = $totalData['total'];
    
    jsonResponse([
        'success' => true, 
        'data' => $data,
        'total' => $total  // ← Esto es importante
    ]);
    break;

    case 'POST':
    $input = json_decode(file_get_contents('php://input'), true);
    if ($input) $_POST = $input;

    try {
        // INSERT con solo los campos que necesitas
        $stmt = $conn->prepare("
            INSERT INTO vientres (
                nombre_animal, tipo_animal, codigo_id_animal, fecha_nac, edad_meses,
                raza_princ, corral_animal, lote_animal, grupo_animal, color_animal,
                peso_act, condi_corp, condicion_reprod, ultimo_servicio, dias_servida,
                ultima_palpitacion, proximo_parto, resultado_serv, estado_prod, ultimo_parto,
                numero_partos, promedio_produccion, dias_parida, calidad_leche, fecha_ingr,
                origen_animal, cruce_animal, obser_gener_foto
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");

        if (!$stmt) {
            throw new Exception('Error en prepare: ' . $conn->error);
        }

        // Extraer y validar todos los parámetros
        $nombre_animal = $_POST['nombre_animal'] ?? '';
        $tipo_animal = $_POST['tipo_animal'] ?? 'vaca';
        $codigo_id_animal = $_POST['codigo_id_animal'] ?? '';
        $fecha_nac = $_POST['fecha_nac'] ?? null;
        $edad_meses = $_POST['edad_meses'] ?? 0;
        $raza_princ = $_POST['raza_princ'] ?? 'brahman';
        $corral_animal = $_POST['corral_animal'] ?? '';
        $lote_animal = $_POST['lote_animal'] ?? '';
        $grupo_animal = $_POST['grupo_animal'] ?? '';
        $color_animal = $_POST['color_animal'] ?? '';
        $peso_act = $_POST['peso_act'] ?? 0.0;
        $condi_corp = $_POST['condi_corp'] ?? '3-ideal';
        $condicion_reprod = $_POST['condicion_reprod'] ?? 'vacia';
        $ultimo_servicio = $_POST['ultimo_servicio'] ?? null;
        $dias_servida = $_POST['dias_servida'] ?? 0;
        $ultima_palpitacion = $_POST['ultima_palpitacion'] ?? null;
        $proximo_parto = $_POST['proximo_parto'] ?? null;
        $resultado_serv = $_POST['resultado_serv'] ?? '';
        $estado_prod = $_POST['estado_prod'] ?? 'en desarrollo';
        $ultimo_parto = $_POST['ultimo_parto'] ?? null;
        $numero_partos = $_POST['numero_partos'] ?? 0;
        $promedio_produccion = $_POST['promedio_produccion'] ?? 0.0;
        $dias_parida = $_POST['dias_parida'] ?? 0;
        $calidad_leche = $_POST['calidad_leche'] ?? 'buena';
        $fecha_ingr = $_POST['fecha_ingr'] ?? null;
        $origen_animal = $_POST['origen_animal'] ?? 'cria propia';
        $cruce_animal = $_POST['cruce_animal'] ?? '';
        $obser_gener_foto = $_POST['obser_gener_foto'] ?? '';

        // Bind parameters - 28 parámetros exactos
        $stmt->bind_param(
            "ssssisssssdsssisssssidisssss",
            $nombre_animal,
            $tipo_animal,
            $codigo_id_animal,
            $fecha_nac,
            $edad_meses,
            $raza_princ,
            $corral_animal,
            $lote_animal,
            $grupo_animal,
            $color_animal,
            $peso_act,
            $condi_corp,
            $condicion_reprod,
            $ultimo_servicio,
            $dias_servida,
            $ultima_palpitacion,
            $proximo_parto,
            $resultado_serv,
            $estado_prod,
            $ultimo_parto,
            $numero_partos,
            $promedio_produccion,
            $dias_parida,
            $calidad_leche,
            $fecha_ingr,
            $origen_animal,
            $cruce_animal,
            $obser_gener_foto
        );

        if ($stmt->execute()) {
            // Obtener el total actualizado de vientres
            $result = $conn->query("SELECT COUNT(*) as total FROM vientres");
            $totalData = $result->fetch_assoc();
            $total = $totalData['total'];
            
            jsonResponse([
                'success' => true,
                'message' => 'Vientre registrado correctamente',
                'id' => $conn->insert_id,
                'total' => $total
            ]);
        } else {
            throw new Exception('Error en execute: ' . $stmt->error);
        }

    } catch (Exception $e) {
        error_log("Error en vientres.php: " . $e->getMessage());
        jsonResponse([
            'success' => false, 
            'message' => 'Error al registrar: ' . $e->getMessage()
        ]);
    }
    break;

    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        
        $stmt = $conn->prepare("DELETE FROM vientres WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            jsonResponse(['success' => true, 'message' => 'Vientre eliminado']);
        } else {
            jsonResponse(['success' => false, 'message' => 'Error al eliminar: ' . $stmt->error]);
        }
        break;

    default:
        jsonResponse(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>