<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Restauración · <?= e(APP_NAME) ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
body{background:radial-gradient(circle at 18% 18%,rgba(16,188,212,.28),transparent 30rem),radial-gradient(circle at 82% 78%,rgba(121,88,237,.36),transparent 32rem),linear-gradient(145deg,#071321,#111f3d);min-height:100vh;display:grid;place-items:center;font-family:system-ui}
body>.card{background:rgba(248,251,255,.92);border:1px solid rgba(255,255,255,.7)!important;box-shadow:0 24px 70px rgba(0,0,0,.3)!important;backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px)}
@supports (backdrop-filter:blur(1px)){body>.card{background:rgba(248,251,255,.84)}}
</style></head>
<body><div class="card border-0 shadow-lg rounded-4 p-4" style="max-width:560px;width:92%">
<?php if ($r['ok']): ?>
  <div class="text-center mb-3"><i class="bi bi-check-circle-fill text-success" style="font-size:3rem"></i></div>
  <h3 class="fw-bold text-center">Restauración completada</h3>
  <p class="text-muted text-center">Se restauró <b><?= e($r['origen']) ?></b> (<?= (int)$r['tablas'] ?> tablas, <?= (int)$r['sent'] ?> instrucciones). Por seguridad se cerró tu sesión.</p>
  <p class="small text-muted text-center">Antes se guardó una copia del estado anterior: <code><?= e($r['previo']) ?></code></p>
  <a class="btn btn-primary btn-lg w-100" href="<?= url('login') ?>">Iniciar sesión</a>
<?php else: ?>
  <div class="text-center mb-3"><i class="bi bi-x-octagon-fill text-danger" style="font-size:3rem"></i></div>
  <h3 class="fw-bold text-center">No se pudo restaurar</h3>
  <pre class="small bg-light p-3 rounded" style="white-space:pre-wrap"><?= e($r['error']) ?></pre>
  <?php if (!empty($r['revertido'])): ?><div class="alert alert-success small">El sistema volvió automáticamente al estado anterior (copia <code><?= e($r['previo']) ?></code>). No se perdió información.</div>
  <?php else: ?><div class="alert alert-danger small">No se pudo volver automáticamente al estado anterior<?= !empty($r['error2']) ? ': ' . e($r['error2']) : '' ?>. Tu copia previa está en <code>storage/respaldos/<?= e($r['previo']) ?></code>; impórtala con phpMyAdmin o HeidiSQL.</div><?php endif; ?>
  <a class="btn btn-primary w-100" href="<?= url('respaldo?tab=restaurar') ?>">Volver</a>
<?php endif; ?></div></body></html>
