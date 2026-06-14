<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Burkina Faso — Vitrine web des 17 régions administratives. Explorez les cultures, richesses et potentialités de chaque région.">
  <title>Burkina Faso — Terre des Hommes Intègres</title>

  <!-- Polices locales (fallback Google Fonts si offline) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/index.css">
  <link rel="stylesheet" href="/css/homepage-refresh.css">
<base target="_blank">
</head>
<body>

<!-- ══════════════════════════════════════════
     LOADER D'ENTRÉE
══════════════════════════════════════════ -->
<div class="page-loader" id="page-loader">
  <div class="loader-content">
    <div class="loader-flag">
      <div class="loader-flag-top"></div>
      <div class="loader-flag-bot"></div>
      <div class="loader-star">★</div>
    </div>
    <h2 class="loader-title">Burkina Faso Terre des Hommes Intègres </h2>
    <p class="loader-subtitle">Terre des Hommes Intègres</p>
    <div class="loader-progress">
      <div class="loader-progress-bar" id="loader-bar"></div>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════════
     BARRE DE PROGRESSION SCROLL
══════════════════════════════════════════ -->
<div class="scroll-progress" id="scroll-progress"></div>

<!-- ══════════════════════════════════════════
     OVERLAY MENU MOBILE
══════════════════════════════════════════ -->
<div class="nav-overlay" id="nav-overlay"></div>

<!-- ══════════════════════════════════════════
     HEADER GLOBAL
══════════════════════════════════════════ -->
<<header id="header">
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
      <a href="/" class="nav-link active">Accueil</a>
      <a href="/regions" class="nav-link">Régions</a>
      <a href="/provinces" class="nav-link">Provinces</a>
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
      <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ══════════════════════════════════════════
     RECHERCHE GLOBALE (PALETTE FLOTTANTE)
══════════════════════════════════════════ -->
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

<!-- ══════════════════════════════════════════
     PAGE WRAPPER
