/* ══════════════════════════════════════════
   UTILS.JS — Fonctions utilitaires partagées
   Helpers réutilisables par toutes les pages
══════════════════════════════════════════ */

// ═══ FORMATAGE ═══

function formatNumber(num) {
  if (num >= 1000000) {
    return (num / 1000000).toFixed(1).replace('.0', '') + 'M';
  }
  if (num >= 1000) {
    return (num / 1000).toFixed(0) + 'K';
  }
  return num.toString();
}

function formatPopulation(pop) {
  if (pop >= 1000000) {
    return (pop / 1000000).toFixed(2).replace(/\.00$/, '') + ' millions';
  }
  if (pop >= 1000) {
    return (pop / 1000).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ' ') + ' 000';
  }
  return pop.toString();
}

function formatSuperficie(km2) {
  return km2.toLocaleString('fr-FR') + ' km²';
}

function formatDensite(densite) {
  return densite.toLocaleString('fr-FR') + ' hab/km²';
}

// ═══ DOM HELPERS ═══

function $(selector, context = document) {
  return context.querySelector(selector);
}

function $$(selector, context = document) {
  return Array.from(context.querySelectorAll(selector));
}

function createElement(tag, attrs = {}, children = []) {
  const el = document.createElement(tag);
  Object.entries(attrs).forEach(([key, val]) => {
    if (key === 'class') {
      el.className = val;
    } else if (key === 'text') {
      el.textContent = val;
    } else if (key === 'html') {
      el.innerHTML = val;
    } else if (key.startsWith('on') && typeof val === 'function') {
      el.addEventListener(key.slice(2).toLowerCase(), val);
    } else {
      el.setAttribute(key, val);
    }
  });
  children.forEach(child => {
    if (typeof child === 'string') {
      el.appendChild(document.createTextNode(child));
    } else {
      el.appendChild(child);
    }
  });
  return el;
}

// ═══ SCROLL REVEAL ═══

function initScrollReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });

  $$('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
    observer.observe(el);
  });
}

// ═══ COUNTER ANIMATION ═══

function animateCounter(el, target, suffix = '', duration = 2000) {
  const start = 0;
  const startTime = performance.now();
  
  function update(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easeProgress = 1 - Math.pow(1 - progress, 3); // easeOutCubic
    const current = Math.floor(start + (target - start) * easeProgress);
    
    el.textContent = current.toLocaleString('fr-FR') + suffix;
    
    if (progress < 1) {
      requestAnimationFrame(update);
    } else {
      el.textContent = target.toLocaleString('fr-FR') + suffix;
    }
  }
  
  requestAnimationFrame(update);
}

function initCounters() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.dataset.counter, 10);
        const suffix = el.dataset.suffix || '';
        animateCounter(el, target, suffix);
        observer.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  
  $$('[data-counter]').forEach(el => observer.observe(el));
}

// ═══ THEME ═══

function initTheme() {
  const savedTheme = localStorage.getItem('theme') || 'light';
  document.documentElement.setAttribute('data-theme', savedTheme);
  
  const toggle = $('#theme-toggle');
  if (toggle) {
    toggle.addEventListener('click', () => {
      const current = document.documentElement.getAttribute('data-theme');
      const next = current === 'dark' ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', next);
      localStorage.setItem('theme', next);
    });
  }
}

// ═══ MOBILE MENU ═══

function initMobileMenu() {
  const hamburger = $('#hamburger');
  const nav = $('#nav');
  const overlay = $('#nav-overlay');
  
  if (!hamburger || !nav) return;
  
  function toggleMenu() {
    const isOpen = nav.classList.toggle('active');
    hamburger.classList.toggle('active', isOpen);
    if (overlay) overlay.classList.toggle('active', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  }
  
  hamburger.addEventListener('click', toggleMenu);
  
  if (overlay) {
    overlay.addEventListener('click', toggleMenu);
  }
  
  $$('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      if (nav.classList.contains('active')) {
        toggleMenu();
      }
    });
  });
}



// ═══ SCROLL PROGRESS ═══

function initScrollProgress() {
  const bar = $('#scroll-progress');
  if (!bar) return;
  
  window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = (scrollTop / docHeight) * 100;
    bar.style.width = progress + '%';
  });
}

// ═══ HEADER SCROLL ═══

function initHeaderScroll() {
  const header = $('#header');
  if (!header) return;
  
  let lastScroll = 0;
  
  window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    
    if (currentScroll > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
  });
}

// ═══ SHARE ═══

