<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier {{ $region->nom }} — Admin</title>
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
    .logout-btn { display: block; text-align: center; padding: 8px; background: rgba(239,51,64,0.1); color: #EF3340; border: 1px solid rgba(239,51,64,0.3); border-radius: 8px; cursor: pointer; width: 100%; font-size: 0.875rem; }
    .main { margin-left: 260px; flex: 1; padding: 32px; }
    .page-header { margin-bottom: 32px; display: flex; align-items: center; gap: 16px; }
    .page-header h1 { font-size: 1.5rem; font-weight: 700; }
    .back-btn { padding: 8px 16px; background: #1e293b; border: 1px solid #334155; border-radius: 8px; color: #94a3b8; text-decoration: none; font-size: 0.875rem; }
    .hero-img { width: 100%; height: 200px; object-fit: cover; border-radius: 12px; margin-bottom: 24px; }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-group { margin-bottom: 20px; }
    .form-group.full { grid-column: 1 / -1; }
    label { display: block; font-size: 0.8rem; font-weight: 500; color: #94a3b8; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.05em; }
    input, textarea, select { width: 100%; padding: 10px 14px; background: #0f172a; border: 1px solid #334155; border-radius: 8px; color: #e2e8f0; font-size: 0.9rem; outline: none; transition: border-color 0.2s; font-family: inherit; }
    input:focus, textarea:focus { border-color: #EF3340; }
    textarea { resize: vertical; min-height: 100px; }
    .section { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 24px; margin-bottom: 24px; }
    .section-title { font-size: 1rem; font-weight: 600; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid #334155; }
    .btn { padding: 12px 24px; border-radius: 8px; font-size: 0.9rem; font-weight: 600; cursor: pointer; border: none; }
    .btn-primary { background: #EF3340; color: white; }
    .btn-primary:hover { background: #c0392b; }
    .alert-success { background: rgba(0,150,57,0.1); border: 1px solid rgba(0,150,57,0.3); border-radius: 8px; padding: 12px 16px; color: #009639; margin-bottom: 20px; font-size: 0.875rem; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { text-align: left; font-size: 0.75rem; color: #64748b; padding: 8px 10px; border-bottom: 1px solid #334155; }
    .data-table td { padding: 10px; border-bottom: 1px solid #0f172a; font-size: 0.85rem; }
    .data-table tr:last-child td { border-bottom: none; }
    .badge { display: inline-block; padding: 2px 8px; border-radius: 20px; font-size: 0.7rem; }
    .badge-red { background: rgba(239,51,64,0.15); color: #EF3340; }
    .badge-green { background: rgba(0,150,57,0.15); color: #009639; }
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
    <a href="/admin/regions" class="back-btn">← Retour</a>
    <h1>✏️ Modifier — {{ $region->nom }}</h1>
  </div>

  @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
  @endif

  <img src="/{{ $region->image_hero }}" alt="{{ $region->nom }}" class="hero-img"
       onerror="this.style.display='none'">

  <!-- Formulaire modification -->
  <div class="section">
    <div class="section-title">📝 Informations générales</div>
    <form method="POST" action="/admin/regions/{{ $region->id }}">
      @csrf
      @method('PUT')
      <div class="form-grid">
        <div class="form-group">
          <label>Nom</label>
          <input type="text" name="nom" value="{{ $region->nom }}" required>
        </div>
        <div class="form-group">
          <label>Chef-lieu</label>
          <input type="text" name="chef_lieu" value="{{ $region->chef_lieu }}" required>
        </div>
        <div class="form-group">
          <label>Zone</label>
          <input type="text" name="zone" value="{{ $region->zone }}">
        </div>
        <div class="form-group">
          <label>Slogan</label>
          <input type="text" name="slogan" value="{{ $region->slogan }}">
        </div>
        <div class="form-group">
          <label>Superficie (km²)</label>
          <input type="number" name="superficie" value="{{ $region->superficie }}">
        </div>
        <div class="form-group">
          <label>Population</label>
          <input type="number" name="population" value="{{ $region->population }}">
        </div>
        <div class="form-group">
          <label>Climat</label>
          <input type="text" name="climat" value="{{ $region->climat }}">
        </div>
        <div class="form-group">
          <label>Végétation</label>
          <input type="text" name="vegetation" value="{{ $region->vegetation }}">
        </div>
        <div class="form-group full">
          <label>Description</label>
          <textarea name="description">{{ $region->description }}</textarea>
        </div>
        <div class="form-group full">
          <label>Histoire</label>
          <textarea name="histoire" style="min-height:120px">{{ $region->histoire }}</textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">💾 Enregistrer les modifications</button>
    </form>
  </div>

  <!-- Provinces -->
  <div class="section">
    <div class="section-title">🏛️ Provinces ({{ $region->provinces->count() }})</div>
    <table class="data-table">
      <thead><tr><th>Nom</th><th>Chef-lieu</th><th>Superficie</th><th>Population</th></tr></thead>
      <tbody>
        @foreach($region->provinces as $p)
        <tr>
          <td><strong>{{ $p->nom }}</strong></td>
          <td>{{ $p->chef_lieu }}</td>
          <td>{{ number_format($p->superficie, 0, ',', ' ') }} km²</td>
          <td>{{ number_format($p->population, 0, ',', ' ') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Sites touristiques -->
  <div class="section">
    <div class="section-title">🏖️ Sites touristiques ({{ $region->sites->count() }})</div>
    <table class="data-table">
      <thead><tr><th>Nom</th><th>Importance</th><th>Description</th></tr></thead>
      <tbody>
        @foreach($region->sites as $s)
        <tr>
          <td><strong>{{ $s->nom }}</strong></td>
          <td><span class="badge badge-red">{{ $s->importance }}</span></td>
          <td style="color:#94a3b8">{{ Str::limit($s->description, 80) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Festivals -->
  <div class="section">
    <div class="section-title">🎭 Festivals ({{ $region->festivals->count() }})</div>
    <table class="data-table">
      <thead><tr><th>Nom</th><th>Type</th><th>Période</th></tr></thead>
      <tbody>
        @foreach($region->festivals as $f)
        <tr>
          <td><strong>{{ $f->nom }}</strong></td>
          <td><span class="badge badge-green">{{ $f->type }}</span></td>
          <td style="color:#94a3b8">{{ $f->periode }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</main>
</body>
</html>
