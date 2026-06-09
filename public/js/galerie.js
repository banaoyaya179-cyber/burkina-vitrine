/* ══════════════════════════════════════════
   GALERIE.JS — Galerie nationale (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';

  let currentCategorie = 'tous';
  let currentRegion    = 'toutes';
  let allImages        = [];
  let filteredImages   = [];
  let allRegions       = [];
  let lightboxIndex    = 0;
  const PAGE_SIZE      = 20;
  let displayedCount   = 0;

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  async function init() {
    try {
      // Charger toutes les régions
      const resRegions = await fetch(`${API}/regions`);
      allRegions = await resRegions.json();

      // Construire la liste des images depuis toutes les galeries
      // On charge chaque région avec ses détails
      const details = await Promise.all(
        allRegions.map(r => fetch(`${API}/regions/${r.slug}`).then(res => res.json()))
      );

      allImages = [];
      details.forEach(region => {
        const galerie = region.galerie || [];
        galerie.forEach(img => {
          allImages.push({
            src:       img.src,
            alt:       img.alt,
            titre:     img.titre,
            region:    region.slug,
            regionNom: region.nom,
            categorie: 'regions', // catégorie par défaut
          });
        });

        // Ajouter les sites comme images supplémentaires
        const sites = region.sites || [];
        sites.forEach(site => {
          if (site.image) {
            allImages.push({
              src:       site.image,
              alt:       site.nom,
              titre:     site.nom,
              region:    region.slug,
              regionNom: region.nom,
              categorie: 'sites',
            });
          }
        });
      });

      filteredImages = [...allImages];

      populateRegionSelect();
      initFilters();
      initLightbox();
      renderGrid(true);
      updateCount();
      initLoadMore();

    } catch (err) {
      console.error('Erreur init galerie:', err);
    }
  }

  // ══════════════════════════════════════════
  // PEUPLER LE SELECT RÉGION
  // ══════════════════════════════════════════

  function populateRegionSelect() {
    const sel = document.getElementById('galerie-region-select');
    if (!sel) return;

    const opts = '<option value="toutes">Toutes les régions</option>' +
      allRegions.map(r => `<option value="${r.slug}">${r.nom}</option>`).join('');
    sel.innerHTML = opts;
  }

  // ══════════════════════════════════════════
  // FILTRES
  // ══════════════════════════════════════════

  function initFilters() {
    document.querySelectorAll('.galerie-filtre').forEach(btn => {
      btn.addEventListener('click', () => {
        currentCategorie = btn.dataset.filtre || 'tous';
        document.querySelectorAll('.galerie-filtre').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        applyFilters();
      });
    });

    const regionSelect = document.getElementById('galerie-region-select');
    if (regionSelect) {
      regionSelect.addEventListener('change', () => {
        currentRegion = regionSelect.value;
        applyFilters();
      });
    }
  }

  function applyFilters() {
    filteredImages = allImages.filter(img => {
      if (currentCategorie !== 'tous'   && img.categorie !== currentCategorie) return false;
      if (currentRegion    !== 'toutes' && img.region    !== currentRegion)    return false;
      return true;
    });

    displayedCount = 0;
    renderGrid(true);
    updateCount();
    updateLoadMore();
  }

  // ══════════════════════════════════════════
  // GRILLE
  // ══════════════════════════════════════════

  function renderGrid(reset = false) {
    const masonry = document.getElementById('galerie-masonry');
    const empty   = document.getElementById('empty-state');
    if (!masonry) return;

    if (reset) { masonry.innerHTML = ''; displayedCount = 0; }

    if (filteredImages.length === 0) {
      if (empty) empty.style.display = 'block';
      updateLoadMore();
      return;
    }
    if (empty) empty.style.display = 'none';

    const slice = filteredImages.slice(displayedCount, displayedCount + PAGE_SIZE);

    slice.forEach((img, idx) => {
      const globalIdx = displayedCount + idx;
      const item = document.createElement('div');
      item.className = 'galerie-item reveal';
      item.dataset.index = globalIdx;
      item.style.transitionDelay = (idx % 8 * 50) + 'ms';

      item.innerHTML = `
        <img src="/${img.src}" alt="${img.alt}" loading="lazy"
             onerror="this.src='/images/placeholder.jpg'">
        <div class="galerie-item-overlay">
          <div class="galerie-item-title">${img.titre}</div>
          <div class="galerie-item-meta">${img.regionNom} • ${getCategorieLabel(img.categorie)}</div>
        </div>
        <div class="galerie-item-badge">${getCategorieLabel(img.categorie)}</div>
      `;

      masonry.appendChild(item);
    });

    displayedCount += slice.length;
    if (window.initScrollReveal) setTimeout(initScrollReveal, 100);
    updateLoadMore();
  }

  function getCategorieLabel(cat) {
    const labels = {
      sites: '🏖️ Sites', regions: '🗺️ Régions',
      gastronomie: '🍽️ Gastro', artisanat: '🎨 Artisanat',
      festivals: '🎭 Festivals', danses: '💃 Danses'
    };
    return labels[cat] || cat;
  }

  function updateCount() {
    const el = document.getElementById('galerie-count');
    if (el) {
      const n = filteredImages.length;
      el.textContent = `${n} photo${n > 1 ? 's' : ''}`;
    }
  }

  // ══════════════════════════════════════════
  // CHARGER PLUS
  // ══════════════════════════════════════════

  function initLoadMore() {
    const btn = document.getElementById('btn-load-more');
    if (btn) btn.addEventListener('click', () => renderGrid(false));
  }

  function updateLoadMore() {
    const wrap = document.getElementById('galerie-load-more');
    if (wrap) wrap.style.display = displayedCount < filteredImages.length ? 'block' : 'none';
  }

  // ══════════════════════════════════════════
  // LIGHTBOX
  // ══════════════════════════════════════════

  function initLightbox() {
    const masonry = document.getElementById('galerie-masonry');
    if (!masonry) return;

    masonry.addEventListener('click', e => {
      const item = e.target.closest('.galerie-item');
      if (!item) return;
      openLightbox(parseInt(item.dataset.index, 10));
    });
  }

  function openLightbox(index) {
    lightboxIndex = index;
    const lb        = document.getElementById('lightbox');
    const lbImg     = document.getElementById('lightbox-img');
    const lbCaption = document.getElementById('lightbox-caption');
    const lbCounter = document.getElementById('lightbox-counter');
    if (!lb) return;

    const img = filteredImages[index];
    if (lbImg)     { lbImg.src = '/' + img.src; lbImg.alt = img.alt; }
    if (lbCaption) lbCaption.textContent = img.titre + ' — ' + img.regionNom;
    if (lbCounter) lbCounter.textContent = (index + 1) + ' / ' + filteredImages.length;

    lb.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    const lb = document.getElementById('lightbox');
    if (lb) lb.classList.remove('active');
    document.body.style.overflow = '';
  }

  function navigateLightbox(dir) {
    lightboxIndex = (lightboxIndex + dir + filteredImages.length) % filteredImages.length;
    openLightbox(lightboxIndex);
  }

  document.addEventListener('DOMContentLoaded', () => {
    const lb = document.getElementById('lightbox');
    if (!lb) return;
    lb.querySelector('.lightbox-close')?.addEventListener('click', closeLightbox);
    lb.querySelector('.prev')?.addEventListener('click', () => navigateLightbox(-1));
    lb.querySelector('.next')?.addEventListener('click', () => navigateLightbox(1));
    lb.addEventListener('click', e => { if (e.target === lb) closeLightbox(); });
    document.addEventListener('keydown', e => {
      if (!lb.classList.contains('active')) return;
      if (e.key === 'Escape')     closeLightbox();
      if (e.key === 'ArrowLeft')  navigateLightbox(-1);
      if (e.key === 'ArrowRight') navigateLightbox(1);
    });
  });

  // ══════════════════════════════════════════
  // RESET
  // ══════════════════════════════════════════

  window.resetGalerieFilters = function() {
    currentCategorie = 'tous';
    currentRegion    = 'toutes';
    document.querySelectorAll('.galerie-filtre').forEach((b, i) => b.classList.toggle('active', i === 0));
    const sel = document.getElementById('galerie-region-select');
    if (sel) sel.value = 'toutes';
    applyFilters();
  };

  // ══════════════════════════════════════════
  // DÉMARRAGE
  // ══════════════════════════════════════════

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
