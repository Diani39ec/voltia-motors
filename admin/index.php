<?php
// VOLTIA Motors · Panel admin de solicitudes. Uso: admin/?key=voltia2026
declare(strict_types=1);
require __DIR__ . '/../config.php';

if (($_GET['key'] ?? '') !== ADMIN_KEY) {
  http_response_code(403);
  exit('⛔ Acceso denegado.');
}

$cambio = null;
if (isset($_POST['id'], $_POST['estado']) && in_array($_POST['estado'], ['nueva', 'contactada', 'agendada', 'vendida'], true)) {
  $st = db()->prepare('UPDATE pruebas SET estado = ? WHERE id = ?');
  $st->execute([$_POST['estado'], (int)$_POST['id']]);
  $cambio = '✅ Estado actualizado.';
}

$rows = db()->query('SELECT * FROM pruebas ORDER BY id DESC')->fetchAll();
$total = count($rows);
$vendidas = count(array_filter($rows, fn($r) => $r['estado'] === 'vendida'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin · <?= SITE_NAME ?></title>
<link rel="stylesheet" href="../styles.css">
<style>.wrap{max-width:1000px;margin:auto;padding:1rem}table{width:100%;border-collapse:collapse;background:#16162c}th,td{border-bottom:1px solid #2f2f55;padding:.5rem;text-align:left}body{background:#0b0b18;color:#f4f4ff;font-family:Segoe UI,Arial,sans-serif}.kpis{display:flex;gap:.7rem;margin:1rem 0}.kpi{background:#16162c;border:1px solid #2f2f55;border-radius:12px;padding:.7rem 1.2rem}</style>
</head>
<body>
<div class="wrap">
  <h1>🔑 Admin · Solicitudes de prueba</h1>
  <?php if ($cambio) echo "<p>$cambio</p>"; ?>
  <div class="kpis">
    <div class="kpi">📋 Total: <strong><?= $total ?></strong></div>
    <div class="kpi">💰 Vendidas: <strong><?= $vendidas ?></strong></div>
  </div>
  <table>
    <thead><tr><th>#</th><th>Nombre</th><th>WhatsApp</th><th>Modelo</th><th>Fecha</th><th>Estado</th><th></th></tr></thead>
    <tbody>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?= (int)$r['id'] ?></td>
        <td><?= htmlspecialchars($r['nombre']) ?></td>
        <td><a style="color:#00e5ff" target="_blank" href="https://wa.me/?text=<?= urlencode('Hola '.$r['nombre'].', te escribimos de VOLTIA Motors ⚡') ?>"><?= htmlspecialchars($r['telefono']) ?></a></td>
        <td><?= htmlspecialchars($r['modelo']) ?></td>
        <td><?= htmlspecialchars($r['created_at']) ?></td>
        <td><?= htmlspecialchars($r['estado']) ?></td>
        <td>
          <form method="POST" style="display:flex;gap:.3rem">
            <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
            <select name="estado">
              <?php foreach (['nueva','contactada','agendada','vendida'] as $e): ?>
                <option <?= $e === $r['estado'] ? 'selected' : '' ?>><?= $e ?></option>
              <?php endforeach; ?>
            </select>
            <button>💾</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    <?php if (!$rows) echo '<tr><td colspan="7">Sin solicitudes todavía.</td></tr>'; ?>
    </tbody>
  </table>
  <p><a style="color:#00e5ff" href="../">← Volver al sitio</a></p>
</div>
</body>
</html>
