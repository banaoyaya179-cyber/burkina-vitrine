<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Comparez deux régions du Burkina Faso côte à côte. Population, superficie, climat, richesses et sites touristiques.">
  <title>Comparer — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <!-- Chart.js en local -->
  <link rel="stylesheet" href="/libs/chart.min.css">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/comparer.css">
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
      <a href="/provinces" class="nav-link">Provinces</a>
      <a href="/carte" class="nav-link">Carte</a>
      <a href="/comparer" class="nav-link active">Comparer</a>
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
  <div class="page-hero page-hero-comparer">
    <div class="container">
      <h1>⚖️ Comparer deux régions</h1>
      <p>Sélectionnez deux régions pour voir leur tableau comparatif côte à côte avec graphiques visuels</p>
    </div>
  </div>

  <section class="comparer-page">
    <div class="container">

      <!-- Sélecteurs -->
      <div class="compare-selectors reveal">
        <div class="region-selector">
          <label>Région 1</label>
          <div class="region-selector-inner">
            <img src="" alt="" id="select-r1-img" class="region-selector-img">
            <select id="select-r1"></select>
          </div>
        </div>
        <div class="vs-container">
          <div class="vs-badge">VS</div>
          <button class="btn-swap" id="btn-swap" title="Échanger">
            <span>⇄</span>
          </button>
        </div>
        <div class="region-selector">
          <label>Région 2</label>
          <div class="region-selector-inner">
            <img src="" alt="" id="select-r2-img" class="region-selector-img">
            <select id="select-r2"></select>
          </div>
        </div>
      </div>

      <!-- Graphiques -->
      <div class="compare-charts reveal" id="compare-charts">
        <div class="chart-container">
          <h3>📊 Population (habitants)</h3>
          <canvas id="chart-population"></canvas>
        </div>
        <div class="chart-container">
          <h3>📐 Superficie (km²)</h3>
          <canvas id="chart-superficie"></canvas>
        </div>
        <div class="chart-container">
          <h3>📈 Densité (hab/km²)</h3>
          <canvas id="chart-densite"></canvas>
        </div>
      </div>

      <!-- Tableau comparatif -->
      <div class="compare-table-wrapper reveal" id="compare-table-wrapper">
        <p class="compare-placeholder">
          Sélectionnez deux régions pour commencer la comparaison.
        </p>
      </div>

      <!-- Boutons action -->
      <div class="compare-actions reveal" id="compare-actions" style="display:none;">
        <a href="#" class="btn btn-outline" id="btn-voir-r1">
          <span>→</span> Voir <span id="btn-voir-r1-nom">Région 1</span>
        </a>
        <a href="#" class="btn btn-outline" id="btn-voir-r2">
          <span>→</span> Voir <span id="btn-voir-r2-nom">Région 2</span>
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

<!-- Chart.js -->
<script src="/libs/chart.min.js"></script>

<script src="/js/utils.js"></script>
<script src="/js/app.js"></script>
<script src="/js/comparer.js"></script>
</body>
</html>