══════════════════════════════════════════ -->
<div class="page-wrapper page-fade-in">

  <!-- ── SECTION HERO ── -->
  <section class="hero">
    <div class="hero-bg" id="hero-bg"></div>
    <div class="hero-particles" id="hero-particles"></div>
    <div class="hero-overlay"></div>

    <div class="container">
      <div class="hero-content">
        <div class="hero-eyebrow">
          <span class="dot"></span>
          <span class="flag-emoji">🇧🇫</span>
          <span>Découvrez le Burkina Faso</span>
        </div>

        <h1>
          Un pays,<br>
          <span class="highlight">17 régions</span>,<br>
          mille richesses
        </h1>

        <p class="hero-description">
          Explorez les cultures, les traditions, les sites naturels et les
          potentialités économiques de chaque région administrative du Burkina Faso.
          De la savane sahélienne du Nord aux forêts tropicales du Sud-Ouest.
        </p>

        <div class="hero-cta">
          <a href="/regions" class="btn btn-primary">
            <span>🗺️</span> Explorer les régions
          </a>
          <a href="/carte" class="btn btn-outline">
            <span>📍</span> Voir la carte
          </a>
        </div>

        <div class="hero-stats-mini">
          <div class="hero-stat">
            <span class="hero-stat-number">17</span>
            <span class="hero-stat-label">Régions</span>
          </div>
          <div class="hero-stat-divider"></div>
          <div class="hero-stat">
            <span class="hero-stat-number">47</span>
            <span class="hero-stat-label">Provinces</span>
          </div>
          <div class="hero-stat-divider"></div>
          <div class="hero-stat">
            <span class="hero-stat-number">60+</span>
            <span class="hero-stat-label">Langues</span>
          </div>
        </div>
      </div>
    </div>

    <div class="hero-scroll">
      <span>Défiler</span>
      <div class="hero-scroll-line"></div>
    </div>

    <div class="hero-accent">
      <span></span><span></span><span></span>
    </div>
  </section>

  <!-- ── SECTION COMPTEURS ── -->
  <section class="compteurs-section">
    <div class="container">
      <div class="compteurs-grid">
        <div class="compteur-item reveal">
          <div class="compteur-icon">🗺️</div>
          <div class="compteur-number" data-counter="17">0</div>
          <div class="compteur-label">Régions administratives</div>
        </div>
        <div class="compteur-item reveal">
          <div class="compteur-icon">🏛️</div>
          <div class="compteur-number" data-counter="47">0</div>
          <div class="compteur-label">Provinces</div>
        </div>
        <div class="compteur-item reveal">
          <div class="compteur-icon">📐</div>
          <div class="compteur-number" data-counter="274200" data-suffix=" km²">0</div>
          <div class="compteur-label">Superficie totale</div>
        </div>
        <div class="compteur-item reveal">
          <div class="compteur-icon">🗣️</div>
          <div class="compteur-number" data-counter="60" data-suffix="+">0</div>
          <div class="compteur-label">Langues parlées</div>
        </div>
        <div class="compteur-item reveal">
          <div class="compteur-icon">👥</div>
          <div class="compteur-number" data-counter="22" data-suffix="M">0</div>
          <div class="compteur-label">Habitants</div>
        </div>
        <div class="compteur-item reveal">
          <div class="compteur-icon">🏖️</div>
          <div class="compteur-number" data-counter="85" data-suffix="+">0</div>
          <div class="compteur-label">Sites touristiques</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── SECTION RÉGIONS EN VEDETTE ── -->
  <section class="featured-section">
    <div class="container">
      <div class="section-header reveal">
        <span class="section-tag">Découvertes</span>
        <h2>Régions à la une</h2>
        <div class="color-bar"><span></span><span></span><span></span></div>
        <p>Des paysages sahariens aux forêts cascades, le Burkina offre une diversité remarquable.</p>
      </div>

      <div class="regions-grid" id="featured-grid">
        <!-- Généré par index.js -->
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
        <div class="skeleton-card"><div class="skeleton-img"></div><div class="skeleton-body"><div class="skeleton-line"></div><div class="skeleton-line short"></div></div></div>
      </div>

      <div class="featured-cta reveal">
        <a href="/regions" class="btn btn-outline">
          Voir les 17 régions →
        </a>
      </div>
    </div>
  </section>

  <!-- ── SECTION CARTE APERÇU ── -->
  <section class="carte-section">
    <div class="container">
      <div class="carte-apercu-layout">
        <div class="carte-mini-wrapper reveal-left" id="mini-map">
          <img src="/images/carte/carte-burkina.jpg" alt="Carte administrative du Burkina Faso" class="mini-map-image">
        </div>
        <div class="carte-apercu-text reveal-right">
          <span class="section-tag">Exploration</span>
          <h2>La carte administrative du Burkina Faso</h2>
          <div class="color-bar"><span></span><span></span><span></span></div>
          <p>
            Découvrez la carte administrative officielle du Burkina Faso avec ses 17 régions, 47 provinces et 350 départements selon le découpage 2024.
          </p>
          <p>
            Des zones sahéliennes arides du Nord aux forêts denses du Sud-Ouest,
            chaque région offre une identité unique façonnée par sa géographie et son peuple.
          </p>
          <div class="carte-features">
            <div class="carte-feature">
              <span class="carte-feature-icon">🗺️</span>
              <span>17 régions officielles</span>
            </div>
            <div class="carte-feature">
              <span class="carte-feature-icon">📊</span>
              <span>47 provinces détaillées</span>
            </div>
            <div class="carte-feature">
              <span class="carte-feature-icon">🔍</span>
              <span>350 départements</span>
            </div>
          </div>
          <a href="/carte" class="btn btn-primary">
            <span>🗺️</span> Ouvrir la carte plein écran
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ── SECTION POTENTIALITÉS ── -->
  <section class="potentialites-section">
    <div class="container">
      <div class="section-header reveal">
        <span class="section-tag">Richesses</span>
        <h2>Les potentialités du Burkina Faso</h2>
        <div class="color-bar"><span></span><span></span><span></span></div>
        <p>Un patrimoine culturel, agricole et minier parmi les plus riches d'Afrique de l'Ouest.</p>
      </div>

      <div class="potentialites-grid">
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">🌾</div>
          <h3>Agriculture</h3>
          <p>Coton, sorgho, mil, maïs, sésame, anacarde, riz, canne à sucre</p>
          <div class="potentiel-regions">Régions : Sourou, Guiriko, Tannounyan, Nazinon</div>
        </div>
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">🐄</div>
          <h3>Élevage</h3>
          <p>Bovins, ovins, caprins, volaille, dromadaires dans le Sahel</p>
          <div class="potentiel-regions">Régions : Sirba, Soum, Liptako, Yaadga</div>
        </div>
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">⛏️</div>
          <h3>Mines & Ressources</h3>
          <p>Or, manganèse, zinc, phosphate, nickel, bauxite</p>
          <div class="potentiel-regions">Régions : Tapoa, Guiriko, Nando, Djoro</div>
        </div>
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">🎭</div>
          <h3>Culture & Artisanat</h3>
          <p>Masques, bronze, bogolan, poterie, danses traditionnelles</p>
          <div class="potentiel-regions">Régions : Kadiogo, Sourou, Djoro, Tannounyan</div>
        </div>
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">🏖️</div>
          <h3>Tourisme</h3>
          <p>Parcs nationaux, cascades, architecture traditionnelle, festivals</p>
          <div class="potentiel-regions">Régions : Tapoa, Tannounyan, Sirba, Djoro</div>
        </div>
        <div class="potentiel-card reveal">
          <div class="potentiel-icon">🏛️</div>
          <h3>Patrimoine</h3>
          <p>Mosquées, palais royaux, tatas, sites UNESCO</p>
          <div class="potentiel-regions">Régions : Kadiogo, Guiriko, Djoro, Liptako</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── SECTION CTA RÉFORME ── -->
  <section class="reforme-cta-section">
    <div class="container">
      <div class="reforme-cta-content reveal">
        <span class="reforme-cta-badge">📜 Histoire administrative</span>
        <h2>De 13 à 17 régions</h2>
        <p>
          Découvrez comment et pourquoi le Burkina Faso a reconfiguré son découpage
          administratif en adoptant des noms à forte identité culturelle.
        </p>
        <div class="reforme-cta-stats">
          <div class="reforme-cta-stat">
            <span class="reforme-cta-stat-num">13</span>
            <span class="reforme-cta-stat-label">Anciennes régions</span>
          </div>
          <div class="reforme-cta-arrow">→</div>
          <div class="reforme-cta-stat">
            <span class="reforme-cta-stat-num">17</span>
            <span class="reforme-cta-stat-label">Nouvelles régions</span>
          </div>
        </div>
        <a href="/reforme" class="btn btn-primary">
          Lire la timeline →
        </a>
      </div>
    </div>
  </section>

  <!-- ── SECTION GALERIE APERÇU ── -->
  <section class="galerie-preview-section">
    <div class="container">
      <div class="section-header reveal">
        <span class="section-tag">Immersion</span>
        <h2>Le Burkina en images</h2>
        <div class="color-bar"><span></span><span></span><span></span></div>
        <p>Un aperçu visuel des richesses culturelles et naturelles du pays.</p>
      </div>

      <div class="galerie-preview-grid" id="galerie-preview">
        <div class="galerie-preview-item galerie-preview-large reveal">
          <img src="/images/regions/tannounyan/galerie/1.jpg" alt="Cascades de Karfiguéla" loading="lazy">
          <div class="galerie-preview-overlay">
            <span>Cascades de Karfiguéla</span>
          </div>
        </div>
        <div class="galerie-preview-item reveal">
          <img src="/images/regions/guiriko/galerie/1.jpg" alt="Grande Mosquée de Bobo" loading="lazy">
          <div class="galerie-preview-overlay">
            <span>Grande Mosquée de Bobo</span>
          </div>
        </div>
        <div class="galerie-preview-item reveal">
          <img src="/images/regions/tapoa/galerie/1.jpg" alt="Parc d'Arly" loading="lazy">
          <div class="galerie-preview-overlay">
            <span>Parc National d'Arly</span>
          </div>
        </div>
        <div class="galerie-preview-item galerie-preview-wide reveal">
          <img src="/images/regions/djoro/galerie/1.jpg" alt="Tata Lobi" loading="lazy">
          <div class="galerie-preview-overlay">
            <span>Architecture Tata Lobi</span>
          </div>
        </div>
        <div class="galerie-preview-item reveal">
          <img src="/images/regions/sirba/galerie/1.jpg" alt="Mare d'Oursi" loading="lazy">
          <div class="galerie-preview-overlay">
            <span>Mare d'Oursi</span>
          </div>
        </div>
      </div>

      <div class="featured-cta reveal">
        <a href="/galerie" class="btn btn-outline">
          Voir toute la galerie →
        </a>
      </div>
    </div>
  </section>

