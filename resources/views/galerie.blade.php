<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Galerie photos du Burkina Faso — Images des 17 régions, sites touristiques, gastronomie, artisanat et traditions.">
  <title>Galerie — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/galerie.css">
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
      <a href="/comparer" class="nav-link">Comparer</a>
      <a href="/reforme" class="nav-link">Réforme</a>
      <a href="/galerie" class="nav-link active">Galerie</a>
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
  <div class="page-hero page-hero-galerie">
    <div class="container">
      <h1>📸 Galerie</h1>
      <p>Le Burkina Faso en images — Régions, sites, cultures et traditions</p>
      <div class="page-hero-stats">
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">200+</span>
          <span class="page-hero-stat-label">Photos</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">17</span>
          <span class="page-hero-stat-label">Régions</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">6</span>
          <span class="page-hero-stat-label">Thèmes</span>
        </div>
      </div>
    </div>
  </div>

  <section class="galerie-page">
    <div class="container">

      <!-- Filtres -->
      <div class="galerie-filtres reveal">
        <button class="galerie-filtre active" data-filtre="tous">
          <span>🖼️</span> Tous
        </button>
        <button class="galerie-filtre" data-filtre="regions">
          <span>🗺️</span> Régions
        </button>
        <button class="galerie-filtre" data-filtre="sites">
          <span>🏖️</span> Sites touristiques
        </button>
        <button class="galerie-filtre" data-filtre="gastronomie">
          <span>🍽️</span> Gastronomie
        </button>
        <button class="galerie-filtre" data-filtre="artisanat">
          <span>🎨</span> Artisanat
        </button>
        <button class="galerie-filtre" data-filtre="festivals">
          <span>🎭</span> Festivals
        </button>
        <button class="galerie-filtre" data-filtre="danses">
          <span>💃</span> Danses
        </button>
      </div>

      <!-- Filtre région -->
      <div class="galerie-filtre-region reveal">
        <label for="galerie-region-select">Filtrer par région :</label>
        <select id="galerie-region-select" class="form-control">
          <option value="toutes">Toutes les régions</option>
          <option value="kadiogo">Kadiogo</option>
          <option value="nando">Nando</option>
          <option value="nazinon">Nazinon</option>
          <option value="nakambe">Nakambé</option>
          <option value="kuilse">Kuilsé</option>
          <option value="yaadga">Yaadga</option>
          <option value="liptako">Liptako</option>
          <option value="sirba">Sirba</option>
          <option value="tapoa">Tapoa</option>
          <option value="oubri">Oubri</option>
          <option value="goulmou">Goulmou</option>
          <option value="bankui">Bankui</option>
          <option value="sourou">Sourou</option>
          <option value="guiriko">Guiriko</option>
          <option value="tannounyan">Tannounyan</option>
          <option value="djoro">Djorô</option>
          <option value="soum">Soum</option>
        </select>
      </div>

      <!-- Compteur -->
      <p class="galerie-count" id="galerie-count">Chargement des images...</p>

      <!-- Grille Masonry -->
      <div class="galerie-masonry" id="galerie-masonry">
        <!-- Généré par galerie.js -->
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
        <div class="galerie-skeleton"><div class="skeleton-img"></div></div>
      </div>

      <!-- État vide -->
      <div class="empty-state" id="empty-state" style="display:none;">
        <div class="empty-icon">📷</div>
        <h3>Aucune image trouvée</h3>
        <p>Essayez un autre filtre ou région.</p>
        <button class="btn btn-outline" onclick="resetGalerieFilters()">Réinitialiser les filtres</button>
      </div>

      <!-- Bouton charger plus -->
      <div class="galerie-load-more reveal" id="galerie-load-more">
        <button class="btn btn-outline" id="btn-load-more">
          <span>⬇️</span> Charger plus d'images
        </button>
      </div>

    </div>
  </section>

</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <button class="lightbox-close" aria-label="Fermer">✕</button>
  <button class="lightbox-btn prev" aria-label="Précédent">‹</button>
  <img class="lightbox-img" src="" alt="" id="lightbox-img">
  <button class="lightbox-btn next" aria-label="Suivant">›</button>
  <div class="lightbox-caption" id="lightbox-caption"></div>
  <div class="lightbox-counter" id="lightbox-counter"></div>
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
<script src="/js/galerie.js"></script>
</body>
</html>