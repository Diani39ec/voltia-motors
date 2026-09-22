<?php
// VOLTIA Motors · API JSON de modelos
declare(strict_types=1);
require __DIR__ . '/../config.php';
header('Content-Type: application/json; charset=utf-8');

try {
  $rows = db()->query('SELECT nombre, tipo, precio, autonomia_km, cero_cien, carga_min, foto_url, foto_alt FROM modelos ORDER BY destacado DESC, id ASC')->fetchAll();
  echo json_encode(['ok' => true, 'modelos' => $rows], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(['ok' => false, 'msg' => 'BD no disponible'], JSON_UNESCAPED_UNICODE);
}
