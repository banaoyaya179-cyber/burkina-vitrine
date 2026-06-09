/* ══════════════════════════════════════════
   REGION.JS — Fiche région détaillée (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';
  let currentRegion = null;

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  async function init() {
    const slug = getUrlParam('region');
    if (!slug) { showError('Aucune région spécifiée.'); return; }

    try {
      const response = await fetch(`${API}/regions/${slug}`);
      if (!response.ok) throw new Error('Région introuvable');
      currentRegion = await response.json();

      // Parser les champs JSON stockés en string
      currentRegion.langues = parseJson(currentRegion.langues);
      currentRegion.peuples = parseJson(currentRegion.peuples);
      currentRegion.voisins = parseJson(currentRegion.voisins);

      document.title = currentRegion.nom + ' — Burkina Faso';
      renderHero();
      renderIdentite();
      renderProvinces();
      renderSites();
      renderRichesses();
      renderCulture();
      renderGalerie();
      renderSidebar();
      renderVoisins();
      initMeteo();
      initCommentaires();
      initLightbox();

      if (window.initScrollReveal) setTimeout(initScrollReveal, 150);
      if (window.initShareButtons) initShareButtons();

    } catch (err) {
      showError('Région introuvable : ' + slug);
    }
  }

  function parseJson(val) {
    if (!val) return [];
    if (Array.isArray(val)) return val;
    try { return JSON.parse(val); } catch { return []; }
  }

  function getUrlParam(key) {
    return new URLSearchParams(window.location.search).get(key);
  }

  // ══════════════════════════════════════════
  // HERO
  // ══════════════════════════════════════════

  function renderHero() {
    const r = currentRegion;

    const bg = document.getElementById('region-hero-bg');
    if (bg) bg.style.backgroundImage = `url('/${r.image_hero}')`;

    set('region-nom',     r.nom);
    set('region-slogan',  r.slogan || '');
    set('breadcrumb-nom', r.nom);

    const badge = document.getElementById('region-badge');
    if (badge) badge.textContent = r.zone;

    const ancien = document.getElementById('region-ancien-nom');
    if (ancien) ancien.textContent = 'ex-' + (r.ancien_nom || '');

    const btnComp = document.getElementById('btn-comparer');
    if (btnComp) btnComp.href = `/comparer?r1=${r.slug}`;
    const btnCompSb = document.getElementById('btn-comparer-sidebar');
    if (btnCompSb) btnCompSb.href = `/comparer?r1=${r.slug}`;
  }

  // ══════════════════════════════════════════
  // IDENTITÉ
  // ══════════════════════════════════════════

  function renderIdentite() {
    const r = currentRegion;
    set('stat-chef-lieu',  r.chef_lieu);
    set('stat-superficie', Number(r.superficie).toLocaleString('fr-FR') + ' km²');
    set('stat-population', Number(r.population).toLocaleString('fr-FR'));
    set('stat-densite',    r.densite + ' hab/km²');
    set('stat-climat',     r.climat);
    set('stat-vegetation', r.vegetation);
    set('region-description', r.description);
  }

  // ══════════════════════════════════════════
  // PROVINCES
  // ══════════════════════════════════════════

  function renderProvinces() {
    const r  = currentRegion;
    const el = document.getElementById('provinces-grid');
    if (!el || !r.provinces?.length) return;

    el.innerHTML = r.provinces.map((p, i) => `
      <a href="/province?province=${encodeURIComponent(p.nom)}"
         class="province-mini-card reveal" style="transition-delay:${i*60}ms">
        <h4>${p.nom}</h4>
        <p>🏛️ ${p.chef_lieu}</p>
        <div class="province-mini-stats">
          <span>${Number(p.superficie).toLocaleString('fr-FR')} km²</span>
          <span>${fmt(p.population)} hab.</span>
        </div>
      </a>
    `).join('');
  }

  // ══════════════════════════════════════════
  // SITES TOURISTIQUES
  // ══════════════════════════════════════════

  function renderSites() {
    const r  = currentRegion;
    const el = document.getElementById('sites-grid');
    if (!el || !r.sites?.length) return;

    el.innerHTML = r.sites.map((s, i) => `
      <div class="site-card reveal" style="transition-delay:${i*80}ms">
        <div class="site-img">
          <img src="/${s.image}" alt="${s.nom}" loading="lazy"
               onerror="this.src='/images/placeholder.jpg'">
          <span class="badge badge-${s.importance === 'mondial' ? 'rouge' :
                                     s.importance === 'national' ? 'vert' : 'jaune'}"
                style="position:absolute;top:8px;left:8px">${s.importance}</span>
        </div>
        <div class="site-body">
          <h4>${s.nom}</h4>
          <p>${s.description}</p>
        </div>
      </div>
    `).join('');

    set('sidebar-sites', r.sites.length);
  }

  // ══════════════════════════════════════════
// RICHESSES & ÉCONOMIE
// ══════════════════════════════════════════

 function renderRichesses() {
    const r  = currentRegion;
    const el = document.getElementById('richesses-grid');
    if (!el || !r.richesses?.length) return;

    set('potentiel-economique',
        `${r.nom} dispose de nombreuses richesses réparties en ${r.richesses.length} secteurs.`);

    el.innerHTML = r.richesses.map((rich, i) => {
        const items = Array.isArray(rich.items)
            ? rich.items
            : parseJson(rich.items);
        return `
            <div class="richesse-card reveal" style="transition-delay:${i*80}ms">
                <span class="richesse-icon">${rich.icon || '💎'}</span>
                <h4>${rich.categorie}</h4>
                <ul>${items.map(it => `<li>${it}</li>`).join('')}</ul>
            </div>
        `;
    }).join('');
 }
  // ══════════════════════════════════════════
  // CULTURE (festivals)
  // ══════════════════════════════════════════

  function renderCulture() {
    const r = currentRegion;

    const festEl = document.getElementById('festivals-grid');
    if (festEl && r.festivals?.length) {
      festEl.innerHTML = r.festivals.map((f, i) => `
        <div class="festival-card reveal" style="transition-delay:${i*80}ms">
          <span class="festival-icon">${f.type === 'Cinéma' ? '🎬' :
                                        f.type === 'Musical' ? '🎵' :
                                        f.type === 'Artisanat' ? '🎨' :
                                        f.type === 'Théâtre' ? '🎭' : '🌾'}</span>
          <h4>${f.nom}</h4>
          <p class="festival-periode">📅 ${f.periode}</p>
          <p>${f.description}</p>
        </div>
      `).join('');
      set('sidebar-festivals', r.festivals.length);
    } else {
      hide('section-festivals');
    }

    // Sections non migrées en BDD — masquer si vides
    if (!document.getElementById('danses-grid')?.children.length)  hide('section-danses');
    if (!document.getElementById('masques-grid')?.children.length) hide('section-masques');
  }

  // ══════════════════════════════════════════
  // GALERIE
  // ══════════════════════════════════════════

  function renderGalerie() {
    const r  = currentRegion;
    const el = document.getElementById('galerie-grid');
    if (!el || !r.galerie?.length) { hide('section-galerie'); return; }

    el.innerHTML = r.galerie.map((img, i) => `
      <div class="galerie-item reveal" data-index="${i}"
           style="transition-delay:${i*60}ms;cursor:pointer">
        <img src="/${img.src}" alt="${img.alt}" loading="lazy"
             onerror="this.src='/images/placeholder.jpg'">
        <div class="galerie-item-overlay">
          <span>${img.titre}</span>
        </div>
      </div>
    `).join('');
  }

  // ══════════════════════════════════════════
  // SIDEBAR
  // ══════════════════════════════════════════

  function renderSidebar() {
    const r = currentRegion;

    const langEl = document.getElementById('region-langues');
    if (langEl) {
      langEl.innerHTML = r.langues.map(l =>
        `<span class="tag">${l}</span>`).join('');
    }

    const peupEl = document.getElementById('region-peuples');
    if (peupEl) {
      peupEl.innerHTML = r.peuples.map(p =>
        `<span class="tag tag-peuple">${p}</span>`).join('');
    }

    set('sidebar-provinces', r.provinces?.length || 0);

    const carteEl = document.getElementById('carte-mini');
    if (carteEl && r.image_mini_carte) {
      carteEl.innerHTML = `
        <img src="/${r.image_mini_carte}" alt="Carte ${r.nom}" loading="lazy"
             style="width:100%;height:auto;border-radius:8px"
             onerror="this.style.display='none'">`;
    }
  }

  // ══════════════════════════════════════════
  // VOISINS — depuis l'API
  // ══════════════════════════════════════════

  async function renderVoisins() {
    const r  = currentRegion;
    const el = document.getElementById('voisins-list');
    if (!el || !r.voisins?.length) return;

    try {
      const allRes = await fetch(`${API}/regions`);
      const allRegions = await allRes.json();

      el.innerHTML = r.voisins.map(vnom => {
        const v = allRegions.find(x =>
          x.nom.toLowerCase() === vnom.toLowerCase() ||
          x.slug.toLowerCase() === vnom.toLowerCase()
        );
        if (!v) return '';
        return `
          <a href="/region?region=${v.slug}" class="voisin-item">
            <img src="/${v.image_card}" alt="${v.nom}" loading="lazy"
                 onerror="this.src='/images/placeholder.jpg'">
            <div class="voisin-item-info">
              <h4>${v.nom}</h4>
              <p>${v.chef_lieu}</p>
            </div>
          </a>
        `;
      }).join('');
    } catch (err) {
      console.error('Erreur voisins:', err);
    }
  }

  // ══════════════════════════════════════════
  // MÉTÉO
  // ══════════════════════════════════════════

  const METEO_COORDS = {
    kadiogo:'12.3647,-1.5333', nando:'12.585,-1.151', nazinon:'11.666,-1.072',
    nakambe:'11.779,0.368',    kuilse:'13.088,-1.080', yaadga:'13.574,-2.423',
    liptako:'14.035,0.038',    sirba:'14.441,-0.234',  tapoa:'12.076,1.792',
    oubri:'12.060,0.359',      goulmou:'12.172,0.353', bankui:'12.360,-3.464',
    sourou:'12.952,-2.998',    guiriko:'11.177,-4.298',tannounyan:'10.633,-4.767',
    djoro:'10.900,-3.194',     soum:'14.098,-1.625',
  };

  function initMeteo() {
    const el = document.getElementById('meteo-content');
    if (!el) return;

    const coords = METEO_COORDS[currentRegion.slug];
    if (!coords) {
      el.innerHTML = '<p style="color:var(--text-muted);font-size:var(--sm)">Données non disponibles.</p>';
      return;
    }

    const [lat, lon] = coords.split(',');
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current_weather=true&daily=temperature_2m_max,temperature_2m_min,precipitation_sum&timezone=Africa%2FAbidjan&forecast_days=3`;

    el.innerHTML = '<p style="color:var(--text-muted);font-size:var(--sm);text-align:center">⏳ Chargement météo…</p>';

    fetch(url)
      .then(r => r.json())
      .then(data => {
        const cw   = data.current_weather;
        const maxT = data.daily?.temperature_2m_max?.[0] ?? '—';
        const minT = data.daily?.temperature_2m_min?.[0] ?? '—';
        const rain = data.daily?.precipitation_sum?.[0]  ?? 0;
        const icon = cw.temperature > 35 ? '🌡️' : cw.temperature > 25 ? '☀️' : '🌤️';

        el.innerHTML = `
          <div style="text-align:center">
            <div style="font-size:2.5rem">${icon}</div>
            <div style="font-size:2rem;font-weight:800;color:var(--rouge)">${cw.temperature}°C</div>
            <div style="font-size:var(--sm);color:var(--text-muted);margin:4px 0">
              Min ${minT}° / Max ${maxT}°
            </div>
            <div style="font-size:var(--xs);color:var(--text-muted)">
              ${rain > 0 ? `🌧️ ${rain} mm` : '☀️ Pas de précipitations'}
            </div>
            <div style="font-size:var(--xs);color:var(--text-muted);margin-top:8px">
              ${currentRegion.chef_lieu} — via Open-Meteo
            </div>
          </div>
        `;
      })
      .catch(() => {
        el.innerHTML = '<p style="color:var(--text-muted);font-size:var(--sm);text-align:center">📡 Connexion requise.</p>';
      });
  }

  // ══════════════════════════════════════════
  // COMMENTAIRES
  // ══════════════════════════════════════════

  function initCommentaires() {
    const submitBtn = document.getElementById('btn-comment-submit');
    const listEl    = document.getElementById('commentaires-list');
    if (!listEl) return;

    function loadComments() {
      try {
        const key  = `comments-${currentRegion.slug}`;
        const data = JSON.parse(localStorage.getItem(key) || '[]');
        if (!data.length) {
          listEl.innerHTML = '<p style="color:var(--text-muted);font-size:var(--sm)">Aucun commentaire pour l\'instant.</p>';
          return;
        }
        listEl.innerHTML = data.map(c => `
          <div class="commentaire-item">
            <div class="commentaire-header">
              <strong>${c.nom}</strong>
              <span style="font-size:var(--xs);color:var(--text-muted)">${c.date}</span>
            </div>
            <p>${c.texte}</p>
          </div>
        `).join('');
      } catch(e) {}
    }

    loadComments();

    if (submitBtn) {
      submitBtn.addEventListener('click', () => {
        const nom   = document.getElementById('comment-nom')?.value.trim();
        const texte = document.getElementById('comment-text')?.value.trim();
        if (!nom || !texte) return;

        try {
          const key  = `comments-${currentRegion.slug}`;
          const data = JSON.parse(localStorage.getItem(key) || '[]');
          data.unshift({ nom, texte, date: new Date().toLocaleDateString('fr-FR') });
          localStorage.setItem(key, JSON.stringify(data));
          document.getElementById('comment-nom').value  = '';
          document.getElementById('comment-text').value = '';
          loadComments();
          if (window.showToast) showToast('Commentaire ajouté !');
        } catch(e) {}
      });
    }
  }

  // ══════════════════════════════════════════
  // LIGHTBOX
  // ══════════════════════════════════════════

  function initLightbox() {
    const galEl = document.getElementById('galerie-grid');
    if (!galEl) return;

    galEl.addEventListener('click', e => {
      const item = e.target.closest('.galerie-item');
      if (!item) return;
      const idx = parseInt(item.dataset.index, 10);
      const lb  = document.getElementById('lightbox');
      if (!lb || !currentRegion.galerie?.[idx]) return;

      const img    = currentRegion.galerie[idx];
      const lbImg  = lb.querySelector('.lightbox-img') || lb.querySelector('img');
      const lbCap  = lb.querySelector('.lightbox-caption') || lb.querySelector('.caption');
      if (lbImg) { lbImg.src = '/' + img.src; lbImg.alt = img.alt; }
      if (lbCap) lbCap.textContent = img.titre;
      lb.classList.add('active');
      document.body.style.overflow = 'hidden';
    });

    document.addEventListener('keydown', e => {
      const lb = document.getElementById('lightbox');
      if (lb?.classList.contains('active') && e.key === 'Escape') {
        lb.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }

  // ══════════════════════════════════════════
  // HELPERS
  // ══════════════════════════════════════════

  function set(id, val) {
    const el = document.getElementById(id);
    if (el) el.textContent = val;
  }

  function hide(id) {
    const el = document.getElementById(id);
    if (el) el.style.display = 'none';
  }

  function fmt(n) {
    if (!n) return '0';
    if (n >= 1e6) return (n/1e6).toFixed(1).replace('.0','') + 'M';
    if (n >= 1e3) return Math.round(n/1e3) + 'K';
    return String(n);
  }

  function showError(msg) {
    document.title = 'Erreur — Burkina Faso';
    const main = document.querySelector('.region-content') || document.body;
    main.innerHTML = `
      <div style="text-align:center;padding:80px 20px">
        <div style="font-size:3rem;margin-bottom:16px">❌</div>
        <h1>Région introuvable</h1>
        <p style="color:var(--text-muted);margin:16px 0">${msg}</p>
        <a href="/regions" class="btn btn-primary">Voir toutes les régions</a>
      </div>`;
  }

  // ══════════════════════════════════════════
  // DÉMARRAGE
  // ══════════════════════════════════════════

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