function initShareButtons() {
  $$('.share-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const network = btn.dataset.network;
      const url = encodeURIComponent(window.location.href);
      const title = encodeURIComponent(document.title);
      
      const links = {
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${url}`,
        twitter: `https://twitter.com/intent/tweet?url=${url}&text=${title}`,
        whatsapp: `https://wa.me/?text=${title}%20${url}`,
        copy: 'copy'
      };
      
      if (network === 'copy') {
        navigator.clipboard.writeText(window.location.href).then(() => {
          showToast('Lien copié !');
        });
      } else if (links[network]) {
        window.open(links[network], '_blank', 'width=600,height=400');
      }
    });
  });
}

// ═══ TOAST ═══

function showToast(message, duration = 3000) {
  const existing = $('.toast-notification');
  if (existing) existing.remove();
  
  const toast = createElement('div', {
    class: 'toast-notification',
    text: message
  });
  
  toast.style.cssText = `
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%) translateY(100px);
    background: var(--text);
    color: white;
    padding: 12px 24px;
    border-radius: var(--radius);
    font-size: var(--sm);
    font-weight: 500;
    z-index: 10000;
    box-shadow: var(--shadow-lg);
    transition: transform 0.3s var(--ease);
  `;
  
  document.body.appendChild(toast);
  
  requestAnimationFrame(() => {
    toast.style.transform = 'translateX(-50%) translateY(0)';
  });
  
  setTimeout(() => {
    toast.style.transform = 'translateX(-50%) translateY(100px)';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}

// ═══ ESCAPE HTML ═══

function escapeHtml(str) {
  const div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

// ═══ LAZY IMAGES ═══

function initLazyImages() {
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
            observer.unobserve(img);
          }
        }
      });
    });
    
    $$('img[data-src]').forEach(img => observer.observe(img));
  } else {
    // Fallback
    $$('img[data-src]').forEach(img => {
      img.src = img.dataset.src;
      img.removeAttribute('data-src');
    });
  }
}

// ═══ DEBOUNCE ═══

function debounce(fn, delay) {
  let timeout;
  return (...args) => {
    clearTimeout(timeout);
    timeout = setTimeout(() => fn.apply(this, args), delay);
  };
}

// ═══ THROTTLE ═══

function throttle(fn, limit) {
  let inThrottle;
  return (...args) => {
    if (!inThrottle) {
      fn.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}

// ═══ GET URL PARAM ═══

function getUrlParam(name) {
  const params = new URLSearchParams(window.location.search);
  return params.get(name);
}

// ═══ PLACEHOLDER IMAGE ═══

function getPlaceholderImage(text, width = 400, height = 300) {
  // Génère un SVG placeholder avec les couleurs du Burkina
  const svg = `
    <svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">
      <rect width="${width}" height="${height/2}" fill="#EF3340"/>
      <rect y="${height/2}" width="${width}" height="${height/2}" fill="#009639"/>
      <text x="${width/2}" y="${height/2}" text-anchor="middle" dominant-baseline="central" 
            fill="#FCD116" font-family="Poppins" font-size="24" font-weight="bold">★</text>
      <text x="${width/2}" y="${height/2 + 40}" text-anchor="middle" dominant-baseline="central"
            fill="white" font-family="Outfit" font-size="14">${escapeHtml(text)}</text>
    </svg>
  `;
  return 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svg)));
}

// ═══ INIT ALL UTILS ═══

function initUtils() {
  initTheme();
  initMobileMenu();
  initScrollProgress();
  initHeaderScroll();
  initScrollReveal();
  initCounters();
  initLazyImages();
  initShareButtons();
}

// Exposer globalement
window.$ = $;
window.$$ = $$;
window.createElement = createElement;
window.formatNumber = formatNumber;
window.formatPopulation = formatPopulation;
window.formatSuperficie = formatSuperficie;
window.formatDensite = formatDensite;
window.initScrollReveal = initScrollReveal;
window.animateCounter = animateCounter;
window.initCounters = initCounters;
window.initTheme = initTheme;
window.initMobileMenu = initMobileMenu;
window.initScrollProgress = initScrollProgress;
window.initHeaderScroll = initHeaderScroll;
window.initShareButtons = initShareButtons;
window.showToast = showToast;
window.escapeHtml = escapeHtml;
window.initLazyImages = initLazyImages;
window.debounce = debounce;
window.throttle = throttle;
window.getUrlParam = getUrlParam;
window.getPlaceholderImage = getPlaceholderImage;
window.initUtils = initUtils;
