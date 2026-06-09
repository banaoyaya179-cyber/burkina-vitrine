<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Fiche détaillée d'une région administrative du Burkina Faso. Découvrez ses sites touristiques, culture, économie et gastronomie.">
  <title>Région — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/region.css">
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
      <a href="/regions" class="nav-link active">Régions</a>
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

  <!-- ── HERO RÉGION ── -->
  <section class="region-hero">
    <div class="region-hero-bg" id="region-hero-bg"></div>
    <div class="region-hero-overlay"></div>
    <div class="region-hero-content">
      <div class="container">
        <!-- Breadcrumb -->
        <nav class="region-breadcrumb">
          <a href="/">Accueil</a>
          <span>›</span>
          <a href="/regions">Régions</a>
          <span>›</span>
          <span id="breadcrumb-nom">...</span>
        </nav>
        <div class="region-hero-meta">
          <span class="badge badge-rouge" id="region-badge">...</span>
          <span class="badge badge-vert" id="region-ancien-nom">...</span>
        </div>
        <h1 id="region-nom">Chargement...</h1>
        <p class="slogan" id="region-slogan"></p>
        <div class="region-hero-actions">
          <a href="/comparer" class="btn btn-outline btn-sm" id="btn-comparer">
            <span>⚖️</span> Comparer
          </a>
          <button class="btn btn-ghost btn-sm" id="btn-share">
            <span>📤</span> Partager
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- ── CONTENU PRINCIPAL ── -->
  <section class="region-content">
    <div class="container">
      <div class="region-layout">

        <!-- COLONNE PRINCIPALE -->
        <main class="region-main">

          <!-- 📝 IDENTITÉ & DESCRIPTION -->
          <div class="section-block reveal" id="section-identite">
            <h2>📝 Identité</h2>
            <p id="region-description" class="region-description"></p>
            <div class="identite-grid">
              <div class="identite-item">
                <span class="identite-icon">📍</span>
                <div>
                  <span class="identite-label">Chef-lieu</span>
                  <span class="identite-value" id="stat-chef-lieu">—</span>
                </div>
              </div>
              <div class="identite-item">
                <span class="identite-icon">📐</span>
                <div>
                  <span class="identite-label">Superficie</span>
                  <span class="identite-value" id="stat-superficie">—</span>
                </div>
              </div>
              <div class="identite-item">
                <span class="identite-icon">👥</span>
                <div>
                  <span class="identite-label">Population</span>
                  <span class="identite-value" id="stat-population">—</span>
                </div>
              </div>
              <div class="identite-item">
                <span class="identite-icon">📊</span>
                <div>
                  <span class="identite-label">Densité</span>
                  <span class="identite-value" id="stat-densite">—</span>
                </div>
              </div>
              <div class="identite-item">
                <span class="identite-icon">🌡️</span>
                <div>
                  <span class="identite-label">Climat</span>
                  <span class="identite-value" id="stat-climat">—</span>
                </div>
              </div>
              <div class="identite-item">
                <span class="identite-icon">🌿</span>
                <div>
                  <span class="identite-label">Végétation</span>
                  <span class="identite-value" id="stat-vegetation">—</span>
                </div>
              </div>
            </div>
          </div>

          <!-- 🏛️ PROVINCES -->
          <div class="section-block reveal">
            <h2>🏛️ Provinces</h2>
            <p class="section-intro">La région est subdivisée en provinces, chacune avec son chef-lieu et ses spécificités.</p>
            <div class="provinces-grid" id="provinces-grid">
              <div class="skeleton-line" style="height:80px;border-radius:var(--radius-sm)"></div>
              <div class="skeleton-line" style="height:80px;border-radius:var(--radius-sm)"></div>
            </div>
          </div>

          <!-- 💰 RICHESSES & ÉCONOMIE -->
          <div class="section-block reveal">
            <h2>💰 Richesses & Économie</h2>
            <p class="section-intro" id="potentiel-economique"></p>
            <div class="richesses-grid" id="richesses-grid">
              <div class="skeleton-line" style="height:120px;border-radius:var(--radius-md)"></div>
              <div class="skeleton-line" style="height:120px;border-radius:var(--radius-md)"></div>
            </div>
          </div>

          <!-- 🏖️ SITES TOURISTIQUES -->
          <div class="section-block reveal">
            <h2>🏖️ Sites Touristiques</h2>
            <p class="section-intro">Découvrez les trésors naturels, historiques et culturels de cette région.</p>
            <div class="sites-grid" id="sites-grid"></div>
          </div>

          <!-- 🎭 FESTIVALS & TRADITIONS -->
          <div class="section-block reveal" id="section-festivals">
            <h2>🎭 Festivals & Traditions</h2>
            <p class="section-intro">Célébrations, cérémonies et événements qui rythment la vie culturelle de la région.</p>
            <div class="festivals-grid" id="festivals-grid"></div>
          </div>

          <!-- 💃 DANSES TRADITIONNELLES -->
          <div class="section-block reveal" id="section-danses">
            <h2>💃 Danses Traditionnelles</h2>
            <p class="section-intro">Expressions artistiques transmises de génération en génération.</p>
            <div class="danses-grid" id="danses-grid"></div>
          </div>

          <!-- 🎭 MASQUES -->
          <div class="section-block reveal" id="section-masques">
            <h2>🎭 Masques Traditionnels</h2>
            <p class="section-intro">Symboles spirituels et artistiques des différentes ethnies de la région.</p>
            <div class="masques-grid" id="masques-grid"></div>
          </div>

          <!-- 🎨 ARTISANAT -->
          <div class="section-block reveal" id="section-artisanat">
            <h2>🎨 Artisanat</h2>
            <p class="section-intro">Savoir-faire artisanal et productions traditionnelles de la région.</p>
            <div class="artisanat-grid" id="artisanat-grid"></div>
          </div>

          <!-- 🍽️ GASTRONOMIE -->
          <div class="section-block reveal">
            <h2>🍽️ Gastronomie</h2>
            <p class="section-intro">Spécialités culinaires et plats traditionnels à découvrir.</p>
            <div class="gastronomie-grid" id="nourriture-list"></div>
          </div>

          <!-- 📸 GALERIE -->
          <div class="section-block reveal" id="section-galerie">
            <h2>📸 Galerie</h2>
            <p class="section-intro">Images de la région, de ses paysages et de sa culture.</p>
            <div class="galerie-grid" id="galerie-grid"></div>
          </div>

          <!-- 📝 COMMENTAIRES -->
          <div class="section-block reveal" id="section-commentaires">
            <h2>📝 Commentaires</h2>
            <div class="commentaires-form">
              <h3>Laissez un avis</h3>
              <div class="form-row">
                <div class="form-group">
                  <label for="comment-nom">Votre nom</label>
                  <input type="text" id="comment-nom" class="form-control" placeholder="Votre nom">
                </div>
                <div class="form-group">
                  <label for="comment-email">Email (optionnel)</label>
                  <input type="email" id="comment-email" class="form-control" placeholder="votre@email.com">
                </div>
              </div>
              <div class="form-group">
                <label for="comment-text">Votre commentaire</label>
                <textarea id="comment-text" class="form-control" rows="3" placeholder="Partagez votre expérience ou vos connaissances sur cette région..."></textarea>
              </div>
              <button class="btn btn-primary" id="btn-comment-submit">
                <span>💬</span> Publier
              </button>
            </div>
            <div class="commentaires-list" id="commentaires-list"></div>
          </div>

        </main>

        <!-- SIDEBAR -->
        <aside class="region-sidebar">

          <!-- 🌤️ MÉTÉO -->
          <div class="info-card meteo-card">
            <h3><span>🌤️</span> Météo en direct</h3>
            <div id="meteo-content">
              <div class="spinner"><span></span><span></span><span></span></div>
            </div>
            <p class="meteo-source">Données Open-Meteo</p>
          </div>

          <!-- 🗣️ LANGUES & ETHNIES -->
          <div class="info-card">
            <h3><span>🗣️</span> Langues</h3>
            <div class="tag-list" id="region-langues"></div>
            
            <h3 style="margin-top:var(--sp-3)"><span>👥</span> Ethnies</h3>
            <div class="tag-list" id="region-peuples"></div>
          </div>

          <!-- 📊 STATS RAPIDES -->
          <div class="info-card stats-card">
            <h3><span>📊</span> En chiffres</h3>
            <div class="stats-list">
              <div class="stat-row">
                <span class="stat-key">🏛️ Provinces</span>
                <span class="stat-val" id="sidebar-provinces">—</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">🏖️ Sites</span>
                <span class="stat-val" id="sidebar-sites">—</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">🍽️ Plats</span>
                <span class="stat-val" id="sidebar-plats">—</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">🎭 Festivals</span>
                <span class="stat-val" id="sidebar-festivals">—</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">💃 Danses</span>
                <span class="stat-val" id="sidebar-danses">—</span>
              </div>
            </div>
          </div>

          <!-- 🗺️ MINI-CARTE -->
          <div class="info-card carte-mini-card">
            <h3><span>🗺️</span> Localisation</h3>
            <div class="carte-mini" id="carte-mini">
              <!-- Généré par JS -->
            </div>
            <a href="/carte" class="btn btn-ghost btn-sm" style="width:100%;margin-top:var(--sp-2)">
              Voir sur la carte complète
            </a>
          </div>

          <!-- 📤 PARTAGE -->
          <div class="info-card share-card">
            <h3><span>📤</span> Partager</h3>
            <div class="share-buttons">
              <button class="share-btn" data-network="whatsapp" title="WhatsApp">
                <span>📱</span>
              </button>
              <button class="share-btn" data-network="facebook" title="Facebook">
                <span>📘</span>
              </button>
              <button class="share-btn" data-network="twitter" title="Twitter">
                <span>🐦</span>
              </button>
              <button class="share-btn" data-network="copy" title="Copier le lien">
                <span>📋</span>
              </button>
            </div>
          </div>

          <!-- 🔗 NAVIGATION -->
          <div class="info-card nav-card">
            <h3><span>🔗</span> Navigation</h3>
            <a href="/regions" class="btn btn-ghost" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>←</span> Toutes les régions
            </a>
            <a href="/provinces" class="btn btn-ghost" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>🏛️</span> Voir les provinces
            </a>
            <a href="/comparer" class="btn btn-primary" style="width:100%;justify-content:center" id="btn-comparer-sidebar">
              <span>⚖️</span> Comparer cette région
            </a>
          </div>

          <!-- ⬅️ ➡️ RÉGIONS VOISINES -->
          <div class="info-card voisins-card">
            <h3><span>🧭</span> Régions voisines</h3>
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
<script src="/js/region.js"></script>
</body>
</html>