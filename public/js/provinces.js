/* ══════════════════════════════════════════
   PROVINCES.JS — Catalogue des provinces (version API)
══════════════════════════════════════════ */
(function() {
  'use strict';

  const API = '/api';

  let currentRegion = 'Toutes';
  let currentSort   = 'nom';
  let searchQuery   = '';
  let allProvinces  = [];
  let allRegions    = [];

  async function init() {
    try {
      const res = await fetch(`${API}/regions`);
      allRegions = await res.json();

      // Charger toutes les provinces depuis les détails de chaque région
      const details = await Promise.all(
        allRegions.map(r => fetch(`${API}/regions/${r.slug}`).then(res => res.json()))
      );

      allProvinces = [];
      details.forEach(region => {
        (region.provinces || []).forEach(p => {
          allProvinces.push({
            ...p,
            regionSlug: region.slug,
            regionNom:  region.nom,
            image_card: region.image_card,
          });
        });
      });

      initSearch();
      initFilters();
      initSort();
      renderProvinces();
    } catch(err) {
      console.error('Erreur provinces:', err);
    }
  }

  function renderProvinces() {
    const grid    = document.getElementById('provinces-grid');
    const countEl = document.getElementById('results-count');
    const empty   = document.getElementById('empty-state');
    if (!grid) return;

    let filtered = filterProvinces();
    filtered     = sortProvinces(filtered);

    if (countEl) countEl.textContent =
      `${filtered.length} province${filtered.length > 1 ? 's' : ''} trouvée${filtered.length > 1 ? 's' : ''}`;

    if (empty) empty.style.display = filtered.length === 0 ? 'block' : 'none';
    grid.innerHTML = '';
    if (!filtered.length) return;

    filtered.forEach((province, index) => grid.appendChild(createProvinceCard(province, index)));
    if (window.initScrollReveal) setTimeout(initScrollReveal, 100);
  }

  function createProvinceCard(province, index) {
    const card = document.createElement('a');
    card.href  = `/province?province=${encodeURIComponent(province.nom)}`;
    card.className = 'province-card reveal';
    card.style.transitionDelay = `${(index % 6) * 80}ms`;

    const densite = province.superficie > 0
      ? Math.round(province.population / province.superficie) : 0;

    card.innerHTML = `
      <div class="province-card-img">
        <img src="/${province.image_card}" alt="${province.nom}" loading="lazy"
             onerror="this.src='/images/placeholder.jpg'">
        <span class="badge badge-vert province-card-region-badge">${province.regionNom}</span>
      </div>
      <div class="province-card-body">
        <h3>${province.nom}</h3>
        <p class="province-card-chef">🏛️ ${province.chef_lieu}</p>
        <p class="province-card-description">${province.description || ''}</p>
        <div class="province-card-stats">
          <div class="province-card-stat">
            <span class="province-card-stat-value">${Number(province.superficie).toLocaleString('fr-FR')}</span>
            <span class="province-card-stat-label">km²</span>
          </div>
          <div class="province-card-stat">
            <span class="province-card-stat-value">${fmt(province.population)}</span>
            <span class="province-card-stat-label">Habitants</span>
          </div>
          <div class="province-card-stat">
            <span class="province-card-stat-value">${densite.toLocaleString('fr-FR')}</span>
            <span class="province-card-stat-label">hab/km²</span>
          </div>
        </div>
      </div>
    `;
    return card;
  }

  function filterProvinces() {
    return allProvinces.filter(p => {
      if (currentRegion !== 'Toutes' && p.regionSlug !== currentRegion) return false;
      if (searchQuery) {
        const q = searchQuery.toLowerCase();
        return p.nom.toLowerCase().includes(q)
            || (p.chef_lieu   || '').toLowerCase().includes(q)
            || (p.regionNom   || '').toLowerCase().includes(q)
            || (p.description || '').toLowerCase().includes(q);
      }
      return true;
    });
  }

  function sortProvinces(provinces) {
    return [...provinces].sort((a, b) => {
      switch (currentSort) {
        case 'population': return b.population - a.population;
        case 'superficie': return b.superficie - a.superficie;
        case 'region':     return a.regionNom.localeCompare(b.regionNom, 'fr');
        default:           return a.nom.localeCompare(b.nom, 'fr');
      }
    });
  }

  function initSearch() {
    const input = document.getElementById('search-input');
    if (!input) return;
    input.addEventListener('input', debounce(e => {
      searchQuery = e.target.value.trim();
      renderProvinces();
    }, 300));
  }

  function initFilters() {
    const buttons = document.querySelectorAll('.filtre-pill[data-region]');
    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        currentRegion = btn.dataset.region;
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        renderProvinces();
      });
    });
  }

  function initSort() {
    const select = document.getElementById('tri-select');
    if (!select) return;
    select.addEventListener('change', e => { currentSort = e.target.value; renderProvinces(); });
  }

  window.resetFilters = function() {
    currentRegion = 'Toutes'; searchQuery = ''; currentSort = 'nom';
    const input = document.getElementById('search-input');
    if (input) input.value = '';
    document.querySelectorAll('.filtre-pill[data-region]').forEach((b, i) => b.classList.toggle('active', i === 0));
    const sel = document.getElementById('tri-select');
    if (sel) sel.value = 'nom';
    renderProvinces();
  };

  function fmt(n) {
    if (!n) return '0';
    if (n >= 1e6) return (n/1e6).toFixed(1).replace('.0','') + 'M';
    if (n >= 1e3) return Math.round(n/1e3) + 'K';
    return String(n);
  }

  function debounce(fn, delay) {
    let t; return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), delay); };
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else { init(); }
})();
