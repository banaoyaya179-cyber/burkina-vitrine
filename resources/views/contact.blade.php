<!DOCTYPE html>
<html lang="fr" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Contactez-nous — Burkina Faso Vitrine Régionale. Projet académique de développement web statique 2025-2026.">
  <title>Contact — Burkina Faso</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="/css/variables.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/animations.css">
  <link rel="stylesheet" href="/css/contact.css">
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
      <a href="/contact" class="nav-link active">Contact</a>
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
  <div class="page-hero page-hero-contact">
    <div class="container">
      <h1>✉️ Contact</h1>
      <p>Une question, une suggestion ? Écrivez-nous !</p>
    </div>
  </div>

  <section class="contact-page">
    <div class="container">
      <div class="contact-layout">

        <!-- Infos contact -->
        <div class="contact-info reveal">
          <h2>Nous contacter</h2>
          <div class="color-bar" style="margin:var(--sp-2) 0 var(--sp-3)"><span></span><span></span><span></span></div>
          <p>
            Ce projet est réalisé dans le cadre du cours de développement web statique 2025-2026.
            Pour toute question sur le site ou pour signaler une information incorrecte sur une région,
            utilisez ce formulaire.
          </p>

          <div class="contact-details">
            <div class="contact-detail">
              <div class="contact-detail-icon">🎓</div>
              <div>
                <div class="contact-detail-title">Projet académique</div>
                <div class="contact-detail-desc">Cours Développement Web Statique 2025-2026</div>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-detail-icon">🗺️</div>
              <div>
                <div class="contact-detail-title">Burkina Faso</div>
                <div class="contact-detail-desc">Koudougou, Burkina Faso</div>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-detail-icon">🌐</div>
              <div>
                <div class="contact-detail-title">Site web statique</div>
                <div class="contact-detail-desc">HTML, CSS, JavaScript pur — 100% offline</div>
              </div>
            </div>

            <div class="contact-detail">
              <div class="contact-detail-icon">📧</div>
              <div>
                <div class="contact-detail-title">Email direct</div>
                <div class="contact-detail-desc">
                  <a href="mailto:contact@burkina-faso-vitrine.local?subject=Contact%20-%20Vitrine%20Burkina%20Faso">contact@burkina-faso-vitrine.local</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Thèmes populaires -->
          <div class="contact-topics">
            <p class="contact-topics-title">Sujets fréquents :</p>
            <div class="contact-topics-tags">
              <span class="badge badge-rouge">Données régions</span>
              <span class="badge badge-vert">Photos manquantes</span>
              <span class="badge badge-jaune">Suggestions</span>
              <span class="badge badge-rouge">Correction erreur</span>
              <span class="badge badge-vert">Nouveau site</span>
              <span class="badge badge-jaune">Bug technique</span>
            </div>
          </div>

          <!-- Mini-carte SVG localisation -->
          <div class="contact-map">
            <h3>📍 Localisation — Région de Nando</h3>
            <img
              src="/images/regions/nando/mini-carte.jpg"
              alt="Carte de la région de Nando — Koudougou"
              style="width:100%;height:auto;border-radius:var(--radius);border:1px solid var(--border)"
              onerror="this.style.display='none'"
            >
            <p style="font-size:var(--xs);color:var(--text-muted);margin-top:8px;text-align:center">
              📍 Koudougou — Université Norbert Zongo
            </p>
          </div>
        </div>

        <!-- Formulaire -->
        <div class="reveal">
          <form class="contact-form" id="contact-form" action="mailto:contact@burkina-faso-vitrine.local" method="POST" enctype="text/plain">
            
            <div class="form-row">
              <div class="form-group">
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre prénom" required>
              </div>
              <div class="form-group">
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom" required>
              </div>
            </div>

            <div class="form-group">
              <label for="email">Adresse e-mail *</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="votre@email.com" required>
            </div>

            <div class="form-group">
              <label for="sujet">Sujet *</label>
              <select id="sujet" name="sujet" class="form-control" required>
                <option value="">-- Choisir un sujet --</option>
                <option value="donnees">Correction de données</option>
                <option value="photos">Photos manquantes</option>
                <option value="suggestion">Suggestion d'amélioration</option>
                <option value="bug">Signaler un bug</option>
                <option value="partenariat">Proposition de partenariat</option>
                <option value="autre">Autre</option>
              </select>
            </div>

            <div class="form-group">
              <label for="region-concernee">Région concernée (optionnel)</label>
              <select id="region-concernee" name="region-concernee" class="form-control">
                <option value="">-- Choisir une région --</option>
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

            <div class="form-group">
              <label for="message">Message *</label>
              <textarea id="message" name="message" class="form-control" rows="6"
                        placeholder="Décrivez votre demande ou votre suggestion en détail..." required></textarea>
            </div>

            <div class="form-group form-checkbox">
              <input type="checkbox" id="consentement" name="consentement" required>
              <label for="consentement">J'accepte que mes données soient utilisées dans le cadre de ce projet académique.</label>
            </div>

            <button type="submit" class="btn btn-primary btn-submit" style="width:100%;justify-content:center">
              <span>✉️</span> Envoyer le message
            </button>

            <p class="form-note">
              <span>ℹ️</span> Ce formulaire utilise votre client email (Outlook, Gmail, etc.) pour envoyer le message. 
              Aucun serveur externe n'est requis — 100% offline.
            </p>

          </form>

          <!-- Message de succès (affiché après soumission) -->
          <div class="form-success" id="form-success">
            <div class="success-icon">✅</div>
            <h3>Message prêt à envoyer !</h3>
            <p>Votre client email va s'ouvrir avec le message pré-rempli. Vérifiez et envoyez.</p>
            <a href="/" class="btn btn-primary" style="margin-top:var(--sp-3);display:inline-flex">
              <span>←</span> Retour à l'accueil
            </a>
          </div>
        </div>

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
<script src="/js/contact.js"></script>
</body>
</html>