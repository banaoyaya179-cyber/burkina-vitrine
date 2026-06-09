<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Les 47 provinces du Burkina Faso — Explorez, filtrez et recherchez parmi toutes les provinces des 17 régions.">
  <title>Les 47 Provinces — Burkina Faso</title>
  
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

  <!-- Hero page -->
  <div class="page-hero page-hero-vert">
    <div class="container">
      <h1>🏛️ Les 47 Provinces</h1>
      <p>Découvrez les subdivisions administratives des 17 régions du Burkina Faso</p>
      <div class="page-hero-stats">
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">47</span>
          <span class="page-hero-stat-label">Provinces</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">17</span>
          <span class="page-hero-stat-label">Régions</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">351</span>
          <span class="page-hero-stat-label">Communes</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Contenu principal -->
  <section class="provinces-page">
    <div class="container">

      <!-- Barre de recherche -->
      <div class="search-wrapper reveal">
        <input type="text" id="search-input" class="search-input"
               placeholder="Rechercher une province, un chef-lieu, une spécialité..."
               autocomplete="off">
        <svg class="search-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
        <div class="search-suggestions" id="search-suggestions"></div>
      </div>

      <!-- Filtres -->
      <div class="filtres-wrapper reveal">
        <button class="filtre-pill active" data-region="Toutes">
          <span>🌍</span> Toutes (47)
        </button>
        <button class="filtre-pill" data-region="kadiogo">
          <span>🏛️</span> Kadiogo
        </button>
        <button class="filtre-pill" data-region="nando">
          <span>🌾</span> Nando
        </button>
        <button class="filtre-pill" data-region="nazinon">
          <span>🌿</span> Nazinon
        </button>
        <button class="filtre-pill" data-region="nakambe">
          <span>🌳</span> Nakambé
        </button>
        <button class="filtre-pill" data-region="kuilse">
          <span>⛰️</span> Kuilsé
        </button>
        <button class="filtre-pill" data-region="yaadga">
          <span>🏜️</span> Yaadga
        </button>
        <button class="filtre-pill" data-region="liptako">
          <span>🌵</span> Liptako
        </button>
        <button class="filtre-pill" data-region="sirba">
          <span>🐪</span> Sirba
        </button>
        <button class="filtre-pill" data-region="tapoa">
          <span>🦁</span> Tapoa
        </button>
        <button class="filtre-pill" data-region="oubri">
          <span>🌾</span> Oubri
        </button>
        <button class="filtre-pill" data-region="goulmou">
          <span>🌲</span> Goulmou
        </button>
        <button class="filtre-pill" data-region="bankui">
          <span>🌾</span> Bankui
        </button>
        <button class="filtre-pill" data-region="sourou">
          <span>🌊</span> Sourou
        </button>
        <button class="filtre-pill" data-region="guiriko">
          <span>🏙️</span> Guiriko
        </button>
        <button class="filtre-pill" data-region="tannounyan">
          <span>💧</span> Tannounyan
        </button>
        <button class="filtre-pill" data-region="djoro">
          <span>🏺</span> Djorô
        </button>
        <button class="filtre-pill" data-region="soum">
          <span>🐪</span> Soum
        </button>
      </div>

      <!-- Options de tri -->
      <div class="tri-wrapper reveal">
        <span class="tri-label">Trier par :</span>
        <select id="tri-select" class="tri-select">
          <option value="nom">Nom (A-Z)</option>
          <option value="population">Population</option>
          <option value="superficie">Superficie</option>
        </select>
      </div>

      <!-- Compteur résultats -->
      <p class="results-count" id="results-count">47 provinces trouvées</p>

      <!-- Grille -->
      <div class="provinces-grid" id="provinces-grid">
        <!-- Skeletons -->
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
      </div>

      <!-- État vide -->
      <div class="empty-state" id="empty-state" style="display:none;">
        <div class="empty-icon">🔍</div>
        <h3>Aucune province trouvée</h3>
        <p>Essayez un autre terme ou réinitialisez les filtres.</p>
        <button class="btn btn-outline" onclick="resetFilters()">Réinitialiser les filtres</button>
      </div>

    </div>
  </section>

  <!-- Section CTA régions -->
  <section class="provinces-cta-section">
    <div class="container">
      <div class="provinces-cta reveal">
        <div class="provinces-cta-text">
          <h2>Explorez par région</h2>
          <p>Découvrez les 17 régions administratives et leurs spécificités culturelles et économiques.</p>
        </div>
        <a href="/regions" class="btn btn-primary">
          <span>🗺️</span> Voir les régions
        </a>
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
<script src="/js/provinces.js"></script>
</body>
</html>