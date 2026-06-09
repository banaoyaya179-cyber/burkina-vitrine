<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Admin Burkina Faso</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Segoe UI', sans-serif; background: #0f172a; color: #e2e8f0; min-height: 100vh; display: flex; }
    /* SIDEBAR */
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
    /* MAIN */
    .main { margin-left: 260px; flex: 1; padding: 32px; }
    .page-header { margin-bottom: 32px; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; }
    .page-header p { color: #64748b; margin-top: 4px; }
    /* STATS GRID */
    .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 32px; }
    .stat-card { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 20px; }
    .stat-card-icon { font-size: 2rem; margin-bottom: 12px; }
    .stat-card-value { font-size: 2rem; font-weight: 800; color: #EF3340; }
    .stat-card-label { font-size: 0.875rem; color: #64748b; margin-top: 4px; }
    .stat-card.vert .stat-card-value { color: #009639; }
    .stat-card.jaune .stat-card-value { color: #FCD116; }
    /* TABLES */
    .section { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 24px; margin-bottom: 24px; }
    .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
    .section-title { font-size: 1rem; font-weight: 600; }
    .btn-sm { padding: 6px 14px; border-radius: 6px; font-size: 0.8rem; font-weight: 500; text-decoration: none; cursor: pointer; border: none; }
    .btn-primary { background: #EF3340; color: white; }
    .btn-outline { background: transparent; color: #94a3b8; border: 1px solid #334155; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; font-size: 0.75rem; font-weight: 500; color: #64748b; padding: 8px 12px; border-bottom: 1px solid #334155; text-transform: uppercase; letter-spacing: 0.05em; }
    td { padding: 12px; border-bottom: 1px solid #1e293b; font-size: 0.875rem; }
    tr:last-child td { border-bottom: none; }
    .badge { display: inline-block; padding: 2px 8px; border-radius: 20px; font-size: 0.75rem; font-weight: 500; }
    .badge-red { background: rgba(239,51,64,0.15); color: #EF3340; }
    .badge-green { background: rgba(0,150,57,0.15); color: #009639; }
    .alert-success { background: rgba(0,150,57,0.1); border: 1px solid rgba(0,150,57,0.3); border-radius: 8px; padding: 12px 16px; color: #009639; margin-bottom: 20px; font-size: 0.875rem; }
  </style>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-logo">
    <h2>🇧🇫 Burkina Admin</h2>
    <p>Espace d'administration</p>
  </div>
  <nav class="sidebar-nav">
    <a href="/admin" class="nav-item active"><span>📊</span> Dashboard</a>
    <a href="/admin/regions" class="nav-item"><span>🗺️</span> Régions</a>
    <a href="/admin/messages" class="nav-item"><span>✉️</span> Messages
      @if($stats['non_lus'] > 0)
        <span class="badge badge-red" style="margin-left:auto">{{ $stats['non_lus'] }}</span>
      @endif
    </a>
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
    <h1>Dashboard</h1>
    <p>Vue d'ensemble du site Burkina Faso Vitrine</p>
  </div>

  @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
  @endif

  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-card-icon">🗺️</div>
      <div class="stat-card-value">{{ $stats['regions'] }}</div>
      <div class="stat-card-label">Régions</div>
    </div>
    <div class="stat-card vert">
      <div class="stat-card-icon">🏛️</div>
      <div class="stat-card-value">{{ $stats['provinces'] }}</div>
      <div class="stat-card-label">Provinces</div>
    </div>
    <div class="stat-card jaune">
      <div class="stat-card-icon">🏖️</div>
      <div class="stat-card-value">{{ $stats['sites'] }}</div>
      <div class="stat-card-label">Sites touristiques</div>
    </div>
    <div class="stat-card">
      <div class="stat-card-icon">🎭</div>
      <div class="stat-card-value">{{ $stats['festivals'] }}</div>
      <div class="stat-card-label">Festivals</div>
    </div>
    <div class="stat-card vert">
      <div class="stat-card-icon">✉️</div>
      <div class="stat-card-value">{{ $stats['messages'] }}</div>
      <div class="stat-card-label">Messages reçus</div>
    </div>
    <div class="stat-card jaune">
      <div class="stat-card-icon">🔔</div>
      <div class="stat-card-value">{{ $stats['non_lus'] }}</div>
      <div class="stat-card-label">Messages non lus</div>
    </div>
  </div>

  <!-- Derniers messages -->
  <div class="section">
    <div class="section-header">
      <span class="section-title">✉️ Derniers messages</span>
      <a href="/admin/messages" class="btn-sm btn-outline">Voir tous</a>
    </div>
    @if($derniers_messages->count())
    <table>
      <thead>
        <tr><th>Nom</th><th>Email</th><th>Sujet</th><th>Date</th><th>Statut</th></tr>
      </thead>
      <tbody>
        @foreach($derniers_messages as $msg)
        <tr>
          <td>{{ $msg->prenom }} {{ $msg->nom }}</td>
          <td style="color:#64748b">{{ $msg->email }}</td>
          <td>{{ $msg->sujet ?? '—' }}</td>
          <td style="color:#64748b">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
          <td>
            @if($msg->lu)
              <span class="badge badge-green">Lu</span>
            @else
              <span class="badge badge-red">Non lu</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <p style="color:#64748b;font-size:0.875rem">Aucun message reçu.</p>
    @endif
  </div>

  <!-- Liste régions -->
  <div class="section">
    <div class="section-header">
      <span class="section-title">🗺️ Régions</span>
      <a href="/admin/regions" class="btn-sm btn-outline">Gérer</a>
    </div>
    <table>
      <thead>
        <tr><th>Nom</th><th>Chef-lieu</th><th>Zone</th><th>Population</th><th>Action</th></tr>
      </thead>
      <tbody>
        @foreach($regions as $region)
        <tr>
          <td><strong>{{ $region->nom }}</strong></td>
          <td style="color:#64748b">{{ $region->chef_lieu }}</td>
          <td>{{ $region->zone }}</td>
          <td>{{ number_format($region->population, 0, ',', ' ') }}</td>
          <td><a href="/admin/regions/{{ $region->id }}/edit" class="btn-sm btn-primary">Modifier</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>

</body>
</html>
