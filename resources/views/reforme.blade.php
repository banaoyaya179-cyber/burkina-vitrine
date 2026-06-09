<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="La réforme territoriale du Burkina Faso — Du découpage colonial aux 17 régions identitaires. Timeline, contexte et objectifs.">
  <title>La Réforme — De 13 à 17 Régions — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/reforme.css">
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
      <a href="/reforme" class="nav-link active">Réforme</a>
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
  <div class="page-hero page-hero-reforme">
    <div class="container">
      <h1>📜 La Réforme Territoriale</h1>
      <p>Du découpage colonial aux 17 régions identitaires du Burkina Faso</p>
      <div class="page-hero-stats">
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">13</span>
          <span class="page-hero-stat-label">Anciennes régions</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-arrow">→</span>
        </div>
        <div class="page-hero-stat">
          <span class="page-hero-stat-num">17</span>
          <span class="page-hero-stat-label">Nouvelles régions</span>
        </div>
      </div>
    </div>
  </div>

  <section class="reforme-page">
    <div class="container">

      <div class="reforme-layout">

        <!-- COLONNE PRINCIPALE -->
        <main class="reforme-main">

          <!-- Introduction -->
          <div class="info-card reveal" style="margin-bottom: var(--sp-6)">
            <h3>🔎 Contexte de la réforme</h3>
            <p style="color:var(--text-muted);line-height:1.8;margin-top:var(--sp-2)">
              Le Burkina Faso a engagé une réforme profonde de son organisation territoriale. 
              Passant de <strong>13 régions</strong> héritées en partie du découpage administratif colonial 
              à <strong>17 régions</strong> portant des noms endogènes tirés des langues nationales, 
              cette réforme affirme l'identité culturelle du pays et améliore la gouvernance locale.
            </p>
            <p style="color:var(--text-muted);line-height:1.8;margin-top:var(--sp-2)">
              Adoptée en <strong>2024</strong>, cette transformation représente un tournant majeur dans 
              l'histoire administrative du pays, rapprochant l'État des citoyens et valorisant 
              les identités locales.
            </p>
          </div>

          <!-- Timeline -->
          <div class="section-header reveal">
            <span class="section-tag">Chronologie</span>
            <h2>Les étapes clés</h2>
            <div class="color-bar"><span></span><span></span><span></span></div>
          </div>

          <div class="timeline" id="timeline-container">
            <!-- Généré par reforme.js -->
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-date">1984</div>
              <div class="timeline-content reveal">
                <h3>Révolution et renommage</h3>
                <p>La Haute-Volta devient le Burkina Faso ("Pays des hommes intègres"). Le découpage administratif colonial est revu.</p>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-date">1995</div>
              <div class="timeline-content reveal">
                <h3>Décentralisation — 30 provinces</h3>
                <p>Le Burkina Faso est découpé en 30 provinces regroupées en 13 régions administratives.</p>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-date">2001</div>
              <div class="timeline-content reveal">
                <h3>Code général des collectivités</h3>
                <p>Renforcement de la décentralisation : les communes urbaines et rurales gagnent en autonomie.</p>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-date">2019–2022</div>
              <div class="timeline-content reveal">
                <h3>Réflexion sur le redécoupage</h3>
                <p>Des consultations nationales soulèvent la nécessité d'adapter les régions aux réalités socioculturelles et économiques.</p>
              </div>
            </div>
            <div class="timeline-item vert">
              <div class="timeline-dot"></div>
              <div class="timeline-date">2024</div>
              <div class="timeline-content reveal">
                <h3>Réforme — 17 nouvelles régions</h3>
                <p>Le Burkina Faso adopte un nouveau découpage en 17 régions portant des noms endogènes (langues locales), reflétant mieux l'identité culturelle du pays.</p>
              </div>
            </div>
            <div class="timeline-item vert">
              <div class="timeline-dot"></div>
              <div class="timeline-date">Futur</div>
              <div class="timeline-content reveal">
                <h3>Consolidation du découpage</h3>
                <p>Mise en place progressive des nouvelles administrations régionales et adaptation des services publics au nouveau cadre territorial.</p>
              </div>
            </div>
          </div>

          <!-- Avant / Après -->
          <div class="section-header reveal" style="margin-top: var(--sp-10)">
            <span class="section-tag">Avant — Après</span>
            <h2>13 → 17 Régions</h2>
            <div class="color-bar"><span></span><span></span><span></span></div>
          </div>

          <div class="regions-compare-grid reveal">
            <div class="regions-liste-card">
              <h3 style="color:var(--text-muted)">🏛️ Les 13 anciennes régions</h3>
              <ul id="anciennes-regions-list">
                <li><span class="num">1</span>Boucle du Mouhoun</li>
                <li><span class="num">2</span>Cascades</li>
                <li><span class="num">3</span>Centre</li>
                <li><span class="num">4</span>Centre-Est</li>
                <li><span class="num">5</span>Centre-Nord</li>
                <li><span class="num">6</span>Centre-Ouest</li>
                <li><span class="num">7</span>Centre-Sud</li>
                <li><span class="num">8</span>Est</li>
                <li><span class="num">9</span>Hauts-Bassins</li>
                <li><span class="num">10</span>Nord</li>
                <li><span class="num">11</span>Plateau-Central</li>
                <li><span class="num">12</span>Sahel</li>
                <li><span class="num">13</span>Sud-Ouest</li>
              </ul>
            </div>
            <div class="regions-liste-card">
              <h3 style="color:var(--vert)">🇧🇫 Les 17 nouvelles régions</h3>
              <ul id="nouvelles-regions-list">
                <!-- Généré par JS -->
              </ul>
            </div>
          </div>

          <!-- Objectifs -->
          <div class="section-header reveal" style="margin-top: var(--sp-10)">
            <span class="section-tag">Objectifs</span>
            <h2>Pourquoi cette réforme ?</h2>
            <div class="color-bar"><span></span><span></span><span></span></div>
          </div>

          <div class="objectifs-grid reveal">
            <div class="objectif-card">
              <div class="objectif-icon">🌍</div>
              <h3>Identité culturelle</h3>
              <p>Adopter des noms en langues nationales pour honorer le patrimoine culturel burkinabè et renforcer le sentiment d'appartenance.</p>
            </div>
            <div class="objectif-card">
              <div class="objectif-icon">📊</div>
              <h3>Gouvernance locale</h3>
              <p>Améliorer l'administration de proximité et rapprocher l'État des citoyens pour une meilleure prise en charge des besoins.</p>
            </div>
            <div class="objectif-card">
              <div class="objectif-icon">⚖️</div>
              <h3>Équité territoriale</h3>
              <p>Rééquilibrer le développement entre régions et réduire les disparités régionales en matière d'infrastructures et de services.</p>
            </div>
            <div class="objectif-card">
              <div class="objectif-icon">🔗</div>
              <h3>Cohésion nationale</h3>
              <p>Renforcer le sentiment d'appartenance et la solidarité entre les différentes communautés ethniques et linguistiques.</p>
            </div>
          </div>

          <!-- Tableau correspondance -->
          <div class="section-header reveal" style="margin-top: var(--sp-10)">
            <span class="section-tag">Correspondance</span>
            <h2>Anciens noms → Nouveaux noms</h2>
            <div class="color-bar"><span></span><span></span><span></span></div>
          </div>

          <div class="correspondance-table-wrapper reveal">
            <table class="correspondance-table" id="correspondance-table">
              <thead>
                <tr>
                  <th>Ancien nom (13 régions)</th>
                  <th>Nouveau nom endogène</th>
                  <th>Signification</th>
                  <th>Chef-lieu</th>
                </tr>
              </thead>
              <tbody>
                <!-- Généré par JS -->
              </tbody>
            </table>
          </div>

          <!-- CTA -->
          <div class="reforme-cta reveal" style="margin-top: var(--sp-8)">
            <a href="/regions" class="btn btn-primary">Explorer les 17 régions →</a>
            <a href="/carte" class="btn btn-outline">Voir la carte interactive</a>
          </div>

        </main>

        <!-- SIDEBAR -->
        <aside class="reforme-sidebar">
          <div class="info-card stats-reforme-card">
            <h3>📊 En chiffres</h3>
            <div class="stats-list">
              <div class="stat-row">
                <span class="stat-key">📅 Année de réforme</span>
                <span class="stat-val">2024</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">📈 Régions créées</span>
                <span class="stat-val">+4</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">🗣️ Langues représentées</span>
                <span class="stat-val">8+</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">👥 Population concernée</span>
                <span class="stat-val">22M</span>
              </div>
              <div class="stat-row">
                <span class="stat-key">📐 Superficie totale</span>
                <span class="stat-val">274 200 km²</span>
              </div>
            </div>
          </div>

          <div class="info-card">
            <h3>🔗 Navigation</h3>
            <a href="/regions" class="btn btn-primary" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>🗺️</span> Voir les 17 régions
            </a>
            <a href="/carte" class="btn btn-outline" style="width:100%;justify-content:center;margin-bottom:8px">
              <span>📍</span> Carte interactive
            </a>
            <a href="/comparer" class="btn btn-ghost" style="width:100%;justify-content:center">
              <span>⚖️</span> Comparer
            </a>
          </div>

          <div class="info-card">
            <h3>📚 Sources</h3>
            <ul class="sources-list">
              <li>Journal Officiel du Burkina Faso, 2024</li>
              <li>Ministère de l'Administration Territoriale</li>
              <li>INSD — Institut National de la Statistique</li>
              <li>WikiProject Burkina Faso</li>
            </ul>
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
<script src="/js/reforme.js"></script>
</body>
</html>