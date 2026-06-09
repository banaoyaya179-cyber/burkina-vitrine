<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messages — Admin</title>
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
    .page-header { margin-bottom: 32px; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; }
    .page-header p { color: #64748b; margin-top: 4px; }
    .section { background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 24px; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; font-size: 0.75rem; font-weight: 500; color: #64748b; padding: 10px 12px; border-bottom: 1px solid #334155; text-transform: uppercase; }
    td { padding: 14px 12px; border-bottom: 1px solid #0f172a; font-size: 0.875rem; vertical-align: top; }
    tr:last-child td { border-bottom: none; }
    tr.non-lu { background: rgba(239,51,64,0.04); }
    .badge { display: inline-block; padding: 2px 8px; border-radius: 20px; font-size: 0.75rem; font-weight: 500; }
    .badge-red { background: rgba(239,51,64,0.15); color: #EF3340; }
    .badge-green { background: rgba(0,150,57,0.15); color: #009639; }
    .btn-sm { padding: 5px 12px; border-radius: 6px; font-size: 0.75rem; font-weight: 500; cursor: pointer; border: none; display: inline-block; text-decoration: none; }
    .btn-primary { background: #EF3340; color: white; }
    .btn-outline { background: transparent; color: #94a3b8; border: 1px solid #334155; }
    .btn-danger { background: rgba(239,51,64,0.1); color: #EF3340; border: 1px solid rgba(239,51,64,0.3); }
    .actions { display: flex; gap: 6px; }
    .msg-preview { color: #64748b; font-size: 0.8rem; margin-top: 4px; }
    .alert-success { background: rgba(0,150,57,0.1); border: 1px solid rgba(0,150,57,0.3); border-radius: 8px; padding: 12px 16px; color: #009639; margin-bottom: 20px; font-size: 0.875rem; }
    .pagination { margin-top: 20px; display: flex; gap: 8px; }
    .pagination a, .pagination span { padding: 6px 12px; border-radius: 6px; font-size: 0.875rem; border: 1px solid #334155; color: #94a3b8; text-decoration: none; }
    .pagination .active { background: #EF3340; color: white; border-color: #EF3340; }
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
    <a href="/admin/regions" class="nav-item"><span>🗺️</span> Régions</a>
    <a href="/admin/messages" class="nav-item active"><span>✉️</span> Messages</a>
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
    <h1>✉️ Messages reçus</h1>
    <p>{{ $messages->total() }} messages au total</p>
  </div>

  @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
  @endif

  <div class="section">
    @if($messages->count())
    <table>
      <thead>
        <tr><th>Expéditeur</th><th>Sujet</th><th>Message</th><th>Date</th><th>Statut</th><th>Actions</th></tr>
      </thead>
      <tbody>
        @foreach($messages as $msg)
        <tr class="{{ $msg->lu ? '' : 'non-lu' }}">
          <td>
            <strong>{{ $msg->prenom }} {{ $msg->nom }}</strong>
            <div class="msg-preview">{{ $msg->email }}</div>
          </td>
          <td>{{ $msg->sujet ?? '—' }}</td>
          <td>
            <div>{{ Str::limit($msg->message, 80) }}</div>
          </td>
          <td style="color:#64748b;white-space:nowrap">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
          <td>
            @if($msg->lu)
              <span class="badge badge-green">Lu</span>
            @else
              <span class="badge badge-red">Non lu</span>
            @endif
          </td>
          <td>
            <div class="actions">
              @if(!$msg->lu)
              <form method="POST" action="/admin/messages/{{ $msg->id }}/lu">
                @csrf @method('PUT')
                <button type="submit" class="btn-sm btn-outline">✓ Lu</button>
              </form>
              @endif
              <form method="POST" action="/admin/messages/{{ $msg->id }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn-sm btn-danger"
                        onclick="return confirm('Supprimer ce message ?')">🗑</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="pagination">
      {{ $messages->links() }}
    </div>
    @else
      <p style="color:#64748b;font-size:0.875rem;text-align:center;padding:40px">Aucun message reçu.</p>
    @endif
  </div>
</main>
</body>
</html>
