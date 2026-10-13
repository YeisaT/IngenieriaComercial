<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso Administrativo — FCEE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Inter:wght@400;500&display=swap" rel="stylesheet">
  <style>
    :root { --g9:#0d2e14; --g8:#1a5c28; --g7:#2D9F3C; --g4:#7dd98a; --g0:#edf8ef; }
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(140deg, var(--g9) 0%, var(--g8) 100%);
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      padding: 1rem;
    }
    .login-card {
      background: #fff;
      border-radius: 16px;
      padding: 2.5rem 2.25rem;
      width: 100%; max-width: 400px;
      box-shadow: 0 24px 64px rgba(0,0,0,.25);
    }
    .login-logo { width: 52px; height: 52px; border-radius: 12px; object-fit: contain; }
    .login-title { font-family: 'Poppins', sans-serif; font-size: 1.35rem; font-weight: 700; color: #1a1a1a; margin: 1rem 0 .25rem; }
    .login-sub   { font-size: .82rem; color: #9a9a9a; margin-bottom: 1.75rem; }
    .form-label  { font-size: .78rem; font-weight: 600; color: #2e2e2e; margin-bottom: .4rem; display: block; }
    .form-control {
      width: 100%; border: 1.5px solid #e8ebe8; border-radius: 8px;
      padding: .65rem .9rem; font-size: .88rem; font-family: 'Inter', sans-serif;
      color: #1a1a1a; outline: none; transition: border-color .2s;
    }
    .form-control:focus { border-color: var(--g7); box-shadow: 0 0 0 3px rgba(45,159,60,.1); }
    .form-control.is-invalid { border-color: #dc2626; }
    .invalid-feedback { font-size: .72rem; color: #dc2626; margin-top: .3rem; display: block; }
    .btn-login {
      width: 100%; background: var(--g7); color: #fff; border: none;
      border-radius: 8px; padding: .75rem; font-size: .9rem; font-weight: 700;
      font-family: 'Poppins', sans-serif; cursor: pointer; transition: background .2s;
      margin-top: 1.25rem;
    }
    .btn-login:hover { background: var(--g8); }
    .login-footer { text-align: center; margin-top: 1.5rem; font-size: .75rem; color: #9a9a9a; }
    .input-group-icon { position: relative; }
    .input-group-icon i { position: absolute; left: .9rem; top: 50%; transform: translateY(-50%); color: #9a9a9a; font-size: .85rem; }
    .input-group-icon .form-control { padding-left: 2.4rem; }
    .remember-row { display: flex; align-items: center; gap: .5rem; margin-top: .75rem; }
    .remember-row input { accent-color: var(--g7); width: 15px; height: 15px; cursor: pointer; }
    .remember-row label { font-size: .78rem; color: #5a5a5a; cursor: pointer; }
  </style>
</head>
<body>
  <div class="login-card">
    <img src="{{ asset('img/Logo_Comercial.png') }}" alt="Logo" class="login-logo">
    <h1 class="login-title">Acceso Administrativo</h1>
    <p class="login-sub">Ingeniería Comercial · FCEE · U.A.G.R.M.</p>

    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <div class="input-group-icon">
          <i class="fa-solid fa-envelope"></i>
          <input type="email" id="email" name="email"
                 class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                 value="{{ old('email') }}" placeholder="admin@ingco.edu.bo"
                 autocomplete="email" autofocus required>
        </div>
        @error('email')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-1">
        <label for="password" class="form-label">Contraseña</label>
        <div class="input-group-icon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" id="password" name="password"
                 class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                 placeholder="••••••••" autocomplete="current-password" required>
        </div>
        @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <div class="remember-row">
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Mantener sesión iniciada</label>
      </div>

      <button type="submit" class="btn-login">
        <i class="fa-solid fa-right-to-bracket me-2"></i>Iniciar sesión
      </button>
    </form>

    <div class="login-footer">
      Panel de administración restringido.<br>Solo personal autorizado.
    </div>
  </div>
</body>
</html>
