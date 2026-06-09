<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin — Connexion</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #e2e8f0; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    .login-card { background: #1e293b; border: 1px solid #334155; border-radius: 16px; padding: 40px; width: 100%; max-width: 400px; box-shadow: 0 25px 50px rgba(0,0,0,0.5); }
    .login-logo { text-align: center; margin-bottom: 32px; }
    .login-logo h1 { font-size: 1.5rem; font-weight: 700; color: #EF3340; }
    .login-logo p { font-size: 0.875rem; color: #94a3b8; margin-top: 4px; }
    .flag { font-size: 2rem; margin-bottom: 8px; }
    .form-group { margin-bottom: 20px; }
    label { display: block; font-size: 0.875rem; font-weight: 500; color: #94a3b8; margin-bottom: 6px; }
    input { width: 100%; padding: 12px 16px; background: #0f172a; border: 1px solid #334155; border-radius: 8px; color: #e2e8f0; font-size: 0.9rem; outline: none; transition: border-color 0.2s; }
    input:focus { border-color: #EF3340; }
    .btn { width: 100%; padding: 12px; background: #EF3340; color: white; border: none; border-radius: 8px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s; }
    .btn:hover { background: #c0392b; }
    .error { background: rgba(239,51,64,0.1); border: 1px solid rgba(239,51,64,0.3); border-radius: 8px; padding: 12px; font-size: 0.875rem; color: #EF3340; margin-bottom: 20px; }
    .remember { display: flex; align-items: center; gap: 8px; font-size: 0.875rem; color: #94a3b8; margin-bottom: 20px; }
    .remember input { width: auto; }
    .back { text-align: center; margin-top: 20px; }
    .back a { color: #94a3b8; font-size: 0.875rem; text-decoration: none; }
    .back a:hover { color: #e2e8f0; }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-logo">
      <div class="flag">🇧🇫</div>
      <h1>Burkina Faso Admin</h1>
      <p>Espace d'administration</p>
    </div>

    @if($errors->any())
      <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/admin/login">
      @csrf
      <div class="form-group">
        <label>Adresse e-mail</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@burkina.bf">
      </div>
      <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="password" required placeholder="••••••••">
      </div>
      <div class="remember">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember" style="margin:0">Se souvenir de moi</label>
      </div>
      <button type="submit" class="btn">Se connecter</button>
    </form>

    <div class="back">
      <a href="/">← Retour au site</a>
    </div>
  </div>
</body>
</html>
