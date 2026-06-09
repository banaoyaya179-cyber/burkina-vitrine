/* ══════════════════════════════════════════
   REFORME.JS — version API
══════════════════════════════════════════ */
(function() {
  'use strict';

  const API = '/api';

  async function init() {
    try {
      const res     = await fetch(`${API}/regions`);
      const regions = await res.json();

      renderTimeline();
      renderAnciennesRegions();
      renderNouvellesRegions(regions);
      renderCorrespondance(regions);

      if (window.initScrollReveal) setTimeout(initScrollReveal, 150);
      if (window.initCounters)    setTimeout(initCounters, 200);
    } catch(err) {
      console.error('Erreur réforme:', err);
    }
  }

  function renderTimeline() {
    var el = document.getElementById('timeline-container');
    if (!el || el.querySelector('.timeline-item')) return;

    var events = [
      { date:'1984', titre:'Haute-Volta → Burkina Faso', desc:'Thomas Sankara renomme le pays et réorganise les 30 provinces.', cls:'' },
      { date:'1997', titre:'Création des 13 régions',    desc:'Premier découpage en 13 régions administratives pour la décentralisation.', cls:'' },
      { date:'2012', titre:'47 provinces',               desc:'Passage de 45 à 47 provinces avec la création de deux nouvelles provinces.', cls:'vert' },
      { date:'2024', titre:'Réforme : 17 régions endogènes', desc:'Loi portant création de 17 régions avec des noms tirés des langues nationales.', cls:'vert' },
    ];

    el.innerHTML = events.map((e, i) =>
      `<div class="timeline-item ${e.cls} reveal" style="transition-delay:${i*120}ms">
        <div class="timeline-dot"></div>
        <span class="timeline-date">${e.date}</span>
        <div class="timeline-content"><h3>${e.titre}</h3><p>${e.desc}</p></div>
      </div>`
    ).join('');
  }

  function renderAnciennesRegions() {
    var el = document.getElementById('anciennes-regions-list');
    if (!el || el.querySelector('li')) return;

    var anciennes = ['Boucle du Mouhoun','Cascades','Centre','Centre-Est','Centre-Nord','Centre-Ouest','Centre-Sud','Est','Hauts-Bassins','Nord','Plateau-Central','Sahel','Sud-Ouest'];

    el.innerHTML = anciennes.map((nom, i) =>
      `<li class="reveal" style="transition-delay:${i*60}ms">
        <span class="num">${i+1}</span><span>${nom}</span>
      </li>`
    ).join('');
  }

  function renderNouvellesRegions(regions) {
    var el = document.getElementById('nouvelles-regions-list');
    if (!el) return;

    el.innerHTML = regions.map((r, i) =>
      `<li class="reveal" style="transition-delay:${i*60}ms">
        <span class="num" style="background:var(--vert)">${i+1}</span>
        <a href="/region?region=${r.slug}">${r.nom}</a>
        <span style="font-size:var(--xs);color:var(--text-muted);margin-left:auto;white-space:nowrap">${r.ancien_nom || ''}</span>
      </li>`
    ).join('');
  }

  function renderCorrespondance(regions) {
    var el = document.getElementById('correspondance-table');
    if (!el) return;

    el.innerHTML = '<table class="correspondance-table"><thead><tr>' +
      '<th>#</th><th>Ancien nom</th><th>Nouveau nom</th><th>Chef-lieu</th><th>Lien</th>' +
      '</tr></thead><tbody>' +
      regions.map((r, i) =>
        `<tr class="reveal" style="transition-delay:${i*50}ms">
          <td>${i+1}</td>
          <td class="ancien-nom">${r.ancien_nom || '—'}</td>
          <td class="nouveau-nom">${r.nom}</td>
          <td class="chef-lieu">🏛️ ${r.chef_lieu}</td>
          <td><a href="/region?region=${r.slug}" class="btn btn-sm btn-outline">Voir →</a></td>
        </tr>`
      ).join('') +
      '</tbody></table>';
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else { init(); }
})();
