<?php
// VOLTIA Motors · Guarda solicitud de prueba (POST → JSON). Con respaldo en CSV si MySQL falla.
declare(strict_types=1);
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
  http_response_code(405);
  echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
  exit;
}

$nombre = clean($_POST['nombre'] ?? '');
$tel    = clean($_POST['tel'] ?? '', 40);
$modelo  = clean($_POST['modelo'] ?? '', 80);

if (mb_strlen($nombre) < 2 || mb_strlen($tel) < 6) {
  http_response_code(422);
  echo json_encode(['ok' => false, 'msg' => 'Escribe tu nombre y un WhatsApp válido.']);
  exit;
}

try {
  $st = db()->prepare('INSERT INTO pruebas (nombre, telefono, modelo) VALUES (?,?,?)');
  $st->execute([$nombre, $tel, $modelo]);
  echo json_encode(['ok' => true, 'msg' => "¡Gracias $nombre! Te escribiremos al $tel para tu prueba en el $modelo. ⚡"], JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  @mkdir(__DIR__ . '/datos', 0777, true);
  @file_put_contents(__DIR__ . '/datos/leads.csv', date('Y-m-d H:i') . ";$nombre;$tel;$modelo\n", FILE_APPEND);
  echo json_encode(['ok' => true, 'msg' => "¡Gracias $nombre! Te escribiremos al $tel. ⚡"], JSON_UNESCAPED_UNICODE);
}
