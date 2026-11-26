<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Iniciar sesión · <?= e(empresa_nombre()) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="<?= asset('css/app.css') . '?v=' . filemtime(__DIR__ . '/../../../assets/css/app.css') ?>" rel="stylesheet">
<link rel="manifest" href="<?= BASE_URL ?>/manifest.json"><meta name="theme-color" content="#0b1437"><meta name="base-url" content="<?= BASE_URL ?>"><link rel="apple-touch-icon" href="<?= asset('img/apple-touch-icon.png') ?>"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="mobile-web-app-capable" content="yes">
<?= brand_css() ?>
</head>
<body class="login-body">
<div class="login-wrap">

  <!-- Panel visual -->
  <section class="login-hero login-reveal" data-login-reveal>
    <div class="hero-orb orb-1"></div><div class="hero-orb orb-2"></div><div class="hero-grid"></div>
    <div class="hero-inner">
      <div class="brand brand-lg">
        <?= brand_mark() ?>
        <span class="brand-text"><b><?= e(empresa_nombre()) ?></b><small><?= e(cfg('empresa_eslogan', APP_SUBTITLE)) ?></small></span>
      </div>

      <div class="hero-copy">
        <span class="chip chip-glass"><i class="bi bi-stars me-1"></i>Plataforma integral de soporte TI</span>
        <h1>Resuelve más rápido.<br><span>Soporta con confianza.</span></h1>
        <p>Tickets, SLA, activos, visitas técnicas y contratos en un solo lugar. Todo tu servicio de soporte, bajo control.</p>
      </div>

      <div class="hero-cards">
        <div class="float-card fc-1">
          <div class="fc-icon" style="background:#ef444422;color:#fca5a5"><i class="bi bi-exclamation-triangle-fill"></i></div>
          <div><b>TCK-01231</b><small>Servidor sin respaldo · Crítica</small></div>
          <span class="dot-live"></span>
        </div>
        <div class="float-card fc-2">
          <div class="fc-icon" style="background:#10b98122;color:#6ee7b7"><i class="bi bi-check-circle-fill"></i></div>
          <div><b>SLA cumplido</b><small>94.8% este mes</small></div>
        </div>
        <div class="float-card fc-3">
          <div class="fc-icon" style="background:#38bdf822;color:#7dd3fc"><i class="bi bi-geo-alt-fill"></i></div>
          <div><b>Visita técnica</b><small>Hoy 15:30 · Clínica San Gabriel</small></div>
        </div>
      </div>

      <div class="hero-stats">
        <div><b>24/7</b><span>Monitoreo</span></div>
        <div><b>+230</b><span>Tickets gestionados</span></div>
        <div><b>98%</b><span>Satisfacción</span></div>
      </div>
    </div>
  </section>

  <!-- Formulario -->
  <section class="login-panel">
    <div class="login-card login-reveal" id="loginCard" data-login-reveal>
      <div class="brand brand-dark d-lg-none mb-4">
        <?= brand_mark() ?>
        <span class="brand-text"><b><?= e(empresa_nombre()) ?></b><small><?= e(cfg('empresa_eslogan', APP_SUBTITLE)) ?></small></span>
      </div>
      <div class="advanced-demo-badge" title="CSS: Container Queries, clamp(), backdrop-filter y :has(); JavaScript: IntersectionObserver y validación con expresiones regulares">
        <i class="bi bi-stars"></i> CSS + JavaScript avanzado
      </div>
      <h2>Bienvenido de nuevo 👋</h2>
      <p class="text-muted mb-4">Ingresa tus credenciales para acceder al panel de soporte.</p>

      <?php if ($error): ?>
        <div class="alert-ui alert-ui-danger shake" role="alert"><i class="bi bi-exclamation-octagon-fill"></i><span><?= e($error) ?></span></div>
      <?php endif; ?>

      <form method="post" action="<?= url('login') ?>" id="loginForm" autocomplete="on" novalidate>
        <input type="hidden" name="csrf" value="<?= e($csrf) ?>">

        <div class="d-flex justify-content-between align-items-center">
          <label class="field-label m-0" for="login">Usuario o correo</label>
          <button type="button" class="login-format-help" popovertarget="loginFormatHelp" aria-label="Ver formatos aceptados" title="Formatos aceptados">
            <i class="bi bi-question-circle"></i>
          </button>
        </div>
        <div class="input-ui">
          <i class="bi bi-person"></i>
          <input type="text" id="login" name="login" value="<?= e($old) ?>" placeholder="admin o nombre@empresa.com" required autofocus autocomplete="username" maxlength="120" pattern="(?:[A-Za-z0-9._\-]{3,40}|[A-Za-z0-9_%+\-]+(?:\.[A-Za-z0-9_%+\-]+)*@[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?(?:\.[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?)+)" aria-describedby="loginHint"<?= $loginFormatInvalid ? ' data-server-invalid="format" aria-invalid="true"' : ($credentialsInvalid ? ' data-server-invalid="credentials" aria-invalid="true"' : '') ?>>
        </div>
        <small class="login-field-hint" id="loginHint" aria-live="polite">3–40 letras, números, punto, guion o guion bajo; también puedes usar un correo válido.</small>

        <div class="d-flex justify-content-between align-items-center mt-3">
          <label class="field-label m-0" for="password">Contraseña</label>
          <a href="#" class="small link-brand" onclick="return false;">¿Olvidaste tu contraseña?</a>
        </div>
        <div class="input-ui mt-2">
          <i class="bi bi-lock"></i>
          <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="current-password"<?= $credentialsInvalid ? ' data-server-invalid="true" aria-invalid="true"' : '' ?>>
          <button type="button" class="toggle-pass" id="togglePass" aria-label="Mostrar contraseña"><i class="bi bi-eye"></i></button>
        </div>

        <div class="form-check mt-3">
          <input class="form-check-input" type="checkbox" id="remember">
          <label class="form-check-label small text-muted" for="remember">Mantener la sesión en este equipo</label>
        </div>

        <button type="submit" class="btn btn-brand btn-lg w-100 mt-4" id="btnLogin">
          <span class="btn-label">Ingresar al sistema <i class="bi bi-arrow-right ms-1"></i></span>
          <span class="spinner-border spinner-border-sm d-none"></span>
        </button>
      </form>

      <div id="loginFormatHelp" class="login-format-popover" popover>
        <div class="d-flex justify-content-between align-items-start gap-3">
          <div>
            <strong><i class="bi bi-shield-check me-1"></i>Formato del usuario</strong>
            <p class="mb-0 mt-2">Usa entre 3 y 40 letras sin acentos, números, punto, guion o guion bajo. También puedes iniciar con tu correo electrónico.</p>
          </div>
          <button type="button" class="login-popover-close" popovertarget="loginFormatHelp" popovertargetaction="hide" aria-label="Cerrar ayuda"><i class="bi bi-x-lg"></i></button>
        </div>
      </div>

      <div class="login-loading" id="loginLoading" role="status" aria-live="polite" aria-hidden="true">
        <span class="login-loader" aria-hidden="true"></span>
        <strong>Validando acceso...</strong>
        <span>Un momento, estamos preparando tu sesión.</span>
      </div>

      <div class="demo-box mt-4">
        <i class="bi bi-info-circle"></i>
        <span>Demo: <b>admin</b> / <b>Admin123*</b></span>
      </div>

      <p class="text-center text-muted small mt-4 mb-0">© <?= date('Y') ?> <?= e(empresa_nombre()) ?> · v<?= APP_VERSION ?></p>
    </div>
  </section>
