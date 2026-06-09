/* ══════════════════════════════════════════
   REGIONS.JS — Catalogue des 17 régions (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';

  let currentZone = 'Toutes';
  let currentSort = 'nom';
  let searchQuery = '';
  let allRegions  = [];

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  async function init() {
    try {
      const response = await fetch(`${API}/regions`);
      allRegions = await response.json();

      // Parser les champs JSON stockés en string
      allRegions = allRegions.map(r => ({
        ...r,
        langues:  parseJson(r.langues),
        peuples:  parseJson(r.peuples),
        voisins:  parseJson(r.voisins),
        provinces: r.provinces || [],
        sites:     r.sites     || [],
      }));

      initSearch();
      initFilters();
      initSort();
      renderRegions();
    } catch (err) {
      console.error('Erreur chargement régions:', err);
    }
  }

  function parseJson(val) {
    if (!val) return [];
    if (Array.isArray(val)) return val;
    try { return JSON.parse(val); } catch { return []; }
  }

  // ══════════════════════════════════════════
  // RENDU
  // ══════════════════════════════════════════

  function renderRegions() {
    const grid    = document.getElementById('regions-grid');
    const countEl = document.getElementById('results-count');
    const empty   = document.getElementById('empty-state');
    if (!grid) return;

    let filtered = filterRegions();
    filtered     = sortRegions(filtered);

    if (countEl) countEl.textContent =
      `${filtered.length} région${filtered.length > 1 ? 's' : ''} trouvée${filtered.length > 1 ? 's' : ''}`;

    if (empty) empty.style.display = filtered.length === 0 ? 'block' : 'none';
    grid.innerHTML = '';
    if (!filtered.length) return;

    filtered.forEach((region, index) => grid.appendChild(createRegionCard(region, index)));

    if (window.initScrollReveal) setTimeout(initScrollReveal, 100);
  }

  function createRegionCard(region, index) {
    const card = document.createElement('a');
    card.href  = `/region?region=${region.slug}`;
    card.className = 'region-card reveal';
    card.style.transitionDelay = `${(index % 4) * 100}ms`;

    card.innerHTML = `
      <div class="region-card-img">
        <img src="/${region.image_card}" alt="${region.nom}" loading="lazy"
             onerror="this.src='/images/placeholder.jpg'">
        <span class="badge badge-rouge region-card-zone-badge">${region.zone}</span>
      </div>
      <div class="region-card-body">
        <h3>
          ${region.nom}
          <span class="region-card-ancien-nom">(${region.ancien_nom || ''})</span>
        </h3>
        <p class="region-card-slogan">${region.slogan || ''}</p>
        <div class="region-card-stats">
          <div class="region-card-stat">
            <span class="region-card-stat-value">${fmt(region.population)}</span>
            <span class="region-card-stat-label">Habitants</span>
          </div>
          <div class="region-card-stat">
            <span class="region-card-stat-value">${Number(region.superficie).toLocaleString('fr-FR')}</span>
            <span class="region-card-stat-label">km²</span>
          </div>
          <div class="region-card-stat">
            <span class="region-card-stat-value">${region.densite}</span>
            <span class="region-card-stat-label">hab/km²</span>
          </div>
        </div>
      </div>
    `;
    return card;
  }

  // ══════════════════════════════════════════
  // FILTRAGE
  // ══════════════════════════════════════════

  function filterRegions() {
    return allRegions.filter(r => {
      if (currentZone !== 'Toutes' && r.zone !== currentZone) return false;
      if (searchQuery) {
        const q = searchQuery.toLowerCase();
        return r.nom.toLowerCase().includes(q)
            || (r.ancien_nom || '').toLowerCase().includes(q)
            || (r.chef_lieu  || '').toLowerCase().includes(q)
            || (r.zone       || '').toLowerCase().includes(q)
            || (r.description|| '').toLowerCase().includes(q)
            || r.langues.some(l => l.toLowerCase().includes(q))
            || r.peuples.some(p => p.toLowerCase().includes(q));
      }
      return true;
    });
  }

  // ══════════════════════════════════════════
  // TRI
  // ══════════════════════════════════════════

  function sortRegions(regions) {
    return [...regions].sort((a, b) => {
      switch (currentSort) {
        case 'population': return b.population - a.population;
        case 'superficie': return b.superficie - a.superficie;
        case 'densite':    return b.densite    - a.densite;
        default:           return a.nom.localeCompare(b.nom, 'fr');
      }
    });
  }

  // ══════════════════════════════════════════
  // RECHERCHE + SUGGESTIONS
  // ══════════════════════════════════════════

  function initSearch() {
    const input       = document.getElementById('search-input');
    const suggestions = document.getElementById('search-suggestions');
    if (!input) return;

    input.addEventListener('input', debounce(e => {
      searchQuery = e.target.value.trim();
      renderRegions();
      if (suggestions) {
        if (searchQuery.length >= 2) showSuggestions(searchQuery, suggestions);
        else hideSuggestions(suggestions);
      }
    }, 250));

    document.addEventListener('click', e => {
      if (!e.target.closest('.search-wrapper') && suggestions) {
        hideSuggestions(suggestions);
      }
    });
  }

  function showSuggestions(query, box) {
    const q       = query.toLowerCase();
    const matches = [];

    allRegions.forEach(r => {
      if (r.nom.toLowerCase().includes(q) || (r.chef_lieu || '').toLowerCase().includes(q)) {
        matches.push({
          nom:    r.nom,
          detail: `${r.chef_lieu} • ${r.zone}`,
          url:    `/region?region=${r.slug}`,
          image:  r.image_card
        });
      }
    });

    const limited = matches.slice(0, 8);
    if (!limited.length) {
      box.innerHTML = '<div class="suggestion-empty">Aucune suggestion</div>';
    } else {
      box.innerHTML = limited.map(m => `
        <a href="${m.url}" class="suggestion-item">
          ${m.image
            ? `<img src="/${m.image}" alt="${m.nom}" loading="lazy">`
            : '<span style="font-size:1.25rem">📍</span>'}
          <div class="suggestion-item-info">
            <h4>${highlight(m.nom, query)}</h4>
            <p>${m.detail}</p>
          </div>
        </a>
      `).join('');
    }
    box.classList.add('active');
  }

  function hideSuggestions(box) { box.classList.remove('active'); }

  function highlight(text, query) {
    const re = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
    return text.replace(re, '<mark>$1</mark>');
  }

  // ══════════════════════════════════════════
  // FILTRES PAR ZONE
  // ══════════════════════════════════════════

  function initFilters() {
    const buttons = document.querySelectorAll('.filtre-pill[data-zone]');
    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        currentZone = btn.dataset.zone;
        buttons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        renderRegions();
      });
    });
  }

  // ══════════════════════════════════════════
  // TRI SELECT
  // ══════════════════════════════════════════

  function initSort() {
    const select = document.getElementById('tri-select');
    if (!select) return;
    select.addEventListener('change', e => {
      currentSort = e.target.value;
      renderRegions();
    });
  }

  // ══════════════════════════════════════════
  // RESET
  // ══════════════════════════════════════════

  window.resetFilters = function() {
    currentZone = 'Toutes';
    searchQuery = '';
    currentSort = 'nom';

    const input = document.getElementById('search-input');
    if (input) input.value = '';

    const suggestions = document.getElementById('search-suggestions');
    if (suggestions) hideSuggestions(suggestions);

    const btns = document.querySelectorAll('.filtre-pill[data-zone]');
    btns.forEach((b, i) => b.classList.toggle('active', i === 0));

    const sel = document.getElementById('tri-select');
    if (sel) sel.value = 'nom';

    renderRegions();
  };

  // ══════════════════════════════════════════
  // HELPERS
  // ══════════════════════════════════════════

  function fmt(n) {
    if (!n) return '0';
    if (n >= 1000000) return (n / 1000000).toFixed(1).replace('.0', '') + 'M';
    if (n >= 1000)    return Math.round(n / 1000) + 'K';
    return String(n);
  }

  function debounce(fn, delay) {
    let t;
    return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), delay); };
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
