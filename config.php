<?php
// VOLTIA Motors — Configuración central
declare(strict_types=1);

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'voltia_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('ADMIN_KEY', 'voltia2026'); // cambia esta clave en producción
define('SITE_NAME', 'VOLTIA Motors');

function db(): PDO {
  static $pdo = null;
  if ($pdo === null) {
    $pdo = new PDO(
      'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4',
      DB_USER, DB_PASS,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
  }
  return $pdo;
}

function clean(string $v, int $max = 120): string {
  $v = trim(strip_tags($v));
  return mb_substr($v, 0, $max);
}
