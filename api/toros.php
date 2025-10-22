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
        try {
            // Verificar si la tabla existe
            $tableCheck = $conn->query("SHOW TABLES LIKE 'toros'");
            if ($tableCheck->num_rows == 0) {
                jsonResponse([
                    'success' => true, 
                    'data' => [],
                    'total' => 0
                ]);
                exit;
            }

            // Obtener todos los toros
            $result = $conn->query("SELECT * FROM toros ORDER BY fecha_registro DESC");
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            // Obtener el total de toros
            $countResult = $conn->query("SELECT COUNT(*) as total FROM toros");
            $totalData = $countResult->fetch_assoc();
            $total = $totalData['total'];
            
            jsonResponse([
                'success' => true, 
                'data' => $data,
                'total' => $total
            ]);
        } catch (Exception $e) {
            jsonResponse([
                'success' => false, 
                'message' => 'Error al cargar toros: ' . $e->getMessage(),
                'total' => 0
            ]);
        }
        break;

    case 'POST':
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            if (!$input) {
                throw new Exception('No se recibieron datos JSON válidos');
            }

            // Verificar si la tabla existe, si no crearla
            $tableCheck = $conn->query("SHOW TABLES LIKE 'toros'");
            if ($tableCheck->num_rows == 0) {
                // Crear la tabla si no existe
                $createTable = "
                    CREATE TABLE toros (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        codigo_identificacion VARCHAR(50) NOT NULL UNIQUE,
                        nombre VARCHAR(100),
                        raza VARCHAR(50) NOT NULL,
                        procedencia VARCHAR(50),
                        fecha_nacimiento DATE,
                        edad_meses INT,
                        peso_actual DECIMAL(6,2),
                        condicion_corporal VARCHAR(20),
                        lote_asignado VARCHAR(50),
                        corral VARCHAR(50),
                        fecha_inicio_servicio DATE NOT NULL,
                        tipo_servicio VARCHAR(50),
                        numero_vientres INT,
                        servicios_realizados INT,
                        preñez_confirmada INT,
                        eficiencia_reproductiva VARCHAR(20),
                        estado_salud VARCHAR(50),
                        vacunaciones VARCHAR(20),
                        evaluacion_fertilidad VARCHAR(50),
                        ultima_revision DATE,
                        enfermedades TEXT,
                        tratamientos TEXT,
                        proximo_control DATE,
                        responsable VARCHAR(100),
                        alimentacion_especial VARCHAR(10),
                        plan_rotacion TEXT,
                        observaciones TEXT,
                        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                ";
                if (!$conn->query($createTable)) {
                    throw new Exception('Error al crear tabla: ' . $conn->error);
                }
            }

            // Preparar el INSERT
            $stmt = $conn->prepare("
                INSERT INTO toros (
                    codigo_identificacion, nombre, raza, procedencia,
                    fecha_nacimiento, edad_meses, peso_actual, condicion_corporal,
                    lote_asignado, corral, fecha_inicio_servicio, tipo_servicio,
                    numero_vientres, servicios_realizados, preñez_confirmada,
                    eficiencia_reproductiva, estado_salud, vacunaciones,
                    evaluacion_fertilidad, ultima_revision, enfermedades,
                    tratamientos, proximo_control, responsable,
                    alimentacion_especial, plan_rotacion, observaciones
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

            if (!$stmt) {
                throw new Exception('Error en prepare: ' . $conn->error);
            }

            // Extraer parámetros
            $codigo_identificacion = $input['codigo_identificacion'] ?? '';
            $nombre = $input['nombre'] ?? '';
            $raza = $input['raza'] ?? '';
            $procedencia = $input['procedencia'] ?? '';
            $fecha_nacimiento = $input['fecha_nacimiento'] ?? null;
            $edad_meses = isset($input['edad_meses']) ? (int)$input['edad_meses'] : null;
            $peso_actual = isset($input['peso_actual']) ? (float)$input['peso_actual'] : null;
            $condicion_corporal = $input['condicion_corporal'] ?? '';
            $lote_asignado = $input['lote_asignado'] ?? '';
            $corral = $input['corral'] ?? '';
            $fecha_inicio_servicio = $input['fecha_inicio_servicio'] ?? null;
            $tipo_servicio = $input['tipo_servicio'] ?? '';
            $numero_vientres = isset($input['numero_vientres']) ? (int)$input['numero_vientres'] : null;
            $servicios_realizados = isset($input['servicios_realizados']) ? (int)$input['servicios_realizados'] : null;
            $preñez_confirmada = isset($input['preñez_confirmada']) ? (int)$input['preñez_confirmada'] : null;
            $eficiencia_reproductiva = $input['eficiencia_reproductiva'] ?? '';
            $estado_salud = $input['estado_salud'] ?? '';
            $vacunaciones = $input['vacunaciones'] ?? '';
            $evaluacion_fertilidad = $input['evaluacion_fertilidad'] ?? '';
            $ultima_revision = $input['ultima_revision'] ?? null;
            $enfermedades = $input['enfermedades'] ?? '';
            $tratamientos = $input['tratamientos'] ?? '';
            $proximo_control = $input['proximo_control'] ?? null;
            $responsable = $input['responsable'] ?? '';
            $alimentacion_especial = $input['alimentacion_especial'] ?? '';
            $plan_rotacion = $input['plan_rotacion'] ?? '';
            $observaciones = $input['observaciones'] ?? '';

            // Validar campos obligatorios
            if (empty($codigo_identificacion) || empty($raza) || empty($fecha_inicio_servicio)) {
                throw new Exception('Los campos código, raza y fecha de inicio en servicio son obligatorios');
            }

            // Bind parameters
            $stmt->bind_param(
                "sssssidsssssiiissssssssssss",
                $codigo_identificacion,
                $nombre,
                $raza,
                $procedencia,
                $fecha_nacimiento,
                $edad_meses,
                $peso_actual,
                $condicion_corporal,
                $lote_asignado,
                $corral,
                $fecha_inicio_servicio,
                $tipo_servicio,
                $numero_vientres,
                $servicios_realizados,
                $preñez_confirmada,
                $eficiencia_reproductiva,
                $estado_salud,
                $vacunaciones,
                $evaluacion_fertilidad,
                $ultima_revision,
                $enfermedades,
                $tratamientos,
                $proximo_control,
                $responsable,
                $alimentacion_especial,
                $plan_rotacion,
                $observaciones
            );

            if ($stmt->execute()) {
                // Obtener el total actualizado
                $countResult = $conn->query("SELECT COUNT(*) as total FROM toros");
                $totalData = $countResult->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true,
                    'message' => 'Toro registrado correctamente',
                    'id' => $conn->insert_id,
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error en execute: ' . $stmt->error);
            }

        } catch (Exception $e) {
            jsonResponse([
                'success' => false, 
                'message' => 'Error al registrar toro: ' . $e->getMessage()
            ]);
        }
        break;

    case 'DELETE':
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = (int)($input['id'] ?? 0);
            
            if ($id <= 0) {
                throw new Exception('ID inválido');
            }
            
            $stmt = $conn->prepare("DELETE FROM toros WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                // Obtener el total actualizado después de eliminar
                $countResult = $conn->query("SELECT COUNT(*) as total FROM toros");
                $totalData = $countResult->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true, 
                    'message' => 'Toro eliminado correctamente',
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error al eliminar: ' . $stmt->error);
            }
        } catch (Exception $e) {
            jsonResponse([
                'success' => false, 
                'message' => 'Error al eliminar toro: ' . $e->getMessage()
            ]);
        }
        break;

    default:
        jsonResponse(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>