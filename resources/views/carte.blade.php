<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carte Administrative — Burkina Faso</title>
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/carte.css">
  <style>
    /* ── Carte photo ── */
    .carte-photo-wrapper {
      background: white;
      border-radius: var(--radius-lg);
      border: 1px solid var(--border);
      overflow: hidden;
      box-shadow: var(--shadow-lg);
    }
    .carte-photo-wrapper img {
      width: 100%;
      height: auto;
      display: block;
    }
    .carte-source {
      padding: var(--sp-3) var(--sp-4);
      background: var(--bg-alt);
      font-size: var(--xs);
      color: var(--text-muted);
      border-top: 1px solid var(--border);
    }
    /* ── Panel régions ── */
    .region-details-section { padding: var(--sp-8) 0 var(--sp-16); background: var(--bg-alt); }
    .regions-detail-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: var(--sp-6);
    }
    @media (min-width: 768px) { .regions-detail-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1280px) { .regions-detail-grid { grid-template-columns: repeat(3, 1fr); } }
    .region-detail-card {
      background: var(--card-bg);
      border-radius: var(--radius-lg);
      border: 1px solid var(--border);
      padding: var(--sp-5);
      transition: all var(--transition);
    }
    .region-detail-card:hover { box-shadow: var(--shadow-lg); border-color: var(--rouge); }
    .region-detail-card h3 {
      font-size: var(--lg); color: var(--rouge);
      margin-bottom: var(--sp-1);
      display: flex; align-items: center; gap: var(--sp-2);
    }
    .region-detail-card .chef { font-size: var(--sm); color: var(--text-muted); margin-bottom: var(--sp-3); }
    .detail-section { margin-bottom: var(--sp-3); }
    .detail-section h4 { font-size: var(--xs); text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); margin-bottom: var(--sp-2); }
    .detail-section p { font-size: var(--sm); color: var(--text); line-height: 1.6; margin: 0; }
    .tags-row { display: flex; flex-wrap: wrap; gap: 6px; margin-top: var(--sp-2); }
    .tag-sm {
      padding: 2px 10px; border-radius: var(--radius-full); font-size: var(--xs);
      background: var(--bg-alt); border: 1px solid var(--border); color: var(--text-muted);
    }
    .voir-btn {
      display: inline-flex; align-items: center; gap: 6px;
      margin-top: var(--sp-3); padding: var(--sp-2) var(--sp-4);
      background: var(--rouge); color: white; border-radius: var(--radius);
      font-size: var(--sm); font-weight: 600; text-decoration: none;
      transition: background var(--transition-fast);
    }
    .voir-btn:hover { background: var(--rouge-hover); }
  </style>
</head>
<body>

<div class="nav-overlay" id="nav-overlay"></div>
<header id="header" class="scrolled">
  <div class="container">
    <a href="/" class="logo">
      <div class="logo-flag"><div class="flag-top"></div><div class="flag-bot"></div><div class="flag-star">★</div></div>
      <span>Burkina <span class="accent">Faso</span></span>
    </a>
    <nav class="nav" id="nav">
      <a href="/" class="nav-link">Accueil</a>
      <a href="/regions" class="nav-link">Régions</a>
      <a href="/provinces" class="nav-link">Provinces</a>
      <a href="/carte" class="nav-link active">Carte</a>
      <a href="/comparer" class="nav-link">Comparer</a>
      <a href="/reforme" class="nav-link">Réforme</a>
      <a href="/galerie" class="nav-link">Galerie</a>
      <a href="/contact" class="nav-link">Contact</a>
    </nav>
    <div class="header-actions">
      <button class="theme-toggle" id="theme-toggle" aria-label="Changer le thème">
        <span class="theme-icon-light">☀️</span><span class="theme-icon-dark">🌙</span>
      </button>
      <button class="search-trigger" id="search-trigger" aria-label="Recherche" title="Ctrl+K">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
      </button>
      <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>

<div class="search-palette" id="search-palette">
  <div class="search-palette-inner">
    <div class="search-palette-input-wrapper">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
      <input type="text" id="search-palette-input" placeholder="Rechercher une région, province, site..." autocomplete="off">
      <kbd class="search-palette-kbd">ESC</kbd>
    </div>
    <div class="search-palette-results" id="search-palette-results"></div>
  </div>
</div>

<div class="page-wrapper page-fade-in">

  <!-- HERO -->
  <div class="page-hero page-hero-carte">
    <div class="container">
      <h1>🗺️ Carte Administrative</h1>
      <p>Carte officielle du Burkina Faso — 17 régions, 47 provinces et 350 départements</p>
      <div class="page-hero-stats">
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">17</span>
          <span class="page-hero-stat-label">Régions administratives</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">47</span>
          <span class="page-hero-stat-label">Provinces</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">350</span>
          <span class="page-hero-stat-label">Départements</span>
        </div>
      </div>
    </div>
  </div>

  <!-- CARTE PHOTO -->
  <section style="padding: var(--sp-8) 0;">
    <div class="container">
      <div class="carte-photo-wrapper reveal">
        <img src="/images/carte/carte-burkina.jpg"
             alt="Carte administrative officielle du Burkina Faso — 17 régions, 47 provinces, 350 départements"
             loading="eager">
        <div class="carte-source">
          📌 Source : Institut Géographique du Burkina (IGB) — BNDT2012/MATM — Juillet 2025 &nbsp;|&nbsp;
          Échelle : 1/800 000
        </div>
      </div>
    </div>
  </section>

  <!-- DÉTAILS PAR RÉGION -->
  <section class="region-details-section">
    <div class="container">
      <div style="text-align:center;margin-bottom:var(--sp-8)">
        <h2 style="font-size:var(--3xl);margin-bottom:var(--sp-3)">🏛️ Détails des 17 régions</h2>
        <p style="color:var(--text-muted)">Provinces, villes principales, établissements et potentialités de chaque région</p>
      </div>

      <div class="regions-detail-grid" id="regions-detail-grid">
        <!-- Généré par carte.js -->
      </div>
    </div>
  </section>

</div>

<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo" style="margin-bottom:var(--sp-2)">
          <div class="logo-flag"><div class="flag-top"></div><div class="flag-bot"></div><div class="flag-star">★</div></div>
          <span>Burkina <span class="accent">Faso</span></span>
        </a>
        <p>Vitrine web des 17 régions administratives du Burkina Faso. Projet 2025-2026.</p>
      </div>
      <div class="footer-col">
        <h4>Navigation</h4>
        <ul>
          <li><a href="/">Accueil</a></li>
          <li><a href="/regions">Régions</a></li>
          <li><a href="/provinces">Provinces</a></li>
          <li><a href="/carte">Carte</a></li>
          <li><a href="/comparer">Comparer</a></li>
          <li><a href="/reforme">La réforme</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="/contact">Formulaire</a></li>
          <li><a href="/a-propos">À propos</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 Burkina Faso — Projet Web Statique</span>
      <div class="footer-flag-strip">
        <span style="background:var(--rouge)"></span>
        <span style="background:var(--vert)"></span>
        <span style="background:var(--jaune)"></span>
      </div>
      <span>Fait avec ❤️ au Burkina Faso</span>
    </div>
  </div>
</footer>

<script src="/js/utils.js"></script>
<script src="/js/app.js"></script>
<script src="/js/carte.js"></script>
</body>
</html>
