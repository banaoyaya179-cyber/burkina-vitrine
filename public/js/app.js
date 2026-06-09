/* ══════════════════════════════════════════
   APP.JS — Initialisation globale du site (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';

  // Cache des données pour éviter les requêtes répétées
  let _regionsCache = null;

  async function getRegions() {
    if (_regionsCache) return _regionsCache;
    const res = await fetch(`${API}/regions`);
    _regionsCache = await res.json();
    return _regionsCache;
  }

  // ══════════════════════════════════════════
  // LOADER
  // ══════════════════════════════════════════

  function initLoader() {
    const loader = document.getElementById('page-loader');
    const bar    = document.getElementById('loader-bar');
    if (!loader) return;

    let progress = 0;
    const interval = setInterval(() => {
      progress += Math.random() * 15 + 5;
      if (progress > 90) progress = 90;
      if (bar) bar.style.width = progress + '%';
    }, 200);

    window.addEventListener('load', () => {
      clearInterval(interval);
      if (bar) bar.style.width = '100%';
      setTimeout(() => {
        loader.classList.add('hidden');
        setTimeout(() => {
          loader.style.display = 'none';
          document.body.classList.add('loaded');
        }, 500);
      }, 400);
    });

    setTimeout(() => {
      if (!loader.classList.contains('hidden')) {
        clearInterval(interval);
        if (bar) bar.style.width = '100%';
        loader.classList.add('hidden');
      }
    }, 5000);
  }

  // ══════════════════════════════════════════
  // HEADER
  // ══════════════════════════════════════════

  function initHeader() {
    const header = document.getElementById('header');
    if (!header) return;

    let lastScroll = 0;

    window.addEventListener('scroll', window.throttle ? window.throttle(() => {
      const currentScroll = window.scrollY;
      if (currentScroll > 50) header.classList.add('scrolled');
      else header.classList.remove('scrolled');

      if (window.innerWidth < 1024) {
        if (currentScroll > lastScroll && currentScroll > 200)
          header.style.transform = 'translateY(-100%)';
        else
          header.style.transform = 'translateY(0)';
      }
      lastScroll = currentScroll;
    }, 100) : () => {});
  }

  // ══════════════════════════════════════════
  // PALETTE DE RECHERCHE GLOBALE (Ctrl+K)
  // ══════════════════════════════════════════

  function initSearchPalette() {
    const palette = document.getElementById('search-palette');
    const input   = document.getElementById('search-palette-input');
    const results = document.getElementById('search-palette-results');
    const trigger = document.getElementById('search-trigger');
    if (!palette || !input) return;

    let selectedIndex = -1;
    let resultItems   = [];

    function openPalette() {
      palette.classList.add('active');
      input.value = '';
      input.focus();
      selectedIndex = -1;
      renderDefault();
      document.body.style.overflow = 'hidden';
    }

    function closePalette() {
      palette.classList.remove('active');
      input.value = '';
      selectedIndex = -1;
      if (results) results.innerHTML = '';
      document.body.style.overflow = '';
    }

    function renderDefault() {
      if (!results) return;
      results.innerHTML = `
        <div class="search-group">
          <h4>Suggestions</h4>
          <div class="search-suggestions-list">
            <a href="/region?region=kadiogo" class="search-result-item">
              <span class="search-result-icon">🏛️</span>
              <div class="search-result-info"><h5>Kadiogo</h5><p>Capitale • Ouagadougou</p></div>
            </a>
            <a href="/region?region=guiriko" class="search-result-item">
              <span class="search-result-icon">🏙️</span>
              <div class="search-result-info"><h5>Guiriko</h5><p>Bobo-Dioulasso • Culture</p></div>
            </a>
            <a href="/region?region=tannounyan" class="search-result-item">
              <span class="search-result-icon">💧</span>
              <div class="search-result-info"><h5>Tannounyan</h5><p>Cascades • Banfora</p></div>
            </a>
            <a href="/carte" class="search-result-item">
              <span class="search-result-icon">🗺️</span>
              <div class="search-result-info"><h5>Carte interactive</h5><p>Explorer les 17 régions</p></div>
            </a>
          </div>
        </div>`;
    }

    async function renderResults(query) {
      if (!results) return;
      const trimmed = query.trim().toLowerCase();
      if (!trimmed) { renderDefault(); return; }

      results.innerHTML = '<div style="text-align:center;padding:20px;color:var(--text-muted)">⏳ Recherche…</div>';

      try {
        const regions = await getRegions();
        const matchedRegions    = [];
        const matchedProvinces  = [];

        regions.forEach(r => {
          const langues = parseJson(r.langues);
          const peuples = parseJson(r.peuples);

          if (r.nom.toLowerCase().includes(trimmed) ||
              (r.ancien_nom  || '').toLowerCase().includes(trimmed) ||
              (r.chef_lieu   || '').toLowerCase().includes(trimmed) ||
              (r.zone        || '').toLowerCase().includes(trimmed) ||
              (r.description || '').toLowerCase().includes(trimmed) ||
              langues.some(l => l.toLowerCase().includes(trimmed)) ||
              peuples.some(p => p.toLowerCase().includes(trimmed))) {
            matchedRegions.push(r);
          }
        });

        let html = '';

        if (matchedRegions.length) {
          html += '<div class="search-group"><h4>Régions</h4>';
          matchedRegions.slice(0, 5).forEach(r => {
            html += `
              <a href="/region?region=${r.slug}" class="search-result-item">
                <img src="/${r.image_card}" alt="${r.nom}" loading="lazy"
                     onerror="this.src='/images/placeholder.jpg'">
                <div class="search-result-info">
                  <h5>${r.nom}</h5>
                  <p>${r.chef_lieu} • ${r.zone}</p>
                </div>
              </a>`;
          });
          html += '</div>';
        }

        if (!matchedRegions.length && !matchedProvinces.length) {
          html = `
            <div class="search-empty">
              <div class="search-empty-icon">🔍</div>
              <p>Aucun résultat pour "<strong>${escHtml(query)}</strong>"</p>
              <span class="search-empty-hint">Essayez un nom de région, province ou site</span>
            </div>`;
        }

        results.innerHTML = html;
        resultItems   = results.querySelectorAll('.search-result-item');
        selectedIndex = -1;

      } catch (err) {
        results.innerHTML = '<div style="text-align:center;padding:20px;color:var(--text-muted)">Erreur de recherche.</div>';
      }
    }

    function navigateResults(dir) {
      if (!resultItems.length) return;
      resultItems.forEach(i => i.classList.remove('selected'));
      if (dir === 'down') selectedIndex = (selectedIndex + 1) % resultItems.length;
      else selectedIndex = selectedIndex <= 0 ? resultItems.length - 1 : selectedIndex - 1;
      resultItems[selectedIndex].classList.add('selected');
      resultItems[selectedIndex].scrollIntoView({ block: 'nearest' });
    }

    if (trigger) trigger.addEventListener('click', openPalette);

    input.addEventListener('input', debounce(e => renderResults(e.target.value), 300));

    input.addEventListener('keydown', e => {
      switch (e.key) {
        case 'ArrowDown': e.preventDefault(); navigateResults('down'); break;
        case 'ArrowUp':   e.preventDefault(); navigateResults('up');   break;
        case 'Enter':     e.preventDefault();
          if (selectedIndex >= 0 && resultItems[selectedIndex])
            resultItems[selectedIndex].click();
          break;
        case 'Escape': e.preventDefault(); closePalette(); break;
      }
    });

    document.addEventListener('keydown', e => {
      if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
        e.preventDefault();
        palette.classList.contains('active') ? closePalette() : openPalette();
      }
    });

    palette.addEventListener('click', e => {
      if (e.target === palette) closePalette();
    });
  }

  // ══════════════════════════════════════════
  // SMOOTH SCROLL
  // ══════════════════════════════════════════

  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', e => {
        const targetId = anchor.getAttribute('href');
        if (targetId === '#') return;
        const target = document.querySelector(targetId);
        if (target) {
          e.preventDefault();
          const offsetPosition = target.getBoundingClientRect().top + window.scrollY - 80;
          window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
        }
      });
    });
  }

  // ══════════════════════════════════════════
  // HELPERS
  // ══════════════════════════════════════════

  function parseJson(val) {
    if (!val) return [];
    if (Array.isArray(val)) return val;
    try { return JSON.parse(val); } catch { return []; }
  }

  function escHtml(str) {
    return str.replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
  }

  function debounce(fn, delay) {
    let t;
    return (...args) => { clearTimeout(t); t = setTimeout(() => fn(...args), delay); };
  }

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  function init() {
    initLoader();
    initHeader();
    initSearchPalette();
    initSmoothScroll();
    if (typeof window.initUtils === 'function') window.initUtils();
    window.APP_INITIALIZED = true;
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
