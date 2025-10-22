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
            $tableCheck = $conn->query("SHOW TABLES LIKE 'inseminadores'");
            if ($tableCheck->num_rows == 0) {
                jsonResponse([
                    'success' => true, 
                    'data' => [],
                    'total' => 0
                ]);
                exit;
            }

            // Obtener todos los inseminadores
            $result = $conn->query("SELECT * FROM inseminadores ORDER BY fecha_registro DESC");
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            // Obtener el total de inseminadores
            $countResult = $conn->query("SELECT COUNT(*) as total FROM inseminadores");
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
                'message' => 'Error al cargar inseminadores: ' . $e->getMessage(),
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
            $tableCheck = $conn->query("SHOW TABLES LIKE 'inseminadores'");
            if ($tableCheck->num_rows == 0) {
                // Crear la tabla si no existe
                $createTable = "
                    CREATE TABLE inseminadores (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        codigo_inseminador VARCHAR(50) NOT NULL UNIQUE,
                        nombre VARCHAR(100) NOT NULL,
                        tipo_documento VARCHAR(20),
                        numero_documento VARCHAR(50),
                        fecha_nacimiento DATE,
                        edad INT,
                        telefono VARCHAR(20),
                        email VARCHAR(100),
                        direccion TEXT,
                        nivel_estudios VARCHAR(50),
                        titulo VARCHAR(100),
                        institucion_formacion VARCHAR(100),
                        experiencia_anios DECIMAL(4,1),
                        especialidad VARCHAR(100),
                        habilidades_tecnicas TEXT,
                        fecha_contratacion DATE NOT NULL,
                        estado VARCHAR(20) NOT NULL,
                        tipo_contrato VARCHAR(50),
                        salario_base DECIMAL(10,2),
                        horario_trabajo VARCHAR(100),
                        dias_descanso VARCHAR(100),
                        lotes_asignados TEXT,
                        equipos_asignados TEXT,
                        bonos_rendimiento DECIMAL(10,2),
                        seguro_medico VARCHAR(20),
                        fecha_evaluacion DATE,
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
                INSERT INTO inseminadores (
                    codigo_inseminador, nombre, tipo_documento, numero_documento,
                    fecha_nacimiento, edad, telefono, email, direccion,
                    nivel_estudios, titulo, institucion_formacion, experiencia_anios,
                    especialidad, habilidades_tecnicas, fecha_contratacion, estado,
                    tipo_contrato, salario_base, horario_trabajo, dias_descanso,
                    lotes_asignados, equipos_asignados, bonos_rendimiento,
                    seguro_medico, fecha_evaluacion, observaciones
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )
            ");

            if (!$stmt) {
                throw new Exception('Error en prepare: ' . $conn->error);
            }

            // Extraer parámetros
            $codigo_inseminador = $input['codigo_inseminador'] ?? '';
            $nombre = $input['nombre'] ?? '';
            $tipo_documento = $input['tipo_documento'] ?? '';
            $numero_documento = $input['numero_documento'] ?? '';
            $fecha_nacimiento = $input['fecha_nacimiento'] ?? null;
            $edad = isset($input['edad']) ? (int)$input['edad'] : null;
            $telefono = $input['telefono'] ?? '';
            $email = $input['email'] ?? '';
            $direccion = $input['direccion'] ?? '';
            $nivel_estudios = $input['nivel_estudios'] ?? '';
            $titulo = $input['titulo'] ?? '';
            $institucion_formacion = $input['institucion_formacion'] ?? '';
            $experiencia_anios = isset($input['experiencia_anios']) ? (float)$input['experiencia_anios'] : null;
            $especialidad = $input['especialidad'] ?? '';
            $habilidades_tecnicas = $input['habilidades_tecnicas'] ?? '';
            $fecha_contratacion = $input['fecha_contratacion'] ?? null;
            $estado = $input['estado'] ?? '';
            $tipo_contrato = $input['tipo_contrato'] ?? '';
            $salario_base = isset($input['salario_base']) ? (float)$input['salario_base'] : null;
            $horario_trabajo = $input['horario_trabajo'] ?? '';
            $dias_descanso = $input['dias_descanso'] ?? '';
            $lotes_asignados = $input['lotes_asignados'] ?? '';
            $equipos_asignados = $input['equipos_asignados'] ?? '';
            $bonos_rendimiento = isset($input['bonos_rendimiento']) ? (float)$input['bonos_rendimiento'] : null;
            $seguro_medico = $input['seguro_medico'] ?? '';
            $fecha_evaluacion = $input['fecha_evaluacion'] ?? null;
            $observaciones = $input['observaciones'] ?? '';

            // Validar campos obligatorios
            if (empty($codigo_inseminador) || empty($nombre) || empty($fecha_contratacion) || empty($estado)) {
                throw new Exception('Los campos código, nombre, fecha de contratación y estado son obligatorios');
            }

            // Bind parameters
            $stmt->bind_param(
                "sssssissssssdsssssdsssssdsss",
                $codigo_inseminador,
                $nombre,
                $tipo_documento,
                $numero_documento,
                $fecha_nacimiento,
                $edad,
                $telefono,
                $email,
                $direccion,
                $nivel_estudios,
                $titulo,
                $institucion_formacion,
                $experiencia_anios,
                $especialidad,
                $habilidades_tecnicas,
                $fecha_contratacion,
                $estado,
                $tipo_contrato,
                $salario_base,
                $horario_trabajo,
                $dias_descanso,
                $lotes_asignados,
                $equipos_asignados,
                $bonos_rendimiento,
                $seguro_medico,
                $fecha_evaluacion,
                $observaciones
            );

            if ($stmt->execute()) {
                // Obtener el total actualizado
                $countResult = $conn->query("SELECT COUNT(*) as total FROM inseminadores");
                $totalData = $countResult->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true,
                    'message' => 'Inseminador registrado correctamente',
                    'id' => $conn->insert_id,
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error en execute: ' . $stmt->error);
            }

        } catch (Exception $e) {
            jsonResponse([
                'success' => false, 
                'message' => 'Error al registrar inseminador: ' . $e->getMessage()
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
            
            $stmt = $conn->prepare("DELETE FROM inseminadores WHERE id = ?");
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                // Obtener el total actualizado después de eliminar
                $countResult = $conn->query("SELECT COUNT(*) as total FROM inseminadores");
                $totalData = $countResult->fetch_assoc();
                $total = $totalData['total'];
                
                jsonResponse([
                    'success' => true, 
                    'message' => 'Inseminador eliminado correctamente',
                    'total' => $total
                ]);
            } else {
                throw new Exception('Error al eliminar: ' . $stmt->error);
            }
        } catch (Exception $e) {
            jsonResponse([
                'success' => false, 
                'message' => 'Error al eliminar inseminador: ' . $e->getMessage()
            ]);
        }
        break;

    default:
        jsonResponse(['success' => false, 'message' => 'Método no permitido']);
}

$conn->close();
?>