</div>

<script>
document.body.classList.add('js-login-ready');

if ('IntersectionObserver' in window) {
  const loginRevealObserver = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.18 });

  document.querySelectorAll('[data-login-reveal]').forEach(function (element) {
    loginRevealObserver.observe(element);
  });
} else {
  document.querySelectorAll('[data-login-reveal]').forEach(function (element) {
    element.classList.add('is-visible');
  });
}

document.getElementById('togglePass').addEventListener('click', function () {
  var i = document.getElementById('password'), s = i.type === 'password';
  i.type = s ? 'text' : 'password';
  this.innerHTML = '<i class="bi ' + (s ? 'bi-eye-slash' : 'bi-eye') + '"></i>';
});

var loginForm = document.getElementById('loginForm');
var loginIdentifierPattern = /^(?:[A-Za-z0-9._\-]{3,40}|[A-Za-z0-9_%+\-]+(?:\.[A-Za-z0-9_%+\-]+)*@[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?(?:\.[A-Za-z0-9](?:[A-Za-z0-9\-]{0,61}[A-Za-z0-9])?)+)$/i;
var loginFields = [
  { input: document.getElementById('login'), wrapper: document.getElementById('login').closest('.input-ui'), isValid: function (value) { return value.length <= 120 && loginIdentifierPattern.test(value); } },
  { input: document.getElementById('password'), wrapper: document.getElementById('password').closest('.input-ui'), isValid: function (value) { return value.length > 0; } }
];

function updateLoginField(field, touched) {
  var valid = field.isValid(field.input.value);
  var serverError = field.input.getAttribute('data-server-invalid');
  var serverInvalid = serverError !== null;
  var invalid = serverInvalid || (!valid && touched);
  field.wrapper.classList.toggle('is-valid', valid && !serverInvalid);
  field.wrapper.classList.toggle('is-invalid', invalid);
  field.input.setAttribute('aria-invalid', invalid ? 'true' : 'false');
  if (field.input.id === 'login') {
    var hint = document.getElementById('loginHint');
    if (serverError === 'credentials') {
      hint.textContent = 'Usuario o contraseña incorrectos. Verifica los datos e inténtalo otra vez.';
    } else if (serverError === 'format' || (!valid && touched)) {
      hint.textContent = 'Formato no válido. Revisa los caracteres permitidos o usa un correo válido.';
    } else {
      hint.textContent = valid
        ? 'Formato válido.'
        : '3–40 letras, números, punto, guion o guion bajo; también puedes usar un correo válido.';
    }
  }
}

loginFields.forEach(function (field) {
  if (field.input.hasAttribute('data-server-invalid')) {
    field.wrapper.classList.add('is-invalid');
  }
  updateLoginField(field, field.input.hasAttribute('data-server-invalid') || field.input.value.length > 0);
  field.input.addEventListener('input', function () {
    field.input.removeAttribute('data-server-invalid');
    updateLoginField(field, true);
  });
  field.input.addEventListener('blur', function () {
    updateLoginField(field, field.input.value.length > 0 || field.input.hasAttribute('data-server-invalid'));
  });
});

loginForm.addEventListener('submit', function (event) {
  var valid = true;
  loginFields.forEach(function (field) {
    updateLoginField(field, true);
    if (!field.isValid(field.input.value)) valid = false;
  });

  if (!valid) {
    event.preventDefault();
    loginFields.find(function (field) { return !field.isValid(field.input.value); }).input.focus();
    return;
  }

  document.body.classList.add('is-login-submitting');
  document.getElementById('loginLoading').setAttribute('aria-hidden', 'false');
  var b = document.getElementById('btnLogin');
  b.querySelector('.btn-label').classList.add('d-none');
  b.querySelector('.spinner-border').classList.remove('d-none');
  b.disabled = true;
});

var loginHelp = document.getElementById('loginFormatHelp');
var loginHelpButton = document.querySelector('[popovertarget="loginFormatHelp"]');
if (typeof loginHelp.showPopover !== 'function') {
  loginHelp.hidden = true;
  loginHelpButton.addEventListener('click', function () {
    loginHelp.hidden = !loginHelp.hidden;
  });
  loginHelp.querySelector('[popovertargetaction="hide"]').addEventListener('click', function () {
    loginHelp.hidden = true;
  });
}
</script>
</body>
</html>
