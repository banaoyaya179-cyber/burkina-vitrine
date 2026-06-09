<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="À propos du projet Burkina Faso Vitrine Régionale — Méthodologie, sources, crédits et licences. Projet académique 2025-2026.">
  <title>À Propos — Burkina Faso</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/pages.css">
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

  <div class="page-hero page-hero-about">
    <div class="container">
      <h1>ℹ️ À Propos</h1>
      <p>Méthodologie, sources et crédits du projet Burkina Faso Vitrine Régionale</p>
    </div>
  </div>

  <section class="about-page">
    <div class="container">
      <div class="about-layout">

        <!-- COLONNE PRINCIPALE -->
        <main class="about-main">

          <!-- Présentation -->
          <div class="section-block reveal">
            <h2>🎯 Présentation du projet</h2>
            <p>
              Ce projet est une <strong>vitrine web dynamique</strong> dédiée aux 17 régions administratives
              du Burkina Faso. Démarré comme projet statique dans le cadre du cours de
              <strong>développement web 2025-2026</strong>, il a été migré vers une architecture
              dynamique complète avec base de données, API REST et espace d'administration.
            </p>
            <p>
              Le site permet aux visiteurs d'explorer les richesses culturelles, économiques et
              touristiques de chaque région à travers une interface moderne et responsive,
              alimentée en temps réel par une base de données MySQL.
            </p>

            <div class="about-stats-grid">
              <div class="about-stat-card">
                <span class="about-stat-num">11</span>
                <span class="about-stat-label">Pages</span>
              </div>
              <div class="about-stat-card">
                <span class="about-stat-num">17</span>
                <span class="about-stat-label">Régions documentées</span>
              </div>
              <div class="about-stat-card">
                <span class="about-stat-num">47</span>
                <span class="about-stat-label">Provinces répertoriées</span>
              </div>
              <div class="about-stat-card">
                <span class="about-stat-num">85+</span>
                <span class="about-stat-label">Sites touristiques</span>
              </div>
              <div class="about-stat-card">
                <span class="about-stat-num">API</span>
                <span class="about-stat-label">REST intégrée</span>
              </div>
              <div class="about-stat-card">
                <span class="about-stat-num">1</span>
                <span class="about-stat-label">Framework (Laravel)</span>
              </div>
            </div>
          </div>

          <!-- Méthodologie -->
          <div class="section-block reveal">
            <h2>🔬 Méthodologie</h2>

            <h3>Collecte des données</h3>
            <p>Les données présentées proviennent de sources officielles et fiables :</p>
            <ul class="about-list">
              <li><strong>INSD</strong> — Institut National de la Statistique et de la Démographie du Burkina Faso</li>
              <li><strong>Journal Officiel</strong> — Lois et décrets relatifs au découpage administratif</li>
              <li><strong>Ministère de l'Administration Territoriale</strong> — Documents officiels de la réforme 2024</li>
              <li><strong>Wikipedia / Wikimedia Commons</strong> — Informations géographiques et images libres de droits</li>
              <li><strong>Publications académiques</strong> — Recherches sur les cultures et ethnies burkinabè</li>
            </ul>

            <h3>Technologies utilisées</h3>
            <div class="tech-grid">
              <div class="tech-card">
                <span class="tech-icon">🐘</span>
                <span class="tech-name">PHP / Laravel</span>
                <span class="tech-desc">Backend & API REST</span>
              </div>
              <div class="tech-card">
                <span class="tech-icon">🗄️</span>
                <span class="tech-name">MySQL</span>
                <span class="tech-desc">Base de données</span>
              </div>
              <div class="tech-card">
                <span class="tech-icon">⚡</span>
                <span class="tech-name">JavaScript</span>
                <span class="tech-desc">Fetch API & interactions</span>
              </div>
              <div class="tech-card">
                <span class="tech-icon">📊</span>
                <span class="tech-name">Chart.js</span>
                <span class="tech-desc">Graphiques comparatifs</span>
              </div>
              <div class="tech-card">
                <span class="tech-icon">🎨</span>
                <span class="tech-name">CSS3</span>
                <span class="tech-desc">Design & animations</span>
              </div>
              <div class="tech-card">
                <span class="tech-icon">🌦️</span>
                <span class="tech-name">Open-Meteo</span>
                <span class="tech-desc">Météo en direct</span>
              </div>
            </div>

            <h3>Architecture du projet</h3>
            <p>Le site suit une architecture <strong>MVC (Laravel)</strong> :</p>
            <ul class="about-list">
              <li><strong>Models</strong> — Region, Province, SiteTouristique, Festival, Galerie, Richesse, Message</li>
              <li><strong>Controllers</strong> — API REST + Admin (Dashboard, Régions, Messages)</li>
              <li><strong>Views</strong> — Templates Blade pour les pages publiques et l'espace admin</li>
              <li><strong>Routes</strong> — Routes publiques + routes admin protégées par authentification</li>
            </ul>
          </div>

          <!-- Sources images -->
          <div class="section-block reveal">
            <h2>📷 Sources des images</h2>
            <p>
              Les images utilisées proviennent principalement de <strong>Wikimedia Commons</strong>,
              la médiathèque libre de Wikipedia. Toutes les images sont sous licence
              <strong>Creative Commons</strong> (CC BY-SA) ou domaine public.
            </p>
            <div class="licence-info">
              <h4>📝 Licences utilisées</h4>
              <div class="licence-cards">
                <div class="licence-card">
                  <span class="licence-badge">CC BY-SA</span>
                  <p>Attribution — Partage dans les mêmes conditions</p>
                </div>
                <div class="licence-card">
                  <span class="licence-badge">PD</span>
                  <p>Domaine public</p>
                </div>
                <div class="licence-card">
                  <span class="licence-badge">GFDL</span>
                  <p>Licence de documentation libre GNU</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Limites -->
          <div class="section-block reveal">
            <h2>⚠️ Limites et perspectives</h2>
            <ul class="about-list">
              <li>Certaines images sont des placeholders générés automatiquement</li>
              <li>La météo utilise Open-Meteo (API gratuite) avec des données approximatives</li>
              <li>Les données démographiques sont basées sur les dernières estimations disponibles</li>
              <li>Le formulaire de contact enregistre les messages en base de données</li>
            </ul>
            <p>
              <strong>Perspectives :</strong> intégration de photos authentiques, version multilingue
              (français, mooré, dioula), déploiement sur serveur de production.
            </p>
          </div>

          <!-- Équipe -->
          <div class="section-block reveal">
            <h2>👥 Équipe projet</h2>
            <p>
              Réalisé dans le cadre du cours de <strong>développement web</strong>
              de l'année universitaire 2025-2026 à l'<strong>Université Norbert Zongo</strong> de Koudougou.
            </p>
            <div class="equipe-card">
              <div class="equipe-icon">🎓</div>
              <div class="equipe-info">
                <h4>Étudiants L3 Informatique</h4>
                <p>Projet réalisé par groupe d'étudiants — Université Norbert Zongo, Koudougou</p>
              </div>
            </div>
            <div class="equipe-card">
              <div class="equipe-icon">👨‍🏫</div>
              <div class="equipe-info">
                <h4>Encadrement</h4>
                <p>Sous la supervision du Dr. ZONGO — UNZ Koudougou</p>
              </div>
            </div>
          </div>

        </main>

        <!-- SIDEBAR -->
        <aside class="about-sidebar">

          <div class="info-card">
            <h3>📋 Résumé du projet</h3>
            <div class="resume-item">
              <span class="resume-label">Type</span>
              <span class="resume-value">Vitrine web dynamique</span>
            </div>
            <div class="resume-item">
              <span class="resume-label">Année</span>
              <span class="resume-value">2025-2026</span>
            </div>
            <div class="resume-item">
              <span class="resume-label">Cours</span>
              <span class="resume-value">Développement Web</span>
            </div>
            <div class="resume-item">
              <span class="resume-label">Backend</span>
              <span class="resume-value">PHP / Laravel 11</span>
            </div>
            <div class="resume-item">
              <span class="resume-label">Base de données</span>
              <span class="resume-value">MySQL 8</span>
            </div>
            <div class="resume-item">
              <span class="resume-label">Statut</span>
              <span class="resume-value badge badge-vert">En ligne ✓</span>
            </div>
          </div>

          <div class="info-card">
            <h3>🔗 Liens utiles</h3>
            <ul class="about-links">
              <li><a href="https://www.insd.bf" target="_blank" rel="noopener">📊 INSD Burkina Faso</a></li>
              <li><a href="https://commons.wikimedia.org" target="_blank" rel="noopener">📷 Wikimedia Commons</a></li>
              <li><a href="https://fr.wikipedia.org/wiki/Burkina_Faso" target="_blank" rel="noopener">🌐 Wikipedia Burkina</a></li>
              <li><a href="https://open-meteo.com" target="_blank" rel="noopener">🌦️ Open-Meteo API</a></li>
              <li><a href="https://laravel.com" target="_blank" rel="noopener">🐘 Laravel</a></li>
            </ul>
          </div>

          <div class="info-card">
            <h3>📁 Structure du projet</h3>
            <div class="structure-tree">
              <div class="tree-item">📁 burkina-vitrine/</div>
              <div class="tree-item tree-indent">📁 app/Models/</div>
              <div class="tree-item tree-indent">📁 app/Http/Controllers/</div>
              <div class="tree-item tree-indent">📁 database/migrations/</div>
              <div class="tree-item tree-indent">📁 routes/</div>
              <div class="tree-item tree-indent2">📄 web.php</div>
              <div class="tree-item tree-indent2">📄 api.php</div>
              <div class="tree-item tree-indent">📁 resources/views/</div>
              <div class="tree-item tree-indent2">📁 admin/</div>
              <div class="tree-item tree-indent">📁 public/</div>
              <div class="tree-item tree-indent2">📁 css/ js/ images/</div>
            </div>
          </div>

          <div class="info-card">
            <h3>🏷️ Version</h3>
            <p style="font-size:var(--sm);color:var(--text-muted)">
              <strong>v2.0.0</strong> — Juin 2026<br>
              Migration statique → dynamique<br>
              Laravel 11 + MySQL
            </p>
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
        <p>Vitrine web dynamique des 17 régions administratives du Burkina Faso. Projet 2025-2026.</p>
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
      <span>© 2026 Burkina Faso — Projet Web Dynamique</span>
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
</body>
</html>