</div><!-- /.page-wrapper -->

<!-- ══════════════════════════════════════════
     FOOTER
══════════════════════════════════════════ -->
<<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <a href="/" class="logo" style="margin-bottom:var(--sp-2)">
          <div class="logo-flag"><div class="flag-top"></div><div class="flag-bot"></div><div class="flag-star">★</div></div>
          <span>Burkina <span class="accent">Faso</span></span>
        </a>
        <p>Vitrine web des 17 régions administratives du Burkina Faso. Projet réalisé dans le cadre du cours de développement web statique 2025-2026.</p>
        <div class="footer-social">
          <a href="#" class="social-link" title="Partager sur Facebook">📘</a>
          <a href="#" class="social-link" title="Partager sur Twitter">🐦</a>
          <a href="#" class="social-link" title="Partager sur WhatsApp">📱</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Navigation</h4>
        <ul>
          <li><a href="/">Accueil</a></li>
          <li><a href="/regions">Toutes les régions</a></li>
          <li><a href="/provinces">Toutes les provinces</a></li>
          <li><a href="/carte">Carte interactive</a></li>
          <li><a href="/comparer">Comparer</a></li>
          <li><a href="/reforme">La réforme</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Découvrir</h4>
        <ul>
          <li><a href="/galerie">Galerie photos</a></li>
          <li><a href="/region?region=kadiogo">Kadiogo (Ouagadougou)</a></li>
          <li><a href="/region?region=guiriko">Guiriko (Bobo)</a></li>
          <li><a href="/region?region=tannounyan">Tannounyan (Banfora)</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="/contact">Formulaire de contact</a></li>
          <li><a href="/a-propos">À propos du projet</a></li>
          <li><span>Université — Ouagadougou</span></li>
          <li><span>Projet Web Statique 2025</span></li>
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

<!-- JS -->
<script src="/js/utils.js"></script>
<script src="/js/app.js"></script>
<script src="/js/index.js"></script>
</body>
</html>
