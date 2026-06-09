<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Régions — Admin</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #e2e8f0; min-height: 100vh; display: flex; }
    .sidebar { width: 260px; background: #1e293b; border-right: 1px solid #334155; padding: 24px 0; display: flex; flex-direction: column; position: fixed; height: 100vh; }
    .sidebar-logo { padding: 0 24px 24px; border-bottom: 1px solid #334155; }
    .sidebar-logo h2 { font-size: 1rem; font-weight: 700; color: #EF3340; }
    .sidebar-logo p { font-size: 0.75rem; color: #64748b; margin-top: 2px; }
    .sidebar-nav { padding: 16px 0; flex: 1; }
    .nav-item { display: flex; align-items: center; gap: 10px; padding: 12px 24px; color: #94a3b8; text-decoration: none; font-size: 0.9rem; transition: all 0.2s; }
    .nav-item:hover, .nav-item.active { background: rgba(239,51,64,0.1); color: #EF3340; }
    .nav-item span { font-size: 1.1rem; }
    .sidebar-footer { padding: 16px 24px; border-top: 1px solid #334155; }
    .user-info { font-size: 0.8rem; color: #64748b; margin-bottom: 12px; }
    .logout-btn { display: block; text-align: center; padding: 8px; background: rgba(239,51,64,0.1); color: #EF3340; border: 1px solid rgba(239,51,64,0.3); border-radius: 8px; text-decoration: none; font-size: 0.875rem; cursor: pointer; width: 100%; }
    .main { margin-left: 260px; flex: 1; padding: 32px; }
    .page-header { margin-bottom: 32px; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; }
    .page-header p { color: #64748b; margin-top: 4px; }
    .section { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 24px; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; font-size: 0.75rem; font-weight: 500; color: #64748b; padding: 10px 12px; border-bottom: 1px solid #334155; text-transform: uppercase; }
    td { padding: 14px 12px; border-bottom: 1px solid #0f172a; font-size: 0.875rem; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: rgba(255,255,255,0.02); }
    .btn-sm { padding: 6px 14px; border-radius: 6px; font-size: 0.8rem; font-weight: 500; text-decoration: none; display: inline-block; }
    .btn-primary { background: #EF3340; color: white; }
    .region-img { width: 48px; height: 36px; object-fit: cover; border-radius: 4px; }
    .zone-badge { display: inline-block; padding: 2px 8px; border-radius: 20px; font-size: 0.7rem; background: rgba(252,209,22,0.15); color: #FCD116; }
  </style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">
    <h2>🇧🇫 Burkina Admin</h2>
    <p>Espace d'administration</p>
  </div>
  <nav class="sidebar-nav">
    <a href="/admin" class="nav-item"><span>📊</span> Dashboard</a>
    <a href="/admin/regions" class="nav-item active"><span>🗺️</span> Régions</a>
    <a href="/admin/messages" class="nav-item"><span>✉️</span> Messages</a>
    <a href="/" class="nav-item" target="_blank"><span>🌍</span> Voir le site</a>
  </nav>
  <div class="sidebar-footer">
    <div class="user-info">Connecté : {{ Auth::user()->name }}</div>
    <form method="POST" action="/admin/logout">
      @csrf
      <button type="submit" class="logout-btn">Se déconnecter</button>
    </form>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <h1>🗺️ Gestion des régions</h1>
    <p>{{ $regions->count() }} régions enregistrées</p>
  </div>

  <div class="section">
    <table>
      <thead>
        <tr>
          <th>Image</th><th>Nom</th><th>Chef-lieu</th><th>Zone</th>
          <th>Population</th><th>Superficie</th><th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($regions as $region)
        <tr>
          <td><img src="/{{ $region->image_card }}" alt="{{ $region->nom }}" class="region-img" onerror="this.style.display='none'"></td>
          <td><strong>{{ $region->nom }}</strong><br><small style="color:#64748b">{{ $region->slug }}</small></td>
          <td>{{ $region->chef_lieu }}</td>
          <td><span class="zone-badge">{{ $region->zone }}</span></td>
          <td>{{ number_format($region->population, 0, ',', ' ') }}</td>
          <td>{{ number_format($region->superficie, 0, ',', ' ') }} km²</td>
          <td><a href="/admin/regions/{{ $region->id }}/edit" class="btn-sm btn-primary">✏️ Modifier</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>
</body>
</html>
