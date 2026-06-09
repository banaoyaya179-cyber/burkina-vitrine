/* ══════════════════════════════════════════
   INDEX.JS — Page d'accueil (version API)
══════════════════════════════════════════ */

(function() {
  'use strict';

  const API = '/api';

  // ══════════════════════════════════════════
  // HERO
  // ══════════════════════════════════════════

  function initHero() {
    const heroBg = document.getElementById('hero-bg');
    const particles = document.getElementById('hero-particles');

    if (heroBg) {
      window.addEventListener('scroll', throttle(() => {
        const scrollY = window.scrollY;
        const heroHeight = document.querySelector('.hero')?.offsetHeight || 0;
        if (scrollY < heroHeight) {
          heroBg.style.transform = `scale(1.1) translateY(${scrollY * 0.3}px)`;
        }
      }, 16));
    }

    if (particles) {
      createParticles(particles, 30);
    }
  }

  function createParticles(container, count) {
    for (let i = 0; i < count; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      const left = Math.random() * 100;
      const delay = Math.random() * 10;
      const duration = 8 + Math.random() * 12;
      const size = 2 + Math.random() * 4;
      particle.style.cssText = `
        left: ${left}%;
        width: ${size}px;
        height: ${size}px;
        animation-delay: ${delay}s;
        animation-duration: ${duration}s;
        opacity: ${0.2 + Math.random() * 0.3};
      `;
      container.appendChild(particle);
    }
  }

  // ══════════════════════════════════════════
  // COMPTEURS ANIMÉS
  // ══════════════════════════════════════════

  function initHeroCounters() {
    const counters = document.querySelectorAll('.hero-stat-number');
    if (!counters.length) return;

    const targets = [17, 47, '60+', '22M', '85+'];

    counters.forEach((counter, index) => {
      const target = targets[index];
      if (!target) return;

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateHeroCounter(counter, target);
            observer.unobserve(counter);
          }
        });
      }, { threshold: 0.5 });

      observer.observe(counter);
    });
  }

  function animateHeroCounter(el, target) {
    const isString = typeof target === 'string';
    const numericPart = parseInt(target, 10);
    const suffix = isString ? target.replace(/[0-9]/g, '') : '';
    const duration = 2000;
    const startTime = performance.now();

    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const easeProgress = 1 - Math.pow(1 - progress, 3);
      const current = Math.floor(numericPart * easeProgress);
      el.textContent = current.toLocaleString('fr-FR') + suffix;
      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        el.textContent = typeof target === 'number'
          ? target.toLocaleString('fr-FR')
          : target;
      }
    }

    requestAnimationFrame(update);
  }

  // ══════════════════════════════════════════
  // RÉGIONS EN VEDETTE — depuis l'API
  // ══════════════════════════════════════════

  async function initFeaturedRegions() {
    const grid = document.getElementById('featured-grid');
    if (!grid) return;

    try {
      const response = await fetch(`${API}/regions`);
      const regions = await response.json();

      const featuredSlugs = ['kadiogo', 'guiriko', 'tannounyan', 'tapoa'];
      const featuredRegions = featuredSlugs
        .map(slug => regions.find(r => r.slug === slug))
        .filter(Boolean);

      if (!featuredRegions.length) return;

      // Charger les détails de chaque région pour avoir provinces et sites
      const details = await Promise.all(
        featuredRegions.map(r => fetch(`${API}/regions/${r.slug}`).then(res => res.json()))
      );

      grid.innerHTML = '';
      details.forEach((region, index) => {
        const card = createRegionCard(region, index);
        grid.appendChild(card);
      });

      if (typeof window.initScrollReveal === 'function') {
        window.initScrollReveal();
      }

    } catch (err) {
      console.error('Erreur chargement régions vedettes:', err);
    }
  }

  function createRegionCard(region, index) {
    const card = document.createElement('a');
    card.href = `/region?region=${region.slug}`;
    card.className = 'region-card reveal';
    card.style.transitionDelay = `${index * 100}ms`;

    const provinces = region.provinces || [];
    const sites = region.sites || [];

    const stats = [
      { value: formatNumber(region.population), label: 'Habitants' },
      { value: provinces.length.toString(), label: 'Provinces' },
      { value: sites.length.toString(), label: 'Sites' }
    ];

    card.innerHTML = `
      <div class="region-card-img">
        <img src="/${region.image_card}"
             alt="${region.nom}"
             loading="lazy"
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
          ${stats.map(s => `
            <div class="region-card-stat">
              <span>${s.value}</span>
              <span>${s.label}</span>
            </div>
          `).join('')}
        </div>
      </div>
    `;

    return card;
  }

  function formatNumber(num) {
    if (!num) return '0';
    if (num >= 1000000) return (num / 1000000).toFixed(1).replace('.0', '') + 'M';
    if (num >= 1000) return (num / 1000).toFixed(0) + 'K';
    return num.toString();
  }

  // ══════════════════════════════════════════
  // GALERIE PREVIEW
  // ══════════════════════════════════════════

  function initGaleriePreview() {
    const grid = document.getElementById('galerie-preview');
    if (!grid) return;

    const items = grid.querySelectorAll('.galerie-preview-item');
    items.forEach((item, index) => {
      item.style.transitionDelay = `${index * 100}ms`;
      item.addEventListener('click', () => {
        window.location.href = '/galerie';
      });
    });
  }

  // ══════════════════════════════════════════
  // POTENTIALITÉS
  // ══════════════════════════════════════════

  function initPotentialites() {
    const cards = document.querySelectorAll('.potentiel-card');
    cards.forEach((card, index) => {
      card.style.transitionDelay = `${index * 100}ms`;
    });
  }

  // ══════════════════════════════════════════
  // CTA RÉFORME
  // ══════════════════════════════════════════

  function initReformeCTA() {
    const section = document.querySelector('.reforme-cta-section');
    if (!section) return;

    const stats = section.querySelectorAll('.reforme-cta-stat-num');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          stats.forEach((stat, index) => {
            const target = index === 0 ? 13 : 17;
            const duration = 1500;
            const startTime = performance.now();

            function update(currentTime) {
              const elapsed = currentTime - startTime;
              const progress = Math.min(elapsed / duration, 1);
              const easeProgress = 1 - Math.pow(1 - progress, 3);
              stat.textContent = Math.floor(target * easeProgress);
              if (progress < 1) {
                requestAnimationFrame(update);
              } else {
                stat.textContent = target;
              }
            }

            setTimeout(() => requestAnimationFrame(update), index * 200);
          });
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    observer.observe(section);
  }

  // ══════════════════════════════════════════
  // UTILITAIRE
  // ══════════════════════════════════════════

  function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
      if (!inThrottle) {
        func.apply(this, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  // ══════════════════════════════════════════
  // INIT
  // ══════════════════════════════════════════

  function init() {
    initHero();
    initHeroCounters();
    initFeaturedRegions();
    initGaleriePreview();
    initPotentialites();
    initReformeCTA();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
