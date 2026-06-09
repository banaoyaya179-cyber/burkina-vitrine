/* ══════════════════════════════════════════
   PROVINCE.JS — Fiche province (version API)
══════════════════════════════════════════ */
(function() {
  'use strict';

  const API = '/api';
  let currentProvince = null;
  let parentRegion    = null;

  async function init() {
    const nom = new URLSearchParams(window.location.search).get('province');
    if (!nom) { showError('Aucune province spécifiée'); return; }

    try {
      // Chercher la province dans toutes les régions
      const resRegions = await fetch(`${API}/regions`);
      const regions    = await resRegions.json();

      for (const r of regions) {
        const detail = await fetch(`${API}/regions/${r.slug}`).then(res => res.json());
        const found  = (detail.provinces || []).find(
          p => p.nom.toLowerCase() === nom.toLowerCase()
        );
        if (found) {
          currentProvince = found;
          parentRegion    = detail;
          parentRegion.langues = parseJson(detail.langues);
          parentRegion.peuples = parseJson(detail.peuples);
          break;
        }
      }

      if (!currentProvince) { showError('Province non trouvée : ' + nom); return; }

      document.title = currentProvince.nom + ' — Burkina Faso';
      renderHero();
      renderStats();
      renderDescription();
      renderLanguesEthnies();
      renderSites();
      renderGalerie();
      renderSidebar();

      if (window.initScrollReveal) setTimeout(initScrollReveal, 100);
    } catch(err) {
      showError('Erreur : ' + err.message);
    }
  }

  function parseJson(val) {
    if (!val) return [];
    if (Array.isArray(val)) return val;
    try { return JSON.parse(val); } catch { return []; }
  }

  function renderHero() {
    const p = currentProvince;
    const r = parentRegion;

    const bg = document.getElementById('province-hero-bg');
    if (bg && r) bg.style.backgroundImage = `url('/${r.image_hero}')`;

    const crumb = document.getElementById('breadcrumb-nom');
    if (crumb) crumb.textContent = p.nom;

    const titre = document.getElementById('province-nom');
    if (titre) titre.textContent = p.nom;

    const chef = document.getElementById('province-chef-lieu');
    if (chef) chef.textContent = '🏛️ Chef-lieu : ' + p.chef_lieu;

    const badge = document.getElementById('province-region-badge');
    if (badge) badge.textContent = r ? r.nom : '';

    const link = document.getElementById('province-region-link');
    if (link && r) { link.textContent = 'Voir ' + r.nom; link.href = `/region?region=${r.slug}`; }
  }

  function renderStats() {
    const p = currentProvince;
    const densite = p.superficie > 0 ? Math.round(p.population / p.superficie) : 0;
    set('stat-population', fmt(p.population));
    set('stat-superficie', Number(p.superficie).toLocaleString('fr-FR'));
    set('stat-densite',    densite.toLocaleString('fr-FR'));
  }

  function renderDescription() {
    const p  = currentProvince;
    const r  = parentRegion;
    const el = document.getElementById('province-description');
    if (!el) return;
    el.textContent = p.description ||
      (r ? `Province de la région ${r.nom}, chef-lieu : ${p.chef_lieu}.`
         : `Province du Burkina Faso, chef-lieu : ${p.chef_lieu}.`);
  }

  function renderLanguesEthnies() {
    const r   = parentRegion;
    const sec = document.getElementById('section-langues');
    if (!r) { if (sec) sec.style.display = 'none'; return; }

    const langEl = document.getElementById('province-langues');
    if (langEl) langEl.innerHTML = r.langues.map(l => `<span class="tag">${l}</span>`).join('');

    const popEl = document.getElementById('province-populations');
    if (popEl) popEl.innerHTML = r.peuples.map(p => `<span class="tag tag-peuple">${p}</span>`).join('');
  }

  function renderSites() {
    const r   = parentRegion;
    const sec = document.getElementById('section-sites');
    const el  = document.getElementById('province-sites');
    if (!r || !r.sites?.length) { if (sec) sec.style.display = 'none'; return; }
    if (!el) return;

    el.innerHTML = r.sites.map((s, i) => `
      <div class="site-card reveal" style="transition-delay:${i*80}ms">
        <div class="site-img">
          <img src="/${s.image}" alt="${s.nom}" loading="lazy"
               onerror="this.src='/images/placeholder.jpg'">
          <span class="badge badge-rouge" style="position:absolute;top:8px;left:8px">${s.importance}</span>
        </div>
        <div class="site-body"><h4>${s.nom}</h4><p>${s.description}</p></div>
      </div>
    `).join('');
  }

  function renderGalerie() {
    const r   = parentRegion;
    const sec = document.getElementById('section-galerie');
    const el  = document.getElementById('province-galerie');
    if (!r || !r.galerie?.length) { if (sec) sec.style.display = 'none'; return; }
    if (!el) return;

    el.innerHTML = r.galerie.map((img, i) => `
      <div class="galerie-item reveal" style="transition-delay:${i*80}ms">
        <img src="/${img.src}" alt="${img.alt}" loading="lazy"
             onerror="this.src='/images/placeholder.jpg'">
        <div class="galerie-overlay"><span>${img.titre}</span></div>
      </div>
    `).join('');
  }

  function renderSidebar() {
    const p = currentProvince;
    const r = parentRegion;
    if (r) {
      const img  = document.getElementById('region-parent-img');
      const nom  = document.getElementById('region-parent-nom');
      const chef = document.getElementById('region-parent-chef');
      const link = document.getElementById('region-parent-link');
      if (img)  { img.src = '/' + r.image_card; img.alt = r.nom; }
      if (nom)  nom.textContent = r.nom;
      if (chef) chef.textContent = 'Chef-lieu : ' + r.chef_lieu;
      if (link) { link.href = `/region?region=${r.slug}`; link.textContent = 'Explorer ' + r.nom + ' →'; }
    }

    const voisinsList = document.getElementById('voisins-list');
    if (voisinsList && r) {
      const soeurs = (r.provinces || []).filter(prov => prov.nom !== p.nom);
      voisinsList.innerHTML = soeurs.length
        ? soeurs.map(s => `
            <a href="/province?province=${encodeURIComponent(s.nom)}" class="voisin-item">
              <div class="voisin-item-info"><h4>${s.nom}</h4><p>${s.chef_lieu}</p></div>
            </a>`).join('')
        : '<p style="color:var(--text-muted);font-size:var(--sm)">Aucune autre province.</p>';
    }
  }

  function set(id, val) { const el = document.getElementById(id); if (el) el.textContent = val; }
  function fmt(n) {
    if (!n) return '0';
    if (n >= 1e6) return (n/1e6).toFixed(1).replace('.0','') + 'M';
    if (n >= 1e3) return Math.round(n/1e3) + 'K';
    return String(n);
  }

  function showError(msg) {
    const main = document.querySelector('.province-content') || document.body;
    main.innerHTML = `<div style="text-align:center;padding:80px 20px">
      <div style="font-size:3rem">❌</div>
      <h1>Province introuvable</h1>
      <p style="color:var(--text-muted);margin:16px 0">${msg}</p>
      <a href="/provinces" class="btn btn-primary">Voir toutes les provinces</a>
    </div>`;
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else { init(); }
})();
