<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Fiche détaillée d'une province du Burkina Faso. Découvrez ses sites, spécialités et sa région parente.">
  <title>Province — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/provinces.css">
</head>
<body>

<div class="nav-overlay" id="nav-overlay"></div>

<header id="header" class="scrolled">
  <div class="container">
    <a href="/" class="logo">
      <div class="logo-flag">
        <div class="flag-top"></div>
        <div class="flag-bot"></div>
        <div class="flag-star">★</div>
      </div>
      <span>Burkina <span class="accent">Faso</span></span>
    </a>
    <nav class="nav" id="nav">
      <a href="/" class="nav-link">Accueil</a>
      <a href="/regions" class="nav-link">Régions</a>
      <a href="/provinces" class="nav-link active">Provinces</a>
      <a href="/carte" class="nav-link">Carte</a>
      <a href="/comparer" class="nav-link">Comparer</a>
      <a href="/reforme" class="nav-link">Réforme</a>
      <a href="/galerie" class="nav-link">Galerie</a>
      <a href="/contact" class="nav-link">Contact</a>
    </nav>
    <div class="header-actions">
      <button class="theme-toggle" id="theme-toggle" aria-label="Changer le thème">
        <span class="theme-icon-light">☀️</span>
        <span class="theme-icon-dark">🌙</span>
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

  <!-- ── HERO PROVINCE ── -->
  <section class="province-hero">
    <div class="province-hero-bg" id="province-hero-bg"></div>
    <div class="province-hero-overlay"></div>
    <div class="province-hero-content">
      <div class="container">
        <nav class="province-breadcrumb">
          <a href="/">Accueil</a>
          <span>›</span>
          <a href="/provinces">Provinces</a>
          <span>›</span>
          <span id="breadcrumb-nom">...</span>
        </nav>
        <div class="province-hero-meta">
          <span class="badge badge-vert" id="province-region-badge">...</span>
          <a href="#" class="badge badge-rouge" id="province-region-link">...</a>
        </div>
        <h1 id="province-nom">Chargement...</h1>
        <p class="province-chef-lieu" id="province-chef-lieu"></p>
        <div class="province-hero-actions">
          <button class="btn btn-ghost btn-sm" id="btn-share">
            <span>📤</span> Partager
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CONTENU PRINCIPAL ── -->
  <section class="province-content">
    <div class="container">
      <div class="province-layout">

        <!-- COLONNE PRINCIPALE -->
        <main class="province-main">

          <!-- 📝 DESCRIPTION -->
          <div class="section-block reveal">
            <h2>📝 Présentation</h2>
            <p id="province-description" class="province-description"></p>
          </div>

          <!-- 📊 STATS -->
          <div class="section-block reveal">
            <h2>📊 En chiffres</h2>
            <div class="province-stats-grid">
              <div class="province-stat-card">
                <span class="province-stat-icon">👥</span>
                <span class="province-stat-value" id="stat-population">—</span>
                <span class="province-stat-label">Habitants</span>
              </div>
              <div class="province-stat-card">
                <span class="province-stat-icon">📐</span>
                <span class="province-stat-value" id="stat-superficie">—</span>
                <span class="province-stat-label">km²</span>
              </div>
              <div class="province-stat-card">
                <span class="province-stat-icon">📊</span>
                <span class="province-stat-value" id="stat-densite">—</span>
                <span class="province-stat-label">hab/km²</span>
              </div>
            </div>
          </div>

          <!-- 🗣️ LANGUES & ETHNIES -->
          <div class="section-block reveal" id="section-langues">
            <h2>🗣️ Langues & Ethnies</h2>
            <div class="langues-ethnies-grid">
              <div>
                <h4>Langues parlées</h4>
                <div class="tag-list" id="province-langues"></div>
              </div>
              <div>
                <h4>Groupes ethniques</h4>
                <div class="tag-list" id="province-populations"></div>
              </div>
            </div>
          </div>

          <!-- 🏖️ SITES LOCAUX -->
          <div class="section-block reveal" id="section-sites">
            <h2>🏖️ Sites & Points d'intérêt</h2>
            <div class="sites-grid" id="province-sites"></div>
          </div>

          <!-- 🌾 SPÉCIALITÉS -->
          <div class="section-block reveal" id="section-specialites">
            <h2>🌾 Spécialités économiques</h2>
            <div class="specialites-grid" id="province-specialites"></div>
          </div>

          <!-- 📸 GALERIE -->
          <div class="section-block reveal" id="section-galerie">
            <h2>📸 Galerie</h2>
            <div class="galerie-grid" id="province-galerie"></div>
          </div>

        </main>

        <!-- SIDEBAR -->
        <aside class="province-sidebar">

          <!-- 🗺️ RÉGION PARENT -->
          <div class="info-card region-parent-card">
            <h3><span>🗺️</span> Région</h3>
            <div class="region-parent-info" id="region-parent-info">
              <img src="" alt="" id="region-parent-img" loading="lazy">
              <div>
                <h4 id="region-parent-nom">...</h4>
                <p id="region-parent-chef">...</p>
              </div>
            </div>
            <a href="#" class="btn btn-primary btn-sm" style="width:100%;margin-top:var(--sp-2)" id="region-parent-link">
              Explorer la région →
            </a>
          </div>

          <!-- 📤 PARTAGE -->
          <div class="info-card share-card">
            <h3><span>📤</span> Partager</h3>
            <div class="share-buttons">
              <button class="share-btn" data-network="whatsapp" title="WhatsApp"><span>📱</span></button>
              <button class="share-btn" data-network="facebook" title="Facebook"><span>📘</span></button>
              <button class="share-btn" data-network="twitter" title="Twitter"><span>🐦</span></button>
              <button class="share-btn" data-network="copy" title="Copier le lien"><span>📋</span></button>
            </div>
          </div>

          <!-- 🔗 NAVIGATION -->
          <div class="info-card nav-card">
            <h3><span>🔗</span> Navigation</h3>
            <a href="/provinces" class="btn btn-ghost" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>←</span> Toutes les provinces
            </a>
            <a href="/regions" class="btn btn-ghost" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>🗺️</span> Voir les régions
            </a>
          </div>

          <!-- ⬅️ ➡️ PROVINCES VOISINES -->
          <div class="info-card voisins-card">
            <h3><span>🧭</span> Provinces voisines</h3>
            <div class="voisins-list" id="voisins-list"></div>
          </div>

        </aside>

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
        <h4>Découvrir</h4>
        <ul>
          <li><a href="/galerie">Galerie photos</a></li>
          <li><a href="/region?region=kadiogo">Kadiogo</a></li>
          <li><a href="/region?region=guiriko">Guiriko</a></li>
          <li><a href="/region?region=tannounyan">Tannounyan</a></li>
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
<script src="/js/province.js"></script>
</body>
</html>