/* ══════════════════════════════════════════
   COMPARER.JS — Comparaison 2 régions (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';
  let region1 = null;
  let region2 = null;
  let charts  = {};
  let allRegions = [];

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  async function init() {
    try {
      const res = await fetch(`${API}/regions`);
      allRegions = await res.json();

      populateSelects();
      bindEvents();

      const r1slug = getParam('r1');
      const r2slug = getParam('r2');
      const s1 = document.getElementById('select-r1');
      const s2 = document.getElementById('select-r2');

      if (r1slug && s1) {
        s1.value = r1slug;
        region1 = await fetchRegion(r1slug);
        updateSelectorImg('select-r1-img', region1);
      }
      if (r2slug && s2) {
        s2.value = r2slug;
        region2 = await fetchRegion(r2slug);
        updateSelectorImg('select-r2-img', region2);
      }
      if (region1 || region2) update();

    } catch (err) {
      console.error('Erreur init comparer:', err);
    }
  }

  async function fetchRegion(slug) {
    if (!slug) return null;
    const res = await fetch(`${API}/regions/${slug}`);
    if (!res.ok) return null;
    const r = await res.json();
    r.langues  = parseJson(r.langues);
    r.peuples  = parseJson(r.peuples);
    r.voisins  = parseJson(r.voisins);
    r.provinces = r.provinces || [];
    r.sites     = r.sites     || [];
    r.festivals = r.festivals || [];
    return r;
  }

  function parseJson(val) {
    if (!val) return [];
    if (Array.isArray(val)) return val;
    try { return JSON.parse(val); } catch { return []; }
  }

  // ══════════════════════════════════════════
  // SELECTS
  // ══════════════════════════════════════════

  function populateSelects() {
    const s1 = document.getElementById('select-r1');
    const s2 = document.getElementById('select-r2');
    if (!s1 || !s2) return;

    const opts = '<option value="">Choisir une région…</option>' +
      allRegions.map(r =>
        `<option value="${r.slug}">${r.nom} (${r.ancien_nom || ''})</option>`
      ).join('');

    s1.innerHTML = opts;
    s2.innerHTML = opts;
    updateSelectorImg('select-r1-img', null);
    updateSelectorImg('select-r2-img', null);
  }

  // ══════════════════════════════════════════
  // ÉVÉNEMENTS
  // ══════════════════════════════════════════

  function bindEvents() {
    const s1   = document.getElementById('select-r1');
    const s2   = document.getElementById('select-r2');
    const swap = document.getElementById('btn-swap');

    if (s1) s1.addEventListener('change', async () => {
      region1 = await fetchRegion(s1.value);
      updateSelectorImg('select-r1-img', region1);
      update();
    });

    if (s2) s2.addEventListener('change', async () => {
      region2 = await fetchRegion(s2.value);
      updateSelectorImg('select-r2-img', region2);
      update();
    });

    if (swap) swap.addEventListener('click', () => {
      const s1 = document.getElementById('select-r1');
      const s2 = document.getElementById('select-r2');
      const tmp = s1.value; s1.value = s2.value; s2.value = tmp;
      const tmpR = region1; region1 = region2; region2 = tmpR;
      updateSelectorImg('select-r1-img', region1);
      updateSelectorImg('select-r2-img', region2);
      update();
    });
  }

  function updateSelectorImg(id, region) {
    const img = document.getElementById(id);
    if (!img) return;
    if (region) { img.src = '/' + region.image_card; img.alt = region.nom; }
    else { img.src = ''; img.alt = ''; }
  }

  // ══════════════════════════════════════════
  // MISE À JOUR PRINCIPALE
  // ══════════════════════════════════════════

  function update() {
    const wrapper = document.getElementById('compare-table-wrapper');
    const actions = document.getElementById('compare-actions');

    if (!region1 || !region2) {
      if (wrapper) wrapper.innerHTML =
        '<p class="compare-placeholder">Sélectionnez deux régions pour commencer la comparaison.</p>';
      if (actions) actions.style.display = 'none';
      destroyCharts();
      return;
    }

    renderTable(wrapper);
    renderCharts();
    renderActions(actions);
  }

  // ══════════════════════════════════════════
  // TABLEAU COMPARATIF
  // ══════════════════════════════════════════

  function renderTable(wrapper) {
    if (!wrapper) return;
    const r1 = region1, r2 = region2;

    function win(v1, v2) {
      if (v1 > v2) return ['winner-region1', ''];
      if (v2 > v1) return ['', 'winner-region2'];
      return ['', ''];
    }

    const rows = [
      { label: 'Chef-lieu',         v1: r1.chef_lieu,  v2: r2.chef_lieu,  num: false },
      { label: 'Zone',              v1: r1.zone,       v2: r2.zone,       num: false },
      { label: 'Ancien nom',        v1: r1.ancien_nom, v2: r2.ancien_nom, num: false },
      { label: 'Population',        v1: Number(r1.population).toLocaleString('fr-FR'), v2: Number(r2.population).toLocaleString('fr-FR'), num: true, raw1: r1.population, raw2: r2.population },
      { label: 'Superficie (km²)',  v1: Number(r1.superficie).toLocaleString('fr-FR'), v2: Number(r2.superficie).toLocaleString('fr-FR'), num: true, raw1: r1.superficie, raw2: r2.superficie },
      { label: 'Densité (hab/km²)', v1: r1.densite,    v2: r2.densite,    num: true, raw1: r1.densite, raw2: r2.densite },
      { label: 'Provinces',         v1: r1.provinces.length, v2: r2.provinces.length, num: true, raw1: r1.provinces.length, raw2: r2.provinces.length },
      { label: 'Sites touristiques',v1: r1.sites.length,     v2: r2.sites.length,     num: true, raw1: r1.sites.length,     raw2: r2.sites.length },
      { label: 'Festivals',         v1: r1.festivals.length, v2: r2.festivals.length, num: true, raw1: r1.festivals.length, raw2: r2.festivals.length },
      { label: 'Langues',           v1: r1.langues.join(', '), v2: r2.langues.join(', '), num: false },
      { label: 'Climat',            v1: r1.climat,     v2: r2.climat,     num: false },
      { label: 'Végétation',        v1: r1.vegetation, v2: r2.vegetation, num: false },
    ];

    let html = '<div class="compare-table-header">';
    html += `<div class="compare-region-info r1">
      <img src="/${r1.image_card}" alt="${r1.nom}" onerror="this.style.display='none'">
      <h3>${r1.nom}</h3><p>${r1.chef_lieu}</p></div>`;
    html += `<div class="compare-region-info r2">
      <img src="/${r2.image_card}" alt="${r2.nom}" onerror="this.style.display='none'">
      <h3>${r2.nom}</h3><p>${r2.chef_lieu}</p></div>`;
    html += '</div>';

    html += `<table class="compare-table"><thead><tr>
      <th>Critère</th><th>${r1.nom}</th><th>${r2.nom}</th>
    </tr></thead><tbody>`;

    rows.forEach(row => {
      const cls = row.num ? win(row.raw1, row.raw2) : ['', ''];
      html += `<tr>
        <td class="critere-label">${row.label}</td>
        <td class="region1-val ${cls[0]}">${row.v1}</td>
        <td class="region2-val ${cls[1]}">${row.v2}</td>
      </tr>`;
    });

    html += '</tbody></table>';
    wrapper.innerHTML = html;
  }

  // ══════════════════════════════════════════
  // GRAPHIQUES
  // ══════════════════════════════════════════

  function renderCharts() {
    if (typeof Chart === 'undefined') return;
    const r1 = region1, r2 = region2;
    const colors       = ['rgba(239,51,64,0.8)', 'rgba(0,150,57,0.8)'];
    const borderColors = ['#EF3340', '#009639'];

    makeBar('chart-population', 'Population',    [r1.population, r2.population], [r1.nom, r2.nom], colors, borderColors);
    makeBar('chart-superficie', 'Superficie km²',[r1.superficie, r2.superficie], [r1.nom, r2.nom], colors, borderColors);
    makeBar('chart-densite',    'Densité hab/km²',[r1.densite,   r2.densite],    [r1.nom, r2.nom], colors, borderColors);
  }

  function makeBar(id, label, values, labels, bgColors, borderColors) {
    const canvas = document.getElementById(id);
    if (!canvas) return;
    if (charts[id]) charts[id].destroy();
    charts[id] = new Chart(canvas, {
      type: 'bar',
      data: {
        labels,
        datasets: [{ label, data: values, backgroundColor: bgColors, borderColor: borderColors, borderWidth: 2, borderRadius: 8 }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.05)' }, ticks: { color: '#9CA3AF' } },
          x: { grid: { display: false }, ticks: { color: '#9CA3AF' } }
        }
      }
    });
  }

  function destroyCharts() {
    Object.keys(charts).forEach(k => { if (charts[k]) { charts[k].destroy(); delete charts[k]; } });
  }

  // ══════════════════════════════════════════
  // BOUTONS VOIR
  // ══════════════════════════════════════════

  function renderActions(actions) {
    if (!actions) return;
    actions.style.display = 'flex';
    const v1 = document.getElementById('btn-voir-r1');
    const v2 = document.getElementById('btn-voir-r2');
    const n1 = document.getElementById('btn-voir-r1-nom');
    const n2 = document.getElementById('btn-voir-r2-nom');
    if (v1) v1.href = `/region?region=${region1.slug}`;
    if (v2) v2.href = `/region?region=${region2.slug}`;
    if (n1) n1.textContent = region1.nom;
    if (n2) n2.textContent = region2.nom;
  }

  // ══════════════════════════════════════════
  // HELPERS
  // ══════════════════════════════════════════

  function getParam(name) {
    return new URLSearchParams(window.location.search).get(name);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
